<?php session_start();
if(empty($_SESSION['email']))
{
    header("location:register.html");
}
else
{
     require 'mysqli_connect.php';
    $email=$_SESSION['email'];
    $q1="SELECT user_id as u from users where email= ' $email '";
  $r6=mysqli_query($dbc, $q1);
    if($r6)
    {
        $row=mysqli_fetch_array($r6,MYSQLI_ASSOC);
        $user_id=$row['u'];
    }  else {
        $user_id="no";              
    }
    $curst=mysqli_real_escape_string($dbc,$_REQUEST['curstatus']);
    $abtme=mysqli_real_escape_string($dbc,$_REQUEST['aboutme']);
    $words=mysqli_real_escape_string($dbc,$_REQUEST['wtow']);
    
    echo"$user_id";
    $qe="select user_id as u from status where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
        $q2="UPDATE `status` SET `status` = '$curst', `aboutme` = '$abtme', `toworld` = '$words' WHERE user_id = $user_id";
        $r2=mysqli_query($dbc,$q2);
        if($r2)
        {
           header("location:index.html");
        }
        else
        {
           header("location:reg10.php");
        }
         }  
    else 
    {
 $q1="INSERT INTO `status` (`status_id`, `status`,  `aboutme`, `toworld`, `user_id`) VALUES (NULL, '$curst',  '$abtme', '$words', '$user_id')";
      $r1=mysqli_query($dbc,$q1);
      if($r1)
      {
         header("location:index.html");
    }  else {
        header("location:reg10.php");
    }
}
}