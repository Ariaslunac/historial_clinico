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
                            <div class="panel-title">INFORMACIÓN CONSULTA</div>
                        </div>
                        <div class="col-xs-push-2 col-xs-2">
                            <a class="btn btn-xs btn-warning pull-right" href="<?=base_url()?>consultas"><b class="glyphicon glyphicon-list"></b> Volver a Listado</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="<?=base_url()?>consultas/guardar_consulta" method="post" role="form" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="id_pac" value="<?=$con->CON_ID?>">
                            <div class="col-xs-12">
                                <div class="alert alert-info">
                                    <p>Paciente: <strong><?=$con->PAC_NOMBRE.' '.$con->PAC_PATERNO.' '.$con->PAC_MATERNO?></strong></p>
                                    <!-- <p>Paciente: <strong><?=$socio->nombre . ' ' . $socio->apellidos?></strong></p> -->
                                    <p>Codigo: <strong><?=$con->PAC_CODIGO?></strong></p>
                                    <p>CI: <strong><?=$con->PAC_CI?></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>I. CONSULTA</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="con_fecha">Fecha Consulta *</label>
                                    <div class='input-group date calendario' >
                                        <input type='text' name="con_fecha" class="form-control" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="con_sintoma">Sintomas *</label>
                                    <textarea name="con_sintoma" class="form-control" rows="3" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="con_tratamiento">Tratamiento *</label>
                                    <textarea name="con_tratamiento" class="form-control" rows="3" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_cita">Fecha Cita *</label>
                                    <div class='input-group date calendario'>
                                        <input type='text' name="fecha_cita" class="form-control" required/>
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
                                <div class="form-group">
                                    <label for="con_diagnostico">Diagnostico *</label>
                                    <textarea name="con_diagnostico" class="form-control" rows="3" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="con_observacion">Observacion *</label>
                                    <textarea name="con_observacion" class="form-control" rows="3" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="hora_cita">Hora Cita *</label>
                                    <div class='input-group date hora'>
                                        <input type='text' name="hora_cita" class="form-control" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                                    <!-- <select name="medico" id="medico" class="form-control">
                                        <option value="">Seccionar una opción</option>
                                        <?php
                                        foreach ($enlaceDesignacion as $des) :
                                        ?>
                                            <option value="<?=$des->DES_ID; ?>"><?=$des->DES_ESTADO; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>  -->  
                  



                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>II. SIGNOS VITALES</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Pulso *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Talla *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">SIG_FRE_CAR *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Peso *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">SIG_PRE_SAN *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>III. PATOLOGIAS</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Nombre Patologia *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Estado Patologia *</label>
                                    <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Descripcion Patologia *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>IV. ESTUDIOS</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Nombre Laboratorio *</label>
                                    <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Estado de Estudio*</label>
                                    <select name="medico" id="medico" class="form-control">
                                        <option value="0">Seccionar una opción</option>
                                        <option value="0">opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Descripcion Laboratorio *</label>
                                    <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros"/>
                                    <div class="help-block with-errors"></div>
                                </div>    
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Estado *</label>
                                    <div class='input-group date calendario'>
                                        <input type='text' name="con_fecha" class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Observacion Estado *</label>
                                    <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                           

                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <h5><strong>V. ARCHIVOS</strong></h5>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group text-center">
                                    <label for="imagen" class="control-label">Adjuntar un archivo</label><br>
                                    <input type="hidden" name="foto" class="PRO_IMG IMG">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 260px; height: 200px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file btn-sm">
                                                <span class="fileinput-new">Seleccionar Archivo</span>
                                                <span class="fileinput-exists">Cambiar</span>
                                                <input type="file" name="imagen" class="upload-imagen">
                                            </span>
                                            <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remover</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">        
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha *</label>
                                    <div class='input-group date calendario'>
                                        <input type='text' name="con_fecha" class="form-control"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        




<div class="row">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  I. CONSULTA
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="con_fecha">Fecha Consulta *</label>
                            <div class='input-group date' id='divMiCalendario'>
                                <input type='text' name="con_fecha" class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="con_sintoma">Sintomas *</label>
                            <textarea name="con_sintoma" class="form-control" rows="3" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="con_tratamiento">Tratamiento *</label>
                            <textarea name="con_tratamiento" class="form-control" rows="3" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_cita">Fecha Cita *</label>
                            <div class='input-group date' id='divMiCalendario1'>
                                <input type='text' name="fecha_cita" class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="con_hora">Hora Consulta *</label>
                            <div class="input-group date" id="datetimepicker">
                                <input type='text' name="con_hora"  class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="con_diagnostico">Diagnostico *</label>
                            <textarea name="con_diagnostico" class="form-control" rows="3" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="con_observacion">Observacion *</label>
                            <textarea name="con_observacion" class="form-control" rows="3" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="hora_cita">Hora Cita *</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' name="hora_cita" class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  II. SIGNOS VITALES
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Pulso *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Talla *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">SIG_FRE_CAR *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Peso *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">SIG_PRE_SAN *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  III. PATOLOGIAS
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Nombre Patologia *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Estado Patologia *</label>
                            <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Descripcion Patologia *</label>
                            <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  IV. ESTUDIOS
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Nombre Laboratorio *</label>
                            <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros"/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Estado de Estudio*</label>
                            <select name="medico" id="medico" class="form-control">
                                <option value="0">Seccionar una opción</option>
                                <option value="0">opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Descripcion Laboratorio *</label>
                            <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros"/>
                            <div class="help-block with-errors"></div>
                        </div>    
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha Estado *</label>
                            <div class='input-group date' id='divMiCalendario2'>
                                <input type='text' name="con_fecha" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Observacion Estado *</label>
                            <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFive">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  V. ARCHIVOS
                </a>
              </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group text-center">
                            <label for="imagen" class="control-label">Adjuntar un archivo</label><br>
                            <input type="hidden" name="foto" class="PRO_IMG IMG">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 260px; height: 200px;"></div>
                                <div>
                                    <span class="btn btn-default btn-file btn-sm">
                                        <span class="fileinput-new">Seleccionar Archivo</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="imagen" class="upload-imagen">
                                    </span>
                                    <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">        
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha *</label>
                            <div class='input-group date' id='divMiCalendario3'>
                                <input type='text' name="con_fecha" class="form-control"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>  
