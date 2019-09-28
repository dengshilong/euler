<?php 
    require "../main.php";
    $login = false;
    if (isset($_SESSION["authenticated"])) { 
        $login = true;
        if (isset($_GET['page'])) {
            $page = (int)htmlspecialchars($_GET['page']);
        } else {
            $page = 1;
        }
        if (isset($_GET['comment_status'])) {
            $comment_status = htmlspecialchars($_GET['comment_status']);
        } else {    
            $comment_status = "";
        }
        $total_num = total_comments($comment_status);
        $total_pages = ceil($total_num / PAGE_SIZE);
        $posts = get_comments($page, $comment_status);
        $tpl->assign("login", $login);
        $tpl->assign("comments", $posts);
        $tpl->assign("comment_status", $comment_status);
        $tpl->assign("current_page", $page);
        $tpl->assign("total_pages", $total_pages);
        $tpl->display("admin/comment.html");
    } else {
        redirection("login.php");
    }
