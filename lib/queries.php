<?php
    include("config.php");
    function get_post_by_id($id) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) { 
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $sql = "SELECT ID, post_title, post_content FROM posts where ID=$id";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            return mysqli_fetch_array($result);
        }
    }
    function get_posts_by_page($page_ID, $page_size=PAGE_SIZE) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $query_start = ($page_ID - 1) * $page_size;
            $sql = "SELECT ID, post_title, post_content FROM posts order by ID limit $query_start, $page_size";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            $res = array();
            while($row = mysqli_fetch_array($result)) {
                $res[] = $row;
            }
            return $res;
        }
    }
    function create_post($post_title, $post_content, $post_date, $post_modified) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $sql = "INSERT INTO posts (post_title, post_content, post_date, post_modified) VALUES ('$post_title', '$post_content', '$post_date', '$post_modified')";
            mysqli_query($con, $sql);
            mysqli_close($con);
        }
    }
    function update_post($post_title, $post_content, $id) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $sql = sprintf("UPDATE posts SET post_title='%s', post_content='%s' WHERE id=%d", $post_title, $post_content, $id);
            mysqli_query($con, $sql);
            mysqli_close($con);
        }
    }
    function update_comment($comment_ID) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $sql = sprintf("UPDATE comments SET approved=1 WHERE comment_ID=%d", $comment_ID);
            mysqli_query($con, $sql);
            mysqli_close($con);
        }
    }
    function create_comment($user, $email, $site, $comment_content, $post_ID, $comment_parent) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $sql = sprintf("INSERT INTO comments (user, email, site,comment_content, post_ID, comment_parent) VALUES ('%s','%s','%s', '%s',%d,%d)", $user, $email, $site, $comment_content, $post_ID, $comment_parent);
            echo $sql;
            mysqli_query($con, $sql);
            mysqli_close($con);
        }
    }
    function get_comments_by_page($post_ID, $page_ID, $page_size=50) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $query_start = ($page_ID - 1) * $page_size;
            $sql = "SELECT comment_ID, post_ID, user, email,site,comment_content, comment_parent, comment_date FROM comments where approved=1 and post_ID=$post_ID limit $query_start, $page_size";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            $res = array();
            while($row = mysqli_fetch_array($result)) {
                $res[] = $row;
            }
            return $res;
        }
    }
    function get_comments($page_ID, $comment_status="",$page_size=10) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $query_start = ($page_ID - 1) * $page_size;
            $where = "";
            if ($comment_status != "") {
                $approved = 1;
                switch($comment_status) {
                    case "moderated":
                        $approved = 0;
                        break;
                    case "approved":
                        $approved = 1;
                        break;
                }
                $where = " where approved=$approved ";
            } else {
                $where = " where 1=1 ";
            } 
            $sql = "SELECT comment_ID, post_ID, user, email,site,comment_content, comment_parent, comment_date FROM comments" . $where . "limit $query_start, $page_size";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            $res = array();
            while($row = mysqli_fetch_array($result)) {
                $res[] = $row;
            }
            return $res;
        }
    }
    function total_posts() {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $sql = "SELECT ID FROM posts"; 
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            return mysqli_num_rows($result);
        }
    }
           
    function total_comments($comment_status) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            mysqli_query($con, "set names utf8");
            $where = "";
            if ($comment_status != "") {
                $approved = 1;
                switch($comment_status) {
                    case "moderated":
                        $approved = 0;
                        break;
                    case "approved":
                        $approved = 1;
                        break;
                }
                $where = " where approved=$approved ";
            } else {
                $where = " where 1=1 ";
            } 
            $sql = "SELECT comment_ID FROM comments" . $where; 
            $result = mysqli_query($con, $sql);
            mysqli_close($con);
            return mysqli_num_rows($result);
        }
    }
    function verify_user($username, $password) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            $sql = sprintf("SELECT 1 FROM user WHERE username='%s' AND password='%s'", mysqli_real_escape_string($con, $username), mysqli_real_escape_string($con, $password));
            $result = mysqli_query($con, $sql);
            if ($result == FALSE)
                return false;
            if (mysqli_num_rows($result) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    function create_user($username, $password) {
        $con = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        if (mysqli_connect_errno($con)) {
            return null;
        } else {
            $sql = sprintf("INSERT INTO user (username, password) VALUES('%s', '%s');", mysqli_real_escape_string($con, $username), mysqli_real_escape_string($con, $password));
            mysqli_query($con, $sql);
        }
    }
        
    function redirection($page) {
        $host = $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]));
        $path = rtrim($path, "/");
        header("Location:http://$host$path/$page");
        exit;
    }
            
            
