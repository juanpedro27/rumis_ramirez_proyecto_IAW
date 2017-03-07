<?php 
$tituloPagina = "Borrar Productos" ;
$pagina = "borrar_prdouctos";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='VUELVE AL PANEL DE CONTROL'/></a>";


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

<?php

include('conexionbd.php');

//Hace que el array se convierta en el ID del producto.
foreach ($_GET as $key => $id)

    if ($result1 = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id where productos.id=$id;")) {


        //Por ultimo la reparacion
        if ($result6 = $connection->query("DELETE FROM productos where id=$id;")) {  

            echo "<center><h3>El producto $id ha sido borrado.</h3></center>";



        }

    }



?>