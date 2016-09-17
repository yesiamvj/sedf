<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    
}  else 
{
    $user_id=$_SESSION['user_id'];
    $myuser_name=$_SESSION['user_name'];
    $file=$_FILES['file']['type'];
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

    if($file=="image/png"  || $file=="image/jpeg" || $file=="image/jpg" || $file=="image/gif")
                    {
                      $flname=$_FILES['file']['name'];
                      $size=$_FILES['file']['size'];
                      $randm=rand(0000000,999999999999);
                      $imgname="$randm$flname";
                   
                           $img = "../$myuser_name/storage/publicfolder/post/images/wallpapers/".$imgname;
                       
                        move_uploaded_file($_FILES['file']['tmp_name'], $img);
                        compress_image($img,$img,50);
                        
                        
                     
    require 'mysqli_connect.php';
    $q="insert into background_img (user_id,imgs)values($user_id,'$img')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo'<div style="background-color:whitesmoke;">Update Again</div>';
    }
    
}
}