<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$folder=mysqli_real_escape_string($dbc,$_REQUEST['fname']);
	$newname=mysqli_real_escape_string($dbc,$_REQUEST['newname']);
	$q="SELECT username as u from users where user_id=$user_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		$username=$row['u'];
	}else
	{
		echo "empty username";
	}
$src="../$username/$folder";
$dest="../$username/$newname";
                               
                               $q2="select folder_id as f from myfolders where user_id=$user_id and folder_name='$newname'";
                            
                                $r2=mysqli_query($dbc,$q2);
                                if($r2)
                                {
                                    if(mysqli_num_rows($r2)>0)
                                    {
                                        echo'
                                                    <script type="text/javascript">
                                                    $(document).ready(function()
                                                    {
                                                        alert("Folder name Already Exists");
                                                    });
                                                    </script>';
                                    }else
                                    {
                                        rename($src,$dest);
                                        
       $q1="update myfolders set folder_name='$newname' where user_id=$user_id and folder_name='$folder'";
	$r1=mysqli_query($dbc,$q1);
	if($r1)
	{
         
            
	}else
	{
		echo "not renamed";
	}
                                    }
                                }
                               
	
}
?>