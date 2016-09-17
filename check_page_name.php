<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
    $name=$_REQUEST['q'];
   
      if(strlen($name)>2 )
    {
    $q="select username as u from users where username='$name'";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 echo '<font color="crimson">Unavailable</font>';
           }else
           {
	 
	 $q1="select page_name as p from pages where  page_name='$name'";
	 $r1=  mysqli_query($dbc, $q1);
	 if($r1)
	 {
	        if(mysqli_num_rows($r1)>0)
	        {
	                echo '<font color="crimson">Unavailable</font>';
	        }else
	        {
	               echo '<font color="green">Ok</font>';
	        }
	 }
           }
    }
    
    }else
    {
           echo '<font color="crimson">Unavailable</font>';
	    
    }
}

?>