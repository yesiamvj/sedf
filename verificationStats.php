<?php
  
    require_once '../web/mysqli_connect.php';
    $q="select verified_users as u from verify where user_id=$owner_id order by verify_id desc";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
		     $vf=0;
		     $vfu=0;
		     $verified_users=array();
		     $vfusr_name=array();
		     if(mysqli_num_rows($r)>0)
		     {
		            $vf=$vf+1;
		            $vfu=$vfu+1;
		            while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
		            {
			  $verified_users[$vf]=$row['u'];
			    $uname="select c_name as fname from contacts where user_id=$verified_users[$vf]";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $vfusr_name[$vfu]=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$verified_users[$vf]";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $vfusr_name[$vfu]=$rowemail['em'];
                                                             }
                                                         }
                                                     }
		            }
		            
		     }
		     $my_vf_times=0;
		     if(mysqli_num_rows($r)>2)
		     {
		           $my_vf_times=1; 
		     }
		          $qr="select verify from my_verify where user_id=$owner_id";
                                        $rr=mysqli_query($dbc,$qr);
                                        if($rr)
                                        {
                                            if(mysqli_num_rows($rr)>0)
                                            {
                                                 $my_vf_times=2;
                                            }
                                        }
		      if($my_vf_times==1 || $my_vf_times==2)
		      {
		             $verify_status="yes";
		      }else
		      {
		             $verify_status="no";
		      }
		             
                                }
	         
                                
                                
 ?>