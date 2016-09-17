<?php // session_commit();
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
      
   <script src="taskbar.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="fullPageContainer">
         
          <div class="taskbarHold">
                
                     
              <div class="taskbarIn">
                
                  
                     
                  </div>
                 
                  <input type="hidden" id="chkalrdclkd" value="1" />
                 
                      <div class="tb_TbItm"   onmouseover="setTbTTip(event,\'Quick Post\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div class="tb_Tb_Icon">
                              <img  class="tb_newIcos" onclick="$(\'#QuickPost\').fadeToggle();" src="icons/taskbar/newAdvPost.png"  alt="Quick Post" style="max-height: 23px;margin-left: 14px;" /> 
                          </div>
                      </div>
                      <div class="tb_notifItm"  onmouseover="setTbTTip(event,\'New Message\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="new_CustmNotifMsg" onclick="$(\'#QuickMsg\').fadeToggle();" >
                             <div id="new_Notif_MsgArr"></div>
                              <div id="new_Notif_MsgCont">
                                  <div id="Notif_MsgIn">
                                       +
                                  </div>
                                  
                              </div>
                          </div>        
                      </div>
                      <div class="tb_TbItm"  onmouseover="setTbTTip(event,\'New Notification\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div class="tb_Tb_Icon" onclick="$(\'#QuickNotif\').fadeToggle();" >
                               <span class="tb_n_plus"  >+</span>
                              <img  class="tb_newIcos"  src="icons/taskbar/notifBulb.png"  alt="New Notif" style="max-height: 45px;margin-left:3px" />
                          </div>
                      </div>
                      <div class="tb_TbItm"  onmouseover="setTbTTip(event,\' My feature\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div class="tb_Tb_Icon">
                               
                              <img  class="tb_newIcos" onclick="$(\'#QuickMySpecial\').fadeToggle()" src="icons/taskbar/notif_giftbox.png" alt="Feedback" style="max-height: 23px;margin-left:14px" />
                          </div>
                      </div>
                       <a href="create_grp_page.php"> 
                      <div class="tb_notifItm"  onmouseover="setTbTTip(event,\' Security Alerts\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" src="icons/taskbar/cr_grp.png" alt="Security" style="max-height: 28px;margin-top:-7px;" />
                               <div class="tb_ico_Count">
                              
                          </div>
                         
                          </div>
                         
                      </div>
                      </a>
                       <a href="createpage.php"> 
                      <div class="tb_notifItm"  onmouseover="setTbTTip(event,\' Security Alerts\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" src="icons/last_edit.png" alt="Security" style="max-height: 28px;margin-top:-7px;margin-left:5px;" />
                               <div class="tb_ico_Count">
                              
                          </div>
                         
                          </div>
                         </a>
                         </div>
                      <div class="tb_notifItm" style="//margin-top: 20px;" onmouseover="setTbTTip(event,\' Profile Views\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" onclick="profileviews()"  src="icons/taskbar/off-prof_seen.png" alt="Profile Views" style="max-height: 27px;margin-left: 2px;" />
                               <div class="tb_ico_Count">
                              
                          </div>
                         
                          </div>
                         
                      </div>
                                            <div class="tb_notifItm"  onmouseover="setTbTTip(event,\' Security Alerts\')" onmouseout="$(\'#TaskBTt\').hide()">
                          <div id="NotifProfVw">
                              <img class="ico_tb_notif" onclick="shoesecalert()" src="icons/taskbar/off-notif_Secure.png" alt="Security" style="max-height: 28px;margin-top:-7px;" />
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
                              To <input  type="text" placeholder="Recipient Name" onclick="add_qck_msg_ppl();$(\'#forqcmsgval\').val(\'10\');" style="width: 200px;" />
                              <input type="checkbox" id="allrelqc"/> All Relations
                              <div class="qckspNo" onclick="$(\'#qckMsgResp\').slideToggle();" > <div class="qckRspArr"></div> </div>
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
                              To <input  type="text" onclick="add_qck_msg_ppl(); $(\'#forqcknotifval\').val(\'11\');" id="qcknotifcont" placeholder="Recipient Name" style="width: 200px;" />
                              <input type="checkbox" id="allrelnotif"/> All Relations
                              <div class="qckspNo" onclick="$(\'#qckNotifResp\').slideToggle();" >  <div class="qckRspArr"></div> </div>
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
                <div class="MNF_Ttl" style="background-color: darkcyan;" >Profile Views<div class="NotifStatus">  &nbsp;<span id="tot_prof_view"></span><span style="float:right;margin-right:10px;cursor:pointer;" onclick="$(\'#Main_Notif_Profile_Views\').fadeOut()">X</span>  </div> </div>
               <div class="MNF_Arr" style="border-left-color:darkcyan;margin-top: 0px;" ></div> 
          </div>
           <div class="Main_Notif_Float_Out" id="Main_Notif_Security_Alert" style="display: none;" >
                    
              <div class="MNF_In"  style="background-color: khaki">
                 
                  <div class="MNF_Cont" id="Notif_SecAl_Cont" style="background-color: white"  >
                   
                  </div>
              </div>
                <div class="MNF_Ttl" style="background-color:khaki;color:black;" >Security Alerts<div class="NotifStatus" id="new_sec_alert_cnt"></div><span style="float:right;margin-right:10px;cursor:pointer;" onclick="$(\'#Main_Notif_Security_Alert\').fadeOut()">X</span> </div>
               <div class="MNF_Arr" style="border-left-color:khaki;margin-top: 0px;" ></div> 
          </div>
         
              
        
          </div>
          <div  id="Main_Notif_Propose"  style="display:none;">
               <div class="Main_Notif_Float_Out"  >
                    
                    <div class="MNF_In"  style="background-color: navy" >
                        <div class="MNF_Ttl" >Proposals <span style="float:right;margin-right:10px;cursor:pointer;" onclick="$(\'#Main_Notif_Propose\').fadeOut()">X</span><div class="NotifStatus" id="new_prps_alrt">  </div> </div>
                        <div class="MNF_Cont" id="forproposalsld">
                           
                            
                           
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