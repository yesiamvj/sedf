 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
       $ucnt=0;
                      $user_id=$_SESSION['user_id'];
                      require 'mysqli_connect.php';
                     $q="select post_id as u from post_permision where user_id=$user_id order by post_id desc";
                             $r=mysqli_query($dbc,$q);
                             if($r)
                             {
                                    
                                 if(mysqli_num_rows($r)>0)
                                 {
                                     $n=0;
                                     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                     {
                                         $n=$n+1;
                                         $post_id=$row['u'];
                                         
                                         $q3="select post_caption as p from postforall where post_id=$post_id";
                                         $r3=mysqli_query($dbc,$q3);
                                         if($r3)
                                         {
                                             if(mysqli_num_rows($r3)>0)
                                             {
                                                 $rowd=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                                 $p_cap=$rowd['p'];
                                             }
                                         }
                           $q11="select commenter_useri_d as u,cmnt_id as cnt,seen as sn,comment_word as w,comment_time rtm,comment_media as m  from post_comments where post_id=$post_id order by cmnt_id desc";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                             
                                if(mysqli_num_rows($r11)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
                                         $ucnt=$ucnt+1;
		       if($ucnt>=11)
		       {
		              break;
		       }
                                              $his_id=$row['u'];
                                              $seen=$row['sn'];
                                          
                                              $comment=$row['w'];
                                              $ctime=$row['rtm'];
                                              $cmnt_media=$row['m'];
                                              $cmnt_id=$row['cnt'];
                                              if($seen=="1")
                                              {
                                                  $stl="background-color:white";
                                              }else
                                              {
                                                  $stl="background-color:lightgrey";
                                              }
	  $quq="select username as u from users where user_id=$his_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                        $f1_format=substr($cmnt_media,(strlen($cmnt_media)-3),strlen($cmnt_media));
                                              
                                         $qe="select c_name as c from contacts where user_id=$user_id and cu_id=$his_id";
                                         $re=mysqli_query($dbc,$qe); 
                                         if($re)
                                         {
                                             if(mysqli_num_rows($re)>0)
                                             {
                                                 $rowp=mysqli_fetch_array($re,MYSQLI_ASSOC);
                                                 $c_nm=$rowp['c'];
                                             }  else {
                                             $q3="select first_name as f from basic where user_id=$his_id";
                                             $r3=mysqli_query($dbc,$q3);
                                             if($r3)
                                             {
                                                 $rw=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                                 $c_nm=$rw['f'];
                                             }
                                             }
                                         }
                                         
                                         echo'<div class="MNF_Post_CmntItm" >
                                 <div class="MNF_like_itm"  >
                                <div class="MNF_Like_Itmin"  >
                                   
                                    <div class="Notif_Liker"  >
                                        '.$c_nm.' <div class="Notif_Just_Tip" style="cursor: pointer;" onclick="$(\'#MNF_cmnt_poNo'.$ucnt.'\').slideToggle()" title="click to view comment" > Commented on your post <div class="MNF_Gift_CmntArr"></div> </div>
                                              <div class="Notif_Time"  >
                                            <div class="Notif_Gft_Post_No" onmouseover="expndNotfc(\'#img_pofdfdfdstno'.$ucnt.'\',\'#cap_postno'.$ucnt.'\')">
                                                Post No '.$post_id.'
                                            </div>

                                            '.$ctime.'
                                        </div>
                                    </div>
                                    <div class="Notif_Post_CapPre" id="cap_postno'.$ucnt.'" style="display: none;" onmouseout="hideNotfc(\'#img_pofdfdfdstno'.$ucnt.'\',\'#cap_postno'.$ucnt.'\');" >
                                        
                                    </div>
                                </div>

                            </div>
                        

                <div class="MNF_Bulb_Itm" id="MNF_cmnt_poNo'.$ucnt.'" style="background-color: rgba(0,0,200,0.03);margin-bottom: 3px;display: none;margin-left: -10px;"  >
                                <div class="Notif_Msg_In"  >
                                    <div class="NotifMsgPpl">
                                        <div class="Notif_Msg_Pplthme"></div>
                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$p_pic.'" alt="" />
                                    </div>
                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr"></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"> '.$c_nm.'<span class="Notif_MsgDets"><span class="divider" >|</span><span id="likethiscm'.$ucnt.'" style="cursor:pointer;" onclick="putcommentlike(1,'.$cmnt_id.',\'#likethiscm'.$ucnt.'\')"> Like</span> <span class="divider">|</span> <span id="unlikethiscm'.$ucnt.'" onclick="putcommentlike(0,'.$cmnt_id.',\'#unlikethiscm'.$ucnt.'\')" style="cursor:pointer;">Unlike</span> </span> <div class="Notif_Msg_Time"></div> </div>
                                        <div class="Ntf_Msg_Txt">
                                            '.$comment.' 
                                            <div style="margin: 5px;" >';
                                      if($f1_format=="png" || $f1_format=="jpg" || $f1_format=="gif" || $f1_format=="mp3" || $f1_format=="wav" || $f1_format=="ico" || $f1_format=="mid" || $f1_format=="mp4" || $f1_format=="mkv" || $f1_format=="jpeg" )
                                     {
                                     	if($f1_format=="png" || $f1_format=="jpg" || $f1_format=="jpeg" || $f1_format=="gif" || $f1_format=="ico" )
                                     	{
                                     		    echo' <img class="Notif_Gft_Cmnt_Media" src="'.$cmnt_media.'" alt="'.$cmnt_media.'"/>';
                                   
                                     	}
                                     	if($f1_format=="mp3" || $f1_format=="wav" || $f1_format=="mid")
                                     	{
                                     		echo '<audio src="'.$cmnt_media.'" controls></audio>';
                                     	}
                                     	if($f1_format=="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                     	{
                                     		echo '<video src="'.$cmnt_media.'" class="Notif_Gft_Cmnt_Media" width="300" height="250" controls></video>';
                                     	}
                                     }	
                                
                                   echo'</div>

                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            </div>
                           ';
                                       $q4="update post_comments set seen=1 where post_id=$post_id and commenter_useri_d=$his_id";
                                              $r4=mysqli_query($dbc,$q4);
                                       
                                     }
                                 }
                             }else
                             {
                                 echo'empty';
                             }
                             
                             }
                           
                                     }
		   
		   
		   if($ucnt>10)
		   {
		          echo '<div style="cursor:pointer;text-align:center;" onclick="show_more_who_cmnt('.$cmnt_id.',this)">Show More</div>';
		   }
                                 }
                             }
                            
                               
                      
   
  