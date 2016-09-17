<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    

$user_id=$_SESSION['user_id'];

require 'mysqli_connect.php';
 $post_feel=mysqli_real_escape_string($dbc,$_REQUEST['NpFeelWhileInp']);
    $post_feelwhile=mysqli_real_escape_string($dbc,$_REQUEST['NpFeelByInp']);
   $post_loc=mysqli_real_escape_string($dbc,$_REQUEST['NpLocateInp']);
    $all_ppl=0;
    $shwuser=$_REQUEST['show_to_user'];
    $hideuser=$_REQUEST['hide_to_user'];
    
    $allrel=mysqli_real_escape_string($dbc,$_REQUEST['allrlns']);
   
     $post_cap=mysqli_real_escape_string($dbc,$_REQUEST['orig_post_cap']);
     $friends=0;
     $family=0;
     $special=0;
     $enemy=0;
     $secret=0;
     $me=mysqli_real_escape_string($dbc,$_REQUEST['include_me']);
     $cap_bg_clr=mysqli_real_escape_string($dbc,$_REQUEST['cap_back_color']);
     $txt_clr=mysqli_real_escape_string($dbc,$_REQUEST['cap_color']);
     $wp_brdr_color="";
     $wp_txt_bg_clr="";
     $like=$_REQUEST['resp1'];
     $unlike=$_REQUEST['resp2'];
     $rate=$_REQUEST['resp3'];
     $comment=$_REQUEST['resp4'];
     $download=$_REQUEST['resp5'];
     $share=$_REQUEST['resp6'];
     
     $today = date("g:i a ,F j, Y"); 
       $ipp="INSERT INTO `post_permision` ( `user_id`, `allpeople`, `allrelation`, `friends`, `family`, `secret`, `showonlyto`, `hideeto`, `me`, `special`) VALUES ( '$user_id', '$all_ppl', '$allrel', '$friends', '$family', '$secret', '$shwuser', '$hideuser', '$me', '$special')";
     $runpp=mysqli_query($dbc,$ipp);
     if($ipp)
     {
         echo"permision inerted<br/>";
     }else{
         echo "not run post pres<br/>";
     }

        
      $q2="select post_id as pid from post_permision where user_id=$user_id order by post_id desc";
$r=mysqli_query($dbc,$q2);
if($r)
{
    $row=mysqli_fetch_array($r);
    $post_id=$row['pid'];
    
}else{
    $post_id=1;
    
}

      $chrsp="select user_id as uidres from post_response where post_id=$post_id and user_id=$user_id";
     $runckpr=mysqli_query($dbc,$chrsp);
     if($runckpr)
     {
         if(mysqli_num_rows($runckpr)>0)
         {
             $upres="UPDATE `post_response` SET `post_id`=$post_id,`user_id`='$user_id',`likes`='$like',`unlike`='$unlike',`download`='$download',`comment`='$comment',`share`='$share',`rating`='$rate' WHERE post_id=$post_id and user_id=$user_id";
             $runupres=mysqli_query($dbc,$upres);
             if($runupres)
             {
                 echo"updated ur resp";
             }else
             {
                 echo"err in updt redp";
             }
         }else{
                            $pr="INSERT INTO `post_response` (`post_resp_id`, `post_id`, `user_id`, `likes`, `unlike`, `download`, `comment`, `share`, `rating`) VALUES ('', '$post_id',$user_id ,'$like', '$unlike', '$download', '$comment', '$share', '$rate')";
                      $rr=mysqli_query($dbc,$pr);
                      if($rr)
                      {
                          echo"responsee inserted";
                      }else{
                          echo 'not inserted response';
                      }
              }
     }else{
         echo"err run tot post resp";
     }
   
     
     
     $q6="select user_id as uid from postforall where post_id=$post_id";
     $r6=mysqli_query($dbc,$q6);
     if($r6)
     {
         if(mysqli_num_rows($r6)>0)
         {
           
             
         }else{
                    
             
              $q="INSERT INTO `postforall` (`post_id`, `user_id`, `post_caption`, `post_feelings`,`post_feeling_while`, `post_location`, `post_time`,`cap_back_clr`, `cap_text_clr`, `border_clr`, `post_back_clr`) VALUES ( '$post_id', '$user_id', '$post_cap', '$post_feel', '$post_feelwhile', '$post_loc','$today','$cap_bg_clr','$txt_clr','$wp_brdr_color','$wp_txt_bg_clr') ";
               $r=mysqli_query($dbc,$q);
               if($r)
               {
                   echo"inserted $post_id <br/>";


               }else{
                   echo"not run to ins post <br/>";
               }
         }
     }else{
      echo "not run usre id";
     }

     

    foreach($_REQUEST['with_users'] as $withusers)
    {
           $qe="select post_id as p from post_forsomeppl where post_id=$post_id and  withuser_id=$withusers";
           $re=  mysqli_query($dbc, $qe);
           if($re)
           {
	 if(!mysqli_num_rows($re)>0)
	 {
	          $q3="INSERT INTO `post_forsomeppl` (`post_specific_id`,post_id ,`user_id`,  `withuser_id`) VALUES (NULL, $post_id,'$user_id',  '$withusers')";
        $r3=mysqli_query($dbc,$q3); 
	 }
           }
         
        
      
    }
     foreach($_REQUEST['show_only_user'] as $showonto)
    {
            $q3="INSERT INTO `post_forsomeppl` (`post_specific_id`,post_id ,`user_id`,  `showonlyto`) VALUES (NULL, $post_id,'$user_id',  '$showonto')";
        $r3=mysqli_query($dbc,$q3);
        if($r3)
        {
            echo"inserted users";
        }else
        {
            echo"not inserted";
        }
      
    }
     foreach($_REQUEST['hidden_users'] as $hiddenusers)
    {
            $q3="INSERT INTO `post_forsomeppl` (`post_specific_id`,post_id ,`user_id`,  `hideto`) VALUES (NULL, $post_id,'$user_id',  '$hiddenusers')";
        $r3=mysqli_query($dbc,$q3);
        if($r3)
        {
            echo"inserted users";
        }else
        {
            echo"not inserted";
        }
      
    }
       
// upload files
    
       foreach ($_REQUEST['com_img_src'] as $data)
       {
             if(strpos($data,"image")>0)
       {
           
           
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);

$rand=rand(00000000,9999999999999999);
$name='../'.$_SESSION['user_name'].'/storage/publicfolder/post/images/postimages/'.$rand.'sedfed_post_id_'.$post_id.'_image.jpg';
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
           
       }    
       }
       
       
      
           $myuser_name=$_SESSION['user_name'];
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
	              echo 'empty thumb nal';
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
               }else
	   
               {
	     echo 'empty file';
               }
                   
}


 ?>