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
    $lb=mysqli_real_escape_string($dbc,$_REQUEST['numb']);
    $lm=mysqli_real_escape_string($dbc,$_REQUEST['l']);
    $los=mysqli_real_escape_string($dbc,$_REQUEST['c']);
    $mb=mysqli_real_escape_string($dbc,$_REQUEST['a']);
    $osmob=mysqli_real_escape_string($dbc,$_REQUEST['act']);
    $sim=mysqli_real_escape_string($dbc,$_REQUEST['m']);
    $bike=mysqli_real_escape_string($dbc,$_REQUEST['sora']);
    $bno=mysqli_real_escape_string($dbc,$_REQUEST['d']);
    $car=mysqli_real_escape_string($dbc,$_REQUEST['v']);
    $carno=mysqli_real_escape_string($dbc,$_REQUEST['cno']);
    echo"$user_id";
    $qe="select user_id as u from property where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
        $qe="UPDATE `property` SET `lbarnd` = '$lb', `lmodel` = '$lm', `os` = '$los', `mbrand` = '$mb', `osmobile` = '$osmob', `network` = '$sim', `bike` = '$bike', `bikeno` = '$bno', `car` = '$car', `carno` = '$carno' WHERE user_id = $user_id";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
           header("location:reg4.php");
        }
        else
        {
            echo'error in update';
        }
    }
 else {
       $q=" INSERT INTO `property` ( `lbarnd`, `lmodel`, `os`, `mbrand`, `osmobile`, `network`, `bike`, `bikeno`, `car`, `carno`,`user_id`) VALUES ('$lb', '$lm', '$los', '$mb', '$osmob', '$sim', '$bike', '$bno', '$car', '$carno', '$user_id')";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
           header("location:reg4.php");
       }else
       {
           echo"error in insert";
       } 
 
    }
}

    ?>

 
