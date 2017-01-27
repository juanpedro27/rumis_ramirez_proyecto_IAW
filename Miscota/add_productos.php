<?php 
$tituloPagina = "Administración" ;
$pagina = "adminitrador";
include('inc/header.php'); ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido como Administrador</h1>
        <p>Aqui puedes añadir un nuevo producto.</p>
        </div>
        
  <?php  

    if (!isset($_POST["nombre"])) : ?>
        <form method="post">
          <fieldset>
            <legend>Añadir productos</legend>
            <span>Nombre producto:</span><input type="text" name="nombre" required><br>
            <span>Descripcion:</span><input type="text" name="descripcion" required><br>
            <span>Precio:</span><input type="text" name="precio" required><br>
            <span>Imagen:</span><input type="text" name="imagen" required><br>
            <span>Numero Categoria:</span><input type="text" name="categorias_id" required><br>
	    <span><input type="submit" value="Introducir"><br>
	  </fieldset>
        </form>

      <?php else: ?>

      <?php
            echo "<h3>Showing data coming from the form</h3>";
            var_dump($_POST);
            //CREATING THE CONNECTION
      	    $connection = new mysqli("localhost", "admin", "1234", "Miscota");
           //TESTING IF THE CONNECTION WAS RIGHT
           if ($connection->connect_errno) {
           	printf("Connection failed: %s\n", $connection->connect_error);
	        exit();
	   }
  	   $nombre=$_POST['nombre'];
  	   $consulta= "INSERT INTO productos VALUES('null','$nombre','".$_POST['descripcion']."','".$_POST['precio']."','".$_POST['imagen']."','".$_POST['categorias_id']."')";
  	   var_dump($consulta);
  	   $result = $connection->query($consulta);
  	   if (!$result) {
   		    echo "Query Error";
       } else {
  		     echo "Producto añadido correctamente";
  	   }
     ?>

      <?php endif ?>