<?php 
$tituloPagina = "Administrar Clientes" ;
$pagina = "administrar_clientes";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='catalogo_admin.php'><input type='button' class='btn btn-success' value='PANEL DE CONTROL'/></a>";


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
        <p>Edita y elimina los clientes de Miscota.</p>

        <?php

        include('conexionbd.php');

        if ($result = $connection->query("select * from clientes;")); {

            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NOMBRE</th>";
            echo "<th>APELLIDOS</th>";
            echo "<th>DIRECCIÓN</th>";
            echo "<th>CORREO</th>";
            echo "<th>USUARIO</th>";
            echo "<th>CONTRASEÑA</th>";
            echo "<th>TIPO</th>";
            echo "<th>ELIMINAR</th>";
            echo "<th>EDITAR</th>";
            echo "</tr>";
            echo "</thead>";



            while($obj = $result->fetch_object()) { 

                echo "<tr>";
                echo "<td>".$obj->id."</td>";
                echo "<td>".$obj->nombre."</td>";
                echo "<td>".$obj->apellidos."</td>";
                echo "<td>".$obj->direccion."</td>";
                echo "<td>".$obj->correo."</td>";
                echo "<td>".$obj->usuario."</td>";
                echo "<td>".$obj->password."</td>";
                echo "<td>".$obj->tipo."</td>";

                echo "<td><a href='borrar_clientes.php?id=$obj->id'>
                            <img src='img/delete.png';/>
                          </a></td>";

                echo "<td><a href='editar_clientes.php?id=$obj->id'>
                            <img src='img/edit.png';/>
                          </a></td>";

                echo "</tr>";
            }
            echo "</table>";

        }

        ?>


    </div>
</div>
