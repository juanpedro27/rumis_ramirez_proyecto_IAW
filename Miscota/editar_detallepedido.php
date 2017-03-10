<?php 
$tituloPagina = "Editar Detalles de Pedidos" ;
$pagina = "editar_detallepedido";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA ADMINISTRAR DETALLE DE PEDIDOS

            echo "<a href='administrar_detallepedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR DETALLES DE PEDIDO'/></a>";


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
        <h1>Administrar Detalles de Pedido</h1>
        <p>Edita los detalles de pedidos.</p>

        <?php

        include('conexionbd.php');
        
        // SELECCION DE LA TABLA DETALLE PEDIDOS MEDIANTE SU ID

        if ($result = $connection->query("select * from detalle_pedidos where id= ".$_GET['id'])); { 

            $depedid=$_GET['id'];
            
            // RECORREMOS LA TABLA PARA SACAR LOS DATOS

            $obj = $result->fetch_object();
            
            // FABRICAMOS EL FORMULARIO DE EDICION

            echo "<center><form role='form' method='post' enctype='multipart/form-data'>";

            echo "<legend>Rellene para editar este pedido:</legend>";
            echo "<div class='form-group'>";
            echo "<label for='id'>ID</label>";
            echo "<input type='number' class='form-control' name='id' value='$obj->id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='cantidad'>Cantidad</label>";
            echo "<input type='number' class='form-control' name='cantidad' value='$obj->cantidad' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='precio'>Precio</label>";
            echo "<input type='number' class='form-control' name='precio' value='$obj->precio' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Pedidos_id'>Id de Pedidos</label>";
            echo "<input type='number' class='form-control' name='Pedidos_id' value='$obj->Pedidos_id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Productos_id'>ID del Productos</label>";
            echo "<input type='number' class='form-control' name='Productos_id' value='$obj->Productos_id' required>";
            echo "</div>";

            echo "<input type='submit' value='Actualizar'>";
            echo "<input type='reset' value='Limpiar'>";

            echo "</form></center>";  


        }  

        if (isset($_POST['id'])) {

            //variables
            $id=$_POST['id'];
            $cantidad=$_POST['cantidad'];
            $precio=$_POST['precio'];
            $Pedidos_id=$_POST['Pedidos_id'];
            $Productos_id=$_POST['Productos_id'];
            
            // CONSULTA PARA INTRODUCIR LOS NUEVOS DATOS

            //consulta
            $consulta="UPDATE detalle_pedidos SET
        `id` =  '$id',
        `cantidad` =  '$cantidad',
        `precio` =  '$precio',
        `Pedidos_id` =  '$Pedidos_id',
        `Productos_id` =  '$Productos_id'
        WHERE  `id` =$depedid;";


            if ($result = $connection->query($consulta))

            {
                header ("Location: detallepedido_editado.php");
            } else {

                echo "Error: " . $result . "<br>" . mysqli_error($connection);
            }
        }



        ?>






    </div>
</div>