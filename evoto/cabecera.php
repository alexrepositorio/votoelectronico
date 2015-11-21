<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVe</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<?php 
session_start();
if (empty($_SESSION)) {
   header ('Location: login.php');
    exit (0); 
}else{
    require ('bdd_funciones.php');
    if (voto_registrado()) {
        header ('Location: admin_graficos.php');
    }
}
 ?>
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
                            <li><a href="admin_graficos.php"><img src="images/resultados.png" wifth='40' height='40'>Resultados</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
