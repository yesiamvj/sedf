<!DOCTYPE html>
<?php session_start();
 $rand=rand(2,100);
$usragnt=$_SERVER['HTTP_USER_AGENT'];
$symbian=  strpos($usragnt,"SymbianOS");
$nokia = strpos($usragnt,"Nokia");
$sony=  strpos($usragnt,"SonyEricsson");
$phone = strpos($usragnt,"Phone");
$iphone = strpos($usragnt,"iPhone");
$android = strpos($usragnt,"Android");
$palmpre = strpos($usragnt,"webOS");
$berry = strpos($usragnt,"BlackBerry");
$ipod = strpos($usragnt,"iPod");
$mobile = strpos($usragnt,"Mobile");
$Mobile2 = strpos($usragnt,"mobile");

if ($iphone || $symbian || $nokia || $sony || $phone || $android || $palmpre || $ipod || $berry || $mobile || $Mobile2 == TRUE) 
{ 
    $_SESSION['css']='mobcss/';
}
 else {
     if ($iphone || $android || $palmpre || $ipod || $berry || $mobile || $Mobile2==TRUE){
         $_SESSION['css']='mobcss/';
     }
 else {
          $_SESSION['css']='';
     
 }
 }
 
if(!empty($_SESSION['user_id']) || !empty($_SESSION['user_name']))
{
             
    header("location:globe.php");
   
}
else{
   
 
    
echo '
<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
        <meta http-equiv="Author" content="Vijayakumar for SedFed" />   
    <title>|    SedFed - A Colorful Communication</title>
    
    <link type="text/css" href="'.$_SESSION['css'].'homePage_1.css" rel="stylesheet" />
    <link type="text/css" href="'.$_SESSION['css'].'indexold.css" rel="stylesheet" />
    <script src="jquery.min.js" type="text/javascript"></script>
   <script src="forgotpass.js" type="text/javascript"> </script>    
   <script src="homePage.js" type="text/javascript"> </script>    
   
   
  </head>
  
  <body onload="showPageStatus()" >
  
    <div id="SF_BigSearch" class="BigSearchBarOut" style="display: none;" >
          <div class="BigSearchBarIn">
              <input type="text" id="SF_inpBigSrch" oninput="srchInp()" placeholder="Search People on SedFed ..." />
              <script>
                  function srchInp(){
                      if($(\'#SF_inpBigSrch\').val()===\'\'){
                          $(\'#SF_SearchSugg\').slideUp();
                      }
                      else{
                          $(\'#SF_SearchSugg\').slideDown();
                      }
                  }
                  </script>
              <div class="BS_Prcd" title="Search">
                  <img class="ico_TtlBarSrch" alt="Search"  src="icons/mainBar/search.png"  />
              </div>
          </div>
      </div>
      </div>
      <div class="SF_BigSrchResultOut" id="SF_SearchSugg" style="display:none;" >
          <div class="SF_BSrchItm">
              <div class="SF_BSrchItmFace">
                  <img src="profileimg.PNG" class="img_srchRes" />
              </div>
              <div class="SF_BSrchItmDets">
                  <div class="SF_BSUserName">Vijayakumar <div class="SFBS_SedfedDets"> SedFed ID : 1</div> </div>
                  <div class="SF_BSUserExtra">Male <span class="divider">18+</span><span class="divider">Salem , Tamilnadu</span></div>
              </div>
          </div>
      </div>
        <div class="SedFedTitleBar" style="display:none" >
            <div id="SedFedVersion2Load">
                <div class="SedFedVersion2Logo">
                    <div id="sedfedLogoTop"></div>
                    <div id="sedfedLogoProgress"></div>
                </div>
                <div class="SedFedVersion2Name">SedFed</div>
                <div class="SedFedLoadStatusOut">
                    <div class="SedFedLoadLiveStatus" id="pageLoadedStatus" ></div>
                </div>
            </div>
            <div class="SedFedLogo">
                <div id="sedfedLogoTop"></div>
                <div id="sedfedLogoProgress"></div>
            </div>
              <div class="TitleBarOut">
                  <div class="TtlBarIn">
                      <div class="TtlBarTtl">
                          
                          <div class="SedFedUserName"> SedFed  </div>
                      </div>
                      <div class="TtlBar_SrchHold">
                          <div class="SFTB_srchIn">
                              <input class="SFTB_srchInp" type="text" placeholder="Search People on SedFed ..."  onclick="$(\'#SF_BigSearch\').fadeIn();$(\'#SF_inpBigSrch\').focus();"  />
                               <img class="ico_TtlBarSrch" src="icons/mainBar/search.png"  />
                          </div>
                          <div class="SFTB_searchSubmit">
                             
                          </div>
                      </div>
                     <a href="register.php"><div class="register_BtnTop" id="inviteToSedFed" >
                        Create New Account
                     </div></a>
                      </div>
                      
                     
                  </div>
                
              
              </div>
          </div>
                  <div id="SedFed_Title_Bar">
           <img src="sedfed2.png" class="sf_icon" />
           <a href="register.php"><div id="TopInviteBtn">Create New Account</div>
      </div></a>
      <div id="SedFed_SubTitle">
         
         
        <div class="SF_ST_Itm"> hey , it\'s sedfed </div>
         
      </div>
                
             <div id="logins"  >
                 <div id="navs">
                     <br/>
                     <button id="lgin"> Sign In </button>
                   </div>
                 <br/><font id="cption2">
                 Already Registered?</font>
                 <div id="inps">
                     <form autocomplete="on" action="checklogin.php" method="post">
                        <br/> <font id="cption"> Username </font><br/>
                         <input autocomplete="on" type="text" id="usrnme" name="username" autofocus placeholder="  Email  /  Mobile  /  Username " title="SedFed Username"/> <br/>
                        <br/> <font id="cption"> Password</font><br/> 
                        <input type="password" name="password" id="pswd" placeholder="Password" title="One of your optional Password"/> 
                        <div class="LoginItm">
                        <select id="loginType" name="which_type">
                            <option value="1">Usual Login</option>
                            <option value="2">Check Notifications</option>
                            <option value="3">Messaging</option>
                            <option value="4">What\'s Up</option>
                           
                        </select>
                        </div>
                        
                        <div id="lgn"> <input type="submit" value="Login" id="lbtn" /></div>
                     </form>
                 </div>
                 <br/>
                 <div id="frgtpass"></div><br/><span id="txtHint"></span>
                 &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="forgotbtn" value="Forgot Your Password ?" onclick="frgtpass()"/> 
      
      </div>
          
          </div>
          
      </div>
       
       <div class="SF_QuickSignUpWindowOut" id="SF_QuickSignUpWindow">
                  <div class="SF_QSUPWinIn">
                      <div class="SF_QSUPWinTtl">Quick Sign Up</div>
                      <div class="SF_QSUPWinCont">
                          <div class="SF_QSUPWinQueItm">
                              <input type="text" placeholder=" Email Id " />
                          </div>
                          <div class="SF_QSUPWinQueItm">
                              <input type="text" placeholder="Mobile Number" />
                          </div>
                          <div class="SF_QSUPWinQueItm">
                              <input type="password" placeholder="Password 1" />
                          </div>
                          <div class="SF_QSUPWinQueItm">
                              <input type="password" placeholder="Password 2" />
                          </div>
                          <div class="SF_QSUPWinQueItm">
                              <input type="checkbox" /> Accept Terms and Conditions
                          </div>
                          <div class="SF_QSUP_Proceed">
                              Sign Up
                          </div>
                          
                      </div>
                  </div>
              </div>
          
          
      <div id="SedFedV2TaskBarBottom" onmouseover="$(\'#backPicOwnerExp\').slideToggle();">
          <div class="SFV2TBB_Itm"  >
           This is demo background @ SedFed
       </div>
          
      </div>
      <div class="SF_pageBgPicDets" id="backPicOwnerExp" onmouseout="//$(\'#backPicOwnerExp\').slideDown();" >
          <div class="SF_PBGDet_Ttl">
              <div class="SFPBG_by">Background Picture by</div> SedFed
          </div>
          <div class="SFPBG_Caption">
              This picture is just a demo
          </div>
          
          <div class="SF_pageBgPicDetIn">
             
              <div class="SG_PBGPD_ItmCount" id="SF_BG_LikeNo"></div>
             
              <div class="SG_PBGPD_ItmCount" id="SF_BG_UnLikeNo" ></div>
          </div>
      </div>
      <div class="SedFed_Home_UnderGround">
               <div class="SF2_OpeningDescription">
                  <div class="justATtl">about</div>
                        Welcome to SedFed , SedFed is a free Social Network where Everything and everything is possible and available.
                  </div>
                  
          <div class="SedFed_Home_UG_In">
          <div class="AYSF_Ttl" onclick="//$(\'.AYSF_Itm\').fadeToggle();$(\'.SF2_OpeningDescription\').fadeToggle();" >
                 Why SedFed ?
        </div>
        
      <div class="About_Your_SedFed">
     
          <div class="AYSF_In">
             
              <div class="AYSF_Cont">
                  <div class="AYSF_Itm" style="color:green" >
                  <div><img class="ico_AYSF" src="icons/homePage/account.png" /></div>
                      Your Account , Your Rules 
              </div>
              <div class="AYSF_Itm" style="color:darkcyan">
              <div><img class="ico_AYSF" src="icons/homePage/cusPage.png" /></div>
                  Fully Customizable Pages 
                  
              </div>
              <div class="AYSF_Itm" style="color:crimson" >
              <div><img class="ico_AYSF" src="icons/homePage/fakePpl.png" /></div>
                  No fake accounts 
              </div>
              <div class="AYSF_Itm" style="color:indigo" >
              <div><img class="ico_AYSF" src="icons/homePage/lock.png" /></div>
                  Ultra Secure 
              </div>
              <div class="AYSF_Itm" style="color:blue">
              <div><img class="ico_AYSF" src="icons/homePage/mute.png" /></div>
                  Ad Free 
              </div>
              </div>
              
          </div>
      </div>
      <div class="toBeBlured">
              <div class="SedFedUserChoice">
                  <div class="SFUC_Ttl">
                      It\'s Your Own Page <span class="SFUC_tip"> Wanna Participate ?</span>
                  </div>
                  
                  <div class="SFUC_BgPic">
                      <div class="SFUC_ItmTip"> Your picture will displayed on SedFed homepage as background * </div> <div class="SFUC_Btn" onclick="$(\'#SFUC_BGimg\').fadeIn();"> Upload Picture</div>
                  </div>
                  <div class="SFUC_HomePage">
	 <input type="file" id="upload_html_fl" onchange="upload_html_file(this)" />
                     <div class="SFUC_ItmTip"> Your page will be displayed as SedFed homepage * </div> <div class="SFUC_Btn" onclick="$(\'#upload_html_fl\').click();"> Upload HTML</div>
                  </div>
                  <div class="SFUC_UpsDetsHoldr" id="SFUC_BGimg" style="display: none;" >
                      <div class="SFUCUDH_Ttl">
                          My Background Image for SedFed <div class="closeSFUCwin" onclick="$(\'#SFUC_BGimg\').slideUp();" >X</div>
                      </div>
                      <div class="SFUCUDH_Itm">
                          <input type="text" placeholder="Your Name" id="sf_uploader"  />
                      </div>
                      <div class="SFUCUDH_Itm">
                          <input type="text" id="sf_uplader_emil" placeholder="Email" />
                      </div>
                      <div class="SFUCUDH_Itm">
                          <input type="text" id="sf_about_this_pic" placeholder="Something about this picture" />
                      </div>
                      <div class="SFUCUDH_Itm">
                          Add any image <input type="file" id="sf_bg_pic"/>
                      </div>
                      <div class="SFUCUDH_Itm">
                          * Your Image will be scanned before processing and will be available soon .<br/> Your Image will be displayed for 2 hours Only .
                      </div>
                      <div class="SFUCUDH_Submit" onclick="upload_sf_bg_pic()" >
                          Upload
                      </div>
                      
                  </div>
                
                  <div class="SFUC_UploadStatus" id="BackPic" style="display: none;" >
                      Uploading
                      <div class="SFUC_UploadStsOut">
                          <div class="SFUC_UploadStsIn"></div>
                      </div>
                  </div>
                  <!-- on uploaded display this and fadeout -->
                  <div class="SFUC_UpOk" style="display: none;" >
                      Your file has been Received and will be processed. We will send confirmation Email.
                  </div>
              </div>
              <div class="about_us">
              <a href="sedfed.com/about">
                  <div class="au_col_itm" id="about_us_link" >
                    about us
                  </div>
                  </a>
                  <div class="au_col_itm">
                    Just a Social Network
                  </div>
                  <div class="au_col_itm">
                        SedFed <sub>2.0</sub>
                  </div>
              </div>
          </div>
          
      </div>
       <div class="sf_bottom_tm">
              &copy; 2015  <span style="color: white;font-size: 17px;" >  sedfed </span> <sup>TM</sup>  - All rights reserved
            </div>
      </div>
     </body>
</html>
';
include 'notifs.html';
}
?>
