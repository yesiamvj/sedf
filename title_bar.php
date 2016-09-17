
<?php session_commit();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
         $user_id=$_SESSION['user_id'];
         require_once '../web/mysqli_connect.php';
         include'../web/notes.php';
          $q3="select first_name as f from basic where user_id=$user_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $my_name=$rt['f'];
	        }else
	        {
	               $my_name="";
	        }
	 }
	    $my_id=$user_id;
                  $q="select img_q10 as p from prof_pic_images where user_id=$my_id ";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $p_pics=$rpw['p'];
                              
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
                                                        $p_pics='../web/icons/male.png';
                                                }else
                                                {
                                                    $p_pics='../web/icons/girl.png';
                                                }    
                                                }else
                                                {
                                                    $p_pics='../web/icons/male.png';
                                                }
                                                
                                            }  
                          }
                      }
                      $ppics='../'.$user_id.'/ppic5.jpg';
	      $q="select lock_pass as lp,locked as lk from person_config where user_id=$user_id";
	       $r=  mysqli_query($dbc,$q);
	       if($r)
	       {
	              if(mysqli_num_rows($r)>0)
	              {
		    $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		    $password=$row['lp'];
		    $locked=$row['lk'];
	              }  else {
		$locked=0;    
	              }
	       }else
	       {
	              $password="";
	       }   
	              
         echo '<!DOCTYPE html>
