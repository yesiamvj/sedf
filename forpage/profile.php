<?php session_start();
if(empty($_GET['pass1']))
{
    header("location:index.php");
}else
{
    require '../web/mysqli_connect.php';
    
   $myuser_name=$_GET['pass1'];
      
				$today = date("g:i a ,F j, Y"); 
    $q="select user_id as u from users where username='$myuser_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u'];
       $q="insert into history(profile_view,user_id,time,seen)values(1,$user_id,'$today',0)";
       $r=mysqli_query($dbc,$q);
    }
    
      
   if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
   {
      $url='selfprofile.php?pass1='.urlencode($myuser_name);
         
    header("location:$url");
   }else
   {
       
   
  
     
   $q="select first_name as f_name from basic where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $f_name=$row['f_name'];
   }

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
$q6="SELECT  cur_loc as cl ,living_in as li from my_location where user_id=$user_id";
$r6=mysqli_query($dbc,$q6);
if($r6)
{
if(mysqli_num_rows($r6)>0)
{
  $row6=mysqli_fetch_array($r,MYSQLI_ASSOC);
$curloc=$row6['cl'];
$living_in=$row6['li'];

}else
{
$curloc="";
$living_in="";

}
}

 echo'<!DOCTYPE html>
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
    <link rel="stylesheet" href="../../web/profile.css"/>
   <script src="../web/angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/profile.js" type="text/javascript"></script>
  </head>
  
  <body onload="setWallpaper()"  >
        <div id="fullPageContainer">
            <div id="pageLoadStatus"></div>
                <div id="Topest">

                    <div id="title_bar">

                      <font id="sedfedUserName" >'.$f_name.' ';
                      $q1="select mythink as m,mythink_image as img ,mythink_bgm as aud from status where user_id=$user_id order by think_id desc";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
