<!DOCTYPE html>
<?php session_start();
if(empty($_GET['username']))
{
  header("location:strtvid.php");
}else
{
        $user_name=$_GET['username'];
        include '../web/videos.php';
}
?>