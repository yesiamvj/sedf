<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['myw']))
{
    header("location:index.php");
}else
{
   $user_id=$_SESSION['user_id'];
   echo $user_id;
   require 'mysqli_connect.php';
   $q="select notif_id as nid,user_id as c,notice as nt,time as t,my_notif_id as m,officiale as of,discription as disc  from notification where ( cu_id=$user_id or user_id=$user_id ) and  officiale!=2 and ( discription!=5 and user_id!=$user_id)  order by notif_id desc ";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
          $loaded=0;
       if(mysqli_num_rows($r)>0)
       {
           $n=0;
           echo mysqli_num_rows($r);
      while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
      {  
          echo'<div>';
          $his_id=$row['c'];
            $n=$n+1;
            
        $my_notif_id=$row['m'];
        $notif_id=$row['nid'];
        $officiale=$row['of'];
        $notification=$row['nt'];
        $discription=$row['disc'];
        $notification_id=$row['nid'];
        $notification_time=$row['t'];
          $mypic='../'.$_SESSION['user_name'].'/ppic5.jpg';
        if($officiale==444545)
        {
               $q2="select wishes as wish,wish_image as w_img,day as d ,month as m,year as y,wished_at as at,who_wished as who,wish_id as wid,hour as hr,min as min,noon as nn,seen as sn from wishes where wished_to=$user_id and delt=0 order by wish_id desc";
	 $r2=  mysqli_query($dbc, $q2);
               if($r2)
               {
	      $cday=date('j');
	           $cur_month=date('n');
	           $cur_year=date('y');
	           $cur_hour=date('g');
	           $cur_min=date('i');
	           $cur_noon=date('A');
	           
	     if(mysqli_num_rows($r2)>0)
	     {
	            while($row=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
	            {
		$who_wished=$row['who'];
		    $wishes=$row['wish'];
		    $wish_image=$row['w_img'];
		    $day=$row['d'];
		    $wish_id=$row['wid'];
		    $month=$row['m'];
		    $year=$row['y'];
		    $hour=$row['hr'];
		    $min=$row['min'];
		    $noon=$row['nn'];
		    $wished_at=$row['at'];
		    $seen=$row['sn'];
		    $my_noon=1;
		    $cur_my_noon=1;
		    
		    if($noon=="AM")
		    {
		           $my_noon=0;
		    }
		    
		    if($cur_noon=="AM")
		    {
		           $cur_my_noon=0;
		    }
		     if($hour>=$cur_hour)
			  {
			         
			         if($my_noon>=$cur_my_noon)
			         {
			                $hr_show=0;
			         }  else {
			         $hr_show=1;       
			         }
			  }
			  if($min>=$cur_min)
			  {
			          if($my_noon>=$cur_my_noon)
			         {
			                $min_show=0;
			         }  else {
			         $min_show=1;       
			         }
			  }
			  if($cur_my_noon!=0)
			  {
			         $show_hour=12+$cur_hour;
			  }  else {
			  $show_hour=$cur_hour;       
			  }
			  $mean_day=$cday-$day;
			  $year=  substr($year, 1,strlen($year));
			  $mean_hr=$show_hour-$hour;
	            if($cday>=$day && $cur_month>=$month && $cur_year>=$year && ($show_hour>=$hour  || $mean_day>=1)  && ($cur_min>=$min || $mean_hr>=1) && ($cur_my_noon>=$my_noon || $seen==1))
		    {
		   $qr="update notification set seen=1 where my_notif_id=$notification_id";
     $rr=mysqli_query($dbc,$qr);
     
           
          $time=$notification_time;
          $my_id=$user_id;
                  $q="select img_q10 as p from prof_pic_images where user_id=$my_id ";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $p_pic=$rpw['p'];
                              
                          }  else {
                              
                                 $q1="select sex as s from basic where user_id=$my_id";
                                            $r1=mysqli_query($dbc,$q1);
                                            if($r1)
                                            {
                                                if(mysqli_num_rows($r1)>0)
                                                {
                                                $rt=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                                                $gen=$rt['s'];
                                                if($gen=="boy")
                                                {
                                                        $p_pics='..web/icons/male.png';
                                                }else
                                                {
                                                    $p_pics='..web/icons/girl.png';
                                                }    
                                                }else
                                                {
                                                    $p_pics='../web/icons/male.png';
                                                }
                                                
                                            }  
                          }
                      }
                    
           $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$his_id";
           $r3=mysqli_query($dbc,$q3);
           if($r3)
           {
               $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
               if(!empty($roi))
               {
                   
               $c_nm=$roi['c'];
               }else
               {
                   $q5="select first_name as f from basic where user_id=$his_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $c_nm=$ry['f'];
                   }
               }
            }
            
            $q2="select cu_id as c from notification where my_notif_id=$my_notif_id and my_notif_id!=0";
            $r2=mysqli_query($dbc,$q2);
            if($r2)
            {
                
               $tot=mysqli_num_rows($r2);
            }
      if($n>1)
      {
          if($pre!=$my_notif_id)
          {
              $m=0;
          }  else {
              $m=1;
          }
          
      }else {
      $m=0;    
      }
           if($his_id==$user_id && $m==0)
           
	 {
	 /*
              echo' <div class="MNF_Msg_Itm"   onmouseout="$(\'#shownotifpplls'.$notif_id.'\').fadeOut();">
                                <div class="Notif_Msg_In_Out">
                                    <div class="NotifMsgPpl_Out"  >

                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$mypic.'" alt="MYface" />
                                    </div>

                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr_Out"  ></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"><span class="Notif_To" >To</span><span onmouseover="shownotifpeople(\''.$my_notif_id.'\',\''.$notif_id.'\')"> '.$tot.' People</span><span class="Notif_MsgDets"> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt">';
     
              echo'</div>
                                    </div>
                                    </div>

                                </div>
                            </div>';
                           echo'<div class="for_out_notifpplshows" id="shownotifpplls'.$notif_id.'" style="display:none;"><div id="notifpplcont'.$my_notif_id.'"></div></div>';
      
           }elseif($user_id!==$his_id)
           {
	
               $q4="select seen as s from notification where my_notif_id=$my_notif_id";
               $r4=mysqli_query($dbc,$q4);
               if($r4)
               {
                   $rty=mysqli_fetch_array($r4,MYSQLI_ASSOC);
                   $seen=$rty['s'];
               }
               if($seen==1)
               {
                   $stl="background-color:whitesmoke;cursor:pointer;";
               }  else {
                   $stl="background-color:lightgrey;cursor:pointer;";
               }
             echo'  <div class="MNF_Bulb_Itm" style="'.$stl.'" id="notifnm'.$n.'" onclick="iamseennot('.$my_notif_id.',\'#notifnm'.$n.'\')" >
                                <div class="Notif_Msg_In"  >
                                    <div class="NotifMsgPpl">
                                        <div class="Notif_Msg_Pplthme"></div>
                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$ppic.'" alt="'.$c_nm.'" />
                                    </div>
                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr"></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"> '.$c_nm.' <span class="Notif_MsgDets"><span class="divider" >|</span><span class="pointnotif_ppl" '; 
             if($tot==0)
             {
                   echo' >'; 
           
             }else
             {
               echo'onmouseout="$(\'#shownotifpplls'.$notif_id.'\').fadeOut();" onmouseover="shownotifpeople(\''.$my_notif_id.'\',\''.$notif_id.'\')" >with '.$tot.' people';  
             }
              echo'</span> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt">
                                            '.$notification.'
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <div id="notifpplsh"></div>
';
                       echo'<div class="notifpplshows" id="shownotifpplls'.$notif_id.'" style="display:none;"><div id="notifpplcont'.$my_notif_id.'"></div></div>';
      */
           }
      
       $pre=$my_notif_id;
       
       echo'</div>';
	           }
	            
	  
	            }	   
		  
		           
	     }
               }
        }else
        {
                 $qr="update notification set seen=1 where my_notif_id=$my_notif_id";
     $rr=mysqli_query($dbc,$qr);
     
           $notice=$row['nt'];
           $time=$row['t'];
         
          $q2="SELECT username as u from users where user_id=$his_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$his_username=$row2['u'];
			}
			$ppic='../'.$his_username.'/ppic10.jpg';
           $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$his_id";
           $r3=mysqli_query($dbc,$q3);
           if($r3)
           {
               $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
               if(!empty($roi))
               {
                   
               $c_nm=$roi['c'];
               }else
               {
                   $q5="select first_name as f from basic where user_id=$his_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $c_nm=$ry['f'];
                   }
               }
            }
            
            $q2="select cu_id as c from notification where my_notif_id=$my_notif_id and my_notif_id!=0";
            $r2=mysqli_query($dbc,$q2);
            if($r2)
            {
                
               $tot=mysqli_num_rows($r2);
            }
      if($n>1)
      {
          if($pre!=$my_notif_id)
          {
              $m=0;
          }  else {
              $m=1;
          }
          
      }else {
      $m=0;    
      }
      
           if($his_id==$user_id && $m==0)
           {
	 $loaded=$loaded+1;
              echo' <div class="MNF_Msg_Itm"   onmouseout="$(\'#shownotifpplls'.$notif_id.'\').fadeOut();">
                                <div class="Notif_Msg_In_Out">
                                    <div class="NotifMsgPpl_Out"  >

                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$ppic.'" alt="MYface" />
                                    </div>

                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr_Out"  ></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"><span class="Notif_To" >To</span><span onmouseover="shownotifpeople(\''.$my_notif_id.'\',\''.$notif_id.'\')"> '.$tot.' People</span><span class="Notif_MsgDets"> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt">';
          
              echo $notice;
     
              echo'</div>
                                    </div>
                                    </div>

                                </div>
                            </div>';
                           echo'<div class="for_out_notifpplshows" id="shownotifpplls'.$notif_id.'" style="display:none;"><div id="notifpplcont'.$my_notif_id.'"></div></div>';
      
           }elseif($user_id!==$his_id)
           {
	 $loaded=$loaded+1;
               $q4="select seen as s from notification where my_notif_id=$my_notif_id";
               $r4=mysqli_query($dbc,$q4);
               if($r4)
               {
                   $rty=mysqli_fetch_array($r4,MYSQLI_ASSOC);
                   $seen=$rty['s'];
               }
               if($seen==1)
               {
                   $stl="background-color:whitesmoke;cursor:pointer;";
               }  else {
                   $stl="background-color:lightgrey;cursor:pointer;";
               }
             echo'  <div class="MNF_Bulb_Itm" style="'.$stl.'" id="notifnm'.$n.'" onclick="iamseennot('.$my_notif_id.',\'#notifnm'.$n.'\')" >
                                <div class="Notif_Msg_In"  >
                                    <div class="NotifMsgPpl">
                                        <div class="Notif_Msg_Pplthme"></div>
                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$ppic.'" alt="'.$c_nm.'" />
                                    </div>
                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr"></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"> '.$c_nm.' <span class="Notif_MsgDets"><span class="divider" >|</span><span class="pointnotif_ppl" '; 
             if($tot==0)
             {
                   echo' >';  
           
             }else
             {
               echo'onmouseout="$(\'#shownotifpplls'.$notif_id.'\').fadeOut();" onmouseover="shownotifpeople(\''.$my_notif_id.'\',\''.$notif_id.'\')" >with '.$tot.' people';  
             }
              echo'</span> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt">
                                            '.$notice.'
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <div id="notifpplsh"></div>
';
                       echo'<div class="notifpplshows" id="shownotifpplls'.$notif_id.'" style="display:none;"><div id="notifpplcont'.$my_notif_id.'"></div></div>';
      
           }
      
       $pre=$my_notif_id;
       
       echo'</div>';
        }
   
        if($loaded>7)
        {
               break;
        }
   }
   
   if($loaded<8)
   {
         
   }else
   {
           echo'<div id="for_mv_max_not"><input type="hidden" value="'.$notif_id.'" id="max_notif_id" /></div>';
   echo'<div id="remv_pre_shmr" style="cursor:pointer;background-color:white;paddding:10px;text-align:center;" onclick="showmorenotifs()">Show More Notification </div>';
   
   }
       }else
       {
           echo"<div style=\"padding:50px;color:navy;\">Empty</div>";
       }
       
    
   }
   
}