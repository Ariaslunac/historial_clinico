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
                            <h4><i class="fa fa-angle-right"></i> Patologías<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nueva</a></h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> Nro</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Especialidad</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Patología</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descripción</th>
                                <!--<th><i class="fa fa-bookmark"></i> Profit</th>-->
                                <!--<th><i class=" fa fa-edit"></i> Tipo</th>-->
                                <th>Operaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //                            var_dump($citas);
                            if(!empty($patologias)){
                                foreach($patologias as $fila):
                                    ?>
                                    <tr>
                                        <td><?=$fila->PAT_ID?></td>
                                        <td><?=$fila->ESP_NOMBRE?></td>
                                        <td><?=$fila->PAT_NOMBRE?></td>
                                        <td><?=$fila->PAT_DESC?></td>
                                        <td>
                                            <button class="btn btn-primary" onClick="modificar('patologias','<?=$fila->PAT_ID?>')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger eliminar" id="<?=$fila->PAT_ID?>" name="patologias" title="<?=$fila->PAT_NOMBRE?>"><i class="fa fa-trash-o "></i></button>
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
                    <h1 class="modal-title"><i class="fa fa-flask"></i> Registro de Patología</h1>
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
                            <label for="nombre" class="col-sm-3">Patología:</label>
                            <div class="col-sm-9">
                                <input type="text" name="nombre" id="nombre" class="form-control" onclick="javascript: limpiar_campo(this);">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-3">Descripción:</label>
                            <div class="col-sm-9">
                                <textarea name="descripcion" id="descripcion" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="patologias">
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
            url:"<?=base_url()?>"+con+"/datos/"+id,
            data:{id:id},
            type:"POST",
            success:function(respuesta){ //alert(respuesta);
                var datos=JSON.parse(respuesta);
                console.log(datos);
                $('#id').val(id);
                $('#op').val("modificar");
                $('#nombre').val(datos['PAT_NOMBRE']);
                $('#descripcion').val(datos['PAT_DESC']);
                $('#especialidad option').each(function(){
                    console.log($(this).val());
                    if ($(this).val() == datos['ESP_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
            }
        });
    }
</script>
