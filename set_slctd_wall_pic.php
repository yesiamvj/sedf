<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
        function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
 
	//return destination file url
	return $destination_url;
}
	$user_id=$_SESSION['user_id'];
        $p_pic=$_REQUEST['q'];
        $post_pic=$_REQUEST['mes'];
        $user_name=$_SESSION['user_name'];
         $cur_pic=$p_pic;
       if(strpos($p_pic,"storage/")==0)
       {
              $p_pic='../'.$_SESSION['user_name'].'/';
              $p_pic="$p_pic$cur_pic";
       }
        require 'mysqli_connect.php';
       $qw="select update_wall as w from wall_pics where user_id=$user_id";
       $rw=mysqli_query($dbc,$qw);
       if($rw)
       {
           if(mysqli_num_rows($rw)>0)
           {
        if($post_pic=="1")
        {
            
        }else {
         
        }
              $q="update wall_pics set update_wall='../$user_name/$p_pic' where user_id=$user_id";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
               
               
                  $name=$p_pic;    
	 $usename=$user_name;
      $u5='../'.$user_id.'/wpic5.jpg';
$u10='../'.$user_id.'/wpic10.jpg';
$u25='../'.$user_id.'/wpic25.jpg';
$u50='../'.$user_id.'/wpic50.jpg';
$u75='../'.$user_id.'/wpic75.jpg';

$q5='../'.$usename.'/wpic5.jpg';
$q10='../'.$usename.'/wpic10.jpg';
$q25='../'.$usename.'/wpic25.jpg';
$q50='../'.$usename.'/wpic50.jpg';
$q75='../'.$usename.'/wpic75.jpg';




        compress_image($name,$q5,5);
       compress_image($name,$q10,10);
       compress_image($name,$q25,25);
       compress_image($name,$q50,50);
       compress_image($name,$q75,75);
       
       compress_image($name,$u5,5);
       compress_image($name,$u10,10);
       compress_image($name,$u25,25);
       compress_image($name,$u50,50);
       compress_image($name,$u75,75);
             echo'<div  style="border:1px solid gray;text-align:center;padding:10px;background-color:whitesmoke;"><script type="text/javascript">$(document).ready(function()
                {       
               
                    $(\'.my_wall_pic\').attr("src","'.$p_pic.'");
                    });  </script>
                ';
        if($post_pic=="1")
        {
            echo '<img src="../'.$_SESSION['user_name'].'/'.$p_pic.'" />';    
        }  else {
            echo '<img src="'.$p_pic.'" />';
        }
             echo'<script>window.location.href=\'start_profile.php\'</script>
            
               </div>';
             	$today = date("g:i a ,F j, Y"); 
          $qs="select sex as s from basic where user_id=$user_id";
                        $rs=mysqli_query($dbc,$qs);
                        if($rs)
                        {
                            $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                            $sex=$et['s'];
                            if($sex=="girl")
                            {
                                $gen="her";
                            }else
                            {
                                $gen="his";
                            }
                        }
     $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,notice)values($user_id,$cu_id,0,'$today','Changed $gen Wall Picture')";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
             $qw="insert into post_permision (user_id,allrelation,allpeople,me,officiale)values('$user_id','1','0',1,1)";
                    
            $rw=mysqli_query($dbc,$qw);
                if($rw)
                {
                   
                   
                    $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
	     $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	           $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                    
                        $qr="insert into postforall (user_id,post_id,post_time,post_feelings)values($user_id,$pos_id,'$today','Updated $gen Wall Picture')";
                        $rr=mysqli_query($dbc,$qr);
                          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$p_pic')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,2,'Updated $gen Wall Picture',$user_id')";
                            $rws=mysqli_query($dbc,$qws);
                        }else
                        {
                            echo'no';
                        }
      $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,discription,officiale)values($user_id,$cu_id,0,'Updated $gen Wall Picture',$user_id','',1)";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
     
                    }  else {
                        echo mysqli_error($dbc);
                    }
                }
        }else
        {
            echo 'not run';
        }  
           }  else {
        
               
         if($post_pic=="1")
        {
            $p_pic='../'.$_SESSION['user_name'].'/'.$p_pic.'';
        }  else {
          $p_pic=''.$p_pic.'';
        }
               $q="insert into wall_pics (user_id,wall_pic,update_wall)values($user_id,'$p_pic','$p_pic')";
              
        $r=mysqli_query($dbc,$q);
        if($r)
        {
             echo'<div  style="border:1px solid gray;text-align:center;padding:10px;background-color:whitesmoke;"><script type="text/javascript">$(document).ready(function()
                {       
               
                    $(\'.my_wall_pic\').attr("src","'.$p_pic.'");
                        <script>window.location.href=\'start_profile.php\'</script>
                    });  </script>
                ';
        if($post_pic=="1")
        {
            echo '<img src="../'.$_SESSION['user_name'].'/'.$p_pic.'" />';    
        }  else {
            echo '<img src="'.$p_pic.'" />';
        }
             echo'<script>window.location.href=\'start_profile.php\'</script>
            
               </div>';
        }else
        {
            echo 'not run<br/>';
            echo mysqli_error($dbc);
            
        }  
           }
       }else
       {
                
           }
       }
       
