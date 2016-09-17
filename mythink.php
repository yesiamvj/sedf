<!DOCTYPE html>

<script type='text/javascript'>
var cp=0;
var dty=0;
var us=0;
var prvcy=0;
function hideselectppldiv(){
    $("#selectppldiv").hide();
}
function scrollstatusdiv(v){
    if(v==1)
    {
        if($("#fortopscroll").val()==="n")
        {
            $("#holestatuscont").animate({'margin-top':'0px'},'slow');
        }
     }
    if(v==2)
    {
        if($("#fortopscroll").val()==="n")
        {
            
            $("#holestatuscont").animate({'margin-top':'-340px'},'slow');
        }if($("#fortopscroll").val()==="s"){
            
            $("#holestatuscont").animate({'margin-top':'0px'},'slow');
        }
            
    
    }
}
function clkchkbox(a)
{ 
    if(a===3 || a===4)
    {
        $("#selectppldiv").show();
        
        if(a==3)
        {
          $("#wchpplwant").val("1") ; 
          $("#selectpplspan").html("Search & Select People for say your Feelings<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
               
          
        }
        if(a==4)
        {
          $("#wchpplwant").val("2") ;       
            $("#selectpplspan").html("Search & Select People to remove People from selected list<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
               
        }
                  
    }
  var chkboxid="chkbox"+a;
     if(document.getElementById(chkboxid).checked===true)
     {
               document.getElementById(chkboxid).checked=false;
     }
     else{
                document.getElementById(chkboxid).checked=true;
         }
}
function viewprivacylist()
{
    prvcy=prvcy+1;
    if(prvcy>1)
    {
        prvcy=0;
    }
    if(prvcy==1)
    {
        var sdt=0;
      $("#holeprvccont").slideDown();
    $("#allcontbtn").val("Which people you think ?");
      $("#privacylistimg").attr('src','icons/expnd-dwn.png');
      $("#fortopscroll").val('n');
    
       
    }else{
    $("#holeprvccont").slideUp();
    $("#privacylistimg").attr('src','icons/expnd-right.png');
    $("#allcontbtn").val("For All People");
    $("#fortopscroll").val('s');
    
    
      
    }
}
function updatestatus(){
    us=us+1;
    if(us>1){
        us=0;
    }
    if(us==1)
    {
    $(".chagestatusdiv").show();
    $(".chagestatussharp").show();
    
    }else{
      $(".chagestatusdiv").hide();
    $(".chagestatussharp").hide(); 
    
    }
}
function bgmhint(c){
    if(c==1)
    {
         $(".holebgmhint").show();
    }
    if(c==2){
         $(".holebgmhint").hide();
    }
    if(c==3)
    {
     
        $(".holeimagehint").show();
    }
     if(c==4)
    {
        $(".holeimagehint").hide();
    }
    if(c==5)
    {
        $(".holecolorhint").show();
    }
    if(c==6){
        $(".holecolorhint").hide();
    }
   
}
function emptypass()
{
    alert("Now any one can Login your Account without any password...")
}
function chngpassprcs(a){
    var op1=$("#oldpass1").val();
    var op2=$("#oldpass2").val();
    var np1=$("#newpass1").val();
    var np2=$("#newpass2").val();
    var test="bad";
    dty=33;
    if(dty===a)
    {
     test="good";
    }
    else{
        test="bad";
    }
    var xmlhttp = new XMLHttpRequest();
    
               var passwords = "cp1=" + op1 +
"&cp2=" + op2+ "&enp1="+np1+ "&enp2="+np2+ "&fortest="+test;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
            {
                 
                document.getElementById("cpresult").innerHTML = xmlhttp.responseText;
            }
        }
        
        xmlhttp.open("post", "cp.php?"+passwords , true);
        xmlhttp.send();
       
}
function changepass()
{
    cp=cp+1;
    if(cp>1)
    {
        cp=0;
    }
    if(cp==1)
    {
        $("#cpimg").attr('src','icons/expnd-dwn.png');
    $("#changepas").slideDown(500);
    
    $('#main-profile').animate({'top':'-400px'},'slow');
    }
    else{
        $("#changepas").slideUp(500);
        $("#cpimg").attr('src','icons/expnd-right.png');
    
        $('#main-profile').animate({'`top':'0px'},'slow');
    }
     
}
var st=0;
function saveTextAsFile()
{
	var  textToWrite= $("html").html();
      
	var textFileAsBlob = new Blob([textToWrite], {type:'audio/video/image/text/html/css/javascript'});
	var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;
        var reader=new FileReader();
        var downloadLink = document.createElement("a");
	downloadLink.download = fileNameToSaveAs;
    
	downloadLink.innerHTML = "Download File";
	if (window.webkitURL != null)
	{
		// Chrome allows the link to be clicked
		// without actually adding it to the DOM.
		downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
	}
	else
	{
		// Firefox requires the link to be added to the DOM
		// before it can be clicked.
		downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
		downloadLink.onclick = destroyClickedElement;
		downloadLink.style.display = "none";
		document.body.appendChild(downloadLink);
	}

	downloadLink.click();
        for(st=1;st<=7;st++)
        {
            var idimg="link"+st;
          
            document.getElementById(idimg).click();
        }
        
}

function destroyClickedElement(event)
{
	document.body.removeChild(event.target);
}

function loadFileAsText()
{
	var fileToLoad = $("img").attr('src');
        $('#myImg').attr('src', fileToLoad);
        alert(fileToLoad);
        
       
	
}
function updatestatusprcs(){
  
    var status=$("#txtarea").val();
    var xmlhttp = new XMLHttpRequest();
    var clrstatus=$("#colorstatus").val();
   clrstatus=clrstatus.substring(1,clrstatus.length);
 
     var mystatus="nstatus="+status+"&colorstatus="+clrstatus;
    
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
            {
                 
                document.getElementById("newstatus").innerHTML = xmlhttp.responseText;
            }
        }
        
        xmlhttp.open("post", "updatestatus.php?"+mystatus , true);
        xmlhttp.send();
   
}
</script>

 <?php session_start(); 
 
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
     require 'mysqli_connect.php';
   
     $sun="select first_name as fname from basic where user_id=$user_id";
        $rsun=mysqli_query($dbc,$sun);
        if($rsun)
        {
            if(mysqli_num_rows($rsun)>0)
            {
                $rowfn=mysqli_fetch_array($rsun,MYSQLI_ASSOC);
                $firstname=$rowfn['fname'];
               $_SESSION['user_name']=$firstname;
               $f=$_SESSION['user_name'];
             
            }else{
               $_SESSION['user_name']="empty";
                
            }
        }else{
            $_SESSION['user_name']="not run";
        }
        $spp="select own_pic as pic from profile_pics where own_user_id=$user_id";
        $rpp=mysqli_query($dbc,$spp);
        if($rpp){
        if(mysqli_num_rows($rpp)>0)
        {
            $row=mysqli_fetch_array($rpp,MYSQLI_ASSOC);
           
                $ppics=$row['pic'];
           
        }
        else{
            echo 'empty pic';
        }
        
        }
        else{
            echo 'not run profile pic';
        }
        $selctstatus="select thinked_user_id as tuid, mythink as think,mythink_color as tkclr,mythink_image as img,mythink_bgm as bgm,mythink_video as video from status where user_id=$user_id";
        $runss=mysqli_query($dbc,$selctstatus);
        if($runss)
        {
            if(mysqli_num_rows($runss)>0)
            {
            $rowofstatus=mysqli_fetch_array($runss,MYSQLI_ASSOC);
            $mythink=$rowofstatus['think'];
            $mythinkclr=$rowofstatus['tkclr'];
            $mythinkimg=$rowofstatus['img'];
            $mythinkbgm=$rowofstatus['bgm'];
            $mythinkvideo=$rowofstatus['video'];
            $thinker_id=$rowofstatus['tuid'];
            $selusnm="select c_name as cnm from contacts where cu_id=$thinker_id and user_id=$user_id";
            $runfnma=mysqli_query($dbc,$selusnm);
            if($runfnma)
            {
                if(mysqli_num_rows($runfnma)>0)
                {
                    $rowd=mysqli_fetch_array($runfnma,MYSQLI_ASSOC);
                    $thinker_name=$rowd['cnm'];
               }else{
                    $selfname="select first_name as fname from basic where user_id=$thinker_id";
                    $runfname=mysqli_query($dbc,$selfname);
                    if($runfname)
                    {
                        if(mysqli_num_rows($runfname)>0)
                        {
                            $rowoffname=mysqli_fetch_array($runfname,MYSQLI_ASSOC);
                            $thinker_name=$rowoffname['fname'];
                        }else{
                            $selemail="select email as em from users where user_id=$thinker_id";
                            $runemail=mysqli_query($dbc,$selemail);
                            if($runemail)
                            {
                                if(mysqli_num_rows($runemail)>0)
                                {
                                    $rowofemail=mysqli_fetch_array($runemail,MYSQLI_ASSOC);
                                    $thinker_name=$rowofemail['em'];
                              
                                }else{
                                    $thinker_name="no user found";
                                }
                            }
                        }
                    }
                }
            }
            }else{
                $status="";
            $statusclr="";
            }
            
        }else
        {
            echo 'not run & selected status ';
        }
        
