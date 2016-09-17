
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
     unset($_SESSION['change_path_prof']);
    require 'mysqli_connect.php';
    $q="select first_name as f from basic where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $first_name=$row['f'];
           }else
           {
	  $first_name=="";
           }
    }
    $today = date("g:i a ,F j, Y"); 
    		 
    $q="update person_config set profile_update='$today' where user_id=$user_id";
    mysqli_query($dbc, $q);
    $q12="select mythink as m from status where user_id=$user_id order by think_id desc limit 1";
$r1=mysqli_query($dbc,$q12);
if($r1)
{
if(mysqli_num_rows($r1)>0)
{
  $row8=mysqli_fetch_array($r1,MYSQLI_ASSOC);
$mystatus=$row8['m'];
}else
{
$mystatus="";
}
}
$status=$mystatus;
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
$q="select image as img from status_image where user_id=$user_id order by sts_img desc";
$r=mysqli_query($dbc,$q);
if($r)
{
    if(mysqli_num_rows($r)>0)
    {
        $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
        $sts_img=$row['img'];
        
    }else
    {
        $sts_img="";
    }
}
$q="select position as p,orany as orn,nmoforg as org from cur_position where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(!empty($row=mysqli_fetch_array($r,MYSQLI_ASSOC)))
  {
    $position=$row['p'];
    $anyothr=$row['orn'];
    $org=$row['org'];
    
  }else
  {
    $position="";
    $anyothr="";
    $org="";
  
  }
}
$q="select bgm as b from sts_bgm where user_id=$user_id order by bgm_id desc";
$r=  mysqli_query($dbc, $q);
if($r)
{
    if(mysqli_num_rows($r)>0)
    {
        $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
        $sts_bgm=$row['b'];
        
    }else
    {
        $sts_bgm="";
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
    <link rel="stylesheet" href="'.$_SESSION['css'].'editprofile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpprofile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpEdus.css"/>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
        <br/><br/><br/><br/><br/><br/>
<div class="profTypeTitle">Current</div>

<div class="myCurInfoInner">
<div class="StatusImg">
<img id="stsImg" src="'.$sts_img.'" />
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font ><input id="inp_status" class="txtBxx" type="text" value="'.$mystatus.'" onfocus="$(\'#ThStatus\').fadeIn();$(\'#inp_thsts\').focus();" placeholder="what do you think"/>
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
echo'
<div class="profInfoItem">
<div class="profInfoTtle">
Mood 
</div>
<div class="profInfoAns">
<input id="inp_mood" class="txtBxx" type="text" value="'.$mood.'" style="width: 150px;" onfocus="$(\'#thtrMood\').fadeIn();$(\'#inp_thtrMood\').focus();" placeholder="feeling" /><span style="color:grey" >&nbsp; with</span><span id="moodWith"><input id="inp_moodWith" class="txtBxx" type="text" value="'.$moodwith.'" style="width: 200px;color:crimson" onfocus="$(\'#thtrMood\').fadeIn();$(\'#inp_thtrMoodWith\').focus();" placeholder="this person"/> </span>
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
<div class="profInfoTtle">
BGM
</div>
<div class="profInfoAns">
<audio src="'.$sts_bgm.'" controls ></audio>
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
<input type="file" name="statusimage" id="stsimg" onchange="updtstsimg(this)" style="display:none">
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

                    
                             <div class="pageBottomProceeds">
                               <a href="globe.php"> <div class="updateHolder" id="nextBtn" onclick="updateedu()">Finish</div></a>
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
include '../web/notifs.html';
}