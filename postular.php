<?php
require 'DataBase.php';
   # mysqli_close($conn);
session_start();
if(isset($_SESSION['Email'])){
    #echo("Inicio sesion correctamente   ". $_SESSION['Email']);
    if (!empty($_POST['pais']) && !empty($_POST['campo'])  && !empty($_POST['banco'])){
        $pais=$_POST['pais'];
        $campo=$_POST['campo'];
        $banco=$_POST['banco'];
        $Email=$_SESSION['Email'];
        $sql = "UPDATE Usuario SET Ubicacion= '$pais', CampoLaboral= '$campo', CuentaBanco= '$banco' WHERE Email='$Email'";
        mysqli_query( $conn, $sql )  or die ( "Algo ha ido mal en la consulta a la base de datos");
    echo "Registrado Correctamente";
    $_SESSION['Banco']=$banco;
    header("Location: index.php");  
    }
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
                    <?php if (isset($_SESSION['Email']) AND !isset($_SESSION['Banco'])) {?>
                    <li class="nav-item"><a href="postular.php" class="nav-link">Postularse</a></li> <?php } ?>



                    <?php if (isset($_SESSION['Email']) AND isset($_SESSION['Banco'])) {?>
                    <li class="nav-item"><a href="Ofertar.php" class="nav-link">Ofertar</a></li> 
                    <li class="nav-item"><a href="MiOfertas.php" class="nav-link">Mis ofertas</a></li> 
                <?php } ?>


                     <?php if (!isset($_SESSION['Email'])) {?>                                                                                              
                    <div class="pull-right"> 
                        <li class="nav-item"><a href="registro.php" class="nav-link"><i class="fas fa-user-plus"></i> Registrarse </a>                                            
                    </div>    
                    <div class="pull-right" id="Ingresar" >
                        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-sign-in"></i> Ingresar </a>                        
                    </div><?php } ?>  
                    <?php if (isset($_SESSION['Email'])) {?>
                    <div class="pull-right">
                        <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-in"></i> Cerrar sesion </a>                        
                    </div> <?php } ?>               
                </ul>
            </div>            
        </nav>        
    </header>    
<br>	
</body>
<div class="row row-cols-3 row-cols-sm-3 row-cols-md-2">
    <div class="col-md-3 col-sm-2 col-1"></div>
    <div class="col-md-6 col-sm-8 col-10 marco-form ">
        <h2 class=" login-title text-center">Postularse como freelancer</h2>

        <div class="login-message text-center">
            ¿Ya tienes una cuenta?
            <!-- <a href="#">Iniciar sesión</a> -->
            <a href="index.html" data-dismiss="modal" data-toggle="modal" data-target="#modal-login">Login</a>
        </div>

        <div class="inputs-forms">
            <br>
            <!-- En action usamos $_SERVER para que los datos del form se envien a la vista en la que se encuentra -->
            <form method="POST" action="postular.php" role="form" id="form-register" onsubmit="verificarcaptcha()">
                <div class="informacion">
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input type="text" class="form-control" id="pais" name="pais">
                    </div>

                    <div class="form-group">
                        <label for="campo">Campo Laboral</label>
                        <input type="text" class="form-control" id="campo" name="campo">
                    </div>

                    <div class="form-group">
                        <label for="banco">Numero de cuenta bancaria</label>
                        <input type="number" class="form-control" id="banco" name="banco" min="4">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion de sus conocimientos</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>                    
                    
                    <div aling="center " class="g-recaptcha" data-theme="dark"
                        data-sitekey="6LfMydkUAAAAAJ-7II57ff7mCdJ-G45XIvFv44NX"></div>
                </div>
                <button name="enviar" type="submit" class="btn btn-primary btn mt-3"
                    style="width: 100%" >Registrar</button>
            </form>
        </div>
    </div>
    <div class="col-md-3 col-sm-2 col-1"></div>
</div>
</body>
<br><br>
<script type="text/javascript">
$(document).ready(function() {
$('.navbar-nav').find('a.active').removeClass('active');
});
</script>

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



