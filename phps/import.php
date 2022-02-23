<?php 
require("db.php"); 
    if(isset($_POST['import'])){
        $filename = $_FILES['file']['tmp_name'];

        if($_FILES['file']['size'] > 0 ){
            $file = fopen($filename, "r");

            while(($column = fgetcsv($file,10000,",")) !== FALSE){
                $sqlInsert = "INSERT INTO task(titulo, descripcion) VALUES('" . $column[0] . "', '" . $column[1] . "')"; 
                $result = mysqli_query($conn, $sqlInsert);
            }
        }
    $_SESSION['message'] = 'Importacion correcta!';
    $_SESSION['message_type'] = 'success';
    header("Location: ../index.php");
    }else{
        $_SESSION['message'] = 'Error de importacion!';
        $_SESSION['message_type'] = 'danger'; 
    }
?>