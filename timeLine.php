<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" />   -->
    <title> SedFed | Timeline  </title>
   <link type="text/css" href="../web/timeLine.css" rel="stylesheet" />
   <link type="text/css" href="../web/thePost.css" rel="stylesheet" />
   <link type="text/css" href="../web/theBigPost.css" rel="stylesheet" />
   
   
   <script src="../web/jquery.min.js" type="text/javascript"></script>
   <script src="../web/timeLine.js" type="text/javascript"></script>
   
  </head>
  <body>
      <?php session_start();
      $owner_username=$_GET['username'];
        include '../web/title_bar.php';
        include '../web/timeLineTop.php';
        include '../web/timeLineRight.php';
        include '../web/timeLineLeft.php';
        require '../web/profile_post.php';
        
        if($_SESSION['user_name']!=$owner_username)
        {
                echo '<div id="forchatwindow"></div>';
        echo '<div id="chat_user_window" style="display:none;">';
        include '../web/chatwind_profile.php';
        echo '</div>';
        }
       
      ?>
  </body>
</html>