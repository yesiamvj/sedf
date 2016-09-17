<?php
if(empty($_REQUEST['q']))
{
	header("location:strtvid.php");
}else
{
	$user_id=$_REQUEST['q'];
	require 'mysqli_connect.php';
	$q="SELECT post_audio as pimg ,post_id as pid from post_files where user_id=$user_id order by post_id desc";
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
							$audi_src=$imgs;
					$audname=substr($imgs,45,strlen($imgs));
                                        
					$mylen=strpos($imgs, "statusaudios")+20;
					$imgs=substr($imgs,$mylen,strlen($imgs));
                                        if($audname>15)
                                                {
                                                    $audname=  substr($audname,0,15);
                                                    $audname="$audname...";
                                                }else
                                                {
                                                    $audname=  substr($audname,0,15);
                                                }
					echo'   <div class="AudiContainer" id="fileHolder'.$n.'" onclick="$(\'#PAT_AudiTag'.$n.'\').attr({\'src\':$(\'#sf_Img_'.$n.'\').attr(\'src\')});$(\'#SF_PAT_'.$n.'\').slideToggle();"  >
                             '.$audname.' </div>
                              <source class="audio-photos" id="sf_Img_'.$n.'" src="'.$audi_src.'" alt="'.$imgs.'"  /></source>  
                              
                          </div>
                          <div class="postAudioTheater" id="SF_PAT_'.$n.'">
                              <audio id="PAT_AudiTag'.$n.'" src="" preload="none" controls ></audio>
                              </div>
                            ';
				}
			}
		}
	}else
	{
		echo "not run";

	}
}
?>