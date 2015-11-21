<?php
include("static/site_config.php");
include("static/clase_postgres.php");
$act="";
extract($_GET);
$miconexion = new clase_postgres;
$miconexion ->conectar($db_host,$db_port,$db_name,$db_user,$db_password);

session_start();
if (empty($_SESSION)) {
   header ('Location: login.php');
    exit (0); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Datos</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>       
</head>
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
                <a class="navbar-brand" href="index.html">Back to Admin</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="admin_graficos.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li class="selected"><a href="admin_registro.php"><i class="fa fa-list-ul"></i> Registro de Datos </a></li>
                    <li><a href="admin_tablas.php"><i class="fa fa-table"></i > Tablas </a></li>            
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
                            <li><a href="admin_registro.php"><img src="images/tabla.png" wifth='40' height='40'>Tabla de votos</a></li>
                            <li><a href=""><img src="images/resultados.png" wifth='40' height='40'>Resultados</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="col-md-12">
                <div class="col-md-3">
                    <br>
                    <div class="list-group">
                        <a href="admin_registro.php?pid=1"class="list-group-item">Candidato</a>
                        <a href="admin_registro.php?pid=2"class="list-group-item">Cargo</a>
                        <a href="admin_registro.php?pid=3"class="list-group-item">Cliente</a>                        
                        <a href="admin_registro.php?pid=4"class="list-group-item">Correo</a>
                        <a href="admin_registro.php?pid=9"class="list-group-item">Directiva</a>
                        <a href="admin_registro.php?pid=5"class="list-group-item">Lista</a>
                        <a href="admin_registro.php?pid=6"class="list-group-item">Periodo</a>
                        <a href="admin_registro.php?pid=7"class="list-group-item">Titulacion</a>
                        <a href="admin_registro.php?pid=8"class="list-group-item">Voto</a>
                    </div>
                </div>

                <div class="col-md-9">
                    <?php
                    if (@$_GET['pid']==1) {
                        $miconexion->formconsultadmin(1);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(1);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=1'</script>";
                        }
                    }
                    if (@$_GET['pid']==2) {
                        $miconexion->formconsultadmin(2);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(2);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=2'</script>";
                        }
                    }
                    if (@$_GET['pid']==3) {
                        $miconexion->formconsultadmin(3);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(3);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=3'</script>";
                        }
                    }
                    if (@$_GET['pid']==4) {
                        $miconexion->formconsultadmin(4);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(4);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=4'</script>";
                        }
                    }
                    if (@$_GET['pid']==5) {
                        $miconexion->formconsultadmin(5);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(5);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=5'</script>";
                        }
                    }
                    if (@$_GET['pid']==6) {
                        $miconexion->formconsultadmin(6);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(6);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=6'</script>";
                        }
                    }
                    if (@$_GET['pid']==7) {                        
                        $miconexion->formconsultadmin(7);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(7);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=7'</script>";
                        }
                    }
                    if (@$_GET['pid']==8) {
                        $miconexion->formconsultadmin(8);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(8);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=8'</script>";
                        }
                    }
                    if (@$_GET['pid']==9) {
                        $miconexion->formconsultadmin(9);
                        if (@$_POST['bandera']==3) {
                            $miconexion->insertar(9);
                            echo "<script>alert('Datos ingresados')</script>";
                            echo "<script>location.href='admin_registro.php?pid=9'</script>";
                        }
                    }
                    ?>
                </div>
            </div>
      </div>
    </div>
</body>
</html>
