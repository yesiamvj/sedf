<?php session_start();
   if(empty($_GET['username']))
   {
    header("location:strt_wall.php");
   }else
   {
           $person_name=$_GET['username'];
           include '../web/wall.php';
   }
   ?>