echo '
<!DOCTYPE html>

<html>
<style type="text/css">
#ownstatus
{
color:'.$mythinkclr.';
font-size:20px;
}
font#thinkername
{
    
    font-size: 19px;
}
</style>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="classlin.css"/>
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="mythink.js" type="text/javascript"></script>
   <script src="srchuser.js" type="text/javascript">     
  
  </head>
  <link rel="stylesheet" href="classlin.css"/>
  <body >
  
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  
         <div class="content-full" id="content-full" >
            <div class="pageLoadSatus" id="pageLoadStatus"></div>
            <div class="Topest" id="Topest">
                
                <div class="title_bar" id="title_bar"  onmouseover="mouseOntitleBar(1)" onmouseout="mouseOntitleBar(0)">
                
                    <font class="sedfed" id="sedfed" onclick="myNameClicked()">'.$firstname.'</font>
              <div class="searchbar" id="searchbar" >
                  <form>
                      <input class="srchbar" id="srchbar" type="text" />
                      <input class="proceedsrch" id="proceedsrch" type="submit" value="Search"/>
                  </form>
              </div>
              <div class="notes" id="notes" style="display:inline-block;">
                  
                  
              </div>
              
              <div class="logout" id="logout">
              <a href="logout.php">
                  <button class="logoutbtn" id="logoutbtn">Logout</button></a>
              </div>
              
            </div>
            
            <div class="notificationsArea" id="notificationsArea" >
                <span class="hotNote" id="hotNote">
                This is a Notifications &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:blue"><a href="lastactivity.html">Details</a></font>
                <button onclick="closetip(\'#notificationsArea\')" class="closethetip" id="closethetip">X</button>
                </span>
            </div>
            </div>
            <div class="main-profile" id="main-profile" onmouseover="mouseOnProfile(1)" onmouseout="mouseOnProfile(0)">
                <div class="profile-start" id="profile-start">
                    <input type="hidden" id="imgcnt" val="">
                    <img class="my-face" id="my-face" src="'.$ppics.'" alt="'.$firstname.'"/><div class="updatestdiv"><img src="icons/mythink.png" class="updateimg" width="35" height="25"><input type="button" value="My think about you" class="upstutus" onclick="updatestatus()"></div>
<div class="chagestatussharp"></div>                        
<div class="chagestatusdiv"><br/><div id="topscrolldiv" onmouseover="scrollstatusdiv(1)"><img src="icons/expnd-dwn.png" id="topscrollimg"></div><div id="bottomscrolldiv" onmouseover="scrollstatusdiv(2)"><img src="icons/expnd-dwn.png"></div><div id="holestatuscont"><input type="hidden" value="" id="fortopscroll">
<span class="chngstspan" ><input  id="files" type="file" name="upload" style="display:none" />
What do you feel about People?</span><br/><br/>
<textarea width="100" id="txtarea" height="100" oninput="typemystatus(this.value)"></textarea><br/>
<div id="holeprivacydiv"><img src="icons/expnd-right.png" width="15" id="privacylistimg" height="15" >
<input type="button" value="For all people " id="allcontbtn" onclick="viewprivacylist()">

<div id="holeprvccont">
<ul id="privacyul">

<input type="checkbox" class="chkbox" id="chkbox1"><li class="privacylist" onclick="clkchkbox(1)">All People</li>
<input type="checkbox" class="chkbox" id="chkbox2"><li class="privacylist" onclick="clkchkbox(2)">All contacts</li>
<input type="checkbox" class="chkbox" id="chkbox3"><li class="privacylist" onclick="clkchkbox(3)">For some people</li>
<input type="checkbox" class="chkbox" id="chkbox4"><li class="privacylist" onclick="clkchkbox(4)">Except some people</li>
<input type="checkbox" class="chkbox" id="chkbox5"><li class="privacylist" onclick="clkchkbox(5)">Friends</li>
<input type="checkbox" class="chkbox" id="chkbox6"><li class="privacylist" onclick="clkchkbox(6)">Family</li>
<input type="checkbox" class="chkbox" id="chkbox7"><li class="privacylist" onclick="clkchkbox(7)">Special</li>
<input type="checkbox" class="chkbox" id="chkbox8"><li class="privacylist" onclick="clkchkbox(8)">Secret</li>
<input type="checkbox" class="chkbox" id="chkbox9"><li class="privacylist" onclick="clkchkbox(9)">Unknown</li>
<input type="checkbox" class="chkbox" id="chkbox10"><li class="privacylist" onclick="clkchkbox(10)">Group Members</li>
<hr/>
</ul>
</div>
</div>
<div id="selectppldiv"><div id="selectpplspan">Search & Select People<button id="selectpplclsbtn" onclick="hideselectppldiv()">X</button></div><br/><div id="srchboxcontdiv"><input type="text" id="searchid" oninput="srchpople(this.value)" class="srchppl" placeholder="Select People" ><br/></div><div id="searchedpplconst"><div id="searchedppl"></div></div><input type="button" value="Add People" id="addpplbtn" onclick="selectppls()"><div id="selectedppldiv"></div></div>
           
