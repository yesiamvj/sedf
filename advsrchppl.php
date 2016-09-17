<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
        $myuser_id=$_SESSION['user_id'];
  function people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts)
{
      if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
   
	echo' <font id="trgtdiv'.$n.'"><div class="pplItemOut" >
               <input type="hidden" id="email'.$n.'" value="'.$email.'" />
	<input type="hidden" value="'.$mobno.'" id="mob'.$n.'"/>
	<input type="hidden" value="'.$clg.'" id="hclg'.$n.'"/>
	<input type="hidden" value="'.$bldgrop.'" id="bld'.$n.'" />
            <input type="hidden" value="'.$sex.'" id="hsex'.$n.'" />
	<input type="hidden" value="'.$cur_loc.'" id="curloc'.$n.'" />
	<input type="hidden" value="'.$status.'" id="hrels'.$n.'" />
	<input type="hidden" value="'.$age.'" id="hage'.$n.'" />
<input type="hidden" value="'.$scl.'" id="scl'.$n.'" />
    <input type="hidden" value="'.$religion.'" id="relgion'.$n.'" />
      <input type="hidden" value="'.$posi.'" id="hcmpny'.$n.'" />
    <input type="hidden" value="'.$hscl.'" id="hscl'.$n.'" />
        <input type="hidden" value="'.$np.'" id="hliving_in'.$n.'" />
      <input type="hidden" value="'.$nick_name.'" id="hnick_name'.$n.'" />
          <input type="hidden" value="'.$mobno.'" id="h_mob_no'.$n.'" />
              <input type="hidden" value="'.$f_name.'" id="hfname'.$n.'" />
              <input type="hidden" value="'.$email.'" id="hemail'.$n.'" />
                  <input type="hidden" value="'.$b_day.'" id="hbday'.$n.'" />
                      <input type="hidden" value="'.$times.'" id="verified_time'.$n.'" />
                      <input type="hidden" value="'.$b_mnth.'" id="hbmnth'.$n.'" />
                  <input type="hidden" value="'.$b_year.'" id="hbyear'.$n.'" />
                  <input type="hidden" value="'.$clgfromyr.'" id="hclgfromyr'.$n.'"/>
                   <input type="hidden" value="'.$clgtoyr.'" id="hclgtoyr'.$n.'" />
                   <input type="hidden" value="'.$clg.'" id="college'.$n.'" />
                    <input type="hidden" value="'.$hscl.'" id="hiscl'.$n.'" />
                    <input type="hidden" value="'.$scl_fromyr.'" id="sclfrmyr'.$n.'" />
                   <input type="hidden" value="'.$scl_toyr.'" id="scl_toyr'.$n.'" />
                    <input type="hidden" value="'.$car_no.'" id="vhcl1'.$n.'" />
                        <input type="hidden" value="'.$langs.'" id="hlangs'.$n.'" />
                         <input type="hidden" value="'.$bike_no.'" id="vhcl2'.$n.'" />
                          <input type="hidden" value="'.$mother_name.'" id="mother_name'.$n.'" />
                         <input type="hidden" value="'.$father_name.'" id="father_name'.$n.'" />
<input type="hidden" value="'.$sex.'" id="hsex'.$sex.'" />
                            <input type="hidden" class="pplChecks" id="myusrs'.$n.'" value="'.$username.'"/>
                            <div class="PplRespOut">
                                    <div class="pplRespIn">
                                         ';
                                           if($myusck==1)
                                           {
                                               
                                           }else
                                           {
                                                if($my_cncts==1)
                                               {
                                                     echo'<div class="respItm" onclick="openwind('.$user_id.')">
                                        
                                              Send Message</div>';
                                               }else
                                               {
                                                echo'<div class="respItm" onclick="addtorels(\''.$username.'\',\''.$f_name.'\')">
                                        
                                               Add to Relation</div>';    
                                               }
                                           }
                                        echo'
                                        <a href="../'.$username.'" id="husrnm'.$n.'">
                                        <div class="respItm">
                                            View Profile
                                        </div></a>
                                    </div>
                                </div>
                         <!--  <div class="pplNamey" ></div> -->
                            <div class="pplItemIn
                            ">
                                <div class="pplFace">
                                    <img class="profImg" src="'.$p_pic.'" alt="'.$f_name.'" />
                                </div>
                                <div class="pplDets">
                                    <div class="pplName" style="background-color: crimson;" >'.$f_name.'   ('.$status.')</div>
                                    <div class="pplDetIn">
                                       <div class="pplDetItm" id="hge'.$n.'">'.$age.'<sub>+</sub><span class="divider"> | </span> <font id="hsex">'.$sex.'</font><span class="divider"> | </span>';
                                       if($times==0)
                                       	{
                                       		echo'Not Verifed';
                                       	}else
                                       	{
                                       		if($times==5 || $times>5)
                                       		{
                                       			echo'Verified';
                                       		}else
                                       		{
                                       			echo 'Verified by '.$times.' people';
                                       		}
                                       	}
                                       	echo'</div>
                                        
                                        <div class="pplDetItm" id="hnp'.$n.'">'.$np.'</div>
                                        <div class="pplDetItm" id="hposi'.$n.'">'.$posi.'</div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div></font>';
		
}

function namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts)
{
    if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
    echo' <font id="trgtdiv'.$n.'"><input type="hidden" id="email'.$n.'" value="'.$email.'" />
	<input type="hidden" value="'.$mobno.'" id="mob'.$n.'"/>
	<input type="hidden" value="'.$clg.'" id="hclg'.$n.'"/>
	<input type="hidden" value="'.$bldgrop.'" id="bld'.$n.'" />
            <input type="hidden" value="'.$sex.'" id="hsex'.$n.'" />
	<input type="hidden" value="'.$cur_loc.'" id="curloc'.$n.'" />
	<input type="hidden" value="'.$status.'" id="hrels'.$n.'" />
	<input type="hidden" value="'.$age.'" id="hage'.$n.'" />
<input type="hidden" value="'.$scl.'" id="scl'.$n.'" />
    <input type="hidden" value="'.$religion.'" id="relgion'.$n.'" />
      <input type="hidden" value="'.$posi.'" id="hcmpny'.$n.'" />
    <input type="hidden" value="'.$hscl.'" id="hscl'.$n.'" />
        <input type="hidden" value="'.$np.'" id="hliving_in'.$n.'" />
      <input type="hidden" value="'.$nick_name.'" id="hnick_name'.$n.'" />
          <input type="hidden" value="'.$mobno.'" id="h_mob_no'.$n.'" />
              <input type="hidden" value="'.$f_name.'" id="hfname'.$n.'" />
              <input type="hidden" value="'.$email.'" id="hemail'.$n.'" />
                  <input type="hidden" value="'.$b_day.'" id="hbday'.$n.'" />
                      <input type="hidden" value="'.$times.'" id="verified_time'.$n.'" />
                      <input type="hidden" value="'.$b_mnth.'" id="hbmnth'.$n.'" />
                  <input type="hidden" value="'.$b_year.'" id="hbyear'.$n.'" />
                  <input type="hidden" value="'.$clgfromyr.'" id="hclgfromyr'.$n.'"/>
                   <input type="hidden" value="'.$clgtoyr.'" id="hclgtoyr'.$n.'" />
                   <input type="hidden" value="'.$clg.'" id="college'.$n.'" />
                    <input type="hidden" value="'.$hscl.'" id="hiscl'.$n.'" />
                    <input type="hidden" value="'.$scl_fromyr.'" id="sclfrmyr'.$n.'" />
                   <input type="hidden" value="'.$scl_toyr.'" id="scl_toyr'.$n.'" />
                    <input type="hidden" value="'.$car_no.'" id="vhcl1'.$n.'" />
                        <input type="hidden" value="'.$langs.'" id="hlangs'.$n.'" />
                         <input type="hidden" value="'.$bike_no.'" id="vhcl2'.$n.'" />
                          <input type="hidden" value="'.$mother_name.'" id="mother_name'.$n.'" />
                         <input type="hidden" value="'.$father_name.'" id="father_name'.$n.'" />
<input type="hidden" value="'.$sex.'" id="hsex'.$sex.'" />
               

<div class="NameTypeOut">
                             <div class="pplTheme" style="background-color:navy" >
                                sedfed
                            </div>
                             <input type="hidden" class="pplChecks" />
                              <div class="PplRespOut">
                                    <div class="pplRespIn">
                                        ';
                                           if($myusck==1)
                                           {
                                               
                                           }else
                                           {
                                                 if($my_cncts==1)
                                               {
                                                     echo'<div class="respItm" onclick="openwind('.$user_id.')">
                                        
                                              Send Message</div>';
                                               }else
                                               {
                                                echo'<div class="respItm" onclick="addtorels(\''.$username.'\',\''.$f_name.'\')">
                                        
                                               Add to Relation</div>';    
                                               }
                                               
                                           }
                                        echo'
                                        <a href="../'.$username.'" id="husrnm'.$n.'">
                                        <div class="respItm">
                                            View Profile
                                        </div></a>
                                    </div>
                                </div>
                            <div class="NmeTypIn">
                                <div class="NmeTypItm" id="sf_usrname">
                                    '.$f_name.'
                                </div>
                                <div class="NmeTypItm">
                                    <div class="pplDetItm">'.$age.'<sub>+</sub><span class="divider"> | </span> '.$sex.' <span class="divider"> | </span> 1 Jun 2015<span class="divider"> | </span> 5 Jun 2015 </div>
                                </div>
                            </div>
                        </div></font>';
}
function expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts)
{
    if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
    echo' <font id="trgtdiv'.$n.'"><input type="hidden" id="email'.$n.'" value="'.$email.'" />
	<input type="hidden" value="'.$mobno.'" id="mob'.$n.'"/>
	<input type="hidden" value="'.$clg.'" id="hclg'.$n.'"/>
	<input type="hidden" value="'.$bldgrop.'" id="bld'.$n.'" />
            <input type="hidden" value="'.$sex.'" id="hsex'.$n.'" />
	<input type="hidden" value="'.$cur_loc.'" id="curloc'.$n.'" />
	<input type="hidden" value="'.$status.'" id="hrels'.$n.'" />
	<input type="hidden" value="'.$age.'" id="hage'.$n.'" />
<input type="hidden" value="'.$scl.'" id="scl'.$n.'" />
    <input type="hidden" value="'.$religion.'" id="relgion'.$n.'" />
      <input type="hidden" value="'.$posi.'" id="hcmpny'.$n.'" />
    <input type="hidden" value="'.$hscl.'" id="hscl'.$n.'" />
        <input type="hidden" value="'.$np.'" id="hliving_in'.$n.'" />
      <input type="hidden" value="'.$nick_name.'" id="hnick_name'.$n.'" />
          <input type="hidden" value="'.$mobno.'" id="h_mob_no'.$n.'" />
              <input type="hidden" value="'.$f_name.'" id="hfname'.$n.'" />
              <input type="hidden" value="'.$email.'" id="hemail'.$n.'" />
                  <input type="hidden" value="'.$b_day.'" id="hbday'.$n.'" />
                      <input type="hidden" value="'.$times.'" id="verified_time'.$n.'" />
                      <input type="hidden" value="'.$b_mnth.'" id="hbmnth'.$n.'" />
                  <input type="hidden" value="'.$b_year.'" id="hbyear'.$n.'" />
                  <input type="hidden" value="'.$clgfromyr.'" id="hclgfromyr'.$n.'"/>
                   <input type="hidden" value="'.$clgtoyr.'" id="hclgtoyr'.$n.'" />
                   <input type="hidden" value="'.$clg.'" id="college'.$n.'" />
                    <input type="hidden" value="'.$hscl.'" id="hiscl'.$n.'" />
                    <input type="hidden" value="'.$scl_fromyr.'" id="sclfrmyr'.$n.'" />
                   <input type="hidden" value="'.$scl_toyr.'" id="scl_toyr'.$n.'" />
                    <input type="hidden" value="'.$car_no.'" id="vhcl1'.$n.'" />
                        <input type="hidden" value="'.$langs.'" id="hlangs'.$n.'" />
                         <input type="hidden" value="'.$bike_no.'" id="vhcl2'.$n.'" />
                          <input type="hidden" value="'.$mother_name.'" id="mother_name'.$n.'" />
                         <input type="hidden" value="'.$father_name.'" id="father_name'.$n.'" />
<input type="hidden" value="'.$sex.'" id="hsex'.$sex.'" />
               
                            <div class="PplRespOut">
                                    <div class="pplRespIn">
                                        ';
                                           if($myusck==1)
                                           {
                                               
                                           }else
                                           {
                                                   if($my_cncts==1)
                                               {
                                                     echo'<div class="respItm" onclick="openwind('.$user_id.')">
                                        
                                              Send Message</div>';
                                               }else
                                               {
                                                echo'<div class="respItm" onclick="addtorels(\''.$username.'\',\''.$f_name.'\')">
                                        
                                               Add to Relation</div>';    
                                               }
                                           }
                                        echo'
                                        <a href="../'.$username.'" id="husrnm'.$n.'">
                                        <div class="respItm">
                                            View Profile
                                        </div></a>
                                    </div>
                                </div>
                           <div class="pplNamey">'.$f_name.'</div> 
                            <div class="BigpplItemIn">
                                <div class="pplFace">
                                    <img class="profImgBig" src="'.$p_pic.'" alt="'.$f_name.'" />
                                </div>
                                <div class="pplDets">
                                <!--    <div class="pplName" style="background-color:blue;" >Vijayakumar</div> -->
                                    <div class="pplDetIn">
                                        <div class="pplDetItm">'.$age.'<sub>+</sub><span class="divider"> | </span> '.$sex.' <span class="divider"> | </span>';if($times==0)
                                       	{
                                       		echo'Not Verifed';
                                       	}else
                                       	{
                                       		if($times==5 || $times>5)
                                       		{
                                       			echo'Verified';
                                       		}else
                                       		{
                                       			echo 'Verified by '.$times.' people';
                                       		}
                                       	}echo' </div>
                                        <div class="pplDetItm">'.$cur_loc.'</div>
                                        <div class="pplDetItm">'.$posi.'</div>
                                        <div class="pplDetItm">Just programming for SedFed</div>
                                        <div class="pplDetItm" style="color:gray" >18 relations in common</div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                         
                        </div></font>';
}
require 'mysqli_connect.php';

