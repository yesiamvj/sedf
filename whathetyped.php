<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	$cu_id=$_REQUEST['q'];
$cday=date('F j, Y');
  $curtime=date("g:i a,s");
	require 'mysqli_connect.php';
	$q="SELECT typed as tp,time as ot,day as day from msg_typing where user_id=$cu_id and cu_id=$user_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		$typed=$row['tp'];
		echo''.$typed.'';
		 $times=$row['ot'];
        $day=$row['day'];
        $sec=strpos($times,",")+1;
        $ntime=substr($times,$sec,strlen($times));
        $csec=strpos($curtime,",")+1;
        $ctime=substr($curtime,$csec,strlen($curtime));
        $mytime=substr($times,0,$sec);
        $nmin=substr($times, 0,$sec);
        $cmin=substr($curtime, 0,$csec);
        $chk=$ctime-$ntime;


        if($cmin==$nmin && $chk<60 && $day==$cday)
        {
        	if(empty($typed))
		{
echo'	<script type="text/javascript">

		 $(document).ready(function()
		 	{
		 		$("#hiscurtype'.$cu_id.'").fadeOut();
              
		 	});

</script>';
        }
       	else
		{
			echo'	<script type="text/javascript">

		 $(document).ready(function()
		 	{
		 		$("#hiscurtype'.$cu_id.'").fadeIn();
              
		 	});

</script>';
		}
	}

		}

	}
	?>
