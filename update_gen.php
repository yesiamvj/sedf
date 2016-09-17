
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
       $sex=$_REQUEST['sex'];
      
	require 'mysqli_connect.php';
        $q="select user_id as u from basic where user_id=$user_id ";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
               if(mysqli_num_rows($r)>0)
               {
	     $q1="update basic set sex='$sex' where user_id=$user_id" ;
	    $r1= mysqli_query($dbc, $q1);
	    if($r1)
	    {
	           echo 'Success';
	    }
               }  else 
	     
               {
	     $q1="insert into basic (user_id,sex)values($user_id,'$sex')";
	     $r1= mysqli_query($dbc, $q1);
	    if($r1)
	    {
	           echo 'Success';
	    }
               }
        }
        
}