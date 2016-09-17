<?php session_start();
 require 'mysqli_connect.php';
$uploader=  mysqli_real_escape_string($dbc,$_REQUEST['uploader']);
$about= mysqli_real_escape_string($dbc,$_REQUEST['about']);
$email=mysqli_real_escape_string($dbc,$_REQUEST['email']);

if(!empty($_FILES['files']['name']))
{
       $type=$_FILES['files']['type'];
       $check=  strpos($type,"image");
       if($check>-1)
       {
              $name=mysqli_real_escape_string($dbc,$_FILES['files']['name']);
              $rand=rand(0000000000000,99999999999999);
              $pic_dir="../sf_bg/$rand$name";
              move_uploaded_file($_FILES['files']['tmp_name'], $pic_dir);
              $q="insert into sf_back_pic(email,about,pic,uploader)values('$email','$about','$pic_dir','$uploader')";
              $r=mysqli_query($dbc, $q);
              if($r)
              {
	    echo 'Success';
              {
	    echo mysqli_error($dbc);
              }
       }else
       {
            echo 'Please Upload and image file  =='.$type.'';
       }
}

}