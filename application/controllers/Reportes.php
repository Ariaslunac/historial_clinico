<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reporte');
		$this->load->model('paciente');
		$this->load->model('designacion');
		$this->load->model('especialidad');
		$this->load->model('persona');
		$this->load->model('consultorio');
		$this->load->model('horario');
    }
    public function index()
    {
        /*$data['listado'] = $this->consultorio->listar();
        $this->load->view('consultorios', $data);*/
    }
	
	public function consultas()
    {
		//var_dump($this->input->post()); exit;
        $fei=$this->input->post("fechai");
		$fef=$this->input->post("fechaf");
		$cod=$this->input->post("codigo");
		$esp=$this->input->post("especialidad");
		$per=$this->input->post("personal");
		$con=$this->input->post("consultorio");
		$hor=$this->input->post("horario");
		$data['especialidad'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
		$data['listado'] = $this->reporte->pacientes($fei,$fef,$cod,$esp,$per,$con,$hor);
        $this->load->view('reportes/consultas', $data);
    }
	
	public function pacientes()
    {
		//var_dump($this->input->post()); exit;
        $fei=$this->input->post("fechai");
		$fef=$this->input->post("fechaf");
		$cod=$this->input->post("codigo");
		$esp=$this->input->post("especialidad");
		$per=$this->input->post("personal");
		$con=$this->input->post("consultorio");
		$hor=$this->input->post("horario");
		$data['especialidad'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
		$data['listado'] = $this->reporte->pacientes($fei,$fef,$cod,$esp,$per,$con,$hor);
        $this->load->view('reportes/pacientes', $data);
    }
	
	public function personal()
    {
		$cod=$this->input->post("codigo");
		$esp=$this->input->post("especialidad");
		$con=$this->input->post("consultorio");
		$hor=$this->input->post("horario");
		$data['especialidad'] = $this->especialidad->listar();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
		$data['listado'] = $this->reporte->personal($cod,$esp,$con,$hor);
        $this->load->view('reportes/personal', $data);
    }
	
	public function archivos($id){
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');	
			$datos["listado"] = $this->reporte->archivos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
	 		show_404();
	 	}
	}
	
	public function pdf_consultas($fei,$fef,$cod,$esp,$per,$con,$hor,$id=null) {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Apisoft');
        $pdf->SetTitle('Reportes');
        $pdf->SetSubject('Historial Clinico');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "REPORTE DE CONSULTAS", PDF_HEADER_STRING);
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 8, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
        $listado=$this->reporte->consultas($fei,$fef,$cod,$esp,$per,$con,$hor,$id);
        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #000; font-weight: bold; background-color: #EEE;}";
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<table width='100%' border=\"1\" cellpadding=\"8\" cellspacing=\"0\" style=\"border:1px solid #000\">";
        $html .= "<tr>";
        $html .= "<th width=\"5%\">#</th>";
		$html .= "<th width=\"11%\">Fecha</th>";
		$html .= "<th width=\"9%\">Hora</th>";
		$html .= "<th width=\"16%\">Especialidad</th>";
		$html .= "<th width=\"17%\">Paciente</th>";
		$html .= "<th width=\"15%\">Consultorio</th>";
		$html .= "<th width=\"17%\">Medico</th>";
		$html .= "<th width=\"10%\">Costo</th>";
		$html .= "</tr>";
        $c=1;$total=0;
		if(!empty($listado)){
		foreach ($listado as $fila)
        { 
			$html .= "<tr>";
			$html .= "<td>" . $c . "</td>";
			$html .= "<td>" . $fila->CON_FECHA . "</td>";
			$html .= "<td>" . $fila->CON_HORA . "</td>";
			$html .= "<td>" . $fila->ESP_NOMBRE . "</td>";
			$html .= "<td>" . $fila->PAC_NOMBRE . ' ' . $fila->PAC_PATERNO . ' ' . $fila->PAC_MATERNO . "</td>";
			$html .= "<td>" . $fila->COS_NRO." ".$fila->COS_DESC . "</td>";
			$html .= "<td>" . $fila->PER_NOMBRE . ' ' . $fila->PER_PATERNO . ' ' . $fila->PER_MATERNO . "</td>";
			$html .= "<td>" . $fila->ESP_COSTO . " Bs</td>";
			$html .= "</tr>";
        $c++;$total+=$fila->ESP_COSTO;}
		}
		$html .= "<tr>";
		$html .= "<td colspan=\"7\"><strong>Total:</strong></td>";
		$html .= "<td><strong>" . $total . " Bs</strong></td>";
		$html .= "</tr>";
        $html .= "</table>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("reporte.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
	
	public function pdf_pacientes($fei,$fef,$cod,$esp,$per,$con,$hor,$id=null) {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Apisoft');
        $pdf->SetTitle('Reportes');
        $pdf->SetSubject('Historial Clinico');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "REPORTE DE PACIENTES", PDF_HEADER_STRING);
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 8, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
        $listado=$this->reporte->pacientes($fei,$fef,$cod,$esp,$per,$con,$hor,$id);
        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #000; font-weight: bold; background-color: #EEE;}";
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<table width='100%' border=\"1\" cellpadding=\"8\" cellspacing=\"0\" style=\"border:1px solid #000\">";
        /*$html .= "<tr>";
        $html .= "<th width=\"5%\">#</th>";
		$html .= "<th width=\"10%\">Fecha</th>";
		$html .= "<th width=\"10%\">Hora</th>";
		$html .= "<th width=\"15%\">Especialidad</th>";
		$html .= "<th width=\"12%\">Paciente</th>";
		$html .= "<th width=\"12%\">Sintomas</th>";
		$html .= "<th width=\"12%\">Diagnostico</th>";
		$html .= "<th width=\"12%\">Consultorio</th>";
		$html .= "<th width=\"12%\">Medico</th>";
		$html .= "</tr>";*/
        $c=1;
		if(!empty($listado)){
		foreach ($listado as $fila)
        { 
            $html .= "<tr>";
			$html .= "<th colspan=\"6\">";
				$html .= "<table width='100%' border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
				$html .= "<tr>";
				$html .= "<th colspan=\"2\">N&deg; " . $c . "</th>";
				$html .= "<th colspan=\"2\">Fecha: " . $fila->CON_FECHA . " - " . $fila->CON_HORA . "</th>";
				$html .= "<th colspan=\"2\">Consultorio: " . $fila->COS_NRO ." ".$fila->COS_DESC . " (". $fila->HOR_TURNO .")</th>"; 
				$html .= "</tr>";
				$html .= "</table>";
			$html .= "</th>";
			$html .= "</tr>";
			$html .= "<tr>";
			/*$html .= "<td>" . $c . "</td>";
			$html .= "<td>" . $fila->CON_FECHA . "</td>";
			$html .= "<td>" . $fila->CON_HORA . "</td>";*/ 
			$html .= "<td colspan=\"2\"><strong>Especialidad:</strong> " . $fila->ESP_NOMBRE . "</td>";
			$html .= "<td colspan=\"2\"><strong>Paciente:</strong> " . $fila->PAC_NOMBRE . ' ' . $fila->PAC_PATERNO . ' ' . $fila->PAC_MATERNO . "</td>";
			$html .= "<td colspan=\"2\"><strong>Medico:</strong> " . $fila->PER_NOMBRE . ' ' . $fila->PER_PATERNO . ' ' . $fila->PER_MATERNO . "</td>";
			$html .= "</tr>";
			$sv=$this->reporte->signos_vitales($fila->CON_ID);
			if($sv!=null){
			$html .= "<tr>";
			$html .= "<td width=\"8%\"><strong>Signos Vitales</strong></td>";
			$html .= "<td width=\"18%\"><strong>Pulso:</strong><br>" . $sv->SIG_PULSO . "</td>";
			$html .= "<td width=\"17%\"><strong>Peso:</strong><br>" . $sv->SIG_PESO . "</td>";
			$html .= "<td width=\"17%\"><strong>Talla:</strong><br>" . $sv->SIG_TALLA . "</td>";
			$html .= "<td width=\"20%\"><strong>Presión Sanguinea:</strong><br>" . $sv->SIG_FRE_CAR . "</td>";
			$html .= "<td width=\"20%\"><strong>Frecuencia Cardiaca:</strong><br>" . $sv->SIG_PRE_SAN . "</td>";
			$html .= "</tr>";
			}
			$html .= "<tr>";
			$html .= "<td colspan=\"2\" width=\"33%\"><strong>Sintomas:</strong> " . $fila->CON_SINTOMAS . "</td>";
			$html .= "<td colspan=\"2\" width=\"33%\"><strong>Diagnostico:</strong> " . $fila->CON_DIAGNOSTICO . "</td>";
			$html .= "<td colspan=\"2\" width=\"34%\"><strong>Tratamiento:</strong> " . $fila->CON_TRATAMIENTO . "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td colspan=\"4\"><strong>Observaciones:</strong> " . $fila->CON_OBS . "</td>";
			$html .= "<td colspan=\"2\"><strong>Nueva Cita:</strong> " . $fila->CON_CITAN_FECHA . " - " . $fila->CON_CITAN_HORA . "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td colspan=\"3\"><strong>Estudios Complementarios:</strong>";
			$est=$this->reporte->estudios($fila->CON_ID);
			if($est!=null){
				//$html .= "<ul>";
				foreach($est as $e):
					//$html .= "<li>". $e->LAB_NOMBRE ."</li>";
					$html .= "<br> &bull; ". $e->LAB_NOMBRE;
				endforeach;
				//$html .= "</ul>";
			}
			$html .= "</td>";
			$html .= "<td colspan=\"3\"><strong>Diagnostico Patologias:</strong>";
			$pat=$this->reporte->diagnostico($fila->CON_ID);
			if($pat!=null){
				//$html .= "<ul>";
				foreach($pat as $p):
					//$html .= "<li>". $p->PAT_NOMBRE ."</li>";
					$html .= "<br> &bull; ". $p->PAT_NOMBRE;
				endforeach;
				//$html .= "</ul>";
			}
			$html .= "</td>";
			$html .= "</tr>";
        $c++;}
		}
        $html .= "</table>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("reporte.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
	
	public function pdf_personal($cod,$esp,$con,$hor,$id=null) {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Apisoft');
        $pdf->SetTitle('Reportes');
        $pdf->SetSubject('Historial Clinico');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "REPORTE DE PERSONAL", PDF_HEADER_STRING);
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 8, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
        $listado=$this->reporte->personal($cod,$esp,$con,$hor,$id);
        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #000; font-weight: bold; background-color: #EEE;}";
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<table width='100%' border=\"1\" cellpadding=\"8\" cellspacing=\"0\">";
        /*$html .= "<tr>";
        $html .= "<th width=\"5%\">#</th>";
		$html .= "<th width=\"10%\">Codigo</th>";
		$html .= "<th width=\"10%\">Nombre</th>";
		$html .= "<th width=\"15%\">C.I.</th>";
		$html .= "<th width=\"12%\">Telefono</th>";
		$html .= "<th width=\"12%\">Email</th>";
		$html .= "<th width=\"12%\">Especialidad</th>";
		$html .= "<th width=\"12%\">Consultorio</th>";
		$html .= "<th width=\"12%\">Horario</th>";
		$html .= "</tr>";*/
        $c=1;
		if(!empty($listado)){
		foreach ($listado as $fila)
        { 
            $html .= "<tr>";
			$html .= "<th colspan=\"5\">";
				$html .= "<table width='100%' border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
				$html .= "<tr>";
				$html .= "<th>N&deg; " . $c . "</th>";
				$html .= "<th align=\"right\">Codigo: " . $fila->PER_CODIGO . "</th>";
				$html .= "</tr>";
				$html .= "</table>";
			$html .= "</th>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td rowspan=\"5\" width=\"20%\">";
			if($fila->PER_FOTO!=null){
			$html .= "<img src=\"". base_url()."assets/fotografias/personal/" . $fila->PER_FOTO . "\" width=\"150px\">";
			}
			$html .= "</td>";
			$html .= "<td width=\"12%\"><strong>Nombre:</strong> </td>";
			$html .= "<td width=\"28%\">" . $fila->PER_NOMBRE . ' ' . $fila->PER_PATERNO . ' ' . $fila->PER_MATERNO . "</td>"; 
			$html .= "<td width=\"13%\"><strong>Especialidad:</strong> </td>";
			$html .= "<td width=\"27%\">" . $fila->ESP_NOMBRE . "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td><strong>Fecha Nac.:</strong> </td>";
			$html .= "<td>" . $fila->PER_FECHAN . "</td>";
			$html .= "<td><strong>Consultorio:</strong> </td>";
			$html .= "<td>" . $fila->COS_NRO." ".$fila->COS_DESC . "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td><strong>Telefono:</strong> </td>";
			$html .= "<td>" . $fila->PER_TELEFONO . "</td>";
			$html .= "<td><strong>Horario:</strong> </td>";
			$html .= "<td>" . $fila->HOR_TURNO." ".$fila->HOR_DESDE." - ".$fila->HOR_HASTA . "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td><strong>Email:</strong> </td>";
			$html .= "<td>" . $fila->PER_EMAIL . "</td>";
			$html .= "<td><strong>Cargo:</strong> </td>";
			if($fila->PER_TIPO==1){ $tipo = "Administrativo"; }elseif($fila->PER_TIPO==2){ $tipo = "Médico"; }elseif($fila->PER_TIPO==3){ $tipo = "Enfermero"; }
			$html .= "<td>" . $tipo . "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td><strong>Dirección:</strong> </td>";
			$html .= "<td>" . $fila->PER_DIRECCION . "</td>";
			$html .= "<td><strong>Estado:</strong> </td>";
			if($fila->PER_ESTADO==1){ $estado = "Activo"; }elseif($fila->PER_ESTADO==0){ $estado = "Inactivo"; }
			$html .= "<td>" . $estado. "</td>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<td colspan=\"5\">" . $fila->PER_DESC . "</td>";
			$html .= "</tr>";
        $c++;}
		}
        $html .= "</table>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("reporte.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }

}
