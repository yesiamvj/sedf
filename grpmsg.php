<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
	   
       echo'
<link rel="stylesheet" href="'.$_SESSION['css'].'onlines.css"/>

   <script src="crtgrp.js" type="text/javascript"></script>
     <div id="content-full" id="crt_new_grp">
     
     <div class="Theater_Window" id="CreateNewGroup"  >
              <div class="Theater_Window_Out">
                  <div class="Theater_Window_In">
                      <div class="CloseThWin" onclick="$(\'#CreateNewGroup\').fadeOut()" > X </div>
                      <div class="ThWin_Ttl">
                          Create New Group
                      </div>
                      <div class="Th_Win_Innr">
                          <div class="New_Group_Picture">
                          <input type="file" id="grppic" onchange="preview_gpic(this)" style="width:0px;height:0px;"/>
                              <div class="NGPic_add_btn" id="grppicprev" onclick=$(\'#grppic\').click();>Add Profile Picture</div> 
                          </div>
                          <div class="New_Group_Quests">
                              <div class="NewGrp_QueItm">
                                  <input class="Th_Win_Inp" id="NewGrpNme" type="text" oninput="check_team_name(this.value,\'#check_grp_rslt\')" placeholder="Group Name" /><span id="check_grp_rslt"></span>
                              </div>
                              <div class="NewGrp_QueItm">
                              <input type="color" id="NewGrpTheme"  style="width:0px;height:0px;" onchange="NewGrpColorInp(\'#NewGrpTheme\',\'#NewGrpThmeHold\')" />
                                  Group Theme <div class="GroupThmeClr" id="NewGrpThmeHold" onclick="$(\'#NewGrpTheme\').click();" ></div>
                                  
                              </div>
                              <div class="NewGrp_QueItm">
                                  Visibility <input class="NewGrpChks" name="prvt"  id="publico" checked type="radio"/> Public <input id="privateo" name="prvt" class="NewGrpChks" type="radio"/> Private
                              </div>
                              <div class="NewGrp_QueItm">
                                  Secret Messages<input checked class="NewGrpChks" id="allowsec" type="radio" name="sec"/> Allow <input class="NewGrpChks" type="radio" name="sec"  id="notallowsec"/> Deny <span class="ThWinTip">Group Members can send messages with hiding their names</span>
                              </div>
                              <div class="NewGrp_QueItm" >

               <input type="hidden" value="45" id="grpaddppl" />
                                  Add Members <input class="Th_Win_SubInp" onclick="show_add_mems(32)" type="text" placeholder="Name of Person" /> <span id="NewGrpMembNum"> </span> 
                              </div>
                              <div class="NewGrpSubmit" id="createbtn" onclick="creategrp()">
                                  Create Group
                              </div>
                              
                              
                          </div>
                          
                      </div>
                  </div>
                 
              </div>
              <div id="for_addppl_dvi"></div>
              <div class="ThSideWindow" id="grp_addmems" style="display:none;">
                  <div class="ThSideWinTtl">Group Members</div>
                  <div class="ThSideWinIn" id="slctdgrpppl">
                      
                     
                  </div>
              </div>
              
          </div>

         
'
;
       
include '../web/notifs.html';
}
?>