<?php
    session_start();


    $serverName = "localhost";
    $dBUserName = "root";
    $dBPasswoord = "";
    $dBName = "crudphpmysql";

    $conn = mysqli_connect($serverName, $dBUserName, $dBPasswoord, $dBName);
    if(!$conn){
        die("Conexion fallida: " . mysqli_connect_error());
    }


?>
