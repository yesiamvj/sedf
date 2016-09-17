<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['me']))
{
    header("location:index.php");
}else
{
    
            $n=0;
    $myuser_id=$_SESSION['user_id'];
      function people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme)
{
      if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
	echo' <font id="trgtdiv'.$n.'">
             <input type="hidden" value="'.$f_name.'" id="hfname'.$n.'" />
	<input type="hidden" value="'.$age.'" id="hage'.$n.'" />
    		<input type="hidden" value="'.$times.'" id="verified_time'.$n.'" />
                  
             <div class="pplItemOut" >
                            <input type="hidden" class="pplChecks" id="myusrs'.$n.'" value="'.$username.'"/>
                            <div class="PplRespOut">
                                    <div class="pplRespIn">
                                             ';
		              if($_SESSION['user_name']!==$username)
		              {
			    
                                               if($mycnct==1)
                                               {
			   echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="openwind(\''.$user_id.'\')" >
                                        Send Message';
                                               }else
                                               {
                                                    if($req_sent===1)
			   {
			        if($accpt_req!==0)
			        {
			             
			        }else
			        {
			                  echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\',\'#acreqbtn'.$n.'\')" >
                                        Update Request';
			        }
			          
			         
			   }else
			   {
			              echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\',\'#acreqbtn'.$n.'\')" >
                                        Add to Relation';
			   }
                                               }
		              }
    echo'</div>
                                        <a href="../'.$username.'" id="husrnm'.$n.'">
                                        <div class="respItm">
                                            View Profile
                                        </div></a>
                                    </div>
                                </div>
                         <!--  <div class="pplNamey" id="hfname'.$n.'">'.$f_name.'</div> -->
                            <div class="pplItemIn
                            ">
                                <div class="pplFace">
                                    <img class="profImg" src="'.$p_pic.'" alt="'.$f_name.'" />
                                </div>
                                <div class="pplDets">
                                    <div class="pplName" style="background-color: '.$theme.';" >'.$f_name.'   </div>
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
                                     
                                        <div class="pplDetItm" id="hposi'.$n.'">'.$posi.'</div>
                                        <div class="pplDetItm" >'.$mytype.'</div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div></font>';
		
}

function namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme)
{
    if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
    echo' <font id="trgtdiv'.$n.'">
          <input type="hidden" value="'.$f_name.'" id="hfname'.$n.'" />
	<input type="hidden" value="'.$age.'" id="hage'.$n.'" />
    		<input type="hidden" value="'.$times.'" id="verified_time'.$n.'" />
          <div class="NameTypeOut">
                             <div class="pplTheme" style="background-color:'.$theme.'" >
                                sedfed
                            </div>
                             <input type="hidden" class="pplChecks" />
                              <div class="PplRespOut">
                                    <div class="pplRespIn">
                                               ';
                                              if($_SESSION['user_name']!==$username)
		              {
			    
                                               if($mycnct==1)
                                               {echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="openwind(\''.$user_id.'\')" >
                                        Send Message';
                                               }else
                                               {
                                                    if($req_sent===1)
			   {
			        if($accpt_req==1)
			        {
			        }else
			        {
			                  echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\',\'#acreqbtn'.$n.'\')" >
                                        Update Request';
			        }
			          
			         
			   }else
			   {
			              echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\',\'#acreqbtn'.$n.'\')" >
                                        Add to Relation';
			   }
                                               }
		              }
    echo' </div>
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
                                <div class="pplDetItm" >'.$mytype.'</div>
                                    <div class="pplDetItm">'.$age.'<sub>+</sub><span class="divider"> | </span> '.$sex.' <span class="divider"> | </span> 1 Jun 2015<span class="divider"> | </div>
                                </div>
                            </div>
                        </div></font>';
}
function expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme)
{
    if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
    echo' <font id="trgtdiv'.$n.'">
          <input type="hidden" value="'.$f_name.'" id="hfname'.$n.'" />
	<input type="hidden" value="'.$age.'" id="hage'.$n.'" />
    		<input type="hidden" value="'.$times.'" id="verified_time'.$n.'" />
          
    <div class="BigpplItemOut">
    
                            <div class="PplRespOut">
                                    <div class="pplRespIn">
                                             ';
                                              if($_SESSION['user_name']!==$username)
		              {
			    
                                               if($mycnct==1)
                                               {echo'<div class="respItm" id="acreqbtn'.$n.'"  onclick="openwind(\''.$user_id.'\')">
                                        Send Message';
                                               }else
                                               {
                                                    if($req_sent===1)
			   {
			        if($accpt_req==1)
			        {
			            
			        }else
			        {
			                  echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\',\'#acreqbtn'.$n.'\')" >
                                        Update Request';
			        }
			          
			         
			   }else
			   {
			              echo'<div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\'\'#acreqbtn'.$n.'\')" >
                                        Add to Relation';
			   }
                                               }
		              }
    echo'</div>
                                        <a href="../'.$username.'" id="husrnm'.$n.'">
                                        <div class="respItm">
                                            View Profile
                                        </div></a>
                                    </div>
                                </div>
                           <div class="pplNamey" style="background-color:'.$theme.'">'.$f_name.'</div> 
                            <div class="BigpplItemIn">
                                <div class="pplFace">
                                    <img class="profImgBig" src="'.$p_pic.'" alt="'.$f_name.'" />
                                </div>
                                <div class="pplDets">
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
                                            <div class="pplDetItm" >'.$mytype.'</div>
                                        <div class="pplDetItm">'.$cur_loc.'</div>
                                        <div class="pplDetItm">'.$posi.'</div>
                                        <div class="pplDetItm">'.$mysts.'</div>
                                       
                                    </div>
                                </div>
                                
                            </div>
                         
                        </div></font>';
}
    require 'mysqli_connect.php';
      $qreq="select c_name as cname,cu_id as r ,type as tp from contacts where user_id=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
           
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           $mytype=$rowreq['tp'];
           $c_name=$rowreq['cname'];
            
            
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$c_name;
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
	       $q2="SELECT username as u from users where user_id=$user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                      $p_pic='../'.$username.'/ppic10.jpg';
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
          $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $req_sent=0;
         $accpt_req=0;
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
                }
         

        }
        
        $p_pic='../'.$username.'/ppic10.jpg';
          
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '<div id="endofcnct">You have not any contact with you..</div>';
        }
    }
    $mytype="";
    echo'<div id="endofcnct">Add people If you know  <span id="sgstdppl">(  These people details are almost like you  )</span></div>';
    $q="select nativeplace as np from basic where user_id=$myuser_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $roplc=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $plca=$roplc['np'];
        }else
        {
            $plca="";
        }
    }
    //for np
    $plca=substr($plca,0,3);
     $qreq="select user_id as  r from basic where nativeplace REGEXP '$plca' and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
            
            
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
      
                
                        }
                            $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
              }else
              {
                  $mycnct=0;
              }
          }
          $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id  and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
        $p_pic='../'.$username.'/ppic10.jpg';
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    //ecnd np
    
    //strt cu_loc
    $q="select cur_loc as cl from cur_details where user_id=$myuser_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $mycl=$row['cl'];
        }else
        {
            $mycl="";
        }
    }
    
    $mycl=substr($mycl,0,3);
     $qrdeq="select user_id as r cur_details where cur_loc REGEXP '$mycl'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qrdeq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
            
            
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
               $p_pic='../'.$username.'/ppic10.jpg';
                         $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
              }
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    //ecnd cur loc
    
    // STRT CUR POSI
    $q="select nmoforg as og from cur_position where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $myorg=$row['og'];
        }else
        {
            $myorg="";
        }
    }
    $myorg=substr($myorg,0,3);
     $qreq="select  user_id as r  from cur_position where nmoforg REGEXP '$myorg'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
            $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
 $p_pic='../'.$username.'/ppic10.jpg';
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
 $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
                  
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    //END CUR POSI
     
    //strt clg
     $q="select clg as og from college where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $myclgs=$row['og'];
        }else
        {
            $myclgs="";
        }
    }
    $myclgs=substr($myclgs,0,3);
     $qreq="select user_id as r  from college where clg REGEXP '$myclgs'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
              $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id and cancel=0" ;
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
                        $p_pic='../'.$username.'/ppic10.jpg';
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
                        
                         $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    //end clg
    
    //strt dept
    
      $q="select dept as bg from college where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $mydept=$row['bg'];
        }else
        {
            $mydept="";
        }
    }
    $mydept=substr($mydept,0,3);
     $qreq="user_id as r from college where dept REGEXP '$mydept'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
            
            $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id  and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
                         $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
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
        $p_pic='../'.$username.'/ppic10.jpg';
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    //end dept
    
    //strt hsc
    $q="select hsc_name as og from hsc_detail where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $myhscl=$row['og'];
        }else
        {
            $myhscl="";
        }
    }
    if(!empty($myhscl))
    {
        $myhscl=substr($myhscl,0,3);
         $qreq="select user_id as r from hsc_detail where hsc_name REGEXP '$myhscl'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
              $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
                        
                         $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
              }
          }
          $p_pic='../'.$username.'/ppic10.jpg';
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    }
    //end hsc
    
    //strt scl
    $q="select scl as og from scl_detail where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $myscls=$row['og'];
        }else
        {
            $myscls="";
        }
    }
    if(!empty($myscls))
    {
     $qreq="select user_id as r from scl_detail where scl REGEXP '$myscls'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
               $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
                        
                         $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
              }
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
                     $p_pic='../'.$username.'/ppic10.jpg';
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
}
    //end scl

    //strt bldgrp
    $q="select bldgrp as bg from about_me where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $mybld=$row['bg'];
        }else
        {
            $mybld="";
        }
    }
    if(!empty($mybld))
    {
         $qreq="select user_id as r from about_me where bldgrp='$mybld'";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
                $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id  and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
                    $p_pic='../'.$username.'/ppic10.jpg';
	   
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
                 $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
    }
    //end nloc
    //strt nloc
      $q="select nloc as bg from addresses where user_id=$myuser_id";
     $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $mynloc=$row['bg'];
        }else
        {
            $mynloc="";
        }
    }
   if(!empty($mynloc))
   {
       $mynloc=substr($mynloc,0,3);
        $qreq="select user_id as r  from addresses where nloc REGEXP '$mynloc'  and user_id!=$myuser_id";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        if(mysqli_num_rows($rreq)>0)
        {
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
           
            
              $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
	}
          } $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$user_id";
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
$main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$myunser_id=$rowst['uid'];
                         }else
                        {
                            $tr="SELECT email as em from users where user_id=$user_id";
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
                         $cc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
          $rp=mysqli_query($dbc,$cc);
          if($rp)
          {
              $mycnct=0;
              if(mysqli_num_rows($rp)>0)
              {
                  $mycnct=1;
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
                      $p_pic='../'.$username.'/ppic10.jpg';
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
            }
            
          
        }else
        {
            echo '';
        }
    }
   }
    //ecnd nloc
 if($n<10)
 {
           $qc="select user_id as cid from basic ";
   $rc=mysqli_query($dbc,$qc);
   if($rc)
   {
       if(mysqli_num_rows($rc)>0)
       {
           while($cnctrow=mysqli_fetch_array($rc,MYSQLI_ASSOC))
           {
               $n=$n+1;
                $user_id=$cnctrow['cid'];
                 $req_sent=0;
           $accpt_req=0;
          $qs="select req_id as r from requests where user_id=$myuser_id and reqstd_userid=$user_id and accept=0 and cancel=0";
          $qs2="select req_id as r from requests where user_id=$user_id and reqstd_userid=$myuser_id  and cancel=0";
          $rs=  mysqli_query($dbc,$qs);
          $rs2=  mysqli_query($dbc,$qs2);
          if($rs && $rs2)
          {
	if(mysqli_num_rows($rs)>0)
	{
	$req_sent=1;       
	}
	if(mysqli_num_rows($rs2)>0)
	{
	       $accpt_req=1;
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
                           $main="SELECT first_name as fn,age as ag,user_id as uid,nativeplace as np,sex as s from basic where user_id=$user_id";
	$rst=mysqli_query($dbc,$main);
if($rst)
{

if(mysqli_num_rows($rst)>0)
	{
		$rowst=mysqli_fetch_array($rst,MYSQLI_ASSOC);
		
			
			$f_name=$rowst['fn'];
			$age=$rowst['ag'];
			$np=$rowst['np'];
			$sex=$rowst['s'];
			$user_id=$rowst['uid'];
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
                         $qs="select img_q10 as m from prof_pic_images where user_id=$user_id";
        $rs=mysqli_query($dbc,$qs);
        if($rs)
        {
            if(mysqli_num_rows($rs)>0)
            {
                $rf=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                $p_pic=$rf['m'];
            }  else {
            $p_pic="";    
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
        $mc="select c_id as c from contacts where user_id=$myuser_id and cu_id=$user_id";
        $rcf=mysqli_query($dbc,$mc);
        if($rcf)
        {
            $mycnct=0;
            if(mysqli_num_rows($rcf)>0)
            {
                $mycnct=1;
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
        	$tr="SELECT email as em from users where user_id=$user_id";
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
                $qa="select mythink as mn from status where user_id=$user_id";
                $rq=mysqli_query($dbc,$qa);
                if($rq)
                {
                    if(mysqli_num_rows($rq)>0)
                    {   $rowc=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $mysts=$rowc['mn'];
                    }else
                    {
                        $mysts="";
                    }
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
                    namesonly($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==2)
                {
                     people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==3)
                {
                     people($username,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
                if($mytpe==4)
                {
                     expandedtiles($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

                }
    }else
    {
        people($username,$user_id,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype,$p_pic,$req_sent, $accpt_req,$theme);

    }
}
	
                   
           }
       }
   }
 }

   echo'<input type="hidden" value="'.$n.'" id="tot_srch_rslt_cnt" />';
}


?>