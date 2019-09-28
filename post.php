<?php
    require "main.php";
    if (isset($_GET["id"])) {
        $id = htmlspecialchars($_GET["id"]);
        $post = get_post_by_id($id);
        if (!$post) {
            redirection("404.php");
        }
        $login = false;
        if (isset($_SESSION["authenticated"])) {
            $login = true;
        } 
        $page = ceil($id / PAGE_SIZE);    
        $total_posts = total_posts();
        $total_pages = ceil($total_posts / PAGE_SIZE);
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $comments = get_comments_by_page($id, 1);    
        $tpl->assign("post", $post);
        $tpl->assign("login", $login);
        $posts = get_posts_by_page($page);
        $tpl->assign("posts", $posts);
        $tpl->assign("current_page", $page);
        $tpl->assign("total_pages", $total_pages);
        $tpl->assign("comments", $comments);
		$a = rand(1,5); /*for junk */
        $b = rand(1,5);/* for junk */
        $tpl->assign("a", $a);
        $tpl->assign("b", $b);

        $tpl->display('post.html');
    }
?>
