<?php 
    require "../main.php";
    $login = false;
    if (isset($_SESSION["authenticated"])) { 
        $login = true;
        if (isset($_GET["id"])) {
            $id = $_GET["id"]; 
            $post = get_post_by_id($id);
            $tpl->assign("post", $post);
            $tpl->display("admin/edit.html");
        } else {
            redirection("404.php");
        }
    } else{ 
        redirection("login.php");
    } 
