<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['myword']))
{
    header("location:index.php");
}else
{
    
    $myuser_id=$_SESSION['user_id'];
function people($user_id,$username,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$req_myname,$req_time,$req_type,$accept,$cmr)
{
      if($sex=="boy")
      {
          $sex="Male";
      }else
      {
          $sex="Female";
      }
  echo'                     <div class="MNF_Rel_Req_Itm" id="Notif1" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif1\').css({\'background-color\':\'white\'});" >
                                <div class="RelReqItmIn">
                                    <div class="RelReqFace">
                                        <div class="RelReqPplThme" style="background-color: crimson;" ></div>
                                        <img class="img_relreq" src="../'.$user_id.'/ppic5.jpg"/>
                                    </div>
                                    <div class="RelReqDets">
                                        <div class="RelReqNme"><a href="../users/'.$username.'" id="husrnm'.$n.'">
                                       <font>'.$f_name.'</font> </a><span class="RelReqMyDet"><span class="divider">|</span>'.$age.'<span class="divider">|</span>'.$sex.'<span class="divider">|</span>
                                        ';
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
                                        echo'</span> <div class="reqTime">'.$req_time.' (<i>as '.$req_type.'</i>)</div> </div>
                                        <div class="RelReqExt"><div class="RReqXdets"> '.$cmr.' Common relations  </div> 
                                        <div id="acreq'.$user_id.'" style="display:none;" class="accreqcont">
                                        <span class="accreqclsbtn"  onclick="$(\'#acreq'.$user_id.'\').fadeOut();$(\'#accept_req_btn'.$user_id.'\').fadeIn();">X</span>
                                        <input type="text" id="mysavenmnt'.$username.'" class="save_name_inp" placeholder="Save '.$f_name.' name as">


                                          <select class="option_btn_req" id="addRelTypent'.$username.'" onchange="addRelOther()" >
                                                        <option>Friends</option>
                                                        <option>Family</option>
                                                        <option>Enemy</option>
                                                        <option>Special</option>
                                                        <option>Unknown</option>
                                <option value="classmate" >Classmates</option>
                                <option value="other" >Other</option>
                            </select> 
                            <span class="savebtn" onclick="addrelsinnotif(\''.$username.'\')" id="saveme'.$username.'">Save</span>
                            <div id="adreqrslt'.$username.'"></div>
                                        </div> 
                                        

                                        <div class="RelReqAccpt" id="accept_req_btn'.$user_id.'" onclick="$(\'#acreq'.$user_id.'\').fadeIn();$(this).fadeOut()" style="cursor:pointer;">Accept Request</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
    
}

    require 'mysqli_connect.php';
    $qreq="select user_id as r,time as t,type as tp,reqstd_name as nm , req_id as rq ,accept as ac from requests where reqstd_userid=$myuser_id and cancel!=1 and accept!=1 order by req_id desc";
    $rreq=mysqli_query($dbc,$qreq);
    if($rreq)
    {
        echo'here';
      $n=0;
       $q="update requests set seen=1 where reqstd_userid=$myuser_id ";
         $r=mysqli_query($dbc,$q);
         $q="update group_invites set seen=1 where invited_users=$myuser_id";
         $r=  mysqli_query($dbc, $q);
        if(mysqli_num_rows($rreq)>0)
        {
        
            
            while($rowreq=mysqli_fetch_array($rreq,MYSQLI_ASSOC))
            {
                $n=$n+1;
            $user_id=$rowreq['r'];
            $req_myname=$rowreq['nm'];
            $req_type=$rowreq['tp'];
            $req_time=$rowreq['t'];
            $accept=$rowreq['ac'];

            
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
                                         
                                          $qa="select cu_id as u from contacts where user_id=$user_id";
                $ra=mysqli_query($dbc,$qa);
                if($ra)
                { $cmr=0;
                    if(mysqli_num_rows($ra)>0)
                    {
                        while($ckc=mysqli_fetch_array($ra,MYSQLI_ASSOC))
                        {
                            $ncid=$ckc['u'];
                            $qs="select c_id as c from contacts where user_id=$myuser_id and cu_id=$ncid";
                            $rs=mysqli_query($dbc,$qs);
                            if($rs)
                            {
                               
                                if(mysqli_num_rows($rs)>0)
                                {
                                    $cmr=$cmr+1;
                                }
                            }
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
         

        }else
        {
            echo'nr ';
        }
        
          echo'hai';
      people($user_id,$username,$f_name,$age,$times,$np,$posi,$sex,$n,$email,$mobno,$clg,$bldgrop,$status,$cur_loc,$scl,$hscl,$req_myname,$req_time,$req_type,$accept,$cmr);

            }
            
          
        }else
        {
             
        }
    }  else {
        echo'not run';
    }
    
    $q="select invited_users,group_id as g  from group_invites where invited_users=$myuser_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $grp_id=$row['g'];
                $qe="select group_name as gn,user_id as u,time as t,theme as th from groups where group_id=$grp_id";
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    if(mysqli_num_rows($re)>0)
                    {
                        $rows=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                        $adm_id=$rows['u'];
                        $grp_name=$rows['gn'];
                        $req_time=$rows['t'];
                        $theme=$rows['th'];
                        
                        $qes="select c_name as c from contacts where user_id=$myuser_id and cu_id=$adm_id";
                        
            $rse=mysqli_query($dbc,$qes);
            if($rse)
            {
                if(mysqli_num_rows($rse)>0)
                {
                    $rt=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $f_name=$rt['c'];
                    
                }else
                {
                    $qess="select first_name as f from basic where user_id=$adm_id";
                    $ress=  mysqli_query($dbc,$qess);
                    if($ress)
                    {
                        $ret=  mysqli_fetch_array($ress,MYSQLI_ASSOC);
                        $f_name=$ret['f'];
                    }
                }
            }
                        $qs="select p_pic as p from small_pics where user_id=$adm_id";
                        $rs=  mysqli_query($dbc,$qs);
                        if($rs)
                        {
                            if(mysqli_num_rows($rs)>0)
                            {
                                $rt=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                                $p_pic=$rt['p'];
                            }else
                            {
                                  $qsb="select sex as s from basic where user_id=$adm_id";
                        $rsb=mysqli_query($dbc,$qsb);
                        if($rsb)
                        {
                            $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                            $sex=$et['s'];
                            if($sex=="girl")
                            {
                                $gen="icons/female.png";
                            }else
                            {
                                $gen="icons/male.png";
                            }
                        }
                            }
                        }
                      
                        $qr="select username as u from users where user_id=$adm_id";
                        $rr=  mysqli_query($dbc, $qr);
                        if($rr)
                        {
                            $et=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                            $username=$et['u'];
                        }
                        echo'                     <div class="MNF_Rel_Req_Itm" id="Notif1" style="background-color: rgba(0,0,0,0.03);" onmouseover="$(\'#Notif1\').css({\'background-color\':\'white\'});" >
                                <div class="RelReqItmIn">
                                    <div class="RelReqFace">
                                        <div class="RelReqPplThme" style="background-color: '."#$theme".';" ></div>
                                        <img class="img_relreq" src="'.$p_pic.'"/>
                                    </div>
                                    <div class="RelReqDets">
                                        <div class="RelReqNme"><a href="../'.$username.'" id="husrnm'.$n.'">
                                       <font>'.$f_name.'</font> </a>Invited to '.$grp_name.' group<span class="RelReqMyDet"><span class="divider">|</span><span class="divider">|</span>
                                        ';
                                       
                                        echo'</span> <div class="reqTime">'.$req_time.' </div> </div>';
                                          $mem="select members_id as m from group_members where group_id=$grp_id";
                        $rem=mysqli_query($dbc,$mem);
                        if($rem)
                        {
                             $mem_cnt=0;
                            if(mysqli_num_rows($rem)>0)
                            {
                               
                                while($ro=  mysqli_fetch_array($rem,MYSQLI_ASSOC))
                                {
                                    $mem_cnt=$mem_cnt+1;
                                    $members_id=$ro['m'];
                                      
                                $qes="select c_name as c from contacts where user_id=$myuser_id and cu_id=$adm_id";
                                            $rse=mysqli_query($dbc,$qes);
                                          if($rse)
                                          {
                                              $cnct=0;
                                              if(mysqli_num_rows($rse)>0)
                                              {
                                                  $cnct=1;
                                                  $rt=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                                                  $f_name=$rt['c'];
                                                  

                                              }
                                              if($cnct==1)
                                              {
                                                  echo'are already members';
                                              }
                                          }
                                }
                            }
                        }
                                        echo'
                                        <div class="RelReqExt"><div class="RReqXdets"> '.$mem_cnt.' members  </div> 
                                        <div class="join_grp_btns" id="clk_to_jn_grp'.$grp_id.'" onclick="joingrp(\''.$grp_id.'\',\'#clk_to_jn_grp'.$grp_id.'\')">Join</div>

                                        ';
                                         
                                        echo'
                            
                                        </div> 
                                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
    
                    }
                }
            }
        }
    }
    if(mysqli_num_rows($rreq)==0 && mysqli_num_rows($r)==0)
    {
            echo"<div style=\"padding:50px;color:navy;\">No New Requests</div>";
    }
}

?>