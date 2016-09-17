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
  
              $q="select wrn_id as w,passwd as p,ip as ip,seen as sn,browser as bs,time as t from wrn_access where user_id=$user_id order by wrn_id desc";
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
                     $pass=$row['p'];
                   $ip=$row['ip'];
                   $time=$row['t'];
                   $brsr=$row['bs'];
                   $seen=$row['sn'];
                   $wrn_id=$row['w'];
                   
                   $qw="update wrn_access set seen=1 where wrn_id=$wrn_id";
                   $rw=  mysqli_query($dbc,$qw);
                   if($seen==0)
                   {
                       $stl="lightgrey;";
                   }else
                   {
                       $stl="white;";
                   }
                   echo '
                       <div class="MNF_like_itm" style="background-color:'.$stl.'" >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                                Someone <div class="Notif_Just_Tip"> Tried to login with wrong password </div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No" onclick="$(\'#alertNo'.$wsac.'\').slideToggle();" >
                                        Details
                                      </div>
                                      '.$time.'
                                  </div>
                              </div>
                              <div class="Notif_Sec_Alrt_Dets" id="alertNo'.$wsac.'">
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
                   }
                 
               }
               if((mysqli_num_rows($r))>=($tc+$cnt))
               {
                   echo'<div id="for_ovf_wrn_acc" class="Notif_ShowMore" onclick="showmorewrnlog(\'#forofwrnp\')" >
                       Show More  Detail
                             <input type="hidden" value="'.($cnt+$tc).'" id="my_ovf_wrn_acc" />
                   
                     </div>';
               }  else {
                   
                  
               }
           }
       }
  
 
 
  
}