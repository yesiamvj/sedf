
<?php session_start();
 if( empty($_GET['username']))
 {
    header("location:strtfiles.php");
 }else
 {
        require '../web/mysqli_connect.php';
        $user_name=  mysqli_real_escape_string($dbc,trim($_GET['username']));
    include '../web/files.php';
 }