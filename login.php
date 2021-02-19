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
    }else{
    $row= mysqli_fetch_assoc($result);
    $hash=$row['Contraseña'];
    $Banco=$row['CuentaBanco'];

    if(password_verify($password, $hash)){
    session_start();
    $_SESSION['Email']=$row['Email'];
    $_SESSION['IdUsuario']=$row['IdUsuario'];
    if ($Banco!='') {
        $_SESSION['Banco']=$row['CuentaBanco'];
    }
    
    header("Location: index.php"); 
    #die();
    echo "Inicio sesion Correctamente";
    }else{
        echo "Credenciales incorrectas, porfavor intentelo nuevamente";
    }
    }
}

    mysqli_close($conn);
?>

<?php include('head.php') ?>
<?php include('header.php') ?>	

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
    
<?php include('footer.php') ?>
