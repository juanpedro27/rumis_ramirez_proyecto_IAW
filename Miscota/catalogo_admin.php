
<meta charset="utf-8">
<?php 
$tituloPagina = "Catalogo Admin" ;
$pagina = "catalogo_admin";
include('inc/header.php'); ?>


      <div class="jumbotron">
      <div class="container">
        <h1>Bienvenido como Administrador</h1>
        <p>Aqui podras hacer modificaciones en la Base de Datos.</p>
        <p><a class="btn btn-primary btn-lg" href="add_productos.php" role="button">Añadir nuevo Producto &raquo;</a></p>
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
                echo "<p>".$obj->descripcion."</p>";
                echo "<img src='".$obj->imagen."' WIDTH=300 HEIGHT=300 BORDER=2 >";
                echo "<p><a class='btn btn-default' href='#' role='button'>Eliminar Producto &raquo;</a></p>";
              
        echo "</div>";                
                     
                }
                
            }
    
?>
       
  
</div>
</div>
</div>
<?php include('inc/footer.php'); ?>


    