<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $sender_id=$_REQUEST['user'];
    $msg_clr=$_REQUEST['clr'];
    $bg_clr=$_REQUEST['bgclr'];
    $cnt=$_REQUEST['cnt'];

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

    $rand=rand(00000000000000,999999999999999999);
   
    if(!empty($_FILES['file']))
    {
        $user_name=$_SESSION['user_name'];
        $msg_file=  mysqli_real_escape_string($dbc,$_FILES['file']['name']);
     $f_name="../$user_name/messages/$rand$msg_file";
    
        move_uploaded_file( $_FILES['file']['tmp_name'], $f_name);
        if($_FILES['file']['type']=="image/jpeg" || $_FILES['file']['type']=="image/png" || $_FILES['file']['type']=="image/ico" || $_FILES['file']['type']=="image/gif" )
        {
           
        $comp=compress_image($f_name,$f_name,10);
        if($comp)
        {
               if(filesize($f_name)>=100)
               {
	     compress_image($f_name,$f_name,5);
               }
                if(filesize($f_name)>=100)
               {
	     compress_image($f_name,$f_name,5);
               }
        }
        }
        
    }  else {
        $f_name="";
    
    }
    $day = date("F j, Y"); 
    $time=date("g:i a"); 	
			
    $sml=mysqli_real_escape_string($dbc,$_REQUEST['smil']);
    $msg=mysqli_real_escape_string($dbc,$_REQUEST['msg']);
   $file_cnt=$_REQUEST['file_cnt'];
    if($cnt==1)
    {
        
        if($file_cnt=="0")
        {
             $q="INSERT INTO `messages` (`msg_id`, `user_id`, `sender_id`, `msg`,  `seen`,`showmy_name`, `time`,day, `msg_clr`,bg_color,live,sender_seen,senter_seen) VALUES (NULL, '$user_id', '$sender_id', '$msg', '0',  '1', '$time','$day', '$msg_clr','$bg_clr',1,$user_id,$sender_id)";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        
        $q2="UPDATE msg_typing set typed='' where user_id=$sender_id and cu_id=$user_id";
        $r2=mysqli_query($dbc,$q2);

         $q="select msg_id as m from messages where user_id=$user_id and sender_id=$sender_id order by msg_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $msg_id=$row['m'];
        }
        if(!empty($_FILES['file']))
        {
            $q1="insert into msg_files (msg_id,msg_file)values($msg_id,'$f_name')";
            $r1=mysqli_query($dbc,$q1);
        }
        if(strpos($sml, "/smileys/")>0)
        {
              $q="INSERT INTO `msg_smiley` (msg_id, smiley) VALUES ($msg_id,'$sml')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      
    }else
    {
       
    } 
        }
     

    }else
    {
       
    }
        }else
        {
             $q="select msg_id as m from messages where user_id=$user_id and sender_id=$sender_id order by msg_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $msg_id=$row['m'];
        }
        if(!empty($_FILES['file']))
        {
            $q1="insert into msg_files (msg_id,msg_file)values($msg_id,'$f_name')";
            $r1=mysqli_query($dbc,$q1);
        }
        }
       
    }else
    {
        $q="select msg_id as m from messages where user_id=$user_id and sender_id=$sender_id order by msg_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $msg_id=$row['m'];
        }
        $q="INSERT INTO `msg_smiley` (msg_id, smiley) VALUES ($msg_id,'$sml')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        
    }else
    {
       
    }
    }
    
    
    echo 'my_chat_user'.$sender_id.'()';
   
}
?>