</div>




<div class="row">
    <div class="col-xs-12">
        <h5><strong>CONSULTAS</strong></h5>
    </div>
  <div class="col-xs-12">  
  <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#consul" aria-controls="consul" role="tab" data-toggle="tab">Consulta</a></li>
        <li role="presentation"><a href="#sig_vit" aria-controls="sig_vit" role="tab" data-toggle="tab">Signos Vitales</a></li>
        <li role="presentation"><a href="#patolo" aria-controls="patolo" role="tab" data-toggle="tab">Patologias</a></li>
        <li role="presentation"><a href="#estu" aria-controls="estu" role="tab" data-toggle="tab">Estudios</a></li>
        <li role="presentation"><a href="#arch" aria-controls="arch" role="tab" data-toggle="tab">Archivos</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="consul">
            <div class="panel-body">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="con_fecha">Fecha Consulta *</label>
                        <div class='input-group date' id='divMiCalendario'>
                            <input type='text' name="con_fecha" class="form-control" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="con_sintoma">Sintomas *</label>
                        <textarea name="con_sintoma" class="form-control" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="con_tratamiento">Tratamiento *</label>
                        <textarea name="con_tratamiento" class="form-control" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_cita">Fecha Cita *</label>
                        <div class='input-group date' id='divMiCalendario1'>
                            <input type='text' name="fecha_cita" class="form-control" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="con_hora">Hora Consulta *</label>
                        <div class="input-group date" id="datetimepicker">
                            <input type='text' name="con_hora"  class="form-control" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="con_diagnostico">Diagnostico *</label>
                        <textarea name="con_diagnostico" class="form-control" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="con_observacion">Observacion *</label>
                        <textarea name="con_observacion" class="form-control" rows="3" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="hora_cita">Hora Cita *</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="hora_cita" class="form-control" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div role="tabpanel" class="tab-pane" id="sig_vit">
            <div class="panel-body">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Pulso *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Talla *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">SIG_FRE_CAR *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Peso *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">SIG_PRE_SAN *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>            
        </div>
        <div role="tabpanel" class="tab-pane" id="patolo">
            <div class="panel-body">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Nombre Patologia *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Estado Patologia *</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control letras"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Descripcion Patologia *</label>
                        <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>            
        </div>
        <div role="tabpanel" class="tab-pane" id="estu">
            <div class="panel-body">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Nombre Laboratorio *</label>
                        <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Estado de Estudio*</label>
                        <select name="medico" id="medico" class="form-control">
                            <option value="0">Seccionar una opción</option>
                            <option value="0">opción</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Descripcion Laboratorio *</label>
                        <input type="text" id="ci_paciente" name="ci_paciente" class="form-control numeros"/>
                        <div class="help-block with-errors"></div>
                    </div>    
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Estado *</label>
                        <div class='input-group date' id='divMiCalendario2'>
                            <input type='text' name="con_fecha" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Observacion Estado *</label>
                        <textarea name="ayuda_tecnica" id="ayuda_tecnica" class="form-control" rows="3"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>                
            </div>            
        </div>
        <div role="tabpanel" class="tab-pane" id="arch">
            <div class="panel-body">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group text-center">
                        <label for="imagen" class="control-label">Adjuntar un archivo</label><br>
                        <input type="hidden" name="foto" class="PRO_IMG IMG">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 260px; height: 200px;"></div>
                            <div>
                                <span class="btn btn-default btn-file btn-sm">
                                    <span class="fileinput-new">Seleccionar Archivo</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" name="imagen" class="upload-imagen">
                                </span>
                                <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remover</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">        
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha *</label>
                        <div class='input-group date' id='divMiCalendario3'>
                            <input type='text' name="con_fecha" class="form-control"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>               
        </div>
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
<script type="text/javascript">
$(document).on('ready', function(){
    // upload de imagenes
    $('input.upload-imagen').on('change', function(){
        var img = new FormData($('form.form-datos')[0]);
        console.log(img);
        var url = $('form.form-datos').data('upload');
        console.log(url);
        $.ajax({
            url: url,
            type: 'post',
            data: img,
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp){
                console.log(resp.foto);
                if (resp.foto != 'error') {
                    $('input[name="foto"]').val(resp.foto);
                } else {
                    $('input[name="foto"]').val('');
                }
            },
            error: function (jqXHR, status, error){
                //console.log(jqXHR);
            }
        });
    });
});
</script>
<script type="text/javascript">
    $(function () {
        $('.hora').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
       $('.calendario').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'es'       
        });
        $('.calendario').data("DateTimePicker");
    });
</script>
<style>
</style>

