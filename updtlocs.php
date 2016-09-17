<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];

$cloc=mysqli_real_escape_string($dbc,$_REQUEST['cloc']);
$clocfr=mysqli_real_escape_string($dbc,$_REQUEST['clocfr']);
$clocto=mysqli_real_escape_string($dbc,$_REQUEST['clocto']);

$ploc=mysqli_real_escape_string($dbc,$_REQUEST['ploc']);
$plocfr=mysqli_real_escape_string($dbc,$_REQUEST['plocfr']);
$plocto=mysqli_real_escape_string($dbc,$_REQUEST['plocto']);

$nloc=mysqli_real_escape_string($dbc,$_REQUEST['nloc']);
$nlocfr=mysqli_real_escape_string($dbc,$_REQUEST['nlocfr']);
$nlocto=mysqli_real_escape_string($dbc,$_REQUEST['nlocto']);
$q3="DELETE FROM `addresses` WHERE  user_id=$user_id";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
	echo "dlt";
}else
{
	echo "no dlt";
}

$q="INSERT INTO `addresses` (`addr_id`, `user_id`, `cloc`, `clofr`, `clocto`, `ploc`, `plocfr`, `plocto`, `nloc`, `nlocfr`, `nlocto`) VALUES ('', $user_id, '$cloc', '$clocfr', '$clocto', '$ploc', '$plocfr', '$plocto', '$nloc', '$nlocfr', '$nlocto')";
$r=mysqli_query($dbc,$q);
if($r)
{
	echo "ins ";
}else
{
	echo "not ins ";
}
}
?>