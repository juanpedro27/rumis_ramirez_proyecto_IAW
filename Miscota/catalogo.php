<?php 
$tituloPagina = "Catalogo" ;
$pagina = "catalogo";
include('inc/header.php'); ?>


<div class="jumbotron">
    <div class="container">
        <h1>Echa un vistazo</h1>
        <hr>
        <p>Catalogo.</p>

        <div class='row'> 

            <?php

            include('conexionbd.php');
            
            // SELECCIONAMOS TANTO LA TABLA CATEGORIAS COMO LA DE PRODUCTOS

            if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id;")); {
                
                // RECORREMOS MEDIANTE UN BUCLE AMBAS TABLAS PARA MOSTRAR LOS DATOS REQUERIDOS

                while($obj = $result->fetch_object()) { 

                    echo "<div class='col-md-4'>"; 
                    echo "<h2>".$obj->nombre."</h2>";
                    echo "<hr>";
                    echo "<p>".$obj->descripcion."</p>";
                    echo "<img src='".$obj->imagen."' WIDTH=300 HEIGHT=300 BORDER=2 >";
                    echo "<center><a class='btn btn-default' href='detalles.php?id=$obj->id' role='button'>Ver detalles &raquo;</a></center>";


                    echo "</div>";                

                }

            }

            ?>


        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>




