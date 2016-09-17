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
    $famil=mysqli_real_escape_string($dbc,$_REQUEST['fam']);
    $friend=mysqli_real_escape_string($dbc,$_REQUEST['frnd']);
    $love=mysqli_real_escape_string($dbc,$_REQUEST['love']);
    $study=mysqli_real_escape_string($dbc,$_REQUEST['std']);
    $poli=mysqli_real_escape_string($dbc,$_REQUEST['pol']);
    $life=mysqli_real_escape_string($dbc,$_REQUEST['life']);
    $god=mysqli_real_escape_string($dbc,$_REQUEST['god']);
   
    echo"$user_id";
    $qe="select user_id as u from about where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
        $q2="UPDATE `about` SET `family` = '$famil', `frndship` = '$friend', `love` = '$love', `studies` = '$study', `politics` = '$poli', `life` = '$life', `god` = '$god'  WHERE `about`.`user_id`=$user_id";
        $r2=mysqli_query($dbc,$q2);
        if($r2)
        {
           header("location:reg9.php");
        }
        else
        {
            echo 'not updated';
        }
         }  
    else 
    {
      $q1="INSERT INTO `about` (`abt_id`, `user_id`, `family`, `frndship`, `love`, `studies`, `politics`, `life`, `god`) VALUES (NULL, '$user_id', '$famil', '$friend', '$love', '$study', '$poli', '$life', '$god')";
      $r1=mysqli_query($dbc,$q1);
      if($r1)
      {
          header("location:reg9.php");
    }  else {
        echo 'not inserted';
    }
}
}