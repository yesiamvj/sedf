   <?php session_start();
     
     
      if(empty($_SESSION['user_id']))
      {
          header("location:index.php");
      }
      else
      {
          $user_id=$_SESSION['user_id'];
      
       require 'mysqli_connect.php';
    $usename=mysqli_real_escape_string($dbc,$_REQUEST['us']);
    $yname=mysqli_real_escape_string($dbc,$_REQUEST['fname']);
    $oname=mysqli_real_escape_string($dbc,$_REQUEST['lname']);
    $nativp=mysqli_real_escape_string($dbc,$_REQUEST['np']);
   $mon=mysqli_real_escape_string($dbc,$_REQUEST['month']);
    $year=mysqli_real_escape_string($dbc,$_REQUEST['year']);
    $days=mysqli_real_escape_string($dbc,$_REQUEST['day']);
    $sex=mysqli_real_escape_string($dbc,$_REQUEST['sexi']);
    
  
        $q3="select reginit_id as rid from basic where user_id=$user_id";
        $r3=mysqli_query($dbc,$q3);
        if(mysqli_num_rows($r3)>0)
        {
            $q1="UPDATE `users` SET `username` = '$usename' WHERE `users`.`user_id` = $user_id";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
            $q4="UPDATE `basic` SET first_name='$yname',nick_name='$oname',nativeplace='$nativp',sex='$sex',year='$year',month='$mon',day='$days' WHERE user_id = $user_id";
            $r4=mysqli_query($dbc,$q4);
            if($r4)
            {
                $sun="select first_name as fname from basic where user_id=$user_id";
        $rsun=mysqli_query($dbc,$sun);
        if($rsun)
        {
            if(mysqli_num_rows($rsun)>0)
            {
                $rowfn=mysqli_fetch_array($rsun,MYSQLI_ASSOC);
                $firstname=$rowfn['fname'];
               $_SESSION['user_name']=$usename;
               $f=$_SESSION['user_name'];
               echo''.$f.' is now<br/>';
               $pf='../users/'.$usename.'/publicfolder';
mkdir($pf,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/postimages';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/profileimages';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/wallpapers';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/statusimages';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/audios/postaudios';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/audios/statusaudios';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/videos/postvideos';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/videos/statusvideos';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/pdfs/postpdfs';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/files/postfiles';
mkdir($posts,0777,true);



      $now = '../users/'.$usename.'';
fopen("$now/index.html", "w");
      
  fopen("$now/profile.php","w");
  copy("forprofile/profile.php", "$now/profile.php");

   fopen("$now/selfprofile.php","w");
  copy("forprofile/selfprofile.php","$now/selfprofile.php");
  
  fopen("$now/storage.php","w");
  copy("forprofile/storage.php","$now/storage.php");

  fopen("$now/videos.php","w");
  copy("forprofile/videos.php","$now/videos.php");

  fopen("$now/files.php");
  copy("forprofile/files.php", "$now/files.php");


fopen("$now/photos.php", "w");
copy("forprofile/photos.php", "$now/photos.php");

   $vdsrt=fopen("$now/strtvid.php","w");
   $vidtxt='<?php
$user="'.$usename.'";
 $url=\'videos.php?username=\'.urlencode($user);
   header("location:$url");
?>';
fwrite($vdsrt,$vidtxt);
$strtpho=fopen("$now/strtphotos.php","w");
$strtphotx='<?php
$user="'.$usename.'";
 $url=\'photos.php?username=\'.urlencode($user);
   header("location:$url");
?>';
fwrite($strtpho,$strtphotx );

  $stht=fopen("$now/strg.php","w");
  $strghtml='<?php
$usename="'.$usename.'";
 $url=\'storage.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';

  fwrite($stht, $strghtml);
  $myfil=fopen("$now/strtfiles.php","w");
  $myfiltxt='<?php
$usename="'.$usename.'";
 $url=\'files.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';
  fwrite($myfil,$myfiltxt);

$myfile=fopen("$now/index.php", "w");

$txt = '<?php 
$usename="'.$usename.'";
 $url=\'profile.php?pass1=\'.urlencode($usename);
         
    header("location:$url");
?>
';
fwrite($myfile, $txt);

fclose($myfile);


       
            }else{
               $_SESSION['user_name']="empty";
                
            }
        }else{
            $_SESSION['user_name']="not run";
        }
        
            }else
            {
                echo mysqli_error( );
            }
        }
        }else
        {
             $q1="UPDATE `users` SET `username` = '$usename' WHERE `users`.`user_id` = $user_id";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
      
      $q="INSERT INTO `basic` (`reginit_id`, `user_id`, `first_name`, `nick_name`, `nativeplace`, `sex`, `year`, `month`, `day`) VALUES (NULL, '$user_id', '$yname', '$oname', '$nativp', '$sex', '$year', '$mon', '$days')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        $sun="select first_name as fname from basic where user_id=$user_id";
        $rsun=mysqli_query($dbc,$sun);
        if($rsun)
        {
            if(mysqli_num_rows($rsun)>0)
            {
                $rowfn=mysqli_fetch_array($rsun,MYSQLI_ASSOC);
                $firstname=$rowfn['fname'];
               $_SESSION['user_name']=$usename;
               $nows=$_SESSION['user_name'];

echo "<br/>$nows is prev <br/>";
$pf='../users/'.$usename.'/publicfolder';
mkdir($pf,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/postimages';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/profileimages';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/wallpapers';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/images/statusimages';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/audios/postaudios';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/audios/statusaudios';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/videos/postvideos';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/videos/statusvideos';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/pdfs/postpdfs';
mkdir($posts,0777,true);
$posts='../users/'.$usename.'/publicfolder/post/files/postfiles';
mkdir($posts,0777,true);


      $now = '../users/'.$usename.'';
fopen("$now/index.html", "w");
      
  fopen("$now/profile.php","w");
  copy("forprofile/profile.php", "$now/profile.php");

   fopen("$now/selfprofile.php","w");
  copy("forprofile/selfprofile.php","$now/selfprofile.php");
  
  fopen("$now/storage.php","w");
  copy("forprofile/storage.php","$now/storage.php");

  fopen("$now/videos.php","w");
  copy("forprofile/videos.php","$now/videos.php");

  fopen("$now/files.php","w");
  copy("forprofile/files.php", "$now/files.php");


fopen("$now/photos.php", "w");
copy("forprofile/photos.php", "$now/photos.php");

   $vdsrt=fopen("$now/strtvid.php","w");
   $vidtxt='<?php
$user="'.$usename.'";
 $url=\'videos.php?username=\'.urlencode($user);
   header("location:$url");
?>';
fwrite($vdsrt,$vidtxt);
$strtpho=fopen("$now/strtphotos.php","w");
$strtphotx='<?php
$user="'.$usename.'";
 $url=\'photos.php?username=\'.urlencode($user);
   header("location:$url");
?>';
fwrite($strtpho,$strtphotx );

  $stht=fopen("$now/strg.php","w");
  $strghtml='<?php
$usename="'.$usename.'";
 $url=\'storage.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';

  fwrite($stht, $strghtml);
  $myfil=fopen("$now/strtfiles.php","w");
  $myfiltxt='<?php
$usename="'.$usename.'";
 $url=\'files.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';
  fwrite($myfil,$myfiltxt);

$myfile=fopen("$now/index.php", "w");

$txt = '<?php 
$usename="'.$usename.'";
 $url=\'profile.php?pass1=\'.urlencode($usename);
         
    header("location:$url");
?>
';
fwrite($myfile, $txt);

fclose($myfile);


            }else{
               $_SESSION['user_name']="empty";
                
            }
        }else{
            $_SESSION['user_name']="not run";
        }
        
   }
    else{
       echo"err in insert";
    }
   }
 else {
  echo"err in usernm & its $user_id <br/>";
     
}
   }
  
