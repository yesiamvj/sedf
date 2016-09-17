<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$bldgrp=mysqli_real_escape_string($dbc,$_REQUEST['bgroup']);
echo "$bldgrp";
$lang=mysqli_real_escape_string($dbc,$_REQUEST['lang']);
$relgion=mysqli_real_escape_string($dbc,$_REQUEST['relgion']);
$eca=mysqli_real_escape_string($dbc,$_REQUEST['eca']);
$physics=mysqli_real_escape_string($dbc,$_REQUEST['physic']);
$mental=mysqli_real_escape_string($dbc,$_REQUEST['mental']);
$politic=mysqli_real_escape_string($dbc,$_REQUEST['politic']);
$mi=mysqli_real_escape_string($dbc,$_REQUEST['mnthinc']);
$abtme=mysqli_real_escape_string($dbc,$_REQUEST['abtme']);

$q1="select abtme_id as a from about_me where user_id=$user_id";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
	if(mysqli_num_rows($r1)>0)
	{
		$row=mysqli_fetch_array($r1,MYSQLI_ASSOC);
		$abtid=$row['a'];
		$q="INSERT INTO `about_me` (`abtme_id`, `bldgrp`, `language`, `religion`, `eca`, `phisique`, `mentally`, `politics`, `income`, `aboutme`, `user_id`) VALUES ('', '$bldgrp', '$lang', '$relgion', '$eca', '$physics', '$mental', '$politic', '$mi', '$abtme',$user_id)";
$r=mysqli_query($dbc,$q);
if($r)
{
	echo "ins abt_me $abtid ";
	$q3="DELETE FROM `about_me` WHERE  abtme_id=$abtid";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
	echo "dlt";
}else
{
	echo "no dlt";
}

}else
{
	echo "not ins abt me ";
}
	}else
	{
		$q="INSERT INTO `about_me` (`abtme_id`, `bldgrp`, `language`, `religion`, `eca`, `phisique`, `mentally`, `politics`, `income`, `aboutme`, `user_id`) VALUES ('', '$bldgrp', '$lang', '$relgion', '$eca', '$physics', '$mental', '$politic', '$mi', '$abtme',$user_id)";
$r=mysqli_query($dbc,$q);
if($r)
{
	echo "ins 1st";
	}else
	{
		echo "not ins 1st";
	}
}
}
}
?>
