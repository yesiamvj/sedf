<html>
    
<script src="jquery-1.11.2.min.js" type="text/javascript"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <script src="angular.min.js" type="text/javascript">  </script>  
 
<?php

$q=$_REQUEST['q'];
  require 'mysqli_connect.php';
$qe="SELECT month as m FROM `reg1` WHERE `month` REGEXP '$q' ";
$r=mysqli_query($dbc,$qe);
if($r)
{
    $n=0;
    while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
        $mn=$row['m'];
        $n=$n+1;
        echo"<input type=\"button\" id=\"$n\" value=\"$mn\" onclick=\"change('#$n')\"><br/>";
        echo"<img src=\"rt.png\" id=\"wrng\" >";
    }
}
 else {
echo"q not run";    
}

?>
</html>