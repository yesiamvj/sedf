 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
     $ucnt=0;
                      $user_id=$_SESSION['user_id'];
                      require 'mysqli_connect.php';
                     $qs="select post_id as u from post_permision where user_id=$user_id order by post_id desc";
                             $rs=mysqli_query($dbc,$qs);
                             if($rs)
                             {
                                    
                                 if(mysqli_num_rows($rs)>0)
                                 {
                                     $n=0;
                                     while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
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
                           $q11="select rating as rt,user_id as u ,rate_time as rtm,r_seen as rs,post_status_id as ps from post_status where post_id=$post_id and rating!=0";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                               
                                if(mysqli_num_rows($r11)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
                                         $ucnt=$ucnt+1;
		       if($ucnt>=11)
		       {
		              break;
		       }
                                              $his_id=$row['u'];
		            $ps_id=$row['ps'];
                                              $myrate=$row['rt'];
                                              $rtime=$row['rtm'];
                                              $sen=$row['rs'];
                                              if($sen=="1")
                                              {
                                                  $stl="background-color:white";
                                              }  else {
                                                  $stl="background-color:whitesmoke;";
                                              }
                                         $qe="select c_name as c from contacts where user_id=$user_id and cu_id=$his_id";
                                         $re=mysqli_query($dbc,$qe);
                                         if($re)
                                         {
                                             if(mysqli_num_rows($re)>0)
                                             {
                                                 $rowp=mysqli_fetch_array($re,MYSQLI_ASSOC);
                                                 $c_nm=$rowp['c'];
                                             }  else {
                                             $q3="select first_name as f from basic where user_id=$his_id";
                                             $r3=mysqli_query($dbc,$q3);
                                             if($r3)
                                             {
                                                 $rw=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                                 $c_nm=$rw['f'];
                                             }
                                             }
                                         }
                                         
                                         echo'<div class="MNF_like_itm"  style="'.$sen.'">
                                <div class="MNF_Like_Itmin"  >
                                    
                                    <div class="Notif_Liker" onmouseover="expndNotfc(\'#img_postno'.$ucnt.'\',\'#cap_postno'.$ucnt.'\')" >
                                        '.$c_nm.' <div class="Notif_Just_Tip"> Rated '.$myrate.' stars </div>
                                        <div class="Notif_Rated_hold">
                                        ';
                                     for($nt=1;$nt<=$myrate;$nt++)
                                    {
                                       
                                       echo'<img id="sf-rateIcon" class="Notif_Gift_Rateimg"  src="icons/post-Qrated-'.$myrate.'.png" alt="'.$myrate.'"/></span>';
                                 
                                    }
                                   
                                         echo'</div>

                                        <div class="Notif_Time">
                                            <div class="Notif_Gft_Post_No">
                                                Post No '.$post_id.'
                                            </div>

                                            '.$rtime.'
                                        </div>
                                    </div>
                                    <div class="Notif_Post_CapPre" id="cap_postno'.$ucnt.'" style="" onmouseout="hideNotfc(\'#img_postno129\',\'#cap_postno'.$ucnt.'\');" >
                                       '.$p_cap.'
                                    </div>
                                </div>
                            </div>
                           ';
                                                        $qe="select user_id as u from post_status where post_id=$post_id";
                                             $re=mysqli_query($dbc,$qe);
                                             if($re)
                                             {
                                                 if(mysqli_num_rows($re)>0)
                                                 {
                                                     while($rto=mysqli_fetch_array($re,MYSQLI_ASSOC))
                                                     {
                                                         $his_id=$rto['u'];
                                                         $q="update post_status set r_seen=1 where post_id=$post_id and user_id=$his_id";
                                                         $r=mysqli_query($dbc,$q);
                                                     }
                                                 }
                                             }      
                                     }
                                 }
                             }
                             
                             }
                           
                                     }
                                 }
	                
	                if($ucnt>10)
	                {
		      echo '<div onclick="show_more_who_rate('.$ps_id.',this)">Show More </div>';
	                }
                             }
                            
                               
                      
   
  