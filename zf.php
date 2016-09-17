
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    echo '';
}else
{
  //echo '<script>';
 
   $user_id=$_SESSION['user_id'];
  if(isset($_REQUEST['i'])){
      $currsts=$_REQUEST['i'];
      if($currsts==='1'){
           include 'updateonline.php'; 
      }
      
  }
  
   require_once '../web/mysqli_connect.php';
   
       
        echo 'z(';
   
   $q="select group_id  as a from group_invites where invited_users=$user_id and seen=0";
   $r= mysqli_query($dbc, $q);
   if($r)
   {
          $grp_req=  mysqli_num_rows($r);
   }
   $q="select req_id as u from  requests where reqstd_userid=$user_id and seen=0 ";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
          $rel_req=  mysqli_num_rows($r);
          $tot_req=$rel_req+$grp_req;
          $func="$tot_req,";
          echo $func;
   }else
   {
 
   }
   $q="select msg  as a from messages where delt=0 and sender_id=$user_id and senter_seen=$user_id";
   $r=  mysqli_query($dbc, $q);
   if($r)
   {
          $grp_req=  mysqli_num_rows($r);
          $func2="$grp_req,";
          echo $func2;
         
   }
   
   $q4="select user_id as u from notification where cu_id=$user_id and seen=0";
   $r4=mysqli_query($dbc,$q4);
   if($r4)
   {
       
           $td= mysqli_num_rows($r4);
           $func3="$td,";
           echo $func3;
       
   }

   $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $lkc=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q1="select like_userid as u from post_status where post_id=$post_id and l_seen=0 and like_userid!=0";
               $r1=mysqli_query($dbc,$q1);
               if($r1)
               {
                   
                    if(mysqli_num_rows($r1)>0)
                    {
                     
                            $lkc=$lkc+1;
                       
                    }
               }
           }
       }
       
     
   }else
   {
   }
   
   
     $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $ukc=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q1="select unlike_userid as u from post_status where post_id=$post_id and u_seen=0 and unlike_userid!=0;";
               $r1=mysqli_query($dbc,$q1);
               if($r1)
               {
                   
                    if(mysqli_num_rows($r1)>0)
                    {
                            $ukc=$ukc+1;
                       
                    }
               }
           }
          
       }else
       {
           
       }
       
       
   }else
   {
        
   }
   
    $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $rtc=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q1="select rating as u from post_status where post_id=$post_id and r_seen=0 and rating!=0;";
               $r1=mysqli_query($dbc,$q1);
               if($r1)
               {
                   
                    if(mysqli_num_rows($r1)>0)
                    {
                       $rt=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                       $lc=$rt['u'];
                     
                            $rtc=$rtc+1;
                       
                    }
               }
           }
       }
       
      
   }else
   {
       
   }
   
   

    $q="select post_id as p from post_permision where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $cmt=0;
       if(mysqli_num_rows($r)>0)
       {
           
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $post_id=$row['p'];
               $q2="select cmnt_id from post_comments where post_id=$post_id and seen=0";
                                         $r2=mysqli_query($dbc,$q2);
                                         if($r2)
                                         {
                                             if(mysqli_num_rows($r2)>0)
                                             {
                                                 
                                                 while($rop=mysqli_fetch_array($r2,MYSQLI_ASSOC))
                                                 {
                                                     $cmt=$cmt+1;
                                                 }
                                             }
                                         }
           }
       }
     
   }else
   {
      
   }
   
   
      
      $q="select profile_view as p from history where user_id=$user_id and seen=0";
      $r=mysqli_query($dbc,$q);
      if($r)
      {
         if(mysqli_num_rows($r)>0)
         {
             
         }
      }
      $tot=$lkc+$ukc+$rtc+$cmt;
      $func4="$lkc,$ukc,$rtc,$cmt,$tot,";
      echo $func4;
      
      
      $acp_c=array();
      $acp_id=array();
      $gp_c=array();
      $gp_id=array();
      $p=0;
      $g=0;
     $q="select msg as m,user_id as s from messages where delt=0 and  senter_seen=$user_id and user_id!=sender_id";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              $n=0;
              
              if(mysqli_num_rows($r)>0)
              {
	    while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	    {
	           $n=$n+1;
	           $cu_id=$row['s'];
	          $p=$p+1;
	               $q3="select p_pic as p from small_pics where user_id=$cu_id";
              $r3=  mysqli_query($dbc,$q3);
              if($r3)
              {
                  if(mysqli_num_rows($r3)>0)
                  {
                      $ry=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                      $p_pic=$ry['p'];
                  }else
                  {
                      $p_pic="icons/male.png";
                  }
              }
            
	           if($n>1)
	         {
                     if(!strpos($acp_cid,"$cu_id")>-1)
                     {
                        $acp_cid=$pre_ac.'_'.$cu_id.'';
	           $acp_c=$pre_cnt.'_'.mysqli_num_rows($r).'';  
                     }
	          
	              
	         }else
	         {
	                $acp_cid="_$cu_id";
	                $acp_c='_'.mysqli_num_rows($r).'';
                        
	         }
	         
	         $pre_ac=$acp_cid;
	         $pre_cnt=$acp_c;
	 
                          
	    }
	 }else
	 {
	        
	 $acp_c='_0';
	 $acp_cid='_0';
	       
	 }
	 
	 
	  
          echo "'$acp_c','$acp_cid',";
          
       }
       
        $qb="select gp_msg_id as m,group_id as gid from group_msg_seen where member_id=$user_id  ";
     $rn=mysqli_query($dbc,$qb);
     if($rn)
     {
            if(mysqli_num_rows($rn)>0)
            {
	  while($row=  mysqli_fetch_array($rn,MYSQLI_ASSOC))
	  {
	         $g=$g+1;
	         $group_id=$row['gid'];
	         $msg_id=$row['m'];
	         $qwb="select battle_id as  b from groups where group_id=$group_id";
	         $rwb=  mysqli_query($dbc, $qwb);
	         if($rwb)
	         {
	         if(mysqli_num_rows($rwb)>0)
	         {
	               $rowbn=  mysqli_fetch_array($rwb,MYSQLI_ASSOC);
	               $battle_id=$rowbn['b'];
	               if($battle_id>=1)
	               {
		             $qm="select group_id as g from groups where battle_id=$battle_id";
  $rm=  mysqli_query($dbc, $qm);
  if($rm)
  {
      if(mysqli_num_rows($rm)>0)
      {
          $g1=0;
          while($rowd=  mysqli_fetch_array($rm,MYSQLI_ASSOC))
          {
              $g1=$g1+1;
              if($g1==1)
              {
                  $team1_id=$rowd['g'];
              }
              if($g1==2)
              {
                  $team2_id=$rowd['g'];
              }
              $qw="select members_id as m from group_members where group_id=$team1_id and members_id=$user_id";
              $rw=  mysqli_query($dbc, $qw);
              if($rw)
              {
                  if(mysqli_num_rows($rw)>0)
                  {
                      $myteam=$team1_id;
                  }
                  else
                  {
                      if($g1>1)
                      {
                      $myteam=$team2_id;    
                      }
                      
                  }
              }
          }
      }else{
	                $team1_id=$group_id;
	                $team2_id=$group_id;
	         } 
  }   
	               } else{
	                $team1_id=$group_id;
	                $team2_id=$group_id;
	         }
	               
	      
    
	         }   else{
	                $team1_id=$group_id;
	                $team2_id=$group_id;
	         }    
	         }else
	         {
	              $team1_id=$group_id;
	                $team2_id=$group_id;   
	         }
	         
	         
	         $q1="SELECT battle as btl,group_id as p  FROM `group_messages` WHERE `grp_msg_id` >= $msg_id AND (`group_id` = $team1_id or `group_id` =$team2_id) and grp_msg_id!=$msg_id ORDER BY `grp_msg_id` DESC";
               
	         $r11=mysqli_query($dbc,$q1);
	     if($r11)
	     {
                 $g=0;
                 if(mysqli_num_rows($r11)>0)
                 {
                while($rt=  mysqli_fetch_array($r11,MYSQLI_ASSOC))
                 {
                     $group_id=$rt['p'];
                     $g=$g+1;
                 if($g>1)
	         {
                     if(!strpos($$grp_ids,"$group_id")>-1)
                     {
                               $grp_ids=$pre_g.'_'.$group_id.'';
	           $grp_c=$pre_cnt.'_'.mysqli_num_rows($r11).'';
                     }
	     
	         }else
	         {
	                $grp_ids="_$group_id";
	                $grp_c='_'.mysqli_num_rows($r11).'';
	         }
	         
	         $pre_g=$grp_ids;
	         $pre_cnt=$grp_c;
                 }
	            
                 } else
           {
	$grp_ids='_0';
	$grp_c='_0';
           }
                 
	    
	    
	     }
	
	          
	    }
            }  else {
                $grp_ids='_0';
	$grp_c='_0';
            }
          
	    
     }
     echo "'$grp_ids','$grp_c',";
	         
     
   
     $qe="SELECT cu_id as c,c_name as cnm from contacts where user_id=$user_id ";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
          $totcnt=0;
          
          $v=0;
          $c=0;
          if(mysqli_num_rows($re)>0)
          {
            
            while($rowg=mysqli_fetch_array($re,MYSQLI_ASSOC))
            {
	 
             $his_id=$rowg['c'];
             $cu_id=$his_id;
            
             
             $q2="select user_id as u,time as ot,day as day from onlines where user_id=$his_id";
             $r2=mysqli_query($dbc,$q2);
             if($r2)
             {
              if(mysqli_num_rows($r2)>0)
              {
                

              $totcnt=$totcnt+1;
                $row=mysqli_fetch_array($r2,MYSQLI_ASSOC);
      $cday=date('F j, Y');
  $curtime=date("g:i a,s");
      $times=$row['ot'];
      $day=$row['day'];
      $sec=strpos($times,",")+1;
      $ntime=substr($times,$sec,strlen($times));
      $csec=strpos($curtime,",")+1;
      $ctime=substr($curtime,$csec,strlen($curtime));
       $mytime=substr($times,0,$sec);
      $nmin=substr($times, 0,$sec);
      $cmin=substr($curtime, 0,$csec);
      $chk=$ctime-$ntime;
 
      
     

     

$cdate=strpos($cday,",")-2;
$cdate=substr($cday,$cdate,2);


$ndate=strpos($day,",")-2;
$ndate=substr($day,$ndate,2);
      $nam=strpos($times,",")-2;
      $cam=strpos($curtime,",")-2;

        $nam=substr($times,$nam,2);
        $cam=substr($curtime,$cam,2);
        $cu_ids=$cu_id;   
      if($cmin==$nmin && $chk<10 && $day==$cday)
      {
             $v=$v+1;
       $online_cuid[$v]=$cu_id;
        if($v>1)
	         {
	           $cu_ids=$pre_g.'_'.$cu_id.'';
	           
	         }else
	         {
	                $cu_ids="_$cu_id";
	               
	         }
	         
	         $pre_onl='_'.$cu_ids;
	         

    }else
    {
    
               $cu_ids='_0';     
    }

              }
           //  echo "$online_cuid";
             }
           }
         }else
         {
                $cu_ids='_0'; 
         }
         echo "'$cu_ids'";
}
 echo ');';
     
     
}

?>
