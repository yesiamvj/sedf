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
                 
                $q2s="select battle_id as bt from groups where group_id=$group_id and battle=1";
           
                $r2s=mysqli_query($dbc,$q2s);
                if($r2s)
                {
                    
                    if(mysqli_num_rows($r2s)>0)
                    {
	          $rows=mysqli_fetch_array($r2s,MYSQLI_ASSOC);
	          $battle_id=$rows['bt'];
	          $qb="select battle_name as b from battles where battle_id=$battle_id";
	          $rb=mysqli_query($dbc,$qb);
	          if($rb)
	          {
		$ros=  mysqli_fetch_array($rb,MYSQLI_ASSOC);
		$battle_name=$ros['b'];
		 echo'<div class="TeamTopicTtl" onclick="$(\'#show_teams'.$battle_id.'\').slideToggle();">
		             '.$battle_name.' 
                                  </div>';  
		       
	          }
	          echo '<div id="show_teams'.$battle_id.'" style="display:none;"> ';
	          $qa="select group_id as gid,group_name as gm,grp_pic as p from groups where battle_id=$battle_id";
	          $ra=  mysqli_query($dbc, $qa);
	          if($ra)
	          {
		if(mysqli_num_rows($ra)>0)
		{
		       while($ed=  mysqli_fetch_array($ra,MYSQLI_ASSOC))
		       {
		 $grp_nm=$ed['gm'];
	           $team_id=$ed['gid'];
	            $grp_pic=$ed['p'];
	            $grp_id=$ed['gid'];
                $q1="select members_id as m from group_members where group_id=$grp_id";
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
                $qs="select group_id as g from groups where battle_id=$battle_id";
                $rs=mysqli_query($dbc,$qs);
                if($rs)
                {
	      $gp=0;
	      if(mysqli_num_rows($rs)>0)
	      {
	             while($df=  mysqli_fetch_array($rs,MYSQLI_ASSOC))
	             {
		   $gp=$gp+1;
		   if($gp==1)
		   {
		          $team1_id=$df['g'];
		          
		   }
		   if($gp==2)
		   {
		          $team2_id=$df['g'];
		   }
		   
	             }
	      }
                }
                $q3="select members_id as g from group_members where (group_id=$team1_id or group_id=$team2_id) and members_id=$user_id";
                $r3=mysqli_query($dbc,$q3);
                if($r3)
                {
                    $mygrp=0;
                    if(mysqli_num_rows($r3)>0)
                    {
                        $mygrp=1;
                    }
                }
		         echo '    <div class="OLPN_Itm"  >
                                  
                                  <img class="OLPN_ItmImg" src="'.$grp_pic.'" />
                                  <div class="OLPN_ItmName" style="color:brown" >
                                      '.$grp_nm.'
                                      <div class="OLPN_ItmDets" >
                                         '.$memc.' members ';
		         if($mygrp!==1)
		         {
		                echo'<div class="GrpreqJoinBtn" id="clk_to_jn_grp'.$grp_id.'" onclick="joingrp(\''.$grp_id.'\',\'#clk_to_jn_grp'.$grp_id.'\')">Join</div>
                                     ';
		         } echo'</div>
                                  </div>
                              </div>';
		       }
		}
	          }
	          echo'</div>';
	          
	        
                       
                    }
                    
                }
                            }
                    }
                }
            }
        }
    }
   
    
}