<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_REQUEST['q'];
    $myuser_id=$_SESSION['user_id'];
function people($username,$p_pic,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype)
{
      if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
	echo'<font id="trgtdiv'.$n.'"><div class="pplItemOut" >
                            <input type="checkbox" class="pplChecks" id="myusrs'.$n.'" value="'.$username.'"/>
                            <div class="PplRespOut">
                                    <div class="pplRespIn">
                                             <div class="respItm" id="acreqbtn'.$n.'" onclick="addtorels(\''.$username.'\',\''.$f_name.'\')" >
                                                  Send Message
                                                </div>
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
                                    <div class="pplName" style="background-color: crimson;" >'.$f_name.'   </div>
                                    <div class="pplDetIn">
                                       <div class="pplDetItm" id="hge'.$n.'">'.$age.'<sub>+</sub><span class="divider"> | </span> <font id="hsex">'.$sex.'</font><span class="divider"> | </span>';
                                       if($times<5)
                                       	{
                                       		echo'Not Verifed';
                                       	}else
                                       	{
                                       		
                                       			echo'Verified';
                                       		
                                       	}
                                       	echo'</div>
                                     
                                        <div class="pplDetItm" >'.$mytype.'</div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div></font>';
		
}
$type=$_REQUEST['type'];
    require 'mysqli_connect.php';
    
  
$qa="select cu_id as u from contacts where user_id=$user_id  and type='$type'";

                $ra=mysqli_query($dbc,$qa);
                if($ra)
                { $cmr=0;
                $n=0;
                    if(mysqli_num_rows($ra)>0)
                    {
                        while($ckc=mysqli_fetch_array($ra,MYSQLI_ASSOC))
                        {
                            $ncid=$ckc['u'];
                            
                            $qs="select c_id as c, cu_id as ui ,c_name as cn,type as tp from contacts where user_id=$myuser_id and cu_id=$ncid";
                            $rs=mysqli_query($dbc,$qs);
                            if($rs)
                            {
                               
                                if(mysqli_num_rows($rs)>0)
                                {
                                    $cmr=$cmr+1;
                                      $n=$n+1;
                                      
                                      $mu=mysqli_fetch_array($rs,MYSQLI_ASSOC);
                                      $mytype=$mu['tp'];
                                      $c_name=$mu['cn'];
           $user_id=$mu['ui'];
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
                    people($username,$p_pic,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype);

                }
                if($mytpe==2)
                {
                     people($username,$p_pic,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype);

                }
                if($mytpe==3)
                {
                     people($username,$p_pic,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype);

                }
                if($mytpe==4)
                {
                     people($username,$p_pic,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype);

                }
    }else
    {
        people($username,$p_pic,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$mysts,$mycnct,$mytype);

    }
}                   }  else {    
                                }
                            }
                        }
                    }else
                    {
                        
                    }
                }else
                {
                    echo mysqli_error($dbc);
                }
                
}
?>