if(mysqli_num_rows($r1)>0)
{
  $row8=mysqli_fetch_array($r1);
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
 $q11="select likes as l from history where likes=$user_id";
   $r11=mysqli_query($dbc,$q11);
   $totlikepers=mysqli_num_rows($r11);


                                     $uc=0;
                                     $rt=0;
                                     $lc=0;
                                     $shr=0;
                                     $dwn=0;
                                     $cmt=0;
                             $q="select post_id as u from post_permision where user_id=$user_id";
                             $r=mysqli_query($dbc,$q);
                             if($r)
                             {
                                    
                                 if(mysqli_num_rows($r)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                     {
                                         $post_id=$row['u'];
                                         
                           $q11="select like_userid as lk ,unlike_userid as un,rating as rt from post_status where post_id=$post_id";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                                 
                                   
                                 if(mysqli_num_rows($r11)>0)
                                 {
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
                                         $lkc=$row['lk'];
                                         $ukc=$row['un'];
                                         $rkt=$row['rt'];
                                         if($lkc!=0)
                                         {
                                             $lc=$lc+1;
                                         }
                                         if($ukc!=0)
                                         {
                                             $uc=$uc+1;
                                         }
                                         if($rkt!=0)
                                         {
                                            $rt=$rt+1;
                                         }
                                     }
                                 }  else {
                                     
                                     $lc=0;
                                     $uc=0;
                                     $rt=0;
                                 }
                             }
                                         $q2="select cmnt_id from post_comments where commenter_useri_d=$user_id";
                                         $r2=mysqli_query($dbc,$q2);
                                         if($r2)
                                         {
                                             
                                             if(mysqli_num_rows($r2)>0)
                                             {
                                                 
                                                 while($rop=mysqli_fetch_array($r2,MYSQLI_ASSOC))
                                                 {
                                                     $cmt=$cmt+1;
                                                 }
                                             }
                                         }
                                         $q3="select user_id  from post_download where post_id=$post_id";
                                         $r3=mysqli_query($dbc,$q3);
                                         if($r3)
                                         {
                                             if(mysqli_num_rows($r3)>0)
                                             {
                                                 
                                                 while($rops=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                 {
                                                     $dwn=$dwn+1;
                                                 }
                                             }
                                         }
                                         $q4="select user_id from post_share where post_id=$post_id";
                                         $r4=mysqli_query($dbc,$q4);
                                         if($r4)
                                         {
                                             if(mysqli_num_rows($r4)>0)
                                             {
                                                 
                                                 while($rops=mysqli_fetch_array($r4,MYSQLI_ASSOC))
                                                 {
                                                     $shr=$shr+1;
                                                 }
                                             }
                                         }
                                               
                                     }
                                 }
                             }
                            
                             
                             $q="select verified_users from verify where user_id=$user_id  order by verify_id desc";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {

                                  if(mysqli_num_rows($r)>0)
                                  {
                                    $row=mysqli_fetch_array($r);
                                    $q="select veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                      $row=mysqli_fetch_array($r);

                                      if(empty($row))
                                      {
                                        $times=0;
                                      }else
                                      {
                                         $times=$row['vt'];
                                      if($times==5 || $times>5)
                                      {
                                        echo "";
                                      }else
                                      {
                                       
                                      }
                                }
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                    }

                                    
                                  }else
                                  {
                                    $times=0;
                               
                                  }
                                }
   
                      echo'</font>

                    </div>

                </div>
            <div id="innerPageCont">
               
                <div id="sf-wallpprHoldr" onclick="meOnWallppr()" onmouseover="//meOnWallppr()" onmouseout="//meOutWallppr()" style=" background-image:url(\'../../web/icons/post-testimg.jpg\')" >
                    <!-- image is in as background for better result -->
                    <div id="chngeWallPic" onclick="$(\'#chngewallpic\').click()" >
                        Change
                        <input id="chngewallpic" type="file" style="display: none"/>
                    </div> 
                </div>
                <div id="myProfilePicOnWall">
                                <img src="profileimg.png" alt="'.$f_name.'" onclick="showMyFace()"/>
                                
                            </div>  
                <img id="img-wallpaper" onclick="setWallpaper()" src="../../web/icons/post-testimg.jpg"  alt="wallpaper"/>
                <div id="sf-profileHolder" >
                    <div id="howThisPerson" >
                        <div id="innerHTP">
                            <div id="me-LikeHold" class="hTP-holders"  >
                                <img src="../../web/icons/post-sf-like.png" alt="Likes" /><span id="meLikes">&nbsp;&nbsp; '.$lc.'</span> 
                        </div>
                        <div id="me-UnlikeHold" class="hTP-holders" >
                            <img src="../../web/icons/post-sf-unlike.png" alt="Unlikes" /><span id="meUnlikes">&nbsp;&nbsp; '.$uc.'</span>
                        </div>
                        <div id="me-RateHold" class="hTP-holders" >
                            <img src="../../web/icons/post-sf-emptyRate.png" alt="Rates" /><span id="meRates">&nbsp;&nbsp; '.$rt.'</span>
                        </div>
                        <div id="me-CommentHold" class="hTP-holders" >
                            <img src="../../web/icons/post-sf-comment.png" alt="Comments" /><span id="meComments">&nbsp;&nbsp; '.$cmt.'</span>
                        </div>
                        <div id="me-ShareHold" class="hTP-holders" >
                            <img src="../../web/icons/post-sf-share.png" alt="Shares" /><span id="meShares">&nbsp;&nbsp; '.$shr.'</span>
                        </div>
                        </div>
                        
                        
                    </div>';
                      
                    
                    echo'
                    <div id="howThisPersonStuffs" style="display: none;">
                        <div id="innerHTP">
                            <a href="loggedin.html">  <div  class="hTP-holders">
                                <img src="../../web/icons/prof-posts.png" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; Posts</span> 
                        </div>
                                </a> 
                        <a href="storage.php">
                        <div  class="hTP-holders">
                            <img src="../../web/icons/prof-files.png" alt="Like This Person" /><span id="meRates">&nbsp;&nbsp; Storage</span>
                        </div>
                            </a> 
                        <a href="photos.html"> 
                            <div  class="hTP-holders">
                            <img src="../../web/icons/prof-images.png" alt="Like This Person" /><span id="meUnlikes">&nbsp;&nbsp; Photos</span>
                        </div>
                            </a>
                        <a href="photos.html">
                        <div  class="hTP-holders">
                            <img src="../../web/icons/prof-video.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; Videos</span>
                        </div>
                            </a> 
                           <a href="wall.html">
                        <div  class="hTP-holders">
                           
                            <img src="../../web/icons/prof-giftbox.png" alt="Like This Person" /><span id="meShares">&nbsp;&nbsp; Wishes</span>
                        </div>
                            </a> 
                        </div>
                        
                        
                    </div>
                    <div id="innerProfile" onmouseover="meOnProfile()" >
                        <div id="myFirstAppear">
                            <div id="myProfilePic">
                                 
                                <!-- profile image -->
                               
                                <input type="file" id="profpicchnge" style="display: none" />
                                <img src="profileimg.png" alt="'.$f_name.'" onclick="showMyFace()"/>
                               
                            </div>  
                          
                            
                            <div id="myFirstDetails">
                                <div id="firDetInner">
                                    <div id="firDetContainer">
                                        <div class="firDetTtl">I\'m ';
                                                
                                        
                    echo'
                                            <div id="amIexistorNot" style="color:green" onmouseover="$(\'#hYT-Tt-Verify\').fadeIn()" onclick="$(\'#hYT-Tt-Verify\').toggle()" >';
                     if($times>5 || $times==5)
                                             {
                                              echo"Verified";
                                             } 
                                             else
                                             {
                                              if($times==0)
                                              {
                                                echo'Not Verified';
                                              }else
                                              {
                                                echo "<span id=\"showmyvrfusr\" onmouseover=\"$('#showvrfusr').fadeIn()\" onmouseout=\"$('#showvrfusr').fadeOut()\">Verified by $times people</span>"
                                              ;
                                                }
                                             }
                    
                                            echo '</div>
                                            <div class="verifyDetHold">
                                <div class="heyYoyThereTt" id="hYT-Tt-Verify"  >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="TtTitleProp">
                                                Statistics  <div class="helpforProp" onclick="$(\'#verifyHelpWindow\').slideDown();" >? help</div>
                                            </div>
                                           
                                             <div class="hYT-Item">Profile Verified by<div id="vrfyPplHold" class="hYT-ans" style="cursor: pointer" > ';
                                            if($times>5 || $times==5)
                                             {
                                              echo"Verified";
                                             } 
                                             else
                                             {
                                              if($times==0)
                                              {
                                                echo'Not Verified';
                                              }else
                                              {
                                                echo "<span id=\"showmyvrfusr\" onmouseover=\"$('#showvrfusr').show()\" onmouseout=\"$('#showvrfusr').hide()\">Verified by $times people</span>"
                                              ;
                                                }
                                             }
                                             echo' 
                                                     <div id="vrfyPpl">';
                                               $q="select verified_users as vs from verify where user_id=$user_id";
                                              $r=mysqli_query($dbc,$q);
                                              if($r)
                                              {
                                                if(mysqli_num_rows($r)>0)
                                                {
                                                  while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                                  {
                                                    $vf_users=$row['vs'];
                                                      $uname="select first_name as fname from basic where user_id=$vf_users";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $vfusr_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select email as em from users where user_id=$vf_users";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $vfusr_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                     echo''.$vfusr_name.'<br/>';
                                                  }
                                                }
                                              }
                                            
                                              
                                              
                                                     echo'   
                                                     </div> 
                                                 </div></div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                            </div>
                                        </div>
                                        <div class="firDetCont" style="color:crimson;font-size: 20px;">'.$f_name.'<div id="myEduDegree"><div id="completdDegs">'.$predeg.'</div><div id="currentDeg">'.$curdeg.'</div> </div> </div>
                                         <div class="firDetCont" style="color:blue;">'.$sex.' <div class="firDetContEx" style="color:gray;margin-top: -30px;">Otherwise known as <div class="firDetCont" style="color:crimson;font-size: 19px;">'.$nicknm.'</div></div></div>
                                      
                                         <div style="color:white;" >sedfed</div>
                                         <div class="firDetCont" style="margin-top: -25px;" > '.$age.'<sub> + </sub> <div class="firDetContEx" style="color:gray">'.$day.' | '.$mnth.' | '.$year.' </div></div>
                                     
                                     <div class="firDetCont">'.$status.'</div>
                                     <div class="firDetCont">'.$curloc.'<div class="firDetContEx" style="color:gray">'.$living_in.'</div></div>
                                   
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
                                echo '
                                <div class="heyYoyThereTt" id="hYT-Tt-Contact" style="display: none" >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="hYT-Item">Mobile  <div class="hYT-ans">'.$mobile_no.'</div></div>
                                            <div class="hYT-Item">Email ID <div class="hYT-ans">'.$email.'</div></div>
                                            <div class="hYT-Item">Blog / Website <div class="hYT-ans">'.$website.'</div></div>
                                            <div class="hYT-Item">Message  <div class="hYT-ans">'.$f_name.'</div></div>
                                            
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
                                                
                                            </div>';
                                            $q="SELECT profile_view as pf from history where user_id=$user_id"; 
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                      if(mysqli_num_rows($r)>0)
                                      {
                                        $count=mysqli_num_rows($r);
                                      }else
                                      {
                                        $count=1;
                                      }
                                    }
                                    $q="SELECT post_id as p from post_permision where user_id=$user_id";
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                      if(mysqli_num_rows($r)>0)
                                      {
                                        $pcnt=0;
                                        while(mysqli_fetch_array($r,MYSQLI_ASSOC))
                                        {
                                          $pcnt=$pcnt+1;
                                        }
                                      }else
                                      {
                                        $pcnt=0;
                                      }
                                    }
                                            echo'
                                            <div class="hYT-Item">Profile Views  <div class="hYT-ans">'.$count.'</div></div>
                                           
                                            <div class="hYT-Item">Total Posts<div class="hYT-ans">'.$pcnt.'</div></div>
                                             <div class="hYT-Item">Total Post Responses<div class="hYT-ans">876</div></div>
                                             <div class="hYT-Item">Profile Verified by<div id="vrfyPplHold" class="hYT-ans" style="cursor: pointer" > '.$times.' people 
                                             
                                                     <div id="vrfyPpl">';
                                                        $q="select verified_users as vs from verify where user_id=$user_id";
                                              $r=mysqli_query($dbc,$q);
                                              if($r)
                                              {
                                                if(mysqli_num_rows($r)>0)
                                                {
                                                  while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                                  {
                                                    $vf_users=$row['vs'];
                                                      $uname="select first_name as fname from basic where user_id=$vf_users";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $vfusr_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select username as em from users where user_id=$vf_users";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $vfusr_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                     echo''.$vfusr_name.'<br/>';
                                                  }
                                                }
                                              }
                                            
                                             
                                                     echo'</div> 
                                                 </div></div>';
                        $q="SELECT last_login as lg from history where user_id=$user_id ORDER BY hstry_id desc";
                        $r=mysqli_query($dbc,$q);
                        if($r)
                        {
                          if(mysqli_num_rows($r)>0)
                          {
                            $lg=0;
                            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                            {
                              $lg=$lg+1;
                              if($lg==2)
                              {
                                $lastLogin=$row['lg'];

                              }else
                              {

                              }

                            }
                            if($lg==1)
                            {
                              
                                $lastLogin=date("g:i a ,F j, Y"); 
                         
                            }
                           
                          }else
                          {
                            $lastLogin=date("g:i a ,F j, Y"); 
                          }
                        }
                         
                        
                        
                                                 echo'
                                            <div class="hYT-Item">Last Login<div class="hYT-ans">'.$lastLogin.'</div></div>
                                     
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
                                    
                                    <img src="../../web/icons/prof-contact.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Contact\',event)"/><br/>
                                    <img id="img_avlothana" width="25" height="25" class="hytcos" src="../../web/icons/post-sf-liked.png" onmouseover="showwholiked(\''.$user_id.'\')" onmouseout="$(\'#wholiked\').fadeOut();" alt="contact" /><font id="totlikecnt" style="position:absolute;margin-top:20px;">'.$totlikepers.'</font><br/>
                                        <img class="hyticos" src="../../web/icons/prof-statis.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Stats\',event)"/><br/>
                                    <img id="img-avlothana" class="hyticos" src="../../web/icons/prof-avlothana.png" alt="contact" onclick="showAvlothana()" /><br/>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="wholiked" style="display:none;">
                                            </div>
                        <div class="myCurrentInfoOut" id="currentInfo"> 
                            <div class="profTypeTitle">Current <div id="amIalive" style="color:green">  online</div></div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                <div class="StatusImg">
                                    <img id="stsImg" src="'.$status_image.'"  />
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status
                                    </div>
                                    <div class="profInfoAns">
                                        '.$mystatus.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status BGM :
                                    </div>
                                    <div class="profInfoAns">
                                        <audio width="100" src="'.$sts_audi.'" autoplay controls>  </audio>
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
                              echo'
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Mood
                                    </div>
                                    <div class="profInfoAns">
                                        '.$mood.' <span style="color:grey" >&nbsp; with</span><span id="moodWith">'.$moodwith.'</span>
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Location
                                    </div>
                                    <div class="profInfoAns">
                                        '.$cur_loc.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Position 
                                    </div>
                                    <div class="profInfoTtle">
                                        <span class="divider"  style="color:grey">|</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student
                                    </div>
                                    <div class="profInfoAns">
                                        '.$position.' | '.$org.'
                                    </div>
                                </div>
                                
                               
                                
                            </div>
                        </div>
                        <div class="myCurrentInfoOut" >
                            <div class="profTypeTitle">Education</div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                    College
                                    </div>';
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
                                echo' <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> '.$clgfryr.'-  '.$clgtoyr.' </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead" > '.$dept.'</div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead">'.$clg_discr.'</div>
                                    </div>
                                    <div class="myEduAns">
                                        '.$clg.'
                                        <div class="myOrgLocate">'.$clgplc.'</div>
                                    </div>
                                </div>
                                ';
                              }
                            }else
                            {
                               $clg="";
                                $dept="";
                                $clgplc="";
                                $clgfryr="";
                                $clgtoyr="";
                                $clg_discr="";
                             }
                          }else
                          {
                            echo'not run';
                          }
                               
