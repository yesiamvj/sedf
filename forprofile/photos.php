<!DOCTYPE html>
<?php session_start();
if(empty($_GET['username']))
{
  header("location:strtphotos.php");
}  else {
        $user_name=$_GET['username'];
        include '../web/photos.php';
}
?>