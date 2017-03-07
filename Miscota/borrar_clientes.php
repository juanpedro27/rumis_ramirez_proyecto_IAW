<?php 
$tituloPagina = "Borrar Clientes" ;
$pagina = "borrar_clientes";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='administrar_clientes.php'><input type='button' class='btn btn-success' value='VUELVE A ADMINISTRAR CLIENTES'/></a>";


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

//Hace que el array se convierta en el ID del cliente.
foreach ($_GET as $key => $id)

    if ($result1 = $connection->query("SELECT * FROM clientes where id=$id;")) {



        //Por ultimo la reparacion
        if ($result6 = $connection->query("DELETE FROM clientes where id=$id;")) {  

            echo "<h3><center>El cliente $id ha sido borrado.</h3></center>";



        }

    }



?>