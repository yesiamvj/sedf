<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
    $my_id=$_REQUEST['id'];
    $cnt=$_REQUEST['cnt'];
    $q="select c_name as c from contacts where cu_id=$my_id and user_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $c_nm=$row['c'];
        }
    }
     $q3="select p_pic as p from small_pics where user_id=$user_id";
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
echo'

      <div id="content-full">
          <div class="SedFedChatWindow">
              <div class="ChatWindMinIcon" style="display:none;" id="ChatIcon'.$cnt.'" onclick="$(\'#ChatWind'.$cnt.'\').slideDown();$(\'#ChatIcon'.$cnt.'\').hide();">
                          <img class="img_ChWin_BigIcon" src="profileimg.PNG" />
                      </div>
              <div class="ChatWindowHold" id="ChatWind'.$cnt.'" >
                  
                  <div class="ChatWindowOut">
                      
                      <div class="ChatWindTtl" style="background-color: crimson;"  >
                          <div class="ChWin_ChaterFace">
                              <img class="img_ChWin_ProfPic" src="'.$p_pic.'" />
                          </div>
                          <input type="hidden" id="myusrchk" />
                          <div class="ChWin_ChaterNme"  onclick="$(\'#ChatWind'.$cnt.'\').slideUp();$(\'#ChatIcon'.$cnt.'\').fadeIn();"><div>'.$c_nm.'</div>  <span id="for_chat_online_sts'.$my_id.'" style="display:none;"><div class="Ch_Usr_Sts" style="background-color: green" ></div></span> </div>
                          <div class="ChWin_Tools" style="background-color: crimson;" >
                              <div class="ChWin_Min" onclick="MinChatWindow(\'#ChatWind'.$cnt.'\')" title="Smaller" >_</div>
                              <div class="ChWin_Max" onclick="MaxChatWindow(\'#ChatWind'.$cnt.'\')" title="Larger" >+</div>
                                 
                              <div class="ChWin_Close" onclick="$(\'#on_live_convrse\').val(\'0\');$(\'.usrcw'.$my_id.'\').fadeOut();$(\'#myonusrcnt'.$cnt.'\').val(\'usrhidn'.$cnt.'\');">X<input type="hidden" id="chwnusrcnt" value="'.$cnt.'" /></div>
                          </div>
                      </div>
                      <div class="ChWinNewMsgOut" id="ChWinNMsgHold'.$cnt.'" >
                          <div class="ChWinNewMsgIn">
                              
                              <div class="CWNM_Cont">
                                  <textarea class="CWNM_InpTxt" id="CWNewMsgInpUsr'.$cnt.'" oninput="showtohim(\''.$my_id.'\',this.value)" onclick="chatWindMsgInp(\'#ChWinNMsgHold'.$cnt.'\',\'#CWNewMsgPreUsr'.$cnt.'\',\'#CWNewMsgUsr'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\',\'#CWNM_attchHold'.$cnt.'\')" onblur="chatWinInpBlur(\'#ChWinNMsgHold'.$cnt.'\',\'#CWNewMsgPreUsr'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\')" type="text" placeholder="Type your message" ></textarea>
                                  <div class="ChWinSendMsgBtn" title="Send Message" id="sendmsg'.$my_id.'" onclick="sendmessage(\''.$my_id.'\',\'#newMsgClrinp'.$cnt.'\',\'#newMsgBGClrinp'.$cnt.'\',\'#msginpfile'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\')"></div>
                                  
                              </div>
                              <div class="CWNM_Attach" id="CWNM_attchHold'.$cnt.'" style="display: none;" >
                              <div class="CWNM_AttachItm">
                                  <img  src="icons/chooseColor.png" onclick="$(\'#newMsgClrinp'.$cnt.'\').click()" title="Choose a color for your message" />
                                   <input type="color" id="newMsgClrinp'.$cnt.'" style="background-color:transparent;border:0px;width:0px;height:0px;" value="#000077" onchange="newMsgClr(this.value,1,\''.$my_id.'\')" />
                              </div>
                                   <div class="CWNM_AttachItm" >
                                       <div class="CWNM_AtchBG" id="newMsgBGhold'.$cnt.'" onclick="$(\'#newMsgBGClrinp'.$cnt.'\').click()" title="Background color for your message" ></div>
                                        <input type="color" id="newMsgBGClrinp'.$cnt.'" style="background-color:transparent;border:0px;width:0px;height:0px;" onchange="newMsgClr(this.value,2,\''.$my_id.'\')" value="#ffffff" />
                                   </div>
                                   <input type="hidden" value="1" id="totsmlcnt'.$my_id.'"/>
                                  <div class="CWNM_AttachItm" title="Add Smiley">
                                       <img  src="icons/test-smiley.png" onclick="showSmiley(\'#smileyWindow'.$cnt.'\')" />
                                   </div>

                                  
                                     <div class="smileyHold" id="smileyWindow'.$cnt.'"  style="display: none" >
                                            <div class="smileyArr"></div>
                                            <div class="smileyContOut">
                                                <div class="smileyContIn">
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Smile Face.png\',\'Cute\')" >
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Smile Face.png"  alt="Cute" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Cute
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Smile.png\',\'Smile\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Smile.png" alt="Smile" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Happy.png\',\'Happy\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Happy.png" alt="Happy" />
                                                        </div>
                                                        <div class="smileyNme">
                                                           Happy
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Laughing.png\',\'Laughing\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Laughing.png" alt="Laughing" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Laughing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Cool.png\',\'Cool\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/cutey/Cool.png" alt="Cool" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Cool
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Nerd.png\',\'Nerd\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Nerd.png" alt="Nerd" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Nerd
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Winking.png\',\'Winking\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Winking.png" alt="Winking" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Winking
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Blushing.png\',\'Blushing\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Blushing.png" alt="Blushing" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Blushing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Surprised.png\',\'Surprised\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Surprised.png" alt="Surprised" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Surprised
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Angry.png\',\'Angry\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Angry.png" alt="Angry" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Angry
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/tongue.png\',\'Tongue\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/tongue.png" alt="Tongue" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Tongue
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Sick.png\',\'Sick\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/cutey/Sick.png" alt="Sick" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Sick
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Sad.png\',\'Sad\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Sad.png" alt="Sad" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Sad
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'cutey/Crying.png\',\'Crying\')">
                                                        <div class="smileyImg">
                                                            <img class="ico_smiley" src="icons/smileys/cutey/Crying.png" alt="Cry" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Crying
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="$(\'#smile_blacks\').slideToggle()" >
                                                        <div class="moreSmiley">
                                                            +
                                                        </div>
                                                        <div class="smileyNme">
                                                            More
                                                        </div>
                                                    </div>
                                                    <div class="blackSmiley"  id="smile_blacks" style="display: none;" >
                                                         <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/amazing.png\',\'amazing\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/amazing.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Amazing
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/anger.png\',\'anger\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/anger.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Anger
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/bad_egg.png\',\'bad_egg\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/bad_egg.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Bad Egg
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/bad_smile.png\',\'bad_smile\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/bad_smile.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Bad Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/beaten.png\',\'beaten\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/beaten.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                            Beaten
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/big_smile.png\',\'big_smile\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/big_smile.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Smile
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/black_heart.png\',\'black heart\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/black_heart.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Heart
                                                        </div>
                                                    </div>
                                                    <div class="smileyItm" onclick="addSmiley(\''.$my_id.'\',\''.$cnt.'\',\'blacks/electric_shock.png\',\'electric shock\')">
                                                        <div class="smileyImg">
                                                             <img class="ico_smiley" src="icons/smileys/blacks/electric_shock.png" />
                                                        </div>
                                                        <div class="smileyNme">
                                                             Shock
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                                       <form method="post"  style="display:none;"><input onchange="putfile_value(\''.$cnt.'\',\''.$my_id.'\')" type="file" multiple id="msginpfile'.$cnt.'" style="display:none;" /></form>
                                  <div class="CWNM_AttachItm" title="Add Any File">
                                       <img  src="icons/msg_atch.png" onclick="$(\'#msginpfile'.$cnt.'\').click();"/>
                                       
                                   </div>
                                     <div class="CWNM_AtchClose" onclick="$(\'#CWNM_attchHold'.$cnt.'\').slideUp();" >
                                     X 
                                   </div>
                                
                              </div>
                          </div>
                         
                      </div>
                      
                  </div>
                  <div id="newsmileys'.$my_id.'">
                                          
                                  </div>
                  <div class="ChWinConvHoldr" id="full_conv_hold'.$my_id.'" >
                      <!-- new message Preview -->';
                        echo'<div class="CW_Conv_InHold" style="display:none;" id="hiscurtype'.$my_id.'">
                              <div class="CW_Conv_InArr" style="border-right-color:white"></div>
                              <div class="CW_Conv_InCont" style="background-color:white">
                                  <div class="CW_ConvMsgTxt" style="color: navy;" id="hiscurtyped'.$my_id.'"></div>


                                  <div class="CW_ConvMsgFile" >
                                     
                                  </div>
                                  
                              </div>
                              <div class="CW_Conv_MsgTimeIn">typing... </div>
                              
                          </div>
                          

  <div class="CW_Conv_OutHold" id="CWNewMsgPreUsr'.$cnt.'" style="display: none;" >
                              <div class="CW_Conv_OutArr" id="newMsgArws'.$my_id.'"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBGv'.$my_id.'">
                                  <div class="CW_ConvMsgTxt" id="mymsgcont'.$my_id.'"  >
                                      
                                  </div>
                                  <div class="CW_ConvMsgMedia" id="newMsgMedia1" >
                                       <div class="CW_MMed_Itm" id="my_add_smily'.$my_id.'">
                                      </div>
                                  </div>
                                  
                                  </div>
                                  
                              </div> <br/>
                              <div class="convMsgOutDets" id="conv_tot_hold'.$my_id.'">
                                  
                                  </div>
                         
                         
