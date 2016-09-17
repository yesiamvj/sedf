<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['batl_id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $battle_id=$_REQUEST['batl_id'];
    $q="select group_id as g from groups where battle_id=$battle_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           $n=0;
           if(mysqli_num_rows($r)>0)
           {
	 
	while( $row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	       $n=$n+1;
	       if($n==1)
	       {
	              $team1_id=$row['g'];
	       }
	       if($n==2)
	       {
	              $team2_id=$row['g'];
	       }
	       
	}
	
           }
    }
    $q="delete from group_members where members_id=$user_id and (group_id=$team1_id or group_id=$team2_id)";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
           echo 'Removed Successfully';
    }else
    {
           echo'Not removed';
           echo mysqli_error($dbc);
    }
}