<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$myuser_name=$_SESSION['user_name'];
$ftype=$_FILES['file']['type'];

 if($ftype=="audio/mp3" || $ftype=="audio/mid" || $ftype=="audio/wav" || $ftype=="audio/mpeg")
      {
      $aud=$_FILES['file']['name'];
      $rand=rand(11111111111111,99999999999999999);
      $audname="$rand$aud";
        $movfile="../$myuser_name/storage/publicfolder/post/audios/statusaudios/$audname";
        move_uploaded_file($_FILES['file']['tmp_name'], $movfile);
        
       $q="insert into sts_bgm (user_id,bgm)values($user_id,'$movfile')";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           echo'Your BGM updated';
       }  else {
           echo'Not updated';
       }
      }  else {
          
             echo 'Please Upload a audio file ';
      }

}