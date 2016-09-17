<!DOCTYPE html>
<html>
<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     
      require 'mysqli_connect.php';
      include 'title_bar.php';
      $user_id=$_SESSION['user_id'];
      $q1="SELECT `prof_audience` as audis, theme_txt_color as theme_txt_color,`profPic_Style` as profPic, `backPic_Style` as backPic, `prof_Theme` as profTheme ,`welcomeScr` as welcomeScr ,`welScrStyle` as welScrStyle , `welGlassClr` as welGlassClr FROM `settings_profile`  WHERE `user_id` = '$user_id'";
      $r1=  mysqli_query($dbc, $q1);
      if($r1){
          $rowre= mysqli_fetch_array($r1,MYSQLI_ASSOC);
          $audis=$rowre['audis'];
          $profPic=$rowre['profPic'];
          $backPic=$rowre['backPic'];
         $theme_txt_color=$rowre['theme_txt_color'];
          $profTheme=$rowre['profTheme'];
          $welcomeScr=$rowre['welcomeScr'];
          $welScrStyle=$rowre['welScrStyle'];
          $welGlassClr=$rowre['welGlassClr'];
          switch ($audis){
              case 0:
                  $audis='None';
                  break;
              
              case 1:
                  $audis='Relations only';
                  break;
              case 2:
                  $audis="Relations Of Relations";
                  break;
              case 3:
                  $audis="Everyone";
                  break;   
          }
          switch ($profPic){
              case 1:
                  $profPic='Square';
                  break;
              case 2:
                  $profPic='Circle';
                  break;   
          }
          switch ($backPic){
              case 1:
                  $backPic='Rectangle';
                  break;
              case 2:
                  $backPic='Eclipse';
                  break;   
          }
          
          switch ($welScrStyle){
              case 1:
                  $welScrStyle1='Selected';
                  $welScrStyle2='';
                  break;
              case 2:
                  $welScrStyle1='';
                  $welScrStyle2='Selected';
                  break;   
           default :
	      $welScrStyle1='';
                  $welScrStyle2='Selected';
                  break;  
          }
          
          if($welcomeScr==1){
              $welcomeScr='checked';
          }
          else{
              $welcomeScr='';
          }
          
          
          
          
      }
      else{
          echo mysqli_error($dbc);  
      }
      echo ' <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> Profile Settings - SedFed </title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'lin.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'set_profile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'mainBar.css"/>
   <script src="angular.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
              
              <div class="PageInnerContent">
                  <div class="PageInnerTitle">Profile Page</div>
                  <form id="setProfileform" method="get" action="process_set_profile.php" enctype="multipart/form-data" name="setProfile">
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Audience  </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Show my profile to...</div>
                          <div class="SPI_SubItm">
                              <select name="profAudis" disabled >
                                  <option value="3" >Everyone</option>
                                  <option value="1" >Relations</option>
                                  <option value="2">Relations of Relations</option>
                                  <option value="0">None</option>
                              </select>
                              <div class="SPI_curItms">Current : '.$audis.'
                              </div>
                          </div>  
                      </div>
                  </div>
	
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Profile Picture Style  </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Profile Picture Style on My profile Page</div>
                          <div class="SPI_SubItm">
                              <select name="profPicStyle" >
                                  <option value="1" >Square</option>
                                  <option value="2">Circle</option>
                                 
                              </select>
                              <div class="SPI_curItms">Current : '.$profPic.' </div>
                          </div>  
                           
                      </div>
                  </div>
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Background Picture Style  </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Background Picture Style on My profile Page</div>
                          <div class="SPI_SubItm">
                              <select name="backPicStyle" >
                                  <option value="1" >Rectangle</option>
                                  <option value="2" >Eclipse</option>
                               
                              </select>
                              <div class="SPI_curItms">Current : '.$backPic.' </div>
                          </div>  
                           
                      </div>
                  </div>
               
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Profile Page Style </div>
                         <div class="Set_Prof_ItmAnsHold" id="welcomeScreen" > 
                          
                         <div class="Set_Prof_Itm_Ttl">Welcome Screen</div>
                         <input type="checkbox" id="welScrChk"  name="welcomeScr" onchange="showWelScrDets()" value="1"  '.$welcomeScr.'/> Show Welcome Screen
                         <script>
                             function showWelScrDets(){
                                 if(document.getElementById(\'welScrChk\').checked){
                                     $(\'#welScrDets\').fadeIn();
                                 }
                                 else{
                                      $(\'#welScrDets\').slideUp();
                                 }
                             }
                         </script>
                         <br/>
                            <span> Welcome screen will be displayed before your profile page .Visitors have to click it to see your profile.</span>
                         
                              <br/>
                              <div class="SPI_SubItm" id="welScrDets" style="display: none;" >
                                  Welcome Screen Type 
                                  <select id="welscrTyped" name="welScrStyle" onchange="welScrSel()" onclick="welScrSel()" >
                                      <option value="1" '.$welScrStyle1.' >Wallpaper</option>
                                      <option value="2"  '.$welScrStyle2.' >Glass Background</option>
                                  </select>
                                  <script>
                                      function welScrSel(){
                                          if( $(\'#welscrTyped\').val()===\'2\'){
                                              $(\'#GlassCo\').slideDown();
                                          }
                                          else{
                                               $(\'#GlassCo\').slideUp();
                                          }
                                         
                                      }
                                      </script>
                                      <div id="GlassCo"  style="display: none;" >
                                          Glass Color &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="color" name="welGlassClr" id="welGlassClr" oninput="showWelPre()" onchange="showWelPre()" value="'.$welGlassClr.'" />
                                 <div class="previewGlassBtn" onclick="$(\'#welcomePreview\').slideDown();" >
                                     Preview
                                 </div>
                                  </div> 
                                 <script>
                                     
                                     function showWelPre(){
                                      
                                         $(\'#welcomePreview\').css({\'background-color\':$(\'#welGlassClr\').val()});
                                     }
                                 </script>
                              </div>
                              <div id="welcomePreview" style="display: none" onclick="$(\'#welcomePreview\').slideUp();" >
                                  <div id="huTxy" >Click to close</div> 
                              </div>
                           
                          
                           
                      </div>
                 
                 <br/>
                      <div class="Set_Prof_ItmAnsHold">
                           <div class="Set_Prof_Itm_Ttl">My Theme</div>
                             <div class="SPI_Tip"> All Title bars of your SedFed Pages will be in this color and in many places </div>
                          <div class="SPI_SubItm">
                              
                              <div class="SPI_chngeBtns"  id="SPI_ThemeColor" style="background-color:'.$profTheme.';color:'.$theme_txt_color.'" onclick="$(\'#SPI_thmeClrInp\').click();" >Current </div> 
                              <input id="SPI_thmeClrInp" name="profThme" onchange="themeColorInp()" type="color" style="display: none;" />
                               <input type="color" name="theme_txt_color" name="prof_txt_clr" onchange="themeColorInp()"  id="themeTextColor"  style="display: none;" />
                        
		 <script>
                                  function themeColorInp(){
                                      $(\'#SPI_ThemeColor\').css({\'background-color\':$(\'#SPI_thmeClrInp\').val()});
                                      $(\'#sedfedTtlBar\').css({\'background-color\':$(\'#SPI_thmeClrInp\').val()});
		    $(\'#sedfedTtlBar\').css({\'color\':$(\'#themeTextColor\').val()});
		    $(\'#SPI_ThemeColor\').css({\'color\':$(\'#themeTextColor\').val()});
                                      
                                  }
                                  
                               </script>   
                          </div>  
                          <div class="SPI_SubItm">
                              
                              <div class="SPI_chngeBtns" onclick="$(\'#SPI_thmeClrInp\').click();" > Change My Theme Color </div> 
	              <div class="SPI_chngeBtns" onclick="$(\'#themeTextColor\').click();" > Change My Text Color </div> 
                         
       </div>  
                           
                      </div>
                 <br/><br/>
                
                 <div id="SPSet_Proceed" onclick="$(\'#setProfileform\').submit();" >
                     Update My Settings
                 </div>
                  </div>
                  </form>
              </div>
          
      </div>
  </body>';
 }
 ?>
</html>