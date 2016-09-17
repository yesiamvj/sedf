<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['myw']))
{
    header("location:index.php");
}else
{
   $user_id=$_SESSION['user_id'];
   $post=$_REQUEST['postc'];
   $today = date("g:i a ,F j, Y"); 
     
   require 'mysqli_connect.php';
  
    $ipp="INSERT INTO `post_permision` ( `user_id`, `allpeople`, `allrelation`, `friends`, `family`, `secret`, `showonlyto`, `hideeto`, `me`, `special`) VALUES (  '$user_id', '0', '1', '0', '0', '0', '0', '0', '1', '0')";
     $runpp=mysqli_query($dbc,$ipp);
     if($ipp)
     {
         
     }else{
         echo "not run post pres<br/>";
     }
        $q1="select post_id as p from post_permision where user_id=$user_id order by post_id desc";
   $r1=  mysqli_query($dbc, $q1);
   if($r1)
   {
          if(mysqli_num_rows($r1)>0)
          {
	$row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
	$post_id=$row['p'];
          }
   }
  
   

 
     
     
      $q="INSERT INTO `postforall` (`post_id`, `user_id`, `post_caption`,post_time) VALUES ( '$post_id', '$user_id', '$post','$today') ";
               $r=mysqli_query($dbc,$q);
               if($r)
               {
                   echo"Your Post Successfully Published";


               }else{
                   echo"not run to ins post ";
               }
               
               
}