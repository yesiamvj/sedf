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
    $m=mysqli_real_escape_string($dbc,$_REQUEST['mname']);
    $f=mysqli_real_escape_string($dbc,$_REQUEST['fname']);
    $b=mysqli_real_escape_string($dbc,$_REQUEST['sname']);
    $s=mysqli_real_escape_string($dbc,$_REQUEST['sname']);
    $a=mysqli_real_escape_string($dbc,$_REQUEST['address']);
    $l=mysqli_real_escape_string($dbc,$_REQUEST['language']);
    $bg=mysqli_real_escape_string($dbc,$_REQUEST['bggrp']);
    echo"$user_id";
    $qe="select user_id as u from personal where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
            $q1="UPDATE `personal` SET fathernm = '$f', mothernm='$m',brothernnm = '$b',bggrp='$bg', sisternm = '$s', address = '$a', language = '$l' WHERE user_id = $user_id";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
    header("location:reg7.php");
}
 else {
   echo"not updateda";
  }
    }
 else 
 {
    $q="INSERT INTO `personal` ( `user_id`, `mothernm`, `fathernm`, `brothernnm`, `sisternm`, `address`, `language`, `bggrp`) VALUES ( '$user_id', '$m', '$f', '$b', '$s', '$a','$l', '$bg')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        header("location:reg7.php");
    }
    else
    {
       echo"not inserted";
}
 }
 
}

?>
