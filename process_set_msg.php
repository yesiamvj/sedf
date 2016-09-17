<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      
     if(!empty($_REQUEST['secretMsgAllow'])){
         $secretMsgAllow=mysqli_real_escape_string($dbc,trim($_REQUEST['secretMsgAllow']));
     }
     else{
         $secretMsgAllow=0;
     }
     if(!empty($_REQUEST['msgAllowFrom'])){
          $msgAllowFrom=mysqli_real_escape_string($dbc,trim($_REQUEST['msgAllowFrom']));
     }
     else{
          $msgAllowFrom=2;
     }
     if(isset($_REQUEST['msgNotifAnim'])){
        $msgNotifAnim=1;
     }
     else{
         $msgNotifAnim=0;
     }
     
     if(isset($_REQUEST['msgPopUp'])){
        $msgPopUp=1;
        }
     else{
       $msgPopUp=0;
     }
     if(isset($_REQUEST['msgTone'])){
        $msgTone=1;
        }
     else{
       $msgTone=0;
     }
     if(!empty($_REQUEST['whoseMsgTone'])){
        $whoseMsgTone=mysqli_real_escape_string($dbc,trim($_REQUEST['whoseMsgTone']));
     }
     else{
       $whoseMsgTone=1;
     }
     if(!empty($_REQUEST['liveTyping'])){
        $liveTyping=mysqli_real_escape_string($dbc,trim($_REQUEST['liveTyping']));
     }
     else{
       $liveTyping=0;
     }
    
     $q1="SELECT msgSet_Id as settingsId FROM `settings_messages` WHERE `user_id` = $user_id ORDER BY `settings_messages`.`msgSet_Id` DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
            
                    $q2="UPDATE `settings_messages` SET `msgAllowFrom` = '$msgAllowFrom', `secretMsgAllow` = '$secretMsgAllow', `msgNotifAnim` = '$msgNotifAnim', `msgPopUp` = '$msgPopUp', `msgTone` = '$msgTone',`whoseMsgTone` = '$whoseMsgTone', `liveTyping` = '$liveTyping' WHERE `msgSet_Id` = $setId AND `user_id`=  $user_id";
                    $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        
                        header("location:set_messages.php");
                       //echo $secretMsgAllow;
                       
                    }
                    else
                    {
                        echo "update not success";
                        echo mysqli_error($dbc);
                    }
         }
         else{
             $q3="INSERT INTO `settings_messages` (`msgSet_Id`, `msgAllowFrom`, `secretMsgAllow`, `msgNotifAnim`, `msgPopUp`, `msgTone`, `whoseMsgTone`, `liveTyping`, `user_id`) VALUES (NULL, '$msgAllowFrom', '$secretMsgAllow', '$msgNotifAnim', '$msgPopUp',$msgTone,'$whoseMsgTone', '$liveTyping', '$user_id');";
             $r3=  mysqli_query($dbc,$q3);
             if($r3){
                 header("location:set_messages.php");
             }
             else{
                 echo 'New Setting Id Can\'t be Creatd';
                 echo mysqli_error($dbc);
                 echo $q3;
             }
             
         }
         
     }
     else{
         echo 'r1 not run.';
     }
    
     
     
    
 }