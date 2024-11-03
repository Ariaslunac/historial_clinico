jQuery(document).ready(function(){

jQuery(".msg-basico").click(function() {
	swal("Texto del mensaje");
});

jQuery(".msg-basico-txt").click(function() {
	swal("Texto del título", "Texto del mensaje inferior");
});

jQuery(".msg-exito").click(function() {
	swal("¡Bien!", "Has hecho clic en el botón :)", "success");
});

jQuery(".msg-warning").click(function() { //alert($(this).attr("title"));
	var con = $(this).attr("name");
	var id = $(this).attr("id");
	swal({   
		title: "¿Seguro que desea eliminar el Registro?",   
		text: "Registro : ",   
		type: "warning",   
		showCancelButton: true,
		cancelButtonText: "Cancelar",   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Aceptar",   
		closeOnConfirm: false }, 
		function(){   
			eliminar(con,id);
			swal("Registro Borrado", 
				"Acabas de vender tu alma al diablo.", 
				"success"); 
	});

});

jQuery(".msg-cond").click(function() {
	swal({   
		title: "¿Deseas unirte al lado oscuro?",   
		text: "Este paso marcará el resto de tu vida...",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "¡Claro!",   
		cancelButtonText: "No, jamás",   
		closeOnConfirm: false,   
		closeOnCancel: false }, 

		function(isConfirm){   
			if (isConfirm) {     
				swal("¡Hecho!", 
					"Ahora eres uno de los nuestros", 
					"success");   
			} else {     
				swal("¡Gallina!", 
					"Tu te lo pierdes...", 
				"error");   
			} 
		});
});

jQuery(".msg-autoclose").click(function() {
	swal({   
		title: "Mensaje con cierre automático",   
		text: "Se cerrará en 3 segundos.",   
		timer: 3000,   
		showConfirmButton: false 
	});

});


});
