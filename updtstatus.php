<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
    $whatsup=$_REQUEST['inc_posts'];
    function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
 
	//return destination file url
	return $destination_url;
}
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$chkt=$_REQUEST['cks'];
if($chkt=="2")
{
	$ftype=$_FILES['file']['type'];
$chk=$_REQUEST['ck'];
 $q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $myuser_name=$rt['un'];
              }
            
               $img=$_FILES['file']['name'];
			$rand=rand(11111111111111,99999999999999999);
			$imgname="$rand$img";
if($chk=="1")
{
		if($ftype=="image/jpeg" || $ftype=="image/png" || $ftype=="image/gif" || $ftype=="image/ico" )
		{
			
			$movimg="../$myuser_name/storage/publicfolder/post/images/statusimages/$imgname";
			 move_uploaded_file($_FILES['file']['tmp_name'],$movimg);
                         compress_image($movimg,$movimg,20);
			
                         if($whatsup=="1")
                             {
                                   $qw="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
                $rw=mysqli_query($dbc,$qw);
                if($rw)
                {
                    $ros=  mysqli_fetch_array($rw,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                   
                
                    $q="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$movimg')";
                    $r=mysqli_query($dbc,$q);
                    if($r)
                    {
                        echo'updated ';
                    }else
                    {
                        echo'not updated';
                    }
                }
                             }

		}
	

}
}

}
?>
