<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
    $grp_id=$_REQUEST['id'];
    $cnt=$_REQUEST['cnt'];
   
    $q="select group_name as c,showname as sh from groups where group_id=$grp_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $c_nm=$row['c'];
            $showmyname=$row['sh'];
        }  else {
        echo '<script>window.location.href=\'../web/index.php\'</script>';       
        }
    }
    $my_id="group$grp_id";
    $cnt=$my_id;
     $q3="select grp_pic as p,theme as th from groups where group_id=$grp_id";
              $r3=  mysqli_query($dbc,$q3);
              if($r3)
              {
                  if(mysqli_num_rows($r3)>0)
                  {
                      $ry=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                      $p_pic=$ry['p'];
                      $theme=$ry['th'];
                      $theme="#$theme";
                  }else
                  {
                      $p_pic="icons/male.png";
                      $theme="#ef0000";
                  }
              }
            
echo'

      <div id="content-full">
          <div class="SedFedChatWindow">
              <div class="ChatWindMinIcon" style="display:none;" id="ChatIcon'.$cnt.'" onclick="$(\'#ChatWind'.$cnt.'\').slideDown();$(\'#ChatIcon'.$cnt.'\').hide();">
                          <img class="img_ChWin_BigIcon" src="'.$p_pic.'" />
                      </div>
              <div class="ChatWindowHold" id="ChatWind'.$cnt.'" >
                  
                  <div class="ChatWindowOut">
                      
                      <div class="ChatWindTtl" style="background-color:'.$theme.'"  >
                          <div class="ChWin_ChaterFace">
                              <img class="img_ChWin_ProfPic" src="'.$p_pic.'" />
                          </div>
	          <input type="hidden" value="1" id="team_chatloded"/>
                     
                          <input type="hidden" id="myusrchk" />
                          <div class="ChWin_ChaterNme"  onclick="$(\'#ChatWind'.$cnt.'\').slideUp();$(\'#ChatIcon'.$cnt.'\').fadeIn();"><div>'.$c_nm.'</div>  <span id="for_chat_online_sts'.$my_id.'" style="display:none;"><div class="Ch_Usr_Sts" style="background-color: green" ></div></span> </div>
                          <div class="ChWin_Tools" style="background-color: '.$theme.';" >
                              <div class="ChWin_Min" onclick="MinChatWindow(\'#ChatWind'.$cnt.'\',\''.$my_id.'\')" title="Smaller" >_</div>
                              <div class="ChWin_Max" onclick="MaxChatWindow(\'#ChatWind'.$cnt.'\',\''.$my_id.'\')" title="Larger" >+</div>
                                 
                              <div class="ChWin_Close" onclick="$(\'#on_live_grp_convrse'.$my_id.'\').val(\'0\');$(\'#usrcwgrp'.$grp_id.'\').fadeOut();$(\'#myonusrcnt'.$cnt.'\').val(\'usrhidn'.$cnt.'\');">X<input type="hidden" id="chwnusrcnt" value="'.$cnt.'" /></div>
                          </div>
                      </div>
                      <div class="ChWinNewMsgOut" id="ChWinNMsgHold'.$cnt.'" >
                          <div class="ChWinNewMsgIn">
                              
                              <div class="CWNM_Cont">';
                              if($showmyname==1)
                              {
                              echo' <input id="CWNM_SecChk'.$my_id.'" type="checkbox"  onmouseover="$(\'#CWNM_Ttid1\').fadeIn();" onmouseout="$(\'#CWNM_Ttid1\').fadeOut();" class="CWNM_SecChk" checked />
                              ';    
                              }else
                              {
                                  echo' <input id="CWNM_SecChk'.$my_id.'" type="checkbox" disabled  onmouseover="$(\'#CWNM_Ttid1\').fadeIn();" onmouseout="$(\'#CWNM_Ttid1\').fadeOut();" class="CWNM_SecChk" checked />
                              ';  
                              }
                                 echo'<div class="CWNM_ToolTip" id="CWNM_Ttid1"  style="display: none;" >
                                      <div class="CWNM_Tt_Arr"></div>
                                      <div class="CWNM_Tt_Cont">
                                          Include My Name
                                      </div>
                                  </div>
                                  <textarea class="CWNM_InpTxt" id="CWNewMsgInpUsr'.$cnt.'" oninput="showtohim(\''.$my_id.'\',this.value)" onclick="chatWindMsgInp(\'#ChWinNMsgHold'.$cnt.'\',\'#CWNewMsgPreUsr'.$cnt.'\',\'#CWNewMsgUsr'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\',\'#CWNM_attchHold'.$cnt.'\')" onblur="chatWinInpBlur(\'#ChWinNMsgHold'.$cnt.'\',\'#CWNewMsgPreUsr'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\')" type="text" placeholder="Type your message" ></textarea>
                                  <div class="ChWinSendMsgBtn" title="Send Message" id="sendmsg'.$my_id.'" onclick="sendgrpmessage(\''.$grp_id.'\',\'#newMsgClrinp'.$cnt.'\',\'#newMsgBGClrinp'.$cnt.'\',\'#msginpfile'.$cnt.'\',\'#CWNewMsgInpUsr'.$cnt.'\',\''.$my_id.'\')"></div>
                                  
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
                                          <div class="CWNM_AttachItm" title="Add Smiley"   onclick="open_msg_smiley(\''.$cnt.'\',\''.$my_id.'\')">
                                       <img  src="icons/test-smiley.png"  />
                                   </div>

                                  <input type="hidden" value="0" id="sml_load'.$my_id.'" />
                      
                                   <div id="for_load_smileys'.$my_id.'"></div>
                                  
                                                       <form method="post"  style="display:none;"><input onchange="putfile_value(\''.$cnt.'\',\''.$my_id.'\',this)" type="file" multiple="multiple" id="msginpfile'.$cnt.'" style="display:none;" /></form>
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


                                  <div class="CW_ConvMsgFile">
                                     
                                  </div>
                                  
                              </div>
                              <div class="CW_Conv_MsgTimeIn">typing... </div>
                              
                          </div>
                          

  <div class="CW_Conv_OutHold" id="CWNewMsgPreUsr'.$cnt.'" style="display: none;" >
                              <div class="CW_Conv_OutArr" id="newMsgArws'.$my_id.'"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBGv'.$my_id.'">
                                  <div class="CW_ConvMsgTxt" id="mymsgcont'.$my_id.'"  >
                                      
                                  </div>
                                  <input type="hidden"id="selectedsml" value="1"/>
                                  <div class="CW_ConvMsgMedia" id="newMsgMedia1" >
                                       <div class="CW_MMed_Itm" id="my_add_smily'.$my_id.'">
                                         
                                      </div>
                                  </div>
                                  <div  class="CW_ConvMsgFile"> 
                                 
                                  </div>
                                  
                              </div> <br/>
                              <div class="convMsgOutDets" id="conv_tot_hold'.$my_id.'">
                                  
                                  </div>
                          </div>
                          <input type="hidden" value="1" id="on_live_grp_convrse'.$my_id.'" />
