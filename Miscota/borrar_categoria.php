<?php 
$tituloPagina = "Borrar PCategoria" ;
$pagina = "borrar_categoria";
include('inc/header2.php');
?>


<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA ADMINISTRAR CATEGORIAS

            echo "<a href='administrar_categorias.php'><input type='button' class='btn btn-success' value='VUELVE A ADMINISTRAR LAS CATEGORIAS'/></a>";


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

// HACE QUE EL ARRAY SE CONVIERTA EN EL ID de CATEGORIA.

foreach ($_GET as $key => $id)
    
    // SELECCIONAMOS LA CATEGORIA POR SU ID

    if ($result1 = $connection->query("SELECT * FROM categorias where id=$id;")) {

        // BORRADO DE LA CATEGORIA 
        
        if ($result6 = $connection->query("DELETE FROM categorias where id=$id;")) {  

            echo "<center><h3>La Categoría $id ha sido borrada.</h3></center>";



        }

    }



?>