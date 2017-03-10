<?php 
$tituloPagina = "Detalles Pedidos" ;
$pagina = "detalles";
include('inc/header.php'); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Detalles del producto</h1>
        <hr> 

        <?php

        // SI NO HAY UNA SESION INICIADA OBLIGA A INICIARSE O A REGISTRARSE

        if (!isset($_SESSION["user"])) {

            echo "<center><p><a href='login.php'>INICIA SESIÓN</a> o <a href='formu_registro.php'>REGISTRATE</a> para poder ver los detalles de este producto o realizar la compra. Gracias</center></p>";


        } else {


            include('conexionbd.php');

            // DECLARACION DE LAS VARIABLES

            if(isset($_POST['insertarPedido'])){
                $nombreUsuario = $_SESSION["user"];
                $idCliente;
                $idPedido = 'NULL';  
                $fecha = date("Y-m-d");
                $total = 0;
                $comentario = "";

                $cantidad = 1;
                $precio;
                $iddepedido;
                $Productosid;

                // Consulta - Obtener ID usuario a partir de su nombre
                if ($result = $connection->query("select * from clientes where usuario = '$nombreUsuario'")){
                    $obj = $result->fetch_object();

                    $idCliente = $obj->id;

                }

                // Consulta - Obtener el precio e id del producto
                if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id where productos.id= ".$_GET['id'])){
                    $obj = $result->fetch_object();

                    $precio = $obj->precio;
                    $Productosid = $obj->id; 

                }

                // Insertar en pedido
                $consulta = "insert into pedidos values($idPedido, '$fecha', $total, '$comentario', $idCliente)";

                $result = $connection->query($consulta);

                if(!$result) {

                    echo "Consulta mal formada";

                }else {

                    echo "Query Error";                  

                }

                // Consulta - Obtener el id del pedido actual
                if ($result = $connection->query("select * from pedidos where Clientes_id= '$idCliente'")){
                    $obj = $result->fetch_object();
                    $iddepedido = $obj->id; 
                } 
                
                // Insertar en detalle de pedidos
                $consulta1 = "insert into detalle_pedidos values('NULL', $cantidad, $precio, '$iddepedido', $Productosid)";

                $result1 = $connection->query($consulta1);

                if($result1) {
                    
                    header('Location: compra_finalizada.php');
                    
                }else {
                    
                    echo "Query Error";

                }
                
            }
        }

        // SELECCION DE LOS CAMPOS A MOSTRAR MEDIANTE LAS TABLAS DE CATEGORIA Y PRODUCTO

        if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id where productos.id= ".$_GET['id'])){

            while($obj = $result->fetch_object()) {
                echo "<form method='post'>";
                echo "<h2>".$obj->nombre."</h2>";
                echo "<h3><b>Descripción: </b>".$obj->descripcion."</h3>";
                echo "<h3><b>Categoría: </b>".$obj->nombre_cat."</h3>";
                echo "<img src='".$obj->imagen."' WIDTH=300 HEIGHT=300 BORDER=2 >";
                echo "<h3><b>Precio: </b>".$obj->precio. "€</h3>";
                echo "<input type='submit' class='btn btn-default' name='insertarPedido' value='Comprar'>";
                echo "</form>";

            }
        }

        ?> 

    </div>
</div>
<?php include('inc/footer.php'); ?>