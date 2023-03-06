<?php

if (isset($_GET['view'])){

    $view = $_GET['view'];

    require_once 'src/view/' .$view .'.php';
} else{
    require_once 'src/view/home.php';
}