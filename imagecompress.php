<?php
 
function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') 
        {
            $image = imagecreatefromjpeg($source_url);
           
            echo'<img src="'.$image.'">';
        }
        
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
        imageinterlace($image,TRUE);
        
	imagejpeg($image, $destination_url,$quality);
        
 
	//return destination file url
	return $destination_url;
} 
 //header("Content-type:image/png");
$source_photo = 'uu.jpg';

$dest_photo = 'gash.png';

echo '<div style="float:left;margin-right:10px">
	<img src="'.$source_photo.'" alt="" height="100" />
	<br />'.filesize($source_photo).' Bytes
</div>';
compress_image($source_photo,$dest_photo,60);
echo '100%<div style="float:left;">
	<img src="'.$dest_photo.'" alt=""  />
	<br />'.filesize($dest_photo).' Bytes
</div>';

compress_image($source_photo,'myimages.jpeg',10);
echo '

 50%
<div style="float:left;">
	<img src="myimages.jpeg" alt=""  />
	<br />'.filesize('myimages.jpeg').' Bytes
</div>
';

?>