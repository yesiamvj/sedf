<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
       $user_id=$_SESSION['user_id'];
       $last_id=$_REQUEST['last_id'];
       
       require 'mysqli_connect.php';
       $q="select msg_id as m from messages  ";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
              $initial_msg_id=$row['m'];
       }
       //from 1st to last id
            			          $q="select senter_seen from messages where  sender_id=$user_id and senter_seen=0";
			          $r= mysqli_query($dbc, $q);
			          if($r)
			          {
				$tot_seen_msgs=  mysqli_num_rows($r);
			          }
			          $q="select senter_seen from messages where sender_id=$user_id and senter_seen!=0";
			          $r= mysqli_query($dbc, $q);
			          if($r)
			          {
				$tot_un_seen_msgs=  mysqli_num_rows($r);
			          }
       $q="select msg_id as mid,sender_id as u,user_id as uid,seen as sn,msg as m ,msg_clr as mc,bg_color as bgc,time as tm,senter_seen as sn from messages where delt=0 and msg_id between $initial_msg_id and $last_id and (user_id=$user_id or sender_id=$user_id)   order by msg_id desc limit 25";
      
        $r=  mysqli_query($dbc, $q);
       if($r)
       {
              $n=0;
              
              if(mysqli_num_rows($r))
              {
	           $again_un_seen=0;
	           $again_seen=0;
	    while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	    {
	           $n=$n+1;
	           
	           $msg=$row['m'];
	           $msg_clr=$row['mc'];
	           $bg_color=$row['bgc'];
	           $seen=$row['sn'];
	           $msg_id=$row['mid'];
	         $senter_seen=$row['sn'];
	         $sender_id=$row['uid'];
	         
	           $time=$row['tm'];
	           $senter_id=$row['u'];
	          $uname="select c_name as fname from contacts where user_id=$user_id and  cu_id=$sender_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $poster_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$senter_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $poster_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
			 $quq="select username as u from users where user_id=$sender_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
			    $qe="select med_img as m from small_pics where user_id=$user_id";
			  $re=  mysqli_query($dbc, $qe);
			  if($re)
			  {
			         if(mysqli_num_rows($re)>0)
			         {
			                $rt=  mysqli_fetch_array($re,MYSQLI_ASSOC);
			                $own_pic=$rt['m'];
			         }else
			         {
			                $own_pic="icons/male.png";
			         }
			  }
		$qw="update messages set senter_seen=0 where senter_seen=$user_id";
	           mysqli_query($dbc, $qw);
	           if($sender_id==$user_id)
	           {
		                if($seen!=0)
		               {
			     if($again_un_seen==1)
			     {
			            $again_un_seen=1;
			            $again_seen=0;
			           
			     }else
			     {
			            $again_un_seen=0;
			            $again_seen=0;
			     }
		               }  else {
			if($again_seen==1)
			{
			       
			       $again_seen=1;
			       $again_un_seen=0;
			}else
			       {
			       $again_seen=0;
			        $again_un_seen=0;
			}
		               }
		              
	           if($again_un_seen==0 && $seen!=0)
	           {
		echo '     <div class="tabContTtl">
                                    Unread <div class="tabCount"> '.$tot_un_seen_msgs.' Items</div>
                                </div>
                                
                           '; 
		$again_un_seen=1;
	           }else
	           {
		 
		 if($again_seen==0 && $seen==0)
		{
		 echo '   <div class="tabContTtl">
                                   Already Seen <div class="tabCount"> '.$tot_seen_msgs.' Items</div>
                                </div>
                             ';   
		 $again_seen=1;
		 
		}
		
		
	           }
	           $senter_name=$poster_name;
                             echo '   <div class="MsgHolder">
                                    
                                    <div class="MsgHoldin">
                                        <div class="msgFaceHold">
                                             <img class="msgFace" id="my_message" style="float:right" src="'.$own_pic.'" alt="'.$senter_name.'"/>
                                        </div>
                                        <div class="msgContHold">
                                            <div class="msgHeaders">
                                            <div class="msgSender">'.$poster_name.'</div>
                                            <div class="msgSenderDets">
                                                
                                            </div>
                                            <div class="msgDets"> 
                                                <div class="msgDetItm">'.$time.'</div>
                                            </div>
                                        </div>
                                        <div class="msgContent">
		      '.  htmlentities($msg).'
		             ';
	              $q12="select smiley as sm from msg_smiley where msg_id=$msg_id";
	           $r12= mysqli_query($dbc,$q12);
	           if($r12)
	           {
		 if(mysqli_num_rows($r12)>0)
		 {
		        while($rows=  mysqli_fetch_array($r12,MYSQLI_ASSOC))
		        {
		               $smiley=$rows['sm'];
		               echo '<img src="'.$smiley.'" style="max-width:50px;"/>';
		        }
		 }
	           }
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
                                          echo'<img  style="max-width:300px;" class="img_ConvMsgMedia" alt="'.$msg_file.'" src="'.$msg_file.'" />';
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
	            echo '

                                          </div>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                              
                                
                                
                           ';
		 }
		else
	                   {
                                                 if($seen!=0)
		               {
			     if($again_un_seen==1)
			     {
			            $again_un_seen=1;
			            $again_seen=0;
			           
			     }else
			     {
			            $again_un_seen=0;
			            $again_seen=0;
			     }
		               }  else {
			if($again_seen==1)
			{
			       
			       $again_seen=1;
			       $again_un_seen=0;
			}else
			       {
			       $again_seen=0;
			        $again_un_seen=0;
			}
		               }
		              
	           if($again_un_seen==0 && $seen!=0)
	           {
		echo '     <div class="tabContTtl">
                                    Unread <div class="tabCount"> '.$tot_un_seen_msgs.' Items</div>
                                </div>
                                
                           '; 
		$again_un_seen=1;
	           }else
	           {
		 
		 if($again_seen==0 && $seen==0)
		{
		 echo '   <div class="tabContTtl">
                                   Already Seen <div class="tabCount"> '.$tot_seen_msgs.' Items</div>
                                </div>
                             ';   
		 $again_seen=1;
		 
		}
		
		
		
	           }
	           $senter_name=$poster_name;
                             echo '   <div class="MsgHolder">
                                    '.$msg_id.'
                                    <div class="MsgHoldin">
                                        <div class="msgFaceHold">
                                             <img class="msgFace" src="'.$p_pic.'" alt="'.$senter_name.'"/>
                                        </div>
                                        <div class="msgContHold">
                                            <div class="msgHeaders">
                                            <div class="msgSender">'.$senter_name.' '.$sender_id.'</div>
                                            <div class="msgSenderDets">
                                                
                                            </div>
                                            <div class="msgDets"> 
                                                <div class="msgDetItm">'.$time.'</div>
                                            </div>
                                        </div>
                                        <div class="msgContent">
		      '.  htmlentities($msg).'
		             ';
	              $q12="select smiley as sm from msg_smiley where msg_id=$msg_id";
	           $r12= mysqli_query($dbc,$q12);
	           if($r12)
	           {
		 if(mysqli_num_rows($r12)>0)
		 {
		        while($rows=  mysqli_fetch_array($r12,MYSQLI_ASSOC))
		        {
		               $smiley=$rows['sm'];
		               echo '<img src="'.$smiley.'" style="max-width:50px;"/>';
		        }
		 }
	           }
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
                                          echo'<img  style="max-width:300px;" class="img_ConvMsgMedia" alt="'.$msg_file.'" src="'.$msg_file.'" />';
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
	            echo '

                                          </div>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                              
                                
                                
                           ';
		        }
                              
	         
	    }
              }
              
              IF(mysqli_num_rows($r)>24)
              {
	    echo '<div id="show_more_all" onclick="show_more_all_msgs('.$msg_id.')">Show More Messages</div>';
              }
       }
}