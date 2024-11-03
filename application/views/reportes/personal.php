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

                          <table id="table1" class="table table-striped table-bordered table-advance table-hover" cellspacing="0" width="100%">

                              <h4><i class="fa fa-angle-right"></i> Reporte de personal<a class="btn btn-info pull-right" href="#" id="pdf"><i class="fa fa-print"></i> Imprimir</a></h4><br>
		<form name="formr" id="formr" action="<?=base_url();?>reportes/personal" method="POST">
		<div class="row form-group">
			<label for="Paciente" class="col-sm-1">Personal:</label>
			<div class="col-sm-5">
			<input type="text" name="codigo" id="codigo" class="form-control filtrarc" placeholder="Codigo de Personal" value="<?php if($_POST){ echo $_POST["codigo"];} ?>">
			</div>
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
	                  	  	  
                              <thead>
                              <tr>
                                  <th>Codigo</th>
                                  <th>Nombre</th>
                                  <th>C.I.</th>
                                  <th>Telefono</th>
                                  <th>Email</th>
                                  <th>Especialidad</th>
                                  <th>Consultorio</th>
                                  <th>Horario</th>
                                  <th><div align="center">Imprimir</div></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($listado as $consul) : ?>

                              <tr>
                                  <td><?=$consul->PER_CODIGO?></td>
                                  <td><?=$consul->PER_NOMBRE . ' ' . $consul->PER_PATERNO . ' ' . $consul->PER_MATERNO?></td>
                                  <td><?=$consul->PER_CI?></td>
                                  <td><?=$consul->PER_TELEFONO?></td>                
                                  <td><?=$consul->PER_EMAIL?></td>
                                  <td><?=$consul->ESP_NOMBRE?></td>
                                  <td><?=$consul->COS_NRO." ".$consul->COS_DESC?></td>
                                  <td><?=$consul->HOR_TURNO." ".$consul->HOR_DESDE." - ".$consul->HOR_HASTA?></td>
                                  <td align="center"><a href="<?=base_url()?>reportes/pdf_personal/0/0/0/0/<?=$consul->PER_ID;?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a></td>
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
  </body>
</html>
<?php $this->load->view('includes/scripts.php')?>
<script language="javascript">
//$(document).ready(function(){
	$(".filtrar").change(function(){
		$("#formr").submit();
	});
	$(".filtrarc").blur(function(){
		$("#formr").submit();
	});
	$("#pdf").click(function(){
		if($("#codigo").val()!=''){
			var cod = $("#codigo").val();
		} else {
			var cod = 0;	
		}
		var esp = $("#especialidad").val();
		var con = $("#consultorio").val();
		var hor = $("#horario").val();
		window.open("<?=base_url()?>reportes/pdf_personal/"+cod+"/"+esp+"/"+con+"/"+hor,"_blank");
	});
//});
</script>


