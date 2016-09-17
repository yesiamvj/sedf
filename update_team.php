
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $battle_id=$_REQUEST['q'];
    
    require 'mysqli_connect.php';
    $q="select battle_name as b from battles where battle_id=$battle_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $battle_nm=$row['b'];
        }
    }

  $q="select group_id as gid,group_name as gn,theme as thm,private as prv,showname as shn,grp_pic as pic from groups where battle_id='$battle_id'";
 
  $r=mysqli_query($dbc,$q);
  if($r)
  {
 $n=0;    
      if(mysqli_num_rows($r)>0)
      {
          
          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
          {
              $n=$n+1;
              if($n==1)
              {
                  $team1_name=$row['gn'];
                  $team1_prvt=$row['prv'];
                  $team1_pic=$row['pic'];
                  $showname1=$row['shn'];
                  $team1_id=$row['gid'];
                  $theme1=$row['thm'];
              }
               if($n==2)
              {
                  $team2_name=$row['gn'];
                  $team2_prvt=$row['prv'];
                  $team2_pic=$row['pic'];
                  $showname1=$row['shn'];
                  $team2_id=$row['gid'];
                  $theme2=$row['thm'];
              }
              
      }
      }
  }else
  {
      $n=mysqli_error($dbc);
     
  }
    $user_id=$_SESSION['user_id'];

    echo'
