<?php 
$tituloPagina = "Editar Categoria" ;
$pagina = "editar_categoria";
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
    
   
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
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