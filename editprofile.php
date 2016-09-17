<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
header("location:index.php");
}else
{
$user_id=$_SESSION['user_id'];
$first_name=$_SESSION['user_name'];
require 'mysqli_connect.php';
$q1="select degree as d,deg_cur as dc from current where user_id=$user_id";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
if(mysqli_num_rows($r1)>0)
{
$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
$predeg=$row1['d'];
$curdeg=$row1['dc'];
}else
{
$predeg="";
$curdeg="";
}
}
$q2="select nick_name as nm from basic where user_id=$user_id";
$r2=mysqli_query($dbc,$q2);
if($r2)
{
if(mysqli_num_rows($r2)>0 )
{
  $row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
$nicknm=$row2['nm'];
}else
{
$nicknm="";
}
}
$q3="select year as y,day as d,month as m ,first_name as fn,nick_name as nm from basic where user_id=$user_id";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
if(mysqli_num_rows($r3)>0 )
{
$row3=mysqli_fetch_array($r3,MYSQLI_ASSOC);
$year=$row3['y'];
$mnth=$row3['m'];
$day=$row3['d'];
$my_name=$row3['fn'];
$my_nicknm=$row3['nm'];
$age=2014-$year;
}else
{
$year="";
$mnth="";
$day="";
$age="";
}
}
$q14="select status as st,orany as orn,withrel as w from relation_stat where user_id=$user_id";
$r14=mysqli_query($dbc,$q14);
if($r14)
{
if(mysqli_num_rows($r14)>0 )
{
  $row15=mysqli_fetch_array($r14,MYSQLI_ASSOC);
$status=$row15['st'];
$orany=$row15['orn'];
$withrel=$row15['w'];

}else
{
$status="";
$orany="";
$withrel="";
}
}
$q6="SELECT cur_loc as cl ,living_in as li from my_location where user_id=$user_id";
$r6=mysqli_query($dbc,$q6);
if($r6)
{
if(mysqli_num_rows($r6)>0)
{
	$row6=mysqli_fetch_array($r6,MYSQLI_ASSOC);
$curloc=$row6['cl'];
$livingin=$row6['li'];

}else
{
$curloc="";
$livingin="";

}
}else
{
	$curloc="";
$livingin="";

}

$q="select update_wall as c from wall_pics where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
    if(mysqli_num_rows($r)>0)
    {
        $roe=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $w_pic=$roe['c'];
    }else
    {
        $w_pic="";
    }
}

echo '
<!DOCTYPE html>
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
<link rel="stylesheet" href="profile_newcss.css"/>
<link rel="stylesheet" href="editprofile_new.css"/>

<script src="angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
<script src="profile.js" type="text/javascript"></script>
<script src="editprofile.js" type="text/javascript"></script>
</head>

<body onload="setWallpaper()"  >
<div id="fullPageContainer">
<div id="pageLoadStatus"></div>
<div id="Topest">

<div id="title_bar">

<font id="sedfedUserName" >'.$my_name.'</font>

</div>
<div id="Mytitle_bar">

<font id="MysedfedUserName" >Edit profile</font>

</div>

</div>
<div id="innerPageCont">

<input type="hidden" id="wchwantchng" value="">
<div id="sf-wallpprHoldr" onclick="meOnWallppr()" onmouseover="//meOnWallppr()" onmouseout="//meOutWallppr()" style=" background-image:url(\''.$w_pic.'\')" >
<!-- image is in as background for better result -->
 
</div>';

$q3="select year as y,day as d,month as m,sex as sex from basic where user_id=$user_id";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
if(mysqli_num_rows($r3)>0 )
{
$row3=mysqli_fetch_array($r3,MYSQLI_ASSOC);
$year=$row3['y'];
$mnth=$row3['m'];
$day=$row3['d'];
$age=2014-$year;
$sex=$row3['sex'];
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
$age="";
$sex="";
}
}
 $q="select update_pics as p from profile_pics where user_id=$user_id ";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $ppics=$rpw['p'];
                          }  else {
                              if($sex=="girl")
                              {
                                  
                          $ppics="../web/icons/female.png"; 
                              }else
                              {
                                   $ppics="../web/icons/male.png";
                              }   
                          }
                      }

echo'
<div id="myProfilePicOnWall">
<img src="'.$ppics.'" alt="'.$my_name.'" class="curprofimg" onclick="showMyFace()"/>

</div>
<img id="img-wallpaper" src="'.$w_pic.'" alt="'.$w_pic.'" class="my_wall_pic" onclick="setWallpaper()" />
<div id="sf-profileHolder" >
<input type="file" id="for_back_img" onchange="changeback_pic()" style="width:0px;height:0px;display:none;"/>
<div id="innerProfile" onmouseover="meOnProfile()" >
<input type="file" id="for_bgm_updt" style="width:0px;height:0px;display:none;" onchange="chng_bgm()" />
   <div id="OverallPictureChange">
                            <div class="OPC_ItmBtn">
                                Update Profile Picture
                            </div>
                            <div class="OPC_ItmBtn" onclick="change_wall_pic()">
                                Update Wallpaper
                            </div>
                            <div class="OPC_ItmBtn" id="updtbgpic" onclick="$(\'#for_back_img\').click();">
                                Update Background Picture
                            </div>
                            <div class="OPC_ItmBtn" id="updtbgm" onclick="$(\'#for_bgm_updt\').click();">
                                Update BGM
                            </div>
                            <div class="OPC_ItmBtn">
                                Update Profile view type
                            </div>
                        </div>
<div id="myFirstAppear">
<div id="myProfilePic">
<div id="forQuickSFprofile" onmouseover="mouseOnQPsf(\'#forQuickSFprofile\')" onmouseout="mouseOutQPsf(\'#forQuickSFprofile\')">
<img onclick="Likedone(1,100,\'.likebtn\')" id="sf-likeIcon" class="likebtn" src="icons/post-sf-like.png" alt="like"/> <br/>
<img onclick="Likedone(0,100,\'.unlikebtn\')" id="sf-unlikeIcon" class="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/><br/>

<img onclick="quickpostRateclk(\'#quickpostrate1\')" id="quickpostrate1" src="icons/post-sf-emptyRate.png" alt="Rate"  /><br/>

</div>
<!-- profile image -->
  <div id="chngppic"></div>
                            
                      

<div id="chngeProfPic" class="chng_my_pics" >
Change
</div>
<input type="file" id="profpicchnge" style="display: none" />
<img src="'.$ppics.'" class="curprofimg" alt="'.$my_name.'" onclick="showMyFace()"/>

</div>  
<div id="myFirstDetails">
<div id="firDetInner">
<div id="firDetContainer">
<div class="firDetTtl">I\'m 
<div id="amIexistorNot" style="color:green" onmouseover="$(\'#hYT-Tt-Verify\').fadeIn()" onclick="$(\'#hYT-Tt-Verify\').toggle()" ></div>

</div>
<div class="firDetCont" style="color:crimson;font-size: 20px;">
<input class="txtBxx" id="inp_Name" onclick="$(\'#ThName\').fadeIn();$(\'#inp_thName\').focus();" type="text" value="'.$my_name.'" style="color:crimson;font-size: 20px;" placeholder="First Name"/><div id="myEduDegree"><div id="completdDegs"><input class="txtBxx" id="inp_Degfnsh" onclick="$(\'#ThDegree\').fadeIn();$(\'#inp_thDegFnsh\').focus();" style="width: 100px;" type="text" value="'.$predeg.'" placeholder="Degree" /></div>now&nbsp;<div id="currentDeg"><input class="txtBxx" id="inp_DegCur" onclick="$(\'#ThDegree\').fadeIn();$(\'#inp_thDegCur\').focus();" style="width: 100px;" type="text" value="'.$curdeg.'" placeholder="degree"/></div> </div></div>
<div class="firDetCont" style="color:gray;font-size: 14px;" >Otherwise known as <div class="firDetCont" style="color:crimson;font-size: 19px;"><input class="txtBxx" id="inp_NickName" onclick="$(\'#ThNickName\').fadeIn();$(\'#inp_thNickName\').focus();" type="text" value="'.$nicknm.'" placeholder="Nick Name" style="color:crimson;font-size: 19px;width: 330px"/></div></div>
<div class="firDetCont"><input type="checkbox"/>Male <input type="checkbox"/>Female </div>
<div class="firDetCont"> <input  onclick="$(\'#ThAge\').fadeIn();" id="inp_Age" class="txtBxx" type="text" value="'.$age.'" placeholder="Age"/> <div class="firDetContEx" style="color:gray"><input  onclick="$(\'#ThAge\').fadeIn();" id="inp_DOB" class="txtBxx" type="text" value="'.$day.' '.$mnth.' '.$year.'" placeholder="Birth Date"/></div></div>
<div class="firDetCont" >



