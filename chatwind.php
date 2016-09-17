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
    $q="select user_id as u users where user_id=$my_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 
           }else
           {
	 echo '<script>window.location.href=\'../web/index.php\'</script>';
           }
    }
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
    
	            $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$my_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	      $roed=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	      $theme=$roed['thm'];
	      $theme_txt_color=$roed['theme_txt_color'];
	 }else
	 {
	        $theme="#008b8b";
	        $theme_txt_color="#ffffff";
	        
	        
	 }
	       
           }
    $quq="select username as u from users where user_id=$my_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                      
               
                 
echo'
    

      <div id="content-full">
          <div class="SedFedChatWindow">
              <div class="ChatWindMinIcon" style="display:none;" id="ChatIcon'.$cnt.'" onclick="$(\'#ChatWind'.$cnt.'\').slideDown();$(\'#ChatIcon'.$cnt.'\').hide();">
                          <img class="img_ChWin_BigIcon" src="'.$p_pic.'" />
                      </div>
              <div class="ChatWindowHold" id="ChatWind'.$cnt.'" >
                  
                  <div class="ChatWindowOut">
                      
                      <div class="ChatWindTtl" style="background-color: '.$theme.'"  >
                          <div class="ChWin_ChaterFace">
                              <img class="img_ChWin_ProfPic" src="'.$p_pic.'" />
                          </div>
	         
                          <input type="hidden" id="on_lives_convrse'.$my_id.'" />
                          <div class="ChWin_ChaterNme"  onclick="$(\'#ChatWind'.$cnt.'\').slideUp();$(\'#ChatIcon'.$cnt.'\').fadeIn();"><div>'.$c_nm.'</div>  <span id="for_chat_online_sts'.$my_id.'" style="display:none;"><div class="Ch_Usr_Sts" style="background-color: green" ></div></span> </div>
                          <div class="ChWin_Tools" style="background-color: '.$theme.'" >
                              <div class="ChWin_Min" onclick="MinChatWindow(\'#ChatWind'.$cnt.'\')" title="Smaller" >_</div>
                              <div class="ChWin_Max" onclick="MaxChatWindow(\'#ChatWind'.$cnt.'\')" title="Larger" >+</div>
                                 
                              <div class="ChWin_Close" onclick="$(\'#on_lives_convrse'.$my_id.'\').val(\'0\');$(\'#usrcw'.$my_id.'\').fadeOut();$(\'#myonusrcnt'.$cnt.'\').val(\'usrhidn'.$cnt.'\');">X<input type="hidden" id="chwnusrcnt" value="'.$cnt.'" /></div>
                          </div>
                      </div>
                      <input type="hidden" value="0" id="sml_load'.$my_id.'" />
                      <div class="ChWinNewMsgOut" id="ChWinNMsgHold'.$cnt.'" >
                          <div class="ChWinNewMsgIn">
                              
                              <div class="CWNM_Cont">
                                  <textarea class="CWNM_InpTxt"    id="CWNewMsgInpUsr'.$cnt.'" oninput="showtohim(\''.$my_id.'\',this.value)" onclick="chatWindMsgInp(\'#ChWinNMsgHold'.$cnt.'\',\'#CWNewMsgPreUsr'.$cnt.'\',\'#CWNewMsgUsr'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\',\'#CWNM_attchHold'.$cnt.'\')" onblur="chatWinInpBlur(\'#ChWinNMsgHold'.$cnt.'\',\'#CWNewMsgPreUsr'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\')" type="text" placeholder="Type your message" ></textarea>
                                  
                                  
                              </div>
                              <div class="CWNM_Attach" id="CWNM_attchHold'.$cnt.'" style="display: none;" >
                              <div class="CWNM_AttachItm">
                                  <img  src="../web/icons/chooseColor.png" onclick="$(\'#newMsgClrinp'.$cnt.'\').click()" title="Choose a color for your message" />
                                   <input type="color" id="newMsgClrinp'.$cnt.'" style="background-color:transparent;border:0px;width:0px;height:0px;" value="#000077" onchange="newMsgClr(this.value,1,\''.$my_id.'\')" />
                              </div>
                                   <div class="CWNM_AttachItm" >
                                       <div class="CWNM_AtchBG" id="newMsgBGhold'.$cnt.'" onclick="$(\'#newMsgBGClrinp'.$cnt.'\').click()" title="Background color for your message" ></div>
                                        <input type="color" id="newMsgBGClrinp'.$cnt.'" style="background-color:transparent;border:0px;width:0px;height:0px;" onchange="newMsgClr(this.value,2,\''.$my_id.'\')" value="#ffffff" />
                                   </div>
                                   <input type="hidden" value="1" id="totsmlcnt'.$my_id.'"/>
                                  <div class="CWNM_AttachItm" title="Add Smiley">
                                       <img  src="../web/icons/test-smiley.png" onblur="$(\'#for_load_smileys'.$my_id.'\').fadeOut();" onclick="open_msg_smiley('.$cnt.','.$my_id.')" />
                                   </div>
                                  
                               
                                        
                                                       <form method="post"  style="display:none;"><input onchange="putfile_value(\''.$cnt.'\',\''.$my_id.'\',this)" type="file" multiple id="msginpfile'.$cnt.'" style="display:none;" /></form>
                                  <div class="CWNM_AttachItm" title="Add Any File">
                                       <img  src="../web/icons/msg_atch.png" onclick="$(\'#msginpfile'.$cnt.'\').click();"/>
                                       
                                   </div>
                                 
                                    <div class="CMNM_AttachItm">
                                   <div class="ChWinSendMsgBtn" title="Send Message" id="sendmsg'.$my_id.'" onclick="sendmessage(\''.$my_id.'\',\'#newMsgClrinp'.$cnt.'\',\'#newMsgBGClrinp'.$cnt.'\',\'#msginpfile'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\')"></div>
                                   </div>
                              </div>
                               <div id="for_load_smileys'.$my_id.'"></div>
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
     function my_chat_user'.$my_id.'()
            {

            var id=$("#whoislive'.$my_id.'").val();
    var chkvl=$("#on_lives_convrse'.$my_id.'").val();
    if(chkvl=="0")
    {
 
    }else
    {
    
      
   var cont="q="+'.$my_id.'+"&cnt="+'.$cnt.';
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#forliveconv'.$my_id.'").prepend(xmlhttp.responseText);
               
            
            }
        }
        xmlhttp.open("post", "liveconvrs.php?"+cont, true);
        xmlhttp.send(); 
        


