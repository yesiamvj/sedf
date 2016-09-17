
<?php session_start();
if(empty($_GET['username']))
{
     header("location:home.php");
}else
{
       if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
{
       $url='profile.php?username='.urlencode($usename);
        header("location:$url");
}
       $user_name=$_GET['username'];
       require '../web/mysqli_connect.php';
  
    $name=0;
    
     $q="SELECT user_id as u from users where username='$user_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u'];
         
     if(!empty($user_id))
      {
            
            $nowuser=$_SESSION['pre_user'];
    if($user_name!==$nowuser)
    {
             
              $url='../'.$user_name.'/profile.php?pass1='.urlencode($user_name);
         $_SESSION['pre_user']=$user_name;    
    header("location:$url");
    }
     
      }else
      {
               $user_name= $_SESSION['pre_user'];    
            $url='../'.$user_name.'/profile.php?pass1='.urlencode($user_name);
    header("location:$url");
      }
			
      $today = date("g:i a ,F j, Y"); 
      
      $iam=0;
      $q="insert into history(profile_view,user_id,time,seen)values(0,$user_id,'$today',0)";
       $r=mysqli_query($dbc,$q);
    }
      
     $q="select profile_update as p from person_config where user_id=$user_id";
   $r=  mysqli_query($dbc, $q);
   if($r)
   {
          $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
          $last_update=$rt['p'];
   }
