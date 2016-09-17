
<?php session_start();
 if( empty($_GET['username']))
 {
    header("location:blgstrt.php");
 }else
 {
        $user_name=  mysqli_real_escape_string($dbc,trim($_GET['username']));
    include '../web/blog.php';
 }