<?php session_start();
if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
{
	header("location:globe.php");
}else
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
   <link type="text/css" href="'.$_SESSION['css'].'register.css" rel="stylesheet" />
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="register.js" type="text/javascript">     
   </script>
  </head>
  
  <body ng-app="">
      <!-- Created On Start Up i.e Old file -->
       <div title="A Colorful Communication" id="title_bar" >
              <div id="sedfed">sedfed</div>
      </div>
      <div class="safetyBackG"></div>
      <div class="subTtl"  >
         New Account
      </div>
      <div id="content-full">
         
          <div class="declareSec">
              Details you provide here  are only for Official Purpose . These details will not be shown in anywhere on SedFed .
          </div>
          <div id="r-inps">
              <div id="r-itbls" >
                   <form method="post" action="newuser.php" >
              <div>
                 
                  <div>
                      <div><div class="r-ins">Email</div>  </div>
                      <div><input oninput="//check_pre_email(this.value)" onblur="checkmaill();" onfocus="elonfocus(\'1\')" id="r-txtemail" type="text" placeholder="example@mail.com" required="required" name="email" ng-model="emailid" autofocus/><div id="mailhint" class="r-error"></div><div id="tipmail"></div></div>
                 
                  </div>
                   <div>
                      <div><div class="r-ins"> Mobile No</div>  </div>
                      <div><input oninput="//check_mobile_no(this.value)" onblur="checkmobno();"  onfocus="elonfocus(\'2\')" ng-model="mobno" id="r-txtmobno" type="text" placeholder="Your Contact Number" name="mob_no" required/><div id="mobhint" class="r-error"></div><div id="tipmob"></div></div>
                      
                  </div> <div>
                      <div><div class="r-ins"> Password 1</div>  </div>
                      <div><input oninput="pwdtype(\'#r-txtpass1\')" name="pass1"  onfocus="elonfocus(\'3\')" ng-model="pass" id="r-txtpass1" type="password" placeholder="0 to 20 Characters"/> <div id="passhint" class="r-error"></div><div id="tippass1"></div> </div>
                      
                  </div> <div>
                      <div><div class="r-ins"> Password 2</div>  </div>
                      <div><input oninput="pwdtype(\'#r-txtpass2\')" name="pass2"  onfocus="elonfocus(\'4\')" ng-model="pass2" id="r-txtpass2" type="password"  placeholder="0 to 20 Characters"/> <div id="passhint" class="r-error"></div><div id="tippass2"></div> </div> 
                  </div>
                  <div>
                      <div>
                           </div>
                      <div id="acceptTerms" >
                          <input onchange="accpt()" type="checkbox" id="chkbx" required/><div class="accptIt">By clicking Register I Accept to the terms and conditions</div>
                     
                      </div>
                  </div>
                   <div>
                      <div>  </div>
                      <div><input onclick="accpt()" id="r-submit" type="submit" value="Sign Up" />  </div>
                      
                  </div>
                  
              </div>
                       </form>
              </div>
          </div>
          
      </div>
       <div class="bottomSedFed_Tm">
          SedFed 2.0
      </div>
    
  </body>
</html>';
}
?>