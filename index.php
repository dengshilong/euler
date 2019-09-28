<?php
    require "main.php";
    $page = 1;
    $total_posts = total_posts();
    $total_pages = ceil($total_posts / PAGE_SIZE);
    if ($page > $total_pages) {
        $page = $total_pages;
    }
    //$result = get_posts_by_page($page);
    //$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $posts = get_posts_by_page($page);
    $tpl->assign("posts", $posts);
    $tpl->assign("current_page", $page);
    $tpl->assign("total_pages", $total_pages);
    $tpl->display('page.html');
?>
