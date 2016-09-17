<?php  session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
                  
   
                   echo'

<!DOCTYPE html>
<html>
  <head>
      
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'taskbar.css"/>
    
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'notes.css"/>
    
   
   <script src="taskbar.js" type="text/javascript"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   
  </head>
  
  <body>
      <div id="fullPageContainer">
         
          <div class="notesHold">
                
                      <div id="forupdtnewnotif"></div>
              <div class="taskbarIn">
                
                  <div class="taskbarType">
                  <div class="sftb_prevDec"></div>
                      <div class="tb_notifItm" id="viewrelreq" style="margin-left: 12px;"  onclick="$(\'#Main_Notif_Rel_Req\').fadeToggle();" >
                          <div id="CustmNotifPeople" >
                              <div id="Notif_PplHead"></div>
                              <div id="Notif_PplBody" >';
                                  
	  require_once  'mysqli_connect.php';
   $q="select group_id  as a from group_invites where invited_users=$user_id and seen=0";
   $r= mysqli_query($dbc, $q);
   if($r)
   {
          $grp_req=  mysqli_num_rows($r);
   }
   $q="select req_id as u from  requests where reqstd_userid=$user_id and seen=0";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
          $rel_req=  mysqli_num_rows($r);
          $tot_req=$rel_req+$grp_req;
          $func="r($tot_req);";
        
   }else
   {
 
   }
      echo'<span id="for_new_rels">'.$tot_req.'</span>';

         
                             echo' </div>
                          </div>
                      </div>
                      <div class="tb_notifItm" id="notifitm1" onclick="$(\'#Main_Notif_Msgs\').fadeToggle();" >
                          <div id="CustmNotifMsg" onclick="shownewmsg()">
                              <div id="Notif_MsgArr"></div>
                              <div id="Notif_MsgCont">
                                 0
                              </div>
                          </div>        
                      </div>
                      <div class="tb_notifItm" onclick="shownotifs()" >
                          <div id="CustmNotifBulb">
                          
                              <div id="Notif_BulbCount" class="tb_Notif_Count">0</div>       
                             
                              
                          </div>
                      </div>
                      <div class="Notif_Gft_TypOut" id="Notif_Gift_Types" style="display: none;" >
                          <div class="Notif_Gift_Arr"></div>
                          <div class="Notif__Gft_Typin">
                              <div class="Notif_Gift_Cont">';
         $cmt=0;
         $shr=0;
         $dwn=0;
           $lc=0;
                                     $uc=0;
                                     $rt=0;
                             $q="select post_id as u from post_permision where user_id=$user_id";
                             $r=mysqli_query($dbc,$q);
                             if($r)
                             {
                                    
                                 if(mysqli_num_rows($r)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                     {
                                         $post_id=$row['u'];
                           
                           $q11="select like_userid as lk ,unlike_userid as un,rating as rt,l_seen as l_seen,u_seen as u_seen,r_seen as r_seen from post_status where post_id=$post_id ";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                                 if(mysqli_num_rows($r11)>0)
                                 {
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
                                         $lkc=$row['lk'];
                                        
                                         $ukc=$row['un'];
                                         $rkt=$row['rt'];
		       $l_seen=$row['l_seen'];
		       $u_seen=$row['u_seen'];
		       $r_seen=$row['r_seen'];
                                         if($lkc!=0 && $l_seen!=1)
                                         {
                                             $lc=$lc+1;
                                         } 
                                         if($ukc!=0 && $l_seen!=1)
                                         {
                                             $uc=$uc+1;
                                         }
                                         if($rkt!=0 && $r_seen!=1)
                                         {
                                            $rt=$rt+1;
                                         }
		       
		              
		             
                                     }
                                 }  else {
                                    
                                 }
                             }
                                         $q2="select cmnt_id from post_comments where post_id=$post_id and seen=0";
                                         $r2=mysqli_query($dbc,$q2);
                                         if($r2)
                                         {
                                             if(mysqli_num_rows($r2)>0)
                                             {
                                                 
                                                 while($rop=mysqli_fetch_array($r2,MYSQLI_ASSOC))
                                                 {
                                                     $cmt=$cmt+1;
                                                 }
                                             }
                                         }
                                         $q3="select user_id  from post_download where post_id=$post_id ";
                                         $r3=mysqli_query($dbc,$q3);
                                         if($r3)
                                         {
                                             if(mysqli_num_rows($r3)>0)
                                             {
                                                 
                                                 while($rops=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                 {
                                                     $dwn=$dwn+1;
                                                 }
                                             }
                                         }
                                         $q4="select user_id from post_share where post_id=$post_id";
                                         $r4=mysqli_query($dbc,$q4);
                                         if($r4)
                                         {
                                             if(mysqli_num_rows($r4)>0)
                                             {
                                                 
                                                 while($rops=mysqli_fetch_array($r4,MYSQLI_ASSOC))
                                                 {
                                                     $shr=$shr+1;
                                                 }
                                             }
                                         }
                                               
                                     }
                                 }
                             }
                            
                             
                             echo'
                                  <div class="Notif_Gft_Itm" onclick="showwholikes()" >
                                      Likes <div class="Notif_Gft_Count" id="likecount">'.$lc.'</div>
                              </div>
                              <div class="Notif_Gft_Itm" onclick="showhwmanyunlik()">
                                  Unlikes <div class="Notif_Gft_Count" id="unlikecouutn">'.$uc.'</div>
                              </div>
                              <div class="Notif_Gft_Itm" onclick="whorates()">
                                  Rates <div class="Notif_Gft_Count" id="ratecount">'.$rt.'</div>
                              </div>
                              <div class="Notif_Gft_Itm" onclick="showwhocmnt()">
                                  Comments <div class="Notif_Gft_Count" id="cmtcount">'.$cmt.'</div>
                              </div>
                              <div class="Notif_Gft_Itm" >
                                 Shares <div class="Notif_Gft_Count">'.$shr.'</div>
                              </div>
                              <div class="Notif_Gft_Itm" >
                                  Downloads <div class="Notif_Gft_Count">'.$dwn.'</div>
                              </div>
                              <div class="Notif_Gft_Itm" onclick="showoverall()">
                                  Overall <div class="Notif_Gft_Count">'.($lc+$uc+$rt+$shr+$cmt+$dwn).'</div>
                              </div>
                              </div>
                              
                          </div>
                      </div>
                      <div class="tb_notifItm" onclick="$(\'#Notif_Gift_Types\').fadeToggle();" >
                          <div id="CustmNotifGift">
                            
                              <div id="Notif_GiftLid">           
                              </div>
                               
                              <div id="Notif_GiftHold">
                                    <div id="Notif_GiftCount" class="tb_Notif_Count" >0</div>       
                                 
                              </div>
                          </div>
                      </div>
                      <div class="sftb_nextDec"></div>
                  </div>
                 
                  <input type="hidden" id="chkalrdclkd" value="1" />
                     
                      </div>
                  
              </div>
                  
          </div>
              
      </div>
     
      </div>
         
          
          </div>
         
         
        
          </div>
           
          
          <div class="NotifNotifHoldr">
                <div class="Main_Notif_Float_Out" id="Main_Notif_Rel_Req" style="display: none"  >
                    <div class="MNF_Arr" style="border-left-color:darkcyan" ></div>
                    <div class="MNF_In">
                        <div class="MNF_Ttl" style="background-color:darkcyan" >Relation Requests <div class="NotifStatus"><span id="newrelsreqs"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:right;margin-left:100px;cursor:pointer;" onclick="$(\'#Main_Notif_Rel_Req\').fadeOut();">X</span> </div> </div>
                        <div class="MNF_Cont" id="relreq_cont">
                           
                        </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Msgs" style="display: none;" >
                  <div class="MNF_Arr" style="border-left-color:navy"></div>
                  <div class="MNF_In" style="background-color: white;" >
                        <div class="MNF_Ttl" style="background-color: navy" >Messages<div class="NotifStatus" id="new_notif_cnt"><span style="text-align:right;margin-left:100px;cursor:pointer;" onclick="$(\'#Main_Notif_Msgs\').fadeOut();">X</span></div> </div>
                        <div class="MNF_Cont" id="Notif_Msg_Cont" >

                        </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Bulbs" style="display: none;" >
                  <div class="MNF_Arr" style="border-left-color:green"></div>
                  <div class="MNF_In" style="background-color: green;">
                        <div class="MNF_Ttl" style="background-color: green" >Notifications<span style="text-align:right;margin-left:100px;cursor:pointer;" class="closeForNoti" onclick="$(\'#Main_Notif_Bulbs\').fadeOut();">X</span><div class="NotifStatus" id="unreadnotif"> </div> </div>

                        <div class="MNF_Cont" id="Notif_Bulb_Cont" style="background-color: white" >
                            <div class="MNF_innrCont" id="for_new_notif">
                               
                            </div>

                        </div>
                    </div>

                </div>
          </div>
        
          <div class="NotifpostGiftHoldr">
                <div class="Main_Notif_Float_Out" id="Main_Notif_Post_Gift_Like"  style="display:none;" >
                    <div class="MNF_Arr" style="border-left-color: navy;" ></div>
              <div class="MNF_In"  style="background-color: navy;">
                  <div class="MNF_Ttl" style="background-color:navy;" >Likes<div class="NotifStatus" id="likecountttl"> New  &nbsp; 25</div> </div>
                  <div class="MNF_Cont" id="Notif_Like_Cont" style="background-color: white"  >
                       
                   
                  </div>
              </div>
                
          </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Post_Gift_Unlike" style="display: none;"  >
                  <div class="MNF_Arr"style="border-left-color:crimson;"></div>
                    <div class="MNF_In"  style="background-color: crimson;">
                        <div class="MNF_Ttl" style="background-color:crimson;" >Unlikes<div class="NotifStatus" id="unlikecnt_ttl"> New  &nbsp; 25</div> </div>
                        <div class="MNF_Cont" id="Notif_unLike_Cont" style="background-color: white"  >
                           </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Post_Gift_Rate" style="display: none;" >
                  <div class="MNF_Arr"style="border-left-color:green;"></div>
                    <div class="MNF_In"  style="background-color:green;">
                        <div class="MNF_Ttl" style="background-color:green;" >Ratings<div class="NotifStatus" id="rtcnt_ttl"> New  &nbsp; 25</div> </div>
                        <div class="MNF_Cont" id="Notif_Rate_Cont" style="background-color: white"  >

                            </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Post_Gift_Comment" style="display: none;" >
                  <div class="MNF_Arr" style="border-left-color:teal;" ></div>
                    <div class="MNF_In"  style="background-color:teal;">
                        <div class="MNF_Ttl" style="background-color: teal;" >Comments<div class="NotifStatus" id="cmt_cnt_ttl"> New  &nbsp; 25</div> </div>
                        <div class="MNF_Cont" id="Notif_Cmnt_Cont" style="background-color: white"  >
                               
                 
                        </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Post_Gift_OA" style="display: none;"  >
                  <div class="MNF_Arr" style="border-left-color:indigo;margin-right:-2px;"></div>
                    <div class="MNF_In"  style="background-color:indigo;">
                        <div class="MNF_Ttl" style="background-color: indigo;" >Overall Responses<div class="NotifStatus"> New  &nbsp; 25</div> </div>
                        <div class="MNF_Cont" id="ovrall_cont"  style="background-color: white"  >

                           

                        </div>
                    </div>

                </div> 
              
          </div>
         
      </div>
  </body>
</html>
';


}

?>