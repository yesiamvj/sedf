<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['mypass']))
{
    header("location:index.php");
}else
{
    require 'mysqli_connect.php';
    $myuser_id=$_SESSION['user_id'];
    $srch_cont=mysqli_real_escape_string($dbc,trim($_REQUEST['cont']));
    
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
			   echo'<div class="respItm" id="acreqbtn'.$n.'"  onclick="openwind(\''.$user_id.'\')" >
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
                                               {echo'<div class="respItm" id="acreqbtn'.$n.'"  onclick="openwind(\''.$user_id.'\')" >
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
                                               {echo'<div class="respItm" id="acreqbtn'.$n.'"  onclick="openwind(\''.$user_id.'\')" >
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
$n=0;
  	$main="SELECT first_name as fn,age as ag,user_id as r,nativeplace as np,sex as s from basic where first_name REGEXP '$srch_cont'";
	$rreq=mysqli_query($dbc,$main);
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
                            $cc="select c_id as c,type as tp from contacts where user_id=$myuser_id and cu_id=$user_id";
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
          $mytype="";
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
else
{
	
}
echo'<input type="hidden" value="'.$n.'" id="tot_srch_rslt_cnt" />';

}
?>