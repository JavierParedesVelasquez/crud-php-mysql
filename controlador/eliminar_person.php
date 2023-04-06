<?php
// Validar que se ah enviado correctamente
if (!empty($_GET["id"])) {
    // Si valido que se ah enviado lo que hare sera eliminar el registro, almacenando la id en una variable
    $id = $_GET["id"];
    // Consulta
    $sql = $conexion->query(" delete from person where id_person=$id ");
    //  Validar si se ah eliminado
    if ($sql == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Person deleted successfully.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error deleting.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}
