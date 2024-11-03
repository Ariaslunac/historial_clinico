<!DOCTYPE html>
<html lang="en">
  <head><?php $this->load->view('includes/head.php')?></head>
  <body>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="<?=base_url("login/validar")?>" id="form-login" method="post">
		        <h2 class="form-login-heading">Login de Usuarios</h2>
		        <div class="login-wrap">
		            <img src="<?=base_url()?>assets/img/logo.png" class="img-responsive" style="padding:0 10px 20px 10px">
                    <input type="text" name="usuario" class="form-control" placeholder="Codigo de Usuario" autofocus required>
		            <br>
		            <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
		            <!--<label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>-->
                    <br>
                    <div id="mensaje"></div>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> INGRESAR</button>
		            <!--<hr>-->
		            
		            <!--<div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div>-->
		
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?=base_url()?>assets/img/login-bg.jpg", {speed: 500});
		$("#form-login").submit(function (event){
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			$.ajax({
				url:$(this).attr("action"),
				type:'POST',
				data:formData,
				cache:false,
				contentType:false,
				processData:false,
				success: function(data){
					//alert(data);
					if(data<4){
						 $('#mensaje').html("Datos Verificados correctamente. Ingresando al Sistema...");
						 if(data==1){
						 	 window.location.href = "<?php echo base_url(); ?>";	
						 } else if(data==2){
							 window.location.href = "<?php echo base_url("registros"); ?>";	
						 } else if(data==3){
							 window.location.href = "<?php echo base_url("consultas"); ?>";	
						 }
					}else{
						 $('#mensaje').html("Ingrese datos validos por favor");
					}
				}
			});
		});
    </script>

  </body>
</html>
