 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
                      require 'mysqli_connect.php';
                     $q="select post_id as u from post_permision where user_id=$user_id";
                             $r=mysqli_query($dbc,$q);
                             if($r)
                             {
                                 if(mysqli_num_rows($r)>0)
                                 {
                                     $n=0;
                                     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                     {
                                       
                                         $post_id=$row['u'];
                                         
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
                           $q11="select post_status_id as psid,like_userid as lk ,unlike_userid as un,like_time as t,rating as rt from post_status where post_id=$post_id and like_userid!=0 order by post_status_id desc limit 25";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                                 
                                 if(mysqli_num_rows($r11)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
		            $n=$n+1;
                                         $lkc=$row['lk'];
                                         $ltime=$row['t'];
		       if($n>=11)
		       {
		              break;
		       }
                                         $pst_sts_id=$row['psid'];
                                         
                                 $qw="update post_status set l_seen=1 where user_id=$lkc";
                                 $rw=mysqli_query($dbc,$qw);
                                        
                                         $qe="select c_name as c from contacts where user_id=$user_id and cu_id=$lkc";
                                         $re=mysqli_query($dbc,$qe);
                                         if($re)
                                         {
                                             if(mysqli_num_rows($re)>0)
                                             {
                                                 $rowp=mysqli_fetch_array($re,MYSQLI_ASSOC);
                                                 $c_nm=$rowp['c'];
                                             }  else {
                                             $q3="select first_name as f from basic where user_id=$lkc";
                                             $r3=mysqli_query($dbc,$q3);
                                             if($r3)
                                             {
                                                 $rw=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                                 $c_nm=$rw['f'];
                                             }
                                             }
                                         }
                                         
                                         echo'<div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                              
                              <div class="Notif_Liker" onmouseover="expndNotfc(\'#img_postno'.$n.'\',\'#cap_postno'.$n.'\')" >
                                  '.$c_nm.' <div class="Notif_Just_Tip">Likes your post</div>
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
                                 }  else {
                                     
                                 }
                             }
                                     }
                                 }
                                 if($n>10)
	                {
		      echo '<div style="cursor;pointer;text-align:center;" onclick="show_more_who_likes('.$pst_sts_id.',this)">Show More</div>';
	                }
                                 
                             }
                            
                               
                      
   }