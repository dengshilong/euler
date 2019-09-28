<?php session_start();?>
<?php
    include "class/Smarty.class.php";
    include("lib/queries.php"); 
    include("lib/constants.php");
    //define('__SITE_ROOT', '/home/long/program/php/euler');
    define('__SITE_ROOT', '/home/wwwroot/shilong/public_html/euler');
    $tpl = new Smarty();
    $tpl->template_dir = __SITE_ROOT . "/templates/";
    $tpl->compile_dir = __SITE_ROOT . "/templates_c/";
    $tpl->cache_dir = __SITE_ROOT . "/cache/";
    $tpl->left_delimiter = '{{';
    $tpl->right_delimiter = '}}';
?>
