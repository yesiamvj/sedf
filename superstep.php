<?php session_start();
if(empty($_SESSION['email']))
{
    
	header("location.index.php");
}else
{
       require 'mysqli_connect.php';
       $email=$_SESSION['email'];
       $q="select user_id as u from users where email='$email' and username='$email'";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              if(mysqli_num_rows($r)>0)
              {
	    echo '<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
      <!--  <meta http-equiv="Author" content="VJ for SedFed" />    -->
    <title> SedFed - Registration  </title>
   <link type="text/css" href="'.$_SESSION['css'].'superStep.css" rel="stylesheet" />
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="register.js" type="text/javascript">     
   </script>
  </head>
    <body>
        <div id="Topest">
            <div class="TtlBar" id="titleBar" > 
                sedfed
            </div>
            <div class="SubTtl">
                Account SetUp  '.$email.'
            </div>
            <div id="content-full">
                <div class="Ttip">
                    Pay Attention for this Page . These Details are very Important .
                </div>
                <div class="Itm">
                     <div class="QueTtl">
                    Username
                      </div>
                      <form method="post" action="super_step_prcs.php">
                     <div class="QueAns">
                         <input id="usernameInp" name="myusername"  required  type="text" oninput="userNameInput()" placeholder="Choose an Username" />
                   
                         <div class="availTip">
                            
                         </div>
                         <div class="AnsTip">
                             Your SedFed - Profile address <br/>
                             <div class="previewPlace">
                                  sedfed.com/<span id="usernameLive">username</span>
                             </div>
                             <br/>
                            People can use your username to search you or visit your profile page .
                         </div>
                      </div>
                   
                </div>
                <div class="Itm">
                     <div class="QueTtl">
                    Theme Color
                      </div>
                     <div class="QueAns">
                      <input type="color" name="theme_color"  id="themeColor" oninput="$(\'#titleBar\').css({\'background-color\':$(\'#themeColor\').val()});" style="width:0px;height:0px;position:fixed;margin-top:1100px;" />
                         <input type="color" name="theme_txt_color"  id="themeTextColor" oninput="$(\'#titleBar\').css({\'color\':$(\'#themeTextColor\').val()});"  style="width:0px;height:0px;position:fixed;margin-top:1100px;" />
                       
                         <div id="themeClr" class="btnClr" style="display:inline-block;" onclick="$(\'#themeColor\').click();" >
                             Choose My Theme Color
                         </div>
                         <div id="themeTtlClr" class="btnClr" style="display:inline-block;" onclick="$(\'#themeTextColor\').click();" >
                             Choose My Text Color
                         </div>
                          <div class="AnsTip" style="background-color: white;" >
                            
                           Your Theme color will be used as Title Bar color on all sedfed pages and also in your profile page Background color .
                         </div>
                      </div>
                    
                   
                </div>
               
                <input  type="submit" id="proceedBtn" value="Proceed" />
                <br/><br/>
                </form>
                <div id="register_result"></div>
            </div>
        </div>
    </body>
</html>
';
              }  else {
	if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
	{
	       header("location:globe.php");
	}else
	{
	       header("location:index.php");
	}
              }
       }
       
}