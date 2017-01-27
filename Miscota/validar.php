 <?php

        
  //Open the session
  session_start();

        

        //FORM SUBMITTED
        if (isset($_POST["user"])) {
          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "admin", "1234", "Miscota");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="select * from clientes where
          usuario='".$_POST["user"]."' and password=md5('".$_POST["password"]."');";
          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {
              //No rows returned
              if ($result->num_rows===0) {
                echo "LOGIN INVALIDO";
              } else {
                $obj=$result->fetch_object();
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["tipo"]=$obj->tipo;
                $_SESSION["language"]="es";
                header('Location: index.php');
              }
          } else {
            echo "Wrong Query";
          }
            
            
}
var_dump($_SESSION);

    if (isset($_SESSION['user']) && $_SESSION['tipo']==2) {
        
         header('Location: catalogo_admin.php');
        
    } else {
        
        header('Location: index.php');
    }
?>
     
    