$q="SELECT hsc_name as hsc,hsc_plc as hplc,hsc_crs as hcrs,hsc_discr as hd,hsc_fromyr as hfr,hsctoyr as hto from hsc_detail where user_id=$user_id ";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    
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
      echo'<div class="myEduTtl">
   High School    </div>
    <div class="myEduItem">
        
        <div class="myEduSubTtl">
            <div class="myEduSubHead"> '.$hsc_fromyr.' - '.$hsctoyr.'</div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead">'.$hsc_discr.' </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead">  '.$hsc_crs.' </div>
        </div>
        <div class="myEduAns">
            '.$hsc.'
              <div class="myOrgLocate">'.$hsc_plc.'</div>
        </div>
    </div>';
    }
  }else
  {

         $hsc="";
      $hsc_plc="";
      $hsc_crs="";
      $hsc_discr="";
      $hsc_fromyr="";
      $hsctoyr="";
   }
}


$q="SELECT scl as scl,scl_plc as sp,scl_fromyr as sfr,scl_toyr as sto,scl_crs as scrs,scl_discr as sdis from scl_detail where user_id=$user_id ";
$r=mysqli_query($dbc,$q);
if($r)
{
  
  if(mysqli_num_rows($r)>0)
  {
    
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
    echo'  <div class="myEduTtl">
                                    School
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead">'.$scl_fromyr.' -'.$scl_toyr.'</div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead">'.$scl_crs.'</div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$scl_discr.'</div>  
                                    </div>
                                    <div class="myEduAns">
                                      '.$scl_nm.'
                                          <div class="myOrgLocate">'.$scl_plc.'</div>
                                    </div>
                                </div>';
    }
  }else
  {
     $scl_nm="";
    $scl_plc="";
    $scl_fromyr="";
    $scl_toyr="";
    $scl_crs="";
    $scl_discr="";
    
  }
}
$q="SELECT f_name as fn,f_age as fg,f_edu as fe,f_ocup as fo,m_name as mn,m_age as mg,m_edu as me,m_ocup as mo from parent_details where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $frthr_name=$row['fn'];
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
     $frthr_name="";
      $f_age="";
      $f_edu="";
      $f_ocup="";

      $m_name="";
      $m_age="";
      $m_edu="";
      $m_ocup="";
  }
}
                        echo' 
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
                                        <div class="myEduSubHead" style=" color: navy">'.$frthr_name.'</div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$f_age.' <sub> + </sub> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$f_edu.'</div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"> '.$f_ocup.' </div>
                                    </div>
                                </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        Mother
                                    </div>
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"> '.$m_name.' </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$m_age.'<sub> + </sub> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$m_edu.' </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead">'.$m_ocup.' </div>
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    Siblings
                                    </div>';
                                    $q="SELECT brthr_nm as bnm,brthr_age as bag,brthr_edu as bed,brthr_ocup as boc from brother where user_id=$user_id";

