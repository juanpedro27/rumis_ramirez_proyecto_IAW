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
    
echo "<center><p><a href='login.php'>INICIA SESIÓN</a> o <a href='formu_registro.php'>REGISTRATE</a> para finalizar la compra</center></p>";
                                                
                                                    
} else {
    
     $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
            if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id join detalle_pedidos on detalle_pedidos.Productos_id=productos.id where productos.id= ".$_GET['id'])); { 
                
              echo "<table class='table table-striped'>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>IMAGEN</th>";
                    echo "<th>CANTIDAD</th>";
                    echo "<th>SUBTOTAL</th>";
                echo "</tr>";
                echo "</thead>";
               
                              
         
               while($obj = $result->fetch_object()) { 
                
            echo "<tr>";
                        echo "<td>".$obj->id."</td>";
                        echo "<td><img src='".$obj->imagen."' WIDTH=40 HEIGHT=40 BORDER=2 ></td>";
                        echo "<td><input type='number' class='form-control' name='cantidad' value='$obj->cantidad'></td>";
                        echo "<td>".$obj->precio."</td>";
                   
                    echo "</tr>";
                    
                   echo "<center><p><a class='btn btn-primary btn-lg' href='catalogo.php' role='button'>Continuar Comprando</a> <a class='btn btn-primary btn-lg' href='finalizar_compra.php?id=$obj->id' role='button'>Finalizar Compra</a></p></center>";
                }
                echo "</table>";
               
            } 
    
}


    
?>
          
    </div>
</div> 
</div>                       
                
          