<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
        $today = date("g:i a ,F j, Y"); 
	require 'mysqli_connect.php';
	$files_id=mysqli_real_escape_string($dbc,$_REQUEST['media']);
        
            $q="select media as m from folder_contents where fc_id=$files_id";
            $r=mysqli_query($dbc,$q);
            if($r)
            {
                $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                $media=$row['m'];
                 $qe="delete from folder_contents where fc_id=$files_id";
                    $re=mysqli_query($dbc, $qe);
                    if($re)
                    {
                        
                    }
                $del=unlink($media);
                if($del)
                {
                    echo'
<script type="text/javascript">
$(document).ready(function()
{
    $(\'.my_file'.$files_id.'\').fadeOut();
});
</script>';
                    $qe="delete from folder_contents where fc_id=$files_id";
                    $re=mysqli_query($dbc, $qe);
                    if($re)
                    {
                        
                    }
                }
                
               
            }
            
}
        
        