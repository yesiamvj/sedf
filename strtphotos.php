<?php
$user="qwe";
 $url='photos.php?username='.urlencode($user);
   header("location:$url");
?>