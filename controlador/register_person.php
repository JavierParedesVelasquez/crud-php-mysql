<?php
//verificar si el boton se ah presionado
if (!empty($_POST["btnregister"])) { //si el usuario presiona btnregister quiero que hagas:
    //lo que quiero es validar todos esos campos
    //validar que ningun campo este vacio, con esto estoy validando que el usuario ingrese si o si estos datos
    if (!empty($_POST["txtname"]) and !empty($_POST["txtlastname"]) and !empty($_POST["txtdni"]) and !empty($_POST["txtbirthdate"]) and !empty($_POST["txtmail"])) {

        //Almacenar una variable que diga nombre
        $txtname = $_POST["txtname"];
        $txtlastname = $_POST["txtlastname"];
        $txtdni = $_POST["txtdni"];
        $txtbirthdate = $_POST["txtbirthdate"];
        $txtmail = $_POST["txtmail"];

        $sql = $conexion->query(" insert into person(name_person, lastname_person, dni_person, birthdate_person, mail_person) values ('$txtname','$txtlastname','$txtdni','$txtbirthdate','$txtmail') ");
        //validar si realmente se ah registrado o no
        if ($sql == 1) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Successfully registered person.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Unregistered user.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Some of the fields is empty.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
