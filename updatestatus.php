<html>
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}
else
{
    require 'mysqli_connect.php';
    $user_id=$_SESSION['user_id'];
    $status=$_REQUEST['nstatus'];
  $clrstatus=mysqli_real_escape_string($dbc,trim($_REQUEST['colorstatus']));
  $mycolor="#$clrstatus;";
  
  echo'<style type="text/css">
  
  #statuspreview{
  color:'.$mycolor.'
       padding:10px;
       font-size:20px;
  }
 
  
  </style>';
         $insrtst="insert into status (ownstatus,user_id,ownstatus_color)values('$status','$user_id','$mycolor')";
            $runinsrt=mysqli_query($dbc,$insrtst);
            if($runinsrt)
            {
                echo 'Your status Updated';
            }else{
                echo 'your status not inserted';
            }
        
   
}
?>
</html>