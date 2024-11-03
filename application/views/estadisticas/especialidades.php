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

                              <h4><i class="fa fa-angle-right"></i> Estadistica de Especialidades<!--<a class="btn btn-info pull-right" href="#" id="pdf"><i class="fa fa-file-pdf-o"></i> Imprimir</a>--></h4><br>
		<form name="formr" id="formr" action="<?=base_url();?>estadisticas/especialidades" method="POST">
        <div class="row form-group">
            <label for="fecha" class="col-sm-1">Gestión:</label>
			<div class="col-sm-2 form-inline">
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
            <label for="mes" class="col-sm-1">Mes:</label>
			<div class="col-sm-2 form-inline">
            <?php if($_POST){ 
                $mes = $_POST["mes"];
                } else {
                $mes = date("m");
            } ?>
            <select name="mes" id="mes" class="form-control filtrar">
            	<option value="0">Todos</option>
				<?php for($i=1;$i<=12;$i++){ ?>
                <option value="<?=$i?>" <?php if($mes==$i){ ?>selected<?php } ?>><?=mes($i)?></option>
                <?php } ?>
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
        <div style="height:300px">
        <div class="col-sm-6">
        Especialidad:
        <p>
        <?php $c=1; foreach($listado as $fila): ?>
        <i style="background-color:<?=color($c,1);?>">&nbsp;&nbsp;&nbsp;</i> <strong></strong> <?=$fila->ESP_NOMBRE?><br>
        <?php $c++;endforeach; ?>
        <!--<i style="background-color:#e3e860;">&nbsp;&nbsp;&nbsp;</i> <strong></strong> Transferencia<br>
        <i style="background-color:#eb5d82;">&nbsp;&nbsp;&nbsp;</i> <strong></strong> Solicitud<br>-->
        </p>
        </div>
        <div class="col-sm-6 text-center">
        <?php 
        /*$c=1; $c1=0;$c2=0;$c3=0;
        if(!empty($listado)){
        foreach($listado as $fila): 
			$c1++; $c1.$c = $fila->ESP_NOMBRE; $c1.$c = "#".$c."b82e7"; $c1.$c = "#".$c."c62ab";
         /*} else if($fila->tipoasignacion==2){
            $c2++; $cn2 = "<strong>Transferencia</strong>"; $cc12 = "#e3e860"; $cc22 = "#a9ad47";
         } else if($fila->tipoasignacion==3){
            $c3++; $cn3 = "<strong>Solicitud</strong>"; $cc13 = "#eb5d82"; $cc23 = "#b74865";
         }
            $cn1 = $fila->ESP_NOMBRE; $cc11 = "#0b82e7"; $cc21 = "#0c62ab";
            /*$cn2 = "Transferencia"; $cc12 = "#e3e860"; $cc22 = "#a9ad47";
            $cn3 = "Solicitud"; $cc13 = "#eb5d82"; $cc23 = "#b74865";
         $c++; endforeach; }*/
        ?>
<script src="<?php echo base_url('assets/js/Chart.js');?>"></script>
<div id="canvas-holder">
<canvas id="chart-area" width="300" height="300"></canvas>
</div>
<script>
var pieData = [
				<?php
				$c=1;
				foreach($listado as $fila):
					if($c>1){ echo ","; }
					//echo $this->estadistica->consultas($anio,$i,0,$esp,$per,$con,$hor);
				?>
				{
					value: <?php echo $this->estadistica->consultas($anio,$mes,0,$fila->ESP_ID,$per,$con,$hor); ?>,
					color:"<?=color($c,1); ?>",
					highlight: "<?=color($c,2); ?>",
					label: "<?php echo $fila->ESP_NOMBRE; ?>"
				}
				<?php $c++; endforeach; ?>
				/*,
				{
					value: <?php echo $c2; ?>,
					color:"<?php echo $cc12; ?>",
					highlight: "<?php echo $cc22; ?>",
					label: "<?php echo $cn2; ?>"
				},
				{
					value: <?php echo $c3; ?>,
					color:"<?php echo $cc13; ?>",
					highlight: "<?php echo $cc23; ?>",
					label: "<?php echo $cn3; ?>"
				}*/
			];
	
var ctx = document.getElementById("chart-area").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);	
/*window.myPie = new Chart(ctx2).Doughnut(pieData);				
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});*/
</script>
				</div>
        </div>

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


