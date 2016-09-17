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
    $n=$_REQUEST['numb'];
    $l=$_REQUEST['l'];
    $c=$_REQUEST['c'];
    $a=$_REQUEST['a'];
    $act=$_REQUEST['act'];
    $m=$_REQUEST['m'];
    $sor=$_REQUEST['sora'];
    echo"$user_id";
    $qe="select user_id as u from annoying where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
       $q2="UPDATE `annoying` SET `number` = '$n', `letter` = '$l', `color` = '$c', `actor` = '$a', `actress` = '$act', `movie` = '$m', `sora` = '$sor' WHERE user_id = $user_id"; 
       $r2=mysqli_query($dbc,$q2);
       if($r2)
       {
            header("location:reg4.2.php");
       }
       else
       {
           echo"not updated";
       }
    }
 else {
        $qe="INSERT INTO `annoying` ( `user_id`, `number`, `letter`, `color`, `actor`, `actress`, `movie`, `sora`) VALUES ( '$user_id', '$n', '$l', '$c', '$a', '$act', '$m', '$sor')";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
            header("location:reg4.2.php");
        }
        else
        {
            echo"not inserted";
        }
}
}



?>