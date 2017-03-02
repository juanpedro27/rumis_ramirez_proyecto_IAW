<meta charset="utf-8">
<?php 
$tituloPagina = "Detalle Pedido" ;
$pagina = "detalle_pedido";
include('inc/header.php'); ?>


      <div class="jumbotron">
      <div class="container">
       <h1>Detalle Pedidos</h1>
        <hr> 
      <div class='row'>

<?php
          
if (!isset($_SESSION["user"])) {
    
echo "<center><p><a href='login.php'>INICIA SESIÓN</a> o <a href='formu_registro.php'>REGISTRATE</a> para realizar la compra</center></p>";
                                                
                                                    
} else {
    
     $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from productos join detalle_pedidos on detalle_pedidos.Productos_id=productos.id join pedidos on detalle_pedidos.Pedidos_id=pedidos.id where productos.id= ".$_GET['id']));
    
            $fecha_actual = date("Y-m-d");
    
    
    { 
                
              echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>IMAGEN</th>";
                    echo "<th>CANTIDAD</th>";
                    echo "<th>FECHA</th>";
                    echo "<th>TOTAL</th>";
                    echo "<th>COMENTARIO</th>";
                    
                echo "</tr>";
                echo "</thead>";
               
                              
         
               while($obj = $result->fetch_object()) { 
                   
        echo "<form role='form' method='post' enctype='multipart/form-data'>";
                
            echo "<tr>";
                        echo "<td><img src='".$obj->imagen."' WIDTH=40 HEIGHT=40 BORDER=2 ></td>";
                        echo "<td><input type='number' class='form-control' name='cantidad' value='$obj->cantidad'></td>";
                        echo "<td>".$fecha_actual."</td>";
                        echo "<td>".$obj->total."</td>";
                        echo "<td><input type='text' class='form-control' name='comentario' value='$obj->comentario' required></td>";
                    echo "</tr>";
                    
                   echo "<center><p><a class='btn btn-primary btn-lg' href='catalogo.php' role='button'>Continuar Comprando</a> <a class='btn btn-primary btn-lg' href='finalizar_compra.php?id=$obj->id' role='button'>Finalizar Compra</a></p></center>";
                 
                   echo "</form>";  
                }
                echo "</table>";
               
            } 
    
}
          


    
?>
          
    </div>
</div> 
</div>                       
                
          