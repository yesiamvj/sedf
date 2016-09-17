<?php
$q = $_REQUEST["q"];
 require 'mysqli_connect.php';
$q1="select username as u  from users where username='$q' ";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
    $row=mysqli_fetch_array($r1,MYSQLI_ASSOC);
    if(empty($row))
    {
        echo"<font>Available</font><img src=\"rt.png\" onload=\"imag(1)\"   ><input type=\"hidden\" id=\"ena\" value=\"e\">";
    }
    else
    {
        echo "<font>Taken</font><img src=\"ex.png\" id=\"wrng\" onload=\"imag(21)\"><input type=\"hidden\" id=\"ena\" value=\"d\">";
    }
    
}
 else {
    echo"q not run";
 }
     
 
?>