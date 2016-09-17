<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $cnt=$_REQUEST['cnt'];

echo '<div class="openMediaPeview" id="openPreviewMedia1'.$cnt.'" onclick="closecmnt('.$cnt.')">
                             <span id="closePreview'.$cnt.'" class="closePreview" onclick="closetip(\'#openPreviewMedia1'.$cnt.'\',\'#decBackground'.$cnt.'\')">
                                 X &nbsp;&nbsp;Close
                             </span>
                             <div id="postPreviewDetails">
                                 
                                 <div id="details" class="details">
                                   <!-- <img onclick="whoAreThey(\'#postLikers\')" id="sf-likeIcon" src="icons/post-preview-like.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers\')" id="post-sf-currentLike"><span class="likeCount">'.$lc.'</span> People Likes This Post</span><br/>
                                    <img  id="sf-likeIcon" src="icons/post-preview-unlike.png" alt="Likes"/>
                                    <span id="post-sf-currentUnlike"> <span class="unlikeCount">100</span> People Hates This Post</span><br/>
                                    <img id="sf-likeIcon" src="icons/post-sf-sts-rate.png" alt="Likes"/>
                                    <span id="post-sf-currentRate"> &nbsp;&nbsp;<span class="rateCount">'.$ulc.'</span> people Rated this Post</span><br/>
                                    <img onclick="whoAreThey(\'comment\')" id="sf-likeIcon" src="icons/post-sf-comment.png" alt="like"/>
                                    <span onclick="whoAreThey(\'comment\')" id="post-sf-currentComments"> &nbsp;&nbsp;'.$cmcnt.' people Commented on this Post</span><br/>
                                -->
                                 </div>
                             </div>
                             <!--preview content starts-->
                             <div id="fullContent">
                                 <div id="postUser'.$cnt.'" class="postUser">';
                      if($shared_to_me==1)
                      {
                           echo'           <span id="postUserName"> &nbsp; &nbsp; '.$c_name.' </span><span id="postTime">'.$post_time.'</span>
                          ';
                      }else
                      {
                          echo'           <span id="postUserName"> &nbsp; &nbsp; '.$poster_name.' '.$shared_to_me.' </span><span id="postTime">'.$post_time.'</span>
                          ';
                      }
                                   echo'  <img onclick="whoAreThey(\'#postLikers'.$cnt.'\')"  id="postStatusLike" src="icons/post-sf-liked.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers'.$cnt.'\')" class="likeCount" id="post-sf-currentLike">'.$lc.'</span>
                                    <img  id="postStatusLike" src="icons/post-sf-unliked.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">'.$ulc.'</span>
                                    <img onclick="whoAreThey(\'#postRatings'.$cnt.'\')" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Rates"/><span onclick="whoAreThey(\'.postRatings\')" class="rateCount" id="post-sf-currentRate">'.$ratc.'</span>
                                    <button id="postprevbtn'.$cnt.'" class="postprevbtn" onclick="nextcontent(0,7,'.$post_id.','.$cnt.')"><</button><button id="postnextbtn'.$cnt.'" class="postnextbtn" onclick="nextcontent(1,7,'.$post_id.','.$cnt.')">></button>
                                        <input type="hidden" id="totvals'.$cnt.'" value="1" />
                                 </div>
                                 <div id="postPreviewCaption'.$cnt.'" class="postPreviewCaption">&nbsp;&nbsp;&nbsp; '.$post_caption.' </div>
                                 <div id="PostPreviewMediaContent'.$cnt.'" class="PostPreviewMediaContent">
                                 <img id="postImagePreview'.$cnt.'" class="postImagePreview"  alt="'.$poster_name.'" src="'.$post_image1.'"/>
                                 </div>
                                 <!--full screen preview Starts-->
                                 
                                 <!--full screen ends-->
                                 <!-- about of preview media-->
                                 <div class="aboutThisPost">';
                        if($likeres==1)
                        {

                        if($mylike==1)
                        {

                            echo '<span id="forPostLike"><img onclick="Likedone(1,\'like'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-likeIcon" class="like'.$cnt.'" src="icons/post-sf-liked.png" alt="like"/> ';
                           
                        }else
                        {
                        echo '<span id="forPostLike"><img onclick="Likedone(1,\'like'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-likeIcon" class="like'.$cnt.'" src="icons/post-sf-like.png" alt="like"/> ';

                        }
                        }else
                        {

                        }
                        if($unlikeres==1)
                        {

                        if($myunlike==1)
                        {
                            
                            echo' <img onclick="Likedone(0,\'unlike'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-unlikeIcon" class="unlike'.$cnt.'" src="icons/post-sf-unliked.png" alt="Unlike"/> </span>';
                            
                        }else
                        {
                            
                            echo' <img onclick="Likedone(0,\'unlike'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-unlikeIcon" class="unlike'.$cnt.'" src="icons/post-sf-unlike.png" alt="Unlike"/> </span>
                            ';
                        }
                        }else
                        {

                        }
                        if($rateres==1)
                        {
                            if($myrate==0)
                        {

                           echo' <span id="forPostRate">
                                <img onclick="postRated(1,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate1user.'\',event,'.$post_id.')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"   id="sf-rateIcon"  class="'.$cnt.'rated1" src="icons/post-sf-emptyRate.png" alt="rate1"/>
                                <img onclick="postRated(2,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate2user.'\',event,'.$post_id.')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated2" src="icons/post-sf-emptyRate.png" alt="rate2"/>
                                <img onclick="postRated(3,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate3user.'\',event,'.$post_id.')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"   class="'.$cnt.'rated3" src="icons/post-sf-emptyRate.png" alt="rate3"/>
                                <img onclick="postRated(4,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate4user.'\',event,'.$post_id.')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated4" src="icons/post-sf-emptyRate.png" alt="rate4"/>
                                <img onclick="postRated(5,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate5user.'\',event,'.$post_id.')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated5" src="icons/post-sf-emptyRate.png" alt="rate5"/></span>';
                        }else
                        {

                                        echo'<span id="forPostRate">';
                              for($nt=1;$nt<=$myrate;$nt++)
                                    {
                                        if($nt==1)
                                        {
                                            $myr=$rate1user;
                                        }

                                        if($nt==2)
                                        {
                                            $myr=$rate2user;
                                        }

                                        if($nt==3)
                                        {
                                            $myr=$rate3user;
                                        }

                                        if($nt==4)
                                        {
                                            $myr=$rate4user;
                                        }

                                        if($nt==5)
                                        {
                                            $myr=$rate5user;
                                        }
                                       echo'<img onclick="postRated('.$nt.',this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$myr.'\',event,\''.$post_id.'\')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated'.$nt.'" src="icons/post-Qrated-'.$myrate.'.png" alt="'.$myrate.'"/></span>';
                                 
                                    }
                                    for($nt=$myrate+1;$nt<=5;$nt++)
                                    {
                                        if($nt==1)
                                        {
                                            $myr=$rate1user;
                                        }

                                        if($nt==2)
                                        {
                                            $myr=$rate2user;
                                        }

                                        if($nt==3)
                                        {
                                            $myr=$rate3user;
                                        }

                                        if($nt==4)
                                        {
                                            $myr=$rate4user;
                                        }

                                        if($nt==5)
                                        {
                                            $myr=$rate5user;
                                        }
                                        echo'<img onclick="postRated('.$nt.',this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$myr.'\',event,\''.$post_id.'\')" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated'.$nt.'" src="icons/post-sf-emptyRate.png" alt="'.$myrate.'"/></span>';
                                    }
                                    echo'</span>';
                        }
                        }else
                        {

                        }
                        
                           echo'
                            <span id="forShare">';
                            if($dwnres==1)
                            {
                                echo'<img class="sf-CommentIcon" src="icons/post-media-download.png"  id="sf-CommentIcon'.$cnt.'"" onclick="downloadpost('.$cnt.','.$post_id.')"/>&nbsp;&nbsp;';
                            
                            }else
                            {

                            }
                            if($cmntres==1)
                            {
                                   echo'<img id="sf-CommentIcon'.$cnt.'" class="sf-CommentIcon"  onclick="ViewComment(\'.commentContentFull'.$cnt.'\')" src="icons/post-sf-comment.png" alt="comment"/>';
                             
                            }else
                            {

                            }
                            if($shareres==1)
                              {
                                echo' <img id="sf-shareIcon"  onclick="$(\'#postExtraWindow'.$cnt.'\').slideDown();" src="icons/post-sf-share.png" alt="share"/></span>';
                            
                              }else{

                              }  
                         
                            echo '<div id="forqckcmnt'.$cnt.'" class="forqckcmnt"></div>
                            
                        </div>
                             </div>
                         </div>';
                         }
                         ?>
                     