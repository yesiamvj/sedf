<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
        
 }  else {
        include '../web/title_bar.php';       
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
    <title>Create New Group - SedFed</title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'createPage.css"/>
   <script src="jquery.min.js"></script>
  <script src="createpage.js" type="text/javascript"></script>
  
  </head>
    <body>
    <input type="hidden" value="2" id="for_grp_page_add_mems"/>
    <div id="added_members"></div>
        <div id="content-full">
        <form method="post" action="creategroup_prcs.php"  enctype="multipart/form-data">
            <div class="pageSubTtl" id="pageSubTtlBar" >
                <span id="pageSubName">Create New Group</span>
            </div>
            <div class="pageInnerCont">
                <input type="file" name="page_pic" id="my_page_pic" onchange="put_page_pic(this,1)"/>
                <input type="file" name="wall_pic" id="my_page_wall_pic" onchange="put_page_pic(this,2)"/>
                
                <div class="pageWallPic" style="display: none;" >
                  
                </div>
                <div class="pageProfPic" style="display: none" >
                    
                </div>
                <div class="emptyPageWallPic" onclick="$(\'#my_page_wall_pic\').click();">
                    <span class="empHint"> Upload a WallPaper</span>  
                </div>
                <div class="emptyPageProfPic"  onclick="$(\'#my_page_pic\').click();">
                   
                </div>
                <div class="pageNewFrom">
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                             Group  Name
                         </div>
                         <div class="newPageAns">
                             <input type="text" name="page_name" oninput="check_pagename(this.value);fillTtlBar()"  placeholder="Your new Group name" />
                             <script>
                                 function fillTtlBar(){
                                     if($(\'#pageName\').val()===\'\'){
                                         $(\'#pageSubName\').text(\'Create New Group\');
                                     }
                                     else{
                                         $(\'#pageSubName\').text($(\'#pageName\').val());
                                     }
                                 }
                             </script>
	             <span id="username_relst"></span>
                         </div>
                    </div>
	   <div id="for_add_members"></div>
                     <div class="newPagePicSlct" onclick="$(\'#page_wall_pic\').click();">
                        Upload Wallpaper
                    </div>
                    <div class="newPagePicSlct" onclick="$(\'#page_pic\').click();">
                        Upload Profile Picture
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                             Group / Organization Theme Color
                         </div>
	         <div class="newPageAns">
                             Invite Members
	            <input type="text"  oninput="fillTtlBar()" onclick="open_add_members()"  placeholder="Invite members" />
                          
                         </div>
	        <div id="group_added_members"><input type="hidden" value="'.$user_id.'" name="grp_page_mems[]" /></div>
	           
	        <input type="hidden" id="grp_add_mem" value="48"/>
                      
                        <div class="newPageAns" >
                            Title Bar Color
                            <div class="colorInpBtns" id="ttlBarClr" onclick="$(\'#myOrgThme\').click();"  >
                                Choose color
                            </div>
                            Title Color
                            <div class="colorInpBtns" id="ttlTextClr" onclick="$(\'#myTextClr\').click();" >
                                Choose Title Color
                            </div>
                         </div>
                        
                        <input type="color" name="title_bar_clr" oninput="$(\'#pageSubTtlBar\').css({\'background-color\':$(\'#myOrgThme\').val()});" onchange="$(\'#pageSubTtlBar\').css({\'background-color\':$(\'#myOrgThme\').val()});" style="display: none" />
                        <input type="color" name="txt_clr" oninput="$(\'#pageSubName\').css({\'color\':$(\'#myTextClr\').val()});" onchange="$(\'#pageSubName\').css({\'color\':$(\'#myTextClr\').val()});" style="display: none" />
                    </div>
                   
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            About
                         </div>
                         <div class="newPageAns">
                             <textarea name="abt_page" placeholder="About your page / Organisation" >
                                 
                             </textarea>
                         </div>
                    </div><br/>
                     <div class="newPageFormItm">
                         <div class="newPageQue" style="display: inline" >
                             Who can post in your page ?
                         </div>
                         <div class="newPageAns" style="display: inline"  >
                             <select name="who_can_post">
                                 <option>Anyone</option>
                                
                                 <option>Followers</option>
                                
                                 <option>Only me</option>
                             </select>
                         </div>
                    </div>
                    <br/><br/>
                    <div class="newPageFormItm">
                         <div class="newPageQue" style="display: inline">
                             Admin name in  Group
                         </div>
                         <div class="newPageAns" style="display: inline">
                             <select name="allow_name">
                                 <option>Show</option>
                                
                                 <option>Hide</option>
                                
                                 
                             </select>
                         </div>
                    </div>
                    <div class="showMoreOptions" onclick="$(\'#morePageOptions\').slideToggle();" >
                        More Options &nbsp;&nbsp;&nbsp;( &nbsp; Optional &nbsp; )
                    </div>
                    <div id="morePageOptions" style="display: none;" >
                        
                    
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                             Website related to this Group
                         </div>
                         <div class="newPageAns">
                             <input type="text" name="website" placeholder="Your new page name" />
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Slogan of your page / Company
                         </div>
                         <div class="newPageAns">
                             <input type="text" name="slogan" placeholder="Your organisation\'s Slogan" />
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Aim of your Group
                         </div>
                         <div class="newPageAns">
                             <input type="text" name="aim" placeholder="Your organisation\'s Aim" />
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Your page is for
                         </div>
                         <div class="newPageAns">
                             <input type="text" name="page_for" placeholder="This group is Exclusively for" />
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Group Appearance Style
                         </div>
                         <div class="newPageAns">
                             <select name="app_style">
                                 <option>
                                     Wide
                                 </option>
                                 <option>
                                     Compact
                                 </option>
                             </select>
                         </div>
                    </div>
                        </div>
                   
                    <input type="submit" value="Create Group" id="newPageSubmit" >
                        
                    </div>
	   </form>
	   <div id="result_div" style="display:none"></div>
                </div>
            </div>
        </div>
    </body>
</html>
';
           
include '../web/notifs.html';
}