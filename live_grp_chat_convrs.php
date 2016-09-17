<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    echo '<script>window.location.assgin(\'index.php\')</script>';
}else
{
    require 'mysqli_connect.php';
    $user_id=$_SESSION['user_id'];
    
    $grp_id=$_REQUEST['q'];
     $q="select group_name as n from groups where group_id=$grp_id";
    $r=  mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $grp_name=$row['n'];
        }
    }
    $my_id="group$grp_id";
     $q="select gp_msg_id as m from group_msg_seen where member_id=$user_id and group_id=$grp_id order by seen_id desc limit 1";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
         $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
         if(empty($row))
         {
             $q1="select grp_msg_id as g from group_messages where group_id=$grp_id order by grp_msg_id desc";
             $r1=  mysqli_query($dbc, $q1);
             if($r1)
             {
                 if(mysqli_num_rows($r1)>0)
                 {
                     $rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
                     $last_seen_id=$rows['g'];
                 }else
                 {
                   $last_seen_id=1;
                 }
             }
         }else
         {
         $last_seen_id=$row['m'];    
         }
         
     }
    
$q="SELECT member_id as u,msg as m,time as t,grp_msg_id as mid,msg_clr as clr,bg_clr as bgc,day as d,seen as sns,show_name as sh  FROM `group_messages` WHERE `grp_msg_id` >= $last_seen_id AND `group_id` = $grp_id and  `grp_msg_id` != $last_seen_id ORDER BY `grp_msg_id` DESC";

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
                            
                            $msg_file="";
                            $show_name=$row['sh'];
                            $q5="select gp_msg_id as g from group_msg_seen where gp_msg_id=$msg_id and member_id!=$user_id";
                            $r5=mysqli_query($dbc,$q5);
                            if($r5)
                            {
                                $msg_seen=0;
                                if(mysqli_num_rows($r5)>0)
                                {
                                    $msg_seen=1;
                                  
                                }
                            }
                            if($m==2)
	           {
		   $qs="select member_id as m from group_msg_seen where member_id=$user_id and group_id=$grp_id";
		     $rs=  mysqli_query($dbc, $qs);
		     if($rs)
		     {
		            if(mysqli_num_rows($rs)>0)
		            {
			  $qw="update group_msg_seen set gp_msg_id='$msg_id' where member_id=$user_id and group_id=$grp_id";
			  mysqli_query($dbc, $qw);
                             mysqli_query($dbc,$qw);
		            }else
		            {
			  $qw="insert into group_msg_seen(member_id,group_id,gp_msg_id)values($user_id,$grp_id,$msg_id)";
                             mysqli_query($dbc,$qw);
		            }
		     }
                             
	           }
                         
                           
                            if($uid==$user_id)
                            {
                              echo'<div class="CW_Conv_OutHold"  id="CWNewMsgUse'.$msg_id.'"  >
                              <div class="CW_Conv_OutArr" style="border-left-color:'.$bgclr.';" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBG" style="background-color:'.$bgclr.';">
                                  ';
                              if($show_name=="0")
                              {
                                  echo'<b>***</b>';
                              }
                              echo'
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
                                          echo'<div class="CW_ConvMsgFile">'.substr($msg_file,10,strlen($msg_file)).'</div>';
                                         }

                                         }else
                                         {
                                          }
                                               }
                                           }
                                       }
                                        
                                          echo'
                                      </div></a>
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
                                  
                               <br/>
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
                              <div class="CW_Conv_InCont" style="background-color:'.$bgclr.'">';
                              if($show_name=="1")
                              {
                                  echo ' <b style="color:'.$msgcolor.'">'.$mem_name.'</b>'; 
                              }else
                              {
                                  echo '***';
                              }
                             
                              echo'    <div class="CW_ConvMsgTxt" style="color:'.$msgcolor.'" >'.$msg.'</div>
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

                                         }else
                                         {
                                          }
                                               }
                                           }
                                       }
                                        
                                          echo'
                                      </div></a>
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
                       
                        $q5="select gp_msg_id as g from group_msg_seen where group_id=$grp_id and `member_id` != $user_id";
                            $r5=mysqli_query($dbc,$q5);
                            if($r5)
                            {
                                $msg_seen=0;
                                if(mysqli_num_rows($r5)>0)
                                {
		     while($row=  mysqli_fetch_array($r5,MYSQLI_ASSOC))
		     {
		            $msg_id=$row['g'];
		            if($msg_id>=$last_seen_id)
		            {
			  echo' 
                          <script type="text/javascript">
                          $(document).ready(function()
                          {
                          
                          $("#msg_not_seen'.$msg_id.'").attr(\'src\',\'icons/chatwin/msg_seen.png\');
                              $("#for_delt_grp_msg'.$msg_id.'").fadeOut();
		  
                          });

            </script>
                      ';  
		            }else
		            {
			            }
		              
		     }
                                    $msg_seen=1;
                                
                                }else
	               {
		       
	               }
                            }

                      }else
                      {
	            echo 'not run';
                          echo mysqli_error($dbc);
                      }
           
}