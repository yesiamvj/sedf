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
    $place=mysqli_real_escape_string($dbc,$_REQUEST['plc']);
    $animal=mysqli_real_escape_string($dbc,$_REQUEST['anim']);
    $food=mysqli_real_escape_string($dbc,$_REQUEST['food']);
    $field=mysqli_real_escape_string($dbc,$_REQUEST['fld']);
    $book=mysqli_real_escape_string($dbc,$_REQUEST['book']);
    $game=mysqli_real_escape_string($dbc,$_REQUEST['game']);
    $sport=mysqli_real_escape_string($dbc,$_REQUEST['sp']);
   
    echo"$user_id";
    $qe="select user_id as u from annoying where user_id=$user_id";
    $re=mysqli_query($dbc,$qe);
    if(mysqli_num_rows($re)>0)
    {
        $q1="UPDATE `annoying` SET `place` = '$place', `animal` = '$animal', `food` = '$food', `field` = '$field', `book` = '$book', `game` = '$game', `sportperson` = '$sport' WHERE `annoying`.`user_id` =$user_id";
        $r1=mysqli_query($dbc,$q1);
        if($r1)
        {
            header("location:reg4.3.php");
        }
        else
        {
            echo"not updated";
        }
    }
    else
    {
        $q2="INSERT INTO `annoying` ( `user_id`, `place`, `animal`, `food`, `field`, `book`, `game`, `sportperson`)  VALUES ($user_id, '$place',  '$animal', '$food', '$field', '$book', '$game', '$sport')";
        $r2=mysqli_query($dbc,$q2);
        if($r2)
        {
            header("location:reg4.3.php");
        }
        else
        {
            echo"not inerted";
        }
    }
}