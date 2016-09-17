<?php session_start();
if(empty($_GET['username']) || empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
  header("location:strg.php");
}else
{
       $use_name=$_GET['username'];
       include '../web/storage.php';
}
?>
