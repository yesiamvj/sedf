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
                            
                               <div class="OTE_moreItm" onclick="show_other_teams()">
                                  Join a Topic
                               </div>
	              <div class="OTE_moreItm" onclick="showmyteams()">
                                  Show my teams
                               </div>
                              
                               </div>
                       </div>
                   </div>
                    <div class="OTE_moreItm" onclick="open_crt_team_chat()">
                                  Create a new team
                               </div>
                   ';
   echo '<div id="teams_hold">';
    $q="select group_id as g from group_members where members_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $group_id=$row['g'];
                
            $qw="select group_id as g,battle_id as b from groups where group_id=$group_id and battle=1";
        
            $rw=  mysqli_query($dbc,$qw);
            if($rw)
            {
                if(mysqli_num_rows($rw)>0)
                {
                    $batl_row=  mysqli_fetch_array($rw,MYSQLI_ASSOC);
                    $batl_id=$batl_row['b'];
                    $team_id=$batl_row['g'];
                    
                    $qb="select battle_name as b,user_id as u from battles where battle_id=$batl_id";
                    $rb=  mysqli_query($dbc, $qb);
                    if($rb)
                    {
                        $row_b=  mysqli_fetch_array($rb,MYSQLI_ASSOC);
                        $battle_name=$row_b['b'];
	       $battle_user=$row_b['u'];
	       $mybatl=0;
	       if($battle_user==$user_id)
	       {
	       $mybatl=1;       
	       }
                    }
	   
                  
                    echo'<div class="OLTeamItm">
                                  <div class="TeamTopicTtl">
                                      '.$battle_name.'
                                      <img class="ico_TeamSet" src="icons/chatwin/team_Sets.png" onclick="$(\'#OLTM_set'.$batl_id.'\').fadeToggle()" />
                                  </div>
                                  <div class="OLTM_TmSets" id="OLTM_set'.$batl_id.'">
                                     
                                      <div class="OLTM_TmSetCont">
                                          <div class="OLPN_TmSetIn">';
	   if($battle_user==$user_id)
	   {
	          echo'                   <div class="OLTM_TmSetItm" onclick="open_update_team(\''.$batl_id.'\')" >
                                              Update Settings
                                          </div>
                           ';
	   }
                                         echo' <div class="OLTM_TmSetItm" onclick="leave_from_topic('.$batl_id.')">
                                              Leave from Topic bid='.$batl_id.' '.$battle_user.' 
                                          </div>
                                         
                                          </div>
                                         
                                      </div>
                                  </div>';
                    
                     $qe="select group_id as g,grp_pic as pic from groups where battle_id=$batl_id";
  $re=  mysqli_query($dbc, $qe);
  if($re)
  {
      if(mysqli_num_rows($re)>0)
      {
          $g1=0;
          while($rowd=  mysqli_fetch_array($re,MYSQLI_ASSOC))
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
              $grp_pic=$rowd['pic'];
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
    
                    $qs2="select group_name as g,group_id as gi,grp_pic as gpic from groups where battle_id=$batl_id";
                  
                    $rs2=  mysqli_query($dbc,$qs2);
                    if($rs2)
                    {
                        if(mysqli_num_rows($rs2)>0)
                        {
                            while($rwss=  mysqli_fetch_array($rs2,MYSQLI_ASSOC))
                            {
                                $group_name=$rwss['g'];
                                $grp_pic=$rwss['gpic'];
                                $team_id=$rwss['gi'];
         $q1q="select members_id as m from group_members where group_id=$team_id";
                $r1q=  mysqli_query($dbc, $q1q);
                if($r1q)
                {
                    $memc=0;
                    $online=0;
                    $cday=date('F j, Y');
  $curtime=date("g:i a,s");
                    if(mysqli_num_rows($r1q)>0)
                    {
                        while($rowsd=  mysqli_fetch_array($r1q,MYSQLI_ASSOC))
                        {
                            $memc=$memc+1;
                            $member_id=$rowsd['m'];
                               $q2="select user_id as u,time as ot,day as day from onlines where user_id=$member_id";
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
          $qx="select myupdate as bg from access where user_id=$member_id limit 1";
       $rx=mysqli_query($dbc,$qx);
       if($rx)
       {
           $rowx=mysqli_fetch_array($rx,MYSQLI_ASSOC);
           $updt=$rowx['bg'];
       }
       if($updt=="1")
       {
           $qz="select user_id as u,browser as bs,login as lg,logout as lgo,ip_add as ip,day as d from access where user_id=$member_id order by acc_id desc limit 1";
       
       }
       if($updt=="2")
       {
          $qz="select user_id as u,browser as bs,login as lg,logout as lgo,ip_add as ip,day as d from access where user_id=$member_id limit 1";
        
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
           }
       }
       
      
     }
             
             }
             }
             
             // from online
             
                            
                            
                            
                        }
                    }
                }
                                echo'   <div class="OLPN_Itm" onclick="open_team_chat(\''.$myteam.'\',\''.$batl_id.'\')">
                                  
                                  <img class="OLPN_ItmImg" src="'.$grp_pic.'" />
                                  <div class="OLPN_ItmName" style="color:brown" >
                                     '.$group_name.'
                                      <div class="OLPN_ItmDets" style="cursor:pointer;" onmouseout="$(\'.team_mems_hold'.$team_id.'\').fadeOut()" onmouseover="show_tem_mems(\''.$team_id.'\',\'.team_mems_hold'.$team_id.'\',\'#showed_members'.$team_id.'\')" >
                                          '.$online.'/'.$memc.'
                                      </div>
                                      <div class="team_mems_hold'.$team_id.'" style="display:none;">
                                      <div class="my_team_members" id="showed_members'.$team_id.'">
                                      
                                      </div>
                                      </div>
                                    
                                  </div>
                              </div>';
                            }
                        }
                    }
                    echo' 
                             
                                
                              </div>
                              ';
                
                
                }
            }
               
            }
        }
    }else
    {
        echo mysqli_error($dbc);
    }
    echo'</div>';
    echo '  <div id="rmvd_user_team1"></div>
                      <div id="rmvd_user_team2"></div>
                      <input type="hidden" value="" id="tot_delt_vals" />
                      <div id="for_grp_and_team_creat"></div>';
}