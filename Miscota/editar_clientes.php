<?php 
$tituloPagina = "Editar Clientes" ;
$pagina = "editar_clientes";
include('inc/header2.php');
?>

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



        include('conexionbd.php');


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
            echo "<input type='password' class='form-control' name='password' value='$obj->password' required>";
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

