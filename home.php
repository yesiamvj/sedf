<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
     echo '<div class="sedfed-title-bar">';
          include 'mainbar.php';echo '</div>
            <div class="sedfed-post-container">';include 'posts.php';echo '</div>
            <div class="sedfed-task-bar">';include 'taskbar.php';echo '</div>
            <div class="sedfed-online-container">';include 'online.php';echo '</div>
            
	    ';
              include 'notifs.html';
     }