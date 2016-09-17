  
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $news=  mysqli_real_escape_string($dbc,trim($_REQUEST['news']));
    $public=$_REQUEST['allppl'];
    if($public=="1")
    {
           $check=0;
    }  else {
    $check=1;       
    }
    
   $today = mysqli_real_escape_string($dbc,trim(date("g:i a ,F j, Y")));
   if(!empty($news))
   {
    $q="insert into flash_news(user_id,flash,public,time,checks)values($user_id,'$news','$public','$today', '$check' )";
   
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           echo 'Your news Flashed';
    }  else {
    echo mysqli_error($dbc);       
    }      
   }  else {
          echo 'Say something to flash';       
   }
    
}