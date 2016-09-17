<?php
if(empty($_REQUEST['q']))
{
	header("location:strtvid.php");
}else
{
	$user_id=$_REQUEST['q'];
	$page_id=$_REQUEST['page_id'];
	require 'mysqli_connect.php';
	$q1="select post_id as p from post_permision where page_id=$page_id";
	$r1=  mysqli_query($dbc, $q1);
	if($r1)
	{
	       if(mysqli_num_rows($r1)>0)
	       {
	              while($row=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
	              {
		    $post_id=$row['p'];
		    $q="SELECT post_video as pimg,post_id as pid from post_files where post_id=$post_id order by post_id desc";
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
				$n=$n+1;
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

					
					$imgs=$imgs;
					$video=$imgs;
					$cut=strpos($imgs,"postvideos")+20;
					
					$imgs=substr($imgs,$cut,strlen($imgs));
					
					echo'   <div class="VideoContainer" id="fileHolder'.$n.'" onclick="openSFImgViewer('.$n.')"  >
                              
                              <div class="videoName" id="imgNameDiv'.$n.'" >'.$imgs.'</div>
                              <source class="img-photos" id="sf_Img_'.$n.'" src="'.$video.'" alt="'.$video.'"  controls/></source>  
                              
                          </div>';
				}
			}
		}else
		{
		        
		}
	}else
	{
		echo "not run";

	}
	              }
	       }else
	       {
	              echo 'This folder is empty';
	       }
	}
	
}
?>