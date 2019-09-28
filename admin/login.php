
<?php
    include("../lib/constants.php");
    include("../lib/queries.php");
    session_start();
    /*define("USER","admin");
    define("PASS","123456");
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        if($_POST["username"] == USER && $_POST["password"] == PASS) {
            $_SESSION["authenticated"] = true;
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), '/\\');
            header("Location:http://$host$path/index.php");
            exit;
        }
    }*/
        if (isset($_POST["username"]) && isset($_POST["password"])) {    
            $username = strip_tags(substr($_POST['username'],0,32));
            $password = strip_tags(substr($_POST['password'],0,32));
            $password = crypt(md5($username), md5($password));
            if (verify_user($username, $password)) {
                $_SESSION["authenticated"] = true;
                redirection("index.php");
            }
        }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="admin.css" type="text/css" rel="stylesheet">
        <script src="admin.js" type="text/javascript"></script>
    </head>
    <body>
        <?php if(count($_POST) > 0) echo "用户名或密码错误"; ?>
        <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            用户名：<input type="text" name="username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']);?>"/><br/>
            密码：<input type="password"  name="password" /></br>
            <input type="submit" value="登陆"/>
        </form>
        <script>
            window.onload = function() {
                if (document.forms.login.username.value == "") {
                    document.forms.login.username.focus();
                } else {
                    document.forms.login.password.focus();
                }
            }
        </script>
    </body>
</html>
