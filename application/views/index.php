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
                    <!--<div class="col-sm-12"><div align="center"><img src="<?=base_url()?>assets/img/logo.png" class="img-responsive" vspace='20' style="max-height:100px"></div></div>-->
                    <div class="col-sm-6 col-md-15">
                         <div class="card">
                            <div class="card-content text-justify">
                                <div class="icono" align="center"><i class="fa fa-medkit"></i></div>
                                <h2 align="center">Registro de Consultas</h2>
                                <ul>
                                  <li><a href="<?=base_url()?>registros">Atención</a></li>
                                  <li><a href="<?=base_url()?>consultas">Consultas</a></li>
                                  <li><a href="<?=base_url()?>citas">Citas</a></li>
                                  <li><a href="<?=base_url()?>pacientes">Pacientes</a></li>
                                  <!--<li><a href="#">Agenda</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-15">
                        <div class="card">
                            <div class="card-content text-justify">
                                <div class="icono" align="center"><i class="fa fa-user-md"></i></div>
                                <h2 align="center">Registro Administrativo</h2>
                                <ul>
                                  <li><a href="<?=base_url()?>usuarios">Usuarios</a></li>
                                  <li><a href="<?=base_url()?>personal">Personal</a></li>
                                  <!--<li><a href="#">Registro</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-15">
                        <div class="card">
                            <div class="card-content text-justify">
                                <div class="icono" align="center"><i class="fa fa-hospital-o"></i></div>
                                <h2 align="center">Registro Institucional</h2>
                                <ul>
                                  <li><a href="<?=base_url()?>especialidades">Especialidades</a></li>
                                  <li><a href="<?=base_url()?>patologias">Patologias</a></li>
                                  <li><a href="<?=base_url()?>laboratorios">Laboratorios</a></li>
                                  <li><a href="<?=base_url()?>designaciones">Registro</a></li>
                                  <li><a href="<?=base_url()?>consultorios">Consultorios</a></li>
                                  <li><a href="<?=base_url()?>horarios">Horarios</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-15">
                        <div class="card">
                            <div class="card-content text-justify">
                                <div class="icono" align="center"><i class="fa fa-file-text-o"></i></div>
                                <h2 align="center">Reportes</h2>
                                <ul>
                                  <li><a href="<?=base_url()?>reportes/consultas">Historial de Consultas</a></li>
                                  <li><a href="<?=base_url()?>reportes/pacientes">Historial de Pacientes</a></li>
                                  <li><a href="<?=base_url()?>reportes/personal">Historial de Personal</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-15">
                        <div class="card">
                            <div class="card-content text-justify">
                                <div class="icono" align="center"><i class="fa fa-bar-chart-o"></i></div>
                                <h2 align="center">Estadisticas</h2>
                                <ul>
                                  <li><a href="<?=base_url()?>estadisticas/consultas">Por Consultas</a></li>
                                  <li><a href="<?=base_url()?>estadisticas/especialidades">Por Especialidades</a></li>
                                  <li><a href="<?=base_url()?>estadisticas/laboratorios">Por Laboratorios</a></li>
                                  <li><a href="<?=base_url()?>estadisticas/patologias">Epidemiologico</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-sm-12"><div align="center"><img src="<?=base_url()?>assets/img/logo.png" class="img-responsive" vspace='20' style="max-height:200px"></div></div>-->
              </div>
          </section>
      </section>
      <?php $this->load->view('includes/footer.php')?>
  </section>
  </body>
</html>
<?php $this->load->view('includes/scripts.php')?>
<style type="text/css">
div.card{
    box-shadow: 0px 2px 20px rgba(000, 000, 000, 0.2);
    width: 100%;
	height:100%;
    background-color: #FFF;
    border-radius:5px;
    overflow: hidden;
    margin:10px 0 10px 0;
	border:1px solid #CCC;
	padding:20px 15px 15px 15px;
	/*cursor:pointer;*/
}

div.card div.icono{
	font-size:100pt;
	margin:0;
	padding:0;
}
div.card:hover{
    box-shadow: 0px 2px 30px rgba(000, 000, 000, 0.3);
    width: 100%;
    background-color:#F6F5EF;
    border-radius:12px;
    overflow: hidden;
    margin:5px 0 15px 0;
	border:1px solid #DDD;
}
div.card h3 {
	font-size: 1.2em;
	font-weight: bold;
	color:#333;
	margin: 0px 0px .3em 0px;
	padding:0;
	text-shadow:#CCC 2px 2px 2px;
	-moz-text-shadow:0 3px 3px #CCC;
	-webkit-text-shadow: 0 3px 3px #CCC;
}
div.card ul{
	padding:5px 20px 0 20px;
	margin:0;
}
div.card ul li{
	list-style:circle;
	padding:5px 0;
	margin:0;
}
div.card a{
    color: #333;
	font-size:15px;
	text-decoration:underline;
}
div.card a:hover{
	text-decoration:none;
	color:#666;
	font-weight:bold;
}
.col-xs-15,
.col-sm-15,
.col-md-15,
.col-lg-15 {
    position: relative;
    min-height: 1px;
    padding-right: 10px;
    padding-left: 10px;
}
.col-xs-15 {
    width: 20%;
    float: left;
}
@media (min-width: 768px) {
.col-sm-15 {
        width: 20%;
        float: left;
    }
div.card{
	height:550px;
}
}
@media (min-width: 992px) {
    .col-md-15 {
        width: 20%;
        float: left;
    }
}
@media (min-width: 1200px) {
    .col-lg-15 {
        width: 20%;
        float: left;
    }
}
</style>

