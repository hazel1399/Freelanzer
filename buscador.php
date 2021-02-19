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

<?php include('head.php') ?>
<?php include('header.php') ?>

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

<?php include('footer.php') ?>