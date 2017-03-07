<?php 
$tituloPagina = "Editar Pedidos" ;
$pagina = "editar_pedido";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">
    <form class="navbar-form navbar-right" role="form">
        <?php
        if (!isset($_SESSION["user"])) {

            header("Location: index.php");


        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='administrar_pedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR LOS PEDIDOS'/></a>";


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
        <h1>Administrar Pedidos</h1>
        <p>Edita los pedidos de Miscota.</p>

        <?php



        include('conexionbd.php');


        if ($result = $connection->query("select * from pedidos where id= ".$_GET['id'])); { 

            $pedid=$_GET['id'];

            $obj = $result->fetch_object();

            echo "<center><form role='form' method='post' enctype='multipart/form-data'>";

            echo "<legend>Rellene para editar este pedido:</legend>";
            echo "<div class='form-group'>";
            echo "<label for='id'>ID</label>";
            echo "<input type='number' class='form-control' name='id' value='$obj->id' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='fecha'>Fecha</label>";
            echo "<input type='date' class='form-control' name='fecha' value='$obj->fecha' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='total'>Total</label>";
            echo "<input type='number' class='form-control' name='total' value='$obj->total' required>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='comentario'>Comentario</label>";
            echo "<textarea rows='5' class='form-control' name='comentario' placeholder='$obj->comentario' required></textarea>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='Clientes_id'>ID del Cliente</label>";
            echo "<input type='number' class='form-control' name='Clientes_id' value='$obj->Clientes_id' required>";
            echo "</div>";

            echo "<input type='submit' value='Actualizar'>";
            echo "<input type='reset' value='Limpiar'>";

            echo "</form></center>";  


        }  

        if (isset($_POST['id'])) {

            //variables
            $id=$_POST['id'];
            $fecha=$_POST['fecha'];
            $total=$_POST['total'];
            $comentario=$_POST['comentario'];
            $clid=$_POST['Clientes_id'];

            //consulta
            $consulta="UPDATE pedidos SET
        `id` =  '$id',
        `fecha` =  '$fecha',
        `total` =  '$total',
        `comentario` =  '$comentario',
        `Clientes_id` =  '$clid'
        WHERE  `id` =$pedid;";


            if ($result = $connection->query($consulta))

            {
                header ("Location: pedido_editado.php");
            } else {

                echo "Error: " . $result . "<br>" . mysqli_error($connection);
            }
        }



        ?>






    </div>
</div>   