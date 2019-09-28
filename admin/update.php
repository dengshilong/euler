<?php include("header.php"); ?>
<?php
    if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["content"])) {
        $id = $_POST["id"];
        //$title = htmlspecialchars($_POST["title"]);
        //$content = htmlspecialchars($_POST["content"]);
        if(!get_magic_quotes_gpc()) {
            $post_title = addslashes($_POST["title"]);
            $post_content = addslashes($_POST["content"]);
        } else {
            $post_title = $_POST['title'];
            $post_content = $_POST["content"];
        }   

        update_post($post_title, $post_content, $id);
        redirection("index.php");
    }
    
?>
