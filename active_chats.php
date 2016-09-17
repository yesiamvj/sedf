<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
       $user_id=$_SESSION['user_id'];
       
       require 'mysqli_connect.php';
       $q="select msg as m,sender_id as s from messages where ( user_id=$user_id or sender_seen=$user_id ) and senter_seen=$user_id";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              if(mysqli_num_rows($r)>0)
              {
	    while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	    {
	           $cu_id=$row['s'];
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
               
	     echo '<div id="active_user'.$group_id.'"><div class="OAC_Itm"  onclick="openwind('.$cu_id.')">
                                                  <img class="OAC_ItmImg" src="'.$p_pic.'" />
                                                  <div class="OAC_ItmCount" id="for_each_usr_cnt'.$cu_id.'"><span class="for_act_chat_cnt"   id="active_msg_cnt'.$cu_id.'">'.mysqli_num_rows($r3).'</span></div>
                                              </div></div>';
                        
	    }
	 }
       }
        $q="select gp_msg_id as m,group_id as gid from group_msg_seen where member_id=$user_id  ";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
            if(mysqli_num_rows($r)>0)
            {
	  while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	  {
	         $group_id=$row['gid'];
	         $msg_id=$row['m'];
	         $q1="SELECT battle as btl from group_messages where group_id=$group_id and `grp_msg_id` >= $msg_id order by grp_msg_id desc";
                      $r1=mysqli_query($dbc,$q1);
	     if($r1)
	     {
	            $q3="select grp_pic as p,theme as th from groups where group_id=$group_id";
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
                      $theme="#ef0000";
                  }
              }
	    
	    echo '<div id="active_user'.$group_id.'"><div class="OAC_Itm"  onclick="opengroup_chat('.$group_id.')">
                                                  <img class="OAC_ItmImg" src="'.$p_pic.'" />
                                                  <div class="OAC_ItmCount" id="for_each_usr_cnt'.$group_id.'"><span class="for_act_chat_cnt"   id="active_msg_cnt'.$group_id.'">'.mysqli_num_rows($r1).'</span></div>
                                              </div></div>';
              
	    
	     }
	     
	     
	         
	    }
            }
     }
}