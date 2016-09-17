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
  $cont=$_REQUEST['ct'];
  $user_id=$_SESSION['user_id'];
  $tc=$_REQUEST['tcnt'];
  
       $q="select passwd as p,ip as ip,time as tm,visitor_id as v,folder_id as f from wrn_storage_acc where user_id=$user_id order by st_accid desc";
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
                      $vtime=$row['tm'];
                   $f_id=$row['f'];
                   $pass=$row['p'];
                   $vst_id=$row['v'];
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
                   $q5="select c_name as c from contacts where user_id=$user_id and cu_id=$vst_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       if(mysqli_num_rows($r5)>0)
                       {
                           $rowc=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                           $vst_nm=$rowc['c'];
                       }  else
                           {
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
                   }else
                   {
                       $vst_nm="Some one";
                   }
                           }
                   }
                   
                   echo '
                       <div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                               '.$vst_nm.'  <div class="Notif_Just_Tip"> tried to accessed your '.$fnm.' folder </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$cntn.'\').slideToggle();" >
                                        Details
                                      </div>
                                      
                                      '.$vtime.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$cnt.'">
                                  
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
               if((mysqli_num_rows($r))>=($tc+$cnt))
               {
                   echo'<div id="for_ovrflwwrnpass" class="Notif_ShowMore" onclick="showmoresecalert(\'#forofwrnstacc\',\'wrn_st_acc\')" >
                       Show More  Detail
                             <input type="hidden" value="'.($cnt+$tc).'" id="for_of_str_wrn_acc" />
                   
                     </div>';
               }  else {
                   echo''
                   . ' <input type="hidden" value="'.($cnt+$tc).'" id="for_of_str_wrn_acc" />
                   ';
               }
           }
       }
  
  }
  
  
?>