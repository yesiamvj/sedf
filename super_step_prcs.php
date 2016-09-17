   <?php session_start();
      $email=$_SESSION['email'];
     
      if(empty($_SESSION['email']) && empty($_SESSION['user_id']))
      {
          header("location:index.php");
      }
      elseif(!empty($_SESSION['email']))
      {
          
      
       require 'mysqli_connect.php';
    $usename=mysqli_real_escape_string($dbc,trim($_REQUEST['myusername']));
    $theme=mysqli_real_escape_string($dbc,$_REQUEST['theme_color']);
    
    $txt_clr=mysqli_real_escape_string($dbc,$_REQUEST['theme_txt_color']);
   
   
    $spl_chr=array();
    $spl_chr[0]="`";
    $spl_chr[1]=".";
    $spl_chr[2]="!";
    $spl_chr[3]="@";
    $spl_chr[4]="#";
    $spl_chr[5]="$";
    $spl_chr[6]="%";
    $spl_chr[7]="^";
    $spl_chr[8]="&";
    $spl_chr[9]="*";
    $spl_chr[10]="(";
    $spl_chr[11]=")";
    $spl_chr[12]="-";
    $spl_chr[13]="_";
    $spl_chr[14]="+";
    $spl_chr[15]="=";
    $spl_chr[16]="'";
     $spl_chr[17]="/";
      $spl_chr[18]="\\";
       $spl_chr[19]=";";
        $spl_chr[20]=":";
         $spl_chr[21]=">";
          $spl_chr[22]="<";
           $spl_chr[23]=",";
           $spl_chr[24]="?";
           $spl_chr[25]="\"";
           $spl_chr[26]="[";
           $spl_chr[27]="[";
           $spl_chr[28]="]";
           $spl_chr[29]="{";
           $spl_chr[30]="}";
           $spl_chr[31]="|";
           $spl_chr[32]="\\";
         $spl_chr[33]="sedfed";
         $spl_chr[34]="admin";
         $spl_chr[35]="ceo";
         $spl_chr[36]="developer";
         $spl_chr[37]="web";
         $spl_chr[38]="mobile";
         $spl_chr[39]="partner";
         $spl_chr[40]="cofounder";
         $spl_chr[41]="sakthikanth";
         $spl_chr[42]="sakthi kanth";
         $spl_chr[43]="vijayakumar";
         $spl_chr[44]="vijaya kumar";
         $put_username=0;
           for($t=0;$t<45;$t++)
           {
	 if($t>32)
	 {
	        if($spl_chr[$t]==$usename)
	        {
	                $put_username=1;
	                
	        }
	 }
	 elseif(is_numeric($usename)  || strpos($usename, $spl_chr[$t])>-1)
	 {
	         $put_username=2;
	 }
           }
           
           if($put_username==2 || $put_username==1 || strlen($usename)<=2)
           {
	 header("location:superstep.php");
	        
           }  else {
	
    $q1="SELECT user_id as u from users where email='$email'";
  $r6= mysqli_query($dbc, $q1);
    if($r6)
    {
        $row=mysqli_fetch_array($r6,MYSQLI_ASSOC);
        $user_id=$row['u'];
       if(!empty($user_id) && strlen($usename)>1)
       {
              $q1="select user_id as u from users where username='$usename' or email='$usename'";
              $r1=  mysqli_query($dbc, $q1);
              if($r1)
              {
	    if(mysqli_num_rows($r1)>0)
	    {
	           
	           header("location:superstep.php");	
	    }else
	    {
	           $q3="select page_name as p from pages where page_name='$usename'";
	           $r3=  mysqli_query($dbc, $q3);
	           if($r3)
	           {
		 if(mysqli_num_rows($r3)>0)
		 {
		         header("location:superstep.php");	
		 }else
		 {
 $q1="UPDATE `users` SET `username` = '$usename' WHERE `users`.`user_id` = $user_id";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
      $qs="insert into basic (user_id,first_name,nick_name,nativeplace,day,month,year,sex)values($user_id,'','','','','','','boy')";
      mysqli_query($dbc,$qs);
    $_SESSION['change_path_prof']=$user_id;
          
          $user_id_dir='../'.$user_id.'';
      $pf='../'.$usename.'/storage/publicfolder';
$secf='../'.$usename.'/storage/securedfolder';
$ms='../'.$usename.'/messages';

mkdir($pf,0777,true);
mkdir($ms,0777,true);
mkdir($secf,0777,true);
mkdir($user_id_dir,0777,true);


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



$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/q5';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/q10';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/q25';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/q50';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/q75';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/smallimages';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/medimages';
mkdir($posts,0777,true);


$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers/q5';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers/q10';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers/q25';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers/q50';
mkdir($posts,0777,true);

$posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers/q75';
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


          
       $u5='../'.$user_id.'/ppic5.jpg';
$u10='../'.$user_id.'/ppic10.jpg';
$u25='../'.$user_id.'/ppic25.jpg';
$u50='../'.$user_id.'/ppic50.jpg';
$u75='../'.$user_id.'/ppic75.jpg';

$q5='../'.$usename.'/ppic5.jpg';
$q10='../'.$usename.'/ppic10.jpg';
$q25='../'.$usename.'/ppic25.jpg';
$q50='../'.$usename.'/ppic50.jpg';
$q75='../'.$usename.'/ppic75.jpg';



$name="../web/icons/male.png";
 function compress_image($source_url, $destination_url, $quality)
	      {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
      
	//return destination file url
	return $destination_url;
}
        compress_image($name,$q5,5);
       compress_image($name,$q10,10);
       compress_image($name,$q25,25);
       compress_image($name,$q50,50);
       compress_image($name,$q75,75);
       
       compress_image($name,$u5,5);
       compress_image($name,$u10,10);
       compress_image($name,$u25,25);
       compress_image($name,$u50,50);
       compress_image($name,$u75,75);


      $now = '../'.$usename.'';
      
  fopen("$now/profile.php","w");
  copy("forprofile/profile.php", "$now/profile.php");

   fopen("$now/index.php","w");
  copy("forprofile/index.php", "$now/index.php");

  fopen("$now/storage.php","w");
  copy("forprofile/storage.php","$now/storage.php");

  fopen("$now/videos.php","w");
  copy("forprofile/videos.php","$now/videos.php");

  fopen("$now/files.php","w");
  copy("forprofile/files.php", "$now/files.php");

       fopen("$now/wall.php","w");
  copy("forprofile/wall.php", "$now/wall.php");

   fopen("$now/timeline.php","w");
  copy("forprofile/timeline.php", "$now/timeline.php");


fopen("$now/photos.php", "w");
copy("forprofile/photos.php", "$now/photos.php");


fopen("$now/blog.php", "w");
copy("forprofile/blog.php", "$now/blog.php");

$blg_strt=  fopen("$now/blgstrt.php", "w");
$blg_txt='<?php
$user="'.$usename.'";
 $url=\'blog.php?username=\'.urlencode($user);
   header("location:$url");
?>';
   
fwrite($blg_strt,$blg_txt);


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

$myfile=fopen("$now/home.php", "w");

$txt = '<?php session_start();
$usename="'.$usename.'";
 if(isset($_SESSION[\'user_id\']) || isset($_SESSION[\'user_name\']))
{
       $url=\'timeline.php?username=\'.urlencode($usename);
}else
{
       
 $url=\'index.php?username=\'.urlencode($usename);
 
}
         
    header("location:$url");
?>
';
fwrite($myfile, $txt);

fclose($myfile);

//wall
       fopen("$now/wall.php","w");
       copy("forprofile/wall.php", "$now/wall.php");
       
       $open_wall=fopen("$now/strt_wall.php","w");
        $myfiltxt='<?php 
$usename="'.$usename.'";
 $url=\'wall.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';
        fwrite($open_wall, $myfiltxt);
//user_id dir
   


      $now = '../'.$user_id.'';
      $dir='../'.$usename.'';
      mkdir($now,0777,true);
      
      $myfil=fopen("$now/index.php","w");
  $myfiltxt='<?php
   header("location:'.$dir.'");
  ?>';
  fwrite($myfil,$myfiltxt);

  $q4="INSERT INTO `settings_profile` (`user_id`,prof_Theme,theme_txt_color) VALUES ('$user_id','$theme','$txt_clr')";
              $r4=  mysqli_query($dbc,$q4);
 
      $q4="INSERT INTO `settings_appearance` (`user_id`,prof_Theme,theme_txt_color) VALUES ('$user_id','$theme','$txt_clr');";
              $r4=  mysqli_query($dbc,$q4);
          if($r4)
          {
	
	$q3="insert into small_pics(user_id,p_pic,med_img)values($user_id,'icons/male.png','icons/male.png')";
	mysqli_query($dbc, $q3);
 
          }

      header("location:successreg.php");
   } 
		 }
	           }
	        
 else {
    
}
	    }
              }
               
 
       }  else {
              
       if(strlen($usename)<=1)
       {
              echo "<script>alert('Username Must be atleast 2 letter');</script>";  
       }
     
       }
        
        
    }  else {
        $user_id="no userid";
        
    }
    
           }
	 
  
       

        
      }
      ?>
      