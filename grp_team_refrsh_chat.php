<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
       require 'mysqli_connect.php';
       $user_id=$_SESSION['user_id'];
       $q="select gp_msg_id as m,group_id as gid from group_msg_seen where member_id=$user_id  ";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
            if(mysqli_num_rows($r)>0)
            {
	  while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	  {
	         $group_id=$row['gid'];
	         $msg_id=$row['m'];
	         $q1="SELECT battle as btl from group_messages where group_id=$group_id and `grp_msg_id` >= $msg_id order by grp_msg_id desc";
                      $r1=mysqli_query($dbc,$q1);
	     if($r1)
	     {
	            if(mysqli_num_rows($r1)>0)
	            {
		  $row2=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
		 
		  $battle_id=$row2['btl'];
		  if($battle_id>=1)
		  {
		           echo "lc($group_id);";
		  }else
		  {
		           echo "lg($group_id);";
		  }
	       
	            }
	     }
	     
	     
	         
	    }
            }
     }
   }
   ?>