<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      
     if(!empty($_REQUEST['background'])){
         $background=mysqli_real_escape_string($dbc,trim($_REQUEST['background']));
     }
     else{
         $background=1;
     }
     if(!empty($_REQUEST['colorBack'])){
         $colorBack=mysqli_real_escape_string($dbc,trim($_REQUEST['colorBack']));
     }
     else{
         $colorBack="#ffffff";
     }
   
     if(isset($_REQUEST['titleBar'])){
        $titleBar=1;
        }
     else{
       $titleBar=0;
     }
    
     if(isset($_REQUEST['whatsUp'])){
        $whatsUp=1;
        }
     else{
       $whatsUp=0;
     }
    
     if(isset($_REQUEST['taskBar'])){
        $taskBar=1;
        }
     else{
       $taskBar=0;
     }
    
     if(isset($_REQUEST['liveTimeline'])){
        $liveTimeline=1;
        }
     else{
       $liveTimeline=0;
     }
    
     if(isset($_REQUEST['onlines'])){
        $onlines=1;
        }
     else{
       $onlines=0;
     }
    
    
    
     $q1="SELECT appearSet_Id as settingsId FROM `settings_appearance` WHERE `user_id` = $user_id ORDER BY `settings_appearance`.`appearSet_Id` DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
             $q2="UPDATE `settings_appearance` SET `titleBar` = '$titleBar', `whatsUp` = '$whatsUp', `taskBar` = '$taskBar', `liveTimeline` = '$liveTimeline', `onlines` = '$onlines', `background` = '$background', `colorBack` = '$colorBack' WHERE `settings_appearance`.`appearSet_Id` = $setId;";      
             $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        header("location:set_appearance.php");
                    }
                        
                    else
                    {
                        echo "update not success";
                        echo mysqli_error($dbc);
                    }
         }
         else{
             $q4="INSERT INTO `settings_appearance` (`appearSet_Id`, `user_id`, `titleBar`, `whatsUp`, `taskBar`, `liveTimeline`, `onlines`, `background`, `colorBack`) VALUES (NULL, '$user_id', '$titleBar', '$whatsUp', '$taskBar', '$liveTimeline', '$onlines', '$background', '$colorBack');";
             $r4=  mysqli_query($dbc,$q4);
             if($r4){
                   header("location:set_appearance.php");
             }
            else {
                         echo "insertion not success";
                        echo mysqli_error($dbc);
            }
             
         }
         
     }
     else{
         echo 'r1 not run.';
     }
    
     
     
    
 }
 ?>