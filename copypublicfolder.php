<?php session_start();
if(empty($_SESSION['user_id']) || empty($_REQUEST['mediaid']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$pf_contid=$_REQUEST['mediaid'];
	$q="select dwn_count as dc from public_folder where pf_id=$pf_contid";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		$d_cnt=$row['dc'];
		$d_cnt=$d_cnt+1;	

	$q="UPDATE public_folder set dwn_count=$d_cnt where pf_id=$pf_contid";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		
		$q="INSERT INTO copy_frmpf (user_id,pf_contentid)values($user_id,$pf_contid)";
		$r=mysqli_query($dbc,$q);
		if($r)
		{
			echo "ins";
		}else
		{
			echo "not ins";
		}
	}else
	{
		echo "ins";
	}

	}
}
?>