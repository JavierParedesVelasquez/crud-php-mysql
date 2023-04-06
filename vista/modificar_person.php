<?php
//Llamando conexion
include '../modelo/conexion.php';
// Recoger el id y almacenarlo en una variable
$id = $_GET["id"];
//consulta a la base de datos, recogeme todos los datos que tenga el id
$sql = $conexion->query(" select * from person where id_person=$id ")
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title Page -->
    <title>Crud in php mysql</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .shade {
            box-shadow: 0 2px 10px rgb(10 5 5 / 30%);
        }
    </style>
</head>

<body>
    <form class="col-3 p-3 shade m-auto" method="post">
        <h3 class="text-center text-dark py-2">Modify People</h3>
        <!-- Input donde se almacenara el id, modo oculto-->
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include '../controlador/modificar_person.php';
        // Recorrer todos esos datos 
        // Mientras que en sql haya registros, quiero que se almacene en $datos
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="txtname" class="form-label">Name:</label>
                <input type="text" class="form-control" name="txtname" value="<?= $datos->name_person ?>" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="txtlastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="txtlastname" value="<?= $datos->lastname_person ?>" placeholder="Enter Last Name">
            </div>
            <div class="mb-3">
                <label for="txtdni" class="form-label">DNI:</label>
                <input type="text" class="form-control" name="txtdni" value="<?= $datos->dni_person ?>" placeholder="Enter DNI">
            </div>
            <div class="mb-3">
                <label for="txtbirthdate" class="form-label">Birthdate:</label>
                <input type="date" class="form-control" name="txtbirthdate" value="<?= $datos->birthdate_person ?>" placeholder="Enter Birthdate">
            </div>
            <div class="mb-3">
                <label for="txtmail" class="form-label">Mail:</label>
                <input type="email" class="form-control" name="txtmail" value="<?= $datos->mail_person ?>" placeholder="Enter Mail">
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a class="btn btn-primary" href="../index.php"><i class='bx bxs-left-arrow-circle'></i> Back</a>
                <button type="submit" class="btn btn-dark" name="btnmodify" value="ok">Modify People</button>
            </div>
        <?php
        }
        ?>

    </form>
    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>