
<?php

use Esteban\models\Profesores;
    $profesores = Profesores::getAll();

    if (isset($_GET['metodo']) && isset($_GET['uuid'])) {
        $profesores = new Profesores();
        $profesores->delete($_GET['uuid']);
        header('location:./?view=home');
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/view/resources/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>WEB</title>
</head>
<body>
    
    <?php require_once 'resources/navbar.php' ?>
    
    <h1>HOME</h1>

    <div class="profe-container">
        <table class="table table-striped table-ligh">
            
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>ASIGNATURA</th>
                <th>TURNO</th>
                <th>ACCIONES</th>
            </tr>

            <?php
            foreach ($profesores as $profes) {
                $uuid= $profes->getUUID();
                $nombre = $profes->getNombre();
                $apellido= $profes->getApellido();
                $asignatura= $profes->getAsignatura();
                $turno = $profes->getTurno();
            ?>

                <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $apellido ?></td>
                    <td><?php echo $asignatura ?></td>
                    <td><?php echo $turno ?></td>
                    <td class="delete">
                        <a href="./<?php echo '?metodo=delete&uuid='.$uuid?>">Borrar </a>
                        <a class="edit" href="?view=view&uuid=<?php echo $uuid; ?>">Editar</a>
                    </td>
                   
                </tr>

                    <?php
                        }
                    ?>
            </table>
        <!-- <div class="flex-column">
            <a href="?view=view&uuid=<?php echo $uuid ?>">
                <div class="profe-preview">
                    <div class="nombreape"><?php echo $nombre.'-'.$apellido; ?></div>
                </div>
            </a>
            
            <div class="delete">
                <a href="./<?php echo '?metodo=delete&uuid='.$uuid?>">Borrar</a>
            </div>
        </div> -->
    </div>

</body>
</html>


