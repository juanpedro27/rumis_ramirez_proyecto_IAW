<?php 
$tituloPagina = "Administrar Categorias" ;
$pagina = "administrar_categorias";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        
        <?php
        
        // TRATAMIENTO DE LA SESIÓN
        
        if (!isset($_SESSION["user"])) { // SI NO HAY UNA SESIÓN INICIADA REDIRIGE A INDEX

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) { //SI LA SESIÓN ES LA DE ADMIN CAMBIA EL BOTÓN Y LO ENLAZA HACIA CATALOGO DE ADMINISTRADOR

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";


        }           

        else { // SI LA SESIÓN ES LA DE UN USUARIO NORMAL TIPO1 REDIRIGE A INDEX

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
        <h1>Administrar Categorías</h1>
        <p align="right"><a class="btn btn-primary btn-lg" href="add_categoria.php" role="button">Añadir nueva Categoría</a></p>
        <p>Añade, Edita y elimina las Categorías de los prodcutos de Miscota.</p>

        <?php
        
        // MOSTRAMOS MEDIANTE UNA TABLA LOS DATOS DE LA TABLA CATEGORIA

        include('conexionbd.php');

        if ($result = $connection->query("select * from categorias;")); {

            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NOMBRE</th>";
            echo "<th>DESCRIPCION</th>";
            echo "<th>ELIMINAR</th>";
            echo "<th>EDITAR</th>";
            echo "</tr>";
            echo "</thead>";



            while($obj = $result->fetch_object()) { 

                echo "<tr>";
                echo "<td>".$obj->id."</td>";
                echo "<td>".$obj->nombre_cat."</td>";
                echo "<td>".$obj->descripcion."</td>";

                echo "<td><a href='borrar_categoria.php?id=$obj->id'>
                            <img src='img/delete.png';/>
                          </a></td>";

                echo "<td><a href='editar_categoria.php?id=$obj->id'>
                            <img src='img/edit.png';/>
                          </a></td>";

                echo "</tr>";
            }
            echo "</table>";

        }

        ?>


    </div>
</div>