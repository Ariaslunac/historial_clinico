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
                            <h4><i class="fa fa-angle-right"></i> Personal<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nuevo</a></h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> Código</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nombre Completo</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nro. de Cédula</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Teléfono</th>
                                <!--<th><i class="fa fa-bookmark"></i> Profit</th>-->
                                <!--<th><i class=" fa fa-edit"></i> Tipo</th>-->
                                <th>Operaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //                            var_dump($citas);
                            if(!empty($personas)){
                                foreach($personas as $fila):
                                    ?>
                                    <tr>
                                        <td><?=$fila->PER_CODIGO?></td>
                                        <td><?=$fila->PER_NOMBRE.' '.$fila->PER_PATERNO?></td>
                                        <td><?=$fila->PER_CI?></td>
                                        <td><?=$fila->PER_TELEFONO?></td>
                                        <td>
                                            <button class="btn btn-primary" onClick="modificar('personal','<?=$fila->PER_ID?>')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger eliminar" id="<?=$fila->PER_ID?>" name="personal" title="<?=$fila->PER_NOMBRE.' '.$fila->PER_PATERNO?>"><i class="fa fa-trash-o "></i></button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h1 class="modal-title"><i class="fa fa-user-md"></i> Registro de Personal</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url()?>" method="POST">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
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
                                    <label for="codigo" class="col-sm-3">Código:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="codigo" id="codigo" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-3">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nombre" id="nombre" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paterno" class="col-sm-3">Apellido Paterno:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="paterno" id="paterno" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="materno" class="col-sm-3">Apellido Materno:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="materno" id="materno" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cedula" class="col-sm-3">Nro. de Cédula:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="cedula" id="cedula" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fecha_nacimiento" class="col-sm-3">Fecha de Nacimiento:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control calendario fecha" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telefono" class="col-sm-3">Nro. de Teléfono:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="telefono" id="telefono" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="correo" class="col-sm-3">Correo Electrónico:</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="correo" id="correo" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group row">
                                    <label for="fotografia" class="col-sm-3">Fotografía:</label>
                                    <div class="col-sm-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 250px; height: 170px;">
                                                <img src="" id="foto-previa" alt="">
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-block btn-file">
                                                    <span class="fileinput-new">Seleccionar Imagen</span>
                                                    <span class="fileinput-exists">Cambiar</span>
                                                    <input type="file" name="fotografia" id="fotografia" data-upload="<?=base_url()?>personal/upload_imagen">
                                                </span>
                                                <a href="#" class="btn btn-default btn-block btn-danger fileinput-exists" data-dismiss="fileinput">Borrar</a>
                                            </div>
                                            <input type="hidden" name="foto" id="foto">
                                        </div>
                                    </div>



<!--                                    <div class="col-sm-9">-->
<!--<!--                                        <input type="file" name="fotografia" id="fotografia" class="form-control" onclick="javascript: limpiar_campo(this);">-->
<!---->
<!--                                    </div>-->
                                </div>
                                <div class="form-group row">
                                    <label for="direccion" class="col-sm-3">Dirección:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="direccion" id="direccion" class="form-control" onclick="javascript: limpiar_campo(this);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tipo" class="col-sm-3">Tipo de Personal:</label>
                                    <div class="col-sm-9">
                                        <select name="tipo" id="tipo" class="form-control">
                                            <option value="1">Administrativo</option>
                                            <option value="2">Médico</option>
                                            <option value="3">Enfermero</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-3">Descripción:</label>
                                    <div class="col-sm-9">
                                        <textarea name="descripcion" id="descripcion" rows="4"  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="personal">
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
    var base_url = '<?=base_url()?>';
    var img_personal = base_url + 'assets/fotografias/personal/';
    $(function(){
        // upload de imagenes
        $('input#fotografia').on('change', function(){
            var img = new FormData($('form#form')[0]);
            //img.append('image', $('input[type=file]')[0].files[0]);
            //var url = "http://localhost/acripol/usuarios/upload_imagen";
            var url = $(this).data('upload');
            console.log(img);
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
                $('#especialidad option').each(function(){
                    if ($(this).val() == datos['ESP_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('#codigo').val(datos['PER_CODIGO']);
                $('#nombre').val(datos['PER_NOMBRE']);
                $('#paterno').val(datos['PER_PATERNO']);
                $('#materno').val(datos['PER_MATERNO']);
                $('#cedula').val(datos['PER_CI']);
                $('#fecha_nacimiento').val(datos['PER_FECHAN']);
                $('#telefono').val(datos['PER_TELEFONO']);
                $('#correo').val(datos['PER_EMAIL']);
                $('#direccion').val(datos['PER_DIRECCION']);
                $('#tipo option').each(function(){
                    if ($(this).val() == datos['PER_TIPO']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('#descripcion').val(datos['PER_DESC']);
                if (datos['PER_FOTO'] != '') {
                    $('img#foto-previa').attr('src', img_personal + datos['PER_FOTO']);
                }
            }
        });
    }
</script>

