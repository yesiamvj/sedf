
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
    $q="select gadgets as g from profile_sets where user_id=$user_id";
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
    <!--<link rel="stylesheet" href="'.$_SESSION['css'].'profile.css"/> -->
    <link rel="stylesheet" href="'.$_SESSION['css'].'editprofile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpprofile.css"/>
    <link rel="stylesheet" href="'.$_SESSION['css'].'startUpEdus.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
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
                              <select onchange="change_prof_privacy(\'gadgets\',this.value)">
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
                          </div>
    
<div class="profTypeTitle">Gadgets & Belongings</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">';
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
echo '
<div class="myEduTtl">
Mobile
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Personal </div>
</div>
<div class="myEduAns"><input class="txtBxx" id="mob_no" type="text" value="'.$mob_no.'" placeholder="Mobile Number"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" id="sim" type="text" value="'.$mob_sim.'" placeholder="Mobile Network" /> </div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" id="mbrand" type="text" value="'.$mob.'" placeholder="Mobile Brand & Model No"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input class="txtBxx" id="mob_os" type="text" value="'.$mob_os.'" placeholder="Operating System"/></div>
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
echo '<div class="myEduTtl">
PC
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Laptop </div>
</div>
<div class="myEduAns"><input class="txtBxx" type="text" id="lbrand" value="'.$lap.'" placeholder="Brand / Company " /> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="lmodel_no" class="txtBxx" type="text" value="'.$lap_model.'" placeholder="Model No" /></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="lcolor" class="txtBxx" type="text" value="'.$lap_color.'" placeholder="color"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="los1" class="txtBxx" 
type="text" value="'.$lap_os1.'" placeholder="Operating System 1"/></div><div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="los2" class="txtBxx" type="text" value="'.$lap_os2.'" placeholder="Operating System 2"/></div>
</div>
</div>
';
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
echo'
<div class="myEduTtl">
Vehicle
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Bike </div>
</div>
<div class="myEduAns"><input class="txtBxx" type="text" value="'.$bike_model.'" id="bikebrand" placeholder="Brand / Company"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="bikeno" class="txtBxx" type="text" value="'.$bike_no.'" placeholder="Registration No"/></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="bikecolor" class="txtBxx" type="text" value="'.$bike_color.'" placeholder="color"/></div>
</div>
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> Car </div>
</div>
<div class="myEduAns"><input id="carbrand" class="txtBxx" type="text" value="'.$car_model.'" placeholder="Brand / Company"/> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="carno" class="txtBxx" type="text" value="'.$car_no.'" placeholder="Registration No"/></div> <div class="divider" style="display: inline-block">|</div><div class="gadgMoreDet"><input id="carcolor" class="txtBxx" type="text" value="'.$car_color.'" placeholder="color"/></div>
</div>
</div>


<br/>


</div>
                    
                                   <div class="pageBottomProceeds">
                                    <a href="about_things.php"> <div class="updateHolder"  id="skipBtn" >Skip</div></a>
                               <div class="updateHolder"  onclick="updatvhcl()" id="nextBtn">Next</div>
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