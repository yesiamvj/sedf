
<?php session_start();
    if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
        header("location:index.php");
    }
    else{
        require 'mysqli_connect.php';
                 $user_id=$_SESSION['user_id'];
        $old_pass1=mysqli_real_escape_string($dbc,trim($_REQUEST['pass1']));
         $newp1=mysqli_real_escape_string($dbc,trim($_REQUEST['pass2']));
         $op1=$old_pass1;
         $np1=$newp1;
         $q="select user_id as u from person_config where user_id=$user_id and lock_pass='$op1'";
         $r=  mysqli_query($dbc, $q);
         if($r)
         {
                if(mysqli_num_rows($r)>0)
                {
	      $q2="update person_config set lock_pass='$np1' where user_id=$user_id";
	      $r2=  mysqli_query($dbc, $q2);
	      if($r2)
	      {
	               echo '<div style="padding:10px;text-align-centerl">Success<button onclick="$(\'#ThWinSetLockPass\').fadeOut();">Close</button><div>';;
               }else
	      {
	             echo 'no';
	      }
                }else
                {
	      echo '<div style="padding:10px;text-align-center">Wrong Password<button onclick="open_update_login_screen_pass()">Try Again</button><div>';;
                }
         }
         
    }