$name=mysqli_real_escape_string($dbc,trim($_REQUEST['nmsrch']));
$male=mysqli_real_escape_string($dbc,trim($_REQUEST['mlsrch']));
$female=mysqli_real_escape_string($dbc,trim($_REQUEST['fmlsrch']));
$agefrm=mysqli_real_escape_string($dbc,trim($_REQUEST['agfrmsrch']));
$ageto=mysqli_real_escape_string($dbc,trim($_REQUEST['agetosrch']));
$plclvng=mysqli_real_escape_string($dbc,trim($_REQUEST['plccrlvngsrch']));
$bldgrp=mysqli_real_escape_string($dbc,trim($_REQUEST['bldsrch']));
$sclme=mysqli_real_escape_string($dbc,trim($_REQUEST['sclsrch']));

$clgme=mysqli_real_escape_string($dbc,trim($_REQUEST['clgsrch']));
$cmpny=mysqli_real_escape_string($dbc,trim($_REQUEST['cmpnysrch']));
$mymob=mysqli_real_escape_string($dbc,trim($_REQUEST['mobsrch']));
$myemail=mysqli_real_escape_string($dbc,trim($_REQUEST['email']));
$vrf=mysqli_real_escape_string($dbc,trim($_REQUEST['vrfsrch']));
$nvrf=mysqli_real_escape_string($dbc,trim($_REQUEST['notvrfsrch']));
$bday=mysqli_real_escape_string($dbc,trim($_REQUEST['bdaysrch']));
$bmnth=mysqli_real_escape_string($dbc,trim($_REQUEST['bmnthsrch']));
$byear=mysqli_real_escape_string($dbc,trim($_REQUEST['byearsrch']));
$relig=mysqli_real_escape_string($dbc,trim($_REQUEST['religsrch']));
$stdin=mysqli_real_escape_string($dbc,trim($_REQUEST['stdinsrch']));
$std_frm=mysqli_real_escape_string($dbc,trim($_REQUEST['stdinfrmsrch']));
$stdto=mysqli_real_escape_string($dbc,trim($_REQUEST['stdintosrch']));
$clgin=mysqli_real_escape_string($dbc,trim($_REQUEST['clgstdinsrch']));
$clgfrm=mysqli_real_escape_string($dbc,trim($_REQUEST['clgstdfrmsrch']));
$clgto=mysqli_real_escape_string($dbc,trim($_REQUEST['clgstdtosrch']));
$workin=mysqli_real_escape_string($dbc,trim($_REQUEST['workplcsrch']));
$relname=mysqli_real_escape_string($dbc,trim($_REQUEST['relsnamesrch']));
$brname=mysqli_real_escape_string($dbc,trim($_REQUEST['bther']));
$mthername=mysqli_real_escape_string($dbc,trim($_REQUEST['mther']));
$sisname=mysqli_real_escape_string($dbc,trim($_REQUEST['sther']));
$fthername=mysqli_real_escape_string($dbc,trim($_REQUEST['fther']));
$nicknm=mysqli_real_escape_string($dbc,trim($_REQUEST['nicknm']));
$vhcl=mysqli_real_escape_string($dbc,trim($_REQUEST['vhcl']));
$lang=mysqli_real_escape_string($dbc,trim($_REQUEST['lang']));
$relat_to=mysqli_real_escape_string($dbc,trim($_REQUEST['relsname']));
       