$q3="select year as y,day as d,month as m,sex as sex,age as ag from basic where user_id=$user_id";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
if(mysqli_num_rows($r3)>0 )
{
$row3=mysqli_fetch_array($r3,MYSQLI_ASSOC);
$year=$row3['y'];
$mnth=$row3['m'];
$day=$row3['d'];
$age=$row3['ag'];
$sex=$row3['sex'];
if($sex=="boy")
{
    $sex="Male";
}else
{
    $sex="Female";
}
  if($sex=="Female")
                              {
                                  
                          $gen_pic="../web/icons/female.png"; 
                              }else
                              {
                                   $gen_pic="../web/icons/male.png";
                              } 

}else
{
$year="";
$mnth="";
$day="";
$age="";
$sex="";
 $gen_pic="../web/icons/male.png";
                            
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

  $q="select first_name as f_name from basic where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $f_name=$row['f_name'];
   }else
   {
          $f_name=$q;
   }
 
   
     
         $q="select verified_users as u from verify where user_id=$user_id  order by verify_id desc";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
		     $vf=0;
		     $vfu=0;
		     $verified_users=array();
		     $vfusr_name=array();
		     if(mysqli_num_rows($r)>0)
		     {
		            $vf=$vf+1;
		            $vfu=$vfu+1;
		            while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
		            {
			  $verified_users[$vf]=$row['u'];
			    $uname="select c_name as fname from contacts where user_id=$verified_users[$vf]";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $vfusr_name[$vfu]=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$verified_users[$vf]";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $vfusr_name[$vfu]=$rowemail['em'];
                                                             }
                                                         }
                                                     }
		            }
		            
		     }
		     $my_vf_times=0;
		     if(mysqli_num_rows($r)>2)
		     {
		           $my_vf_times=1; 
		     }
		          $qr="select verify from my_verify where user_id=$user_id";
                                        $rr=mysqli_query($dbc,$qr);
                                        if($rr)
                                        {
                                            if(mysqli_num_rows($rr)>0)
                                            {
                                                 $my_vf_times=2;
                                            }
                                        }
		      if($my_vf_times==1 || $my_vf_times==2)
		      {
		             $verify_status="Verified";
		      }else
		      {
		             $verify_status="Not Verfied";
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
    <link rel="stylesheet" href="../web/profile_newcss.css"/>
    <link rel="stylesheet" href="../web/people_new.css"/>
    
   <link rel="stylesheet" href="../web/groupMembers.css"/> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/profile_new.js" type="text/javascript"></script>
  </head>
  
  <body  >
      
        <div id="fullPageContainer">
            <div id="pageLoadStatus"></div>
            <div class="welcomeScreen" id="SedFed_Welcome_Screen" onclick="$(\'#SedFed_Welcome_Screen\').animate({\'top\':\'-110%\'},\'slow\');" >
                <div class="welTtl">
                   '.$f_name.'
                </div>
                <div class="welcomeScreenWalPaper" style=" background-image: url(\'../web/icons/post-testimg.jpg\');" >
                    <div class="clickTp">
                        Click to view Profile
                    </div>
                </div>
            </div>
            
            ';
    if($verify_status!=="Verified")
    {
           $vrf_icon='../web/ex.png';
    }else
    {
           $vrf_icon='../web/icons/okTop.png';
    }
    echo '
                <div id="Topest">

                    <div id="title_bar">
                        <div class="primaryTtlBar" >
                            <font id="sedfedUserName" >
                            <img src="'.$vrf_icon.'" alt="'.$verify_status.'" id="ico_AmIExist" onmouseover="$(\'#hYT-Tt-Verify\').fadeIn()" onclick="$(\'#hYT-Tt-Verify\').toggle()"/>
                               '.$f_name.'  
                            </font>
                            
                        </div>
                      
                      
                    
                         
                    </div>
                     <div class="secondaryNavTtlBar">
                       
	        
	      
                         
                        
                    </div>
                    </div>
                    <div class="SedFed_Primary_Detail">
                          <div class="SFTtl_userIdText" style="display: none;" >
                              SedFed ID 
                          </div>
                          <div id="SF_UserAddrsBarDets" style="display: none;" >
                              <div class="SF_UADBD_Itm">
                                  sedfed.com/'.$user_name.'
                              </div>
                              <div class="SF_UADBD_Itm">
                                  sedfed.com/'.$user_id.'
                              </div>
                          </div>
                          <div class="SF_UserId" title="Click for Details" onclick="$(\'#SF_UserAddrsBarDets\').slideToggle()" onmouseover="$(\'.SFTtl_userIdText\').show();" onmouseout="$(\'.SFTtl_userIdText\').hide();" >  
                              '.$user_id.'
                          </div>
                      </div>

                </div>
                
';
    $q="select theme as th ,txt_clr as c from person_config where user_id=$user_id";
    $r=  mysqli_query($dbc,$q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $theme=$row['th'];
	 $txt_clr=$row['c'];
           }else
           {
	  $theme="navy";
	 $txt_clr="";
           }
    }
           
    echo '
            <div id="innerPageCont">
               
                                 
                
                <div id="sf-profileHolder" >
                  
                  
                    <div id="innerProfile" onmouseover="meOnProfile()" >
                        <div id="myFirstAppear" style="background-color:'.$theme.';color:'.$txt_clr.';">
                            <div id="myProfilePic" >
                                     <div class="heyYoyThereTt" id="hYT-Tt-Verify" style="display: none" >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="TtTitleProp">
                                                Statistics  <div class="helpforProp" onclick="$(\'#verifyHelpWindow\').slideDown();" >? help</div>
                                            </div>
                                           ';
    if($my_vf_times==1)
    {
           echo '<div class="hYT-Item">Profile Verified by<div id="vrfyPplHold" class="hYT-ans" style="cursor: pointer" > 3 people 
                       <div id="vrfyPpl">   ';
           for($t=1;$t<=count($vfusr_name);$t++)
           {
	 echo '                             
                                     '.$vfusr_name[$t].'              
                                         ';
           }
	 echo '    </div>       </div>';
    }
                                           
		           echo '    
			     </div>
                                           
                                        </div>
                                    </div>
                                    
                               ';
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
 $q23="SELECT username as u,mobno as m ,email as em from users where user_id=$user_id";
