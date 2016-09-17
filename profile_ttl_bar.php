<?php

  $user_id=$_SESSION['user_id'];
         require_once 'mysqli_connect.php'; 
          $q3="select first_name as f from basic where user_id=$user_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $f_name=$rt['f'];
	        }else
	        {
	               $f_name="some one";
	        }
	 }
	     $q="select update_pics as p from profile_pics where user_id=$user_id order by pic_id desc limit 1";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $ppics=$rpw['p'];
                              
                              
                          }  else {
                              if($sex=="girl")
                              {
                                  
                          $ppics="../web/icons/female.png"; 
                              }else
                              {
                                   $ppics="../web/icons/male.png";
                              }   
                          }
                      }
	     
	            $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$user_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	      $roed=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	      $theme=$roed['thm'];
	      $theme_txt_color=$roed['theme_txt_color'];
	 }else
	 {
	        $theme="#008b8b";
	        $theme_txt_color="#ffffff";
	        
	        
	 }
	  $_SESSION['theme_color']=$theme;
	        $_SESSION['txt_color']=$theme_txt_color;
	       
           }
           $_SESSION['theme_color']=$theme;
	        $_SESSION['txt_color']=$theme_txt_color;
	       $q="select lock_pass as lp,locked as lk from person_config where user_id=$user_id";
	       $r=  mysqli_query($dbc,$q);
	       if($r)
	       {
	              if(mysqli_num_rows($r)>0)
	              {
		    $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		    $password=$row['lp'];
		    $locked=$row['lk'];
	              }  else {
		$locked=0;    
	              }
	       }
echo '
                <div id="Topest">

                    <div id="title_bar">
                        <div class="primaryTtlBar" >
                            <font id="sedfedUserName" >
                               '.$f_name.'  
                            </font>
                            
                        </div>
                      
                      
                    
                         
                    </div>
                     <div class="secondaryNavTtlBar">
                         <a href="../web/show_rels_of_pers.php?user='.$user_id.'"><div class="secNavToolItm">
                             Relations
                         </div></a>
	        
                         <a href="../web/people_post.php?user='.$user_id.'"><div class="secNavToolItm" onclick="show_his_post('.$user_id.')">
                             Posts
                         </div></a>
                         <a href="storage.php"><div class="secNavToolItm">
                             Storage
                         </div></a>
                         <a href="photos.php"><div class="secNavToolItm">
                             Photos
                         </div></a>
                         <a href="videos.php"><div class="secNavToolItm">
                             Videos
                         </div></a>
	        <a href="files.php"><div class="secNavToolItm">
                             Files
                         </div></a>
                         <a href="wall.php?user='.$user_id.'"><div class="secNavToolItm">
                             Wishes
                         </div></a>
	         <a href="blog.php?username='.$user_name.'"><div class="secNavToolItm">
                             Blog
                         </div></a>
                         
                        
                    </div>
                    </div>
                    <div class="SedFed_Primary_Detail">
                          <div class="SFTtl_userIdText" style="display: none;" >
                              SedFed ID 
                          </div>
                          <div id="SF_UserAddrsBarDets" style="display: none;" >
                              <div class="SF_UADBD_Itm">
                                  sedfed.com/'.$user_name.'
                              </div>
                              <div class="SF_UADBD_Itm">
                                  sedfed.com/'.$user_id.'
                              </div>
                          </div>
                          <div class="SF_UserId" title="Click for Details" onclick="$(\'#SF_UserAddrsBarDets\').slideToggle()" onmouseover="$(\'.SFTtl_userIdText\').show();" onmouseout="$(\'.SFTtl_userIdText\').hide();" >  
                              '.$user_id.'
                          </div>
                      </div>

                </div>
                
';