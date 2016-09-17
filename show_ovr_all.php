 <?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {              $user_id=$_SESSION['user_id'];
   
				$today = date("g:i a ,F j, Y"); 
                      require 'mysqli_connect.php';
                
                             $q="select post_id as u from post_permision where user_id=$user_id";
                             $r=mysqli_query($dbc,$q);
                             if($r)
                             {
                                    
                                 if(mysqli_num_rows($r)>0)
                                 {
                                     
                                     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                                     {
                                         $post_id=$row['u'];
                                        $cmt=0;
                                        $shr=0;
                                        $dwn=0;
                                          $lc=0;
                                     $uc=0;
                                     $rt=0;
                              
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
                           $q11="select like_userid as lk ,unlike_userid as un,rating as rt from post_status where post_id=$post_id";
                             $r11=mysqli_query($dbc,$q11);
                             if($r11)
                             {
                                 if(mysqli_num_rows($r11)>0)
                                 {
                                     while($row=mysqli_fetch_array($r11,MYSQLI_ASSOC))
                                     {
                                         $lkc=$row['lk'];
                                        
                                         $ukc=$row['un'];
                                         $rkt=$row['rt'];
                                         if($lkc!=0)
                                         {
                                             $lc=$lc+1;
                                         } 
                                         if($ukc!=0)
                                         {
                                             $uc=$uc+1;
                                         }
                                         if($rkt!=0)
                                         {
                                            $rt=$rt+1;
                                         }
                                     }
                                 }  else {
                                    
                                 }
                             }
                                         $q2="select cmnt_id from post_comments where post_id=$post_id";
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
                                         $q3="select user_id  from post_download where post_id=$post_id";
                                         $r3=mysqli_query($dbc,$q3);
                                         if($r3)
                                         {
                                             if(mysqli_num_rows($r3)>0)
                                             {
                                                 
                                                 while($rops=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                 {
                                                     $dwn=$dwn+1;
                                                 }
                                             }
                                         }
                                         $q4="select user_id from post_share where post_id=$post_id";
                                         $r4=mysqli_query($dbc,$q4);
                                         if($r4)
                                         {
                                             if(mysqli_num_rows($r4)>0)
                                             {
                                                 
                                                 while($rops=mysqli_fetch_array($r4,MYSQLI_ASSOC))
                                                 {
                                                     $shr=$shr+1;
                                                 }
                                             }
                                         }
                                            
                                         
                                         
                                         echo'<div class="MNF_OA_itmOut" style="border-bottom:1px solid lightgrey;">
                                <div class="MNF_OA_itmIn">
                                    
                                    <div class="MNF_OA_Time"><div class="MNF_OA_postno">Post No '.$post_id.'</div> '.$today.'</div>
                                    <div class="MNF_OA_post_resps">
                                         
                                        <div class="MNF_OA_respitm">
                                            <img class="img-MNF_OA_PR" src="icons/post-preview-like.png"/>
                                            <div class="MNF_OA_respCount">
                                                '.$lc.'
                                            </div>
                                        </div>
                                        <div class="MNF_OA_respitm">
                                             <img class="img-MNF_OA_PR_Unl" src="icons/post-sf-unliked.png" />
                                             <div class="MNF_OA_respCount">
                                                '.$uc.'
                                            </div>
                                        </div>
                                        <div class="MNF_OA_respitm">
                                            <img class="img-MNF_OA_PR_rte" src="icons/post-Qrated-3.png" />
                                            <div class="MNF_OA_respCount">
                                                '.$rt.'
                                            </div>
                                        </div>
                                        <div class="MNF_OA_respitm">
                                            <img class="img-MNF_OA_PR" src="icons/post-sf-comment.png" />
                                            <div class="MNF_OA_respCount">
                                                '.$cmt.'
                                            </div>
                                        </div>

                                        <div class="MNF_OA_respitm">
                                            <img class="img-MNF_OA_PR" src="icons/post-media-download.png" />
                                            <div class="MNF_OA_respCount">
                                                '.$dwn.'
                                            </div>
                                        </div>
                                        <div class="MNF_OA_respitm">
                                            <img class="img-MNF_OA_PR_rte" src="icons/post-sf-share.png" />
                                            <div class="MNF_OA_respCount">
                                                '.$shr.'
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