<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
      require 'mysqli_connect.php';
     if(!empty($_REQUEST['profAudis'])){
         $prof_audience=mysqli_real_escape_string($dbc,trim($_REQUEST['profAudis']));
     }
     else{
         $prof_audience=2;
     }
     if(!empty($_REQUEST['profPicStyle'])){
          $profPic_Style=mysqli_real_escape_string($dbc,trim($_REQUEST['profPicStyle']));
     }
     else{
          $profPic_Style=1;
     }
     if(!empty($_REQUEST['backPicStyle'])){
        $backPic_Style=mysqli_real_escape_string($dbc,trim($_REQUEST['backPicStyle']));
     }
     else{
         $backPic_Style=1;
     }
     
     
     if(!empty($_REQUEST['profThme'])){
        $prof_Theme=mysqli_real_escape_string($dbc,trim($_REQUEST['profThme']));
     }
     else{
       $prof_Theme='#DC143C';
     }
        if(!empty($_REQUEST['theme_txt_color'])){
        $theme_txt_color=mysqli_real_escape_string($dbc,trim($_REQUEST['theme_txt_color']));
     }
     else{
       $theme_txt_color='navy';
     }
     if(isset($_REQUEST['welcomeScr'])){
         $welcomeScr=  mysqli_real_escape_string($dbc,  trim($_REQUEST['welcomeScr']));
     }
     else{
         $welcomeScr=10;
     }
     if(!empty($_REQUEST['welScrStyle'])){
        $welScrStyle=mysqli_real_escape_string($dbc,trim($_REQUEST['welScrStyle']));
     }
     else{
       $welScrStyle=1;
     }
     if(!empty($_REQUEST['welGlassClr'])){
        $welGlassClr=mysqli_real_escape_string($dbc,trim($_REQUEST['welGlassClr']));
     }
     else{
       $welGlassClr='#000000';
     }
    
    
     $q1="SELECT profSet_Id as settingsId FROM `settings_profile` WHERE `user_id` = $user_id limit 1";
     $r1= mysqli_query($dbc, $q1);
     if($r1){
         $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $setId=$row1['settingsId'];
         if($setId!=''){
            
       
          $q2="UPDATE `settings_profile` SET `theme_txt_color`='$theme_txt_color',`prof_audience` = '$prof_audience', `profPic_Style` = '$profPic_Style', `backPic_Style` = '$backPic_Style', `profPage_Style` = '$profPage_Style', `prof_Theme` = '$prof_Theme', `welcomeScr` = '$welcomeScr' ,`welScrStyle` = '$welScrStyle' , `welGlassClr` = '$welGlassClr' WHERE `profSet_Id` = $setId AND `user_id`=  $user_id ";
    
         // $q2="UPDATE `settings_profile` SET `prof_audience` = '$prof_audience', `profPic_Style` = '$profPic_Style', `backPic_Style` = '$backPic_Style', `prof_Theme` = '$prof_Theme' WHERE `profSet_Id` = $setId AND `user_id`=  $user_id ";
             $r2=mysqli_query($dbc,$q2);
                    if($r2)
                    {
                        
                        header("location:set_profile.php");
                       
                    }
                    else
                    {
                        echo "update not success";
                        
                        echo mysqli_error($dbc);
                    }
          }
             else{
             $q3="INSERT INTO `settings_profile` (`user_id`, `theme_txt_color`,`prof_audience`, `profPic_Style`, `backPic_Style`, `profPage_Style`, `prof_Theme`, `profSet_Id`) VALUES ('$user_id', '$theme_txt_color','$prof_audience', '$profPic_Style', '$backPic_Style', '$profPage_Style', '$prof_Theme', NULL);";
             $r3=  mysqli_query($dbc,$q3);
             if($r3){
                 header("location:set_profile.php");
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