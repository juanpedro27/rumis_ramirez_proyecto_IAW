<?php 
$tituloPagina = "Editar Clientes" ;
$pagina = "editar_clientes";
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
        
                                                echo "<a href='administrar_clientes.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR LOS CLIENTES'/></a>";
                                                    
        
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
        <p>Edita los clientes de Miscota.</p>

<?php
    
   
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from clientes where id= ".$_GET['id'])); { 
                
              $id_cliente=$_GET['id'];  
                
             $obj = $result->fetch_object();
            
echo "<center><form role='form' method='post' enctype='multipart/form-data'>";
          
            echo "<legend>Rellene para editar este usuario:</legend>";
            echo "<div class='form-group'>";
                        echo "<label for='id'>ID</label>";
                        echo "<input type='number' class='form-control' name='id' value='$obj->id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='nombre'>Nombre</label>";
                        echo "<input type='text' class='form-control' name='nombre' value='$obj->nombre' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='apellidos'>Apellido</label>";
                        echo "<input type='text' class='form-control' name='apellidos' value='$obj->apellidos' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='direccion'>Dirección</label>";
                        echo "<input type='text' class='form-control' name='direccion' value='$obj->direccion' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='correo'>Correo</label>";
                        echo "<input type='email' class='form-control' name='correo' value='$obj->correo' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='usuario'>Usuario</label>";
                        echo "<input type='text' class='form-control' name='usuario' value='$obj->usuario' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='password'>Contraseña</label>";
                        echo "<input type='text' class='form-control' name='password' value='$obj->password' required>";
            echo "</div>";
            echo "<div class='form-group'>";
                        echo "<label for='tipo'>Tipo</label>";
                        echo "<input type='number' class='form-control' name='tipo' value='$obj->tipo' required>";
            echo "</div>";
                
              echo "<input type='submit' value='Actualizar'>";
              echo "<input type='reset' value='Limpiar'>";
	  
        echo "</form></center>";  
                            
                
            }  
          
          if (isset($_POST['id'])) {

        //variables
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $direccion=$_POST['direccion'];
        $correo=$_POST['correo'];
        $usuario=$_POST['usuario'];
        $password=$_POST['password'];
        $tipo=$_POST['tipo'];

        //consulta
        $consulta="UPDATE  clientes SET
        `id` =  '$id',
        `nombre` =  '$nombre',
        `apellidos` =  '$apellidos',
        `direccion` =  '$direccion',
        `correo` =  '$correo',
        `usuario` =  '$usuario',
        `password` = md5('$password'),
        `tipo` = '$tipo'
        WHERE  `id` =$id_cliente;";

        
        if ($result = $connection->query($consulta))

           {
          header ("Location: cliente_editado.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      
      
          
        ?>
        
        
          
        
          
          
    </div>
       </div>   
          
          