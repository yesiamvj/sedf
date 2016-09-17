<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $q="select first_name as f from basic where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $first_name=$row['f'];
           }
    }
      $q="select contact as g from profile_sets where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $relsAllowFrom=$row['g'];
           }else
           {
	 $relsAllowFrom=0;
           }
	 
    }
     switch ($relsAllowFrom){
              case 0:
                 
                  $msgAllowFrom1='selected';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='';
                  break;
              case 1:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='selected';
                  $msgAllowFrom3='';
                  break;  
              case 2:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='selected';
                  break;  
              
          }  $q="select favorite as g from profile_sets where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $relsAllowFrom=$row['g'];
           }else
           {
	 $relsAllowFrom=0;
           }
	 
    }
     switch ($relsAllowFrom){
              case 0:
                 
                  $msgAllowFrom1='selected';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='';
                  break;
              case 1:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='selected';
                  $msgAllowFrom3='';
                  break;  
              case 2:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='selected';
                  break;  
              
          }
          $q="select email as em,mobno as m ,website as web from person_config where user_id=$user_id";
          $r=  mysqli_query($dbc, $q);
          if($r)
          {
	if(mysqli_num_rows($r)>0)
	{
	       $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	       $email=$row['em'];
	       $mobno=$row['m'];
	       $website=$row['web'];
	}else
	{
	       $email="";
	       $mobno="";
	       $website="";
	}
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
    <title>Profile </title>
    <!--<link rel="stylesheet" href="profile.css"/> -->
    <script src="jquery.min.js"></script>
    <script src="editprofile.js"></script>
    <link rel="stylesheet" href="startUpprofile.css"/>
    <link rel="stylesheet" href="startUpEdus.css"/>
    <link rel="stylesheet" href="startUpCont.css"/>
   
  </head>
    <body>
          <div id="Topest">

                    <div id="title_bar">

                      <font id="sedfedUserName" >'.$first_name.'</font>

                    </div>
                     <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >Set Up My Profile</font>

                    </div>

                </div>
        <div id="content-full">
            
              <div class="myCurrentInfoOut" id="myEducation" >
                            <div class="profTypeTitle">Contact Details</div>
                            <div class="profSecurityInfo">
                                Details You provide here are at your own risk .These details will be in your profile. If you don\'t want to provide just skip.
                            </div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                          <div class="privacyOuter">
                              <span class="PTip">Who can see these details</span>
                              <select onchange="change_prof_privacy(\'contact\',this.value)">
                                      <option '.$msgAllowFrom1.' value="0">
                                      Anyone
                                  </option>
                                  <option '.$msgAllowFrom2.' value="1">
                                      Relations Only
                                  </option>
                                  <option '.$msgAllowFrom3.' value="2">
                                      Relations of Relations
                                  </option>
                              </select>
                          </div>
                          <div class="myCurInfoInner">
                              
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="hYT-Item">Mobile  <div class="hYT-ans"><input class="txtBxx" id="mymobno" type="text" value="'.$mobno.'"/></div></div>
                                            <div class="hYT-Item">Email ID <div class="hYT-ans"><input class="txtBxx" type="text"  id="myemail" value="'.$email.'"/></div></div>
                                            <div class="hYT-Item">Blog / Website <div class="hYT-ans"><input class="txtBxx" id="mywebsite" type="text" value="'.$website.'"/></div></div>
                                            
                                            
                                        </div>
                                    </div>
                                <div class="pageBottomProceeds">
                                      <a href="edit_current.php"> <div class="updateHolder" id="skipBtn"  >Skip</div></a>
		  ';
    if(empty($_SESSION['change_path_prof']))
    {
           $goto='edit_current.php';
    }else
    {
           $goto='start_up_current.php';
    }
		  echo '
                                <div class="updateHolder" id="nextBtn" onclick="updtcnct(\''.$goto.'\')">Next</div>
                                </div>
                                
                                
                            </div>
                        </div>
         <div class="outerSkipBtn">
                Skip
            </div>
        </div>
        <div class="SedFed_TM">
            SedFed 2.0
        </div>
    </body>
</html>
';
}