<input class="txtBxx" id="inp_relsts" onclick="$(\'#thtrRelSts\').fadeIn();" type="text" value="'.$status.'" placeholder="Relationship Status"/><div class="firDetContEx" style="color:gray;">With <div class="firDetCont"  style="color:crimson;font-size: 19px;margin-top: -1px"><input id="inp_relstsWith" class="txtBxx" type="text" value="'.$orany.' '.$withrel.'" style="color:crimson;font-size: 19px;width: 175px" onclick="$(\'#thtrRelSts\').fadeIn();$(\'#inp_thtrRelWith\').focus();" placeholder="Name of person"/></div></div>

</div>
<div class="firDetCont"> <input class="txtBxx" id="inp_IamA" onclick="$(\'#ThIamA\').fadeIn();$(\'#inp_thIamA\').focus();" type="text" value="'.$curloc.'" placeholder="I am a "/> <div class="firDetContEx" style="color:gray;margin-top: -26px"><input id="inp_Flocate" class="txtBxx" type="text" value="'.$livingin.'" placeholder="I\'m living in" onclick="$(\'#ThLocate\').fadeIn();$(\'#inp_thLocate\').focus();"/></div></div>

</div>
<div class="theaterTexts" id="ThName" style="display: none">
<div class="thtrTxtIn">
<div class="thtrTtl">
My name <div class="thtrTxtClose" onclick="$(\'#ThName\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<input oninput="thtrInput(\'#inp_thName\',\'#inp_Name\')" class="thtrTxtInp" id="inp_thName" type="text" placeholder="My name is" value="'.$my_name.'" />
<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$my_name.'
</div>
<div class="thtrPrcd" onclick="updtmynm()">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts" id="ThDegree" style="display: none;" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My education <div class="thtrTxtClose" onclick="$(\'#ThDegree\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
Finished
<input oninput="thtrInput(\'#inp_thDegFnsh\',\'#inp_Degfnsh\')" class="thtrTxtInp" id="inp_thDegFnsh" type="text" placeholder="Finished Courses" value="SSLC" style="width: 450px;" />
Currently <input oninput="thtrInput(\'#inp_thDegCur\',\'#inp_DegCur\')" class="thtrTxtInp" id="inp_thDegCur" type="text" placeholder="Currently studying course" value="BE"  style="width: 450px;"/>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E.g BE.,MBBS., &nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;seperate every course by&nbsp;&nbsp;&nbsp;&nbsp; .,&nbsp;&nbsp;&nbsp;&nbsp;) <br/><br/>
<div class="thtrPrcd" onclick="updtedu('.$user_id.')">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts" id="ThNickName" style="display: none">
<div class="thtrTxtIn">
<div class="thtrTtl">
Otherwise known as <div class="thtrTxtClose" onclick="$(\'#ThNickName\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<input oninput="thtrInput(\'#inp_thNickName\',\'#inp_NickName\')" class="thtrTxtInp" id="inp_thNickName" type="text" placeholder="My Nick Name" value="'.$my_nicknm.'" />
<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$nicknm.'
</div>
<div class="thtrPrcd" onclick="updtnicknm()">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts" id="ThAge" style="display: none" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Birthday <div class="thtrTxtClose" onclick="$(\'#ThAge\').fadeOut()" >X</div>
</div>
<div class="thtrCont">

<div class="thtrSlctItm">
Date
<select id="inpTh_Date"  >';
for($t=1;$t<=31;$t++)
{
echo'<option>
'.$t.'
</option>';
}



echo' </select>
</div>
<div class="thtrSlctItm" >
Month
<select id="inpTh_Mon" onchange="ageInp()" >
<option>Jan</option> 
<option>Feb</option>
<option>Mar </option>
<option>Apr</option> 
<option>May</option>
<option>Jun </option>
<option>Jul</option> 
<option>Aug</option>
<option>Sep </option>
<option>Oct</option> 
<option>Nov</option>
<option>Dec</option>


</select>
</div>
<div class="thtrSlctItm">
Year
<select id="myyear" onchange="ageInp()" onclick="yearSelect(\'#Th_ageYear\')" >
';
for($ni=1950;$ni<=2015;$ni++)
{
echo '<option>'.$ni.'</option>';
}


echo'</select>
</div>

<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <span id="mydob">'.$day.' | '.$mnth.' | '.$year.'</span>&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <span id="myages">Age : '.$age.'</span>
</div>
<div class="thtrPrcd" onclick="updatdob()">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts" id="ThLocate" style="display: none" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Location <div class="thtrTxtClose" onclick="$(\'#ThLocate\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<input id="inp_thLocate" class="thtrTxtInp" type="text" placeholder="I\'m living in" oninput="thtrInput(\'#inp_thLocate\',\'#inp_Flocate\')"/>
<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$c.'
</div>
<div class="thtrPrcd" onclick="updtloc(2)">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts" id="ThcurLocate" style="display: none" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Location <div class="thtrTxtClose" onclick="$(\'#ThcurLocate\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<input id="inp_thcurLocate" class="thtrTxtInp" type="text" placeholder="Your Current Location" />
<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$curloc.'
</div>
<div class="thtrPrcd" onclick="updtmyloctn()">
Updates
</div>
</div>
</div>
</div>
<div class="theaterTexts" id="ThIamA" style="display: none" >
<div class="thtrTxtIn">
<div class="thtrTtl">
Specify about you <div class="thtrTxtClose" onclick="$(\'#ThIamA\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<input id="inp_thIamA" class="thtrTxtInp" type="text" placeholder="I am a" oninput="thtrInput(\'#inp_thIamA\',\'#inp_IamA\')"/>
<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$curloc.'
</div>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E.g Nationality,Character whatever<br/><br/>
<div class="thtrPrcd" onclick="updtloc(1)">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts"  id="thtrRelSts" style="display: none" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Relationship Status <div class="thtrTxtClose" onclick="$(\'#thtrRelSts\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<div class="thtrRelSlct" >
<select id="thRelSlct" onchange="thtrInput(\'#thRelSlct\',\'#inp_relsts\')">
<option>Single</option>
<option>In love</option>
<option>Married</option>
<option>Unmarried</option>

<option>Divorced</option>

</select>
&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;
<div class="thtrRelwith">
<span id="rmvao">or&nbsp;&nbsp; <input id="inp_thtrRelSts" class="thtrTxtInp" type="text" placeholder="Any Other"  /> </span> <span id="rmvtmp">With
<input id="inp_thtrRelWith" class="thtrTxtInp" type="text" placeholder="Relation with this person"  /></span>



</div>
</div>
<div class="thtrprevRelCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$status.'
</div>
<div class="thtrPrcd"  onclick="updtrship()">
Update
</div>
</div>
</div>
</div>



</div>';
$q23="SELECT username as u,mobno as m,website as web,email as em from users where user_id=$user_id";
$r23=mysqli_query($dbc,$q23);
if($r23)
{
  $row23=mysqli_fetch_array($r23,MYSQLI_ASSOC);
  $email=$row23['em'];
  $usernm=$row23['u'];
  $mobile_no=$row23['m'];
  $website=$row23['web'];
}else
{
  echo mysqli_error($dbc);
}
echo'<div class="heyYoyThereTt" id="hYT-Tt-Contact" style="display: none" >

<div class="hYT-Outer">
<div class="hYT-arr"></div>
<div class="hYT-Inner">
<div id="errordiv" style="display:none;"></div>
<div class="hYT-Item">Username  <div class="hYT-ans"><input id="myusernm" class="txtBxx" type="text" value="'.$usernm.'"/><span id="usernmrslt" class="updtmycntcnt"></span></div></div>
<div class="hYT-Item">Mobile  <div class="hYT-ans"><input id="mymobno" class="txtBxx" type="text" value="'.$mobile_no.'"/><span id="mobnorslt" class="updtmycntcnt"></span></div></div>
<div class="hYT-Item">Email ID <div class="hYT-ans"><input class="txtBxx" id="myemail" type="text" value="'.$email.'"/><span id="emailrslt" class="updtmycntcnt"></span></div></div>
<div class="hYT-Item">Blog / Website <div class="hYT-ans"><input id="mywebsite" class="txtBxx" type="text" value="'.$website.'"/><span id="webrslt" class="updtmycntcnt"></span></div></div>
<div class="hYT-Item">Message  <div class="hYT-ans">'.$first_name.'</div></div>
<div class="updateTts" onclick="updtcnct()">Update</div>
</div>
</div>

</div>
<div class="heyYoyThereTt" id="hYT-Tt-Propose" style="display: none" >

<div class="hYT-Outer">
<div class="hYT-arr"></div>
<div class="hYT-Inner">
<div class="TtTitleProp">
Propose <div class="helpforProp" onclick="$(\'#proposeHelpWindow\').slideDown();" >? help</div>

</div>
<div id="TtPropCont">
<div id="prop-btn-secret" class="propItem" onclick="proposeMe(\'#prop-btn-brave\',\'<br> Proposed Bravely <br> Best Of Luck \')">Brave</div>
<div class="propItem" onclick="proposeMe(\'#prop-btn-secret\',\'<br> Proposed Secretely <br> Best Of Luck \')" >Smart</div>

</div>
</div>
</div>

</div>
<div class="heyYoyThereTt" id="hYT-Tt-Stats" style="display: none" >

<div class="hYT-Outer">
<div class="hYT-arr"></div>
<div class="hYT-Inner">
<div class="TtTitleProp">
Statistics 

</div>
<div class="hYT-Item">Profile Views  <div class="hYT-ans">887</div></div>

<div class="hYT-Item">Total Posts<div class="hYT-ans">67</div></div>
<div class="hYT-Item">Total Post Responses<div class="hYT-ans">876</div></div>
<div class="hYT-Item">Profile Verified by<div id="vrfyPplHold" class="hYT-ans" style="cursor: pointer" > 3 people 
<div id="vrfyPpl">

</div> 
</div></div>
<div class="hYT-Item">Last Login<div class="hYT-ans">May 30 , 10.30</div></div>

</div>
</div>

</div>
<div class="heyYoyThereTt" id="hYT-Tt-AddRel" style="display: none" >

<div class="hYT-Outer">
<div class="hYT-arr"></div>
<div class="hYT-Inner">
<div class="TtTitleProp" id="hYT-Tt-AddRelTtl" >
Add to Relation

</div>

<div class="hYT-stsItem"><span class="hyt-sts">Status</span><span class="hyt-sts" id="hYT-relSts">No relation</span> </div>
<div class="hYT-Item"><span id="hyt-cont">Click to Send a Request</span></div>
<!-- store current request data here -->
<span class="sf-data" id="data-relSts" > Request has not seen </span>


</div>
</div>

</div>
<div id="heyYouThere">

<img src="icons/prof-contact.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Contact\',event)"/><br/>

</div>
</div>
</div>
';
$q1="select mythink as m,mythink_image as img ,mythink_bgm as aud from status where user_id=$user_id";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
if(mysqli_num_rows($r1)>0)
{
  $row8=mysqli_fetch_array($r1,MYSQLI_ASSOC);
$mystatus=$row8['m'];
$status_image=$row8['img'];
$sts_audi=$row8['aud'];
}else
{
$mystatus="";
$status_image="";
$sts_audi="";
}
}
echo'  <div class="myCurrentInfoOut" id="currentInfo"> 
<div class="profTypeTitle">Current <div id="amIalive" style="color:green">  online</div></div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="StatusImg">
<img id="stsImg" src="" />
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font ><input id="inp_status" class="txtBxx" type="text" value="" onfocus="$(\'#ThStatus\').fadeIn();$(\'#inp_thsts\').focus();" placeholder="what do you think"/>
</font>
</div>
<div class="profInfoAns">
</div>
</div>';
$q1="select mood as md,cur_loc as cl,mood_with as mw,orany as o from cur_details where user_id=$user_id";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
if(mysqli_num_rows($r1)>0 )
{
  $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
$mood=$row1['md'];
$moodwith=$row1['mw'];
$moodorany=$row1['o'];
$cur_loc=$row1['cl'];
}else
{
$moodwith="";
$cur_loc="";
$mood="";
$moodorany="";
}
}
echo'
<div class="profInfoItem">
<div class="profInfoTtle">
Mood 
</div>
<div class="profInfoAns">
<input id="inp_mood" class="txtBxx" type="text" value="Happy" style="width: 150px;" onfocus="$(\'#thtrMood\').fadeIn();$(\'#inp_thtrMood\').focus();" placeholder="feeling" /><span style="color:grey" >&nbsp; with</span><span id="moodWith"><input id="inp_moodWith" class="txtBxx" type="text" value="'.$moodwith.'" style="width: 200px;color:crimson" onfocus="$(\'#thtrMood\').fadeIn();$(\'#inp_thtrMoodWith\').focus();" placeholder="this person"/> </span>
</div>
</div>
';

echo'<div class="profInfoItem">
<div class="profInfoTtle">
Location
</div>
<div class="profInfoAns">
<input class="txtBxx" onclick="$(\'#ThcurLocate\').fadeIn();$(\'#inp_thcurLocate\').focus();" type="text" value="'.$cur_loc.'"/>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Position 
</div>
<div class="profInfoTtle">
<span class="divider"  style="color:grey">|</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="inp_CurPos" class="txtBxx" type="text" value="'.$position.'"  onfocus="$(\'#thtrCurpos\').fadeIn()" />
</div>
<div class="profInfoAns">
<input id="inp_curPosWith" class="txtBxx" type="text" value="'.$org.'" Engineering Guindy" onfocus="$(\'#thtrCurpos\').fadeIn();$(\'#inp_thtrPosWith\').focus()" placeholder="Organisation" />
</div>
</div>



</div>
</div>
<div class="theaterTexts" id="ThStatus" style="display: none;" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Status <div class="thtrTxtClose" onclick="$(\'#ThStatus\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<div id="ststest"></div>
<table>
<tr>
<td>
<input type="file" name="statusimage" id="stsimg" onchange="updtstsimg()" style="display:none">
<div class="ThstatusImg" id="for_new_sts_img" onclick="$(\'#stsimg\').click();">
<div id="stsimgvid"> Add an Image </div>
</div> 
</td>
<td>
<div class="thtrStsInps">
<input id="inp_thsts" class="thtrTxtInp" type="text" placeholder="What do you think now " value="" oninput="thtrInput(\'#inp_thsts\',\'#inp_status\')"/>
<input type="color" id="th_stsclrinp" style="width:0px;height:0px;" onchange="stsClrChnge()" />
<div id="th_stsclr" onclick="$(\'#th_stsclrinp\').click();"  ><img src="icons/chooseColor.png" alt="color"/></div>
<input type="file" id="stsaydfl" style="display:none;">
<div id="th_addStsFile" onclick="$(\'#stsaydfl\').click();">Add Audio</div>

<div id="stsupdtaud"></div>
<div id="stsnxaud"></div>
</div>
</td>
</tr>

</table>


<div class="thtrprevCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <span id="nowsts" class="mystatus_remved"></span>
</div>
<br/><br/>
<span class="t"><input type="checkbox" checked id="inclde_post" />Include in Whats Up</span>
<div class="thtrPrcd" id="status_result" onclick="updtmysts()">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts"  id="thtrCurpos" style="display: none" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Current Position <div class="thtrTxtClose" onclick="$(\'#thtrCurpos\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<div class="thtrRelSlct" >
<select id="thPosSlct" onchange="thtrInput(\'#thPosSlct\',\'#inp_CurPos\')">
<option>Student</option>
<option>Worker</option>


</select>
&nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;
<div class="thtrRelwith">
<input id="inp_thtrPosSts" class="thtrTxtInp" type="text" placeholder="Any Other" oninput="thtrInput(\'#inp_thtrPosSts\',\'#inp_CurPos\')" />  In
<input id="inp_thtrPosWith" class="thtrTxtInp" type="text" placeholder="Name of organisation"  oninput="thtrInput(\'#inp_thtrPosWith\',\'#inp_curPosWith\')"/>



</div>
</div>
<div class="thtrprevRelCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$org.'
</div>
<div class="thtrPrcd" onclick="updtcuposi()">
Update
</div>
</div>
</div>
</div>
<div class="theaterTexts"  id="thtrMood" style="display: none;" >
<div class="thtrTxtIn">
<div class="thtrTtl">
My Current Mood <div class="thtrTxtClose" onclick="$(\'#thtrMood\').fadeOut()" >X</div>
</div>
<div class="thtrCont">
<div class="thtrRelSlct" >
<select id="thMoodSlct" onchange="thtrInput(\'#thMoodSlct\',\'#inp_mood\')">
<option>Happy</option>
<option>Sad</option>
<option>Angry</option>
<option>Fear</option>

<option>Sleepy</option>

</select>
&nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;
<div class="thtrRelwith">
<input id="inp_thtrMood" class="thtrTxtInp" type="text" placeholder="Any Other" oninput="thtrInput(\'#inp_thtrMood\',\'#inp_mood\')" />  With
<input id="inp_thtrMoodWith" class="thtrTxtInp" type="text" placeholder="mood with this person"  oninput="thtrInput(\'#inp_thtrMoodWith\',\'#inp_moodWith\')"/>



</div>
</div>
<div class="thtrprevRelCont">
Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$status.'
</div>
<div class="thtrPrcd" onclick="updtmycurmood()">
Update
</div>
</div>
</div>
</div>

<div class="myCurrentInfoOut" id="myEducation" >
<div class="profTypeTitle">Education</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="myEduTtl">
College <div class="addNewEdu" onclick="addclg()"> + New College</div>
</div>
<div id="totcont">';
$q="SELECT clg as cl,dept as d ,clgdist as cd,clgfromyr as cfy,clgtoyr as ctoy,clg_discr as cdis from college where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $cl=0;
  while(($row=mysqli_fetch_array($r,MYSQLI_ASSOC)))
  {
     $cl=$cl+1;
      $clg=$row['cl'];
      $dept=$row['d'];
      $clgplc=$row['cd'];
      $clgfryr=$row['cfy'];
      $clgtoyr=$row['ctoy'];
      $clg_discr=$row['cdis'];
      echo'
      
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" id="from'.$cl.'" type="text" value="'.$clgfryr.'" placeholder="From"/> -  <input class="txtBxx" id="to'.$cl.'" type="text" value="'.$clgtoyr.'" placeholder="To" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" id="branch'.$cl.'" value="'.$dept.'" placeholder="branch / course"/> </div> <span class="divider"  style="color:darkgrey">  |</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" value="'.$clg_discr.'" id="titdis'.$cl.'" placeholder="Title or description"/></div>
</div>
<div class="myEduAns" >
<input class="txtBxx" type="text" id="clg'.$cl.'" value="'.$clg.'" placeholder="Name of College"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text"  id="clgplc'.$cl.'" value="'.$clgplc.'" placeholder="Location" style="color:black"/> </div>
</div>
</div>
';
     
  }
  
  }else
  {
    $cl=1;
     $clg="";
      $dept="";
      $clgplc="";
      $clgfryr="";
      $clgtoyr="";
      $clg_discr="";
      echo'
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" id="from1" type="text" value="'.$clgfryr.'" placeholder="From"/> -  <input class="txtBxx" id="to1" type="text" value="'.$clgtoyr.'" placeholder="To" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" id="branch1" value="'.$dept.'" placeholder="branch / course"/> </div> <span class="divider"  style="color:darkgrey">  |</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" value="'.$clg_discr.'" id="titdis1" placeholder="Title or description"/></div>
</div>
<div class="myEduAns" >
<input class="txtBxx" type="text" id="clg1" value="'.$clg.'" placeholder="Name of College"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text"  id="clgplc1" value="'.$clgplc.'" placeholder="Location" style="color:black"/> </div>
</div>
</div>
';
  }
  echo'</div><input type="hidden" value="'.$cl.'" id="mtotclgcnt">';
}

$q="SELECT hsc_name as hsc,hsc_plc as hplc,hsc_crs as hcrs,hsc_discr as hd,hsc_fromyr as hfr,hsctoyr as hto from hsc_detail where user_id=$user_id ";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    echo'<div class="myEduTtl">
High School <div class="addNewEdu" onclick="addhsc()"> + New H.Schol</div>
</div>
<div id="tothsccont">
<div class="myEduItem">
';
    $hc=0;
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $hc=$hc+1;
      $hsc=$row['hsc'];
      $hsc_plc=$row['hplc'];
      $hsc_crs=$row['hcrs'];
      $hsc_discr=$row['hd'];
      $hsc_fromyr=$row['hfr'];
      $hsctoyr=$row['hto'];

echo'

<div class="myEduSubTtl">
<div class="myEduSubHead"> <input class="txtBxx" id="hscfrom'.$hc.'" type="text" value="'.$hsc_fromyr.'" placeholder="From" /> - <input class="txtBxx" type="text" id="hscto'.$hc.'" value="'.$hsctoyr.'" placeholder="To"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscbrnch'.$hc.'" value="'.$hsc_crs.'" placeholder="branch / course"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscdis'.$hc.'" value="'.$hsc_discr.'" placeholder="Title or description"/> </div>
</div>
<div class="myEduAns">
<input class="txtBxx" type="text" id="hscnm'.$hc.'" value="'.$hsc.'" placeholder="Name of High School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="hscplc'.$hc.'" value="'.$hsc_plc.'" placeholder="Location" style="color:black"/> </div>
</div><br/>

';
    }

  }else
  {
     $hc=1;
      $hsc="";
      $hsc_plc="";
      $hsc_crs="";
      $hsc_discr="";
      $hsc_fromyr="";
      $hsctoyr="";

echo'
<div class="myEduTtl">
High School <div class="addNewEdu" onclick="addhsc()"> + New H.Schol</div>
</div>
<div id="tothsccont">
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> <input class="txtBxx" id="hscfrom'.$hc.'" type="text" value="'.$hsc_fromyr.'" placeholder="From" /> - <input class="txtBxx" type="text" id="hscto'.$hc.'" value="'.$hsctoyr.'" placeholder="To"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscbrnch'.$hc.'" value="'.$hsc_crs.'" placeholder="branch / course"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscdis'.$hc.'" value="'.$hsc_discr.'" placeholder="Title or description"/> </div>
</div>
<div class="myEduAns">
<input class="txtBxx" type="text" id="hscnm'.$hc.'" value="'.$hsc.'" placeholder="Name of High School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="hscplc'.$hc.'" value="'.$hsc_plc.'" placeholder="Location" style="color:black"/> </div>
</div>
';
  }
   echo '</div><input type="hidden" value="'.$hc.'" id="mtothsccnt"></div>';
}
$q="SELECT scl as scl,scl_plc as sp,scl_fromyr as sfr,scl_toyr as sto,scl_crs as scrs,scl_discr as sdis from scl_detail where user_id=$user_id ";
$r=mysqli_query($dbc,$q);
if($r)
{
  
  if(mysqli_num_rows($r)>0)
  {
    echo'<div class="myEduTtl">
School <div class="addNewEdu" onclick="addscl()"> + New School</div>
</div>
<div id="totsclcont">
';
    $scl=0;
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
{
  $scl=$scl+1;
    $scl_nm=$row['scl'];
    $scl_plc=$row['sp'];
    $scl_fromyr=$row['sfr'];
    $scl_toyr=$row['sto'];
    $scl_crs=$row['scrs'];
    $scl_discr=$row['sdis'];
    echo'
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" type="text" id="sclfrom'.$scl.'" value="'.$scl_fromyr.'" placeholder="From" />  -  <input class="txtBxx" type="text" id="sclto'.$scl.'" value="'.$scl_toyr.'" placeholder="To"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="sclcrs'.$scl.'" value="'.$scl_crs.'" placeholder="branch / course"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" id="sclgrp'.$scl.'" type="text" value="'.$scl_discr.'" placeholder="Title or description"/></div>

</div>
<div class="myEduAns">
<input class="txtBxx" id="sclnm'.$scl.'" type="text" value="'.$scl_nm.'" placeholder="Name of School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="sclplc'.$scl.'" value="'.$scl_plc.'" placeholder="Location" style="color:black" /> </div>
</div>
</div>
';
}


  }else
  {
    $scl=1;
        $scl_nm="";
    $scl_plc="";
    $scl_fromyr="";
    $scl_toyr="";
    $scl_crs="";
    $scl_discr="";
     echo'<div class="myEduTtl">
School <div class="addNewEdu" onclick="addscl()"> + New School</div>
</div>
<div id="totsclcont">
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" type="text" id="sclfrom'.$scl.'" value="'.$scl_fromyr.'" placeholder="From" />  -  <input class="txtBxx" type="text" id="sclto'.$scl.'" value="'.$scl_toyr.'" placeholder="To"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="sclcrs'.$scl.'" value="'.$scl_crs.'" placeholder="branch / course"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" id="sclgrp'.$scl.'" type="text" value="'.$scl_discr.'" placeholder="Title or description"/></div>

</div>
<div class="myEduAns">
<input class="txtBxx" id="sclnm'.$scl.'" type="text" value="'.$scl_nm.'" placeholder="Name of School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="sclplc'.$scl.'" value="'.$scl_plc.'" placeholder="Location" style="color:black" /> </div>
</div>
</div>
';
  }
  echo'</div><input type="hidden" value="'.$scl.'" id="mtotsclcnt">';
}
$maxaadvals=$scl+$hc+$cl;
echo'<input type="hidden" value="'.$maxaadvals.'" id="maxaadval">';
echo'

<div class="updateHolder" onclick="updateedu()">Update</div>

</div>
</div>
<input type="hidden" value="1" id="maxaadval">
<div class="myCurrentInfoOut" id="myFamilyHolder" >
<div class="profTypeTitle">Family</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="myEduTtl">
Parents
</div>
<div class="myEduItem">';
$q="SELECT f_name as fn,f_age as fg,f_edu as fe,f_ocup as fo,m_name as mn,m_age as mg,m_edu as me,m_ocup as mo from parent_details where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $f_name=$row['fn'];
      $f_age=$row['fg'];
      $f_edu=$row['fe'];
      $f_ocup=$row['fo'];

      $m_name=$row['mn'];
      $m_age=$row['mg'];
      $m_edu=$row['me'];
      $m_ocup=$row['mo'];
    }
  }else
  {
     $f_name="";
      $f_age="";
      $f_edu="";
      $f_ocup="";

      $m_name="";
      $m_age="";
      $m_edu="";
      $m_ocup="";
  }
}
echo'<div class="myEduSubTtl">
Father
</div>
<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"><input class="txtBxx" type="text" id="fthrnm" value="'.$f_name.'" style="width:250px;" placeholder="Name" /> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="fthrage" value="'.$f_age
.'" placeholder="Age" />  </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="fthredu" value="'.$f_edu.'" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="'.$f_ocup
.'" id="fthrocup" placeholder="occupation" /> </div>
</div>
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
Mother
</div>

