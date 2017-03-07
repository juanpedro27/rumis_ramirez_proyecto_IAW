<?php 
$tituloPagina = "Añadir Detalle de Pedido" ;
$pagina = "add_detallepedido";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">

    <form class="navbar-form navbar-right" role="form">

        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");

        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='administrar_detallepedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR DETALLES DE PEDIDO'/></a>";

        }           

        else {

            header("Location: index.php");

        }
        
        ?>                             

        <input type="button" class="btn btn-success" value="DESCONECTAR" onclick="location.href='sesion_cerrada.php'"/>

    </form>

</div>

</div>

</nav>

<div class="jumbotron">

    <div class="container">

        <h1>Administrar Detalles de Pedido</h1>

        <p>Rellene el siguiente formulario para añadir un nuevo detalle de pedido.</p>

        <?php  

        if (!isset($_POST["id"])) : ?>

        <center>

            <form role="form" method="post" enctype="multipart/form-data">

                <legend>Rellene el siguiente formulario:</legend>

                <div class="form-group">               
                    <label for="id">ID</label>               
                    <input type="number" class="form-control" name="id" placeholder="Introduce ID" required>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" placeholder="Introduce cantidad" required>
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" placeholder="Introduce el precio" required>
                </div>

                <div class="form-group">
                    <label for="Pedidos_id">Id de Pedido</label>
                    <input type="number" class="form-control" name="Pedidos_id" placeholder="Añade un ID de Pedido" required>
                </div> 

                <div class="form-group">
                    <label for="Productos_id">Id de Producto</label>
                    <input type="number" class="form-control" name="Productos_id" placeholder="Introduce ID de Producto" required>
                </div>

                <span><input type="submit" value="AÑADIR"></span>
                
                <br>
                
                <br>
                
                <span><input type="reset" value="LIMPIAR"></span>

            </form>

        </center>

        <?php else: ?>

        <?php

        include('conexionbd.php');          

        $id=$_POST['id'];

        $consulta= "INSERT INTO detalle_pedidos VALUES('$id','".$_POST['cantidad']."','".$_POST['precio']."','".$_POST['Pedidos_id']."','".$_POST['Productos_id']."')";

        $result = $connection->query($consulta);

        if (!$result) {

            echo "Query Error";

        } else {

            echo "Tu Detalle de Pedido ha sido añadido correctamente";
        }

        ?>

        <?php endif ?>   

    </div>
    
</div>