setInterval(function(){ 
var id=$("#whoislive'.$my_id.'").val();

whathetyped(id);

      }, 1000);
    }


            }
    setInterval(my_chat_user'.$my_id.',5000);
$(document).ready(function()
{
$(\'.CWNM_InpTxt\').keyup(function(event)
{
var x=event.which || event.keycode;

if(x==13)
{

$(\'#sendmsg'.$my_id.'\').click();

}
});

});
 

            </script>
            ';
                      $q="SELECT user_id as u,msg as m,time as t,msg_id as mid,msg_file as mf,msg_clr as clr,bg_color as bgc,day as d,senter_seen as sns from messages where  delt=0 and user_id!=sender_id and (user_id=$user_id or user_id=$my_id) and (sender_id=$user_id or sender_id=$my_id) and senter_seen!=$user_id order by msg_id desc limit 10";
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
                            if($m==2)
	           {
		 $time=$row['t'];
                            
	           }else
	           {
		  $time="";
                           
	           }
                              $predate=$day;
                            $uid=$row['u'];
                            $senter_seen=$row['sns'];
                            $msg=$row['m'];
                            $msgcolor=$row['clr'];
                            $bgclr=$row['bgc'];
                            $msg_id=$row['mid'];
                            
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
                                        echo'<img class="CW_ConvMsgIcos'.$my_id.'" style="width:15px;float:left;"  width="15" height="15" src="../web/icons/msg_notseen.png" />';
                                         echo '<span id="for_delt_msg'.$msg_id.'" class="for_delt_msgs"><span id="dlt_this'.$msg_id.'" onclick="deletemsg(\''.$msg_id.'\',\'#CWNewMsgPreUse'.$msg_id.'\')" style="cursor:pointer; ">&nbsp;&nbsp;&nbsp;Delete</span></span>';
                                       
                                      }else
                                      {
                                        echo'<img class="CW_ConvMsgIcos'.$my_id.'" width="15" height="15" style="width:15px;float:left;" src="../web/icons/chatwin/msg_seen.png" />';
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
                         
                          
                          
                       
                      </div> ';
	         if(mysqli_num_rows($r)<10)
                        {
                            
                        }else
                        {
                            echo'<div id="for_rmv_dh_mr_msgs'.$my_id.'" ><div style="text-align:center;cursor:pointer;" onclick="showpre_msgs(\''.$msg_id.'\',\''.$my_id.'\')">Show Previous Messages</div></div>';
                        }
	         echo '
              </div>
             
          </div>
         
      </div>
 
';
                          
                            
                        echo'<div id="for_pre_imgs_m" style="width:0px;height:0px;"></div><input type="hidden" id="after_mycom_imgs_msg" value="" />';
}
?>