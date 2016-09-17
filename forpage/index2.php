<?php session_start();
if(empty($_GET['page']))
{
    header("location:home.php");
}else
{
        require '../web/mysqli_connect.php';
          
    if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
    {
           $page_name=$_GET['page'];
           
           $q="select page_id as p from pages where page_name='$page_name'";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	        $et=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $page_id=$et['p'];
	 }
           }
           $q="select visits as v from page_status where page_id=$page_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	        $qw= mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $visited=$qw['v'];
	        $visited=$visited+1;
	        $q2="update page_status set visits=$visited where page_id=$page_id" ;
	        $r2=  mysqli_query($dbc, $q2);
	        
	 }else
	 {
	        $qw="insert into page_status (page_id,visits)values($page_id,1)";
	        mysqli_query($dbc, $qw);
	 }
	 
           }
           $page_name=$_GET['page'];
            $url='page.php?page='.urlencode($page_name);
		         header("location:$url");
    }else
    {
           $page_name=$_GET['page'];
           $page_name=$_GET['page'];
           
           $q="select page_id as p from pages where page_name='$page_name'";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	        $et=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $page_id=$et['p'];
	 }
           }
           $q="select visits as v from page_status where page_id=$page_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	        $qw= mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $visited=$qw['v'];
	        $visited=$visited+1;
	        $q2="update page_status set visits=$visited where page_id=$page_id" ;
	        $r2=  mysqli_query($dbc, $q2);
	        
	 }else
	 {
	        $qw="insert into page_status (page_id,visits)values($page_id,1)";
	        mysqli_query($dbc, $qw);
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
    <title> </title>
    
   <link rel="stylesheet" href="../web/newpost.css"/>
   
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   
    <script src="../web/srch_user_page.js" type="text/javascript"></script>
<script src="../web/page_post.js" type="text/javascript"></script>
	
   <script src="../web/pages.js" type="text/javascript"></script>
  </head>
    <body>';
           $user_id=$_SESSION['user_id'];
           $page_name=$_GET['page'];
           $q="select user_id as u,page_id as pid,theme as thm,title_color as tcle,page_pic as ppic,page_wall as p_wpic,showname as shn,website as web,slogan as sg,page_for as pgfor,app_style as aps,who_can_post as wcp,about as pg_abt,aim as aim,created as ctd,last_modified as mf  from pages where page_name='$page_name'";
       
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	        $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $admin_id=$row['u'];
	        $aim=$row['aim'];
	        $theme=$row['thm'];
	        $created=$row['ctd'];
	        $modified=$row['mf'];
	        $title_color=$row['tcle'];
	        $page_pic=$row['ppic'];
	        $page_wall=$row['p_wpic'];
	        $showname=$row['shn'];
	        $website=$row['web'];
	        $slogan=$row['sg'];
	        $page_for=$row['pgfor'];
	        $app_style=$row['aps'];
	        if($app_style!=="Wide")
	        {
	          echo '
    <link rel="stylesheet" href="../web/pages.css"/> 
  ';     
	        }else
	        {
	               echo '  <link rel="stylesheet" href="../web/page2style.css"/>';
	        }
	        $about_page=$row['pg_abt'];
	        $who_can_post=$row['wcp'];
	        $page_id=$row['pid'];
	       $q23="select first_name as f from basic where user_id=$admin_id";
		     $r23=mysqli_query($dbc,$q23);
		     if($r23)
		     {
		           $et=  mysqli_fetch_array($r23,MYSQLI_ASSOC);
		           $admin_name=$et['f'];
		     }
	 }else
	 {
	        header("location:../web");
	 }
           }
    
           $q="select post_id as p from post_permision where page_id=$page_id";
           $r=  mysqli_query($dbc, $q);
           $tot_post=  mysqli_num_rows($r);
    echo '
        <div id="content-full">
            
            <div class="pageTtlBar" style="background-color:'.$title_color.';">
                <div class="myPageTtl" style="color:'.$theme.'">
                    '.$page_name.'
                </div>
            </div>
            <div class="SedFed_pageId" title="Click for details" onclick="$(\'.pageIdBigDets\').slideToggle();"  onmouseover="$(\'.pageIdSmallTip\').fadeIn();" onmouseout="$(\'.pageIdSmallTip\').fadeOut();" >
                '.$page_id.'
            </div>
            <div class="pageIdSmallTip" style="display: none;" >
                SedFed Page ID  
            </div>
            <div class="pageIdBigDets" style="display: none;" >
                <div class="pageAddressItm">
                    www.sedfed.com/'.$page_name.'
                </div>
                <div class="pageAddressItm">
                    sedfed.com/'.$page_id.'
                </div>
            </div>
            <div class="pageActionNavs">
           
              
                <div class="pageNavItm">
                    Posts
                </div>
                
                <a href="photos.php"><div class="pageNavItm">
                    Photos
                </div></a>
                <a href="videos.php" ><div class="pageNavItm">
                    Videos
                </div></a>
                <div class="pageNavItm">
                    Wishes
                </div>
                <a href="files.php" >
                <div class="pageNavItm">
                    Files
                </div></a>
               
            </div>
             <div id="pageProfileTab" >
            
            <div class="pageInnerCont">
                <div class="myPageBackPicHoldr" style="background-image: url(\''.$page_wall.'\');" >
                    <div class="myPageNameOnBackPic">
                         '.$page_name.'
                    </div>
                    <!--
                    <div class="myPageActionsHolder">
                        <div class="myPageActFollow" id="actFollowPage"  >
                            <img class="ico_follow" src="icons/followFlag.png" />
                            Follow
                        </div>
                        <br/>
                        <div class="myPageActLike" >
                          <img class="ico_follow" src="../web/icons/post-preview-like.png" />
                           Like
                           <span class="pageActionCounts">
                               278
                           </span>
                        </div>
                        <br/>
                        <div class="myPageActUnlike" style="color: crimson;" onclick="likepage('.$admin_id.',2,'.$page_id.')">
                           <img class="ico_follow" src="../web/icons/post-sf-unliked.png" /> 
                           Unlike
                           <span class="pageActionCounts">
                               28
                           </span>
                        </div>
                      
                    </div> -->
                          
                </div>
                <div class="myPageProfPicHolder">
                    <img src=\''.$page_pic.'\' />
                </div>
               
            </div>';
    $q="select user_id as u,likes as lk,unlikes as ul,rating as rt,followers as fls,visits as v from page_status where  page_id=$page_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           $like=0;
           $unlike=0;
           $rating=0;
           $mylike=0;
           $myunlike=0;
           $myrate=0;
        $lkc=0;
        $ukc=0;
        $rtc=1;
        $flc=0;
        $my_follow=0;
        $visits=0;
        $tot_rate=0;
         $myrate_val=0;
           if(mysqli_num_rows($r)>0)
           {
	 while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	 {
	 $like=$row['lk'];
	 $unlike=$row['ul'];
	 $rating=$row['rt'];
	 $person_id=$row['u'];
	 $follower=$row['fls'];
	 $visits=$row['v'];
	 if($follower!=0)
	 {
	        $flc=$flc+1;
	      
	 }
	 if($like!=0)
	 {
	        $lkc=$lkc+1;
	      
	 }
	 if($unlike!=0)
	 {
	        $ukc=$ukc+1;
	      
	 }
	 if($rating!=0)
	 {
	        $rtc=$rtc+1;
	      
	   $tot_rate=$rating+$tot_rate;
	   
	 }
	 }
	 
           }
    }
    
    $avg_rate=$tot_rate/$rtc;
  
    echo'
            
            
              <div class="mPDB_rightCol">
                  <div class="myPageActionsOuter">
	 <input type="hidden" id="follw_value" value="'.$my_follow.'" />
                     ';
	     echo'
                    
                      
                       <div class="myPageDoRateHold">
                      ';
	  
	    
	    if($avg_rate>1 && $avg_rate<=2)
	    {
	           $avg_rate=2;
	    }else
	    {
	           if($avg_rate<=1)
	           {
		 $avg_rate=1;
	           }
	    }
	    if($avg_rate>2 && $avg_rate<=3)
	    {
	           $avg_rate=3;
	    }
	    if($avg_rate>3 && $avg_rate<=4)
	    {
	           $avg_rate=4;
	    }
	    if($avg_rate>4 && $avg_rate<=5)
	    {
	           $avg_rate=5;
	    }
	 echo ' </div>
                  </div>
                 
                        <div class="mPDB_colItmHoldr" id="mPDB_followers"  >
                            <div class="mPDB_cIHimg">
                                <span id="flo_cnt">'.$flc.'</span>
                            </div>
                            <div class="mPDB_cIHcount" >
                               followers
                            </div>
                        </div>
                        <div class="mPDB_colItmHoldr" id="mPDB_visits"  >
                            <div class="mPDB_cIHimg">
                                '.$visits.'
                            </div>
                            <div class="mPDB_cIHcount" >
                                visits
                            </div>
                        </div>
                        <div class="mPDB_colItmHoldr" id="mPDB_Posts" >
                            <div class="mPDB_cIHimg"  >
                                '.$tot_post.'
                            </div>
                            <div class="mPDB_cIHcount"  >
                               Posts
                            </div>
                        </div>
                        
                        <div class="mPDB_colItmHoldr" id="mPDB_Rates" >
                            <div class="mPDB_cIHimg"  >
                                <img src="../web/icons/post-rated-'.$avg_rate.'.png" class="ratedPage" />
                            </div>
                            <div class="mPDB_cIHcount"  >
                               Rating - '.$rtc.' 
                            </div>
	           <div id="page_raters"></div>
                        </div>
                        
                    </div>
            <div class="pageStaticContent">
                
                 <div class="myPageDetailsBench">
                    <div class="mPDB_LeftCol">
                         <div class="myPageDetBTtl">
                        About
                    </div>
                    <div class="myPageDetBabout">
                     '.$about_page.'  
                    </div>
                    </div>
                   
                  
                </div>
                <div id="for_page_post"></div>
                <div class="pageSecCont">
                    <div class="pageMoreDets">';
	
                        echo '<div class="pageMoreTtl">
                           More Details about this Page
                        </div>
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que" >
                                Slogan
                            </div>
                            <div class="PMD_Ans" style="font-family: cursive;font-size: 15px;color:orangered;" >
                             '.$slogan.'
                            </div>
                        </div>
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que">
                                Aim
                            </div>
                            <div class="PMD_Ans">
		 '.$aim.'
		 </div>
                        </div>
                      
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que">
                                This page is for
                            </div>
                            <div class="PMD_Ans">
                              '.$page_for.'
                            </div>
                        </div>
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que" style="border: none;" >
                                Website
                            </div>
                            <div class="PMD_Ans">
                                <a href="www.sedfed.com">'.$website.'</a> 
                            </div>
                        </div>
                    </div>
                    <div class="pageMoreMoreHold">';
	
                   echo ' </div>
                   
                </div>
                <div class="pageAboutBottom">
                    <div class="pageAboutItm">';
	   if($showname=="Show")
	   {
	          echo '          Page Admin <span class="PA_Ans">'.$admin_name.'</span>
              ';
	   }
                   echo ' </div>
                    <div class="pageAboutItm">
                        Created On <span class="PA_Ans"> '.$created.' </span>
                    </div>
                    <div class="pageAboutItm">
                        Last Updated <span class="PA_Ans">'.$modified.'</span>
                    </div>
                    <div class="pageAboutItm">
                        Page Address  <a href="../'.$page_name.'"><span class="PA_Ans">www.sedfed.com/'.$page_name.'</span></a>  or <a href="../pages/'.$page_id.'"><span class="PA_Ans">sedfed.com/pages/'.$page_id.'</span></a>
                    </div>
                    <div class="pageAboutItm" id="sedfedTM">
                        SedFed 2.0 <span id="pageVrs">SedFed Pages V 1.0</span>
                    </div>
                </div>
            </div>
            </div>
            <div id="groupMembersTab" style="left: 100%;display: none;" >
                <div class="groupMembersOuter">
                   
                 
            </div>
            
        </div>
    </body>
</html>
';
    }
    
}
?>