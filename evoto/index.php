<?php 
include ('cabecera.php');
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
                echo "<form action='votar.php' method='post'>";
                if ($cargos==0) {
                    echo "No hay cargos registrados";
                }else{
                    foreach ($cargos as $cargo) {
                    $candidatos=consultarcandidatosporcargo($cargo['cargo']);
                    echo "<h3>Candidatos para el cargo de:".$cargo['cargo']."<h3>";
                    if ($candidatos==0) {
                        echo "No hay candidatos para el cargo";
                    }else{
                         echo "<section>";
                        foreach ($candidatos as $candidato) {
                            $id_candidato=$candidato['id_candidato'];
                            echo "<article class='cursos css'>";
                            echo "<figure>";
                                echo "<img src='http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-2/128/man-icon.png'>";
                            echo "</figure>"; 
                                echo "<div><span class='tipo'>";
                                echo "<h2>Descripcion <h2>";
                                echo "<p> Nombre:".$candidato['candidato']."</br>
                                          Descripcion:".$candidato['descripcion']."</br>
                                          Lista:".$candidato['lista'];
                                echo "</div>";
                                echo "<input type='radio' name='".trim($cargo['cargo'])."' value=".$id_candidato."> Votar";
                            echo "</article>";  
                        }
                        echo "</section>";
                    }  
                }   
            }
            echo "<input class='btn btn-info' type='submit' value='votar'>";
            echo "<form>";
      
            ?>
    <!-- /#wrapper -->
    </div>
    </body>
</html>
