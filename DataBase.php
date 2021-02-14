<?php
    //Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
    
    //Conectar a la base de datos
    
    $hostname="localhost";
    $username="admin2";
    $password="123";
    $dbname="frelancer";
   
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>