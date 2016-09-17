<?php session_start();
if(empty($_SESSION['user_id']) || empty($_GET['pass1']) || empty($_SESSION['user_name']))
{
    header("location:profile.php");
}else
{
   
    $user_name=$_GET['pass1'];
       require '../web/mysqli_connect.php';
   $viewer_id=$_SESSION['user_id'];
    $name=$_SESSION['user_name'];

   
      $q="SELECT user_id as u from users where username='$user_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u'];
      
			
      $today = date("g:i a ,F j, Y"); 
      $iamnot=0;
      if($user_id!==$viewer_id)
      {
          $iamnot=1;
        $q="insert into history(profile_view,user_id,time,seen)values($viewer_id,$user_id,'$today',0)";
       $r=mysqli_query($dbc,$q);
      
      }
      if(empty($user_id))
      {
        header("location:profile.php");
      }else
      {
        
   
    $nowuser=$_SESSION['pre_user'];
    if($user_name!==$nowuser)
    {
      if(mkdir('../'.$nowuser.''))
      {
        $usename=$nowuser;
$pf='../'.$usename.'/publicfolder';
mkdir($pf,0777,true);
$posts='../'.$usename.'/publicfolder/post/images/postimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/images/profileimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/images/wallpapers';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/images/statusimages';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/audios/postaudios';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/audios/statusaudios';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/videos/postvideos';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/videos/statusvideos';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/pdfs/postpdfs';
mkdir($posts,0777,true);
$posts='../'.$usename.'/publicfolder/post/files/postfiles';
mkdir($posts,0777,true);


      $now = '../'.$usename.'';
fopen("$now/index.html", "w");
      
  fopen("$now/profile.php","w");
  copy("../web/forprofile/profile.php", "$now/profile.php");

   fopen("$now/selfprofile.php","w");
  copy("../web/forprofile/selfprofile.php","$now/selfprofile.php");
  
  fopen("$now/storage.php","w");
  copy("../web/forprofile/storage.php","$now/storage.php");

  fopen("$now/videos.php","w");
  copy("../web/forprofile/videos.php","$now/videos.php");

  fopen("$now/files.php");
  copy("../web/forprofile/files.php", "$now/files.php");


fopen("$now/photos.php", "w");
copy("../web/forprofile/photos.php", "$now/photos.php");

   $vdsrt=fopen("$now/strtvid.php","w");
   $vidtxt='<?php
$user="'.$usename.'";
 $url=\'videos.php?username=\'.urlencode($user);
   header("location:$url");
?>';
fwrite($vdsrt,$vidtxt);
$strtpho=fopen("$now/strtphotos.php","w");
$strtphotx='<?php
$user="'.$usename.'";
 $url=\'photos.php?username=\'.urlencode($user);
   header("location:$url");
?>';
fwrite($strtpho,$strtphotx );

  $stht=fopen("$now/strg.php","w");
  $strghtml='<?php
$usename="'.$usename.'";
 $url=\'storage.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';

  fwrite($stht, $strghtml);
  $myfil=fopen("$now/strtfiles.php","w");
  $myfiltxt='<?php
$usename="'.$usename.'";
 $url=\'files.php?username=\'.urlencode($usename);
   header("location:$url");
  ?>';
  fwrite($myfil,$myfiltxt);

$myfile=fopen("$now/index.php", "w");

$txt = '<?php 
$usename="'.$usename.'";
 $url=\'profile.php?pass1=\'.urlencode($usename);
         
    header("location:$url");
?>
';
fwrite($myfile, $txt);

fclose($myfile);
  $url='../'.$user_name.'/selfprofile.php?pass1='.urlencode($user_name);
         $_SESSION['pre_user']=$user_name;    
    header("location:$url");

      }else{
     
        $user_name= $_SESSION['pre_user'];    
            $url='../'.$user_name.'/selfprofile.php?pass1='.urlencode($user_name);
    header("location:$url");


      }


    }

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


$q="select update_wall as c from wall_pics where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
    if(mysqli_num_rows($r)>0)
    {
        $roe=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $w_pic=$roe['c'];
        $wn=strpos($w_pic,"storage");
        $w_pic=substr($w_pic,$wn,strlen($w_pic));
    }else
    {
        $w_pic="";
    }
}

          $q="select update_pics as p from profile_pics where user_id=$user_id order by pic_id desc limit 1";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $ppics=$rpw['p'];
                              $wn=strpos($ppics,"storage");
        $ppics=substr($ppics,$wn,strlen($ppics));
                              
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

    $q="select user_id as u from users where user_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $pre=0;
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      if(empty($row))
      {
        $_SESSION['pre_userid']=$_GET['pass1']=$pre;
        $url=''.$name.'.php?pass1='.urlencode($pre);
     header("location:$url");

      }else
      {
         $_SESSION['pre_userid']=$_GET['pass1']=$pre;
      }
    }
    $sm=0;
    if($viewer_id==$user_id)
    {
      $sm=$sm+1;
    }
   $q="select first_name as f_name from basic where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $f_name=$row['f_name'];
   }
  $q="SELECT first_name as f_name from basic where user_id=$viewer_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $viewer_name=$row['f_name'];
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
    <link rel="stylesheet" href="../web/profile.css"/>
       
    <link rel="stylesheet" href="../web/people.css"/>
   <script src="../web/angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/profile.js" type="text/javascript"></script>
  </head>
  
  <body onload="setWallpaper()"  >
        <div id="fullPageContainer">
            <div id="pageLoadStatus"></div>
                <div id="Topest">

                    <div id="title_bar"><font id="sedfedUserName">'.$viewer_name.'</font>&nbsp;&nbsp;&nbsp;&nbsp;

                      <font id="sedfedUserName" >'.$f_name.' ';
                      $q1="SELECT mythink as m,mythink_color as clr from status where user_id=$user_id order by think_id desc";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
