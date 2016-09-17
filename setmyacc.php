  <?php session_start(); 
  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else
{
        $user_id=$_SESSION['user_id'];
        require 'mysqli_connect.php';
            include'title_bar.php';
$q3="select first_name as fn,nativeplace as np,year as y,day as d,age as ag,month as m,sex as sex from basic where user_id=$user_id";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
if(mysqli_num_rows($r3)>0 )
{
$row3=mysqli_fetch_array($r3,MYSQLI_ASSOC);
$year=$row3['y'];
$mnth=$row3['m'];
$day=$row3['d'];
$native_place=$row3['np'];
$age=$row3['ag'];
$f_name=$row3['fn'];
$sex=$row3['sex'];
$gen=$row3['sex'];
if($sex=="boy")
{
    $sex="Male";
}else
{
    $sex="Female";
}

}else
{
$year="";
$mnth="";
$day="";
$native_place="";
$age="";
$sex="";
$f_name="";
}
}
$q23="SELECT username as u,mobno as m,email as em from users where user_id=$user_id";
$r23=mysqli_query($dbc,$q23);
if($r23)
{
  $row23=mysqli_fetch_array($r23,MYSQLI_ASSOC);
  $email=$row23['em'];
  $usernm=$row23['u'];
  $mobile_no=$row23['m'];
 
}else
{
  echo mysqli_error($dbc);
}
        echo '<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'lin.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'mainBar.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'set_profile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'set_myAc.css"/>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="setmyacc.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
          
          <div class="SedFed_SubTitle">
              <div class="Subtitle_Text">Account Settings</div>   
          </div>
              <div class="PageInnerContent">
                  <div class="PageInnerTitle"> User ID : '.$user_id.' </div>
                 
                  
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl"> '.$_SESSION['user_name'].' </div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Current</div>
                         <div class="SPI_SubItm"> 
                             <div class="SAC_CurItm"> '.$_SESSION['user_name'].' </div>
                         </div>  
                        
                      </div>
                  </div>
                  
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Mobile</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip">Current </div>
                           <div class="SPI_SubItm"> 
                             <div class="SAC_CurItm"> '.$mobile_no.'</div>
                         </div>  
                          <div class="SAC_ChngeBtn" onclick="$(\'#ThWinSetMobile\').fadeIn()">
                              Change
                          </div> 
                           
                      </div>
                  </div>
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl">Email</div>
                      <div class="Set_Prof_ItmAnsHold">
                           <div class="SPI_Tip">Current </div>
                           <div class="SPI_SubItm"> 
                             <div class="SAC_CurItm"> '.$email.'</div>
                         </div>  
                          <div class="SAC_ChngeBtn" onclick="$(\'#ThWinSetMail\').fadeIn()">
                              Change
                          </div> 
                           
                      </div>
                  </div>
                  <div class="Set_Prof_ItmHold">
                      <div class="Set_Prof_Itm_Ttl"> Login Password</div>
                     <div class="SAC_ChngePassBtn" onclick="reset_pass_hold()">
                              Change
                          </div>
                      <div class="Set_Prof_ItmAnsHold">
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox" checked /> Password
                        </div>  
                          <div class="SPI_Tip"> Disabled Items will be available soon </div>
                            <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox"  disabled /> Click
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox"  disabled/> Picture
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox"  disabled /> Pattern
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox"  disabled /> Voice
                        </div>  
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox"  disabled /> Face
                        </div>  
                      
                        <div class="SPI_SubItm"> 
                            <input class="SPI_Chks" type="checkbox"  disabled /> FingerPrint
                        </div>  
                         
                       
                           
                      </div>
                 
                 
                 
                  </div>
                  <div class="Set_Prof_ItmHold" >
                      <div class="Set_Prof_Itm_Ttl">Lock Screen Password</div>
                      <div class="Set_Prof_ItmAnsHold">
                          <div class="SPI_Tip"> Password for Lock Screen </div>
                             <div class="SAC_ChngePassBtn" onclick="open_update_login_screen_pass()">
                              Change
                          </div>
                           
                      </div>
                      <br/>
                 <div id="SPSet_Proceed">
                     Update My Settings
                 </div>
	
                  </div>
                  
              </div>
          <div class="Theater_Window_SetOut" id="ThWinSetUsrNme" >
              <div class="ThWin_Set_In">
                  <div class="ThWinSetTtl"> Username <div class="closeThWin" onclick="$(\'#ThWinSetUsrNme\').fadeOut();" >X</div> </div>
                  <div class="ThWinSetCont">
                      New Username <input  type="text" placeholder="Type your new Username"/> <span class="SAC_AvailSts">Available</span> 
                  </div>
                  <div class="ThWinPrcdBtn">
                      Update
                  </div>
              </div>
          </div>
          <div class="Theater_Window_SetOut" id="ThWinSetMobile" >
              <div class="ThWin_Set_In">
                  <div class="ThWinSetTtl"> Mobile No <div class="closeThWin" onclick="$(\'#ThWinSetMobile\').fadeOut();" >X</div> </div>
                  <div class="ThWinSetCont">
                      Mobile No for Notifications <input oninput="check_mobile_no(this.value)"  type="text" id="my_mob_no" placeholder="Type your Mobile Number"/> <span id="result_mob"></span>
                  </div>
                  <div class="ThWinPrcdBtn" onclick="update_acc(\'#my_mob_no\',\'mobno\')">
                      Update
                  </div>
              </div>
          </div>
          <div class="Theater_Window_SetOut" id="ThWinSetMail" >
              <div class="ThWin_Set_In">
                  <div class="ThWinSetTtl"> Email Id <div class="closeThWin" onclick="$(\'#ThWinSetMail\').fadeOut();" >X</div> </div>
                  <div class="ThWinSetCont">
                      Email Id for Notifications <input oninput="check_pre_email(this.value)"  type="text" id="new_email" placeholder="Type your Email Id"/> <span id="result_email"></span>
                  </div>
                  <div class="ThWinPrcdBtn" onclick="update_acc(\'#new_email\',\'email\')">
                      Update
                  </div>
              </div>
          </div>
          <div class="Theater_Window_SetOut" id="ThWinSetLockPass" >
              <div class="ThWin_Set_In">
                  <div class="ThWinSetTtl"> Lock Screen Password <div class="closeThWin" onclick="$(\'#ThWinSetLockPass\').fadeOut();" >X</div> </div>
                  <div class="ThWinSetCont">
                      Password for Lock Screen <input  type="text" placeholder="Type your Password"/> 
                  </div>
                
              </div>
          </div>
          <div class="Theater_Window_SetOut" id="ThWinSetPassword" >
              <div class="ThWin_Set_In">
                  <div class="ThWinSetTtl"> Change Password <div class="closeThWin" onclick="$(\'#ThWinSetPassword\').fadeOut();" >X</div> </div>
                  <div class="ThWinSetCont">
                    
                      Current  Password 1<input id="SAC_pass1"  type="password" placeholder="Type your Password 1"/><img class="passEye" onclick="showPassInp(\'#SAC_pass1\')" src="icons/chatwin/view_type.png"/> <br/><br/>
                      Current  Password 2 <input id="SAC_pass2"  type="password" placeholder="Type your Password 2"/> <img class="passEye" onclick="showPassInp(\'#SAC_pass2\')" src="icons/chatwin/view_type.png"/>
                  </div>
                  <script>
                      function showPassInp(id){
                        if($(id).attr(\'type\')===\'password\'){
                            $(id).attr({\'type\':\'text\'});
                        }
                        else{
                            $(id).attr({\'type\':\'password\'});
                        }
                      }
                      
                      </script>
                  <div class="ThWinPrcdBtn" onclick="change_password_open(\'#SAC_pass1\',\'#SAC_pass2\')">
                      Proceed
                  </div>
              </div>
          </div>
          
      </div>
  </body>
</html>
';
}