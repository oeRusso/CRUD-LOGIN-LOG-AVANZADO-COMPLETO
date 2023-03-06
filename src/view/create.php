<?php
    use Esteban\models\Profesores;

    if (count($_POST) > 0) {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'Apellido de prueba';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : 'Apellido de prueba';
        $asignatura = isset($_POST['asignatura']) ? $_POST['asignatura'] : '...';
        $turno = isset($_POST['turno']) ? $_POST['turno'] : '...';

        $profesores = new Profesores($nombre, $apellido, $asignatura, $turno);

        
        $profesores->save();

        header('location:./?views=home');
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/view/resources/styles.css">

    <title>Document</title>
</head>
<body>
<?php require_once 'resources/navbar.php' ?>

    <h2>Nuevo registro de profesor</h2>
    <form action="?view=create" method="POST">
        <input type="text" name="nombre" placeholder="fulano...">
        <input type="text" name="apellido" placeholder="mengano..." >
        <input type="text" name="asignatura" placeholder="matematica..." >
        <input type="text" name="turno" placeholder="mañana..." >
      
        <input type="submit" value="Guardar">
    </form>
</body>
</html>