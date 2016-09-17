<?php session_start();
 require 'mysqli_connect.php';

if(!empty($_FILES['files']['name']))
{
       $type=$_FILES['files']['name'];
       $check=  strpos($type,".htm");
       if($check>-1)
       {
              $name=mysqli_real_escape_string($dbc,$_FILES['files']['name']);
              $rand=rand(0000000000000,99999999999999);
              $pic_dir="../sf_bg/$rand$name";
              move_uploaded_file($_FILES['files']['tmp_name'], $pic_dir);
              $q="insert into sf_back_pic(html)values('$pic_dir')";
              $r=mysqli_query($dbc, $q);
              if($r)
              {
	    echo 'succes';
              }else
              {
	    echo mysqli_error($dbc);
              }
       }else
       {
            echo 'Please Upload and HTML file';
       }
}  else {
echo 'empty file';       
}