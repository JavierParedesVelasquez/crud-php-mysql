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
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <style>
        .title, .subtitle {
            font-family: 'Titan One', cursive !important;
        }

        .shade {
            box-shadow: 0 2px 10px rgb(10 5 5 / 30%);
        }
    </style>
</head>

<body>
    <script>
        // Advertencia del boton eliminar
        function eliminar() {
            var resp = confirm("Are you sure you want to delete?");
            return resp;
        }
    </script>

    <h1 class="text-center p-3 fw-bold title text-danger">Crud in php mysql</h1>
    <?php
    // Llamada a la conexion
    include 'modelo/conexion.php';
    // Llamando a la vista eliminar
    include 'controlador/eliminar_person.php';
    ?>
    <div class="container-fluid">
        <div class="row px-4 pb-5">
            <form class="col-3 p-3 shade" method="post">
                <h3 class="text-center text-dark py-2 subtitle">Registration of People</h3>
                <?php

                include 'controlador/register_person.php';
                ?>
                <div class="mb-3">
                    <label for="txtname" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="txtname" placeholder="Enter Name">
                </div>
                <div class="mb-3">
                    <label for="txtlastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="txtlastname" placeholder="Enter Last Name">
                </div>
                <div class="mb-3">
                    <label for="txtdni" class="form-label">DNI:</label>
                    <input type="text" class="form-control" name="txtdni" placeholder="Enter DNI">
                </div>
                <div class="mb-3">
                    <label for="txtbirthdate" class="form-label">Birthdate:</label>
                    <input type="date" class="form-control" name="txtbirthdate" placeholder="Enter Birthdate">
                </div>
                <div class="mb-3">
                    <label for="txtmail" class="form-label">Mail:</label>
                    <input type="email" class="form-control" name="txtmail" placeholder="Enter Mail">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="btnregister" value="ok">Register</button>
                </div>
            </form>
            <div class="col-9 p-4">

                <table class="table shade">
                    <h3 class="text-center text-dark py-2 subtitle">List of people</h3>
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">DNI</th>
                            <th scope="col">BIRTHDATE</th>
                            <th scope="col">MAIL</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Call the records from the Database -->
                        <?php
                        // Llamando a la conexion
                        include 'modelo/conexion.php';
                        // Creating sql variable, select me all from the person table
                        $sql = $conexion->query(" select * from person ");
                        // While to be able to loop through all those records
                        // These records will be stored in data
                        while ($datos = $sql->fetch_object()) { ?>
                            <!-- Every time I go through that data I want to show what is in the database -->
                            <tr>
                                <th scope="row"><?= $datos->id_person ?></th>
                                <td><?= $datos->name_person ?></td>
                                <td><?= $datos->lastname_person ?></td>
                                <td><?= $datos->dni_person ?></td>
                                <td><?= $datos->birthdate_person ?></td>
                                <td><?= $datos->mail_person ?></td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <!-- Quiero que me envie un valor dentro de una variable, esta mandando todos los datos con el id -->
                                    <a href="vista/modificar_person.php?id=<?= $datos->id_person ?>" class="btn btn-small btn-warning"><i class='bx bx-edit'></i></a>
                                    <!-- Evento Onclick para que salga mensaje si realmente desea eliminar -->
                                    <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_person ?>" class="btn btn-small btn-danger"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>