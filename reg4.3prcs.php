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
    $author=mysqli_real_escape_string($dbc,$_REQUEST['authr']);
    $tvshow=mysqli_real_escape_string($dbc,$_REQUEST['tvsh']);
    $cartn=mysqli_real_escape_string($dbc,$_REQUEST['cn']);
    $miscdiret=mysqli_real_escape_string($dbc,$_REQUEST['mscdir']);
    $filmdirt=mysqli_real_escape_string($dbc,$_REQUEST['flmdir']);
    $cmdyactor=mysqli_real_escape_string($dbc,$_REQUEST['cmdyact']);
   
    echo"$user_id";
    $qe="select user_id as u from annoying where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
        
        $q1="update annoying set author='$author', `tvshow` = '$tvshow', `cn` = '$cartn', `miscdir` = '$miscdiret', `filmdir` = '$filmdirt', `cmdyactr` = '$cmdyactor' where user_id=$user_id " ;
        $r1=mysqli_query($dbc,$q1);
        if($r1)
        {
            header("location:reg8.php");
        }
        else
        {
            echo 'not updated';
        }
        
    }
    else
    {
        $q2="INSERT INTO annoying (`user_id`,`author`, `tvshow`, `cn`, `miscdir`, `filmdir`, `cmdyactr`) values($user_id, '$author', '$tvshow', '$cartn', '$miscdiret', '$filmdirt', '$cmdyactor')";
        $r2=mysqli_query($dbc,$q2);
        if($r2)
        {
           header("location:reg8.php");
        }
        else
        {
            echo"not inserted";
        }
    }
    
    
    foreach ($_REQUEST['ctgry_ann'] as $annct)
    {
        $annctgry=mysqli_real_escape_string($dbc,$annct);
        $qrt="insert into extradetails (user_id,ctgry_annoying)values($user_id,'$annctgry')";
        $rrt=mysqli_query($dbc,$qrt);
        if($rrt)
        {
            echo"$annctgry is inserted  is xtra dtls";
        }
 else {
     echo"xtra dtls not nsterd";
 }
        
    }
    foreach ($_REQUEST['ann'] as $annoying)
    {
        $extann=mysqli_real_escape_string($dbc,$annoying);
    
        $qt="insert into extradetails (user_id,annoying)values($user_id,'$extann')";
        $rt=mysqli_query($dbc,$qt);
        if($rt)
        {
            echo"$extann is sinserted xtra dtls";
        }
 else {
     echo"xtra dtls not nsterd";
 }
        
    }
}