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
                    
                        
                        
                        


<div class="row">
    <div class="col-xs-12">
        <h5><strong>CONSULTAS</strong></h5>
    </div>
  <div class="col-xs-12">  
  <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#consul" aria-controls="consul" role="tab" data-toggle="tab">Consulta</a></li>
        <li role="presentation"><a href="#diagnost" aria-controls="diagnost" role="tab" data-toggle="tab">Diagnosticos</a></li>
        <li role="presentation"><a href="#estu" aria-controls="estu" role="tab" data-toggle="tab">Estudios</a></li>
        <li role="presentation"><a href="#arch" aria-controls="arch" role="tab" data-toggle="tab">Archivos</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">


        <div role="tabpanel" class="tab-pane active" id="consul">
            <div class="panel-body">

            <form action="<?=base_url()?>consultas/guardar_consultas" class="form-datos" method="post" role="form" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="paciente">Nombre Paciente</label>
                                        <select name="paciente" id="paciente" class="form-control" required>
                                            <option value="">Seccionar un Paciente</option>
                                            <?php
                                            foreach ($enlacePaciente as $fun) :
                                            ?>
                                                <option value="<?=$fun->PAC_ID; ?>"><?=$fun->PAC_NOMBRE.' '.$fun->PAC_PATERNO.' '.$fun->PAC_MATERNO?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
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

                <div class="row">
                    <div class="col-xs-12">
                        <h5><strong>DESIGNACION</strong></h5>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="personal">Personal *</label>
                            <select class="select-simple form-control pmd-select2" name="personal" required>
                                <option value="">Seleccionar</option>
                                <?php
                                foreach ($enlacePersonal as $fun) :
                                ?>
                                    <option value="<?=$fun->PER_ID; ?>"><?=$fun->PER_NOMBRE; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="consultorio">Consultorio *</label>
                            <select class="select-simple form-control pmd-select2" name="consultorio" required>
                                <option value="">Seleccionar</option>
                                <?php
                                foreach ($enlaceConsultorio as $fun) :
                                ?>
                                    <option value="<?=$fun->COS_ID; ?>"><?=$fun->COS_NRO; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Observacion *</label>
                            <textarea name="observacion" class="form-control" rows="3" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="especialidad">Especialidad *</label>
                            <select class="select-simple form-control pmd-select2" name="especialidad" required>
                                <option value="">Seleccionar Laboratorio</option>
                                <?php
                                foreach ($enlaceEspecialidad as $fun) :
                                ?>
                                    <option value="<?=$fun->ESP_ID; ?>"><?=$fun->ESP_NOMBRE; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="horarios">Horarios *</label>
                            <select class="select-simple form-control pmd-select2" name="horarios" required>
                                <option value="">Seleccionar</option>
                                <?php
                                foreach ($enlaceHorario as $fun) :
                                ?>
                                    <option value="<?=$fun->HOR_ID; ?>"><?=$fun->HOR_TURNO; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado *</label>
                            <select class="select-simple form-control pmd-select2" name="estado" required>
                                <option value="">Seleccionar</option>
                                    <option value="1">Activo</option>
                                    <option value="2">No Activo</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <h5><strong>SIGNOS VITALES</strong></h5>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>PULSO</th>
                                    <th>TALLA</th>
                                    <th>PESO</th>
                                    <th>Frecuencia Cardiaca</th>
                                    <th>Presion Sanguinea</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="pulso" class="form-control" required/></td>
                                    <td><input type="text" name="talla" class="form-control" required/></td>
                                    <td><input type="text" name="peso" class="form-control" required/></td>
                                    <td><input type="text" name="fc" class="form-control" required/></td>
                                    <td><input type="text" name="ps" class="form-control" required/></td>
                                </tr>
                            </tbody>
                        </table>
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





        <div role="tabpanel" class="tab-pane" id="diagnost">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <strong>INFORMACIÓN MÉDICA DE DIAGNOSTICO</strong>
                                <button class="btn btn-xs btn-green pull-right" data-toggle="modal" data-target="#modal-patologias"><b class="glyphicon glyphicon-plus"></b> Agregar Diagnostico</button>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="col-xs-12">
                        <table class="table table-responsive tabla-datos">
                            <thead>
                                <tr>
                                    <th>Nombre Patologia</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>

        <div role="tabpanel" class="tab-pane" id="estu">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <strong>INFORMACIÓN MÉDICA DE ESTUDIOS</strong>
                                <button class="btn btn-xs btn-green pull-right" data-toggle="modal" data-target="#modal-enfermedades"><b class="glyphicon glyphicon-plus"></b> Agregar Estudios</button>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="col-xs-12">
                        <table class="table table-responsive tabla-datos2">
                            <thead>
                                <tr>
                                    <th>Nombre Laboratorio</th>
                                    <th>Descripcion Laboratorio</th>
                                    <th>Fecha Estado</th>
                                    <th>Estado de Estudio</th>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>              
                </div> 
            </div>           
        </div>
        <div role="tabpanel" class="tab-pane" id="arch">
            <div class="panel-body">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <strong>INFORMACIÓN MÉDICA DE ARCHIVOS</strong>
                                <button class="btn btn-xs btn-green pull-right" data-toggle="modal" data-target="#modal-archivos"><b class="glyphicon glyphicon-plus"></b> Agregar Archivo</button>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="col-xs-12">
                        <table class="table table-responsive tabla-datos">
                            <thead>
                                <tr>
                                    <th>Fecha Archivo</th>
                                    <th>Nombre Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                
            </div>               
        </div>





      </div>

  </div>

