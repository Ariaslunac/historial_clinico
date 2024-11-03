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
                                        <input type="hidden" name="id_pac" value="<?=$pac->PAC_ID?>">
                                        <input type="hidden" name="id_con" value="<?=$con->CON_ID?>">
                                        <input type="hidden" name="id_des" value="<?=$des->DES_ID?>">
                                        <div class="col-xs-12">
                                            <div class="alert alert-info">
                                                <p>CON ID: <strong><?=$con->CON_ID?></strong></p>

                                                <p>Paciente: <strong><?=$pac->PAC_NOMBRE.' '.$pac->PAC_PATERNO.' '.$pac->PAC_MATERNO?></strong></p>
                                                <!-- <p>Paciente: <strong><?=$socio->nombre . ' ' . $socio->apellidos?></strong></p> -->
                                                <p>Codigo: <strong><?=$pac->PAC_CODIGO?></strong></p>
                                                <p>CI: <strong><?=$pac->PAC_CI?></strong></p>
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
                                            <li role="presentation"><a href="#diagnost" aria-controls="diagnost" role="tab" data-toggle="tab">Diagnosticos</a></li>
                                            <li role="presentation"><a href="#estu" aria-controls="estu" role="tab" data-toggle="tab">Estudios</a></li>
                                            <li role="presentation"><a href="#arch" aria-controls="arch" role="tab" data-toggle="tab">Archivos</a></li>
                                            </ul>
                                            <div class="tab-content"> <!-- Tab panes -->
                                                <div role="tabpanel" class="tab-pane active" id="consul">
                                                    <div class="panel-body">
                                                        <form action="<?=base_url()?>consultas/modificar_consultas" method="post" class="form-datos" role="form" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_con" value="<?=$con->CON_ID?>">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="con_fecha">Fecha Consulta *</label>
                                                                        <div class='input-group date calendario'>
                                                                            <input type='text' name="con_fecha" class="form-control" value="<?=$con->CON_FECHA?>" readonly/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="con_sintoma">Sintomas *</label>
                                                                        <textarea name="con_sintoma" class="form-control" rows="3" required><?=$con->CON_SINTOMAS?></textarea>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="con_tratamiento">Tratamiento *</label>
                                                                        <textarea name="con_tratamiento" class="form-control" rows="3" required><?=$con->CON_TRATAMIENTO?></textarea>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="fecha_cita">Fecha Cita *</label>
                                                                        <div class='input-group date calendario'>
                                                                            <input type='text' name="fecha_cita" class="form-control" value="<?=$con->CON_CITAN_FECHA?>" required/>
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
                                                                            <input type='text' name="con_hora"  class="form-control" value="<?=$con->CON_HORA?>" readonly/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-time"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="con_diagnostico">Diagnostico *</label>
                                                                        <textarea name="con_diagnostico" class="form-control" rows="3" required><?=$con->CON_DIAGNOSTICO?></textarea>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="con_observacion">Observacion *</label>
                                                                        <textarea name="con_observacion" class="form-control" rows="3" required><?=$con->CON_OBS?></textarea>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="hora_cita">Hora Cita *</label>
                                                                        <div class='input-group date hora'>
                                                                            <input type='text' name="hora_cita" class="form-control" value="<?=$con->CON_CITAN_HORA?>" required/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-time"></span>
                                                                            </span>
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
                                                            </div>    
                                                        </form>
                                                    </div>            
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="sig_vit">
                                                    <div class="panel-body">     
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="panel-heading">
                                                                    <div class="panel-title">
                                                                        <strong>SIGNOS VITALES</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/><br/>
                                                            <div class="col-xs-12">
                                                                <form class="form-datos" action="<?=base_url()?>signos/agregar_signos" method="post">
                                                                <input type="hidden" name="id_con" value="<?=$con->CON_ID?>">
                                                                    <table class="table table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>PULSO</th>
                                                                                <th>PESO</th>
                                                                                <th>TALLA</th>
                                                                                <th>Presion Sanguinea</th>
                                                                                <th>Frecuencia Cardiaca</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="text" name="pulso" class="form-control" required/></td>
                                                                                <td><input type="text" name="peso" class="form-control" required/></td>
                                                                                <td><input type="text" name="talla" class="form-control" required/></td>
                                                                                <td><input type="text" name="ps" class="form-control" required/></td>
                                                                                <td><input type="text" name="fc" class="form-control" required/></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
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
                                                    </div>            
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="diagnost">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="panel-heading">
                                                                    <div class="panel-title">
                                                                        <strong>INFORMACIÓN MÉDICA DE DIAGNOSTICO</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/><br/>
                                                            <div class="col-xs-12">
                                                                <form class="form-datos" action="<?=base_url()?>diagnosticos/agregar_diagnostico" method="post">
                                                                    <input type="hidden" name="id_con" value="<?=$con->CON_ID?>">
                                                                    <table class="table table-responsive ">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Seleccionar</th>
                                                                                <th>Nombre Patologia</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($enlaceDiagnostico as $row) : ?>
                                                                            <tr>
                                                                                <td><input name="id_pat[]" type="checkbox" id="" value="<?=$row->PAT_ID?>"></td>
                                                                                <td><?=$row->PAT_NOMBRE?></td>
                                                                            </tr>
                                                                            <?php endforeach; ?>
                                                                        </tbody>
                                                                    </table>
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
                                                    </div>            
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="estu">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="panel-heading">
                                                                    <div class="panel-title">
                                                                        <strong>INFORMACIÓN MÉDICA DE ESTUDIOS</strong>
                                                                        <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#modal-estudios"><b class="glyphicon glyphicon-plus"></b> Agregar Estudios</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/><br/>
                                                            <div class="col-xs-12">
                                                                <table class="table table-responsive table-striped table-bordered table-advance table-hover tabla-datos-estudios tabla2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nombre</th>
                                                                            <th>Fecha</th>
                                                                            <th>Observaccion</th>
                                                                            <th>Estado</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($enlaceEstudio as $row) : ?>
                                                                        <tr>
                                                                            <td><?=$row->LAB_NOMBRE?></td>
                                                                            <td><?=$row->EST_FECHA?></td>
                                                                            <td><?=$row->EST_OBS?></td>
                                                                            <td><?=$row->EST_ESTADO?></td>
                                                                        </tr>
                                                                        <?php endforeach; ?>
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
                                                                        <button class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#modal-archivos"><b class="glyphicon glyphicon-plus"></b> Agregar Archivos</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br/><br/>
                                                            <div class="col-xs-12">
                                                                <table class="table table-responsive table-striped table-bordered table-advance table-hover tabla-datos-archivo tabla2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha Archivo</th>
                                                                            <th>Nombre Archivo</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($enlaceArchivo as $row) : ?>
                                                                        <tr>
                                                                            <td><?=$row->ARC_FECHA?></td>
                                                                            <td><?=$row->ARC_ARCHIVO?></td>
                                                                        </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div> 
                                                    </div>               
                                                </div>
                                            </div> <!-- final Tab panes -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Patologias -->
                            <form class="modal fade modal-form-patologias" action="<?=base_url()?>diagnosticos/agregar_diagnostico" method="post" id="modal-patologias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <input type="hidden" name="id_consulta" value="<?=$con->CON_ID?>">
                            <input type="hidden" name="nombre_pato" value="" id="nombre">
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
                                                        <select class="select-simple form-control pmd-select2" name="patologia" id="pato" required>
                                                            <option value="">Seleccionar Patologia</option>
                                                            <?php
                                                            foreach ($enlacePat as $fun) :
                                                            ?>
                                                                <option value="<?=$fun->PAT_ID; ?>"><?=$fun->PAT_NOMBRE; ?>
                                                                </option>
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
                            <!-- Modal estudios -->
                            <form class="modal fade modal-form-estudios" action="<?=base_url()?>estudios/agregar_estudios" method="post" id="modal-estudios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <input type="hidden" name="id_consulta" value="<?=$con->CON_ID?>">
                            <input type="hidden" name="nombre_laboratorio" value="" id="nom_lab">
                            <input type="hidden" name="estado_estudio" value="" id="nom_estu">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <strong class="modal-title" id="myModalLabel">Agregar Estudio</strong>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="laboratorio">Laboratorio *</label>
                                                        <select class="select-simple form-control pmd-select2" name="laboratorio" id="labo" required>
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
                                                        <select name="estado_est"class="form-control" id="estados" required>
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
                            <form class="modal fade modal-form-archivos" action="<?=base_url()?>archivos/agregar_archivos" method="post" id="modal-archivos" data-upload="<?=base_url()?>archivos/upload_imagen" enctype="multipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <input type="hidden" name="id_con" value="<?=$con->CON_ID?>">
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
                                                                <input type="hidden" name="archi">
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Seleccionar Archivo</span><span class="fileinput-exists">Cambiar</span><input type="file" name="nombre_archivo" class="upload-imagen" required/></span>
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