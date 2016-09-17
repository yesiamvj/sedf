
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
        $q="select family as g from profile_sets where user_id=$user_id";
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
                              <select onchange="change_prof_privacy(\'family\',this.value)">
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
                             
                                
<div class="profTypeTitle">Family</div>
<!--  <div id="profTypeTitle">Current <div id="amIalive" style="color:green">  offline</div></div> -->
<div class="myCurInfoInner">
<div class="myEduTtl">
Parents
</div>
<div class="myEduItem">';
$q="SELECT f_name as fn,f_age as fg,f_edu as fe,f_ocup as fo,m_name as mn,m_age as mg,m_edu as me,m_ocup as mo from parent_details where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $f_name=$row['fn'];
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
     $f_name="";
      $f_age="";
      $f_edu="";
      $f_ocup="";

      $m_name="";
      $m_age="";
      $m_edu="";
      $m_ocup="";
  }
}
echo'<div class="myEduSubTtl">
Father
</div>
<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"><input class="txtBxx" type="text" id="fthrnm" value="'.$f_name.'" style="width:250px;" placeholder="Name" /> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="fthrage" value="'.$f_age
.'" placeholder="Age" />  </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="fthredu" value="'.$f_edu.'" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="'.$f_ocup
.'" id="fthrocup" placeholder="occupation" /> </div>
</div>
</div>
<div class="myEduItem">

<div class="myEduSubTtl">
Mother
</div>

<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"><input class="txtBxx" type="text" id="mthernm" value="'.$m_name
.'" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="mtherage" type="text" value="'.$m_age.'" placeholder="Age"/>  </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" type="text" id="mtheredu" value="'.$m_edu.'" placeholder="Education"/> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" value="'.$m_ocup.'"  id="mthrocup" placeholder="occupation" /> </div>
</div>
</div>

<div class="myEduTtl">
Siblings
</div>
';
$q="SELECT brthr_nm as bnm,brthr_age as bag,brthr_edu as bed,brthr_ocup as boc from brother where user_id=$user_id";

$r=mysqli_query($dbc,$q);
if($r)
{
  if(mysqli_num_rows($r)>0)
  {
    $bt=0;
    echo'<div id="totbrthrcont">';
    while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
    {
      $bt=$bt+1;
      $br_nm=$row['bnm'];
      $br_age=$row['bag'];
      $br_edu=$row['bed'];
      $br_ocup=$row['boc'];
      echo'
<div class="myEduItem">

<div class="myEduSubTtl">
Brother <div class="addNewEdu" onclick="addbrthr()"> + New Person</div>
</div>

<div class="myEduAns" >
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="brthrnm'.$bt.'" type="text" value="'.$br_nm.'" style="width:250px;" placeholder="Name" /> </div><span class="divider" style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="brthrage'.$bt.'" value="'.$br_age.'" placeholder="Age"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="degree'.$bt.'" type="text" value="'.$br_edu.'" placeholder="Education"/></div><span class="divider" style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="occpn'.$bt.'" value="'.$br_ocup.'" placeholder="occupation"/></div>
</div>
</div>


';
    }
  }else
  {
    $bt=1;
     $br_nm="";
      $br_age="";
      $br_edu="";
      $br_ocup="";
         echo'<div id="totbrthrcont">
<div class="myEduItem">

<div class="myEduSubTtl">
Brother <div class="addNewEdu" onclick="addbrthr()"> + New Person</div>
</div>

<div class="myEduAns" >
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="brthrnm'.$bt.'" type="text" value="'.$br_nm.'" style="width:250px;" placeholder="Name" /> </div><span class="divider" style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" type="text" id="brthrage'.$bt.'" value="'.$br_age.'" placeholder="Age"/> </div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="degree'.$bt.'" type="text" value="'.$br_edu.'" placeholder="Education"/></div><span class="divider" style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="occpn'.$bt.'" value="'.$br_ocup.'" placeholder="occupation"/></div>
</div>
</div>


';
  }
  echo'<input type="hidden" value="'.$bt.'" id="mtotbrcnt"></div>';
}

 echo'<div id="totsiscont">';
$q21="SELECT sis_nm as bnm,sis_age as bag,sis_edu as bed,sis_ocup as boc from sister where user_id=$user_id";
$r21=mysqli_query($dbc,$q21);
if($r21)
{
  if(mysqli_num_rows($r21)>0)
  {
    $st=0;
   
    while($row=mysqli_fetch_array($r21,MYSQLI_ASSOC))
    {
      $st=$st+1;
      $sis_nm=$row['bnm'];
      $sis_age=$row['bag'];
      $sis_edu=$row['bed'];
      $sis_ocup=$row['boc'];
      echo'<div class="myEduItem">
<div class="myEduSubTtl">
Sister <div class="addNewEdu" onclick="addsist()"> + New Person</div>
</div>

<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="sisnm'.$st.'" type="text" value="'.$sis_nm.'" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="sisage'.$st.'" type="text" value="'.$sis_age.'" placeholder="Age"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" id="sisedu'.$st.'" type="text" value="'.$sis_edu.'" placeholder="Education" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="sisocp'.$st.'" value="'.$sis_ocup.'" placeholder="occupation" /> </div>
</div>
</div>
';
    }
  }else
  {

      $st=1;
      $sis_nm="";
      $sis_age="";
      $sis_edu="";
      $sis_ocup="";
      echo'<div class="myEduItem">
<div class="myEduSubTtl">
Sister <div class="addNewEdu" onclick="addsist()"> + New Person</div>
</div>

<div class="myEduAns">
<div class="myEduSubHead" style=" color: navy"> <input class="txtBxx" id="sisnm'.$st.'" type="text" value="'.$sis_nm.'" style="width:250px;" placeholder="Name"/> </div><span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"><input class="txtBxx" id="sisage'.$st.'" type="text" value="'.$sis_age.'" placeholder="Age"/></div> <span class="divider"  style="color:darkgrey">|</span> <div class="myEduSubHead"> <input class="txtBxx" id="sisedu'.$st.'" type="text" value="'.$sis_edu.'" placeholder="Education" /> </div><span class="divider"  style="color:darkgrey">|</span><div class="myEduSubHead"><input type="text" class="txtBxxOc" id="sisocp'.$st.'" value="'.$sis_ocup.'" placeholder="occupation" /> </div>
</div>
</div>
';
  }
  echo'<input type="hidden" value="'.$st.'" id="mtotsiscnt"></div>';
}  
$totfamconunt=$st+$bt;
echo'<input type="hidden" id="totfamcont" value="'.$totfamconunt.'">';
echo'
<br/>


</div>
                    
                               
                                
                                <div class="pageBottomProceeds">
                                    <a href="ppl_location.php"> <div class="updateHolder"  id="skipBtn" >Skip</div></a>
                               <div class="updateHolder"  onclick="updtfml()" id="nextBtn">Next</div>
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