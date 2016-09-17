
<?php session_commit();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
         $user_id=$_SESSION['user_id'];
         require_once 'mysqli_connect.php';
         include_once 'notes.php';
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
	       $ppics='../'.$_SESSION['user_name'].'/ppic5.jpg';
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
    <link rel="stylesheet" href="'.$_SESSION['css'].'mainBar.css"/>
   <script src="jquery.min.js"></script>
   <script src="mainBar.js" type="text/javascript"></script>
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
                  <img class="ico_TtlBarSrch" alt="Search"  src="icons/mainBar/search.png" onclick="search_full()" />
              </div>
          </div>
      </div>
      <div class="SF_BigSrchResultOut" id="SF_SearchSugg" style="display: none;" >
          <div id="srch_result_cont"></div>
          <div id="for_show_all_result" onclick="search_full()">Show all results about this</div>
      </div><div id="mob_no_tip" style="display:none;">You have to enter minimum 8 digit number</div>
          <div class="SedFedTitleBar">
             <div class="SedFedLogo">
                <div id="sedfedLogoTop"></div>
                <div id="sedfedLogoProgress"></div>
            </div>
              <div class="TitleBarOut">
                  <div class="TtlBarIn">
                      <div class="TtlBarTtl"   >
                      <a target="_blank" href="../web/">
                          <img class="TopProfPic" id="sf_logoTop" src="sedfed2.png" style="border-radius:0px;" alt="SedFed"/>
                        </a>
                      </div>
                      <div class="TtlBar_SrchHold">
                          <div class="SFTB_srchIn">
                          <div class="mBdecPre"></div>
                              <input class="SFTB_srchInp" type="text" placeholder="Search People , Posts , Etc.," onfocus="$(\'#SF_BigSearch\').show();$(\'#SF_inpBigSrch\').focus();" />
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
                                  <img class="ico_sf_Logout"  src="icons/mainBar/powerB.png" alt="Logout" />
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="AccountActsHold" id="MyAccountAct" style="display: none;" >
                      <div class="AccountActsItm">
                          <div class="TACT_Lock" onclick="lock_my_screen()" title="Lock">
                                  <img class="ico_sf_Lock"  src="icons/mainBar/lock.png" alt="Lock" />
                          </div>
                          <div class="TACT_Lock" title="Logout">
                                  <a  href="../web/logout.php">   <img class="ico_sf_LogOut"  src="../web/icons/mainBar/logout.png" alt="Logout" /></a>
                          </div>
                      </div>
                  </div>
                 
              </div>
          </div>
           <div class="flah_news_hold">
          <div class="TtlBarFlahNews">
                          
                          <div class="TtlBar_FlashNewsHold">
                              <div class="SFTB_NewFlashBtn"  onmouseout="$(\'#TtNflsh\').fadeOut()"  onclick="open_create_flash()" >
                          <img src="icons/mainBar/speaker37.png" onmouseover="$(\'#TtNflsh\').fadeIn()"/> 
                      </div>
         ';
         $flsher_name="";
         $flashed_time="";
         $flash="";
         $flash_id="";
           $q="select flash as f,user_id as u,time as t,flash_id as fid,public as p from flash_news  order by flash_id desc ";
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
	 }else
	 {
	        
	 }
    }

         echo '

         <div class="SFTB_FlashIn">
                              <div class="SFTB_FlashArrPrev"  onmouseou="$(\'#for_next_flash\').fadeOut();" onclick="show_next_flash(0)"></div> 
                              <span class="FlashNewsText"><marquee><span id="for_flash_news_put"><a href="../'.$flasher_id.'"><span style="cursor:pointer;" class="FlashNewsOwner">'.$flsher_name.' : </span></a> '.  htmlentities($flash).' </marquee><span class="FlashNewsTime"> <span class="timeDivider">|</span> '.$flashed_time.', Flash No '.$flash_id.'</span></span> </span>
                              <div class="SFTB_FlashDoLike">Like This</div>
                              <div class="SFTB_FlashArrNext" onmouseou="$(\'#for_next_flash\').fadeOut();" onclick="show_next_flash(1)"></div> 
                          </div>
	        
                      </div>
                           <div id="for_next_flash"  style="display:none;"></div>
                      </div>
                      <div class="TtlNewFlashHold" id="TtNflsh" style="display: none;">
                              <div class="TtlFlshArr"></div><br/>
                              <div class="TtlFlashCont"> Write here & Flash </div>
                          </div></div>
          <div class="SedFed_SubTitleBarMain">
              <div class="sf_subTtlMainItm" onclick="$(\'#newPostTypeSelecterPopUp\').toggle(500)" >
                  New Post
              </div>
            
              <script>
                 function showMyAccLftWindow(){
                     if($(\'#MYACCOUNTLEFTPANEEE\').css(\'left\')===\'0px\'){
                            $(\'#MYACCOUNTLEFTPANEEE\').animate({\'left\':\'101%\'});
                     }
                     else{
                         $(\'#MYACCOUNTLEFTPANEEE\').animate({\'left\':\'0px\'});
                     }
                 }
              </script>
              <!--<div class="sf_subTtlMainItm">
                 Flash News
              </div> -->
              <!--
            <div class="sf_subTtlMainItm" onclick="$(\'#sf_ToolBarFir\').slideToggle();" >
                 Tools
              </div>
           -->
              
            <div class="sf_subTtlMainItm" onclick="$(\'#PageSpeedUpDiv\').slideToggle()" >
                  Speed Up
              </div> 
              <div class="sf_subTtlMainItm" onclick="$(\'#sfPsuTheme\').slideToggle()" >
                  Theme
              </div> 
              <a target="_blank" href="stuff.php" target="_blank"><div class="sf_subTtlMainItm" >
                more
              </div></a>
             
          </div>
          <div class="newPostTypeHold" id="newPostTypeSelecterPopUp" style="display: none;" > 
              <div class="newPostTypeTtl">
                  Select Your Post Type <div class="closeNPTS" onclick="$(\'#newPostTypeSelecterPopUp\').toggle(750)" >X</div>
              </div>
              <div class="newPostInnerCont">
                  
              
                  <div class="newPostTypeItm" id="NPT_Simple" onclick="$(\'#newSimplePost\').slideDown();$(\'#newPostTypeSelecterPopUp\').hide(750)" >
                  <div class="NPT_Ttl">
                       Simple Post
                  </div>
                 
                  <div class="NPTItm_Tip">
                      Publish a quick text
                  </div>
              </div>
              <script>
             f(0);m(2);nf(1);gf(19);
              </script>
              <div class="newPostTypeItm" id="NPT_Smart"  onclick="open_new_post()">
                  <div class="NPT_Ttl">
                       Smart Post
                  </div>
	 <input type="hidden" value="1" id="chkalrdclkd" />
	 <input type="hidden" id="grp_chat_add" value="1" />
                  <div class="NPTItm_Tip">
                      Publish a post with Caption & Image , Video .., Etc
                  </div>
              </div>
              <div class="newPostTypeItm" id="NPT_Album" onclick="open_meme()">
                  <div class="NPT_Ttl"  >
                     MEME Photo
                  </div>
                  <div class="NPTItm_Tip">
                     Post images with big text titles (e.g My reaction..)
                  </div>
              </div>
              
              <div class="newPostTypeItm" id="NPT_Advanced" onclick="$(\'#newPostTypeSelecterPopUp\').hide(750);$(\'#newADVStarts\').slideToggle();" >
                  <div class="NPT_Ttl">
                       Advanced Post
                  </div>
                  <div class="NPTItm_Tip" > 
                      Are you a programmer -
                      Post in HTML language
                  </div>
              </div>
                  </div>
             
          </div>
          <div class="newAdvancedPostStartUp" id="newADVStarts" style="display: none;" >
              <div class="NAPStrt_Ttl">
                  Advanced Post <div class="closeNAPSU" onclick="$(\'#newADVStarts\').fadeToggle();" >X</div>
              </div>
              
                  <div class="NAPSU_Tip">
                     < You can use HTML Language tags and attributes except position and class & id tags . 
                    * Start with div tag ..  ! All tags should be closed >
                  </div>
              <div class="NAPSU_Cont">
                  
                  <div class="NAPSU_Editor">
                      <textarea id="NPASU_TextEditor" placeholder="Type your HTML Code here" oninput="$(\'#NAPSU_AdvTextPrevTerm\').html($(\'#NPASU_TextEditor\').val());"  >  </textarea>
                  </div>
                  <div class="NAPSU_PreviewPane" id="NAPSU_AdvTextPrev" >
                      <div id="NAPSU_AdvTextPrevTerm">
                          Preview Panel
                      </div>
                  </div>
                  
                  
              </div>
              <div style="text-align: center">
                    <div class="NAPSU_Submit" onclick="open_new_post();$(\'#NpPostCaptionContTxt\').val($(\'#NPASU_TextEditor\').val());$(\'#newADVStarts\').fadeOut();">
                  Next Step
              </div>
              <div class="NAPSU_Submit" onclick="upload_adv_post()">
                  Post
              </div>
              </div>
            
          </div>
          <div id="next_setp_post"></div>
          <div class="NPT_QuickPostHolder" id="newSimplePost" style="display: none;" >
          <span class="close_smpl_post" title="Close" onclick="$(\'#newSimplePost\').fadeOut();">X</span>
              <div class="NPT_QPTtl">
                  Simple Post <div class="closeNPTS" onclick="$(\'#newSimplePost\').slideUp()" >X</div>
              </div>
              <div class="NPT_QPCont">
                
                  <textarea  placeholder="What\'s Up ?" id="simple_post_cap" ></textarea>
                  <div class="NPT_QPTip">
                    Note :  To tag a person or specify a person use \'$\' in front of their username ( e.g $user )
                  </div>
              </div>
              <div class="QPSuuB" >
                   <div class="NPT_PostSubmit" onclick="simple_post()">
                      Publish
                  </div>
              </div>
              
          </div>
          <div class="NPT_QuickPostHolder" id="newAlbumPost" style="display: none;" >
              <div class="NPT_QPTtl" style="background-color: darkorange">
                  Photo Album <div class="closeNPTS" onclick="$(\'#newAlbumPost\').slideUp()" >X</div>
              </div>
              <div class="NPT_QPCont">
                
                  <input type="text" class="NA_albumNameInp" placeholder=" album name " />
                  <div class="NPT_QPTip">
                    Note :  The name you type here will be used as folder name in your storage .
                  </div>
              </div>
              <div class="QPSuuB">
                   <div class="NPT_PostSubmit">
                     Next step
                  </div>
              </div>
              
          </div>';
             $qd="select speed_up as p from person_config where user_id=$user_id";
                          $rd=  mysqli_query($dbc, $qd);
                          if($rd)
                          {
                              if(mysqli_num_rows($rd)>0)
                              {
                                  $rf=mysqli_fetch_array($rd,MYSQLI_ASSOC);
                                  $qlty=$rf['p'];
                              }else
                              {
                                  $qlty=40;
                              }
                          }
                          $allrels="checked";
                          $allppls="";
                            $qs="select post_pers_view as pv from person_config where user_id=$user_id";
             $rs=  mysqli_query($dbc, $qs);
             if($rs)
             {
                 if(mysqli_num_rows($rs)>0)
                 {
                     $row=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                     
                     $post_pers=$row['pv'];
                     if($post_pers==0)
                     {
                         $allppl=0;
                            $allrel=1;
                            $allrels="checked";
                            $allppls="";
                     }
                     else
                     {
                         $allrels="";
                         if($post_pers==1)
                         {
                             $allppl=1;
                             $allrel=0;
                             
                         }
                          $allppls="checked";
                     }
                     
                     
                 }else
                 {
                     $allppl=0;
                     $allrel=1;
                 }
             }else
             {
                     $allppl=0;
                     $allrel=1;
                 
             }
             
             
         echo '
          <div id="for_meme"></div>
          <div class="sf_pageSpeedUpOut" id="PageSpeedUpDiv" style="display: none;" >
              <div class="sf_pageSpeedUpTtl">
                  Speed Up Page
              </div>
              <div class="sf_pageSpeedUptm">
                  Image Quality of Posts 
                  <input type="number" id="spped_up_q" placeholder="Image Quality" value="'.$qlty.'" /> %
                  <button onclick="speedup_my_images($(\'#spped_up_q\').val())">
                      Speed Up
                  </button>
                  <div class="SF_PSPUP_Tip">
                      lesser quality speed loading
                  </div>
              </div>
          </div>
          <div class="sf_pageSpeedUpOut" id="sfPsuTheme" style="display: none;"  > 
              <div class="sf_pageSpeedUpTtl">
                  Page Theme
              </div>
              <div class="sf_pageSpeedUptm">
                  What\'s Up Post\'s Style
                  <button  style="background-color:grey" onclick="normTheme()" >
                      Normal
                  </button>
                  <button style="background-color:blue" onclick="compactTheme()" >
                      Compact
                  </button>
                  
                  <div class="SF_PSPUP_Tip">
                      Change how posts look like
                  </div>
              </div>
              <div class="sf_pageSpeedUptm">
                  Size of posts
                  <div class="sf_psuinp">
                      <input id="postSizeDecider" onchange="resizePostUp()"  type="range" min="0"  max="100" />
                  </div>
                  <div class="SF_PSPUP_Tip">
                      set the width of the posts
                  </div>
              </div>
              <div class="sf_pageSpeedUptm">
                  Posts from
                  <input type="radio" '.$allppls.' id="all_ppl" onchange="select_post_pers_view()" name="post_pers"  /> Public
                  <input type="radio" '.$allrels.' onchange="select_post_pers_view()"  name="post_pers" /> Relations
                  <input type="checkbox" checked /> Official
              </div>
          </div>
          <div class="sedfed_Tools_Bar" id="sf_ToolBarFir"  style="display: none;" >
            <div class="sedfed_ToolBarItm" onclick="//page_scroll()" >
                  Auto Scroll
              </div>
              <script>
              function page_scroll()
              {
               window.scrollBy(0,50);
            setInterval(\'page_scroll()\',1000);

              }
              
              
           
            </script>
             <!-- <div class="sedfed_ToolBarItm" onclick="$(\'#sf_ToolBarFir\').slideToggle();$(\'#sf_ToolBarSelct\').slideToggle();" >
                 Select Posts 
              </div> -->
              <div class="sf_toolbarrclose" onclick="$(\'#sf_ToolBarFir\').slideToggle();" >X</div>
          </div>
          <div class="sedfed_Tools_Bar" id="sf_ToolBarScroll" style="display: none;"  > 
              
              <div class="sedfed_ToolBarItm">
                  Auto Scroll : <span id="sf_tbb_scrollSts">On</span>
              </div>
              <div class="sedfed_ToolBarItm">
                  Scroll speed
                  <input type="number" />
              </div>
              <div class="sf_toolbarrclose" onclick="$(\'#sf_ToolBarScroll\').slideToggle()" >X</div>
          </div>
          <div class="sedfed_Tools_Bar" id="sf_ToolBarSelct" style="display: none;"  > 
              
              <div class="sedfed_ToolBarItm">
                 Select All
              </div>
              <div class="sedfed_ToolBarItm">
                 10 posts selected
              </div>
              <div class="sedfed_ToolBarItm">
                 Like
              </div>
              <div class="sedfed_ToolBarItm">
                Hate
              </div>
             
              <div class="sedfed_ToolBarItm">
                 1 star
              </div>
              <div class="sedfed_ToolBarItm">
                 2 stars
              </div>
              <div class="sedfed_ToolBarItm">
                 3 stars
              </div>
              <div class="sedfed_ToolBarItm">
                 4 stars
              </div>
              <div class="sedfed_ToolBarItm">
                 5 stars
              </div>
              <div class="sedfed_ToolBarItm">
                 Download
              </div>
              <div class="sf_toolbarrclose" onclick="$(\'#sf_ToolBarSelct\').slideToggle();" >X</div>
             
          </div>
          <div class="SedFed_leftMouseChecker" onmouseover="showMyAccLeftPane()" >
              
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
                      <a target="_blank" href="people.php"><div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/people.png"  onmouseover="meOnMainBar(event,\'People\')" onmouseout="meOutMainBar()"/>
                      </div></a>
                      <a target="_blank" href="my_messages.php"><div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/messages.png" onmouseover="meOnMainBar(event,\'Messages\')" onmouseout="meOutMainBar()"/>
                      </div></a>
                   <!--   <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/bulbs.png" title="Profile"/>
                      </div> -->
                  
                  <a target="_blank" href="posts.php">    <div class="MainBarItm">
                          <img class="ico_sf_mBar" src="icons/mainBar/whatsup.png"  onclick="$(\'#PostAuditorium\').fadeIn();" onmouseover="meOnMainBar(event,\' What\'s Up \')" onmouseout="meOutMainBar()"/>
                      </div></a>
                        <a target="_blank" href="../'.$_SESSION['user_name'].'/storage.php">  
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:27px;" src="icons/mainBar/folder.png"  onmouseover="meOnMainBar(event,\'My Storage\')" onmouseout="meOutMainBar()"/>
                      </div>
                    <!--  <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:15px;" src="icons/mainBar/password.png" title="Profile"/>
                      </div> -->
                     <a target="_blank" href="settings.php"> <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:27px;" src="icons/mainBar/settings.png" onmouseover="meOnMainBar(event,\'Settings\')" onmouseout="meOutMainBar()"/>
                      </div> </a>
                  <!--    <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:30px;" src="icons/mainBar/lock.png" title="Lock"/>
                      </div>
                      <div class="MainBarItm">
                          <img class="ico_sf_mBar" style="max-height:23px;" src="icons/mainBar/power.png" title="Logout"/>
                      </div> -->
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
                                   <a  href="../web/logout.php" > <img class="ico_sf_Logout"  src="icons/mainBar/powerB.png" /></a>
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
     ';
	 echo '<div style="display:none;" id="for_create_post">';include'create_new_post.php';echo '</div>';
	 echo '
           <div id="CreateNewFlash"></div>
         <div id="for_grp_and_team_creat"></div>
      </div>
    
          
  </body>
</html>
';
        
}