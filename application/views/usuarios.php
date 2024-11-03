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
                              <h4><i class="fa fa-angle-right"></i> Usuarios<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nuevo</a></h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Personal</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Codigo</th>
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
                                  <td><a href="#"><?=$fila->PER_NOMBRE." ".$fila->PER_PATERNO." ".$fila->PER_MATERNO?></a></td>
                                  <td class="hidden-phone"><?=$fila->USU_CODIGO?></td>
                                  <!--<td>12000.00$ </td>-->
                                  <!--<td><span class="label label-success label-mini"><?=$fila->USU_TIPO?></span></td>-->
                                  <td>
                                      <button class="btn btn-primary" onClick="modificar('usuarios','<?=$fila->USU_ID?>')"><i class="fa fa-pencil"></i></button>
                                      <?php if($this->session->userdata("id")!=$fila->USU_ID){ ?><button class="btn btn-danger eliminar" id="<?=$fila->USU_ID?>" name="usuarios" title="<?=$fila->USU_CODIGO?>"><i class="fa fa-trash-o "></i></button><?php } ?>
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
                    <h1 class="modal-title"><i class="glyphicon glyphicon-user"></i> Registro Usuario</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url();?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Personal:</label>
                            <div class="col-sm-9">
                            <select name="personal" id="personal" class="form-control">
								<?php
                                    if(!empty($listadop)){
                                        foreach($listadop as $fila): ?>
                                        <option value="<?=$fila->PER_ID?>"><?=$fila->PER_NOMBRE.' '.$fila->PER_PATERNO?></option>
                                <?php endforeach; } ?>
								<?php 
                                /*if(!empty($listadop)){
                                foreach($listadop as $fila): ?>
                                    <option value="<?php echo $fila->DES_ID ?>"><?php echo $fila->PER_NOMBRE." ".$fila->PER_PATERNO." ".$fila->PER_MATERNO. " - Consultorio: ". $fila->COS_NRO. " - ". $fila->HOR_DESDE . " a " . $fila->HOR_HASTA ?></option>
                                <?php $i++; endforeach; }*/ ?>
                            </select>
                            </div>	
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Usuario:</label>
                            <div class="col-sm-6">
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre de Usuario:"  onclick="javascript: limpiar_campo(this);">
                            <input type="hidden" name="usuariov" id="usuariov" class="form-control" placeholder="Nombre de Usuario:"  onclick="javascript: limpiar_campo(this);" required>
                            </div>
                        </div>
                        <div class="form-group row">	
                            <label for="item" class="col-sm-3">Password:</label>
                            <div class="col-sm-6">
                            <input type="password" name="pasword" id="pasword" class="form-control" placeholder="Contrase&ntilde;a:"  onclick="javascript: limpiar_campo(this);" required onKeyUp="muestra_seguridad_clave(this.value, this.form)">
                            <!--<i>seguridad:</i> <input name="seguridad" type="text" style="border: 0px; background-color:ffffff; text-decoration:italic;" onFocus="blur()">
                            <em style="font-size:9px; font-weight:bold">Dede ingresar letras,letras MAYUSCULAS, Numeros. En un minimo de 9 caracteres.</em>-->
                            <input type="hidden" name="paswordc" id="paswordc" class="form-control" placeholder="Contrase&ntilde;a:"  onclick="javascript: limpiar_campo(this);" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Tipo:</label>
                            <div class="col-sm-7">
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="1">Administrador</option>
                                <option value="2">Estadística</option>
                                <option value="3">Medico</option>
                            </select>
                            </div>	
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>	
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>	
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="usuarios">
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
			$('#personal').val(datos['PER_ID']);
			$('#usuario').val(datos['USU_CODIGO']);
			$('#usuariov').val(datos['USU_CODIGO']);
			$('#pasword').val(datos['USU_CLAVE']);
			$('#paswordc').val(datos['USU_CLAVE']);
			$('#tipo').val(datos['USU_TIPO']);
		}
	});
}
/*$("#tipo").change(function(){
	if($(this).val()==1){
		$("#personal").val(0);
		$("#personal").attr("readonly",true);
	} else {
		$("#personal").attr("readonly",false);
	}
});*/
</script>