';
echo'<div id="forliveconv'.$my_id.'"></div>';
  echo'<input type="hidden" value="'.$my_id.'" id="whoislive'.$my_id.'">
  <script type="text/javascript">
     
     setInterval(function(){ 
var id=$("#whoislive'.$my_id.'").val();
    var chkvl=$("#on_live_convrse").val();
    if(chkvl=="0")
    {
    }else
    {
    
   var cont="q="+'.$my_id.'+"&cnt="+3;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#forliveconv'.$my_id.'").prepend(xmlhttp.responseText);
                
            
            }
        }
        xmlhttp.open("post", "liveconvrs.php?"+cont, true);
        xmlhttp.send(); 
    }


      }, 2000);

 setInterval(function(){ 
var id=$("#whoislive'.$my_id.'").val();

whathetyped(id);

      }, 1000);

            </script>
            ';
                      $q="SELECT user_id as u,msg as m,time as t,msg_id as mid,msg_file as mf,msg_clr as clr,bg_color as bgc,day as d,senter_seen as sns from messages where (user_id=$user_id or user_id=$my_id) and (sender_id=$user_id or sender_id=$my_id) and senter_seen!=$user_id and user_id!=sender_id order by msg_id desc limit 10";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                        if(mysqli_num_rows($r)>0)
                        {
                          $m=1;
                          while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                          {
                            $m=$m+1;
                            $day=$row['d'];
                            if($m>2)
                            {
                                if($predate!=$day)
                                {
                                    echo' <div class="CW_ConvDate"> '.$day.'</div>';
                                }
                            }
                            
                              $predate=$day;
                            $uid=$row['u'];
                            $senter_seen=$row['sns'];
                            $msg=$row['m'];
                            $time=$row['t'];
                            $msgcolor=$row['clr'];
                            $bgclr=$row['bgc'];
                            $msg_id=$row['mid'];
                             if($m!==2)
                            {
                                $time="";
                            }
                            $msg_file=$row['mf'];
                            if($uid==$user_id)
                            {
                              echo'<div class="CW_Conv_OutHold"  id="CWNewMsgPreUse'.$msg_id.'"  >
                              <div class="CW_Conv_OutArr" style="border-left-color:'.$bgclr.';" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBG" style="background-color:'.$bgclr.';">
                                  <div class="CW_ConvMsgTxt"   >
                                      <font color="'.$msgcolor.'">'.$msg.'</font>
                                  </div>
                                  <div class="CW_ConvMsgMedia" id="newMsgMedia" >
                                       <div class="CW_MMed_Itm">
                                         ';
                                        $qw="select msg_file as f from msg_files where msg_id=$msg_id";
                                 $rw=mysqli_query($dbc,$qw);
                                 if($rw)
                                 {
                                     if(mysqli_num_rows($rw)>0)
                                     {
                                         while($rf=  mysqli_fetch_array($rw))
                                         {
                                                $file_name1=$rf['f'];
                                             $msg_file=$file_name1;
                                         
                                           
                                             $cut=strpos($file_name1,"messages")+10;
                                             if(strlen($file_name1)>10)
                                             {
                                                 $file_name1=substr($file_name1,$cut,strlen($file_name1));
                                               
                                                 $file_name1="$file_name1...";
                                             }else
                                             {
                                                 
                                              $file_name1=substr($file_name1,($cut+10),strlen($file_name1));
                                             }
                                            
                                          if(!empty($file_name1))
                                         {
                                                  echo'<a href="'.$msg_file.'" download="sedfed/'.$msg_file.'"><div>';
                                      
                                         $f1_format=substr($msg_file,strlen($msg_file)-3,strlen($msg_file));
                                         $f2_m=substr($msg_file,strlen($msg_file)-4,strlen($msg_file));
                                    $emp=0;
                                        if($f2_m=="jpeg" || $f1_format=="jpg" || $f1_format=="png" || $f1_format=="gif" || $f1_format=="ico")
                                        {
                                          $emp=1;
                                          echo'<img class="img_ConvMsgMedia" alt="'.$msg_file.'" src="'.$msg_file.'" />';
                                        }


                                        if($f1_format==="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                        {
                                          $emp=2;
                                            echo'<video src="'.$msg_file.'" class="img_ConvMsgMedia" controls></video>';
                                       
                                        }

                                        if($f1_format=="mp3" || $f1_format=="mid" || $f1_format=="wav")
                                        {
                                            $emp=3;
                                           echo'<audio autoplay src="'.$msg_file.'" class="img_ConvMsgMedia" controls></audio>';
                                       
                                        }
                                         
                                         if($emp!==1 && $emp!==2 && $emp!==3)
                                         {
                                          echo'<div class="CW_ConvMsgFile">'.$msg_file.'</div>';
                                         }
                                             echo'</div></a>';
                                         }else
                                         {
                                          }
                                         
                                          
                                         }
                                     }
                                 }
                                         
                                       
                                          echo'
                                      </div>
                                      <div>';
                                      $q1="select smiley as m from msg_smiley where msg_id=$msg_id";
                                      $r1=mysqli_query($dbc,$q1);
                                      if($r1){
                                        if(mysqli_num_rows($r1)>0)
                                        {
                                          while($rows=mysqli_fetch_array($r1,MYSQLI_ASSOC))
                                          {
                                            $sml=$rows['m'];
                                            echo'<img src="'.$sml.'" alt="'.$sml.'" width="25" height="25"  />';
                                          }
                                        }
                                      }
                                      

                                        echo'</div>
                                      
                                  </div>
                                  <div  class="CW_ConvMsgFile">    
                                  </div>
                                  
                              </div> <br/>
                              <div class="convMsgOutDets">
                                      <div class="convMsgOutSeen">
                                         ';
                                             if($senter_seen==$my_id){
                                        echo'<img class="CW_ConvMsgIcos'.$my_id.'" style="width:15px;float:left;"  width="15" height="15" src="icons/msg_notseen.png" />';
                                         echo '<span id="for_delt_msg'.$msg_id.'" class="for_delt_msgs"><span id="dlt_this'.$msg_id.'" onclick="deletemsg(\''.$msg_id.'\',\'#CWNewMsgPreUse'.$msg_id.'\')" style="cursor:pointer; ">&nbsp;&nbsp;&nbsp;Delete</span></span>';
                                       
                                      }else
                                      {
                                        echo'<img class="CW_ConvMsgIcos'.$my_id.'" width="15" height="15" style="width:15px;float:left;" src="icons/chatwin/msg_seen.png" />';
                                      }
                                         echo'
                                      </div>
                                      <div class="CW_Conv_MsgTimeOut"> '.$time.' </div>
                                  </div>
                          </div>
';
                            }else
                            {
                              echo' <div class="CW_Conv_InHold">
                              <div class="CW_Conv_InArr" style="border-right-color:'.$bgclr.'"></div>
                              <div class="CW_Conv_InCont" style="background-color:'.$bgclr.'">
                                  <div class="CW_ConvMsgTxt" style="color:'.$msgcolor.'" >'.$msg.'</div>
                                  <div class="CW_ConvMsgMedia">
                                          
                                  </div>
                                  <div class="CW_ConvMsgFile">
                                       <div class="CW_MMed_Itm">
                                         ';
                                         $qw="select msg_file as f from msg_files where msg_id=$msg_id";
                                 $rw=mysqli_query($dbc,$qw);
                                 if($rw)
                                 {
                                     if(mysqli_num_rows($rw)>0)
                                     {
                                         while($rf=  mysqli_fetch_array($rw))
                                         {
                                                $file_name1=$rf['f'];
                                             $msg_file=$file_name1;
                                         
                                           
                                             $cut=strpos($file_name1,"messages")+10;
                                             if(strlen($file_name1)>10)
                                             {
                                                 $file_name1=substr($file_name1,$cut,strlen($file_name1));
                                               
                                                 $file_name1="$file_name1...";
                                             }else
                                             {
                                                 
                                              $file_name1=substr($file_name1,($cut+10),strlen($file_name1));
                                             }
                                            
                                          if(!empty($file_name1))
                                         {
                                                  echo'<a href="'.$msg_file.'" download="sedfed/'.$msg_file.'"><div>';
                                      
                                         $f1_format=substr($msg_file,strlen($msg_file)-3,strlen($msg_file));
                                         $f2_m=substr($msg_file,strlen($msg_file)-4,strlen($msg_file));
                                    $emp=0;
                                        if($f2_m=="jpeg" || $f1_format=="jpg" || $f1_format=="png" || $f1_format=="gif" || $f1_format=="ico")
                                        {
                                          $emp=1;
                                          echo'<img class="img_ConvMsgMedia" alt="'.$msg_file.'" src="'.$msg_file.'" />';
                                        }


                                        if($f1_format==="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                        {
                                          $emp=2;
                                            echo'<video src="'.$msg_file.'" class="img_ConvMsgMedia" controls></video>';
                                       
                                        }

                                        if($f1_format=="mp3" || $f1_format=="mid" || $f1_format=="wav")
                                        {
                                            $emp=3;
                                           echo'<audio autoplay src="'.$msg_file.'" class="img_ConvMsgMedia" controls></audio>';
                                       
                                        }
                                         
                                         if($emp!==1 && $emp!==2 && $emp!==3)
                                         {
                                          echo'<div class="CW_ConvMsgFile">'.$msg_file.'</div>';
                                         }
                                             echo'</div></a>';
                                         }else
                                         {
                                          }
                                         
                                          
                                         }
                                     }
                                 }
                                         
                                       
                                          echo'
                                      </div>
                                      <div>';
                                      $q1="select smiley as m from msg_smiley where msg_id=$msg_id";
                                      $r1=mysqli_query($dbc,$q1);
                                      if($r1){
                                        if(mysqli_num_rows($r1)>0)
                                        {
                                          while($rows=mysqli_fetch_array($r1,MYSQLI_ASSOC))
                                          {
                                            $sml=$rows['m'];
                                            echo'<img src="'.$sml.'" alt="'.$sml.'" width="25" height="25"  />';
                                          }
                                        }
                                      }
                                      

                                        echo'</div>
                                  </div>
                                  
                              </div>
                              <div class="CW_Conv_MsgTimeIn"> '.$time.' </div>
                              
                          </div>';
                            }

                             
                            
                          }
                          
                       
                          
                        }
                        
                       
                      }
           
                           
                          echo'
                         
                          
                          
                       
                      </div>
              </div>
             
          </div>
      </div>
 
';
                          
                        if(mysqli_num_rows($r)<10)
                        {
                            
                        }else
                        {
                            echo'<div id="for_rmv_dh_mr_msgs'.$my_id.'" ><div style="text-align:center;cursor:pointer;" onclick="showpre_msgs(\''.$msg_id.'\',\''.$my_id.'\')">Show Previous Messages</div></div>';
                        }
                        
                        echo'<div id="for_pre_imgs_m" style="width:0px;height:0px;"></div><input type="hidden" id="after_mycom_imgs_msg" value="" />';
}
?>