<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"><input class="txtBxx" type="text" id="mthernm" value="'.$m_name
.'" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="mtherage" type="text" value="'.$m_age.'" placeholder="Age"/>  </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" type="text" id="mtheredu" value="'.$m_edu.'" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="'.$m_ocup.'"  id="mthrocup" placeholder="occupation" /> </div>
</div>
</div>

<div class="myEduTtl">
Siblings
</div>
';
$q="SELECT brthr_nm as bnm,brthr_age as bag,brthr_edu as bed,brthr_ocup as boc from brother where user_id=$user_id";

$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $bt=0;
    echo'<div id="totbrthrcont">';
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $bt=$bt+1;
      $br_nm=$row['bnm'];
      $br_age=$row['bag'];
      $br_edu=$row['bed'];
      $br_ocup=$row['boc'];
      echo'
<div class="myEduItem">

<div class="myEduSubTtl">
Brother <div class="addNewEdu" onclick="addbrthr()"> + New Person</div>
</div>

<div class="myEduAns" >
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="brthrnm'.$bt.'" type="text" value="'.$br_nm.'" style="width:250px;" placeholder="Name" /> </div><span class="divider" style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="brthrage'.$bt.'" value="'.$br_age.'" placeholder="Age"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="degree'.$bt.'" type="text" value="'.$br_edu.'" placeholder="Education"/></div><span class="divider" style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="occpn'.$bt.'" value="'.$br_ocup.'" placeholder="occupation"/></div>
</div>
</div>


