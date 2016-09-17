<!DOCTYPE html>

<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
    echo'
<html>
  <head>
      <link rel="stylesheet" href="lin.css"/>
    <link rel="stylesheet" href="mainBar.css"/>
    <link rel="stylesheet" href="photos.css"/>
    <link rel="stylesheet" href="postAudi.css"/>
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="mainBar.js" type="text/javascript"></script>
   <script src="postAudi.js" type="text/javascript"></script>
  </head>
  
  <body onload="showPageLoadStatus()" >
      <div id="content-full">
          <div id="SedFed_PageStatus">
                <div id="SF_OpeningLogo">SedFed</div>
                <div id="SF_pageLoadStatus">
                    <div id="SF_pageLiveLoadedStatus" ></div>
                </div>
          </div>
          <div id="SF_BigSearch" class="BigSearchBarOut" style="display: none;" >
          <div class="BigSearchBarIn">
              <input type="text" id="SF_inpBigSrch" class="search_sedfed" oninput="searchsedfed(this.value);" onblur="$(\'.SF_BigSrchResultOut\').fadeOut();" onclick="$(\'.SF_BigSrchResultOut\').fadeIn();" placeholder="Search People on SedFed ..." />
              
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
                          <option>@-Tag</option>
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
                  <div class="closeBigSearch" onclick="$(\'#SF_BigSearch\').fadeOut();" >
                          X
                      </div>
              <div class="BS_Prcd" title="Search">
                  <img class="ico_TtlBarSrch" alt="Search"  src="icons/mainBar/search.png" onclick="search_full()" />
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
                      <div class="TtlBarTtl">
                          <img class="TopProfPic" src="profileimg.PNG" alt="SedFed"/>
                          <div class="SedFedUserName"> Vijayakumar  </div>
                      </div>
                      <div class="TtlBar_SrchHold">
                          <div class="SFTB_srchIn">
                              <input class="SFTB_srchInp" type="text" placeholder="Search People , Posts , Etc.," autofocus oninput="$(\'#SF_BigSearch\').show();$(\'#SF_inpBigSrch\').val(this.value);$(\'#SF_inpBigSrch\').focus();" />
                               <img class="ico_TtlBarSrch" src="icons/mainBar/search.png"   />
                          </div>
                          <div class="SFTB_searchSubmit">
                             
                          </div>
                      </div>
                      <div class="TtlBarFlahNews">
                          
                          <div class="TtlBar_FlashNewsHold">
                              <div class="SFTB_NewFlashBtn"  onmouseout="$(\'#TtNflsh\').fadeOut()"  onclick="open_create_flash()" >
                          <img src="icons/mainBar/speaker37.png" onmouseover="$(\'#TtNflsh\').fadeIn()"/> 
                      </div>
                          
                          ';
      $q="select flash as f,user_id as u,time as t,flash_id as fid,public as p from flash_news where checks=1 order by flash_id desc ";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 while ($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	 {
	 $flash=$row['f'];
	 $flasher_id=$row['u'];
	 $flashed_time=$row['t'];
	 $flash_id=$row['fid'];
	 $pubic=$row['p'];
	 $showme=0;
	 if($pubic==1)
	 {
	        $showme=1;
	 }  else {
	        
	 $q1="select cu_id as c from contacts where user_id=$user_id and cu_id=$flasher_id or user_id=$flasher_id";
	 $r1=  mysqli_query($dbc, $q1);
	 if($r1)
	 {
	        if(mysqli_num_rows($r1)>0)
	        {
	               $showme=1;
	        }
	 }
	 }
	  $q3="select first_name as f from basic where user_id=$flasher_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $flsher_name=$rt['f'];
	        }else
	        {
	               $flsher_name="some one";
	        }
	 }
	 if($showme==1)
	 {
	        break;
	 }else
	 {
	        continue;
	 }
	
	        
	 }
	 }
    }

                          echo '<div class="SFTB_FlashIn">
                              <div class="SFTB_FlashArrPrev"  onmouseou="$(\'#for_next_flash\').fadeOut();" onclick="show_next_flash(0)"></div> 
                              <span class="FlashNewsText"><marquee><span id="for_flash_news_put"><span class="FlashNewsOwner">'.$flsher_name.' : </span> '.  htmlentities($flash).' <span class="FlashNewsTime"> <span class="timeDivider">|</span> '.$flashed_time.', Flash No '.$flash_id.'</span></span></marquee> </span>
                              <div class="SFTB_FlashDoLike">Like This</div>
                              <div class="SFTB_FlashArrNext" onmouseou="$(\'#for_next_flash\').fadeOut();" onclick="show_next_flash(1)"></div> 
                          </div>
	        
                      </div>
                           <div id="for_next_flash"  style="display:none;"></div>
                      </div>
                      <div class="TtlNewFlashHold" id="TtNflsh" style="display: none;">
                              <div class="TtlFlshArr"></div><br/>
                              <div class="TtlFlashCont"> Write here & Flash </div>
                          </div>
                      <div class="TtlBarAccountActs">
                          <div class="TtlBarACactIn">
                              
                              <div class="TACT_Logout" onclick="$(\'#MyAccountAct\').slideToggle();" >
                                  <img class="ico_sf_Logout"  src="icons/mainBar/powerB.png" alt="Logout" />
                              </div>
                          </div>
                      </div>
                  </div>
	 <input type="hidden" value="'.$flash_id.'" id="cur_flsh_id" />
	 <div class="Theater_Window_Flash" id="CreateNewFlash" style="display:none;" ></div>
                  <div class="AccountActsHold" id="MyAccountAct" style="display: none;" >
                      <div class="AccountActsItm">
                          <div class="TACT_Lock" onclick="$(\'#SedFedLockScreenOut\').fadeIn();" title="Lock">
                                  <img class="ico_sf_Lock"  src="icons/mainBar/lock.png" alt="Lock" />
                          </div>
                          <div class="TACT_Lock" title="Logout">
                                  <img class="ico_sf_LogOut"  src="icons/mainBar/logout.png" alt="Logout" />
                          </div>
                      </div>
                  </div>
                  
              </div>
          </div>
          <div class="SedFedMainBar">
              <div class="MainBarOut">
                  <div class="MainBarIn">
                      <div class="MainBarItm">
                          <img class="profImgMainBar" src="profileimg.png"  onmouseover="meOnMainBar(event,\'Click to Update\')" onmouseout="meOutMainBar()" />
                      </div>
                      <div class="ToolTipMainBarHold" id="MainBarToolTip" style="display: none;" >
                          <div class="TtMBArr"></div>
                          <div class="TtMBCont" id="MainBarTtTxt" >
                              Click to Update
                          </div>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/profile.png"  onmouseover="meOnMainBar(event,\'Profile\')" onmouseout="meOutMainBar()"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/people.png"  onmouseover="meOnMainBar(event,\'People\')" onmouseout="meOutMainBar()"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/messages.png" onmouseover="meOnMainBar(event,\'Messages\')" onmouseout="meOutMainBar()"/>
                      </div>
                   <!--   <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/bulbs.png" title="Profile"/>
                      </div> -->
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/myposts.png"  onmouseover="meOnMainBar(event,\'My Posts\')" onmouseout="meOutMainBar()"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/whatsup.png"  onclick="$(\'#PostAuditorium\').fadeIn();" onmouseover="meOnMainBar(event,\' What\'s Up \')" onmouseout="meOutMainBar()"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:27px;" src="icons/mainBar/folder.png"  onmouseover="meOnMainBar(event,\'My Storage\')" onmouseout="meOutMainBar()"/>
                      </div>
                    <!--  <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:15px;" src="icons/mainBar/password.png" title="Profile"/>
                      </div> -->
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:27px;" src="icons/mainBar/settings.png" onmouseover="meOnMainBar(event,\'Settings\')" onmouseout="meOutMainBar()"/>
                      </div> 
                  <!--    <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:30px;" src="icons/mainBar/lock.png" title="Lock"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:23px;" src="icons/mainBar/power.png" title="Logout"/>
                      </div> -->
                  </div>
              </div>
          </div>
          <div id="SedFedLockScreenOut" style="display: none;" >
              <div class="SedFedLockScreenIn">
                  <div class="SF_LockScreenCont">
                      
                      <div class="SF_LockScreenFace">
                          
                          <img class="Sf_LockScreenImg" src="profileimg.PNG" />
                          
                      </div>
                      <div class="SF_LockScreenDets">
                          <div class="SF_LockScreenUsrName">
                              <div class="SF_LS_Usr">
                                  Vijayakumar 
                              </div>
                              <div class="SF_LS_Logout" title="Logout">
                                   <img class="ico_sf_Logout"  src="icons/mainBar/powerB.png" />
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
          <div id="SedFed_SearchTheater" style="display:none;" >
              <div class="SedFed_ThSrchIn">
                  <div class="SearchThtrClose" onclick="$(\'#SedFed_SearchTheater\').slideUp();" >X</div>
                 <!--
	  <div class="SearchCatogs">
                      Search In
                      <div class="SearchCatogItm">
                          <input class="srchCatChk" id="Chk_SrchPpl" type="checkbox" onchange="SrchCatSelected(\'Chk_SrchPpl\',\'#SrchTipPpl\')" checked /> People
                      </div>
                      <div class="SearchCatogItm">
                          <input class="srchCatChk" id="Chk_SrchPost" type="checkbox" onchange="SrchCatSelected(\'Chk_SrchPost\',\'#SrchTipPost\')" /> Posts
                      </div>
                      <div class="SearchCatogItm">
                          <input class="srchCatChk" id="Chk_SrchFlash" type="checkbox" onchange="SrchCatSelected(\'Chk_SrchFlash\',\'#SrchTipFlash\')" /> Flash News
                      </div>
                      <div class="SearchCatogItm">
                          <input class="srchCatChk" id="Chk_SrchMsg" type="checkbox" onchange="SrchCatSelected(\'Chk_SrchMsg\',\'#SrchTipMsg\')" /> Messages
                      </div>
                      <div class="SearchCatogItm">
                          <input class="srchCatChk" id="Chk_SrchNotif" type="checkbox"  onchange="SrchCatSelected(\'Chk_SrchNotif\',\'#SrchTipNotif\')"/> Notification
                      </div>
                  </div> 
                  <div class="SedFed_ThSrchTtl">People</div> -->
                  <div class="SF_ThSrchResults">
                    
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
           <div class="imageViewerOut" id="PostAuditorium" style="display: none">
            
               <div id="closeImgPreview" onclick="$(\'#PostAuditorium\').fadeToggle();" >
                  X
              </div>
               <div id="dwnldImg"  >
                  <img src="icons/post-media-download.png" class="hyticos" />
              </div>
               
            <div id="postAudiFullScreenBtn"  onclick="togglePostAudiDetails()" >
              
                <img src="icons/maximize.png" style="width: 15px;"/>
              </div>
               <!--
              <div id="dwnldImg"  >
                  <img src="icons/post-media-download.png" class="hyticos" />
              </div>
            <div id="abtImgOut" style="display: none" >
                <div id="abtImgIn">
                    <div class="abtItm">Like <span class="respCount">56</span> </div>
                    <div class="abtItm">Unlike <span class="respCount">78</span></div>
                    <div class="abtItm">Share <span class="respCount">67</span></div>
                    <div class="abtItm">Show as Post</div>
                </div>
            </div>
               -->
              <div class="imageViewerIn">
                  <div class="iVToolsOut" onclick="changeFocusImg(\'prev\')" >
                      
                          <div class="iVT-item" >
                              <img id="photos-prev" src="icons/photos_prev.png" onmouseover="$(\'#prevImgPre\').fadeIn(1000)" onmouseout="$(\'#prevImgPre\').fadeOut(1000)" />
                          </div>
                     
                  </div>
               
                  <!-- post auditorium media image / video / pdf content here --> 
                  
                  <div class="imageCont" id="postAudiFocusMedia" >
                    
                     <!-- <div class="imgNameM" id="imgNameM" ><marquee id="curFocusImgName" >sabari</marquee></div> -->
                     
                  <!--   <img class="currentImage" id="curImgInFocus" src="icons/post-testimg.jpg" alt="" onmouseover="BlurPostDetails()" onmouseout="focusPostDetails()" /> -->
                  <video src="test.mp4" onplay="togglePostAudiParti()" onpause="togglePostAudiParti()" controls ></video>
                  </div>
                  
                  
                  
                  <div class="iVToolsOut" id="photos_prevOut"  onclick="changeFocusImg(\'next\')" >
                     
                          <div class="iVT-item">
                              <img id="photos-next" src="icons/photos_next.png" onmouseover="$(\'#nextImgPre\').fadeIn(1000)" onmouseout="$(\'#nextImgPre\').fadeOut(1000)"/>
                          </div>
                      </div>
                  
              </div>
               <!-- post details for Auditorium starts -->
               <div class="ThPostPrimaryHold" id="PostAudiParticip" >
                          <div class="Th_PostDets"  >
                              <div class="Th_PostOwner">
                                  <span class="Th_PostUser"> Vijayakumar </span>
                                  <span class="Th_PostTime"> 1 Jan 2015 , 10:30 pm</span>
                                  <span class="Th_PostDivider">|</span>
                                  <span class="Th_PostId">Post ID : 176 </span>
                              </div>
                              <div  class="ThPostStats"  >
                                  <div class="ThPostStatItm">
                                      <img class="ico_ThPostSts" src="icons/postSts/msg_seen.png" alt="Seen by" />
                                      <div class="Th_Post_Sts_Count">
                                          <span class="likeCount"> 100</span>
                                      </div>
                                  </div>
                                  <div class="ThPostStatItm" onclick="showPostAudiResponders(event,\'#data-postAudiLikers\')" >
                                      <img class="ico_ThPostSts" src="icons/postSts/post-preview-like.png" alt="Likes" />
                                      <div class="Th_Post_Sts_Count">
                                          <span class="unlikeCount">100</span>
                                      </div>
                                  </div>
                                  <span id="data-postAudiLikers" style="display: none;" >
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh
                                  </span>
                                  <span id="data-postAudiShares" style="display: none;" >
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh
                                  </span>
                                  <span id="data-postAudiRaters" style="display: none;" >
                                      <span class="postAudiRespTt_Ttl"> 5 stars </span> <br/> 
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh <br/>
                                      <span class="postAudiRespTt_Ttl"> 4 stars </span> <br/> 
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh <br/>
                                      <span class="postAudiRespTt_Ttl"> 3 stars </span> <br/> 
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh <br/>
                                      <span class="postAudiRespTt_Ttl"> 2 stars </span> <br/> 
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh <br/>
                                      <span class="postAudiRespTt_Ttl"> 1 star </span> <br/> 
                                      Vijayakumar <br/> Arulkumar <br/> Rajesh <br/>
                                  </span>
                                  <div class="ThPostStatItm">
                                      <img class="ico_ThPostSts" style="max-height: 17px;" src="icons/postSts/post-sf-unliked.png" alt="Unlikes" />
                                      <div class="Th_Post_Sts_Count">0</div>
                                  </div>
                                  <div class="ThPostStatItm" onclick="showPostAudiResponders(event,\'#data-postAudiRaters\')" >
                                      <img class="ico_ThPostSts" style="max-height: 18px;" src="icons/postSts/post-Qrated-3.png" alt="Rating" />
                                      <div class="Th_Post_Sts_Count">
                                          <span class="rateCount">10</span>
                                      </div>
                                  </div>
                                  <div class="ThPostStatItm">
                                      <img class="ico_ThPostSts" style="max-height: 17px;" onclick="showPostAudiCommenters()" src="icons/postSts/comments.png" alt="Comments" />
                                      <div class="Th_Post_Sts_Count">7</div>
                                  </div>
                                  <div class="ThPostStatItm">
                                      <img class="ico_ThPostSts" src="icons/postSts/post-media-download.png" alt="Downloads" />
                                      <div class="Th_Post_Sts_Count">8</div>
                                  </div>
                                  <div class="ThPostStatItm" onclick="showPostAudiResponders(event,\'#data-postAudiShares\')">
                                      <img class="ico_ThPostSts" style="max-height: 18px;" src="icons/postSts/post-sf-share.png" alt="Shares" />
                                      <div class="Th_Post_Sts_Count">1</div>
                                  </div>
                              </div>
                          </div>
                   </div>
               <!-- post caption for post auditorium starts here -->
               <div class="ThPostCaptionHolder" >
                   
                   <div class="ThPostCationIn" id="postAudiCaption"   >
                       <div class="ThCloseCaption" onclick="$(\'#postAudiCaption\').slideUp();" > X </div>
                      This is the photo which I used during the development of SedFed 2.0
                   </div>
               </div>
               <!-- post auditorium new comment starts -->
               <div class="ThPostAudiCommentHold" id="PostAudiCmntOut" style="display: none;" >
                   <div class="ThPostCommentAudiIn">
                       <div class="ThPostAudiCmntTtl">Any Comments ? <span class="closeAudiCmnt" onclick="$(\'#PostAudiCmntOut\').fadeOut();" >X</span> </div>
                       <textarea class="PostAudiComntInp" placeholder=" Comment here "></textarea>
                       <div class="ThCmntAtchHold">
                           <div class="ThCmntAtchItm" onclick="document.getElementById(\'ThPostAudiCmntClr\').click()" >
                               <img class="ico_ThCmnt" src="icons/chooseColor.png" alt="Color" title="Color for your comment"/>
                               <input type="color" id="ThPostAudiCmntClr" style="display: none;" />
                           </div>
                           <div class="ThCmntAtchItm"  >
                               <img class="ico_ThCmntClr" src="icons/test-smiley.png" alt="Smiley" title="Add Smiley"/>
                           </div>
                           <div class="ThCmntAtchItm" onclick="document.getElementById(\'ThAudiPostCmntFile\').click()" >
                               <img class="ico_ThCmnt" src="icons/test-atch.png" alt="Smiley" title="Add Any File"/>
                               <input type="file" id="ThAudiPostCmntFile" style="display: none;" />
                           </div>  
                       </div>
                       <div class="TPAOCmnt_hint"> You can add audio / video / image / any file <div class="TPAOCmnt_hintArr"></div> </div>
                       <div class="PostAudiCmntSubmit">Comment</div>
                   </div>
               </div>
               
               <div class="ThPostAudiResponsersHold" id="ThPostAudiResponders" style="display: none;" >
                   <div class="ThPostAudiRespArr"></div>
                   <div class="ThPostAudiRespCont" id="postAudiRespCurTxt" >
                       Vijayakumar <br/> Yogeshwaran <br/> Arulkumar
                   </div>
               </div>
               <div class="ThPostSecondaryHold" id="PostAudi_Audience" >
                   <div class="ThPostRespondIn">
                       <div class="ThPostRespItm" onclick="Likedone(1,100,\'#postAudiLike\')" >
                           <img class="ico_Th_Resp" id="postAudiLike" src="icons/postResp/likeB.png" alt="Like" />
                       </div>
                       <div class="ThPostRespItm" onclick="Likedone(2,100,\'#postAudiunlike\')" >
                           <img class="ico_Th_Resp" id="postAudiunlike" src="icons/postResp/unlikeB.png" alt="Unlike" />
                       </div>
                       <div class="ThPostRespItm_Rate">
                           <div class="ThPostRespItm" onclick="postRated(1,101,\'#quickpostrate1\')" >
                           <img class="ico_Th_Resp_Rate1" src="icons/postResp/starB.png" alt="1" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(2,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate2" src="icons/postResp/starB.png" alt="2" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(3,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate3" src="icons/postResp/starB.png" alt="3" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(4,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate4" src="icons/postResp/starB.png" alt="4" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(5,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate5" src="icons/postResp/starB.png" alt="5" />
                       </div>
                       </div>
                       
                       <div class="ThPostRespItm" onclick="$(\'#PostAudiCmntOut\').fadeToggle();" >
                           <img class="ico_Th_Resp" src="icons/postResp/commentB.png" alt="Like" />
                       </div>
                       <div class="ThPostRespItm">
                           <img class="ico_Th_Resp" src="icons/postResp/shareB.png" alt="Like" />
                       </div>
                      
                   </div>
               </div>
               
               <!-- old comments are here -->
               <div class="ThPostAudiCmntBackG" id="ThAudiOldComments" style="display: none;">
                   for safety background of auditorium
                    <div class="ThPostAudiOldCommnetsHold" >
                        <div class="TPAOCmnt_forCloseOldCmnts" onclick="$(\'#ThAudiOldComments\').fadeOut();" >X</div>
                   <div class="ThPostAudiOldCommnetsIn">
                       <div class="TPAOCmnt_NewHold">
                           <div class="ThPostAudiCmntTtl">Any Comments ?  </div>
                       <textarea class="PostAudiComntInp" placeholder=" Comment here "></textarea>
                       <div class="ThCmntAtchHold">
                           <div class="ThCmntAtchItm" onclick="document.getElementById(\'ThPostAudiCmntClr\').click()" >
                               <img class="ico_ThCmnt" src="icons/chooseColor.png" alt="Color" title="Color for your comment"/>
                               <input type="color" id="ThPostAudiCmntClr" style="display: none;" />
                           </div>
                           <div class="ThCmntAtchItm"  >
                               <img class="ico_ThCmntClr" src="icons/test-smiley.png" alt="Smiley" title="Add Smiley"/>
                           </div>
                           <div class="ThCmntAtchItm" onclick="document.getElementById(\'ThAudiPostCmntFile\').click()" >
                               <img class="ico_ThCmnt" src="icons/test-atch.png" alt="Smiley" title="Add Any File"/>
                               <input type="file" id="ThAudiPostCmntFile" style="display: none;" />
                           </div>  
                       </div>
                       <div class="TPAOCmnt_hint"> You can add audio / video / image / any file <div class="TPAOCmnt_hintArr"></div> </div>
                       <div class="PostAudiCmntSubmit">Comment</div>
                       </div>
                       <div class="TPAudi_OCmntItemIn">
                           <img class="TPAOCmnt_SendrProfImg" src="profileimg.PNG" />
                           <div class="TPAOCmnt_Arr"></div>
                           <div class="TPAOCmnt_Cont">
                               <div class="TPAOCmnt_Dets">
                                   <div class="TPAOCmnt_Cmnter">Vijayakumar</div>
                                   <div class="TPAOCmnt_Time" title="1 Jan 2015 , 10:30 pm" > 10:30 pm </div>
                                   
                               </div>
                               <div class="TPAOCmnt_Txt">
                                   This is the Comment
                               </div>
                               <div class="TPAOCmnt_Media">
                                   <img class="img_TPAOCmnt" src="testw.jpg" />
                               </div>
                             <!--  <div class="TPOACmnt_File">
                                   don\'t open.txt
                               </div> -->
                             <div class="TPAOCmnt_Resp">
                                 <div class="ThPostRespItm" onclick="Likedone(1,100,\'#postAudiLike\')" >
                           <img class="ico_Th_Resp" id="postAudiLike" src="icons/postResp/likeB.png" alt="Like" />
                       </div>
                       <div class="ThPostRespItm" onclick="Likedone(2,100,\'#postAudiunlike\')" >
                           <img class="ico_Th_Resp" id="postAudiunlike" src="icons/postResp/unlikeB.png" alt="Unlike" />
                       </div>
                       <div class="ThPostRespItm_Rate">
                           <div class="ThPostRespItm" onclick="postRated(1,101,\'#quickpostrate1\')" >
                           <img class="ico_Th_Resp_Rate1" src="icons/postResp/starB.png" alt="1" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(2,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate2" src="icons/postResp/starB.png" alt="2" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(3,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate3" src="icons/postResp/starB.png" alt="3" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(4,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate4" src="icons/postResp/starB.png" alt="4" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(5,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate5" src="icons/postResp/starB.png" alt="5" />
                       </div>
                       </div>
                             </div>
                           </div>
                       </div>
                       <div class="TPAudi_OCmntItemOut">
                           <img class="TPAOCmnt_SendrProfImg" src="profileimg.PNG" />
                           <div class="TPAOCmnt_Arr"></div>
                           <div class="TPAOCmnt_Cont">
                               <div class="TPAOCmnt_Dets">
                                   <div class="TPAOCmnt_Cmnter">Vijayakumar</div>
                                   <div class="TPAOCmnt_Time" title="1 Jan 2015 , 10:30 pm" > 10:30 pm </div>
                                   
                               </div>
                               <div class="TPAOCmnt_Txt">
                                   This is the Comment
                               </div>
                               <div class="TPAOCmnt_Media">
                                   <img class="img_TPAOCmnt" src="testw.jpg" />
                               </div>
                             <!--  <div class="TPOACmnt_File">
                                   don\'t open.txt
                               </div> -->
                             <div class="TPAOCmnt_Resp">
                                 <div class="ThPostRespItm" onclick="Likedone(1,100,\'#postAudiLike\')" >
                           <img class="ico_Th_Resp" id="postAudiLike" src="icons/postResp/likeB.png" alt="Like" />
                       </div>
                       <div class="ThPostRespItm" onclick="Likedone(2,100,\'#postAudiunlike\')" >
                           <img class="ico_Th_Resp" id="postAudiunlike" src="icons/postResp/unlikeB.png" alt="Unlike" />
                       </div>
                       <div class="ThPostRespItm_Rate">
                           <div class="ThPostRespItm" onclick="postRated(1,101,\'#quickpostrate1\')" >
                           <img class="ico_Th_Resp_Rate1" src="icons/postResp/starB.png" alt="1" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(2,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate2" src="icons/postResp/starB.png" alt="2" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(3,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate3" src="icons/postResp/starB.png" alt="3" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(4,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate4" src="icons/postResp/starB.png" alt="4" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(5,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate5" src="icons/postResp/starB.png" alt="5" />
                       </div>
                       </div>
                             </div>
                           </div>
                       </div>
                         <div class="TPAudi_OCmntItemIn">
                           <img class="TPAOCmnt_SendrProfImg" src="profileimg.PNG" />
                           <div class="TPAOCmnt_Arr"></div>
                           <div class="TPAOCmnt_Cont">
                               <div class="TPAOCmnt_Dets">
                                   <div class="TPAOCmnt_Cmnter">Vijayakumar</div>
                                   <div class="TPAOCmnt_Time" title="1 Jan 2015 , 10:30 pm" > 10:30 pm </div>
                                   
                               </div>
                               <div class="TPAOCmnt_Txt">
                                   This is the Comment
                               </div>
                               <div class="TPAOCmnt_Media">
                             <!--      <img class="img_TPAOCmnt" src="testw.jpg" /> -->
                               </div>
                             <!--  <div class="TPOACmnt_File">
                                   don\'t open.txt
                               </div> -->
                             <div class="TPAOCmnt_Resp">
                                 <div class="ThPostRespItm" onclick="Likedone(1,100,\'#postAudiLike\')" >
                           <img class="ico_Th_Resp" id="postAudiLike" src="icons/postResp/likeB.png" alt="Like" />
                       </div>
                       <div class="ThPostRespItm" onclick="Likedone(2,100,\'#postAudiunlike\')" >
                           <img class="ico_Th_Resp" id="postAudiunlike" src="icons/postResp/unlikeB.png" alt="Unlike" />
                       </div>
                       <div class="ThPostRespItm_Rate">
                           <div class="ThPostRespItm" onclick="postRated(1,101,\'#quickpostrate1\')" >
                           <img class="ico_Th_Resp_Rate1" src="icons/postResp/starB.png" alt="1" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(2,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate2" src="icons/postResp/starB.png" alt="2" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(3,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate3" src="icons/postResp/starB.png" alt="3" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(4,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate4" src="icons/postResp/starB.png" alt="4" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(5,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate5" src="icons/postResp/starB.png" alt="5" />
                       </div>
                       </div>
                             </div>
                           </div>
                       </div>
                         <div class="TPAudi_OCmntItemIn">
                           <img class="TPAOCmnt_SendrProfImg" src="profileimg.PNG" />
                           <div class="TPAOCmnt_Arr"></div>
                           <div class="TPAOCmnt_Cont">
                               <div class="TPAOCmnt_Dets">
                                   <div class="TPAOCmnt_Cmnter">Vijayakumar</div>
                                   <div class="TPAOCmnt_Time" title="1 Jan 2015 , 10:30 pm" > 10:30 pm </div>
                                   
                               </div>
                               <div class="TPAOCmnt_Txt">
                                   This is the Comment
                               </div>
                               <div class="TPAOCmnt_Media">
                                <!--   <img class="img_TPAOCmnt" src="testw.jpg" /> -->
                               </div>
                             <!--  <div class="TPOACmnt_File">
                                   don\'t open.txt
                               </div> -->
                             <div class="TPAOCmnt_Resp">
                                 <div class="ThPostRespItm" onclick="Likedone(1,100,\'#postAudiLike\')" >
                           <img class="ico_Th_Resp" id="postAudiLike" src="icons/postResp/likeB.png" alt="Like" />
                       </div>
                       <div class="ThPostRespItm" onclick="Likedone(2,100,\'#postAudiunlike\')" >
                           <img class="ico_Th_Resp" id="postAudiunlike" src="icons/postResp/unlikeB.png" alt="Unlike" />
                       </div>
                       <div class="ThPostRespItm_Rate">
                           <div class="ThPostRespItm" onclick="postRated(1,101,\'#quickpostrate1\')" >
                           <img class="ico_Th_Resp_Rate1" src="icons/postResp/starB.png" alt="1" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(2,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate2" src="icons/postResp/starB.png" alt="2" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(3,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate3" src="icons/postResp/starB.png" alt="3" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(4,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate4" src="icons/postResp/starB.png" alt="4" />
                       </div>
                       <div class="ThPostRespItm" onclick="postRated(5,101,\'#quickpostrate1\')">
                           <img class="ico_Th_Resp_Rate5" src="icons/postResp/starB.png" alt="5" />
                       </div>
                       </div>
                             </div>
                           </div>
                       </div>
                       <div class="TPAOCmnt_ShowMore">Show More</div>
                   </div>
               </div>    
               </div>
              
          </div>
      </div>
      </body>
      </html>
  ';
}
?>
