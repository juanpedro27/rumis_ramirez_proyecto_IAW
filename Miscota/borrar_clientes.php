<?php 
$tituloPagina = "Borrar Clientes" ;
$pagina = "borrar_clientes";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA ADMINISTRAR CLIENTES

            echo "<a href='administrar_clientes.php'><input type='button' class='btn btn-success' value='VUELVE A ADMINISTRAR CLIENTES'/></a>";


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

// HACE QUE EL ARRAY SE CONVIERTA EN EL ID de CLIENTE.

foreach ($_GET as $key => $id)
    
    // SELECCIONAMOS EL CLIENTE POR SU ID

    if ($result1 = $connection->query("SELECT * FROM clientes where id=$id;")) {

        // BORRADO DEL CLIENTE 
        
        if ($result6 = $connection->query("DELETE FROM clientes where id=$id;")) {  

            echo "<h3><center>El cliente $id ha sido borrado.</h3></center>";



        }

    }



?>