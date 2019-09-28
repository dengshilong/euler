<?php 
    require "../main.php";
    $login = false;
    if (isset($_SESSION["authenticated"])) { 
        $login = true;
        $page = 1;
        $posts = get_posts_by_page($page);
        $total_num = total_posts();
        $total_pages = ceil($total_num / PAGE_SIZE);
        $tpl->assign("login", $login);
        $tpl->assign("posts", $posts); 
        $tpl->assign("current_page", $page);
        $tpl->assign("total_pages", $total_pages);
        $tpl->display("admin/index.html");
        
    } else{ 
        redirection("login.php");
    } 
