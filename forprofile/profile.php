
<?php session_start();
if(empty($_GET['username']) || empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
       header("location:timeLine.php");
}else
{
       $user_name=$_GET['username'];
       include '../web/profile.php';
}

?>
