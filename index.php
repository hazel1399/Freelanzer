<?php
require 'DataBase.php';
session_start();
if (!empty($_POST['idbuscar'])) {
    $buscadortext=$_POST['idbuscar'];
    header("Location: buscador.php?id=$buscadortext");
}if (isset($_POST['enviar']) AND empty($_POST['idbuscar'])) {
    $buscadortext=$_POST['idbuscar'];
    header("Location: buscador.php?id=$buscadortext");
}
?>

<?php include('head.php') ?>
<?php include('header.php') ?>

<div class="jumbotron text-center" style="border: 0px white">
    <div class="row">                           
        <div class="container mt-3">
            <h2> ¿qué tipo de freelancer necesitas? </h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
                            
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="imagenes/work.jpg" alt="work" width="1100" height="500">
                </div>
                <div class="carousel-item">
                  <img src="imagenes/portatil.jpg" alt="portatil" width="1100" height="500">
                </div>
                <div class="carousel-item">
                  <img src="imagenes/people.jpg" alt="people" width="1100" height="500">
                </div>
              </div>
              
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
            <form method="POST" action="index.php" role="form" id="textbuscar" onsubmit="verificarcaptcha()">
            <div class="buscar">
                
                <input type="text" id="idbuscar" name="idbuscar" class="buscar_texto" placeholder="  Escribe lo que buscas ">
                <button id="enviar" name="enviar" type="submit" class="btn btn-primary btn mt-3"
                    style="width: 100%" >Buscar</button>    
                   
            </div>
            </form>
            </div>
    </div>
</div>

<?php include('footer.php') ?>