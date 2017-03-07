<?php 
$tituloPagina = "Formulario de Registro" ;
$pagina = "formu_registro";
include('inc/header.php'); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Registrate</h1>
        <p>Estamos encantados de que quieras unirte a la familia.</p>


        <?php  

        if (!isset($_POST["nombre"])) : ?>
        <form role="form" method="post" enctype="multipart/form-data">
            <legend>Rellene el siguiente formulario:</legend>

            <img src="img/perros.png" align="right">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Introduce nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Introduce apellido" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" placeholder="Introduce tu dirección" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" name="correo" placeholder="Introduce tu correo" required>
            </div> 
            <div class="form-group">
                <label for="usuario">Nombre de usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Introduce nombre de usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Introduce tu contraseña" required>
            </div>

            <span><input type="submit" value="Registrarse"></span><br><br>
            <span><input type="reset" value="Limpiar"></span>

        </form>



        <?php else: ?>



        <?php

        include('conexionbd.php');

        $nombre=$_POST['nombre'];
        $consulta= "INSERT INTO clientes VALUES('null','$nombre','".$_POST['apellidos']."','".$_POST['direccion']."','".$_POST['correo']."','".$_POST['usuario']."',md5('".$_POST['password']."'),1)";

        $result = $connection->query($consulta);
        if (!$result) {
            echo "Error al introducir los datos";
        } else {
            echo "Tu usuario ha sido registrado correctamente";
        }

        ?>

        <p><a href="login.php">Inicia sesión</a> si te has registrado correctamente o vuelve a <a href="formu_registro.php">rellenar el formulario</a></p>  

        <?php endif ?>   

    </div>
</div>
<?php include('inc/footer.php'); ?>