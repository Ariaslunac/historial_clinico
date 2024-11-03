<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistema de Historial Clinico</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/lineicons/style.css">   
    
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style-responsive.css" rel="stylesheet">

    <!--<script src="<?=base_url()?>assets/js/chart-master/Chart.js"></script>-->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">-->
	<link href="<?=base_url()?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    <link href="<?=base_url()?>assets/css/sweetalert.css" rel="stylesheet">
    

<link rel="stylesheet" href="<?=base_url()?>assets/date/bootstrap-datetimepicker.min.css"/>   

<link rel="stylesheet" href="<?=base_url()?>assets/css/jasny-bootstrap.min.css" type="text/css"> 

<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.min.css" type="text/css"> 
<?php
function fecha($fecha)
{
  $F = explode("-",$fecha);
	switch($F[1])
	{
		case "1": $MES = 'Enero'; break;
		case "2": $MES = 'Febrero'; break;
		case "3": $MES = 'Marzo'; break;
		case "4": $MES = 'Abril'; break;
		case "5": $MES = 'Mayo'; break;
		case "6": $MES = 'Junio'; break;
		case "7": $MES = 'Julio'; break;
		case "8": $MES = 'Agosto'; break;
		case "9": $MES = 'Septiembre'; break;
		case "10": $MES = 'Octubre'; break;
		case "11": $MES = 'Noviembre'; break;
		case "12": $MES = 'Diciembre'; break;
	}
  return $F[2]. " de " . $MES . " de " . $F[0];
}
function mes($indice)
{
	switch($indice)
	{
		case "1": $MES = 'Enero'; break;
		case "2": $MES = 'Febrero'; break;
		case "3": $MES = 'Marzo'; break;
		case "4": $MES = 'Abril'; break;
		case "5": $MES = 'Mayo'; break;
		case "6": $MES = 'Junio'; break;
		case "7": $MES = 'Julio'; break;
		case "8": $MES = 'Agosto'; break;
		case "9": $MES = 'Septiembre'; break;
		case "10": $MES = 'Octubre'; break;
		case "11": $MES = 'Noviembre'; break;
		case "12": $MES = 'Diciembre'; break;
	}
  return $MES;
}
function color($i,$t)
{
	switch($i)
	{
		case "1": if($t==1){$color = '#FF0000';}else{$color = '#DC143C';} break;
		case "2": if($t==1){$color = '#DB7093';}else{$color = '#C71585';} break;
		case "3": if($t==1){$color = '#FF7F50';}else{$color = '#FF6347';} break;
		case "4": if($t==1){$color = '#FFFF00';}else{$color = '#FFD700';} break;
		case "5": if($t==1){$color = '#F0E68C';}else{$color = '#BDB76B';} break;
		case "6": if($t==1){$color = '#9400D3';}else{$color = '#8A2BE2';} break;
		case "7": if($t==1){$color = '#6A5ACD';}else{$color = '#483D8B';} break;
		case "8": if($t==1){$color = '#3CB371';}else{$color = '#2E8B57';} break;
		case "9": if($t==1){$color = '#00CED1';}else{$color = '#5F9EA0';} break;
		case "10": if($t==1){$color = '#4169E1';}else{$color = '#0000FF';} break;
		case "11": if($t==1){$color = '#0000CD';}else{$color = '#00008B';} break;
		case "12": if($t==1){$color = '#808080';}else{$color = '#696969';} break;
	}
  return $color;
}
?>