<?php 
$tituloPagina = "Añadir Pedido" ;
$pagina = "add_pedido";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">

    <form class="navbar-form navbar-right" role="form">

        <?php

        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");                                              

        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA ADMINISTRAR PEDIDOS

            echo "<a href='administrar_pedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR PEDIDOS'/></a>";

        }           

        else { // SI LA SESIÓN ES LA DE UN USUARIO NORMAL TIPO1 REDIRIGE A INDEX

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

        <h1>Administrar Pedidos</h1>

        <p>Rellene el siguiente formulario para añadir un pedido nuevo.</p>

        <?php  
        
        // INTRODUCCIÓN DE LOS DATOS MEDIANTE FORMULARIO

        if (!isset($_POST["id"])) : ?>

        <center>

            <form role="form" method="post" enctype="multipart/form-data">

                <legend>Rellene el siguiente formulario:</legend>

                <div class="form-group">            
                    <label for="id">ID</label>
                    <input type="number" class="form-control" name="id" placeholder="Introduce ID" required>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" placeholder="Introduce fecha" required>
                </div>

                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" class="form-control" name="total" placeholder="Introduce el total" required>
                </div>

                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <textarea rows="5" class="form-control" name="comentario" placeholder="Añade un comentario" required></textarea>
                </div> 

                <div class="form-group">
                    <label for="Clientes_id">Id de Cliente</label>
                    <input type="number" class="form-control" name="Clientes_id" placeholder="Introduce ID de cliente" required>
                </div>
                
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" placeholder="Introduce la Cantidad" required>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" placeholder="Introduce el precio" required>
                </div>
                
                <div class="form-group">
                    <label for="Productos_id">Id de Producto</label>
                    <input type="number" class="form-control" name="Productos_id" placeholder="Introduce el Id del Producto" required>
                </div>

                <span><input type="submit" value="AÑADIR"></span>

                <br>

                <br>

                <span><input type="reset" value="LIMPIAR"></span>

            </form>

        </center>         

        <?php else: ?>        

        <?php
        
        // INSERCCIÓN DE LOS DATOS PROCEDENTES DEL FORMULARIO POR METODO POST

        include('conexionbd.php');            

        $id=$_POST['id'];

        $consulta= "INSERT INTO pedidos VALUES('$id','".$_POST['fecha']."','".$_POST['total']."','".$_POST['comentario']."','".$_POST['Clientes_id']."')";
        
        $consulta1= "INSERT INTO detalle_pedidos VALUES('$id','".$_POST['cantidad']."','".$_POST['precio']."','$id','".$_POST['Productos_id']."')";

        $result = $connection->query($consulta);
        
        $result1 = $connection->query($consulta1);

        if ($result and $result1) {

            echo "El pedido ha sido añadido correctamente";

        } else {

            echo "Query Error";

        }

        ?>

        <?php endif ?>   

    </div>

</div>
