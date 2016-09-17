<?php session_commit();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    
    $user_id=$_SESSION['user_id'];
    
    require_once  'mysqli_connect.php';

   echo '

    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'chatWindow.css"/>
   <script src="chatWind.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'onlines.css"/>
   <script src="../web/onlines.js" type="text/javascript"></script>
  <script src="../web/chatWind.js" type="text/javascript"></script>
  
  
 
   <input type="hidden" value="0" id="on_live_convrse" />
   <input type="hidden" value="1" id="on_live_grp_convrse" />
      <div id="content-full">
      <div id="chat_clkd" style="display:none;"></div>
          <div id="SedFed_Online_People">
              <div class="Online_Tab_Hold">
              
              <input type="hidden" value="1" id="which_selected" />
                          <div class="Online_Tab_Itm" id="CurOnlineTab" onclick="show_my_ppl(this)" >
                              People
                          </div>
                          <div class="Online_Tab_Itm" id="CurOnlineTab2"  onclick="show_my_groups(this)">
                              Groups
                          </div>
                          <div class="Online_Tab_Itm" id="CurOnlineTab3" onclick="showmyteams(this)">
                              Teams
                          </div>
                      </div>
              <div class="Online_Ppl_Out">
                  <div class="Online_Ppl_In">
                      
                      <div class="Online_Ppl_Ttl" id="OnTopStatus" >Online  </div> 
                   <!--   <div class="OLV_Type" title="Type of view" >
                          <div class="OLV_Circle" title="Only faces" ></div> <div class="OLV_Sqre" title="Name & Face" ></div> <div class="OLV_Nme" title="Name & Face"></div>
                      </div> -->
                   <div class="Online_Tool_Hold">
                       <div class="Online_Tool_Itm" title="Search" onclick="$(\'#OTEH_Search\').slideToggle();" >
                           <img class="Online_Tool_Img" src="../web/icons/chatwin/search.png" alt="search" />
                       </div>
                       <div class="Online_Tool_Itm" title="Types of View" onclick="$(\'#OTEH_ViewType\').slideToggle();" >
                           <img class="Online_Tool_Img" src="../web/icons/chatwin/view_type.png" alt="View Type" />
                       </div>
                       <div class="Online_Tool_Itm" title="More" onclick="$(\'#OTEH_More\').slideToggle();">
                           <img class="Online_Tool_Img" src="../web/icons/chatwin/moreItms.png" alt="More" />
                       </div>
                       
                       <div class="Online_Tool_Itm" title="I\'m online" onclick="$(\'#OTEH_OnlineState\').slideToggle();" >
                           <div id="Online_Status"  > 
                           </div>
                       </div>
                   </div>
                  <div class="Online_Tool_Expnd" >
                       <div class="OTE_In">
                           <div class="OTE_OState" id="ON_Txt" style="cursor: pointer;" onclick="changeCurOnlineSts()" >I\'m Online</div>
                          
                       </div>
                   </div>
                   <input type="hidden" id="setonoffval" value="1" />
                   <div class="Online_Tool_Expnd" id="OTEH_Search" style="display: none">
                       <div class="OTE_In">
                           <div class="OTE_Itm">
                               <input type="text" oninput="srchonlineppl(this.value)" placeholder="Name of person" />
                           </div>
                       </div>
                   </div>
                   
                      <div class="Online_Tool_Expnd" id="OTEH_ViewType" style="display: none">
                       <div class="OTE_In">
                           <div class="OTE_Itm">
                               <div class="OTE_View_Itm" onclick="$(\'#Online_NameFace\').fadeOut();$(\'#Online_Faces\').fadeIn();" >
                                   <div class="OLV_Circle" title="Only faces"  ></div> Faces
                               </div>
                               <div class="OTE_View_Itm" onclick="$(\'#Online_Faces\').fadeOut();$(\'#Online_NameFace\').fadeIn();" >
                                
                                 <div class="OLV_Sqre" title="Name & Face" ></div> <div class="OLV_Nme" title="Name & Face"></div> Name & Faces
                                 </div>
                               </div>
                       </div>
                   </div>
                   <div class="Online_Tool_Expnd" id="OTEH_More" style="display: none">
                       <div class="OTE_In">
                           <div class="OTE_Itm">
                               <div class="OTE_moreItm" onclick="showOnlinePpl(\'1\',\'.Online_Live_In\')">
                                   Online 
                               </div>
                               <div class="OTE_moreItm" onclick="showOnlinePpl(\'2\',\'#forofflineppl\')">
                                   Offline 
                               </div>
                               <div class="OTE_moreItm" onclick="showOnlinePpl(\'3\',\'#forallcontppl\')">
                                   All People
                               </div>
                               </div>
                       </div>
                   </div>
                   <input type="hidden" value="3" id="wchslctd" />
                   <div class="Online_Tool_Expnd" id="OTEH_OnlineState" style="display: none">
                       <div class="OTE_In">
                           
                           <div style="cursor: pointer;" onclick="changeCurOnlineSts()">
                                <div class="OTE_OSChnge"   >Change
                               <span class="OTE_Nxt_OS" id="ON_Nxt"  >to Offline</span>
                           </div>
                               
                           </div>
                          
                       </div>
                   </div>
                   <!-- here is online people  name & face -->
                   <div class="RightBarHoldr" id="Online_People" style="//display: none;" >
                   <div class="Online_Live_Ppl" id="Online_NameFace" style="//display: none;" >
                        <div id="fortotonl">  <div class="Online_Live_In">';
  

