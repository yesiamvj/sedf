<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
    
	$user_id=$_SESSION['user_id'];
        $f_name=$_REQUEST['q'];
        $user_name=$_SESSION['user_name'];
       
	require 'mysqli_connect.php';
        $qer="select folder_id as f from myfolders where user_id=$user_id and folder_name='$f_name'";
        
        $rer=mysqli_query($dbc,$qer);
        if($rer)
        {
            if(mysqli_num_rows($rer)>0)
            {
                $rt=  mysqli_fetch_array($rer,MYSQLI_ASSOC);
                $f_id=$rt['f'];
                $qw="select fc_id as f from folder_contents where folder_id=$f_id";
                $rw=mysqli_query($dbc,$qw);
                if($rw)
                {
                    if(mysqli_num_rows($rw)>0)
                    {
                        echo'Delete All files in this folder,then delete';
                    }else
                    {
                         $folder_name='../'.$user_name.'/'.$f_name.'';   
        
        if(rmdir($folder_name))
        {
            
        $q="delete from myfolders where user_id=$user_id and folder_name='$f_name'";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
            
            echo'Deleted';
        }     
        }else
        {
            echo'Empty the folder first,then you can delete this folder';
        }
                    }
                    
                }
      
            }  else {
                echo 'No match any of your folders';
            }
        }
       
       
}