$n=0;


if(!empty($name) || !empty($agefrm) || !empty($ageto) || !empty($male) || !empty($female))
{

if(!empty($name))
{
	$mq1="first_name REGEXP '$name' ";
}else
{
	$mq1=" ";
}
if(!empty($male))
{
	if(!empty($name))
	{
		$mq2="and sex='boy'";
	}else
	{
		$mq2="sex='boy'";
	}
}else
{
	$mq2=" ";
}
if(!empty($female))
{
	if(!empty($name))
	{
		$mq3="and sex='girl'";
	}else
	{
		$mq3="sex='girl'";
	}
}else
{
	$mq3=" ";
}
$myq="$mq1 $mq2 $mq3";

	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where $myq";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		
		while($rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC))
		{
			$n=$n+1;
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
                       
			$user_id=$rowst['uid'];
                        if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                 $p_pic='../'.$username.'/ppic10.jpg';
      
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
                $type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}

                      
		}
		
	}
}

}	
if(!empty($plclvng))
{
    $qbsc="select user_id as u from cur_details where cur_loc REGEXP '$plclvng'";
    $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
               
                     $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
 if(!empty($bldgrp))
    {
        $qbsc="select user_id as u from about_me where bldgrp='$bldgrp'";
         $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                  $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
    }

    
    //for school
    
    
if($sclme!=="")
{
  $qbsc="select user_id as u from scl_detail where scl REGEXP '$sclme'";
         $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$usename.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
        
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
        // for hiscl
        
         $qbsc="select user_id as u from hsc_detail where hsc_name REGEXP 'n'";
       $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
if(!empty($clgme))
{
    $qbsc="select user_id as u from college where clg REGEXP '$clgme'";
        $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
               $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
if(!empty($cmpny))
{
    $qbsc="select user_id as u from cur_position where nmoforg REGEXP '$cmpny'";
       $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
if(!empty($mymob))
{
    $qbsc="select user_id as u from users where mobno REGEXP '$mymob'";
        $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
                   
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
        }
        else
        {
            $age="";
            $np="";
            $sex="";
            $f_name="";
            $nick_name="";
        }
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }else
                            {
                                $b_day="";
                                $b_mnth="";
                                $b_year="";
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}



//email

if(!empty($myemail))
{
    $qbsc="select user_id as u from users where email REGEXP '$myemail'";
       $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}

//nick name
if(!empty($nicknm))
{
    $qbsc="select user_id as u from basic where nick_name REGEXP '$nicknm'";
        $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
                       
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
              $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
// verify srch 
if($vrf=="1")
{
    $q="select user_id as uid from verify where verified=1";
}else
{
    $q="select user_id as uid from verify where verified=0";
}
$qbsc=$q;/*
if(!empty($vrf) || !empty($nvrf))
{
  
        $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['uid'];
              if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			 }else
                        {
                            $tr="select username as em from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$username=$rpw['em'];
        		}else
        		{
        			$username="";
        		}
        	}
                
                $f_name=$username;
                $age="";
                $sex="";
          $np="";
                
                        }
			$q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                        
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
        	}else
        	{
        		$bldgrop="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
        		}else
        		{
        			$clg="";
        		}
        	}
        	$wd="SELECT mobno as mob from users where user_id=$user_id";
        	$rwd=mysqli_query($dbc,$wd);
        	if($rw)
        	{
        		if(mysqli_num_rows($rw)>0)
        		{
        			$rowa=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        			$mobno=$rowa['mob'];
        		}else
        		{
        			$mobno="";
        		}
        	}
        	$tr="select username as em from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
        		}else
        		{
        			$email="";
        		}
        	}
                
                $qe="select scl as s from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                    }else
                    {
                        $scl="";
                    }
                }
                  $qqe="select hsc_name as s from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                    }else
                    {
                        $hscl="";
                    }
                }

                       
}else
{
}
  $p_pic='../'.$username.'/ppic10.jpg';
   $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                	
		
	
            }
        }else
        {
            echo "not run cmpny";
        }
}*/
// brithday
    
if(!empty($bday) || !empty($bmnth) || !empty($byear))
{
     switch ($bmnth) {
             
             case 1:
                 $mnth="January";
                break;
            case 2:
                 $mnth="February";
                break;
            case 3:
                 $mnth="March";
                break;
            case 4:
                 $mnth="April";
                break;
            case 5:
                 $mnth="May";
                break;
            case 6:
                 $mnth="June";
                break;
            case 7:
                 $mnth="July";
                break;
            case 8:
                 $mnth="August";
                break;
            case 9:
                 $mnth="September";
                break;
            case 10:
                 $mnth="Octobar";
                break;
            case 11:
                 $mnth="November";
                break;
            case 12:
                 $mnth="December";
                break;

             default:
                 $mnth="September";
                 break;
         }

if(!empty($bday))
{
    $day="day='$bday'";
}  else {
    $day="";
}

if(!empty($bday))
{
    if(!empty($bmnth))
        {
            $month="and month='$mnth'";
        } else
        {
            $month="";
        }
}else
{
     if(!empty($bmnth))
        {
            $month="month='$mnth'";
           
        }  else {
        $month="";    
        }
}
if(!empty($bday) || !empty($bmnth))
{
    if(!empty($byear))
    {
        $year="and year='$byear'";
    }else
    {
        $year="";
    }
}else
{
    if(!empty($byear))
    {
        $year=" year='$byear'";
    }else
    {
        $year="";
    }
}
        
        
       $date="$day $month $year";

   $qbsc="select user_id as u from basic where $date";
echo "$qbsc";
        $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
           $p_pic='../'.$username.'/ppic10.jpg';
       
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
	
            }
        }else
        {
            echo "not run clg";
        }
}
if(!empty($relig))
{
     $qbsc="select user_id as u from about_me where religion regexp '$relig'";

       $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                 $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }

}

// stydying in
if(!empty($stdin) || !empty($stdtp) || !empty($stdfrm))
{
    {
     
if(!empty($stdin))
{
    $std_in="scl='$stdin'";
}  else {
    $std_in="";
}

if(!empty($std_in))
{
    if(!empty($std_frm))
        {
            $std_frm="and scl_fromyr>='$std_frm'";
        } else
        {
            $std_frm="";
        }
}else
{
     if(!empty($std_frm))
        {
            $std_frm="scl_fromyr>='$std_frm'";
           
        }  else {
        $std_frm="";    
        }
}
if(!empty($std_in) || !empty($std_frm))
{
    if(!empty($stdto))
    {
        $stdto="and scl_toyr<='$stdto'";
    }else
    {
        $stdto="";
    }
}else
{
    if(!empty($stdto))
    {
        $stdto=" scl_toyr<='$stdto'";
    }else
    {
        $stdto="";
    }
}
        
        
       $study="$std_in $std_frm $stdto";

   $qbsc="select user_id as u from scl_detail where $study";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
}

//studying college
if(!empty($clgin) || !empty($clgfrm) || !empty($clgto))
{
    {
     
if(!empty($stdin))
{
    $clgin="clg='$stdin'";
}  else {
    $clgin="";
}

if(!empty($clgin))
{
    if(!empty($clgfrm))
        {
            $clgfrm="and clgfromyr>='$std_frm'";
        } else
        {
            $clgfrm="";
        }
}else
{
     if(!empty($clgfrm))
        {
            $clgfrm="clgfromyr>='$clgfrm'";
           
        }  else {
        $clgfrm="";    
        }
}
if(!empty($clgin) || !empty($clgfrm))
{
    if(!empty($clgto))
    {
        $clgto="and clgtoyr<='$stdto'";
    }else
    {
        $clgto="";
    }
}else
{
    if(!empty($clgto))
    {
        $clgto=" clgtoyr<='$stdto'";
    }else
    {
        $clgto="";
    }
}
        
        
       $clg_std="$clgin $clgfrm $clgto";

   $qbsc="select user_id as u from scl_detail where $clg_std";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                 $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
}
//father name
if(!empty($fthername))
{
{
    
    $qbsc="select user_id as u from parent_details where f_name='$fthername'";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
}
// relation to
if(!empty($relat_to))
{
    $qz="select user_id as u from basic where first_name='$relat_to'";
    $rz=  mysqli_query($dbc, $qz);
    if($rz)
    {
        if(mysqli_num_rows($rz)>0)
        {
            $roe=  mysqli_fetch_array($rz,MYSQLI_ASSOC);
            $his_id=$roe['u'];
            
        }
    }
    $qbsc="select cu_id as u from contacts  where user_id=$his_id";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
// mother name
if(!empty($mthername))
{
{
    
    $qbsc="select user_id as u from parent_details where m_name='$mthername'";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
              $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
}

//vehicles
if(!empty($vhcl))
{
{
    
    $qbsc="select user_id u from vehicles where bike_no='$vhcl' or  car_no='$vhcl'";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
                  $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
}

//language
if(!empty($lang))
{
{
    
    $qbsc="select user_id u from about_me where language regexp '$lang' ";
 $rbsc=mysqli_query($dbc,$qbsc);
        if($rbsc)
        {
            if(mysqli_num_rows($rbsc)>0)
            {
                while($rbld=mysqli_fetch_array($rbsc,MYSQLI_ASSOC))
                {
                     $n=$n+1;
            $user_id=$rbld['u'];
            
	$main="SELECT first_name as fn,nick_name as nc,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];$nick_name=$rowst['nc'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			if($user_id==$myuser_id)
                        {
                            $myusck=1;
                        }else
                        {
                            $myusck=0;
                        }
                        
                        
                        $q1="SELECT nmoforg as nmo from cur_position where user_id=$user_id";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					$row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
					$posi=$row1['nmo'];
				}else
				{
					$posi="";
				}
			}    
                        
			
			$q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
                        $qa="select day as d,month as m,year as y from basic where user_id=$user_id";
                        $ra=  mysqli_query($dbc, $qa);
                        if($ra)
                        {
                            if(mysqli_num_rows($ra)>0)
                            {
                                $rf=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                $b_day=$rf['d'];
                                $b_mnth=$rf['m'];
                                $b_year=$rf['y'];
                            }
                        }      
                        
                        
                      
			  $q="SELECT veryfied_times as vt from verify where user_id=$user_id order by verify_id desc";
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
                                     
                                	}
                                     
                                    }else{
                                      echo "nr";
                                      $times=0;
                                         }
                          if(!empty($male))
                          {
                          	$q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where first_name REGEXP '$name' and sex='boy'";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{

								}
							}
                          }
                          
        $qq="SELECT status as st from relation_stat where user_id=$user_id";
        $rq=mysqli_query($dbc,$qq);
        if($rq)
        {
        	if(mysqli_num_rows($rq)>0)
        	{
        		$rowd=mysqli_fetch_array($rq,MYSQLI_ASSOC);

        		$status=$rowd['st'];
        	}else
        	{
        		$status="";
        	}
        }
        $qw="SELECT bldgrp as bg,language as l,religion as rlg from about_me where user_id=$user_id";
        $rw=mysqli_query($dbc,$qw);
        if($rw)
        {
        	if(mysqli_num_rows($rw)>0)
        	{
        		$rt=mysqli_fetch_array($rw,MYSQLI_ASSOC);
        		$bldgrop=$rt['bg'];
                        $langs=$rt['l'];
                        $religion=$rt['rlg'];
        	}else
        	{
        		$bldgrop="";
                        $langs="";
                        $religion="";
        	}
        }
        $qs="SELECT cur_loc as lc from cur_details where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
        	if(mysqli_num_rows($rs)>0)
        	{
        		$rowsq=mysqli_fetch_array($rs,MYSQLI_ASSOC);
        		$cur_loc=$rowsq['lc'];
        	}else
        	{
        		$cur_loc="";
        	}
        }
        	$er="SELECT clg as clg,clgfromyr as cf,clgtoyr as cy from college where user_id=$user_id";
        	$rer=mysqli_query($dbc,$er);
        	if($rer)
        	{
        		if(mysqli_num_rows($rer))
        		{
        			$rowclg=mysqli_fetch_array($rer,MYSQLI_ASSOC);
        			$clg=$rowclg['clg'];
                                $clgfromyr=$rowclg['cf'];
                                $clgtoyr=$rowclg['cy'];
        		}else
        		{
        			$clg="";
                                 $clgfromyr="";
                                $clgtoyr="";
        		}
        	}
                
        	$tr="select email as em,mobno as mb from users where user_id=$user_id";
        	$rrt=mysqli_query($dbc,$tr);
        	if($rrt)
        	{
        		if(mysqli_num_rows($rrt)>0)
        		{
        			$rpw=mysqli_fetch_array($rrt,MYSQLI_ASSOC);
        			$email=$rpw['em'];
                                $mobno=$rpw['mb'];
        		}else
        		{
        			$email="";
                                $mobno="";
        		}
        	}
                 
                $qe="select scl as s,scl_fromyr as sf,scl_toyr as sy from scl_detail where  user_id=$user_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rscl=mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $scl=$rscl['s'];
                        $scl_fromyr=$rscl['sf'];
                        $scl_toyr=$rscl['sy'];
                    }else
                    {
                        $scl="";
                            $scl_fromyr="";
                        $scl_toyr="";
                    }
                }
      
                
                  $qqe="select hsc_name as s,hsctoyr as hscto,hsc_fromyr as hf from hsc_detail where  user_id=$user_id";
                $qre=mysqli_query($dbc,$qqe);
                if($qre)
                {
                    if(mysqli_num_rows($qre)>0)
                    {
                        $rscl=mysqli_fetch_array($qre,MYSQLI_ASSOC);
                        $hscl=$rscl['s'];
                        $hsc_from_yr=$rscl['hf'];
                        $hsc_to_yr=$rscl['hscto'];
                    }else
                    {
                        $hscl="";
                         $hsc_from_yr= $hsc_to_yr="";
                        $hsc_to_yr="";
                    }
                }
                $qq="select bike_no as b,car_no as c from vehicles where user_id=$user_id";
                $rq=mysqli_query($dbc,$qq);
                if($r)
                {
                    if(mysqli_num_rows($rq)>0)
                    {
                        $vrow=  mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $bike_no=$vrow['b'];
                        $car_no=$vrow['c'];
                    }else
                    {
                        $bike_no="";
                        $car_no="";
                    }
                }
               
                
                $qp="select f_name as f,m_name as m from parent_details where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $father_name=$prnt_r['f'];
                        $mother_name=$prnt_r['m'];
                    }else
                    {
                          $father_name="";
                        $mother_name="";
                    }
                }
                    $qp="select sis_nm as f from sister where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $sister_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                        $mother_name="";
                    }
                }
            $qp="select brthr_nm as f from brother where user_id=$user_id";
                $rp=  mysqli_query($dbc, $qp);
                if($rp)
                {
                    if(mysqli_num_rows($rp)>0)
                    {
                        $prnt_r=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        
                        $brother_name=$prnt_r['f'];
                      }else
                    {
                          $sister_name="";
                       $brother_name="";
                    }
                }
              $p_pic='../'.$username.'/ppic10.jpg';
         $qx="select cu_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rx=mysqli_query($dbc,$qx);
        if($rx)
        {
            $my_cncts=0;
            if(mysqli_num_rows($rx)>0)
            {
            $my_cncts=1;    
            }
        }
$type="select type as tp from tilestype where user_id=$myuser_id";
$rtype=mysqli_query($dbc,$type);
if($rtype)
{
    if(mysqli_num_rows($rtype)>0)
    {
                $rowtypr=mysqli_fetch_array($rtype,MYSQLI_ASSOC);
                $mytpe=$rowtypr['tp'];
                if($mytpe==1)
                {
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$myusck,$nick_name,$father_name,$mother_name,$sister_name,$brother_name,$bike_no,$car_no,$scl_fromyr,$scl_fromyr,$clgfromyr,$clgtoyr,$b_day,$b_mnth,$b_year, $religion,$scl_toyr,$myusck,$langs,$p_pic,$my_cncts);

    }
}
	
                }
                }
                
    }
                	
		
	
            }
        }else
        {
            echo "not run clg";
        }
}
}
echo'<input type="hidden" value="'.$n.'" id="tot_srch_rslt_cnt" />';
		
}

?>