<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['userid']))
{
    header("location:profile.php");
}else
{
 $myuser_id=$_SESSION['user_id'];
 $rmv_id=$_REQUEST['userid'];
 require 'mysqli_connect.php';
 $q="delete from contacts where user_id=$myuser_id and cu_id=$rmv_id";
 
 $qr="delete from contacts where user_id=$rmv_id and cu_id=$myuser_id";
 $rr=mysqli_query($dbc,$qr);
 $r=mysqli_query($dbc,$q);
 if($r && $rr)
 {
     echo'Removed from both relations of you ';
      $qe="insert into disconnected_cnct(user_id,dis_connected)values($myuser_id,$rmv_id)";
         $re=  mysqli_query($dbc,$qe);
         if($re)
         {
             echo 'ins';
         }else
         {
             echo mysqli_error($dbc);
         }
     $qq="delete from requests where reqstd_userid=$myuser_id and user_id=$rmv_id";
    $qq1="delete from requests where user_id=$myuser_id and reqstd_userid=$rmv_id";
    mysqli_query($dbc,$qq1);
     $rq=mysqli_query($dbc,$qq);
     if($rq)
     {
        
         
     }else
     {
         echo'not deleted requests';
     }
 }else
 {
     echo'Already Removed';
 }
    
}
?>