</div>

                        


                </div>
            </div>



<!-- Modal Patologias -->
<form class="modal fade modal-form-patologias" action="<?=base_url()?>diagnosticos/agregar_diagnostico" method="post" id="modal-patologias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<input type="hidden" name="id_consulta" value="">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <strong class="modal-title" id="myModalLabel">Agregar Patologia</strong>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="patologia">Nombre Patologia *</label>
                            <select class="select-simple form-control pmd-select2" name="patologia" required>
                                <option value="">Seleccionar Patologia</option>
                                <?php
                                foreach ($enlacePat as $fun) :
                                ?>
                                    <option value="<?=$fun->PAT_ID; ?>"><?=$fun->PAT_NOMBRE; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-sm btn-warning">Guardar</button>
            </div>
        </div>
    </div>
</form>
<!-- modal fin patologias -->



<!-- Modal Estudios -->
<form class="modal fade modal-form-estudios" action="<?=base_url()?>estudios/agregar_estudios" method="post" id="modal-enfermedades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<input type="hidden" name="id_consulta" value="">



    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <strong class="modal-title" id="myModalLabel">Agregar Estudios</strong>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="laboratorio">Laboratorio *</label>
                            <select class="select-simple form-control pmd-select2" name="laboratorio" required>
                                <option value="">Seleccionar Laboratorio</option>
                                <?php
                                foreach ($enlaceLab as $fun) :
                                ?>
                                    <option value="<?=$fun->LAB_ID; ?>"><?=$fun->LAB_NOMBRE; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">   
                        <div class="form-group">
                            <label for="estado_est">Estado de Estudio*</label>
                            <select name="estado_est"class="form-control" required>
                                <option value="">Seccionar una opción</option>
                                <option value="1">Activo</option>
                                <option value="2">No Activo</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>    
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="est_fecha">Fecha Estado *</label>
                            <div class='input-group date calendario'>
                                <input type='text' name="est_fecha" class="form-control" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="est_obs">Observacion Estado *</label>
                            <textarea name="est_obs" id="" class="form-control" rows="3" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-sm btn-warning">Guardar</button>
            </div>
        </div>
    </div>
</form>
<!-- modal fin estudios -->
<!-- Modal Archivos -->
<form class="modal fade modal-form-archivos" action="<?=base_url()?>archivos/agregar_archivos" method="post" id="modal-archivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <strong class="modal-title" id="myModalLabel">Agregar Archivos</strong>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-group text-center">
                                    <label for="imagen" class="control-label">Adjuntar un archivo</label><br>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Seleccionar Archivo</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..." required></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">        
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha *</label>
                                    <div class='input-group date calendario'>
                                        <input type='text' name="arch_fecha" class="form-control" required/>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-sm btn-warning">Guardar</button>
            </div>
        </div>
    </div>
