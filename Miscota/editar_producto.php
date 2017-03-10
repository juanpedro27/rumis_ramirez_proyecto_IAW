<?php 
$tituloPagina = "Editar Productos" ;
$pagina = "editar_producto";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA CATALOGO ADMINISTRADOR

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";


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


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Administrar Producto</h1>
        <p>Edita los productos de Miscota.</p>

        <?php

        if (isset($_GET['id'])) {

            include('conexionbd.php');
            
            // SELECCION DE LA TABLA PRODUCTOS MEDIANTE SU ID

            if ($result = $connection->query("select * from productos where id= ".$_GET['id'])); { 

                $produ=$_GET['id'];
                
                // RECORREMOS LA TABLA PARA SACAR LOS DATOS

                $obj = $result->fetch_object();
                
                // FABRICAMOS EL FORMULARIO DE EDICION

                echo "<center><form role='form' method='post' enctype='multipart/form-data'>";

                echo "<legend>Rellene para editar este pedido:</legend>";
                echo "<div class='form-group'>";
                echo "<label for='id'>ID</label>";
                echo "<input type='number' class='form-control' name='id' value='$obj->id' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='nombre'>Nombre</label>";
                echo "<input type='text' class='form-control' name='nombre' value='$obj->nombre' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='descripcion'>Descripcion</label>";
                echo "<textarea rows='5' class='form-control' name='descripcion' placeholder='$obj->descripcion' required></textarea>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='precio'>Precio</label>";
                echo "<input type='number' class='form-control' name='precio' value='$obj->precio' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='imagen'>Adjuntar una imagen</label>";
                echo "<input type='file' name='imagen' value='$obj->imagen' required>";
                echo "<p class='help-block'>Selecciona una imagen de producto.</p>";
                echo "</div>";    
                echo "<div class='form-group'>";
                echo "<label for='Categorias_id'>Categorias_id</label>";
                echo "<input type='number' class='form-control' name='Categorias_id' value='$obj->Categorias_id' required>";
                echo "</div>";

                echo "<input type='submit' value='Actualizar'>";
                echo "<input type='reset' value='Limpiar'>";

                echo "</form></center>";  


            }

        }

        if (isset($_POST['id'])) {
            
            // TRATAMIENTO DE LA IMAGEN

            //Temp file. Where the uploaded file is stored temporary
            $tmp_file = $_FILES['imagen']['tmp_name'];

            //Dir where we are going to store the file
            $target_dir = "img/";

            //Full name of the file.
            $target_file = strtolower($target_dir . basename($_FILES['imagen']['name']));

            //Can we upload the file
            $valid = true;

            //Check if the file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $valid = false;
            }

            //Check the size of the file. Up to 2Mb
            if($_FILES['imagen']['size'] > (2048000)) {
                $valid = false;
                echo 'Oops!  Your file\'s size is to large.';
            }

            //Check the file extension: We need an image not any other different type of file
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
            if ($file_extension != "jpg" &&
                $file_extension != "jpeg" &&
                $file_extension != "png" &&
                $file_extension != "gif") {
                $valid = false;
                echo "Only JPG, JPEG, PNG & GIF files are allowed";
            }

            if ($valid) {
                //Put the file in its place
                move_uploaded_file($tmp_file, $target_file);


                if (isset($_POST['id'])) {

                    //variables
                    $id=$_POST['id'];
                    $nombre=$_POST['nombre'];
                    $descripcion=$_POST['descripcion'];
                    $precio=$_POST['precio'];
                    $cat=$_POST['Categorias_id'];
                    
                    // CONSULTA PARA INTRODUCIR LOS NUEVOS DATOS
                    
                    //consulta
                    $consulta="UPDATE productos SET
        `id` =  '$id',
        `nombre` =  '$nombre',
        `descripcion` =  '$descripcion',
        `precio` =  '$precio',
        `imagen` = '$target_file',
        `Categorias_id` =  '$cat'
        WHERE  `id` =$produ;";


                    if ($result = $connection->query($consulta))

                    {
                        header ("Location: producto_editado.php");
                    } else {

                        echo "Error: " . $result . "<br>" . mysqli_error($connection);
                    }
                }

            }
        }

        ?>






    </div>
</div>   