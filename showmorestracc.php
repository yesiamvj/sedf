<?php session_start();
if(empty($_SESSION['user_id']) && empty($_SESSION['user_name']) && empty($_REQUEST['id']) )
{
	header("location:index.php");
        
}else
{
    require 'mysqli_connect.php';
  $m=0;
  $n=0;
  $id=$_REQUEST['id'];
  $user_id=$_SESSION['user_id'];
  $tc=$_REQUEST['tcnt'];
  
 $q="select visitor_id as u,time as t,folder_id as f,ip as ip from storage_acc where user_id=$user_id order by st_accid desc ";
        $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
               $wsac=0;
               $cnt=0;
               $mycnt=mysqli_num_rows($r)-$tc;
               while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
               {
                   $wsac=$wsac+1;
                   if($wsac>=$tc && $wsac<=($tc+25))
                   {
                       $cnt=$cnt+1;
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
                           $vst_nm="Some one";
                       }
                   }
                   else
                   {
                       $vst_nm="Some one";
                   }
                   echo'
                        <div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                                '.$vst_nm.'<div class="Notif_Just_Tip"> accessed your '.$fnm.' folder </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$cnt.'\').slideToggle();" >
                                        Details
                                      </div>
                                      
                                      '.$vtime.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$cnt.'">
                                  
                                  
                                  <div class="Notif_SAD_Itm">
                                      IP address : '.$ip_add.'
                                  </div>
                                 
                              </div>
                          </div>
                      </div>
                    
                      ';
                   }
                 
               }
               if((mysqli_num_rows($r))>=($tc+$cnt))
               {
                   echo'<div id="for_ovf_str_acc" class="Notif_ShowMore" onclick="showmorestracc(\'#forofstracc\')" >
                       Show More  Detail
                             <input type="hidden" value="'.($cnt+$tc).'" id="my_ovf_str_acc" />
                   
                     </div>';
               }  else {
                
                  
               }
           }
       }
  
 
 
  
}