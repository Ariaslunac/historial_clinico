<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
          <p class="centered"><div align="center"><a href="<?=base_url()?>" class="hidden-xs"><img src="<?=base_url()?>assets/img/logo.png" class="img-responsive" width="150"></a></div></p>
          <!--<h5 class="centered">Sistema de historial Clinico</h5>-->
          <?php if($this->session->userdata("tipo")==1){ ?>
          <li class="sub-menu">
              <a href="<?=base_url()?>" <?php if($this->router->class=='inicio'){ ?>class="active"<?php } ?>>
                  <i class="fa fa-home"></i>
                  <span>Inicio</span>
              </a>
          </li>
          <?php } ?>
          <li class="sub-menu">
              <a <?php if($this->router->class=='consultas' | $this->router->class=='citas' | $this->router->class=='pacientes' | $this->router->class=='registros'){ ?>class="active"<?php } ?> href="javascript:;" >
                  <i class="fa fa-medkit"></i>
                  <span>Registro de Consulta</span>
              </a>
              <ul class="sub">
                  <?php if($this->session->userdata("tipo")==1 | $this->session->userdata("tipo")==2){ ?>
                  <li <?php if($this->router->class=='registros'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>registros">&raquo; Atención</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata("tipo")==1 | $this->session->userdata("tipo")==3){ ?>
                  <li <?php if($this->router->class=='consultas'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>consultas">&raquo; Consultas</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata("tipo")==1 | $this->session->userdata("tipo")==2){ ?>
                  <li <?php if($this->router->class=='citas'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>citas">&raquo; Citas</a></li>
                  <li <?php if($this->router->class=='pacientes'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>pacientes">&raquo; Pacientes</a></li>
                  <?php } ?>
                  <!--<li <?php if($this->router->class=='agenda'){ ?>class="active"<?php } ?>><a href="#">&raquo; Agenda</a></li>-->
              </ul>
          </li>
          <?php if($this->session->userdata("tipo")==1){ ?>
          <li class="sub-menu">
              <a <?php if($this->router->class=='usuarios' | $this->router->class=='personal'){ ?>class="active"<?php } ?> href="javascript:;" >
                  <i class="fa fa-user-md"></i>
                  <span>Registro Administrativo</span>
              </a>
              <ul class="sub">
                  <li <?php if($this->router->class=='usuarios'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>usuarios">&raquo; Usuarios</a></li>
                  <li <?php if($this->router->class=='personal'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>personal">&raquo; Personal</a></li>
                  <!--<li><a href="#">&raquo; Registro</a></li>-->
              </ul>
          </li>
          <?php } ?>
          <?php if($this->session->userdata("tipo")==1){ ?>
          <li class="sub-menu">
              <a <?php if($this->router->class=='especialidades' | $this->router->class=='patologias' | $this->router->class=='laboratorios' | $this->router->class=='designaciones' | $this->router->class=='consultorios' | $this->router->class=='horarios'){ ?>class="active"<?php } ?> href="javascript:;" >
                  <i class="fa fa-hospital-o"></i>
                  <span>Registro Institucional</span>
              </a>
              <ul class="sub">
                  <li <?php if($this->router->class=='especialidades'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>especialidades">&raquo; Especialidades</a></li>
                  <li <?php if($this->router->class=='patologias'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>patologias">&raquo; Patologias</a></li>
                  <li <?php if($this->router->class=='laboratorios'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>laboratorios">&raquo; Laboratorios</a></li>
                  <li <?php if($this->router->class=='consultorios'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>consultorios">&raquo; Consultorios</a></li>
                  <li <?php if($this->router->class=='horarios'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>horarios">&raquo; Horarios</a></li>
                  <li <?php if($this->router->class=='designaciones'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>designaciones">&raquo; Designación</a></li>
              </ul>
          </li>
          <?php } ?>
          <?php if($this->session->userdata("tipo")==1 | $this->session->userdata("tipo")==3){ ?>
          <li class="sub-menu">
              <a <?php if($this->router->class=='reportes'){ ?>class="active"<?php } ?> href="javascript:;" >
                  <i class="fa fa-file-text-o"></i>
                  <span>Reportes</span>
              </a>
              <ul class="sub">
                  <?php if($this->session->userdata("tipo")==1){ ?>
                  <li <?php if($this->router->method=='consultas'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>reportes/consultas">&raquo; Historial de Consultas</a></li>
                  <?php } ?>
				  <?php if($this->session->userdata("tipo")==1 | $this->session->userdata("tipo")==3){ ?>
                  <li <?php if($this->router->method=='pacientes'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>reportes/pacientes">&raquo; Historial de Pacientes</a></li>
                  <?php } ?>
                  <!--<li><a href="#">Historial de Laboratorios</a></li>
                  <li><a href="#">Historial de Especialidades</a></li>-->
                  <?php if($this->session->userdata("tipo")==1){ ?>
                  <li <?php if($this->router->method=='personal'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>reportes/personal">&raquo; Historial de Personal</a></li>
                  <?php } ?>
              </ul>
          </li>
          <?php } ?>
          <?php if($this->session->userdata("tipo")==1){ ?>
          <li class="sub-menu">
              <a <?php if($this->router->class=='estadisticas'){ ?>class="active"<?php } ?> href="javascript:;" >
                  <i class=" fa fa-bar-chart-o"></i>
                  <span>Estadisticas</span>
              </a>
              <ul class="sub">
                  <li <?php if($this->router->method=='consultas'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>estadisticas/consultas">&raquo; Por Consultas</a></li>
                  <li <?php if($this->router->method=='especialidades'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>estadisticas/especialidades">&raquo; Por Especialidades</a></li>
                  <li <?php if($this->router->method=='laboratorios'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>estadisticas/laboratorios">&raquo; Por Laboratorios</a></li>
                  <li <?php if($this->router->method=='patologias'){ ?>class="active"<?php } ?>><a href="<?=base_url()?>estadisticas/patologias">&raquo; Epidemiologico</a></li>
              </ul>
          </li>
		  <?php } ?>
      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>