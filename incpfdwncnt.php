<?php
	$pf_id=$_REQUEST['mediaid'];

require 'mysqli_connect.php';
	$q="select dwn_count as dc from public_folder where pf_id=$pf_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		$d_cnt=$row['dc'];
		$d_cnt=$d_cnt+1;	

	$q1="UPDATE public_folder set dwn_count=$d_cnt where pf_id=$pf_id";
	$r1=mysqli_query($dbc,$q1);
	if($r)
	{
		
		

    }
	}
?>