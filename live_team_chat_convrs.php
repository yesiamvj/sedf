<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    require 'mysqli_connect.php';
    $user_id=$_SESSION['user_id'];
    
    $grp_id=$_REQUEST['q'];

     $q="select group_name as n,battle_id as btl from groups where group_id=$grp_id";
    $r=  mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $grp_name=$row['n'];
            $battle_id=$row['btl'];
        }
    }
   
    $qr="select battle_name as b from battles where battle_id=$battle_id";
    $rr=  mysqli_query($dbc, $qr);
    if($rr)
    {
        $rt= mysqli_fetch_array($rr,MYSQLI_ASSOC);
        $battle_name=$rt['b'];
    }
     $q="select group_id as g from groups where battle_id=$battle_id";
  $r=  mysqli_query($dbc, $q);
  if($r)
  {
      if(mysqli_num_rows($r)>0)
      {
          $g1=0;
          while($rowd=  mysqli_fetch_array($r,MYSQLI_ASSOC))
          {
              $g1=$g1+1;
              if($g1==1)
              {
                  $team1_id=$rowd['g'];
              }
              if($g1==2)
              {
                  $team2_id=$rowd['g'];
              }
              $qw="select members_id as m from group_members where group_id=$team1_id and members_id=$user_id";
              $rw=  mysqli_query($dbc, $qw);
              if($rw)
              {
                  if(mysqli_num_rows($rw)>0)
                  {
                      $myteam=$team1_id;
                  }
                  else
                  {
                      if($g1>1)
                      {
                      $myteam=$team2_id;    
                      }
                      
                  }
              }
          }
      }
  }
    
    
    $my_id="team$grp_id";
   
     $q="select gp_msg_id as m from group_msg_seen where member_id=$user_id and group_id=$myteam ";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
         
         if(mysqli_num_rows($r)>0)
         {
                $rowx=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                 $last_seen_id=$rowx['m'];    
         }  else {
          $last_seen_id=1;       
         }
     }
   
     $q="SELECT group_id as gp_id,member_id as u,msg as m,seen as sns,time as t,grp_msg_id as mid,msg_clr as clr,bg_clr as bgc,day as d,show_name as sh FROM `group_messages` WHERE `grp_msg_id` >= $last_seen_id and (group_id=$team1_id or group_id=$team2_id ) and grp_msg_id!=$last_seen_id ORDER BY `grp_msg_id` DESC ";
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
                            $msgcolor=$row['clr'];
                            $bgclr=$row['bgc'];
                            $msg_id=$row['mid'];
                            $team_id=$row['gp_id'];
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
                            
                            $q4="select seen_id from group_msg_seen where gp_msg_id=$msg_id and member_id=$user_id and group_id=$grp_id";
                            $r4=mysqli_query($dbc,$q4);
                            if($r4)
                            {
                                if(mysqli_num_rows($r4)>0)
                                {
                                    
                                }else
                                {
		     if($m==2)
		     {
		          $qs="select member_id as m from group_msg_seen where member_id=$user_id and group_id=$myteam";
		     $rs=  mysqli_query($dbc, $qs);
		     if($rs)
		     {
		            if(mysqli_num_rows($rs)>0)
		            {
			  $qw="update group_msg_seen set gp_msg_id='$msg_id' where  member_id=$user_id and group_id=$myteam";
			  mysqli_query($dbc, $qw);
                         
		            }else
		            {
			  $qw="insert into group_msg_seen(member_id,group_id,gp_msg_id)values($user_id,$myteam,$msg_id)";
                             mysqli_query($dbc,$qw);
		            }
		     }
		     
		     }
                                        
                             
                           
                            if($myteam==$team_id)
                            {
                              echo'<div class="CW_Conv_OutHold"  id="CWNewMsgUse'.$msg_id.'"  >
                              <div class="CW_Conv_OutArr" style="border-left-color:'.$bgclr.';" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBG" style="background-color:'.$bgclr.';">
                                  ';
                              if($show_name=="0")
                              {
                                  echo'<b>***</b>';
                              }  else {
                                  echo'<b>'.$mem_name.'</b>';
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
                               
                            
                            }
                          

                             
                            
                          }
                          
                       
                          
                        }else
                        {
                            
                        }
                           $q5="select gp_msg_id as g from group_msg_seen where ( group_id=$team1_id or group_id=$team2_id ) and `member_id` != $user_id";
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
                          echo mysqli_error($dbc);
                      }
           
}