<html>
  <head>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'mainBar.css"/>
   <script src="../web/jquery.min.js"></script>
   <script src="../web/mainBar.js" type="text/javascript"></script>
  </head>
  
  <body onload="showPageLoadStatus()" ><input type="hidden" value="'.$password.'" id="lock_pass" />
      <div id="content-full">
          <script>
              $(function() {
  $(\'a[href*=#]:not([href=#])\').click(function() {
    if (location.pathname.replace(/^\//,\'\') == this.pathname.replace(/^\//,\'\') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $(\'[name=\' + this.hash.slice(1) +\']\');
      if (target.length) {
        $(\'html,body\').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
          </script>
           
          <div id="SedFed_PageStatus">
              <input type="hidden" value="Name" id="srchthis" />
                <div id="SF_OpeningLogo">SedFed</div>
                <div id="SF_pageLoadStatus">
                    <div id="SF_pageLiveLoadedStatus" ></div>
                </div>
          </div>
          <div id="SF_BigSearch" class="BigSearchBarOut" style="display: none;" >
          <div class="BigSearchBarIn">
             <input type="text" id="SF_inpBigSrch" class="search_sedfed" oninput="searchsedfed(this.value);" onblur="$(\'.SF_BigSrchResultOut\').fadeOut();" onclick="$(\'.SF_BigSrchResultOut\').fadeIn();" placeholder="Search People on SedFed ..." />
              
                <script>
                  function srchInp(){
                      $(\'.SFTB_srchInp\').val($(\'#SF_inpBigSrch\').val());
                      if($(\'#SF_inpBigSrch\').val()===\'\'){
                          $(\'#SF_SearchSugg\').slideUp();
                          
                      }
                      else{
                          $(\'#SF_SearchSugg\').slideDown();
                      }
                  }
                  </script>
            
                  <div class="BigSearchType">
                      <select onchange="BigSrchTypeSelcted(\'#BigSearchTypeSlct\')" id="BigSearchTypeSlct" >
                          <option value="People" >People</option>
                          <option value="Posts" >Posts</option>
                          <option value="Messages" >Messages</option>
                          <option value="FlashNews" >Flash News</option>
                          <option value="Pages" >Group/Page</option>
                          
                          
                      </select>
                  </div>
                  
                  <!-- don\'t change id\'s of any filter used in jquery -->
                  <input type="hidden" value="Name" id="srchthis" />
                  <div class="BigSearchTypeFilters" id="BST_People" style="display: block;" >
                      <select onchange="$(\'#srchthis\').val(this.value);$(\'.search_sedfed\').attr(\'placeholder\',\'Search by \'+this.value+\'\');">
                          <option>Name</option>
                          <option>SedFed ID</option>
                          <option>Mobile No</option>
                          <option>Email</option>
                          <option>Place</option>
                          <option>School / College</option>
                          
                      </select>
                  </div>
                  <div class="BigSearchTypeFilters" id="BST_Posts" style="display: none;" >
                      <select onchange="$(\'#srchthis\').val(this.value);$(\'.search_sedfed\').attr(\'placeholder\',\'Search by \'+this.value+\'\');">
                          <option>Poster Name</option>
                          <option>Post ID</option>
                          <option>Post Caption</option>
                          <option>HashTag</option>
                          gi<option>@-Tag</option>
                      </select>
                  </div>
	  <div class="BigSearchTypeFilters" id="BST_Pages" style="display: none;" >
                      <select onchange="$(\'#srchthis\').val(this.value);$(\'.search_sedfed\').attr(\'placeholder\',\'Search by \'+this.value+\'\');">
                          <option>Group/Page Name</option>
                          <option>Group/Page ID</option>
                          
                      </select>
                  </div>
                  <div class="BigSearchTypeFilters" id="BST_Messages" style="display: none;" >
                      <select onchange="$(\'#srchthis\').val(this.value);$(\'.search_sedfed\').attr(\'placeholder\',\'Search by \'+this.value+\'\');">
                          <option>Sender Name</option>
                          <option>Message Text</option>
                          
                      </select>
                  </div>
                  <div class="BigSearchTypeFilters" id="BST_FlashNews" style="display: none;" >
                      <select onchange="$(\'#srchthis\').val(this.value);$(\'.search_sedfed\').attr(\'placeholder\',\'Search Flash news by \'+this.value+\'\');">
                          <option>Flash Message</option>
                          <option>Name of Person</option>
                          <option>Flash ID</option>
                          
                      </select>
                      
                  </div>
                  <div class="closeBigSearch" onclick="$(\'#SF_BigSearch\').fadeOut();$(\'#SedFed_SearchTheater\').fadeOut();" >
                          X
                      </div>
              <div class="BS_Prcd" title="Search">
                  <img class="ico_TtlBarSrch" alt="Search"  src="../web/icons/mainBar/search.png" onclick="search_full()" />
              </div>
          </div>
      </div>
      

      <div class="SF_BigSrchResultOut" id="SF_SearchSugg" style="display: none;" >
          <div id="srch_result_cont"></div>
          <div id="for_show_all_result" onclick="search_full()">Show all results about this</div>
      </div><div id="mob_no_tip" style="display:none;">You have enter minimum 8 digit number</div>
          <div class="SedFedTitleBar">
             <div class="SedFedLogo">
                <div id="sedfedLogoTop"></div>
                <div id="sedfedLogoProgress"></div>
            </div>
              <div class="TitleBarOut">
                  <div class="TtlBarIn">
                      <div class="TtlBarTtl"   >
                      <a target="_blank" href="../web/">
                          <img class="TopProfPic" id="sf_logoTop" src="../web/sedfed2.png" style="border-radius:0px;" alt="SedFed"/>
                        </a>
                      </div>
                      <div class="TtlBar_SrchHold">
                          <div class="SFTB_srchIn">
                          <div class="mBdecPre"></div>
                              <input class="SFTB_srchInp" type="text" placeholder="Search People , Posts , Etc.,"  onclick="$(\'#SF_BigSearch\').show();$(\'#SF_inpBigSrch\').focus();" />
                                 <div class="mBdecNext"></div>
                          </div>
                           <div class="TtlBarTtl"   >
                          <img class="TopProfPic" src="'.$ppics.'" alt="SedFed"/>
                         <a target="_blank" href="../'.$_SESSION['user_name'].'"> <div class="SedFedUserName">'.$my_name.'  </div></a>
                      </div>
                          <div class="SFTB_searchSubmit">
                           
                          </div>
                      </div>
                 
                      
                      <div class="TtlBarAccountActs">
                          <div class="TtlBarACactIn">
                              
                              <div class="TACT_Logout" onclick="$(\'#MyAccountAct\').slideToggle();" >
                                  <img class="ico_sf_Logout"  src="../web/icons/mainBar/powerB.png" alt="Logout" />
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="AccountActsHold" id="MyAccountAct" style="display: none;" >
                      <div class="AccountActsItm">
                          <div class="TACT_Lock" onclick="lock_my_screen()" title="Lock">
                                  <img class="ico_sf_Lock"  src="../web/icons/mainBar/lock.png" alt="Lock" />
                          </div>
                          <div class="TACT_Lock" title="Logout">
                                  <a target="_blank" href="../web/logout.php">   <img class="ico_sf_LogOut"  src="../web/icons/mainBar/logout.png" alt="Logout" /></a>
                          </div>
                      </div>
                  </div>
                 
              </div>
          </div>
        
          <div id="mainBarSafetyLayer" onmouseover="hideMyAccLeftPane()" ></div>
          <div id="SedFedLockScreenOut" style="display: none;" >
              <div class="SedFedLockScreenIn">
                  <div class="SF_LockScreenCont">
                      
                      <div class="SF_LockScreenFace">
                          
                          <img class="Sf_LockScreenImg" src="'.$ppics.'" />
                          
                      </div>
                      <div class="SF_LockScreenDets">
                          <div class="SF_LockScreenUsrName">
                              <div class="SF_LS_Usr">
                                  '.$my_name.' 
                              </div>
                              <div class="SF_LS_Logout" title="Logout">
                                   <a target="_blank" href="../web/logout.php" > <img class="ico_sf_Logout"  src="../web/icons/mainBar/powerB.png" /></a>
                              </div>
                          </div>
                          <div class="SF_LockScreenFocus">
                              <input class="SF_LS_pass_Inp" id="SF_LS_password" oninput="checkPass()" onblur="checkLockPass()"  type="password" placeholder=" * * * " />
                              <div class="SF_LS_Pass_Submit" onclick="checkPass()" ></div>
                              
                          </div>
                          <div class="SF_LS_passAlert" title="Login password or Lockscreen Password">
                              <span id="SF_LS_AlertTxt"> Password to Unlock </span> 
                          </div>
                      </div>
                       
                      
                  </div>
              </div>
              <div class="SedFedLS_Logo">
                  SedFed
              </div>
          </div>
          
          
          <script>
                  function srchInp(){
                      $(\'.SFTB_srchInp\').val($(\'#SF_inpBigSrch\').val());
                      if($(\'#SF_inpBigSrch\').val()===\'\'){
                          $(\'#SF_SearchSugg\').slideUp();
                          
                      }
                      else{
                          $(\'#SF_SearchSugg\').slideDown();
                      }
                  }
	 
	 ';
	 if($locked==1)
	 {
	        echo '$(document).ready(function()
		 {
		 
		 $(\'#SedFedLockScreenOut\').slideDown();
		 });';
	        }  else {
	       echo '$(document).ready(function()
		 {
		 $(\'#SedFedLockScreenOut\').slideUp();
		 });';       
	        }
	 echo '
                  </script>
	 
          <div class="SF_Upload_Sts_Out" style="display: none;" >
              <div class="SF_Upload_Sts_In">
                  <div class="SF_Upl_Ttl"> Uploading...</div>
                  <div class="SF_Upload_StatusBar">
                      <div class="SF_Upload_LiveStatus" id="LiveUpload" onmouseover="doStst()" >
                         index.html
                      </div>
                  </div>
                  <div class="SF_Upload_Percent">
                      <span class="SF_Upload_PercntTxt">90%</span> 
                      <span class="SF_Upload_FileSize">100 MB/200 MB</span> 
                      <span class="SF_Upload_Speed"> 1.3 Kbps</span> 
                      <span class="SF_Upload_Time"> Time Remaining : 10 min</span> 
                      <div class="SF_Upload_CancelBtn"> Cancel </div>
                  </div>
                  
                  
              </div>
          </div>
          <div id="SedFed_SearchTheater" style="display: none;" >
              <div class="SedFed_ThSrchIn">
                  <div class="SearchThtrClose" onclick="$(\'#SedFed_SearchTheater\').slideUp();" >X</div>
                  <div class="SearchCatogs">
                      Search In
                      <div class="SearchCatogItm">
                         People
                      </div>
                      <div class="SearchCatogItm">
                          Posts
                      </div>
                      <div class="SearchCatogItm">
                          Flash News
                      </div>
                      <div class="SearchCatogItm">
                         Messages
                      </div>
                      <div class="SearchCatogItm">
                         Notification
                      </div>
                  </div>
                  <div class="SedFed_ThSrchTtl">People</div>
                  <div class="SF_ThSrchResults">
                 
                    </div>
                   
                      <div class="SrchResTip" id="SrchTipPpl" style="display: none">
                          <div class="SrchTipTtl"> You can Search By  </div> 
                          <div class="SrchTipCont">
                              <div class="SrchTipItm"> User ID Number ( Best Result ) </div>
                              <div class="SrchTipItm"> Name of Person </div>
                              <div class="SrchTipItm"> Email / Mobile </div>
                              <div class="SrchTipItm"> School / College </div>
                              <div class="SrchTipItm"> Place </div>
                              
                          </div>
                      </div>
                      <div class="SrchResTip" id="SrchTipPost" style="display: none" >
                          <div class="SrchTipTtl"> You can Search By  </div> 
                          <div class="SrchTipCont">
                              <div class="SrchTipItm"> Post ID Number ( Best Result ) </div>
                              <div class="SrchTipItm"> Name of Person </div>
                              <div class="SrchTipItm"> Post Caption </div>
                              
                              
                          </div>
                      </div>
                      <div class="SrchResTip" id="SrchTipFlash" style="display: none" >
                          <div class="SrchTipTtl"> You can Search By  </div> 
                          <div class="SrchTipCont">
                              <div class="SrchTipItm"> Flash ID Number ( Best Result ) </div>
                              <div class="SrchTipItm"> Name of Person </div>
                              <div class="SrchTipItm"> Flash Message </div>
                          </div>
                      </div>
                      <div class="SrchResTip" id="SrchTipMsg" style="display: none" >
                          <div class="SrchTipTtl"> You can Search By  </div> 
                          <div class="SrchTipCont">
                              <div class="SrchTipItm"> Sender Name </div>
                              <div class="SrchTipItm"> Message Text </div>
                              
                          </div>
                      </div>
                      <div class="SrchResTip" id="SrchTipNotif" style="display: none" >
                          <div class="SrchTipTtl"> You can Search By  </div> 
                          <div class="SrchTipCont">
                              <div class="SrchTipItm"> Sender Name </div>
                              <div class="SrchTipItm"> Notification Text </div>
                          </div>
                      </div>
                  </div>
                  
              </div>
          </div>
           
      </div>
       <div class="SedFedMainBar" id="MyAccLeftPane" >
              <div class="MainBarOut">
                  <div class="MainBarIn">
                     
                      <div class="ToolTipMainBarHold" id="MainBarToolTip" style="display: none;" >
                          <div class="TtMBArr"></div>
                          <div class="TtMBCont" id="MainBarTtTxt" >
                              Click to Update
                          </div>
                      </div>
                    <a target="_blank" href="../'.$_SESSION['user_name'].'" > <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="'.$ppics.'"  onmouseover="meOnMainBar(event,\'Profile\')" onmouseout="meOutMainBar()"/>
                      </div></a>
                      <a target="_blank" href="../web/people.php"><div class="MainBarItm">
                          <img class="ico_sf_mBar" src="../web/icons/mainBar/people.png"  onmouseover="meOnMainBar(event,\'People\')" onmouseout="meOutMainBar()"/>
                      </div></a>
                      <a target="_blank" href="../web/my_messages.php"><div class="MainBarItm">
                          <img class="ico_sf_mBar" src="../web/icons/mainBar/messages.png" onmouseover="meOnMainBar(event,\'Messages\')" onmouseout="meOutMainBar()"/>
                      </div></a>
                   <!--   <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="../web/icons/mainBar/bulbs.png" title="Profile"/>
                      </div> -->
                  
                  <a target="_blank" href="../web/posts.php">    <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="../web/icons/mainBar/whatsup.png"  onclick="$(\'#PostAuditorium\').fadeIn();" onmouseover="meOnMainBar(event,\' What\'s Up \')" onmouseout="meOutMainBar()"/>
                      </div></a>
                        <a target="_blank" href="../'.$_SESSION['user_name'].'/storage.php">  
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:27px;" src="../web/icons/mainBar/folder.png"  onmouseover="meOnMainBar(event,\'My Storage\')" onmouseout="meOutMainBar()"/>
                      </div>
                    <!--  <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:15px;" src="../web/icons/mainBar/password.png" title="Profile"/>
                      </div> -->
                     <a target="_blank" href="../web/settings.php"> <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:27px;" src="../web/icons/mainBar/settings.png" onmouseover="meOnMainBar(event,\'Settings\')" onmouseout="meOutMainBar()"/>
                      </div> </a>
                  <!--    <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:30px;" src="../web/icons/mainBar/lock.png" title="Lock"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:23px;" src="../web/icons/mainBar/power.png" title="Logout"/>
                      </div> -->
                  </div>
              </div>
          </div>
     ';
	 echo '<div style="display:none;" id="for_create_post">';include'create_new_post.php';echo '</div>';
	 echo '
           <div id="CreateNewFlash"></div>
         <div id="for_grp_and_team_creat"></div>
      </div>
    
          
  </body>
</html>
';
         include 'main_bar_slide.html';
}