<?php
if(empty($_SESSION['user_id']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $user_nm=$rt['un'];
              }
	$q="SELECT post_image as pimg,post_id as pid from post_images where user_id=$user_id order by post_id desc";
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
					
					$mylen=strpos($imgs, "storage");
					$imgs=substr($imgs,$mylen,strlen($imgs));
					echo'   <div class="ImgeContainer" id="fileHolder5 >
                             
                              <div class="imgName" id="imgNameDiv'.$n.'" >
                              <img class="img-photos" id="sf_Img_'.$n.'" src="'.$imgs.'" alt="'.$imgs.'"  />  
                              
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