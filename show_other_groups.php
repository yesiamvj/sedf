<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    
    $qc="select cu_id as c from contacts where user_id=$user_id ";
    $rc=mysqli_query($dbc,$qc);
    if($rc)
    {
        if(mysqli_num_rows($rc)>0)
        {
            while($rkow=mysqli_fetch_array($rc,MYSQLI_ASSOC))
            {
                $cu_id=$rkow['c'];
                $qr="select group_id as g from group_members where members_id=$cu_id";
                $rr=mysqli_query($dbc,$qr);
                if($rr)
                {
                    if(mysqli_num_rows($rr)>0)
                    {
                            while($et=mysqli_fetch_array($rr,MYSQLI_ASSOC))
                            {
                                $group_id=$et['g'];
                                
                $q1="select members_id as m from group_members where group_id=$group_id";
                $r1=  mysqli_query($dbc, $q1);
                if($r1)
                {
                    $memc=0;
                    if(mysqli_num_rows($r1)>0)
                    {
                        $online=0;
                        while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
                        {
                            $mem_id=$rows['m'];
                            $memc=$memc+1;
                           
                        }
                    }
                }
                $q3="select members_id as g from group_members where group_id=$group_id and members_id=$user_id";
                $r3=mysqli_query($dbc,$q3);
                if($r3)
                {
                    $mygrp=0;
                    if(mysqli_num_rows($r3)>0)
                    {
                        $mygrp=1;
                    }
                }
                $q2s="select group_name as g ,theme as t ,grp_pic as p from groups where group_id=$group_id and battle=0";
           
                $r2s=mysqli_query($dbc,$q2s);
                if($r2s)
                {
                    $rows=  mysqli_fetch_array($r2s,MYSQLI_ASSOC);
                    $grp_nm=$rows['g'];
                    $grp_thm=$rows['t'];
                    $grp_pic=$rows['p'];
                    if(mysqli_num_rows($r2s)>0)
                    {
                        if($mygrp==1)
                        {
                            
                        }else
                        {
                       echo' 
                        
                        <div class="OLPN_Itm"  >
                            
                                  <img class="OLPN_ItmImg" src="'.$grp_pic.'" />
                                  <div class="OLPN_ItmName" >
                                      '.$grp_nm.'
                                             
                                          <div style="cursor:pointer;" onmouseout="$(\'.team_mems_hold'.$group_id.'\').fadeOut()" onmouseover="show_tem_mems(\''.$group_id.'\',\'.team_mems_hold'.$group_id.'\',\'#showed_members'.$group_id.'\')" > '.$memc.' members</div>
                                            <div class="team_mems_hold'.$group_id.'" style="display:none;">
                                      <div class="my_team_members" id="showed_members'.$group_id.'">
                                      
                                      </div>
                                      </div>
                                      </div>
                                     <div class="GrpreqJoinBtn" id="clk_to_jn_grp'.$group_id.'" onclick="joingrp('.$group_id.',\'#clk_to_jn_grp'.$group_id.'\')"> Join</div>
                                            
                                      </div> 
                                  </div>
                              </div>';      
                        }
                       
                    }
                    
                }
                            }
                    }
                }
            }
        }
    }
   
    
}