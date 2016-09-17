
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
       
	require 'mysqli_connect.php';
        $n=0;
         echo'<div id="imgtot_cont">';
        $q="select wall_pic as p from wall_pics where user_id=$user_id";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
           
            if(mysqli_num_rows($r)>0)
            {
                while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                {
                    $n=$n+1;
                    $p_pic=$row['p'];
                    echo'  <div id="out_cont"> <div onclick="set_selected_wall_pic(\''.$p_pic.'\',\''.$n.'\')" class="img_cont"><img src="'.$p_pic.'" class="photos" />
                        </div></div>
                     

                        ';
                }
            }
        }
	$q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $user_nm=$rt['un'];
              }
              $q1="select post_id as p from post_ctgry where user_id=$user_id and category!=3";
              $r1=  mysqli_query($dbc, $q1);
              if($r1)
              {
	    if(mysqli_num_rows($r1)>0)
	    {
	           while($rowd=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
	           {
		 $post_id=$rowd['p'];
		 $q="SELECT post_image as pimg,post_id as pid from post_images where post_id=$post_id order by post_id desc";
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

					$mylen=strpos($imgs, "storage");
					$imgs=substr($imgs,$mylen,strlen($imgs));
					   echo'  <div id="out_cont"> <div onclick="set_selected_wall_pic(\''.$imgs.'\',\'me\')" class="img_cont"><img src="'.$imgs.'" class="photos" />
                        </div></div>
                     

                        ';
				}
			}
		}else
                {
                    echo 'empty';
                }
	}else
	{
		echo "not run";

	}
        
	           }
	    }
              }
	
        echo'</div>';
        echo '<input type="hidden" value="'.$n.'" id="whichslctd"/>';
}
?>