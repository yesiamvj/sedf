<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
       require 'mysqli_connect.php';
         $user_id=$_SESSION['user_id'];
         
                   $myuser_name=$_SESSION['user_name'];
      
        $q2="select post_id as pid from post_permision where user_id=$user_id order by post_id desc";
                $r=mysqli_query($dbc,$q2);
                if($r)
                {
                    $row=mysqli_fetch_array($r);
                    $post_id=$row['pid'];
                   
                }else{
                    $post_id=1;
                }
                
       
       if(strpos($_REQUEST['img_src'],"image")>0)
       {
           $data=$_REQUEST['img_src'];
           
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);

$rand=rand(00000000,9999999999999999);
$name='../'.$myuser_name.'/storage/publicfolder/post/images/postimages/'.$rand.'sedfed_post_id_'.$post_id.'_image.jpg';
$r=file_put_contents($name, $data);

$q="insert into post_images(user_id,post_id,post_image)values($user_id,$post_id,'$name')";
$r=mysqli_query($dbc,$q);
if($r)
{
    echo'ins';
}else
{
    echo'not ins';
}
           
       }  else {
           
               if(!empty($_FILES['myfiles']['name']))
               {
	     $file=$_FILES['myfiles']['type'];
	     if($file=="audio/mp3" || $file=="audio/wav" || $file=="audio/mid")
                    {
                      $name=$_FILES['myfiles']['name'];

                      $randm=rand(0000000,9999999999999999);
                      
                           $audio = "../$myuser_name/storage/publicfolder/post/audios/postaudios/".$name;
                        move_uploaded_file($_FILES['myfiles']['tmp_name'], $audio);
                        
                    $user_id=$_SESSION['user_id'];
                
                       $qas="insert into post_files (post_id,user_id,post_audio)values($post_id,$user_id,'$audio')";
                       mysqli_query($dbc,$qas);
                    }else{
                          
                    }
                    if($file=="video/mp4" || $file=="video/mkv"  || $file=="video/3gp" || $file=="video/avi")
                    {
	           $randm=rand(0000000,9999999999999999);
                      
                      $namevideo=mysqli_real_escape_string($dbc,$_FILES['myfiles']['name']);
                      $randm=rand(0000000,9999999999999999);
                           $video = "../$myuser_name/storage/publicfolder/post/videos/postvideos/$randm$namevideo";
                           echo ''.$video.'';
                        move_uploaded_file($_FILES['myfiles']['tmp_name'], $video);
                        if(!empty($_FILES['thumb_nail']['name']))
	       {
	              $type=$_FILES['thumb_nail']['type'];
	              if(strpos($type, "mage/")>0)
	              {
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

		    $thum_name=$_FILES['thumb_nail']['name'];
		    $thum_dir="../$myuser_name/storage/publicfolder/post/videos/postvideos/$randm$post_id$thum_name";
		    move_uploaded_file($_FILES['thumb_nail']['tmp_name'], $thum_dir);
		    compress_image($thum_dir,$thum_dir,7);
	              }else
	       {
	              $thum_dir="";
	       }
	       }else
	       {
	              $thum_dir="";
	       }
                   
                 $qas="insert into post_files (post_id,user_id,post_video,thumb_nails)values($post_id,$user_id,'$video','$thum_dir')";
                       $rad=mysqli_query($dbc,$qas);
                       if($rad)
                       {
                           echo'ins vid';
                       }else
                       {
                           echo'not ins';
                       }
                  }else{
                      echo ''.$file.'';
                    }
                    
                    if($file=="application/pdf")
                    {
                      $namepdf=  mysqli_real_escape_string($dbc,$_FILES['myfiles']['name']);
                      $randm=rand(0000000,9999999999999999);
                      $pdfname="$randm$namepdf";
                      
                           $pdf = "../$myuser_name/storage/publicfolder/post/pdfs/postpdfs/".$pdfname;
                         echo"$pdf";
                        move_uploaded_file($_FILES['myfiles']['tmp_name'], $pdf);
                        
                    $qas="insert into post_files (post_id,user_id,post_pdf)values($post_id,$user_id,'$pdf')";
                       mysqli_query($dbc,$qas);

                    }
                    if($file!=="application/pdf"  && $file!=="audio/mp3" && $file!=="audio/wav" && $file!=="audio/mid" && $file!=="video/mp4" && $file!=="video/mkv" && $file!=="video/3gp")
                    {

                      $nameoffile=  mysqli_real_escape_string($dbc,$_FILES['myfiles']['name']);
                      if(empty($nameoffile))
                      {

                      }else{
                         $randm=rand(0000000,9999999999999999);
                      $finame="$randm$nameoffile";
                     
                           $unknownfl = "../$myuser_name/storage/publicfolder/post/files/postfiles/$finame";
                        move_uploaded_file($_FILES['myfiles']['tmp_name'], $unknownfl);
                
               $qas="insert into post_files (post_id,user_id,post_file)values($post_id,$user_id,'$unknownfl')";
                       $ras=mysqli_query($dbc,$qas);
	      if($ras)
	      {
	            echo 'syc';
	      }else
	      {
	             echo mysqli_error($dbc);
	      }
                      }
                     
                    }else{
	          echo 'no file';
	   }
               }
                   
                    

       }
                    


  
   }
    

?>