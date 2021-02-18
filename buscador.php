<?php
require 'DataBase.php';
session_start();
if (!empty($_POST['idbuscar'])) {
    $buscadortext=$_POST['idbuscar'];

}if (isset($_POST['enviar']) AND empty($_POST['idbuscar'])) {
    $buscadortext=$_POST['idbuscar'];

}
$Id=$_SESSION['IdUsuario'];

if (isset($_GET['id'])) {
    $busca=$_GET['id'];
    $buscadortext=$busca;
}

if (!isset($_POST["filt"])) {
    $s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where Titulo LIKE '%$busca%'";
    $result= mysqli_query($conn, $s);
}

if (isset($_POST["filt"])) {
    
    $filtro=$_POST["filt"];

    if ($filtro == 1) {

    $s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where Titulo LIKE '%$buscadortext%'";
$result= mysqli_query($conn, $s);
}if ($filtro == 2) {

    $s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where Usuario.Nombre LIKE '%$buscadortext%'";
    $result= mysqli_query($conn, $s);
}
}





   
$num= mysqli_num_rows($result);
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
<h2 class=" login-title text-center">Ofertas disponibles</h2>
<div >
<form method="POST" action="buscador.php" role="form" id="textbuscar2" onsubmit="verificarcaptcha()">
            
                
                <input type="text" id="idbuscar" name="idbuscar" class="buscar_texto" placeholder=<?php echo $buscadortext; ?>  >
                            <div class="form-group">
                    <select id="filt"  name="filt">             
      <option value="1">Titulo</option>
      <option value="2" >Freelancer</option>
    </select>
  </div><br>

                <button name="enviar" type="submit" class="btn btn-primary btn mt-3"
                    style="width: 20%" >Buscar</button>    
                   

            </form>
            </div>
<?php

for ($i=0; $i < $num ; $i++) { 
    $row=mysqli_fetch_assoc($result);
$titulo=$row['Titulo'];
$precio=$row['Precio'];
$fechaP=$row['FechaPublicacion'];
$ubicacion=$row['Ubicacion'];
$nombre=$row['Nombre'];
?>
<div class="container mt-3" style="border: 0px white">                               
        <div class="container mt-3">            
                <table style="width: 50%;">
                    <tr>
                        <td>
                            <a href="prueba.html" > <img src="http://simon.uis.edu.co/reddinamica/assets/images/logouis.png" alt="logo" width="80px" height="70px"></a>                      
                        </td>
                        <td>    
                            <?php echo $titulo;     ?>         
                            <br>
                                         
                            <i class="far fa-money-bill-alt"></i>&nbsp; $<?php echo $precio;  ?>                                                                      
                        </td>    
                        <td>
                            <!-- Job Category -->                                                                                        
                            Publicado el:      <br>  <?php echo $fechaP;     ?>                
                        </td>
                        <td>
                            <!-- Job Category -->                                                                                        
                            Publicado por:      <br>  <?php echo $nombre ;     ?>

                                         
                        </td>
                        <td>
                        De:<br> <?php echo $ubicacion;     ?>    
                        </td>
                    </tr>
                </table>            
        </div>
</div>
<?php } ?>
</body>
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
