<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
       $user_id=$_SESSION['user_id'];
       require 'mysqli_connect.php';
       $n=0;
       $q="select myupdate as bg from access where user_id=$user_id limit 1";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
           $updt=$row['bg'];
       }
       if($updt=="1")
       {
           $q="select user_id as u,browser as bs,login as lg,logout as lgo,ip_add as ip,day as d from access where user_id=$user_id order by acc_id desc limit 1";
       
       }
       if($updt=="2")
       {
          $q="select user_id as u,browser as bs,login as lg,logout as lgo,ip_add as ip,day as d from access where user_id=$user_id limit 1";
        
       }
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
               while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
               {
                   $n=$n+1;
                   $brs=$row['bs'];
                   $login=$row['lg'];
                   $logout=$row['lgo'];
                   $day=$row['d'];
                   $ip=$row['ip'];
                   $times=$login;
      
                   $cday=$day;
  $curtime=$logout;
  
      $sec=strpos($times,",")+1;
      $ntime=substr($times,$sec,strlen($times));
      $csec=strpos($curtime,",")+1;
      $ctime=substr($curtime,$csec,strlen($curtime));
$mytime=substr($times,0,$sec);
      $nmin=substr($times, 0,$sec);
      $cmin=substr($curtime, 0,$csec);
      $chk=$ctime-$ntime;

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

                   echo'    
                      <div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker"  >
                                    Someone <div class="Notif_Just_Tip"> logged in your account </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$n.'\').fadeToggle();"  >
                                       Details
                                      </div>
                                    '.$day.' , '.$login.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$n.'">
                                  <div class="Notif_SAD_Itm">
                                      Browser : '.$brs.'
                                  </div>
                                 
                                  <div class="Notif_SAD_Itm">
                                      IP address : '.$ip.'
                                  </div>
                                  <div class="Notif_SAD_Itm">
                                      Logged In: '.$login.'
                                  </div>
                                  <div class="Notif_SAD_Itm">
                                      Usage Duration: '.$myday.'
                                  </div>
                                  <div class="Notif_SAD_Itm">
                                      Logged out: '.$logout.'
                                  </div>
                              </div>
                          </div>
                      </div>';
               }
           }
       }
       
       //for wrn log
       $q="select wrn_id as w,passwd as p,ip as ip,seen as s,browser as bs,time as t from wrn_access where user_id=$user_id order by wrn_id desc limit 9";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           $wrn=0;
           if(mysqli_num_rows($r)>0)
           {
               echo'<div id="forofwrnp">';
               while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
               {
                   if($wrn<=8)
                   {
                       
                   $wrn=$wrn+1;
                       $pass=$row['p'];
                   $ip=$row['ip'];
                   $time=$row['t'];
                   $brsr=$row['bs'];
                   $seen=$row['s'];
                   $wrn_id=$row['w'];
                   $qw="update wrn_access set seen=1 where wrn_id=$wrn_id";
                   $rw=  mysqli_query($dbc,$qw);
                   if($seen==0)
                   {
                       $stl="aliceblue;";#404855
                   }else
                   {
                       $stl="aliceblue;";
                   }
                   echo '
                       <div class="MNF_like_itm" id="styl'.$wrn_id.'" style="background-color:'.$stl.'" onclick="showcolor()" >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                                Someone <div class="Notif_Just_Tip"> Tried to login with wrong password </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$wrn.'\').slideToggle();" >
                                        Details
                                      </div>
                                      '.$time.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$wrn.'">
                                  <div class="Notif_SAD_Itm">
                                      Browser : '.$brsr.'
                                  </div>
                                
                                  <div class="Notif_SAD_Itm">
                                      IP address : '.$ip.'
                                  </div>
                                  <div class="Notif_SAD_Itm">
                                      Password Used : '.$pass.'
                                  </div>
                              </div>
                          </div>
                      </div>
                      '; 
                 if($seen=="1")
                 {
                      echo'  <script type="text/javascript">
   $(document).ready(function()
   {
         $("#styl'.$wrn_id.'").fadeOut().fadeIn(1000);
  
   });
   </script>
                      ';
                 }
      
                   }
                  
               }
               echo'</div>';
               if(mysqli_num_rows($r)>8)
               {
                   echo' <div class="Notif_ShowMore" id="for_ovf_wrn_acc" onclick="showmorewrnlog(\'#forofwrnp\')">
                         Show More  details
                         <input type="hidden" id="my_ovf_wrn_acc" value="'.$wrn.'" />
                     </div>';
               }
           }
       }
    
       $q="select visitor_id as u,time as t,folder_id as f,ip as ip from storage_acc where user_id=$user_id order by st_accid desc limit 9";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
               $sac=0;
               echo' <div id="forofstracc"> ';
               while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
               {
                   
                   if($sac<=8)
                   {
                       $sac=$sac+1;
                        $vst_id=$row['u'];
                   $vtime=$row['t'];
                   $f_id=$row['f'];
                   $ip_add=$row['ip'];
                   $q2="select folder_name as fn from myfolders where folder_id=$f_id";
                   $r2=mysqli_query($dbc,$q2);
                   if($r2)
                   {
                       if(mysqli_num_rows($r2)>0)
                       {
                           $rrp=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                           $fnm=$rrp['fn'];
                       }
                   }
                   $q1="select first_name as f from basic where user_id=$vst_id";
                   $r1=mysqli_query($dbc,$q1);
                   if($r1)
                   {
                       if(mysqli_num_rows($r1)>0)
                       {
                           $rows=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                           $vst_nm=$rows['f'];
                       }else
                       {
                           $vst_nm="Someone";
                       }
                   }
                   else
                   {
                       $vst_nm="Someone";
                   }
                   echo'
                        <div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                                '.$vst_nm.' <div class="Notif_Just_Tip"> accessed your '.$fnm.' folder </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$sac.'\').slideToggle();" >
                                        Details
                                      </div>
                                      
                                      '.$vtime.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$sac.'">
                                  
                                  
                                  <div class="Notif_SAD_Itm">
                                      IP address : '.$ip_add.'
                                  </div>
                                 
                              </div>
                          </div>
                      </div>
                    
                      ';
                   }
                  
               }
               echo'</div>';
               if(mysqli_num_rows($r)>8)
               {
                   echo' <div class="Notif_ShowMore" id="for_ovf_str_acc" onclick="showmorestracc(\'#forofstracc\')" >
                         Show More detail
                         <input type="hidden" value="'.$sac.'" id="my_ovf_str_acc" />
                     </div>';
               }else
               {
                   
               }
           }
       }
       
       $q="select passwd as p,ip as ip,time as tm,folder_id as f,visitor_id as v  from wrn_storage_acc where user_id=$user_id order by st_accid desc limit 9";
         $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
               $wsac=0;
               echo'<div id="forofwrnstacc"> ';
               while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
               {
                   if($wsac<=8)
                   {
                        $wsac=$wsac+1;
                   $vtime=$row['tm'];
                   $f_id=$row['f'];
                   $vst_id=$row['v'];
                   $pass=$row['p'];
                   $ip_add=$row['ip'];
                   $q2="select folder_name as fn from myfolders where folder_id=$f_id";
                   $r2=mysqli_query($dbc,$q2);
                   if($r2)
                   {
                       if(mysqli_num_rows($r2)>0)
                       {
                           $rrp=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                           $fnm=$rrp['fn'];
                       }
                   }
                   $q1="select first_name as f from basic where user_id=$vst_id";
                   $r1=mysqli_query($dbc,$q1);
                   if($r1)
                   {
                       if(mysqli_num_rows($r1)>0)
                       {
                           $rows=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                           $vst_nm=$rows['f'];
                       }else
                       {
                           $vst_nm="Someone";
                       }
                   }else
                   {
                       $vst_nm="Someone";
                   }
                   echo '
                         
                       <div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                               '.$vst_nm.' <div class="Notif_Just_Tip"> tried to accessed your '.$fnm.' folder </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$wsac.'\').slideToggle();" >
                                        Details
                                      </div>
                                      
                                      '.$vtime.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$wsac.'">
                                  
                                  <div class="Notif_SAD_Itm">
                                      Password used : '.$pass.'
                                  </div>
                                  <div class="Notif_SAD_Itm">
                                      IP address : '.$ip_add.'
                                  </div>
                                 
                              </div>
                          </div>
                      </div>
                   
                    '; 
                   }
                 
               }
               if($wsac>8)
               {
                   echo' </div><div class="Notif_ShowMore" id="for_ovrflwwrnpass" onclick="showmoresecalert(\'#forofwrnstacc\',\'wrn_st_acc\',\'#for_of_str_wrn_acc\')">
                   <input type="hidden" value="'.$wsac.'" id="for_of_str_wrn_acc" />
                         Show More details
                     </div>';
               }
           }
       }
       
       
               }
   
   ?>
