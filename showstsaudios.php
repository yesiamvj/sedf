<?php
if(empty($_REQUEST['q']))
{
	header("location:strtphotos.php");
}else
{
	
	$user_id=$_REQUEST['q'];
       
	require 'mysqli_connect.php';
        
        if(isset($_SESSION['user_id']))
        {
            $my_userid=$_SESSION['user_id'];
            $qe="select c_name as c from contacts where user_id=$my_userid and cu_id=$user_id";
            $re=mysqli_query($dbc,$qe);
            if($re)
            {
                if(mysqli_num_rows($re)>0)
                {
                    $rt=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $c_name=$rt['c'];
                }else
                {
                    $qes="select first_name as f from basic where user_id=$user_id";
                    $res=  mysqli_query($dbc,$qes);
                    if($res)
                    {
                        $ret=  mysqli_fetch_array($res,MYSQLI_ASSOC);
                        $c_name=$ret['f'];
                    }
                }
            }
        }else
        {
             $qes="select first_name as f from basic where user_id=$user_id";
                    $res=  mysqli_query($dbc,$qes);
                    if($res)
                    {
                        $ret=  mysqli_fetch_array($res,MYSQLI_ASSOC);
                        $c_name=$ret['f'];
                    }
        }
        $q="SELECT bgm as bgm  from sts_bgm where user_id=$user_id order by bgm_id desc";
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

				$imgs=$row['bgm'];
                               $audi_src=$row['bgm'];
				$mylen=strpos($imgs,"storage");
		$imgs=substr($imgs,$mylen,strlen($imgs));
			 $bgm=$imgs;
				if(!empty($imgs))
				{
					$n=$n+1;
						$audname=substr($imgs,56,strlen($imgs));
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
		
				}else
				{

				}
			}
		}else
			{
				echo'There is no Status Audio';
			}
	}else
	{
		echo "not run";

	}
}
?>