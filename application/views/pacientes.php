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
                              <h4><i class="fa fa-angle-right"></i> Pacientes<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nuevo</a></h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Codigo</th>
                                  <th class="hidden-phone"><i class="fa fa-asterisk"></i> Nombre</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> C.I.</th>
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
                                  <td><?=$fila->PAC_CODIGO?></td>
                                  <td class="hidden-phone"><?=$fila->PAC_NOMBRE." ".$fila->PAC_PATERNO." ".$fila->PAC_MATERNO?></td>
                                  <td><?=$fila->PAC_CI?></td>
                                  <!--<td><?=$fila->PAC_ESTADO?></td>-->
                                  <!--<td><span class="label label-success label-mini"><?=$fila->USU_TIPO?></span></td>-->
                                  <td>
                                      <button class="btn btn-primary" onClick="modificar('pacientes','<?=$fila->PAC_ID?>')"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger eliminar" id="<?=$fila->PAC_ID?>" name="pacientes" title="<?=$fila->PAC_NOMBRE." ".$fila->PAC_PATERNO." ".$fila->PAC_MATERNO?>"><i class="fa fa-trash-o "></i></button>
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
                    <h1 class="modal-title"><i class="glyphicon glyphicon-user"></i> Registro Paciente</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url();?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Codigo:</label>
                            <div class="col-sm-6">
                            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo de Paciente">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Nombre:</label>
                            <div class="col-sm-3">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre(s)" required>
                            </div>
                            <div class="col-sm-3">
                            <input type="text" name="paterno" id="paterno" class="form-control" placeholder="A.Paterno" required>
                            </div>
                            <div class="col-sm-3">
                            <input type="text" name="materno" id="materno" class="form-control" placeholder="A.Materno" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">C.I.:</label>
                            <div class="col-sm-5">
                            <input type="text" name="ci" id="ci" class="form-control" placeholder="Cedula de Identidad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Fecha/Nacimiento:</label>
                            <div class="col-sm-5">
                                <div class='input-group date fecha'>
                                    <input type='text' name="fechan" id="fechan" class="form-control fecha" readonly required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Sexo:</label>
                            <div class="col-sm-6">
                            <input type="radio" name="sexo" id="sexo1" value="1" required>&nbsp;Masculino
                            <input type="radio" name="sexo" id="sexo0" value="0" required>&nbsp;Femenino
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Estado Civil:</label>
                            <div class="col-sm-6">
                            <input type="radio" name="ecivil" id="ecivil1" value="1" required>&nbsp;Solter@
                            <input type="radio" name="ecivil" id="ecivil2" value="2" required>&nbsp;Casad@
                            <input type="radio" name="ecivil" id="ecivil3" value="3" required>&nbsp;Viud@
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Telefono:</label>
                            <div class="col-sm-5">
                            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Ocupacion:</label>
                            <div class="col-sm-9">
                            <input type="text" name="ocupacion" id="ocupacion" class="form-control" placeholder="ocupacion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Dirección:</label>
                            <div class="col-sm-9">
                            <textarea name="direccion" id="direccion" class="form-control" placeholder="Dirección domiciliaria"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Nombre:</label>
                            <div class="col-sm-9">
                            <input type="text" name="rnombre" id="rnombre" class="form-control" placeholder="Nombre(s) y Apellido(s)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Parentesco:</label>
                            <div class="col-sm-9">
                            <input type="text" name="rparentesco" id="rparentesco" class="form-control" placeholder="Parentesco">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item" class="col-sm-3">Telefono:</label>
                            <div class="col-sm-5">
                            <input type="number" name="rtelefono" id="rtelefono" class="form-control" placeholder="Telefono">
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
                            <input type="hidden" name="con" id="con" value="pacientes">
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
			$('#codigo').val(datos['PAC_CODIGO']);
			$('#nombre').val(datos['PAC_NOMBRE']);
			$('#paterno').val(datos['PAC_PATERNO']);
			$('#materno').val(datos['PAC_MATERNO']);
			$('#ci').val(datos['PAC_CI']);
			$('#fechan').val(datos['PAC_FECHAN']);
			$('#sexo'+datos['PAC_SEXO']).attr("checked",true);
			$('#ecivil'+datos['PAC_ECIVIL']).attr("checked",true);
			$('#telefono').val(datos['PAC_TELEFONO']);
			$('#ocupacion').val(datos['PAC_OCUPACION']);
			$('#direccion').val(datos['PAC_DIRECCION']);
			$('#rnombre').val(datos['PAC_RNOMBRE']);
			$('#rparentesco').val(datos['PAC_RPARENTESCO']);
			$('#rtelefono').val(datos['PAC_RTELEFONO']);
			$('#estado').val(datos['PAC_ESTADO']);
		}
	});
}
</script>

