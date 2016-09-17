<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
       $post_id=$_REQUEST['postid'];
       $raters=$_REQUEST['rater'];
       require 'mysqli_connect.php';
       
       $q1="select user_id as u from post_status where rating='$raters' and post_id=$post_id";
       $r1=mysqli_query($dbc,$q1);
       if($r1)
       {
           if(mysqli_num_rows($r1)>0)
           {
               while($rows=mysqli_fetch_array($r1,MYSQLI_ASSOC))
               {
                   $raters_id=$rows['u'];
                   if(!empty($raters_id))
                   {
                          $uname="select first_name as fname from basic where user_id=$raters_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $raters_name=$rownm['fname'];
                                                             echo '<span id="user" class="user">'.$raters_name.'</span>';
                                                         }else{
                                                             $selemail="select email as em from users where user_id=$raters_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $raters_name=$rowemail['em'];
                                                                 
                                                             echo '<span id="user" class="user">'.$raters_name.'</span>';
                                                             }
                                                         }
                                                     }
                   }else{
                       
                   }
               }
           }else
           {
              
           }
       }else{
           
       }
   }