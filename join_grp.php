<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    
    $user_id=$_SESSION['user_id'];
    $grp_id=$_REQUEST['q'];
    require 'mysqli_connect.php';
    $q="select members_id as m from group_members where group_id=$grp_id and members_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            echo 'You are already a member to this group';
              $q2="delete from group_invites where group_id=$grp_id and invited_users=$user_id";
                $r2=mysqli_query($dbc, $q2);
        }else
        {
               $q4="select invited_users as u from group_invites where invited_users=$user_id and group_id=$grp_id";
               $r4=  mysqli_query($dbc, $q4);
               if($r4)
               {
	     if(mysqli_num_rows($r4)>0)
	     {
	           $q1="insert into group_members(group_id,members_id)values($grp_id,$user_id)";
            $r1=mysqli_query($dbc,$q1);
            if($r1)
            {
                echo'Joined';
                $q2="delete from group_invites where group_id=$grp_id and invited_users=$user_id";
                $r2=mysqli_query($dbc, $q2);
                if($r2)
                {
                   
                }else
                {
                    echo 'not deleted';
                }
            }else
            {
                echo'Try Again...';
            }   
	     }  else {
	            echo 'u r not ';       
	     }
               }else
               {
	     echo 'You are not invited to this group';
               }
          
        }
    }
    
}