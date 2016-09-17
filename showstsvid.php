<?php
if(empty($_REQUEST['q']))
{
	header("location:strtvid.php");
}else
{
	$user_id=$_REQUEST['q'];
	require 'mysqli_connect.php';
	$q="SELECT mythink_video as pimg,mythink as p_cap  from status where user_id=$user_id order by think_id desc";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$n=0;
		$m=0;
		if(mysqli_num_rows($r)>0)
		{
			while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
				$m=$m+1;

				$imgs=$row['pimg'];
				$mylen=strpos($imgs,"publicfolder");
		$imgs=substr($imgs,$mylen,strlen($imgs));
			$p_cap=$row['p_cap'];
				if(!empty($imgs))
				{
					$n=$n+1;
							
					echo' <div class="ImgeContainer" id="fileHolder5" onclick="$(\'#securedFolderPass\').slideDown();" >
                              <input type="checkbox" class="fileCheck" id="file5" onchange="imSelectd()"/>
                              <div class="imgName" id="imgNameDiv'.$n.'" ><marquee id="imgName'.$n.'" >'.$p_cap.'</marquee></div>
                              <video class="img-photos" id="sf_Img_'.$n.'" src="'.$imgs.'" alt="'.$imgs.'" onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();" controls/></video>  
                              
                          </div>';
				}
			}
		}else
		{
			echo'There is no Status video';
		}
	}else
	{
		echo "not run";

	}
}
?>