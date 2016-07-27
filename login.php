<?php
require_once 'classes/jsonUsuarios.php';

$jsonUsuarios = new jsonUsuarios();

if ((isset($_POST['email'])) && (isset($_POST['senha']))){
    if ($jsonUsuarios->login($_POST['email'], $_POST['senha'])){

        header("Location: lista2.php");
    } else {
        header("Location: index.html");
    } 
} else {
   header("Location: index.html");
}

?>
