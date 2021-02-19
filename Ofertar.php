<?php
require 'DataBase.php';
session_start();
if(isset($_SESSION['Email'])){
    #echo("Inicio sesion correctamente   ". $_SESSION['Email']);
    if (!empty($_POST['titulo']) && !empty($_POST['descripcion'])  && !empty($_POST['precio'])){
        $titulo=$_POST['titulo'];
        $descripcion=$_POST['descripcion'];
        $Id=$_SESSION['IdUsuario'];
        $precio=$_POST['precio'];
        #$FechaPublicacion='select CURDATE();';
        $sql = "INSERT INTO OfertaFreelancer (precio, titulo, descripcion, FechaPublicacion, fk_IdFree) VALUES ('$precio', '$titulo', '$descripcion', CURDATE(), '$Id')";
        mysqli_query( $conn, $sql )  or die ( "Algo ha ido mal en la consulta a la base de datos");
    echo "Registrado Correctamente";
    header("Location: index.php");  
    }
}else{
    echo "no inicio sesion";
}
?>

<?php include('head.php') ?>
<?php include('header.php') ?>

</body>
<div class="row row-cols-3 row-cols-sm-3 row-cols-md-2">
    <div class="col-md-3 col-sm-2 col-1"></div>
    <div class="col-md-6 col-sm-8 col-10 marco-form ">
        <h2 class=" login-title text-center">Publicar una oferta</h2>



        <div class="inputs-forms">
            <br>
            <!-- En action usamos $_SERVER para que los datos del form se envien a la vista en la que se encuentra -->
            <form method="POST" action="Ofertar.php" role="form" id="form-register" onsubmit="verificarcaptcha()">
                <div class="informacion">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea rows="3" type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
                       
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" min="4">
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

<?php include('footer.php') ?>