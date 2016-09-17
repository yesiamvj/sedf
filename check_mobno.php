<?php session_start();
if(empty($_REQUEST['q']))
{
}else
{
       $mobno=$_REQUEST['q'];
       require 'mysqli_connect.php';
      $mobno=  mysqli_real_escape_string($dbc,$mobno);
      $q="select mobno as m from users where mobno='$mobno'";
      $r=  mysqli_query($dbc, $q);
      if($r)
      {
             if(mysqli_num_rows($r)>0)
             {
	   echo 'This Mobile number exists';
             }  else {      
	    echo '<font color="blue">Ok</font>';    
             }
      }
       
}