<?php session_start();
if(empty($_REQUEST['q']))
{
	header("location:homepage.php");
}else
{
       $email=$_REQUEST['q'];
       require 'mysqli_connect.php';
       $email=  mysqli_real_escape_string($dbc,$email);
      
              $q="select email as em from users where email='$email' or username='$email' ";
              
              $r=  mysqli_query($dbc, $q);
              if($r)
              {
	    if(mysqli_num_rows($r)>0)
	    {
	           echo 'This email Already taken';
	    }  else {
	           echo '<font color="blue">Ok</font>';       
	    }
              }
      
}