
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $post_feelings='Joined in Sedfed';
    require 'mysqli_connect.php';
    $joined='        <div class="OfficialPostCaption" style="background-image:url(\'testw.jpg\');" >
                                <div class="ODC_Ttl"  style="background-color:white;color:navy" >Vijayakumar</div>
                                <div class="OPC_Details">
                                     <div class="OPC_User_Id">User ID : 289</div>
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
    $q="insert into post_permision(user_id,allpeople,me,officiale)values($user_id,1,1,1)";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           $q1="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
           $r1=  mysqli_query($dbc, $q1);
           if($r1)
           {
	 if(mysqli_num_rows($r1)>0)
	 {
	        $row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
	        $post_id=$row['p'];
	        $q2="insert into postforall(user_id,post_caption,post_time,post_feeling)values($user_id,'$joined','$time','$post_feelings')";
	        $r2=mysqli_query($dbc, $q2);
	        header("location:editprofile.php");
	        
	        
	 }
           }
    }
}?>