';
    }
  }else
  {
    $bt=1;
     $br_nm="";
      $br_age="";
      $br_edu="";
      $br_ocup="";
         echo'<div id="totbrthrcont">
<div class="myEduItem">

<div class="myEduSubTtl">
Brother <div class="addNewEdu" onclick="addbrthr()"> + New Person</div>
</div>

<div class="myEduAns" >
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="brthrnm'.$bt.'" type="text" value="'.$br_nm.'" style="width:250px;" placeholder="Name" /> </div><span class="divider" style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="brthrage'.$bt.'" value="'.$br_age.'" placeholder="Age"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="degree'.$bt.'" type="text" value="'.$br_edu.'" placeholder="Education"/></div><span class="divider" style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="occpn'.$bt.'" value="'.$br_ocup.'" placeholder="occupation"/></div>
</div>
</div>


';
  }
  echo'<input type="hidden" value="'.$bt.'" id="mtotbrcnt"></div>';
}

 echo'<div id="totsiscont">';
$q21="SELECT sis_nm as bnm,sis_age as bag,sis_edu as bed,sis_ocup as boc from sister where user_id=$user_id";
$r21=mysqli_query($dbc,$q21);
if($r21)
{
  if(mysqli_num_rows($r21)>0)
  {
    $st=0;
   
    while($row=mysqli_fetch_array($r21,MYSQLI_ASSOC))
    {
      $st=$st+1;
      $sis_nm=$row['bnm'];
      $sis_age=$row['bag'];
      $sis_edu=$row['bed'];
      $sis_ocup=$row['boc'];
      echo'<div class="myEduItem">
<div class="myEduSubTtl">
Sister <div class="addNewEdu" onclick="addsist()"> + New Person</div>
</div>

<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="sisnm'.$st.'" type="text" value="'.$sis_nm.'" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="sisage'.$st.'" type="text" value="'.$sis_age.'" placeholder="Age"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" id="sisedu'.$st.'" type="text" value="'.$sis_edu.'" placeholder="Education" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="sisocp'.$st.'" value="'.$sis_ocup.'" placeholder="occupation" /> </div>
</div>
</div>
';
    }
  }else
  {

      $st=1;
      $sis_nm="";
      $sis_age="";
      $sis_edu="";
      $sis_ocup="";
      echo'<div class="myEduItem">
<div class="myEduSubTtl">
Sister <div class="addNewEdu" onclick="addsist()"> + New Person</div>
</div>

<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="sisnm'.$st.'" type="text" value="'.$sis_nm.'" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="sisage'.$st.'" type="text" value="'.$sis_age.'" placeholder="Age"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" id="sisedu'.$st.'" type="text" value="'.$sis_edu.'" placeholder="Education" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="sisocp'.$st.'" value="'.$sis_ocup.'" placeholder="occupation" /> </div>
</div>
</div>
';
  }
  echo'<input type="hidden" value="'.$st.'" id="mtotsiscnt"></div>';
}  
$totfamconunt=$st+$bt;
echo'<input type="hidden" id="totfamcont" value="'.$totfamconunt.'">';
echo'
<br/>
<div class="updateHolder" onclick="updtfml()">Update</div>


