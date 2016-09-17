<!DOCTYPE html>
<html>
<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      include 'title_bar.php';
       $q1="SELECT msgSet_Id as settingsId FROM `settings_messages` WHERE `user_id` = $user_id ORDER BY `settings_messages`.`msgSet_Id` DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
            
                    $q2="SELECT msgAllowFrom as msgAllowFrom, secretMsgAllow as secretMsgAllow, msgNotifAnim as msgNotifAnim, msgPopUp as msgPopUp, msgTone as msgTone,whoseMsgTone as whoseMsgTone, liveTyping as liveTyping FROM `settings_messages` WHERE msgSet_Id = $setId AND user_id= $user_id;";
                    $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        $rowre= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                        $msgAllowFrom=$rowre['msgAllowFrom'];
                        $secretMsgAllow=$rowre['secretMsgAllow'];
                        $msgNotifAnim=$rowre['msgNotifAnim'];
                        $msgPopUp=$rowre['msgPopUp'];
                        $msgTone=$rowre['msgTone'];
                        $whoseMsgTone=$rowre['whoseMsgTone'];
                        $liveTyping=$rowre['liveTyping'];
                switch ($secretMsgAllow){
                 case 0:
                     $secretMsgAllow='Deny';
                     $secretMsgAllow0='selected';
                     $secretMsgAllow1='';
                     break;
                 case 1:
                     $secretMsgAllow='Allow';
                     $secretMsgAllow0='';
                     $secretMsgAllow1='selected';
                     break;
                
          }
          switch ($msgAllowFrom){
              case 1:
                  $msgAllowFrom='Relations';
                  $msgAllowFrom1='selected';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='';
                  break;
              case 2:
                  $msgAllowFrom='Relations of Relations';
                  $msgAllowFrom1='';
                  $msgAllowFrom2='selected';
                  $msgAllowFrom3='';
                  break;  
              case 3:
                  $msgAllowFrom='Anyone';
                  $msgAllowFrom1='';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='selected';
                  break;  
              
          }
          switch ($whoseMsgTone){
              case 10:
                  $whoseMsgTone='Silent';
                  $whoseMsgTone0='selected';
                  $whoseMsgTone1='';
                  $whoseMsgTone2='';
                  $whoseMsgTone3='';
              case 1:
                  $whoseMsgTone='Default : Water drop';
                   $whoseMsgTone0='';
                  $whoseMsgTone1='selected';
                  $whoseMsgTone2='';
                  $whoseMsgTone3='';
                  break;
              case 2:
                  $whoseMsgTone='My Alert Tone';
                   $whoseMsgTone0='';
                  $whoseMsgTone1='';
                  $whoseMsgTone2='selected';
                  $whoseMsgTone3='';
                  break;   
              case 3:
                  $whoseMsgTone='Sender\'s Alert Tone';
                   $whoseMsgTone0='';
                  $whoseMsgTone1='';
                  $whoseMsgTone2='';
                  $whoseMsgTone3='selected';
                  break;   
          }
          
         // $liveTyping=$liveTyping.toString();
          switch ($liveTyping){
              case 0:
                  $liveTyping='Deny';
                  $liveTyping0='selected';
                  $liveTyping1='';
                  break;
              case 1:
                  $liveTyping='Allow';
                  $liveTyping0='';
                  $liveTyping1='Selected';
                  break;
             
          }
          
          if($msgNotifAnim==0){
              $msgNotifAnim='';
          }
          else{
              $msgNotifAnim='checked';
          }
          if($msgTone==0){
              $msgTone='';
          }
          else{
              $msgTone='checked';
          }
          if($msgPopUp==0){
              $msgPopUp='';
          }
          else{
              $msgPopUp='checked';
          }
               
          echo '<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="lin.css"/>
    <link rel="stylesheet" href="mainBar.css"/>
    <link rel="stylesheet" href="set_profile.css"/>
   <script src="angular.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
          
          <div class="SedFed_SubTitle">
              <div class="Subtitle_Text">Message Settings</div>   
          </div>
              <div class="PageInnerContent">
                  <form method="get" action="process_set_msg.php"  id="MsgSetFormHold" name="MsgSetForm" > 
                      
                  
                  <div class="PageInnerTitle">Settings will be Applied to You & Receiver / Sender</div>
               <!--   <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Secret Messages</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">People can message me without including their Names</div>
                          <div class="SPI_SubItm">
                              <select name="secretMsgAllow" >
                                  <option value="1" '.$secretMsgAllow1.' >Allow</option>
                                  <option value="0" '.$secretMsgAllow0.'>Deny</option>
                              </select>
                          </div>  
                          <div class="CurSetItm">
                              Current : <span class="CurSetItmAns">'.$secretMsgAllow.'</span>
                          </div>
                          
                      </div>
                  </div> -->
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Message Senders </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Receive Messages from</div>
                          <div class="SPI_SubItm">
                              <select name="msgAllowFrom">
                                  <option value="3" '.$msgAllowFrom3.'>AnyOne</option>
                                  <option value="1" '.$msgAllowFrom1.'>Relations</option>
                                  <option value="2" '.$msgAllowFrom2.' >Relations of Relations</option>
                              </select>
                          </div>
                            <div class="CurSetItm">
                              Current : <span class="CurSetItmAns">'.$msgAllowFrom.'</span>
                          </div>
                           
                      </div>
                  </div>
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl"> Message Notification </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">On a new Incoming message</div>
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="msgNotifAnim" '.$msgNotifAnim.'  />Notification</div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="msgPopUp" '.$msgPopUp.'/>Pop Up window</div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="msgTone" '.$msgTone.' /> Alert Tone </div>  
                           
                      </div>
                      
                  </div>
                  
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Message Alert</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Play this music when New incoming message to me & Receiver</div>
                          <select name="whoseMsgTone">
                              <option value="1" '.$whoseMsgTone1.' >Default : Water drop</option>
                              <option value="2" '.$whoseMsgTone2.' >My Alert Tone</option>
                              <option value="3" '.$whoseMsgTone3.'>Sender\'s Alert Tone</option>
                              <option value="10" '.$whoseMsgTone0.'>Silent</option>
                              </select>
                          <div class="SPI_SubItm">
                              <div class="SPI_chngeBtns"> Change Alert Tone </div> 
                              <div class="SPI_curItms">Current : Double Water drops</div>
                              <div class="SPI_PlayBgm"></div>
                          </div>  
                           
                      </div>
                        <div class="CurSetItm">
                              Current : <span class="CurSetItmAns">'.$whoseMsgTone.'</span>
                          </div>
                  </div>
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Live Typing</div>
                      <div class="SPI_Tip"> Show text to Sender live while typing Messages</div>
                      <div class="Set_Prof_ItmAnsHold">
                         
                          <div class="SPI_SubItm">
                              <div class="SPI_SubItm"> 
                                  <select name="liveTyping">
                                      <option value="1" '.$liveTyping1.'>Allow</option>
                                      <option value="0" '.$liveTyping0.'>Deny</option>
                                  </select>
                              </div>  
                          </div>  
                          
                           
                      </div>
                   <div class="CurSetItm">
                              Current : <span class="CurSetItmAns">'.$liveTyping.'</span>
                          </div>
                 
                 <br/><br/>
                 
                  </div>
                  </form>
                  <div id="SPSet_Proceed" onclick="$(\'#MsgSetFormHold\').submit()" >
                     Update My Settings
                 </div>
                 
              </div>
          
      </div>
  </body>
</html>
';
          
          
          
                    }
                    else
                    {
                        echo "update not success";
                        echo mysqli_error($dbc);
                    }
         }
         else{
             $q3="INSERT INTO `settings_messages` (`msgSet_Id`, `msgAllowFrom`, `secretMsgAllow`, `msgNotifAnim`, `msgPopUp`, `msgTone`, `msgAlertToneFile`, `whoseMsgTone`, `liveTyping`, `user_id`) VALUES (NULL, '2', '0', '1', '1', '1', NULL, '1', '1', '$user_id');";
             $r3=  mysqli_query($dbc,$q3);
             if($r3){
                 header("location:set_messages.php");
             }
             else{
                 echo 'New Setting Id Can\'t be Creatd';
                 echo mysqli_error($dbc);
                 echo $q3;
             }
             
         }
         
     }
     else{
         echo 'r1 not run.';
     }
     
                
       
          
          
          
      
     
 }
 ?>
</html>