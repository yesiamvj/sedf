<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $my_id=$_REQUEST['his_id'];
    $lst_msg_id=$_REQUEST['q'];
    require 'mysqli_connect.php';
    $q="select msg_id as m from messages limit 1";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $next_msg_id=$row['m'];
        
    }
     $q="SELECT user_id as u,msg as m,time as t,msg_id as mid,msg_file as mf,msg_clr as clr,bg_color as bgc,day as d,senter_seen as sns from messages where msg_id between $next_msg_id and $lst_msg_id and (user_id=$user_id or user_id=$my_id) and (sender_id=$user_id or sender_id=$my_id)  order by msg_id desc limit 10";
   
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                        if(mysqli_num_rows($r)>0)
                        {
                          $m=1;
                          while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                          {
                            $m=$m+1;
                            if($m>2)
                            {
                               $day=$row['d'];
                            if($m>3)
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
                                  <a href="'.$msg_file.'"  download="sedfed/'.$msg_file.'">
                                       <div class="CW_MMed_Itm">
                                         ';
                                         $file_name1=$msg_file;
                                         if(!empty($msg_file))
                                         {
                                         $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                    $emp=0;
                                        if($f1_format=="jpg" || $f1_format=="png" || $f1_format=="gif" || $f1_format=="ico")
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
                                           echo'<audio src="'.$msg_file.'" class="img_ConvMsgMedia" controls></audio>';
                                       
                                        }
                                         
                                         if($emp!==1 && $emp!==2 && $emp!==3)
                                         {
                                          echo'<div class="CW_ConvMsgFile">'.$msg_file.'</div>';
                                         }

                                         }else
                                         {
                                          }
                                          echo'
                                      </div></a>
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
                                        echo'<img class="CW_ConvMsgIcos" style="width:15px;float:left;" src="icons/msg_notseen.png" />';
                                         echo '<span id="for_delt_msg'.$msg_id.'" class="for_delt_msgs"><span id="dlt_this'.$msg_id.'" onclick="deletemsg(\''.$msg_id.'\',\'#CWNewMsgPreUse'.$msg_id.'\')" style="cursor:pointer; ">&nbsp;&nbsp;&nbsp;Delete</span></span>';
                                       
                                      }else
                                      {
                                        echo'<img class="CW_ConvMsgIcos" style="width:15px;float:left;" src="icons/chatwin/msg_seen.png" />';
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
                                  <div class="CW_ConvMsgTxt" style="color: '.$msgcolor.'" >'.$msg.'</div>
                                  <div class="CW_ConvMsgMedia">
                                          
                                  </div>
                                  <div class="CW_ConvMsgFile">
                                     <a href="'.$msg_file.'"  download="sedfed/'.substr($msg_file,10,strlen($msg_file)).'">
                                       <div class="CW_MMed_Itm">
                                         ';
                                         $file_name1=$msg_file;
                                         if(!empty($msg_file))
                                         {
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

                                         }else
                                         {
                                          }
                                          echo'
                                      </div></a>
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
                          
                        if(mysqli_num_rows($r)<10)
                        {
                            
                        }else
                        {
                            echo'<div id="for_rmv_dh_mr_msgs'.$my_id.'" ><div style="text-align:center;cursor:pointer;" onclick="showpre_msgs(\''.$msg_id.'\',\''.$my_id.'\')">Show Previous Messages</div></div>';
                        }
                          
                        }
                        
                       
                      }
           
                           
                        
}
?>