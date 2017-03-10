<?php 
$tituloPagina = "Borrar Pedido" ;
$pagina = "borrar_pedido";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA ADMINISTRAR PEDIDOS

            echo "<a href='administrar_pedidos.php'><input type='button' class='btn btn-success' value='VUELVE A ADMINISTRAR PEDIDOS'/></a>";


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

// HACE QUE EL ARRAY SE CONVIERTA EN EL ID de PEDIDOS.

foreach ($_GET as $key => $id)
    
    // SELECCIONAMOS EL PEDIDO POR SU ID

    if ($result1 = $connection->query("SELECT * FROM pedidos where id=$id;")) {

        // BORRADO DEL PEDIDO

        if ($result6 = $connection->query("DELETE FROM pedidos where id=$id;")) {  

            echo "<center><h3>El pedido $id ha sido borrado.</h3></center>";



        }

    }



?>