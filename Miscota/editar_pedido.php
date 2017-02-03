<?php 
$tituloPagina = "Editar Pedidos" ;
$pagina = "editar_pedido";
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
        
                                                echo "<a href='administrar_pedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR LOS PEDIDOS'/></a>";
                                                    
        
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
        <h1>Administrar Pedidos</h1>
        <p>Edita los pedidos de Miscota.</p>

<?php
    
   
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from pedidos where id= ".$_GET['id'])); { 
                
            $pedid=$_GET['id'];

             $obj = $result->fetch_object();
            
echo "<center><form role='form' method='post' enctype='multipart/form-data'>";
          
            echo "<legend>Rellene para editar este pedido:</legend>";
            echo "<div class='form-group'>";
                        echo "<label for='id'>ID</label>";
                        echo "<input type='text' class='form-control' name='id' value='$pedid' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='fecha'>Fecha</label>";
                        echo "<input type='text' class='form-control' name='fecha' value='$obj->fecha' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='total'>Total</label>";
                        echo "<input type='text' class='form-control' name='total' value='$obj->total' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='comentario'>Comentario</label>";
                        echo "<input type='text' class='form-control' name='comentario' value='$obj->comentario' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='Clientes_id'>ID del Cliente</label>";
                        echo "<input type='text' class='form-control' name='password' value='$obj->Clientes_id' required>";
            echo "</div>";
                
              echo "<input type='submit' value='Actualizar'>";
              echo "<input type='reset' value='Limpiar'>";
	  
        echo "</form></center>";  
                            
                
            }  
          
          if (isset($_POST['id'])) {

        //variables
        
        $fecha=$_POST['fecha'];
        $total=$_POST['total'];
        $comentario=$_POST['comentario'];
        $clid=$_POST['Clientes_id'];

        //consulta
        $consulta="UPDATE pedidos SET
        `id` =  '$pedid',
        `fecha` =  '$fecha',
        `total` =  '$total',
        `comentario` =  '$comentario',
        `Clientes_id` =  '$clid'
        WHERE  `id` =$pedid;";

        
        if ($result = $connection->query($consulta))

           {
          header ("Location: pedido_editado.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      
      
          
        ?>
        
        
          
        
          
          
    </div>
       </div>   