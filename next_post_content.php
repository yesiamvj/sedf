<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	$pos_id=$_REQUEST['postid'];
        
	$change=$_REQUEST['change'];
	$cnt=$_REQUEST['cont'];
	$tot_cnt=$cnt+123;
	 $fst_post=$_REQUEST['fst_post'];
	
                                    $cnt=$cnt+1;

	require 'mysqli_connect.php';
	$q="select user_id as u from post_permision where post_id=$pos_id";
	$r=  mysqli_query($dbc, $q);
	if($r)
	{
	       if(mysqli_num_rows($r)>0)
	       {
	              $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	              $poster_id=$row['u'];
	       }
	}
	$post_id=$pos_id;
	                        
	if($change==0)
	{
	 $qn="select post_id as p from post_permision where user_id=$poster_id and post_id<=$post_id and post_id!=$post_id  order by post_id desc limit 1";

	}else
	{
	$qn="select post_id as p from post_permision where user_id=$poster_id and post_id>=$post_id and post_id!=$post_id  order by post_id asc limit 1 ";
                 
	}
                $rn=  mysqli_query($dbc,$qn);
                
                if($rn)
                {
                    if(mysqli_num_rows($rn)>0)
                    {
                        $rnp=  mysqli_fetch_array($rn,MYSQLI_ASSOC);
                        $post_id=$rnp['p'];
	   }  else {
	          if($change==1)
	          {
	$q2="select post_id as p from post_permision where user_id=$poster_id";
	   	
	          }else
	          {
		$q2="select post_id as p from post_permision where user_id=$poster_id order by post_id desc limit 1";
	   
	          }
	   $r2=  mysqli_query($dbc, $q2);
	   if($r2)
	   {
	          if(mysqli_num_rows($r2)>0)
	          {
		$rowd= mysqli_fetch_array($r2,MYSQLI_ASSOC);
		$post_id=$rowd['p'];
		
	          }
	   }
	   
	   }
                 
                }
               
	
               function allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt)
        {
               echo '<div class="a_complete_post" id="a_full_post'.$post_id.'"> <div id="fornextpost'.$cnt.'"></div>
                          <div class="ThePostExtraBench" id="TPEB_'.$cnt.'" style="display: none;">
                        
                        <div class="TPEB_Itm" onclick="checkPrevPostExisting'.$prev_postid.'()">
                            <div class="prevDriver" title="Show previous post" ></div>
                        </div>
                        <div class="TPEB_Itm" title="Float" onclick="pinItOnTop('.$post_id.')" >
                            <img src="icons/pExt/cloud.png" />
                            <input type="hidden" id="Post_Cloud_'.$post_id.'" value="'.$post_id.'" />
                        </div>
                        <div class="TPEB_Itm" title="Add to favourites" onclick="add_to_post_fav('.$post_id.')">
                            <img src="icons/pExt/fav.png" />
                        </div>
                        <div class="TPEB_Itm" title="Report This Post" onclick="report_this_post('.$post_id.')">
                            <img src="icons/pExt/report.png"  />
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
                    <div class="ThePostHolder" id="ThisPostId_'.$cnt.'" onmouseover=""  >
                        
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
                                <a href="../'.$poster_name.'" class="PosterUserLink" >  '.$poster_name.' </a> 
		     ';
	           echo ' <div class="OfficialCaption">
                                    '. ($post_feel).'
                                </div>'; 
	     echo '
		      
                            </div>
                           ';
	     
               }else
               {
	 echo '             <div class="PosterName">
                                <a href="../'.$poster_user_name.'" class="PosterUserLink" >  '.$poster_name.' </a> ';
	               if(!empty($post_feel))
	               {
		     if($officiale==1)
		     {
		            echo ' <div class="OfficialCaption">
                                    '.  ($post_feel).'
                                </div>';
		           
		     }else
		     {
		             echo ' <span class="PosterFeeling"><font color="grey">'.  htmlentities($post_feel).'</font> <span class="postFeelType"> while posting </span> </span>
                               ';  
		     }
		  
	               }
	               if(!empty($post_feel) && !empty($post_feelwhile))
	               {
		echo '<span class="PF_and">&</span> 
		        <span class="PosterFeeling"> '.htmlentities($post_feelwhile).'<span class="postFeelType"> by posting </span> </span>
                               
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
		
		   for($t=2;$t<=count($with_ppl_name);$t++)
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
	      echo ' <div class="ThePostCaption">';  
	      if($officiale!=1)
	 {
	        echo ''.($post_caption).'';
	 }else
	 {
	        if($post_caption!=="")
	        {
	        echo '  <div class="OfficialPostCaption"> 
                                  '.$post_caption.' 
                                </div>';     
	           echo '<input type="hidden" value="1" id="switch_post'.$tot_num_post.'" />';
	     
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
                        
                        <div class="ThePostMediaHolder" id="post_media'.$tot_num_post.'" onclick="$(\'#TheWhatsUpAuditorium\').fadeIn();$(\'#post_contents\').html($(\'#a_full_post'.$post_id.'\').clone()).fadeIn();$(\'#audi_tools'.$post_id.'\').fadeIn();$(\'#theaterActTools'.$post_id.'\').fadeIn();" >';
	        $tot_count=count($post_images)+count($post_pdfs)+count($post_files)+count($post_audios)+count($post_videos);
	       
	       echo '<input type="hidden" value="'.$tot_count.'" id="switch_post'.$tot_num_post.'" />';
	        
	        if(count($post_images)==1)
	        {
	               echo ' <img src="'.$post_images[1].'" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',1,'.$tot_num_post.')" class="img_ThePost" />';
	        }
	        if(count($post_images)==2)
	        {
	               echo '  <div class="doubleImgeHolder"   >
                                <div class="TPMH_DIH_First" style="background-image: url(\''.$post_images[1].'\');" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',1,'.$tot_num_post.')" ></div>
                                <div class="TPMH_DIH_First" style="background-image: url(\''.$post_images[2].'\')"  onclick="$(\'#wch_clkd\').val(2); nextcontent(2,'.$post_id.',2,'.$tot_num_post.')" ></div>
                               
                            </div>
                            ';
	        }
	        if(count($post_images)==3)
	        {
	              echo  '      <div class="tripleImgeHolder" onclick="$(\'#wch_clkd\').val(3);" >
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[1].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',1,'.$tot_num_post.')"></div>
                                <div class="TPMH_TIH_Holder">
                                    <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[2].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',2,'.$tot_num_post.')"></div>
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[3].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',3,'.$tot_num_post.')" ></div>
                                </div>
                                
                               
                            </div>';
	        }
	        if(count($post_images)==4)
	        {
	               echo '     <div class="fourseImgeHolder"  onclick="$(\'#wch_clkd\').val(4);" >
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[1].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',1,'.$tot_num_post.')"></div>
                                <div class="TPMH_TIH_Thrice_Holder">
                                    <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[2].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',2,'.$tot_num_post.')"></div>
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[3].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',3,'.$tot_num_post.')"></div>
                                <div class="TPMH_TIH_First" style="background-image: url(\''.$post_images[4].'\')" onclick="$(\'#wch_clkd\').val(1); nextcontent(1,'.$post_id.',4,'.$tot_num_post.')"></div>
                                </div>
                                
                               
                            </div>';
	        }
	        
	        if(count($post_videos)>0)
	        {
	               echo '<video preload="none" src="'.$post_videos[1].'" class="img_ThePost" preload="none" controls/></video>';
	        }
	        if(count($post_images==0) && count($post_videos==0))
	        {
	               if(count($post_audios)>0)
	               {
		echo '<audio src="'.$post_audo.'" preload="none" controls/></audio>';     
	               }
	               
	        }
	        if(count($post_pdfs)>0)
	        {
	                for($t=1;$t<=count($post_pdfs);$t++)
	              {
		   $cut_pdf=strpos($post_pdfs[$t],"postpdfs/")+9;
			    $pdf_name=  substr($post_pdfs[$t], $cut_pdf,strlen($post_pdfs[$t]));
                                                       
		echo '<div class="ThePostPdfFileNameHolder">
                                <div class="TP_PDF_Logo">
                                    PDF
                                </div>
                                <div class="TP_PDF_Dets">
                                    <div class="TP_PDF_Name">
		  '.$pdf_name.'    ';
		
		
		$tot=count($post_pdfs)-1;
		if(count($post_pdfs)>1)
		{
		       echo '<font color="blue">+ '.$tot.'pdfs</font>';
		}
		echo '
                                     </div>
                                    <a href="'.  htmlentities($post_pdfs[$t]).'"<div class="TP_PDF_size">
                                        <div class="TP_PDF_Preview">Preview</div>&nbsp;&nbsp;&nbsp; <div class="TP_PDF_download">Download</div>
                                    </div></a>
                                </div>
                                
                           ';    
		if($t>=1)
		{
		       break;
		}
	              }
	        }
	       
	              if(count($post_files)>0)
	              {
	           for($t=1;$t<=count($post_files);$t++)
	        {
	                  $cut_pdf=strpos($post_files[$t],"postfiles/")+9;
			    $pdf_name=  substr($post_files[$t], $cut_pdf,strlen($post_files[$t]));
                                                       
		echo '<div class="ThePostPdfFileNameHolder">
                                <div class="TP_PDF_Logo">
                                   File
                                </div>
                                <div class="TP_PDF_Dets">
                                    <div class="TP_PDF_Name">
		  '.$pdf_name.'    ';
		
		
		$tot=count($post_files)-1;
		if(count($post_files)>1)
		{
		       echo '<font color="blue">+ '.$tot.' files</font>';
		}
		echo '
                                     </div>
                                    <a href="'.  htmlentities($post_files[$t]).'"<div class="TP_PDF_size">
                                        <div class="TP_PDF_Preview">Preview</div>&nbsp;&nbsp;&nbsp; <div class="TP_PDF_download">Download</div>
                                    </div></a>
                                </div>
                                
                           ';  
	        }  
	              }
	    
	echo '<input type="hidden" value="" id="wch_clkd"/>';               
                       echo ' </div>
                        <div class="ThePostStatusHolder">
                            ';
	  if($likeres==1)
                        {
	         echo '<div class="TPSH_Itm">';
                        if($mylike==1)
                        {

                            echo '<img class="ico_PostResp" onclick="Likedone(1,\'#like'.$cnt.'\','.$post_id.','.$cnt.');incread_count(\'.like_cnt'.$post_id.'\',1)"  id="like'.$cnt.'" src="icons/post-sf-liked.png" alt="like"/> ';
                           
                        }else
                        {
                        echo '<img class="ico_PostResp" onclick="Likedone(1,\'#like'.$cnt.'\','.$post_id.','.$cnt.');incread_count(\'.like_cnt'.$post_id.'\',1)"  id="like'.$cnt.'" src="icons/post-sf-like.png" alt="like"/> ';

                        }
                        }
	       echo '</div>';
	       echo '<div class="TPSH_Itm">';
                        if($unlikeres==1)
                        {

                        if($myunlike==1)
                        {
                            
                            echo' <img class="ico_PostResp" onclick="Likedone(0,\'#unlike'.$cnt.'\','.$post_id.','.$cnt.');incread_count(\'.unlike_cnt'.$post_id.'\',0)"  id="unlike'.$cnt.'" src="icons/post-sf-unliked.png" alt="Unlike"/>';
                            
                        }else
                        {
                            
                            echo' <img class="ico_PostResp" onclick="Likedone(0,\'#unlike'.$cnt.'\','.$post_id.','.$cnt.');incread_count(\'.unlike_cnt'.$post_id.'\',0)"  id="unlike'.$cnt.'" src="icons/post-sf-unlike.png" alt="Unlike"/>
                            ';
                        }
                        }
	       echo '</div>';
                        if($rateres==1)
                        {
                            if($myrate==0)
                        {

                           echo'                        <div class="TPSH_Itm">
                                <img onclick="postRated(1,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated1" class="TP_rateIcons"  src="icons/post-sf-emptyRate.png" alt="rate1"/>
                                <img onclick="postRated(2,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated2"  class="TP_rateIcons" src="icons/post-sf-emptyRate.png" alt="rate2"/>
                                <img onclick="postRated(3,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated3"   class="TP_rateIcons" src="icons/post-sf-emptyRate.png" alt="rate3"/>
                                <img onclick="postRated(4,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated4"  class="TP_rateIcons" src="icons/post-sf-emptyRate.png" alt="rate4"/>
                                <img onclick="postRated(5,this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated5"  class="TP_rateIcons" src="icons/post-sf-emptyRate.png" alt="rate5"/>
                   
                            </div>
                        ';
                        }else
                        {

                                        echo'<div class="TPSH_Itm">';
                              for($nt=1;$nt<=$myrate;$nt++)
                                    {
                                        
                                       echo'<img class="TP_rateIcons" onclick="postRated('.$nt.',this.id,'.$post_id.','.$cnt.')" id="'.$cnt.'rated'.$nt.'" src="icons/post-Qrated-'.$myrate.'.png" alt="'.$myrate.'"/></span>';
                                 
                                    }
                                    for($nt=$myrate+1;$nt<=5;$nt++)
                                    {

                                        echo'<img class="TP_rateIcons" onclick="postRated('.$nt.',this.id,'.$post_id.','.$cnt.')"   id="'.$cnt.'rated'.$nt.'" src="icons/post-sf-emptyRate.png" alt="'.$myrate.'"/>';
                                    }
                                    echo'</div>';
                        }
                        }
                        
	       if($officiale==0)
	       {
	        if($cmntres==1)
	        {
	               
	 echo '    <div class="TPSH_Itm" onclick="ViewComment(\'#commentContentFull'.$cnt.'\')" >
                                <img src="icons/postSts/comments_2.png" />
                            </div>';
	        }
	       }else
	       {
	        
	 echo '         
                            <div class="TPSH_Itm" onclick="ViewComment(\'#commentContentFull'.$cnt.'\')" >
                                <img src="icons/postSts/comments_2.png" />
                            </div>';      
	       }
	       if($officiale==0)
	       {
	              if($dwnres==1)
	              {
		         echo '
                            <div class="TPSH_Itm" onclick="downloadpost('.$cnt.','.$post_id.')">
                                <img src="icons/post-media-download.png" />
                            </div>';
	              }
	       }else
	       {
	                       echo '
                            <div class="TPSH_Itm" onclick="downloadpost('.$cnt.','.$post_id.')">
                                <img src="icons/post-media-download.png" />
                            </div>';
	       }
	if($officiale==0)
	{
	       if($shareres==1)
	       {
	               echo '
                            <div class="TPSH_Itm" onclick="open_share_window('.$cnt.','.$post_id.')" >
                                <img src="icons/post-sf-share.png" />
                            </div>';
	       }
	}else
	{
	         echo '
                            <div class="TPSH_Itm" onclick="open_share_window('.$cnt.','.$post_id.')" >
                                <img src="icons/post-sf-share.png" />
                            </div>';
	}
	       
	
	 echo '
	           <div id="load_share_window">
	           <div id="for_share_widow" ></div>
                         </div>
	                 <input type="hidden" id="tot_cmnt_smiley'.$tot_cnt.'" value="1"/>
                        <div id="commentContentFull'.$cnt.'" class="commentContentFull">
	              <div class="newCommentHolder">
                            <span class="commentTitle" id="commentTitle'.$tot_cnt.'" title="Click to view All Comments" onclick="viewprecmnt(\'#previousComments'.$tot_cnt.'\','.$post_id.','.$tot_cnt.')">Comments &nbsp;&nbsp;&nbsp;<img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span><span id="refresh_cmnt'.$cnt.'" onclick="refresh_cmnt('.$post_id.',\'#previousComments'.$tot_cnt.'\',\''.$tot_cnt.'\')">New</span>
                                <form method="post">
                                    <input id="'.$tot_cnt.'sf-commentInput" class="sf-commentInput" type="text" placeholder="What do you think?" />
                                    <div style="display: inline-block">
                                        <input type="color" class="colorComment" id="'.$cnt.'colorComment" onchange="colortyped(\'#'.$cnt.'colorComment\',\'#sf-commentInput'.$cnt.'\')"/>
                                    <input type="button" onmouseover="mouseOnColorCmnt(1)" onmouseout="mouseOutColorCmnt(1)" onclick="$(\'#'.$cnt.'colorComment\').click();"  class="colorCmntIcon" id="colorCmntIcon" value="A"/>
                                    <input type="file" name="uploadme'.$cnt.'" class="attachCmnt" id="attachCmnt'.$tot_cnt.'" style="display:none" />
                                    
                                     <div class="forCmntTtArrowUtil" id="forCmntTtArrowUtil"></div>
                                    <div class="toolTipCmntUtils" id="toolTipCmntUtils">Add a color to your comment</div>
                                    
                                    </div>
                                     <div class="for_cmnt_smiley" style="display:none;" id="for_show_smiley'.$tot_cnt.'"></div>
                                   
                                    <div class="forCommentAdds" id="forCommentAdds'.$tot_cnt.'">
                                        <ol>
                                            <li ><img onclick="show_smileys(\''.$tot_cnt.'\',\''.$post_id.'\',\'#for_show_smiley'.$tot_cnt.'\')" onmouseover="mouseOnCmntAttch(1)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="icons/test-smiley.png" alt="smiley"/></li>
                                            <li><img onclick="$(\'.attachCmnt'.$cnt.'\').click();" onmouseover="mouseOnCmntAttch(2)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="icons/test-atch.png" alt="smiley"/></li>
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
	                <div class="previousComments" id="previousComments'.$tot_cnt.'">
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                   
	           <!-- post dets -->
	<script>$(document).ready(function()
{
       $(\'.TPRD_Itm\').click(function()
       {
           
              var its_id=this.id;
              
              var post_id=$(this).attr(\'name\');
              var ttl=$(this).attr(\'title\');
              var trgt="#"+its_id+"_"+ttl;
        
              var cut=its_id.indexOf(\'_PID\');
              var ctgry=its_id.substring(5,cut);
             var fmdt=new FormData();
             fmdt.append(\'ctgry\',ctgry);
             fmdt.append(\'post_id\',post_id);
             
                  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	   $(trgt).html(xmlhttp.responseText);
               $(trgt).html();
               //alert(xmlhttp.responseText);
              }
        }
        xmlhttp.open("post", "show_post_status.php?", true);
        xmlhttp.send(fmdt);
     
       });
});
</script>
<input type="hidden" value="1" id="wch_clkd"/>
                      <div class="ThePostRespDetHold" id="PostResponsePane_PID_'.$cnt.'" >
                            <div class="TPRD_Ttl">
                                Post Id :<span class="TPRD_PID">'.$post_id.'</span> 
                            </div>
                            <div class="TPRD_Itm" id="Post_Likers_PID" name="'.$post_id.'" title="'.$cnt.'" onclick="showPostLikers('.$cnt.')"  >
                                    <div class="TPRD_ItmInner">
                                        <div class="TPRD_RespCount" id="ThePostLikes">
                                        <span class="like_cnt'.$cnt.'" >'.$lc.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName" >
                                        Likes
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="TPRD_Itm">
                                    <div class="TPRD_ItmInner" >
                                    <div class="TPRD_RespCount" id="ThePostUnlikes" >
                                        <span class="unlike_cnt'.$cnt.'">'.$ulc.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName"  >
                                        Hates
                                    </div>
                                    </div>
                                  
                                </div>
                                <div class="TPRD_Itm"  id="Post_Raters_PID" title="'.$cnt.'" name="'.$post_id.'" onclick="showPostRaters('.$cnt.')">
                                    <div class="TPRD_ItmInner"   >
                                    <div class="TPRD_RespCount" >
                                        <img class="TPRD_RatedIcon" src="icons/post-rated-3.png" />
                                    </div>
                                    <div class="TPRD_RespItmName">
                                        Rating
                                    </div>
                                    </div>
                                   
                                </div>
                                <div class="TPRD_Itm" title="'.$cnt.'" id="Post_Commenters_PID" name="'.$post_id.'" onclick="showPostCommenters('.$cnt.')">
                                    <div class="TPRD_ItmInner"   >
                                    <div class="TPRD_RespCount" id="ThePostComments" >
                                       <span class="cmcnt'.$cnt.'">'.$cmcnt.'</span>
                                    </div>
                                    <div class="TPRD_RespItmName">
                                        Comments
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="TPRD_Itm" title="'.$cnt.'" id="Post_Sharers_PID" name="'.$post_id.'"  onclick="showPostSharers('.$cnt.')">
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
                         
                            
                        </div>
	       
	       <div class="ThePostPreviousResponders" id="Post_Raters_PID_'.$cnt.'"  >
                       
                        </div>
	       
                        <div class="ThePostPreviousResponders" id="Post_Commenters_PID_'.$cnt.'"  >
                            
                        </div>
	       
	       
	       <div class="ThePostPreviousResponders" id="Post_Sharers_PID_'.$cnt.'"  >
                            
                        </div>
	       
	       <div class="ThePostPreviousResponders" id="Post_Withers_PID_'.$cnt.'" >
                           
                        </div>
	      <div id="audi_tools'.$post_id.'">     
                    <div class="theaterPostDrivers" id="theaterActTools'.$post_id.'"  >
                        <div class="hideItThh" >
                            s
                        </div>
                        <div class="theaterCloser" onclick="$(\'#TheWhatsUpAuditorium\').fadeOut();">
                            X
                        </div>
                        <div class="theaterMaximizer" onclick="makeTheaterSemiFullScreen()" >
                            ><
                            <input type="hidden" value="0" id="isThtrFull" />
                        </div>
                        
                        <div class="theaterPrev" onclick="nextcontent(1,'.$post_id.',0,'.$tot_num_post.')">
                           Next
                        </div>
                        <div class="theaterNext" onclick="nextcontent(0,'.$post_id.',0,'.$tot_num_post.')">
                           Prev
                        </div>
                        <div class="hideItThh" >d</div>
                    </div>
                    <div class="theaterPostUtils">
                       
                        <div class="theaterUtilItm" onclick="makeTheaterImgZoomIn('.$post_id.')" >
                            +
                        </div>
                     
                        <div class="theaterUtilItm" onclick="makeTheaterImgZoomOut('.$post_id.')" >
                            -
                        </div>
                        <div class="theaterUtilItm" onclick="makeTheaterImgZoomClr('.$post_id.')"  style="font-size: 20px;" >
                           %
                        </div>
                    </div>
	   </div>
                        <div id="dwnresult" style="display:none"></div>
                          <div id="for_my_prevpost'.$cnt.'"></div>
                     </div>
                      ';
        }
        
        
                  
                                           $shr_ct=0;
                    $ulc=0;
$lc=0;
$dncnt=0;
$cmcnt=0;
$shrcnt=0;
$ratc=0;
                      $shr_ct=0;
                  $aps="SELECT post_id as pid,user_id as uid,allpeople as ap,share as shr,page_id as p,officiale as of_cl from post_permision where post_id=$post_id  ";
                        $runap=mysqli_query($dbc,$aps);
                        if($runap)
                        {
                            if(mysqli_num_rows($runap)>0)
                            {
                               
                           $tot_num_post= $cnt+1; 
                                while ($rowofap=mysqli_fetch_array($runap,MYSQLI_ASSOC))
                                {
                                   
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
                                    $allppl=$rowofap['ap'];
                                          if($share!=0 )
                                          {
                                                  
                                      $qshr="select post_id as p from post_share where share_id=$share";
		    $rshr=  mysqli_query($dbc, $qshr);
		    if($rshr)
		    {
		           if(mysqli_num_rows($rshr)>0)
		           {
			 $shr_row=  mysqli_fetch_array($rshr,MYSQLI_ASSOC);
			  echo '<script>alert(\'shr'.$post_id.'\')</script>';
                                        
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
                                                     
		        $qe="select med_img as m from small_pics where user_id=$poster_id";
			  $re=  mysqli_query($dbc, $qe);
			  if($re)
			  {
			         if(mysqli_num_rows($re)>0)
			         {
			                $rt=  mysqli_fetch_array($re,MYSQLI_ASSOC);
			                $p_pic=$rt['m'];
			         }else
			         {
			                $p_pic="icons/male.png";
			         }
			  }


                                        $imgc=0;
                                         $liked=0;
                                                            $mylike=0;
			         $pvs=0;
                                                                $myunlike=0;
                                                                $myrate=0;
			            
			              $q3="select like_userid as lu from post_status where post_id=$post_id ";
                                                     $r3=mysqli_query($dbc,$q3);
                                                     if($r3)
                                                     {

                                                        $lc=0;
                                                        while($rowlike=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                        {   
                                                            $lkc=$rowlike['lu'];
			        
                                                            if($lkc<=0)
                                                            {
                                                                
                                                            }else
                                                            {
                                                                $lc=$lc+1;
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
                                                     $sel_con="select post_caption as pcap,post_time as t,post_location as loc,post_feelings as fl,post_feeling_while as whl from postforall where post_id=$post_id";
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
                                                       
                                                        $post_time=$my_cont_row['t'];
                                                         }else
                                                         {
                                                                 $post_loc="";
                                                       $post_feel="";
                                                       $post_feelwhile="";
			    $post_time="";
			    $post_caption="";
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
			  
			
			  $post_images=array();
                                                     $qer="select post_image as img from post_images where post_id=$post_id";
                                                     $rer=  mysqli_query($dbc, $qer);
                                                     if($rer)
                                                     {
                                                         $ns=0;
                                                  
                                                         if(mysqli_num_rows($rer)>0)
                                                         {
                                                            while($img_row=  mysqli_fetch_array($rer,MYSQLI_ASSOC))
                                                            {
                                                                $ns=$ns+1;
                                                                $post_images[$ns]=$img_row['img'];
                                                   
                                                     
                                                    
                                                            }
                                                                
                                                    
                                                         }
                                                     }
                                                      
                                        $selppost="select post_audio as aud,post_video as v,post_file as fl,post_pdf as pdf from post_files where post_id=$post_id";
                                       
                                        $runselpost=mysqli_query($dbc,$selppost);
                                        if($runselpost)
                                        {
                                            $pdf_cnt=0;
                                                  $post_pdfs=array();
		                $post_files=array();
		                $post_videos=array();
		                $post_audios=array();
                                            if(mysqli_num_rows($runselpost)>0)
                                            {
                                                $n=0;
		              $file_cnt=0;
		               $aud_cnt=0;
		               $vid_cnt=0;
                                                while ($rowofcurpost=mysqli_fetch_array($runselpost,MYSQLI_ASSOC))
                                                {
                                                    $n=$n+1;
			 
                                                    $video_post=$rowofcurpost['v'];
                                                        $audio_post=$rowofcurpost['aud'];
                                                        $file=$rowofcurpost['fl'];
                                                       $pdf_file=$rowofcurpost['pdf'];
			    if(!empty($pdf_file))
			     {
			            $pdf_cnt=$pdf_cnt+1;
			            $post_pdfs[$pdf_cnt]=$pdf_file;
			     }
			     if(!empty($audio_post))
			     {
			            $aud_cnt=$aud_cnt+1;
			            $post_audios[$aud_cnt]=$audio_post;
			            
			     }
			     if(!empty($file))

			     {
			            $file_cnt=$file_cnt+1;
			            $post_files[$file_cnt]=$file;
			     }
			     if(!empty($video_post))
			     {
			            $vid_cnt=$vid_cnt+1;
			            $post_videos[$vid_cnt]=$video_post;
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
                                          
                                     
                                        $q="select allpeople as p,me as me,allrelation as ar,friends as f,family as fm,secret as cm,showonlyto as sh,hideeto as hd,me as m,special as spl from post_permision where post_id=$post_id";
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
                                            if($hd==1)
                                            {
			
                                            }else
                                            {
                                                      
                                        if($allppl==1 || $shonto==1 || $iam==1)
                                        {
                                        allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        }else
                                         {
                                            
                                            if($allrel==1)
                                            {
                                                 $q="select cu_id as c from contacts where cu_id=$poster_id and cu_id=$poster_id";
                                                $r=mysqli_query($dbc,$q);
                                                if($r)
                                                {
                                                    if(mysqli_num_rows($r)>0)
                                                    {
			         allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        
                                                    }
                                                }
                                            }else
                                            {
                                                        if($friends==1)
                                                        {
                                                            $qf="select cu_id as c from contacts where user_id=$poster_id and cu_id=$user_id and type='Friends'";
                                                            $rf=mysqli_query($dbc,$qf);
                                                            if($rf)
                                                            {
                                                                if(mysqli_num_rows($rf)>0)
                                                                {
                                                                    allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        
                                                                }else
                                                                {
                                                                    
                                                                }
                                                            }
                                                        }
                                                        if($family==1)
                                                        {
                                                            $qf="select cu_id as c from contacts where user_id=$poster_id and cu_id=$user_id and type='Family'";
                                                            $rf=mysqli_query($dbc,$qf);
                                                            if($rf)
                                                            {
                                                                if(mysqli_num_rows($rf)>0)
                                                                {
                                                                    allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        
                                                                }else
                                                                {
                                                                    
                                                                }
                                                            }
                                                        }
                                                        if($classmate==1)
                                                        {
                                                        $qf="select cu_id as c from contacts where user_id=$poster_id and cu_id=$user_id and type='Classmates'";
                                                            $rf=mysqli_query($dbc,$qf);
                                                            if($rf)
                                                            {
                                                                if(mysqli_num_rows($rf)>0)
                                                                {
                                                                    allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        
                                                                }else
                                                                {
                                                                    
                                                                }
                                                            }    
                                                        }
                                                        
                                                        if($special==1)
                                                        {
                                                            $qf="select cu_id as c from contacts where user_id=$poster_id and cu_id=$user_id and type='Special'";
                                                            $rf=mysqli_query($dbc,$qf);
                                                            if($rf)
                                                            {
                                                                if(mysqli_num_rows($rf)>0)
                                                                {
                                                                    allpost($post_pdfs,$post_audios,$post_files,$post_videos,$shared_name,$shared_user_name,$shared_time,$post_images,$pvs,$post_loc,$post_feel,$post_feelwhile,$officiale,$with_ppl_user_name,$with_ppl_name,$poster_user_name,$p_pic,$post_id,$poster_id,$post_caption,$post_time,$poster_name,$imgc,$pdfcnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$ctgry,$discr,$shared_with_userid,$shared_to_me,$c_name,$shared_userid,$tot_num_post, $next_postid,$prev_postid,$page_name,$my_category,$page_id,$tot_cnt);
                                        
                                                                }else
                                                                {
                                                                    
                                                                }
                                                            }
                                                        }
                                            }
                                            
                                        
                                }
                                            }
                                       
                                }
                            }
                        }
	     
	       	       
        
}
?>