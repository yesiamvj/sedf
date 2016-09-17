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
    $n=mysqli_real_escape_string($dbc,$_REQUEST['numb']);
    $l=mysqli_real_escape_string($dbc,$_REQUEST['l']);
    $c=mysqli_real_escape_string($dbc,$_REQUEST['c']);
    $a=mysqli_real_escape_string($dbc,$_REQUEST['a']);
    $act=mysqli_real_escape_string($dbc,$_REQUEST['act']);
    $m=mysqli_real_escape_string($dbc,$_REQUEST['m']);
    $sor=$_REQUEST['sora'];
    echo"$user_id";
    $qe="select user_id as u from favorites where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
       $q2="UPDATE `favorites` SET `number` = '$n', `letter` = '$l', `color` = '$c', `actor` = '$a', `actress` = '$act', `movie` = '$m', `sora` = '$sor' WHERE user_id = $user_id"; 
       $r2=mysqli_query($dbc,$q2);
       if($r2)
       {
            header("location:reg5.php");
       }
       else
       {
           echo"not updated";
       }
    }
 else {
        $qe="INSERT INTO `favorites` ( `user_id`, `number`, `letter`, `color`, `actor`, `actress`, `movie`, `sora`) VALUES ( '$user_id', '$n', '$l', '$c', '$a', '$act', '$m', '$sor')";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
            header("location:reg5.php");
        }
        else
        {
            echo"not inserted";
        }
}
}



?>