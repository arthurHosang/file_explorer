<?php

if ((isset($_POST['email'])) && (isset($_POST['senha']))){
    if (($_POST['email'] == "admin@admin.com") && ($_POST['senha'] == "12345")){
        header("Location: lista_complta.php");
    } else {
        header("Location: index.html");
    }
} else {
   header("Location: index.html");
}

?>