<?php 
$tituloPagina = "Añadir Detalle de Pedido" ;
$pagina = "add_detallepedido";
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
        
                                                echo "<a href='administrar_detallepedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR DETALLES DE PEDIDO'/></a>";
                                                    
        
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
        <h1>Administrar Detalles de Pedido</h1>
        <p>Rellene el siguiente formulario para añadir un nuevo detalle de pedido.</p>
          
          
          <?php  

    if (!isset($_POST["id"])) : ?>
        <center><form role="form" method="post" enctype="multipart/form-data">
          
            <legend>Rellene el siguiente formulario:</legend>
            <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" class="form-control" name="id" placeholder="Introduce ID" required>
            </div>
            <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" placeholder="Introduce cantidad" required>
            </div>
            <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" placeholder="Introduce el precio" required>
            </div>
            <div class="form-group">
                        <label for="Pedidos_id">Id de Pedido</label>
                        <input type="number" class="form-control" name="Pedidos_id" placeholder="Añade un ID de Pedido" required>
            </div> 
            <div class="form-group">
                        <label for="Productos_id">Id de Producto</label>
                        <input type="number" class="form-control" name="Productos_id" placeholder="Introduce ID de Producto" required>
            </div>
            
              <span><input type="submit" value="AÑADIR"></span><br><br>
              <span><input type="reset" value="LIMPIAR"></span>
	  
        </form></center>
        
          
          	
      <?php else: ?>
          
         

      <?php
            echo "<h3>Añadido correctamente</h3>";
            
            //CREATING THE CONNECTION
      	    $connection = new mysqli("localhost", "admin", "1234", "Miscota");
           //TESTING IF THE CONNECTION WAS RIGHT
           if ($connection->connect_errno) {
           	printf("Connection failed: %s\n", $connection->connect_error);
	        exit();
	   }
          
        $id=$_POST['id'];
  	   $consulta= "INSERT INTO detalle_pedidos VALUES('$id','".$_POST['cantidad']."','".$_POST['precio']."','".$_POST['Pedidos_id']."','".$_POST['Productos_id']."')";
          
  	   $result = $connection->query($consulta);
  	   if (!$result) {
   		    echo "Query Error";
       } else {
  		     echo "Tu Detalle de Pedido ha sido añadido correctamente";
  	   }
        
        ?>
          
       <?php endif ?>   
        
      </div>
    </div>