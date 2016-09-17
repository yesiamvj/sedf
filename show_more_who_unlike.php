 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
                      require 'mysqli_connect.php';
	     $last_id=$_REQUEST['last_id'];
                     $qs="select post_id as u from post_permision where user_id=$user_id";
                             $rs=mysqli_query($dbc,$qs);
                             if($rs)
                             {
                                    
                                 if(mysqli_num_rows($rs)>0)
                                 {
                                     $n=0;
                                     while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
                                     {
                                        
                                         $post_id=$row['u'];
                                             $qe="select user_id as u ,post_status_id as psid,from post_status where post_id=$post_id and post_status_id between 1 and $last_id";
                                             $re=mysqli_query($dbc,$qe);
                                             if($re)
                                             {
                                                 if(mysqli_num_rows($re)>0)
                                                 {
                                                     while($rto=mysqli_fetch_array($re,MYSQLI_ASSOC))
                                                     {
			         
                                                         $his_id=$rto['u'];
			      $post_status_id=$row['psid'];
			      if($his_id>=0)
			      {
			             $n=$n+1;
			             if($n>=11)
			             {
				   break;
			             }
			                 $q3="select post_caption as p from postforall where post_id=$post_id";
                                         $r3=mysqli_query($dbc,$q3);
                                         if($r3)
                                         {
                                             if(mysqli_num_rows($r3)>0)
                                             {
                                                 $rowd=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                                 $p_cap=$rowd['p'];
                                             }
                                         }
                           $q11="select unlike_userid from post_status where post_id=$post_id and unlike_userid!=0";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                                 $ucnt=0;
                                if(mysqli_num_rows($r11)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
                                         $ucnt=$ucnt+1;
                                              
                                     }
                                 }
                             }
                             
                             if($ucnt>0)
                             {
                                   echo'<div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                              
                              <div class="Notif_Liker" onmouseover="expndNotfc(\'#img_postno'.$n.'\',\'#cap_postno'.$n.'\')" >
                                  '.$ucnt.' <div class="Notif_Just_Tip"> People Unikes your post</div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No">
                                          Post No '.$post_id.'
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="Notif_Post_CapPre" id="cap_postno'.$n.'" style="display: none;" onmouseout="hideNotfc(\'#img_postno'.$n.'\',\'#cap_postno124\');" >
                                  '.$p_cap.'
                              </div>
                          </div>
                      </div>
                      ';
                             }
			      }
                                                         $q="update post_status set u_seen=1 where post_id=$post_id and user_id=$his_id";
                                                         $r=mysqli_query($dbc,$q);
                                                     }
                                                 }
                                             }
                                     
                           
                                     }
                                     
                                 
                                 }
                                 
                                 if($n>=10)
	                {
		      echo '<div onclick="show_more_who_unlike('.$post_status_id.',this)">Show More</div>';
	                }
                                 
                                    
                             }
                            
                               
                      
   }?>