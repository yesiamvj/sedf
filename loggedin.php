 <!DOCTYPE html>
 <?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {


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
        
echo '
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
    <link rel="stylesheet" href="lin.css"/>
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
  
  <body >
        
        <div id="content-full" >
            <div id="pageLoadStatus"></div>
            <div id="Topest">
                
                <div id="title_bar"  onmouseover="mouseOntitleBar(1)" onmouseout="mouseOntitleBar(0)">
                
                    <font id="sedfed" onclick="myNameClicked()">'.$firstname.'</font>
              <div id="searchbar" >
                  <form>
                      <input id="srchbar" type="text" autofocus/>
                      <input id="proceedsrch" type="submit" value="Search"/>
                  </form>
              </div>
              <div id="notes" style="display:inline-block;">
                  
                  
              </div>
              <div id="logout">
              <a href="logout.php">
                  <button id="logoutbtn">Logout</button>
                  </a>
              </div>
              
            </div>
            
            <div id="notificationsArea" >
                <span id="hotNote">
                This is a Notifications &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:blue"><a href="lastactivity.html">Details</a></font>
                <button onclick="closetip(\'#notificationsArea\')" id="closethetip">X</button>
                </span>
            </div>
            </div>
            <div id="main-profile" onmouseover="mouseOnProfile(1)" onmouseout="mouseOnProfile(0)">
                <div id="profile-start">
                    
                    <img id="my-face" src="'.$ppics.'" alt="'.$firstname.'"/>
                    <div id="formyface" onmouseover="sftooltip(\'#formyface\')"><input type="button" value="Change" class="changeppic" onclick="chngppic('.$user_id.')"></span></div>
                    <div id="optionslist"><br/><br/>
                        <span id="p-heads">'.$firstname.'</span><hr/>
                        <ul id="selfs">
                        <li id="p-op-profile"><a href="profile.html">Profile</a></li>
                        <li id="p-op-people" onclick="expandMenu(\'#pplOptions\',\'#p-op-people>#dropIcon\')">People <span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></li>
                        <li id="pplOptions">
                            <ul id="expandOfppl">
                                <li id="pplrequests">Requests </li>
                                <li id="pplrelations">Relations </li>
                                <li id="pplsent">Sent Requests</li>
                            </ul>
                        </li>
                        <li id="p-op-msgs" onclick="expandMenu(\'#msgOptions\',\'#p-op-msgs>#dropIcon\')">Messages <span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></li>
                        <li id="msgOptions">
                            <ul id="expandOfmsg">
                                <li id="msgInbox" onclick="ViewContent(\'#notificationsArea\')">Inbox </li>
                                <li id="msgOutbox" onclick="ViewContent(\'#notificationsArea\')">Outbox </li>
                                <li id="msgTrash" onclick="ViewContent(\'#notificationsArea\')">Trash </li>
                            </ul>
                        </li>
                        <li id="p-op-ntfs" onclick="ViewContent(\'#notificationsArea\')" ><a href="profile.html">Notifications</a></li>
                        <li id="p-op-grps"><a href="profile.html">Groups</a></li>
                        <li id="p-op-psts" onclick="expandMenu(\'#postOptions\',\'#p-op-psts>#dropIcon\')">Posts <span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></li>
                        <li id="postOptions">
                            <ul id="expandOfpost">
                                <li id="msgInbox" onclick="ViewContent(\'#notificationsArea\')">My Posts </li>
                                <li id="msgOutbox" onclick="ViewContent(\'#notificationsArea\')">New Post </li>
                        
                            </ul>
                        </li>
                        <li id="curpage"><a href="profile.html" >What\'s Up</a></li></ul><br/>
                        <span id="p-heads"> Utilities</span>
                        <hr/>
                        <ul id="p-utils">
                        <li ><a href="profile.html">My Files</a></li>
                        <li id="p-opbtns"><a href="profile.html">My Stuffs</a></li>
                        </ul>
                        <br/>
                        <span id="p-heads"> Control Panel</span>
                        <hr/>
                        <ul id="p-cpnal">
                        <li ><a href="profile.html">Change Password</a></li>
                        <li id="p-opbtns"><a href="profile.html">Settings</a></li>
                        </ul><br/>
                        <span id="p-heads"> Main Panel</span>
                        <hr/>
                        <ul id="about_mp">
                            <li  id="mp-heads">  <span>Theme</span></li>
                            <li>
                                <ul id="p-mtheme">
                                    <li><span id="mp-thme-sf" onclick="applyProfTheme(\'#mp-thme-sf\')">Aa</span></li>
                                    <li><span id="mp-thme-bw" onclick="applyProfTheme(\'#mp-thme-bw\')">Aa</span></li>
                                     <li><span id="mp-thme-rg" onclick="applyProfTheme(\'#mp-thme-rg\')">Aa</span></li>
                                    <li><span id="mp-thme-sb" onclick="applyProfTheme(\'#mp-thme-sb\')">Aa</span></li>
                                    
                                </ul>
                            
                            </li>
                            
                            <li style="border: none;color: crimson;" onclick="customProfTheme()">Custom Theme</li>
                            <li  id="mp-heads"><span>Position</span></li>
                            <li id="p-op-neverHide"   onclick="setProfBar(\'nohide\')">Never Hide</li>
                            <li id="p-op-hide"  onclick="setProfBar(\'hidenseek\')">Hide & Show</li>
                        </ul>
                        <!-- for custom theme generation-->
                        <div id="prof-custom-Theme">
                            <div id="title_for_window">Set Custom Theme <span id="closeForWindow" onclick="closeCusThmeWin()">X</span></div>
                            <div id="window_content">
                                <input id="cusThmeBC" type="color" onchange="cusThmeChnge(\'#cusThmeBC\',\'#cusThmeBCR\',\'bc\')"   style="position:absolute;top:-500px;"/>
                                <input id="cusThmeC" type="color" onchange="cusThmeChnge(\'#cusThmeC\',\'#cusThmeCR\',\'c\')"   style="position:absolute;top:-500px;"/>
                                Background Color <button id="cusThmeBCR" onclick="document.getElementById(\'cusThmeBC\').click()">Edit</button><br/>
                                Text Color <button id="cusThmeCR" onclick="document.getElementById(\'cusThmeC\').click()">Edit</button><br>
        
                                <button id="cusThmePreBtn" onclick="CusThmeOk()"> Apply </button>
                                
                            </div>
                            </div>
                        
                    </div>
                     <div id="whatsOnTop" onmouseover="whatsOnTop()" > 
                        <span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                    </div>
                    <div id="whatsOnDown" onmouseover="whatsOnDown()" > 
                        <span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                    </div>
                </div>
            </div>
            <div id="FocusPageCenter">
                <br/>
                <div id="firstView">
                    <div id="contentoffirst">
                        <div id="startupnote">
                        <span id="lastLogin">Last Login : </span>
                        <span id="llanswer">On March 15 2013 , 7.00 pm from Chrome Browser Chennai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:blue"><a href="lastactivity.html">Details</a></font>
                        </span><span id="forclosingTip"><button onclick="closetip(\'#startupnote\')" id="closethetip">X</button></span>
                        </div>
                        </div>
                </div>
                <div id="firstViewMsgs">
                    <div id="msgitem">
                        
                    </div>
                </div>
                <div id="TheWhatsUp" onmouseover="mouseOnWU(1)" onmouseout="mouseOnWU(0)">
                    <!--Start of The Post-->
                     <div id="postWhole">
                         <div id="forFullScreenMedia" class="fullScreenMedia" onclick="closetip(\'#forFullScreenMedia\')">
                                     <span id="closePreview" onclick="closetip(\'#forFullScreenMedia\')">
                                 X &nbsp;&nbsp;Close
                             </span>
                                     <div id="fullScreenMediaContent">
                                     <img id="FullScreenMedia"  alt="caption" src="icons/post-testimg.jpg" title="Click to Close"/> 
                                     </div>
                                 </div>
                                                                         <!-- <div id="decBackground">  </div>-->
                        <!-- for preview media -->
                         <div class="openMediaPeview" id="openPreviewMedia1">
                             <span id="closePreview" onclick="closetip(\'#openPreviewMedia1\')">
                                 X &nbsp;&nbsp;Close
                             </span>
                             <div id="postPreviewDetails">
                                 
                                 <div id="details">
                                   <!-- <img onclick="whoAreThey(\'#postLikers\')" id="sf-likeIcon" src="icons/post-preview-like.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" id="post-sf-currentLike"><span class="likeCount">100</span> People Likes This Post</span><br/>
                                    <img  id="sf-likeIcon" src="icons/post-preview-unlike.png" alt="Likes"/>
                                    <span id="post-sf-currentUnlike"> <span class="unlikeCount">100</span> People Hates This Post</span><br/>
                                    <img id="sf-likeIcon" src="icons/post-sf-sts-rate.png" alt="Likes"/>
                                    <span id="post-sf-currentRate"> &nbsp;&nbsp;<span class="rateCount">100</span> people Rated this Post</span><br/>
                                    <img onclick="whoAreThey(\'comment\')" id="sf-likeIcon" src="icons/post-sf-comment.png" alt="like"/>
                                    <span onclick="whoAreThey(\'comment\')" id="post-sf-currentComments"> &nbsp;&nbsp;100 people Commented on this Post</span><br/>
                                -->
                                 </div>
                             </div>
                             <!--preview content starts-->
                             <div id="fullContent">
                                 <div id="postUser">
                                     <span id="postUserName"> &nbsp; &nbsp; Vijayakumar </span><span id="postTime">Sat 10:30</span>
                                     <img onclick="whoAreThey(\'#postLikers\')"  id="postStatusLike" src="icons/post-sf-liked.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" class="likeCount" id="post-sf-currentLike">100</span>
                                    <img  id="postStatusLike" src="icons/post-sf-unliked.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                    <img onclick="whoAreThey(\'#postRatings\')" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" class="rateCount" id="post-sf-currentRate">100</span>
                                    <button id="postnavbtn"><</button><button id="postnavbtn">></button>
                                 </div>
                                 <div id="postPreviewCaption">&nbsp;&nbsp;&nbsp; This is post  Caption but this is a good post you know?? </div>
                                 <div id="PostPreviewMediaContent">
                                 <img id="postImagePreview" onclick="FullpreviewMedia(\'#forFullScreenMedia\')" alt="caption" src="icons/post-testimg.jpg"/>
                                 </div>
                                 <!--full screen preview Starts-->
                                 
                                 <!--full screen ends-->
                                 <!-- about of preview media-->
                                 <div id="aboutThisPost">
                                     <span id="forPostLike"><span id="hintForPostControls">Like</span><img onclick="Likedone(1,100)" id="sf-likeIcon" class="likebtn" src="icons/post-sf-like.png" alt="like"/> 
                            <span id="hintForPostControls">Unlike</span><img onclick="Likedone(0,100)" id="sf-unlikeIcon" class="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/> </span>
                                     <span id="forPostRate"> <span id="hintForPostControls">Rate This Post &nbsp;&nbsp;&nbsp;</span>
                             <img id="sf-rateIcon"onclick="postRated(1,101)" class="rated1"   src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img id="sf-rateIcon" onclick="postRated(2,101)" class="rated2"  src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img id="sf-rateIcon" onclick="postRated(3,101)"  class="rated3" src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img id="sf-rateIcon" onclick="postRated(4,101)" class="rated4"  src="icons/post-sf-emptyRate.png" alt="like"/>
                            <img id="sf-rateIcon" onclick="postRated(5,101)" class="rated5"  src="icons/post-sf-emptyRate.png" alt="like"/></span>
                            <span id="forComment"><!--<input id="sf-commentInput" type="text" placeholder="Quick Comment" />--></span>
                            <span id="forShare">download&nbsp;&nbsp;<img id="sf-CommentIcon" style="width:25px;height:25px" onclick="ViewComment(\'#commentContentFull\')" src="icons/post-media-download.png" alt="like"/>&nbsp;&nbsp;<span id="hintForPostControls">Comment </span><img id="sf-CommentIcon" src="icons/post-sf-comment.png" alt="like"/><span id="hintForPostControls">Share</span><img id="sf-shareIcon" src="icons/post-sf-share.png" alt="like"/></span>
                            
                        </div>
                             </div>
                         </div>
                        <!-- preview ends-->
                        <!-- default screen content starts-->
                        <div id="postContentMain" onmouseover="mouseOnPostContent(\'#postDetailImps\',\'#postDetail\')" onmouseout="mouseOutPostContent(\'#postDetailImps\',\'#postDetail\')">
                             <div id="postDetailImps">
                                
                                    <img onmouseover="whoAreThey(\'#postLikers\')" onmouseout="hideWhoThey()" id="postStatusLike" src="icons/post-sf-sts-like.png" alt="Likes"/>
                                    <span  class="likeCount" id="post-sf-currentLike">100</span>
                                    <img  id="postStatusLike" src="icons/post-sf-sts-unlike.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                    <img onmouseover="whoAreThey(\'#postRatings\')" onmouseout="hideWhoThey()" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" class="rateCount" id="post-sf-currentRate">100</span>
                                    <span id="forMore" onclick="showMorePostDet(\'#postDetailImps\',\'#postDetail\')">></span>
                                    </div> 
                            
                            <div id="postDetail" style="display: none">
                                
                                    <img onmouseover="whoAreThey(\'#postLikers\')" onmouseout="hideWhoThey()" id="postStatusLike" src="icons/post-sf-sts-like.png" alt="Likes"/>
                                    <span  class="likeCount" id="post-sf-currentLike">100</span>
                                    <img  id="postStatusLike" src="icons/post-sf-sts-unlike.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                    <img onmouseover="whoAreThey(\'#postRatings\')" onmouseout="hideWhoThey()" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" class="rateCount" id="post-sf-currentRate">100</span>
                                
                                    <img  id="postStatusLike" src="icons/post-sf-sts-dwnld.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                    <img  id="postStatusLike" onmouseover="whoAreThey(\'#postCommenters\')" onmouseout="hideWhoThey()" src="icons/post-sf-sts-comment.png" alt="Likes"/> <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                    <img  id="postStatusLike"  onmouseover="whoAreThey(\'#postShares\')" onmouseout="hideWhoThey()" src="icons/post-sf-sts-share.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                     <span id="forMore"  onclick="showMorePostDet(\'#postDetail\',\'#postDetailImps\')">></span>
                                    </div> 
                               
                            <div id="postUser">
                                <span id="postUserName" style="cursor: pointer;" onmouseover="$(\'#forPeopleSedfedTag\').show();$(\'#QuickPostAccess\').hide();" onmouseout="$(\'#forPeopleSedfedTag\').hide();"> Vijayakumar </span>
                                <div id="postTime" style="display: inline" onmouseover="mouseOnPostMainDet(\'#forPostMainDetailTt\',\'-70px\',\'#postMainDetTtCont\',\'10 Mar 2015 - 10:30 PM\')" onmouseout="$(\'#forPostMainDetailTt\').hide()">Sat&nbsp;10:30</div>
                                <div style="display: inline" id="SedFedPostID" onmouseover="mouseOnPostMainDet(\'#forPostMainDetailTt\',\'-20px\',\'#postMainDetTtCont\',\'Post ID - 7898 \')" onmouseout="$(\'#forPostMainDetailTt\').hide()"><b>|</b>&nbsp;7898</div>
                                <div id="postDrivers" style="display: inline-block;"><div id="forPostDriverPrev"><div id="forSingleLine"></div><div id="postDriverPrev"></div></div><div id="postDrivCur"></div><div id="forPostDriverNext"><div id="postDriverNext"></div><div id="forSingleLine"></div></div></div>
                                <div id="forPostMainDetailTt">
                                    <div id="postMainDetTtAr"></div>
                                    <div id="postMainDetTtCont">Post ID</div>
                                </div>
                              <div id="forQuickProfileArrow"></div>
                                <div id="forPeopleSedfedTag" style="display:none" onmouseover="mouseOnSFTag(\'#forPeopleSedfedTag\')" onmouseout="mouseOutSFTag(\'Vijayakumar \',\'#SedFedUserName\',\'#forPeopleSedfedTag\',\'#forQPdmyDetails\')">
                                    
                                   
                                    <div id="forQPmyFirstApp" >
                                        <span id="SedFedUserName" >Vijayakumar </span><span id="SedFedUserAge">18+</span><br/>
                                    <div id="forQuickSFprofile" onmouseover="mouseOnQPsf(\'#forQuickSFprofile\')" onmouseout="mouseOutQPsf(\'#forQuickSFprofile\')">
                               <img onclick="Likedone(1,100,\'.likebtn\')" id="sf-likeIcon" class="likebtn" src="icons/post-sf-like.png" alt="like"/> <br/>
                            <img onclick="Likedone(0,100,\'.unlikebtn\')" id="sf-unlikeIcon" class="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/><br/><br/>
                                   
                                    <img onclick="quickpostRateclk(\'#quickpostrate1\')" id="quickpostrate1" src="icons/post-sf-emptyRate.png" alt="Rate"  style="height:20px;width: 20px;margin-left: 2px;margin-top: -9px;"/><br/>
                                
                            </div>
                                    <img  onmouseover="mouseOnQPface(\'Vijayakumar Vijay\',\'#SedFedUserName\',\'#forPeopleSedfedTag\',\'#forQuickSFprofile\',\'#forQPdmyDetails\')" onmouseout="mouseOutQPface(\'#forQuickSFprofile\')" id="SedFedUserFace" src="'.$ppics.'" alt="'.$firstname.'"/>
                                    <div id="forQPdmyDetails" onmouseover="mouseOnQPDet(\'#ttl\',\'#forQPdmyDetails\')" onmouseout="mouseOutQPDet(\'#ttl\')">
                                        <table>
                                            <tr>
                                                <td id="ttl1" style="display:none"><span id="forQPmyDetTtle">In</span></td><td><span id="forQPmyDetAns">Salem,Tamilnadu</span></td>
                                            </tr>
                                           
                                            <tr>
                                                 <td id="ttl2" style="display:none"><span id="forQPmyDetTtle">Feeling</span></td><td><span id="forQPmyDetAns">Busy</span></td>
                                               
                                            </tr>
                                           <!-- <tr>
                                                <td><span id="forQPmyDetTtle">Position</span></td><td><span id="forQPmyDetAns">Student</span></td>
                                            </tr>
                                            <tr>
                                                <td><span id="forQPmyDetTtle">Education</span></td><td><span id="forQPmyDetAns">Engineering</span></td> 
                                            </tr>
                                           -->
                                             <tr >
                                                 <td id="ttl3" style="display:none"><span id="forQPmyDetTtle">Status</span></td><td><span id="forQPmyDetAns">This status line should be 2 lines of words after...</span></td>
                                               
                                            </tr>
                                            <tr >
                                                <td id="ttl4" style="display:none"><span id="forQPmyDetTtle">About</span></td><td><span id="forQPmyDetAns">Silence is my Attitude Ever</span></td>
                                            </tr>
                                         
                                         </table>
                                    </div>
                                    
                                    </div>  
                                    
                                </div>   
                            </div>
                          <!--  <div id="postTime" style="margin: 0px;padding-left: 15px">Sat 10:30</div>-->
                            <div id="postCaption" onmousemove="mouseOnPostCap(event)">This is post  Caption but this is a good post you know?? </div>
                        <!-- default media content starts-->
                                                    <!--<div id="navigatePost">
                                                              <span id="postPrev"><</span> <span id="postNext">></span></div>-->
                                                    
                        <!-- default media content starts-->
                        <div id="mediacontent">
                            <div id="QuickPostAccess"  >
                            <div id="forQuickPostAccArrow"></div>
                            <div id="forQuickPostAcc">
                               <img onclick="Likedone(1,100,\'.likebtn\')" id="sf-likeIcon" class="likebtn" src="icons/post-sf-like.png" alt="like"/> <br/>
                            <img onclick="Likedone(0,100,\'.unlikebtn\')" id="sf-unlikeIcon" class="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/><br/><br/>
                                   
                                    <img onclick="quickpostRateclk(\'#quickpostrate1\')" id="quickpostrate1" src="icons/post-sf-emptyRate.png" alt="Likes"  style="height:20px;width: 20px;margin-left: 2px;margin-top: -9px;"/><br/>
                                
                            </div>
                            </div>
                            <img id="postImgs" onmousemove="mouseOnPostCap(event)" onclick="previewMedia(\'#openPreviewMedia1\')" alt="caption" src="icons/post-testimg.jpg"/>
                        </div>
                        
                        
                        
                        <!--media ended , about starts-->
                        <div id="aboutThisPost">
                            <span id="forPostLike"><img onclick="Likedone(1,100,\'.likebtn\')" id="sf-likeIcon" class="likebtn" src="icons/post-sf-like.png" alt="like"/> 
                            <img onclick="Likedone(0,100,\'.unlikebtn\')" id="sf-unlikeIcon" class="unlikebtn" src="icons/post-sf-unlike.png" alt="like"/> </span>
                            <span id="forPostRate">
                                <img onclick="postRated(1,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'67\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"   id="sf-rateIcon"  class="rated1" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(2,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'37\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  id="sf-rateIcon"  class="rated2" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(3,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'234\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  id="sf-rateIcon"   class="rated3" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(4,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'231\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  id="sf-rateIcon"  class="rated4" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img onclick="postRated(5,101,\'#quickpostrate1\')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'6\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"  id="sf-rateIcon"  class="rated5" src="icons/post-sf-emptyRate.png" alt="like"/></span>
                            <span id="forPostViews">12389 Views</span>
                            <span id="forShare">
                                <a href="icons/post-testimg.jpg" target="_blank"> <img src="icons/post-media-download.png" onmouseover="mouseOnPostDet1(\'#forPostDetailToolt\',\'#postDetailTtCont\',\'243\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();" id="sf-CommentIcon"/></a>&nbsp;&nbsp;
                                <img id="sf-CommentIcon" onmouseover="mouseOnPostDetCmnt(\'#postCommenters\',\'#forPostDetailToolt\',\'#postDetailTtCont\',\'100657687\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();" onclick="ViewComment(\'#commentContentFull\')" src="icons/post-sf-comment.png" alt="like"/>
                                <img id="sf-shareIcon"   onmouseover=" mouseOnPostDetCmnt(\'#postShares\',\'#forPostDetailToolt\',\'#postDetailTtCont\',\'65467\',event)" onmouseout="$(\'#forPostDetailToolt\').hide();"            src="icons/post-sf-share.png" alt="like"/></span>
                            <div id="forPostDetailToolt">
                                <div id="postDetailTtAr"></div>
                                <div id="postDetailTtCont">1000</div>
                            </div>
                        </div>
                        
                        <div id="commentContentFull">
                            <span id="commentTitle" title="Click to view All Comments" onclick="expandMenu(\'#previousComments\')">Comments &nbsp;&nbsp;&nbsp;<img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                                <form method="post">
                                    <input id="sf-commentInput" type="text" placeholder="What do you think?" />
                                    <div style="display: inline-block">
                                    <input type="color" id="colorComment" onchange="colortyped(\'#colorComment\',\'#sf-commentInput\')"/>
                                    <input type="button" onmouseover="mouseOnColorCmnt(1)" onmouseout="mouseOutColorCmnt(1)" onclick="document.getElementById(\'colorComment\').click();" id="colorCmntIcon" value="A"/>
                                    <input type="file" name="upload" id="attachCmnt" style="display:none" onchange="fileinserted(\'#attachCmnt\')"/>
                                    
                                     <div id="forCmntTtArrowUtil"></div>
                                    <div id="toolTipCmntUtils">Add a color to your comment</div>
                                    
                                    </div>
                                    <div id="forCommentAdds">
                                        <ol>
                                            <li ><img onclick="document.getElementById(\'attachCmnt\').click();" onmouseover="mouseOnCmntAttch(1)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead" src="icons/test-smiley.png" alt="smiley"/></li>
                                            <li><img onclick="document.getElementById(\'attachCmnt\').click();" onmouseover="mouseOnCmntAttch(2)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead" src="icons/test-atch.png" alt="smiley"/></li>
                                        </ol>
                                        <div id="forCmntArrow"></div>
                                        <div id="forCmntTtArrow"></div>
                                        <div id="toolTipCmntAdd"> Add an Attachment</div>
                                    </div>
                                    
                                    <div style="display: inline">
                                    <input onmouseover="mouseOnColorCmnt(2)" onmouseout="mouseOutColorCmnt(2)" type="button" onclick="showOptions(\'#forCommentAdds\')" id="attachCmntIcon" value="A"/>
                                    <input id="submitCmnt" type="submit" value="Comment"/>
                                    </div>
                                </form>
                            <div id="previousComments">
                                <div id="userCmntFull">
                                <span id="commentUser">Vijayakumar</span>
                                
                                <div id="hisComment">
                                    <span id="commentText">This is my comment for test</span>
                                    <span id="commentImage">
                                        <img src="icons/test-cmntImage.jpg" alt="cmntCaption"/>
                                    </span>
                                    <div id="aboutThisComment">
                                    <span id="forPostLike"><img onclick="Likedone(1,100)" id="sf-likeIcon" style="width:25px;height:25px" class="likebtn" src="icons/post-sf-like.png" alt="like"/> 
                            <img onclick="Likedone(0,100)" id="sf-unlikeIcon" class="unlikebtn" style="width:25px;height:25px" src="icons/post-sf-unlike.png" alt="like"/> </span>
                            <span id="forPostRate">
                                <img style="width:20px;height:20px" onclick="postRated(1,101)" id="sf-rateIcon"  class="rated1" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(2,101)" id="sf-rateIcon"  class="rated2" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(3,101)" id="sf-rateIcon"   class="rated3" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(4,101)" id="sf-rateIcon"  class="rated4" src="icons/post-sf-emptyRate.png" alt="like"/>
                                <img style="width:20px;height:20px" onclick="postRated(5,101)" id="sf-rateIcon"  class="rated5" src="icons/post-sf-emptyRate.png" alt="like"/></span>
                                        <span id="forCommentStatus">
                                            <img onclick="whoAreThey(\'#postLikers\')" class="cmntstslike" id="postStatusLike" src="icons/post-like-black.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" class="likeCount" id="post-sf-currentLike">100</span>
                                    <img  id="postStatusLike" class="cmntstslike" src="icons/post-unlike-black.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">100</span>
                                    <img onclick="whoAreThey(\'#postRatings\')" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'#postRatings\')" class="rateCount" id="post-sf-currentRate">100</span>
                                        
                                        </span>
                                        <span id="forShare"><img id="sf-CommentIcon" style="width:25px;height:25px" onclick="ViewComment(\'#commentContentFull\')" src="icons/post-media-download.png" alt="like"/><!--<img id="sf-shareIcon" src="icons/post-sf-share.png" alt="like"/>--></span>
                            
                        </div>
                                    
                                </div>
                                
                                </div>
                                </div>
                                
                                
                            </div>
                          
                           
                            
                          
                        </div>
                        
                        </div>
                        <!-- for extra-->
                        <div id="postDetails">
                            <div id="postLikers">
                              <span id="postDetailHead"> These People hit like </span><span id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <span id="user">Vijayakumar </span><br/>
                              <span id="user">Sakthikanth </span><br/>
                              <span id="user">Arulkumar   </span><br/>
                              <span id="user">Kirubakaran </span><br/>
                              <span id="user">YogeshWaran </span><br/>
                              
                            </div>
                            <div id="postRatings">
                                <span id="postDetailHead"> Ratings </span><span id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <div id="ratingHeads" onclick="expandMenu(\'#5raters\')">5 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (100) <span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span id="5raters" class="raterspans">
                              <span id="user">Vijayakumar </span><br/>
                              <span id="user">Sakthikanth </span><br/>
                              </span>
                              <div id="ratingHeads" onclick="expandMenu(\'#4raters\')">4 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2)<span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span id="4raters" class="raterspans">
                              <span id="user">Arulkumar   </span><br/>
                              </span>
                              <div id="ratingHeads" onclick="expandMenu(\'#3raters\')">3 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (54)<span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span id="3raters" class="raterspans">
                              <span id="user">Kirubakaran </span><br/>
                              </span>
                              <div id="ratingHeads" onclick="expandMenu(\'#2raters\')">2 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (32)<span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span id="2raters" class="raterspans">
                              <span id="user">YogeshWaran </span><br/>
                              </span>
                              <div id="ratingHeads" onclick="expandMenu(\'#1raters\')">1 Star  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (34)<span id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span id="1raters" class="raterspans">
                                  <span id="user">Prasanth</span>
                              </span>
                            </div>
                            <div id="postCommenters">
                               <span id="postDetailHead">Already Commented </span><span id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <span id="user">Vijayakumar </span><br/>
                              <span id="user">Sakthikanth </span><br/>
                              <span id="user">Arulkumar   </span><br/>
                              <span id="user">Kirubakaran </span><br/>
                              <span id="user">YogeshWaran </span><br/> 
                              
                            </div>
                            <div id="postShares">
                                 <span id="postDetailHead">Also Shared by </span><span id="closewho" onclick="$(\'#postDetails\').hide();">X</span><hr/>
                              <span id="user">Rocky </span><br/>
                              <span id="user">Sakkanth </span><br/>
                              <span id="user">Arkumar   </span><br/>
                              <span id="user">Kirubn </span><br/>
                              <span id="user">YshWaran </span><br/> 
                            </div>
                            <div id="postTagers">
                                
                            </div>
                            <div id="postReachers">
                                
                            </div>
                        </div>
                        
                     </div>
                    <!-- One Post Ended-->
                    <!--Between Space-->
                    <div id="spaceBetween">
                        This is a Space
                    </div>
                    <!--Ready for Next Post--> 
                    
                </div>
                
            </div>
            <div id="controlFocus" >
                <div id="whatFirst">
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
            <div id="LiveTimeLine">
                
            </div>
             <div id="aliveInSF">
                
                
            </div>
      
   
      
      
  </body>
</html>';
                                      
                                      }
                                      ?>
