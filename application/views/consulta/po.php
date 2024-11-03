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



            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="panel-title">Paciente</div>
                        </div>
                        <div class="col-xs-push-2 col-xs-2">
                            <a class="btn btn-xs btn-warning pull-right" href="<?=base_url()?>consultas"><b class="glyphicon glyphicon-list"></b> Volver a Listado</a>
                        </div>
                    </div>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <form class="panel-body form-datos-paciente"  action="" method="post" role="form">
                        <div class="row">
                            <input type="hidden" name="id" value="<?=$con->CON_ID?>">
                            <div class="col-xs-12">
                                <div class="alert alert-info">
                                    <p>Paciente: <strong><?=$con->PAC_NOMBRE.' '.$con->PAC_PATERNO.' '.$con->PAC_MATERNO?></strong></p>
                                    <!-- <p>Paciente: <strong><?=$socio->nombre . ' ' . $socio->apellidos?></strong></p> -->
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <h5><strong>I. DATOS PERSONALES</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-7">
                                <div class="form-group">
                                    <label for="nombre_paciente">Nombre del Paciente *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="apellidos_paciente">Apellidos del Paciente *</label>
                                    <input type="text" id="apellidos_paciente" name="apellidos_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="ci_paciente">Nro de Carnet de Identidad *</label>
                                    <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fono_paciente">Télefono</label>
                                    <input type="text" id="fono_paciente" name="fono_paciente" class="form-control numeros"/>
                                </div>
                                <div class="form-group">
                                    <label for="domicilio_paciente">Domicilio</label>
                                    <input type="text" id="domicilio_paciente" name="domicilio_paciente" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="ocupacion_paciente">Ocupación</label>
                                    <input type="text" id="ocupacion_paciente" name="ocupacion_paciente" class="form-control letras"/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <div class="form-group">
                                    <label for="con_fecha">Fecha Consulta</label>
                                    <div class='input-group date' id='divMiCalendario'>
                                        <input type='text' name="con_fecha" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="con_hora">Hora Consulta</label>
                                    <div class='input-group date' id='datetimepicker3'>
                                        <input type='text' name="con_hora" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Observacion *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="estado_civil">Estado Civil *</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="estado_civil" value="S" required/> Soltero (a)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="estado_civil" value="C" required/> Casado (a)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="estado_civil" value="D" required/> Divorciado (a)
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="estado_civil" value="V" required/> Viudo (a)
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="habitacion">Selleccion</label>
                                    <select name="medico" id="medico" class="form-control">
                                        <option value="0">Seccionar una opción</option>
                                        <option value="0">opción</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>I. CONSULTA</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Consulta *</label>
                                    <div class='input-group date' id='divMiCalendario'>
                                        <input type='text' name="con_fecha" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Sintomas *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Tratamiento *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Hora Consulta *</label>
                                    <div class='input-group date' id='datetimepicker3'>
                                        <input type='text' name="con_hora" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Diagnostico *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Observacion *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>V. CITA</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Cita *</label>
                                    <div class='input-group date' id='divMiCalendario'>
                                        <input type='text' name="con_fecha" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Hora Cita *</label>
                                    <div class='input-group date' id='datetimepicker3'>
                                        <input type='text' name="con_hora" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>II. SIGNOS VITALES</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Pulso *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Talla *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">SIG_FRE_CAR *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Peso *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">SIG_PRE_SAN *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>III. ESTUDIOS</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Nombre Laboratorio *</label>
                                    <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros" required="required"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Estado *</label>
                                    <select name="medico" id="medico" class="form-control">
                                        <option value="0">Seccionar una opción</option>
                                        <option value="0">opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label for="fecha_nacimiento">Descripcion Laboratorio *</label>
                                    <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros" required="required"/>
                                    <div class="help-block with-errors"></div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Estado *</label>
                                    <div class='input-group date' id='divMiCalendario'>
                                        <input type='text' name="con_fecha" class="form-control" readonly/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Observacion *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                           

                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>IV. ARCHIVOS</strong></h5>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Diagnostico *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn bnt-sm btn-warning"><b class="glyphicon glyphicon-save"></b> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



                      </div><!-- contenido fin-->
                  </div>
              </div>
          </section>
      </section>
    <?php $this->load->view('includes/footer.php')?>
  </section>
</body>
</html>
<?php $this->load->view('includes/scripts.php')?>