$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $bt=0;
    echo'<div class="myEduSubTtl">Brother
                                    </div>';
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $bt=$bt+1;
      $br_nm=$row['bnm'];
      $br_age=$row['bag'];
      $br_edu=$row['bed'];
      $br_ocup=$row['boc'];
      echo'<div class="myEduItem">
                                    
                                    
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy">'.$br_nm.'</div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$br_age.'<sub> +</sub> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead">'.$br_edu.' </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"> '.$br_ocup.' </div>
                                    </div>
                                </div>';
    }
  }else
  {
     $br_nm="";
      $br_age="";
      $br_edu="";
      $br_ocup="";
        
  }
}
                   $q21="SELECT sis_nm as bnm,sis_age as bag,sis_edu as bed,sis_ocup as boc from sister where user_id=$user_id";
$r21=mysqli_query($dbc,$q21);
if($r21)
{
  if(mysqli_num_rows($r21)>0)
  {
    $st=0;
    echo'<div class="myEduSubTtl">Sister
                                    </div>';
    while($row=mysqli_fetch_array($r21,MYSQLI_ASSOC))
    {
      $st=$st+1;
      $sis_nm=$row['bnm'];
      $sis_age=$row['bag'];
      $sis_edu=$row['bed'];
      $sis_ocup=$row['boc'];
      echo' <div class="myEduItem">
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"> '.$sis_nm.'</div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$sis_age.'<sub> +</sub> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$sis_edu.'</div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"> '.$sis_ocup.'</div>
                                    </div>
                                </div>';
      }
  }else
  {
     $sis_nm=$row['bnm'];
      $sis_age=$row['bag'];
      $sis_edu=$row['bed'];
      $sis_ocup=$row['boc'];
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
                                echo'
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
                                        <div class="myEduSubHead"> '.$clocfr.' -  '.$clocto.' </div>
                                    </div>
                                    <div class="myEduAns">
                                      '.$cloc.'
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    Permanent address
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> '.$plocfr.' - '.$plocto.' </div>  
                                    </div>
                                    <div class="myEduAns">
                                  '.$ploc.'
                                    </div>
                                </div>
                                <div class="myEduTtl">
                                    Native Place
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> '.$nlocfr.' - '.$nlocto.'</div>  
                                    </div>
                                    <div class="myEduAns">
                                       '.$nloc.'
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="myCurrentInfoOut" id="myRelationHolder" >
                            <div class="profTypeTitle">Relations</div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">';
                                $q="select cu_id as c from contacts where user_id=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $totrel=mysqli_num_rows($r);
                                    
                                    $q1="select sex as s from basic where user_id=$user_id";
                                    $r1=mysqli_query($dbc,$q1);
                                    if($r1)
                                    {
                                        $bc=0;
                                        $gc=0;
                                        $row=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                                        $gen=$row['s'];
                                        
                                        if($gen=="boy")
                                        {
                                            $bc=$bc+1;
                                        }
                                        if($gen=="girl")
                                        {
                                            $gc=$gc+1;
                                        }
                                    }
                                }
;                                   echo'  Total Number of Relations  -  '.$totrel.' <span class="shwMore" onclick="$(\'#moreForRelate\').slideToggle();">More</span>  <div class="myRelateMF">
                                            <img src="../../web/icons/male.png" class="sf-icons" alt="male"/>'.$bc.'
                                            <img src="../../web/icons/female.png" class="sf-icons30"  alt="female"/>'.$gc.'
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
                                
                                <div id="whoAreCommonNames" style="display: none">
                                    <div id="commonNameArr"></div>
                                    <div id="commonNameIn">
                                        <span class="comNamItem"> Arulkumar </span><br/>
                                        <span class="comNamItem"> Gokulkumar </span><br/>
                                        <span class="comNamItem"> Arunkumar </span><br/>
                                    </div>       
                                </div>
                               </div>
                        </div>';
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
                        echo' <div class="myCurrentInfoOut" id="aboutMe"> 
                            <div class="profTypeTitle">About Me </div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Blood Group
                                    </div>
                                    <div class="profInfoAns">
                                      '.$bldg.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Languages Known
                                    </div>
                                    <div class="profInfoAns">
                                       '.$language.'
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Religion
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$religion.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       ECA
                                    </div>
                                    <div class="profInfoAns">
                                      '.$eca.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Physique
                                    </div>
                                    <div class="profInfoAns">
                                       '.$phisique.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Mentally
                                    </div>
                                    <div class="profInfoAns">
                                       '.$mentally.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Politics
                                    </div>
                                    <div class="profInfoAns">
                                      '.$politics.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Monthly Income
                                    </div>
                                    <div class="profInfoAns">
                                      '.$income.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       about me
                                    </div>
                                    <div class="profInfoAns">
                                     '.$aboutme.'
                                    </div>
                                </div>
                            </div>
                        </div>';
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
                       echo ' <div class="ExpandMore">
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
                                    <div class="profInfoAns">
                                      '.$f1.'<div class="divider">|</div> <div class="favReason">'.$fr1.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Letter
                                    </div>
                                    <div class="profInfoAns">
                                       '.$f2.'<div class="divider">|</div> <div class="favReason">'.$fr2.'</div>
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Color 
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$f3.' <div class="divider">|</div> <div class="favReason">'.$fr3.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actor
                                    </div>
                                    <div class="profInfoAns">
                                       '.$f4.' <div class="divider">|</div> <div class="favReason">'.$fr4.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actress
                                    </div>
                                    <div class="profInfoAns">
                                       '.$f5.'<div class="divider">|</div> <div class="favReason">'.$fr5.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Movie
                                    </div>
                                    <div class="profInfoAns">
                                       '.$fr6.' <div class="divider">|</div> <div class="favReason">'.$fr6.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Song | Album
                                    </div>
                                    <div class="profInfoAns">
                                      '.$f7.' <div class="divider">|</div> <div class="favReason">'.$fr7.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Place
                                    </div>
                                    <div class="profInfoAns">
                                      '.$f8.'<div class="divider">|</div> <div class="favReason">'.$fr8.'</div>
                                    </div> 
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Animal
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f9.' <div class="divider">|</div> <div class="favReason">'.$fr9.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Food
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f10.' <div class="divider">|</div> <div class="favReason">'.$fr10.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Field
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f11.' <div class="divider">|</div> <div class="favReason">'.$fr11.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Book
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f12.' <div class="divider">|</div> <div class="favReason">'.$fr12.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Game
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f13.'<div class="divider">|</div> <div class="favReason">'.$fr13.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Sports Person
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f14.' <div class="divider">|</div> <div class="favReason">'.$fr14.'</div>
                                    </div> 
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Author
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f15.' <div class="divider">|</div> <div class="favReason">'.$fr15.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       TV Show
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f16.' <div class="divider">|</div> <div class="favReason">'.$fr16.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Cartoon
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f17.' <div class="divider">|</div> <div class="favReason">'.$fr17.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Musician
                                    </div>
                                    <div class="profInfoAns">
                                     '.$f18.' <div class="divider">|</div> <div class="favReason">'.$fr18.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Film Director
                                    </div>
                                    <div class="profInfoAns">
                                    '.$f19.'<div class="divider">|</div> <div class="favReason">'.$fr19.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    
                                    <div class="profInfoTtle">
                                       Comedy Actor
                                    </div>
                                    <div class="profInfoAns">
                                        '.$f20.' <div class="divider">|</div> <div class="favReason">'.$fr20.'</div>
                                    </div>
                                    
                                </div>
                                
                               
                                
                            </div>
                        </div>';
$q="SELECT number as f1,letter as f2,color as f3,actor as f4,actress as f5,movie as f6,sora as f7,place as f8,animal as f9,food as f10,field as f11,book as f12,game as f13,sportperson as f14,author as f15,tvshow as f16,cn as f17,miscdir as f18,filmdir as f19,cmdyactr as f20 from annoying where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r))
  {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    
 $a1=$row['f1'];
  $a2=$row['f2'];
  $a3=$row['f3'];
  $a4=$row['f4'];
  $a5=$row['f5'];
  $a6=$row['f6'];
  $a7=$row['f7'];
  $a8=$row['f8'];
  $a9=$row['f9'];
  $a10=$row['f10'];
  $a11=$row['f11'];
  $a12=$row['f12'];
  $a13=$row['f13'];
  $a14=$row['f14'];
  $a15=$row['f15'];
  $a16=$row['f16'];
  $a17=$row['f17'];
  $a18=$row['f18'];
  $a19=$row['f19'];
  $a20=$row['f20'];
  
  }else
  {
    $a1="";
  $a2="";
  $a3="";
  $a4="";
  $a5="";
  $a6="";
  $a7="";
  $a8="";
  $a9="";
  $a10="";
  $a11="";
  $a12="";
  $a13="";
  $a14="";
  $a15="";
  $a16="";
  $a17="";
  $a18="";
  $a19="";
  $a20="";
  }
}
$q="SELECT number as fr1,letter as fr2,color as fr3,actor as fr4,actress as fr5,movie as fr6,sora as fr7,place as fr8,animal as fr9,food as fr10,field as fr11,book as fr12,game as fr13,sportperson as fr14,author as fr15,tvshow as fr16,cn as fr17,miscdir as fr18,filmdir as fr19,cmdyactr as fr20 from annoy_reason where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r))
  {
    $rowf=mysqli_fetch_array($r,MYSQLI_ASSOC);
  $ar1=$rowf['fr1'];
  $ar2=$rowf['fr2'];
  $ar3=$rowf['fr3'];
  $ar4=$rowf['fr4'];
  $ar5=$rowf['fr5'];
  $ar6=$rowf['fr6'];
  $ar7=$rowf['fr7'];
  $ar8=$rowf['fr8'];
  $ar9=$rowf['fr9'];
  $ar10=$rowf['fr10'];
  $ar11=$rowf['fr11'];
  $ar12=$rowf['fr12'];
  $ar13=$rowf['fr13'];
  $ar14=$rowf['fr14'];
  $ar15=$rowf['fr15'];
  $ar16=$rowf['fr16'];
  $ar17=$rowf['fr17'];
  $ar18=$rowf['fr18'];
  $ar19=$rowf['fr19'];
  $ar20=$rowf['fr20'];
  
  }else
  {
    $ar1="";
  $ar2="";
  $ar3="";
  $ar4="";
  $ar5="";
  $ar6="";
  $ar7="";
  $ar8="";
  $ar9="";
  $ar10="";
  $ar11="";
  $ar12="";
  $ar13="";
  $ar14="";
  $ar15="";
  $ar16="";
  $ar17="";
  $ar18="";
  $ar19="";
  $ar20="";
  }
}
                        echo '<div class="ExpandMore">
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
                                    <div class="profInfoAns">
                                      '.$a1.'<div class="divider">|</div> <div class="favReason">'.$ar1.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Letter
                                    </div>
                                    <div class="profInfoAns">
                                       '.$a2.'<div class="divider">|</div> <div class="favReason">'.$ar2.'</div>
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Color 
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$a3.' <div class="divider">|</div> <div class="favReason">'.$ar3.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actor
                                    </div>
                                    <div class="profInfoAns">
                                       '.$a4.' <div class="divider">|</div> <div class="favReason">'.$ar4.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Actress
                                    </div>
                                    <div class="profInfoAns">
                                       '.$a5.'<div class="divider">|</div> <div class="favReason">'.$ar5.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Movie
                                    </div>
                                    <div class="profInfoAns">
                                       '.$ar6.' <div class="divider">|</div> <div class="favReason">'.$ar6.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Song | Album
                                    </div>
                                    <div class="profInfoAns">
                                      '.$a7.' <div class="divider">|</div> <div class="favReason">'.$ar7.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Place
                                    </div>
                                    <div class="profInfoAns">
                                      '.$a8.'<div class="divider">|</div> <div class="favReason">'.$ar8.'</div>
                                    </div> 
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Animal
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a9.' <div class="divider">|</div> <div class="favReason">'.$ar9.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Food
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a10.' <div class="divider">|</div> <div class="favReason">'.$ar10.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Field
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a11.' <div class="divider">|</div> <div class="favReason">'.$ar11.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Book
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a12.' <div class="divider">|</div> <div class="favReason">'.$ar12.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Game
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a13.'<div class="divider">|</div> <div class="favReason">'.$ar13.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Sports Person
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a14.' <div class="divider">|</div> <div class="favReason">'.$ar14.'</div>
                                    </div> 
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Author
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a15.' <div class="divider">|</div> <div class="favReason">'.$ar15.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       TV Show
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a16.' <div class="divider">|</div> <div class="favReason">'.$ar16.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Cartoon
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a17.' <div class="divider">|</div> <div class="favReason">'.$ar17.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Musician
                                    </div>
                                    <div class="profInfoAns">
                                     '.$a18.' <div class="divider">|</div> <div class="favReason">'.$ar18.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                       Film Director
                                    </div>
                                    <div class="profInfoAns">
                                    '.$a19.'<div class="divider">|</div> <div class="favReason">'.$ar19.'</div>
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    
                                    <div class="profInfoTtle">
                                       Comedy Actor
                                    </div>
                                    <div class="profInfoAns">
                                        '.$a20.' <div class="divider">|</div> <div class="favReason">'.$ar20.'</div>
                                    </div>
                                    
                                </div>
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
                        echo '
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
                                    <div class="myEduAns">
                                        '.$mob_no.'<div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$mob_sim.'</div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$mob.'</div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$mob_os.'</div>
                                    </div>
                                </div>
                                
                                <div class="myEduTtl">
                                    PC
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Laptop </div>
                                    </div>
                                    <div class="myEduAns">
                                        '.$lap.' <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$lap_model.'</div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$lap_color.'</div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$lap_os1.'</div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$lap_os2.'</div>
                                    </div>
                                </div>
                                <div class="myEduTtl">
                                    Vehicle
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Bike </div>
                                    </div>
                                    <div class="myEduAns">
                                        '.$bike_model.' <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$bike_no.'</div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$bike_color.'</div>
                                    </div>
                                </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead"> Car </div>
                                    </div>
                                    <div class="myEduAns">
                                        '.$car_model.' <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$car_no.'</div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet">'.$car_color.'</div>
                                    </div>
                                </div>
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
    $God=$row['g'];
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
    $God="";
    $boys="";
    $girls="";
    $marriage="";
    $entertainment="";
    $wtow="";
  }
}
                       echo ' <div class="ExpandMore">
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
                                    <div class="profInfoAns">
                                      '.$me.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      You
                                    </div>
                                    <div class="profInfoAns">
                                       '.$you.'
                                    </div>
                                </div>
                               
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      Family
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$family.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                     Friends
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$friend.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                     Education
                                    </div>
                                    
                                    <div class="profInfoAns">
                                       '.$studies.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                     Politics
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$politics.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Life
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$life.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    God
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$God.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Boys
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$boys.'
                                    </div>
                                </div>
                                 
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Girls
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$girls.'
                                    </div>
                                </div>
                                 
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Marriage
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$marriage.'
                                    </div>
                                </div>
                                 
                               
                                 
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Entertainment
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$entertainment.'
                                    </div>
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                    Some words to World
                                    </div>
                                    
                                    <div class="profInfoAns">
                                        '.$wtow.'
                                    </div>
                                </div>
                                 
                                 
                                 
                                
                               
                                
                            </div>
                        </div>
                        
                        
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
}

?>