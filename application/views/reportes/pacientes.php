<!DOCTYPE html>
<html lang="en">
  <head><?php $this->load->view('includes/head.php')?></head>
  <body>
  <section id="container">
      <?php $this->load->view('includes/header.php')?>
      <?php $this->load->view('includes/menu.php')?>
      <section id="main-content">
          <section class="wrapper">
			        <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel"><!-- contenido inicio-->
                              <h4><i class="fa fa-angle-right"></i> Reporte de pacientes<a class="btn btn-info pull-right" href="#" id="pdf"><i class="fa fa-print"></i> Imprimir</a></h4><br>
		<form name="formr" id="formr" action="<?=base_url();?>reportes/pacientes" method="POST">
        <div class="row form-group">
            <label for="fecha" class="col-sm-1">Fecha:</label>
			<div class="col-sm-5 form-inline">
            <?php if($_POST){ 
                $fei = $_POST["fechai"];
                } else {
                $fei = date("Y-m-d");
            } ?>
            Desde <input name="fechai" type="text" id="fechai" size="10" class="form-control fecha filtrarf" placeholder="Seleccione Fecha:" readonly required value="<?php echo $fei ?>"/>
            <?php if($_POST){ 
                $fef = $_POST["fechaf"];
                } else {
                $fef = date("Y-m-d");
            } ?>
            hasta <input name="fechaf" type="text" id="fechaf" size="10" class="form-control fecha filtrarf" placeholder="Seleccione Fecha:" readonly required value="<?php echo $fef ?>"/> 
            </div>
            <label for="Paciente" class="col-sm-1">Paciente:</label>
			<div class="col-sm-5">
			<input type="text" name="codigo" id="codigo" class="form-control filtrarc" placeholder="Codigo de Paciente" value="<?php if($_POST){ echo $_POST["codigo"];} ?>">
			</div>
        </div>
		<div class="row form-group">
			<label for="Especialidad" class="col-sm-1">Especialidad:</label>
			<div class="col-sm-5">
			<select name="especialidad" id="especialidad" class="form-control filtrar">
				<option value="0">Seleccione una Especialidad...</option>
			<?php 
			if(!empty($especialidad)){
			foreach($especialidad as $fila): ?>
				<option value="<?php echo $fila->ESP_ID ?>" <?php if($_POST){ if($_POST["especialidad"]==$fila->ESP_ID){ ?>selected="selected"<?php }} ?>><?php echo $fila->ESP_NOMBRE ?></option>
			<?php $i++; endforeach; } ?>
			</select>
			</div>
			<label for="Medico" class="col-sm-1">Medico:</label>
			<div class="col-sm-5">
			<select name="personal" id="personal" class="form-control filtrar">
				<option value="0">Seleccione un Medico...</option>
			<?php 
			if(!empty($personal)){
			foreach($personal as $fila): ?>
				<option value="<?php echo $fila->PER_ID ?>" <?php if($_POST){ if($_POST["personal"]==$fila->PER_ID){ ?>selected="selected"<?php }} ?>><?php echo $fila->PER_NOMBRE." ".$fila->PER_PATERNO." ".$fila->PER_MATERNO ?></option>
			<?php $i++; endforeach; } ?>
			</select>
			</div>
		</div>
		<div class="row form-group">
			<label for="Consultorio" class="col-sm-1">Consultorio:</label>
			<div class="col-sm-5">
			<select name="consultorio" id="consultorio" class="form-control filtrar">
				<option value="0">Seleccione un Consultorio...</option>
			<?php 
			if(!empty($consultorio)){
			foreach($consultorio as $fila): ?>
				<option value="<?php echo $fila->COS_ID ?>" <?php if($_POST){ if($_POST["consultorio"]==$fila->COS_ID){ ?>selected="selected"<?php }} ?>><?php echo $fila->COS_NRO." : ".$fila->COS_DESC ?></option>
			<?php $i++; endforeach; } ?>
			</select>
			</div>
			<label for="Horario" class="col-sm-1">Horario:</label>
			<div class="col-sm-5">
			<select name="horario" id="horario" class="form-control filtrar">
				<option value="0">Seleccione un Horario...</option>
			<?php 
			if(!empty($horario)){
			foreach($horario as $fila): ?>
				<option value="<?php echo $fila->HOR_ID ?>" <?php if($_POST){ if($_POST["horario"]==$fila->HOR_ID){ ?>selected="selected"<?php }} ?>><?php echo $fila->HOR_TURNO." ".$fila->HOR_DESDE." - ".$fila->HOR_HASTA ?></option>
			<?php $i++; endforeach; } ?>
			</select>
			</div>
		</div>
		</form>
	                  	  	  
                              <table id="table1" class="table table-striped table-bordered table-advance table-hover" cellspacing="0" width="100%">
                              <thead>
                              <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Especialidad</th>
                                  <th>Paciente</th>
                                  <th class="hidden-phone">Sintomas</th>
                                  <th class="hidden-phone">Diagnostico</th>
                                  <th class="hidden-phone">Consultorio</th>
                                  <th class="hidden-phone">Medico</th>
                                  <th class="hidden-phone">Archivos</th>
                                  <th class="hidden-phone">Imprimir</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($listado as $consul) : ?>
                              <tr>
                                  <td><?=$consul->CON_FECHA?></td>
                                  <td><?=$consul->CON_HORA?></td>
                                  <td><?=$consul->ESP_NOMBRE?></td>
                                  <td><?=$consul->PAC_NOMBRE . ' ' . $consul->PAC_PATERNO . ' ' . $consul->PAC_MATERNO?></td>                
                                  <td><?=$consul->CON_SINTOMAS?></td>
                                  <td><?=$consul->CON_DIAGNOSTICO?></td>
                                  <td><?=$consul->COS_NRO." ".$consul->COS_DESC?></td>
                                  <td><?=$consul->PER_NOMBRE . ' ' . $consul->PER_PATERNO . ' ' . $consul->PER_MATERNO?></td>
                                  <td><a class="btn btn-success" data-toggle='modal' href="#ventana" onClick="archivos('reportes','<?=$consul->CON_ID?>')"><i class="fa fa-picture-o"></i></a></td>
                                  <td><a href="<?=base_url()?>reportes/pdf_pacientes/0/0/0/0/0/0/0/<?=$consul->CON_ID;?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a></td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>
                          </table>

                      </div><!-- fin contenido inicio-->
                  </div>
              </div>
          </section>
      </section>
      <?php $this->load->view('includes/footer.php')?>
  </section>
  <div class="modal fade" id="ventana">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h1 class="modal-title"><i class="fa fa-picture-o"></i> Archivos de Consulta</h1>
                </div>
                <div class="modal-body">
                    <div class="row" id="con_archivos">
                    	<!--<div class="col-sm-12"></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php $this->load->view('includes/scripts.php')?>
