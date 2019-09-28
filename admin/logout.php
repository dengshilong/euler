<?php
    session_start();
    if(isset($_SESSION["authenticated"])) {
        unset($_SESSION["authenticated"]);
    }
    $host = $_SERVER["HTTP_HOST"];
    echo $host;
    $path = rtrim(dirname($_SERVER["PHP_SELF"]), "\//");
    header("Location:http://$host$path/login.php");
    exit;
    //header("Location:http://$host");
?>