<div id="rememberdiv"><input type="checkbox" id="remeberchkbox" value="remember" ><input type="button" value="Remember Me" onclick="remember()" id="remeberbtn"></div> 
<div id="preview"><font>Your Feeling :</font><span id="myfeelingwords"></span><div id="updatingstatus"></div><audio src="" id="bgm" width="2" height="25" controls></audio></div>
<div id="viewppldiv">
<button id="viewselpplbtn" onclick="viewppl(1)">View selected People</button>
<div id="someppldiv"><span id="somepplspan"><button id="somepplclosbtn" onclick="hideviewppl(1)">X</button> These People you selected for say your feelings</span><div id="wantedppldiv"></div></div>
<button id="viewexppplbtn" onclick="viewppl(2)">View Excepted People</button>
<div id="exceptppldiv"><span id="exppplspan"><button id="exppplclosbtn" onclick="hideviewppl(2)">X</button> For these people Your Feelings will not be sent</span><div id="unwantedppldiv"></div></div></div>
<div id="updateitems">
<div id="innercontent">
<input type="button" class="updatebtn" value="Update" onclick="updatestatusprcs()" >&nbsp;&nbsp;&nbsp;
<input type="color" class="colorstatus" id="colorstatus"  />
                                    <input type="button" onmouseout="bgmhint(6)" onmouseover="bgmhint(5)" onclick="document.getElementById(\'colorstatus\').click();" class="colorCmntIcon" id="colorCmntIcon" value="A"/>&nbsp;&nbsp;&nbsp;
                                    
<input  id="smilyimgfile" type="file" name="image" style="display:none" />
<input  id="bgmfile" type="file" name="bgm" style="display:none" />
<input id="videofile" type="file" name="video" style="display:none" />
<div class="adimgdiv"><img src="icons/test-smiley.png" onmouseout="bgmhint(4)" onmouseover="bgmhint(3)" onclick="document.getElementById(\'smilyimgfile\').click();"  class="updtimg" width="25" height="25">&nbsp;&nbsp;&nbsp;<img class="updtimg" src="icons/bgm.png" onmouseout="bgmhint(2)" onmouseover="bgmhint(1)" onclick="document.getElementById(\'bgmfile\').click();" width="25" height="25" ><img src="icons/addvideo.png" onclick="document.getElementById(\'videofile\').click();"  width="25" height="25"><div class="holebgmhint"><div class="bgmsharp"></div><div class="adbgmhint">Add a BGM to Your Status</div></div></div><br/>
<div class="holeimagehint"><div class="imagesharp"></div><div class="imagehint">Add a Image with Your Status</div></div>
<div class="holecolorhint"><div class="colorsharp"></div><div class="colorhint">Add a color to Your Status</div></div>
</div>
</div><input type="hidden" value="" id="wchpplwant">
<h3 id="curst">Current Feeling</h3>

<div id="oldstatus"><font>Feeling about <font id="thinkername"> '.$thinker_name.' </font>

</font> : <font id="ownstatus">'.$mythink.'</font>';
    
if(empty($mythinkbgm))
{
    echo'';
}else{
    echo"<br/><font>BGM</font>: <audio src=\"$mythinkbgm\" width=\"25\" height=\"25\" controls></audio><br/>";
}
if(empty($mythinkvideo))
{
    echo'';
}else{
    echo"<video src=\"$mythinkvideo\" width=\"300\" height=\"200\" controls></video>";
}
echo'
   

