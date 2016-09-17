<html>
<?php session_start();
    if(empty($_SESSION['user_id']) && empty($_SESSION['username'])){
        header("location:index.php");
    }
    else{
        require 'mysqli_connect.php';
       $test=mysqli_real_escape_string($dbc,trim($_REQUEST['fortest']));
       
        if($test=="good")
        
        {
                 $user_id=$_SESSION['user_id'];
        $oldp1=mysqli_real_escape_string($dbc,trim($_REQUEST['cp1']));
        $oldp2=mysqli_real_escape_string($dbc,trim($_REQUEST['cp2']));
        $newp1=mysqli_real_escape_string($dbc,trim($_REQUEST['enp1']));
        $newp2=mysqli_real_escape_string($dbc,trim($_REQUEST['enp2']));
        
      $cp1="select user_id as u from users where pass1='$oldp1' and pass2='$oldp2' and user_id=$user_id";
      $rcp1=mysqli_query($dbc,$cp1);
      $cp2="select user_id as u from users where pass2='$oldp1' and pass1='$oldp2' and user_id=$user_id";
      $rcp2=mysqli_query($dbc,$cp2);
      if($rcp1 || $rcp1)
      {
          $row1=mysqli_fetch_array($rcp1,MYSQLI_ASSOC);
          $row2=mysqli_fetch_array($rcp2,MYSQLI_ASSOC);
          if(!empty($row1) || !empty($row2))
          {
              $chps="update users set pass1='$newp1' ,pass2='$newp2' where user_id=$user_id";
              $rchps=mysqli_query($dbc,$chps);
              if($rchps)
              {
                  echo 'Your Password is changed';
                  if($newp1=="" || $newp2=="")
                  {
                  
                      echo "
<img src=\"ex.png\" width=\"0\" height=\"0\" onload=\"emptypass()\">    
";
                  }
              }else{
                  echo 'Your Password is not changed';
              }
          }else
          {
              echo 'Wrong Current Passwords';
          }
          
      }else{
          echo 'err in run passwords';
      }
    }else{
        echo 'Good Try..Try Again';
    }
    }
           

?>
</html>