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
  
   if($cnt=="1" )
   {
       
   $q="select my_notif_id as m from notification order by notif_id desc";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
       if(!empty($row))
       {
           $myid=$row['m'];
           $myid=$myid+1;
       }else
       {
           $myid=1;
       }
   }
   }  else {
         
   $q="select my_notif_id as m from notification order by notif_id desc";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
       if(!empty($row))
       {
           $myid=$row['m'];
           
       }else
       {
           $myid=1;
       }
   }
   }
  
   
   $q="insert into notification (user_id,cu_id,notice,time,seen,my_notif_id)values($user_id,$senders,'$msg','$today',0,$myid)";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       echo' Notification Sent...';
   }else
   {
       echo mysqli_error($dbc);
   }
   if($allrel=="1" && $cnt=="1")
   {
       $qr="select cu_id as c from contacts where user_id=$user_id";
       $rr=mysqli_query($dbc,$qr);
       if($rr)
       {
           if(mysqli_num_rows($rr)>0)
           {
               while($row=mysqli_fetch_array($rr,MYSQLI_ASSOC))
               {
                   $cu_id=$row['c'];
                   $q="insert into notification (user_id,cu_id,notice,time,seen,my_notif_id)values($user_id,$cu_id,'$msg','$today',0,$myid)";
                    $r=mysqli_query($dbc,$q);
                    if($r)
                    {
                        echo'Notification Sent to all of your contacts...';
                    }else
                    {
                       echo mysqli_error($dbc);
                    }
               }
           }
       }
   }
   
}