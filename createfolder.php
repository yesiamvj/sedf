<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
echo''.$_SESSION['user_id'].' '.$_SESSION['user_id'].'';
}else
{
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$q="SELECT username as u from users where user_id=$user_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		$username=$row['u'];
		$name=$_REQUEST['q'];
		$structure="../$username/$name";

      if(mkdir($structure, 0777, true)) 
     {
          
      }else{
  				mkdir("../$username/$name");
			}
	}
	$q2="SELECT folder_name as f from myfolders where folder_name='$name' and user_id=$user_id";
	$r2=mysqli_query($dbc,$q2);
	if($r2)
	{
		if(mysqli_num_rows($r2)>0)
		{
                        echo'<script type="text/javascript">
$(document).ready(function()
{
    alert("Folder Name Already Exits...Choose Different Name");
});
</script>';
		}else
		{
			$pass="";
			$m=sha1($pass);
			                $folders=$name;
				$q1="INSERT into myfolders (user_id,folder_name,passwd)values($user_id,'$name','$m')";
				$r1=mysqli_query($dbc,$q1);
				if($r)
				{
					echo'<div class="folderContainer" id="fileHolder" onclick="openfolder(\''.$folders.'\',\''.$m.'\')">
                              <input type="checkbox" class="fileCheck" id="file" value="'.$folders.'" onclick="renamefolder(1,this.id)"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="'.$folders.'"/>  
                              <div class="folderName" id="file3Name"> 
                                  '.$folders.'
                              </div>
                             
                          </div>';
				}else
				{
                                    echo'not ins';				
				}
		}
	}

}
?>