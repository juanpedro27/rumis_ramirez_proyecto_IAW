<?php 
$tituloPagina = "Detalle Pedido" ;
$pagina = "detalle_pedido";
include('inc/header.php'); ?>


<div class="jumbotron">
    <div class="container">
        <h1>Detalle Pedidos</h1>
        <hr> 
        <div class='row'>

            <?php


            if (!isset($_SESSION["user"])) {

                echo "<center><p><a href='login.php'>INICIA SESIÓN</a> o <a href='formu_registro.php'>REGISTRATE</a> para realizar la compra</center></p>";


            } else {

                include('conexionbd.php');


                if ($result = $connection->query("select * from pedidos where id= ".$_GET['id']));

                $fecha_actual = date("Y-m-d");


                { 

                    echo "<table class='table table-striped'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>FECHA</th>";
                    echo "<th>TOTAL</th>";
                    echo "<th>COMENTARIO</th>";
                    echo "</tr>";
                    echo "</thead>";



                    while($obj = $result->fetch_object()) { 

                        echo "<form role='form' method='post' enctype='multipart/form-data'>";

                        echo "<tr>";
                        echo "<td>".$fecha_actual."</td>";
                        echo "<td>".$obj->total."</td>";
                        echo "<td>".$obj->comentario."</td>";

                        echo "</tr>";


                        echo "</form>";  
                    }
                    echo "</table>";

                } 

            }
            ?>      


            <?php
            echo "<h3>Añadido correctamente</h3>";

            //CREATING THE CONNECTION
            $connection = new mysqli("localhost", "admin", "1234", "Miscota");
            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            $consulta= "INSERT INTO pedidos VALUES('".$_POST[$fecha_actual]."','".$_POST['total']."','".$_POST['comentario']."','".$_POST['Clientes_id']."')";

            $result = $connection->query($consulta);
            if (!$result) {
                echo "Query Error";
            } else {
                echo "Tu pedido ha sido añadido correctamente";
            }

            ?>


        </div>
    </div>