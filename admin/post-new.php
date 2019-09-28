<?php 
    require "../main.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!get_magic_quotes_gpc()) {
            $post_title = addslashes($_POST["title"]);
            $post_content = addslashes($_POST["content"]);
        } else {
            $post_title = $_POST['title'];
            $post_content = $_POST["content"];
        }   
        $post_date = date("Y-m-d H:i:s");
        $post_modified = date("Y-m-d H:i:s");
        if ($post_title != NULL && $post_content != NULL) {
            create_post($post_title, $post_content, $post_date, $post_modified);
        } 
        redirection("index.php");
    } else {
        $action = htmlspecialchars($_SERVER["PHP_SELF"]);
        $tpl->assign("action", $action);
        $tpl->display("admin/post-new.html");
    }
