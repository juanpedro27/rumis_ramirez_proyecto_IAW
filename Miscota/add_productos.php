<?php 
$tituloPagina = "Añadir Productos" ;
$pagina = "add_productos";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">

    <form class="navbar-form navbar-right" role="form">

        <?php

        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");                                                

        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA CATALOGO DE ADMINISTRADOR

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";

        }           

        else { // SI LA SESIÓN ES LA DE UN USUARIO NORMAL TIPO1 REDIRIGE A INDEX

            header("Location: index.php");

        }

        ?>                             

        <input type="button" class="btn btn-success" value="DESCONECTAR" onclick="location.href='sesion_cerrada.php'"/>

    </form>

</div>

</div>

</nav>

<div class="jumbotron">

    <div class="container">

        <h1>Añade un nuevo producto</h1>

        <p>Aqui puedes añadir un nuevo producto.</p>

        <?php  
        
        // INTRODUCCIÓN DE LOS DATOS MEDIANTE FORMULARIO

        if (!isset($_POST["nombre"])) : ?>

        <center>

            <form role="form" method="post" enctype="multipart/form-data">

                <legend>Añadir productos</legend>

                <div class="form-group">
                    <label for="nombre">Nombre del producto</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Introduce nombre del producto" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea rows="5" class="form-control" name="descripcion" placeholder="Describe este producto" required></textarea>
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" placeholder="Dato numerico para el precio" required>
                </div>

                <div class="form-group">
                    <label for="categorias_id">Categoría</label>
                    <input type="number" min="1" max="3" class="form-control" name="categorias_id" placeholder="mínimo 1, máximo 3" required>
                </div>

                <div class="form-group">
                    <label for="imagen">Adjuntar una imagen</label>
                    <input type="file" name="imagen" required>
                    <p class="help-block">Selecciona una imagen de producto.</p>
                </div>

                <span><input type="submit" value="Introducir"></span>

                <br>

                <br>

                <span><input type="reset" value="Limpiar"></span>

            </form>

        </center>

        <?php else:    
        
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

            echo "PRODUCTO AÑADIDO CORRECTAMENTE";

            //INSERTING THE NEW PRODUCT
            $nombre        = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio       = $_POST['precio'];
            $cate       = $_POST['categorias_id'];

            include('conexionbd.php');  
            
            // INSERCCIÓN DE LOS DATOS PROCEDENTES DEL FORMULARIO POR METODO POST

            $query = "INSERT INTO productos VALUES(null, '$nombre', '$descripcion', '$precio', '$target_file', $cate);";


            if ($result = $connection->query($query)) {

            } else {

                echo "Wrong Query";

                exit();

            }

        }

        ?>     

        <?php endif ?>

    </div>

</div>