<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:home.php");
}else
{
       $user_id=$_SESSION['user_id'];
       $rate=$_REQUEST['rate'];
       $page_id=$_REQUEST['page_id'];
            require 'mysqli_connect.php';
        $q="select page_pic as p,page_name as pgn from pages where page_id=$page_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $page_pic=$row['p'];
	 $page_name=$row['pgn'];
	 $today = date("g:i a ,F j, Y"); 
	    
        	 $post_status='    <div class="OfficialCaption">
                                  Rated '.$rate.' for '.$page_name.' page
                                </div>
                            ';
	 $post_status= mysqli_real_escape_string($dbc,$post_status);
       $off_cap='
                            <div class="OfficialPostCaption" style="background-image:url(\''.$page_pic.'\');" >
                                <div class="ODC_Ttl"  style="background-color:white;color:navy" >'.$page_name.'</div>
                                <div class="OPC_Details">
                                     <div class="OPC_User_Id">Page ID : '.$page_id.'</div>
                                <div class="OPC_Signature">
                                      </div>
                                <div class="OPC_Response">
                                   
                                    <a href="../pages/'.$page_id.'">
                                        <div class="OPCR_Itm">
                                             Visit Page 
                                        </div>
                                    </a>
                                    
                                </div>
                                </div>
                               
                            </div>';
       $off_cap=  mysqli_real_escape_string($dbc,$off_cap);
       
  $q="select user_id as u from page_status where user_id=$user_id and page_id=$page_id";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              if(mysqli_num_rows($r)>0)
              {
	    $q2="update page_status set rating='$rate' where user_id=$user_id and page_id=$page_id";
	    $r2=  mysqli_query($dbc, $q2);
	    if($r2)
	    {
	           echo 'your status updated';
	        $qw="insert into post_permision (user_id,allrelation,allpeople,me,officiale)values('$user_id','1','0',1,1)";
                     $rw=mysqli_query($dbc,$qw);
                if($rw)
                {
                    
                   
                 $today = date("g:i a ,F j, Y"); 
                     $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
	   $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	          $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    
	   $pos_id=$ros['p'];
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','$off_cap','$post_status')";
                        $rr=mysqli_query($dbc,$qr);
                          
         $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,notice)values($user_id,$cu_id,0,'$today','Likes $page_name page ')";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
     
                    }  else {
                        echo mysqli_error($dbc);
                    }
                }
                 else {
	    echo mysqli_error($dbc);       
	    }
	    }  else {
	    echo mysqli_error($dbc);       
	    }
	           
              }  else {
	$q2="insert into page_status(user_id,page_id,rating)values($user_id,$page_id,$rate)";
	$r2=mysqli_query($dbc, $q2);
	if($r2)
	{
	       echo 'your rate inserted';
	      $qe="insert into post_permision (user_id,allrelation,allpeople,me,officiale)values('$user_id','1','0',1,1)";
                     $rw=mysqli_query($dbc,$qw);
                if($rw)
                {
                    
                   
                 $today = date("g:i a ,F j, Y"); 
                     $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
	   $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	          $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    
	   $pos_id=$ros['p'];
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','$off_cap','$post_status')";
                        $rr=mysqli_query($dbc,$qr);
                          
         $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,notice)values($user_id,$cu_id,0,'$today','Likes $page_name page ')";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
     
                    }  else {
                        echo mysqli_error($dbc);
                    }
                }
	           
	}  else {
	       echo 'not rated';
	}
              }
       }
	         
           }
    }
       
       
}

    