$cday=date('F j, Y');
  $curtime=date("g:i a,s");

  require_once 'mysqli_connect.php';

$qe="SELECT cu_id as c,c_name as cnm from contacts where user_id=$user_id ";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
          $totcnt=0;
          if(mysqli_num_rows($re)>0)
          {
            
            while($rowg=mysqli_fetch_array($re,MYSQLI_ASSOC))
            {

             $his_id=$rowg['c'];
             $cu_id=$his_id;
              $c_name=$rowg['cnm'];
              $quq="select username as u from users where user_id=$cu_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
             $q2="select user_id as u,time as ot,day as day from onlines where user_id=$his_id";
             $r2=mysqli_query($dbc,$q2);
             if($r2)
             {
              if(mysqli_num_rows($r2)>0)
              {
                

              $totcnt=$totcnt+1;
                $row=mysqli_fetch_array($r2,MYSQLI_ASSOC);
      
      $times=$row['ot'];
      $day=$row['day'];
      $sec=strpos($times,",")+1;
      $ntime=substr($times,$sec,strlen($times));
      $csec=strpos($curtime,",")+1;
      $ctime=substr($curtime,$csec,strlen($curtime));
$mytime=substr($times,0,$sec);
      $nmin=substr($times, 0,$sec);
      $cmin=substr($curtime, 0,$csec);
      $chk=$ctime-$ntime;
 
      $difmin=strpos($curtime,":")+1;

      $cdifmin=substr($curtime, $difmin,2);
      $ndifmin=strpos($times,":")+1;

      $ndifmin=substr($times,$ndifmin,2);
      $cutndt=strpos($times, ":");
      $cutcdt=strpos($curtime,":");
      $chhr=substr($curtime,0,$cutcdt);
      $dhhr=substr($times,0,$cutndt);

      $difhr=$chhr-$dhhr;
  

$cdate=strpos($cday,",")-2;
$cdate=substr($cday,$cdate,2);


$ndate=strpos($day,",")-2;
$ndate=substr($day,$ndate,2);

if($cdate>$ndate)
{
  $difmyday=$cdate-$ndate;
}else
{
  $difmyday=0;
}

      $nam=strpos($times,",")-2;
      $cam=strpos($curtime,",")-2;

        $nam=substr($times,$nam,2);
        $cam=substr($curtime,$cam,2);
        

if($cdate>$ndate)
{
  if($nam=="am" && $cam=="am")
  {
    if($dhhr==12){
      $dhhr=0;
    }
if($chhr==12){
      $chhr=0;
    }
      $difhr=(24-$dhhr)+$chhr;
  }
  if($nam=="pm" && $cam=="pm")
  {
    $difhr=(24-(12+$dhhr))+(12+$chhr);
  }
  if($nam=="am" && $cam=="pm")
  {
    if($dhhr==12){
      $dhhr=0;
    }
    $difhr=(24-$dhhr)+(12+$chhr);
  }
  if($nam=="pm" && $cam=="am")
  {
    if($chhr==12){
      $chhr=0;
    }
    $difhr=(24-(12+$dhhr))+$chhr;
  }
  
if($difhr>24)
{
  $difhr=$difhr-24;
 
  
}else
{
   if($difmyday==1 || $difmyday<1)
  {
    $difmyday=0;
  }else
  {
    $difmyday=$difmyday-1;

  }

  
}
$difmyday="$difmyday day";
}else
{
  if($nam=="am" && $cam=="pm")
  {
    if($dhhr==12)
    {
      $dhhr=0;
    }
    $difhr=(12-$dhhr)+$chhr;
  }
  if($nam=="pm" && $cam=="pm")
  {
    $difhr=$chhr-$dhhr;
  }
  if($nam=="am" && $cam=="am")
  {
    $difhr=$chhr-$dhhr;
  }
  $difmyday="";
}

if($cdifmin>=$ndifmin)
        {
          $tdif=$cdifmin-$ndifmin;
        }else
        {
          $tdif=(60+$cdifmin)-$ndifmin;
          if($difhr==1 || $difhr<1)
          {
            $difhr=0;
          }else
          {
            $difhr=$difhr-1;
          }
        }

        
         if($ctime>=$ntime)
        {
          $chk=$ctime-$ntime;
        }else
        {
          $chk=(60+$ctime)-$ntime;
          if($tdif==1 || $tdif<1)
          {
             $tdif=0;
          }else
          {
            $tdif=$tdif-1;
          }
        }
      if($difhr>0)
      {
        $difhr="$difhr hrs";
      }else
      {
        $difhr="";
      }
      if($tdif>0)
      {
        $tdif="$tdif min";
      }else
      {
        $tdif="";
      }

$myday="$difmyday $difhr  $tdif  $chk secs ";

      if($cmin==$nmin && $chk<10 && $day==$cday)
      {

    echo' <div class="OLPN_Itm" onclick="openwind(\''.$cu_id.'\')" id="offclkcuser'.$cu_id.'">
                                  <img class="OLPN_ItmImg" src="'.$p_pic.'" />
                                  <div class="OLPN_ItmName">
                                      '.$c_name.'
                                      <div class="OLPN_ItmDets" title="Online from'.$times.'"><font id="updttime'.$cu_id.'"></font>
                                     <div class="onlvecnt" id="onlvecnt'.$cu_id.'"> '.$myday.'</div>
 
                                      </div> 
                                  </div>
                              </div>';

       
        

    }else
    {
     echo'

<div class="OLPN_Itm" onclick="openwind(\''.$cu_id.'\')" id="offclkcuser'.$cu_id.'">
                                  <img class="OLPN_ItmImg" src="'.$p_pic.'" />
                                  <div class="OLPN_ItmName"  >
                                      '.$c_name.'
                                      <div class="OLPN_ItmDets" id="leave_cnt'.$cu_id.'" title=" Last Online '.$times.' '.$day.'"><font id="updttime'.$cu_id.'"></font>
                                     <div class="onlvecnt" id="onlvecnt'.$cu_id.'">'. substr($day, 0, -6).'</div>
 
                                      </div> 
                                  </div>
                              </div>';
     
                  
    }

              }
              else
             {
              $q="select last_login as ld from history where user_id=$cu_id";
              $r=mysqli_query($dbc,$q);
              if($r)
              {
                $ros=mysqli_fetch_array($r,MYSQLI_ASSOC);
                $mlg=$ros['ld'];
              }


             }
             }
           }
         }
}


       echo'<input type="hidden" value="'.$totcnt.'" id="totonclmycnt" />';
                    
      echo '
                              <div class="forFullView"></div>
                          </div></div>
                      </div>
                   <div class="Online_Live_Ppl" id="Online_Faces" style="display: none;" >
                          <div class="Online_Live_In">
                              
                              <div class="forFullView"></div>
                          </div>
                      </div>
                      </div>
                   <div class="RightBarHoldr" id="Offline_People" style="display: none;" >
                   <div class="Online_Live_Ppl" id="Offline_NameFace" style="//display: none;" >
                          <div class="Online_Live_In">
                              
                             
                              <div class="forFullView"></div>
                          </div>
                      </div>
                
                      </div>
                   <div class="RightBarHoldr" id="AllPpl_People" style="display: none;" >
                   <div class="Online_Live_Ppl" id="AllPpl_NameFace" style="//display: none;" >
                          <div class="Online_Live_In">
                             
                              <div class="forFullView"></div>
                          </div>
                      </div>
                  
                      </div>
                   <div class="Online_Active_Chat" id="Online_Active_Chat_Hold" >
                       <div class="OAC_Out" id="OAC_ContHolder" >
                           <div class="OAC_In" id="for_active_chat">
                          
                            ';
        
       
       
       $qe="SELECT cu_id as c,c_name as cnm from contacts where user_id=$user_id ";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
          $totcnt=0;
          
          if(mysqli_num_rows($re)>0)
          {
            
            while($rowg=mysqli_fetch_array($re,MYSQLI_ASSOC))
            {

             $his_id=$rowg['c'];
             $cu_id=$his_id;
              $c_name=$rowg['cnm'];
             $quq="select username as u from users where user_id=$cu_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                      
              
               echo '<div id="active_user'.$cu_id.'" class="active_chat_users"><div class="OAC_Itm"  onclick="openwind('.$cu_id.')">
                                                  <img class="OAC_ItmImg" src="'.$p_pic.'" />
                                                  <div class="OAC_ItmCount" id="for_each_usr_cnt'.$cu_id.'"><span class="for_act_chat_cnt"   id="active_msg_cnt'.$cu_id.'">0</span></div>
                                              </div></div>'; 

           }
         }
}
       
        $q="select gp_msg_id as m,group_id as gid from group_msg_seen where member_id=$user_id  ";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
            $g=0;
            if(mysqli_num_rows($r)>0)
            {
	  while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	  {
	         $g=$g+1;
	         $group_id=$row['gid'];
	         $msg_id=$row['m'];
	         $q1="SELECT battle as btl from group_messages where group_id=$group_id and `grp_msg_id` >= $msg_id and grp_msg_id!=$msg_id order by grp_msg_id desc";
                      $r1=mysqli_query($dbc,$q1);
	     if($r1)
	     {
	            $q3="select grp_pic as p,theme as th from groups where group_id=$group_id";
              $r3=  mysqli_query($dbc,$q3);
              if($r3)
              {
                  if(mysqli_num_rows($r3)>0)
                  {
                      $ry=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                      $p_pic=$ry['p'];
                   
                  }else
                  {
                      $p_pic="../web/icons/male.png";
                      $theme="#ef0000";
                  }
              }
	           if($g>1)
	         {
	           $grp_ids=$pre_g.'_'.$group_id.'';
	              
	         }else
	         {
	                $grp_ids="$group_id";
	               
	         }
	         
	         $pre_g='_'.$grp_ids;
	     
              if($g>1)
              {
	    
	    if(!strpos($grp_ids, "$group_id")>-1)
	    {    echo '<div id="active_user_group'.$group_id.'" class="group_active_chats"><div class="OAC_Itm"  onclick="opengroup_chat('.$group_id.')">
                                                  <img class="OAC_ItmImg" src="'.$p_pic.'" />
                                                  <div class="OAC_ItmCount" id="for_each_usr_cnt'.$group_id.'"><span class="for_act_chat_cnt"   id="active_msg_cnt'.$group_id.'">'.mysqli_num_rows($r1).'</span></div>
                                              </div></div>';
              
	           
	    }
              }  else {
	        echo '<div id="active_user_group'.$group_id.'" class="group_active_chats"><div class="OAC_Itm"  onclick="opengroup_chat('.$group_id.')">
                                                  <img class="OAC_ItmImg" src="'.$p_pic.'" />
                                                  <div class="OAC_ItmCount" id="for_each_usr_cnt'.$group_id.'"><span class="for_act_chat_cnt"   id="active_msg_cnt'.$group_id.'">'.mysqli_num_rows($r1).'</span></div>
                                              </div></div>';
              
              }
              
              $pre=$group_id;
	    
	    
	     }
	     
	     
	         
	    }
            }
     }
	           echo '
                          </div>
                       </div>
                          
                       <div id="OAC_Minimized" onclick="$(\'#OAC_ContHolder\').slideToggle()" >Active Chats <div class="OAC_Minimize"> - </div></div>
                          
                      </div>
                  </div>
              </div>
          </div>
                 
                  
<div id="for_grp_and_team_creat"></div>
      </div>
 
<div id="forchatwindow"></div>
';


}
?>