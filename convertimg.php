<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    
}  else 
{
  $data = $_REQUEST['q'];

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
require 'mysqli_connect.php';
$rand=rand(00000000,9999999999999999);
$name='../'.$user_name.'/publicfolder/post/images/profileimages/'.$rand.'myimg.png';
$r=file_put_contents('../users/'.$user_name.'/publicfolder/post/images/profileimages/'.$rand.'myimg.png', $data);
if($r)
{
 $q="insert into profile_pics (user_id,p_pic)values($user_id,'$name')";
 $r1=mysqli_query($dbc,$q);
 if($r1 && $r)
 {
     
     echo'<img src="../'.$name.'" ><script type="text/javascript">$(document).ready(function()
{           $(\'.cropped\').append(\'<span id="ppicchngd">Profile Image Changed...</span>\');
            $(\'.curprofimg\').attr("src","../'.$name.'");
    
});  </script>';
     
     
 }
}
}
?>