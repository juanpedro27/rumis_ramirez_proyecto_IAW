<?php
  //Open the session
  session_start();

if (!isset($_SESSION["user"])) {
    
echo "<p>Es necesario <a href='login.php'>INICIAR SESIÓN</a> o <a href='formu_registro.php'>REGISTRARTE</a> para finalizar la compra</p>";
                                                
}

 ?>