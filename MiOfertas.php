<?php
require 'DataBase.php';
session_start();
$Id=$_SESSION['IdUsuario'];
$s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where fk_IdFree = '$Id'";
$result= mysqli_query($conn, $s);
$num= mysqli_num_rows($result);
?>

<?php include('head.php') ?>
<?php include('header.php') ?>

<h2 class=" login-title text-center">Tus ofertas activas:</h2>

<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Descripción</th>
            <th scope="col">Publicado el:</th>
            <th scope="col">Publicado por:</th>
            <th scope="col">País</th>
        </tr>
    </thead>
    <tbody>
        <?php

        for ($i=0; $i < $num ; $i++) { 
            $row=mysqli_fetch_assoc($result);
            $titulo=$row['Titulo'];
            $precio=$row['Precio'];
            $fechaP=$row['FechaPublicacion'];
            $ubicacion=$row['Ubicacion'];
            $nombre=$row['Nombre'];
        ?>
            <tr>
                <th scope="row">
                    <a href="prueba.html"> <img src="http://simon.uis.edu.co/reddinamica/assets/images/logouis.png" alt="logo" height=50px width=100px></a>
                </th>
                <td>
                    <?php echo $titulo;     ?>
                    <br>
                    <i class="far fa-money-bill-alt"></i>&nbsp; $<?php echo $precio;  ?>
                </td>
                <td>
                    <!-- Job Category -->
                    <?php echo $fechaP;     ?>
                </td>
                <td>
                    <!-- Job Category -->
                    <?php echo $nombre;     ?>
                </td>
                <td>
                    <?php echo $ubicacion;     ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include('footer.php') ?>