</div>
</div>
                </div>
             <input type="hidden" id="chkalrdclkd" value="1">   
                    <div class="formyface" id="formyface" onmouseover="sftooltip(\'#formyface\')"></div>
                    <div class="optionslist" id="optionslist">
                        <span class="p-heads" id="p-heads"> </span><hr/>
                        <ul class="selfs" id="selfs">
                        <li class="p-op-profile" id="p-op-profile"><a href="profile.html">Profile</a></li>
                        <li class="p-op-people" id="p-op-people" onclick="expandMenu(\'#pplOptions\',\'#p-op-people>#dropIcon\')">People <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></li>
                        <li class="pplOptions" id="pplOptions">
                            <ul class="expandOfppl" id="expandOfppl">
                                <li class="pplrequests" id="pplrequests">Requests </li>
                                <li class="pplrelations" id="pplrelations">Relations </li>
                                <li class="pplsent" id="pplsent">Sent Requests</li>
                            </ul>
                        </li>
                        <li class="p-op-msgs" id="p-op-msgs" onclick="expandMenu(\'#msgOptions\',\'#p-op-msgs>#dropIcon\')">Messages <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></li>
                        <li class="msgOptions" id="msgOptions">
                            <ul class="expandOfmsg" id="expandOfmsg">
                                <li class="msgInbox" id="msgInbox" onclick="ViewContent(\'#notificationsArea\')">Inbox </li>
                                <li class="msgOutbox" id="msgOutbox" onclick="ViewContent(\'#notificationsArea\')">Outbox </li>
                                <li class="msgTrash" id="msgTrash" onclick="ViewContent(\'#notificationsArea\')">Trash </li>
                            </ul>
                        </li>
                        <li class="p-op-ntfs" id="p-op-ntfs" onclick="ViewContent(\'#notificationsArea\')" ><a href="profile.html">Notifications</a></li>
                        <li class="p-op-grp" id="p-op-grps"><a href="profile.html">Groups</a></li>
                        <li class="p-op-psts" id="p-op-psts" onclick="expandMenu(\'#postOptions\',\'#p-op-psts>#dropIcon\')">Posts <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></li>
                        <li class="postOptions" id="postOptions">
                            <ul class="expandOfpost" id="expandOfpost">
                                <li class="msgInbox" id="msgInbox" onclick="ViewContent(\'#notificationsArea\')">My Posts </li>
                                <li class="msgOutbox" id="msgOutbox" onclick="ViewContent(\'#notificationsArea\')">New Post </li>
                                
                            </ul>
                        </li>
                        
                        <li class="curpage" id="curpage"><a href="profile.html" >What\'s Up</a></li></ul><br/>
                        <span class="p-heads" id="p-heads"> Utilities</span>
                        <hr/>
                        <ul class="p-utils" id="p-utils">
                        <li ><a href="profile.html">My Files</a></li>
                        <li class="p-opbtns" id="p-opbtns"><a href="profile.html">My Stuffs</a></li>
                        </ul>
                        <br/>
                        <span class="p-heads" id="p-heads"> Control Panel</span>
                        <hr/>
                        <ul class="p-cpnal" id="p-cpnal">
                        <li ><img id="cpimg" src="icons/expnd-right.png" height="10" width="10"><input type="button" value="Change Password" id="cpbtn" onclick="changepass()"></li>
                        </ul><br/>
                        <div class="cpsharp">
                        </div>
                        <div  id="changepas">
                        <span class="crntpass"> Current Passwords :</span>
                        <input type="password" id="oldpass1" class="cptext" placeholder="Password 1"><br/>
                        <input type="password" id="oldpass2" class="cptext" placeholder="Password 2"><br/>
                        <span class="newpass"> New Passwords :</span>
                        <input type="password" id="newpass1" class="cptext" placeholder="Password 1"><br/>
                        <input type="password" id="newpass2" class="cptext" placeholder="Password 2"><br/>
                        <input type="button" id="prcdcpbtn" value="Change" onclick="chngpassprcs(33)">
                        <div id="cpresult"></div>
                        </div><br/>
                     <span class="p-heads" id="p-heads"> Main Panel</span>
                        <hr/>
                        <ul class="about_mp" id="about_mp">
                            <li  class="mp-heads" id="mp-heads">  <span>Theme</span></li>
                            <li>
                                <ul class="p-mtheme" id="p-mtheme">
                                    <li><span class="mp-thme-sf" id="mp-thme-sf" onclick="applyProfTheme(\'#mp-thme-sf\')">Aa</span></li>
                                    <li><span class="mp-thme-bw" id="mp-thme-bw" onclick="applyProfTheme(\'#mp-thme-bw\')">Aa</span></li>
                                     <li><span class="mp-thme-rg" id="mp-thme-rg" onclick="applyProfTheme(\'#mp-thme-rg\')">Aa</span></li>
                                    <li><span class="mp-thme-sb" id="mp-thme-sb" onclick="applyProfTheme(\'#mp-thme-sb\')">Aa</span></li>
                                    
                                </ul>
                            
                            </li>
                            
                            <li style="border: none;color: crimson;" onclick="customProfTheme()">Custom Theme</li>
                            <li  class="mp-heads" id="mp-heads"><span>Position</span></li>
                            <li class="p-op-neverHide" id="p-op-neverHide"   onclick="setProfBar(\'nohide\')">Never Hide</li>
                            <li class="p-op-hide" id="p-op-hide"  onclick="setProfBar(\'hidenseek\')">Hide & Show</li>
                        </ul>
                        <!-- for custom theme generation-->
                        <div class="prof-custom-Theme" id="prof-custom-Theme">
                            <div class="title_for_window" id="title_for_window">Set Custom Theme <span class="closeForWindow" id="closeForWindow" onclick="closeCusThmeWin()">X</span></div>
                            <div class="window_content" id="window_content">
                                <input class="cusThmeBC" id="cusThmeBC" type="color" onchange="cusThmeChnge(\'#cusThmeBC\',\'#cusThmeBCR\',\'bc\')"   style="position:absolute;top:-500px;"/>
                                <input class="cusThmeC" id="cusThmeC" type="color" onchange="cusThmeChnge(\'#cusThmeC\',\'#cusThmeCR\',\'c\')"   style="position:absolute;top:-500px;"/>
                                Background Color <button class="cusThmeBCR" id="cusThmeBCR" onclick="document.getEleusThmeBCRmentById(\'cusThmeBC\').click()">Edit</button><br/>
                                Text Color <button class="cusThmeCR" id="cusThmeCR" onclick="document.getElementById(\'cusThmeC\').click()">Edit</button><br>
        
                                <button class="cusThmePreBtn" id="cusThmePreBtn" onclick="CusThmeOk()"> Apply </button>
                                
                            </div>
                            </div>
                        
                    </div>
                     <div class="whatsOnTop" id="whatsOnTop" onmouseover="whatsOnTop()" > 
                        <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                    </div>
                    <div class="whatsOnDown" id="whatsOnDown" onmouseover="whatsOnDown()" > 
                        <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                    </div>
                </div>
            </div>
            <div class="FocusPageCenter" id="FocusPageCenter">
                <br/>
                <div class="firstView" id="firstView">
                    <div class="contentoffirst" id="contentoffirst">
                        <div class="startupnote" id="startupnote">
                        <span class="lastLogin" id="lastLogin">Last Login : </span>
                        <span class="llanswer" id="llanswer">On March 15 2013 , 7.00 pm from Chrome Browser Chennai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:blue"><a href="lastactivity.html">Details</a></font>
                        </span><span class="forclosingTip" id="forclosingTip"><button onclick="closetip(\'#startupnote\')" class="closethetip" id="closethetip">X</button></span>
                        </div>
                        </div>
                </div>
                <div class="firstViewMsgs" id="firstViewMsgs">
                    <div class="msgitem" id="msgitem">
                        
                    </div>
                </div>
                <div class="TheWhatsUp" id="TheWhatsUp" onmouseover="mouseOnWU(1)" onmouseout="mouseOnWU(0)">
                    <!--Start of The Post-->
                     <div class="postWhole" id="postWhole">
                         <div class="forFullScreenMedia" id="forFullScreenMedia"  onclick="closetip(\'#forFullScreenMedia\')">
                                     <span class="closePreview" id="closePreview" onclick="closetip(\'#forFullScreenMedia\')">
                                 X &nbsp;&nbsp;Close
                             </span>
                                     <div class="fullScreenMediaContent" id="fullScreenMediaContent">
                                     <img class="FullScreenMedia" id="FullScreenMedia"  alt="caption" src="icons/post-testimg.jpg" title="Click to Close"/> 
                                     </div>
                                 </div>
                                                                         <!-- <div class="decBackground" id="decBackground">  </div>-->
                        <!-- for preview media -->
                         <div class="openMediaPeview" id="openPreviewMedia1">
                             <span class="closePreview" id="closePreview" onclick="closetip(\'#openPreviewMedia1\')">
                                 X &nbsp;&nbsp;Close
                             </span>
                             <div class="postPreviewDetails" id="postPreviewDetails">
                                 
                                 <div class="details" id="details">
                                   <!-- <img onclick="whoAreThey(\'#postLikers\')" class="sf-likeIcon" id="sf-likeIcon" src="icons/post-preview-like.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" class="post-sf-currentLike" id="post-sf-currentLike"><span id="likeCount">100</span> People Likes This Post</span><br/>
                                    <img  class="sf-likeIcon" id="sf-likeIcon" src="icons/post-preview-unlike.png" alt="Likes"/>
                                    <span class="post-sf-currentUnlike" id="post-sf-currentUnlike"> <span id="unlikeCount">100</span> People Hates This Post</span><br/>
                                    <img class="sf-likeIcon" id="sf-likeIcon" src="icons/post-sf-sts-rate.png" alt="Likes"/>
                                    <span class="post-sf-currentRate" id="post-sf-currentRate"> &nbsp;&nbsp;<span id="rateCount">100</span> people Rated this Post</span><br/>
                                    <img onclick="whoAreThey(\'comment\')" class="sf-likeIcon" id="sf-likeIcon" src="icons/post-sf-comment.png" alt="like"/>
                                    <span onclick="whoAreThey(\'comment\')" class="post-sf-currentComments" id="post-sf-currentComments"> &nbsp;&nbsp;100 people Commented on this Post</span><br/>
                                -->
                                 </div>
                             </div>
                             <!--preview content starts-->
                             <div class="fullContent" id="fullContent">
                                 <div class="postUser" id="postUser">
                                     <span class="postUserName" id="postUserName"> &nbsp; &nbsp; Vijayakumar </span><span class="postTime" id="postTime">Sat 10:30</span>
                                     <img onclick="whoAreThey(\'#postLikers\')"  class="postStatusLike"  src="icons/post-sf-liked.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" id="likeCount"  >100</span>
                                    <img  class="postStatusLike"  src="icons/post-sf-unliked.png" alt="Likes"/>
                                    <span id="unlikeCount" >100</span>
                                    <img onclick="whoAreThey(\'#postRatings\')" class="postStatusRate" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" id="rateCount">100</span>
                                    <button class="postnavbtn" id="postnavbtn"><</button><button class="postnavbtn" id="postnavbtn">></button>
                                 </div>
                                 <div class="postPreviewCaption" id="postPreviewCaption">&nbsp;&nbsp;&nbsp; This is post  Caption but this is a good post you know?? </div>
                                 <div class="PostPreviewMediaContent" id="PostPreviewMediaContent">
                                 <img class="postImagePreview" id="postImagePreview" onclick="FullpreviewMedia(\'#forFullScreenMedia\')" alt="caption" src="icons/post-testimg.jpg"/>
                                 </div>
                                 <!--full screen preview Starts-->
                                 
                                 <!--full screen ends-->
                                 <!-- about of preview media-->
                                 <div class="aboutThisPost" id="aboutThisPost">
                                     <span class="forPostLike" id="forPostLike"><span class="hintForPostControls" id="hintForPostControls">Like</span><img onclick="Likedone(1,100)" class="sf-likeIcon" id="likebtn1" src="icons/post-sf-like.png" alt="like"/> 
                            <span class="hintForPostControls" id="hintForPostControls">Unlike</span><img onclick="Likedone(0,100)" class="sf-unlikeIcon" id="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/> </span>
                                     <span class="forPostRate" id="forPostRate"> <span class="hintForPostControls" id="hintForPostControls">Rate This Post &nbsp;&nbsp;&nbsp;</span>
                            <img class="sf-rateIcon" onclick="postRated(1,101)"   src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img class="sf-rateIcon"  onclick="postRated(2,101)"  src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img class="sf-rateIcon" onclick="postRated(3,101)"   src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img class="sf-rateIcon"  onclick="postRated(4,101)" src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img class="sf-rateIcon"  onclick="postRated(5,101)"   src="icons/post-sf-emptyRate.png" alt="like"/></span>
                            <span class="sf-rateIcon" ><!--<input class="sf-commentInput" id="sf-commentInput" type="text" placeholder="Quick Comment" />--></span>
                            <span class="sf-rateIcon" >download&nbsp;&nbsp;<img  class="sf-CommentIcon" id="sf-CommentIcon" style="width:25px;height:25px" onclick="ViewComment(\'#commentContentFull\')" src="icons/post-media-download.png" alt="like"/>&nbsp;&nbsp;<span class="hintForPostControls" id="hintForPostControls">Comment </span><img class="sf-CommentIcon" src="icons/post-sf-comment.png" alt="like"/><span class="hintForPostControls" id="hintForPostControls">Share</span><img class="sf-shareIcon" id="sf-shareIcon" src="icons/post-sf-share.png" alt="like"/></span>
                            
                        </div>
                             </div>
                         </div>
                        <!-- preview ends-->
                        <!-- default screen content starts-->
             
                        <div class="postContentMain" id="postContentMain" onmouseover="mouseOnPostContent(\'#postDetailImps\',\'#postDetail\')" onmouseout="mouseOutPostContent(\'#postDetailImps\',\'#postDetail\')">
                             <div class="postDetailImps" id="postDetailImps">
                                
                                    <img onmouseover="whoAreThey(\'#postLikers\')" onmouseout="hideWhoThey()" class="postStatusLike" id="postStatusLike" src="icons/post-sf-sts-like.png" alt="Likes"/>
                                    <span  id="likeCount" class="post-sf-currentLike">100</span>
                                    <img  class="postStatusLike" src="icons/post-sf-sts-unlike.png" alt="Likes"/>
                                    <span id="unlikeCount" class="post-sf-currentUnlike">100</span>
                                    <img onmouseover="whoAreThey(\'#postRatings\')" onmouseout="hideWhoThey()" class="postStatusRate" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" id="rateCount" class="post-sf-currentRate">100</span>
                                    <span class="forMore" id="forMore" onclick="showMorePostDet(\'#postDetailImps\',\'#postDetail\')">></span>
                                    </div> 
                            
                            <div class="postDetail" id="postDetail" style="display: none">
                                
                                    <img onmouseover="whoAreThey(\'#postLikers\')" onmouseout="hideWhoThey()" class="postStatusLike" id="postStatusLike" src="icons/post-sf-sts-like.png" alt="Likes"/>
                                    <span  id="likeCount"  class="post-sf-currentLike">100</span>
                                    <img  class="postStatusLike" id="postStatusLike" src="icons/post-sf-sts-unlike.png" alt="Likes"/>
                                    <span id="unlikeCount"  class="post-sf-currentUnlike">100</span>
                                    <img onmouseover="whoAreThey(\'#postRatings\')" onmouseout="hideWhoThey()" class="postStatusRate" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" id="rateCount" class="post-sf-currentRate">100</span>
                                
                                    <img  class="postStatusLike" id="postStatusLike" src="icons/post-sf-sts-dwnld.png" alt="Likes"/>
                                    <span id="unlikeCount"  class="post-sf-currentUnlike">100</span>
                                    <img  class="postStatusLike" id="postStatusLike" onmouseover="whoAreThey(\'#postCommenters\')" onmouseout="hideWhoThey()" src="icons/post-sf-sts-comment.png" alt="Likes"/> <span id="unlikeCount" class="post-sf-currentUnlike">100</span>
                                    <img  class="postStatusLike" id="postStatusLike"  onmouseover="whoAreThey(\'#postShares\')" onmouseout="hideWhoThey()" src="icons/post-sf-sts-share.png" alt="Likes"/>
                                    <span id="unlikeCount"  class="post-sf-currentUnlike">100</span>
                                     <span class="forMore" id="forMore"  onclick="showMorePostDet(\'#postDetail\',\'#postDetailImps\')">></span>
                                    </div> 
                               
                            <div class="postUser" id="postUser">
                                <span class="postUserName" id="postUserName" style="cursor: pointer;" onmouseover="$(\'#forPeopleSedfedTag\').show();$(\'#QuickPostAccess\').hide();" onmouseout="$(\'#forPeopleSedfedTag\').hide();"> Vijayakumar </span>
                                <div class="postTime" id="postTime" style="display: inline" onmouseover="mouseOnPostMainDet(\'#forPostMainDetailTt\',\'-70px\',\'#postMainDetTtCont\',\'10 Mar 2015 - 10:30 PM\')" onmouseout="$(\'#forPostMainDetailTt\').hide()">Sat&nbsp;10:30</div>
                                <div style="display: inline" class="SedFedPostID" id="SedFedPostID" onmouseover="mouseOnPostMainDet(\'#forPostMainDetailTt\',\'-20px\',\'#postMainDetTtCont\',\'Post ID - 7898 \')" onmouseout="$(\'#forPostMainDetailTt\').hide()"><b>|</b>&nbsp;7898</div>
                                <div class="postDrivers" id="postDrivers" style="display: inline-block;"><div class="forPostDriverPrev" id="forPostDriverPrev"><div class="forSingleLine" id="forSingleLine"></div><div class="postDriverPrev" id="postDriverPrev"></div></div><div class="postDrivCur" id="postDrivCur"></div><div class="forPostDriverNext" id="forPostDriverNext"><div class="postDriverNext" id="postDriverNext"></div><div class="forSingleLine" id="forSingleLine"></div></div></div>
                                <div class="forPostMainDetailTt" id="forPostMainDetailTt">
                                    <div class="postMainDetTtAr" id="postMainDetTtAr"></div>
                                    <div class="postMainDetTtCont" id="postMainDetTtCont">Post ID</div>
                                </div>
                              <div class="forQuickProfileArrow" id="forQuickProfileArrow"></div>
                                <div class="forPeopleSedfedTag" id="forPeopleSedfedTag" style="display:none" onmouseover="mouseOnSFTag(\'#forPeopleSedfedTag\')" onmouseout="mouseOutSFTag(\'Vijayakumar \',\'#SedFedUserName\',\'#forPeopleSedfedTag\',\'#forQPdmyDetails\')">
                                    <div class="forQPmyFirstApp" id="forQPmyFirstApp" >
                                        <span class="SedFedUserName" id="SedFedUserName" >'.$firstname.'</span><span class="SedFedUserAge">18+</span><br/>
                                    <div class="forQuickSFprofile" id="forQuickSFprofile" onmouseover="mouseOnQPsf(\'#forQuickSFprofile\')" onmouseout="mouseOutQPsf(\'#forQuickSFprofile\')">
                               <img onclick="Likedone(1,100,\'.likebtn\')" class="sf-likeIcon" id="sf-likeIcon"  src="icons/post-sf-like.png" alt="like"/> <br/>
                            <img onclick="Likedone(0,100,\'.#\')" class="sf-unlikeIcon" id="sf-unlikeIcon"  src="icons/post-sf-unlike.png" alt="like"/><br/><br/>
                                   
                                    <img onclick="quickpostRateclk(\'#quickpostrate1\')" class="quickpostrate1" id="quickpostrate1" src="icons/post-sf-emptyRate.png" alt="Rate"  style="height:20px;width: 20px;margin-left: 2px;margin-top: -9px;"/><br/>
                                
                            </div>
                                    <img   onmouseover="mouseOnQPface(\''.$firstname.'\',\'#SedFedUserName\',\'#forPeopleSedfedTag\',\'#forQuickSFprofile\',\'#forQPdmyDetails\')" onmouseout="mouseOutQPface(\'#forQuickSFprofile\')" class="SedFedUserFace" src="'.$ppics.'" alt="'.$firstname.'"/>
                                    <div class="forQPdmyDetails" id="forQPdmyDetails" onmouseover="mouseOnQPDet(\'#ttl\',\'#forQPdmyDetails\')" onmouseout="mouseOutQPDet(\'#ttl\')">
                                        <table>
                                            <tr>
                                                <td class="ttl1" id="ttl1" style="display:none"><span class="forQPmyDetTtle">In</span></td><td><span class="forQPmyDetAns">Salem,Tamilnadu</span></td>
                                            </tr>
                                           
                                            <tr>
                                                 <td class="ttl2" id="ttl2" style="display:none"><span class="forQPmyDetTtle" id="forQPmyDetTtle">Feeling</span></td><td><span class="forQPmyDetAns" id="forQPmyDetAns">Busy</span></td>
                                               
                                            </tr>
                                           <!-- <tr>
                                                <td><span class="forQPmyDetTtle">Position</span></td><td><span class="forQPmyDetAns">Student</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="forQPmyDetTtle">Education</span></td><td><span class="forQPmyDetAns">Engineering</span></td> 
                                            </tr>
                                           -->
                                             <tr >
                                                 <td class="forQPmyDetTtle" id="ttl3" style="display:none"><span class="forQPmyDetTtle">Status</span></td><td><span class="forQPmyDetAns" id="forQPmyDetAns">This status line should be 2 lines of words after...</span></td>
                                               
                                            </tr>
                                            <tr >
                                                <td class="ttl4" id="ttl4" style="display:none"><span class="forQPmyDetTtle">About</span></td><td><span class="forQPmyDetAns" id="forQPmyDetAns">Silence is my Attitude Ever</span></td>
                                            </tr>
                                         
                                         </table>
                                    </div>
                                    
                                    </div>  
                                    
                                </div>   
                            </div>
                          <!--  <div class="postTime" style="margin: 0px;padding-left: 15px">Sat 10:30</div>-->
                            <div class="postCaption" id="postCaption" onmousemove="mouseOnPostCap(event)">This is post  Caption but this is a good post you know?? </div>
                        <!-- default media content starts-->
                                                    <!--<div class="navigatePost" id="navigatePost">
                                                              <span class="postPrev"><</span> <span class="postNext">></span></div>-->
                                                    
                        <!-- default media content starts-->
                        <div class="mediacontent" id="mediacontent">
                            <div class="QuickPostAccess" id="QuickPostAccess"  >
                            <div class="forQuickPostAccArrow" id="forQuickPostAccArrow"></div>
                            <div class="forQuickPostAcc" id="forQuickPostAcc">
                               <img onclick="Likedone(1,100,\'#likebtn\')"  class="sf-likeIcon" id="likebtn" src="icons/post-sf-like.png" alt="like"/> <br/>
                            <img onclick="Likedone(0,100,\'#unlikebtn\')"  class="sf-unlikeIcon" id="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/><br/><br/>
                                   
                                    <img onclick="quickpostRateclk(\'#quickpostrate1\')"  id="quickpostrate1" src="icons/post-sf-emptyRate.png" alt="Likes"  style="height:20px;width: 20px;margin-left: 2px;margin-top: -9px;"/><br/>
                                
                            </div>
                            </div>
                            <img class="postImgs" id="postImgs" onmousemove="mouseOnPostCap(event)" onclick="previewMedia(\'#openPreviewMedia1\')" alt="caption" src="icons/post-testimg.jpg"/>
                        </div>
                        <!--media ended , about starts-->
                        <div class="aboutThisPost" id="aboutThisPost">
                            <span class="forPostLike" id="forPostLike"><img onclick="Likedone(1,100,\'#likebtn\')" class="sf-likeIcon" id="likebtn2" src="icons/post-sf-like.png" alt="like"/> 
                            <img onclick="Likedone(0,100,\'#unlikebtn\')" class="sf-unlikeIcon" id="unlikebtn2" src="icons/post-sf-unlike.png" alt="like"/> </span>
                            <span class="forPostRate" id="forPostRate">
                                <img onclick="postRated(1,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'67\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"   class="sf-rateIcon" id="pstrated1"   src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(2,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'37\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  class="sf-rateIcon" id="pstrated2"  src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(3,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'234\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  class="sf-rateIcon" id="pstrated3"   src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(4,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'231\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  class="sf-rateIcon" id="pstrated4" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(5,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'6\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  class="sf-rateIcon" id="pstrated5" src="icons/post-sf-emptyRate.png" alt="like"/></span>
                            <span class="forPostViews" id="forPostViews">12389 Views</span>
                            <span class="forShare" id="forShare">
                                <a href="icons/post-testimg.jpg" id="nhu" target="_blank"> <img src="icons/post-media-download.png" onmouseover="mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'243\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();" class="sf-CommentIcon" id="sf-CommentIcon"/></a>&nbsp;&nbsp;
                                <img class="sf-CommentIcon" id="sf-CommentIcon" onmouseover="mouseOnPostDetCmnt(\'#postCommenters\',\'#forPostDetailToolt\',\'#postDetailTtCont\',\'100657687\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();" onclick="ViewComment(\'#commentContentFull\')" src="icons/post-sf-comment.png" alt="like"/>
                                <img class="sf-shareIcon" id="sf-shareIcon"   onmouseover=" mouseOnPostDetCmnt(\'#postShares\',\'#forPostDetailToolt\',\'#postDetailTtCont\',\'65467\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"            src="icons/post-sf-share.png" alt="like"/></span>
                            <div class="forPostDetailToolt" id="forPostDetailToolt">
                                <div class="postDetailTtAr" id="postDetailTtAr"></div>
                                <div class="postDetailTtCont" id="postDetailTtCont">1000</div>
                            </div>
                        </div>
                        
                        <div class="commentContentFull" id="commentContentFull">
                            <span class="commentTitle" id="commentTitle" title=" press \'V\' /Click to view All Comments" onclick="expandMenu(\'#previousComments\')">Comments &nbsp;&nbsp;&nbsp;<img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                                <form method="post">
                                    <input class="sf-commentInput" id="sf-commentInput" type="text" placeholder="What do you think?" />
                                    <div style="display: inline-block">
                                    <input type="color" class="colorComment" id="colorComment" onchange="colortyped(\'#colorComment\',\'#sf-commentInput\')"/>
                                    <input type="button" onmouseover="mouseOnColorCmnt(1)" onmouseout="mouseOutColorCmnt(1)" onclick="document.getElementById(\'colorComment\').click();" class="colorCmntIcon" id="colorCmntIcon" value="A"/>
                                    <input type="file" name="upload" id="attachCmnt" class="attachCmnt" style="display:none" onchange="fileinserted(\'#attachCmnt\')"/>
                                    
                                     <div class="forCmntTtArrowUtil" id="forCmntTtArrowUtil"></div>
                                    <div class="toolTipCmntUtils" id="toolTipCmntUtils">Add a color to your comment</div>
                                    
                                    </div>
                                    <div class="forCommentAdds" id="forCommentAdds">
                                        <ol>
                                            <li><img onclick="document.getElementById(\'attachCmnt\').click();" onmouseover="mouseOnCmntAttch(1)" onmouseout="mouseOnCmntAttch(3)" class="smileyHead" id="smileyHead" src="icons/test-smiley.png" alt="smiley"/></li>
                                            <li><img onclick="document.getElementById(\'attachCmnt\').click();" onmouseover="mouseOnCmntAttch(2)" onmouseout="mouseOnCmntAttch(3)" class="smileyHead" id="smileyHead" src="icons/test-atch.png" alt="smiley"/></li>
                                        </ol>
                                        <div class="forCmntArrow" id="forCmntArrow"></div>
                                        <div class="forCmntTtArrow" id="forCmntTtArrow"></div>
                                        <div class="toolTipCmntAdd" id="toolTipCmntAdd"> Add an Attachment</div>
                                    </div>
                                    
                                    <div style="display: inline">
                                    <input onmouseover="mouseOnColorCmnt(2)" onmouseout="mouseOutColorCmnt(2)" type="button" onclick="showOptions(\'#forCommentAdds\')" class="attachCmntIcon" id="attachCmntIcon" value="A"/>
                                    <input class="submitCmnt" id="submitCmnt" type="submit" value="Comment"/>
                                    </div>
                                </form>
                            <div class="previousComments" id="previousComments">
                                <div class="userCmntFull" id="userCmntFull">
                                <span class="commentUser" id="commentUser">Vijayakumar</span>
                                
                                <div class="hisComment" id="hisComment">
                                    <span class="commentText" id="commentText">This is my comment for test</span>
                                    <span class="commentImage" id="commentImage">
                                        <img src="icons/test-cmntImage.jpg" alt="cmntCaption"/>
                                    </span>
                                    <div class="aboutThisComment" >
                                    <span class="forPostLike" id="forPostLike"><img onclick="Likedone(1,100)"  id="sf-likeIcon" style="width:25px;height:25px" class="likebtn" src="icons/post-sf-like.png" alt="like"/> 
                            <img onclick="Likedone(0,100)" class="sf-unlikeIcon" id="unlikebtn" style="width:25px;height:25px" src="icons/post-sf-unlike.png" alt="like"/> </span>
                            <span class="forPostRate" id="forPostRate">
                                <img style="width:20px;height:20px" onclick="postRated(1,101)" class="sf-rateIcon"  id="rated1" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(2,101)" class="sf-rateIcon"  id="rated2" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(3,101)" class="sf-rateIcon"    id="rated3" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(4,101)" class="sf-rateIcon"  id="rated4" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(5,101)" class="sf-rateIcon"   id="rated5" src="icons/post-sf-emptyRate.png" alt="like"/></span>
                                        <span class="forCommentStatus" id="forCommentStatus">
                                            <img onclick="whoAreThey(\'#postLikers\')"  class="postStatusLike" src="icons/post-like-black.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" id="likeCount" class="post-sf-currentLike" >100</span>
                                    <img   class="postStatusLike" id="postStatusLike"  src="icons/post-unlike-black.png" alt="Likes"/>
                                  
                                    <span id="unlikeCount" class="post-sf-currentUnlike">100</span>
                                    <img onclick="whoAreThey(\'#postRatings\')"  class="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" id="rateCount" class="post-sf-currentRate" >100</span>
                                        
                                        </span>
                                        <span class="forShare" id="forShare"><img class="sf-CommentIcon" id="sf-CommentIcon"  style="width:25px;height:25px" onclick="ViewComment(\'#commentContentFull\')" src="icons/post-media-download.png" alt="like"/><!--<img class="sf-shareIcon" id="sf-shareIcon" src="icons/post-sf-share.png" alt="like"/>--></span>
                            
                        </div>
                                    
                                </div>
                                
                                </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        </div>
                        <!-- for extra-->
                        <div class="postDetails" id="postDetails">
                            <div class="postLikers" id="postLikers">
                              <span class="postDetailHead" id="postDetailHead"> These People hit like </span><span class="closewho" id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <span class="user" id="user">Vijayakumar </span><br/>
                              <span class="user" id="user">Sakthikanth </span><br/>
                              <span class="user" id="user">Arulkumar   </span><br/>
                              <span class="user" id="user">Kirubakaran </span><br/>
                              <span class="user" id="user">YogeshWaran </span><br/>
                              
                            </div>
                            <div class="postRatings" id="postRatings">
                                <span class="postDetailHead" id="postDetailHead"> Ratings </span><span class="closewho" id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <div class="ratingHeads" id="ratingHeads" onclick="expandMenu(\'#5raters\')">5 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (100) <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="5raters" class="raterspans">
                              <span class="user" id="user">Vijayakumar </span><br/>
                              <span class="user" id="user">Sakthikanth </span><br/>
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="expandMenu(\'#4raters\')">4 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span   class="raterspans" id="4raters">
                              <span class="user" id="user">Arulkumar   </span><br/>
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="expandMenu(\'#3raters\')">3 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (54)<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="3raters" class="raterspans">
                              <span class="user" id="user">Kirubakaran </span><br/>
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="expandMenu(\'#2raters\')">2 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (32)<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="2raters" class="raterspans">
                              <span class="user" id="user">YogeshWaran </span><br/>
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="expandMenu(\'#1raters\')">1 Star  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (34)<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="1raters" class="raterspans">
                                  <span class="user" id="user">Prasanth</span>
                              </span>
                            </div>
                            <div class="postCommenters" id="postCommenters">
                               <span class="postDetailHead" id="postDetailHead">Already Commented </span><span class="closewho" id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <span class="user" id="user">Vijayakumar </span><br/>
                              <span class="user" id="user">Sakthikanth </span><br/>
                              <span class="user" id="user">Arulkumar   </span><br/>
                              <span class="user" id="user">Kirubakaran </span><br/>
                              <span class="user" id="user">YogeshWaran </span><br/> 
                              
                            </div>
                            <div class="postShares" id="postShares">
                                 <span class="postDetailHead" id="postDetailHead">Also Shared by </span><span class="closewho" id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <span class="user" id="user">Rocky </span><br/>
                              <span class="user" id="user">Sakkanth </span><br/>
                              <span class="user" id="user">Arkumar   </span><br/>
                              <span class="user" id="user">Kirubn </span><br/>
                              <span class="user" id="user">YshWaran </span><br/> 
                            </div>
                            <div class="postTagers" id="postTagers">
                                
                            </div>
                            <div class="postReachers" id="postReachers">
                                
                            </div>
                        </div>
                        
                     </div>
                    <!-- One Post Ended-->
                    <!--Between Space-->
                    <div class="spaceBetween" id="spaceBetween">
                        This is a Space
                    </div>
                    <!--Ready for Next Post--> 
                    
                </div>
                
            </div>
            <div class="controlFocus" id="controlFocus" >
                <div class="whatFirst" id="whatFirst">
                    <span>
                    <img style="width:30px;height:30px;" src="icons/notif-add-ppl.png" alt="add"/>
                    </span><br/><br/>
                    <span>
                        <img style="width:30px;height:30px;" src="icons/notif-msg.png" alt="add"/>
                </span><br/><br/>
                 <span>
                    <img style="width:30px;height:30px;" src="icons/notif-note.png" alt="add"/>
                    </span>
                </div>
                
                
            </div>
  </body>
   <br/> <br/> <br/>
<table align="right">
	
	<tr>
           <a href="'.$ppics.'" id="link1" download="'.$ppics.'"></a>
                 <a href="post-testimg.jpg" id="link2" download="post-testimg.jpg"></a>
                       <a href="test-cmntImage.jpg" id="link3" download="test-cmntImage.jpg"></a>
                       <a href="loggedinPage.js" id="link4" download="loggedinPage.js"></a>
                       <a href="classlin.css" id="link5" download="classlin.css" ></a>
                       <a href="srchuser.js" id="link6" download="srchuser.js"></a>
                       <a href="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" id="link7" download="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></a>
		<td>Save this for Offline:</td>
		<td><input type="text" value="hmpg.html" id="inputFileNameToSaveAs"></input></td>
		<td><button onclick="saveTextAsFile()">Save to File</button></td>
	</tr>
	
		
</table>
</html>';
        }
        ?>
