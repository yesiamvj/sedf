<?php 
require 'mysqli_connect.php';
	$type=$_FILES['file']['type'];
  $name=$_FILES['file']['name'];
    	$size=$_FILES['file']['size'];
if(!empty($name))
{
	
	$name=mysqli_real_escape_string($dbc,trim($_FILES['file']['name']));
	$rand=rand(11111111111111,9999999999999999999999999);


	mkdir("../public folder",0777,true);
	$filename="../public folder/$rand$name";
	
		move_uploaded_file( $_FILES['file']['tmp_name'], $filename);
	
	
			$today = date("g:i a ,F j, Y"); 
			
    		 
    		  $q="INSERT INTO `public_folder` (pf_content, `time`,size) VALUES ('$filename','$today','$size')";
    		  $r=mysqli_query($dbc,$q);
    		  if($r)
    		  {
    		  
    		  	echo'<script type="text/javascript">
    		  	$(document).ready(function()
    		  		{
    		  		
    		  			$(".Ldricn").attr(\'src\',\'icons/okrit.png\');
    		  		});
    		  	
	
					</script>';
    		  }else
    		  {
    		  	echo "not ins";
    		  }
 
    	
  }
?>