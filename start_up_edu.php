
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
     $q="select education as g from profile_sets where user_id=$user_id";
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
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
                            <div class="profTypeTitle">Education</div>
                            <div class="profSecurityInfo">
                                Details You provide here are at your own risk .These details will be in your profile. If you don\'t want to provide just skip.
                            </div>
                          <!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
                          <div class="privacyOuter">
                              <span class="PTip">Who can see these details</span>
                              <select onchange="change_prof_privacy(\'education\',this.value)">
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
                          <div class="myCurInfoInner">
                              
                                 <div class="myEduTtl">
                                     College <div class="addNewEdu" onclick="addclg()"> + New College</div>
                                    </div>
                                <div class="myEduItem" id="tot_clg_cont">
                                    
                                   ';
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
      echo'
      
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" id="from'.$cl.'" type="text" value="'.$clgfryr.'" placeholder="From"/> -  <input class="txtBxx" id="to'.$cl.'" type="text" value="'.$clgtoyr.'" placeholder="To" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" id="branch'.$cl.'" value="'.$dept.'" placeholder="branch / course"/> </div> <span class="divider"  style="color:darkgrey">  |</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" value="'.$clg_discr.'" id="titdis'.$cl.'" placeholder="Title or description"/></div>
</div>
<div class="myEduAns" >
<input class="txtBxx" type="text" id="clg'.$cl.'" value="'.$clg.'" placeholder="Name of College"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text"  id="clgplc'.$cl.'" value="'.$clgplc.'" placeholder="Location" style="color:black"/> </div>
</div>
</div>
';
     
  }
  
  }else
  {
    $cl=1;
     $clg="";
      $dept="";
      $clgplc="";
      $clgfryr="";
      $clgtoyr="";
      $clg_discr="";
      echo'
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" id="from1" type="text" value="'.$clgfryr.'" placeholder="From"/> -  <input class="txtBxx" id="to1" type="text" value="'.$clgtoyr.'" placeholder="To" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" id="branch1" value="'.$dept.'" placeholder="branch / course"/> </div> <span class="divider"  style="color:darkgrey">  |</span><div class="myEduSubHead" > <input class="txtBxxTtl" type="text" value="'.$clg_discr.'" id="titdis1" placeholder="Title or description"/></div>
</div>
<div class="myEduAns" >
<input class="txtBxx" type="text" id="clg1" value="'.$clg.'" placeholder="Name of College"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text"  id="clgplc1" value="'.$clgplc.'" placeholder="Location" style="color:black"/> </div>
</div>
</div>
';
  }
  echo'<input type="hidden" value="'.$cl.'" id="mtotclgcnt">';
}
    echo '
                                   
                                </div>
                                
                                <div class="myEduTtl">
                                    High School <div class="addNewEdu" onclick="addhsc()"> + New H.Schol</div>
                                    </div>
                                <div class="myEduItem" id="tothsccont">
                                    
                                ';
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

echo'

<div class="myEduItem">
<div class="myEduSubTtl">
<div class="myEduSubHead"> <input class="txtBxx" id="hscfrom'.$hc.'" type="text" value="'.$hsc_fromyr.'" placeholder="From" /> - <input class="txtBxx" type="text" id="hscto'.$hc.'" value="'.$hsctoyr.'" placeholder="To"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscbrnch'.$hc.'" value="'.$hsc_crs.'" placeholder="branch / course"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscdis'.$hc.'" value="'.$hsc_discr.'" placeholder="Title or description"/> </div>
</div>
<div class="myEduAns">
<input class="txtBxx" type="text" id="hscnm'.$hc.'" value="'.$hsc.'" placeholder="Name of High School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="hscplc'.$hc.'" value="'.$hsc_plc.'" placeholder="Location" style="color:black"/> </div>
</div></div><br/>

';
    }

  }else
  {
     $hc=1;
      $hsc="";
      $hsc_plc="";
      $hsc_crs="";
      $hsc_discr="";
      $hsc_fromyr="";
      $hsctoyr="";

echo'

<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"> <input class="txtBxx" id="hscfrom'.$hc.'" type="text" value="'.$hsc_fromyr.'" placeholder="From" /> - <input class="txtBxx" type="text" id="hscto'.$hc.'" value="'.$hsctoyr.'" placeholder="To"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscbrnch'.$hc.'" value="'.$hsc_crs.'" placeholder="branch / course"/> </div>  <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="hscdis'.$hc.'" value="'.$hsc_discr.'" placeholder="Title or description"/> </div>
</div>
<div class="myEduAns">
<input class="txtBxx" type="text" id="hscnm'.$hc.'" value="'.$hsc.'" placeholder="Name of High School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="hscplc'.$hc.'" value="'.$hsc_plc.'" placeholder="Location" style="color:black"/> </div>
</div>
</div>
';
  }
   echo '<input type="hidden" value="'.$hc.'" id="mtothsccnt">';
}
    echo '
                                  
                                </div>
                                 <div class="myEduTtl">
                                    School <div class="addNewEdu"  onclick="addscl()"> + New School</div>
                                    </div>
                                <div class="myEduItem" id="totsclcont">
                                    
                                 ';
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
    echo'
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" type="text" id="sclfrom'.$scl.'" value="'.$scl_fromyr.'" placeholder="From" />  -  <input class="txtBxx" type="text" id="sclto'.$scl.'" value="'.$scl_toyr.'" placeholder="To"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="sclcrs'.$scl.'" value="'.$scl_crs.'" placeholder="branch / course"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" id="sclgrp'.$scl.'" type="text" value="'.$scl_discr.'" placeholder="Title or description"/></div>

</div>
<div class="myEduAns">
<input class="txtBxx" id="sclnm'.$scl.'" type="text" value="'.$scl_nm.'" placeholder="Name of School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="sclplc'.$scl.'" value="'.$scl_plc.'" placeholder="Location" style="color:black" /> </div>
</div>
</div>
';
}


  }else
  {
    $scl=1;
        $scl_nm="";
    $scl_plc="";
    $scl_fromyr="";
    $scl_toyr="";
    $scl_crs="";
    $scl_discr="";
     echo'
<div class="myEduItem">

<div class="myEduSubTtl">
<div class="myEduSubHead"><input class="txtBxx" type="text" id="sclfrom'.$scl.'" value="'.$scl_fromyr.'" placeholder="From" />  -  <input class="txtBxx" type="text" id="sclto'.$scl.'" value="'.$scl_toyr.'" placeholder="To"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" type="text" id="sclcrs'.$scl.'" value="'.$scl_crs.'" placeholder="branch / course"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxxTtl" id="sclgrp'.$scl.'" type="text" value="'.$scl_discr.'" placeholder="Title or description"/></div>

</div>
<div class="myEduAns">
<input class="txtBxx" id="sclnm'.$scl.'" type="text" value="'.$scl_nm.'" placeholder="Name of School"/>
<div class="myOrgLocate"><input class="txtBxxTtl" type="text" id="sclplc'.$scl.'" value="'.$scl_plc.'" placeholder="Location" style="color:black" /> </div>
</div>
</div>
';
  }
  echo'<input type="hidden" value="'.$scl.'" id="mtotsclcnt">';
}
$maxaadvals=$scl+$hc+$cl;
echo'<input type="hidden" value="'.$maxaadvals.'" id="maxaadval">';
	           echo '
                                   
                               </div>
                              
                                 <div class="pageBottomProceeds">
                                    <a href="ppl_location.php"> <div class="updateHolder"  id="skipBtn" >Skip</div></a>
                               <div class="updateHolder"  onclick="updateedu()" id="nextBtn">Next</div>
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