$r23=mysqli_query($dbc,$q23);
if($r23)
{
  $row23=mysqli_fetch_array($r23,MYSQLI_ASSOC);
  $email=$row23['em'];
  $usernm=$row23['u'];

}else
{
  echo mysqli_error($dbc);
}
                  
		           echo'
                                <!-- profile image -->
                               
                                <img src="'.$ppics.'" alt="'.$f_name.'" onclick="showMyFace()"/>
                                <div class="MyNameIs">
                                    '.$f_name.' <span class="OtherWiseKnownAs"> '.$nicknm.' </span>
                                </div>
                                <div class="curPositionFocus">
                                   '.$org.'
                                </div>
                           </div>
                           
                           <div id="myFirstDetails">
                               
                                <div class="heyYoyThereTt" id="hYT-Tt-Contact" style="display: none" >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="hYT-Item">Mobile  <div class="hYT-ans">'.$mob_no.'</div></div>
                                            <div class="hYT-Item">Email ID <div class="hYT-ans">'.$email.'</div></div>
                                            <div class="hYT-Item">Blog / Website <div class="hYT-ans">www.sedfed.com/'.$usernm.'</div></div>
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
                                                <div class="propItem"onclick="proposeMe(\'#prop-btn-secret\',\'<br> Proposed Secretely <br> Best Of Luck \',\''.$user_id.'\',1)" >Smart</div>
                                       
                                            </div>
                                            </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="heyYoyThereTt" id="hYT-Tt-Stats" style="display: none" >
                                    ';
		            $q="SELECT profile_view as pf from history where user_id=$user_id"; 
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                      if(mysqli_num_rows($r)>0)
                                      {
                                         $pv_count=mysqli_num_rows($r);
                                     
                                      }else
                                      {
                                        $pv_count=1;
                                      }
                                    }
                                    $q="SELECT post_id as p from post_permision where user_id=$user_id";
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                      $pcnt=mysqli_num_rows($r);
                                     
                                    }
		           echo '
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="TtTitleProp">
                                                Statistics 
                                                
                                            </div>
                                            <div class="hYT-Item">Profile Views  <div class="hYT-ans">'.$pv_count.'</div></div>
                                           
                                            <div class="hYT-Item">Total Posts<div class="hYT-ans">'.$pcnt.'</div></div>
                                              
		           ';
		           $add_vrf=0;
		           if($my_vf_times===2)
		           {
			$add_vrf=1; 
		           }
		           $tot_vrf=  count($vfusr_name)+$add_vrf;
		           if($tot_vrf==0)
		           {
			 $vrf_sts="Not verified";
		           }else
		           {
			 $vrf_sts="Verified By";
		           }
		           echo '
                                             <div class="hYT-Item">Profile '.$vrf_sts.'<div id="vrfyPplHold" class="hYT-ans" style="cursor: pointer" > '; 
		           
		           if($tot_vrf!==0)
		           {
			 echo ''.$tot_vrf.' people ';
		           }
                                                     echo '<div id="vrfyPpl">';
                                                        $q="select verified_users as vs from verify where user_id=$user_id";
                                              $r=mysqli_query($dbc,$q);
                                              if($r)
                                              {
			  $ct=0;
                                                if(mysqli_num_rows($r)>0)
                                                {
                                                  while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                                  {
			      $ct=$ct+1;
                                                    $vf_users=$row['vs'];
                                                      $uname="select first_name as fname from basic where user_id=$vf_users";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $vfusr_name[$ct]=$rownm['fname'];
                                                         }else{
                                                             $selemail="select email as em from users where user_id=$vf_users";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $vfusr_name[$ct]=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                     echo''.$vfusr_name[$ct].'<br/>';
                                                  }
                                                }
		              
		              
			 if($my_vf_times==2)
			 {
			      echo ' & By Sedfed';  
			 }
                                              }
                                            
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
                                                     echo'</div> 
                                                 </div></div>
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
                                    
                                    <img class="hideOnAvlo" src="../web/icons/prof-contact.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Contact\',event)"/><br/>
                                     ';
			
                                    echo '
		 <img class="hideOnAvlo" src="../web/icons/prof-statis.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Stats\',event)"/><br/>
                                    <img id="img-avlothana" style="margin-top: 12.5px;" class="hyticos" src="../web/icons/prof-avlothana.png" alt="contact" onclick="$(\'.hideOnAvlo\').slideToggle()"  /><br/>
                                    
                                </div>
                            </div>
                       </div>
                        <div id="SedFed_Detail_Bench_Out">
                            <div class="SedFed_Detail_Bench_Inner">';
			  $q="select cu_id as c from contacts where user_id=$user_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $tot_contact=mysqli_num_rows($r);
                                   
                                }
		   echo '<div class="SFDB_ItmHold">
                                    <img src="'.$gen_pic.'" class="ico_SFDB" alt="Male" />
                                    <div class="SFDB_Ans" style="color:green" >
                                       '.$sex.'
                                    </div>
                                </div>';
                             
		      echo '
                                <div class="SFDB_ItmHold">
                                    <img src="../web/icons/birthdayCake.png" class="ico_SFDB" alt="Male" />
                                    <div class="SFDB_Ans" style="color: orange">';
		      if($mnth=="" && $day=="")
		      {
		             echo'Not given';
		      }  else {
		             echo '  '.$mnth.' '.$day.'';
		      }
                                    
                                    echo '</div>
                                </div>
                                <div class="SFDB_ItmHold">
                                    <div id="SFDB_Age">'.$age.' </div>
                                    <div class="SFDB_Ans" style="color:darkcyan" >
                                        Age
                                    </div>
                                </div>
                                <div class="SFDB_ItmHold">
                                    <img src="../web/icons/location.png"  class="ico_SFDB" alt="Male" />
                                    <div class="SFDB_Ans" style="color:blue" >
		  ';
		  if(empty($cur_loc))
		  {
		         echo 'Not given';
		  }else
		  {
		         echo ' '.$cur_loc.'';
		  }
                                  
                                   echo ' </div>
                                </div>
                                <div class="SFDB_ItmHold">
                                    <div id="SFDB_Relations">'.$tot_contact.'</div>
                                    <div class="SFDB_Ans" style="color: darkmagenta" >
                                        Relations
                                    </div>
                                </div>
                            </div>
                        </div>';
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
 $q="SELECT clg as cl,clgdist as cd from college where user_id=$user_id";
                          $r=mysqli_query($dbc,$q);
                          if($r)
                          {
                            if(mysqli_num_rows($r)>0)
                            {
                            
                              $clg=$row['cl'];
                               $clg_plc=$row['cd'];
                              
                            }else
                            {
                               $clg="";
                              
                             }
                          }else
                          {
                            echo'not run';
                          }
	         
	        //select privacy
	        {
	                 
		      $show_edu=0;
		      $show_cur=0;
		      $show_fam=0;
		      $show_fav=0;
		      $show_annoy=0;
		      $show_abt_me=0;
		      $show_abt_thing=0;
		      $show_gadgets=0;
		      $show_loc=0;
		      
		      $q="select education as e,location as lc,family as fm,current as ct,aboutme as abt,favorite as fvt,annoying as an,gadgets as gt,about as abt_th from profile_sets where user_id=$user_id";
		      $r=  mysqli_query($dbc, $q);
		      if($r)
		      {
		             if(mysqli_num_rows($r)>0)
		             {
			   $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
			   $edu_prvcy=$row['e'];
			   $loc_prvcy=$row['lc'];
			   $fam_prvcy=$row['fm'];
			   $cur_prvcy=$row['ct'];
			   $abtme_prvcy=$row['abt'];
			   $fav_prvcy=$row['fvt'];
			   $ann_prvcy=$row['an'];
			   $gadget_prvcy=$row['gt'];
			   $abtthng_prvcy=$row['ab_th'];
			   
		             }else
		             {
			   $edu_prvcy=0;
			   $loc_prvcy=0;
			   $fam_prvcy=0;
			   $cur_prvcy=0;
			   $abtme_prvcy=0;
			   $fav_prvcy=0;
			   $ann_prvcy=0;
			   $gadget_prvcy=0;
			   $abtthng_prvcy=0;
			    }
		      }
		      if($edu_prvcy==0)
		      {
		      $show_edu=1;
		             
		      }
		      if($edu_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_edu=1;
		       }
		      }
		      if($edu_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_edu=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      
		      // location
		          if($loc_prvcy==0)
		      {
		      $show_loc=1;
		             
		      }
		      if($loc_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_loc=1;
		       }
		      }
		      if($loc_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_loc=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      //family
		          if($fam_prvcy==0)
		      {
		      $show_fam=1;
		             
		      }
		      if($fam_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_fam=1;
		       }
		      }
		      if($fam_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_fam=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      } 
		      //current
		          if($cur_prvcy==0)
		      {
		      $show_cur=1;
		             
		      }
		      if($cur_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_cur=1;
		       }
		      }
		      if($cur_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_cur=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      //aboutme
		          if($abtme_prvcy==0)
		      {
		      $show_abt_me=1;
		             
		      }
		      if($abtme_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_abt_me=1;
		       }
		      }
		      if($abtme_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_abt_me=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      //favorite
		          if($fav_prvcy==0)
		      {
		      $show_fav=1;
		             
		      }
		      if($fav_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_fav=1;
		       }
		      }
		      
		      if($fav_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_fav=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      //annoying
		          if($ann_prvcy==0)
		      {
		      $show_annoy=1;
		             
		      }
		      if($ann_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_annoy=1;
		       }
		      }
		      if($ann_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_annoy=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      //gadgets
		         if($gadget_prvcy==0)
		      {
		      $show_gadgets=1;
		             
		      }
		      if($gadget_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_gadgets=1;
		       }
		      }
		      if($gadget_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_gadgets=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      //about things
		          if($abtthng_prvcy==0)
		      {
		      $show_abt_thing=1;
		             
		      }
		      if($abtthng_prvcy==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		             $show_abt_thing=1;
		       }
		      }
		      if($abtthng_prvcy==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_abt_thing=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		    
	        }
	         //end select privacy 
	        		      
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

		      echo '
                        <div class="mySuperProfile">
                            <div class="myFocusProfile"  id="FocusProfileCenter" >
                                <div class="myFocusProfileWallPaper" id="fgy"  style="background-image: url(\''.$w_pic.'\');">
                                    <div class="myFocusProfile_UserName">
                                        '.$user_name.'
                                    </div>
                                </div>
                                <div class="myFocusProfileFace" id="profileImge_Static" >
                                    <img src="'.$ppics.'" id="img_focusProf" alt="'.$f_name.'" /> 
                                </div>
	               
