<?php 
$tituloPagina = "Categoria Editada" ;
$pagina = "categoria_editado";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='administrar_categorias.php'><input type='button' class='btn btn-success' value='VUELVE A ADMINISTRAR PEDIDOS'/></a>";


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

<center><h3>Categoría editada correctamente</h3></center>