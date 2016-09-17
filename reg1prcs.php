   <?php session_start();
      $email=$_SESSION['email'];
     
      if(empty($_SESSION['email']) && empty($_SESSION['user_id']))
      {
          header("location:register.html");
      }
      else
      {
          
      
       require 'mysqli_connect.php';
    $usename=mysqli_real_escape_string($dbc,$_REQUEST['us']);
    $yname=mysqli_real_escape_string($dbc,$_REQUEST['fname']);
    $oname=mysqli_real_escape_string($dbc,$_REQUEST['lname']);
    $nativp=mysqli_real_escape_string($dbc,$_REQUEST['np']);
   $mon=mysqli_real_escape_string($dbc,$_REQUEST['month']);
    $year=mysqli_real_escape_string($dbc,$_REQUEST['year']);
    $days=mysqli_real_escape_string($dbc,$_REQUEST['day']);
    $sex=mysqli_real_escape_string($dbc,$_REQUEST['sexi']);
    $age=$today = date("Y"); 
$age=$age-$year;

    echo "$age<br/>";
    
    $q1="SELECT user_id as u from users where email='$email'";
  $r6= mysqli_query($dbc, $q1);
    if($r6)
    {
        $row=mysqli_fetch_array($r6,MYSQLI_ASSOC);
        $user_id=$row['u'];
        if(empty($_SESSION['user_id']))
        {
          $_SESSION['user_id']=$user_id;
        }else
        {
          $user_id=$_SESSION['user_id'];
        }
        
        echo"<br/> the user id is $user_id<br>";
    }  else {
        $user_id="no";
        echo "$user_id";
    }
    
    $q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $myuser_name=$rt['un'];
              }
        $q13="select reginit_id as rid from basic where user_id=$user_id";
        $r13=mysqli_query($dbc,$q13);
        if($r13)
        {
          echo "run";
        if(mysqli_num_rows($r13)>0)
        {

          echo "avl";

            $q1="UPDATE `users` SET `username` ='$usename' WHERE `users`.`user_id`=$user_id";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
    echo "updt usernm";
            $q4="UPDATE `basic` SET first_name='$yname',nick_name='$oname',nativeplace='$nativp',sex='$sex',year='$year',month='$mon',day='$days',age='$age' WHERE user_id = $user_id";
            $r4=mysqli_query($dbc,$q4);
            if($r4)
            {
echo "updating<br/>";

echo "<br/>$myuser_name is prev <br/>$usename is now username <br/>";
$prev = '../'.$myuser_name.'';
$now = '../'.$usename.'';
$_SESSION['user_name']=$usename;
// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.

if (rename($prev,$now)) 
{
  echo "renamed";
}
else{
  echo "not created";
}


      
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

#header("location:editprofile.php");
            }else
            {
              echo "not run";
                echo mysqli_error($dbc);
            }
        }else
        {
          echo "that";
        }
        }
        else
        {
          
             $q1="UPDATE `users` SET `username` = '$usename' WHERE `users`.`user_id` = $user_id";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
      
      $q="INSERT INTO `basic` (`reginit_id`, `user_id`, `first_name`, `nick_name`, `nativeplace`, `sex`, `year`, `month`, `day`,age) VALUES (NULL, '$user_id', '$yname', '$oname', '$nativp', '$sex', '$year', '$mon', '$days','$age')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $_SESSION['user_name']=$usename;
      if($sex="girl")
      {
          $ico="icons/female.png";
      }else
      {
          $ico="icons/male.png";
      }
      $qc="insert into small_pics(user_id,p_pic)values($user_id,'$ico')";
      mysqli_query($dbc,$qc);
$pf='../'.$usename.'/storage/publicfolder';
$secf='../'.$usename.'/storage/securedfolder';
$ms='../'.$usename.'/messages';

mkdir($pf,0777,true);
mkdir($ms,0777,true);
mkdir($secf,0777,true);



$posts='../'.$usename.'/storage/publicfolder/post/images/postimages/quality10';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/postimages/quality25';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/postimages/quality50';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/postimages/quality65';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/postimages/quality75';
mkdir($posts,0777,true);



$posts='../'.$usename.'/storage/publicfolder/post/images/postimages';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/smallimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/medimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/images/statusimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/audios/postaudios';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/audios/statusaudios';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/videos/postvideos';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/videos/statusvideos';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/pdfs/postpdfs';
mkdir($posts,0777,true);
$posts='../'.$usename.'/storage/publicfolder/post/files/postfiles';
mkdir($posts,0777,true);




      $now = '../'.$usename.'';
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

header("location:editprofile.php");
   }
    else{
       echo"err in insert";
    }
   }
 else {
  echo"err in usernm & its $user_id <br/>";
     
}
   }
  }else
  {
    echo "not run";
  }

        
      }
      ?>
      