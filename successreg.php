<?php session_start();
if(isset($_SESSION['user_id'])|| isset($_SESSION['user_name']))
{
       header("location:homepage.php");
}else
{
       if(!empty($_SESSION['email']))
       {
              $email=$_SESSION['email'];
              require 'mysqli_connect.php';
              $q1="SELECT user_id as u,username as us from users where email='$email'";
  $r6= mysqli_query($dbc, $q1);
    if($r6)
    {
        $row=mysqli_fetch_array($r6,MYSQLI_ASSOC);
        $user_id=$row['u'];
        $user_name=$row['us'];
       if(!empty($user_id))
       {
              $_SESSION['user_id']=$user_id;
              $_SESSION['user_name']=$user_name;
              unset($_SESSION['email']);
            echo '<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
      <!--  <meta http-equiv="Author" content="VJ for SedFed" />    --s>
    <title> SedFed - Registration Success </title>
 -->
    <link rel="stylesheet" href="successReg.css" />
    <title>Welcome to SedFed </title>
  </head>
  <!-- no js , no ajax -->
    <body>
        <div id="Topest">
            <div class="TtlBar" >
                sedfed
            </div>
            <div class="SubTtl">
                Account Details
            </div>
            <div class="contentHolder">
                <div class="WelcomeMsg">
                    Well done ,
                </div>
                <div class="WelcomeMsgSc">
                    
                </div>
                <div class="userIdDets">
                    Your SedFed User Id is 
                    <br/>
                    <div class="userIdNum">
                       '.$user_id.'
                    </div>
                </div>
                <div class="acTt">
                   Your Web Page Address are
                </div>
                <div class="addressDets">
                    <div class="ADItm">
                        sedfed.com/<span class="spAd">'.$user_name.'</span>
                    </div> <br/>
                    &nbsp;  &nbsp;  &nbsp;  and &nbsp;  &nbsp;  &nbsp; <br/>
                    <div class="ADItm">
                        sedfed.com/<span class="spAd">'.$user_id.'</span>
                    </div>
                </div>
                <div class="peopleSearchTip">
                   Please note your User Id and Username ( Very Important ). People can search you by your username or User Id and add to their relations.
                   You will be identified by your username or user id in many places.
                </div>
                <a href="start_profile.php"><div class="proceedToProf">
                    Go to Profile SetUp
                </div></a>
                
            </div>
            <div class="bottomSedFed_Tm">
                SedFed 2.0
            </div>
        </div>
    </body>
</html>
';  
       }
        
     
    }  else {
        $user_id="no userid";
        echo "$user_id npt run";
    }
       }
}
