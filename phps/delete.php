<?php
require("db.php"); 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = '$id';";
    $rs =  mysqli_query($conn, $query); 

    if(!$rs){
        die("Query failed");
    }
    $_SESSION['message'] = 'Task Removed Succesfully';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../index.php");
 
}
?>  