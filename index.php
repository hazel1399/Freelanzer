<?php
require 'DataBase.php';
   # mysqli_close($conn);
session_start();
if(isset($_SESSION['Email'])){
    echo("Inicio sesion correctamente   ". $_SESSION['Email']);

}else{
    echo "no inicio sesion";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Freelanzer</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9d5cbf4e8e.js" crossorigin="anonymous"></script>
</head>
<body>  
	 <header>
        <nav class="navbar navbar-expand-sm bg-info  navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#expand">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="expand">
                <ul class="navbar-nav">                	
                    <li class="nav-item"><a href="index.php" class="nav-link">Freelancer</a></li>
                    <?php if (isset($_SESSION['Email'])) {?>
                    <li class="nav-item"><a href="postular.php" class="nav-link">Postularse</a></li> <?php } ?>                                                                                               
                    <div class="pull-right"> 
                        <li class="nav-item"><a href="registro.php" class="nav-link"><i class="fas fa-user-plus"></i> Registrarse </a>                                            
                    </div>    
                    <div class="pull-right" id="Ingresar" >
                        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-sign-in"></i> Ingresar </a>                        
                    </div><?php if (isset($_SESSION['Email'])) {?>
                    <div class="pull-right">
                        <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-in"></i> Cerrar sesion </a>                        
                    </div> <?php } ?>               
                </ul>
            </div>            
        </nav>        
    </header>    
<br>	
</body>
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
            <div class="buscar">
                <input type="text" class="buscar_texto" placeholder="  Escribe lo que buscas ">
                <a href="buscador.php" class="boton">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mb-0">
            <div class="col contactenos text-left mb-0">
                <h4 class="title-footer poppins mb-3">Contactenos</h4>

                <div class="accordion" id="acordion-footer">
                    <div class="card mb-2">
                        <div class="card-header" id="headingOne">
                            <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Nicolás Galvan
                            </a>
                        </div>                       
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingTwo">
                            <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Miguel Amaya
                            </a>
                        </div>                        
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingThree">
                            <a data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Hazel Pinzon
                            </a>
                        </div>                        
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingFour">
                            <a data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Julián Rodriguez
                            </a>
                        </div>                        
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingFour">
                            <a data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Julián Tolosa
                            </a>
                        </div>                        
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingFour">
                            <a data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Camilo Sanmiguel
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col text-left">
                <h4 class="title-footer poppins mb-3">Redes sociales</h4>
                <div class="iconos mt-3">
                    <a href="https://es-la.facebook.com/" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i> </a>
                    <a href="https://www.instagram.com/?hl=es-la" target="_blank"><i class="fa fa-instagram w3-hover-opacity"></i> </a>
                    <a href="https://www.snapchat.com/l/es/" target="_blank"><i class="fa fa-snapchat w3-hover-opacity"></i> </a>
                    <a href="https://co.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p w3-hover-opacity"></i> </a>
                    <a href="https://twitter.com/?lang=es" target="_blank"><i class="fa fa-twitter w3-hover-opacity"></i> </a>
                    <a href="https://co.linkedin.com/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>
