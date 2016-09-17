
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
       $user_id=$_SESSION['user_id'];
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

                      <font id="sedfedUserName" >Vijayakumar</font>

                    </div>
                     <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >Edit profile</font>

                    </div>

                </div>
            <div id="innerPageCont">
               
                                
              
                <div id="sf-profileHolder" >
                    <div class="wallPaperOuter" style="background-image: url(\'icons/test-wallpaper.jpeg\');" >
                        <div class="sf_NameOnWall">Vijayakumar</div>
                    </div>
                    <div class="profPicOuter">
                        <img src="profileimg.PNG" />
                    </div>
                    <div id="innerProfile" onmouseover="meOnProfile()" >
                        <div id="OverallPictureChange">
                            
                            <div class="OPC_ItmBtn">
                                Update Profile Picture
                            </div>
                            
                            <div class="OPC_ItmBtn">
                                Update Wallpaper
                            </div>
                            
                            <div class="OPC_ItmBtn">
                                Update BGM
                            </div>
                            
                            <div class="OPC_ItmBtn">
                                Profile Settings
                            </div>
                        </div>
                        <div id="myFirstAppear">
                          
                           
                            
                            <div id="myFirstDetails">
                                <div id="firDetInner">
                                    <div id="firDetContainer">
                                        <div class="firDetTtl">I\'m    
                                        </div>
                                         <div class="firDetCont" style="color:crimson;font-size: 20px;">
                                             <input class="txtBxx" id="inp_Name" onclick="$(\'#ThName\').fadeIn();$(\'#inp_thName\').focus();" type="text" value="Vijayakumar" style="color:crimson;font-size: 20px;" placeholder="First Name"/>
                                            </div>
                                        <div class="firDetCont" style="color:gray;font-size: 14px;" ><div class="QT"> Otherwise known as </div><input class="txtBxx" id="inp_NickName" onclick="$(\'#ThNickName\').fadeIn();$(\'#inp_thNickName\').focus();" type="text" value="VJ" placeholder="Nick Name" style="color:crimson;font-size: 19px;"/></div>
                                        <div class="firDetCont">
                                            <div class="QT"> Gender </div>
                                            <select>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div class="firDetCont">
                                            <div class="QT"> Born On </div><input style="display: none;"  onclick="$(\'#ThAge\').fadeIn();" id="inp_Age" class="txtBxx" type="text" value="18" placeholder="Age"/> <div class="firDetContEx" style="color:gray"><input  onclick="$(\'#ThAge\').fadeIn();" id="inp_DOB" class="txtBxx" type="text" value="10 Jul 1996" placeholder="Birth Date"/></div></div>
                                      
                                       
                                    
                                        <div class="firDetCont" >
                                         
                                              <div class="QT"> Relationship Status </div>
                                          
                                            <input class="txtBxx" id="inp_relsts" onclick="$(\'#thtrRelSts\').fadeIn();" type="text" value="unmarried" placeholder="Relationship Status"/><div class="firDetContEx"  style="color:gray;display: none;">With <div class="firDetCont"   style="color:crimson;font-size: 19px;margin-top: -1px;display: none"><input id="inp_relstsWith" class="txtBxx" type="text" value="VJ" style="color:crimson;font-size: 19px;width: 175px;display: none" onclick="$(\'#thtrRelSts\').fadeIn();$(\'#inp_thtrRelWith\').focus();" placeholder="Name of person"/></div></div>
                                            
                                          </div>
                                       
                                            <div class="firDetCont" style="color:gray;"><div class="QT"> Living in </div><input id="inp_Flocate" class="txtBxx" type="text" value="India,Tamilnadu" placeholder="I\'m living in" onclick="$(\'#ThLocate\').fadeIn();$(\'#inp_thLocate\').focus();"/></div>
                                          <div class="firDetCont">  </div>
                                    </div>
                                    <div class="firProudOf">
                                        <div class="FPO_Ttl"> Proud Of </div>
                                        <div class="FPO_Itm">
                                            <div class="FPO_Tip">
                                                I am 
                                            </div>
                                            <input class="txtBxx" id="inp_IamA" onclick="$(\'#ThIamA\').fadeIn();$(\'#inp_thIamA\').focus();" type="text" value="Indian" placeholder="I am a "/>
                                        </div>
                                        <div class="FPO_Itm">
                                            <div class="FPO_Tip">
                                                Want to become as
                                            </div>
                                            <input type="text" class="txtBxx"  placeholder="aim/ambition" />
                                        </div>
                                        <div class="FPO_Itm">
                                            <div class="FPO_Tip">
                                               Role Model
                                            </div>
                                            <input type="text"  class="txtBxx"  placeholder="My Role model" />
                                        </div>
                                        <div class="FPO_Itm">
                                            <div class="FPO_Tip">
                                               Quote
                                            </div>
                                            <input type="text"  class="txtBxx"  placeholder="My Quote" />
                                        </div>
                                    </div>
                                    <div class="theaterTexts" id="ThName" style="display: none">
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                   My name <div class="thtrTxtClose" onclick="$(\'#ThName\').fadeOut()" >X</div>
                                               </div>
                                               <div class="thtrCont">
                                                   <input oninput="thtrInput(\'#inp_thName\',\'#inp_Name\')" class="thtrTxtInp" id="inp_thName" type="text" placeholder="My name is" value="Vijayakumar" />
                                                   <div class="thtrprevCont">
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Vijayakumar
                                                   </div>
                                                   <div class="thtrPrcd">
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
                                                   <div class="thtrPrcd">
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
                                                   <input oninput="thtrInput(\'#inp_thNickName\',\'#inp_NickName\')" class="thtrTxtInp" id="inp_thNickName" type="text" placeholder="My Nick Name" value="VJ" />
                                                   <div class="thtrprevCont">
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; VJ
                                                   </div>
                                                   <div class="thtrPrcd">
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
                                                       <select id="inpTh_Date" onclick="dateSelect(\'#inpTh_Date\')" onchange="ageInp()"  >
                                                       <option>
                                                           10
                                                       </option>
                                                       
                                                      
                                                   </select>
                                                   </div>
                                                   <div class="thtrSlctItm">
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
                                                       <select id="Th_ageYear" onchange="ageInp()" onclick="yearSelect(\'#Th_ageYear\')" >
                                                           <option>1996</option>
                                                      
                                                   </select>
                                                   </div>
                                                   
                                                   <div class="thtrprevCont">
                                                     Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; 10 Jul 1996 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; 18 +
                                                </div>
                                                   <div class="thtrPrcd">
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
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; India,Tamilnadu
                                                   </div>
                                                   <div class="thtrPrcd">
                                                       Update
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
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Indian
                                                   </div>
                                                   <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E.g Nationality,Character whatever<br/><br/>
                                                   <div class="thtrPrcd">
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
                                                  &nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;
                                                   <div class="thtrRelwith">
                                                       <input id="inp_thtrRelSts" class="thtrTxtInp" type="text" placeholder="Any Other" oninput="thtrInput(\'#inp_thtrRelSts\',\'#inp_relsts\')" />  With
                                                       <input id="inp_thtrRelWith" class="thtrTxtInp" type="text" placeholder="Relation with this person"  oninput="thtrInput(\'#inp_thtrRelWith\',\'#inp_relstsWith\')"/>
                                                      
                                                       
                                                   
                                                   </div>
                                                   </div>
                                                   <div class="thtrprevRelCont">
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Unmarried
                                                   </div>
                                                   <div class="thtrPrcd">
                                                       Update
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                  
                                   
                                    
                                </div>
                                <div class="heyYoyThereTt" id="hYT-Tt-Contact" style="display: none" >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="hYT-Item">Mobile  <div class="hYT-ans"><input class="txtBxx" type="text" value="9790394167"/></div></div>
                                            <div class="hYT-Item">Email ID <div class="hYT-ans"><input class="txtBxx" type="text" value="vijirobotic@gmail.com"/></div></div>
                                            <div class="hYT-Item">Blog / Website <div class="hYT-ans"><input class="txtBxx" type="text" value="www.sedfed.com/yesiamvj"/></div></div>
                                            <div class="hYT-Item">Message  <div class="hYT-ans">Vijayakumar</div></div>
                                            <div class="updateTts">Update</div>
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
                                                         Sakthikanth <br/>
                                                         Kirubakaran <br/>
                                                         YogeshWaran <br/>
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
                                    <img id="img-makeRelation" src="icons/notif-add-ppl.png" alt="contact" onclick="addToRelation()" onmouseover="showMyExtraTip(\'#hYT-Tt-AddRel\',event)" onmouseout="$(\'#hYT-Tt-AddRel\').hide()"/><br/>
                                    <img src="icons/prof-love.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Propose\',event)"/><br/>
                                    <img class="hyticos" src="icons/prof-statis.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Stats\',event)"/><br/>
                                    <img id="img-avlothana" class="hyticos" src="icons/prof-avlothana.png" alt="contact" onclick="showAvlothana()" /><br/>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="myCurrentInfoOut" id="currentInfo"> 
                            <div class="profTypeTitle">Current <div id="amIalive" style="color:green">  online</div></div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                <div class="StatusImg">
                                    <img id="stsImg" src="icons/test-smiley.png" />
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status
                                    </div>
                                    <div class="profInfoAns">
                                        <input id="inp_status" class="txtBxx" type="text" value="Just programming for Sedfed" onfocus="$(\'#ThStatus\').fadeIn();$(\'#inp_thsts\').focus();" placeholder="what do you think"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Mood 
                                    </div>
                                    <div class="profInfoAns">
                                        <input id="inp_mood" class="txtBxx" type="text" value="Happy" style="width: 150px;" onfocus="$(\'#thtrMood\').fadeIn();$(\'#inp_thtrMood\').focus();" placeholder="feeling" /><span style="color:grey" >&nbsp; with</span><span id="moodWith"><input id="inp_moodWith" class="txtBxx" type="text" value="Rajkumar" style="width: 200px;color:crimson" onfocus="$(\'#thtrMood\').fadeIn();$(\'#inp_thtrMoodWith\').focus();" placeholder="this person"/> </span>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Location
                                    </div>
                                    <div class="profInfoAns">
                                        <input class="txtBxx" type="text" value="Chennai,Tamilnadu"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Position 
                                    </div>
                                    <div class="profInfoTtle">
                                        <span class="divider"  style="color:grey">|</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="inp_CurPos" class="txtBxx" type="text" value="Student"  onfocus="$(\'#thtrCurpos\').fadeIn()" />
                                    </div>
                                    <div class="profInfoAns">
                                        <input id="inp_curPosWith" class="txtBxx" type="text" value="College Of Engineering Guindy" onfocus="$(\'#thtrCurpos\').fadeIn();$(\'#inp_thtrPosWith\').focus()" placeholder="Organisation" />
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
                                                   <table>
                                                       <tr>
                                                           <td>
                                                              <div class="ThstatusImg">
                                                       <div> Add an Image / Video </div>
                                                   </div> 
                                                           </td>
                                                           <td>
                                                             <div class="thtrStsInps">
                                                                 <input id="inp_thsts" class="thtrTxtInp" type="text" placeholder="What do you think now " value="progremming for SedFed" oninput="thtrInput(\'#inp_thsts\',\'#inp_status\')"/>
                                                                 <input type="color" id="th_stsclrinp" style="display: none;" onchange="stsClrChnge()" />
                                                                 <div id="th_stsclr" onclick="document.getElementById(\'th_stsclrinp\').click()"  ><img src="icons/chooseColor.png" alt="color"/></div>
                                                        <div id="th_addStsFile">Add Audio</div>
                                                   </div>
                                                           </td>
                                                       </tr>
                                                       
                                                   </table>
                                                   
                                                  
                                                   <div class="thtrprevCont">
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Just programming for SedFed
                                                   </div>
                                                   <br/><br/>
                                                   <div class="thtrPrcd">
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
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; College of Engineering Guindy,Anna University
                                                   </div>
                                                   <div class="thtrPrcd">
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
                                                       Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Unmarried
                                                   </div>
                                                   <div class="thtrPrcd">
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
                                     College <div class="addNewEdu"> + New College</div>
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"><input class="txtBxx" type="text" value="2013" placeholder="From"/> -  <input class="txtBxx" type="text" value="Till Now" placeholder="To" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" value="B.E -Electrical and Electronics Engineering" placeholder="branch / course"/> </div> <span class="divider"  style="color:darkgrey">  |</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" value="My College" placeholder="Title or description"/></div>
                                    </div>
                                    <div class="myEduAns">
                                        <input class="txtBxx" type="text" value="College Of Engineering Guindy ,Anna University" placeholder="Name of College"/>
                                        <div class="myOrgLocate"><input class="txtBxxTtl" type="text" value="Chennai" placeholder="Location" style="color:black"/> </div>
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    High School <div class="addNewEdu"> + New H.Schol</div>
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> <input class="txtBxx" type="text" value="2010" placeholder="From" /> - <input class="txtBxx" type="text" value="2013" placeholder="To"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" value=" Till + 2" placeholder="branch / course"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" value="  Bio-Maths Tamil Medium" placeholder="Title or description"/> </div>
                                    </div>
                                    <div class="myEduAns">
                                        <input class="txtBxx" type="text" value="Vidhya Nikethan Mat.Hr.Sec.School" placeholder="Name of High School"/>
                                        <div class="myOrgLocate"><input class="txtBxxTtl" type="text" value="Namakkal" placeholder="Location" style="color:black"/> </div>
                                    </div>
                                </div>
                                 <div class="myEduTtl">
                                    School <div class="addNewEdu"> + New School</div>
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"><input class="txtBxx" type="text" value="2001" placeholder="From" />  -  <input class="txtBxx" type="text" value="2010" placeholder="To"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" value="Till SSLC" placeholder="branch / course"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" value="  Bio-Maths Tamil Medium" placeholder="Title or description"/></div>
                                    
                                    </div>
                                    <div class="myEduAns">
                                        <input class="txtBxx" type="text" value="Gandhi Kalvi Nilayam ,Thengalpalayam" placeholder="Name of School"/>
                                        <div class="myOrgLocate"><input class="txtBxxTtl" type="text" value="Rasipuram" placeholder="Location" style="color:black" /> </div>
                                    </div>
                                </div>
                               
                                
                                <div class="updateHolder">Update</div>
                                
                            </div>
                        </div>
                        <div class="myCurrentInfoOut" id="myFamilyHolder" >
                            <div class="profTypeTitle">Family</div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                    Parents
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        Father
                                    </div>
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"><input class="txtBxx" type="text" value=" Manickam" style="width:250px;" placeholder="Name" /> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" value=" 40" placeholder="Age" />  </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" value=" Mason" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="Mason" placeholder="occupation" /> </div>
                                    </div>
                                </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        Mother
                                    </div>
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"><input class="txtBxx" type="text" value=" Bharathi" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" value=" 35" placeholder="Age"/>  </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" type="text" value="House Wife" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="Mason" placeholder="occupation" /> </div>
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    Siblings
                                    </div>
                                 <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        Brother <div class="addNewEdu"> + New Person</div>
                                    </div>
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" type="text" value="Sathiskumar" style="width:250px;" placeholder="Name" /> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" value="22" placeholder="Age"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" type="text" value="BCA" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="Mason" placeholder="occupation" /> </div>
                                    </div>
                                </div>
                                
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        Sister <div class="addNewEdu"> + New Person</div>
                                    </div>
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" type="text" value="Ajithkumar" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" value="15" placeholder="Age"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" type="text" value="+ 1" placeholder="Education" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="Mason" placeholder="occupation" /> </div>
                                    </div>
                                </div>
                               <br/><br/>
                                 <div class="updateHolder">Update</div>
                               
                                
                            </div>
                        </div>
                         <div class="myCurrentInfoOut" id="myLocationHolder">
                            <div class="profTypeTitle">Location</div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                    Current Address
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"><input class="txtBxx" type="text" value=" 2013" placeholder="From" /> -  <input class="txtBxx" type="text" value="Till Now" placeholder="To" /> </div>
                                    </div>
                                    <div class="myEduAns">
                                        <input class="txtBxx" type="text" value="CEG Hostels , Gunidy , Chennai" style="width: 700px;color:navy" placeholder="address" />
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    Permanent address
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> <input class="txtBxx" type="text" value="2008" placeholder="From"/> - <input class="txtBxx" type="text" value="till Now" placeholder="To"/> </div>  
                                    </div>
                                    <div class="myEduAns">
                                       <input class="txtBxx" type="text" value="Thengalpalayam , Rasipuram , Namakkal" style="width: 700px;color:navy;" placeholder="address"/>
                                    </div>
                                </div>
                                <div class="myEduTtl">
                                    Native Place
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> <input class="txtBxx" type="text" value="2008" placeholder="From"/> - <input class="txtBxx" type="text" value="till Now" placeholder="To"/> </div>  
                                    </div>
                                    <div class="myEduAns">
                                       <input class="txtBxx" type="text" value="Salem" style="width: 700px;color:navy;" placeholder="address"/>
                                    </div>
                                </div>
                                 
                               
                                
                                <div class="updateHolder">Update</div>
                                
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
                                        <input class="txtBxx" type="text" value=" O +ve"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Languages Known
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Tamil ,English , Telugu"/>
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Religion
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Hindu"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       ECA
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Programming"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Physique
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Slim"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Mentally
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Politics
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Not Interested"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Monthly Income
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" Still Studying"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       about me
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" It\'s all in the Game"/>
                                    </div>
                                </div>
                                <br/>
                               <div class="updateHolder">Update</div>
                                
                            </div>
                        </div>
                        <div class="ExpandMore">
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
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Letter
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Color 
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actor
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actress
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Movie
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Song | Album
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Place
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div> 
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Animal
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Food
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Field
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Book
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Game
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Sports Person
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Author
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       TV Show
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Cartoon
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Musician
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Film Director
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    
                                    <div class="profInfoTtle">
                                       Comedy Actor
                                    </div>
                                  <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                    
                                </div>
                                
                               <br/>
                               <div class="updateHolder">Update</div>
                                
                            </div>
                        </div>
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
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Letter
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Color 
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actor
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actress
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Movie
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Song | Album
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Place
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div> 
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Animal
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Food
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Field
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Book
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Game
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Sports Person
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Author
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       TV Show
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Cartoon
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Musician
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Film Director
                                    </div>
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    
                                    <div class="profInfoTtle">
                                       Comedy Actor
                                    </div>
                                  <div class="profInfoAns"><input class="txtBxx" type="text" value=" 5" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" value=" 5" placeholder="Any reason ?" /></div>
                                    </div>
                                    
                                </div>
                                
                               <br/>
                               <div class="updateHolder">Update</div>
                                
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
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                    Mobile
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Personal </div>
                                    </div>
                                    <div class="myEduAns"><input class="txtBxx" type="text" value="9790394167" placeholder="Mobile Number"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Airtel" placeholder="Mobile Network" /> </div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Xolo" placeholder="Mobile Brand & Model No"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Android 4.1" placeholder="Operating System"/></div>
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    PC
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Laptop </div>
                                    </div>
                                    <div class="myEduAns"><input class="txtBxx" type="text" value="Lenovo" placeholder="Brand / Company " /> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Z 50 -70" placeholder="Model No" /></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Silver" placeholder="color"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Windows 7" placeholder="Operating System 1"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Windows 8.1" placeholder="Operating System 2"/></div>
                                    </div>
                                </div>
                                <div class="myEduTtl">
                                    Vehicle
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Bike </div>
                                    </div>
                                    <div class="myEduAns"><input class="txtBxx" type="text" value="Hero Honda" placeholder="Brand / Company"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="TN 2987" placeholder="Registration No"/></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Black" placeholder="color"/></div>
                                    </div>
                                </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Car </div>
                                    </div>
                                    <div class="myEduAns"><input class="txtBxx" type="text" value="Rolls Royce" placeholder="Brand / Company"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="TN 2657" placeholder="Registration No"/></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" type="text" value="Black" placeholder="color"/></div>
                                    </div>
                                </div>
                                 
                               
                                <br/>
                               <div class="updateHolder">Update</div>
                               
                                
                            </div>
                        </div>
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
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      You
                                    </div>
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Don\'t know"/>
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Family
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" Cool"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Friendship
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Love"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                     Education
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                     Politics
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Life
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value=" Cool"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    God
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Boys
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                 
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Girls
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                 
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Marriage
                                    </div>
                                    
                                   <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                 
                               
                                 
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Entertainment
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Some words to World
                                    </div>
                                    
                                    <div class="profInfoAns"><input class="txtBxx" type="text" value="Cool"/>
                                    </div>
                                </div>
                                 
                                 
                                 <br/>
                               <div class="updateHolder">Update</div>
                                
                               
                                
                            </div>
                        </div>
                        <div id="FinishAllEdit">
                            Finish Editing
                        </div>
                        <br/><br/>
                        </div>
                        
                    </div>
                
               
            </div>
            <div id="proposeHelpWindow" class="helpWindowOut">
                                <div id="helpWinTitle">? &nbsp;&nbsp;Help &nbsp;&nbsp;- &nbsp;&nbsp;Proposal<div id="closeHelpWindow" onclick="$(\'#proposeHelpWindow\').slideUp()">X</div></div>
                                <div id="HelpWindowInCont">
                                    <div id="helpInnerTitle" >Brave</div>
                                    <div id="helpContentItem">Vijayakumar will get direct notification that you proposed him <br/>And if he accepts you will receive a notification with his message</div>
                                
                                    <div id="helpInnerTitle">Secret & Smart</div>
                                    <div id="helpContentItem">Vijayakumar will not get any notification but when he also tries to propose you , <br> Both of you receive notification</div>
                                
                                   
                                   
                                    
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
</html>
';
}