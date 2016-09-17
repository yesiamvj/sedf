<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:profile.php");
}else
{
    
    
   $user_id=$_SESSION['user_id'];
   require 'mysqli_connect.php';
 
   $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $lkc=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q1="select like_userid as u from post_status where post_id=$post_id and l_seen=0 and like_userid!=0";
               $r1=mysqli_query($dbc,$q1);
               if($r1)
               {
                   
                    if(mysqli_num_rows($r1)>0)
                    {
                     
                            $lkc=$lkc+1;
                       
                    }
               }
           }
       }
       
        echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               $("#likecount").html("'.$lkc.'");
                   
               $("#likecountttl").html("New '.$lkc.'");
                
                 });
                 </script>';
   }else
   {
        echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               
               $("#likecount").html("0");
               $("#likecountttl").html("");
                
                 });
                 </script>'; 
   }
   
   
     $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $ukc=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q1="select unlike_userid as u from post_status where post_id=$post_id and u_seen=0 and unlike_userid!=0;";
               $r1=mysqli_query($dbc,$q1);
               if($r1)
               {
                   
                    if(mysqli_num_rows($r1)>0)
                    {
                            $ukc=$ukc+1;
                       
                    }
               }
           }
           
            echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               $("#unlikecouutn").html("'.$ukc.'");
                   $("#unlikecnt_ttl").html("New '.$ukc.'");
                
                 });
                 </script>';
       }else
       {
           echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               $("#unlikecouutn").html("0");
                
                   $("#unlikecnt_ttl").html("");
                
                 });
                 </script>'; 
       }
       
       
   }else
   {
        
   }
   
    $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $rtc=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q1="select rating as u from post_status where post_id=$post_id and r_seen=0 and rating!=0;";
               $r1=mysqli_query($dbc,$q1);
               if($r1)
               {
                   
                    if(mysqli_num_rows($r1)>0)
                    {
                       $rt=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                       $lc=$rt['u'];
                     
                            $rtc=$rtc+1;
                       
                    }
               }
           }
       }
       
        echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               $("#ratecount").html("'.$rtc.'");
                   $("#rtcnt_ttl").html("New '.$rtc.'");
                
                 });
                 </script>';
   }else
   {
        echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               
                $("#ratecount").html("0");
               
                   $("#rtcnt_ttl").html("");
                 });
                 </script>'; 
   }
   
   

    $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $cmt=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q2="select cmnt_id from post_comments where post_id=$post_id and seen=0";
                                         $r2=mysqli_query($dbc,$q2);
                                         if($r2)
                                         {
                                             if(mysqli_num_rows($r2)>0)
                                             {
                                                 
                                                 while($rop=mysqli_fetch_array($r2,MYSQLI_ASSOC))
                                                 {
                                                     $cmt=$cmt+1;
                                                 }
                                             }
                                         }
           }
       }
       
        echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               $("#cmtcount").html("'.$cmt.'");
                   $("#cmt_cnt_ttl").html("New '.$cmt.'");
                
                 });
                 </script>';
   }else
   {
        echo'<script type="text/javascript">
                 $(document).ready(function()
                 {
               
                
               $("#cmtcount").html("0");
               
                   $("#cmt_cnt_ttl").html("");
                 });
                 </script>'; 
   }
   
   
      
      $q="select profile_view as p from history where user_id=$user_id and seen=0";
      $r=mysqli_query($dbc,$q);
      if($r)
      {
         if(mysqli_num_rows($r)>0)
         {
             
         }
      }
      $tot=$lkc+$ukc+$rtc+$cmt;
 
}
?>
