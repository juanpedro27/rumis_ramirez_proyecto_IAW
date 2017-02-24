
<meta charset="utf-8">
<?php 
$tituloPagina = "Catalogo Admin" ;
$pagina = "catalogo_admin";
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

        <link rel="stylesheet" href="css/bootstrap.min.css">
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
        
                                                echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='BIENVENIDO ADMIN'/></a>";
                                                    
        
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








      <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido como Administrador</h1>
        <hr>
        <p>Aquí podras hacer modificaciones en la Aplicación.</p>
        <center><p><a class="btn btn-primary btn-lg" href="add_productos.php" role="button">Añadir nuevo Producto</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_clientes.php" role="button">Administrar Clientes</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_pedidos.php" role="button">Administrar Pedidos</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_detallepedidos.php" role="button">Administrar Detalles de Pedidos</a>&nbsp<a class="btn btn-primary btn-lg" href="administrar_categorias.php" role="button">Administrar Categorías</a></p></center>
      <div class='row'> 
         
        <?php
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

            if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id;")); {
               
                
               
                              
         
               while($obj = $result->fetch_object()) { 
                
            echo "<div class='col-md-4'>"; 
                echo "<h2>".$obj->nombre."</h2>";
                echo "<hr>";
                echo "<p>".$obj->descripcion."</p>";
                echo "<img src='".$obj->imagen."' WIDTH=300 HEIGHT=300 BORDER=2 >";
                echo "<p><a class='btn btn-default' href='borrar_productos.php?id=$obj->id' role='button'>Eliminar Producto &raquo;</a>&nbsp<a class='btn btn-default' href='editar_producto.php?id=$obj->id' role='button'>Editar Producto &raquo;</a></p>";
              
        echo "</div>";                
                     
                }
                
            }
    
?>
       
  
</div>
</div>
</div>



    