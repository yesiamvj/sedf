<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$folder=mysqli_real_escape_string($dbc,$_REQUEST['q']);

	$q2="SELECT folder_id as fid from myfolders where user_id=$user_id and folder_name='$folder'" ;
	$r2=mysqli_query($dbc,$q2);
	if($r2)
	{
		$row=mysqli_fetch_array($r2,MYSQLI_ASSOC);
		$folder_id=$row['fid'];
	}else
	{
		echo "empty fid";
	}
        
        
				$today = date("g:i a ,F j, Y"); 
        
             $q="select media as m,copy_id as cp,time as t,size as sz from copied_files where user_id=$user_id";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $cp=0;
            if(mysqli_num_rows($r)>0)
            {
                
                while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                {
                        $cp=$cp+1;
                        $cp_id=$row['cp'];
                    $file_name=$row['m'];
                    echo''.$file_name.'';
                    if(is_file($file_name))
                    {
                        $f1_format=substr($file_name,strlen($file_name)-15,strlen($file_name));
               
                    $dest='../'.$_SESSION['user_name'].'/'.$folder.'/'.$f1_format.'';
                    
                    $ra=copy($file_name , $dest);
                    if($ra)
                    {
                        echo'copied';
                        echo''.$ra.'';
                    }else
                    {
                        echo 'no copied';
                    }
                    $time=$row['t'];
                    $size=$row['sz'];
                    $q1="SELECT user_id as u from folder_contents where user_id=$user_id and media='$dest' and folder_id='$folder_id'";
	$r1=mysqli_query($dbc,$q1);
	if($r1)
	{
		if(mysqli_num_rows($r1)>0)
		{
                      $qe="delete from copied_files where copy_id=$cp_id";
                                mysqli_query($dbc,$qe);
                              
		}else
		{
			$q1="INSERT into folder_contents (user_id,folder_id,media,time,size)values($user_id,$folder_id,'$dest','$today','$size')";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
                                $qe="delete from copied_files where copy_id=$cp_id";
                                mysqli_query($dbc,$qe);
			}else
			{
				echo "not run copy";
			}
		}
	}
	else
	{
		echo "not run that file";
	}
                    }else
                    {
                        echo'<div>Sorry, This folder /file ('.substr($file_name,2,strlen($file_name)).') is deleted You can\'t copy it</div>';
                        $qe="delete from copied_files where copy_id=$cp_id";
                                mysqli_query($dbc,$qe);
                    }
                
                }
                #echo'</div>';
            }
        }
	
}