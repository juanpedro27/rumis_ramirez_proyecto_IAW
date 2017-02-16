<?php 
$tituloPagina = "Detalles Pedidos" ;
$pagina = "detalles";
include('inc/header.php'); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Detalles del producto</h1>
        <hr> 
         <?php
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

            if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id where productos.id= ".$_GET['id'])); {
                     
        
                while($obj = $result->fetch_object()) {
                    
                    
                        echo "<h2>".$obj->nombre."</h2>";
                        echo "<h3><b>Descripción: </b>".$obj->descripcion."</h3>";
                        echo "<h3><b>Categoría: </b>".$obj->nombre_cat."</h3>";
                        echo "<img src='".$obj->imagen."' WIDTH=300 HEIGHT=300 BORDER=2 >";
                        echo "<h3><b>Precio: </b>".$obj->precio. "€</h3>";
                        echo "<p><a class='btn btn-default' href='detalle_pedido.php?id=$obj->id' role='button'>Añadir al carrito &raquo;</a></p>";
                    
                }
               
                
            }
    
?> 
          
          
          
          
          
          
          
          
          
          
      </div>
    </div>
<?php include('inc/footer.php'); ?>