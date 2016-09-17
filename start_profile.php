
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
       include 'title_bar.php';
    $user_id=$_SESSION['user_id'];
    $user_name=$_SESSION['user_name'];
    $_SESSION['join_sedfed']=$user_id;
    require_once 'mysqli_connect.php';
    $q="select user_id as u from basic where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
          
    }
    
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
$gen="";
$f_name="";
}
}
  $p_pic='../'.$_SESSION['user_name'].'/ppic25.jpg';
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
     	        		      
$w_pic='../'.$user_id.'/wpic50.jpg';
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
    <link rel="stylesheet" href="'.$_SESSION['css'].'editprofile_new.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpprofile.css"/>
   <script src="jquery.min.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   
   <script src="starup_prof.js" type="text/javascript"></script>
   
   </head>
  
  <body onload="setWallpaper()"  >
        <div id="fullPageContainer">
            <div id="pageLoadStatus"></div>
                <div id="Topest">

                    <div id="title_bar">

                      <font id="sedfedUserName" >'.$user_name.'</font>

                    </div>
                     <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >Set Up My Profile</font>

                    </div>

                </div>
            <div id="innerPageCont">
               
               
                <div id="sf-profileHolder" >
                          
                    <div class="emptyWallPic" style="background-image:url(\''.$w_pic.'\')" id="my_prev_wall_pic">
	   <div id="chngppic"></div>
                        <div class="wallTip" onclick="change_wall_pic()">
                             Upload a Wallpaper
                        </div> 
                    </div>
                    <div class="emptyProfPic" id="my_prev_prof_pic" onclick="open_change_prof_pic()">
                        <img src="'.$ppics.'" alt="" />
                    </div>
                   
                    <div id="innerProfile" onmouseover="meOnProfile()" >
	           
                        <div id="OverallPictureChange">
                            
                            <div class="OPC_ItmBtn" onclick="open_change_prof_pic()">
                                Upload Profile Picture
                            </div>
                            <div class="OPC_ItmBtn" onclick="change_wall_pic()" >
                                Upload Wallpaper
                            </div>
                            <input type="hidden" id="wchwantchng" value="1" />
<input type="file" id="for_bgm_updt" style="width:0px;height:0px;display:none;" onchange="chng_bgm()" />
                            <div class="OPC_ItmBtn" id="updtbgm" onclick="$(\'#for_bgm_updt\').click();">
                                Upload BGM
                            </div>
                           
                        </div>
                        <div id="myFirstAppear">
                          
                           
                            
                            <div id="myFirstDetails">
                                <div id="firDetInner">
                                    <div id="firDetContainer">
                                        <div class="firDetTtl">I\'m    
                                        </div>
		      <form method="post" action="start_prof_prcs.php">
                                         <div class="firDetCont" style="color:crimson;font-size: 20px;">
                                             <input class="txtBxx" name="inp_Name"  type="text" value="'.$f_name.'" style="color:crimson;font-size: 20px;" placeholder="Full Name"/>
                                            </div>
                                        <div class="firDetCont" style="color:gray;font-size: 14px;" ><div class="QT"> Otherwise known as </div><input class="txtBxx" name="inp_NickName" onclick="$(\'#ThNickName\').fadeIn();$(\'#inp_thNickName\').focus();" type="text" value="'.$nicknm.'" placeholder="Nick Name" style="color:crimson;font-size: 19px;"/></div>
                                        <div class="firDetCont">
                                            <div class="QT"> Gender </div>
                                            <select onchange="change_gen(this.value)" name="gendr" >
		              <option value="'.$gen.'">'.$sex.'</option>
                                                 
		               <option value="boy">Male</option>
                                                <option value="girl">Female</option>
		              </select>
                                        </div>
                                        <div class="firDetCont">
                                            <div class="QT"> Born On </div><input style="display: none;"  onclick="$(\'#ThAge\').fadeIn();" id="inp_Age" class="txtBxx" type="text" value="'.$age.'" placeholder="Age"/> <div class="firDetContEx" style="color:gray"><input  onclick="$(\'#ThAge\').fadeIn();" id="inp_DOB" class="txtBxx" type="text" value="'.$day.' '.$mnth.' '.$year.'" placeholder="Birth Date"/></div></div>
                                      
                                       
                                    
                                        <div class="firDetCont" >
                                         
                                              <div class="QT"> Relationship Status </div>
                                          
                                            <input class="txtBxx" name="inp_relsts"  type="text" value="'.$status.'" placeholder="Relationship Status"/><div class="firDetContEx"  style="color:gray;display: none;">With <div class="firDetCont"   style="color:crimson;font-size: 19px;margin-top: -1px;display: none"><input id="inp_relstsWith" class="txtBxx" type="text" value="'.$nicknm.'" style="color:crimson;font-size: 19px;width: 175px;display: none" onclick="$(\'#thtrRelSts\').fadeIn();$(\'#inp_thtrRelWith\').focus();" placeholder="Name of person"/></div></div>
                                            
                                          </div>
                                       
                                            <div class="firDetCont" style="color:gray;"><div class="QT"> Living in </div><input name="inp_Flocate" class="txtBxx" type="text" value="'.$native_place.'" placeholder="I\'m living in" onclick="$(\'#ThLocate\').fadeIn();$(\'#inp_thLocate\').focus();"/></div>
                                          <div class="firDetCont">  </div>
                                    </div>
                                 
		   <div class="theaterTexts" id="ThAge" style="display: none" >
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                   My Birthday <div class="thtrTxtClose" onclick="$(\'#ThAge\').fadeOut()" >X</div>
                                               </div>
                                               <div class="thtrCont">
                                                  
                                                
                                                   
<div class="thtrSlctItm">
Date
<select id="inpTh_Date" name="d"  >';
for($t=1;$t<=31;$t++)
{
echo'<option value="'.$t.'">
'.$t.'
</option>';
}



echo' </select>
</div>
<div class="thtrSlctItm" >
Month
<select id="inpTh_Mon" onchange="ageInp()" name="m" >
<option value="Jan" >Jan</option> 
<option value"Feb">Feb</option>
<option value"Mar">Mar </option>
<option value"Apr">Apr</option> 
<option value"May">May</option>
<option value"Jun">Jun </option>
<option value"Jul">Jul</option> 
<option value"Aug">Aug</option>
<option value"Sep">Sep </option>
<option value"Oct">Oct</option> 
<option value"Nov">Nov</option>
<option value"Dec">Dec</option>


</select>
</div>
<div class="thtrSlctItm">
Year
<select id="myyear" onchange="ageInp()" name="y" onclick="yearSelect(\'#Th_ageYear\')" >
';
for($ni=1950;$ni<=2015;$ni++)
{
echo '<option value="'.$ni.'" >'.$ni.'</option>';
}


echo'</select>
</div>
                                                   <div class="thtrprevCont">
                                                     Current&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$day.' '.$mnth.' '.$year.' &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; '.$age.'
                                                </div>
                                                   <div class="thtrPrcd" onclick="makeDOB()">
                                                       Update
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                     <input type="submit" value="Proceed" id="FinishAllEdit" />
                          
                      
	       </form>
                        <br/><br/>
                        </div>
                        
                    </div>
                
               
            </div>
        
       
           
            
        </div>
    </body>
</html>
';
include'../web/notifs.html';
}