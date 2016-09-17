
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
    $today = date("g:i a ,F j, Y"); 
    		 
    $q="update person_config set profile_update='$today' where user_id=$user_id";
    mysqli_query($dbc, $q);
        $q="select aboutme as g from profile_sets where user_id=$user_id";
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
    <!--<link rel="stylesheet" href="'.$_SESSION['css'].'profile.css"/> -->
    <link rel="stylesheet" href="'.$_SESSION['css'].'editprofile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpprofile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpEdus.css"/>
   <script src="angular.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="profile.js" type="text/javascript"></script>
   <script src="editprofile.js" type="text/javascript"></script>
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
                            <div class="profTypeTitle">Family</div>
                            <div class="profSecurityInfo">
                                Details You provide here are at your own risk .These details will be in your profile. If you don\'t want to provide just skip.
                            </div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                          <div class="privacyOuter">
                              <span class="PTip">Who can see these details</span>
                              <select onchange="change_prof_privacy(\'aboutme\',this.value)">
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
<div class="profTypeTitle">About Me </div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="profInfoItem">
<div class="profInfoTtle">
Blood Group
</div>
<div class="profInfoAns">
<select id="bggrp" >';
$q="SELECT bldgrp as bg,language as lang,religion as relg,eca as eca,phisique as p,mentally as mental,politics as pol,income as inc ,aboutme as abtme from about_me where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $bldg=$row['bg'];
    $language=$row['lang'];
    $religion=$row['relg'];
    $eca=$row['eca'];
    $phisique=$row['p'];
    $mentally=$row['mental'];
    $politics=$row['pol'];
    $income=$row['inc'];
    $aboutme=$row['abtme'];
  }else
  {
     $bldg="";
    $language="";
    $religion="";
    $eca="";
    $phisique="";
    $mentally="";
    $politics="";
    $income="";
    $aboutme="";
  }
}
echo'<option value="'.$bldg.'">'.$bldg.'</option>
<option value="O +ve">O +ve</option>
<option value="O -ve">O -ve</option>
<option value="A +ve">A +ve</option>
<option value="A -ve">A -ve</option>
<option value="B -ve">B +ve</option>
<option value="B +ve">B -ve</option>
<option value="AB +ve">AB +ve</option>
<option value="AB -ve">AB -ve</option>
<option value="A1 +ve">A1 +ve</option>
<option value="A1 -ve">A1 -ve</option>
<option value="A2 +ve">A2 +ve</option>
<option value="A2 -ve">A2 -ve</option>
<option value="A2B +ve">A2B +ve</option>
<option value="A2B -ve">A2B -ve</option>
<option value="B1 +ve">B1 +ve</option>


</select>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Languages Known
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" id="slang" value="'.$language.'"/>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Religion
</div>

<div class="profInfoAns"><input class="txtBxx" type="text" id="relg" value="'.$religion.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
ECA
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" id="eca" value="'.$eca.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle" >
Physique
</div>
<div class="profInfoAns"><input id="physique" class="txtBxx" type="text" value="'.$phisique.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Mentally
</div>
<div class="profInfoAns"><input id="mental" class="txtBxx" type="text" value="'.$mentally.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Politics
</div>
<div class="profInfoAns"><input id="politic" class="txtBxx" type="text" value="'.$politics.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Monthly Income
</div>
<div class="profInfoAns"><input id="mi" class="txtBxx" type="text" value="'.$income.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
about me
</div>
<div class="profInfoAns"><input id="abtme" class="txtBxx" type="text" value="'.$aboutme.'"/>
</div>
</div>
<br/>

</div>
                    
                            
                                  <div class="pageBottomProceeds">
                                    <a href="my_favs.php"> <div class="updateHolder"  id="skipBtn" >Skip</div></a>
                               <div class="updateHolder"  onclick="updtabtme()" id="nextBtn">Next</div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
            
        </div>
        <div class="SedFed_TM">
            SedFed 2.0
        </div>
    </body>
</html>
';
    
}