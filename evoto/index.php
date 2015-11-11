<?php 
include ('cabecera.php');
include ('bdd_funciones.php');
 ?>
    <body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Bienvenido <small>Al sistema de votación electrónica</small></h1>
                    <div class="alert alert-dismissable alert-warning">
                        <button data-dismiss="alert" class="close" type="button">&times;</button>
                        A travez del presente portal puede realizar su votación al hacer clic en su candidato favorito para 
                        cada uno de los cargos. 
                        <br />
                        Despues de realizar el voto le enviaremos un correo donde podrá verificar su voto.
                    </div>
                </div>
            </div>
            <?php 
                $cargos=consultar_cargos();
                if ($cargos==0) {
                    echo "No hay cargos registrados";
                }else{
                    foreach ($cargos as $cargo) {
                    $candidatos=consultarcandidatosporcargo($cargo);
                    if ($candidatos==0) {
                        echo "No hay candidatos para el cargo";
                    }else{
                        echo "<div>";
                        echo "<h3>Candidatos para el cargo de:".$cargo."<h3>";
                        foreach ($candidatos as $candidato) {
                            $id_candidato=$candidato['id_candidato'];
                            echo "<article>";
                                echo "<figure>";
                                    //echo "<img src=candidato['img']>";
                                echo "<figure>";
                                echo "<h2>Descripcion <h2>";
                                echo "<p> Nombre:".$candidato['candidato']."</br>
                                          Descripcion:".$candidato['descripcion'];
                            echo "</article>";  
                        }
                        echo "</div>";
                    }
                }
            }
            ?>
    <!-- /#wrapper -->
    </body>
</html>
