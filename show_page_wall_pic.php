
<?php session_start();
if( empty($_REQUEST['q']))
{
	header("location:index.php");
}else
{
	$user_id=$_REQUEST['q'];
	$page_id=$_REQUEST['page_id'];
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
        
        $q1="select post_id as p from post_permision where page_id=$page_id";
        $r1=  mysqli_query($dbc, $q1);
        if($r1)
        {
               if(mysqli_num_rows($r1)>0)
               {
	     while($rok=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
	     {
	            $post_id=$rok['p'];
	           $q="select post_id  as p from post_ctgry where post_id=$post_id and category=5 order by post_id desc";
	      
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
                    $qr="select post_image as im from post_images where post_id=$post_id order by post_img_id desc";
                    $rr=mysqli_query($dbc,$qr);
                    if($rr)
                    {
                        if(mysqli_num_rows($rr)>0)
                        {
                            $rows=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                            $imgs=$rows['im'];
	            $pid=$post_id;
                           
	           if($n>1)
	           {
		 $my=substr($imgs,3,  strlen($imgs));
		 if(!strpos($pre,"$my")>0)
		 {
		        $pre="$pre$imgs";
		     
		         echo'   <div class="ImgeContainer" id="fileHolder5" onclick="$(\'#securedFolderPass\').slideDown();" >
                              <input type="checkbox" class="fileCheck" id="file'.$n.'" value="'.$pid.'" onchange="imSelectd()"/>
                              <div class="imgName" id="imgNameDiv'.$n.'" ><marquee id="imgName'.$n.'" >'.$c_name.' at '.$time.'</marquee></div>
                                  <input type="hidden" id="next_post_img'.$n.'" value="'.$pid.'" />
                              <img class="img-photos" id="sf_Img_'.$n.'" src="'.$imgs.'" name="'.$pid.'" alt="'.$n.'" onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();"/>  
                              
                          </div>';
		 }
		   
	           }else
	           {
		  $pre=$imgs;
		   echo'   <div class="ImgeContainer" id="fileHolder5" onclick="$(\'#securedFolderPass\').slideDown();" >
                              <input type="checkbox" class="fileCheck" id="file'.$n.'" value="'.$pid.'" onchange="imSelectd()"/>
                              <div class="imgName" id="imgNameDiv'.$n.'" ><marquee id="imgName'.$n.'" >'.$c_name.' at '.$time.'</marquee></div>
                                  <input type="hidden" id="next_post_img'.$n.'" value="'.$pid.'" />
                              <img class="img-photos" id="sf_Img_'.$n.'" src="'.$imgs.'" name="'.$pid.'" alt="'.$n.'" onclick="openSFImgViewer('.$n.')" onmouseover="$(\'#imgNameDiv'.$n.'\').slideDown().delay();//showDetails(event,\'#testTt\')" onmouseout="$(\'#imgNameDiv'.$n.'\').fadeOut();"/>  
                              
                          </div>'; 
	           }
	          
                             
                        }
                    }
                   
                 
                }
            }
        }
	
	    
	     }
               }
        }
     
        
        echo'</div>';
        echo '<input type="hidden" value="'.$n.'" id="max_pre_img_val"/>';
}
?>