<div class="Theater_Window" id="CreateNewBattle"  >
              <div class="Theater_Window_Out">
                  <div class="Theater_Window_In">
                      <div class="CloseThWin" onclick="$(\'#CreateNewBattle\').fadeOut()" > X </div>
                      <div class="ThWin_Ttl">
                          Update Team and battle  
                          <br/>'.$team1_name.' '.$team2_name.'
                      </div>
                      <div class="Th_Win_Innr">
                          
                          <div class="New_Group_Quests">
                              <div class="NewGrp_QueItm">
                                  <input class="Th_Win_Inp" id="NewBattleNme" value="'.$battle_nm.'" type="text" placeholder="Update battle name" />
                              </div>
                              <div class="NewGrp_QueItm"> Visibility';
                              if($team1_prvt==0)
                              {
                                  echo '            <input class="NewGrpChks" name="limited" checked  id="batl_visible" type="radio"/> Public
                                  <input class="NewGrpChks"  name="limited" type="radio"/> Private';
                               
                              }  else {
                                  echo'
                                      <input class="NewGrpChks" name="limited" id="batl_visible" type="radio"/> Public
                                  <input class="NewGrpChks" checked name="limited" type="radio"/> Private';
                              }
                               echo'</div>
                              <div class="NewGrp_QueItm">';
                               if($showname1==1)
                               {
                                   echo '         Secret Messages<input class="NewGrpChks" id="allow_secret" name="allow_sec" checked type="radio"/> Allow <input  name="allow_sec" class="NewGrpChks" type="radio" /> Deny <span class="ThWinTip">Team Members can send messages  hiding their names</span>
                              ';
                               }  else {
                                     echo '         Secret Messages<input class="NewGrpChks"  name="allow_sec" id="allow_secret" type="radio"/> Allow <input  name="allow_sec" checked class="NewGrpChks" type="radio"/> Deny <span class="ThWinTip">Team Members can send messages  hiding their names</span>
                              ';
                               }
                         echo'</div>
                              <div class="TeamHoldr">
                                  <div class="TeamTtl" onclick="ExpandNewTeam(\'1\')" ><span class="NewTeam1Name">Team 1</span></div>
                                  <div id="TeamOneHoldr" style="display: none;" >
                                  <input type="file" id="team1_pic" onchange="show_team_pic(1,\'#team1_pict\',this)" style="width:0px;height:0px;"/>
                                  <input type="file" id="team2_pic" onchange="show_team_pic(2,\'#team2_pict\',this)" style="width:0px;height:0px;"/>
                                      <div class="New_Team_Picture" onclick="$(\'#team1_pic\').click();">
                                          
                                          
                                          <div class="NGPic_add_btn" id="team1_pict"><img src="'.$team1_pic.'" class="prev_img" style="max-width:100px;max-heught:100px;"/></div> 
                          </div>
                                      <div class="NewTeamQueHold">
                                          <div class="NewGrp_QueItm">
                                              Team Name &nbsp;&nbsp;&nbsp; <input id="Team1NameInp" value="'.$team1_name.'" oninput="check_team_name(this.value,\'#checked_team1\')" onblur="TeamNameinp(\'1\',\'#checked_team1\')" class="Th_Win_SubInp" type="text" placeholder="Choose a Team Name" /><span id="checked_team1"></span>
                                  </div>
                                  <div class="NewGrp_QueItm">
                                       <input type="color" id="NewTeam1Theme" value="'.$theme1.'" style="width:0px;height:0px;" onchange="NewTeamColorInp(\'Team1\')" />
                            
                                  Team Theme <div class="GroupThmeClr" id="NewTeam1ThmeHold" style="background-color:'.$theme1.';" onclick="$(\'#NewTeam1Theme\').click();" ></div>
                               </div>
                              <input type="hidden" id="team1ppl" value="" />
                              <div class="NewGrp_QueItm">
                                  Add Members <input class="Th_Win_SubInp" p" onclick="$(\'#selectppldiv\').fadeIn();$(\'#team1ppl\').val(\'team1\');$(\'#selectedppldiv\').html(\'\');" type="text" placeholder="Name of Person" /> <span id="NewGrpMembNum"> 1 member</span> 
                              </div>
                                      </div>
                                      
                                  </div>
                                  <div class="TeamTtl" onclick="ExpandNewTeam(\'2\')" ><span class="NewTeam2Name">Team2</span> </div>
                                  
                                  <div id="TeamTwoHoldr" style="display: none;" >
                                      <div class="New_Team_Picture" onclick="$(\'#team2_pic\').click();">
                                     
                              <div class="NGPic_add_btn" id="team2_pict"><img src="'.$team2_pic.'"  class="prev_img" style="max-width:100px;max-heught:100px;"/></div> 
                          </div>
                                      <div class="NewTeamQueHold">
                                          <div class="NewGrp_QueItm">
                                              Team Name &nbsp;&nbsp;&nbsp; <input class="Th_Win_SubInp" oninput="check_team_name(this.value,\'#checked_team2\')" id="Team2NameInp" value="'.$team2_name.'" onblur="TeamNameinp(\'2\')"  type="text" placeholder="Choose a Team Name" /><span id="checked_team2"></span>
                                  </div>
                                  <div class="NewGrp_QueItm">
                                          <input type="color" value="'.$theme2.'" id="NewTeam2Theme" style="width:0px;height:0px;" onchange="NewTeamColorInp(\'Team2\')" />
                          
                                  Team Theme <div class="GroupThmeClr" style="background-color:'.$theme1.';"  id="NewTeam2ThmeHold" onclick="$(\'#NewTeam2Theme\').click();" ></div>
                              </div>
                              
                              <div class="NewGrp_QueItm">
                                  Add Members <input class="Th_Win_SubInp"  type="text" onclick="$(\'#selectppldiv\').fadeIn();$(\'#team1ppl\').val(\'team2\');$(\'#selectedppldiv\').html(\'\');" placeholder="Name of Person" /> <span id="NewGrpMembNum"> 1 member</span> 
                              </div>
                                      </div>
                                      
                                  </div>
                                  
                              </div>
                              
                              <div class="NewGrpSubmit" onclick="update_team_now(\''.$battle_id.'\')">
                                  Create Team
                              </div>
                              
                              
                          </div>
                          
                      </div>
                  </div>
                 
              </div>
              
              <div class="ThSideWindow" id="Team1Memb" style="display: none;" >
                  <div class="ThSideWinTtl" id="Team1MembTtl" ><span class="NewTeam1Name">Team 1</span> Members</div>
                  <div class="ThSideWinIn" id="team1_members">';
                         $online=0;
                         $qq="select members_id as m from group_members where group_id=$team1_id";
                         
                         $rq=  mysqli_query($dbc, $qq);
                         if($rq)
                         {
                              $mem_cnt=0;
                             if(mysqli_num_rows($rq)>0)
                             {
                                
                                 while($rowx=  mysqli_fetch_array($rq,MYSQLI_ASSOC))
                                 {
                                      $mem_cnt=$mem_cnt+1;
                                     $mem1_id=$rowx['m'];
                                 
                                        $qg="select c_name as c from contacts where user_id=$user_id and cu_id=$mem1_id";
                            $rg=mysqli_query($dbc,$qg);
                            if($rg)
                            {
                                if(mysqli_num_rows($rg)>0)
                                {
                                    $ru=  mysqli_fetch_array($rg,MYSQLI_ASSOC);
                                    $mem_name=$ru['c'];
                                }else
                                {
                                    $qr="select first_name as f from basic where user_id=$mem1_id";
                                    $rr=  mysqli_query($dbc, $qr);
                                    if($rr)
                                    {
                                        $ey=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                                        $mem_name=$ey['f'];
                                    }
                                }
                            }
                                     $q="select user_id as u from groups where group_id=$team1_id";
                                     $r=  mysqli_query($dbc, $q);
                                     if($r)
                                     {
                                         $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                                         $admn_id=$rt['u'];
                                         
                                     }
                                     if($admn_id==$user_id)
                                     {
                                         echo"<div id=\"qckRecipItm\" class=\"team1$mem1_id\">$mem_name<span id=\"remvusrbtn\" onclick=\"removedusers($mem1_id,1,this)\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\"$mem1_id\" id=\"team1$mem_cnt\" /> </div>";
                                     }else
                                     {
                                         echo"<div id=\"qckRecipItm\" class=\"team1$mem1_id\">$mem_name<input type=\"hidden\" value=\"$mem1_id\" id=\"team1$mem_cnt\" /> </div>";
                                       
                                     }
                                 }
                             }
                         }
                         echo'
                      
                  </div>
              </div>
              <div class="ThSideWindow" id="Team2Memb" style="display: none;" >
                  <div class="ThSideWinTtl" id="Team2MembTtl" ><span class="NewTeam2Name">Team 2</span> Members</div>
                  <div class="ThSideWinIn" id="team2_members">
                      ';
                          $qz="select user_id as u from groups where group_id=$team2_id or group_id=$team2_id";
                                     $rz=  mysqli_query($dbc, $qz);
                                     if($rz)
                                     {
                                         $rtc=  mysqli_fetch_array($rz,MYSQLI_ASSOC);
                                         $admn_id=$rtc['u'];
                                         
                                     }
                         $q="select members_id as m from group_members where group_id=$team2_id";
                         $r=  mysqli_query($dbc, $q);
                         if($r)
                         {
                              
                             if(mysqli_num_rows($r)>0)
                             {
                                
                                 while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                                 {
                                      $mem_cnt=$mem_cnt+1;
                                     $mem2_id=$row['m'];
                     
                                        $qg="select c_name as c from contacts where user_id=$user_id and cu_id=$mem2_id";
                            $rg=mysqli_query($dbc,$qg);
                            if($rg)
                            {
                                if(mysqli_num_rows($rg)>0)
                                {
                                    $ru=  mysqli_fetch_array($rg,MYSQLI_ASSOC);
                                    $mem_name=$ru['c'];
                                }else
                                {
                                    $qr="select first_name as f from basic where user_id=$mem2_id";
                                    $rr=  mysqli_query($dbc, $qr);
                                    if($rr)
                                    {
                                        $ey=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                                        $mem_name=$ey['f'];
                                    }
                                }
                            }
                            
                                    
                                     if($admn_id==$user_id)
                                     {
                                         echo"<div id=\"qckRecipItm\" class=\"team1$mem2_id\">$mem_name<span id=\"remvusrbtn\" onclick=\"removedusers($mem2_id,2,this)\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\"$mem2_id\" id=\"team1$mem_cnt\" /> </div>";
                                     }else
                                     {
                                  
                                              echo"<div id=\"qckRecipItm\" class=\"team1$mem2_id\">$mem_name<input type=\"hidden\" value=\"$mem2_id\" id=\"team1$mem_cnt\" /> </div>";
                                    
                                     }
                                 }
                             }
                         }
                         if($admn_id==$user_id)
                         {
                             $tot_members=$mem_cnt;
                         }else
                         {
                             $tot_members=2;
                         }
                         echo'
                              <script type="text/javascript">
                          $(document).ready(function()
                          {
                          
                           $("#chkalrdclkd").val("'.$tot_members.'");
                               alert($("#chkalrdclkd").val());
                          });

            </script>
                    
                  </div>
              </div>
              
          </div>';
	        
	        include '../web/notifs.html';
	        }
                                                      
                                                      ?>