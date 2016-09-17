
<?php session_start();
    if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['me'])){
        header("location:index.php");
    }
    else{
        require 'mysqli_connect.php';
                 $user_id=$_SESSION['user_id'];
        $old_pass1=mysqli_real_escape_string($dbc,trim($_REQUEST['opass1']));
        $old_pass2=mysqli_real_escape_string($dbc,trim($_REQUEST['opass2']));
        $newp1=mysqli_real_escape_string($dbc,trim($_REQUEST['npass1']));
        $newp2=mysqli_real_escape_string($dbc,trim($_REQUEST['npass2']));
  $newp1=  sha1($newp1);
  $newp2=  sha1($newp2);
      $cp1="select user_id as u from users where pass1='$old_pass1' and pass2='$old_pass2' and user_id=$user_id";
      $rcp1=mysqli_query($dbc,$cp1);
      $cp2="select user_id as u from users where pass2='$old_pass1' and pass1='$old_pass2' and user_id=$user_id";
      $rcp2=mysqli_query($dbc,$cp2);
      if($rcp1 && $rcp1)
      {
           
          $row1=mysqli_fetch_array($rcp1,MYSQLI_ASSOC);
          $row2=mysqli_fetch_array($rcp2,MYSQLI_ASSOC);
          if(!empty($row1) || !empty($row2))
          {
              $chps="update users set pass1='$newp1' ,pass2='$newp2' where user_id=$user_id";
              $rchps=mysqli_query($dbc,$chps);
              if($rchps)
              {
                  echo '<div style="padding:10px;color:green">Your Password has been Successfully changed changed<button onclick="$(\'#ThWinSetPassword\').fadeOut()">Close</button></div>';
                
              }else{
                  echo 'Your Password is not changed';
              }
          }else
          {
              echo '<div style="padding:10px;color:green">Wrong passwords<button onclick="$(\'#ThWinSetPassword\').fadeOut()">Close</button></div>';
          }
          
      }else{
          echo 'err in run passwords';
      }
    
    }
           

?>
