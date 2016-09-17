<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['myw']))
{
    header("location:index.php");
}else
{
   $user_id=$_SESSION['user_id'];
   $msg=$_REQUEST['msg'];
   $allrel=$_REQUEST['allrel'];
   $senders=$_REQUEST['users'];
   $cnt=$_REQUEST['cnt'];
   
   $today = date("g:i a ,F j, Y"); 
     
   require 'mysqli_connect.php';
   
   $q="insert into messages (user_id,sender_id,msg,time,seen,senter_seen)values($user_id,$senders,'$msg','$today',0,$senders)";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       echo'Message Sent...';
   }else
   {
          echo 'Please Select Any people';
   }
   if($allrel=="1" && $cnt=="1")
   {
       $qr="select cu_id as c from contacts where user_id=$user_id";
       $rr=mysqli_query($dbc,$qr);
       if($rr)
       {
           if(mysqli_num_rows($rr)>0)
           {
	 $n=0;
               while($row=mysqli_fetch_array($rr,MYSQLI_ASSOC))
               {
	     $n=$n+1;
                   $cu_id=$row['c'];
                   $q="insert into messages (user_id,sender_id,msg,time,seen,senter_seen)values($user_id,$cu_id,'$msg','$today',0,$cu_id)";
                    $r=mysqli_query($dbc,$q);
                    if($r)
                    {
	          if($n==1)
	          {
		   echo'Message Sent to all of your contacts...';
                  
	          }
                       }else
                    {
                        echo mysqli_error($dbc);
                    }
               }
           }
       }
   }
   
}