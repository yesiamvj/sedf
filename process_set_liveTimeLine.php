<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
      
     if(!empty($_REQUEST['allowMyActs'])){
         $allowMyActs=mysqli_real_escape_string($dbc,trim($_REQUEST['allowMyActs']));
     }
     else{
         $allowMyActs=1;
     }
    
   
     if(isset($_REQUEST['login'])){
        $login=1;
        }
     else{
       $login=0;
     }
    
     if(isset($_REQUEST['logout'])){
        $logout=1;
        }
     else{
       $logout=0;
     }
    
     if(isset($_REQUEST['chatAvail'])){
        $chatAvail=1;
        }
     else{
       $chatAvail=0;
     }
    
     if(isset($_REQUEST['postActs'])){
        $postActs=1;
        }
     else{
       $postActs=0;
     }
    
     if(isset($_REQUEST['profUpdates'])){
        $profUpdates=1;
        }
     else{
       $profUpdates=0;
     }
     if(isset($_REQUEST['flashActs'])){
        $flashActs=1;
        }
     else{
       $flashActs=0;
     }
    
    
    
     $q1="SELECT liveTimelineSet_Id as settingsId FROM `settings_livetimeline` WHERE `user_id` = $user_id  ORDER BY liveTimelineSet_Id DESC limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
            $q2="UPDATE `settings_livetimeline` SET `allowMyActs` = '$allowMyActs', `login` = '$login', `logout` = '$logout', `chatAvail` = '$chatAvail', `postActs` = '$postActs', `profUpdates` = '$profUpdates', `flashActs` = '$flashActs' WHERE `settings_livetimeline`.`liveTimelineSet_Id` = $setId;";
             $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        header("location:set_liveTimeline.php");
                    }
                        
                    else
                    {
                        echo "update not success";
                        echo mysqli_error($dbc);
                    }
         }
         else{
             $q4="INSERT INTO `settings_livetimeline` (`liveTimelineSet_Id`, `user_id`, `allowMyActs`, `login`, `logout`, `chatAvail`, `postActs`, `profUpdates`, `flashActs`) VALUES (NULL, '$user_id', '$allowMyActs', '$login', '$logout', '$chatAvail', '$postActs', '$profUpdates', '$flashActs');";
             $r4=  mysqli_query($dbc,$q4);
             if($r4){
                   header("location:set_liveTimeline.php");
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