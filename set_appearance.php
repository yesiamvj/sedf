<!DOCTYPE html>

<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      include 'title_bar.php';
        $q1="SELECT appearSet_Id as settingsId FROM `settings_appearance` WHERE `user_id` = $user_id ORDER BY `settings_appearance`.`appearSet_Id` DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
          if($setId!=''){
             $q2="SELECT `titleBar` as titleBar, `whatsUp` as whatsUp, `taskBar` as taskBar, `liveTimeline` as liveTimeline, `onlines` as onlines, `background` as background, `colorBack` as colorBack FROM `settings_appearance` WHERE `appearSet_Id` = $setId;";      
             $r2=mysqli_query($dbc,$q2);
                  
                    if($r2)
                    {
                        $rowre= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                        $titleBar=$rowre['titleBar'];
                        $whatsUp=$rowre['whatsUp'];
                        $taskBar=$rowre['taskBar'];
                        $liveTimeline=$rowre['liveTimeline'];
                        $onlines=$rowre['onlines'];
                        $background=$rowre['background'];
                       // $colorBack=$rowre['colorBack'];
                     
                switch ($background){
                 case 1:
                     $background='Silent';
                     $background1='selected';
                     $background2='';
                     $background3='';
                     break;
                 case 2:
                    $background='Default : Water Drop';
                    $background1='';
                    $background2='selected';
                    $background3='';
                     break;
                 case 3:
                    $background='My Tone';
                    $background1='';
                    $background2='';
                    $background3='selected';
                     break;
                
          }
        
          if($titleBar==0){
              $titleBar='';
          }
          else{
              $titleBar='checked';
          }
          if($whatsUp==0){
              $whatsUp='';
          }
          else{
              $whatsUp='checked';
          }
          if($taskBar==0){
              $taskBar='';
          }
          else{
              $taskBar='checked';
          }
          if($liveTimeline==0){
              $liveTimeline='';
          }
          else{
              $liveTimeline='checked';
          }
               
          if($onlines==0){
              $onlines='';
          }
          else{
              $onlines='checked';
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
    <link rel="stylesheet" href="lin.css"/>
    <link rel="stylesheet" href="mainBar.css"/>
    <link rel="stylesheet" href="set_profile.css"/>
   <script src="angular.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
          
          <div class="SedFed_SubTitle">
              <div class="Subtitle_Text">Appearance Settings</div>   
          </div>
              <div class="PageInnerContent">
                  <div class="PageInnerTitle">Main Page</div>
                 
                  <form method="GET" action="process_set_appear.php" id="appearSetForm" >
                      
                
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl"> Contents</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip"> Contents On my main Page </div>
                         <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="titleBar" '.$titleBar.' />Title Bar</div>  
                         <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" disabled checked/>Acivity Bar</div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="whatsUp" '.$whatsUp.' /> What\'s Up </div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="taskBar" '.$taskBar.' /> Notification & Task Bar </div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="liveTimeline" '.$liveTimeline.'/> Live Timeline </div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="onlines" '.$onlines.' /> Online Window </div>  
                           
                      </div>
                  </div>
                  
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Background</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">My background Image / color in Main Page</div>
                          <select name="background" >
                              <option value="1" '.$background1.' >Default : SedFed\'s Choice</option>
                              <option value="2" '.$background2.' >Color</option>
                              <option value="3" '.$background3.' >Image</option>
                              </select>
                          <div class="SPI_SubItm">
                              <div class="SPI_chngeBtns" onclick="$(\'#colorBaack\').click();" > Change Color </div> 
                              <input type="color" value="#ffffff" name="colorBack" id="colorBaack" onchange="$(body).css({\'background-color\':$(\'#colorBaack\').val()})" />
                              <div class="SPI_chngeBtns"> Change Image </div> 
                          
                          </div>  
                           
                      </div>
                  </div>
                      <br/>
                      
                     <div id="SPSet_Proceed" onclick="$(\'#appearSetForm\').submit();" >
                     Update My Settings
                 </div>
                    </form>
              </div>
          
      </div>
  </body>
</html>
';        
                        }
                        
                        
                        
                        else{
                             echo " r2 not success";
                        echo mysqli_error($dbc);
                        }
                       
         
          
                    }
                    
         else{
             $q4="INSERT INTO `settings_appearance` (`user_id`) VALUES ('$user_id');";
              $r4=  mysqli_query($dbc,$q4);
             if($r4){
                 header("location:set_appearance.php");
             }
             else{
                 echo 'New Setting Id Can\'t be Creatd';
                 echo mysqli_error($dbc);
                 echo $q4;
             }
             
         }
         
     }
    
     
                
       
          
 }
          
      
     
 
 ?>
