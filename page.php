<?php
    require "main.php";
    if (isset($_GET['page'])) {
        $page = (int)htmlspecialchars($_GET['page']);
     } else {
        $page = 1;
    }
    $total_posts = total_posts();
    $total_pages = ceil($total_posts / PAGE_SIZE);
    if ($page > $total_pages) {
        $page = $total_pages;
    }
    $posts = get_posts_by_page($page);
    $tpl->assign("posts", $posts);
    $tpl->assign("current_page", $page);
    $tpl->assign("total_pages", $total_pages);
    $tpl->display('page.html');
?>