';
echo'<div id="forlivegrpconv'.$my_id.'"></div>';
  echo'<input type="hidden" value="'.$my_id.'" id="whoislive'.$my_id.'">
   
            ';
                      $q="SELECT member_id as u,msg as m,time as t,grp_msg_id as mid,msg_clr as clr,bg_clr as bgc,day as d from group_messages where group_id=$grp_id order by grp_msg_id desc limit 10";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                           $m=0;
                        if(mysqli_num_rows($r)>0)
                        {
                         
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
                             
                          
                            $qg="select c_name as c from contacts where user_id=$user_id and cu_id=$uid";
                            $rg=mysqli_query($dbc,$qg);
                            if($rg)
                            {
                                if(mysqli_num_rows($rg)>0)
                                {
                                    $ru=  mysqli_fetch_array($rg,MYSQLI_ASSOC);
                                    $mem_name=$ru['c'];
                                }else
                                {
                                    $qr="select first_name as f from basic where user_id=$uid";
                                    $rr=  mysqli_query($dbc, $qr);
                                    if($rr)
                                    {
                                        $ey=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                                        $mem_name=$ey['f'];
                                    }
                                }
                            }
                           
                            $msg=$row['m'];
                            $time=$row['t'];
                             if($m!==1)
                            {
                                $time="";
                            }
                            $msgcolor=$row['clr'];
                            $bgclr=$row['bgc'];
                            $msg_id=$row['mid'];
	             if($m==1)
		 {
		         $qs="select member_id as m from group_msg_seen where  member_id=$user_id and group_id=$grp_id ";
		     $rs=  mysqli_query($dbc, $qs);
		     if($rs)
		     {
		            if(mysqli_num_rows($rs)>0)
		            {
                                
			  $qw="update group_msg_seen set gp_msg_id='$msg_id' where  member_id=$user_id and group_id=$grp_id";
			  mysqli_query($dbc, $qw);
                         
		            }else
		            {
			  $qw="insert into group_msg_seen(member_id,group_id,gp_msg_id)values($user_id,$grp_id,$msg_id)";
                             mysqli_query($dbc,$qw);
		            }
		     }
		 }
                              $q5="select gp_msg_id as g from group_msg_seen where gp_msg_id=$msg_id and member_id!=$user_id";
                            $r5=mysqli_query($dbc,$q5);
                            if($r5)
                            {
                                $msg_seen=0;
                                if(mysqli_num_rows($r5)>0)
                                {
                                    $msg_seen=1;
                                    
                                }else
                                {
                                    
                                }
                            }
                            
                            
                            $msg_file="";
                            if($uid==$user_id)
                            {
                              echo'<div class="CW_Conv_OutHold"  id="CWNewMsgUse'.$msg_id.'"  >
                              <div class="CW_Conv_OutArr" style="border-left-color:'.$bgclr.';" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont"  style="background-color:'.$bgclr.';">
                                  <div class="CW_ConvMsgTxt"   >
                                      <font color="'.$msgcolor.'">'.$msg.'</font>
                                  </div>
                                  <div class="CW_ConvMsgMedia" id="newMsgMedia" >
                                  ';
                                         $file_name1=$msg_file;
                                       $q2="select msg_file as m from grp_msg_file where grp_msg_id=$msg_id";
                                       $r2=mysqli_query($dbc,$q2);
                                       if($r2)
                                       {
                                           if(mysqli_num_rows($r2)>0)
                                           {
                                               while($row=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
                                               {
                                                   $msg_file=$row['m'];
                                                   
                                                   $file_name1=$msg_file;
                                                    if(!empty($msg_file))
                                         {
                                                        echo'
                                                             <a href="'.$msg_file.'"  download="sedfed/'.substr($msg_file,10,strlen($msg_file)).'">
                                       <div class="CW_MMed_Itm">
                                    ';
                                         $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                    $emp=0;
                                        if($f1_format=="jpg" || $f1_format=="png" || $f1_format=="gif" || $f1_format=="ico")
                                        {
                                          $emp=1;
                                          echo'<img class="img_ConvMsgMedia" src="'.$msg_file.'" />';
                                        }


                                        if($f1_format==="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                        {
                                          $emp=2;
                                            echo'<video src="'.$msg_file.'" class="img_ConvMsgMedia" controls></video>';
                                       
                                        }

                                        if($f1_format=="mp3" || $f1_format=="mid" || $f1_format=="wav")
                                        {
                                            $emp=3;
                                           echo'<audio src="'.$msg_file.'" class="img_ConvMsgMedia" controls></audio>';
                                       
                                        }
                                         
                                         if($emp!==1 && $emp!==2 && $emp!==3)
                                         {
                                          echo'<div class="">'.substr($msg_file,10,strlen($msg_file)).'</div>';
                                         }
                                         echo'</div></a>';

                                         }else
                                         {
                                          }
                                               }
                                           }
                                       }
                                        
                                          echo'
                                      
                                      <div>';
                                      $q1="select smiley as m from grp_msg_smiley where msg_id=$msg_id";
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
                                             if($msg_seen==0){
                                        echo'<img class="CW_ConvMsgIcos'.$my_id.'" id="msg_not_seen'.$msg_id.'" style="width:15px;float:left;"  width="15" height="15" src="icons/msg_notseen.png" />';
                                         echo '<span id="for_delt_grp_msg'.$msg_id.'" class="for_delt_msgs'.$my_id.'"><span id="dlt_this'.$msg_id.'" onclick="delete_gr_msg(\''.$msg_id.'\')" style="cursor:pointer; ">&nbsp;&nbsp;&nbsp;Delete</span></span>';
                                       
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
                              <div class="CW_Conv_InCont" id="CW_Conv_InCont'.$my_id.'" style="background-color:'.$bgclr.'"><b>'.$mem_name.'</b>
                                  <div class="CW_ConvMsgTxt" style="color:'.$msgcolor.'" >'.$msg.'</div>
                                  <div class="CW_ConvMsgMedia">
                                          
                                  </div>
                                  <div class="CW_ConvMsgFile">
                                     ';
                                         $file_name1=$msg_file;
                                       $q2="select msg_file as m from grp_msg_file where grp_msg_id=$msg_id";
                                       $r2=mysqli_query($dbc,$q2);
                                       if($r2)
                                       {
                                           if(mysqli_num_rows($r2)>0)
                                           {
                                               while($row=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
                                               {
                                                   $msg_file=$row['m'];
                                                   
                                                   $file_name1=$msg_file;
                                                    if(!empty($msg_file))
                                         {
                                                        echo'
                                                             <a href="'.$msg_file.'"  download="sedfed/'.substr($msg_file,10,strlen($msg_file)).'">
                                       <div class="CW_MMed_Itm">
                                    ';
                                         $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                    $emp=0;
                                        if($f1_format=="jpg" || $f1_format=="png" || $f1_format=="gif" || $f1_format=="ico")
                                        {
                                          $emp=1;
                                          echo'<img class="img_ConvMsgMedia" src="'.$msg_file.'" />';
                                        }


                                        if($f1_format==="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                        {
                                          $emp=2;
                                            echo'<video src="'.$msg_file.'" class="img_ConvMsgMedia" controls></video>';
                                       
                                        }

                                        if($f1_format=="mp3" || $f1_format=="mid" || $f1_format=="wav")
                                        {
                                            $emp=3;
                                           echo'<audio src="'.$msg_file.'" class="img_ConvMsgMedia" controls></audio>';
                                       
                                        }
                                         
                                         if($emp!==1 && $emp!==2 && $emp!==3)
                                         {
                                          echo'<div class="CW_ConvMsgFile">'.substr($msg_file,10,strlen($msg_file)).'</div>';
                                         }
                                         echo' </div></a>';
                                         }else
                                         {
                                          }
                                               }
                                           }
                                       }
                                        
                                          echo'
                                     
                                      <div>';
                                      $q1="select smiley as m from grp_msg_smiley where msg_id=$msg_id";
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
                          
                          
                        }else
	       {
	              $qw="insert into group_msg_seen(member_id,group_id,gp_msg_id)values($user_id,$grp_id,1)";
                             mysqli_query($dbc,$qw);
	       }
                       
                      }
           
                           
                          echo'
                         
                          
                      
                      </div>
                      ';
	         
	         echo '<script>$(document).ready(function()
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

if($(\'#team_chatloded\').val()==="1")
{

       setInterval(aio_chat_refresh,4000);
       $(\'#team_chatloded\').val("0");
}
</script>';
                            if(mysqli_num_rows($r)<10)
                        {
                            
                        }else
                        {
                            echo'<div id="for_rmv_dh_mr_msgs'.$my_id.'" ><div style="text-align:center;cursor:pointer;" onclick="showpre_grp_msgs(\''.$msg_id.'\',\'#for_rmv_dh_mr_msgs'.$my_id.'\',\'#full_conv_hold'.$my_id.'\',\''.$grp_id.'\',\''.$my_id.'\')">Show Previous Messages</div></div>';
                        }
                        echo'
              </div>
              
          </div>
      </div>
 
';
                          
                      
}
?>