';
		      	     $q="select nationality as n from cur_details where user_id=$user_id";
$r=  mysqli_query($dbc, $q);
if($r)
{
       if(mysqli_num_rows($r)>0)
       {
              $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
              $nationality=$row['n'];
       }else
       {
              $nationality="";
       }
}
$q="SELECT me as me,you as y,family as fm,love as l,frndship as f,studies as st,politics as p,life as lf,god as g,boys as bys,girls as gy,marriage as mr,entertainment as en,wtow as w from about where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
       
{
       $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
       if(!empty($row))
       {
        $wtow=$row['w'];      
       }  else {
       $wtow="";       
       }
        
}

		        echo '
                                <div class="myFocusProfileDetails">
                                    <div class="MFPD_Ttl">
                                        Proud of ...
                                    </div>
                                    <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                        I am an 
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$nationality.'
                                    </div>
                                    </div>
                                 
                                    <div class="MFPD_Itm" id="myCustomAnsQue" >
                                        '.$wtow.'
                                    </div>
                                   
                                    
                                </div>
                            </div>
                           
	           ';
		
	        if( $show_cur==1 || $show_cur!==1)
	        {
	               if($show_cur!==1)
	               {
		     $sts_img="";
		     $sts_clr="";
		     $mystatus="";
		     $mood="";
		     $moodorany="";
		     $moodwith="";
		     $cur_loc="";
		     $status="";
		     $withrel="";
		     $orany="";
		     $org="";
	               }
	                  echo '
                        <div class="myCurrentInfoOut" id="currentInfo"> 
                            <div class="profTypeTitle" >Current </div>
                         
                            <div class="myCurInfoInner">
                                <div class="StatusImg">
                                    <img id="stsImg" src="'.$sts_img.'"  />
                                </div>
                                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status
                                    </div>
                                    <div class="profInfoAns">
                                        <font color="'.$sts_clr.'">'.$mystatus.'</font>
                                    </div>
                                </div>
	                <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Status BGM
                                    </div>
                                    <div class="profInfoAns">
                                       <audio width="100" src="'.$sts_bgm.'" autoplay controls>  </audio>
                               
                                    </div>
                                </div>
	                   
                                 <div class="profInfoItem">
                                    <div class="profInfoTtle">
                                        Mood
                                    </div>
                                    <div class="profInfoAns">
                                       '.$mood.'<span style="color:grey" >&nbsp; 
		            ';
		      if($moodwith=="")
		      {
		echo '              or</span><span id="moodWith">'.$moodorany.'</span>
                                  ';             
		      }  else {
		echo '              with</span><span id="moodWith">'.$moodwith.'</span>
                                  ';             
		      }
		      
		      echo '
		              
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
                                        Relationship Status
                                    </div>
                                    <div class="profInfoAns">
                                     '.$status.'';
		      if($orany=="")
		      {
		             if($withrel=="")
		             {
			   echo ''.$withrel.'';
		             }
		      }else
		      {
		             echo ''.$orany.'';
		      }
		      echo '
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
		  '.$org.'
                                    </div>
                                </div>
                                
                               
                                
                            </div>
                        </div>
';
	        }
		   
    
		  
		
                                
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
	               $q="select profile_update as p from person_config where user_id=$user_id";
   $r=  mysqli_query($dbc, $q);
   if($r)
   {
          $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
          $last_update=$rt['p'];
   }
                          echo ' 
                         <div class="peopleViewer" style="display:none;" id="peopleViewerWindow" >
          <div class="peopleViewerInnr">
              <div class="peopleViewerTtl"><span id="frds_type_view">Friends</span> of Vijay <span class="closePVI" onclick="$(\'#peopleViewerWindow\').fadeOut()">X</span> </div>
              <div id="wholePeopleItm"></div>
             
          </div>
      </div>';
	         
	         echo '
                        <div class="myCurrentInfoOut" id="myRelationHolder" >
                            <div class="profTypeTitle" id="DetTtl_Rels" >Relations<div class="profTypeTitleImg"><img class="img_profTypeTitleImg" src="../web/icons/profPage/rels.png"/> </div></div>
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
                               
                            
                               </div>
                        </div>';


                  
 
 
                      echo'
                        
                    </div>
                    
                </div>
            </div>
            
