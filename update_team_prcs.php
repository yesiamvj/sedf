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
   

    $battle_name=  mysqli_real_escape_string($dbc,trim($_REQUEST['batle_nm']));
    if(!empty($battle_name))
    {
        
     $chk=$_REQUEST['myn'];

    $pub=$_REQUEST['visible'];
    $team1_users=$_REQUEST['team1_users'];
    $team2_users=$_REQUEST['team2_users'];
    $allowsec=$_REQUEST['sec_msg'];
    $nallowsec=$_REQUEST['nals'];
    
    $grp_name1=mysqli_real_escape_string($dbc,trim($_REQUEST['team_name1']));
    $grp_name2=mysqli_real_escape_string($dbc,trim($_REQUEST['team_name2']));
       $grp_name2=$_REQUEST['team_name2'];
       $grp_thm1=$_REQUEST['team1_theme'];
       $grp_thm2=$_REQUEST['team2_theme'];
       $remove_team1_user=$_REQUEST['dlt_tem1_mem'];
        $remove_team2_user=$_REQUEST['dlt_tem2_mem'];
     
        $battle_id=$_REQUEST['battle_id'];
        $q="select battle_id as b from battles where battle_name='$battle_name' and user_id!=$user_id ";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                
            }else
            {
                $q1="update battles set battle_name='$battle_name' where battle_id=$battle_id";
                $r1=  mysqli_query($dbc, $q1);
                
            }
        }
        
    
    
   
   
    if($pub=="1")
    {
        $prv=1;
    }else
    {
        $prv=0;
    }
    
   $cday=date('F j, Y');
  $curtime=date("g:i a,s");
       
        if(!empty($grp_name1) && !empty($grp_name2))
        {
            
            $q1="select group_id as g from groups where (group_name='$grp_name1' or group_name='$grp_name2') and user_id!=$user_id";
            $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    if(mysqli_num_rows($r1)>0)
                    {
                         if($chk=="1")
                         {
                                echo'
                        <script type="text/javascript">
                        $(document).ready(function()
                        {
                                $(".Theater_Window_In").html("This team name already exist choose different name...<div class=\"prcd_crt_grp_result\" onclick=\"createnewteam()\">Create new Team</div>");

                            $("#grppicprev").html(\'\');
                        }
                            );

                        </script>';
                         }
                      
                    
                    }else
                    {
                        
  $q="select group_id as gid,group_name as gn,theme as thm,private as prv,showname as shn,grp_pic as pic from groups where battle_id='$battle_id'";
 
  $r=mysqli_query($dbc,$q);
  if($r)
  {
 $n=0;    
      if(mysqli_num_rows($r)>0)
      {
          
          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
          {
              $n=$n+1;
              if($n==1)
              {
                 
                  $team1_id=$row['gid'];
                  $team1_name=$row['gn'];
                 
              }
               if($n==2)
              {
                  $team2_name=$row['gn'];
                  $team2_id=$row['gid'];
               
              }
              
      }
      }
  }else
  {
      $n=mysqli_error($dbc);
     
  }
    
  $old_grp_dir1='../groups/'.$team1_name.'';
  $old_grp_dir2='../groups/'.$team2_name.'';
                         $grp_dir1='../groups/'.$grp_name1.'';
                         $grp_dir2='../groups/'.$grp_name2.'';
        rename($old_grp_dir1,$grp_dir1);
        rename($old_grp_dir2,$grp_dir2);
        
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
               $qp="select grp_pic as p from groups where group_id=$team1_id";
         $rp=mysqli_query($dbc,$qp);
         if($rp)
         {
             if(mysqli_num_rows($rp)>0)
             {
                 $ros=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                 $movfile1=$ros['p'];
             }
         }
        }
    }else
    {
         $qp="select grp_pic as p from groups where group_id=$team1_id";
         $rp=mysqli_query($dbc,$qp);
         if($rp)
         {
             if(mysqli_num_rows($rp)>0)
             {
                 $ros=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                 $movfile1=$ros['p'];
             }
         }
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
             $qp="select grp_pic as p from groups where group_id=$team1_id";
         $rp=mysqli_query($dbc,$qp);
         if($rp)
         {
             if(mysqli_num_rows($rp)>0)
             {
                 $ros=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                 $movfile2=$ros['p'];
             }
         }
        }
    }else
    {
         $qp="select grp_pic as p from groups where group_id=$team1_id";
         $rp=mysqli_query($dbc,$qp);
         if($rp)
         {
             if(mysqli_num_rows($rp)>0)
             {
                 $ros=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                 $movfile2=$ros['p'];
             }
         }
    }
      $q="update groups set group_name='$grp_name1',private='$prv',showname='$allowsec',theme='$grp_thm1',grp_pic='$movfile1' where battle_id=$battle_id and group_name='$team1_name'";
    $r=mysqli_query($dbc,$q);
      $q="update groups set group_name='$grp_name2',private='$prv',showname='$allowsec',theme='$grp_thm2',grp_pic='$movfile2' where battle_id=$battle_id and group_name='$team2_name'";
    $r=mysqli_query($dbc,$q);
   
    if($r)
    {
       
  echo 'Updated';
       
        
        
    }
                    }
                    
                }else{
                    echo'not slc gid';
                }              
            
        }else
        {
        }
      
      if(!empty($grp_name1) && !empty($grp_name2))
        {
           
				$today = date("g:i a ,F j, Y"); 
         //for team 1
                                $qd="delete from group_members where group_id=$team1_id and members_id=$remove_team1_user";
                                mysqli_query($dbc,$qd);
        $qe="select group_id as g from group_members  where group_id='$team1_id' and members_id=$team1_users";
        $re=mysqli_query($dbc,$qe);
        if($re)
            {
            

            if(mysqli_num_rows($re)>0)
            {

            }else
            {
                $qw="select invited_users from group_invites where group_id=$team1_id and invited_users=$team1_users";
                $rw=  mysqli_query($dbc, $qw);
                if($rw)
                {
                    if(mysqli_num_rows($rw)>0)
                    {
                        
                    }  else 
                        {
                          $q1="insert into group_invites(invited_users,group_id)values($team1_users,$team1_id)";
             $r1=mysqli_query($dbc,$q1);
                        if($r1)
                        {
                            
         echo'Group created and invited users';
          
        
                        }else
                        {
                            //mysqli_err;
                        }
                    }
                }
           
            }
        }else
        {
           //mysqli_err
        }
        // for team 2
                             $qd="delete from group_members where group_id=$team2_id and members_id=$remove_team2_user";
                                mysqli_query($dbc,$qd);
        $qe="select group_id as g from group_members  where group_id='$team2_id' and members_id=$team2_users";
        $re=mysqli_query($dbc,$qe);
        if($re)
            {
            

            if(mysqli_num_rows($re)>0)
            {

            }else
            {
                $qw="select invited_users from group_invites where group_id=$team2_id and invited_users=$team2_users";
                $rw=  mysqli_query($dbc, $qw);
                if($rw)
                {
                    if(mysqli_num_rows($rw)>0)
                    {
                        
                    }  else 
                        {
                          $q1="insert into group_invites(invited_users,group_id)values($team2_users,$team2_id)";
                          echo ''.$q1.'';
             $r1=mysqli_query($dbc,$q1);
                        if($r1)
                        {
                            
         echo'Group created and invited users';
          
        
                        }else
                        {
                            //mysqli_err;
                        }
                    }
                }
           
            }
        }else
        {
            //mysqli_err
        }
        
        }

    
       
        
    }else
    {
        echo'Please enter a battle name to create';
    }
    
    
   
}

?>
