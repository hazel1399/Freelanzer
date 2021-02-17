<?php
require 'DataBase.php';

if (!empty($_POST['username']) && !empty($_POST['password']) ) {
    $email=$_POST['username'];
    $password=$_POST['password'];
    $s = "Select * from Usuario where Email = '$email'";
    
    $result= mysqli_query($conn, $s);
   
    $num= mysqli_num_rows($result);
   
    if ($num == 0) {
        echo "El email no esta registrado";
    }
    $row= mysqli_fetch_assoc($result);
    $hash=$row['Contraseña'];
    if(password_verify($password, $hash)){
    session_start();
    $_SESSION['Email']=$row['Email'];
    header("Location: index.php"); 
    #die();
    echo "Inicio sesion Correctamente";
    }else{
        echo "Credenciales incorrectas, porfavor intentelo nuevamente";
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
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">    
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
                    <li class="nav-item"><a href="postular.php" class="nav-link">Postularse</a></li>                                                                                                 
                    <div class="pull-right"> 
                        <li class="nav-item"><a href="registro.php" class="nav-link"><i class="fas fa-user-plus"></i> Registrarse </a>                                            
                    </div>    
                    <div class="pull-right">
                        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-sign-in"></i> Ingresar </a>                        
                    </div>                
                </ul>
            </div>            
        </nav>        
    </header>    
<br>	
</body>

<div class="container text-center">
    <div class="row mt-3">
        <div class="col-md-3"></div>
        <div class="col-md-6 px-5">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" role="form">
                <div class="form-group">
                    <label for="username" class="font-weight-bold">Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario">
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                </div>
                <!-- <div class="form-group form-check">
                    <input type="checkbox" name="check" id="check">
                    <label for="check">Remember me</label>
                </div> -->
                <button href="index.php" name="submit" type="submit" class="btn btn-primary btn" style="width: 100%">Login</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        try {
            $('.navbar-nav').find('a.active').removeClass('active');
        } catch (Exception $e) {}
        
    });
</script>
    
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