</div>
</div>
<div class="myCurrentInfoOut" id="myLocationHolder">
<div class="profTypeTitle">Location</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->';
$q="SELECT cloc as cloc,clofr as clofr,clocto as clocto,ploc as ploc,plocto as plocto,plocfr as plocfr ,nloc as nloc, nlocfr as nlocfr,nlocto as nlocto FROM addresses where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $cloc=$row['cloc'];
    $clocfr=$row['clofr'];
    $clocto=$row['clocto'];
    $ploc=$row['ploc'];
    $plocfr=$row['plocfr'];
    $plocto=$row['plocto'];
    $nloc=$row['nloc'];
    $nlocfr=$row['nlocfr'];
    $nlocto=$row['nlocto'];
   
  }else
  {
     $cloc="";
    $clocfr="";
    $clocto="";
    $ploc="";
    $plocfr="";
    $plocto="";
    $nloc="";
    $nlocfr="";
    $nlocto="";
  }
  
}
echo'
<div class="myCurInfoInner">
<div class="myEduTtl">
Current Address
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" type="text" value="'.$clocfr.'" id="clocfrm" placeholder="From" /> -  <input class="txtBxx" type="text" value="'.$clocto.'" id="cloctom" placeholder="To" /> </div>
</div>
<div class="myEduAns">
<input class="txtBxx" type="text" id="clocm" value="'.$cloc.'" style="width: 700px;color:navy" placeholder="address" />
</div>
</div>

<div class="myEduTtl">
Permanent address
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> <input id="plocfrm" class="txtBxx" type="text" value="'.$plocfr.'" placeholder="From"/> - <input id="ploctom" class="txtBxx" type="text" value="'.$plocto.'" placeholder="To"/> </div>  
</div>
<div class="myEduAns">
<input class="txtBxx" id="plocm" type="text" value="'.$ploc.'" style="width: 700px;color:navy;" placeholder="address"/>
</div>
</div>
<div class="myEduTtl">
Native Place
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> <input id="nlocfrm" class="txtBxx" type="text" value="'.$nlocfr.'" placeholder="From"/> - <input id="nloctom" class="txtBxx" type="text" value="'.$nlocto.'" placeholder="To"/> </div>  
</div>
<div class="myEduAns">
<input class="txtBxx" type="text" id="nlocm" value="'.$nloc.'" style="width: 700px;color:navy;" placeholder="address"/>
</div>
</div>



