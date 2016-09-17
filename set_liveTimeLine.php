<!DOCTYPE html>

<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
       $q1="SELECT liveTimelineSet_Id as settingsId FROM `settings_livetimeline` WHERE `user_id` = $user_id  ORDER BY liveTimelineSet_Id DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
          if($setId!=''){
             $q2="SELECT `allowMyActs` as allowMyActs, `login` as login, `logout` as logout, `chatAvail` as chatAvail, `postActs` as postActs, `profUpdates` as profUpdates, `flashActs` as flashActs FROM `settings_livetimeline` WHERE  `settings_livetimeline`.`liveTimelineSet_Id` = $setId;";
            $r2=mysqli_query($dbc,$q2);
                  
                    if($r2)
                    {
                        $rowre= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                        $allowMyActs=$rowre['allowMyActs'];
                        $login=$rowre['login'];
                        $logout=$rowre['logout'];
                        $chatAvail=$rowre['chatAvail'];
                        $postActs=$rowre['postActs'];
                        $profUpdates=$rowre['profUpdates'];
                        $flashActs=$rowre['flashActs'];
                       // $colorBack=$rowre['colorBack'];
                     
                switch ($allowMyActs){
                 case 1:
                     $allowMyActs='Allow';
                     $allowMyActs1='selected';
                     $allowMyActs10='';
                     
                     break;
                 case 10:
                    $$allowMyActs='Deny';
                    $allowMyActs1='';
                    $allowMyActs10='selected';
                   
                     break;
                 
                
          }
        
          if($login==0){
              $login='';
          }
          else{
              $login='checked';
          }
          if($logout==0){
              $logout='';
          }
          else{
              $logout='checked';
          }
          if($chatAvail==0){
              $chatAvail='';
          }
          else{
              $chatAvail='checked';
          }
          if($postActs==0){
              $postActs='';
          }
          else{
              $postActs='checked';
          }
               
          if($profUpdates==0){
              $profUpdates='';
          }
          else{
              $profUpdates='checked';
          }
          if($flashActs==0){
              $flashActs='';
          }
          else{
              $flashActs='checked';
          }
          
        
               
          echo '<html>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
          
          <div class="SedFed_SubTitle">
              <div class="Subtitle_Text">Time Line Settings</div>   
          </div>
              <div class="PageInnerContent">
                  
                  <div class="PageInnerTitle">Live Time Line</div>
                  <form method="GET" action="process_set_liveTimeLine.php" id="setLiveTimeLineForm" >
                      
                 
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Include</div>
                      <div class="SPI_Tip"> Include My Activities On Timeline </div>
                      <div class="Set_Prof_ItmAnsHold">
                        <div class="SPI_SubItm"> 
                            <select name="allowMyActs" >
                                <option value="1" '.$allowMyActs1.' >Allow</option>
                                <option value="10" '.$allowMyActs10.' >Deny</option>
                            </select>
                   
                           
                      </div>
                 
                 
                
               
                  </div>
                  </div>
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">My Activities </div>
                      <div class="SPI_Tip"> Show these  activities of mine On other\'s Time Line </div>
                      <div class="Set_Prof_ItmAnsHold">
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="login" '.$login.' /> Login 
                        </div>  <br/> <br/>
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="logout" '.$logout.'/> Logout
                        </div>  <br/> <br/>
                        <div class="SPI_SubItm">
                            <input class="SPI_Chks" type="checkbox" name="chatAvail" '.$chatAvail.'/> Available for Chat
                        </div>  <br/> <br/>
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="postActs" '.$postActs.'/> Post Activities
                        </div>  <br/> <br/>
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="profUpdates" '.$profUpdates.'/> Profile Updates
                        </div>  <br/> <br/>
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="flashActs" '.$flashActs.'/> Flash Activities
                        </div>  
                       
                           
                      </div>
                 
                 
                 <br/><br/>
                 <div id="SPSet_Proceed" onclick="$(\'#setLiveTimeLineForm\').submit();" >
                     Update My Settings
                 </div>
                  </div>
                   </form>
              </div>
          
      </div>
  </body>
</html>';        
                        }
                        
                        
                        
                        else{
                             echo " r2 not success";
                        echo mysqli_error($dbc);
                        }
                       
         
          
                    }
                    
         else{
              $q4="INSERT INTO `settings_livetimeline` (`user_id`) VALUES ('$user_id');";
             $r4=  mysqli_query($dbc,$q4);
             if($r4){
                 header("location:set_liveTimeLine.php");
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
