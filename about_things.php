
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
        $q="select about as g from profile_sets where user_id=$user_id";
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
                              <select onchange="change_prof_privacy(\'about\',this.value)">
                                  <option '.$msgAllowFrom1.' value="0">
                                      Anyone
                                  </option>
                                  <option '.$msgAllowFrom1.' value="1">
                                      Relations Only
                                  </option>
                                  <option '.$msgAllowFrom1.' value="2">
                                      Relations of Relations
                                  </option>
                              </select>
                          </div>';
    
$q="SELECT me as me,you as y,family as fm,love as l,frndship as f,studies as st,politics as p,life as lf,god as g,boys as bys,girls as gy,marriage as mr,entertainment as en,wtow as w from about where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $me=$row['me'];
    $you=$row['y'];
    $family=$row['fm'];
    $friend=$row['f'];
    $love=$row['l'];
    $studies=$row['st'];
    $politics=$row['p'];
    $life=$row['lf'];
    $god=$row['g'];
    $boys=$row['bys'];
    $girls=$row['gy'];
    $marriage=$row['mr'];
    $entertainment=$row['en'];
    $wtow=$row['w'];
  }else
  {
     $me="";
    $you="";
    $family="";
    $friend="";
    $love="";
    $studies="";
    $politics="";
    $life="";
    $god="";
    $boys="";
    $girls="";
    $marriage="";
    $entertainment="";
    $wtow="";
  }
}
echo '

<div class="profTypeTitle">About</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="profInfoItem">
<div class="profInfoTtle">
Me
</div>
<div class="profInfoAns"><input id="ab1"  class="txtBxx" type="text" value="'.$me.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
You
</div>
<div class="profInfoAns"><input type="text" id="thinkusrnm" title="This will be shown only to this user When this user visit your profile" class="txtBxxs" placeholder="Username" />&nbsp;&nbsp;|&nbsp;&nbsp;<input id="ab2" class="txtBxxs" title="This will be shown only to this user When this user visit your profile" placeholder="What do you think ?" type="text" value="'.$you.'"/>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Family
</div>

<div class="profInfoAns"><input id="ab3" class="txtBxx" type="text" value="'.$family.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Friendship
</div>

<div class="profInfoAns"><input id="ab4" class="txtBxx" type="text" value="'.$friend.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Love
</div>

<div class="profInfoAns"><input id="ab5" class="txtBxx" type="text" value="'.$love.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Education
</div>

<div class="profInfoAns"><input id="ab6" class="txtBxx" type="text" value="'.$studies.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Politics
</div>

<div class="profInfoAns"><input id="ab7" class="txtBxx" type="text" value="'.$politics.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Life
</div>

<div class="profInfoAns"><input id="ab8" class="txtBxx" type="text" value="'.$life.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
God
</div>

<div class="profInfoAns"><input id="ab9" class="txtBxx" type="text" value="'.$god.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Boys
</div>

<div class="profInfoAns"><input id="ab10" class="txtBxx" type="text" value="'.$boys.'"/>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Girls
</div>

<div class="profInfoAns"><input id="ab11" class="txtBxx" type="text" value="'.$girls.'"/>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Marriage
</div>

<div class="profInfoAns"><input id="ab12" class="txtBxx" type="text" value="'.$marriage.'"/>
</div>
</div>



<div class="profInfoItem">
<div class="profInfoTtle">
Entertainment
</div>

<div class="profInfoAns"><input id="ab13" class="txtBxx" type="text" value="'.$entertainment.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Some words to World
</div>

<div class="profInfoAns"><input  id="ab14" class="txtBxx" type="text" value="'.$wtow.'"/>
</div>
</div>


<br/>



</div>

                    
                                 <div class="pageBottomProceeds">
                               <div class="updateHolder"  onclick="updtabt('.$user_id.')" id="nextBtn">Finish</div>
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