<div class="updateHolder" onclick="updtlocations()">Update</div>

</div>
</div>
<div class="myCurrentInfoOut" id="myRelationHolder" >
<div class="profTypeTitle">Relations</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="myEduTtl">
Total Number of Relations  -  190 <span class="shwMore" onclick="$(\'#moreForRelate\').slideToggle();">More</span>  <div class="myRelateMF">
<img src="icons/male.png" class="sf-icons" alt="male"/>837
<img src="icons/female.png" class="sf-icons30"  alt="female"/>324
</div>
<div id="moreForRelate" style="display: none">
<div class="moreItem">
Disconnected Relations - 24
</div>
<div class="moreItem">
Disconnected by - 24 people
</div>
<div class="moreItem">
Requests - 24 people
</div>
<div class="moreItem">
Proposals - 24
</div>

</div>
</div>
<table>

<tr>
<td>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead">No.of Friends </div><span class="divider"  style="color:darkgrey">-</span><div class="myEduSubHead" > 50</div>
</div>
<div class="myEduAns">
Friends  <!-- <div class="myRelateMF">
<img src="icons/male.png" class="sf-icons" alt="male"/>837
<img src="icons/female.png" class="sf-icons30"  alt="female"/>324
</div> -->
<div class="whoAreCommon" onmouseover="showComPeople(event,\'#comInFriends\')" onmouseout="$(\'#whoAreCommonNames\').hide()">
15 people in common
<span id="comInFriends" style="display: none">
Sankar <br/>
Hari <br/>
Vinil <br/>
Sankar <br/>
Hasjbri <br/>
Vijgvnil <br/>
Sanjgujkar <br/>
Harygi <br/>
Vingjil <br/>

</span>
</div>

</div>
</div>
</td>
<td>
<div class="myEduItem">

<div class="myEduSubTtl" >
<div class="myEduSubHead">No.of  Enemies </div><span class="divider"><span class="divider"  style="color:darkgrey">-</span></span><div class="myEduSubHead" > 30</div>
</div>
<div class="myEduAns">
Enemies  <!-- <div class="myRelateMF">
<img src="icons/male.png" class="sf-icons" alt="male"/>837
<img src="icons/female.png" class="sf-icons30"  alt="female"/>324
</div> -->
<div class="whoAreCommon" onmouseover="showComPeople(event,\'#comInFriends\')" onmouseout="$(\'#whoAreCommonNames\').hide()">
1 people in common
</div>
</div>
</div>
</td>
</tr>

<tr>
<td>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead">No.of  Classmates </div><span class="divider"  style="color:darkgrey">-</span><div class="myEduSubHead" > 30</div>
</div>
<div class="myEduAns">
Classmates  <!-- <div class="myRelateMF">
<img src="icons/male.png" class="sf-icons" alt="male"/>837
<img src="icons/female.png" class="sf-icons30"  alt="female"/>324
</div> -->
<div class="whoAreCommon" onmouseover="showComPeople(event,\'#comInFriends\')" onmouseout="$(\'#whoAreCommonNames\').hide()">
25 people in common
</div>
</div>
</div> 
</td>
<td>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead">No.of Unknown </div><span class="divider"  style="color:darkgrey">-</span><div class="myEduSubHead" > 20</div>
</div>
<div class="myEduAns">
Unknown <!-- <div class="myRelateMF">
<img src="icons/male.png" class="sf-icons" alt="male"/>837
<img src="icons/female.png" class="sf-icons30"  alt="female"/>324
</div> -->
<div class="whoAreCommon" onmouseover="showComPeople(event,\'#comInFriends\')" onmouseout="$(\'#whoAreCommonNames\').hide()">
No people in common
</div>
</div>
</div>
</td>
</table>

<div id="whoAreCommonNames" style="display: none">
<div id="commonNameArr"></div>
<div id="commonNameIn">
<span class="comNamItem"> Arulkumar </span><br/>
<span class="comNamItem"> Gokulkumar </span><br/>
<span class="comNamItem"> Arunkumar </span><br/>
</div>       
</div>






</div>
</div>
<div class="myCurrentInfoOut" id="aboutMe"> 
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
<div class="updateHolder" onclick="updtabtme()">Update</div>

</div>
</div>
<div class="ExpandMore">';
$q="SELECT number as f1,letter as f2,color as f3,actor as f4,actress as f5,movie as f6,sora as f7,place as f8,animal as f9,food as f10,field as f11,book as f12,game as f13,sportperson as f14,author as f15,tvshow as f16,cn as f17,miscdir as f18,filmdir as f19,cmdyactr as f20 from favorites where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r))
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    
 $f1=$row['f1'];
  $f2=$row['f2'];
  $f3=$row['f3'];
  $f4=$row['f4'];
  $f5=$row['f5'];
  $f6=$row['f6'];
  $f7=$row['f7'];
  $f8=$row['f8'];
  $f9=$row['f9'];
  $f10=$row['f10'];
  $f11=$row['f11'];
  $f12=$row['f12'];
  $f13=$row['f13'];
  $f14=$row['f14'];
  $f15=$row['f15'];
  $f16=$row['f16'];
  $f17=$row['f17'];
  $f18=$row['f18'];
  $f19=$row['f19'];
  $f20=$row['f20'];
  
  }else
  {
    $f1="";
  $f2="";
  $f3="";
  $f4="";
  $f5="";
  $f6="";
  $f7="";
  $f8="";
  $f9="";
  $f10="";
  $f11="";
  $f12="";
  $f13="";
  $f14="";
  $f15="";
  $f16="";
  $f17="";
  $f18="";
  $f19="";
  $f20="";
  }
}
$q="SELECT number as fr1,letter as fr2,color as fr3,actor as fr4,actress as fr5,movie as fr6,sora as fr7,place as fr8,animal as fr9,food as fr10,field as fr11,book as fr12,game as fr13,sportperson as fr14,author as fr15,tvshow as fr16,cn as fr17,miscdir as fr18,filmdir as fr19,cmdyactr as fr20 from fav_reason where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r))
  {
    $rowf=mysqli_fetch_array($r,MYSQLI_ASSOC);
  $fr1=$rowf['fr1'];
  $fr2=$rowf['fr2'];
  $fr3=$rowf['fr3'];
  $fr4=$rowf['fr4'];
  $fr5=$rowf['fr5'];
  $fr6=$rowf['fr6'];
  $fr7=$rowf['fr7'];
  $fr8=$rowf['fr8'];
  $fr9=$rowf['fr9'];
  $fr10=$rowf['fr10'];
  $fr11=$rowf['fr11'];
  $fr12=$rowf['fr12'];
  $fr13=$rowf['fr13'];
  $fr14=$rowf['fr14'];
  $fr15=$rowf['fr15'];
  $fr16=$rowf['fr16'];
  $fr17=$rowf['fr17'];
  $fr18=$rowf['fr18'];
  $fr19=$rowf['fr19'];
  $fr20=$rowf['fr20'];
  
  }else
  {
    $fr1="";
  $fr2="";
  $fr3="";
  $fr4="";
  $fr5="";
  $fr6="";
  $fr7="";
  $fr8="";
  $fr9="";
  $fr10="";
  $fr11="";
  $fr12="";
  $fr13="";
  $fr14="";
  $fr15="";
  $fr16="";
  $fr17="";
  $fr18="";
  $fr19="";
  $fr20="";
  }
}
echo'
<div class="ExpMoreInner" onclick="expandMyMore(\'#aboutMyFavs\',\'#arrowFav\')">
My Favorites
<div class="ExpandMoreArr" id="arrowFav" ></div>
</div>
</div>
<div class="myCurrentInfoOut" id="aboutMyFavs" style="display: none"> 
<div class="profTypeTitle">Favorites</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="profInfoItem">
<div class="profInfoTtle">
Number 
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" id="f1" value="'.$f1.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr1" value="'.$fr1.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Letter
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" value="'.$f2.'" id="f2" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr2" class="txtBxx" type="text" value="'.$fr2.'" placeholder="Any reason ?" /></div>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Color 
</div>

