<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
     echo'      
                   <div class="Online_Tool_Expnd" id="OTEH_More" >
                       <div class="OTE_In">
                           <div class="OTE_Itm">
                            
                               <div class="OTE_moreItm" onclick="show_to_join_group()">
                                  Join a Group
                               </div>
                              
                               </div>
                       </div>
                   </div>
                   
                   <div class="newGroupBtn" onclick="open_create_group()" >
                     Create New Group
                   </div>';
     echo'<div id="my_grps_hold">';
    $q="select group_id as g from group_members where members_id=$user_id";
    
    $r=mysqli_query($dbc,$q);
    if($r)
    {
         $cday=date('F j, Y');
  $curtime=date("g:i a,s");
        if(mysqli_num_rows($r)>0)
        {
            while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $group_id=$row['g'];
                $q1="select members_id as m from group_members where group_id=$group_id";
                $r1=  mysqli_query($dbc, $q1);
                if($r1)
                {
                    $memc=0;
                    if(mysqli_num_rows($r1)>0)
                    {
                        $online=0;
                        while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
                        {
                            $mem_id=$rows['m'];
                            $memc=$memc+1;
                            $q2="select user_id as u,time as ot,day as day from onlines where user_id=$mem_id";
             $r2=mysqli_query($dbc,$q2);
             if($r2)
             {
                 
              if(mysqli_num_rows($r2)>0)
              {
                

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

     if($cmin==$nmin && $chk<10 && $day==$cday)
      {
         $online=$online+1;
         
       }
        $qx="select myupdate as bg from access where user_id=$mem_id limit 1";
       $rx=mysqli_query($dbc,$qx);
       if($rx)
       {
           $rowx=mysqli_fetch_array($rx,MYSQLI_ASSOC);
           $updt=$rowx['bg'];
       }
       if($updt=="1")
       {
           $qz="select user_id as u,browser as bs,login as lg,logout as lgo,ip_add as ip,day as d from access where user_id=$mem_id order by acc_id desc limit 1";
       
       }
       if($updt=="2")
       {
          $qz="select user_id as u,browser as bs,login as lg,logout as lgo,ip_add as ip,day as d from access where user_id=$mem_id limit 1";
        
       }
       $rz=mysqli_query($dbc,$qz);
       if($rz)
       {
           if(mysqli_num_rows($rz)>0)
           {
               while($rowz=mysqli_fetch_array($rz,MYSQLI_ASSOC))
               {
                   $login=$rowz['lg'];
               }
           }  else {
               
           }
       
      
     }
             
             }
             }
                            
                        }
                    }
                }
                $q2s="select group_name as g ,theme as t ,grp_pic as p from groups where group_id=$group_id and battle=0";
           
                $r2s=mysqli_query($dbc,$q2s);
                if($r2s)
                {
                    $rows=  mysqli_fetch_array($r2s,MYSQLI_ASSOC);
                    $grp_nm=$rows['g'];
                    $grp_thm=$rows['t'];
                    $grp_pic=$rows['p'];
                    if(mysqli_num_rows($r2s)>0)
                    {
                       echo' '
                        . ' <img class="ico_TeamSet" src="icons/chatwin/team_Sets.png" onclick="$(\'#OLTM_set1\').fadeToggle()" />
                                 <div class="OLTM_TmSets" id="OLTM_set1">
                                     
                                      <div class="OLTM_TmSetCont">
                                          <div class="OLPN_TmSetIn">
                                              <div class="OLTM_TmSetItm" onclick="open_update_group(\''.$group_id.'\',\''.$memc.'\')" >
                                              Update Settings
                                          </div>
                                          <div class="OLTM_TmSetItm">
                                              Leave from Group
                                          </div>
                                         
                                          </div>
                                         
                                      </div>
                                      </div>
                        <div class="OLPN_Itm" onclick="opengroup_chat(\''.$group_id.'\')" >
                                  <img class="OLPN_ItmImg" src="'.$grp_pic.'" />
                                  <div class="OLPN_ItmName">
                                      '.$grp_nm.'
                                             
                                          <div style="cursor:pointer;" onmouseout="$(\'.team_mems_hold'.$group_id.'\').fadeOut()" onmouseover="show_tem_mems(\''.$group_id.'\',\'.team_mems_hold'.$group_id.'\',\'#showed_members'.$group_id.'\')" title="Online from '.$login.'">'.$online.' members online of '.$memc.' members</div>
                                            <div class="team_mems_hold'.$group_id.'" style="display:none;">
                                      <div class="my_team_members" id="showed_members'.$group_id.'">
                                      
                                      </div>
                                      </div>
                                      <div class="OLPN_ItmDets" title="Online from"><font id="updttime'.$group_id.'"></font>
                                     <div class="onlvecnt" id="onlvecnt'.$group_id.'"> </div>
 
                                      </div> 
                                  </div>
                              </div>'; 
                    }
                    
                }
            }
        }
    }
    
    echo'</div>';
}