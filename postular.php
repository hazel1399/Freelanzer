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

<?php include('head.php') ?>
<?php include('header.php') ?>

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

<br><br>
<script type="text/javascript">
$(document).ready(function() {
$('.navbar-nav').find('a.active').removeClass('active');
});
</script>

<?php include('footer.php') ?>