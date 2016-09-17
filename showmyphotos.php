<?php
if(empty($_REQUEST['userid']))
{
	header("location:strtphotos.php");
}else
{
	$user_id=$_REQUEST['userid'];
	$page_id=$_REQUEST['page_id'];
	
	require 'mysqli_connect.php';
	$q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $user_nm=$rt['un'];
              }
              if($page_id!=="prf")
	{
	       $q1="select post_id as p from post_permision where page_id=$page_id";
	}else
	{
	     $q1="select post_id as p from post_permision where user_id=$user_id";
	    
	}
	
	$r1=  mysqli_query($dbc, $q1);
	if($r1)
	{
	       $pho=0;
	       
		$n=0;
		$m=0;
	       if(mysqli_num_rows($r1)>0)
	       {
	            
	              
	              while($rown=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
	              {
		    $pho=$pho+1;
		    $post_id=$rown['p'];
		        $q="SELECT post_image as pimg,post_id as pid from post_images where  post_id=$post_id order by post_id desc";
		     
	$r=mysqli_query($dbc,$q);
	if($r)
	{
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
						
					$imgs=$imgs;
			     if($n>1)
			     {
			            $my=substr($imgs,3,  strlen($imgs));
			     if(!strpos($pre,"$my")>0)
			     {
			            $pre="$pre$imgs";
			            	echo'   <div class="ImgeContainer" id="fileHolder5"  onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();" style="background-image:url('.$imgs.')" onclick="$(\'#securedFolderPass\').slideDown();" >
                              <input type="checkbox" class="fileCheck" id="file'.$n.'" value="'.$pid.'" onchange="imSelectd()"/>
                              <div class="imgName" id="imgNameDiv'.$n.'" ><marquee id="imgName'.$n.'" ></marquee></div>
                                  <input type="hidden" id="next_post_img'.$n.'" value="'.$pid.'" />
                              <img class="img-photos"  id="sf_Img_'.$n.'" style="display:none;" src="'.$imgs.'" name="'.$pid.'" alt="'.$n.'" onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();"/>  
                              
                          </div>';
			     }
			     }else
			     {
			            	echo'   <div class="ImgeContainer" id="fileHolder5" onclick="$(\'#securedFolderPass\').slideDown();" >
                              <input type="checkbox" class="fileCheck" id="file'.$n.'" value="'.$pid.'" onchange="imSelectd()"/>
                              <div class="imgName" id="imgNameDiv'.$n.'" ><marquee id="imgName'.$n.'" ></marquee></div>
                                  <input type="hidden" id="next_post_img'.$n.'" value="'.$pid.'" />
                              <img class="img-photos" id="sf_Img_'.$n.'" src="'.$imgs.'" name="'.$pid.'" alt="'.$n.'" onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();"/>  
                              
                          </div>';
				$pre=$imgs;
			     }
			     
				
				}
			}
		}else
		        {
		            
		        }
	}
	              }
	       }else
	       {
	              echo 'No Photos';
	       }
	}
 
}
?>