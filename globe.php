<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
    
          include 'mainbar.php';
         echo '<div id="aio_result"></div>';
          echo '<div class="sedfed-post-container">';
          include 'posts.php';
          echo '</div><div class="sedfed-task-bar">';
          include 'taskbar.php';
          include 'extraPane.php';
          echo '</div><div class="sedfed-online-container">';
          include 'online.php';
          echo '</div>';
          echo '<div id="forcrtgrp"></div>';
          echo '<iframe src="zf.php" ></iframe>';
           
          include 'notifs.html';
     }