<div class="profInfoAns"><input class="txtBxx" type="text" value="'.$f3.'" id="f3" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr3" class="txtBxx" type="text" value="'.$fr3.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Actor
</div>
<div class="profInfoAns"><input id="f4" class="txtBxx" type="text" value="'.$f4.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr4" class="txtBxx" type="text" value="'.$fr4.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Actress
</div>
<div class="profInfoAns"><input id="f5" class="txtBxx" type="text" value="'.$f5.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr5" class="txtBxx" type="text" value="'.$fr5.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Movie
</div>
<div class="profInfoAns"><input id="f6" class="txtBxx" type="text" value="'.$f6.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr6" class="txtBxx" type="text" value="'.$f6.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Song | Album
</div>
<div class="profInfoAns"><input id="f7" class="txtBxx" type="text" value="'.$f7.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr7" value="'.$fr7.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Place
</div>
<div class="profInfoAns"><input id="f8" class="txtBxx" type="text" value="'.$f8.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr8" value="'.$fr8.'" placeholder="Any reason ?" /></div>
</div> 
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Animal
</div>
<div class="profInfoAns"><input id="f9" class="txtBxx" type="text" value="'.$f9.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr9" class="txtBxx" type="text" value="'.$fr9.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Food
</div>
<div class="profInfoAns"><input id="f10" class="txtBxx" type="text" value="'.$f10.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr10" class="txtBxx" type="text" value="'.$fr10.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Field
</div>
<div class="profInfoAns"><input id="f11" class="txtBxx" type="text" value="'.$f11.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr11" class="txtBxx" type="text" value="'.$fr11.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Book
</div>
<div class="profInfoAns"><input id="f12" class="txtBxx" type="text" value="'.$f12.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr12" class="txtBxx" type="text" value="'.$fr12.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Game
</div>
<div class="profInfoAns"><input id="f13" class="txtBxx" type="text" value="'.$f13.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr13" class="txtBxx" type="text" value="'.$fr13.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Sports Person
</div>
<div class="profInfoAns"><input id="f14" class="txtBxx" type="text" value="'.$f14.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr14" class="txtBxx" type="text" value="'.$fr14.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Author
</div>
<div class="profInfoAns"><input id="f15" class="txtBxx" type="text" value="'.$f15.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr15" class="txtBxx" type="text" value="'.$fr15.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
TV Show
</div>
<div class="profInfoAns"><input id="f16" class="txtBxx" type="text" value="'.$f16.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr16" class="txtBxx" type="text" value="'.$fr16.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Cartoon
</div>
<div class="profInfoAns"><input id="f17" class="txtBxx" type="text" value="'.$f17.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr17" class="txtBxx" type="text" value="'.$fr17.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Musician
</div>
<div class="profInfoAns"><input id="f18" class="txtBxx" type="text" value="'.$f18.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr18" class="txtBxx" type="text" value="'.$fr18.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Film Director
</div>
<div class="profInfoAns"><input id="f19" class="txtBxx" type="text" value="'.$f19.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr19" class="txtBxx" type="text" value="'.$fr19.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">

<div class="profInfoTtle">
Comedy Actor
</div>
<div class="profInfoAns"><input id="f20" class="txtBxx" type="text" value="'.$f20.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr20" value="'.$fr20.'" placeholder="Any reason ?" /></div>
</div>

</div>

<br/>
<div class="updateHolder"onclick="updtfavdet()">Update</div>

</div>
</div>';
$q="SELECT number as f1,letter as f2,color as f3,actor as f4,actress as f5,movie as f6,sora as f7,place as f8,animal as f9,food as f10,field as f11,book as f12,game as f13,sportperson as f14,author as f15,tvshow as f16,cn as f17,miscdir as f18,filmdir as f19,cmdyactr as f20 from annoying where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r))
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    
 $f1=$row['f1'];
  $f2=$row['f2'];
  $f3=$row['f3'];
  $f4=$row['f4'];
  $f5=$row['f5'];
  $f6=$row['f6'];
  $f7=$row['f7'];
  $f8=$row['f8'];
  $f9=$row['f9'];
  $f10=$row['f10'];
  $f11=$row['f11'];
  $f12=$row['f12'];
  $f13=$row['f13'];
  $f14=$row['f14'];
  $f15=$row['f15'];
  $f16=$row['f16'];
  $f17=$row['f17'];
  $f18=$row['f18'];
  $f19=$row['f19'];
  $f20=$row['f20'];
  
  }else
  {
    $f1="";
  $f2="";
  $f3="";
  $f4="";
  $f5="";
  $f6="";
  $f7="";
  $f8="";
  $f9="";
  $f10="";
  $f11="";
  $f12="";
  $f13="";
  $f14="";
  $f15="";
  $f16="";
  $f17="";
  $f18="";
  $f19="";
  $f20="";
  }
}
$q="SELECT number as fr1,letter as fr2,color as fr3,actor as fr4,actress as fr5,movie as fr6,sora as fr7,place as fr8,animal as fr9,food as fr10,field as fr11,book as fr12,game as fr13,sportperson as fr14,author as fr15,tvshow as fr16,cn as fr17,miscdir as fr18,filmdir as fr19,cmdyactr as fr20 from annoy_reason where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r))
  {
    $rowf=mysqli_fetch_array($r,MYSQLI_ASSOC);
  $fr1=$rowf['fr1'];
  $fr2=$rowf['fr2'];
  $fr3=$rowf['fr3'];
  $fr4=$rowf['fr4'];
  $fr5=$rowf['fr5'];
  $fr6=$rowf['fr6'];
  $fr7=$rowf['fr7'];
  $fr8=$rowf['fr8'];
  $fr9=$rowf['fr9'];
  $fr10=$rowf['fr10'];
  $fr11=$rowf['fr11'];
  $fr12=$rowf['fr12'];
  $fr13=$rowf['fr13'];
  $fr14=$rowf['fr14'];
  $fr15=$rowf['fr15'];
  $fr16=$rowf['fr16'];
  $fr17=$rowf['fr17'];
  $fr18=$rowf['fr18'];
  $fr19=$rowf['fr19'];
  $fr20=$rowf['fr20'];
  
  }else
  {
    $fr1="";
  $fr2="";
  $fr3="";
  $fr4="";
  $fr5="";
  $fr6="";
  $fr7="";
  $fr8="";
  $fr9="";
  $fr10="";
  $fr11="";
  $fr12="";
  $fr13="";
  $fr14="";
  $fr15="";
  $fr16="";
  $fr17="";
  $fr18="";
  $fr19="";
  $fr20="";
  }
}
echo'
<div class="ExpandMore">
<div class="ExpMoreInner" onclick="expandMyMore(\'#aboutMyAnnoys\',\'#arrowHate\')">
My Hates
<div class="ExpandMoreArr" id="arrowHate" ></div>
</div>
</div>
<div class="myCurrentInfoOut" id="aboutMyAnnoys"  style="display: none"> 
<div class="profTypeTitle">Annoying</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="profInfoItem">
<div class="profInfoTtle">
Number 
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" id="a1" value="'.$f1.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="ar1" value="'.$fr1.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Letter
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" value="'.$f2.'" id="a2" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar2" class="txtBxx" type="text" value="'.$fr2.'" placeholder="Any reason ?" /></div>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Color 
</div>

