
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	
	require_once 'mysqli_connect.php';
	$mob_no=mysqli_real_escape_string($dbc,trim($_REQUEST['mymobno']));
	$email=mysqli_real_escape_string($dbc,trim($_REQUEST['myemail']));
	$website=mysqli_real_escape_string($dbc,trim($_REQUEST['mywebsite']));
	$m=0;
	$q="select user_id as u from person_config where user_id=$user_id";
	$r=  mysqli_query($dbc, $q);
	if($r)
	{
	       if(mysqli_num_rows($r)>0)
	       {
	          $q1="UPDATE `person_config` SET website='$website',email='$email',mobno='$mob_no' WHERE `user_id` = $user_id";
	$r1=mysqli_query($dbc,$q1);
	    if($r1)
	    {
	           echo 'Success';
	    }else
	              {
		    echo mysqli_error($dbc);
	              }
	       }else
	       {
	              $q1="insert into person_config (user_id,website,email,mobno)values($user_id,'$website','$email','$mob_no')";
	              $r1=  mysqli_query($dbc, $q1);
	              if($r1)
	              {
        
		    
	              }else
	              {
		    echo mysqli_error($dbc);
	              }
	       }
	}else
	{
	       echo mysqli_error($dbc);
	}
	 if(empty($_SESSION['change_path_prof']))
    {
           $goto='edit_current.php';
    }else
    {
           $goto='start_up_current.php';
          
    }
     header("location:$goto");

	
}
?>