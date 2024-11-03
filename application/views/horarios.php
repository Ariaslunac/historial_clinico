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
                  <!--<div class="col-sm-12"><h4><i class="fa fa-angle-right"></i> Usuarios<button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</button></h4></div>-->
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table id="table1" class="table table-striped table-bordered table-advance table-hover" cellspacing="0" width="100%">
	                  	  	  <!--<div class="col-sm-6"><h4><i class="fa fa-angle-right"></i> Usuarios</h4></div>
                              <div class="col-sm-6"><button class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Nuevo</button></div>-->
                              <h4><i class="fa fa-angle-right"></i> Horario<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nuevo</a></h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Turno</th>
                                  <th class="hidden-phone"><i class="fa fa-asterisk"></i> Desde</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Hasta</th>
                                  <!--<th class="hidden-phone"><i class="fa fa-check-square-o"></i> Estado</th>-->
                                  <!--<th><i class="fa fa-bookmark"></i> Profit</th>-->
                                  <!--<th><i class=" fa fa-edit"></i> Tipo</th>-->
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php if(!empty($listado)){ 
							  foreach($listado as $fila):
							  ?>
                              <tr>
                                  <td><?=$fila->HOR_TURNO?></td>
                                  <td class="hidden-phone"><?=$fila->HOR_DESDE?></td>
                                  <td><?=$fila->HOR_HASTA?></td>
                                  <!--<td><?=$fila->COS_ESTADO?></td>-->
                                  <!--<td><span class="label label-success label-mini"><?=$fila->USU_TIPO?></span></td>-->
                                  <td>
                                      <button class="btn btn-primary" onClick="modificar('horarios','<?=$fila->HOR_ID?>')"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger eliminar" id="<?=$fila->HOR_ID?>" name="horarios" title="<?=$fila->HOR_TURNO?>"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                              <?php endforeach; } ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div>
          </section>
      </section>
    <div class="modal fade" id="ventana">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h1 class="modal-title"><i class="glyphicon glyphicon-user"></i> Registro Horario</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url();?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Turno:</label>
                            <div class="col-sm-6">
                            <input type="text" name="turno" id="turno" class="form-control" placeholder="Turno de Atención" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Desde:</label>
                            <div class="col-sm-6">
                                <div class='input-group date hora'>
                                    <input type='text' name="desde" id="desde" class="form-control hora" required readonly/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            	<!--<input type="time" name="desde" id="desde" class="form-control" placeholder="Numero de Consultorio" required>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Hasta:</label>
                            <div class="col-sm-6">
                                <div class='input-group date hora'>
                                    <input type='text' name="hasta" id="hasta" class="form-control hora" required readonly/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            	<!--<input type="time" name="desde" id="desde" class="form-control" placeholder="Numero de Consultorio" required>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Dias:</label>
                            <div class="col-sm-7">
                            <input type="checkbox" name="lunes" id="lunes" value="1">&nbsp;Lunes<br>
                            <input type="checkbox" name="martes" id="martes" value="1">&nbsp;Martes<br>
                            <input type="checkbox" name="miercoles" id="miercoles" value="1">&nbsp;Miercoles<br>
                            <input type="checkbox" name="jueves" id="jueves" value="1">&nbsp;Jueves<br>
                            <input type="checkbox" name="viernes" id="viernes" value="1">&nbsp;Viernes<br>
                            <input type="checkbox" name="sabado" id="sabado" value="1">&nbsp;Sabado<br>
                            <input type="checkbox" name="domingo" id="domingo" value="1">&nbsp;Domingo
                            </div>	
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>	
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>	
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="horarios">
                            <input type="hidden" name="op" id="op" value="nuevo">
                        </div>
                    </form>	  
                </div>
            </div>
        </div>
    </div>
      <?php $this->load->view('includes/footer.php')?>
  </section>
  </body>
</html>
<?php $this->load->view('includes/scripts.php')?>
<script language="javascript">
function modificar(con,id){ 
	$("#ventana").modal("show"); 
	$.ajax({
		url:"<?=base_url();?>"+con+"/datos/"+id,
		data:{id:id},
		type:"POST",
		success:function(respuesta){ //alert(respuesta);
			var datos=JSON.parse(respuesta);
			console.log(datos);
			$('#id').val(id);
			$('#op').val("modificar");
			$('#turno').val(datos['HOR_TURNO']);
			$('#desde').val(datos['HOR_DESDE']);
			$('#hasta').val(datos['HOR_HASTA']);
			$('#lunes').attr("checked",datos['HOR_LUNES']);
			$('#martes').attr("checked",datos['HOR_MARTES']);
			$('#miercoles').attr("checked",datos['HOR_MIERCOLES']);
			$('#jueves').attr("checked",datos['HOR_JUEVES']);
			$('#viernes').attr("checked",datos['HOR_VIERNES']);
			$('#sabado').attr("checked",datos['HOR_SABADO']);
			$('#domingo').attr("checked",datos['HOR_DOMINGO']);
		}
	});
}
</script>

