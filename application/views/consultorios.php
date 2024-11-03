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
                              <h4><i class="fa fa-angle-right"></i> Consultorios<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nuevo</a></h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Codigo</th>
                                  <th class="hidden-phone"><i class="fa fa-asterisk"></i> Numero</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descripción</th>
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
                                  <td><?=$fila->COS_CODIGO?></td>
                                  <td class="hidden-phone"><?=$fila->COS_NRO?></td>
                                  <td><?=$fila->COS_DESC?></td>
                                  <!--<td><?=$fila->COS_ESTADO?></td>-->
                                  <!--<td><span class="label label-success label-mini"><?=$fila->USU_TIPO?></span></td>-->
                                  <td>
                                      <button class="btn btn-primary" onClick="modificar('consultorios','<?=$fila->COS_ID?>')"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger eliminar" id="<?=$fila->COS_ID?>" name="consultorios" title="<?=$fila->COS_NRO?>"><i class="fa fa-trash-o "></i></button>
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
                    <h1 class="modal-title"><i class="glyphicon glyphicon-user"></i> Registro Consultorio</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url();?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Codigo:</label>
                            <div class="col-sm-6">
                            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo de Consultorio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Numero:</label>
                            <div class="col-sm-6">
                            <input type="number" name="nro" id="nro" class="form-control" placeholder="Numero de Consultorio" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Descripción:</label>
                            <div class="col-sm-6">
                            <textarea name="desc" id="desc" class="form-control" placeholder="Descripcion de Consultorio"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Estado:</label>
                            <div class="col-sm-7">
                            <select name="estado" id="estado" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            </div>	
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>	
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>	
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="consultorios">
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
			$('#codigo').val(datos['COS_CODIGO']);
			$('#nro').val(datos['COS_NRO']);
			$('#desc').val(datos['COS_DESC']);
			$('#estado').val(datos['COS_ESTADO']);
		}
	});
}
</script>

