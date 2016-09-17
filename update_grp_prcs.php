<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $group_id=$_REQUEST['grp_id'];
    require 'mysqli_connect.php';
      $user_id=$_SESSION['user_id'];
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



   
     $chk=$_REQUEST['myn'];

    $pub=$_REQUEST['publicg'];
    $users=$_REQUEST['userid'];
    $allowsec=$_REQUEST['allowsec'];
    
  $rmv_user=$_REQUEST['remv_user'];
    
    $grpname=mysqli_real_escape_string($dbc,trim($_REQUEST['grpname']));
    
   
      $grptheme=$_REQUEST['grptheme'];
      if(!empty($grpname))
      {
      $q="select group_name as n from groups where group_id=$group_id";
      $r=mysqli_query($dbc,$q);
      if($r)
      {
          $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
          $old_grp_name=$row['n'];
          
      }else
      {
          //echo mysqli_error($dbc);
      }
     $q="select group_name as g from groups where group_name='$grpname' and group_id!=$group_id";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
         if(mysqli_num_rows($r)>0)
         {
             $qc="select members_id from group_members where group_id=$group_id";
             $rc-mysqli_query($dbc,$qc);
             if($rc)
             {
                 
                     $memc=mysqli_num_rows($rc);
                 
             }
             echo'This group name already exists,Please choose different group name';
     
         }  else {
         $old_grp_dir='../groups/'.$old_grp_name.'';
                         $grp_dirs='../groups/'.$grpname.'';
               
             if(!empty($_FILES['filem']['name']))
             {
            $rand=rand(00000000000,99999999999999999999);
                         $movfile='../groups/'.$grpname.'/'.$rand.''.$_FILES['filem']['name'].'';
             
             }else
             {
            $movfile="";     
             }
            
             $q1="update groups set group_name='$grpname',theme='$grptheme',private='$pub',showname='$allowsec' where group_id=$group_id";
             $r1=mysqli_query($dbc,$q1);
             if($r1)
             {
                 echo 'Your group successfullly updated.';
               rename($old_grp_dir,$grp_dirs);
  if(!empty($_FILES['filem']['name']) >0)
    {
        $type=$_FILES['filem']['type'];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
        {
            move_uploaded_file($_FILES['filem']['tmp_name'], $movfile);
            compress_image($movfile,$movfile,40);
                 $qs="update groups set grp_pic='$movfile' where group_id=$group_id";
                 mysqli_query($dbc,$qs);

        }else
        {
            $movfile="";
             $qp="select grp_pic as p from groups where group_id=$group_id";
         $rp=mysqli_query($dbc,$qp);
         if($rp)
         {
             if(mysqli_num_rows($rp)>0)
             {
                 $ros=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                 $movfile=$ros['p'];
                 $qs="update groups set grp_pic='$movfile' where group_id=$group_id";
                 mysqli_query($dbc,$qs);
             }
         }
        }
    }else
    {
         $movfile="";
         $qp="select grp_pic as p from groups where group_id=$group_id";
         $rp=mysqli_query($dbc,$qp);
         if($rp)
         {
             if(mysqli_num_rows($rp)>0)
             {
                 $ros=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                 $movfile=$ros['p'];
                 $qs="update groups set grp_pic='$movfile' where group_id=$group_id";
                 mysqli_query($dbc,$qs);
             }
         }
    }
  
       $qa="delete from group_members where group_id=$group_id and members_id=$rmv_user";
     mysqli_query($dbc,$qa);
     
       $q="select group_id as g from group_members where group_id=$group_id and members_id=$users";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
            }else
           {
               $q2="insert into group_invites(invited_users,group_id)values($users,$group_id)";
               $r2=mysqli_query($dbc,$q2);
               if($r2)
               {
                
               }else
               {
                   echo mysqli_error($dbc);
               }
           }
       }
       else
      {
          //echo mysqli_error($dbc);
      }
      
    
             }    
         }
     }
     else
      {
         // echo mysqli_error($dbc);
      }    
      }else
      {
          echo 'You cannot leave group name empty';
      }
      
  
}
   ?>
      