<?php
// Vamos a validar que el boton btnmodify se haya presionado
//if, si es diferente (!empty) al vacio
if (!empty($_POST["btnmodify"])) {
    // Validar que todos los datos no tienen que estar vacios
    if (!empty($_POST["txtname"]) and !empty($_POST["txtlastname"]) and !empty($_POST["txtdni"]) and !empty($_POST["txtbirthdate"]) and !empty($_POST["txtmail"])) {
        // Si los datos estan completos voy almacenarlos para luego modificarlo en la base de datos
        $id = $_POST["id"];
        $txtnombre = $_POST["txtname"];
        $txtlastname = $_POST["txtlastname"];
        $txtdni = $_POST["txtdni"];
        $txtbirthdate = $_POST["txtbirthdate"];
        $txtmail = $_POST["txtmail"];
        // Modificar todo esto en la base de datos
        $sql = $conexion->query(" update person set name_person='$txtnombre', lastname_person='$txtlastname', dni_person='$txtdni', birthdate_person='$txtbirthdate', mail_person='$txtmail' where  id_person=$id");
        // Verificar si se ah modificado bien
        if ($sql == 1) {
            header("location: ../index.php");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error modifying person.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';  
        }
    } else {
        // Si en caso hay un campo vacio
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Empty Fields.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
}
