<?php
if(empty($_REQUEST['q']))
{
	header("location:strtvid.php");
}else
{
	$user_id=$_REQUEST['q'];
	require 'mysqli_connect.php';
	$q="SELECT post_video as pimg,post_id as pid from post_files where user_id=$user_id order by post_id desc limit 5";
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
			$pid=$row['pid'];
				if(!empty($imgs))
				{
					$n=$n+1;
							$q1="SELECT post_caption as p from postforall where post_id=$pid";
							$r1=mysqli_query($dbc,$q1);
							if($r1)
							{
								$rows=mysqli_fetch_array($r1);
								$p_cap=$rows['p'];
							}else{
								$p_cap="NOT RUN";
							}
                                                        $video=$imgs;
                                                        $cut= strpos($imgs, "postvideos")+20;
					$imgs= substr($imgs, $cut,  strlen($imgs));
					$mylen=strpos($imgs, "publicfolder");
					$imgs=substr($imgs,$mylen,strlen($imgs));
					echo'   <div class="VideoContainer" id="fileHolder'.$n.'" onclick="openSFImgViewer('.$n.')"  >
                              
                              <div class="videoName" id="imgNameDiv'.$n.'" >'.$imgs.'</div>
                              <source class="img-photos" id="sf_Img_'.$n.'" src="'.$video.'" alt="'.$video.'"  controls/></source>  
                              
                          </div>';
				}
			}
		}
	}else
	{
		echo "not run";

	}
}
?>