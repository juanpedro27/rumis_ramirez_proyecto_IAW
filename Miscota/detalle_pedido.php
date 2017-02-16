<meta charset="utf-8">
<?php 
$tituloPagina = "Detalle Pedidos" ;
$pagina = "detalle_pedido";
include('inc/header.php'); ?>


      <div class="jumbotron">
      <div class="container">
        <h1>Detalle Pedidos</h1>
        <hr>
        
      <div class='row'>

<?php
    
   
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from detalle_pedidos join productos on detalle_pedidos.Productos_id=productos.id where detalle_pedidos.Productos_id= ".$_GET['id'])); { 
                
              echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>IMAGEN</th>";
                    echo "<th>CANTIDAD</th>";
                    echo "<th>SUBTOTAL</th>";
                echo "</tr>";
                echo "</thead>";
               
                              
         
               while($obj = $result->fetch_object()) { 
                
            echo "<tr>";
                        echo "<td><img src='".$obj->imagen."' WIDTH=50 HEIGHT=50 BORDER=2 ></td>";
                        echo "<td>".$obj->cantidad."</td>";
                        echo "<td>".$obj->precio."</td>";
                   
                    echo "</tr>";
                }
                echo "</table>";
                
            }
    
?>
          

      </div>
    </div> 
    </div>                         
                
          