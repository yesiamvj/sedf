<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_id']))
{
	header("location:index.php");
}else
{
	$specificppl=$_REQUEST['specificppl'];
	$shareplace=$_REQUEST['place'];
	$groups=$_REQUEST['group'];
	$mal=$_REQUEST['mal'];
	$femal=$_REQUEST['femal'];
	$room=$_REQUEST['room'];
        $group_id=$_REQUEST['group_id'];
	$allpeople=$_REQUEST['allpeople'];
	$allrelation=$_REQUEST['allrelation'];
	$specificoption=$_REQUEST['specificoption'];
	$agesfrom=$_REQUEST['agesfrom'];
	$agesto=$_REQUEST['agesto'];
	$statu=$_REQUEST['stat'];
        $cnt=$_REQUEST['cnt'];
	$position=$_REQUEST['posi'];
	$moods=$_REQUEST['moods'];
	$notboard=$_REQUEST['notboard'];
	$post_id=$_REQUEST['postid'];
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
        if($groups=="1")
        {
            if($group_id==="undefined")
            {
            $group_id=0;
                
            }else
            {
            $group_id=$_REQUEST['group_id'];
                
            }
        }else
        {
            $group_id=0;
        }
                                                                                                  
    
            if($cnt=="2")
            {
                $specificppl=0;
                $qn="INSERT INTO `post_share` (`share_id`, `post_id`, `user_id`, `friends`, `allrelation`, `groups`, `room`,  `notice_board`, `place`, `male`,`female`, `agefrom`, `ageto`, `status`, `position`, `mood`) VALUES (NULL, '$post_id', '$user_id',  '0', '$allpeople', '$room', '$specificoption', '$notboard', '$shareplace', '$mal', '$femal', '$agesfrom', '$agesto','$statu', '$position', '$moods')";

	$rn=mysqli_query($dbc,$qn);
	if($rn)
	{
	
                      $qs="select share_id as s from post_share where user_id=$user_id order by share_id desc";
                $rs=mysqli_query($dbc,$qs);
                if($rs)
                {
                    if(mysqli_num_rows($rs)>0)
                    {
                        $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                        $share_id=$et['s'];
                       /* $qd="insert into post_share_users(shared_users,post_share_id)values($specificppl,$share_id)";
                        $rd=mysqli_query($dbc,$qd);
                        if($rd)
                        {
                      
                        }else
                        {
                           
                        }*/
                    }
                }
                $qp="INSERT INTO `post_permision` ( `user_id`, `allpeople`, `allrelation`, `friends`, `family`, `secret`, `showonlyto`, `hideeto`, `me`, `special`, `share`,page_id,officiale) VALUES ('$user_id', '0', '1', '1', '1', '1', '1', '1', '1', '1', $share_id,0,1)";
                      $rp=mysqli_query($dbc, $qp);
                      if($rp)
                      {
	            echo 'Success';
	            $qs="select post_id as p from post_permision where user_id=$user_id order by post_id desc";
	            $rs=  mysqli_query($dbc, $qs);
	            if($rs)
	            {
		  if(mysqli_num_rows($rs)>0)
		  {
		         $ro_shr=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
		         $my_post_id=$ro_shr['p'];
		         
		  }
		        
	            }
	            		$today = date("g:i a ,F j, Y"); 
    		
	            $qps="INSERT INTO `postforall` ( `user_id`, post_id,post_time) VALUES ($user_id,$my_post_id,'$today')";
	        
                      $rps=mysqli_query($dbc, $qps);
	     if($rps)
	     {
	            
	     }  else {
	     echo mysqli_error($dbc);       
	     }
                
                      }else
                      {
                         
                            //echo mysqli_error($dbc);
                      }
        }
            }else
            {
                $qs="select share_id as s from post_share where user_id=$user_id order by share_id desc";
                $rs=mysqli_query($dbc,$qs);
                if($rs)
                {
                    if(mysqli_num_rows($rs)>0)
                    {
                        $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                        $share_id=$et['s'];
                        $qd="insert into post_share_users(shared_users,post_share_id)values($specificppl,$share_id)";
                        $rd=mysqli_query($dbc,$qd);
                        if($rd)
                        {
                         echo'Success';
                        }else
                        {
                            echo ''.$qd.'';
                            echo mysqli_error($dbc);
                            
                        }
                    }
                }
            }
                    	
        
        

}
?>