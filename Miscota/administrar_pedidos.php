<?php 
$tituloPagina = "Administrar Pedidos" ;
$pagina = "administrar_pedidos";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";


        }           

        else {

            header("Location: index.php");
        }
        ?>                             

        <input type="button" class="btn btn-success" value="DESCONECTAR" onclick="location.href='sesion_cerrada.php'"/>

    </form>
</div><!--/.navbar-collapse -->
</div>
</nav>


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Administrar Pedidos</h1>
        <p align="right"><a class="btn btn-primary btn-lg" href="add_pedido.php" role="button">Añadir nuevo Pedido</a></p>
        <p>Añade, Edita y elimina los pedidos de Miscota.</p>

        <?php

        include('conexionbd.php');

        if ($result = $connection->query("select * from pedidos;")); {

            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>FECHA</th>";
            echo "<th>TOTAL</th>";
            echo "<th>COMENTARIO</th>";
            echo "<th>CLIENTES_ID</th>";
            echo "<th>ELIMINAR</th>";
            echo "<th>EDITAR</th>";
            echo "</tr>";
            echo "</thead>";



            while($obj = $result->fetch_object()) { 

                echo "<tr>";
                echo "<td>".$obj->id."</td>";
                echo "<td>".$obj->fecha."</td>";
                echo "<td>".$obj->total."</td>";
                echo "<td>".$obj->comentario."</td>";
                echo "<td>".$obj->Clientes_id."</td>";

                echo "<td><a href='borrar_pedido.php?id=$obj->id'>
                            <img src='img/delete.png';/>
                          </a></td>";

                echo "<td><a href='editar_pedido.php?id=$obj->id'>
                            <img src='img/edit.png';/>
                          </a></td>";

                echo "</tr>";
            }
            echo "</table>";

        }

        ?>


    </div>
</div>
