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

                              <h4><i class="fa fa-angle-right"></i> Estadistica de Consultas<!--<a class="btn btn-info pull-right" href="#" id="pdf"><i class="fa fa-file-pdf-o"></i> Imprimir</a>--></h4><br>
		<form name="formr" id="formr" action="<?=base_url();?>estadisticas/consultas" method="POST">
        <div class="row form-group">
            <label for="fecha" class="col-sm-1">Gestión:</label>
			<div class="col-sm-5 form-inline">
            <?php if($_POST){ 
                $anio = $_POST["anio"];
                } else {
                $anio = date("Y");
            } $fechai=$this->estadistica->consultas_min(); $fei=explode("-",$fechai->CON_FECHA); ?>
            <select name="anio" id="anio" class="form-control filtrar">
            	<?php for($i=$fei[0];$i<=date("Y");$i++){ ?>
                <option value="<?=$i?>" <?php if($anio==$i){ ?>selected<?php } ?>><?=$i?></option>
                <?php } ?>
            </select>
			</div>
        </div>
		<div class="row form-group">
			<label for="Especialidad" class="col-sm-1">Especialidad:</label>
			<div class="col-sm-5">
			<select name="especialidad" id="especialidad" class="form-control filtrar">
				<option value="0">Seleccione una Especialidad...</option>
			<?php 
			if(!empty($especialidad)){
			foreach($especialidad as $fila): 
			if($_POST){ $esp = $_POST["especialidad"]; } else { $esp=0; }
			?>
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
			foreach($personal as $fila): 
			if($_POST){ $per = $_POST["personal"]; } else { $per=0; }
			?>
				<option value="<?php echo $fila->PER_ID ?>" <?php if($_POST){ if($_POST["personal"]==$fila->PER_ID){ ?>selected="selected"<?php }} else { $per=0; } ?>><?php echo $fila->PER_NOMBRE." ".$fila->PER_PATERNO." ".$fila->PER_MATERNO ?></option>
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
			foreach($consultorio as $fila): 
			if($_POST){ $con = $_POST["consultorio"]; } else { $con=0; }
			?>
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
			foreach($horario as $fila): 
			if($_POST){ $hor = $_POST["horario"]; } else { $hor=0; }
			?>
				<option value="<?php echo $fila->HOR_ID ?>" <?php if($_POST){ if($_POST["horario"]==$fila->HOR_ID){ ?>selected="selected"<?php }} ?>><?php echo $fila->HOR_TURNO." ".$fila->HOR_DESDE." - ".$fila->HOR_HASTA ?></option>
			<?php $i++; endforeach; } ?>
			</select>
			</div>
		</div>
		</form>

                      <!--<div class="row mt">
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>1000</span></li>
                              <li><span>800</span></li>
                              <li><span>600</span></li>
                              <li><span>400</span></li>
                              <li><span>200</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <?php 
						  for($i=1;$i<=12;$i++){ 
						  $num = $this->estadistica->consultas($anio,$i,0,0,0,0,0);
						  ?>
                          <div class="bar">
                              <div class="title"><?=mes($i)?></div>
                              <div class="value tooltips" data-original-title="<?=$num?>" data-toggle="tooltip" data-placement="top"><?=$num?></div>
                          </div>
                          <?php } ?>
                      </div>
					</div>-->
        <script src="<?php echo base_url('assets/js/Chart.js');?>"></script>
        <div id="canvas-holder">
        <canvas id="chart-area" style="max-height:600px"></canvas>
        </div>
        <script>
        var barChartData = {
                labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                datasets : [
                    {
                        fillColor : "#6b9dfa",
                        strokeColor : "#ffffff",
                        highlightFill: "#1864f2",
                        highlightStroke: "#ffffff",
                        data : [
						<?php
						for($i=1;$i<=12;$i++){
							if($i>1){ echo ","; }
							echo $this->estadistica->consultas($anio,$i,0,$esp,$per,$con,$hor);
						}
						?>
						]
                    }/*,
                    {
                        fillColor : "#e9e225",
                        strokeColor : "#ffffff",
                        highlightFill : "#ee7f49",
                        highlightStroke : "#ffffff",
                        data : [40,50,70,40,85,55,15]
                    },
                    {
                        fillColor : "#e9e225",
                        strokeColor : "#ffffff",
                        highlightFill : "#ee7f49",
                        highlightStroke : "#ffffff",
                        data : [40,50,70,40,85,55,15]
                    }*/
                ]
        
            }
        
            
        var ctx3 = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});	
        /*window.myPie = new Chart(ctx2).Doughnut(pieData);				
        window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
        window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});*/
        </script>

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