if(mysqli_num_rows($r1)>0)
{
  $row8=mysqli_fetch_array($r1);
$mystatus=$row8['m'];
$sts_clr=$row8['clr'];

}else
{
$mystatus="";

$sts_clr="";
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
                      echo'</font>

                    </div>

                </div>
            <div id="innerPageCont">
               
                                 
                <div id="sf-wallpprHoldr" onclick="meOnWallppr()" onmouseover="//meOnWallppr()" onmouseout="//meOutWallppr()" style=" background-image:url(\''.$w_pic.'\')" >
                    <!-- image is in as background for better result -->
                    ';
                      if($iamnot==0)
                      {
                          echo'
                    ';
                      } 
                echo';</div>
                <div id="myProfilePicOnWall">
                <input type="hidden" value="" id="wchwantchng"/>
                                <img src="'.$ppics.'" alt="'.$f_name.'" class="curprofimg" onclick="showMyFace()"/>
                                
                            </div>  
                <img id="img-wallpaper" onclick="setWallpaper()" src="'.$w_pic.'"  alt="'.$f_name.'"/>
                <div id="sf-profileHolder" >
                    <div id="howThisPerson" >
                        
                        
                    </div>
                    <div id="howThisPersonStuffs" >
                        <div id="innerHTP">
                            <a href="loggedin.html">  <div  class="hTP-holders">
                                <img src="../web/icons/prof-posts.png" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; Posts</span> 
                        </div>
                                </a> 
                        <a href="storage.php">
                        <div  class="hTP-holders">
                            <img src="../web/icons/prof-files.png" alt="Like This Person" /><span id="meRates">&nbsp;&nbsp; Storage</span>
                        </div>
                            </a> 
                        <a href="photos.php"> 
                            <div  class="hTP-holders">
                            <img src="../web/icons/prof-images.png" alt="Like This Person" /><span id="meUnlikes">&nbsp;&nbsp; Photos</span>
                        </div>
                            </a>
                        <a href="videos.php">
                        <div  class="hTP-holders">
                            <img src="../web/icons/prof-video.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; Videos</span>
                        </div>
                            </a> 
                           <a href="wall.html">
                        <div  class="hTP-holders">
                           
                            <img src="../web/icons/prof-giftbox.png" alt="Like This Person" /><span id="meShares">&nbsp;&nbsp; Wishes</span>
                        </div>
                            </a> 
                        </div>
                        
                        
                    </div>';
                
                      echo'
                    <div id="innerProfile" onmouseover="meOnProfile()" >
                        <div id="myFirstAppear">
                            <div id="myProfilePic">
                            <!-- profile image -->
                            <div id="chngppic"></div>
                            
                            <div id="ppicconts">';
                          
                      echo'<img class="curprofimg" src="'.$ppics.'" alt="'.$f_name.'" onclick="showMyFace()"/>
                                </div>
                                ';
                      $q="select user_id from my_verify where user_id=$viewer_id";
                      $r=  mysqli_query($dbc,$q);
                      if($r)
                      {
                          $vf=0;
                          if(mysqli_num_rows($r)>0)
                          {
                              $vf=1;
                          }
                      }
                                   $q="select verified_users from verify where user_id=$user_id and verified_users=$viewer_id order by verify_id desc";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {

                                  if(mysqli_num_rows($r)>0)
                                  {
                                    $row=mysqli_fetch_array($r);
                                    
                                    if($r)
                                    {
                                      $row=mysqli_fetch_array($r);
                                      $times=  mysqli_num_rows($r);
                                      if($times==5 || $vf==1 || $times>5)
                                      {
                                        echo '<div class="amIexist" id="iAmExist"  >
                                    <img src="../web/icons/ok.png" alt="ok"/> Verified
                                </div>';  
                                      }  else {
                                           if($iamnot==0)
                                    {
                                        
                                    }else
                                    {
                                        $qr="select verified_times as vf from verify where user_id=$user_id";
                                        $rr=mysqli_query($dbc,$qr);
                                        if($rr)
                                        {
                                            $my_vf_times=0;
                                            if(mysqli_num_rows($r)>4)
                                            {
                                                $my_vf_times=1;
                                            }
                                        }
                                        $qr="select verify from my_verify where user_id=$user_id";
                                        $rr=mysqli_query($dbc,$qr);
                                        if($rr)
                                        {
                                            if(mysqli_num_rows($r)>0)
                                            {
                                                 $my_vf_times=2;
                                            }
                                        }
                                        if($my_vf_times==1 || $my_vf_times==2)
                                        {
                                              echo' 
                                <div class="amIexista" id="doVerify" onclick="verifyppl(\''.$user_id.'\')" onmouseover="$(\'#TtExist\').fadeIn(1000)" onmouseout="$(\'#TtExist\').fadeOut()" >
                                    Verify
                                </div>
                                <div class="amIexist" id="iAmExist" style="display: none" onclick="$(\'#doVerify\').fadeToggle(500);$(\'#iAmExist\').hide();">
                                    <img src="../web/icons/ok.png" alt="ok"/> You Verified
                                </div>
                                <div class="TtipExist" id="TtExist">
                                    Verify if you know this person
                                </div>
                                <div class="amIexist"  id="stillNotVery" style="background-color: crimson;display: none" >
                                    Not Yet Verified
                                </div> 
                             
                           ';
                               
                                        }
                                        
                                    }
                                      }
                                      
                                     
                                    }

                                    
                                  }else
                                  {
                                    $times=0;
                                    
                                     if($vf==1 )
                                      {
                                        echo '<div class="amIexist" id="iAmExist"  >
                                    <img src="../web/icons/ok.png" alt="ok"/> Verified
                                </div>';  
                                      }
                                    if($iamnot==0)
                                    {
                                        
                                    }else
                                    {
                                        $qr="select verified_times as vf from verify where user_id=$user_id";
                                        $rr=mysqli_query($dbc,$qr);
                                        if($rr)
                                        {
                                            $my_vf_times=0;
                                            if(mysqli_num_rows($r)>4)
                                            {
                                                $my_vf_times=1;
                                            }
                                        }
                                        $qr="select verify from my_verify where user_id=$user_id";
                                        $rr=mysqli_query($dbc,$qr);
                                        if($rr)
                                        {
                                            if(mysqli_num_rows($r)>0)
                                            {
                                                 $my_vf_times=2;
                                            }
                                        }
                                        if($my_vf_times==1 || $my_vf_times==2)
                                        {
                                              echo' 
                                <div class="amIexista" id="doVerify" onclick="verifyppl(\''.$user_id.'\')" onmouseover="$(\'#TtExist\').fadeIn(1000)" onmouseout="$(\'#TtExist\').fadeOut()" >
                                    Verify
                                </div>
                                <div class="amIexist" id="iAmExist" style="display: none" onclick="$(\'#doVerify\').fadeToggle(500);$(\'#iAmExist\').hide();">
                                    <img src="../web/icons/ok.png" alt="ok"/> You Verified
                                </div>
                                <div class="TtipExist" id="TtExist">
                                    Verify if you know this person
                                </div>
                                <div class="amIexist"  id="stillNotVery" style="background-color: crimson;display: none" >
                                    Not Yet Verified
                                </div> 
                             
                           ';
                               
                                        }
                                        
                                    }
                                     }
                                }
                               
                            echo'</div> ';
                            $q="select req_id as r from requests where user_id=$viewer_id and reqstd_userid=$user_id";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                $req=0;
                                if(mysqli_num_rows($r)>0)
                                {
                                    $req=1;
                                }
                            }
                            $q="select c_id as c from contacts where user_id=$viewer_id and cu_id=$user_id";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                $mycnct=0;
                                if(mysqli_num_rows($r)>0)
                                {
                                    $mycnct=1;
                                }
                            }
                                echo'  <div class="theaterTexts" id="TheaterNewRel" style="display: none;" >
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                   Need Relation ?<div class="thtrTxtClose" onclick="$(\'#TheaterNewRel\').fadeOut();" >X</div>
                                               </div>
                                              
                                               <div class="thtrCont"> ';
                                if($req==1 || $mycnct==1)
                                {
                                    if($mycnct==1)
                                    {
                                         echo'<div id="rmvcnct" onclick="rmvcnctppl(\''.$user_id.'\',0)">Remove Contact</div>';
                            
                                    }else
                                    {
                                        if($req==1)
                                        {
                                             echo'<div id="rmvcnct" onclick="rmvcnctppl(\''.$user_id.'\',1)">Delete Request</div>';
                            
                                        }
                                    }
                                 
                                    
                                  
                                 }else
                                {
                                    
                                }
                                echo'
                                                   <div class="reqSendIn">';
                                                    if($req==1)
                                                    {
                                                        echo 'Update';
                                                    }else
                                                    {
                                                        echo 'Add';
                                                    }
                                                    echo'&nbsp;&nbsp; <span id="targetReqst"  >Vijayakumar </span> to my relations as
                                                       <select id="addRelType" onchange="addRelOther()" >
                                                        <option>Friends</option>
                                                        <option>Family</option>
                                                        <option>Enemy</option>
                                                        <option>Special</option>
                                                        <option>Unknown</option>
                                <option value="classmate" >Classmates</option>
                                <option value="other" >Other</option>
                            </select> 
                                                       <input type="hidden" value="" id="nowuser" />
                                                       <div  class="othrGrps" id="orGroup" style="display: none;">
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            Or  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" type="text" placeholder="Other Group" />
                                                       </div>          
                                                       <div class="othrGrps" id="classGroup"  >
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            In  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" id="mysavesnm" type="text" placeholder="Save this person name as " />
                                                       </div>          
                                                       
                        </div>
                                                   <div class="thtrPrcd" onclick="addrelsinprfprcs(\''.$user_id.'\',\'mysavesnm\',\'addRelType\',\''.$f_name.'\')">
                                                     ';  
                                                    if($req==1 || $mycnct==1)
                                                     {
                                                         echo'Update Details';
                                                     }else
                                                     {
                                                         echo'Send Request';
                                                     }
                                                  echo' </div>
                                               </div>
                                           </div>
                                       </div>
                            <div id="myFirstDetails">
                                <div id="firDetInner">
                                    <div id="firDetContainer">
                                        <div class="firDetTtl">I\'m 
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
                                                echo "<span id=\"showmyvrfusr\" onmouseover=\"$('#showvrfusr').show()\" onmouseout=\"$('#showvrfusr').hide()\">Verified by $times people</span>"
                                              ;
                                                }
                                             echo'</div>
                                            <div class="verifyDetHold">
                                <div class="heyYoyThereTt" id="hYT-Tt-Verify" style="display: none" >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="TtTitleProp">
                                                Statistics  <div class="helpforProp" onclick="$(\'#verifyHelpWindow\').slideDown();" >? help</div>
                                            </div>
                                           
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
                                            
                                              }
                                              
                                                     echo'</div> 
                                                 </div></div>';
                                                 if($times>5 || $times==5)
                                                 {

                                                 }else
                                                 {
                                                  echo'<div id="reportFake" onclick="report_fk_if(\''.$user_id.'\')">
                                              Report Fake ID
                                            </div>';
                                                 }
                                            
                                           echo ' 
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
                                                 <div id="prop-btn-secret" class="propItem" onclick="proposeMe(\'#prop-btn-brave\',\'<br> Proposed Bravely <br> Best Of Luck \',\''.$user_id.'\',0)">Brave</div>
                                                <div class="propItem" onclick="proposeMe(\'#prop-btn-secret\',\'<br> Proposed Secretely <br> Best Of Luck \',\''.$user_id.'\',1)" >Smart</div>
                                       
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
                                    
                                    <img src="../web/icons/prof-contact.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Contact\',event)"/><br/>
                                    ';
                                    if($sm!==0)
                                    {

                                    }else
                                    {
                                        
                                      echo' <img id="img-makeRelation" src="../web/icons/notif-add-ppl.png" alt="contact" onclick="addrelinprf(\''.$user_id.'\',\''.$f_name.'\')" onmouseover="showMyExtraTip(\'#hYT-Tt-AddRel\',event)" onmouseout="$(\'#hYT-Tt-AddRel\').hide()"/><br/>
                                    <img src="../web/icons/prof-love.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Propose\',event)"/><br/>
                                   ';
                                    }
   $q="select likes as l from history where user_id=$viewer_id and likes=$user_id";
   $q1="select likes as l from history where likes=$user_id";
   $r1=mysqli_query($dbc,$q1);
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        $liked=0;
        if(mysqli_num_rows($r)>0)
        {
            $liked=1;
        }
    }
    $totlike=mysqli_num_rows($r1);
    if($liked==1)
    {
        echo'<img class="hyticos" src="../web/icons/prof-statis.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Stats\',event)"/><br/>
                                    <span><img id="img_avlothana" width="25" height="25" class="hytcos" src="../web/icons/post-sf-liked.png" onmouseover="showwholiked(\''.$user_id.'\')" onmouseout="$(\'#wholiked\').fadeOut();" alt="contact" onclick="likethisperson(\''.$user_id.'\')" /><font id="totlikecnt" style="position:absolute;margin-top:20px;">'.$totlike.'</font><span>
                                    ';
    }else
    {
       echo'<img class="hyticos" src="../web/icons/prof-statis.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Stats\',event)"/><br/>
                                    <span><img id="img_avlothana" width="25" height="25" class="hytcos" src="../web/icons/post-sf-like.png" onmouseover="showwholiked(\''.$user_id.'\')" onmouseout="$(\'#wholiked\').fadeOut();" alt="contact" onclick="likethisperson(\''.$user_id.'\')" /><font id="totlikecnt" style="position:absolute;margin-top:20px;">'.$totlike.'</font><span>
                                    '; 
    }
                                    echo'<div id="wholiked" style="display:none;">
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div style="display:none;" id="forllktst"></div>
                        <div class="myCurrentInfoOut" id="currentInfo"> 
                            <div class="profTypeTitle">Current <div id="amIalive" style="color:green">  online</div></div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                <div class="StatusImg">
                                    <img id="stsImg" src="'.$sts_img.'"  />
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status
                                    </div>
                                    <div class="profInfoAns" style="color:'.$sts_clr.'">
                                        '.$mystatus.'
                                    </div>
                                </div>
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status BGM :
                                    </div>
                                    <div class="profInfoAns">';
                                 
                                     

                                       echo'<audio width="100" src="'.$sts_bgm.'" autoplay controls>  </audio> ' ;
                                    
                                    

                                       echo'
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
                            <div class="profTypeTitle" id="DetTtl_Edu">Education</div>
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
                                </div>';
                                 
                              
                                
                                $q="select cu_id as c from contacts where user_id=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $male_cnt=0;
                                    $fml_cnt=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        
                                        while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                        {
                                            $his_id=$row['c'];
                                            $q1="select sex as s from basic where user_id=$his_id";
                                            $r1=mysqli_query($dbc,$q1);
                                            if($r1)
                                            {
                                                $rt=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                                                $gen=$rt['s'];
                                                if($gen=="boy")
                                                {
                                                        $male_cnt=$male_cnt+1;
                                                }else
                                                {
                                                    $fml_cnt=$fml_cnt+1;
                                                }
                                            }
                                        }
                                    }
                                }
                                 
                                
                               
                                $q="select cu_id as c from contacts where user_id=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $tot_cont=mysqli_num_rows($r);
                                   
                                }
                                $q="select user_id from disconnected_cnct where user_id=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $he_disctd=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $he_disctd=$he_disctd+1;
                                    }
                                }
                                 $q="select user_id  from disconnected_cnct where dis_connected=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $disctd_by=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                         $disctd_by= $disctd_by+1;
                                    }
                                }
                                $q="select user_id from requests where reqstd_userid=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $his_reqsts=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $his_reqsts=$his_reqsts+1;
                                    }
                                }
                                $q="select user_id from propose where user_id=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $his_prps=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $his_prps=$his_prps+1;
                                    }
                                }
                          echo ' </div>
                        </div>
                         <div class="peopleViewer" style="display:none;" id="peopleViewerWindow" >
          <div class="peopleViewerInnr">
              <div class="peopleViewerTtl"><span id="frds_type_view">Friends</span> of Vijay <span class="closePVI" onclick="$(\'#peopleViewerWindow\').fadeOut()">X</span> </div>
              <div id="wholePeopleItm"></div>
             
          </div>
      </div>
                        <div class="myCurrentInfoOut" id="myRelationHolder" >
                            <div class="profTypeTitle">Relations</div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                     Total Number of Relations  -  '.$tot_cont.' <span class="shwMore" onclick="$(\'#moreForRelate\').slideToggle();">More</span>  <div class="myRelateMF">
                                            <img src="../web/icons/male.png" class="sf-icons" alt="male"/>'.$male_cnt.'
                                            <img src="../web/icons/female.png" class="sf-icons30"  alt="female"/>'.$fml_cnt.'
                                                </div>
                                     <div id="moreForRelate" style="display: none">
                                         <div class="moreItem">
                                             Disconnected Relations - '.$he_disctd.' people
                                         </div>
                                         <div class="moreItem">
                                             Disconnected by - '.$disctd_by.' people
                                         </div>
                                         <div class="moreItem">
                                              Requests - '.$his_reqsts.' people
                                         </div>
                                         <div class="moreItem">
                                              Proposed by - '.$his_prps.' people 
                                         </div>
                                         
                                     </div>
                                    </div>';
                                
                                $q="select cu_id as cf from contacts where user_id=$user_id and type='Enemies'";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $em_ct=0;
                                    $cmn_emn=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $em_ct=$em_ct+1;
                                        
                                        while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                                        {
                                           $his_if=$row['cf'];
                                           $q1="select cu_id as c from contacts where user_id=$viewer_id and cu_id=$his_if";
                                           $r1=mysqli_query($dbc,$q1);
                                           if($r1)
                                           {
                                               if(mysqli_num_rows($r1)>0)
                                               {
                                                   $cmn_emn=$cmn_emn+1;
                                               }
                                           }
                                        }
                                        
                                    }
                                }
                                
                                 
                                      $q="select cu_id as cf from contacts where user_id=$user_id and type='Classmates'";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $cls_ct=0;
                                       $cmn_cls=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $cls_ct=$cls_ct+1;
                                     
                                        while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                                        {
                                           $his_if=$row['cf'];
                                           $q1="select cu_id as c from contacts where user_id=$viewer_id and cu_id=$his_if ";
                                           $r1=mysqli_query($dbc,$q1);
                                           if($r1)
                                           {
                                               if(mysqli_num_rows($r1)>0)
                                               {
                                                   $cmn_cls=$cmn_cls+1;
                                               }
                                           }
                                        }
                                        
                                    }
                                }
                                
                                  $q="select cu_id as cf from contacts where user_id=$user_id and type='Unknown'";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $un_ct=0;
                                           $cmn_un=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $un_ct=$un_ct+1;
                                 
                                        while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                                        {
                                           $his_if=$row['cf'];
                                           $q1="select cu_id as c from contacts where user_id=$viewer_id and cu_id=$his_if";
                                           $r1=mysqli_query($dbc,$q1);
                                           if($r1)
                                           {
                                               if(mysqli_num_rows($r1)>0)
                                               {
                                                   $cmn_un=$cmn_un+1;
                                               }
                                           }
                                        }
                                        
                                    }
                                }
                                
                                  $q="select cu_id as cf from contacts where user_id=$user_id and type='Friends'";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $fr_ct=0;
                                     $cmn_frd=0;
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        $fr_ct=$fr_ct+1;
                                       
                                        while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                                        {
                                           $his_if=$row['cf'];
                                           $q1="select cu_id as c from contacts where user_id=$viewer_id and cu_id=$his_if ";
                                           $r1=mysqli_query($dbc,$q1);
                                           if($r1)
                                           {
                                               if(mysqli_num_rows($r1)>0)
                                               {
                                                   $cmn_frd=$cmn_frd+1;
                                               }
                                           }
                                        }
                                        
                                    }
                                }
            
                                echo'
                                <table>
                                    
                                    <tr>
                                        <td>
                                            <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead" >No.of Friends </div><span class="divider"  style="color:darkgrey">-</span><div class="myEduSubHead" > '.$fr_ct.'</div>
                                    </div>
                                    <div class="myEduAns" >
                                       <span  onclick="show_his_rels_prf('.$user_id.',1)"> Friends  </span>';
                                if($sm==0)
                                {
                                    echo'    <div class="whoAreCommon" onclick="show_my_common_rels(\'Friends\',\''.$user_id.'\')">
                                            '.$cmn_frd.' people in common
                                            <div class="for_cmn_frds" >
                                            </div>
                                        </div>
                                   ';
                                }
                                    echo'    
                                    </div>
                                </div>
                                        </td>
                                        <td>
                                            <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl" >
                                        <div class="myEduSubHead">No.of  Enemies </div><span class="divider"><span class="divider"  style="color:darkgrey">-</span></span><div class="myEduSubHead" > '.$em_ct.'</div>
                                    </div>
                                    <div class="myEduAns" >
                                       <span onclick="show_his_rels_prf('.$user_id.',2)"> Enemies </span>  ';
                                if($sm==0)
                                {
                                    echo'    <div class="whoAreCommon" onclick="show_my_common_rels(\'Enemies\',\''.$user_id.'\')">
                                            '.$cmn_emn.' people in common
                                            <div class="for_cmn_enm" >
                                            </div>
                                        </div>
                                  ';
                                }
                                     echo' </div>
                                </div>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <td>
                                           <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead">No.of  Classmates </div><span class="divider"  style="color:darkgrey">-</span><div class="myEduSubHead" >'.$cls_ct.'</div>
                                    </div>
                                    <div class="myEduAns" >
                                       <span onclick="show_his_rels_prf('.$user_id.',3)"> Classmates  </span>';
                                if($sm==0)
                                {
                                    echo '   <div class="whoAreCommon" onclick="show_my_common_rels(\'Classmates\',\''.$user_id.'\')">
                                            '.$cmn_cls.' people in common
                                            <div class="for_cmn_cls" >
                                            </div>
                                        </div>';
                                }
                                    
                                echo'    </div>
                                </div> 
                                        </td>
                                        <td>
                                            <div class="myEduItem" >
                                    
                                    <div class="myEduSubTtl">
                                        <div class="myEduSubHead">No.of Unknown </div><span class="divider"  style="color:darkgrey">-</span><div class="myEduSubHead" >'.$un_ct.'</div>
                                    </div>
                                    <div class="myEduAns">
                                       <span  onclick="show_his_rels_prf('.$user_id.',4)"> Unknown </span> 
                                           ';
                                if($sm==0)
                                {
                                    echo'  <div class="whoAreCommon" onclick="show_my_common_rels(\'Unknown\',\''.$user_id.'\')">
                                            '.$cmn_un.' people in common
                                            <div class="for_cmn_un" >
                                            </div>
                                        </div>';
                                }
                                      
                                   echo' </div>
                                </div>
                                        </td>
                                </table>
                            
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
                                </div>';

                                if($sm!==0)
                                {

                                }else
                                {
                                  $q="SELECT about as u from about_you where user_id=$user_id and thinker_id=$viewer_id";
                                  $r=mysqli_query($dbc,$q);
                                  if($r)
                                  {
                                    if(mysqli_num_rows($r)>0)
                                    {
                                      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                                      $tnks=$row['u'];
                                       echo'   <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                      You
                                    </div>
                                    <div class="profInfoAns">
                                       '.$tnks.'
                                    </div>
                                
                                </div>
                              '; 
                                    }
                                  }
                                  
                                }

                               
                               echo ' <div class="profInfoItem">
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
                                    <div id="helpContentItem">'.$f_name.' will get direct notification that you proposed him <br/>And if he accepts you will receive a notification with his message</div>
                                
                                    <div id="helpInnerTitle">Secret & Smart</div>
                                    <div id="helpContentItem">'.$f_name.' will not get any notification but when he also tries to propose you , <br> Both of you receive notification</div>
                                
                                   
                                   
                                    
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

?>