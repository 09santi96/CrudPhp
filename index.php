<?php 
require('./phps/db.php'); 
include('include/header.php');
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <?php  if(isset($_SESSION['message'])){  ?>
                <div class="alert alert-<?php echo $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
         <?php  session_unset(); }  ?>
       


            <div class="card card-body">
                <form action="phps/save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" rows="2" class="form-control" placeholder="Descripcion"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha creacion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM task;";
                        $rs_task = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($rs_task)){ ?>
                            <tr>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['createdDate'] ?></td>
                                <td>
                                    <a class="btn btn-secondary" href="phps/edit.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger" href="phps/delete.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php 
include('include/footer.php');
?>

