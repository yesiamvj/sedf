<!DOCTYPE html>
<html>
<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      include 'title_bar.php';
       $q1="SELECT notifSet_Id as settingsId FROM `settings_notifications` WHERE `user_id` = $user_id ORDER BY `settings_notifications`.`notifSet_Id` DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
            
                    $q2="SELECT `notifCount` as notifCount, `notifPopUp` as notifPopUp, `notifTone` as notifTone, `notifFlash` as notifFlash, `notifDim` as notifDim, `notifWhoseTone` as notifWhoseTone FROM settings_notifications   WHERE `settings_notifications`.`notifSet_Id` = $setId;";
                    $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        $rowre= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                        $notifCount=$rowre['notifCount'];
                        $notifPopUp=$rowre['notifPopUp'];
                        $notifTone=$rowre['notifTone'];
                        $notifFlash=$rowre['notifFlash'];
                        $notifDim=$rowre['notifDim'];
                        $notifWhoseTone=$rowre['notifWhoseTone'];
                     
                switch ($notifWhoseTone){
                 case 10:
                     $notifWhoseTone='Silent';
                     $notifWhoseTone0='selected';
                     $notifWhoseTone1='';
                     $notifWhoseTone2='';
                     break;
                 case 1:
                    $notifWhoseTone='Default : Water Drop';
                    $notifWhoseTone0='';
                    $notifWhoseTone1='selected';
                    $notifWhoseTone2='';
                     break;
                 case 2:
                    $notifWhoseTone='My Tone';
                    $notifWhoseTone0='';
                    $notifWhoseTone1='';
                    $notifWhoseTone2='selected';
                     break;
                
          }
        
          if($notifCount==0){
              $notifCount='';
          }
          else{
              $notifCount='checked';
          }
          if($notifDim==0){
              $notifDim='';
          }
          else{
              $notifDim='checked';
          }
          if($notifPopUp==0){
              $notifPopUp='';
          }
          else{
              $notifPopUp='checked';
          }
          if($notifFlash==0){
              $notifFlash='';
          }
          else{
              $notifFlash='checked';
          }
               
          if($notifTone==0){
              $notifTone='';
          }
          else{
              $notifTone='checked';
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
    <title>Notification Settings - SedFed </title>
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
              <div class="Subtitle_Text">Notification Settings</div>   
          </div>
              <div class="PageInnerContent">
                  <div class="PageInnerTitle">Incoming Notifications</div>
                 
                  <form id="notifSetForm" method="GET" action="process_set_notifs.php">
                      
                
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl"> Notification Alert </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">On a new Notification</div>
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox"  name="notifCount" '.$notifCount.' />Count</div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="notifPopUp" '.$notifPopUp.' />Pop Up </div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox" name="notifTone" '.$notifTone.' /> Alert Tone </div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox"  name="notifFlash" '.$notifFlash.' /> Flash Screen </div>  
                          <div class="SPI_SubItm"> <input class="SPI_Chks" type="checkbox"  name="notifDim" '.$notifDim.' /> Dim Screen </div>  
                           
                      </div>
                  </div>
                  
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Notification Alert Tone</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Play this music when New notification </div>
                          <select name="notifWhoseTone" disabled>
                              <option value="1" '.$notifWhoseTone1.' >Default : Water drop</option>
                              <option value="2" '.$notifWhoseTone2.' >My Alert Tone</option>
                              <option value="10" '.$notifWhoseTone0.' >Silent</option>
                            
                              </select>
                       
                           
                      </div>
                  </div>';
          $q5="SELECT notifyFor_Id as settingsId FROM `notifymefor` WHERE `user_id` = $user_id ORDER BY `notifyFor_Id` DESC limit 1;";
                        $r5=  mysqli_query($dbc, $q5);
                        if($r5){
                            
                             $row4=mysqli_fetch_array($r5,MYSQLI_ASSOC);
         $set2Id=$row4['settingsId'];
         if($set2Id!=''){
             $q11="SELECT `profPic` as profPic, `wallPic` as wallPic, `BackPic` as BackPic, `ProfUpdates` as ProfUpdates, `Status` as Status, `BGM` as BGM  FROM  notifymefor  WHERE `notifymefor`.`notifyFor_Id` = $set2Id;";       
             $r11=mysqli_query($dbc,$q11);
             if($r11){
                 $row11=mysqli_fetch_array($r11,MYSQLI_ASSOC);
                    $profPic=$row11['profPic'];
                    $wallPic=$row11['wallPic'];
                    $BackPic=$row11['BackPic'];
                    $ProfUpdates=$row11['ProfUpdates'];
                    $Status=$row11['Status'];
                    $BGM=$row11['BGM'];
                     if($profPic==0){
                            $profPic='';
                    }
                    else{
                            $profPic='checked';
                    }
                     if($wallPic==0){
                            $wallPic='';
                    }
                    else{
                            $wallPic='checked';
                    }
                     if($BackPic==0){
                            $BackPic='';
                    }
                    else{
                            $BackPic='checked';
                    }
                     if($ProfUpdates==0){
                            $ProfUpdates='';
                    }
                    else{
                            $ProfUpdates='checked';
                    }
                     if($Status==0){
                            $Status='';
                    }
                    else{
                            $Status='checked';
                    }
                    
                    }
                     if($BGM==0){
                          $BGM='';
                    }
                    else{
                            $BGM='checked';
                    }
                    
                    echo '  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Notify Me</div>
                      <div class="SPI_Tip"> Notify Me On </div>
                      <div class="Set_Prof_ItmAnsHold">
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="profPic" '.$profPic.' /> Profile Picture Change
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="wallPic" '.$wallPic.' /> Wallpaper Picture Change
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="BackPic" '.$BackPic.' /> Background Picture Change
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="ProfUpdates" '.$ProfUpdates.' /> Profile Updates 
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="Status" '.$Status.' /> Status Update
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" name="BGM" '.$BGM.' /> BGM Change
                        </div>  
                       
                           
                      </div>
                 ';
                    
             }
             else{
                       echo "r11 not run";
                        echo mysqli_error($dbc);
             }
         }
         else{
             $q3="INSERT INTO `notifymefor` (`user_id`) VALUES ('$user_id');";
             $r3=  mysqli_query($dbc,$q3);
             if($r3){
                 header("location:set_notifications.php");
             }
             else{
                 echo 'New Setting Id Can\'t be Creatd';
                 echo mysqli_error($dbc);
                 echo $q3;
             }
         }
                       
                        }
                        else{
                             echo "update not success";
                        echo mysqli_error($dbc);
                        }
                       
          echo'
                
                 
                 <br/><br/>
                 <div id="SPSet_Proceed" onclick="$(\'#notifSetForm\').submit();" >
                     Update My Settings
                 </div>
                  </div>
                    </form>
              </div>
          
      </div>
  </body>
</html>';
          
          
          
                    }
                    else
                    {$q4="INSERT INTO `settings_notifications` (`user_id`) VALUES ('$user_id');";
              $r4=  mysqli_query($dbc,$q4);
             if($r4){
                 header("location:set_notifications.php");
             }
             else{
                 echo 'New Setting Id Can\'t be Creatd';
                 echo mysqli_error($dbc);
                 echo $q4;
             }
                    }
         }
         else{
             
             
         }
         
     }
    
     
                
       
          
          
          
      
     
 
 ?>
</html>