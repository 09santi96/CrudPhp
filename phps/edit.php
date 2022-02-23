<?php
require("db.php"); 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = '$id';";
    $rs =  mysqli_query($conn, $query); 


    if(mysqli_num_rows($rs) == 1){
        $row = mysqli_fetch_array($rs);
        $title = $row['titulo'];
        $description = $row['descripcion'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query2 = "UPDATE task SET titulo = '$title', descripcion = '$description' WHERE id = '$id';";
    mysqli_query($conn, $query2); 

    $_SESSION['message'] = 'Nota actualizada';
    $_SESSION['message_type'] = 'primary';
    header("Location: ../index.php");

}


?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/7d49ec5fe9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/backgroundStyle.css">
    <title>Edit</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="../index.php" class="navbar-brand">Volver</a>
            <h3 class="navbar navbar-brand">Editar Tarea</h3>
             
        </div>
    </nav>

<section>
        <div class="layer layer1"></div>
        <div class="layer layer2"></div>
        <div class="layer layer3"></div>
        <div class="layer layer4"></div>
        <div class="layer layer5"></div>
        <div class="layer layer6"></div>
        <div class="layer layer7"></div>
        <div class="layer layer8"></div>
        <div class="layer layer9"></div>
</section>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body card-edit">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Actualizar titulo" name="title" value="<?php echo $title ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Actualizar descripcion"><?php echo $description ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>