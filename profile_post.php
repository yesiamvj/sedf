  <?php session_commit(); 
  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else
{
       function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
      
	//return destination file url
	return $destination_url;
}

$people_userid=$owner_id;
  $users_name=$_SESSION['user_name'];
     $iam_seen_post=0;
        echo '
    
    <link rel="stylesheet" href="'.$_SESSION['css'].'thePost.css"/> 
   
      <link rel="stylesheet" href="../web/'.$_SESSION['css'].'theBigThate.css"/> 
   
    
    <script src="../web/thePost.js" type="text/javascript"></script>';
        
        
        
        $user_id=$_SESSION['user_id'];
       
 $p_pic='../'.$people_userid.'/ppic10.jpg';

           $q2="SELECT username as u from users where user_id=$people_userid";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{
				$row2=mysqli_fetch_array($r2,MYSQLI_ASSOC);
				$ppl_username=$row2['u'];
			}            

        echo '<div id="content-full">
           
            <div class="PagePinnedTtl" id="PagePinnerTitle" >
                <div id="pagepinnerid"></div>
                <div class="closePinnedTab" onclick="$(\'#PagePinnerTitle\').slideUp()" >X</div>
            </div>
            <div id="trgt_div"></div>
            <div class="TheWhatsUp" >
              <div class="whatsUpWelcomer">
                    <div class="WUW_wallPic" style="background-image: url(\'../'.$ppl_username.'/wpic50.jpg\');" >
                        <img class="WUW_ProfPic" src="'.$p_pic.'" /> 
                            <div class="WUW_signature"> $'.$users_name.'
                            </div>
                    </div>
                  
                </div>';
       
       
			$prof_pic='../'.$ppl_username.'/ppic25.jpg';
                        $q2="SELECT first_name as fn,nick_name as nck,age as ag,nativeplace as np,sex as s from basic where user_id=$people_userid";
							$r2=mysqli_query($dbc,$q2);
							if($r2)
							{
								if(mysqli_num_rows($r2)>0)
								{
                                                                    $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                                                                    $first_name=$row['fn'];
								}
							}
        echo '
            <div id="TheWhatsUpAuditoriu" style="display:none;"><div id="post_contents"></div></div>
                <div class="ThePostSafetyLayerForResponders" onmouseover="hidePostResponders()" ></div>
                <div class="TheWhatsUpCenterCont">
                    <!-- post loop starts-->
                    <div class="ThePostHolder" id="newPostOnTL"   >
                        
                        <div class="ThePostArrow"></div>
                        
                        <div class="ThePostToppper">
                           <div class="ThePostOwner">
                            <div class="PosterProfPic">
                                <img src="'.$prof_pic.'" class="img_PosterFace" alt=""/>
                            </div>
                            <div class="PosterName">
                                <a href="../'.$ppl_username.'" class="PosterUserLink" >  '.$first_name.'</a> 
                               <div class="PosterSignature" title="User ID : '.$user_id.'" > <a href="http://www.sedfed.com/'.$ppl_username.'"> <span class="sf_TmDoller" >$</span>'.$ppl_username.'</a></div> 
                               
                            </div>
                           
                            
                        </div>
                      
                        
                        </div>
                       
                    </div>
                   ';
         function allpost($cap_text_clr,$cap_back_clr,$shared_uid,$commented_uid,$rated_uid,$uliked_uid,$liked_uid,$shared_fname,$commenter_fname,$uliked_fnam,$rated_fname,$liked_fname,$rate_cnt,$pers_unlike,$pers_like,$tot_unlikes,$tot_likes,$btm_meme,$top_meme,$thum_nails,$tot_files,$post_pdfs,$post_audios,$post_videos,$post_files,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt)
        {
               echo '<div class="a_complete_post" id="a_full_post'.$post_id.'"> <div id="fornextpost'.$cnt.'"></div>
                          <div class="ThePostExtraBench" id="TPEB_'.$cnt.'" style="display: none;">
                        
                        <div class="TPEB_Itm" onclick="checkPrevPostExisting'.$prev_postid.'()">
                            <div class="prevDriver" title="Show previous post" ></div>
                        </div>
                        <div class="TPEB_Itm" title="Float" onclick="pinItOnTop('.$post_id.')" >
                            <img src="../web/icons/pExt/cloud.png" />
                            <input type="hidden" id="Post_Cloud_'.$post_id.'" value="'.$post_id.'" />
                        </div>
                        <div class="TPEB_Itm" title="Add to favourites" onclick="add_to_post_fav('.$post_id.')">
                            <img src="../web/icons/pExt/fav.png" />
                        </div>
                        <div class="TPEB_Itm" title="Report This Post" onclick="report_this_post('.$post_id.')">
                            <img src="../web/icons/pExt/report.png"  />
                        </div>
                        <div class="TPEB_Itm"  onclick="checkNextPostExisting'.$next_postid.'()">
                            <div class="nextDriver" title="Show next post"></div>
                        </div>
	      <div id="thispostid'.$post_id.'" style="font-size:0px;" >printed</div>
                           <script>
                                            function checkNextPostExisting'.$next_postid.'(){
                                           
                                        if($(\'#thispostid'.$next_postid.'\').html()==="printed"){
                                             window.location.assign(\'#thispostid'.$next_postid.'\');
                                            }
                                                else{
                                               
                                                    nextpost(0,'.$cnt.','.$next_postid.',\'#fornextpost'.$cnt.'\','.$tot_num_post.');
                                            }

                                        }
                                            function checkPrevPostExisting'.$prev_postid.'(){
                                        if($(\'#thispostid'.$prev_postid.'\').html()==="printed"){
                                             window.location.assign(\'#thispostid'.$prev_postid.'\');
                                            }
                                                else{
                                                
                                                    nextpost(1,'.$cnt.','.$prev_postid.',\'#for_my_prevpost'.$cnt.'\','.$tot_num_post.');
                                            }

                                        }
                                        </script>
                    </div>';
               if($shared_name!==0 )
               {
	     echo '	     <div class="ThePostSharedBy">
                        <div class="ThePostSharerName">
                            <a href="../'.$shared_user_name.'">'.$shared_name.'</a> <span class="TPShare_Desc">Shared this post</span>
                            <span class="TPShare_Time">@ '.$shared_time.' </span>
                        </div>
                    </div>';
               }

	            echo '
                    <div class="ThePostHolder" id="ThisPostId_'.$post_id.'" onmouseover="showPostRespPane('.$cnt.');see_this_pos('.$post_id.')"  >
                        
                        <div class="ThePostArrow"></div>
                        <div class="ThePostExtra" onclick="$(\'#TPEB_'.$cnt.'\').slideToggle();" >
                            <span class="TPE_Dots">.</span>
                            <span class="TPE_Dots">.</span>
                            <span class="TPE_Dots">.</span>
                        </div>
                        <div class="ThePostToppper">
                           <div class="ThePostOwner">
                            <div class="PosterProfPic">
                                <img src="'.$p_pic.'" class="img_PosterFace" alt=""/>
                            </div>
	           ';
               if($officiale==1)
               {
	     
	            
	     echo '<div class="PosterName">
                                <a href="../'.$poster_user_name.'" class="PosterUserLink" >  '.$poster_name.' </a> 
		     ';
	           echo ' <div class="OfficialCaption">
                                    '.  ($post_feel).'
                                </div>'; 
	     echo '
		      
                            </div>
                           ';
	     
               }else
               {
	     if($page_id!=="0")
	     {
	            $poster_name=$page_name;
	            $poster_user_name=$page_name;
	            
	     }
	 echo '             <div class="PosterName">
                                <a href="../'.$poster_user_name.'" class="PosterUserLink" >  '.$poster_name.' </a> ';
	               if(!empty($post_feel))
	               {
		     if($officiale===1)
		     {
		            echo ' <div class="OfficialCaption">
                                    '.  ($post_feel).'
                                </div>';
		           
		     }else
		     {
		             echo ' <span class="PosterFeeling"><font color="grey">'. ($post_feel).'</font> <span class="postFeelType"> while posting </span> </span>
                               ';  
		     }
		  
	               }
	               if(!empty($post_feel) && !empty($post_feelwhile))
	               {
		echo '<span class="PF_and">&</span> 
		        <span class="PosterFeeling"> '.($post_feelwhile).'<span class="postFeelType"> by posting </span> </span>
                               
                                '; 
		
	               }elseif (!empty ($post_feelwhile)) {
	           echo '    <span class="PosterFeeling">'.htmlentities($post_feelwhile).' <span class="postFeelType">  ';
	           if($officiale!==1)
	           {
		 echo 'by posting 
                               '; 
	           }
		
	    }
	    $at="";
	    if($officiale==1)
	    {
	           $at="";
	    }else
	    {
	           if(!empty($post_loc))
	           {
		$at="at"; 
	           }
	           
	    }
                                echo '</span> </span><span class="PF_and">'.$at.'</span>
                                <span class="PosterLocation">
                                    <a href="https://www.google.com/search?q='. htmlentities($post_loc).'" target="_blank" > '.  htmlentities($post_loc).' </a> 
                                </span>
                                <div class="PostedWith">
                                    ';
		  if(count($with_ppl_name)>0)
		  {
		           echo'<span class="PF_and">with</span>';
		
		   for($t=1;$t<=count($with_ppl_name);$t++)
		  {
		         echo '<div class="PWI_name">
		        <a href="../'.$with_ppl_user_name[$t].'">'.$with_ppl_name[$t].'</a> 
		    </div>';
		         if($t>4)
		         {
		                $mean=count($with_ppl_name)-$t;
		                echo '
                                   <div class="PWI_more">+ '.$mean.'</div>';
		                break;
		         }
                                   
		  }
		   
		  }
		 
		 echo '
                                    
                                </div>
                               
                            </div>
                           
                            ';
	     
               }
               
              	 echo '
                        </div>
                        <div class="ThePostDetails">
                            <div class="PosterTime">
                                <div class="PosterSignature" title="User ID : '.$poster_id.'" > <a href="../'.$poster_user_name.'"> <span class="sf_TmDoller" >$</span>'.$poster_user_name.'</a></div> 
                                <div class="ThePostId">'.$post_id.'</div> @  '.$post_time.'
                            </div>
                        </div>';
	 if(strlen($post_caption)>0)
	 {
	      echo ' <div class="ThePostCaption" style="background-color:'.$cap_back_clr.';color:'.$cap_text_clr.';">';  
	      if($officiale!=1)
	 {
	        require_once 'libraryht/HTMLPurifier.auto.php';
$dirty_html=$post_caption;
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$config->set('HTML.Allowed', 'p,i,b,a,div,span,font,li,ul,hr,br,sup,sub,table,td,tr,h1,h2,h3,h4,h5,h6');
$config->set('HTML.AllowedAttributes', "*.style");
$config->set('CSS.AllowedProperties', 'text-align,text-decoration,width,height,color,background-color,padding,margin,font-family,font-size');
$clean_html = $purifier->purify($dirty_html);

	       echo $clean_html;

	 }else
	 {
	        if($post_caption!=="")
	        {
	        echo '  <div class="OfficialPostCaption"> 
                                  '.$post_caption.' 
                                </div>';       
	        }else
	        {
	              echo '  <div class="ThePostCaption"> 
                                  '.$post_caption.' 
                                </div>';    
	        }
	               
	        
	 }
                           
                  
	 echo ' </div>';
	 
	 }
                       
	        echo '
                        </div>
                        ';
	        
	        
	        //media
	        if(count($post_videos)>0)
	        {
	             $media_click='onclick="//showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\','.$tot_num_post.')"'; 
	        }else
	        {
	               $media_click="";
	        }
	     
	        echo '
                        <div class="ThePostMediaHolder" '.$media_click.' id="post_media'.$post_id.'" onclick="$(\'#TheWhatsUpAuditorium\').fadeIn();$(\'#post_contents\').html($(\'#a_full_post'.$post_id.'\').clone()).fadeIn();$(\'#audi_tools'.$post_id.'\').fadeIn();$(\'#theaterActTools'.$post_id.'\').fadeIn();" >';
	        if(count($post_images)==1)
	        {
	               echo ''.$top_meme.'';
	               echo ' <img src="'.$post_images[1].'" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\')" class="img_ThePost" />';
	               echo ''.$btm_meme.'';
	               }
	        if(count($post_images)==2)
	        {
	               echo '  <div class="doubleImgeHolder"   onclick="$(\'#wch_clkd\').val(2);">
                                <div class="TPMH_DIH_First" style="background-image: url(\''.$post_images[1].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                <div class="TPMH_DIH_First" style="background-image: url(\''.$post_images[2].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'2\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                               
                            </div>
                            ';
	        }
	        if(count($post_images)==3)
	        {
	              echo  '      <div class="tripleImgeHolder" onclick="$(\'#wch_clkd\').val(3);" >
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[1].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                <div class="TPMH_TIH_Holder">
                                    <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[2].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'2\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[3].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'3\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                </div>
                                
                               
                            </div>';
	        }
	        if(count($post_images)>=4 )
	        {
	               echo '     <div class="fourseImgeHolder"  onclick="$(\'#wch_clkd\').val(4);" >
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[1].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                <div class="TPMH_TIH_Thrice_Holder">
                                    <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[2].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'2\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[3].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'3\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[4].'\')" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'4\',\''.$next_postid.'\','.$tot_num_post.')" ></div>
                                </div>
                                
                               <div onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\')" class="ThePostMediaMoreImage" >show all '.  count($post_images).' images</div>
                            </div>';
	        }
	        if(count($post_images)==0)
	        {
	               if(count($post_videos)>0)
	               {
		     if(strlen($thum_nails[0])>1)
		     {
		            $thum_nail=$thum_nails[0];
		     }  else {
		     $thum_nail="";       
		     }
		     echo '<video src="'.$post_videos[1].'" preload="none" onclick="showBigScreen(\''.$post_id.'\',\''.count($post_images).'\',\'1\',\''.$next_postid.'\','.$tot_num_post.')" class="img_ThePost" controls poster="'.$thum_nail.'" /></video>';
	               }
	        }
	       
	        if(count($post_images==0) && count($post_videos==0))
	        {
	               if(count($post_audios)>0)
	               {
		echo '<audio src="'.$post_audios[1].'"  preload="none" controls/></audio>';     
	               }
	               
	        }
	        if(count($post_images)==0 &&  count($post_videos)==0)
	        {
	               
	               
	        }
	
	          if(count($post_pdfs)>0 || count($post_files)>0)
	               {
		if(count($post_pdfs)==1 )
		   {
		     $name=strpos($post_pdfs[1],"postpdfs/")+15;
	               $pdf_name=substr($post_pdfs[1],$name,  strlen($post_pdfs[1]));
	               $file="PDF";
	                     
		   }
		  
		   if( count($post_files)>0)
		   {
		          $download=$post_files[1];
		      $name=strpos($post_files[1],"postfiles/")+15;
	               $pdf_name=substr($post_files[1],$name,  strlen($post_files[1]));
	                       $file="File";  
		      if(count($post_pdfs)>1)
		            {
			 $hint="+ $mean files";  
		            }else
		            {
			 $hint=""; 
		            }
		      
		   }
		    
		     if(count($post_pdfs)>0)
		     {
		            $download=$post_pdfs[1];
		            $mean=(count($post_pdfs)+count($post_files))-1;
		            if(count($post_pdfs)>1)
		            {
			 $hint="+ $mean files";  
		            }else
		            {
			 $hint=""; 
		            }
		           
		     }else
		     {
		            
		     }
		     echo ' <div class="ThePostPdfFileNameHolder" >
                                <div class="TP_PDF_Logo">
                                 '.$file.'
                                </div>
                                <div class="TP_PDF_Dets">
                                    <div class="TP_PDF_Name">
                                     '.htmlentities($pdf_name).'  '.$hint.'
                                    </div>
                                    <div class="TP_PDF_size">
                                       <a href="'.htmlentities($post_files[1]).'" target="_blank"><div class="TP_PDF_Preview">Preview</div></a> <a href="'.htmlentities($download).'" download="'.htmlentities($download).'"><div class="TP_PDF_download">Download</div></a>
                                    </div>
                                </div>
                                
                                
                            </div>';
	               }
	     
	        
	echo '<input type="hidden" value="" id="wch_clkd"/>';               
                       echo ' </div>
                        <div class="ThePostStatusHolder">
                            ';
	      echo '<div class="TPSH_Itm">';
	  if($likeres==1)
                        {
	         
                        if($mylike==1)
                        {

                            echo '<img class="ico_PostResp" onclick="Likedone(1,\'#like'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.($pers_like-1).')"   id="like_1_icon_'.$cnt.'" src="../web/icons/post-sf-liked.png" style="display:none;" alt="like"/> ';
                           echo '<img class="ico_PostResp" onclick="Likedone(1,\'#like'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.($pers_like-1).')"  id="like_2_icon_'.$cnt.'" src="../web/icons/post-sf-liked.png" alt="like"/><span class="pers_like'.$cnt.'" id="mainLikecnt_'.$cnt.'" >'.$pers_like.'</span> ';
                           
                        }else
                        {
                        echo '<img class="ico_PostResp" onclick="Likedone(1,\'#like'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.$pers_like.')"  id="like_1_icon_'.$cnt.'" src="../web/icons/post-sf-like.png" alt="like"/> ';
	       echo '<img class="ico_PostResp" onclick="Likedone(1,\'#like'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.$pers_like.')"  id="like_2_icon_'.$cnt.'" src="../web/icons/post-sf-liked.png" style="display:none;" alt="like"/> <span class="pers_like'.$cnt.'" id="mainLikecnt_'.$cnt.'">'.$pers_like.'</span>  ';

                        }
                        }
	       echo '<input type="hidden" id="my_like_cnt'.$cnt.'" value="'.$mylike.'" />';
	       echo '</div>';
	       echo '<div class="TPSH_Itm">';
                        if($unlikeres==1)
                        {

                        if($myunlike==1)
                        {
                            
                            echo' <img class="ico_PostResp" onclick="Likedone(0,\'#unlike'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.($pers_unlike-1).')"  id="un_1_like'.$cnt.'" src="../web/icons/post-sf-unliked.png" style="display:none;" alt="Unlike"/>';
                             echo' <img class="ico_PostResp" onclick="Likedone(0,\'#unlike'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.($pers_unlike-1).')"  id="un_2_like'.$cnt.'" src="../web/icons/post-sf-unliked.png" alt="Unlike"/>&nbsp;&nbsp;<span class="pers_unlike'.$cnt.'" id="mainunLikecnt_'.$cnt.'">'.$pers_unlike.'</span> ';
                            
                        }else
                        {
                            
                            echo' <img class="ico_PostResp" onclick="Likedone(0,\'#unlike'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.$pers_unlike.')"  id="un_1_like'.$cnt.'" src="../web/icons/post-sf-unlike.png"  alt="Unlike"/>
                            ';echo' <img class="ico_PostResp" onclick="Likedone(0,\'#unlike'.$cnt.'\','.$post_id.','.$cnt.',2,this,'.$pers_unlike.')" id="un_2_like'.$cnt.'" src="../web/icons/post-sf-unliked.png" style="display:none;" alt="Unlike"/><span class="pers_unlike'.$cnt.'" id="mainunLikecnt_'.$cnt.'">'.$pers_unlike.'</span> 
                            ';
	           
                        }
                        } 
	       echo '<input type="hidden" value="'.$myunlike.'" id="my_unlike_cnt'.$cnt.'" />';
	       echo '</div>';
                        if($rateres==1)
                        {
                            if($myrate==0)
                        {

                           echo'                        <div class="TPSH_Itm">
                                 <input type="hidden" id="my_rate_cnt'.$cnt.'" value="'.count($rated_uid).'"  />
                                <img onclick="postRated(1,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated1" class="TP_rateIcons"  src="../web/icons/post-sf-emptyRate.png" alt="rate1"/>
                                <img onclick="postRated(2,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated2"  class="TP_rateIcons" src="../web/icons/post-sf-emptyRate.png" alt="rate2"/>
                                <img onclick="postRated(3,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated3"   class="TP_rateIcons" src="../web/icons/post-sf-emptyRate.png" alt="rate3"/>
                                <img onclick="postRated(4,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated4"  class="TP_rateIcons" src="../web/icons/post-sf-emptyRate.png" alt="rate4"/>
                                <img onclick="postRated(5,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated5"  class="TP_rateIcons" src="../web/icons/post-sf-emptyRate.png" alt="rate5"/>
                   
                            </div>
                        ';
                        }else
                        {
                            $rate_cnts=count($rated_uid)-1;
                                        echo'<div class="TPSH_Itm"> <input type="hidden" id="my_rate_cnt'.$cnt.'" value="'.$rate_cnts.'"  />';
                              for($nt=1;$nt<=$myrate;$nt++)
                                    {
                                        
                                       echo'<img class="TP_rateIcons" onclick="postRated('.$nt.',this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated'.$nt.'" src="../web/icons/post-Qrated-'.$myrate.'.png" alt="'.$myrate.'"/></span>';
                                 
                                    }
                                    for($nt=$myrate+1;$nt<=5;$nt++)
                                    {

                                        echo'<img class="TP_rateIcons" onclick="postRated('.$nt.',this.id,'.$post_id.','.$cnt.')"   id="'.$cnt.'rated'.$nt.'" src="../web/icons/post-sf-emptyRate.png" alt="'.$myrate.'"/>';
                                    }
                                    echo'</div>';
                        }
                        }
                        
	       if($officiale==0)
	       {
	        if($cmntres==1)
	        {
	               
	 echo '    <div class="TPSH_Itm" onclick="ViewComment(\'#commentContentFull'.$cnt.'\','.$cnt.','.$post_id.')" >
                                <img src="../web/icons/postSts/comments_2.png" />
                            </div>';
	        }
	       }else
	       {
	        
	 echo '         
                            <div class="TPSH_Itm" onclick="ViewComment(\'#commentContentFull'.$cnt.'\','.$cnt.','.$post_id.')" >
                                <img src="../web/icons/postSts/comments_2.png" />
                            </div>';      
	       }
	       if($officiale==0)
	       {
	              if($dwnres==1)
	              {
		         echo '
                            <div class="TPSH_Itm" onclick="downloadpost('.$cnt.','.$post_id.')">
                                <img src="../web/icons/post-media-download.png" />
                            </div>';
	              }
	       }else
	       {
	                       echo '
                            <div class="TPSH_Itm" onclick="downloadpost('.$cnt.','.$post_id.')">
                                <img src="../web/icons/post-media-download.png" />
                            </div>';
	       }
	if($officiale==0)
	{
	       if($shareres==1)
	       {
	               echo '
                            <div class="TPSH_Itm" onclick="share_thispost('.$post_id.','.$cnt.')" >
                                <img src="../web/icons/post-sf-share.png" />
                            </div>';
	       }
	}else
	{
	         echo '
                            <div class="TPSH_Itm" onclick="share_thispost('.$post_id.','.$cnt.')" >
                                <img src="../web/icons/post-sf-share.png" />
                            </div>';
	}
	       
	
	 echo '
	           <div id="load_share_window">
	           <div id="for_share_widow" ></div>
                         </div>
	                 <input type="hidden" id="tot_cmnt_smiley'.$tot_cnt.'" value="1"/>
                        <div id="commentContentFull'.$cnt.'" class="commentContentFull">
	              <div class="newCommentHolder">
                            <span class="commentTitle" id="commentTitle'.$cnt.'" title="Click to view All Comments" onclick="viewprecmnt(\'#previousComments'.$tot_cnt.'\','.$post_id.','.$tot_cnt.')">Comments &nbsp;&nbsp;&nbsp;<img style="width: 10px;height:10px;" src="../web/icons/expnd-dwn.png" alt="down"/></span><span style="display:none" id="refresh_cmnt'.$cnt.'" onclick="refresh_cmnt('.$post_id.',\'#previousComments'.$tot_cnt.'\',\''.$tot_cnt.'\')">New</span>
                                <form method="post">
                                    <input id="'.$tot_cnt.'sf-commentInput" class="sf-commentInput" type="text" placeholder="What do you think?" />
                                    <div class="cmntAdders" style="display: inline-block;">
                                        <input type="color" class="colorComment" id="'.$cnt.'colorComment" onchange="colortyped(\'#'.$cnt.'colorComment\',\'#sf-commentInput'.$cnt.'\')"/>
                                    <input type="button" onmouseover="mouseOnColorCmnt(1)" onmouseout="mouseOutColorCmnt(1)" onclick="$(\'#'.$cnt.'colorComment\').click();"  class="colorCmntIcon" id="colorCmntIcon" value="A"/>
                                    <input type="file" name="uploadme'.$cnt.'" onchange="uploadcomment('.$post_id.',0,0,'.$tot_cnt.')"  class="attachCmnt" id="attachCmnt'.$tot_cnt.'" style="display:none" />
                                    
                                     <div class="forCmntTtArrowUtil" id="forCmntTtArrowUtil"></div>
                                    <div class="toolTipCmntUtils" id="toolTipCmntUtils">Add a color to your comment</div>
                                    
                                    </div>
                                     <div class="for_cmnt_smiley" style="display:none;" id="for_show_smiley'.$tot_cnt.'"></div>
                                   
                                    <div class="forCommentAdds" id="forCommentAdds'.$tot_cnt.'">
                                        <ol>
                                            <li ><img onclick="show_smileys(\''.$tot_cnt.'\',\''.$post_id.'\',\'#for_show_smiley'.$tot_cnt.'\')" onmouseover="mouseOnCmntAttch(1)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="../web/icons/test-smiley.png" alt="smiley"/></li>
                                            <li><img onclick="$(\'#attachCmnt'.$cnt.'\').click();" onmouseover="mouseOnCmntAttch(2)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="../web/icons/test-atch.png" alt="smiley"/></li>
                                        </ol>
                                   <div class="forCmntArrow" id="forCmntArrow"></div>
                                        <div class="forCmntTtArrow" id="forCmntTtArrow"></div>
                                        <div class="toolTipCmntAdd" id="toolTipCmntAdd"> Add an Attachment</div>
                                      </div>
                                    
                                    <div style="display: inline">
                                    <input onmouseover="mouseOnColorCmnt(2)" onmouseout="mouseOutColorCmnt(2)" type="button" onclick="showOptions(\'#forCommentAdds'.$tot_cnt.'\')" class="attachCmntIcon" value="A"/>
                                    <input class="submitCmnt" type="button" onclick="uploadcomment('.$post_id.',0,0,'.$tot_cnt.')" value="Comment"/>
                                    </div>
                                </form>
                                <div><span id="smiley_cls_btn_cmnt'.$tot_cnt.'" class="smiley_cls_btn_cmnt" style="display:none;" onclick="$(\'#smiley_preview'.$tot_cnt.'\').html(\'\');">X</span><div id="smiley_preview'.$tot_cnt.'" class="smiley_preview"></div></div>
                               <div id="totlprevcmnts'.$cnt.'" class="totlprevcmnts"> <div class="for_new_cmnt'.$cnt.'" ></div>
                            </div>
		
                            
                                </div>
	                <div class="previousComments" id="previousComments'.$tot_cnt.'" style="//display:none;">
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                   
	           <!-- post dets -->
	
<input type="hidden" value="1" id="wch_clkd"/>
                      <div class="ThePostRespDetHold" id="PostResponsePane_PID_'.$cnt.'" style="display: none;" >
                            <div class="TPRD_Ttl">
                                Post Id :<span class="TPRD_PID">'.$post_id.'</span> 
                            </div>
                            <div class="TPRD_Itm" id="Post_Likers_PID" name="'.$post_id.'" title="';
         
                            for($t=1;$t<=count($liked_fname);$t++)
                            {
                                echo ' '.$liked_fname[$t].' , ';
                            }
         
         
                        echo '" onclick="showPostLikers('.$cnt.')"  >
                                    <div class="TPRD_ItmInner">
                                        <div class="TPRD_RespCount" id="ThePostLikes">
                                        <span class="like_cnt'.$cnt.'" >'.$tot_likes.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName" >
                                        Likes
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="TPRD_Itm">
                                    <div class="TPRD_ItmInner" >
                                    <div class="TPRD_RespCount" id="ThePostUnlikes" >
                                        <span class="unlike_cnt'.$cnt.'">'.$tot_unlikes.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName"  >
                                        Hates
                                    </div>
                                    </div>
                                  
                                </div>
                                <div class="TPRD_Itm"  id="Post_Raters_PID" title="';
                       if(count($rated_fname)>3)
                       {
                        for($t=1;$t<=count($rated_fname);$t++)
                        {
                            echo ' '.$rated_fname[$t].' , ';
                        }
                          
                       }else
                       {
                           
                            echo ' Rated people will be shown on more than 3 Raters ';
                       }
                        
         
                        echo '" name="'.$post_id.'" onclick="showPostRaters('.$cnt.')">
                                    <div class="TPRD_ItmInner"   >
                                    <div class="TPRD_RespCount" >
                                        <img class="TPRD_RatedIcon" id="change_rate_icon'.$post_id.'" src="../web/icons/post-rated-'.$myrate.'.png" />
                                    </div>
                                    <div class="TPRD_RespItmName">
                                  
                                        Ratings ( <span id="cur_rate_cnt'.$cnt.'">'.count($rated_uid).'</span>)
                                    </div>
                                    </div>
                                   
                                </div>
                                
                                            
                                <div class="TPRD_Itm" title="';
                        for($t=1;$t<=count($commenter_fname);$t++)
                        {
                            echo ' '.$commenter_fname[$t].' , ';
                        }
                        echo '" id="Post_Commenters_PID" name="'.$post_id.'" onclick="showPostCommenters('.$cnt.')">
                                    <div class="TPRD_ItmInner"   >
                                    <div class="TPRD_RespCount" id="ThePostComments" >
                                       <span class="cmcnt'.$cnt.'">'.$cmcnt.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName">
                                        Comments
                                    </div>
                                    </div>
                                    
                                </div>
                                

                                <div class="TPRD_Itm" title="';
                   
                        for($t=1;$t<=count($shared_fname);$t++)
                        {
                            echo ' '.$shared_fname[$t].' , ';
                        }
                        echo '" id="Post_Sharers_PID" name="'.$post_id.'"  onclick="$(\'#Post_Sharers_PID_'.$cnt.'\').fadeIn();">
                                    <div class="TPRD_ItmInner"  >
                                    <div class="TPRD_RespCount" id="ThePostShares" >
                                        <span class="share_cnt'.$cnt.'">'.$shrcnt.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName">
                                        Shares
                                    </div> 
                                    </div>
                                  
                                </div>
                                <div class="TPRD_Itm">
                                    <div class="TPRD_ItmInner">
                                    <div class="TPRD_RespCount" id="ThePostViews" >
                                       '.$pvs.'
                                    </div>
                                    <div class="TPRD_RespItmName">
                                        Views
                                    </div>
                                    </div>
                                   
                            </div>
                        </div>
	       
	      <div class="ThePostPreviousResponders" id="Post_Likers_PID_'.$cnt.'"  >
                         
                            <div class="TPPR_InnerTitle">
                                Liked By '.$pers_like.' people
                            </div>
                            <div class="TPPR_InnerCont">
                            ';
                       
                        for($t=1;$t<=count($liked_fname);$t++)
                        {
                            echo '<div class="RespPeopleName">
                                <a href="'.$liked_uid[$t].'" target="_blank" >'.$liked_fname[$t].' </a>         
                                </div>';
                        }
                       
         
                        echo '
                             
                             
                            </div>
                        </div>
	       



	       <div class="ThePostPreviousResponders" id="Post_Raters_PID_'.$cnt.'"  >
                   
                            <div class="TPPR_InnerTitle">
                                Rated By '.$ratc.' people
                            </div>
                            <div class="TPPR_InnerCont">
                            ';
                       
                        if(count($rated_uid)>3)
                        {
                        for($t=1;$t<=count($rated_fname);$t++)
                        {
                           
                            echo '<div class="RespPeopleName">
                                <a href="'.$rated_uid[$t].'" target="_blank" >'.$rated_fname[$t].' </a>         
                                </div>';
                        }      
                        }else
                        {
                            echo ' Rated people will be shown on more than 3 Raters ';
                        }
                      
                       
         
                        echo '
                             
                             
                            </div>
                        </div>




                        <div class="ThePostPreviousResponders" id="Post_Commenters_PID_'.$cnt.'"  >
                            
                            <div class="TPPR_InnerTitle">
                                Commented By '.$cmcnt.' people
                            </div>
                            <div class="TPPR_InnerCont">
                            ';
                       
                        for($t=1;$t<=count($commenter_fname);$t++)
                        {
                            echo '<div class="RespPeopleName">
                                <a href="'.$commented_uid[$t].'" target="_blank" >'.$commenter_fname[$t].' </a>         
                                </div>';
                        }
                       
         
                        echo '
                             
                             
                            </div>
                        </div>
	       
	       
	       <div class="ThePostPreviousResponders" id="Post_Sharers_PID_'.$cnt.'"  >
                            
                            <div class="TPPR_InnerTitle">
                                Shared By '.$shrcnt.' people
                            </div>
                            <div class="TPPR_InnerCont">
                            ';
                       
                        for($t=1;$t<=count($shared_fname);$t++)
                        {
                            echo '<div class="RespPeopleName">
                                <a href="'.$shared_uid[$t].'" target="_blank" >'.$shared_fname[$t].' </a>         
                                </div>';
                        }
                       
         
                        echo '
                             
                             
                            </div>
                        </div>
	       
	       <div class="ThePostPreviousResponders" id="Post_Withers_PID_'.$cnt.'" >
                           
                        </div>
	      
	   
                        <div id="dwnresult" style="display:none"></div>
                          <div id="for_my_prevpost'.$cnt.'"></div>
                     </div>
                      ';
        }
        
     
        $ulc=0;
$lc=0;
$dncnt=0;
$cmcnt=0;
$shrcnt=0;
$ratc=0;
                      $shr_ct=0;
	     $seen_cnt=0;
             $qs="select post_pers_view as pv from person_config where user_id=$user_id";
             $rs=  mysqli_query($dbc, $qs);
             if($rs)
             {
                 if(mysqli_num_rows($rs)>0)
                 {
                     $row=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                     
                     $post_pers=$row['pv'];
                     if($post_pers==0)
                     {
                         $allppl=0;
                            $allrel=1;
                     }
                     else
                     {
                         if($post_pers==1)
                         {
                             $allppl=1;
                             $allrel=0;
                         }
                     }
                 }else
                 {
                     $allppl=0;
                     $allrel=1;
                 }
             }else
             {
                     $allppl=0;
                     $allrel=1;
                 
             }
             
                    $aps="SELECT post_id as pid,user_id as uid,allpeople as ap,allrelation as alr,share as shr,page_id as p,officiale as of_cl,me as ni from post_permision where user_id=$people_userid and  allpeople=$allppl and allrelation=$allrel order by post_id desc ";
                          $runap=mysqli_query($dbc,$aps);
                        if($runap)
                        {       $cnt=0;$tot_cnt=0;
                            if(mysqli_num_rows($runap)>0)
                            {
		 
                                $tot_cnt=0;
                           $tot_num_post=  mysqli_num_rows($runap); 
                                while ($rowofap=mysqli_fetch_array($runap,MYSQLI_ASSOC))
                                {
		    
                                    $tot_cnt=$tot_cnt+1;
                                    $cnt=$cnt+1;
		  $officiale=$rowofap['of_cl'];
                                      $shared_with_userid=0;
                                          $shared_to_me=0;
                                           $shared_userid=0;
                                           $page_id=$rowofap['p'];
                                           $c_name=0;
		           $page_name="";
		          
		         if($page_id!=0)
		         {
		         $qpage="select page_name as p from pages where page_id=$page_id";
		         $rpage=  mysqli_query($dbc, $qpage);
		         if($rpage)
		         {
		              
		                if(mysqli_num_rows($rpage)>0)
		                {
			      $ro_pg=  mysqli_fetch_array($rpage,MYSQLI_ASSOC);
			      $page_name=$ro_pg['p'];
		                }
		         }
		         }
		  $post_id=$rowofap['pid'];
		         $orig_post_id=$post_id;
                                           $share=$rowofap['shr'];
		  
		        $shared_name=0;
		        $shared_user_name=0;
		        $shared_time=0;
		        $shared_user_id=0;
		        $poster_id=$rowofap['uid'];
		        $orig_poster_id=$poster_id;
		        $me=$rowofap['ni'];
		        $allrels=$rowofap['alr'];
                                    $allppl=$rowofap['ap'];
		  $showm=0;
		  if($me==1)
		  {
		         if($poster_id==$user_id)
		         {
		                $showm=1;
		         }
		  }
		  $iam_cansee_post=0;
		    if($allppl==1  || $showm==1)
                                        {
		             $iam_cansee_post=1;
                                         }else
                                         {
                                            
                                            if($allrels==1)
                                            {
                                                 $q="select cu_id as c from contacts where user_id=$poster_id and cu_id=$user_id";
                                                $r=mysqli_query($dbc,$q);
                                                if($r)
                                                {
                                                    if(mysqli_num_rows($r)>0)
                                                    {
			         $iam_cansee_post=2;
                                                             
                                                    }
                                                }
                                            }
                                            
                                        
                                }
                                          if($share!=0 )
                                          {
                                                  
                                      $qshr="select post_id as p from post_share where share_id=$share";
		    $rshr=  mysqli_query($dbc, $qshr);
		    if($rshr)
		    {
		           if(mysqli_num_rows($rshr)>0)
		           {
			 $shr_row=  mysqli_fetch_array($rshr,MYSQLI_ASSOC);
			 $post_id=$shr_row['p'];
			 $shr_q="select user_id as u from post_permision where post_id=$post_id";
			 $r_shr=  mysqli_query($dbc, $shr_q);
			 if($r_shr)
			 {
			        $rof=  mysqli_fetch_array($r_shr,MYSQLI_ASSOC);
			        $poster_id=$rof['u'];
			 }
		           }
		    }
		   
		    $qpf="select post_time as t,user_id as u from postforall where post_id=$orig_post_id";
		    $rpf=  mysqli_query($dbc, $qpf);
		    if($rpf)
		    {
		           if(mysqli_num_rows($rpf)>0)
		           {
			 $shr_df=  mysqli_fetch_array($rpf,MYSQLI_ASSOC);
			 $shared_user_id=$shr_df['u'];
			 $shared_time=$shr_df['t'];
		           }
		    }
		     $selemail="select username as em from users where user_id=$shared_user_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
				
                                                                 $rowsemail=mysqli_fetch_array($rinemail);
                                                                 $shared_user_name=$rowsemail['em'];
                                                             }
			        
			           $selemail="select first_name as em from basic where user_id=$shared_user_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail_shr=mysqli_fetch_array($rinemail);
                                                                 $shared_name=$rowemail_shr['em'];
                                                             }
		 
                                      
                                          }
                                   if($iam_cansee_post==1 || $iam_cansee_post==2)
		 {
		                              
           $qn="select post_id as p from post_permision where user_id=$poster_id and post_id>=$post_id and post_id!=$post_id  order by post_id asc";
          $qp="select post_id as p from post_permision where user_id=$poster_id and post_id<=$post_id and post_id!=$post_id  order by post_id desc";
                $rn=  mysqli_query($dbc,$qn);
                $rp=mysqli_query($dbc,$qp);
                if($rn && $rp)
                {
                    if(mysqli_num_rows($rn)>0)
                    {
                        $rnp=  mysqli_fetch_array($rn,MYSQLI_ASSOC);
                        $next_postid=$rnp['p'];
                    }else
                    {
                  
                    
                $q="select post_id as p from post_permision where user_id=$poster_id limit 1";
                $r=  mysqli_query($dbc, $q);
                if($r)
                {
                    if(mysqli_num_rows($r)>0)
                    {
                        $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                        $next_postid=$rt['p'];
                    }
                }
                    }
                    if(mysqli_num_rows($rp)>0)
                    {
                        $rpp=  mysqli_fetch_array($rp,MYSQLI_ASSOC);
                        $prev_postid=$rpp['p'];
                    }else
                    {
                         
                    
                   $q="select post_id as p from post_permision where user_id=$poster_id order by post_id desc limit 1";
                    $r=  mysqli_query($dbc, $q);
                if($r)
                {
                    if(mysqli_num_rows($r)>0)
                    {
                        $rt=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                        $prev_postid=$rt['p'];
                    }
                }
                    }
                }
                
                                          $with_ppl_name=array();
		        $with_ppl_user_name=array();
                                        $wppl="select withuser_id as wuid from post_forsomeppl where post_id=$post_id";
                                        $rwppl=mysqli_query($dbc,$wppl);
                                        if($rwppl)
                                        {
                                             $totwusers=0;
		             $t_usr_nm=0;
                                            if(mysqli_num_rows($rwppl)>0)
                                            {
                                               
                                                while($rowppl=mysqli_fetch_array($rwppl,MYSQLI_ASSOC))
                                                {
                                                    $withusers_id=$rowppl['wuid'];

                                                    if(!empty($withusers_id))
                                                    {
                                                        $totwusers=$totwusers+1;
                                                     $uname="select c_name as fname from contacts where user_id=$user_id and  cu_id=$withusers_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $with_ppl_name[$totwusers]=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$withusers_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $with_ppl_name[$totwusers]=$rowemail['em'];
                                                             }
                                                         }
                                                     }
			
                                                              $selemail="select username as em from users where user_id=$withusers_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
				$t_usr_nm=$t_usr_nm+1;
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $with_ppl_user_name[$t_usr_nm]=$rowemail['em'];
                                                             }
			  
                                                    }

                                                }
                                            }
                                        }
		      
		      $selma="select username as em from users where user_id=$poster_id";
                                                             $rnemai=mysqli_query($dbc,$selma);
                                                             if($rnemai)
                                                             {
                                                                 $rowema=mysqli_fetch_array($rnemai,MYSQLI_ASSOC);
                                                                 $poster_user_name=$rowema['em'];
                                                             }
                                                     
		        
               $p_pic='../'.$poster_user_name.'/ppic10.jpg';
                      


                                        $imgc=0;
                                         $liked=0;
                                                            $mylike=0;
			         $pvs=0;
                                                                $myunlike=0;
                                                                $myrate=0;
			            
			              $q3="select liked_times as lu,unliked_times as ukc,rating as rtc from post_status where post_id=$post_id ";
                                                     $r3=mysqli_query($dbc,$q3);
                                                     if($r3)
                                                     {

                                                        $lc=0;
			     $tot_likes=0;
			     $pers_like=0;
			     $pers_unlike=0;
			     $tot_unlikes=0;
                         $rate_cnt=0;
                                                        while($rowlike=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                        {   
                                                            $lkc=$rowlike['lu'];
			        $ukc=$rowlike['ukc'];
                                $tot_rat=$rowlike['rtc'];
			        if($lkc!=0)
			        {
			               $pers_like=$pers_like+1;
			        }
			        if($ukc!=0)
			        {
			               $pers_unlike=$pers_unlike+1;
			        }
			        if($tot_rat<=0)
			        {
			               $rate_cnt=$rate_cnt+1;
			        }
                                                            $lc=$lc+1;
			         if($lc>1)
			         {
			                $tot_likes=$pre_like+$lkc;
			                $tot_unlikes=$pre_unlike+$ukc;
			         }else
			         {
			                $pre_like=$lkc;
                                                          $pre_unlike=$ukc;
			                 $tot_likes=$lkc;
				$tot_unlikes=$ukc;
			         }
			         
                                                        }
                                                     }
                                        $me1="select like_userid as lk,unlike_userid as uk,rating as rt,seen_post as pvs from post_status where post_id=$post_id and user_id=$user_id";
                                                        $rem1=mysqli_query($dbc,$me1);
                                                        if($rem1)
                                                        {
                                                           
                                                            if(mysqli_num_rows($rem1)>0)
                                                            {
                                                                $rowsx=mysqli_fetch_array($rem1,MYSQLI_ASSOC);
                                                                $mylike=$rowsx['lk'];
                                                                $myunlike=$rowsx['uk'];
                                                                $myrate=$rowsx['rt'];
			             
                                                                if($mylike==0)
                                                                {
                                                                    $mylike=0;
                                                                }else{
                                                                    $mylike=1;
                                                                }
                                                                if($myunlike==0)
                                                                {
                                                                    $myunlike=0;
                                                                }else
                                                                {
                                                                    $myunlike=1;
                                                                }
                                                                if($myrate==0)
                                                                {
                                                                    $myrate=0;
                                                                }else
                                                                {
                                                                    $myrate=$myrate;
                                                                }
                                                            }else
                                                            {
                                                                
                                                            }
                                                        }else
                                                        {
                                                              
                                                        }
                                        
                                                   $pdfcnt=0;
                                                   $filecnt=0;
                                                   
                                                    
			   $pvs=0;
                           $liked_fname=array();
                           $uliked_fnam=array();
                           $rated_fname=array();
                           $liked_uid=array();
                           $uliked_uid=array();
                           $rated_uid=array();
                           $commented_uid=array();
                           $shared_uid=array();
                           $l=0;
                           $u=0;
                           $r=0;
                           
                           $qs="select like_userid as lkc, unlike_userid as ukc,rating as rtc,user_id as rtcu from post_status where post_id=$post_id";
                           $rs=  mysqli_query($dbc, $qs);
                           if($rs)
                           {
                               if(mysqli_num_rows($rs)>0)
                               {
                                   while($roi=  mysqli_fetch_array($rs,MYSQLI_ASSOC))
                                   {
                                       $lked_id=$roi['lkc'];
                                       $ulk_id=$roi['ukc'];
                                       $rated_id=$roi['rtc'];
                                       $rateda_uid=$roi['rtcu'];
                                       if($lked_id!=0)
                                       {
                                           $l=$l+1;
                                           $liked_uid[$l]=$lked_id;
                                       $q5="select first_name as f from basic where user_id=$lked_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $liked_fname[$l]=$ry['f'];
                       
                   }       
                                           
                                       }
                                        if($uliked_fnam!=0)
                                       {
                                           $u=$u+1;
                                           $uliked_uid[$u]=$ulk_id;
                                       $q5="select first_name as f from basic where user_id=$ulk_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $uliked_fnam[$u]=$ry['f'];
                       
                   }       
                                           
                                       }
                                        if($rated_id!="0")
                                       {
                                           $r=$r+1;
                                           $rated_uid[$r]=$rateda_uid;
                                       $q5="select first_name as f from basic where user_id=$rateda_uid";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $rated_fname[$r]=$ry['f'];
                       
                   }       
                                           
                                       }
                                    
                                   }
                               }
                           }
                           
                           $commenter_fname=array();
                           $cmt=0;
                           $qw="select commenter_useri_d as u from post_comments where post_id=$post_id";
                           $rw=  mysqli_query($dbc, $qw);
                           if($rw)
                           {
                               if(mysqli_num_rows($rw)>0)
                               {
                                   while($rop=  mysqli_fetch_array($rw,MYSQLI_ASSOC))
                                   {
                                       
                                       $cmt=$cmt+1;
                                       $cmnt_ppl_id=$rop['u'];
                                       $commented_uid[$cmt]=$cmnt_ppl_id;
                                         $q5="select first_name as f from basic where user_id=$cmnt_ppl_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $commenter_fname[$cmt]=$ry['f'];
                       
                   }   
                                   }
                               }
                           }
                           $shared_fname=array();
                           $s=0;
                          
                           $qw="select user_id as u from post_share where post_id=$post_id";
                           $rw=  mysqli_query($dbc, $qw);
                           if($rw)
                           {
                               if(mysqli_num_rows($rw)>0)
                               {
                                   while($et=  mysqli_fetch_array($rw,MYSQLI_ASSOC))
                                   {
                                       $shared_id=$et['u'];
                                     
                                       $s=$s+1;
                                         $shared_uid[$s]=$shared_id;
                                                             $q5="select first_name as f from basic where user_id=$shared_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $shared_fname[$s]=$ry['f'];
                       
                   } 
                                   }
                               }
                           }
                                                     $q3="select seen_post as snp from post_status where post_id=$post_id ";
                                                     $r3=mysqli_query($dbc,$q3);
                                                     if($r3)
                                                     {

                                                     
                                                        while($rowsnp=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                        {   
                                                            $snp=$rowsnp['snp'];
			        
                                                            if($snp=="0")
                                                            {
                                                                
                                                            }else
                                                            {
                                                             $pvs=$pvs+1;
                                                            }
                                                            
                                                        }
                                                     }
                                                     $q4="select unlike_userid unk from post_status where post_id=$post_id ";
                                                     $r4=mysqli_query($dbc,$q4);
                                                     if($r4)
                                                     {
                                                        $ulc=0;
                                                        while($rowunlike=mysqli_fetch_array($r4,MYSQLI_ASSOC))
                                                        {
                                                            $ukc=$rowunlike['unk'];
                                                            if($ukc=="0")
                                                            {
                                                                
                                                            }else
                                                            {
                                                                $ulc=$ulc+1;
                                                            }
                                                            
                                                        }
                                                     }
                                                      $q5="select rating as rates from post_status where post_id=$post_id ";
                                                     $r5=mysqli_query($dbc,$q5);
                                                     if($r5)
                                                     {
                                                        $ratc=0;
                                                        while($rowrate=mysqli_fetch_array($r5,MYSQLI_ASSOC))
                                                        {
                                                            $ratec=$rowrate['rates'];
                                                            if($ratec!=="0")
                                                            {
                                                                $ratc=$ratc+1;
                                                            }
                                                            
                                                        }
                                                     }
                                                       $q6="select cmnt_id from post_comments where post_id=$post_id ";
                                                     $r6=mysqli_query($dbc,$q6);
                                                     if($r6)
                                                     {
                                                        $cmcnt=0;
                                                        while(mysqli_fetch_array($r6,MYSQLI_ASSOC))
                                                        {

                                                            $cmcnt=$cmcnt+1;
                                                        }
                                                     }
                                                     $q7="select user_id from post_download where post_id=$post_id ";
                                                     $r7=mysqli_query($dbc,$q7);
                                                     if($r7)
                                                     {
                                                        $dncnt=0;
                                                        while(mysqli_fetch_array($r7,MYSQLI_ASSOC))
                                                        {
                                                            $dncnt=$dncnt+1;
                                                        }
                                                     }
                                                       $q8="select user_id from post_share where post_id=$post_id ";
                                                     $r8=mysqli_query($dbc,$q8);
                                                     if($r8)
                                                     {
                                                        $shrcnt=0;
                                                        
                                                        while(mysqli_fetch_array($r8,MYSQLI_ASSOC))
                                                        {
                                                            $shrcnt=$shrcnt+1;
                                                        }
                                                     }
                                                    
                                                     
                                                     $res="SELECT likes as l ,unlike as u,download as dwn,comment as cm,share as sh,rating as rtres from post_response where post_id=$post_id";
                                                     $rc=mysqli_query($dbc,$res);
                                                     if($rc)
                                                     {
                                                        if(mysqli_num_rows($rc)>0)
                                                        {
                                                            while($rotg=mysqli_fetch_array($rc,MYSQLI_ASSOC))
                                                            {
                                                                $likeres=$rotg['l'];
                                                                $unlikeres=$rotg['u'];
                                                                $dwnres=$rotg['dwn'];
                                                                $cmntres=$rotg['cm'];
                                                                $shareres=$rotg['sh'];
                                                                $rateres=$rotg['rtres'];
                                                            }
                                                           
                                                        }else
                                                        {
                                                            $likeres=1;
                                                                $unlikeres=1;
                                                                $dwnres=1;
                                                                $cmntres=1;
                                                                $shareres=1;
                                                                $rateres=1;
                                                        }
                                                     }
			    $post_caption="";
                                                       $post_loc="";
                                                       $post_feel="";
                                                       $post_feelwhile="";
			     $post_time="";
                                                     $sel_con="select post_caption as pcap,post_time as t,post_location as loc,post_feelings as fl,post_feeling_while as whl,cap_back_clr as cap_back_clr,cap_text_clr as cap_text_clr from postforall where post_id=$post_id";
                                                     $rts=  mysqli_query($dbc, $sel_con);
                                                     if($rts)
                                                     {
                                                         if(mysqli_num_rows($rts)>0)
                                                         {
                                                             $my_cont_row=mysqli_fetch_array($rts,MYSQLI_ASSOC);
                                                              $post_caption=$my_cont_row['pcap'];
                                                       $post_loc=$my_cont_row['loc'];
                                                       $post_feel=$my_cont_row['fl'];
                                                       $post_feelwhile=$my_cont_row['whl'];
                                                       $cap_text_clr=$my_cont_row['cap_text_clr'];
			            $cap_back_clr=$my_cont_row['cap_back_clr'];
                                                        $post_time=$my_cont_row['t'];
                                                         }else
                                                         {
                                                             
                                                         }
                                                     }
			  $qw="select top_meme as tpme,bottom_meme as btm_me from meme_posts where post_id=$post_id";
			  $rw=  mysqli_query($dbc,$qw);
			  if($rw)
			  {
			         if(mysqli_num_rows($rw)>0)
			         {
			                $rf=  mysqli_fetch_array($rw,MYSQLI_ASSOC);
			                $top_meme=$rf['tpme'];
			               
			                $btm_meme=$rf['btm_me'];
			                 $top_meme='<div class="pstop_meme">'.$top_meme.'</div>';
			                $btm_meme='<div class="psbtm_meme">'.$btm_meme.'</div>';
			                
			         }  else {
			         $top_meme="";
			                $btm_meme="";
			                       
			         }
			  }
                                                     $q2="select disc as s,category as ct from post_ctgry where post_id=$post_id";
                                                     $r2=mysqli_query($dbc,$q2);
                                                     if($r2)
                                                     {
                                                         $ctgry=0;
			      $my_category=0;
                                                             
                                                         if(mysqli_num_rows($r2)>0)
                                                         {
                                                             $ctgry=1;
			       
                                                             $rod=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                                                             $discr=$rod['s'];
			             $my_category=$rod['ct'];
                                                             
                                                         }else
                                                         {
                                                             $discr="";
                                                         }
                                                     }
			  
			  if($officiale==1)
			  {
			         $q="";
			  }
			  $post_images=array();
			  $tot_files=array();
                          if(!is_dir('../'.$user_id.'/speedup_image'))
                          {
                              mkdir('../'.$user_id.'/speedup_image',0777,true);
                          }
                          
                          $qd="select speed_up as p from person_config where user_id=$user_id";
                          $rd=  mysqli_query($dbc, $qd);
                          if($rd)
                          {
                              if(mysqli_num_rows($rd)>0)
                              {
                                  $rf=mysqli_fetch_array($rd,MYSQLI_ASSOC);
                                  $qlty=$rf['p'];
                              }else
                              {
                                  $qlty=40;
                              }
                          }
                                                     $qer="select post_image as img from post_images where post_id=$post_id";
                                                     $rer=  mysqli_query($dbc, $qer);
                                                     if($rer)
                                                     {
                                                         $ns=0;
                                                  $tot_fls=0;
                                                         if(mysqli_num_rows($rer)>0)
                                                         {
                                                            while($img_row=  mysqli_fetch_array($rer,MYSQLI_ASSOC))
                                                            {
                                                                $ns=$ns+1;
			             $tot_fls=$tot_fls+1;
                                                                $post_images[$ns]=$img_row['img'];
                                                                if(strpos($post_images[$ns],"postimages/")>-1)
                                                                {
                                                                $cut=strpos($post_images[$ns],"postimages/")+11;
                                                                    
                                                                }
                                                                if(strpos($post_images[$ns],"profileimages/")>-1)
                                                                {
                                                                $cut=strpos($post_images[$ns],"profileimages/")+14;
                                                                    
                                                                }
                                                                if(strpos($post_images[$ns],"wallpapers/")>-1)
                                                                {
                                                                $cut=strpos($post_images[$ns],"wallpapers/")+11;
                                                                    
                                                                }
                                                                if(strpos($post_images[$ns],"statusimages/")>-1)
                                                                {
                                                                $cut=strpos($post_images[$ns],"statusimages/")+13;
                                                                    
                                                                }
                                                                $cut_img=substr($post_images[$ns],$cut,strlen($post_images[$ns]));
                                                                $dest_comp='../'.$user_id.'/speedup_image/'.$cut_img.'';
                                                                compress_image($post_images[$ns],$dest_comp,$qlty);
                                                                $post_images[$ns]=$dest_comp;
			             $tot_files[$tot_fls]=$img_row['img'];
                                                     
                                                    
                                                            }
                                                                
                                                    
                                                         }
                                                     }
                                                      
                                        $selppost="select post_audio as aud,post_video as v,post_file as fl,post_pdf as pdf,thumb_nails as thm from post_files where post_id=$post_id";
                                       
                                        $runselpost=mysqli_query($dbc,$selppost);
                                        if($runselpost)
                                        {
                                            $n=0;
                                                  
                                                       $post_pdfs=array();
			    $post_files=array();
			    $post_videos=array();
			    $post_audios=array();
			    $thum_nails=array();
			    
			    $pdf_ct=0;
			    $aud_ct=0;
			    $vid_ct=0;
			    $file_ct=0;
			    $tm_ct=0;
                                            if(mysqli_num_rows($runselpost)>0)
                                            {
                                                
                                                while ($rowofcurpost=mysqli_fetch_array($runselpost,MYSQLI_ASSOC))
                                                {
                                                   
                                                    $post_video=$rowofcurpost['v'];
                                                        $post_audio=$rowofcurpost['aud'];
                                                        $post_file=$rowofcurpost['fl'];
                                                        $post_pdf=$rowofcurpost['pdf'];
			     $thum_nail=$rowofcurpost['thm'];
                                                        
			     if(strpos($post_pdf,"pdfs/")>0)
			     {
			            $pdf_ct=$pdf_ct+1;
			            $tot_fls=$tot_fls+1;
			            $post_pdfs[$pdf_ct]=$post_pdf;
			            $tot_files[$tot_fls]=$post_pdf;
			     }
			     if(strpos($post_file,"files/")>0)
			     {
			            $file_ct=$file_ct+1;
			                $tot_fls=$tot_fls+1;
			            $post_files[$file_ct]=$post_file;
			            $tot_files[$tot_fls]=$post_file;
			            
			     }
			     if(strpos($post_video,"post/videos")>0)
			     {
			            $vid_ct=$vid_ct+1;
			             $tot_fls=$tot_fls+1;
			            $post_videos[$vid_ct]=$post_video;
			            $tot_files[$tot_fls]=$post_video;
			            $thum_nails[$tm_ct]=$thum_nail;
			     }
			     
			     if(strpos($post_audio,"post/audio")>0)
			     {
			            $aud_ct=$aud_ct+1;
			              $tot_fls=$tot_fls+1;
			            $post_audios[$aud_ct]=$post_audio;
			            $tot_files[$tot_fls]=$post_audio;
			     }
			     
                                                    
                                                 
                                                  
                                                }
                                                
                                            }
                                        }
                                        
                                        
                                                     $uname="select c_name as fname from contacts where user_id=$user_id and  cu_id=$poster_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $poster_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$poster_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $poster_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                          
                                     
                                        $q="select allpeople as p,me as me,allrelation as ar,friends as f,family as fm,secret as cm,showonlyto as sh,hideeto as hd,me as m,special as spl from post_permision where post_id=$post_id limit 1";
                                        $r=mysqli_query($dbc,$q);
                                        if($r)
                                        {
                                            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                                            $allppl=$row['p'];
                                            $allrel=$row['ar'];
                                            $friends=$row['f'];
                                            $family=$row['fm'];
                                            $classmate=$row['cm'];
                                            $sonto=$row['sh'];
                                            $hideto=$row['hd'];
                                            $special=$row['spl'];
                                            $me=$row['me'];
                                        }
                                        if($me==1)
                                        {
                                            if($poster_id==$user_id)
                                            {
                                                $iam=1;
                                            }else
                                            {
                                                $iam=0;
                                            }
                                        }else
                                        {
                                            $iam=0;
                                        }
                                        if($hideto==1)
                                         {
                                                $q="select hideto as h from post_forsomeppl where post_id=$post_id and hideto='$user_id'";
                                                $r=mysqli_query($dbc,$q);
                                                if($r)
                                                { $hd=0;
                                                    if(mysqli_num_rows($r)>0)
                                                    {
                                                        $hd=1;
                                                    }
                                                }
                                            }else
                                            {
                                                $hd=0;
                                            }
                                            
                                            $q="select showonlyto as sf from post_forsomeppl where post_id=$post_id and showonlyto='$user_id'";
                                            $r=mysqli_query($dbc,$q);
                                            if($r)
                                            {
                                                $shonto=0;
                                                if(mysqli_num_rows($r)>0)
                                                {
                                                    $shonto=1;
                                                }
                                            }
		           $iam_seen_post=0;
                                            if($hd==1)
                                            {
			
                                            }else
                                            {
                                       
                                        if($allppl==1 || $shonto==1 || $iam==1)
                                        {
		             $iam_seen_post=1;
                                        allpost($cap_text_clr,$cap_back_clr,$shared_uid,$commented_uid,$rated_uid,$uliked_uid,$liked_uid,$shared_fname,$commenter_fname,$uliked_fnam,$rated_fname,$liked_fname,$rate_cnt,$pers_unlike,$pers_like,$tot_unlikes,$tot_likes,$btm_meme,$top_meme,$thum_nails,$tot_files,$post_pdfs,$post_audios,$post_videos,$post_files,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        }else
                                         {
                                            
                                            if($allrel==1)
                                            {
                                                 $q="select cu_id as c from contacts where user_id=$poster_id and cu_id=$user_id";
                                                $r=mysqli_query($dbc,$q);
                                                if($r)
                                                {
                                                    if(mysqli_num_rows($r)>0)
                                                    {
			        $iam_seen_post=1;
                                                       allpost($cap_text_clr,$cap_back_clr,$shared_uid,$commented_uid,$rated_uid,$uliked_uid,$liked_uid,$shared_fname,$commenter_fname,$uliked_fnam,$rated_fname,$liked_fname,$rate_cnt,$pers_unlike,$pers_like,$tot_unlikes,$tot_likes,$btm_meme,$top_meme,$thum_nails,$tot_files,$post_pdfs,$post_audios,$post_videos,$post_files,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        
                                                    }
                                                }
                                            }
                                            
                                        
		        }
                                            }
                                       if($iam_seen_post==1)
		          {
		            $seen_cnt=$seen_cnt+1;
			if($seen_cnt<10)
			{
			       continue;
			}else
			{
			       break;
			}
		          }  else {
			continue;
		          }  
		 }
		        
            
                                }
                            }
                        }
	if($seen_cnt>9)
               {
                    echo '<div id="show_more_post" class="show_more_posts_div" onclick="show_more_post('.$post_id.','.$tot_num_post.');$(this).remove();">Show More Posts</div>
             ';   
               }else
               {
	 
               }        echo '        
                       </div>
               
            </div>
        </div>';
	        
}
 ?>
