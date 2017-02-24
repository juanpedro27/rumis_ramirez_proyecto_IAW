<?php 
$tituloPagina = "Administrar Clientes" ;
$pagina = "administrar_clientes";
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
        <h1>Administrar Clientes</h1>
        <p>Edita y elimina los clientes de Miscota.</p>

<?php
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

            if ($result = $connection->query("select * from clientes;")); {
               
                echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>NOMBRE</th>";
                    echo "<th>APELLIDOS</th>";
                    echo "<th>DIRECCIÓN</th>";
                    echo "<th>CORREO</th>";
                    echo "<th>USUARIO</th>";
                    echo "<th>CONTRASEÑA</th>";
                    echo "<th>TIPO</th>";
                    echo "<th>ELIMINAR</th>";
                    echo "<th>EDITAR</th>";
                echo "</tr>";
                echo "</thead>";
               
                              
         
               while($obj = $result->fetch_object()) { 
                
            echo "<tr>";
                        echo "<td>".$obj->id."</td>";
                        echo "<td>".$obj->nombre."</td>";
                        echo "<td>".$obj->apellidos."</td>";
                        echo "<td>".$obj->direccion."</td>";
                        echo "<td>".$obj->correo."</td>";
                        echo "<td>".$obj->usuario."</td>";
                        echo "<td>".$obj->password."</td>";
                        echo "<td>".$obj->tipo."</td>";
                   
                        echo "<td><a href='borrar_clientes.php?id=$obj->id'>
                            <img src='img/delete.png';/>
                          </a></td>";
              
                        echo "<td><a href='editar_clientes.php?id=$obj->id'>
                            <img src='img/edit.png';/>
                          </a></td>";
                   
                    echo "</tr>";
                }
                echo "</table>";
                
            }
    
?>
          

      </div>
    </div>
