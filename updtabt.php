<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}
else
{
   $user_id=$_SESSION['user_id'];
   require 'mysqli_connect.php';

   $a1=mysqli_real_escape_string($dbc,$_REQUEST['a1']);
   $a2=mysqli_real_escape_string($dbc,$_REQUEST['a2']);
   $a3=mysqli_real_escape_string($dbc,$_REQUEST['a3']);
   $a4=mysqli_real_escape_string($dbc,$_REQUEST['a4']);
   $a5=mysqli_real_escape_string($dbc,$_REQUEST['a5']);
   $a6=mysqli_real_escape_string($dbc,$_REQUEST['a6']);
   $a7=mysqli_real_escape_string($dbc,$_REQUEST['a7']);
   $a8=mysqli_real_escape_string($dbc,$_REQUEST['a8']);
   $a9=mysqli_real_escape_string($dbc,$_REQUEST['a9']);
   $a10=mysqli_real_escape_string($dbc,$_REQUEST['a10']);
   $a11=mysqli_real_escape_string($dbc,$_REQUEST['a11']);
   $a12=mysqli_real_escape_string($dbc,$_REQUEST['a12']);
   $a13=mysqli_real_escape_string($dbc,$_REQUEST['a13']);
   $a14=mysqli_real_escape_string($dbc,$_REQUEST['a14']);
   
$thinked_usernm=$_REQUEST['thikednm'];
$about_thinker=$_REQUEST['thinks'];
$q="select user_id as u from users where username='$thinked_usernm'";
$r=mysqli_query($dbc,$q);
if($r)
{
   if(mysqli_num_rows($r)>0)
   {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $thinked_id=$row['u'];
      $q1="SELECT user_id as u from about_you where user_id=$user_id and thinker_id=$thinked_id";
      $r1=mysqli_query($dbc,$q1);
      if($r1)
      {
         if(mysqli_num_rows($r1)>0)
         {
            $q2="UPDATE about_you set about='$about_thinker'  where user_id=$user_id and thinker_id=$thinked_id";
            $r2=mysqli_query($dbc,$q2);
            if($r2)
            {
               echo'updated think';
            }else
            {
               echo 'not updated think';
            }
         }else
         {
            
            $q3="INSERT INTO about_you (user_id,thinker_id,about)values($user_id,$thinked_id,'$about_thinker')";
            $r3=mysqli_query($dbc,$q3);
            if($r3)
            {
               echo "ins thinks<br/>";
            }else
            {
               echo"not ins thinks";
            }

         }  

      }
   }else
   {
      echo'
           "No username is found you are typed"
        ';
   }
}
   $q1="select abt_id as a from about where user_id=$user_id";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
      if(!empty($row=mysqli_fetch_array($r1,MYSQLI_ASSOC)))
      {
         $abtid=$row['a'];
      $qe="INSERT INTO `about` ( `user_id`, `me`, `you`, `family`, `frndship`, `love`, `studies`, `politics`, `life`, `god`, `boys`, `girls`, `marriage`, `entertainment`, `wtow`) VALUES ($user_id, '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$a10', '$a11', '$a12', '$a13', '$a14')";
      $re=mysqli_query($dbc,$qe);
      if($re)
      {
            $q3="DELETE FROM `about` WHERE  abt_id=$abtid";
                  $r3=mysqli_query($dbc,$q3);
                  if($r3)
                  {
                  }else
                  {
                  }
      }else
      {
         echo "Not updated..Try again";
      }
      }else
      {

      $q="INSERT INTO `about` (`abt_id`, `user_id`, `me`, `you`, `family`, `frndship`, `love`, `studies`, `politics`, `life`, `god`, `boys`, `girls`, `marriage`, `entertainment`, `wtow`) VALUES ('', $user_id, '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$a10', '$a11', '$a12', '$a13', '$a14')";
      $r=mysqli_query($dbc,$q);
      if($r)
      {
         echo "Updated about  your thinks ";
      }else
      {
         echo "not insr ";
      }     
      }
   }





   }
   ?>
