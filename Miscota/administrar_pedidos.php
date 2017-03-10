<?php 
$tituloPagina = "Administrar Pedidos" ;
$pagina = "administrar_pedidos";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA CATALOGO DE ADMINISTRADOR

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";


        }           

        else { // SI LA SESIÓN ES LA DE UN USUARIO NORMAL TIPO1 REDIRIGE A INDEX

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
        
        // MOSTRAMOS MEDIANTE UNA TABLA LOS DATOS DE LA TABLA PEDIDOS Y DETALLE_PEDIDOS

        include('conexionbd.php');

        if ($result = $connection->query("select * from pedidos join detalle_pedidos on pedidos.id=detalle_pedidos.Pedidos_id;")); {
            

            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>FECHA</th>";
            echo "<th>TOTAL</th>";
            echo "<th>COMENTARIO</th>";
            echo "<th>CLIENTES_ID</th>";
            echo "<th>CANTIDAD</th>";
            echo "<th>PRECIO</th>";
            echo "<th>PEDIDO_ID</th>";
            echo "<th>PRODUCTO_ID</th>";
            echo "<th>ELIMINAR</th>";
            echo "<th>EDITAR</th>";
            echo "</tr>";
            echo "</thead>";



            while($obj = $result->fetch_object()) { 

                echo "<tr>";
                echo "<td>".$obj->Pedidos_id."</td>";
                echo "<td>".$obj->fecha."</td>";
                echo "<td>".$obj->total."</td>";
                echo "<td>".$obj->comentario."</td>";
                echo "<td>".$obj->Clientes_id."</td>";
                echo "<td>".$obj->cantidad."</td>";
                echo "<td>".$obj->precio."</td>";
                echo "<td>".$obj->Pedidos_id."</td>";
                echo "<td>".$obj->Productos_id."</td>";

                echo "<td><a href='borrar_pedido.php?id=$obj->Pedidos_id'>
                            <img src='img/delete.png';/>
                          </a></td>";

                echo "<td><a href='editar_pedido.php?id=$obj->Pedidos_id'>
                            <img src='img/edit.png';/>
                          </a></td>";

                echo "</tr>";
            }
            echo "</table>";

        }

        ?>


    </div>
</div>
