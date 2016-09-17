<?php
$user="qwe";
 $url='blog.php?username='.urlencode($user);
   header("location:$url");
?>