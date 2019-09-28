<?php
    if (isset($_POST["page"]) && isset($_POST("post_ID"))) {
        $page = (int)htmlspecialchars($_POST["page"]);
        $post_ID = (int)htmlspecialchars($_POST("post_ID")); 
        $comments = get_comments_by_page($post_ID, $page);  
        return   
    }