if (($_FILES["upload"]["type"] == "image/png")
|| ($_FILES["upload"]["type"] == "image/jpeg")
|| ($_FILES["upload"]["type"] == "image/pjpeg")||($_FILES["upload"]["type"] == "image/gif"))

  {
    echo"wht";
  if ($_FILES["upload"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
    echo"what hapened<br/>";
    }
  else
    {
      echo"its a image file<br/>";
    echo "Upload: " . $_FILES["upload"]["name"] . "<br />";
    $random=rand(11111111111,9999999999);
    $fname="$random".$_FILES["upload"]["name"]."";
    echo"<br/>now file name is $fname<br/>";
    echo "Type: " . $_FILES["upload"]["type"] . "<br />";
    echo "Size: " . ($_FILES["upload"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["upload"]["tmp_name"];
    $strgname="uploads/profilepics/$fname";
    if (file_exists("uploads/profilepics/" . $_FILES["upload"]["name"]))
      {
      echo $_FILES["upload"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["upload"]["tmp_name"],
      "uploads/profilepics/" . $fname);
      echo "Stored in: " . "upload/profilepics/" . $_FILES["upload"]["name"];
      
      $upf="INSERT INTO `profile_pics` (`pic_id`, `own_user_id`, `own_pic`, `others_pic`, `others_user_id`, `own_wallpic`, `others_wallpic`) VALUES (NULL, '$user_id', '$strgname
', NULL, NULL, NULL, NULL);";
      $rpf=mysqli_query($dbc,$upf);
      if($rpf){
          echo"prof pic updated";
      }
      else{
          echo"prof pic not updated";
      }
      }
    }
  }
else
  {
  echo "Invalid file";
  }
       
        
      }
      ?>
      