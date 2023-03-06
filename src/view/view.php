
<?php 
use Esteban\models\Profesores;
if (count($_POST) > 0 ) {
    $nombre     = $_POST['nombre'];
    $apellido   = $_POST['apellido'];
    $asignatura = $_POST['asignatura'];
    $turno      = $_POST['turno'];

    $uuid       = $_POST['id'];

    $profesores= Profesores::get($uuid);

        $profesores->setNombre($nombre);
        $profesores->setApellido($apellido);
        $profesores->setAsignatura($asignatura);
        $profesores->setTurno($turno);

        $profesores->update();

        header("Location:?view=home");


}else if (isset($_GET['uuid'])) {
    
    $profesores=Profesores::get($_GET['uuid']);
}else {
    header("Location:?view=home");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/view/resources/styles.css">
    <title>View</title>
</head>
<body>
        <?php require 'resources/navbar.php' ?>
        <h1>Actualizacion</h1>

        <form action="" method="POST">
            <input type="text" name="nombre" value="<?php echo $profesores->getNombre() ?>">
            <input type="text" name="apellido" value="<?php echo $profesores->getApellido() ?>">
            <input type="text" name="asignatura" value="<?php echo $profesores->getAsignatura() ?>">
            <input type="text" name="turno" value="<?php echo $profesores->getTurno() ?>">
            <input type="hidden" name="id" value="<?php echo $profesores->getUUID() ?>">
            <input type="submit" value="Actualizar profesor">
        </form>
</body>
</html>