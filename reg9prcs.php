<?php session_start();
if(empty($_SESSION['email']))
{
    header("location:register.html");
}
else
{
     require 'mysqli_connect.php';
    $email=$_SESSION['email'];
    $q1="SELECT user_id as u from users where email= ' $email '";
  $r6=mysqli_query($dbc, $q1);
    if($r6)
    {
        $row=mysqli_fetch_array($r6,MYSQLI_ASSOC);
        $user_id=$row['u'];
    }  else {
        $user_id="no";              
    }
    $boys=mysqli_real_escape_string($dbc,$_REQUEST['paiyan']);
    $girs=mysqli_real_escape_string($dbc,$_REQUEST['pon']);
    $kalyanam=mysqli_real_escape_string($dbc,$_REQUEST['marig']);
    $kallori=mysqli_real_escape_string($dbc,$_REQUEST['clg']);
    $vaathiyar=mysqli_real_escape_string($dbc,$_REQUEST['tchr']);
    $pozhuthubokku=mysqli_real_escape_string($dbc,$_REQUEST['enter']);
    $SedFed=mysqli_real_escape_string($dbc,$_REQUEST['sf']);
    echo"$user_id";
    $qe="select user_id as u from about where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
        $q2="UPDATE `about` SET `boys` = '$boys', `girls` = '$girs', `marriage` = '$kalyanam', `mycollege` = '$kallori', `teachers` = '$vaathiyar', `entertainment` = '$pozhuthubokku', `sedfed` = '$SedFed' WHERE `about`.`user_id` = $user_id";
        $r2=mysqli_query($dbc,$q2);
        if($r2)
        {
           header("location:reg10.php");
        }
        else
        {
           header("location:reg10.php");
        }
         }  
    else 
    {
 $q1="INSERT INTO `about` (`abt_id`, `user_id`,  `boys`, `girls`, `marriage`, `mycollege`, `teachers`, `entertainment`, `sedfed`) VALUES (NULL, '$user_id',  '$boys', '$girs', '$kalyanam', '$kallori', '$vaathiyar', '$pozhuthubokku', '$SedFed')";
      $r1=mysqli_query($dbc,$q1);
      if($r1)
      {
          echo"inserted";
    }  else {
        echo 'not inserted';
    }
}
foreach ($_REQUEST['ctgry_abt'] as $abtct)
    {
        $abtctgry=mysqli_real_escape_string($dbc,$abtct);
        $qrt="insert into extradetails (user_id,ctgry_about)values($user_id,'$abtctgry')";
        $rrt=mysqli_query($dbc,$qrt);
        if($rrt)
        {
            echo"$abtctgry is inserted  is xtra dtls";
        }
 else {
     echo"xtra dtls not nsterd";
 }
        
    }
    foreach ($_REQUEST['abt'] as $about)
    {
        $extabt=mysqli_real_escape_string($dbc,$about);
        $qt="insert into extradetails (user_id,about)values($user_id,'$extabt')";
        $rt=mysqli_query($dbc,$qt);
        if($rt)
        {
            echo"$extabt is sinserted xtra dtls";
        }
 else {
     echo"xtra dtls not nsterd";
 }
     
}
}
?>