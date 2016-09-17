<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $group_id=$_REQUEST['user'];
    $msg_clr=$_REQUEST['clr'];
    $bg_clr=$_REQUEST['bgclr'];
    $check=$_REQUEST['shw_name'];
     require 'mysqli_connect.php';
     $q="select group_name as n,battle_id as b from groups where group_id=$group_id and battle_id>=1";
    $r=  mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $grp_name=$row['n'];
            $battle_id=$row['b'];
            
        }else
        {
               $battle_id=0;
        }
       }  else {
        $battle_id=0; 
        }
       
    $cnt=$_REQUEST['cnt'];

   
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
    $q="select group_name as n from groups where group_id=$group_id";
    $r=  mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $grp_name=$row['n'];
        }
    }
    if(!empty($_FILES['file']))
    {
        $user_name=$_SESSION['user_name'];
        $msg_file=  mysqli_real_escape_string($dbc,$_FILES['file']['name']);
     $f_name="../groups/$grp_name/messages";
    if(is_dir($f_name))
    {
        $f_name="../groups/$grp_name/messages/$rand$msg_file";
        move_uploaded_file( $_FILES['file']['tmp_name'], $f_name);
        
    }else
    {
        mkdir($f_name,0777,true);
        $f_name="../groups/$grp_name/messages/$rand$msg_file";
          move_uploaded_file( $_FILES['file']['tmp_name'], $f_name);
      
    }
        if($_FILES['file']['type']=="image/jpeg" || $_FILES['file']['type']=="image/png" || $_FILES['file']['type']=="image/ico" || $_FILES['file']['type']=="image/gif" )
        {
        compress_image($f_name,$f_name,10);
            
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
      if($file_cnt==0)
      {
           $q="INSERT INTO `group_messages` (`grp_msg_id`, `member_id`, `group_id`, `msg`,  `seen`,`show_name`, `time`,day, `msg_clr`,bg_clr,battle) VALUES (NULL, '$user_id', '$group_id', '$msg', '0',  '$check', '$time','$day', '$msg_clr','$bg_clr',$battle_id)";
  
        $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo 'msg ins';
        

         $q="select grp_msg_id as m from group_messages where group_id=$group_id and member_id=$user_id order by grp_msg_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $msg_id=$row['m'];
        }
        if(!empty($_FILES['file']))
        {
            
            $q1="insert into grp_msg_file (grp_msg_id,msg_file)values($msg_id,'$f_name')";
            $r1=mysqli_query($dbc,$q1);
        }
        if(strpos($sml, "/smileys/")>0)
        {
              $q="INSERT INTO `grp_msg_smiley` (msg_id, smiley) VALUES ($msg_id,'$sml')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo 'msg sml';
    }else
    {
        echo'not ins sml';
    } 
        }
     

    }else
    {
        echo'not ins msg';
        echo mysqli_error($dbc);
    }
      }elseif($file_cnt>0)
      {
           $q="select grp_msg_id as m from group_messages where group_id=$group_id and member_id=$user_id order by grp_msg_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $msg_id=$row['m'];
        }
        if(!empty($_FILES['file']))
        {
            
            $q1="insert into grp_msg_file (grp_msg_id,msg_file)values($msg_id,'$f_name')";
            $r1=mysqli_query($dbc,$q1);
        }
      }
       
    }else
    {
        $q="select grp_msg_id as m from group_messages where group_id=$group_id and member_id=$user_id order by grp_msg_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $msg_id=$row['m'];
        }
        
        $q="INSERT INTO `grp_msg_smiley` (msg_id, smiley) VALUES ($msg_id,'$sml')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo 'msg sml';
    }else
    {
        echo'not ins sml';
    }
    }
    
    
    
   
}
?>