<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('estadistica');
		$this->load->model('paciente');
		$this->load->model('designacion');
		$this->load->model('especialidad');
		$this->load->model('patologia');
		$this->load->model('laboratorio');
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
		$data['especialidad'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
        $this->load->view('estadisticas/consultas', $data);
    }
	
	public function especialidades()
    {
		$data['listado'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
        $this->load->view('estadisticas/especialidades', $data);
    }
	
	public function patologias()
    {
		$data['listado'] = $this->patologia->listar_patologias();
		$data['especialidad'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
        $this->load->view('estadisticas/patologias', $data);
    }
	
	public function laboratorios()
    {
		$data['listado'] = $this->laboratorio->listar_laboratorios();
		$data['especialidad'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorio'] = $this->consultorio->listar();
		$data['horario'] = $this->horario->listar();
        $this->load->view('estadisticas/laboratorios', $data);
    }
	
	public function pdf_patologias($anio,$mes,$esp,$per,$con,$hor) {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Apisoft');
        $pdf->SetTitle('Reportes');
        $pdf->SetSubject('Historial Clinico');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "ESTADISTICA EPIDEMIOLOGICO", PDF_HEADER_STRING);
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
        $listado=$this->patologia->listar_patologias();
        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #000; font-weight: bold; background-color: #EEE;}";
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
        $html .= "</style>";
        $html .= "<table width='100%' border=\"1\" cellpadding=\"8\" cellspacing=\"0\" style=\"border:1px solid #000\">";
        $html .= "<tr>";
        $html .= "<th width=\"5%\">#</th>";
		$html .= "<th width=\"10%\">Gestión</th>";
		$html .= "<th width=\"15%\">Mes</th>";
		$html .= "<th width=\"30%\">Especialidad</th>";
		$html .= "<th width=\"25%\">Patología</th>";
		$html .= "<th width=\"15%\">Diagnostico</th>";
		/*$html .= "<th width=\"17%\">Medico</th>";
		$html .= "<th width=\"10%\">Costo</th>";*/
		$html .= "</tr>";
        $c=1;$total=0;
		if(!empty($listado)){
		foreach ($listado as $fila)
        { 
			if($mes!=0){
				switch($mes)
				{
					case "1": $MES = 'Enero'; break;
					case "2": $MES = 'Febrero'; break;
					case "3": $MES = 'Marzo'; break;
					case "4": $MES = 'Abril'; break;
					case "5": $MES = 'Mayo'; break;
					case "6": $MES = 'Junio'; break;
					case "7": $MES = 'Julio'; break;
					case "8": $MES = 'Agosto'; break;
					case "9": $MES = 'Septiembre'; break;
					case "10": $MES = 'Octubre'; break;
					case "11": $MES = 'Noviembre'; break;
					case "12": $MES = 'Diciembre'; break;
				}
			}else{
				$MES = 'Enero-Diciembre';	
			}
			$html .= "<tr>";
			$html .= "<td>" . $c . "</td>";
			$html .= "<td>" . $anio . "</td>";
			$html .= "<td>" . $MES . "</td>";
			$html .= "<td>" . $fila->ESP_NOMBRE . "</td>";
			$html .= "<td>" . $fila->PAT_NOMBRE . "</td>";
			$html .= "<td>" . $this->estadistica->consultas_p($anio,$mes,0,$esp,$per,$con,$hor,$fila->PAT_ID) . "</td>";
			/*$html .= "<td>" . $fila->PER_NOMBRE . ' ' . $fila->PER_PATERNO . ' ' . $fila->PER_MATERNO . "</td>";
			$html .= "<td>" . $fila->ESP_COSTO . " Bs</td>";*/
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
