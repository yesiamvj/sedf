<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
       echo '<meta http-equiv="refresh" content="1">';
       $user_id=$_SESSION['user_id'];
       require 'mysqli_connect.php';
       $q="select msg as m,sender_id as s from messages where user_id=$user_id and sender_seen=$user_id";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              if(mysqli_num_rows($r)>0)
              {
	    while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	    {
	           $cu_id=$row['s'];
	    echo '<script>window.top.my_chat_user'.$cu_id.'()</script>';
                        
	    }
	    }
       }
       
       
       echo '<script>';
  $q="select group_id  as a from group_invites where invited_users=$user_id and seen=0";
   $r= mysqli_query($dbc, $q);
   if($r)
   {
          $grp_req=  mysqli_num_rows($r);
   }
   $q="select req_id as u from  requests where reqstd_userid=$user_id and seen=0";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
          $rel_req=  mysqli_num_rows($r);
          $tot_req=$rel_req+$grp_req;
          $func="window.top.r($tot_req);";
          echo $func;
   }else
   {
 
   }
   $q="select msg  as a from messages where sender_id=$user_id and senter_seen=$user_id";
   $r=  mysqli_query($dbc, $q);
   if($r)
   {
          $grp_req=  mysqli_num_rows($r);
          $func2="window.top.m($grp_req);";
          echo $func2;
         
   }
   echo 'alert()';
   $q4="select user_id as u from notification where cu_id=$user_id and seen=0";
   $r4=mysqli_query($dbc,$q4);
   if($r4)
   {
       if(mysqli_num_rows($r4)>0)
       {
           $td= mysqli_num_rows($r4);
           $func3="window.top.nf($td);";
           echo $func3;
       }else
       {
         
       }
   }

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
       
     
   }else
   {
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
          
       }else
       {
           
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
       
      
   }else
   {
       
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
     
   }else
   {
      
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
      $func4="window.top.gf($tot);";
      echo $func4;
      echo '</script>';     
}
?>