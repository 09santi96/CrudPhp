<?php
require("db.php"); 

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    $query = "INSERT INTO task(titulo, descripcion) VALUES('$title', '$description');";
    $rs =  mysqli_query($conn, $query);

    if(!$rs){
        die("Query failed");
    }

    $_SESSION['message'] = 'Guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success'; 
    header("Location: ../index.php");
}