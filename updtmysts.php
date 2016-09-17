<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$status=mysqli_real_escape_string($dbc,trim($_REQUEST['status']));
$sts_clr=$_REQUEST['stsclr'];
$chk=$_REQUEST['ck'];
$whatsup=$_REQUEST['inc_postt'];
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
	        $today = date("g:i a ,F j, Y"); 
                              
if($chk=="2")
{
 $ftype=$_FILES['file']['type']; 


 $q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $myuser_name=$rt['un'];
              }
               
                 
               $aud=$_FILES['file']['name'];
      $rand=rand(11111111111111,99999999999999999);
      $audname="$rand$aud";
      if($ftype=="audio/mp3" || $ftype=="audio/mid" || $ftype=="audio/wav")
      {
        $movfile="../$myuser_name/storage/publicfolder/post/audios/statusaudios/$audname";
        move_uploaded_file($_FILES['file']['tmp_name'], $movfile);
  
        $q="insert into sts_bgm (user_id,bgm)values($user_id,'$movfile')";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            if($whatsup=="1")
            {
               $qw="insert into post_permision (user_id,allrelation,allpeople,me,officiale)values('$user_id','1','0',1,1)";
                    $rw=mysqli_query($dbc,$qw);
                if($rw)
                { 
	      $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
	    $re=  mysqli_query($dbc, $qe);
                  if($re)
                    {
	        $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                 
                       
                        $qr="insert into postforall (user_id,post_id,post_time,post_feelings,post_caption)values($user_id,$pos_id,'$today','Update $gen Status','$status')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                            
                            $qa="insert into post_files(post_id,user_id,post_audio)values($pos_id,$user_id,'$movfile')";
                            mysqli_query($dbc,$qa);
                              $qws="insert into post_ctgry(post_id,category,user_id,disc)values($pos_id,1,$user_id,'Updated $gen Status')";
                            mysqli_query($dbc,$qws);
                        }else
                        {
                            echo mysqli_error($dbc);
                        }
                    }  else {
                       
                        echo mysqli_error($dbc);
                    }
                }
            }else
            {
                echo'This Status will not be publish';
            }
          echo '<input type="hidden" id="tempaud" value="'.$movfile.'">
          <input type="hidden" id="mcursts" value="'.$status.'">';
          echo'<script type="text/javascript">
      $(document).ready(function()
        {
          var aud=$("#tempaud").val();
     
          $("#stsnxaud").html("<audio src=\""+aud+"\" controls></audio>");
           });
var mysts=$("#mcursts").val();
    $("#nowsts").html(mysts);
          </script>
';

        }
      }else
      {
          
      }
}else
{
  $q="insert into status (user_id,mythink,mythink_color)values($user_id,'$status','$sts_clr')";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            
            if($whatsup=="1")
            {
	         
	  			$today = date("g:i a ,F j, Y"); 
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
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','$status','Updated $gen Status')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                        
                            $qws="insert into post_ctgry(post_id,category,user_id,disc,notice,officiale)values($pos_id,1,$user_id,'Updated $gen Status','$status',1)";
                            $rws=mysqli_query($dbc,$qws);
                        }else
                        {
                            echo'no';
                        }
                    }  else {
                       
                        echo mysqli_error($dbc);
                    }
                }
            }else
            {
                
            }
          echo '
          <input type="hidden" id="mcursts" value="'.$status.'">';
          echo'<script type="text/javascript">
      $(document).ready(function()
        {
          var mysts=$("#mcursts").val();
    $("#nowsts").html(mysts);
    
           });

          </script>
';

        }
}

    }
    ?>