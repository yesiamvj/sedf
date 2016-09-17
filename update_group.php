<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
                      $group_id=$_REQUEST['q'];
                      require 'mysqli_connect.php';
                      $q="select group_name as n ,private as p,theme as thm,showname as shn,grp_pic as pic from groups where group_id=$group_id";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                          $grp_name=$row['n'];
                          $grp_pic=$row['pic'];
                          $private=$row['p'];
                          $showname=$row['shn'];
                          $grp_theme=$row['thm'];
                          
                      }  else {
                          echo mysqli_error($dbc);    
                      }
       echo'

     <div id="content-full" class="create_newgroup_hold">
     <div class="Theater_Window" id="CreateNewGroup"  >
              <div class="Theater_Window_Out">
                  <div class="Theater_Window_In">
                      <div class="CloseThWin" onclick="$(\'#CreateNewGroup\').fadeOut()" > X </div>
                      <div class="ThWin_Ttl">
                          Update '.$grp_name.'
                      </div>
                      <div class="Th_Win_Innr">
                          <div class="New_Group_Picture">
                          <input type="file" id="grppic" onchange="previre_gpic(this)" style="widh:0px;height:0px;"/>
                              <div class="NGPic_add_btn" id="grppicprev" onclick=$(\'#grppic\').click();><img src="'.$grp_pic.'" style="max-width:100px;max-height:100px;"/></div> 
                          </div>
                          <div class="New_Group_Quests">
                              <div class="NewGrp_QueItm">
                                  <input class="Th_Win_Inp" id="NewGrpNme" value="'.$grp_name.'" oninput="check_team_name(this.value,\'#check_grp_rslt\')" type="text" placeholder="Group Name" /><span id="check_grp_rslt"></span>
                              </div>
                              <div class="NewGrp_QueItm">
                              <input type="color" id="NewGrpTheme" value="'.$grp_theme.'"  style="width:0px;height:0px;" onchange="NewGrpColorInp(\'#NewGrpTheme\',\'#NewGrpThmeHold\')" />
                                  Group Theme <div class="GroupThmeClr" style="background-color:'.$grp_theme.'" id="NewGrpThmeHold" onclick="$(\'#NewGrpTheme\').click();" ></div>
                                  
                              </div>
                              <div class="NewGrp_QueItm">';
                                if($private==1)
                                {
                                    echo'         Visibility <input class="NewGrpChks" name="prvt"  id="publico"  type="radio"/> Public <input id="privateo" checked name="prvt" class="NewGrpChks" type="radio"/> Private
                         ';
                                }else
                                {
                                     echo'         Visibility <input class="NewGrpChks" name="prvt"  id="publico" checked  type="radio"/> Public <input id="privateo" name="prvt" class="NewGrpChks" type="radio"/> Private
                         ';
                                }
                             echo' </div>
                              <div class="NewGrp_QueItm">';
                             if($showname==1)
                             {
                                 echo ' Secret Messages<input checked class="NewGrpChks" id="allowsec" type="radio" name="sec"/> Allow <input class="NewGrpChks" type="radio" name="sec"  id="notallowsec"/> Deny <span class="ThWinTip">Group Members can send messages with hiding their names</span>
                            ';
                             }else
                             {
                                  echo ' Secret Messages<input class="NewGrpChks" id="allowsec" type="radio" name="sec"/> Allow <input class="NewGrpChks" checked type="radio" name="sec"  id="notallowsec"/> Deny <span class="ThWinTip">Group Members can send messages with hiding their names</span>
                            ';
                             }
                                 echo'  </div>
                              <div class="NewGrp_QueItm" >

                                  Add Members <input class="Th_Win_SubInp" onclick="$(\'#selectppldiv\').fadeIn();$(\'#grpaddppl\').val(\'45\');" type="text" placeholder="Name of Person" /> <span id="NewGrpMembNum"></span> 
                              </div>
                              <div class="NewGrpSubmit" id="createbtn" onclick="update_grp_now(\''.$group_id.'\')">
                                  Update Group
                              </div>
                              
                              
                          </div>
                          
                      </div>
                  </div>
                 
              </div>
              <div class="ThSideWindow" id="group_add_ppl" style="display:none;">
                  <div class="ThSideWinTtl">Group Members</div>
                  <div class="ThSideWinIn" id="slctdgrpppl">
                      ';
                         $online=0;
                         $qq="select members_id as m from group_members where group_id=$group_id and members_id!=$user_id";
                         
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
                                     $q="select user_id as u from groups where group_id=$group_id";
                                     $r=  mysqli_query($dbc, $q);
                                     if($r)
                                     {
                                         $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                                         $admn_id=$rt['u'];
                                         
                                     }
                                     if($admn_id==$user_id)
                                     {
                                         echo"<div id=\"qckRecipItm\" class=\"grplist$mem1_id\">$mem_name<span id=\"remvusrbtn\" onclick=\"removedusersgroup($mem1_id,'.grplist$mem1_id',$group_id)\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\"$mem1_id\" id=\"grpppl$mem_cnt\" /> </div>";
                                     }else
                                     {
                                         echo"<div id=\"qckRecipItm\" >$mem_name<input type=\"hidden\" value=\"$mem1_id\" id=\"grpppl$mem_cnt\" /> </div>";
                                       
                                     }
                                 }
                             }
                         }
                         echo' </div>
              </div>
          </div><script src="../web/add_grp_chat_mems.js"></script>
          <input type="hidden" value="" id="#tot_remv_grp_usr" />
          <div id="remvd_usrs_grp'.$group_id.'"></div> 
 <link rel="stylesheet" href="../web/'.$_SESSION['css'].'srch_user_css_page.css"/>
              <input type="hidden" id="grpaddppl" value="45" />
             <input type="hidden" id="chkalrdclkd" value="1">                          
             
              <div id="selectppldiv" style="display:none;">
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
'
;

}
?>