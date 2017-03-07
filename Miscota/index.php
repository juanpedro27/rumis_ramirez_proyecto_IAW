<?php 
$tituloPagina = "Inicio Miscota" ;
$pagina = "index";
include('inc/header.php'); ?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <center><img src="img/Miscota.png"  width="900" height="180"></center>
        <hr>
        <center><h2>Tu tienda de Mascotas especializada en productos para perros.</h2></center>
        
        <div class="col-md-offset-4 col-xs-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="img/car1.jpg"  width="1200p" height="300p">
                        <div class="carousel-caption">
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/car2.jpg"  width="1200p" height="300p">
                        <div class="carousel-caption">
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/car3.jpg"  width="1200p" height="300p">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="img/car4.jpg"  width="1200p" height="300p">
                        <div class="carousel-caption">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>  

        </div>
        
        <img src="img/huellitas.png"  width="1150" height="230">

        <marquee style="height:20;width:200" scrollamount="100" scrolldelay="500"><h2>LOS MEJORES SEGUROS <font color="red"><b>¡PROTEGELOS!</b></font></h2></marquee>

        <img src="img/protegelos.jpg" width="750p" height="300p" alt="">

        <img src="img/protegelos2.jpg" width="380p" height="300p" alt="">
        
        <marquee style="height:20;width:200" scrollamount="100" scrolldelay="500"><h2>FORMA PARTE DE ESTA LABOR <font color="red"><b>¡ADOPTA!</b></font></h2></marquee>
        
        <center><img src="img/adopta.jpg" width="900p" height="300p" alt=""></center>

    </div>
</div>
<?php include('inc/footer.php'); ?>


