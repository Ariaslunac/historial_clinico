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
                              <h4><i class="fa fa-angle-right"></i> Lista Consulta<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nueva Consulta</a></h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Nombre Paciente</th>
                                  <th>CI</th>
                                  <th>CODIGO</th>
                                  <th>ASUNTO</th>
                                  <th>OPERACIONES</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($listar as $consul) : ?>
                              <tr>
                                  <td><?=$consul->PAC_NOMBRE . ' ' . $consul->PAC_PATERNO . ' ' . $consul->PAC_MATERNO?></td>
                                  <td><?=$consul->PAC_CI?></td>
                                  <td><?=$consul->PAC_CODIGO?></td>
                                  <td><?=$consul->ESP_NOMBRE?></td>
                                  <td>
                                      <a href="<?=base_url()?>consultas/nueva/<?=$consul->CON_ID.'/'.$consul->PAC_ID.'/'.$consul->DES_ID?>" class="btn btn-success"><i class="fa fa-pencil"></i> Editar Consulta</a>
                                      <button class="btn btn-danger eliminar" id="<?=$consul->CON_ID?>" name="consultas" title="<?=$consul->PAC_NOMBRE . ' ' . $consul->PAC_PATERNO . ' ' . $consul->PAC_MATERNO?>"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>
                          </table>

                      </div><!-- fin contenido inicio-->
                  </div>
              </div>
          </section>
      </section>
      <!-- Modal inicio -->
      <div class="modal fade" id="ventana">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h1 class="modal-title"><i class="glyphicon glyphicon-plus"></i> Registro Consulta</h1>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-xs-12">
                              <h5><strong>CONSULTAS</strong></h5>
                          </div>
                        <div class="col-xs-12">
                          <form id="form" role="form"  action="<?=base_url();?>" method="POST">
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="well">
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12">
                                                <label for="paciente">Nombre Paciente</label>
                                                <div class="input-group">
                                                  <select name="paciente" id="paciente" class="form-control" required>
                                                      <option value="">Seccionar un Paciente</option>
                                                      <?php
                                                      foreach ($enlacePaciente as $fun) :
                                                      ?>
                                                          <option value="<?=$fun->PAC_ID; ?>"><?=$fun->PAC_NOMBRE.' '.$fun->PAC_PATERNO.' '.$fun->PAC_MATERNO.' - '.$fun->PAC_CI?></option>
                                                      <?php
                                                      endforeach;
                                                      ?>
                                                  </select>
                                                  <span class="input-group-btn">
                                                    <a class="btn btn-primary" data-toggle='modal' href="#ventana_paciente"><i class="fa fa-plus"></i> Nuevo Paciente</a>
                                                  </span>
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <label for="con_fecha">Fecha Consulta *</label>
                                          <div class='input-group date calendario'>
                                              <input type='text' name="con_fecha" class="form-control" required/>
                                              <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <label for="con_hora">Hora Consulta *</label>
                                          <div class="input-group date hora">
                                              <input type='text' name="con_hora"  class="form-control" required/>
                                              <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-time"></span>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="pull-right">
                                          <div id="mensaje"></div>
                                          <br>
                                          <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button> 
                                          <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>  
                                          <input type="hidden" name="id" id="id">
                                          <input type="hidden" name="con" id="con" value="consultas">
                                          <input type="hidden" name="op" id="op" value="nueva_consulta">
                                      </div>
                                  </div>
                              </div>
                          </form>
                        </div> 
                      </div>      
                  </div>
              </div>
          </div>
      </div>
      <!-- modal fin -->
      <!-- Modal inicio paciente -->
      <div class="modal fade" id="ventana_paciente">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h1 class="modal-title"><i class="glyphicon glyphicon-plus"></i> Registro Nuevo Paciete</h1>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-12">
                          <form class="form-datos-paciente" action="<?=base_url()?>pacientesx/agregarPac" method="post">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-4">
                                      <div class="form-group">
                                          <label for="nombre">Nombre *</label>
                                            <input type='text' name="nombre" class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="cod">Codigo *</label>
                                            <input type='text' name="cod" class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="estado_civil">Estado Civil *</label>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="estado_civil" value="C" required/> Casado (a)
                                              </label>
                                          </div>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="estado_civil" value="V" required/> Viudo (a)
                                              </label>
                                          </div>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="estado_civil" value="S" required/> Soltero (a)
                                              </label>
                                          </div>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="estado_civil" value="D" required/> Divorciado (a)
                                              </label>
                                              <div class="help-block with-errors"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-4">
                                      <div class="form-group">
                                          <label for="paterno">Paterno *</label>
                                            <input type='text' name="paterno"  class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="ci">Carnet de Identidad *</label>
                                            <input type='text' name="ci" class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="sexo">Sexo *</label>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="sexo" value="H" required/> Hombre (a)
                                              </label>
                                          </div>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="sexo" value="M" required/> Mujer (a)
                                              </label>
                                          </div>                                 
                                      </div>
                                      <div class="form-group">
                                          <label for="dir">Direccion *</label>
                                            <input type='text' name="dir"  class="form-control" required/>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-4">
                                      <div class="form-group">
                                          <label for="materno">Materno *</label>
                                            <input type='text' name="materno"  class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="fecha_nac">Fecha Nacimiento *</label>
                                          <div class='input-group date calendario'>
                                              <input type='text' name="fecha_nac" class="form-control" required/>
                                              <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                              </span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="ocupacion">Ocupacion *</label>
                                            <input type='text' name="ocupacion"  class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="tel">Telefono *</label>
                                            <input type='text' name="tel"  class="form-control" required/>
                                      </div>
                                      <div class="form-group">
                                          <label for="estado">Estado *</label>
                                          <select class="select-simple form-control" name="estado" required>
                                                  <option value="">Seleccione Estado</option>
                                                  <option value="1">Activo</option>
                                                  <option value="2">Cancelado</option>
                                          </select>
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="pull-right">
                                          <div id="mensaje"></div>
                                          <br>
                                          <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button> 
                                          <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>  
                                          <input type="hidden" name="id" id="id">
                                          <input type="hidden" name="con" id="con" value="consultas">
                                          <input type="hidden" name="op" id="op" value="nueva_consulta">
                                      </div>
                                  </div>
                              </div>
                          </form>
                        </div> 
                      </div>      
                  </div>
              </div>
          </div>
      </div>
      <!-- modal fin -->
  <?php $this->load->view('includes/footer.php')?>
  </section>
  </body>
</html>
<?php $this->load->view('includes/scripts.php')?>