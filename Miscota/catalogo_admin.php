<?php 
$tituloPagina = "Catalogo Admin" ;
$pagina = "catalogo_admin";
include('inc/header2.php'); 
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA CATALOGO ADMINISTRADOR

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='BIENVENIDO ADMIN'/></a>";


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

<div class="jumbotron">
    <div class="container">
        <h1>Bienvenido como Administrador</h1>
        <hr>
        <p>Aquí podras hacer modificaciones en la Aplicación.</p>
        <center><p><a class="btn btn-primary btn-lg" href="add_productos.php" role="button">Añadir nuevo Producto</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_clientes.php" role="button">Administrar Clientes</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_pedidos.php" role="button">Administrar Pedidos</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_detallepedidos.php" role="button">Administrar Detalles de Pedidos</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_categorias.php" role="button">Administrar Categorías</a></p></center>
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
                    echo "<p><a class='btn btn-default' href='borrar_productos.php?id=$obj->id' role='button'>Eliminar Producto &raquo;</a>&nbsp<a class='btn btn-default' href='editar_producto.php?id=$obj->id' role='button'>Editar Producto &raquo;</a></p>";

                    echo "</div>";                

                }

            }

            ?>


        </div>
    </div>
</div>



