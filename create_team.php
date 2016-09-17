<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
  
    echo'<link rel="stylesheet" href="'.$_SESSION['css'].'onlines.css"/>
           <script src="teams.js" type="text/javascript"></script>
<div class="Theater_Window" id="CreateNewBattle"  >
              <div class="Theater_Window_Out">
                  <div class="Theater_Window_In">
                      <div class="CloseThWin" onclick="$(\'#CreateNewBattle\').fadeOut()" > X </div>
                      <div class="ThWin_Ttl">
                          Create New Battle
                      </div>
                      <div class="Th_Win_Innr">
                          
                          <div class="New_Group_Quests">
                              <div class="NewGrp_QueItm">
                                  <input class="Th_Win_Inp" id="NewBattleNme" type="text" placeholder="Topic of Battle" />
                              </div>
                              <div class="NewGrp_QueItm">
                                  Visibility <input class="NewGrpChks" id="batl_visible" name="public" checked type="radio"/> Public <input class="NewGrpChks" name="public"  type="radio"/> Private
                              </div>
                              <div class="NewGrp_QueItm">
                                  Secret Messages<input class="NewGrpChks" id="allow_secret" name="sec_msg" checked type="radio"/> Allow <input name="sec_msg"  class="NewGrpChks" type="radio"/> Deny <span class="ThWinTip">Team Members can send messages  hiding their names</span>
                              </div>
                              <div class="TeamHoldr">
                                  <div class="TeamTtl" onclick="ExpandNewTeam(\'1\')" ><span class="NewTeam1Name">Team 1</span></div>
                                  <div id="TeamOneHoldr" style="display: none;" >
                                  <input type="file" id="team1_pic" onchange="show_team_pic(1,\'#team1_pict\',this)" style="width:0px;height:0px;"/>
                                  <input type="file" id="team2_pic" onchange="show_team_pic(2,\'#team2_pict\',this)" style="width:0px;height:0px;"/>
                                      <div class="New_Team_Picture" onclick="$(\'#team1_pic\').click();">
                                          
                                          
                                          <div class="NGPic_add_btn" id="team1_pict">Profile Picture</div> 
                          </div>
                                      <div class="NewTeamQueHold">
                                          <div class="NewGrp_QueItm">
                                              Team Name &nbsp;&nbsp;&nbsp; <input id="Team1NameInp" oninput="check_team_name(this.value,\'#checked_team1\')" onblur="TeamNameinp(\'1\',\'#checked_team1\')" class="Th_Win_SubInp" type="text" placeholder="Choose a Team Name" /><span id="checked_team1"></span>
                                  </div>
                                  <div class="NewGrp_QueItm">
                                       <input type="color" id="NewTeam1Theme" style="width:0px;height:0px;" onchange="NewTeamColorInp(\'Team1\')" />
                            
                                  Team Theme <div class="GroupThmeClr" id="NewTeam1ThmeHold" onclick="$(\'#NewTeam1Theme\').click();" ></div>
                               </div>
                              <input type="hidden" id="team1ppl" value="" />
                              <div class="NewGrp_QueItm">
                                  Add Members <input class="Th_Win_SubInp"  onclick="$(\'#selectppldiv\').fadeIn();$(\'#team1ppl\').val(\'team1\');$(\'#selectedppldiv\').html(\'\');$(\'#Team1Memb\').slideDown();" type="text" placeholder="Name of Person" /> <span id="NewGrpMembNum"> </span> 
                              </div>
                                      </div>
                                      
                                  </div>
                                  <div class="TeamTtl" onclick="ExpandNewTeam(\'2\')" ><span class="NewTeam2Name">Team2</span> </div>
                                  
                                  <div id="TeamTwoHoldr" style="display: none;" >
                                      <div class="New_Team_Picture" onclick="$(\'#team2_pic\').click();">
                                     
                              <div class="NGPic_add_btn" id="team2_pict">Profile Picture</div> 
                          </div>
                                      <div class="NewTeamQueHold">
                                          <div class="NewGrp_QueItm">
                                              Team Name &nbsp;&nbsp;&nbsp; <input class="Th_Win_SubInp" oninput="check_team_name(this.value,\'#checked_team2\')" id="Team2NameInp" onblur="TeamNameinp(\'2\')"  type="text" placeholder="Choose a Team Name" /><span id="checked_team2"></span>
                                  </div>
                                  <div class="NewGrp_QueItm">
                                          <input type="color" id="NewTeam2Theme" style="width:0px;height:0px;" onchange="NewTeamColorInp(\'Team2\')" />
                          
                                  Team Theme <div class="GroupThmeClr" id="NewTeam2ThmeHold" onclick="$(\'#NewTeam2Theme\').click();" ></div>
                              </div>
                              
                              <div class="NewGrp_QueItm">
                                  Add Members <input class="Th_Win_SubInp" type="text" onclick="$(\'#selectppldiv\').fadeIn();$(\'#team1ppl\').val(\'team2\');$(\'#selectedppldiv\').html(\'\');$(\'#Team2Memb\').slideDown();" placeholder="Name of Person" /> <span id="NewGrpMembNum"> </span> 
                              </div>
                                      </div>
                                      
                                  </div>
                                  
                              </div>
                              
                              <div class="NewGrpSubmit" onclick="create_team()">
                                  Create Team
                              </div>
                              
                              
                          </div>
                          
                      </div>
                  </div>
                 
              </div>
              
              <div class="ThSideWindow" id="Team1Memb" style="display: none;" >
                  <div class="ThSideWinTtl" id="Team1MembTtl" ><span class="NewTeam1Name">Team 1</span> Members</div>
                  <div class="ThSideWinIn" id="team1_members">
                      
                  </div>
              </div>
              <div class="ThSideWindow" id="Team2Memb" style="display: none;" >
                  <div class="ThSideWinTtl" id="Team2MembTtl" ><span class="NewTeam2Name">Team 2</span> Members</div>
                  <div class="ThSideWinIn" id="team2_members">
                      
                  </div>
              </div>
              
              <link rel="stylesheet" href="srch_user_css_page.css"/>
             <input type="hidden" id="chkalrdclkd" value="1">                          
    <script src="team_src_ppl.js" type="text/javascript"></script> 
              <div id="selectppldiv" style="display:none">
              <div id="selectpplspan">
              Search & Select People
              <button id="selectpplclsbtn" onclick="$(\'#selectppldiv\').fadeOut()">X</button>
              </div>
              <br/><div id="srchboxcontdiv">
              <input type="text" id="searchid" oninput="srchpople(this.value)" class="srchppl" placeholder="Search & Select People" ><br/></div>
              <div id="searchedpplconst"><div id="searchedppl"></div>
              </div>
              <input type="button" value="Add" id="addpplbtn" onclick="$(\'#selectppldiv\').fadeOut();">
              <div id="selectedppldiv"></div>
              </div>
          </div>';
      include '../web/notifs.html';
}
?>