<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{echo'<div >';
    $user_id=$_SESSION['user_id'];
    $my_id=$_REQUEST['q'];
    $cnt=$_REQUEST['cnt'];
    $cnt="$cnt$my_id";
    require 'mysqli_connect.php';

    $q="SELECT user_id as u,sender_id as sid ,msg as m,time as t,msg_id as mid,sender_seen as ss,msg_file as mf,msg_clr as clr,bg_color as bgc,senter_seen as sns,live as lv from messages where user_id!=sender_id and (user_id=$user_id or user_id=$my_id) and (sender_id=$user_id or sender_id=$my_id) and ((sender_seen=$my_id or senter_seen=$user_id ) or (sender_seen=$user_id or senter_seen=$my_id)) order by msg_id desc";
   
    $r=mysqli_query($dbc,$q);
    if($r)
    {

         
    	if(mysqli_num_rows($r)>0)
        {
           
       
                          $m=1;
                    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                   {
                          
                            $m=$m+1;
                            $uid=$row['u'];
                            $msg_id=$row['mid'];
                            $sender_id=$row['sid'];
                            $msg_file=$row['mf'];
                            $msg=$row['m'];
                            $time=$row['t'];
                            $sender_seen=$row['ss'];
                            $senter_seen=$row['sns'];
                            $live=$row['lv'];
                            $bgclr=$row['bgc'];
                            $clr=$row['clr'];
 
                            
                            if($user_id==$sender_seen )
                            {
                           if($uid!=$user_id)
	                       	{

                         	 echo' <div class="CW_Conv_InHold" >
                              <div class="CW_Conv_InArr" style="border-right-color:white"></div>
                              <div class="CW_Conv_InCont" style="background-color:'.$bgclr.'">
                                  <div class="CW_ConvMsgTxt" style="color: navy;" ><font color="'.$clr.'">'.$msg.'</font></div>
                                  <div class="CW_ConvMsgMedia">
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
                                             $msg_file=$rf['f'];
                                           
                                             echo'   <a href="'.$msg_file.'"  download="sedfed/'.substr($msg_file,10,strlen($msg_file)).'">
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

                                         }
                                         
                                         echo'</a>';
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
                                  <div class="CW_ConvMsgFile">
                                     
                                  </div>
                                  
                              </div>

                              <div class="CW_Conv_MsgTimeIn"> '.$time.'</div>
                              
                          </div>';
                           
                        	}
                        	 else
	                       	{
            echo'<div class="CW_Conv_OutHold" id="CWNewMsgPreUse'.$msg_id.'"  >
                              <div class="CW_Conv_OutArr"  style="border-left-color:'.$bgclr.';" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBG" style="background-color:'.$bgclr.'">
                                  <div class="CW_ConvMsgTxt" id="CWNewMsgTxt"  >
                                      <font color="'.$clr.'">'.htmlentities($msg).'</font>
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
                                      
                                           
                                        echo'<font class="my_sen_img"><img class="CW_ConvMsgIcos'.$my_id.'" style="width:15px;float:left;" id="seethis'.$msg_id.'" src="icons/chatwin/msg_notseen.png" /></font>';
                                        
                                        echo '<span id="for_delt_msg'.$msg_id.'" class="for_delt_msgs'.$my_id.'"><span id="dlt_this'.$msg_id.'" onclick="deletemsg(\''.$msg_id.'\',\'#CWNewMsgPreUse'.$msg_id.'\')" style="cursor:pointer; ">&nbsp;&nbsp;&nbsp;Delete</span></span>';
                                          echo'
                                      </div>
                                      <div class="CW_Conv_MsgTimeOut"> '.$time.' </div>
                                  </div>
                          </div>
                             ';
                           
                        	}
                        
                         if($sender_seen==$user_id)
                         {

                         	$qw="UPDATE messages set sender_seen='0' where msg_id=$msg_id";
                         	$rw=mysqli_query($dbc,$qw);
                         }
                         
                         
                           $qu="select senter_seen as sd,seen as sn from messages where user_id=$uid and sender_id=$my_id and (senter_seen=$my_id or seen=0)";
                            $ru=  mysqli_query($dbc, $qu);
                            if($ru)
                            {
                                if(mysqli_num_rows($ru)>0)
                                {
                                    $et=mysqli_fetch_array($ru,MYSQLI_ASSOC);
                                    $s_seen=$et['sd'];
                                    $seen=$et['sn'];
                                    if($seen=="0" || $s_seen==$my_id)
                                    {
                                       echo'<script type="text/javascript">
                $(document).ready(function()
                    {
                  
                    }                

                    );
            </script>'; 
                                    }
                                      
                                }  else {
                                  echo'<script type="text/javascript">
                $(document).ready(function()
                    {
                   
                  // $(".CW_ConvMsgIcos'.$my_id.'").attr("src","icons/msg_seen.png");
               //$(".for_delt_msgs'.$my_id.'").html("");
                   
                                        $("#seethis'.$msg_id.'").fadeOut();
                                           $("#for_delt_msg'.$msg_id.'").html("");
                                                $("#for_delt_msg'.$msg_id.'").hide();
                       
                    }                

                    );
            </script>';    
                                  

                                }
                            }
                                                                                        
  echo'<script type="text/javascript">
                                            $(document).ready(function()
                                            {
                                           
                                               ';
                                          if($senter_seen=="0")
                                          {
                                              
                                             echo'$("#seethis'.$msg_id.'").fadeOut()';
                                             echo'$("#for_delt_msg'.$msg_id.'").html("")';
                                          }else
                                          {
                                              
                                               echo'$("#seethis'.$msg_id.'").fadeOut()';
                                          }
                                          echo'
                                            });
                                            </script>';

                 }	 	
     if($cnt>0)
    {
        	
    					if($user_id==$senter_seen)
    					{
    				if($uid!=$user_id)
	                       	{

                         	 echo' <div class="CW_Conv_InHold" >
                              <div class="CW_Conv_InArr" style="border-right-color:'.$bgclr.'"></div>
                              <div class="CW_Conv_InCont" style="background-color:'.$bgclr.'">
                                  <div class="CW_ConvMsgTxt" style="color: navy;" ><font color="'.$clr.'">'.$msg.'</font></div>
                                  <div class="CW_ConvMsgMedia">
                                       <a href="'.$msg_file.'"  download="sedfed/'.substr($msg_file,10,strlen($msg_file)).'">
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
                                  <div class="CW_ConvMsgFile">
                                     
                                  </div>
                                  
                              </div>
                              <div class="CW_Conv_MsgTimeIn"> '.$time.' </div>
                              
                          </div>';
                           
                        	}
                        	 else
	                       	{
	                       			echo'<div class="CW_Conv_OutHold" id="CWNewMsgPreUsrs"  >
                              <div class="CW_Conv_OutArr" id="newMsgArw"></div>
                              <div class="CW_Conv_OutCont" id="newMsgBG" style="background-color:'.$bgclr.' ">
                                  <div class="CW_ConvMsgTxt" id="CWNewMsgTxt"  >
                                      <font color="'.$clr.'">'.htmlentities($msg).'</font>
                                  </div>
                                  <div class="CW_ConvMsgMedia" id="newMsgMedia" >
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
                                  
                              </div> <br/>
                              <div class="convMsgOutDets">
                                      <div class="convMsgOutSeen">
                                         ';
                                      if($senter_seen==$my_id){
                                      	echo'<font class="my_sen_img"><img class="CW_ConvMsgIcos'.$my_id.'" style="width:15px;float:left;"  width="15" height="15" id="seethis'.$msg_id.'" src="icons/msg_notseen.png" /></font>';
                                      }else
                                      {
                                      	echo'<font class="my_sen_img"><img class="CW_ConvMsgIcos'.$my_id.'" style="width:15px;float:left;" id="seethis'.$msg_id.'"  width="15" height="15" src="icons/chatwin/msg_seen.png" /><font class="my_sen_img">';
                                      }
                                         echo'
                                      </div>
                                      <div class="CW_Conv_MsgTimeOut"> '.$time.' </div>
                                  </div>
                          </div>
';
                           
               }

             if($senter_seen==$user_id)
             {
             	$qw="UPDATE messages set senter_seen='0',live='0',senter_seen=0 where msg_id=$msg_id";
             	$rw=mysqli_query($dbc,$qw);

             	
             }

                        

               }
    }else
    {
         if($senter_seen==$user_id)
             {
             	$qw="UPDATE messages set senter_seen='0',live='0',senter_seen=0 where msg_id=$msg_id";
             	$rw=mysqli_query($dbc,$qw);

             	
             }

    }
    
        				
          }
                            
              }else
              {
                 
                  echo'<script type="text/javascript">
                                            $(document).ready(function()
                                            {
                                            
                                            $(".CW_ConvMsgIcos'.$my_id.'").attr(\'src\',\'icons/msg_seen.png\');
                                            $(".for_delt_msgs'.$my_id.'").fadeOut();
                                              });
                                            </script>';
              }
    		}else
    		{
    			echo mysqli_error($dbc);
    		}

echo'</div>';
   }
   ?>
