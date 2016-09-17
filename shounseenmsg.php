 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];

                    require 'mysqli_connect.php';
                      $q="SELECT user_id as u,sender_id as sid ,msg as m,time as t,msg_file as mf,msg_clr as clr,bg_color as bgc from messages where delt=0 and  sender_id=$user_id and senter_seen=$user_id order by msg_id desc";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            
            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $msg=$row['m'];
                $time=$row['t'];
                $msg_file=$row['mf'];
                $msg_clr=$row['clr'];
                $bg_color=$row['bgc'];
                 $sender_id=$row['u'];
                 $msg_file=$row['mf'];
                $q2="select username as u from users where user_id=$user_id";
                $r2=mysqli_query($dbc,$q2);
                if($r2)
                {
                    $row=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                    $his_un=$row['u'];
                }
                $qqe="select c_name as c from contacts where user_id=$user_id and cu_id=$sender_id";
                $rre=  mysqli_query($dbc, $qqe);
                if($rre)
                {
                    if(mysqli_num_rows($rre)>0)
                    {
                        $roe=  mysqli_fetch_array($rre,MYSQLI_ASSOC);
                        $sender_name=$roe['c'];
                    }  else {
                        $q1="select first_name as f from basic where user_id=$user_id";
                $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                    $sender_name=$row1['f'];
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
                      echo'

                            <div class="MNF_Msg_Itm" id="Notif3" style="max-height:100px;background-color: rgba(0,0,200,0.03);margin-bottom: 3px;//for unread messages this style" onmouseover="$(\'#Notif3\').css({\'background-color\':\'whitesmoke\',\'margin-bottom\':\'0px\'});"  >
                                <div class="Notif_Msg_In">
                                    <div class="NotifMsgPpl">
                                        <div class="Notif_Msg_Pplthme"></div>
                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$p_pic.'" alt="'.$sender_name.'" />
                                    </div>
                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr"></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"> <a href="../users/'.$his_un.'">'.$sender_name.'</a> <span class="Notif_MsgDets"><span class="divider" >|</span> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt" style="background-color:'.$bg_color.'">
                                            <font color="'.$msg_clr.'">'.htmlentities($msg).'</font>
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
                                          echo'<img style="max-width:100px;max-height:100px" src="'.$msg_file.'" />';
                                        }


                                        if($f1_format==="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                        {
                                          $emp=2;
                                            echo'<video style="max-width:100px;max-height:100px" src="'.$msg_file.'" class="Notif_Gft_Cmnt_Media" controls></video>';
                                       
                                        }

                                        if($f1_format=="mp3" || $f1_format=="mid" || $f1_format=="wav")
                                        {
                                            $emp=3;
                                           echo'<audio style="max-width:100px;max-height:100px" src="'.$msg_file.'" class="Notif_Gft_Cmnt_Media" controls></audio>';
                                       
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
                                        </div>
                                            
                                    </div>
                                    </div>

                                </div>
                            </div>

                          

                           


                        ';
            }
            
            $q3="update messages set senter_seen=0,live=0,seen=1 where sender_id=$user_id and user_id=$sender_id";
            $r3=mysqli_query($dbc,$q3);
        
        }else
        {
            echo'<div style="padding:30px;">No New Messages</div>';
        }
    }


                    
                    }
                    ?>