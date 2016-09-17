<?php session_start();
if(empty($_GET['page']))
{
    header("location:home.php");
}else
{
    
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
    
    <link rel="stylesheet" href="../web/pages.css"/> 
  <!--  <link rel="stylesheet" href="page2style.css"/> -->
    
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/pages.js" type="text/javascript"></script>
  </head>
    <body>
        <div id="content-full">
            
            <div class="pageTtlBar">
                <div class="myPageTtl">
                    Page Name
                </div>
            </div>
            <div class="SedFed_pageId" title="Click for details" onclick="$(\'.pageIdBigDets\').slideToggle();"  onmouseover="$(\'.pageIdSmallTip\').fadeIn();" onmouseout="$(\'.pageIdSmallTip\').fadeOut();" >
                10
            </div>
            <div class="pageIdSmallTip" style="display: none;" >
                SedFed Page ID  
            </div>
            <div class="pageIdBigDets" style="display: none;" >
                <div class="pageAddressItm">
                    sedfed.com/pageName
                </div>
                <div class="pageAddressItm">
                    sedfed.com/10
                </div>
            </div>
            <div class="pageActionNavs">
                <div class="pageNavItm">
                    Posts
                </div>
                <div class="pageNavItm">
                    Storage
                </div>
                <div class="pageNavItm">
                    Photos
                </div>
                <div class="pageNavItm">
                    Videos
                </div>
                <div class="pageNavItm">
                    Wishes
                </div>
               
            </div>
            
            <div class="pageInnerCont">
                <div class="myPageBackPicHoldr" style="background-image: url(\'../web/icons/post-testimg.jpg\');" >
                    <div class="myPageNameOnBackPic">
                         Test Page
                    </div>
                    <!--
                    <div class="myPageActionsHolder">
                        <div class="myPageActFollow" id="actFollowPage" onclick="pageActionFollow()" >
                          <!--  <img class="ico_follow" src="icons/followFlag.png" />
                            Follow
                        </div>
                        <br/>
                        <div class="myPageActLike">
                          <img class="ico_follow" src="../web/icons/post-preview-like.png" />
                           Like
                           <span class="pageActionCounts">
                               278
                           </span>
                        </div>
                        <br/>
                        <div class="myPageActUnlike" style="color: crimson;" >
                           <img class="ico_follow" src="../web/icons/post-sf-unliked.png" /> 
                           Unlike
                           <span class="pageActionCounts">
                               28
                           </span>
                        </div>
                      
                    </div> -->
                          
                </div>
                <div class="myPageProfPicHolder">
                    <img src=\'profileimg.PNG\' />
                </div>
               
            </div>
              <div class="mPDB_rightCol">
                  <div class="myPageActionsOuter">
                      <div class="MPA_Itm" id="followBtn" >
                          follow
                      </div>
                      <div class="MPA_Itm" id="likeBtn" >
                          Like 
                      </div>
                      <div class="MPA_Count" id="pageLikes" > 62 </div>
                      <div class="MPA_Itm" id="hateBtn" >
                          Hate 
                      </div>
                      <div class="MPA_Count" id="pageHates"> 62 </div>
                       <div class="myPageDoRateHold">
                      
                      <img class="ico_MPDR" src="../web/icons/post-sf-emptyRate.png" />
                      <img class="ico_MPDR" src="../web/icons/post-sf-emptyRate.png" />
                      <img class="ico_MPDR" src="../web/icons/post-sf-emptyRate.png" />
                      <img class="ico_MPDR" src="../web/icons/post-sf-emptyRate.png" />
                      <img class="ico_MPDR" src="../web/icons/post-sf-emptyRate.png" />
                  </div>
                  </div>
                 
                        <div class="mPDB_colItmHoldr" id="mPDB_followers"  >
                            <div class="mPDB_cIHimg">
                                78
                            </div>
                            <div class="mPDB_cIHcount" >
                               followers
                            </div>
                        </div>
                        <div class="mPDB_colItmHoldr" id="mPDB_visits"  >
                            <div class="mPDB_cIHimg">
                                378
                            </div>
                            <div class="mPDB_cIHcount" >
                                visits
                            </div>
                        </div>
                        <div class="mPDB_colItmHoldr" id="mPDB_Posts" >
                            <div class="mPDB_cIHimg"  >
                                878
                            </div>
                            <div class="mPDB_cIHcount"  >
                               Posts
                            </div>
                        </div>
                        
                        <div class="mPDB_colItmHoldr" id="mPDB_Rates" >
                            <div class="mPDB_cIHimg"  >
                                <img src="../web/icons/post-rated-3.png" class="ratedPage" />
                            </div>
                            <div class="mPDB_cIHcount"  >
                               Rating - 3
                            </div>
                        </div>
                        
                    </div>
            <div class="pageStaticContent">
                
                 <div class="myPageDetailsBench">
                    <div class="mPDB_LeftCol">
                         <div class="myPageDetBTtl">
                        About
                    </div>
                    <div class="myPageDetBabout">
                        This is the official page of SedFed.This is the official page of SedFed.This is the official page of SedFed.This is the official page of SedFed.This is the official page of SedFed.
                       
                    </div>
                    </div>
                   
                  
                </div>
                <div class="pageSecCont">
                    <div class="pageMoreDets">
                        <div class="newPostInPage">
                            Publish New Post in this Page
                        </div>
                        <div class="pageMoreTtl">
                           More Details about this Page
                        </div>
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que" >
                                Slogan
                            </div>
                            <div class="PMD_Ans" style="font-family: cursive;font-size: 15px;color:orangered;" >
                               This is the slogan
                            </div>
                        </div>
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que">
                                Aim
                            </div>
                            <div class="PMD_Ans">
                               This is the aim text
                            </div>
                        </div>
                      
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que">
                                This page is for
                            </div>
                            <div class="PMD_Ans">
                               Everyone
                            </div>
                        </div>
                        <div class="pageMoreDetItm">
                            <div class="PMD_Que" style="border: none;" >
                                Website
                            </div>
                            <div class="PMD_Ans">
                                <a href="www.sedfed.com">www.sedfed.com</a> 
                            </div>
                        </div>
                    </div>
                    <div class="pageMoreMoreHold">
                    <div class="pageMoreItm">
                       Update Page Settings
                    </div>
                    </div>
                   
                </div>
                <div class="pageAboutBottom">
                    <div class="pageAboutItm">
                        Page Admin <span class="PA_Ans">Vijayakumar</span>
                    </div>
                    <div class="pageAboutItm">
                        Created On <span class="PA_Ans"> 1 Jan 2015</span>
                    </div>
                    <div class="pageAboutItm">
                        Last Updated <span class="PA_Ans">1 Jul 2015</span>
                    </div>
                    <div class="pageAboutItm">
                        Page Address  <a href="sedfed.com/pageName"><span class="PA_Ans">sedfed.com/pageName</span></a>  or <a href="sedfed.com/pages/1"><span class="PA_Ans">sedfed.com/pages/1</span></a>
                    </div>
                    <div class="pageAboutItm" id="sedfedTM">
                        SedFed 2.0 <span id="pageVrs">SedFed Pages V 1.0</span>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
';
}
?>