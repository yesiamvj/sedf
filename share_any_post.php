<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_id']))
{
	header("location:index.php");
}else
{
       $user_id=$_SESSION['user_id'];
	$post_id=$_REQUEST['post_id'];
	$my=$_REQUEST['my'];
	require '../web/mysqli_connect.php';
	 $qn="INSERT INTO `post_share` (`share_id`, `post_id`, `user_id`,  `allrelation`) VALUES (NULL, '$post_id', '$user_id',  '1')";

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
                       
                    }
                }
                echo 'Success';
                      	$today = date("g:i a ,F j, Y"); 
    		$qp="INSERT INTO `post_permision` ( `user_id`, `allpeople`, `allrelation`, `friends`, `family`, `secret`, `showonlyto`, `hideeto`, `me`, `special`, `share`,page_id,officiale) VALUES ('$user_id', '0', '1', '1', '1', '1', '1', '1', '1', '1', $share_id,0,1)";
                      $rp=mysqli_query($dbc, $qp);
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
	                                                                                 
    
	            $qps="INSERT INTO `postforall` ( `user_id`, post_id,post_time) VALUES ($user_id,$my_post_id,'$today')";
	        
                      $rps=mysqli_query($dbc, $qps);
        }
                            
           
                    	
        
        

}
?>