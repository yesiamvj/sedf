<?php session_start();

	if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
	{
		header("location:index.php");
	}else{
require 'mysqli_connect.php';
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
		  $q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $user_name=$rt['un'];
              }
		
		$type=$_FILES['filed']['type'];
  $name=$_REQUEST['fname'];
    	echo''.$name.' is';
if(!empty($name))
{
	$size=$_FILES['filed']['size'];
	$name=$_FILES['filed']['name'];
	$rand=rand(1111111111111111,99999999999999999);
	$folname=$_REQUEST['fname'];

	$q1="select folder_id as fid from myfolders where user_id=$user_id and folder_name='$folname'" ;
	$r1=mysqli_query($dbc,$q1);
	if($r1)
	{
		$row=mysqli_fetch_array($r1,MYSQLI_ASSOC);
		$folder_id=$row['fid'];
	}else
	{
		echo "empty fid";
	}

	$filename="../$user_name/$folname/$rand$name";
	if($type=="image/png" || $type=="image/jpeg" || $type=="image/jpg" || $type=="image/ico" || $type=="image/gif")
	{
	
	
		move_uploaded_file( $_FILES['filed']['tmp_name'], $filename);
		

	}else{
		move_uploaded_file( $_FILES['filed']['tmp_name'], $filename);
	}
	
	
	
}else{
	$filename=0;
	echo "empty";
}
				$today = date("g:i a ,F j, Y"); 
    		 
    		  $q="INSERT INTO `folder_contents` (`fc_id`, `folder_id`, `user_id`, `media`, `time`,size) VALUES (NULL, '$folder_id', '$user_id', '$filename', '$today','$size')";
    		  $r=mysqli_query($dbc,$q);
    		  if($r)
    		  {
    		  
    		  	echo'<script type="text/javascript">
    		  	$(document).ready(function()
    		  		{
    		  		
    		  			$(".Ldricn").attr(\'src\',\'../web/icons/okrit.png\');
    		  		});
    		  	
	
					</script>';
    		  }else
    		  {
    		  	echo "";
    		  }
 
    	
  
  

}
?>