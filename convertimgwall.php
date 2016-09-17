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
$name='../'.$user_name.'/storage/publicfolder/post/images/profileimages/'.$rand.'myimg.png';
$r=file_put_contents('../'.$user_name.'/storage/publicfolder/post/images/profileimages/'.$rand.'myimg.png', $data);
if($r)
{
    $q1="select pic_id as p from profile_pics where user_id=$user_id order by pic_id desc limit 1";
    $r1=mysqli_query($dbc,$q1);
    if($r1)
    {
        if(mysqli_num_rows($r1)>0)
        {
            $rows=mysqli_fetch_array($r1,MYSQLI_ASSOC);
            $pic_id=$rows['p'];
            $q3="update profile_pics set w_pic='$name' where pic_id=$pic_id";
            $r3=mysqli_query($dbc,$q3);
            if($r3)
            {
                echo'<img src="../'.$name.'" ><script type="text/javascript">$(document).ready(function()
{           $(\'.cropped\').append(\'<span id="ppicchngd"></span>\');
            $(\'#img-wallpaper\').attr("src","../'.$name.'");
    
});  </script>';
                echo'Updated your profile picture';
                
            }

        }else
        {
            $q2="insert into profile_pics (user_id,w_pic)values($user_id,'$name')";
            $r2=mysqli_query($dbc,$q2);
            if($r2)
            {
                echo'<img src="../'.$name.'" ><script type="text/javascript">$(document).ready(function()
{           $(\'.cropped\').append(\'<span id="ppicchngd"></span>\');
            $(\'#img-wallpaper\').attr("src","../'.$name.'");
    
});  </script>';
            }
        }
    }

}
}
?>