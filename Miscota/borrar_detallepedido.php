<?php 
$tituloPagina = "Borrar Detalles de Pedido" ;
$pagina = "borrar_detallepedido";
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

<?php

include('conexionbd.php');

// HACE QUE EL ARRAY SE CONVIERTA EN EL ID de DETALLE DE PEDIDOS.

foreach ($_GET as $key => $id)
    
    // SELECCIONAMOS EL DETALLE DE PEDIDO POR SU ID

    if ($result1 = $connection->query("SELECT * FROM detalle_pedidos where id=$id;")) {

        // BORRADO DEL DETALLE DE PEDIDO
        
        if ($result6 = $connection->query("DELETE FROM detalle_pedidos where id=$id;")) {  

            echo "<center><h3>El Detalle de pedido $id ha sido borrado.</h3></center>";



        }

    }



?>