<?php
require 'DataBase.php';

if (!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['telefono']) && !empty($_POST['clave']) && !empty($_POST['reclave'])) {
    $nombre=$_POST['nombre']. " ";
    $nombre.=$_POST['apellido'];
    $cedula=$_POST['cedula'];
    $telefono=$_POST['telefono'];
    $genero=$_POST['genero'];
    $fecha_nac=$_POST['fecha_nac'];
    $email=$_POST['email'];
    $clave=$_POST['clave'];
    $password = password_hash($clave, PASSWORD_BCRYPT);
    $s = "Select * from Usuario where Email = '$email'";
    $sCed = "Select * from Usuario where Cedula = '$cedula'";
    $result= mysqli_query($conn, $s);
    $resultCed= mysqli_query($conn, $sCed);

    
   # $stmt = $conn->prepare($sql);

    #$stmt->bindParam(':nombre', $_POST['nombre']);
    #$stmt->bindParam(':apellido', $_POST['apellido']);
    #$stmt->bindParam(':cedula', $_POST['cedula']);
    #$stmt->bindParam(':telefono', $_POST['telefono']);
    #$stmt->bindParam(':genero', $_POST['genero']);
    #$stmt->bindParam(':email', $_POST['email']);
   # $password = password_hash($_POST['clave'], PASSWORD_BCRYPT);
   # $stmt->bindParam(':clave', $password);
    
    
    # if ($stmt->execute()) {
    #  $message = 'Successfully created new user';
    #} else {
    #  $message = 'Sorry there must have been an issue creating your account';
    #}
    $num= mysqli_num_rows($result);
    $num2= mysqli_num_rows($resultCed);
    if ($num == 1) {
        echo "Este email ya esta registrado";
    }if ($num2 == 1) {
        echo "El numero de cedula ya esta en usó";
    }if($num == 0 && $num2 == 0){
      $sql = "INSERT INTO Usuario (nombre, Cedula, Telefono, Genero, FechaNacimiento, Email, Contraseña) VALUES ('$nombre', '$cedula', '$telefono', '$genero', '$fecha_nac', '$email', '$password')";
    mysqli_query( $conn, $sql )  or die ( "Algo ha ido mal en la consulta a la base de datos");
    echo "Registrado Correctamente";
    header("Location: login.php");   
    }
    


    }


    mysqli_close($conn);
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
<div class="row row-cols-3 row-cols-sm-3 row-cols-md-2">
    <div class="col-md-3 col-sm-2 col-1"></div>
    <div class="col-md-6 col-sm-8 col-10 marco-form ">
        <h2 class=" login-title text-center">Registrarse</h2>

        <div class="login-message text-center">
            ¿Ya tienes una cuenta?
            <!-- <a href="#">Iniciar sesión</a> -->
            <a href="login.php" >Login</a>
        </div>

        <div class="inputs-forms">
            <br>
            <!-- En action usamos $_SERVER para que los datos del form se envien a la vista en la que se encuentra -->
            <form method="POST" action="registro.php" role="form" id="form-register" onsubmit="verificarcaptcha()">
                <div class="informacion">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>

                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="number" class="form-control" id="cedula" name="cedula" min="0">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="number" name="telefono" min="0">
                    </div>

                    <div class="form-group genero mb-0">
                        <label style="width: 100%" class="mb-0">Seleccione su género</label>
                        <div class="radios" style="width: 100%">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="masculino" value="M">
                                <label class="form-check-label" for="inlineRadio1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="femenino" value="F">
                                <label class="form-check-label" for="inlineRadio2">Femenino</label>
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="fecha_nac">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nac" class="form-control" name="fecha_nac">
                    </div>
                </div>
                <div class="claves">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group mb-0">
                        <label for="clave">Contraseña</label>
                    </div>
                    <div class="form-group" style="position: relative">
                        <input id="clave" class="form-control" type="password" name="clave"
                            placeholder="Contraseña nueva">
                        <i class="fa fa-eye btn-show-hide-pwd" data-for="clave"></i>
                    </div>
                    <div class="form-group" style="position: relative">
                        <input id="reclave" class="form-control" type="password" name="reclave"
                            placeholder="Repita la contraseña">
                        <i class="fa fa-eye btn-show-hide-pwd" data-for="reclave"></i>
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



