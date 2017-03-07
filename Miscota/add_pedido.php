<?php 
$tituloPagina = "Añadir Pedido" ;
$pagina = "add_pedido";
include('inc/header2.php');
?>

<div id="navbar" class="collapse navbar-collapse">

    <form class="navbar-form navbar-right" role="form">

        <?php

        if (!isset($_SESSION["user"])) {

            header("Location: index.php");                                              

        }

        elseif (isset($_SESSION['user']) && $_SESSION['tipo']==2) {

            echo "<a href='administrar_pedidos.php'><input type='button' class='btn btn-success' value='VOLVER A ADMINISTRAR PEDIDOS'/></a>";

        }           

        else {

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

        <h1>Administrar Pedidos</h1>

        <p>Rellene el siguiente formulario para añadir un pedido nuevo.</p>

        <?php  

        if (!isset($_POST["id"])) : ?>

        <center>

            <form role="form" method="post" enctype="multipart/form-data">

                <legend>Rellene el siguiente formulario:</legend>

                <div class="form-group">            
                    <label for="id">ID</label>
                    <input type="number" class="form-control" name="id" placeholder="Introduce ID" required>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" name="fecha" placeholder="Introduce fecha" required>
                </div>

                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="number" class="form-control" name="total" placeholder="Introduce el total" required>
                </div>

                <div class="form-group">
                    <label for="comentario">Comentario</label>
                    <textarea rows="5" class="form-control" name="comentario" placeholder="Añade un comentario" required></textarea>
                </div> 

                <div class="form-group">
                    <label for="Clientes_id">Id de Cliente</label>
                    <input type="number" class="form-control" name="Clientes_id" placeholder="Introduce ID de cliente" required>
                </div>

                <span><input type="submit" value="AÑADIR"></span>

                <br>

                <br>

                <span><input type="reset" value="LIMPIAR"></span>

            </form>

        </center>         

        <?php else: ?>        

        <?php

        include('conexionbd.php');            

        $id=$_POST['id'];

        $consulta= "INSERT INTO pedidos VALUES('$id','".$_POST['fecha']."','".$_POST['total']."','".$_POST['comentario']."','".$_POST['Clientes_id']."')";

        $result = $connection->query($consulta);

        if (!$result) {

            echo "Query Error";

        } else {

            echo "Tu pedido ha sido añadido correctamente";

        }

        ?>

        <?php endif ?>   

    </div>

</div>