<script language="javascript">
function archivos(con,id){ 
	$.ajax({
		url:"<?=base_url();?>"+con+"/archivos/"+id,
		data:{id:id},
		type:"POST",
		success:function(respuesta){ 
			var registro=JSON.parse(respuesta);
				console.log(registro);
				$("#con_archivos").html();
				html = "";
				if(registro['listado']!=null){ 
					for(var i=0;i<registro['listado'].length;i++){
						html+= "<div class='col-sm-4'>";
						html+= "<a href='<?=base_url("assets/img/archivos")?>/"+registro['listado'][i]["ARC_ARCHIVO"]+"' target='_blanck'><img src='<?=base_url("assets/img/archivos")?>/"+registro['listado'][i]["ARC_ARCHIVO"]+"' class='img-responsive'></a>";
						html+= "</div>";
					}
				}else{
					html+= "<div class='col-sm-12'>";
					html+= "<br><br><h3 class='text-center'>No se tienen Archivos Adjuntos...</h3><br><br>";
					html+= "</div>";
				}
				$("#con_archivos").html(html);
		}
	});
}
//$(document).ready(function(){
	$(".filtrar").change(function(){
		$("#formr").submit();
	});
	$(".filtrarf").blur(function(){
		$("#formr").submit();
	});
	$(".filtrarc").blur(function(){
		$("#formr").submit();
	});
	$("#pdf").click(function(){
		var fei = $("#fechai").val();
		var fef = $("#fechaf").val();
		if($("#codigo").val()!=''){
			var cod = $("#codigo").val();
		} else {
			var cod = 0;	
		}
		var esp = $("#especialidad").val();
		var per = $("#personal").val();
		var con = $("#consultorio").val();
		var hor = $("#horario").val();
		window.open("<?=base_url()?>reportes/pdf_pacientes/"+fei+"/"+fef+"/"+cod+"/"+esp+"/"+per+"/"+con+"/"+hor,"_blank");
	});
//});
</script>


