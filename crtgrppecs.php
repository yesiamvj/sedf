<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
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



    require 'mysqli_connect.php';
   
  $my=$_REQUEST['grpname'];
     $chk=$_REQUEST['myn'];

    $pub=$_REQUEST['publicg'];
    $priv=$_REQUEST['privateg'];
    $users=$_REQUEST['userid'];
    $allowsec=$_REQUEST['allowsec'];
    $nallowsec=$_REQUEST['nals'];

  
    
    $grpname=mysqli_real_escape_string($dbc,trim($_REQUEST['grpname']));
    
   
      $grptheme=$_REQUEST['grptheme'];

    if($allowsec=="1" || $nallowsec=="1")
    {
        if($allowsec=="1")
        {
            $allow=1;
        }
        if($nallowsec=="1")
        {
            $allow=0;
        }
    }else
    {
        $allow=0;
    }
    if($pub=="1")
    {
        $prv=1;
    }
    if($priv=="1")
    {
        $prv=0;
    }
   
       
        if(strlen($grpname)>1)
        {
            $q1="select group_id as g from groups where group_name='$grpname'";
            $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    if(mysqli_num_rows($r1)>0)
                    {
                        
                                echo'
<script type="text/javascript">
alert("This group name Already Exists Choose Different name");

</script>';
                         
                      
                    echo'Group name already Exists Try Again';
                    }else
                    {
                        
    
                         $grp_dirs='../groups/'.$grpname.'';
        mkdir($grp_dirs,0777,TRUE);
          if(!empty($_FILES['filem']['name']) >0)
    {
        $type=$_FILES['filem']['type'];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
        {
            $rand=rand(00000000000,99999999999999999999);
            $movfile='../groups/'.$grpname.'/'.$rand.''.$_FILES['filem']['name'].'';
            move_uploaded_file($_FILES['filem']['tmp_name'], $movfile);
            compress_image($movfile,$movfile,40);

        }else
        {
            echo'it not an image';
        }
    }else
    {
        $movfile="";
    }
                              $q="insert into groups(user_id,group_name,private,showname,theme,grp_pic)values($user_id,'$grpname','$prv','$allow','$grptheme','$movfile')";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
       

        echo 'Created';
           $q="select group_id as g ,grp_pic as gp from groups where user_id=$user_id  order by group_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $grp_id=$row['g'];
                $g_pic=$row['gp'];
            }
        }
                $q2="insert into group_members(members_id,group_id)values($user_id,$grp_id)";
                        $r2=mysqli_query($dbc,$q2);
         
         
        
        
    }
                    }
                    
                }else{
                    echo'not slc gid';
                }              
            
        }else
        {
            echo 'Please enter a group name to create';
        }
      
   if($chk!="1")
   {
        if(!empty($grpname))
        {
           
				$today = date("g:i a ,F j, Y"); 
          $q="select group_id as g ,grp_pic as gp from groups where user_id=$user_id  order by group_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $grp_id=$row['g'];
                $g_pic=$row['gp'];
            }
        }
        $qe="select invited_users from group_invites where invited_users=$users and group_id=$grp_id";
        $re=mysqli_query($dbc,$qe);
        if($re){
            

            if(mysqli_num_rows($re)>0){

            }else
            {
             $q1="insert into group_invites(invited_users,group_id)values($users,$grp_id)";
                        $r1=mysqli_query($dbc,$q1);
                        
                        if($r1)
                        {

         echo'Group created and invited users';
         
        
                        }else
                        {
                            echo'not invite';
                            echo mysqli_error($dbc);
                        }
            }
        }else
        {
            echo'not run';
        }
        }

    }
       
        
    
   
}

?>
