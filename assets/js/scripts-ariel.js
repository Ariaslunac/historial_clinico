$(document).on('ready', function(){
    $('form.form-datos').validator().on('submit', function(e){
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
                    if (data.resp == 'ok') {
                        // agregado exitoso
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
    });



    $("form.modal-form-patologias").bind("change keyup", function(event){        
        var res = $("#pato option:selected").text();
        $("form.modal-form-patologias").find("#nombre").val(res);
    }); 

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
                                           '<td>' + dato.nomb_pato + '</td>' +
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
                        if (data.tabla == 'estudios') {
                            var dato = data.data;
                            var fila = '<tr>' +
                                           '<td>' + dato.laboratorio + '</td>' +
                                           '<td>' + dato.estudio_fecha + '</td>' +
                                           '<td>' + dato.observacion_est + '</td>' +
                                           '<td>' + dato.estado + '</td>' +
                                       '</tr>';
                            $('table.tabla-datos-estudios').prepend(fila);
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

    $("form.modal-form-estudios").bind("change keyup", function(event){        
        var lab = $("#labo option:selected").text();
        $("form.modal-form-estudios").find("#nom_lab").val(lab);

        var esta = $("#estados option:selected").text();
        $("form.modal-form-estudios").find("#nom_estu").val(esta);
    });



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
                        if (data.tabla == 'archivos') {
                            var dato = data.data;
                            var fila = '<tr>' +
                                           '<td>' + dato.archivo_fecha + '</td>' +
                                           '<td>' + dato.archivo + '</td>' +
                                       '</tr>';
                            $('table.tabla-datos-archivo').prepend(fila);
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


    // upload de imagenes
    $('input.upload-imagen').on('change', function(){
        var img = new FormData($('form.modal-form-archivos')[0]);
        console.log(img);
        var url = $('form.modal-form-archivos').data('upload');
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
                    $('input[name="archi"]').val(resp.foto);
                } else {
                    $('input[name="archi"]').val('');
                }
            },
            error: function (jqXHR, status, error){
                //console.log(jqXHR);
            }
        });
    });
// nuevaaaaaaaaaaaaaa finnnnnnnnnnnnnnnnn

// indexxxxxxxxxxx iniiiiiiiiiiii
    // AJAX de Formularios paciente
    $('form.form-datos-paciente').validator().on('submit', function(e){
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
                        $this.clearForm();
                        alert('se guardaron correctamente'); 
                        if (data.tabla == 'paciente') {
                            var dato = data.data;
                            $('select[name=paciente]').append('<option value="' + dato.id + '">' + dato.nom + '</option>');
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
    }); // Fin de AJAX (Agregar y Modificar)
});