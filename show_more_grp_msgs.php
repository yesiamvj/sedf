<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $last_id=$_REQUEST['q'];
    require 'mysqli_connect.php';
  
    $q="select grp_msg_id as s from group_messages limit 1";
  
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $first_id=$row['s'];
        }else
        {
            $first_id=1;
        }
    }
     $grp_id=$_REQUEST['grp_id'];
    
      $q="select group_name as c from groups where group_id=$grp_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $c_nm=$row['c'];
        }
    }
    $my_id="$c_nm$grp_id";
$q="SELECT member_id as u,msg as m,time as t,grp_msg_id as mid,msg_clr as clr,bg_clr as bgc,day as d,seen as sns from group_messages where group_id=$grp_id and grp_msg_id between $first_id and $last_id order by grp_msg_id desc limit 10";

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
                            $senter_seen=$row['sns'];
                            $msg=$row['m'];
                            $time=$row['t'];
                            $msgcolor=$row['clr'];
                            $bgclr=$row['bgc'];
                            $msg_id=$row['mid'];
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
                              echo'<div class="CW_Conv_OutHold"  id="CWNewMsgPreUse'.$msg_id.'"  >
                              <div class="CW_Conv_OutArr" style="border-left-color:'.$bgclr.';" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBG" style="background-color:'.$bgclr.';">
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
                                         echo '<span id="for_delt_grp_msg'.$msg_id.'" class="for_delt_msgs'.$my_id.'"><span id="dlt_this'.$msg_id.'" onclick="delete_gr_msg(\''.$msg_id.'\',\'#CWNewMsgPreUse'.$msg_id.'\')" style="cursor:pointer; ">&nbsp;&nbsp;&nbsp;Delete</span></span>';
                                       
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
                              <div class="CW_Conv_InCont" style="background-color:'.$bgclr.'"><b>'.$mem_name.'</b>
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
            
                        }
                        
                       
                      }
                        if(mysqli_num_rows($r)<10)
                        {
                            
                        }else
                        {
                            echo'<div id="for_rmv_dh_mr_msgs'.$my_id.'" ><div style="text-align:center;cursor:pointer;" onclick="showpre_grp_msgs(\''.$msg_id.'\',\'#for_rmv_dh_mr_msgs'.$my_id.'\',\'#full_conv_hold'.$my_id.'\',\''.$grp_id.'\',\''.$my_id.'\')">Show Previous Messages</div></div>';
                        }
           
                      
}