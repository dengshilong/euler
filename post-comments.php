<?php
    require "main.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $post_ID = (int)htmlspecialchars($_POST["post_ID"]);
		$sum = $_POST["sum"];
        if ($sum != $_POST["a"] + $_POST["b"]) {
            redirection("./post.php?id=$post_ID");
        }   

        if(!get_magic_quotes_gpc()) {
            $comment_content = addslashes($_POST["comment_content"]);
        } else {
            $comment_content = $_POST["comment_content"];
        } 
        $comment_content = htmlspecialchars($comment_content);  
        $user = htmlspecialchars($_POST["user"]);
        $email = htmlspecialchars($_POST["email"]);
        if (isset($_POST["site"]) && $_POST["site"] != "") {
            $site = htmlspecialchars($_POST["site"]);
        } else {
            $site = "";
        }
        $post_ID = (int)htmlspecialchars($_POST["post_ID"]);
        if (isset($_POST["comment_parent"])) {
            $comment_parent = (int)htmlspecialchars($_POST["comment_parent"]);
        } else {
            $comment_parent = 0;
        }
        if ($user != NULL && $email != NULL && $comment_content != NULL) {
            create_comment($user, $email, $site, $comment_content, $post_ID, $comment_parent);
        } 
        redirection("./post.php?id=$post_ID");
    } else {
        redirection("./index.php");
    }
