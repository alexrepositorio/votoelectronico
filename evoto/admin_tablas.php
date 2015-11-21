<?php
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
session_start();
if (empty($_SESSION)) {
   header ('Location: login.php');
    exit (0); 
}
 ?>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Inicio</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="admin_graficos.php"><i class="fa fa-bullseye"></i> Resultados</a></li>
                    <li><a href="admin_registro.php"><i class="fa fa-list-ul"></i> Registro de Datos </a></li>
                    <li class="selected"><a href="admin_tablas.php"><i class="fa fa-table"></i> Tablas </a></li>           
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['cuenta'];  ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php 
                            if ($_SESSION['acceso']=='admin') {
                                echo "<li><a href=''><img src='images/configuracion.png' wifth='40' height='40'>Administrar</a></li>";
                            }
                             if ($_SESSION['acceso']=='estudiante') {
                                echo "<li><a href=''><img src='images/voto.png' wifth='40' height='40'>Votar</a></li>";
                             }
                         ?>
                    
                            <li><a href="admin_graficos.php"><img src="images/resultados.png" wifth='40' height='40'>Resultados</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="col-md-12">
                <div>
                    <br>                    
                    <p>
                        <div class="btn-group btn-group-justified">
                            <a href="admin_tablas.php?pid=1"class="btn btn-default">Candidato</a>
                            <a href="admin_tablas.php?pid=2"class="btn btn-default">Cargo</a>
                            <a href="admin_tablas.php?pid=3"class="btn btn-default">Cliente</a>
                            <a href="admin_tablas.php?pid=4"class="btn btn-default">Correo</a>
                            <a href="admin_tablas.php?pid=9"class="btn btn-default">Directiva</a>
                            <a href="admin_tablas.php?pid=5"class="btn btn-default">Lista</a>
                            <a href="admin_tablas.php?pid=6"class="btn btn-default">Periodo</a>
                            <a href="admin_tablas.php?pid=7"class="btn btn-default">Titulacion</a>
                            <a href="admin_tablas.php?pid=8"class="btn btn-default">Voto</a>
                        </div>
                    </p>
                </div>

                <br>
                <div>
                    <div>
                    </div>

                    <table id='example' class='display' cellspacing='0' width='100%'>
                        <thead>
                            <tr>
                                <?php
                                if (@$_GET['pid']==1) {
                                    $miconexion ->verconsultadmin2(1);
                                }
                                if (@$_GET['pid']==2) {                                    
                                    $miconexion ->verconsultadmin2(2);
                                }
                                if (@$_GET['pid']==3) {                                    
                                    $miconexion ->verconsultadmin2(3);
                                }
                                if (@$_GET['pid']==4) {                                    
                                    $miconexion ->verconsultadmin2(4);
                                }
                                if (@$_GET['pid']==5) {                                    
                                    $miconexion ->verconsultadmin2(5);
                                }
                                if (@$_GET['pid']==6) {                                    
                                    $miconexion ->verconsultadmin2(6);
                                }
                                if (@$_GET['pid']==7) {                                    
                                    $miconexion ->verconsultadmin2(7);
                                }
                                if (@$_GET['pid']==8) {                                    
                                    $miconexion ->verconsultadmin2(8);
                                }
                                ?>
                                <th><b>Borrar</b></th>
                                <!-- <th><b>Editar</b></th> -->
                                
                            </tr>
                        </thead>
                        <tbody style='color:black'>
                            <?php
                            if (@$_GET['pid']==1) {
                                $miconexion ->verconsultadmin(1);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(1,$_GET['id']);
                                    $miconexion ->verconsultadmin(1);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=1'</script>";
                                }
                            }
                            if (@$_GET['pid']==2) {
                                $miconexion ->verconsultadmin(2);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(2,$_GET['id']);
                                    $miconexion ->verconsultadmin(2);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=2'</script>";
                                }
                            }
                            if (@$_GET['pid']==3) {
                                $miconexion ->verconsultadmin(3);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(3,$_GET['id']);                                    
                                    $miconexion ->verconsultadmin(3);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=3'</script>";
                                }
                            }
                            if (@$_GET['pid']==4) {
                                $miconexion ->verconsultadmin(4);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(4,$_GET['id']);                                    
                                    $miconexion ->verconsultadmin(4);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=4'</script>";
                                }
                            }
                            if (@$_GET['pid']==5) {
                                $miconexion ->verconsultadmin(5);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(5,$_GET['id']);
                                    $miconexion ->verconsultadmin(5);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=5'</script>";
                                }
                            }
                            if (@$_GET['pid']==6) {
                                $miconexion ->verconsultadmin(6);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(6,$_GET['id']);                                    
                                    $miconexion ->verconsultadmin(6);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=6'</script>";
                                }
                            }
                            if (@$_GET['pid']==7) {
                                $miconexion ->verconsultadmin(7);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(7,$_GET['id']);
                                    $miconexion ->verconsultadmin(7);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=7'</script>";
                                }
                                //Editar
                                /*
                                if (@$_GET['act']==2) {
                                    $miconexion->formedicionadmin(7,$_GET['id']);
                                    $a=$_GET['id'];
                                    if(isset($_POST['Submit'])){
                                        echo "boton clikeado";
                                        $miconexion->consulta("update titulacion set titulacion='".$_POST['titulacion']."' where id_titulacion='".$_POST['id']."'");
                                        $a=$miconexion->consulta("update titulacion set titulacion='".$_POST['titulacion']."' where id_titulacion='".$_POST['id']."'");
                                                                    echo "$a"." 296_admin_tablas";  
                                    }
                                }*/

                            }
                            if (@$_GET['pid']==8) {
                                $miconexion ->verconsultadmin(8);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(8,$_GET['id']);
                                    $miconexion ->verconsultadmin(8);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=8'</script>";
                                }
                            }
                            if (@$_GET['pid']==9) {
                                $miconexion ->verconsultadmin(9);
                                //Eliminar
                                if (@$_GET['act']==1) {
                                    $miconexion ->eliminar(9,$_GET['id']);
                                    $miconexion ->verconsultadmin(9);
                                    echo "<script>alert('Los datos se han eliminado')</script>";
                                    echo "<script>location.href='admin_tablas.php?pid=8'</script>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>                   
                </div>
            </div>
      </div>
    </div>
</body>
</html>
