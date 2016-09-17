<?php
require 'mysqli_connect.php';
$q="select username as u  from users ";
$r=  mysqli_query($dbc, $q);
if($r)
{
       if(mysqli_num_rows($r)>0)
       {
              while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
              {
	    $usernm=$row['u'];
	   $c1= copy("forprofile/profile.php", "../$usernm/profile.php");
	    $c2= copy("forprofile/index.php", "../$usernm/index.php");
	    $c3= copy("forprofile/photos.php", "../$usernm/photos.php");
             $c4= copy("forprofile/videos.php", "../$usernm/videos.php");
             $c5= copy("forprofile/files.php", "../$usernm/files.php");
              $c6=copy("forprofile/wall.php", "../$usernm/wall.php");
               $c7=copy("forprofile/storage.php", "../$usernm/storage.php");
                  fopen("../$usernm/timeLine.php", "w");
                $c8=copy("forprofile/timeLine.php", "../$usernm/timeLine.php");
            
                $myfile=fopen("../$usernm/home.php", "w");

$txt = '<?php session_start();
$usename="'.$usernm.'";
 if(isset($_SESSION[\'user_id\']) || isset($_SESSION[\'user_name\']))
{
       $url=\'timeLine.php?username=\'.urlencode($usename);
}else
{
       
 $url=\'index.php?username=\'.urlencode($usename);
 
}
         
    header("location:$url");
?>
';
fwrite($myfile, $txt);

fclose($myfile);
              if($c1)
              {
	   echo 'copied   '; 
              }else
              {
	    echo 'not copy';
              }
              if($c2)
              {
	   echo 'copied   ';  
              }
              else
              {
	    echo 'not copy';
              }if($c3)
              {
	   echo 'copied   ';  
              }
              else
              {
	    echo 'not copy';
              }if($c4)
              {
	   echo 'copied   ';  
              }
              else
              {
	    echo 'not copy';
              }if($c5)
              {
	   echo 'copied   ';  
              }
              else
              {
	    echo 'not copy';
              }if($c6)
              {
	   echo 'copied   ';  
              }
              else
              {
	    echo 'not copy';
              }if($c7)
              {
	   echo 'copied   ';  
              }
              else
              {
	    echo 'not copy <br/><br/>';
              }
              }
       }
}