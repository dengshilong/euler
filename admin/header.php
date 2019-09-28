<?php
    session_start();
    include("../lib/constants.php");
    include("../lib/queries.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="admin.css" type="text/css" rel="stylesheet">
        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
        <script language="javascript" type="text/javascript">
            tinyMCE.init({
                mode :"textareas"
            });
        </script>
    </head>
    <body>
        <div id="container">
