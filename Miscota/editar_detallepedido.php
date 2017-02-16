<?php 
$tituloPagina = "Editar Detalles de Pedidos" ;
$pagina = "editar_detallepedido";
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
    
                                                echo "<a href='login.php'><input type='button' class='btn btn-success' value='INICIAR SESIÓN'/></a>";
                                                
                                                    
                                                }
                                                    
                                                elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {
        
                                                echo "<a href='administrar_detallepedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR DETALLES DE PEDIDO'/></a>";
                                                    
        
                                                }           
                                                    
                                                 else {
    
                                                    echo "<input type='button' class='btn btn-success' value='BIENVENIDO {$_SESSION['user']}'/>";
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
        <p>Edita los detalles de pedidos.</p>

<?php
    
   
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from detalle_pedidos where id= ".$_GET['id'])); { 
                
            $depedid=$_GET['id'];

             $obj = $result->fetch_object();
            
echo "<center><form role='form' method='post' enctype='multipart/form-data'>";
          
            echo "<legend>Rellene para editar este pedido:</legend>";
            echo "<div class='form-group'>";
                        echo "<label for='id'>ID</label>";
                        echo "<input type='number' class='form-control' name='id' value='$obj->id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='cantidad'>Cantidad</label>";
                        echo "<input type='number' class='form-control' name='cantidad' value='$obj->cantidad' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='precio'>Precio</label>";
                        echo "<input type='number' class='form-control' name='precio' value='$obj->precio' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='Pedidos_id'>Id de Pedidos</label>";
                        echo "<input type='number' class='form-control' name='Pedidos_id' value='$obj->Pedidos_id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='Productos_id'>ID del Productos</label>";
                        echo "<input type='number' class='form-control' name='Productos_id' value='$obj->Productos_id' required>";
            echo "</div>";
                
              echo "<input type='submit' value='Actualizar'>";
              echo "<input type='reset' value='Limpiar'>";
	  
        echo "</form></center>";  
                            
                
            }  
          
          if (isset($_POST['id'])) {

        //variables
        $id=$_POST['id'];
        $cantidad=$_POST['cantidad'];
        $precio=$_POST['precio'];
        $Pedidos_id=$_POST['Pedidos_id'];
        $Productos_id=$_POST['Productos_id'];

        //consulta
        $consulta="UPDATE detalle_pedidos SET
        `id` =  '$id',
        `cantidad` =  '$cantidad',
        `precio` =  '$precio',
        `Pedidos_id` =  '$Pedidos_id',
        `Productos_id` =  '$Productos_id'
        WHERE  `id` =$depedid;";

        
        if ($result = $connection->query($consulta))

           {
          header ("Location: detallepedido_editado.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      
      
          
        ?>
        
        
          
        
          
          
    </div>
       </div>