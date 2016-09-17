
<?php session_commit();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
     header("location:index.php");
}else
{
       
    include '../web/title_bar.php';
       
       require_once '../web/mysqli_connect.php';
   $viewer_id=$_SESSION['user_id'];
    $name=$_SESSION['user_name'];
    
     $q="SELECT user_id as u from users where username='$user_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      
     if(mysqli_num_rows($r)>0)
      {
         $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
     
          $user_id=$row['u'];
          $owner_id=$user_id;
            $_SESSION['pre_user']=$user_name;
            $nowuser=$_SESSION['pre_user'];
    if($user_name!==$nowuser)
    {
             
              $url='../'.$user_name.'/profile.php?username='.urlencode($user_name);
         $_SESSION['pre_user']=$user_name;    
    header("location:$url");
    }
     
      }else
      {
    echo '<script>window.location.href=\'home.php\'</script>';
      }
			
      $today = date("g:i a ,F j, Y"); 
      $iam=0;
      if($user_id!==$viewer_id)
      {
          $iam=1;
        
      }
    }else
    {
        header("location:home.php");
    }
    $q="insert into history(profile_view,user_id,time,seen)values($viewer_id,$user_id,'$today',0)";
       $r=mysqli_query($dbc,$q);
      
       $sm=0;
    
    if($viewer_id==$user_id)
    {
      $sm=$sm+1;
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
$q2="select nick_name as nm,nativeplace as npl from basic where user_id=$user_id";
$r2=mysqli_query($dbc,$q2);
if($r2)
{
if(mysqli_num_rows($r2)>0 )
{
  $row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
$nicknm=$row2['nm'];
$native_place=$row2['npl'];
}else
{
$nicknm="";
$native_place="Not Given";
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
  $q="SELECT first_name as f_name from basic where user_id=$viewer_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $viewer_name=$row['f_name'];
   }
   $q="select profile_update as p from person_config where user_id=$user_id";
   $r=  mysqli_query($dbc, $q);
   if($r)
   {
          $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
          $last_update=$rt['p'];
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
	         
	                $q1="SELECT `prof_audience` as audis, theme_txt_color as theme_txt_color,`profPic_Style` as profPic, `backPic_Style` as backPic, `prof_Theme` as profTheme ,`welcomeScr` as welcomeScr ,`welScrStyle` as welScrStyle , `welGlassClr` as welGlassClr FROM `settings_profile`  WHERE `user_id` = '$user_id'";
      $r1=  mysqli_query($dbc, $q1);
      if($r1){
             
          $rowre= mysqli_fetch_array($r1,MYSQLI_ASSOC);
          $audis=$rowre['audis'];
          $profPic=$rowre['profPic'];
          $backPic=$rowre['backPic'];
         $theme_txt_color=$rowre['theme_txt_color'];
          $profTheme=$rowre['profTheme'];
          $welcomeScr=$rowre['welcomeScr'];
          $welScrStyle=$rowre['welScrStyle'];
          $welGlassClr=$rowre['welGlassClr'];
          switch ($audis){
              case 0:
                  $audis='None';
                  break;
              
              case 1:
                  $audis='Relations only';
                  break;
              case 2:
                  $audis="Relations Of Relations";
                  break;
              case 3:
                  $audis="Everyone";
                  break;  
           default :
	   $audis="Everyone";
                  break;  
          }
          switch ($profPic){
              case 1:
                  $profPic='Square';
	 $profPicStyle='0px';
	 
                  break;
              case 2:
                  $profPic='Circle';
	    $profPicStyle='250px';
                  break;   
              default:
	      $profPic='Circle';
	    $profPicStyle='250px';
                  break;  
	    
          }
          switch ($backPic){
              case 1:
                  $backPic='0px';
                  break;
              case 2:
                  $backPic='550px';
                  break;
           default :
	  $backPic='0px';
                  break;
          }
          
          switch ($welScrStyle){
              case 1:
                  $welScrStyle='background-image: url(\''.$w_pic.'\');';
                  
                  break;
              case 2:
                  $welScrStyle='background-color:'.$welGlassClr.'';
                 
                  break;   
           default :
	      $welScrStyle='background-image: url(\''.$w_pic.'\');';
                  
                  break;  
          }
          
          if($welcomeScr==1){
              $displaywall='block';
          }
          else{
              $displaywall='none';
          }
          
          
          
          
      }
      else{
          echo mysqli_error($dbc);  
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
   <script src="../web/jquery.min.js" type="text/javascript"></script>
   <script src="../web/profile_new.js" type="text/javascript"></script>
  <script src="../web/jquery.min.js" type="text/javascript"></script>
   
   <script src="../web/onlines.js" type="text/javascript"></script>
  </head>
  
  <body  >
      
        <div id="fullPageContainer">
            <div id="pageLoadStatus"></div>
            <div class="welcomeScreen" style="display:'.$displaywall.'" id="SedFed_Welcome_Screen" onclick="$(\'#SedFed_Welcome_Screen\').animate({\'top\':\'-110%\'},\'slow\');" >
                <div class="welTtl">
                   '.$f_name.'
                </div>
                <div class="welcomeScreenWallPaper" style="'.$welScrStyle.'" >
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
                      <a href="../'.$owner_id.'"><div class="secNavToolItm">
                            Timeline
                         </div></a>
                      <a href="../web/people_post.php?user='.$user_id.'"><div class="secNavToolItm">
                             Posts
                         </div></a>
                         <a href="../web/show_rels_of_pers.php?user='.$user_id.'"><div class="secNavToolItm">
                             Relations
                         </div></a>
	       
                         <a href="storage.php"><div class="secNavToolItm">
                             Storage
                         </div></a>
                         <a href="photos.php"><div class="secNavToolItm">
                             Photos
                         </div></a>
                         <a href="videos.php"><div class="secNavToolItm">
                             Videos
                         </div></a>
	        <a href="files.php"><div class="secNavToolItm">
                             Files
                         </div></a>
                              <a href="wall.php"><div class="secNavToolItm">
                             Wishes
                         </div></a>
                         
                          <a href="blog.php"><div class="secNavToolItm">
                             Blog
                         </div></a>
                        
	       
                         
                        
                    </div>
                    </div>
                    ';
    $q2="SELECT msgAllowFrom as msgAllowFrom FROM `settings_messages` WHERE  user_id= $user_id;";
                    $r2=mysqli_query($dbc,$q2);
	   if($r2)
	   {
	          if(mysqli_num_rows($r2)>0)
	          {
		$rf=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
		$allow_msg=$rf['msgAllowFrom'];
		
	          }else
	          {
		$msgAllowFrom=1;
		$allow_msg=3;
		 $q3="INSERT INTO `settings_messages` (`msgSet_Id`, `msgAllowFrom`, `secretMsgAllow`, `msgNotifAnim`, `msgPopUp`, `msgTone`, `msgAlertToneFile`, `whoseMsgTone`, `liveTyping`, `user_id`) VALUES (NULL, '2', '0', '1', '1', '1', NULL, '1', '1', '$user_id');";
		 $r3=  mysqli_query($dbc,$q3);
		 if($r3){
		         
		 }
		 else{
		      
		 }
	          }
	          
	   }
		           $send_msg=0;
		       if($allow_msg==3)
		      {
		      $send_msg=1;
		             
		      }
		      if($allow_msg==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $send_msg=1;
		       }
		      }
		      if($allow_msg==2)
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
					           $send_msg=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
                      
                      $q="select email as em ,mobno as m,website as wb from person_config where user_id=$user_id";
                      $r=  mysqli_query($dbc, $q);
                      if($r)
                      {
                          if(mysqli_num_rows($r)>0)
                          {
                              $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $mobile_no=$row['m'];
                              $email_id=$row['em'];
                              $website=$row['wb'];
                              
                          }else
                          {
                                $mobile_no="";
                              $email_id="";
                              $website="sedfed.com/$user_name";
                          }
                      }
		      echo '';
		           echo '
                           <div id="myFirstDetails">
                               
                                <div class="heyYoyThereTt" id="hYT-Tt-Contact" style="display: none" >
                                    
                                    <div class="hYT-Outer">
                                        <div class="hYT-arr"></div>
                                        <div class="hYT-Inner">
                                            <div class="hYT-Item">Mobile  <div class="hYT-ans">'.$mobile_no.'</div></div>
                                            <div class="hYT-Item">Email ID <div class="hYT-ans">'.$email_id.'</div></div>
                                            <div class="hYT-Item">Blog / Website <div class="hYT-ans">'.$website.'</div></div>
			
                                        </div>
                                    </div>
                                    
                                </div>
	               
	               <!--  add rels  start-->
	               
       	               ';
		             echo '
	               <!--  add rels end-->
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
		            $q="SELECT profile_view as pf from history where user_id=$user_id and profile_view!=0"; 
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                      
		    $pv_count=  mysqli_num_rows($r);
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
                                            
                       $q="SELECT last_login as lg from history where user_id=$user_id and last_login!='' ORDER BY hstry_id desc";
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
		 $owner_fname=$f_name;
                                                     echo'</div> 
                                                 </div></div>
                                            <div class="hYT-Item">Last Login<div class="hYT-ans">'.$lastLogin.'</div></div>';
			  if($viewer_id!==$user_id)
			  {
			     echo ' <button class="myLinkToRel" id="sendMsgBtn" onclick="$(\'#chat_user_window\').fadeToggle();" >
                            Message
                        </button>  &nbsp;&nbsp;&nbsp;&nbsp;'.$f_name.'';
			     }
			    
	                           echo '
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
			  if($user_id!=$viewer_id)
			  {
                               $req="Add";
	            $q="select req_id as r from requests where user_id=$viewer_id and reqstd_userid=$user_id and accept=0 and cancel=0";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                
                                if(mysqli_num_rows($r)>0)
                                {
                                    $req="Request Sent";
                                }
                            }
	           
	           $q="select req_id as r from requests where reqstd_userid=$viewer_id and user_id=$user_id and accept=0 and cancel=0";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                
                                if(mysqli_num_rows($r)>0)
                                {
                                    $req="Accept Request";
                                }
                            }
	           
	             $q="select c_name  as c,type as tp from contacts where user_id=$user_id and cu_id=$viewer_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                   if(mysqli_num_rows($r)>0)
		 {
		     $rd=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		     $req=$rd['tp'];
		 }
                                }
			         echo '<br/>
		               <img class="hideOnAvlo" src="../web/icons/prof-love.png" alt="Propose" onclick="showMyExtra(\'#hYT-Tt-Propose\',event)"/><br/>
                                    ';
			  }
                                    echo '
		 <img class="hideOnAvlo" src="../web/icons/prof-statis.png" alt="contact" onclick="showMyExtra(\'#hYT-Tt-Stats\',event)"/><br/>
                                    <img id="img-avlothana" style="margin-top: 12.5px;" class="hyticos" src="../web/icons/prof-avlothana.png" alt="contact" onclick="$(\'.hideOnAvlo\').slideToggle()"  /><br/>
                                    
                                </div>
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
      $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$user_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	      $roed=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	      $theme=$roed['thm'];
	      $theme_txt_color=$roed['theme_txt_color'];
	 }else
	 {
	        $theme="#008b8b";
	        $theme_txt_color="#ffffff";
	        
	        
	 }
	       
           }
           
    echo '
            <div id="innerPageCont" style="'.$welScrStyle.'">
               
                                 
                
                <div id="sf-profileHolder" >
                  
                  
                    <div id="innerProfile" onmouseover="meOnProfile()" >
                        <div id="myFirstAppear" style="background-color:'.$theme.';color:'.$theme_txt_color.';background-image: url(\''.$w_pic.'\');">
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
			     </div>';
		           if($user_id!==$viewer_id)
		           {
			echo ' <div id="reportFake"  onclick="report_fk_if(\''.$user_id.'\')">
                                              Report Fake Id
                                            </div>'; 
		           }
                                           
                                            echo '
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
	               <input type="hidden" id="wchwantchng" value="1" />
	               
                                <img src="'.$ppics.'" alt="'.$f_name.'" class="curprofimg" onclick="showMyFace()" style="border-radius:'.$profPicStyle.'" />
                                <div class="MyNameIs">
                                    '.$f_name.' <div class="nameDvdr">|</div> <span class="OtherWiseKnownAs"> '.$nicknm.' </span>
                                </div>
                                <div class="MySignIs" >
                                  $ '.$user_name.'
                                </div>
                                <div class="curPositionFocus">
                                   '.$org.'
                                </div>
                           
                           
                           ';
		           if($user_id!=$viewer_id)
		           {
			 
                           include '../web/add_rels_in_prlf.php';
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
                                         echo'<div id="rmvcnct" style="cursor:pointer;" onclick="rmvcnctppl(\''.$user_id.'\',0)">Remove Contact</div>';
                            
                                    }else
                                    {
                                        if($req==1)
                                        {
                                             echo'<div id="rmvcnct" style="cursor:pointer;" onclick="rmvcnctppl(\''.$user_id.'\',1)">Delete Request</div>';
                            
                                        }
                                    }
                                 
                                    
                                  
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
                                                    echo'&nbsp;&nbsp; <span id="targetReqst"  >'.$owner_fname.' </span> to my relations as
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
                            as  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" id="mysavesnm" type="text" placeholder="Save this person name as " />
                                                       </div>          
                                                       
                        </div>
                                                   <div class="thtrPrcd"  onclick="addrelsinprfprcs(\''.$owner_id.'\',\'#mysavesnm\',\'#addRelType\',\''.$owner_fname.'\')" >
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
                                       </div>';
		           }
		           
	      
                           echo '</div></div>';
	          
		              echo '
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
		        '.$native_place.' </div>
                                </div>
                                <div class="SFDB_ItmHold">
                                    <div id="SFDB_Relations">'.$tot_contact.'</div>
                                    <div class="SFDB_Ans" style="color: darkmagenta" >
                                        Relations
                                    </div></div>';
		 if($user_id==$viewer_id)
		 {
		    echo '  <a href="../web/start_profile.php"><span >Edit</span></a>
                              ';    
		 }
		  echo '
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
                            $rtp=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $clg=$rtp['cl'];
                               $clg_plc=$rtp['cd'];
                              
                            }else
                            {
                               $clg="";
                              $clg_plc="";
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
		      
		      $q="select education as e,location as lc,family as fm,current as ct,aboutme as abt,favorite as fvt,annoying as an,gadgets as gt,about as ab_th from profile_sets where user_id=$user_id";
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
	        		      


		      echo '
                        <div class="mySuperProfile">
                            <div class="myFocusProfile"  id="FocusProfileCenter"  >
                                <div class="myFocusProfileWallPaper" id="fgy"  style="background-image: url(\''.$w_pic.'\');border-radius:'.$backPic.'">
                                    <div class="myFocusProfile_UserName">
                                        '.$user_name.'
                                    </div>
                                </div>
                                <div class="myFocusProfileFace" id="profileImge_Static" >
                                    <img src="'.$ppics.'" class="curprofimg" id="img_focusProf" alt="'.$f_name.'" /> 
                                </div>
	               ';
	$q14="select status as st,orany as orn,withrel as w from relation_stat where user_id=$user_id";
$r14=mysqli_query($dbc,$q14);
if($r14)
{
if(mysqli_num_rows($r14)>0 )
{
  $row15=mysqli_fetch_array($r14,MYSQLI_ASSOC);
$my_relationstatus=$row15['st'];
$orany=$row15['orn'];
$withrel=$row15['w'];

}else
{
$my_relationstatus="";
$orany="";
$withrel="";
}
}
		      echo '
                                <div class="myFocusProfileDetails">
                                    <div class="MFPD_Ttl">
                                        Proud of ...
                                    </div>
                                    <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                        I am 
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$f_name.'
                                    </div>
                                    </div>
                                    <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                        Otherwise known as  
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$nicknm.'
                                    </div>
                                    </div>
		   <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                       Gender
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$sex.'
                                    </div>
                                    </div>
                                    <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                       Born On
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$day.' | '.$mnth.' | '.$year.'
                                    </div>
                                    </div>
		   <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                       My Relationship status
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$my_relationstatus.'
                                    </div>
                                    </div>
		   <div class="MFPD_Itm">
                                         <div class="MFPD_Quest">
                                       Living In
                                    </div>
                                    <div class="MFPD_Ans">
                                      '.$native_place.'
                                    </div>
                                    </div>
                                   
                                    
                                   
                                    
                                </div>
                            </div>
                           
	           ';
		 echo '<div id="for_posts"></div>';
	        if($user_id==$viewer_id || $show_cur==1 || $show_cur!==1)
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
	               if($user_id==$viewer_id)
	               {
		     $edit_cur='<a href="../web/edit_current.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_cur=''
;	               }
       //for post
	           
	                  echo '
		        
		
                        <div class="myCurrentInfoOut" id="currentInfo"> 
                            <div class="profTypeTitle" >Current '.$edit_cur.' </div>
                      
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
		   
    
		      if($user_id==$viewer_id || $show_edu==1)
		      {
		if($user_id==$viewer_id)
	               {
		     $edit_edu='<a href="../web/start_up_edu.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_edu=''
;	               }
		            echo '
                       
                         <div class="myCurrentInfoOut"  id="myEducationHolder" >
                            <div class="profTypeTitle" id="DetTtl_Edu">Education '.$edit_edu.'<div class="profTypeTitleImg"><img class="img_profTypeTitleImg" src="../web/icons/profPage/book1.png"/> </div></div>
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
}

                        echo' 
                            </div>
                        </div> '; 
		      }else
		      {
		             echo '
                         <div class="myCurrentInfoOut"  id="myEducationHolder" >
                            <div class="profTypeTitle" id="DetTtl_Edu">Education<div class="profTypeTitleImg"><img class="img_profTypeTitleImg" src="../web/icons/profPage/book1.png"/> </div></div>
                             <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                    College
                                    </div>';
		              $clg="";
                                $dept="";
                                $clgplc="";
                                $clgfryr="";
                                $clgtoyr="";
                                $clg_discr="";
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
		             $hsc="";
      $hsc_plc="";
      $hsc_crs="";
      $hsc_discr="";
      $hsc_fromyr="";
      $hsctoyr="";
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
       $scl_nm="";
    $scl_plc="";
    $scl_fromyr="";
    $scl_toyr="";
    $scl_crs="";
    $scl_discr="";
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
      
                        echo' 
                            </div>
                        </div> '; 
		      }
		      
		if($user_id==$viewer_id || $show_fam==1 || $show_fam!==1 )
		{
		       $q="SELECT f_name as fn,f_age as fg,f_edu as fe,f_ocup as fo,m_name as mn,m_age as mg,m_edu as me,m_ocup as mo from parent_details where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 && $show_fam==1)
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
 if($user_id==$viewer_id)
	               {
		     $edit_cur='<a href="../web/family.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_cur=''
;	               }
		            echo '
                           
                        <div class="myCurrentInfoOut" id="myFamilyHolder" >
                            <div class="profTypeTitle" id="DetTtl_Family">Family '.$edit_cur.'<div class="profTypeTitleImg"><img class="img_profTypeTitleImg" src="../web/icons/profPage/family1.png"/> </div></div>
              
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
     $sis_nm="";
      $sis_age="";
      $sis_edu="";
      $sis_ocup="";
           echo' <div class="myEduItem">
                                    <div class="myEduAns">
                                        <div class="myEduSubHead" style=" color: navy"> '.$sis_nm.'</div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$sis_age.'<sub> +</sub> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> '.$sis_edu.'</div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"> '.$sis_ocup.'</div>
                                    </div>
                                </div>';
  }

}              

                                echo'
                               </div>
                        </div>';
		}else
		{
		       echo '';
		}
		
		
		     
		//location
		if($user_id==$viewer_id || $show_loc==1 || $show_loc!==1)
		{
		       $q="SELECT cloc as cloc,clofr as clofr,clocto as clocto,ploc as ploc,plocto as plocto,plocfr as plocfr ,nloc as nloc, nlocfr as nlocfr,nlocto as nlocto FROM addresses where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 && $show_loc==1)
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
		 if($user_id==$viewer_id)
	               {
		     $edit_loc='<a href="../web/ppl_location.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_loc=''
;	               }
		        echo '
                         <div class="myCurrentInfoOut" id="myLocationHolder">
                            <div class="profTypeTitle" id="DetTtl_Locate">Location '.$edit_loc.'<div class="profTypeTitleImg"><img class="img_profTypeTitleImg" src="../web/icons/profPage/map1.png"/> </div></div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                            <div class="myCurInfoInner">
                                 <div class="myEduTtl">
                                    Current Address
                                    </div>
                                <div class="myEduItem">
                                    
                                    <div class="myEduSubTtl">
                                      <div class="myEduAns">
                                      '.$cloc.'
                                    </div>      <div class="myEduSubHead"> '.$clocfr.' -  '.$clocto.' </div>
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
                                 
                                echo '</div>
                        </div>';
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
                          echo ' 
                         <div class="peopleViewer" style="display:none;" id="peopleViewerWindow" >
          <div class="peopleViewerInnr">
              <div class="peopleViewerTtl"><span id="frds_type_view">Friends</span> of '.$f_name.' <span class="closePVI" onclick="$(\'#peopleViewerWindow\').fadeOut()">X</span> </div>
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

if($user_id==$viewer_id || $show_abt_me==1 || $show_abt_me!==1)
{
       $q="SELECT bldgrp as bg,language as lang,religion as relg,eca as eca,phisique as p,mentally as mental,politics as pol,income as inc ,aboutme as abtme from about_me where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 && $show_abt_me==1)
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
if($user_id==$viewer_id)
{
            $edit_cur='<a href="../web/aboutme.php"><span class="edit_btn">Edit</span></a> ';
	          
}else
{
       $edit_cur='';
}
        echo' <div class="myCurrentInfoOut" id="aboutMe"> 
                            <div class="profTypeTitle" id="DetTtl_about">About Me '.$edit_cur.'<div class="profTypeTitleImg"><img class="img_profTypeTitleImg" src="../web/icons/profPage/info.png"/> </div></div>
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
}
                  if($user_id==$viewer_id || $show_fav==1 || $show_fav!==1)
	 {
	        $q="SELECT number as f1,letter as f2,color as f3,actor as f4,actress as f5,movie as f6,sora as f7,place as f8,animal as f9,food as f10,field as f11,book as f12,game as f13,sportperson as f14,author as f15,tvshow as f16,cn as f17,miscdir as f18,filmdir as f19,cmdyactr as f20 from favorites where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 && $show_fav==1)
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
  if(mysqli_num_rows($r)>0 && $show_fav==1)
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
 if($user_id==$viewer_id)
	               {
		     $edit_cur='<a href="../web/my_favs.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_cur=''
;	               }
                       echo ' <div class="ExpandMore">
                            <div class="ExpMoreInner" onclick="expandMyMore(\'#aboutMyFavs\',\'#arrowFav\')">
                                My Favorites 
                                <div class="ExpandMoreArr" id="arrowFav" ></div>
                            </div>
                        </div>
                        <div class="myCurrentInfoOut" id="aboutMyFavs" style="display: none"> 
                            <div class="profTypeTitle">Favorites '.$edit_cur.'</div>
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
	 }
  if($user_id==$viewer_id || $show_annoy==1 || $show_annoy!==1)
  {
         $q="SELECT number as f1,letter as f2,color as f3,actor as f4,actress as f5,movie as f6,sora as f7,place as f8,animal as f9,food as f10,field as f11,book as f12,game as f13,sportperson as f14,author as f15,tvshow as f16,cn as f17,miscdir as f18,filmdir as f19,cmdyactr as f20 from annoying where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 && $show_annoy==1)
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
if($user_id==$viewer_id)
	               {
		     $edit_cur='<a href="../web/my_annoy.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_cur=''
;	               }
                        echo '<div class="ExpandMore">
                            <div class="ExpMoreInner" onclick="expandMyMore(\'#aboutMyAnnoys\',\'#arrowHate\')">
                                My Hates
                                <div class="ExpandMoreArr" id="arrowHate" ></div>
                            </div>
                        </div>
                         <div class="myCurrentInfoOut" id="aboutMyAnnoys"  style="display: none"> 
                            <div class="profTypeTitle">Annoying '.$edit_cur.'</div>
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
  }
  if($user_id==$viewer_id || $show_gadgets==1 || $show_gadgets!==1)
  {
             $q="SELECT lap_barnd as lb,lap_model as lm,lap_os1 as los1,lap_os2 as los2,lap_color as lc from laptop where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 && $show_gadgets==1)
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
if($user_id==$viewer_id)
	               {
		     $edit_cur='<a href="../web/gadgets.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_cur=''
;	               }
                        echo '
                         <div class="ExpandMore">
                            <div class="ExpMoreInner" onclick="expandMyMore(\'#myGadgHolder\',\'#arrowGadg\')">
                                My Gadgets & Belongings
                                <div class="ExpandMoreArr" id="arrowGadg" ></div>
                            </div>
                        </div>
                          <div class="myCurrentInfoOut" id="myGadgHolder"  style="display: none">
                            <div class="profTypeTitle">Gadgets & Belongings '.$edit_cur.'</div>
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

  }
                    if($user_id==$viewer_id || $show_abt_thing==1 || $show_abt_thing!==1)
	   {
	          $q="SELECT me as me,you as y,family as fm,love as l,frndship as f,studies as st,politics as p,life as lf,god as g,boys as bys,girls as gy,marriage as mr,entertainment as en,wtow as w from about where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0 || $show_abt_thing==1)
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
if($user_id==$viewer_id)
	               {
		     $edit_cur='<a href="../web/about_things.php"><span class="edit_btn">Edit</span></a> ';
	               }else
	               {
		     $edit_cur=''
;	               }
 echo ' <div class="ExpandMore">
                            <div class="ExpMoreInner" onclick="expandMyMore(\'#aboutEverything\',\'#arrowAbout\')">
                               About
                                <div class="ExpandMoreArr" id="arrowAbout" ></div>
                            </div>
                        </div>
                        <div class="myCurrentInfoOut" id="aboutEverything"  style="display: none"> 
                            <div class="profTypeTitle">About '.$edit_cur.'</div>
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
                        ';
	   }
                      echo'
                        
                    </div>
                    
                </div>
            </div>
            
';
	              $q="select person_like as pl,person_unlike as pul,fav as fv from person_status where user_id=$user_id and responser_id=$viewer_id";
	              $r=  mysqli_query($dbc, $q);
	              if($r)
	              {
		    $like_png='../web/icons/post-sf-like.png';
		     $unlike_png='../web/icons/post-sf-unlike.png';
		     $fav_png='../web/icons/post-sf-emptyRate.png';
		    
		    $my_pers_like=0;
		    $pers_png='../web/icons/like.png';
		    if(mysqli_num_rows($r)>0)
		    {
		   
		    $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		    $mylike=$row['pl'];
		    $myunlike=$row['pul'];
		    $myfav=$row['fv'];
		    
		    if($mylike==1)
		    {
		            $my_pers_like=1; 
		    $like_png='../web/icons/post-sf-liked.png';
		           
		    }
		    if($myunlike==1)
		    {
		    $unlike_png='../web/icons/post-sf-unliked.png';
		           
		    }
		    if($myfav==1)
		    {
		             $fav_png='../web/icons/post-rated-3.png';
		  
		    }
		    
		    }
	              }else
	              {
		    echo $q;
	              }
	              $q1="select person_like as pl,person_unlike as pul,fav as fv  from person_status where user_id=$user_id";
	              $r1=  mysqli_query($dbc, $q1);
	              if($r1)
	              {
		    
		    $p_like_cnt=0;
		    $p_unlike_cnt=0;
		    $p_fav_cnt=0;
		   while($row=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
		   {
		          
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
		          
		    
	              }
	              
	              
	              echo '
                  <div id="howThisPerson" >
                      <div class="howMyProf"> How was '.$f_name.'\'s profile ?</div>
	     
                        <div id="innerHTP">
                           
                            <div id="me-LikeHold" class="hTP-holders" title="Like this person" onclick="likeperson('.$user_id.',\'person_like\',\'#p_like_cnt\',\''.$like_png.'\',\'#like_icon\',\'../web/icons/post-sf-liked.png\')">
                                <img src="'.$like_png.'" id="like_icon" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; <span id="p_like_cnt">'.$p_like_cnt.'</span></span> 
                        </div>
	       
                        <div id="me-UnlikeHold" class="hTP-holders" title="Unlike this person"  onclick="likeperson('.$user_id.',\'person_unlike\',\'#p_unlike_cnt\',\''.$unlike_png.'\',\'#unlike_icon\',\'../web/icons/post-sf-unliked.png\')" >
                            <img src="'.$unlike_png.'" id="unlike_icon" alt="UnLike This Person" /><span id="meUnlikes">&nbsp;&nbsp; <span id="p_unlike_cnt">'.$p_unlike_cnt.'</span></span>
                        </div>
	       
                        <div id="me-RateHold" class="hTP-holders" title="Add This Person to your Favorites"  onclick="likeperson('.$user_id.',\'fav\',\'#p_fav_cnt\',\''.$fav_png.'\',\'#fav_icon\',\'../web/icons/post-rated-3.png\')">
                            <img src="'.$fav_png.'" id="fav_icon" alt="Add This Person to your Favorites" /><span id="meRates">&nbsp;&nbsp; <span id="p_fav_cnt">'.$p_fav_cnt.'</span></span>
                        </div>';
	              if($user_id!=$viewer_id)
	              {
		     $q="select verified_users as u from verify where user_id=$viewer_id  order by verify_id desc";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
		     $my_vf_times=0;
		     if(mysqli_num_rows($r)>2)
		     {
		           $my_vf_times=1; 
		     }
		          $qr="select verify from my_verify where user_id=$viewer_id";
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
		             $viewer_verify_status="Verified";
		      }else
		      {
		             $viewer_verify_status="Not Verfied";
		      }
		             
                                }
	                 if($viewer_verify_status==="Verified")
		{
		$do_verify=' onclick="verifyppl('.$user_id.')"';
		       $title="title=\"Verify this person\"";
		}  else {
		$do_verify='';
		$title="title=\"You should be verified to verify a person\"";
		       
		}
		
	              }else
	              {
		    $do_verify='';
		    $title="title=\"You cannot verify by you\"";
	              }
	                  echo '   <div id="me-CommentHold" '.$title.' class="hTP-holders" '.$do_verify.'>
                            <img src="../web/icons/ok.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; '.$tot_vrf.'</span>
                        </div>';
                     
	           echo '
                            <div id="me-ShareHold" class="hTP-holders" title="Profile Updates" >
                                <img src="../web/icons/last_edit.png" alt="Like This Person" /><span id="meShares">&nbsp;&nbsp; </span>  <span id="HTP_ProfLastUpd">&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp; Last Update : '.$last_update.'&nbsp;&nbsp; )</span>
                        </div>
                        </div>
                        
                     <div class="thisPersonExtras">';
	           if($verify_status!=="Verified")
	           {
		 if($tot_vrf==0)
		 {
		        if($user_id!==$viewer_id)
		        {
		                echo '
                          <div class="HTP_TPE_Verifs">
                              '.$f_name.' is not verified still now on SedFed .';
		                if($viewer_verify_status=="Verified")
		                {
			      echo 'You should be verified to verify a person';
		                }else
		                {
			     echo '  If you know this person verify by clicking  green box above.';
		                    
		                }
		              
                          echo '</div>';
		        }else
		        {
		                echo '
                          <div class="HTP_TPE_Verifs">
                              You cannot verify by you. A verified person can verify your account.
                          </div>'; 
		        }
		        
		 }else
		 {
		       
			      echo '
                          <div class="HTP_TPE_Verifs">
                             '.$f_name.' is verified '.$tot_vrf.'. If you know this person verify by clicking  green box above.
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
                                
                                   <!--<div class="firDetCont" style="color:blue;">Male <div class="firDetContEx" style="color:gray;margin-top: -30px;">Otherwise known as <div class="firDetCont" style="color:crimson;font-size: 19px;">VJ</div></div></div>
                                      
                                         <div style="color:white;" >sedfed</div>
                                         <div class="firDetCont" style="margin-top: -25px;" > 18<sub> + </sub> <div class="firDetContEx" style="color:gray">10 Jul 1996</div></div>
                                     
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
            <div id="for_add_mem_in_showfrds"></div>
         <div id="chngppic"></div>
         
';
		echo '<div id="forchatwindow"></div>';
        echo '<div id="chat_user_window" style="display:none;">';
        include '../web/chatwind_profile.php';
        echo '</div>';
		echo '
        </div>
    </body>
</html>
';
    
}
       

?>
