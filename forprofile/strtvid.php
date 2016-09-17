<?php
$user="qwe";
 $url='videos.php?username='.urlencode($user);
   header("location:$url");
?>