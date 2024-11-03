<laboratorios lang="en">
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
                            <h4><i class="fa fa-angle-right"></i> Designaciones<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nueva</a></h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th><i class="fa fa-bullhorn"></i> Nro</th>
                                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Especialidad</th>
                                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> N. Personal</th>
                                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nro. Consultorio</th>
                                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Turno</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //                            var_dump($citas);
                            if(!empty($designaciones)){
                                foreach($designaciones as $fila):
                                    ?>
                                    <tr>
                                        <td><?=$fila->DES_ID?></td>
                                        <td><?=$fila->ESP_NOMBRE?></td>
                                        <td><?=$fila->PER_NOMBRE.' '.$fila->PER_PATERNO?></td>
                                        <td><?=$fila->COS_NRO?></td>
                                        <td><?=$fila->HOR_TURNO?></td>
                                        <td>
                                            <button class="btn btn-primary" onClick="modificar('designaciones','<?=$fila->DES_ID?>')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger eliminar" id="<?=$fila->DES_ID?>" name="designaciones" title="<?=$fila->DES_ID?>"><i class="fa fa-trash-o "></i></button>
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
                    <h1 class="modal-title"><i class="fa fa-link"></i> Registro de Designación</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url()?>" method="POST">
                        <div class="form-group row">
                            <label for="especialidad" class="col-sm-3">Especialidad:</label>
                            <div class="col-sm-9">
                                <select name="especialidad" id="especialidad" class="form-control">
                                    <?php
                                    if(!empty($especialidades)){
                                        foreach($especialidades as $fila): ?>
                                            <option value="<?=$fila->ESP_ID?>"><?=$fila->ESP_NOMBRE?></option>
                                            <?php endforeach; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="personal" class="col-sm-3">Personal:</label>
                            <div class="col-sm-9">
                                <select name="personal" id="personal" class="form-control">
                                    <?php
                                    if(!empty($personal)){
                                        foreach($personal as $fila): ?>
                                            <option value="<?=$fila->PER_ID?>"><?=$fila->PER_NOMBRE.' '.$fila->PER_PATERNO?></option>
                                            <?php endforeach; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consultorio" class="col-sm-3">Consultorio:</label>
                            <div class="col-sm-9">
                                <select name="consultorio" id="consultorio" class="form-control">
                                    <?php
                                    if(!empty($consultorios)){
                                        foreach($consultorios as $fila): ?>
                                            <option value="<?=$fila->COS_ID?>"><?=$fila->COS_NRO?></option>
                                            <?php endforeach; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="horario" class="col-sm-3">Horario:</label>
                            <div class="col-sm-9">
                                <select name="horario" id="horario" class="form-control">
                                    <?php
                                    if(!empty($horarios)){
                                        foreach($horarios as $fila): ?>
                                            <option value="<?=$fila->HOR_ID?>"><?=$fila->HOR_TURNO.': '.$fila->HOR_DESDE.' - '.$fila->HOR_HASTA?></option>
                                            <?php endforeach; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="observaciones" class="col-sm-3">Observaciones:</label>
                            <div class="col-sm-9">
                                <textarea name="observaciones" id="observaciones" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="designaciones">
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
</laboratorios>
<?php $this->load->view('includes/scripts.php')?>
<script language="javascript">
    function modificar(con,id){
        $("#ventana").modal("show");
        $.ajax({
            url:"<?=base_url()?>"+con+"/datos/"+id,
            data:{id:id},
            type:"POST",
            success:function(respuesta){ //alert(respuesta);
                var datos=JSON.parse(respuesta);
                console.log(datos);
                $('#id').val(id);
                $('#op').val("modificar");
                $('#observaciones').val(datos['DES_OBS']);
//                $('#descripcion').val(datos['LAB_DESC']);
                $('#especialidad option').each(function(){
                    console.log($(this).val());
                    if ($(this).val() == datos['ESP_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('#personal option').each(function(){
                    console.log($(this).val());
                    if ($(this).val() == datos['PER_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('#consultorio option').each(function(){
                    console.log($(this).val());
                    if ($(this).val() == datos['COS_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('#horario option').each(function(){
                    console.log($(this).val());
                    if ($(this).val() == datos['HOR_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
            }
        });
    }
</script>
