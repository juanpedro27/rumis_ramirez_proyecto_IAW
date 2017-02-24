 <div class="container">
     <h1><center><b>PRODUCTOS DESTACADOS</b></center></h1>
      <hr>
      <div class="row">
          
        <?php
            
   $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

            if ($result = $connection->query("select * from categorias join productos on categorias.id=productos.categorias_id where productos.id=1 or productos.id=5 or productos.id=9 ;")); {
                     
         
               while($obj = $result->fetch_object()) { 
                
            echo "<div class='col-md-4'>"; 
                echo "<h2>".$obj->nombre."</h2>";
                echo "<p>".$obj->descripcion."</p>";
                echo "<img src='".$obj->imagen."' WIDTH=300 HEIGHT=300 BORDER=2 >";
                echo "<a class='btn btn-default' href='detalles.php?id=$obj->id' role='button'>Ver detalles &raquo;</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
                   
        echo "</div>";                
                     
                }
                
            }
    
?>
          
          
        
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>