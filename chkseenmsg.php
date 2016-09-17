<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';


    $q="SELECT user_id as s from messages where sender_id=$user_id and  senter_seen=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
           
           while( $row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
            $sender_id=$row['s'];
           $q5="select user_id from messages where user_id=$sender_id and senter_seen=$user_id";
           $r5= mysqli_query($dbc,$q5);
           
             $q3="select p_pic as p from small_pics where user_id=$sender_id";
              $r3=  mysqli_query($dbc,$q3);
              if($r3)
              {
                  if(mysqli_num_rows($r3)>0)
                  {
                      $ry=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                      $p_pic=$ry['p'];
                  }else
                  {
                      $p_pic="icons/male.png";
                  }
              }
  $q="SELECT user_id as u,time as ot,day as day from onlines where user_id=$sender_id ";

  $r=mysqli_query($dbc,$q);
  if($r)
  {
    if(mysqli_num_rows($r)>0)
    {
$onc=0;

 $row=mysqli_fetch_array($r,MYSQLI_ASSOC);

    
        $cu_id=$row['u'];
        $cday=date('F j, Y');
  $curtime=date("g:i a,s");
        $times=$row['ot'];
        $day=$row['day'];
        $sec=strpos($times,",")+1;
        $ntime=substr($times,$sec,strlen($times));
        $csec=strpos($curtime,",")+1;
        $ctime=substr($curtime,$csec,strlen($curtime));
        $mytime=substr($times,0,$sec);
        $nmin=substr($times, 0,$sec);
        $cmin=substr($curtime, 0,$csec);
        $chk=$ctime-$ntime;
 

        if($cmin==$nmin && $chk<10 && $day==$cday)
        {
             
            echo'
                <script type="text/javascript">


                $(document).ready(function()
                {
                
                  $("#for_active_chat").append(\'<div id="active_user'.$cu_id.'"></div>\');
                            var chkhtm=$("#active_user'.$cu_id.'").html();
                                if(chkhtm==="")
                                {
                                        $("#active_user'.$cu_id.'").html(\'<i></i>\');
                                 $("#for_active_chat").append(\'<div class="OAC_Itm"  onclick="openwind('.$cu_id.')">\
                                                  <img class="OAC_ItmImg" src="'.$p_pic.'" />\
                                                  <div class="OAC_ItmCount" id="for_each_usr_cnt'.$cu_id.'"><span class="for_act_chat_cnt"   id="active_msg_cnt'.$cu_id.'">'.mysqli_num_rows($r5).'</span></div>\
                                              </div>\');
                                              
                                }else
                                {
                                  
                                               $("#active_user'.$cu_id.'").fadeIn();
                                }
                                $("#for_each_usr_cnt'.$cu_id.'").fadeIn();
                                $("#active_msg_cnt'.$cu_id.'").html("'.mysqli_num_rows($r5).'");
                });
                </script>';
        

           
        }else
        {
            echo'
                <script type="text/javascript">

                $(document).ready(function()
                {
                            var chkhtm=$("#active_user'.$cu_id.'")fadeOut();
                                   

                });
                </script>';
        }
    }
}

           
        }
        }else
        {  
            
            
             echo'
                <script type="text/javascript">

                $(document).ready(function()
                {
               
                            $(\'.OAC_ItmCount\').fadeOut();
                         
                                

                });
                </script>';
        }
    }
}
?>
