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
   

    $grp_name1=mysqli_real_escape_string($dbc,trim($_REQUEST['team_name1']));
    $grp_name2=mysqli_real_escape_string($dbc,trim($_REQUEST['team_name2']));
    $battle_name=  mysqli_real_escape_string($dbc,trim($_REQUEST['batle_nm']));
    if(!empty($battle_name) && !empty($grp_name1) && !empty($grp_name2) && $grp_name1!=$grp_name2)
    {
        
     $chk=$_REQUEST['myn'];

    $pub=$_REQUEST['visible'];
   
    $team1_users=$_REQUEST['team1_users'];
    $team2_users=$_REQUEST['team2_users'];
    $allowsec=$_REQUEST['sec_msg'];
    $nallowsec=$_REQUEST['nals'];
    
       $grp_name2=$_REQUEST['team_name2'];
       $grp_thm1=$_REQUEST['team1_theme'];
       $grp_thm2=$_REQUEST['team2_theme'];
      
        if($chk=="1")
    {
        $q="insert into battles(battle_name,public,secret,user_id)values('$battle_name','$pub','$allowsec','$user_id')";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
          
        $q="select battle_id as b from battles where user_id=$user_id  order by battle_id desc limit 1 ";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                $battle_id=$row['b'];
                
            }else
            {
                $battle_id=1;
            }
        }
        }else
        {
           // echo mysqli_error($dbc);
        }
    }else
    {
        $q="select battle_id as b from battles where user_id=$user_id order by battle_id desc limit 1 ";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                $battle_id=$row['b'];
            }else
            {
                $battle_id=1;
            }
        }
    }
    
   
      
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
    }else
    {
        $prv=0;
    }
    
   
       
        if(!empty($grp_name1) && !empty($grp_name2) && $grp_name1!=$grp_name2)
        {
            $q1="select group_id as g from groups where group_name='$grp_name1' or group_name='$grp_name2'";
            $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    if(mysqli_num_rows($r1)>0)
                    {
                         if($chk=="1")
                         {
                                echo'
                        <script>
                       alert("This team name already exist choose different name...");
                       </script>';
                         }
                      
                    
                    }else
                    {
                        
    
                         $grp_dir1='../groups/'.$grp_name1.'';
                         $grp_dir2='../groups/'.$grp_name2.'';
        mkdir($grp_dir1,0777,TRUE);
        mkdir($grp_dir2,0777,TRUE);
       
      if(!empty($_FILES['team1_pic']['name']) >0)
    {
        $type=$_FILES['team1_pic']['type'];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
        {
            $rand=rand(00000000000,99999999999999999999);
            $movfile1='../groups/'.$grp_name1.'/'.$rand.''.$_FILES['team1_pic']['name'].'';
            
            move_uploaded_file($_FILES['team1_pic']['tmp_name'], $movfile1);
            compress_image($movfile1,$movfile1,40);

        }else
        {
            echo'it not an image';
        }
    }else
    {
        $movfile1="";
    }
     if(!empty($_FILES['team2_pic']['name']) >0)
    {
        $type=$_FILES['team2_pic']['type'];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
        {
            $rand=rand(00000000000,99999999999999999999);
            $movfile2='../groups/'.$grp_name2.'/'.$rand.''.$_FILES['team2_pic']['name'].'';
            
            move_uploaded_file($_FILES['team2_pic']['tmp_name'], $movfile2);
            compress_image($movfile2,$movfile2,40);

        }else
        {
            echo'it not an image';
        }
    }else
    {
        $movfile2="";
    }
      $q="insert into groups(user_id,group_name,private,showname,theme,grp_pic,battle_id,battle)values($user_id,'$grp_name1','$prv','$allow','$grp_thm1','$movfile1',$battle_id,1),($user_id,'$grp_name2','$prv','$allow','$grp_thm2','$movfile2',$battle_id,1)";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
       
  echo 'Success ';
         
        //add me
    $q="select group_id as g ,grp_pic as gp from groups where user_id=$user_id and group_name='$grp_name1'  order by group_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $grp1_id=$row['g'];
                $g_pic=$row['gp'];
            }
        }
            $qz="select group_id as g from group_members where members_id=$user_id and group_id=$grp1_id";
	          $rz=mysqli_query($dbc,$qz);
	          if($rz)
	          {
		if(mysqli_num_rows($rz)>0)
		{
		       
		}else
		{
	           $q2="insert into group_members(members_id,group_id)values($user_id,$grp1_id)";
                        $r2=mysqli_query($dbc,$q2);
                   
		}
	          }
        
    }
                    }
                    
                }else{
                    echo'not slc gid';
                }              
            
        }else
        {
               echo 'Please Enter two teams to create';
               if($grp_name1==$grp_name2)
               {
	    echo'<script>alert("Choose Different Team name");</script>';
               }
        }
      
   if($chk!="1")
   {
        if(!empty($grp_name1) && !empty($grp_name2) && !empty($battle_name) && $grp_name1!=$grp_name2)
        {
           
				$today = date("g:i a ,F j, Y"); 
          $q="select group_id as g ,grp_pic as gp from groups where user_id=$user_id and group_name='$grp_name1'  order by group_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $grp1_id=$row['g'];
                $g_pic=$row['gp'];
            }
        }
         $q="select group_id as g ,grp_pic as gp from groups where user_id=$user_id and group_name='$grp_name2'  order by group_id desc limit 1";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $grp2_id=$row['g'];
                $g_pic=$row['gp'];
            }
        }
        // invite member
        $qe="select invited_users from group_invites where invited_users='$team1_users' and group_id=$grp1_id";
        $re=mysqli_query($dbc,$qe);
        if($re){

            if(mysqli_num_rows($re)>0){

            }else
            {
             $q1="insert into group_invites(invited_users,group_id)values($team1_users,$grp1_id)";
                    $r1=mysqli_query($dbc,$q1);
                        if($r1)
                        {
	              echo 'Users invited';
        
                        }else
                        {
                            //mysqli_err;
                        }
            }
            
            
              
            
        }else
        {
            echo'not run';
           // echo mysqli_error($dbc);
        }
        // for team 2
         $qe="select invited_users from group_invites where invited_users=$team2_users and group_id=$grp2_id";
        $re=mysqli_query($dbc,$qe);
        if($re){
            if(mysqli_num_rows($re)>0){

            }else
            {
                        $q1="insert into group_invites(invited_users,group_id)values($team2_users,$grp2_id)";
	            $r1=mysqli_query($dbc,$q1);
                        
                        if($r1)
                        {

	           echo'Team created ';
	           
                        }else
                        {
                        }
            }
        }
        else
        {
           // echo'not run';
        }
        }else
        {
              
        }

    }
       
        
    }else
    {
        echo'Please Fill Battle name and two Team name';
    }
    
    
   
}

?>
