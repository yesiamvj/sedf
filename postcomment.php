<?php session_start();

	if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
	{
		header("location:index.php");
	}else{
$user_name=$_SESSION['user_name'];
$smiley=$_REQUEST['smiley'];
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
		$user_id=$_SESSION['user_id'];
		require 'mysqli_connect.php';
		$comment=mysqli_real_escape_string($dbc,$_REQUEST['comment']);
		$color=mysqli_real_escape_string($dbc,$_REQUEST['clr']);
		$post_id=$_REQUEST['postid'];
		$type=$_FILES['file']['type'];
  $name=$_FILES['file']['name'];
    	if(!empty($comment) || $type=="image/png" || $type=="image/jpeg" || $type=="image/jpg" || $type=="image/gif" || $type=="audio/mp3" || $type=="audio/wav" || $type=="audio/mid" || $type="video/mp4" || $type=="video/3gp" || $type=="video/mkv")
    	{

if(!empty($name))
{
	$name=$_FILES['file']['name'];
	$rand=rand(1111111111111111,99999999999999999);
	$filename="../$user_name/messages/$rand$name";
        
	$filename="../$user_name/messages/$rand$name";
	if($type=="image/png" || $type=="image/jpeg" || $type=="image/jpg" || $type=="image/ico" || $type=="image/gif")
	{
	
	
		move_uploaded_file( $_FILES['file']['tmp_name'], $filename);
		
          $d=compress_image($filename, $filename, 30);

	}else{
		move_uploaded_file( $_FILES['file']['tmp_name'], $filename);
	}
	
	
	
}else{
	$filename=0;
}
				$today = date("g:i a ,F j, Y"); 
    		 
    		  $q="INSERT INTO `post_comments` (`cmnt_id`, `post_id`, `commenter_useri_d`, `comment_word`, `comment_media`, `comment_color`, `cmnt_like_userId`, `cmnt_unlike_userid`, `cmnt_rate`, `hide_comment`,`comment_time`,seen,smiley) VALUES (NULL, '$post_id', '$user_id', '$comment', '$filename', '$color', NULL, NULL, NULL, NULL,'$today',0,'$smiley')";
    		  $r=mysqli_query($dbc,$q);
    		  if($r)
    		  {
    		  	echo "inserted";
                       
    		  }else{
    		  	echo mysql_error();
    		  	echo "not";
    		  }
 
    	}
  
  

}
?>