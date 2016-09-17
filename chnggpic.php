<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   	$user_id=$_SESSION['user_id'];


   	$file=$_FILES['file']['name'];
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
 

   	if(!empty($_FILES['files']['name']) )
   	{
   		$type=$_FILES['file']['type'];
   		if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
   		{
   			$rand=rand(00000000000,99999999999999999999);
   			
   			move_uploaded_file($_FILES['file']['tmp_name'], $movfile);

   			$q="nisert into groups()";
   		}
   	}
   }