';  $like_png='../web/icons/post-sf-liked.png';
		     $unlike_png='../web/icons/post-sf-unliked.png';
		     $fav_png='../web/icons/post-rated-3.png';
		  
	              
	              $q1="select person_like as pl,person_unlike as pul,fav as fv  from person_status where user_id=$user_id";
	              $r1=  mysqli_query($dbc, $q1);
	              if($r1)
	              {
		    
		    $p_like_cnt=0;
		    $p_unlike_cnt=0;
		    $p_fav_cnt=0;
		    $row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
		    $likes=$row['pl'];
		    $unlikes=$row['pul'];
		    $favs=$row['fv'];
		    if($likes==1)
		    {
		    $p_like_cnt=$p_like_cnt+1;       
		    }
		    if($unlikes==1)
		    {
		    $p_unlike_cnt=$p_unlike_cnt+1;       
		           
		    }
		    if($favs==1)
		    {
		    $p_fav_cnt=$p_fav_cnt+1;       
		           
		    }
		    
	              }
	              
	              
	              echo '
                  <div id="howThisPerson" >
                      <div class="howMyProf"> How was '.$f_name.'\'s profile ?</div>
	     
                        <div id="innerHTP">
                           
                            <div id="me-LikeHold" class="hTP-holders" >
                                <img src="'.$like_png.'" id="like_icon" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; <span id="p_like_cnt">'.$p_like_cnt.'</span></span> 
                        </div>
	       
                        <div id="me-UnlikeHold" class="hTP-holders"   >
                            <img src="'.$unlike_png.'" id="unlike_icon" alt="UnLike This Person" /><span id="meUnlikes">&nbsp;&nbsp; <span id="p_unlike_cnt">'.$p_unlike_cnt.'</span></span>
                        </div>
	       
                        <div id="me-RateHold" class="hTP-holders"  >
                            <img src="'.$fav_png.'" id="fav_icon" alt="Add This Person to your Favorites" /><span id="meRates">&nbsp;&nbsp; <span id="p_fav_cnt">'.$p_fav_cnt.'</span></span>
                        </div> <div id="me-CommentHold" class="hTP-holders" >
                            <img src="../web/icons/ok.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; '.$tot_vrf.'</span>
                        </div>
                            <div id="me-ShareHold" class="hTP-holders" title="Profile Updates" >
                                <img src="../web/icons/last_edit.png" alt="Like This Person" /><span id="meShares">&nbsp;&nbsp; 0</span>  <span id="HTP_ProfLastUpd">&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; Last Update : '.$last_update.' &nbsp;&nbsp; )</span>
                        </div>
                        </div>
                        
                     <div class="thisPersonExtras">';
	           if($verify_status!=="Verified")
	           {
		 if($tot_vrf==0)
		 {
		               echo '
                          <div class="HTP_TPE_Verifs">
                              '.$f_name.' is not verified still now on SedFed . 
                          </div>';
		        
		        
		 }else
		 {
		       
			      echo '
                          <div class="HTP_TPE_Verifs">
                             '.$f_name.' is verified '.$tot_vrf.'. 
                          </div>'; 
		        
		       
		 }
		
	           }  else {
		echo '
                          <div class="HTP_TPE_Verifs">
                              '.$f_name.' is verified on SedFed . 
                          </div>'; 
	           }
		echo '
                          <div class="HTP_TPE_otherAddrss">
                              You can visit this page by &nbsp;&nbsp; "&nbsp;&nbsp; <a class="profAnotherType" href="../'.$user_id.'">sedfed.com/'.$user_id.'</a>&nbsp;&nbsp;  "&nbsp;&nbsp; too ( e.g - sedfed.com/SedFed ID ).
                          </div>
                      </div>
                      <div class="bottomSedFedLogo">
                          SedFed 2.0 
                          <div class="SF_PROFVersion">
                              Profile Version 2.5
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
                                
                                   <!--<div class="firDetCont" style="color:blue;">Male <div class="firDetContEx" style="color:gray;margin-top: -30px;">Otherwise known as <div class="firDetCont" style="color:crimson;font-size: 19px;">VJ</div></div></div>
                                      
                                         <div style="color:white;" >sedfed</div>
                                         <div class="firDetCont" style="margin-top: -25px;" > 18<sub> + </sub> <div class="firDetContEx" style="color:gray">'.$last_update.'</div></div>
                                     
                                     <div class="firDetCont">Unmarried</div>
                                     <div class="firDetCont">Indian <div class="firDetContEx" style="color:gray"> India , TamilNadu</div></div>-->
                                   
                                    
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
