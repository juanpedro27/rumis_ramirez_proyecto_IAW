<?php 
$tituloPagina = "Editar Productos" ;
$pagina = "editar_producto";
?>

<?php
  //Open the session
  session_start();

 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $tituloPagina; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <form class="navbar-form navbar-right" role="form">
                   <?php
                                                if (!isset($_SESSION["user"])) {
    
                                                header("Location: index.php");
                                                
                                                    
                                                }
                                                    
                                                elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {
        
                                                echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";
                                                    
        
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
        <h1>Administrar Producto</h1>
        <p>Edita los productos de Miscota.</p>

<?php
    
   
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from productos where id= ".$_GET['id'])); { 
                
            $produ=$_GET['id'];

             $obj = $result->fetch_object();
            
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
          
        ?>
        
        
          
        
          
          
    </div>
       </div>   