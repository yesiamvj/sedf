<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$fname=$_REQUEST['fnm'];
	$user_id=$_SESSION['user_id'];

	require 'mysqli_connect.php';
	$q="SELECT folder_id as fid from myfolders where user_id=$user_id and folder_name='$fname'";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		$folder_id=$row['fid'];
	}
 $q="SELECT pf_contentid as pid,copy_id as cid from copy_frmpf where user_id=$user_id ";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
    $mn=0;
    if(mysqli_num_rows($r)>0)
    {
      $mn=1;
      $n=0;
      while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
      {
          $n=$n+1;
          $pf_id=$row['pid'];
          $copy_id=$row['cid'];
          $q12="SELECT pf_content as pfc,size as sz from public_folder where pf_id=$pf_id";
          $r12=mysqli_query($dbc,$q12);
          if($r12)
          {
          	$row11=mysqli_fetch_array($r12,MYSQLI_ASSOC);
          	$media=$row11['pfc'];
          	$size=$row11['sz'];
          	$today = date("g:i a ,F j, Y"); 
          	$q13="INSERT INTO folder_contents (folder_id,user_id,media,time)values($folder_id,$user_id,'$media','$today')";
          	$r13=mysqli_query($dbc,$q13);
          	if($r13)
          	{
          		echo "ins";
          	}else
          	{
          		echo "not ins";
          	}
          	$q23="DELETE from copy_frmpf where copy_id=$copy_id";
          	$r23=mysqli_query($dbc,$q23);
          	if($r23)
          	{
          		echo "dlt";
          	}
          }
      }

    }

  }else
  {
  	echo "not run";
  }
}
?>