</form>
<!-- modal fin Archivos -->




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

    // validator
    $('form.form-datos').validator().on('submit', function(e){
        var $this = $(this);
        if(e.isDefaultPrevented()){
            alert('Completar/Corregir los Datos'); 
        }else{
            // Form Valido
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(data) {
                    if (data.resp == 'ok') {
                        // agregado exitoso

                        console.log(data.datos);
                        if (data.datos) {
                            var consulta = data.datos;
                            $('input[name="id_consulta"]').val(consulta.CON_ID);
                        } 

                        $this.clearForm();
                        alert('se guardaron correctamente'); 
                    } else {
                        alert('error'); 
                    }
                },
                error: function(jqXHR, status, error){
                    alert('error de servidor'); 
                }
            });
           return 0; 
        }
    }); // Fin validator


    $('form.modal-form-patologias').validator().on('submit', function(e){
        // $('button[type="submit"]').attr('disabled', 'disabled');
        var $this = $(this);
        if(e.isDefaultPrevented()){
            alert('Completar/Corregir los Datos');
        }else{
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(data) {
                    console.log(data);
                    if (data.resp == 'ok') {
                        $this.clearForm();
                        alert('se guardaron correctamente'); 
                        if (data.tabla == 'patologia') {
                            var dato = data.data;
                            var fila = '<tr>' +
                                           '<td>' + dato.patologia_id + '</td>' +
                                       '</tr>';
                            $('table.tabla-datos').prepend(fila);
                        }
                    } else {
                        alert('errores');
                    }
                },
                error: function(jqXHR, status, error){
                    alert('error de servidor'); 
                }
            });
            return 0;
        }
        // $('button[type="submit"]').removeAttr('disabled');
    }); // Fin de AJAX (Agregar y Modificar)


    // AJAX de Formularios (Agregar y Modificar)
    $('form.modal-form-estudios').validator().on('submit', function(e){
        // $('button[type="submit"]').attr('disabled', 'disabled');
        var $this = $(this);
        if(e.isDefaultPrevented()){
            alert('Completar/Corregir los Datos');
        }else{
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(data) {
                    console.log(data);
                    if (data.resp == 'ok') {
                        $this.clearForm();
                        alert('se guardaron correctamente'); 
                        if (data.tabla == 'estudio') {
                            var dato = data.data;
                            var fila = '<tr>' +
                                           '<td>' + dato.estudio_fecha + '</td>' +
                                           '<td>' + dato.observacion_est + '</td>' +
                                           '<td>' + dato.estado_estudio + '</td>' +
                                       '</tr>';
                            $('table.tabla-datos2').prepend(fila);
                        }
                    } else {
                        alert('errores');
                    }
                },
                error: function(jqXHR, status, error){
                    alert('error servidor');
                }
            });
            return 0;
        }
        // $('button[type="submit"]').removeAttr('disabled');
    }); // Fin de AJAX (Agregar y Modificar)


    // AJAX de Formularios (Agregar y Modificar)
    $('form.modal-form-archivos').validator().on('submit', function(e){
        // $('button[type="submit"]').attr('disabled', 'disabled');
        var $this = $(this);
        if(e.isDefaultPrevented()){
            alert('Completar/Corregir los Datos');
        }else{
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),
                success: function(data) {
                    console.log(data);
                    if (data.resp == 'ok') {
                        $this.clearForm();
                        alert('se guardaron correctamente'); 
                        if (data.tabla == 'estudio') {
                            var dato = data.data;
                            var fila = '<tr>' +
                                           '<td>' + dato.estudio_fecha + '</td>' +
                                           '<td>' + dato.observacion_est + '</td>' +
                                           '<td>' + dato.estado_estudio + '</td>' +
                                       '</tr>';
                            $('table.tabla-datos2').prepend(fila);
                        }
                    } else {
                        alert('errores');
                    }
                },
                error: function(jqXHR, status, error){
                    alert('error servidor');
                }
            });
            return 0;
        }
        // $('button[type="submit"]').removeAttr('disabled');
    }); // Fin de AJAX (Agregar y Modificar)


});
</script>


<script type="text/javascript">
$.fn.clearForm = function() {
    return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input',this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type == 'email' || type == 'tel')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};
// 
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

