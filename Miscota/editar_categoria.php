<?php 
$tituloPagina = "Editar Categoria" ;
$pagina = "editar_categoria";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='administrar_categorias.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR LAS CATEGORIAS'/></a>";


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


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Administrar Categorías</h1>
        <p>Edita las Categorías de los productos de Miscota.</p>

        <?php



        include('conexionbd.php');


        if ($result = $connection->query("select * from categorias where id= ".$_GET['id'])); { 

            $catid=$_GET['id'];

            $obj = $result->fetch_object();

            echo "<center><form role='form' method='post' enctype='multipart/form-data'>";

            echo "<legend>Rellene para editar esta Categoría:</legend>";
            echo "<div class='form-group'>";
            echo "<label for='id'>ID</label>";
            echo "<input type='number' class='form-control' name='id' value='$obj->id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='nombre_cat'>Nombre de la Categoría</label>";
            echo "<input type='text' class='form-control' name='nombre_cat' value='$obj->nombre_cat' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='descripcion'>Descripción</label>";
            echo "<textarea rows='5' class='form-control' name='descripcion' placeholder='$obj->descripcion' required></textarea>";
            echo "</div>";

            echo "<input type='submit' value='Actualizar'>";
            echo "<input type='reset' value='Limpiar'>";

            echo "</form></center>";  


        }  

        if (isset($_POST['id'])) {

            //variables
            $id=$_POST['id'];
            $nombre_cat=$_POST['nombre_cat'];
            $descripcion=$_POST['descripcion'];

            //consulta
            $consulta="UPDATE categorias SET
        `id` =  '$id',
        `nombre_cat` =  '$nombre_cat',
        `descripcion` =  '$descripcion'
        WHERE  `id` =$catid;";


            if ($result = $connection->query($consulta))

            {
                header ("Location: categoria_editado.php");
            } else {

                echo "Error: " . $result . "<br>" . mysqli_error($connection);
            }
        }



        ?>






    </div>
</div> 