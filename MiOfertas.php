<?php
require 'DataBase.php';
   # mysqli_close($conn);
session_start();
if(isset($_SESSION['Email'])){
    echo("Inicio sesion correctamente   ". $_SESSION['Email']);
}else{
    echo "no inicio sesion";
}
$Id=$_SESSION['IdUsuario'];
$s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where fk_IdFree = '$Id'";
$result= mysqli_query($conn, $s);


   
$num= mysqli_num_rows($result);

?>

<?php include('head.php') ?>
<?php include('header.php') ?>

<h2 class=" login-title text-center">Tus ofertas activas:</h2>
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
