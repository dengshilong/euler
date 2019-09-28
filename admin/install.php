<?php
    include("../lib/constants.php");
    include("../lib/queries.php");
    session_start();
        /*if (isset($_POST["username"]) && isset($_POST["password"])) {    
            $username = strip_tags(substr($_POST['username'],0,32));
            $password = strip_tags(substr($_POST['password'],0,32));
            $password = crypt(md5($username), md5($password));
            create_user($username, $password); 
            redirection("login.php");
        }*/
        redirection("login.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="admin.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            用户名：<input type="text" name="username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']);?>"/><br/>
            密码：<input type="password"  name="password" /></br>
            <input type="submit" value="新建"/>
        </form>
    </body>
</html>
