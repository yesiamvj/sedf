<?php session_start();
/*if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
       
$user_id=$_SESSION['user_id'];
 
require 'mysqli_connect.php';
$fname=  mysqli_real_escape_string($dbc,trim($_REQUEST['fnm']));
$time= date("g:i a ,F j, Y"); 
    		
if(strlen($fname)>2)m
{
     $q="select user_id as u from basic where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update basic set first_name='$fname' where user_id=$user_id";
		$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				echo "Updated";
				

			}else
			{
				echo "not updaed";
			}
	
	}else
	{
		$q2="INSERT into basic (user_id,first_name)values('$user_id','$fname')";
		$r2=mysqli_query($dbc,$q2);
		if($r2)
		{
			echo "Success";
			$post_feelings='Joined in Sedfed';
    
    $joined='        <div class="OfficialPostCaption"  >
                                <div class="ODC_Ttl"  style="background-color:white;color:navy" >'.$fname.'</div>
                                <div class="OPC_Details">
                                     <div class="OPC_User_Id">User ID : '.$user_id.'</div>
                                <div class="OPC_Signature">
                                   <a href="../'.$user_id.'"> sedfed.com/'.$_SESSION['user_name'].'</a>
                               </div>
                                <div class="OPC_Response">
                              
                                    <a href="../'.$user_id.'">
                                        <div class="OPCR_Itm">
                                             Visit Profile 
                                        </div>
                                    </a>
                                    
                                </div>
                                </div>
                               
                            </div>';
    
    $joined=  mysqli_real_escape_string($dbc,"$joined");
    
    $qa="insert into post_permision(user_id,allpeople,me,officiale)values($user_id,1,1,1)";
    $ra=  mysqli_query($dbc, $qa);
    if($ra)
    {
       /*    $q1v="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
           $r1v=  mysqli_query($dbc, $q1v);
           if($r1v)
           {
	 if(mysqli_num_rows($r1v)>0)
	 {
	        $rownbnn=  mysqli_fetch_array($r1v,MYSQLI_ASSOC);
	        $post_id=$rownbnn['p'];
	        echo $post_id;
	        $q2="insert into postforall(user_id,post_caption,post_time,post_feelings,post_id)values($user_id,'$joined','$time','$post_feelings',$post_id)";
	       
	        $r2=mysqli_query($dbc, $q2);
	        if($r2)
	        {
	               echo "success";
	        }else
	        {
	               echo mysqli_error($dbc);
	        }
	      
	      */  
	        /*
	 }
           }else
           {
	 echo mysqli_error($dbc);
           }
			
		}
	}else
	{
	       echo mysqli_error($dbc);
	}
	
		}

}  
*/
?>