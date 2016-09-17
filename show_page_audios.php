<?php
if(empty($_REQUEST['q']))
{
	header("location:strtvid.php");
}else
{
	$user_id=$_REQUEST['q'];
	$page_id=$_REQUEST['page_id'];
	require 'mysqli_connect.php';
	$n=0;
	$q1="select post_id as p from post_permision where page_id=$page_id";
	$r1=  mysqli_query($dbc, $q1);
	if($r1)
	{
	       if(mysqli_num_rows($r1)>0)
	       {
	              while($row=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
	              {
		    $post_id=$row['p'];
		    
		    $q="SELECT post_audio as pimg ,post_id as pid from post_files where post_id=$post_id order by post_id desc";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		
		$m=0;
		if(mysqli_num_rows($r)>0)
		{
		       
			while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
				$m=$m+1;

				$imgs=$row['pimg'];
				$audi_src=$row['pimg'];
			$pid=$row['pid'];
				if(!empty($imgs))
				{
					$n=$n+1;
							
					$audname=substr($imgs,45,strlen($imgs));
                                        
					$mylen=strpos($imgs, "storage");
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
                              <source class="audio-photos" id="sf_Img_'.$n.'" src="'.$audi_src.'" alt="'.$audi_src.'"  /></source>  
                              
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
	       }
	}
	
}
?>