<div class="profInfoAns"><input class="txtBxx" type="text" value="'.$f3.'" id="a3" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar3" class="txtBxx" type="text" value="'.$fr3.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Actor
</div>
<div class="profInfoAns"><input id="a4" class="txtBxx" type="text" value="'.$f4.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar4" class="txtBxx" type="text" value="'.$fr4.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Actress
</div>
<div class="profInfoAns"><input id="a5" class="txtBxx" type="text" value="'.$f5.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar5" class="txtBxx" type="text" value="'.$fr5.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Movie
</div>
<div class="profInfoAns"><input id="a6" class="txtBxx" type="text" value="'.$f6.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar6" class="txtBxx" type="text" value="'.$f6.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Song | Album
</div>
<div class="profInfoAns"><input id="a7" class="txtBxx" type="text" value="'.$f7.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="ar7" value="'.$fr7.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Place
</div>
<div class="profInfoAns"><input id="a8" class="txtBxx" type="text" value="'.$f8.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="ar8" value="'.$fr8.'" placeholder="Any reason ?" /></div>
</div> 
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Animal
</div>
<div class="profInfoAns"><input id="a9" class="txtBxx" type="text" value="'.$f9.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar9" class="txtBxx" type="text" value="'.$fr9.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Food
</div>
<div class="profInfoAns"><input id="a10" class="txtBxx" type="text" value="'.$f10.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar10" class="txtBxx" type="text" value="'.$fr10.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Field
</div>
<div class="profInfoAns"><input id="a11" class="txtBxx" type="text" value="'.$f11.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar11" class="txtBxx" type="text" value="'.$fr11.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Book
</div>
<div class="profInfoAns"><input id="a12" class="txtBxx" type="text" value="'.$f12.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar12" class="txtBxx" type="text" value="'.$fr12.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Game
</div>
<div class="profInfoAns"><input id="a13" class="txtBxx" type="text" value="'.$f13.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar13" class="txtBxx" type="text" value="'.$fr13.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Sports Person
</div>
<div class="profInfoAns"><input id="a14" class="txtBxx" type="text" value="'.$f14.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar14" class="txtBxx" type="text" value="'.$fr14.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Author
</div>
<div class="profInfoAns"><input id="a15" class="txtBxx" type="text" value="'.$f15.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar15" class="txtBxx" type="text" value="'.$fr15.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
TV Show
</div>
<div class="profInfoAns"><input id="a16" class="txtBxx" type="text" value="'.$f16.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar16" class="txtBxx" type="text" value="'.$fr16.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Cartoon
</div>
<div class="profInfoAns"><input id="a17" class="txtBxx" type="text" value="'.$f17.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar17" class="txtBxx" type="text" value="'.$fr17.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Musician
</div>
<div class="profInfoAns"><input id="a18" class="txtBxx" type="text" value="'.$f18.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar18" class="txtBxx" type="text" value="'.$fr18.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Film Director
</div>
<div class="profInfoAns"><input id="a19" class="txtBxx" type="text" value="'.$f19.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="ar19" class="txtBxx" type="text" value="'.$fr19.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">

<div class="profInfoTtle">
Comedy Actor
</div>
<div class="profInfoAns"><input id="a20" class="txtBxx" type="text" value="'.$f20.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="ar20" value="'.$fr20.'" placeholder="Any reason ?" />
</div>

</div>

</div>

<br/>
<div class="updateHolder" onclick="updtanndet()">Update</div>

</div>





</div>

<div class="ExpandMore">
<div class="ExpMoreInner" onclick="expandMyMore(\'#myGadgHolder\',\'#arrowGadg\')">
My Gadgets & Belongings
<div class="ExpandMoreArr" id="arrowGadg" ></div>
</div>
</div>
<div class="myCurrentInfoOut" id="myGadgHolder"  style="display: none">
<div class="profTypeTitle">Gadgets & Belongings</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">';
$q="SELECT mob_brand as mb,mob_network1 as mn,mob_no as mno,mob_os as mos from mobile where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $mob=$row['mb'];
    $mob_sim=$row['mn'];
    $mob_no=$row['mno'];
    $mob_os=$row['mos'];
  }else
  {
     $mob="";
    $mob_sim="";
    $mob_no="";
    $mob_os="";
  }
}
echo '
<div class="myEduTtl">
Mobile
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Personal </div>
</div>
<div class="myEduAns"><input class="txtBxx" id="mob_no" type="text" value="'.$mob_no.'" placeholder="Mobile Number"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" id="sim" type="text" value="'.$mob_sim.'" placeholder="Mobile Network" /> </div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" id="mbrand" type="text" value="'.$mob.'" placeholder="Mobile Brand & Model No"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" id="mob_os" type="text" value="'.$mob_os.'" placeholder="Operating System"/></div>
</div>
</div>';
$q="SELECT lap_barnd as lb,lap_model as lm,lap_os1 as los1,lap_os2 as los2,lap_color as lc from laptop where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $lap=$row['lb'];
    $lap_model=$row['lm'];
    $lap_os1=$row['los1'];
    $lap_os2=$row['los2'];
    $lap_color=$row['lc'];


  }else
  {
       $lap="";
    $lap_model="";
    $lap_os1="";
    $lap_os2="";
    $lap_color="";
  }

}
echo '<div class="myEduTtl">
PC
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Laptop </div>
</div>
<div class="myEduAns"><input class="txtBxx" type="text" id="lbrand" value="'.$lap.'" placeholder="Brand / Company " /> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="lmodel_no" class="txtBxx" type="text" value="'.$lap_model.'" placeholder="Model No" /></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="lcolor" class="txtBxx" type="text" value="'.$lap_color.'" placeholder="color"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="los1" class="txtBxx" 
type="text" value="'.$lap_os1.'" placeholder="Operating System 1"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="los2" class="txtBxx" type="text" value="'.$lap_os2.'" placeholder="Operating System 2"/></div>
</div>
</div>
';
$q="SELECT bike_model as bm,bike_no as bno,bike_color as bcl,car_model as cm,car_no as cno,car_color as ccl from vehicles where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $bike_model=$row['bm'];
    $bike_no=$row['bno'];
    $bike_color=$row['bcl'];
    $car_model=$row['cm'];
    $car_no=$row['cno'];
    $car_color=$row['ccl'];
  }else
  {
     $bike_model="";
    $bike_no="";
    $bike_color="";
    $car_model="";
    $car_no="";
    $car_color="";
  }
}
echo'
<div class="myEduTtl">
Vehicle
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Bike </div>
</div>
<div class="myEduAns"><input class="txtBxx" type="text" value="'.$bike_model.'" id="bikebrand" placeholder="Brand / Company"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="bikeno" class="txtBxx" type="text" value="'.$bike_no.'" placeholder="Registration No"/></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="bikecolor" class="txtBxx" type="text" value="'.$bike_color.'" placeholder="color"/></div>
</div>
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Car </div>
</div>
<div class="myEduAns"><input id="carbrand" class="txtBxx" type="text" value="'.$car_model.'" placeholder="Brand / Company"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="carno" class="txtBxx" type="text" value="'.$car_no.'" placeholder="Registration No"/></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="carcolor" class="txtBxx" type="text" value="'.$car_color.'" placeholder="color"/></div>
</div>
</div>


<br/>
<div class="updateHolder" onclick="updatvhcl()">Update</div>


</div>
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
<div class="ExpandMore">
<div class="ExpMoreInner" onclick="expandMyMore(\'#aboutEverything\',\'#arrowAbout\')">
About
<div class="ExpandMoreArr" id="arrowAbout" ></div>
</div>
</div>
<div class="myCurrentInfoOut" id="aboutEverything"  style="display: none"> 
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
<div class="updateHolder" onclick="updtabt()">Update</div>



</div>
</div><a href="../users/'.$_SESSION['user_name'].'">
<div id="FinishAllEdit">
Finish Editing
</div></a>

                        <div class="EnoghSkipBtn">
                            Enough ,I\'ll fill later
                            
                        </div>
</div>

</div>


</div>
<div id="proposeHelpWindow" class="helpWindowOut">
<div id="helpWinTitle">? &nbsp;&nbsp;Help &nbsp;&nbsp;- &nbsp;&nbsp;Proposal<div id="closeHelpWindow" onclick="$(\'#proposeHelpWindow\').slideUp()">X</div></div>
<div id="HelpWindowInCont">
<div id="helpInnerTitle" >Brave</div>
<div id="helpContentItem">'.$my_name.' will get direct notification that you proposed him <br/>And if he accepts you will receive a notification with his message</div>

<div id="helpInnerTitle">Secret & Smart</div>
<div id="helpContentItem">'.$my_name.' will not get any notification but when he also tries to propose you , <br> Both of you receive notification</div>




</div>
</div>
<div id="verifyHelpWindow" class="helpWindowOut" >
<div id="helpWinTitle">? &nbsp;&nbsp;Help &nbsp;&nbsp;- &nbsp;&nbsp;Profile Verification<div id="closeHelpWindow" onclick="$(\'#verifyHelpWindow\').slideUp()">X</div></div>
<div id="HelpWindowInCont">
<div id="helpInnerTitle" >Verification</div>
<div id="helpContentItem">A person needs to be verified by minimum five people who already been verified</div>

<div id="helpContentItem">A person can verify himself by making a phone call to sedfed customer care</div>

<div id="helpInnerTitle">Reporting Fake Profile</div>
<div id="helpContentItem">Any verified person can report a person as fake <br/> On reporting we take steps for verification </div>

<div id="helpContentItem">If any person fails to proper profile verification within 90 days his profile will be freezed</div>

<div id="helpInnerTitle">Freezing Profile</div>
<div id="helpContentItem">He / She can access his account but cannot do any responses like messaging,request,like/unlike/rate/share posts till profile is verified</div>




</div>
</div>
<div class="instantAlert">
<div class="insAlertInr">
<div id="insAlertCont">

</div>
</div>
</div>

</div>
</body>
</html>';
}
?>