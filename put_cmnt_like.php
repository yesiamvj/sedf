 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {              $user_id=$_SESSION['user_id'];
                      require 'mysqli_connect.php';
                      $what=$_REQUEST['what'];
      
   if($what=="1")
   {
       $q="select user_id from comment_status where user_id=$user_id";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
               $q="update comment_status set c_like_userid=177,c_unlike_userid=0 where user_id=$user_id";
               $r=mysqli_query($dbc,$q);
               if($r)
               {
                   echo'updated like';
               }
           }  else 
               {
                $q3="insert into comment_status (user_id,c_like_userid,c_unlike_userid)values($user_id,$user_id,0)";
                $r3=mysqli_query($dbc,$q3);
                if($r3)
                {
                    echo'ins like';
                }
               
           }
       }
   }
   if($what=="0")
   {
       $q="select user_id from comment_status where user_id=$user_id";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           if(mysqli_num_rows($r)>0)
           {
               $q="update comment_status set c_unlike_userid=177,c_like_userid=0 where user_id=$user_id";
               $r=mysqli_query($dbc,$q);
               if($r)
               {
                   echo'updated unlike';
               }
           }  else 
               {
                $q3="insert into comment_status (user_id,c_unlike_userid,c_like_userid)values($user_id,$user_id,0)";
                $r3=mysqli_query($dbc,$q3);
                if($r3)
                {
                    echo'ins like';
                }
               
           }
       }
   }
                      
   }