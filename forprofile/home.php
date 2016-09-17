<?php session_start();
$usename="qwe";
 if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
{
       $url='timeline.php?username='.urlencode($usename);
}else
{
       
 $url='index.php?username='.urlencode($usename);
 
}
         
    header("location:$url");
?>
