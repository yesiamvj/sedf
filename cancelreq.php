<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['username']))
{
    header("location:index.php");
}else
{
  $user_id=$_SESSION['user_id'];
  $usernm=$_REQUEST['username'];

  require 'mysqli_connect.php';
 
  $q="select user_id as u from users where username='$usernm'";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $cu_id=$row['u'];
  }
  $q="update requests set cancel=1 where user_id=$user_id and reqstd_userid=$cu_id";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
      echo'Canceled ';
  }else{
      echo 'Try again';
  }
}
?>