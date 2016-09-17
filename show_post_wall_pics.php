
<?php session_start();
if(empty($_REQUEST['q']))
{
	header("location:index.php");
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
        $n=0;
        $q="select post_id  as p from post_ctgry where user_id=$user_id and category=3 order by post_id desc";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            echo'<div id="imgtot_cont">';
            if(mysqli_num_rows($r)>0)
            {
                while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                {
                    $n=$n+1;
                    $post_id=$row['p'];
                    $qw="select post_time as t from postforall where post_id=$post_id";
                    $rw=  mysqli_query($dbc, $qw);
                    if($rw)
                    {
                        if(mysqli_num_rows($rw)>0)
                        {
                            $rt=  mysqli_fetch_array($rw,MYSQLI_ASSOC);
                            $time=$rt['t'];
                        }
                    }
                    $qr="select post_image as im from post_images where post_id=$post_id";
                    $rr=mysqli_query($dbc,$qr);
                    if($rr)
                    {
                        if(mysqli_num_rows($rr)>0)
                        {
                            $rows=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                            $imgs=$rows['im'];
                            $pid=$post_id;
                              echo'   <div class="ImgeContainer" id="fileHolder'.$n.'" style="background-image:url('.$imgs.')" onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();">
                              <input type="checkbox" class="fileCheck" id="file'.$n.'" value="'.$pid.'" onchange="imSelectd()"/>
                              <div class="imgName" id="imgNameDiv'.$n.'" ><marquee id="imgName'.$n.'" >'.$c_name.' at '.$time.'</marquee></div>
                                  <input type="hidden" id="next_post_img'.$n.'" value="'.$pid.'" />
                              <img class="img-photos" style="display:none" id="sf_Img_'.$n.'" src="'.$imgs.'" name="'.$pid.'" alt="'.$n.'" />  
                              
                          </div>';
                        }
                    }
                   
                 
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
	
        
        echo'</div>';
        echo '<input type="hidden" value="'.$n.'" id="max_pre_img_val"/>';
}
?>