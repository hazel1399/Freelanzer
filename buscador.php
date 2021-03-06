<?php
require 'DataBase.php';
session_start();
if (!empty($_POST['idbuscar'])) {
    $buscadortext = $_POST['idbuscar'];
}
if (isset($_POST['enviar']) and empty($_POST['idbuscar'])) {
    $buscadortext = $_POST['idbuscar'];
}
#$Id=$_SESSION['IdUsuario'];

if (isset($_GET['id'])) {
    $busca = $_GET['id'];
    $buscadortext = $busca;
}

if (!isset($_POST["filt"])) {
    $s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where Titulo LIKE '%$busca%'";
    $result = mysqli_query($conn, $s);
}

if (isset($_POST["filt"])) {

    $filtro = $_POST["filt"];

    if ($filtro == 1) {

        $s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where Titulo LIKE '%$buscadortext%'";
        $result = mysqli_query($conn, $s);
    }
    if ($filtro == 2) {

        $s = "Select * from OfertaFreelancer INNER JOIN Usuario ON OfertaFreelancer.fk_IdFree=Usuario.IdUsuario where Usuario.Nombre LIKE '%$buscadortext%'";
        $result = mysqli_query($conn, $s);
    }
}

$num = mysqli_num_rows($result);
?>

<?php include('head.php') ?>
<?php include('header.php') ?>

<h2 class=" login-title text-center">Ofertas disponibles</h2>
<div id="busca">

    <form method="POST" action="buscador.php" role="form" id="textbuscar2" class="formBuscar" onsubmit="verificarcaptcha()">

        <div class="form-group">
            <label for="exampleInputEmail1">Escribe lo que buscas</label>
            <textarea class="form-control" id="idbuscar" name="idbuscar" rows="1" placeholder=<?php echo $buscadortext; ?>></textarea>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filt" id="filt" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Titulo
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="filt" id="filt" value="2">
                <label class="form-check-label" for="exampleRadios1">
                    Freelancer
                </label>
            </div>
            <button name="enviar" type="submit" class="btn btn-primary btn" style="width: 20%">Buscar</button>
        </div>
    </form>
</div>

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

        for ($i = 0; $i < $num; $i++) {
            $row = mysqli_fetch_assoc($result);
            $titulo = $row['Titulo'];
            $precio = $row['Precio'];
            $fechaP = $row['FechaPublicacion'];
            $ubicacion = $row['Ubicacion'];
            $nombre = $row['Nombre'];
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