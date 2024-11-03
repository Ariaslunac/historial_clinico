	<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?=base_url()?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?=base_url()?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?=base_url()?>assets/js/sparkline-chart.js"></script>    
	<script src="<?=base_url()?>assets/js/zabuto_calendar.js"></script>	
    
    <?php //if($this->router->class!='reportes'){ ?>
    <!--<script src="<?=base_url()?>ejemplo/jquery-1.12.4.js"></script>-->
    <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" >
	$(document).ready(function() {
		$('#table1').DataTable();
		$('#table2').DataTable( {
			"paging":   false,
			"ordering": false,
			"info":     false
		});
	} );
	</script>
	<?php //} ?>


<script src="<?=base_url()?>assets/date/moment-with-locales.min.js"></script>
<script src="<?=base_url()?>assets/date/bootstrap-datetimepicker.min.js"></script>


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
	$(function () {
        $('.hora').datetimepicker({
            format: 'LT'
        });
        $('.calendario').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'es'      
        });
        $('.calendario').data("DateTimePicker");
    	$('table.tabla2').DataTable();
    });
	
        $(function () {
            $('#divMiCalendario').datetimepicker();
			$('.date').datetimepicker({
				format: 'YYYY-MM-DD'
			});
			$('.fecha').datetimepicker({
				format: 'YYYY-MM-DD',
				ignoreReadonly: true
			});
            $('.hora').datetimepicker({
                //format: 'LT'
				format: 'HH:mm',
				ignoreReadonly: true
            });
			//$('.hora').show();
        });
    </script>
    <script src="<?=base_url()?>assets/js/jasny-bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/validator.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url()?>assets/js/scripts-ariel.js" type="text/javascript"></script>
    
    <!-- Custom functions file -->
    <script src="<?=base_url()?>assets/js/functions.js"></script>
    <!-- Sweet Alert Script -->
    <script src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
    
	<!--<script type="text/javascript">
        $(document).ready(function () {
			var unique_id = $.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Welcome to Dashgum!',
				// (string | mandatory) the text inside the notification
				text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
				// (string | optional) the image to display on the left
				image: 'assets/img/ui-sam.jpg',
				// (bool | optional) if you want it to fade out on its own or just sit there
				sticky: true,
				// (int | optional) the time you want it to be alive for before fading out
				time: '',
				// (string | optional) the class name you want to apply to that specific message
				class_name: 'my-sticky-class'
			});
        	return false;
        });
	</script>-->
	


	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
		
		$("#form").submit(function (event){ //alert('<?=base_url(); ?>'+$("#con").val()+"/"+$("#op").val());
			event.preventDefault(); 
			var formData = new FormData($(this)[0]);
			var con = $("#con").val(); 
			$.ajax({
				url:'<?=base_url(); ?>'+con+"/"+$("#op").val(),
				type:'POST',
				data:formData,
				cache:false,
				contentType:false,
				processData:false,
				success: function(respuesta){ //alert(respuesta);
					if(respuesta==true){
						$("#ventana").modal("hide");
						document.location.href="<?=base_url()?>"+con+"";
					}else{
						var error=JSON.parse(respuesta);
						console.log(error);
						$('#mensaje').html("<strong>Error! </strong>"+error);
						$("#mensaje").addClass("alert alert-danger");
					}
				}
			});
		});
		jQuery(".eliminar").click(function() { //alert($(this).attr("title"));
			var nom = $(this).attr("title");
			var con = $(this).attr("name");
			var id = $(this).attr("id");
			swal({   
				title: "¿Seguro que desea eliminar el Registro?",   
				text: "Registro : " + nom,   
				type: "warning",   
				showCancelButton: true,
				cancelButtonText: "Cancelar",   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Aceptar",   
				closeOnConfirm: false }, 
				function(){   
					$.ajax({
						url:'<?=base_url(); ?>'+con+"/eliminar",
						type:'POST',
						data:{id:id},
						success: function(respuesta){ //alert(respuesta);
							if(respuesta==true){
								//$("#ventana").modal("hide");
								document.location.href="<?=base_url()?>"+con+"";
							}else{
								var error=JSON.parse(respuesta);
								console.log(error);
								$('#mensaje').html("<strong>Error! </strong>"+error);
								$("#mensaje").addClass("alert alert-danger");
							}
						}
					});	
					swal({    
                    title: "Registro Eliminado",   
                    text: "Fue eliminado el Registro : "+ nom,     
                    timer: 5000,   
					type: "success",  
                    showConfirmButton: false 
                    });
			});
		});
		jQuery(".estado").click(function() { //alert($(this).attr("title"));
			var nom = $(this).attr("title");
			var con = $(this).attr("name");
			var id = $(this).attr("id");
			swal({   
				title: "¿Cancelar la consulta?",   
				text: "Registro : " + nom,   
				type: "warning",   
				showCancelButton: true,
				cancelButtonText: "Cancelar",   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Aceptar",   
				closeOnConfirm: false }, 
				function(){   
					$.ajax({
						url:'<?=base_url(); ?>'+con+"/cambiar_estado",
						// url:'<?=base_url(); ?>'+con+"/"+$("#op").val(),
						type:'POST',
						data:{id:id},
						success: function(respuesta){ //alert(respuesta);
							console.log(respuesta);
							if(respuesta==true){
								document.location.href="<?=base_url()?>"+con+"";
							}else{
								var error=JSON.parse(respuesta);
								console.log(error);
								$('#mensaje').html("<strong>Error! </strong>"+error);
								$("#mensaje").addClass("alert alert-danger");
							}
						}
					});	
					swal({    
                    title: "Registro Cancelado",   
                    text: "Fue Cancelado el Registro : "+ nom,     
                    timer: 3000,   
					type: "success",  
                    showConfirmButton: false 
                    });
			});
		});
		function eliminar(con,id){
			$.ajax({
				url:'<?=base_url(); ?>'+con+"/eliminar/"+id,
				type:'POST',
				data:{id:id},
				success: function(respuesta){ //alert(respuesta);
					var res = respuesta;
					if(respuesta==true){
						/*$("#ventana").modal("hide");
						document.location.href="<?=base_url()?>"+con+"";*/
					}else{
						/*var error=JSON.parse(respuesta);
						console.log(error);
						$('#mensaje').html("<strong>Error! </strong>"+error);
						$("#mensaje").addClass("alert alert-danger");*/
					}
				}
			});	
			alert(res);
		}
    </script>