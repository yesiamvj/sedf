<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
                  
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
        
 }  else {
        
        include '../web/title_bar.php';       
 }     
                   echo'

<!DOCTYPE html>
<html>
  <head>
      
    <link rel="stylesheet" href="taskbar.css"/>
    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="taskbar.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="fullPageContainer">
         
          <div class="taskbarHold">
                
                      <div id="forupdtnewnotif"></div>
              <div class="taskbarIn">
                
                  <div class="taskbarType">
                      <div class="tb_notifItm" id="viewrelreq" style="margin-left: 12px;"  onclick="$(\'#Main_Notif_Rel_Req\').fadeToggle();" >
                          <div id="CustmNotifPeople" >
                              <div id="Notif_PplHead"></div>
                              <div id="Notif_PplBody" >';
                                  
	  require_once  'mysqli_connect.php';
   
      $qreq="SELECT user_id as r,time as t,type as tp,reqstd_name as nm , req_id as rq ,accept as ac from requests where reqstd_userid=$user_id and cancel!=1 and accept!=1 order by req_id desc";
       $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
      $totreq=0;
        if(mysqli_num_rows($rreq)>0)
        {
            
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $totreq=$totreq+1;
             }
             
         }
         echo'<span id="for_new_rels">'.$totreq.'</span>';
     }

         
                             echo' </div>
                          </div>
                      </div>
                      <div class="tb_notifItm" id="notifitm1" onclick="$(\'#Main_Notif_Msgs\').fadeToggle();" >
                          <div id="CustmNotifMsg" onclick="shownewmsg()">
                              <div id="Notif_MsgArr"></div>
                              <div id="Notif_MsgCont">
                                  
                              </div>
                          </div>        
                      </div>
                      <div class="tb_notifItm" onclick="shownotifs()" >
                          <div id="CustmNotifBulb">
                              <div id="Notif_BulbCount" class="tb_Notif_Count"></div>       
                              <div id="Notif_BulbGlass">           
                              </div> 
                              <div id="Notif_BulbHoldr">
                                  <div id="Notif_BulbPin">   
                                  
                                  </div>
                              </div>
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
                                         $q2="select cmnt_id from post_comments where post_id=$post_id ";
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
                                    <div id="Notif_GiftCount" class="tb_Notif_Count" ></div>       
                                 
                              </div>
                          </div>
                      </div>
                     
                  </div>
                  <div class="taskbarType">
                      <div class="tb_TbItm" onmouseover="setTbTTip(event,\'New Post\')" onmouseout="$(\'#TaskBTt\').hide()" >
                          <div class="tb_Tb_Icon">
                              <img  class="tb_newIcos" src="icons/taskbar/newPost.png" alt="New Post" /> 
                          </div>
                      </div>
                  <input type="hidden" id="chkalrdclkd" value="1" />
                 
                      <div class="tb_TbItm"  onclick="$(\'#QuickPost\').fadeToggle();" onmouseover="setTbTTip(event,\'Quick Post\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div class="tb_Tb_Icon">
                              <img  class="tb_newIcos" src="icons/taskbar/newAdvPost.png"  alt="Quick Post" style="max-height: 23px;margin-left: 14px;" /> 
                          </div>
                      </div>
                      <div class="tb_notifItm" onclick="$(\'#QuickMsg\').fadeToggle();" onmouseover="setTbTTip(event,\'New Message\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="new_CustmNotifMsg">
                             <div id="new_Notif_MsgArr"></div>
                              <div id="new_Notif_MsgCont">
                                  <div id="Notif_MsgIn">
                                       +
                                  </div>
                                  
                              </div>
                          </div>        
                      </div>
                      <div class="tb_TbItm" onclick="$(\'#QuickNotif\').fadeToggle();" onmouseover="setTbTTip(event,\'New Notification\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div class="tb_Tb_Icon">
                               <span class="tb_n_plus">+</span>
                              <img  class="tb_newIcos" src="icons/taskbar/notifBulb.png"  alt="New Notif" style="max-height: 45px;margin-left:3px" />
                          </div>
                      </div>
                      <div class="tb_TbItm" onclick="$(\'#QuickMySpecial\').fadeToggle()" onmouseover="setTbTTip(event,\' My feature\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div class="tb_Tb_Icon">
                               
                              <img  class="tb_newIcos" src="icons/taskbar/notif_giftBox.png" alt="Feedback" style="max-height: 23px;margin-left:14px" />
                          </div>
                      </div>
                      <div class="tb_notifItm" onclick="profileviews()" style="margin-top: 20px;" onmouseover="setTbTTip(event,\' Profile Views\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" src="icons/taskbar/off-prof_seen.png" alt="Profile Views" style="max-height: 27px;margin-left: 2px;" />
                               <div class="tb_ico_Count">
                              
                          </div>
                         
                          </div>
                         
                      </div>
                                            <div class="tb_notifItm" onclick="shoesecalert()" onmouseover="setTbTTip(event,\' Security Alerts\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" src="icons/taskbar/off-notif_secure.png" alt="Security" style="max-height: 28px;margin-top:-7px;" />
                               <div class="tb_ico_Count">
                              
                          </div>
                         
                          </div>
                         
                      </div>
                      <div class="tb_notifItm" onclick="showmyproposals()" onmouseover="setTbTTip(event,\' Proposals \')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" id="notif_love" alt="Proposals" src="icons/taskbar/off-notif-love.png" style="max-height: 21px;margin-left: 3px;margin-top: 1px;" />
                              <div class="tb_ico_Count" style="margin-left: -8px;" >
                              
                          </div>
                          </div>
                          
                      </div>
                  
              </div>
                  
          </div>
              
      </div>
      <div class="toolTaskbr" id="TaskBTt" >
                      <div class="tT_Tb_Arr"></div>
                      <div class="tT_Tb_Cont" id="tT_Tb_Txt" >
                          New Post
                      </div>
      </div>
          <div class="QuickPostHoldr" id="QuickPost" style="display: none;" >
              <div class="QuickPostOut">
                  <div class="qckPostArr"></div>
                  <div class="QckPostIn">
                      <div class="qckPostTtl">Quick Post <div class="quickPostClose" onclick="$(\'#QuickPost\').fadeOut();">X</div> </div>  
                      <div class="qckPostCont">
                          <input type="text" id="qckpostwrd" placeholder="Say something ..." />
                          <div class="qckPostSubmit" id="qckpost" onclick="quickpost()">
                              Publish
                          </div>
                      </div>
                  </div>
          </div>
          </div>
          <div class="QuickPostHoldr" id="QuickMsg" style="display: none;" >
              <div class="QuickPostOut">
                  <div class="qckPostArr" style="border-left-color: teal;" ></div>
                  <div class="QckPostIn">
                      <div class="qckPostTtl" style="background-color: teal;" >Quick Message <div class="quickPostClose" onclick="$(\'#QuickMsg\').fadeOut();">X</div> </div>  
                      <div class="qckPostCont">
                          <input class="QuickMsgInp" id="myqcmsgcont" type="text" placeholder="Say something ..." />
                          <div class="qckRecips">
                          <input id="forqcmsgval" type="hidden" value="" />
                              To <input  type="text" placeholder="Recipient Name" onclick="add_qck_msg_ppl(10)" style="width: 200px;" />
                              <input type="checkbox" id="allrelqc"/> All Relations
                              <div class="qckspNo" onclick="$(\'#qckMsgResp\').slideToggle();" > 0 people added  <div class="qckRspArr"></div> </div>
                          </div>
	        
                          <div class="qckRecipsHold" style="display: none;" id="qckMsgResp" >
                              <span class="qckRecipItm" title="click to remove" ></span>
                          </div>
                          <div class="qckPostSubmit" id="sendqckmsg" onclick="sendqcmsg()" style="margin-top: 0px;" >
                              Send
                          </div>
                      </div>
                  </div>
          </div>
          </div>
           <div id="for_add_members"></div>
          <div class="QuickPostHoldr" id="QuickNotif" style="display: none;" >
              <div class="QuickPostOut">
                  <div class="qckPostArr" style="border-left-color: teal;" ></div>
                  <div class="QckPostIn">
                      <div class="qckPostTtl" style="background-color: teal;" >Notify People<div class="quickPostClose" onclick="$(\'#QuickNotif\').fadeOut();">X</div> </div>  
                      <div class="qckPostCont">
                          <textarea id="notifcontqck" placeholder="What\'s Up ..."></textarea>
                          <div class="qckRecips">
                          <input type="hidden" id="forqcknotifval" />
                              To <input  type="text" onclick="add_qck_msg_ppl(11)" id="qcknotifcont" placeholder="Recipient Name" style="width: 200px;" />
                              <input type="checkbox" id="allrelnotif"/> All Relations
                              <div class="qckspNo" onclick="$(\'#qckNotifResp\').slideToggle();" > 1 people added  <div class="qckRspArr"></div> </div>
                          </div>
                          <div class="qckRecipsHold" id="forqcknotifppl" style="display: none;" id="qckNotifResp" >
                          </div>
                          <div class="qckPostSubmit" id="sendqcknot" onclick="sendnotification()" style="margin-top:0px;" >
                              Send Notification
                          </div>
                      </div>
                  </div>
          </div>
          </div>
          <div class="QuickPostHoldr" id="QuickMySpecial" style="display: none;" >
              <div class="QuickPostOut">
                  <div class="qckPostArr" style="border-left-color:silver" ></div>
                  <div class="QckPostIn">
                      <div class="qckPostTtl">Reach us<div class="quickPostClose" onclick="$(\'#QuickMySpecial\').fadeOut();">X</div> </div>  
                      <div class="qckPostCont">
                          <div class="qckSpTtl">Feedback / Suggestion / Report </div>
                          
                          <textarea id="thisismyft" placeholder="How can we help ?"></textarea>
                          <div class="qckSpCont">
                              If you want any special feature only for your account / page you can query here. 
                          </div>
                          <div class="qckPostSubmit" id="sendfdb" onclick="reachus(\'#thisismyft\')" style="margin-top:0px;" >
                              Submit
                          </div>
                      </div>
                  </div>
          </div>
          </div>
           <div class="Main_Notif_Float_Out" id="Main_Notif_Profile_Views" style="display: none;" >
                    
              <div class="MNF_In"  style="background-color:darkcyan;">
                 
                  <div class="MNF_Cont" id="Notif_ProfView_Cont" style="background-color: white"  >
                       
                     
                  </div>
              </div>
                <div class="MNF_Ttl" style="background-color: darkcyan;" >Profile Views<div class="NotifStatus">  &nbsp;<span id="tot_prof_view"></span><span style="float:right;margin-right:10px;" onclick="$(\'#Main_Notif_Profile_Views\').fadeOut()">X</span>  </div> </div>
               <div class="MNF_Arr" style="border-left-color:darkcyan;margin-top: 0px;" ></div> 
          </div>
           <div class="Main_Notif_Float_Out" id="Main_Notif_Security_Alert" style="display: none;" >
                    
              <div class="MNF_In"  style="background-color: khaki">
                 
                  <div class="MNF_Cont" id="Notif_SecAl_Cont" style="background-color: white"  >
                   
                  </div>
              </div>
                <div class="MNF_Ttl" style="background-color:khaki;color:black;" >Security Alerts<div class="NotifStatus" id="new_sec_alert_cnt"></div><span style="float:right;margin-right:10px;" onclick="$(\'#Main_Notif_Security_Alert\').fadeOut()">X</span> </div>
               <div class="MNF_Arr" style="border-left-color:khaki;margin-top: 0px;" ></div> 
          </div>
          <div class="NotifNotifHoldr">
                <div class="Main_Notif_Float_Out" id="Main_Notif_Rel_Req" style="display: none"  >
                    <div class="MNF_Arr" style="border-left-color: crimson" ></div>
                    <div class="MNF_In">
                        <div class="MNF_Ttl">Relation Requests <div class="NotifStatus"><span id="newrelsreqs"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:right;margin-left:100px;cursor:pointer;" onclick="$(\'#Main_Notif_Rel_Req\').fadeOut();">X</span> </div> </div>
                        <div class="MNF_Cont" id="relreq_cont">
                           
                        </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Msgs" style="display: none;margin-top: 40px;" >
                  <div class="MNF_Arr" style="border-left-color:navy"></div>
                  <div class="MNF_In" style="background-color: white;" >
                        <div class="MNF_Ttl" style="background-color: navy" >Messages<div class="NotifStatus" id="new_notif_cnt"><span style="text-align:right;margin-left:100px;cursor:pointer;" onclick="$(\'#Main_Notif_Msgs\').fadeOut();">X</span></div> </div>
                        <div class="MNF_Cont" id="Notif_Msg_Cont" >

                        </div>
                    </div>

                </div>
                <div class="Main_Notif_Float_Out" id="Main_Notif_Bulbs" style="display: none;margin-top:90px;margin-left: 90px;" >
                  <div class="MNF_Arr" style="border-left-color:green"></div>
                  <div class="MNF_In" style="background-color: green;">
                        <div class="MNF_Ttl" style="background-color: green" >Notifications &nbsp;&nbsp;&nbsp;&nbsp;<span style="text-align:right;margin-left:100px;cursor:pointer;" onclick="$(\'#Main_Notif_Bulbs\').fadeOut();">X</span><div class="NotifStatus" id="unreadnotif"> </div> </div>

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
          <div  id="Main_Notif_Propose"  style="display:none;">
               <div class="Main_Notif_Float_Out"  >
                    
                    <div class="MNF_In"  style="background-color: navy" >
                        <div class="MNF_Ttl" >Proposals <span style="float:right;margin-right:10px;" onclick="$(\'#Main_Notif_Propose\').fadeOut()">X</span><div class="NotifStatus" id="new_prps_alrt">  </div> </div>
                        <div class="MNF_Cont" id="forproposalsld">
                            <div class="MNF_Rel_Req_Itm" id="Notif17" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif17\').css({\'background-color\':\'white\'});" >
                                   <div class="Notif_Propose_unk">
                                        
                            </div>
                            <div class="MNF_Rel_Req_Itm" id="Notif187" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif187\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  Yogeshwaran  <span class="RelReqMyDet"> already proposed you secretly </span><div class="reqTime">1 Jun 2013</div> </div>
                                       
                                    </div>
                            </div>
                            <div class="MNF_Rel_Req_Itm" id="Notif182" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif182\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  Yogeshwaran  <span class="RelReqMyDet"> too proposed you secretly </span><div class="reqTime">1 Jun 2013</div> </div>
                                       
                                    </div>
                            </div>
                            <div class="MNF_Rel_Req_Itm" id="Notif181" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif181\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  Yogeshwaran  <span class="RelReqMyDet"> accepted your proposal </span><div class="reqTime">1 Jun 2013</div> </div>
                                       
                                    </div>
                            </div>
                            <div class="MNF_Rel_Req_Itm" id="Notif184" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif184\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  Yogeshwaran  <span class="RelReqMyDet">rejected your proposal </span><div class="reqTime">1 Jun 2013</div> </div>
                                       
                                    </div>
                            </div>
                            <!-- after 25 items put this
                           <div class="Notif_ShowMore">
                               Show More
                           </div>
                           -->
                            <div class="Notif_End">
                                End
                            </div>
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