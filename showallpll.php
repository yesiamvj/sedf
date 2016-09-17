<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
  $user_id=$_SESSION['user_id'];
$cday=date('F j, Y');
  $curtime=date("g:i a,s");
  $cnt=$_REQUEST['q'];
  $tcnt=$_REQUEST['id'];
  require 'mysqli_connect.php';

$qe="SELECT cu_id as c,c_name as cnm from contacts where user_id=$user_id ";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
          $totcnt=0;
          if(mysqli_num_rows($re)>0)
          {
            
            while($rowg=mysqli_fetch_array($re,MYSQLI_ASSOC))
            {

             $his_id=$rowg['c'];
             $cu_id=$his_id;
              $c_name=$rowg['cnm'];
             
	 $quq="select username as u from users where user_id=$cu_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
             $q2="select user_id as u,time as ot,day as day from onlines where user_id=$his_id";
             $r2=mysqli_query($dbc,$q2);
             if($r2)
             {
              if(mysqli_num_rows($r2)>0)
              {
                

              $totcnt=$totcnt+1;
                $row=mysqli_fetch_array($r2,MYSQLI_ASSOC);
      
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
 $rt=$tcnt-$totcnt;
      $difmin=strpos($curtime,":")+1;

      $cdifmin=substr($curtime, $difmin,2);
      $ndifmin=strpos($times,":")+1;

      $ndifmin=substr($times,$ndifmin,2);
      $cutndt=strpos($times, ":");
      $cutcdt=strpos($curtime,":");
      $chhr=substr($curtime,0,$cutcdt);
      $dhhr=substr($times,0,$cutndt);

      $difhr=$chhr-$dhhr;
  

$cdate=strpos($cday,",")-2;
$cdate=substr($cday,$cdate,2);


$ndate=strpos($day,",")-2;
$ndate=substr($day,$ndate,2);

if($cdate>$ndate)
{
  $difmyday=$cdate-$ndate;
}else
{
  $difmyday=0;
}

      $nam=strpos($times,",")-2;
      $cam=strpos($curtime,",")-2;

        $nam=substr($times,$nam,2);
        $cam=substr($curtime,$cam,2);
        

if($cdate>$ndate)
{
  if($nam=="am" && $cam=="am")
  {
    if($dhhr==12){
      $dhhr=0;
    }
if($chhr==12){
      $chhr=0;
    }
      $difhr=(24-$dhhr)+$chhr;
  }
  if($nam=="pm" && $cam=="pm")
  {
    $difhr=(24-(12+$dhhr))+(12+$chhr);
  }
  if($nam=="am" && $cam=="pm")
  {
    if($dhhr==12){
      $dhhr=0;
    }
    $difhr=(24-$dhhr)+(12+$chhr);
  }
  if($nam=="pm" && $cam=="am")
  {
    if($chhr==12){
      $chhr=0;
    }
    $difhr=(24-(12+$dhhr))+$chhr;
  }
  
if($difhr>24)
{
  $difhr=$difhr-24;
 
  
}else
{
   if($difmyday==1 || $difmyday<1)
  {
    $difmyday=0;
  }else
  {
    $difmyday=$difmyday-1;

  }

  
}
$difmyday="$difmyday day";
}else
{
  if($nam=="am" && $cam=="pm")
  {
    if($dhhr==12)
    {
      $dhhr=0;
    }
    $difhr=(12-$dhhr)+$chhr;
  }
  if($nam=="pm" && $cam=="pm")
  {
    $difhr=$chhr-$dhhr;
  }
  if($nam=="am" && $cam=="am")
  {
    $difhr=$chhr-$dhhr;
  }
  $difmyday="";
}

if($cdifmin>=$ndifmin)
        {
          $tdif=$cdifmin-$ndifmin;
        }else
        {
          $tdif=(60+$cdifmin)-$ndifmin;
          if($difhr==1 || $difhr<1)
          {
            $difhr=0;
          }else
          {
            $difhr=$difhr-1;
          }
        }

        
         if($ctime>=$ntime)
        {
          $chk=$ctime-$ntime;
        }else
        {
          $chk=(60+$ctime)-$ntime;
          if($tdif==1 || $tdif<1)
          {
             $tdif=0;
          }else
          {
            $tdif=$tdif-1;
          }
        }
      if($difhr>0)
      {
        $difhr="$difhr hrs";
      }else
      {
        $difhr="";
      }
      if($tdif>0)
      {
        $tdif="$tdif min";
      }else
      {
        $tdif="";
      }

$myday="$difmyday $difhr  $tdif  $chk secs ";

      if($cmin==$nmin && $chk<10 && $day==$cday)
      {

    if($cnt==1)
    {
         echo' <div class="OLPN_Itm" onclick="openwind(\''.$cu_id.'\')" id="offclkcuser'.$cu_id.'">
                                  <img class="OLPN_ItmImg" src="'.$p_pic.'" />
                                  <div class="OLPN_ItmName">
                                      '.$c_name.'
                                      <div class="OLPN_ItmDets" title="Online from'.$times.'"><font id="updttime'.$cu_id.'"></font>
                                     <div class="onlvecnt" id="onlvecnt'.$cu_id.'"> '.$myday.'</div>
 
                                      </div> 
                                  </div>
                              </div>';
         
          
         
    }else
    {
        echo'
<script type="text/javascript">

$(document).ready(function()
{

    $("#for_chat_online_sts'.$cu_id.'").fadeIn();
  $("#onlvecnt'.$cu_id.'").html(\'<div id="myonlineicon" >s</div>\');
  $("#updttime'.$cu_id.'").html(\''.$mytime.'\');
});
</script>';

    }
        

       
        

    }else
    {
     


      if($cnt==1 )
      {
        echo' <div class="OLPN_Itm" onclick="openwind(\''.$cu_id.'\')" id="offclkcuser'.$cu_id.'">
                                  <img class="OLPN_ItmImg" src="'.$p_pic.'" />
                                  <div class="OLPN_ItmName" style="color:crimson" >
                                      '.$c_name.'
                                      <div class="OLPN_ItmDets" id="leave_cnt'.$cu_id.'" title=" Last Online '.$times.' '.$day.'"><font id="updttime'.$cu_id.'"></font>
                                     <div class="onlvecnt" id="onlvecnt'.$cu_id.'">'. substr($day, 0, -6).'</div>
 
                                      </div> 
                                  </div>
                              </div>';
       
        
        
                            }else
                            {
                              echo'
<script type="text/javascript">

$(document).ready(function()
{

  $("#leave_cnt'.$cu_id.'").attr(\'title\',\''.$myday.'\');
        $("#for_chat_online_sts'.$cu_id.'").fadeOut();
    
});
</script>';

                            }
     
                  
    }

              }
              else
             {
              $q="select last_login as ld from history where user_id=$cu_id";
              $r=mysqli_query($dbc,$q);
              if($r)
              {
                $ros=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $mlg=$ros['ld'];
              }

if($cnt==1 || $totcnt>$tcnt)
{
  echo' <div class="OLPN_Itm" id="clkcuser'.$cu_id.'">
                                  <img class="OLPN_ItmImg" src="profileimg.PNG" />
                                  <div class="OLPN_ItmName">
                                      '.$c_name.'
                                      <div class="OLPN_ItmDets"  title="Last login '.$mlg.'">
                                         <font id="onlvecnt"> '.$day.'</font>
                                      </div>
                                  </div>
                              </div>';

}
             }
             }
           }
         }
}


       echo'<input type="hidden" value="'.$totcnt.'" id="totonclmycnt" />';
}
?>
