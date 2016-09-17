<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      
     if(!empty($_REQUEST['notifWhoseTone'])){
         $notifWhoseTone=mysqli_real_escape_string($dbc,trim($_REQUEST['notifWhoseTone']));
     }
     else{
         $notifWhoseTone=1;
     }
   
     if(isset($_REQUEST['notifCount'])){
        $notifCount=1;
        }
     else{
       $notifCount=0;
     }
    
     if(isset($_REQUEST['notifPopUp'])){
        $notifPopUp=1;
        }
     else{
       $notifPopUp=0;
     }
    
     if(isset($_REQUEST['notifTone'])){
        $notifTone=1;
        }
     else{
       $notifTone=0;
     }
    
     if(isset($_REQUEST['notifFlash'])){
        $notifFlash=1;
        }
     else{
       $notifFlash=0;
     }
    
     if(isset($_REQUEST['notifDim'])){
        $notifDim=1;
        }
     else{
       $notifDim=0;
     }
     if(isset($_REQUEST['profPic'])){
        $profPic=1;
        }
     else{
       $profPic=0;
     }
     if(isset($_REQUEST['wallPic'])){
        $wallPic=1;
        }
     else{
       $wallPic=0;
     }
     if(isset($_REQUEST['BackPic'])){
        $BackPic=1;
        }
     else{
       $BackPic=0;
     }
     if(isset($_REQUEST['ProfUpdates'])){
        $ProfUpdates=1;
        }
     else{
       $ProfUpdates=0;
     }
    
     if(isset($_REQUEST['Status'])){
        $Status=1;
        }
     else{
       $Status=0;
     }
    
     if(isset($_REQUEST['BGM'])){
        $BGM=1;
        }
     else{
       $BGM=0;
     }
    
    
     $q1="SELECT notifSet_Id as settingsId FROM `settings_notifications` WHERE `user_id` = $user_id ORDER BY `settings_notifications`.`notifSet_Id` DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
                    $q2="UPDATE `settings_notifications` SET `notifCount` = '$notifCount', `notifPopUp` = '$notifPopUp', `notifTone` = '$notifTone', `notifFlash` = '$notifFlash', `notifDim` = $notifDim, `notifWhoseTone` = '$notifWhoseTone' WHERE `settings_notifications`.`notifSet_Id` = $setId;";
                    $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        
                        $q5="SELECT notifyFor_Id as settingsId FROM `notifymefor` WHERE `user_id` = $user_id ORDER BY `notifyFor_Id` DESC limit 1;";
                        $r5=  mysqli_query($dbc, $q5);
                        if($r5){
                            
                             $row4=mysqli_fetch_array($r5,MYSQLI_ASSOC);
         $set2Id=$row4['settingsId'];
         if($set2Id!=''){
             $q11="UPDATE `notifymefor` SET `profPic` = '$profPic', `wallPic` = '$wallPic', `BackPic` = '$BackPic', `ProfUpdates` = '$ProfUpdates', `Status` = '$Status', `BGM` = '$BGM' WHERE `notifymefor`.`notifyFor_Id` = $set2Id;";       
             $r11=mysqli_query($dbc,$q11);
             if($r11){
                 header("location:set_notifications.php");
             }
             else{
                       echo "update not success";
                        echo mysqli_error($dbc);
             }
         }
         else{
             $q3="INSERT INTO `notifymefor` (`notifyFor_Id`, `user_id`, `profPic`, `wallPic`, `BackPic`, `ProfUpdates`, `Status`, `BGM`) VALUES (NULL, '$user_id', '$profPic','$wallPic', '$BackPic', '$ProfUpdates', '$Status', '$BGM');";
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
                       
                       
                    }
                    else
                    {
                        echo "update not success";
                        echo mysqli_error($dbc);
                    }
         }
         else{
             $q4="INSERT INTO `settings_notifications` (`notifSet_Id`, `user_id`, `notifCount`, `notifPopUp`, `notifTone`, `notifFlash`, `notifDim`, `notifWhoseTone`, `notifAlertToneFile`) VALUES (NULL, '$user_id', '$notifCount', '$notifPopUp', '$notifTone', '$notifFlash', '$notifDim', '$notifWhoseTone', NULL);";
              $r4=  mysqli_query($dbc,$q4);
             if($r4){
                 $q18="INSERT INTO `notifymefor` (`notifyFor_Id`, `user_id`, `profPic`, `wallPic`, `BackPic`, `ProfUpdates`, `Status`, `BGM`) VALUES (NULL, '$user_id', '$profPic','$wallPic', '$BackPic', '$ProfUpdates', '$Status', '$BGM');";
             $r18=  mysqli_query($dbc,$q18);
             if($r18){
                 header("location:set_notifications.php");
             }
             else{
                 echo 'New Setting Id Can\'t be Creatd';
                 echo mysqli_error($dbc);
                
             }
             }
             
         }
         
     }
     else{
         echo 'r1 not run.';
     }
    
     
     
    
 }
 ?>