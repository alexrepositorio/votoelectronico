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
    <title>Tablas</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
  <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <link rel="stylesheet" type="text/css" href="DataTables-1.10.7/media/css/jquery.dataTables.css">
  <!-- jQuery -->
  
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
                <a class="navbar-brand" href="index.php">inicio</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="selected"><a href="admin_graficos.php"><i class="fa fa-bullseye"></i> Resultados</a></li>   
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['cuenta'];  ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php 
                            if ($_SESSION['acceso']=='admin') {
                                echo "<li><a href='admin_tablas.php'><img src='images/configuracion.png' wifth='40' height='40'>Administrar</a></li>";
                            }
                             if ($_SESSION['acceso']=='estudiante') {
                                echo "<li><a href='index.php'><img src='images/voto.png' wifth='40' height='40'>Votar</a></li>";
                             }
                         ?>
                            <li><a href=""><img src="images/tabla.png" wifth='40' height='40'>Tabla de votos</a></li>
                            <li><a href="admin_graficos.php"><img src="images/resultados.png" wifth='40' height='40'>Resultados</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="row">
            <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Tabla de Votos </h3>
                        </div>
                        <div class="panel-body">
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h1> <small> Resultados </small></h1>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Resultados de las Elecciones </h3>
                        </div>
                    <div class="panel-body">
                        <?php
                            $array_barras=$miconexion->barras2('presidente ');
                        ?>
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Resultados de las Elecciones </h3>
                        </div>
                    <div class="panel-body">
                        <?php
                            $array_dona=$miconexion->dona();
                        ?>
                        <div id="morris-bar-chart"></div>
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>   
    <script type="text/javascript">
    $(function() {
        var array_dona=<?php echo json_encode($array_dona);?>;
        var array_barras=<?php echo json_encode($array_barras);?>;

        Morris.Donut({
            element: 'morris-donut-chart',
            data: array_dona,
            resize: true
        });
/*
        Morris.Bar({
            element: 'morris-bar-chart',
            data: array_barras,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true
        });*/
        Morris.Bar({
            element: 'morris-bar-chart',
            data: array_barras,
            xkey: 'x',
            ykeys: ['y'],
            labels: ['Y'],
            barColors: function (row, series, type) {
            if (type === 'bar') {
              var red = Math.ceil(255 * row.y / this.ymax);
              return 'rgb(' + red + ',0,0)';
            }
            else {
              return '#000';
            }
          }
        });


    });
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
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
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
</body>
</html>
