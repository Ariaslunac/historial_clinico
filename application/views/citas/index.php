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
                            <h4><i class="fa fa-angle-right"></i> Citas<a class="btn btn-primary pull-right" data-toggle='modal' href="#ventana"><i class="fa fa-plus"></i> Nueva</a></h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> Nro</th>
                                <th><i class="fa fa-bullhorn"></i> Paciente</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Fecha</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Hora</th>
                                <!--<th class="hidden-phone"><i class="fa fa-question-circle"></i> Estado</th>-->
                                <!--<th><i class="fa fa-bookmark"></i> Profit</th>-->
                                <!--<th><i class=" fa fa-edit"></i> Tipo</th>-->
                                <th>Operaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
//                            var_dump($citas);
                            if(!empty($citas)){
                                foreach($citas as $fila):
                                    ?>
                                    <tr>
                                        <td><?=$fila->CIT_ID?></td>
                                        <td><?=$fila->PAC_NOMBRE .' '. $fila->PAC_PATERNO?></td>
                                        <td><?=$fila->CIT_FECHA?></td>
                                        <td><?=$fila->CIT_HORA?></td>
                                        <!--td><?=$fila->CIT_ESTADO?></td>-->
                                        <td>
                                            <button class="btn btn-primary" onClick="modificar('citas','<?=$fila->CIT_ID?>')"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger eliminar" id="<?=$fila->CIT_ID?>" name="citas" title="<?=$fila->CIT_ID?>"><i class="fa fa-trash-o "></i></button>
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
                    <h1 class="modal-title"><i class="fa fa-comment"></i> Registro de Citas</h1>
                </div>
                <div class="modal-body">
                    <form id="form" role="form"  action="<?=base_url()?>" method="POST">
                        <div class="form-group row">
                            <label for="especialidad" class="col-sm-3">Especialidad:</label>
                            <div class="col-sm-9">
                                <select name="especialidad" id="especialidad" class="form-control">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    if(!empty($especialidades)){
                                        foreach($especialidades as $fila): ?>
                                            <option value="<?php echo $fila->ESP_ID ?>"><?php echo $fila->ESP_NOMBRE ?></option>
                                            <?php $i++; endforeach; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="turno_horario" class="col-sm-3">Doctor - Horario:</label>
                            <div class="col-sm-9">
                                <select name="turno_horario" id="turno_horario" class="form-control">
                                    <option value="">--Seleccionar--</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="designacion">
                        <div class="form-group row">
                            <label for="paciente" class="col-sm-3">Paciente:</label>
                            <div class="col-sm-9">
                                <select name="paciente" id="paciente" class="form-control">
                                    <option value="">--Seleccionar--</option>
                                    <?php
                                    if(!empty($pacientes)){
                                        foreach($pacientes as $fila): ?>
                                            <option value="<?php echo $fila->PAC_ID ?>"><?php echo $fila->PAC_NOMBRE." ".$fila->PAC_PATERNO." - Nro. CI.: ".$fila->PAC_CI ?></option>
                                            <?php $i++; endforeach; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha" class="col-sm-3">Fecha:</label>
                            <div class="col-sm-9">
                                <input type="text" name="fecha" id="fecha" class="form-control calendario fecha" onclick="javascript: limpiar_campo(this);">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hora" class="col-sm-3">Hora:</label>
                            <div class="col-sm-9">
                                <input type="text" name="hora" id="hora" class="form-control hora" onclick="javascript: limpiar_campo(this);" required onKeyUp="muestra_seguridad_clave(this.value, this.form)">
                                <!--<i>seguridad:</i> <input name="seguridad" type="text" style="border: 0px; background-color:ffffff; text-decoration:italic;" onFocus="blur()">
                                <em style="font-size:9px; font-weight:bold">Dede ingresar letras,letras MAYUSCULAS, Numeros. En un minimo de 9 caracteres.</em>
                                <input type="hidden" name="paswordc" id="paswordc" class="form-control" placeholder="Contrase&ntilde;a:"  onclick="javascript: limpiar_campo(this);" required>-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipo" class="col-sm-3">Tipo:</label>
                            <div class="col-sm-9">
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="1">Reserva</option>
                                    <option value="2">Reconsulta</option>
                                    <option value="3">Traspaso</option>
                                </select>
                            </div>
                        </div>
                        <div id="mensaje"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="guardar"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                            <button type="button" class="btn cerrarv" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Cerrar</button>
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="con" id="con" value="citas">
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
                $('#fecha').val(datos['CIT_FECHA']);
                $('#hora').val(datos['CIT_HORA']);
                $('#especialidad option').each(function(){
//                    console.log($(this).val());
                    if ($(this).val() == datos['ESP_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });
                $('#paciente option').each(function(){
//                    console.log($(this).val());
                    if ($(this).val() == datos['PAC_ID']) {
                        $(this).attr('selected', 'selected');
                    } else {
                        $(this).removeAttr('selected');
                    }
                });

                listar_doctor_turno(datos['ESP_ID'], datos['DES_ID']);
            }
        });
    }
    function listar_doctor_turno(esp, des){
        console.log(des);
        $.ajax({
            url: base_url + 'citas/listar_turnos/' + esp,
            type: 'get',
            success: function(data) {
//                    console.log(data);
                if(data.resp > 0){
//                        console.log('turnos');
                    $('select#turno_horario').html('');
                    $('select#turno_horario').append('<option value="">--Seleccionar--</option>');
                    $.each(data.datos, function(i, turno){
                        $('select#turno_horario').append('<option value="' + turno.DES_ID + '">Dr.: ' + turno.PER_NOMBRE + ' ' + turno.PER_PATERNO + ' - Consultorio Nro.: ' + turno.COS_NRO  + ' - Horario: ' + turno.HOR_DESDE + ' a ' + turno.HOR_HASTA + '</option>');
//                            console.log(i);/
                    });

                    $('#turno_horario option').each(function(){
//                    console.log($(this).val());
                        if ($(this).val() == des) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }
                    });

                } else {
                    $('select#turno_horario').html('');
                    $('select#turno_horario').append('<option value="">--Seleccionar--</option>');
                }
            }
        });
    }
    $(function(){
        // seleccionar especialidad
        $('select#especialidad').on('change', function(){
//            console.log('select');
            console.log($('select#especialidad').val());
            var especialidad = $(this).val();
            $.ajax({
                url: base_url + 'citas/listar_turnos/' + especialidad,
                type: 'get',
                success: function(data) {
//                    console.log(data);
                    if(data.resp > 0){
//                        console.log('turnos');
                        $('select#turno_horario').html('');
                        $('select#turno_horario').append('<option value="">--Seleccionar--</option>');
                        $.each(data.datos, function(i, turno){
                            $('select#turno_horario').append('<option value="' + turno.DES_ID + '">Dr.: ' + turno.PER_NOMBRE + ' ' + turno.PER_PATERNO + ' - Consultorio Nro.: ' + turno.COS_NRO  + ' - Horario: ' + turno.HOR_DESDE + ' a ' + turno.HOR_HASTA + '</option>');
//                            console.log(i);/
                        });
                    } else {
                        $('select#turno_horario').html('');
                        $('select#turno_horario').append('<option value="">--Seleccionar--</option>');
                    }
                }
            });
        });
    });
</script>

