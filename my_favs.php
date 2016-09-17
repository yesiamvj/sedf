
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $q="select first_name as f from basic where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $first_name=$row['f'];
           }
    }
    $today = date("g:i a ,F j, Y"); 
    		 
    $q="update person_config set profile_update='$today' where user_id=$user_id";
    mysqli_query($dbc, $q);
    $q="select favorite as g from profile_sets where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $relsAllowFrom=$row['g'];
           }else
           {
	 $relsAllowFrom=0;
           }
	 
    }
     switch ($relsAllowFrom){
              case 0:
                 
                  $msgAllowFrom1='selected';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='';
                  break;
              case 1:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='selected';
                  $msgAllowFrom3='';
                  break;  
              case 2:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='selected';
                  break;  
              
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
    <!--<link rel="stylesheet" href="profile.css"/> -->
    <link rel="stylesheet" href="editprofile.css"/>
    <link rel="stylesheet" href="startUpprofile.css"/>
    <link rel="stylesheet" href="startUpEdus.css"/>
   <script src="angular.js"></script>
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="profile.js" type="text/javascript"></script>
   <script src="editprofile.js" type="text/javascript"></script>
  </head>
    <body>
          <div id="Topest">

                    <div id="title_bar">

                      <font id="sedfedUserName" >'.$first_name.'</font>

                    </div>
                     <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >Set Up My Profile</font>

                    </div>

                </div>
        <div id="content-full">
            
              <div class="myCurrentInfoOut" id="myEducation" >
                            <div class="profTypeTitle">Family</div>
                            <div class="profSecurityInfo">
                                Details You provide here are at your own risk .These details will be in your profile. If you don\'t want to provide just skip.
                            </div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                          <div class="privacyOuter">
                              <span class="PTip">Who can see these details</span>
                              <select onchange="change_prof_privacy(\'favorite\',this.value)">
                                 <option '.$msgAllowFrom1.' value="0">
                                      Anyone
                                  </option>
                                  <option '.$msgAllowFrom2.' value="1">
                                      Relations Only
                                  </option>
                                  <option '.$msgAllowFrom3.' value="2">
                                      Relations of Relations
                                  </option>
                              </select>
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
echo'


<div class="profTypeTitle">Favorites</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="profInfoItem">
<div class="profInfoTtle">
Number 
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" id="f1" value="'.$f1.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr1" value="'.$fr1.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Letter
</div>
<div class="profInfoAns"><input class="txtBxx" type="text" value="'.$f2.'" id="f2" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr2" class="txtBxx" type="text" value="'.$fr2.'" placeholder="Any reason ?" /></div>
</div>
</div>

<div class="profInfoItem">
<div class="profInfoTtle">
Color 
</div>

<div class="profInfoAns"><input class="txtBxx" type="text" value="'.$f3.'" id="f3" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr3" class="txtBxx" type="text" value="'.$fr3.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Actor
</div>
<div class="profInfoAns"><input id="f4" class="txtBxx" type="text" value="'.$f4.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr4" class="txtBxx" type="text" value="'.$fr4.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Actress
</div>
<div class="profInfoAns"><input id="f5" class="txtBxx" type="text" value="'.$f5.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr5" class="txtBxx" type="text" value="'.$fr5.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Movie
</div>
<div class="profInfoAns"><input id="f6" class="txtBxx" type="text" value="'.$f6.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr6" class="txtBxx" type="text" value="'.$f6.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Song | Album
</div>
<div class="profInfoAns"><input id="f7" class="txtBxx" type="text" value="'.$f7.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr7" value="'.$fr7.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Place
</div>
<div class="profInfoAns"><input id="f8" class="txtBxx" type="text" value="'.$f8.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr8" value="'.$fr8.'" placeholder="Any reason ?" /></div>
</div> 
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Animal
</div>
<div class="profInfoAns"><input id="f9" class="txtBxx" type="text" value="'.$f9.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr9" class="txtBxx" type="text" value="'.$fr9.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Food
</div>
<div class="profInfoAns"><input id="f10" class="txtBxx" type="text" value="'.$f10.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr10" class="txtBxx" type="text" value="'.$fr10.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Field
</div>
<div class="profInfoAns"><input id="f11" class="txtBxx" type="text" value="'.$f11.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr11" class="txtBxx" type="text" value="'.$fr11.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Book
</div>
<div class="profInfoAns"><input id="f12" class="txtBxx" type="text" value="'.$f12.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr12" class="txtBxx" type="text" value="'.$fr12.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Game
</div>
<div class="profInfoAns"><input id="f13" class="txtBxx" type="text" value="'.$f13.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr13" class="txtBxx" type="text" value="'.$fr13.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Sports Person
</div>
<div class="profInfoAns"><input id="f14" class="txtBxx" type="text" value="'.$f14.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr14" class="txtBxx" type="text" value="'.$fr14.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Author
</div>
<div class="profInfoAns"><input id="f15" class="txtBxx" type="text" value="'.$f15.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr15" class="txtBxx" type="text" value="'.$fr15.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
TV Show
</div>
<div class="profInfoAns"><input id="f16" class="txtBxx" type="text" value="'.$f16.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr16" class="txtBxx" type="text" value="'.$fr16.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Cartoon
</div>
<div class="profInfoAns"><input id="f17" class="txtBxx" type="text" value="'.$f17.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr17" class="txtBxx" type="text" value="'.$fr17.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Musician
</div>
<div class="profInfoAns"><input id="f18" class="txtBxx" type="text" value="'.$f18.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr18" class="txtBxx" type="text" value="'.$fr18.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">
<div class="profInfoTtle">
Film Director
</div>
<div class="profInfoAns"><input id="f19" class="txtBxx" type="text" value="'.$f19.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input id="fr19" class="txtBxx" type="text" value="'.$fr19.'" placeholder="Any reason ?" /></div>
</div>
</div>
<div class="profInfoItem">

<div class="profInfoTtle">
Comedy Actor
</div>
<div class="profInfoAns"><input id="f20" class="txtBxx" type="text" value="'.$f20.'" placeholder="Answer"/> <div class="divider">|</div> <div class="favReason"><input class="txtBxx" type="text" id="fr20" value="'.$fr20.'" placeholder="Any reason ?" /></div>
</div>

</div>

<br/>

</div>
                    
                              <div class="pageBottomProceeds">
                                    <a href="my_annoy.php"> <div class="updateHolder"  id="skipBtn" >Skip</div></a>
                               <div class="updateHolder"  onclick="updtfavdet()" id="nextBtn">Next</div>
                                </div>
                                
                                
                            </div>
                        </div>
           
        </div>
        <div class="SedFed_TM">
            SedFed 2.0
        </div>
    </body>
</html>
';
    
}