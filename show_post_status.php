<?php session_start(); 
 
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['post_id']))
 {
     header("location:index.php");
 }
 else
{
     $user_id=$_SESSION['user_id'];
     require 'mysqli_connect.php';
     $ctgry=$_REQUEST['ctgry'];
     $post_id=$_REQUEST['post_id'];
    
     
     switch ($ctgry)
     {
            case "Likers":
	  $q1="select like_userid as ct,user_id as u from post_status where post_id=$post_id and like_userid!=0 order by post_status_id desc";
	  $title="Liked By";
	  break;
            case "Raters":
	  $q1="select rating as ct,user_id as u from post_status where post_id=$post_id and rating!=0 order by post_status_id desc";
	  $title="Rated By";
	  break;
              case "Commenters":
	  $q1="select post_id as ct,commenter_useri_d as u  from post_comments where post_id=$post_id order by cmnt_id desc";
	  $title="Commented By";
	    break;
              case "Sharers":
	  $q1="select like_userid as ct from post_status where post_id=$post_id and rating!=0 order by post_status_id desc";
	  $title="Shared By";
	    break;
           
            default :
	    $q1="select like_userid as ct,user_id from post_status where post_id=$post_id";
	 $title="Liked By";
	  break;
           
            
     }
     
      if($ctgry!=="Sharers")
            {
	  $r1=  mysqli_query($dbc, $q1);
	  if($r1)
	  {
	         $n=0;
	         $m=0;
	         
                 $tot_cont=  mysqli_num_rows($r1);
	if($tot_cont==1)
	{
	       $plus="";
	       $tot_cont=2;
	}else
	{
	       $plus="+";
	}
             echo '      
                        <div class="TPPR_Ttl"></div>
                            <div class="TPPR_InnerTitle">
                                '.$title.' ('.($tot_cont-1).''.$plus.')
                            </div><div class="TPPR_InnerCont">
                            ';
	         if(mysqli_num_rows($r1)>0)
	         {
	            
	                while($row=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
	                {
		      $his_id=$row['u'];
		      $n=$n+1;
		      $m=$m+1;
		      $likers_id=$row['ct'];
$q3="select c_name as c from contacts where user_id=$user_id and cu_id=$his_id";
           $r3=mysqli_query($dbc,$q3);
           if($r3)
           {
               $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
               if(!empty($roi))
               {
                   
               $liker_name=$roi['c'];
               }else
               {
                   $q5="select first_name as f from basic where user_id=$his_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $liker_name=$ry['f'];
                       
                   }
               }
            }
            $q2="SELECT username as u from users where user_id=$his_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$likers_username=$row2['u'];
			}
			
			
			if($n>1)
			{
			 if($likers_id!=$pre)
			{
			       $m=$m+1;
			       if($m>10)
			       {
			          	  echo '   
				         <div class="show_more_dtes" style="display:none;">
                                <div class="RespPeopleName">
                                    <a href="../'.$likers_username.'" target="_blank" >'.$liker_name.'</a>
                                </div> </div>
                               ';    
			       }else
			       {
			             			  echo '   
                                <div class="RespPeopleName">
                                    <a href="../'.$likers_username.'" target="_blank" >'.$liker_name.'</a>
                                </div>
                               '; 
			       }

		      
			}   
			}
			else
			{
			     echo '   
                                <div class="RespPeopleName">
                                    <a href="../'.$likers_username.'" target="_blank" >'.$liker_name.'</a>
                                </div>
                               ';  
			}
              $pre=$likers_id;
			
	                
	                }
	                
	         }else
	         {
	                echo 'Empty';
	         }
	                
	  }else
	  {
	         echo 'not run';
	         echo mysqli_error($dbc);
	  }
	         echo ' 
	               </div>';
	          
            }else
            {
	  if($ctgry=="Sharers")
	  {
	  echo '
                            
                        <div class="TPPR_Ttl"></div>
                            <div class="TPPR_InnerTitle">
                                '.$title.' 
                            </div><div class="TPPR_InnerCont">
                            ';         
	         $q1="select share_id as sh,user_id as u from post_share where post_id=$post_id";
	         $r1=  mysqli_query($dbc, $q1);
	         if($r1)
	         {
	                if(mysqli_num_rows($r1))
	                {
		      while($row=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
		      {
		              $likers_id=$row['u'];
              $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$likers_id";
           $r3=mysqli_query($dbc,$q3);
           if($r3)
           {
               $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
               if(!empty($roi))
               {
                   
               $shared_name=$roi['c'];
               }else
               {
                   $q5="select first_name as f from basic where user_id=$likers_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $shared_name=$ry['f'];
                       
                   }
               }
            }
            $q2="SELECT username as u from users where user_id=$likers_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$shared_usernmae=$row2['u'];
			}
			
			$shared_userid=$row['u'];
			$share_id=$row['sh'];
			
			 
	           echo ' 
                                <div class="RespPeopleName">
                                   <b> <a href="../'.$shared_usernmae.'" target="_blank" >'.$shared_name.'</a></b> Shared with
                                </div>
                              
	               ';
			$q31="select shared_users as u from post_share_users where post_share_id=$share_id";
			
			$r31=  mysqli_query($dbc, $q31);
			if($r31)
			{
			       if(mysqli_num_rows($r31)>0)
			       {
			              while($rowsx=  mysqli_fetch_array($r31,MYSQLI_ASSOC))
			              {
				    $shared_with_user_id=$rowsx['u'];
	           $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$shared_with_user_id";
		 $r3=mysqli_query($dbc,$q3);
		 if($r3)
		 {
		     $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
		     if(!empty($roi))
		     {

		     $share_with_name=$roi['c'];
		     }else
		     {
		         $q5="select first_name as f from basic where user_id=$shared_with_user_id";
		         $r5=mysqli_query($dbc,$q5);
		         if($r5)
		         {
		             $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
		             $share_with_name=$ry['f'];

		         }
		     }
		  }
            $q2="SELECT username as u from users where user_id=$shared_with_user_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$share_with_user_name=$row2['u'];
			}
			
			
			
	           echo ' 
                                <div class="RespPeopleName">
                                    <a href="../'.$share_with_user_name.'" target="_blank" >'.$share_with_name.'</a>
                                </div>
                               
	               ';
			
			
			
			              }
			       }
			}
		      }
	                }
	         }
	       echo ' </div>
	               ';
	  }
            }
}