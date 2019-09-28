<?php include("header.php"); ?>
<?php
    if (isset($_GET["ids"])) {
        $ids = $_GET["ids"];
        update_comment($ids);
        redirection("comments.php?comment_status=moderated");
    } else {
        redirection("comments.php");
    }
    
?>
