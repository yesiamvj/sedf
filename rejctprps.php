<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty(($_REQUEST['q'])))
{
	header("location:index.php");
}else
{
	
    $user_id=$_SESSION['user_id'];
    $prpsd_id=$_REQUEST['q'];
    
			$time= date("g:i a ,F j, Y"); 
    require 'mysqli_connect.php';
    $q="update propose set reject=1,rejct_time='$time' where user_id=$user_id and proposer_id=$prpsd_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo 'Rejected
<script type="text/javascript">
    $(document).ready(function()
    {
        $("#accpthisprps'.$prpsd_id.'").remove();
    });
</script>';
    }
}

?>