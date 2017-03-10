<?php 
$tituloPagina = "Login Usuarios" ;
$pagina = "login";
include('inc/header.php'); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Inicio de sesión</h1>
        <hr>
        <p>Para continuar es necesario que inicies sesión.<img src="img/dcollar.jpg" width="80" height="80" align="right"></p>
        <img src="img/perro1.png" align="right">

        <?php

        //FORM SUBMITTED
        
        if (isset($_POST["user"])) {
            //CREATING THE CONNECTION
            include('conexionbd.php');

            //CONSULTA PARA SELECCIONAR LOS CLIENTES CON SU CONTRASEÑA
            //Contraseña codificada con md5 en la base de datos.
            
            $consulta="select * from clientes where
          usuario='".$_POST["user"]."' and password=md5('".$_POST["password"]."');";
            
            if ($result = $connection->query($consulta)) {
                //No rows returned
                if ($result->num_rows===0) { // SI LA CONSULTA NO ARROJA RESULTADOS VEREMOS LOGIN INVALIDO
                    echo "LOGIN INVALIDO";

                } else { // SI LA CONSULTA ES CORRECTARECORREMOS LA TABLA CLIENTE Y METEMOS EN VARIABLES DE SISION LOS CAMPOS REQUERIDOS
                    $obj=$result->fetch_object();
                    //VALID LOGIN. SETTING SESSION VARS
                    $_SESSION["user"]=$_POST["user"];
                    $_SESSION["tipo"]=$obj->tipo;
                    $_SESSION["language"]="es";

                    if ($_SESSION['tipo']==2) { // SI LA SESION ES TIPO 2 'ADMIN' NOS REDIRIGE A CATALOGO ADMINISTRADOR

                        header('Location: catalogo_admin.php');

                    } else { // // SI LA SESION ES TIPO 1 'USUARIOS NORMALES' NOS LLEVARA A INDEX

                        header('Location: index.php');
                    }

                }
            } 

        }

            // CREACION DEL FORMULARIO DE LOGIN, COMPARA LOS DATOS INTRODUCIDOS CON LOS EXISTENTES EN LA TABLA CLIENTE SI COINCIDEN ACCEDEREMOS
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <label for="user">Nombre Usuario</label>
                <input type="text" class="form-control" name="user" placeholder="Introduce tu Usuario" required>
            </div>
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Introduce tu Contraseña" required><br>
            <p><input type="submit" value="ACCEDE"> <input type="reset" value="LIMPIAR"></p>

        </form>

        <p><a class="btn btn-primary btn-lg" href="formu_registro.php" role="button">Pincha aquí si aún no estas registrado</a></p>
        <img src="img/cuenco.jpg" width="80" height="80" align="right">
    </div>
</div>
<?php include('inc/footer.php'); ?>