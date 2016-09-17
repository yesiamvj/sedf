<!DOCTYPE html>
<html>
<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
  
        include 'title_bar.php';
 echo '

  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'lin.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'settings.css"/>
   <script src="angular.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
    <body>
          <div id="fullPageContainer">
          <div class="SedFed_SubTitle">
              <div class="Subtitle_Text">Settings</div>
          </div>
          <div class="SedFed_Settings_Cont">
              <div class="SFSet_Ttl">
                  Category of Settings
              </div>
              <div class="SFSet_ContIn">
                  <a href="set_profile.php">
                  <div class="SFSet_ItmHoldr">
                      <div class="SFSet_ItmImgHold">
                          <img src="icons/mainBar/profile.png" alt="profile" />
                      </div>
                      <div class="Set_ItmName">
                          Profile
                      </div>
                  </div>
                  </a>
                  <a href="set_messages.php">
                  <div class="SFSet_ItmHoldr">
                      <div class="SFSet_ItmImgHold">
                          <img src="icons/mainBar/messages.png" alt="profile" />
                      </div>
                      <div class="Set_ItmName">
                          Messages
                      </div>
                  </div>
                  </a>
                  <a href="set_notifications.php">
                  <div class="SFSet_ItmHoldr">
                      <div class="SFSet_ItmImgHold">
                          <img src="icons/mainBar/bulbs.png" alt="profile" />
                      </div>
                      <div class="Set_ItmName">
                          Notifications
                      </div>
                  </div>
                  </a>
                  <a href="set_appearance.php">
                  <div class="SFSet_ItmHoldr">
                      <div class="SFSet_ItmImgHold">
                          <img src="icons/profilePres/sedfed_preview.png" alt="profile" />
                      </div>
                      <div class="Set_ItmName">
                         Appearance
                      </div>
                  </div>
                  </a>
                 <!-- <a href="set_liveTimeline.php">
                 <div class="SFSet_ItmHoldr">
                      <div class="SFSet_ItmImgHold">
                          <img src="icons/mainBar/whatsup.png" alt="profile" />
                      </div>
                      <div class="Set_ItmName">
                          Live Timeline
                      </div>
                  </div>
                  </a> -->
                  <a href="setmyacc.php">
                  <div class="SFSet_ItmHoldr">
                      <div class="SFSet_ItmImgHold">
                          <div class="Set_SedFedLogoHolder">
                              <div class="SedFedLogoTop">
                          </div>
                          <div class="SedFedLogoBottom"></div>
                          </div>
                          
                      </div>
                      <div class="Set_ItmName">
                          Account
                      </div>
                  </div>
                  </a>
              </div>
          </div>
      </div>
    </body>';
 }
 ?>
</html>
     
