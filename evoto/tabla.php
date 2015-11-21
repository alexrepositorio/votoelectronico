<?php 
//include ('cabecera.php');
include("static/site_config.php");
include("static/clase_postgres.php");
$act="";
extract($_GET);
$miconexion = new clase_postgres;
$miconexion ->conectar($db_host,$db_port,$db_name,$db_user,$db_password);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
      <!-- jQuery Popup Overlay -->
  <link rel="stylesheet" type="text/css" href="DataTables-1.10.7/media/css/jquery.dataTables.css">
  <!-- jQuery -->
  <script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.js"></script>
  <!-- DataTables -->
  <script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "pagingType": "full_numbers"
  });
});
</script>    
</head>
<?php 
include('bdd_funciones.php');
session_start();
if (empty($_SESSION)) {
   header ('Location: login.php');
    exit (0); 
}
 ?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['cuenta'];  ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php 
                            if ($_SESSION['acceso']=='admin') {
                                echo "<li><a href=''><img src='images/configuracion.png' wifth='40' height='40'>Administrar</a></li>";
                            }
                             if ($_SESSION['acceso']=='estudiante'&& !voto_registrado()) {
                                echo "<li><a href=''><img src='images/voto.png' wifth='40' height='40'>Votar</a></li>";
                             }
                         ?>
                            <li><a href=""><img src="images/tabla.png" wifth='40' height='40'>Tabla de votos</a></li>
                            <li><a href=""><img src="images/resultados.png" wifth='40' height='40'>Resultados</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

				<table id='example' class='display' cellspacing='0' width='100%'>
                        <thead>
                            <tr>
                            <?php $miconexion ->verconsultabla(10); ?>	                              
                            </tr>
                        </thead>
                        <tbody style='color:black'>
                            <?php
                            	$miconexion ->mostrartabla(10);
                            ?>
                        </tbody>
                    </table>   




