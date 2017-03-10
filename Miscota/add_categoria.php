<?php 
$tituloPagina = "Añadir Categoria" ;
$pagina = "add_categoria";
include('inc/header2.php'); 
?>

<div id="navbar" class="collapse navbar-collapse">
    
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");

        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA ADMINISTRAR CATEGORIA

            echo "<a href='administrar_categorias.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR CATEGORIAS'/></a>";

        }           

        else { // SI LA SESIÓN ES LA DE UN USUARIO NORMAL TIPO1 REDIRIGE A INDEX

            header("Location: index.php");
        }

        ?>                             

        <input type="button" class="btn btn-success" value="DESCONECTAR" onclick="location.href='sesion_cerrada.php'"/>

    </form>

</div>

</div>

</nav>

<div class="jumbotron">
    
    <div class="container">
        
        <h1>Administrar Categorías</h1>
        
        <p>Rellene el siguiente formulario para añadir una nueva Categoría.</p>

        <?php  
        
        // INTRODUCCIÓN DE LOS DATOS MEDIANTE FORMULARIO

        if (!isset($_POST["id"])) : ?>
        <center><form role="form" method="post" enctype="multipart/form-data">

            <legend>Rellene el siguiente formulario:</legend>
            <div class="form-group">
                <label for="id">ID</label>
                <input type="number" class="form-control" name="id" placeholder="Introduce ID" required>
            </div>
            <div class="form-group">
                <label for="nombre_cat">Nombre de Categoría</label>
                <input type="text" class="form-control" name="nombre_cat" placeholder="Introduce Nombre de la Categoría" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea rows="5" class="form-control" name="descripcion" placeholder="Añade una Descripción" required></textarea>
            </div> 

            <span><input type="submit" value="AÑADIR"></span><br><br>
            <span><input type="reset" value="LIMPIAR"></span>

            </form></center>

        <?php else: ?>

        <?php
        
        // INSERCCIÓN DE LOS DATOS PROCEDENTES DEL FORMULARIO POR METODO POST

        include('conexionbd.php');            


        $id=$_POST['id'];
        
        $consulta= "INSERT INTO categorias VALUES('$id','".$_POST['nombre_cat']."','".$_POST['descripcion']."')";

        $result = $connection->query($consulta);
        
        if (!$result) {
            
            echo "Query Error";
            
        } else {
            
            echo "Tu Categoría ha sido añadida correctamente";
        }

        ?>

        <?php endif ?>   

    </div>
</div>