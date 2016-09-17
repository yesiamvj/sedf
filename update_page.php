<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_SESSION['page_id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $page_id=$_SESSION['page_id'];
    require 'mysqli_connect.php';
     $q="select user_id as u,page_name as pgn,page_id as pid,theme as thm,title_color as tcle,page_pic as ppic,page_wall as p_wpic,showname as shn,website as web,slogan as sg,page_for as pgfor,app_style as aps,who_can_post as wcp,about as pg_abt,aim as aim,created as ctd,last_modified as mf  from pages where page_id='$page_id'";
       
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	        $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $admin_id=$row['u'];
	        if($admin_id!=$user_id)
	        {
	               header("location:../pages/$page_id");
	        }
	        $aim=$row['aim'];
	        $theme=$row['thm'];
	        $created=$row['ctd'];
	        $page_name=$row['pgn'];
	        $modified=$row['mf'];
	        $title_color=$row['tcle'];
	        $page_pic=$row['ppic'];
	        $page_wall=$row['p_wpic'];
	        $showname=$row['shn'];
	        $website=$row['web'];
	        $slogan=$row['sg'];
	        $page_for=$row['pgfor'];
	        $app_style=$row['aps'];
	        $about_page=$row['pg_abt'];
	        $who_can_post=$row['wcp'];
	        $page_id=$row['pid'];
	        $q2="select c_name as c from contacts where user_id=$user_id and cu_id=$admin_id";
	        $r2=  mysqli_query($dbc, $q2);
	        if($r2)
	        {
	               if(mysqli_num_rows($r2)>0)
	               {
		     $et=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
		     $admin_name=$et['c'];
	               }else
	               {
		     $q23="select first_name as f from basic where user_id=$admin_id";
		     $r23=mysqli_query($dbc,$q23);
		     if($r23)
		     {
		           $et=  mysqli_fetch_array($r23,MYSQLI_ASSOC);
		           $admin_name=$et['f'];
		     }
	               }
	        }
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
    <title>Create New Page - SedFed</title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'createPage.css"/>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="jquery.min.js"></script>
   
   <script src="pages.js" type="text/javascript"></script>
  
  </head>
    <body>
        <div id="content-full">
            <div class="pageSubTtl" id="pageSubTtlBar" style="background-color:'.$title_color.'">
                <span id="pageSubName" style="color:'.$theme.'">Update '.$page_name.' Page</span>
            </div>
            <div class="pageInnerCont">
                <input type="file" id="page_pic" onchange="put_page_pic(this,1)"/>
                <input type="file" id="page_wall_pic" onchange="put_page_pic(this,2)"/>
                
                <div class="pageWallPic"  >
                   </div>
                <div class="pageProfPic"  >
                    <img src="'.$page_pic.'" />
                </div>
                
                 <div class="emptyPageWallPic" style="background-image:url('.$page_wall.');" onclick="$(\'#page_wall_pic\').click();">
                    <span class="empHint"> Upload a WallPaper</span>  
                </div>
                <div class="pageNewFrom">
                    <div class="newPageFormItm">
                         
                         <div class="newPageAns">
                             <script>
                                 function fillTtlBar(){
                                     if($(\'#pageName\').val()===\'\'){
                                         $(\'#pageSubName\').text(\'Create New Page\');
                                     }
                                     else{
                                         $(\'#pageSubName\').text($(\'#pageName\').val());
                                     }
                                 }
                             </script>
                         </div>
                    </div>
                     <div class="newPagePicSlct" onclick="$(\'#page_wall_pic\').click();">
                        Upload Wallpaper
                    </div>
                    <div class="newPagePicSlct" onclick="$(\'#page_pic\').click();">
                        Upload Profile Picture
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                             Page / Organization Theme Color
                         </div>
                      
                        <div class="newPageAns"  >
                            Title Bar Color
                            <button class="colorInpBtns" id="ttlBarClr" onclick="$(\'#myOrgThme\').click();"  >
                               Choose color
                            </button>
                            Title Color
                            <button class="colorInpBtns" id="ttlTextClr" onclick="$(\'#myTextClr\').click();" >
                                Choose Title Color
                            </button>
                         </div>
                        
                        <input type="color" value="'.$title_color.'" id="myOrgThme" oninput="$(\'#pageSubTtlBar\').css({\'background-color\':$(\'#myOrgThme\').val()});" onchange="$(\'#pageSubTtlBar\').css({\'background-color\':$(\'#myOrgThme\').val()});" style="display: none" />
                        <input type="color" id="myTextClr" value="'.$theme.'" oninput="$(\'#pageSubName\').css({\'color\':$(\'#myTextClr\').val()});" onchange="$(\'#pageSubName\').css({\'color\':$(\'#myTextClr\').val()});" style="display: none" />
                    </div>
                   
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            About
                         </div>
                         <div class="newPageAns">
                             <textarea id="about_page" value="'.$about_page.'" placeholder="About your page / Organisation" >
                                                              </textarea>
                         </div>
                    </div><br/>
                     <div class="newPageFormItm">
                         <div class="newPageQue" style="display: inline" >
                             Who can post in your page ?
                         </div>
                         <div class="newPageAns" style="display: inline"  >
                             <select id="who_can_post" >
		 <option>'.$who_can_post.'</option>
                                 <option>Anyone</option>
                                
                                 <option>Followers</option>
                                
                                 <option>Only me</option>
                             </select>
                         </div>
                    </div>
                    <br/><br/>
                    <div class="newPageFormItm">
                         <div class="newPageQue" style="display: inline">
                             Admin name in  page
                         </div>
                         <div class="newPageAns" style="display: inline">
                             <select id="allow_myname">
	            <option>'.$showname.'</option>
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
                             Website related to this Page
                         </div>
                         <div class="newPageAns">
                             <input type="text" id="page_website" placeholder="Your new page name" value="'.$website.'" />
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Slogan of your page / Company
                         </div>
                         <div class="newPageAns">
                             <input type="text" id="slogan" placeholder="Your organisation\'s Slogan" value="'.$slogan.'" />
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Aim of your page  
                         </div>
                         <div class="newPageAns">
                             <input type="text" id="aim_page" placeholder="Your organisation\'s Aim" value="'.$aim.'"/>
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Your page is for
                         </div>
                         <div class="newPageAns">
                             <input type="text" id="page_for" placeholder="This page is Exclusively for" value="'.$page_for.'"/>
                         </div>
                    </div>
                    <div class="newPageFormItm">
                         <div class="newPageQue">
                            Page Appearance Style
                         </div>
                         <div class="newPageAns">
                             <select id="app_style">
	            <option>'.$app_style.'</option>
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
                   
                    <div id="newPageSubmit" onclick="updatepage('.$page_id.')">
                        Update Page
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
';
}