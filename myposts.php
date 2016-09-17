
   <?php session_start(); 
 
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
     require 'mysqli_connect.php';
$ulc=0;
$lc=0;
$dncnt=0;
$cmcnt=0;
$shrcnt=0;
$ratc=0;
   
     $sun="select first_name as fname from basic where user_id=$user_id";
        $rsun=mysqli_query($dbc,$sun);
        if($rsun)
        {
            if(mysqli_num_rows($rsun)>0)
            {
                $rowfn=mysqli_fetch_array($rsun,MYSQLI_ASSOC);
                $firstname=$rowfn['fname'];
              
             
            }else{
            
                $firstname="";
                header("location:confirmreg1.php");
            }
        }else{
           
        }
        $spp="select own_pic as pic from profile_pics where own_user_id=$user_id";
        $rpp=mysqli_query($dbc,$spp);
        if($rpp){
        if(mysqli_num_rows($rpp)>0)
        {
            $row=mysqli_fetch_array($rpp,MYSQLI_ASSOC);
           
                $ppics=$row['pic'];
           
        }
        else{
            echo 'empty pic';
             $ppics="";
           
        }
        
        }
        else{
            echo 'not run profile pic';
        }
        
        

                        
                  function allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers)
                                  {  echo'   
                       <div id="postWhole'.$cnt.'" class="postWhole">
                         <div id="forFullScreenMedia'.$cnt.'" class="forFullScreenMedia" onclick="closetip(this.id,\'#decBackground'.$cnt.'\')">
                                     <span id="closePreview" onclick="closetip(\'#forFullScreenMedia'.$cnt.'\')">
                                 X &nbsp;&nbsp;Close
                             </span>
                                     <div id="fullScreenMediaContent'.$cnt.'">
                                     <img id="FullScreenMedia'.$cnt.'" class="FullScreenMedia"  alt="'.$poster_name.'" src="'.$post_image1.'" title="Click to Close"/> 
                                     </div>
                                 </div>
                                                                         <!-- <div id="decBackground'.$cnt.'" class="decBackground">  </div>-->
                        <!-- for preview media -->
                         <div class="openMediaPeview" id="openPreviewMedia1'.$cnt.'" onclick="closecmnt('.$cnt.')">
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
                                 <div id="postUser'.$cnt.'" class="postUser">
                                     <span id="postUserName"> &nbsp; &nbsp; '.$poster_name.' </span><span id="postTime">'.$post_time.'</span>
                                     <img onclick="whoAreThey(\'#postLikers'.$cnt.'\')"  id="postStatusLike" src="icons/post-sf-liked.png" alt="Likes"/>
                                    <span onclick="whoAreThey(\'#postLikers'.$cnt.'\')" class="likeCount" id="post-sf-currentLike">'.$lc.'</span>
                                    <img  id="postStatusLike" src="icons/post-sf-unliked.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">'.$ulc.'</span>
                                    <img onclick="whoAreThey(\'#postRatings'.$cnt.'\')" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Rates"/><span onclick="whoAreThey(\'.postRatings\')" class="rateCount" id="post-sf-currentRate">'.$ratc.'</span>
                                    <button id="postprevbtn'.$cnt.'" class="postprevbtn" onclick="nextcontent(0,7,'.$post_id.','.$cnt.')"><</button><button id="postnextbtn'.$cnt.'" class="postnextbtn" onclick="nextcontent(1,7,'.$post_id.','.$cnt.')">></button>
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
                                <img onclick="postRated(1,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate1user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"   id="sf-rateIcon"  class="'.$cnt.'rated1" src="icons/post-sf-emptyRate.png" alt="rate1"/>
                                <img onclick="postRated(2,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate2user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated2" src="icons/post-sf-emptyRate.png" alt="rate2"/>
                                <img onclick="postRated(3,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate3user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"   class="'.$cnt.'rated3" src="icons/post-sf-emptyRate.png" alt="rate3"/>
                                <img onclick="postRated(4,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate4user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated4" src="icons/post-sf-emptyRate.png" alt="rate4"/>
                                <img onclick="postRated(5,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate5user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated5" src="icons/post-sf-emptyRate.png" alt="rate5"/></span>';
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
                                       echo'<img onclick="postRated('.$nt.',this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$myr.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated'.$nt.'" src="icons/post-Qrated-'.$myrate.'.png" alt="'.$myrate.'"/></span>';
                                 
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
                                        echo'<img onclick="postRated('.$nt.',this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$myr.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated'.$nt.'" src="icons/post-sf-emptyRate.png" alt="'.$myrate.'"/></span>';
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
                                   echo'<img id="sf-CommentIcon'.$cnt.'" class="sf-CommentIcon"  onclick="ViewComment(\'#commentContentFull'.$cnt.'\')" src="icons/post-sf-comment.png" alt="comment"/>';
                             
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
                         </div>
                        <!-- preview ends-->
                        <!-- default screen content starts-->
                        <div id="postContentMain'.$cnt.'" class="postContentMain"  >
                             <div id="postDetailImps'.$cnt.'" class="postDetailImps">
                                
                                    <img onmousemove="whoAreThey(\'like\',\'#whichppllike'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" onmouseout="hidewhothey(\'#whichppls'.$cnt.'\')" id="postStatusLike" src="icons/post-sf-sts-like.png" alt="Likes"/>
                                    <span  class="likeCount" id="post-sf-currentLike">'.$lc.'</span>
                                    <img  onmousemove="whoAreThey(\'unlike\',\'#whichpplunlike'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" src="icons/post-sf-sts-unlike.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">'.$ulc.'</span>
                                    <img onmousemove="whoAreThey(\'rate\',\'#whichpplrate'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" onmouseout="hidewhothey(\'#whichppls'.$cnt.'\')" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'.postRatings\')" class="rateCount" id="post-sf-currentRate">'.$ratc.'</span>
                                    <span id="forMore'.$cnt.'" class="formore" onclick="showMorePostDet(\'#postDetailImps'.$cnt.'\',\'#postDetail'.$cnt.'\')">></span>
                                    </div> 
                            
                            <div id="postDetail'.$cnt.'" class="postDetail" style="display: none">
                                
                                    <img onmouseover="whoAreThey(\'like\',\'#whichppllike'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" onmouseout="hidewhothey(\'#whichppls'.$cnt.'\')" id="postStatusLike" src="icons/post-sf-sts-like.png" alt="Likes"/>
                                    <span  class="likeCount" id="post-sf-currentLike">'.$lc.'</span>
                                    <img onmouseover="whoAreThey(\'unlike\',\'#whichppllike'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" id="postStatusLike" src="icons/post-sf-sts-unlike.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">'.$ulc.'</span>
                                    <img onmouseover="whoAreThey(\'rate\',\'#whichpplrate'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" onmouseout="hidewhothey(\'#whichppls'.$cnt.'\')" id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'.postRatings\')" class="rateCount" id="post-sf-currentRate">'.$ratc.'</span>
                                
                                    <img onmouseover="whoAreThey(\'download\',\'#whichppldwn'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')"  id="postStatusLike" src="icons/post-sf-sts-dwnld.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">'.$dncnt.'</span>
                                    <img  onmouseover="whoAreThey(\'comment\',\'#whichpplcmnt'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" id="postStatusLike" onmouseover="whoAreThey(\'postCommenters\')" onmouseout="hidewhothey(\'#whichppls'.$cnt.'\')" src="icons/post-sf-sts-comment.png" alt="Likes"/> <span class="unlikeCount" id="post-sf-currentUnlike">'.$cmcnt.'</span>
                                    <img onmouseover="whoAreThey(\'share\',\'#whichpplshr'.$cnt.'\',\'#wchppltitl'.$cnt.'\','.$post_id.','.$cnt.')" id="postStatusLike"  onmouseover="whoAreThey(\'postShares\')" onmouseout="hidewhothey(\'#whichppls'.$cnt.'\')" src="icons/post-sf-sts-share.png" alt="Likes"/>
                                    <span class="unlikeCount" id="post-sf-currentUnlike">'.$shrcnt.'</span>
                                     <span id="forMore"  onclick="showMorePostDet(\'#postDetail'.$cnt.'\',\'#postDetailImps'.$cnt.'\')">></span>
                                    </div> 
                               
                            <div id="postUser" onmouseout="$(\'#forPostMainDetailTt\').hide()">
                                <span id="postUserName" style="cursor: pointer;" onmouseover="$(\'.forPeopleSedfedTag\').show();$(\'#QuickPostAccess'.$cnt.'\').hide();" onmouseout="$(\'.forPeopleSedfedTag\').hide();"> '.$poster_name.' </span>
                                <div id="postTime" style="display: inline" onmouseover="mouseOnPostMainDet(\'#forPostMainDetailTt\',event,\'#postMainDetTtCont\',\'10 Mar 2015 - 10:30 PM\')" >'.$post_time.'</div>
                                <div style="display: inline" id="SedFedPostID" onmouseover="showSmeThngPost(\'#forSmethngCurPst\',\'#forPostMainDetailTt\')" onclick="//mouseOnPostMainDet(\'#forPostMainDetailTt\',event,\'#postMainDetTtCont\',\''.$post_id.' \')" onmouseout="$(\'#forSmethngCurPst\').hide()"><b>|</b>&nbsp;'.$post_id.'</div>
                                <div id="forSmethngCurPst" style="display: none;" onmouseover="$(\'#forSmethngCurPst\').css({\'display\':\'inline-block\'})" onmouseout="$(\'#forSmethngCurPst\').hide()">
                                    <div id="forSomeCurPostArrow"></div>
                                     <div id="somethingForCurPost">
                                         <div id="curPostId"> |'.$post_id.'</div>
                                    <ol>
                                        <li>Pin This Post</li><br/>
                                        <li>Add to my favorites</li><br/>
                                         <li>Send as Message</li><br/>
                                         <li>Report This Post</li><br/>
                                          <li>Add to Notice Board</li><br/> 
                                    </ol>
                                </div>
                                </div>
                                <div id="postDrivers" style="display: inline-block;">
                                        <div id="forPostDriverPrev" ><div id="forSingleLine"></div><div id="postDriverPrev" onclick="nextpost(1,'.$cnt.','.$post_id.')" ></div></div><div id="postDrivCur"></div>
                                        <div id="forPostDriverNext" ><div id="postDriverNext" onclick="nextpost(0,'.$cnt.','.$post_id.')"></div><div id="forSingleLine"></div></div>
                                        
</div>
                                <div id="forPostMainDetailTt">
                                    <div id="postMainDetTtAr"></div>
                                    <div id="postMainDetTtCont">Post ID:| '.$post_id.'</div>
                                </div>
                              <div id="forQuickProfileArrow"></div>
                              <div id="forPeopleSedfedTag'.$cnt.'" class="forPeopleSedfedTag" style="display:none" onmouseover="mouseOnSFTag(\'#forPeopleSedfedTag'.$cnt.'\')" onmouseout="mouseOutSFTag(\'Vijayakumar \',\'#SedFedUserName\',\'.forPeopleSedfedTag\',\'.forQPdmyDetails\')">
                                    
                                   
                                    <div id="forQPmyFirstApp" >
                                        <span id="SedFedUserName" >Vijayakumar </span><span id="SedFedUserAge">18+</span><br/>
                                    <div id="forQuickSFprofile" onmouseover="mouseOnQPsf(\'#forQuickSFprofile\')" onmouseout="mouseOutQPsf(\'#forQuickSFprofile\')">
                              <img onclick="Likedone(1,\'likebtnqp'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-likeIcon" class="likebtnqp'.$cnt.'" src="icons/post-sf-like.png" alt="like"/> <br/>';
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
                           echo' </div>
                                    <img  onmouseover="mouseOnQPface(\'Vijayakumar Vijay\',\'.SedFedUserName\',\'.forPeopleSedfedTag\',\'#forQuickSFprofile\',\'.forQPdmyDetails\')" onmouseout="mouseOutQPface(\'#forQuickSFprofile\')" id="SedFedUserFace" src="profileimg.png" alt="vijayakumar"/>
                                    <div id="forQPdmyDetails" class="forQPdmyDetails" onmouseover="mouseOnQPDet(\'.ttl\',\'.forQPdmyDetails\')" onmouseout="mouseOutQPDet(\'#ttl\')">
                                        <table>
                                            <tr>
                                                <td id="ttl1" style="display:none"><span id="forQPmyDetTtle">In</span></td><td><span id="forQPmyDetAns">Salem,Tamilnadu</span></td>
                                            </tr>
                                           
                                            <tr>
                                                 <td id="ttl2" style="display:none"><span id="forQPmyDetTtle">Feeling</span></td><td><span id="forQPmyDetAns">Busy</span></td>
                                               
                                            </tr>
                                           <!-- <tr>
                                                <td><span id="forQPmyDetTtle">Position</span></td><td><span id="forQPmyDetAns">Student</span></td>
                                            </tr>
                                            <tr>
                                                <td><span id="forQPmyDetTtle">Education</span></td><td><span id="forQPmyDetAns">Engineering</span></td> 
                                            </tr>
                                           -->
                                             <tr >
                                                 <td id="ttl3" style="display:none"><span id="forQPmyDetTtle">Status</span></td><td><span id="forQPmyDetAns">This status line should be 2 lines of words after...</span></td>
                                               
                                            </tr>
                                            <tr >
                                                <td id="ttl4" style="display:none"><span id="forQPmyDetTtle">About</span></td><td><span id="forQPmyDetAns">Silence is my Attitude Ever</span></td>
                                            </tr>
                                         
                                         </table>
                                    </div>
                                    
                                    </div>  
                                    
                                </div>   
                            </div>
                           <div id="postExtraWindow'.$cnt.'" class="postExtraWindow" style="display: none;">
                                <div id="xWindowTtle'.$cnt.'" class="xWindowTtle">Share This Post <div id="closeXwindow'.$cnt.'" class="closeXwindow" onclick="$(\'#postExtraWindow'.$cnt.'\').slideUp();"> X </div></div>
                                <div id="xWindowHint'.$cnt.'" class="xWindowHint">Share This Post with : <div id="xWindowDetails">Post ID :| '.$post_id.' </div></div>
                                <div id="holderXwindow'.$cnt.'" class="holderXwindow">
                                <div id="incontXwin'.$cnt.'" class="incontXwin">
                                    
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-friends'.$cnt.'\',\'#x-win-share-cntnr-fr'.$cnt.'\')">
                                        <input id="x-win-share-chk-friends'.$cnt.'" class="x-win-share-chk-friends" type="checkbox"  name="friends"  />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt" >Friends </div>
                                        <img src="icons/expnd-dwn.png"/>
                                    </div> 
                                     <div id="x-win-share-cntnr-fr'.$cnt.'"  style="display: none" class="x-win-share-cntnr">
                                            <form><input type="hidden" value="" class="pplshare">
                                                <input type="text" id="room'.$cnt.'" onclick="showtoshare('.$post_id.')" placeholder="Name of the Person You want to share"/>
                                                <div class="slctdshrppl"></div>
                                         </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-group'.$cnt.'\',\'#x-win-share-cntnr-gr'.$cnt.'\')">
                                       <input id="x-win-share-chk-group'.$cnt.'" class="x-win-share-chk-group" type="checkbox" name="friends" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt" >Group</div>
                                        <img src="icons/expnd-dwn.png"/>    
                                    </div>
                                        <div id="x-win-share-cntnr-gr'.$cnt.'"   style="display: none" class="x-win-share-cntnr">
                                            <div id="x-win-share-cnt-fr-tgt-123'.$cnt.'" class="x-win-share-cnt-fr-target">Sakthikanth<span id="removeShareTgt'.$cnt.'" class="removeShareTgt" onclick="$(\'#x-win-share-cnt-fr-tgt-123'.$cnt.'\').slideUp().remove();">X</span></div>
                                         <div id="x-win-share-cnt-fr-tgt-145'.$cnt.'" class="x-win-share-cnt-fr-target">Kirubakaran<span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-fr-tgt-145'.$cnt.'\').slideUp().remove();">X</span></div>
                                         
                                            <form>
                                                <input type="text" id="groups'.$cnt.'" placeholder="Name of the Group You want to share"/>
                                            </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-room'.$cnt.'\',\'#x-win-share-cntnr-rm'.$cnt.'\')">
                                        <input id="x-win-share-chk-room'.$cnt.'" class="x-win-share-chk-room" type="checkbox" name="friends" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt">Room</div>
                                         <img src="icons/expnd-dwn.png"/>   
                                    </div> 
                                        <div id="x-win-share-cntnr-rm'.$cnt.'" style="display: none" class="x-win-share-cntnr">
                                            <div id="x-win-share-cnt-fr-tgt-123'.$cnt.'" class="x-win-share-cnt-fr-target"><span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-fr-tgt-123\').slideUp().remove();">X</span></div>
                                         <div id="x-win-share-cnt-fr-tgt-145'.$cnt.'" class="x-win-share-cnt-fr-target"><span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-fr-tgt-145\').slideUp().remove();">X</span></div>
                                         
                                            <form>
                                                <input type="text" id="room'.$cnt.'" placeholder="Name of the Room You want to share"/>
                                            </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-specific'.$cnt.'\',\'#x-win-share-cntnr-sp'.$cnt.'\')">
                                        <input id="x-win-share-chk-specific'.$cnt.'" class="x-win-share-chk-specific" type="checkbox" name="friends" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt" >Specific</div>
                                         <img src="icons/expnd-dwn.png"/>    
                                    </div>
                                        <div id="x-win-share-cntnr-sp'.$cnt.'" class="x-win-share-cntnr-sp" style="display: none" class="x-win-share-cntnr">
                                            
                                            <div id="x-win-otherShares'.$cnt.'" class="x-win-otherShares">
                                                <div id="shareConsts'.$cnt.'" class="shareConsts">
                                     <div id="x-win-share-list-all'.$cnt.'" class="x-win-share-list-all" onclick="x_win_share(\'x-win-share-chk-all'.$cnt.'\',\'#x-win-share-cntnr-all'.$cnt.'\')">
                                        <input id="x-win-share-chk-all'.$cnt.'"  type="checkbox" />
                                        <div id="x-win-share-allTxt'.$cnt.'" class="x-win-share-allTxt">All People</div>
                                        
                                    </div> 
                                                  
                                    <div id="x-win-share-list-nb'.$cnt.'" class="x-win-share-list-nb" onclick="x_win_share(\'x-win-share-chk-nBoard\',\'#x-win-share-cntnr-nBoard\')">
                                        <input id="x-win-share-chk-nBoard'.$cnt.'" class="x-win-share-chk-nBoard" type="checkbox" name="nBoard" />
                                        <div id="x-win-share-allTxt'.$cnt.'" class="x-win-share-allTxt" >NoticeBoard</div>      
                               </div>
                                                </div>
                                                <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-plce'.$cnt.'\',\'#x-win-share-cntnr-plce'.$cnt.'\')">
                                        <input id="x-win-share-chk-plce'.$cnt.'" class="x-win-share-chk-plce" type="checkbox" name="place"  />
                                        <div id="x-win-share-frTxt" class="x-win-share-frTxt">Place </div>
                                        <img src="icons/expnd-dwn.png"/>
                                    </div> 
                                     <div id="x-win-share-cntnr-plce'.$cnt.'" class="x-win-share-cntnr-plce" style="display: none" class="x-win-share-cntnr">
                                           <form>
                                                <input type="text" placeholder="People ina" onclick="showtoshare(7)"/>
                                                <div class="slctdshrplc"></div>
                                            </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-speople'.$cnt.'\',\'#x-win-share-cntnr-speople'.$cnt.'\')">
                                       <input id="x-win-share-chk-speople'.$cnt.'" class="x-win-share-chk-speople" type="checkbox" name="speople" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt">Specific People</div>
                                        <img src="icons/expnd-dwn.png"/>    
                                    </div>
                                        <div id="x-win-share-cntnr-speople'.$cnt.'"  style="display: none" class="x-win-share-cntnr">
                                        <!--    <div id="x-win-share-cnt-speople-tgt-123'.$cnt.'" class="x-win-share-cnt-fr-target">Sakthikanth<span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-speople-tgt-123\').slideUp().remove();">X</span></div>
                                         <div id="x-win-share-cnt-speople-tgt-145'.$cnt.'" class="x-win-share-cnt-fr-target">Kirubakaran<span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-speople-tgt-145\').slideUp().remove();">X</span></div>
                                         
                                            <form>
                                                <input type="text" id="grpname'.$cnt.'" placeholder="Name of the Group You want to share"/>
                                            </form>-->
                                         <div id="xWinShareSpeople'.$cnt.'" class="xWinShareSpeople">
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem">
                                                 <input type="checkbox" id="male'.$cnt.'"/>
                                                 <div id="xWinShreSpITtle'.$cnt.'">Male</div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="female'.$cnt.'"/>
                                                 <div id="xWinShreSpITtle'.$cnt.'" class="xWinShreSpITtle">Female</div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="age'.$cnt.'"/>
                                                 <div id="xWinShreSpITtle'.$cnt.'" class="xWinShreSpITtle">Age Between  <input type="number" id="xWinShmnAge'.$cnt.'" class="xWinShmnAge"/> to <input id="xWinShmxAge'.$cnt.'" class="xWinShmxAge" type="number"/></div>
                                                
                                             </div>
                                            
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="statu'.$cnt.'"/>
                                                         <div id="xWinShreSpITtle'.$cnt.'" class="xWinShreSpITtle">Status <span id="xWinShareSps">
                                                      <select id="statuoption'.$cnt.'">
                                                         <option>Married</option>
                                                         <option>Unmarried</option>
                                                     </select>
                                                     </span>
                                                    
                                                      
                                                 </div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="position'.$cnt.'"/>
                                                         <div id="xWinShreSpITtle" class="xWinShreSpITtle">Position<span id="xWinShareSps">
                                                      <select id="positionoption'.$cnt.'">
                                                         <option>Student</option>
                                                         <option>Worker</option>
                                                     </select>
                                                     </span>
                                                 
                                                 </div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="mood'.$cnt.'"/>
                                                         <div id="xWinShreSpITtle">Mood<span id="xWinShareSps">
                                                      <select id="moodoption'.$cnt.'">
                                                         <option>Happy</option>
                                                         <option>Sad</option>
                                                     </select>
                                                     </span>
                                                 
                                                 </div>
                                             </div>
                                         </div>
                                        </div> 
                                    </div>
                                                
                                    </div>
                                        </div>
                               </div>
                                    
                                </div>
                            </div>
                                <div id="xWindowSubmit'.$cnt.'" class="xWindowSubmit" onclick="sharepost('.$post_id.','.$cnt.')">Share</div>
                        </div>
                          <!--  <div id="postTime" style="margin: 0px;padding-left: 15px">Sat 10:30</div>-->';
                              echo '<div id="withusersdiv">';
                            if($totwusers==1)
                            {
                                echo "$with1user ";
                            }
                            if($totwusers==2)
                            {
                                echo "$with1user ,$with2user";
                            }
                            if($totwusers==3)
                            {
                                echo "$with1user ,$with2user ,$with3user";
                            }
                            if($totwusers==4)
                            {
                                 echo "$with1user ,$with2user ,$with3user ,$with4user";
                            }
                            if($totwusers==5)
                            {
                                echo "$with1user ,$with2user ,$with3user ,$with4user ,$with5user";
                            }
                            if($totwusers>5)
                            {
                                $rmn=$totwusers-5;
                                echo "$with1user ,$with2user ,$with3user ,$with4user ,$with5user and $rmn others";
                            }

                            echo'</div>';
                          $cap=strlen(trim($post_caption));
                          $my=$post_caption;
                          if($cap>60)
                          {
                            $rt=0;
                         
                            echo '<div id="postCaption" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">'.$post_caption.'';
                            $c=0;
                            while($cap>0)
                            {
                                $c=$c+1;
                                $rt=$rt+60;
                               $cap1=substr($my,0,60);
                                $j=strlen($cap1);
                                $spc=trim($cap1);
                                $now=strlen($spc);

                                if($c==1)
                                {
                                   #echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$cap1  ";
                              
                                }else{
                                   # echo"<br/>$cap1";
                                }
                    
                                $my=substr($my,$j,$cap);
                                $t=strlen($my);
                        
                                $cap=strlen($my);
                                
                            }
                        
                                echo'</div>';
                          }else{
                            echo '<div id="postCaption" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)"><font id="p_caption"><br/>'.$post_caption.'  </font></div>';
                          }
                            
                      echo'  <!-- default media content starts-->
                                                    <!--<div id="navigatePost">
                                                              <span id="postPrev"><</span> <span id="postNext">></span></div>-->
                                                    
                        <!-- default media content starts-->
                        <div id="mediacontent">
                            <div id="QuickPostAccess'.$cnt.'" class="QuickPostAccess" >
                            <div class="forQuickPostAccArrow"></div>
                            <div id="forQuickPostAcc'.$cnt.'" class="forQuickPostAcc">';
                              if($likeres==1)
                        {

                        if($mylike==1)
                        {

                            echo '<img onclick="Likedone(1,\'like'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-likeIcon" class="like'.$cnt.'" src="icons/post-sf-liked.png" alt="like"/><br/>';
                           
                        }else
                        {
                        echo '<img onclick="Likedone(1,\'like'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-likeIcon" class="like'.$cnt.'" src="icons/post-sf-like.png" alt="like"/><br/>';

                        }
                        }else
                        {

                        }
                        if($unlikeres==1)
                        {

                        if($myunlike==1)
                        {
                            
                            echo' <img onclick="Likedone(0,\'unlike'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-unlikeIcon" class="unlike'.$cnt.'" src="icons/post-sf-unliked.png" alt="Unlike"/><br/>';
                            
                        }else
                        {
                            
                            echo'<img onclick="Likedone(0,\'unlike'.$cnt.'\','.$post_id.','.$cnt.')" id="sf-unlikeIcon" class="unlike'.$cnt.'" src="icons/post-sf-unlike.png" alt="Unlike"/><br/>';
                        }
                        }else
                        {

                        }
                        if($rateres==1)
                        {
                          echo ' <img onclick="postRated(33,this.class,'.$post_id.','.$cnt.')" id="quickpostrate1'.$cnt.'" class="quickpostrate1" src="icons/post-sf-emptyRate.png" alt="Likes"  style="height:20px;width: 20px;margin-left: 2px;margin-top: -9px;"/>';
                             
                        }else{
                            
                        }
                            echo ' 
                            </div>
                            </div>';
                            
                  if($imgc==1)
                  {
                     if($imgc==1 && $myvideo!==0)
                      {
                           echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="'.$post_image1.'" src="'.$post_image1.'"/>
                  ';
                      
                           echo '<video id="postvideo"  onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" alt="'.$myvideo.'" src="'.$myvideo.'" controls></video>
                  ';
                      }else{
                          
                       if($imgc==1 && $myaudio!==0)
                      {
                           echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="'.$post_image1.'" src="'.$post_image1.'"/>
                  ';
                      
                           echo '<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)""><audio id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" alt="'.$myaudio.'" src="'.$myaudio.'" controls></audio></div>
                  ';
                      }else{
                           echo '<img id="postImgs"  onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image1.'"/>
                  ';
                        
                      }
                        
                      }
                  }
                  if($imgc==2)
                  {
                      if($imgc==2 && $myvideo!==0)
                      {
                           echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="'.$post_image1.'" src="'.$post_image1.'"/>
                  ';
                          echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i2\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="'.$post_image2.'" src="'.$post_image2.'"/>
                  ';
                           echo '<video id="postvideo" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',1)" alt="'.$myvideo.'" src="'.$myvideo.'" controls></video>
                  ';
                      }else{
                          echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="'.$post_image1.'" src="'.$post_image1.'"/>
                  ';
                          echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i2\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="'.$post_image2.'" src="'.$post_image2.'"/>
                  ';
                      }
                       
                  }
                   if($imgc==3)
                  {
                        echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image1.'"/>
                  ';
                          echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i2\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image2.'"/>
                  ';
                                echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i3\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image3.'"/>
                  ';
                  }
                    if($imgc==4 || $imgc>4)
                  {
                        echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i1\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image1.'"/>
                  ';
                          echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i2\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image2.'"/>
                  ';
                                echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i3\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image3.'"/>
                  ';
                                echo '<img id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="nextcontent(\'i4\',\'#openPreviewMedia1'.$cnt.'\','.$post_id.','.$cnt.')" alt="caption" src="'.$post_image4.'"/>
                  ';
                  }
                  if($imgc==0)
                  {
                      if($myvideo!==0)
                      {
                          echo '<video id="postvideo"  onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" alt="'.$myvideo.'" src="'.$myvideo.'" controls></video>
                  ';
                      }else{
                          
                          if($myaudio!==0)
                          {
                              $audiname=substr($myaudio,21,strlen($myaudio));
                               echo '<div>'.$audiname.'</div>';
                                   echo '<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)""><audio id="postImgs" class="postimgs2" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" alt="'.$myaudio.'" src="'.$myaudio.'" controls></audio></div>
                  ';
                             
                          }else{
                              if($pdfcnt>0){
                              if($pdfcnt==1)
                              {
                                  if($filecnt==1)
                                  {
                                          $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                                 $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/fileformat/'.$f1_format.'.png" alt="'.$f1_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div><br/><br/>
                                        ';
                                    echo'</div>';
                                
                                  }else{
                                       if($filecnt==2)
                                       {
                                             $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                                 $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $file_name2=substr($post_file2,25,strlen($post_file2));
                                 
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 $f2_format=substr($file_name2,strlen($file_name2)-3,strlen($file_name2));
                                 
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/fileformat/'.$f1_format.'.png" width="150" alt="'.$f1_format.'" height="160"><br/>';
                                    echo ''.$post_file1.'</div>
                                        <div id="pdf3"><img src="icons/fileformat/'.$f2_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name2.'</div>
                                      ';
                                    echo'</div>'; }else{
                                           if($filecnt==3 || $filecnt==4 || $filecnt>4)
                                           {  
                                 $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                                 $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 $file_name2=substr($post_file2,25,strlen($post_file2));
                                 $f2_format=substr($file_name2,strlen($file_name2)-3,strlen($file_name2));
                                 $file_name3=substr($post_file3,25,strlen($post_file3));
                                 $f3_format=substr($file_name3,strlen($file_name3)-3,strlen($file_name3));
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/fileformat/'.$f1_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div>
                                        <div id="pdf3"><img src="icons/fileformat/'.$f2_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name2.'</div>
                                        <div id="pdf4"><img src="icons/fileformat/'.$f3_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name3.'</div>
                                              ';
                                    echo'</div>';
                                           }else{
                                               
                                       $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                         
                             
                                    echo'<br/><br/><div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)"><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div></div>';
                                     
                                               
                                           }
                                       }
                            
                                  }
                                   }
                                if($pdfcnt==2)
                              {
                                    if($filecnt==1)
                                  {
                                           $pdf_name1=substr($post_pdf1,25,strlen($post_pdf2));
                                 $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                                 $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $f1_format=$file_name1=substr($post_file3,25,strlen($post_file1));
                                 
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div>
                                        <div id="pdf3"><img src="icons/'.$f1_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div>
                                        ';
                                
                                  }else{
                                       if($filecnt==2)
                                       {
                              $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                                 $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                                 $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $file_name2=substr($post_file2,25,strlen($post_file2));
                                  $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 $f2_format=substr($file_name2,strlen($file_name2)-3,strlen($file_name2));
                           
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div>
                                        <div id="pdf3"><img src="icons/fileformat/'.$f1_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div>
                                        <div id="pdf4"><img src="icons/fileformat/'.$f2_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name2.'</div>
                                              ';
                                    echo'</div>';  
                                    
                                       }else{
                                                $pdf_name1=substr($post_pdf1,25,strlen($post_pdf2));
                                 $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                                 $pdf_name3=substr($post_pdf3,25,strlen($post_pdf3));
                                 $pdf_name4=substr($post_pdf4,25,strlen($post_pdf4));
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div>
                                       
                                              ';
                                    echo'</div>';
                                       }
                                  }
                                    /* $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                         
                             $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                            
                                    echo'<br/><br/><div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"><div id="pdf1"><img src="icons/pdf.png"width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png"width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div></div>';*/
                                  
                                  
                              }
                            
                              if($pdfcnt==3)
                              {
                                    
                                 if($filecnt>0)
                                 {     $pdf_name1=substr($post_pdf1,25,strlen($post_pdf1));
                                 $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                                 $pdf_name3=substr($post_pdf3,25,strlen($post_pdf3));
                            $file_name1=substr($post_file1,25,strlen($post_file1));
                            $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 
                               echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div>
                                        <div id="pdf3"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name3.'</div>
                                        <div id="pdf4"><img src="icons/fileformat/'.$f1_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div>
                                              ';
                                    echo'</div>';  
                                     
                                 }else{
                                     $pdf_name1=substr($post_pdf1,25,strlen($post_pdf2));
                                 $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                                 $pdf_name3=substr($post_pdf3,25,strlen($post_pdf3));
                            
                                    echo'<br/><br/><div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)"><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div id="pdf3"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name3.'</div>
                              </div>';
                                    
                                 }
                                 
                               }
                              if($pdfcnt==4 || $pdfcnt>4)
                              {
                                  $pdf_name1=substr($post_pdf1,25,strlen($post_pdf2));
                                 $pdf_name2=substr($post_pdf2,25,strlen($post_pdf2));
                                 $pdf_name3=substr($post_pdf3,25,strlen($post_pdf3));
                                 $pdf_name4=substr($post_pdf4,25,strlen($post_pdf4));
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name1.'</div><div id="pdf2"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name2.'</div>
                                        <div id="pdf3"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name3.'</div>
                                        <div id="pdf4"><img src="icons/pdf.png" width="150" height="160"><br/>';
                                    echo ''.$pdf_name4.'</div>
                                              ';
                                    echo'</div>';
                                 
                              }
                          }else{
                              if($filecnt==1)
                                  { $file_name1=substr($post_file1,25,strlen($post_file1));
                                 
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 
                                     echo'<br/><br/><div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)"><div id="pdf1"><img src="icons/fileformat/'.$f1_format.'.png" height="160"><br/>';
                                    echo ''.$file_name1.'</div>
                                        
                                              </div>';
                                
                                  }else{
                                       if($filecnt==2)
                                       {
                                  $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $file_name2=substr($post_file2,25,strlen($post_file2));
                                 
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 $f2_format=substr($file_name2,strlen($file_name2)-3,strlen($file_name2));
                           
                                     echo'<br/><br/><div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)" onmousemove="mouseOnPostCap(\'#QuickPostAccess'.$cnt.'\',event)"><div id="pdf1"><img src="icons/fileformat/'.$f2_format.'.png" height="160"><br/>';
                                    echo ''.$file_name1.'</div><div id="pdf2"><img src="icons/fileformat/'.$f2_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name2.'</div>
                                        
                                              </div>'; }else{
                                           if($filecnt==3)
                                           {  
                                  $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 $file_name2=substr($post_file2,25,strlen($post_file2));
                                 $f2_format=substr($file_name2,strlen($file_name2)-3,strlen($file_name2));
                                 $file_name3=substr($post_file3,25,strlen($post_file3));
                                 $f3_format=substr($file_name3,strlen($file_name3)-3,strlen($file_name3));
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/fileformat/'.$f1_format.'.png" alt="'.$f1_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div><div id="pdf2"><img src="icons/fileformat/'.$f2_format.'.png" alt="'.$f2_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name2.'</div>
                                        <div id="pdf3"><img src="icons/fileformat/'.$f3_format.'.png" width="150" height="160"><br/>';
                                    echo ''.$file_name3.'</div>
                                        
                                              ';
                                    echo'</div>';
                                           }else{
                                            if($filecnt==4 || $filecnt>4)
                                            {
                                                
                                  $file_name1=substr($post_file1,25,strlen($post_file1));
                                 $f1_format=substr($file_name1,strlen($file_name1)-3,strlen($file_name1));
                                 $file_name2=substr($post_file2,25,strlen($post_file2));
                                 $f2_format=substr($file_name2,strlen($file_name2)-3,strlen($file_name2));
                                 $file_name3=substr($post_file3,25,strlen($post_file3));
                                 $f3_format=substr($file_name3,strlen($file_name3)-3,strlen($file_name3));
                                 $file_name4=substr($post_file4,25,strlen($post_file4));
                                 $f4_format=substr($file_name4,strlen($file_name4)-3,strlen($file_name4));
                          
                            echo'<div id="postpdfdiv" onclick="previewMedia(\'#openPreviewMedia1'.$cnt.'\','.$cnt.',this.src)"">';
                                    echo'<br/><br/><div id="pdf1"><img src="icons/fileformat/'.$f1_format.'.png" alt="'.$f1_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name1.'</div><div id="pdf2"><img src="icons/fileformat/'.$f2_format.'.png" alt="'.$f2_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name2.'</div>
                                        <div id="pdf3"><img src="icons/fileformat/'.$f3_format.'.png" alt="'.$f3_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name3.'</div>
                                        <div id="pdf4"><img src="icons/fileformat/'.$f4_format.'.png" alt="'.$f4_format.'" width="150" height="160"><br/>';
                                    echo ''.$file_name4.'</div>
                                              ';
                                    echo'</div>';
                                            }else{
                                                
                                            }
                                       }
                                       }
                            
                                  }
                                  
                          }
                          }
                       
                      }
                  }
                   
                       echo' </div>
                        
                        
                        
                        <!--media ended , about starts-->
                        <div id="aboutThisPost">';
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
                                <img onclick="postRated(1,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate1user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"   id="sf-rateIcon"  class="'.$cnt.'rated1" src="icons/post-sf-emptyRate.png" alt="rate1"/>
                                <img onclick="postRated(2,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate2user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated2" src="icons/post-sf-emptyRate.png" alt="rate2"/>
                                <img onclick="postRated(3,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate3user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"   class="'.$cnt.'rated3" src="icons/post-sf-emptyRate.png" alt="rate3"/>
                                <img onclick="postRated(4,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate4user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated4" src="icons/post-sf-emptyRate.png" alt="rate4"/>
                                <img onclick="postRated(5,this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$rate5user.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated5" src="icons/post-sf-emptyRate.png" alt="rate5"/></span>';
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
                                       echo'<img onclick="postRated('.$nt.',this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$myr.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated'.$nt.'" src="icons/post-Qrated-'.$myrate.'.png" alt="'.$myrate.'"/></span>';
                                 
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
                                        echo'<img onclick="postRated('.$nt.',this.class,'.$post_id.','.$cnt.')" onmouseover=" mouseOnPostDet1(\'#forPostDetailToolt'.$cnt.'\',\'#postDetailTtCont'.$cnt.'\',\''.$myr.'\',event)" onmouseout="$(\'#forPostDetailToolt'.$cnt.'\').hide();"  id="sf-rateIcon"  class="'.$cnt.'rated'.$nt.'" src="icons/post-sf-emptyRate.png" alt="'.$myrate.'"/></span>';
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
                                   echo'<img id="sf-CommentIcon'.$cnt.'" class="sf-CommentIcon"  onclick="ViewComment(\'#commentContentFull'.$cnt.'\')" src="icons/post-sf-comment.png" alt="comment"/>';
                             
                            }else
                            {

                            }
                            if($shareres==1)
                              {
                                echo' <img id="sf-shareIcon"  onclick="$(\'#postExtraWindow'.$cnt.'\').slideDown();" src="icons/post-sf-share.png" alt="share"/></span>';
                            
                              }else{

                              }  
                                 

                               
                           echo ' <div id="forPostDetailToolt'.$cnt.'" class="forPostDetailToolt">
                                <div id="postDetailTtAr"></div>
                                <div id="postDetailTtCont'.$cnt.'" class="postDetailTtCont">1000</div>
                            </div>
                        </div>
                        
                        <div class="commentContentFull" id="commentContentFull'.$cnt.'">
                            <span id="commentTitle'.$cnt.'" class="commentTitle" title="Click to view All Comments" onclick="viewprecmnt(\'#previousComments'.$cnt.'\','.$post_id.','.$cnt.')">Comments &nbsp;&nbsp;&nbsp;<img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span>
                                <form method="post">
                                    <input class="sf-commentInput" id="'.$cnt.'sf-commentInput" type="text" placeholder="What do you think?" />
                                    <div style="display: inline-block">
                                        <input type="color" id="'.$cnt.'colorComment" class="colorComment" onchange="colortyped(\'.colorComment\',\'.sf-commentInput\')"/>
                                    <input type="button" onmouseover="mouseOnColorCmnt(1)" onmouseout="mouseOutColorCmnt(1)" onclick="document.getElementById(\''.$cnt.'colorComment\').click();" id="colorCmntIcon" value="A"/>
                                    <input type="file" name="uploadme'.$cnt.'" id="attachCmnt'.$cnt.'" class="attachCmnt" style="display:none" />
                                    
                                     <div id="forCmntTtArrowUtil" class="forCmntTtArrowUtil"></div>
                                    <div id="toolTipCmntUtils" class="toolTipCmntUtils">Add a color to your comment</div>
                                    
                                    </div>
                                    <div id="forCommentAdds" class="forCommentAdds">
                                        <ol>
                                            <li ><img onclick="document.getElementById(\'attachCmnt'.$cnt.'\').click();" onmouseover="mouseOnCmntAttch(1)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="icons/test-smiley.png" alt="smiley"/></li>
                                            <li><img onclick="document.getElementById(\'attachCmnt'.$cnt.'\').click();" onmouseover="mouseOnCmntAttch(2)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="icons/test-atch.png" alt="smiley"/></li>
                                        </ol>
                                        <div id="forCmntArrow" class="forCmntArrow"></div>
                                        <div id="forCmntTtArrow" class="forCmntTtArrow"></div>
                                        <div id="toolTipCmntAdd" class="toolTipCmntAdd"> Add an Attachment</div>
                                    </div>
                                    
                                    <div style="display: inline">
                                    <input onmouseover="mouseOnColorCmnt(2)" onmouseout="mouseOutColorCmnt(2)" type="button" onclick="showOptions(\'.forCommentAdds\')" id="attachCmntIcon" value="A"/>
                                    <input id="submitCmnt" type="button" onclick="uploadcomment('.$post_id.','.$cnt.')" value="Comment"/>
                                    </div>
                                </form>
                                <div id="totlprevcmnts'.$cnt.' class="totlprevcmnts">
                            <div id="previousComments'.$cnt.'" class="previousComments">
                            
                                </div>
                                
                                </div>
                                
                            </div>
                          
                           
                            
                        
                        </div>
                       
                        </div>
                        <!-- for extra-->
                          <div id="postDetails'.$cnt.'" class="postDetails" >
                              <div id="whichppllike'.$cnt.'">
                                   <div id="wchppltitl'.$cnt.'" class="wchppltitl"></div>
                                       
                            <div class="postLikers"  id="usrsnames'.$cnt.'">
                        
                              
                            </div>
                            </div>
                      <div id="postRatings'.$cnt.'" class="postRatings">
                                <span class="postDetailHead" id="postDetailHead"> Ratings </span><span id="closewho'.$cnt.'" class="closewho" onclick="$(\'#postDetails'.$cnt.'\').hide();">X</span><hr/>
                              <div class="ratingHeads" id="ratingHeads" onclick="viewraters(5,'.$cnt.','.$post_id.',\'#5raters'.$cnt.'\')">5 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ('.$rate5user.') <span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="5raters'.$cnt.'" class="raterspans">
                              
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="viewraters(4,'.$cnt.','.$post_id.',\'#4raters'.$cnt.'\')">4 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ('.$rate4user.')<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span id="4raters'.$cnt.'"  class="raterspans">
                              
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="viewraters(3,'.$cnt.','.$post_id.',\'#3raters'.$cnt.'\')">3 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ('.$rate3user.')<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="3raters'.$cnt.'" class="raterspans">
                              
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="viewraters(2,'.$cnt.','.$post_id.',\'#2raters'.$cnt.'\')">2 Stars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ('.$rate2user.')<span class="dropIcon" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="2raters'.$cnt.'" class="raterspans">
                              
                              </span>
                              <div class="ratingHeads" id="ratingHeads" onclick="viewraters(1,'.$cnt.','.$post_id.',\'#1raters'.$cnt.'\')">1 Star  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ('.$rate1user.')<span class="" id="dropIcon"><img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span></div>
                              <span  id="1raters'.$cnt.'" class="raterspans">
                                  
                              </span>
                            </div>
                       
                        </div>
                      <!-- One Post Ended-->
                    <!--Between Space-->
                    <div id="spaceBetween">
                        This is a Space
                    </div>
                    <!--Ready for Next Post--> 
     
';
                  }
                  $cnt=0;
                
                  $aps="SELECT post_id as pid,user_id as uid,allpeople as ap from post_permision where user_id=$user_id order by post_pers_id desc  ";
                        $runap=mysqli_query($dbc,$aps);
                        if($runap)
                        {
                            if(mysqli_num_rows($runap)>0)
                            {
                                
                                while ($rowofap=mysqli_fetch_array($runap,MYSQLI_ASSOC))
                                {
                                    $cnt=$cnt+1;
                                    $post_id=$rowofap['pid'];
                                    $poster_id=$rowofap['uid'];
                                    $allppl=$rowofap['ap'];
                                    
                                        $with1user=0;
                                        $with2user=0;
                                        $with3user=0;
                                        $with4user=0;
                                        $with5user=0;
                                        $wppl="select withuser_id as wuid from post_forsomeppl where post_id=$post_id";
                                        $rwppl=mysqli_query($dbc,$wppl);
                                        if($rwppl)
                                        {
                                             $totwusers=0;
                                            if(mysqli_num_rows($rwppl)>0)
                                            {
                                               
                                                while($rowppl=mysqli_fetch_array($rwppl,MYSQLI_ASSOC))
                                                {
                                                    $withusers_id=$rowppl['wuid'];

                                                    if(!empty($withusers_id))
                                                    {
                                                        $totwusers=$totwusers+1;
                                                  
                                                     $name="select first_name as fname from basic where user_id=$withusers_id";
                                                     $unnm=mysqli_query($dbc,$name);
                                                     if($unnm)
                                                     {
                                                         if(mysqli_num_rows($unnm)>0)
                                                         {
                                                             $rowm=mysqli_fetch_array($unnm);
                                                             $users_name=$rowm['fname'];
                                                         }else{
                                                             $selmai="select email as em from users where user_id=$withusers_id";
                                                             $rnemail=mysqli_query($dbc,$selmai);
                                                             if($rnemail)
                                                             {
                                                                 $rowemai=mysqli_fetch_array($rnemail);
                                                                 $users_name=$rowemai['em'];
                                                             }
                                                         }
                                                     }
                                                     if($totwusers==1)
                                                     {
                                                        $with1user=$users_name;
                                                     }
                                                     if($totwusers==2)
                                                     {
                                                        $with2user=$users_name;
                                                     }
                                                     if($totwusers==3)
                                                     {
                                                        $with3user=$users_name;
                                                     }
                                                     if($totwusers==4)
                                                     {
                                                        $with4user=$users_name;
                                                     }if($totwusers==5)
                                                     {
                                                        $with5user=$users_name;
                                                     }
                                                    }

                                                }
                                            }
                                        }



                                        $imgc=0;
                                         $liked=0;
                                                            $mylike=0;
                                                                $myunlike=0;
                                                                $myrate=0;
                                        $me1="select like_userid as lk,unlike_userid as uk,rating as rt from post_status where post_id=$post_id and user_id=$user_id";
                                                        $rem1=mysqli_query($dbc,$me1);
                                                        if($rem1)
                                                        {
                                                           
                                                            if(mysqli_num_rows($rem1)>0)
                                                            {
                                                                $rows=mysqli_fetch_array($rem1,MYSQLI_ASSOC);
                                                                $mylike=$rows['lk'];
                                                                $myunlike=$rows['uk'];
                                                                $myrate=$rows['rt'];
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
                                                     $q3="select like_userid as lu from post_status where post_id=$post_id ";
                                                     $r3=mysqli_query($dbc,$q3);
                                                     if($r3)
                                                     {

                                                        $lc=0;
                                                        while($rowlike=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                        {   
                                                            $lkc=$rowlike['lu'];
                                                            if($lkc=="0")
                                                            {
                                                                
                                                            }else
                                                            {
                                                                $lc=$lc+1;
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
                                                     for($i=1;$i<=5;$i++)
                                                     {
                                                                       $rtc="select user_id from post_status where post_id=$post_id and rating='$i'";
                                                                       $tuntc=mysqli_query($dbc,$rtc);
                                                                       if($tuntc)
                                                                       {
                                                                        if(mysqli_num_rows($tuntc)>0)
                                                                        {
                                                                            $dt=0;
                                                                            while(mysqli_fetch_array($tuntc,MYSQLI_ASSOC))
                                                                            {
                                                                                
                                                                                $dt=$dt+1;
                                                                            }
                                                                            if($i==1)
                                                                            {
                                                                                $rate1user=$dt;
                                                                            }
                                                                            if($i==2)
                                                                            {
                                                                                $rate2user=$dt;
                                                                            }
                                                                            if($i==3)
                                                                            {
                                                                                $rate3user=$dt;
                                                                            }
                                                                            if($i==4)
                                                                            {
                                                                                $rate4user=$dt;
                                                                            }
                                                                            if($i==5)
                                                                            {
                                                                                $rate5user=$dt;
                                                                            }
                                                                            
                                                                        }else
                                                                        {
                                                                             if($i==1)
                                                                            {
                                                                                $rate1user=0;
                                                                            }
                                                                            if($i==2)
                                                                            {
                                                                                $rate2user=0;
                                                                            }
                                                                            
                                                                            if($i==3)
                                                                            {
                                                                                $rate3user=0;
                                                                            }
                                                                            if($i==4)
                                                                            {
                                                                                $rate4user=0;
                                                                            }
                                                                            if($i==5)
                                                                            {
                                                                                $rate5user=0;
                                                                            }

                                                                        }
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
                                                        }
                                                     }
                                        $selppost="select post_caption as pcap,post_video as video,post_audio as audio,post_pdf as pdf,post_feelings as feel,post_feeling_while as feelw,post_location as ploc,post_file as file ,post_time as time,post_image as pimg,post_audio as paudi,post_video as video from postforall where post_id=$post_id";
                                        $runselpost=mysqli_query($dbc,$selppost);
                                        if($runselpost)
                                        {
                                            if(mysqli_num_rows($runselpost)>0)
                                            {
                                                $n=0;
                                                while ($rowofcurpost=mysqli_fetch_array($runselpost,MYSQLI_ASSOC))
                                                {
                                                    $n=$n+1;
                                                    if($n==1)
                                                    {
                                                        $post_image1=0;
                                                        $post_image2=0;
                                                        $post_image3=0;
                                                        $post_image4=0;
                                                        $post_file1=0;
                                                        $post_file2=0;
                                                        $post_file3=0;
                                                        $post_file4=0;
                                                        $post_pdf1=0;
                                                        $post_pdf2=0;
                                                        $post_pdf3=0;
                                                        $post_pdf4=0;
                                                       $post_caption=$rowofcurpost['pcap'];
                                                       $post_loc=$rowofcurpost['ploc'];
                                                       $post_feel=$rowofcurpost['feel'];
                                                       $post_feelwhile=$rowofcurpost['feelw'];
                                                       
                                                        $post_time=$rowofcurpost['time'];
                                                    
                                                    }
                                                        $post_video[$n]=$rowofcurpost['video'];
                                                        $post_audio[$n]=$rowofcurpost['audio'];
                                                        $post_file[$n]=$rowofcurpost['file'];
                                                        $post_pdf[$n]=$rowofcurpost['pdf'];
                                                        $ns=0;
                                                     
                                                        if(!empty($post_video[$n]))
                                                        {
                                                            $myvideo=$post_video[$n];
                                                            $m=1;
                                                        }else{
                                                            $m=0;
                                                            if($m==1)
                                                            {
                                                                $myvideo=$myvideo;
                                                            }else{
                                                                $myvideo=0;
                                                            }
                                                        }
                                                        if(!empty($post_audio[$n]))
                                                        {
                                                            $myaudio=$post_audio[$n];
                                                            $k=1;
                                                        }else{
                                                            $k=0;
                                                            if($k==1)
                                                            {
                                                                $myaudio=$myaudio;
                                                            }else{
                                                                $myaudio=0;
                                                            }
                                                        }
                                                    $post_imag[$n]=$rowofcurpost['pimg'];
                                                    
                                                    if(!empty($post_file[$n]))
                                                    {
                                                        $filecnt=$filecnt+1;
                                                        if($filecnt==1)
                                                        {
                                                           $post_file1=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==2)
                                                        {
                                                           $post_file2=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==3)
                                                        {
                                                           $post_file3=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==4)
                                                        {
                                                           $post_file4=$post_file[$n];
                                                         
                                                        }
                                                        
                                                        
                                                    }else
                                                    {
                                                        if($filecnt==1)
                                                        {
                                                            $post_file1=$post_file1;
                                                        }
                                                        
                                                        if($filecnt==2)
                                                        {
                                                            $post_file2=$post_file2;
                                                        }
                                                         if($filecnt==3)
                                                        {
                                                           $post_file3=$post_file3;
                                                        }
                                                         if($filecnt==4)
                                                        {
                                                            $post_file4=$post_file4;
                                                        }
                                                        
                                                    }
                                                   
                                                    if(!empty($post_imag[$n]))
                                                    {
                                                        $imgc=$imgc+1;
                                                        if($imgc==1)
                                                        {
                                                           $post_image1=$post_imag[$n];
                                                         
                                                        }
                                                        if($imgc==2)
                                                        {
                                                            $post_image2=$post_imag[$n];
                                                        }
                                                        if($imgc==3)
                                                        {
                                                            $post_image3=$post_imag[$n];
                                                        }
                                                         if($imgc==4)
                                                        {
                                                            $post_image4=$post_imag[$n];
                                                        }
                                                        
                                                        
                                                    }else
                                                    {
                                                        if($imgc==1)
                                                        {
                                                            $post_image1=$post_image1;
                                                        }
                                                        
                                                        if($imgc==2)
                                                        {
                                                            $post_image2=$post_image2;
                                                        }
                                                         if($imgc==3)
                                                        {
                                                            $post_image3=$post_image3;
                                                        }
                                                         if($imgc==4 || $imgc>4)
                                                        {
                                                            $post_imag4=$post_image4;
                                                        }
                                                        
                                                    }
                                                    
                                                    
                                                     if(!empty($post_pdf[$n]))
                                                    {
                                                        $pdfcnt=$pdfcnt+1;
                                                        if($pdfcnt==1)
                                                        {
                                                           $post_pdf1=$post_pdf[$n];
                                                         
                                                        }
                                                        if($pdfcnt==2)
                                                        {
                                                            $post_pdf2=$post_pdf[$n];
                                                        }
                                                        if($pdfcnt==3)
                                                        {
                                                            $post_pdf3=$post_pdf[$n];
                                                        }
                                                         if($pdfcnt==4 || $pdfcnt>4)
                                                        {
                                                            $post_pdf4=$post_pdf[$n];
                                                        }
                                                        
                                                        
                                                    }
                                                    else
                                                    {
                                                        
                                                        
                                                        
                                                        if($pdfcnt==1)
                                                        {
                                                            $post_pdf1=$post_pdf1;
                                                        }
                                                        
                                                        if($pdfcnt==2)
                                                        {
                                                            $post_pdf2=$post_pdf2;
                                                        }
                                                         if($pdfcnt==3)
                                                        {
                                                            $post_pdf3=$post_pdf3;
                                                        }
                                                         if($pdfcnt==4 || $pdfcnt>4)
                                                        {
                                                            $post_pdf4=$post_pdf4;
                                                        }                                                        
                                                    }
                                                   
                                                  
                                                     $uname="select first_name as fname from basic where user_id=$poster_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $poster_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select email as em from users where user_id=$post_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $poster_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                  
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
                                        allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
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
                                                        allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                        
                        
                        $aps="SELECT post_id as pid,user_id as uid from post_forsomeppl where withuser_id=$user_id order by post_id desc  ";
                        $runap=mysqli_query($dbc,$aps);
                        if($runap)
                        {
                            if(mysqli_num_rows($runap)>0)
                            {
                               
                                while ($rowofap=mysqli_fetch_array($runap,MYSQLI_ASSOC))
                                {
                                    $cnt=$cnt+1;
                                    $post_id=$rowofap['pid'];
                                    $poster_id=$rowofap['uid'];
                                    
                                        $with1user=0;
                                        $with2user=0;
                                        $with3user=0;
                                        $with4user=0;
                                        $with5user=0;
                                        $wppl="select withuser_id as wuid from post_forsomeppl where post_id=$post_id";
                                        $rwppl=mysqli_query($dbc,$wppl);
                                        if($rwppl)
                                        {
                                             $totwusers=0;
                                            if(mysqli_num_rows($rwppl)>0)
                                            {
                                               
                                                while($rowppl=mysqli_fetch_array($rwppl,MYSQLI_ASSOC))
                                                {
                                                    $withusers_id=$rowppl['wuid'];

                                                    if(!empty($withusers_id))
                                                    {
                                                        $totwusers=$totwusers+1;
                                                  
                                                     $name="select first_name as fname from basic where user_id=$withusers_id";
                                                     $unnm=mysqli_query($dbc,$name);
                                                     if($unnm)
                                                     {
                                                         if(mysqli_num_rows($unnm)>0)
                                                         {
                                                             $rowm=mysqli_fetch_array($unnm);
                                                             $users_name=$rowm['fname'];
                                                         }else{
                                                             $selmai="select email as em from users where user_id=$withusers_id";
                                                             $rnemail=mysqli_query($dbc,$selmai);
                                                             if($rnemail)
                                                             {
                                                                 $rowemai=mysqli_fetch_array($rnemail);
                                                                 $users_name=$rowemai['em'];
                                                             }
                                                         }
                                                     }
                                                     if($totwusers==1)
                                                     {
                                                        $with1user=$users_name;
                                                     }
                                                     if($totwusers==2)
                                                     {
                                                        $with2user=$users_name;
                                                     }
                                                     if($totwusers==3)
                                                     {
                                                        $with3user=$users_name;
                                                     }
                                                     if($totwusers==4)
                                                     {
                                                        $with4user=$users_name;
                                                     }if($totwusers==5)
                                                     {
                                                        $with5user=$users_name;
                                                     }
                                                    }

                                                }
                                            }
                                        }



                                        $imgc=0;
                                         $liked=0;
                                                            $mylike=0;
                                                                $myunlike=0;
                                                                $myrate=0;
                                        $me1="select like_userid as lk,unlike_userid as uk,rating as rt from post_status where post_id=$post_id and user_id=$user_id";
                                                        $rem1=mysqli_query($dbc,$me1);
                                                        if($rem1)
                                                        {
                                                           
                                                            if(mysqli_num_rows($rem1)>0)
                                                            {
                                                                $rows=mysqli_fetch_array($rem1,MYSQLI_ASSOC);
                                                                $mylike=$rows['lk'];
                                                                $myunlike=$rows['uk'];
                                                                $myrate=$rows['rt'];
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
                                                     $q3="select like_userid as lu from post_status where post_id=$post_id ";
                                                     $r3=mysqli_query($dbc,$q3);
                                                     if($r3)
                                                     {

                                                        $lc=0;
                                                        while($rowlike=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                        {   
                                                            $lkc=$rowlike['lu'];
                                                            if($lkc=="0")
                                                            {
                                                                
                                                            }else
                                                            {
                                                                $lc=$lc+1;
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
                                                     for($i=1;$i<=5;$i++)
                                                     {
                                                                       $rtc="select user_id from post_status where post_id=$post_id and rating='$i'";
                                                                       $tuntc=mysqli_query($dbc,$rtc);
                                                                       if($tuntc)
                                                                       {
                                                                        if(mysqli_num_rows($tuntc)>0)
                                                                        {
                                                                            $dt=0;
                                                                            while(mysqli_fetch_array($tuntc,MYSQLI_ASSOC))
                                                                            {
                                                                                
                                                                                $dt=$dt+1;
                                                                            }
                                                                            if($i==1)
                                                                            {
                                                                                $rate1user=$dt;
                                                                            }
                                                                            if($i==2)
                                                                            {
                                                                                $rate2user=$dt;
                                                                            }
                                                                            if($i==3)
                                                                            {
                                                                                $rate3user=$dt;
                                                                            }
                                                                            if($i==4)
                                                                            {
                                                                                $rate4user=$dt;
                                                                            }
                                                                            if($i==5)
                                                                            {
                                                                                $rate5user=$dt;
                                                                            }
                                                                            
                                                                        }else
                                                                        {
                                                                             if($i==1)
                                                                            {
                                                                                $rate1user=0;
                                                                            }
                                                                            if($i==2)
                                                                            {
                                                                                $rate2user=0;
                                                                            }
                                                                            
                                                                            if($i==3)
                                                                            {
                                                                                $rate3user=0;
                                                                            }
                                                                            if($i==4)
                                                                            {
                                                                                $rate4user=0;
                                                                            }
                                                                            if($i==5)
                                                                            {
                                                                                $rate5user=0;
                                                                            }

                                                                        }
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
                                                        }
                                                     }
                                        $selppost="select post_caption as pcap,post_video as video,post_audio as audio,post_pdf as pdf,post_feelings as feel,post_feeling_while as feelw,post_location as ploc,post_file as file ,post_time as time,post_image as pimg,post_audio as paudi,post_video as video from postforall where post_id=$post_id";
                                        $runselpost=mysqli_query($dbc,$selppost);
                                        if($runselpost)
                                        {
                                            if(mysqli_num_rows($runselpost)>0)
                                            {
                                                $n=0;
                                                while ($rowofcurpost=mysqli_fetch_array($runselpost,MYSQLI_ASSOC))
                                                {
                                                    $n=$n+1;
                                                    if($n==1)
                                                    {
                                                        $post_image1=0;
                                                        $post_image2=0;
                                                        $post_image3=0;
                                                        $post_image4=0;
                                                        $post_file1=0;
                                                        $post_file2=0;
                                                        $post_file3=0;
                                                        $post_file4=0;
                                                        $post_pdf1=0;
                                                        $post_pdf2=0;
                                                        $post_pdf3=0;
                                                        $post_pdf4=0;
                                                       $post_caption=$rowofcurpost['pcap'];
                                                       $post_loc=$rowofcurpost['ploc'];
                                                       $post_feel=$rowofcurpost['feel'];
                                                       $post_feelwhile=$rowofcurpost['feelw'];
                                                       
                                                        $post_time=$rowofcurpost['time'];
                                                    
                                                    }
                                                        $post_video[$n]=$rowofcurpost['video'];
                                                        $post_audio[$n]=$rowofcurpost['audio'];
                                                        $post_file[$n]=$rowofcurpost['file'];
                                                        $post_pdf[$n]=$rowofcurpost['pdf'];
                                                        $ns=0;
                                                     
                                                        if(!empty($post_video[$n]))
                                                        {
                                                            $myvideo=$post_video[$n];
                                                            $m=1;
                                                        }else{
                                                            $m=0;
                                                            if($m==1)
                                                            {
                                                                $myvideo=$myvideo;
                                                            }else{
                                                                $myvideo=0;
                                                            }
                                                        }
                                                        if(!empty($post_audio[$n]))
                                                        {
                                                            $myaudio=$post_audio[$n];
                                                            $k=1;
                                                        }else{
                                                            $k=0;
                                                            if($k==1)
                                                            {
                                                                $myaudio=$myaudio;
                                                            }else{
                                                                $myaudio=0;
                                                            }
                                                        }
                                                    $post_imag[$n]=$rowofcurpost['pimg'];
                                                    
                                                    if(!empty($post_file[$n]))
                                                    {
                                                        $filecnt=$filecnt+1;
                                                        if($filecnt==1)
                                                        {
                                                           $post_file1=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==2)
                                                        {
                                                           $post_file2=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==3)
                                                        {
                                                           $post_file3=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==4)
                                                        {
                                                           $post_file4=$post_file[$n];
                                                         
                                                        }
                                                        
                                                        
                                                    }else
                                                    {
                                                        if($filecnt==1)
                                                        {
                                                            $post_file1=$post_file1;
                                                        }
                                                        
                                                        if($filecnt==2)
                                                        {
                                                            $post_file2=$post_file2;
                                                        }
                                                         if($filecnt==3)
                                                        {
                                                           $post_file3=$post_file3;
                                                        }
                                                         if($filecnt==4)
                                                        {
                                                            $post_file4=$post_file4;
                                                        }
                                                        
                                                    }
                                                   
                                                    if(!empty($post_imag[$n]))
                                                    {
                                                        $imgc=$imgc+1;
                                                        if($imgc==1)
                                                        {
                                                           $post_image1=$post_imag[$n];
                                                         
                                                        }
                                                        if($imgc==2)
                                                        {
                                                            $post_image2=$post_imag[$n];
                                                        }
                                                        if($imgc==3)
                                                        {
                                                            $post_image3=$post_imag[$n];
                                                        }
                                                         if($imgc==4)
                                                        {
                                                            $post_image4=$post_imag[$n];
                                                        }
                                                        
                                                        
                                                    }else
                                                    {
                                                        if($imgc==1)
                                                        {
                                                            $post_image1=$post_image1;
                                                        }
                                                        
                                                        if($imgc==2)
                                                        {
                                                            $post_image2=$post_image2;
                                                        }
                                                         if($imgc==3)
                                                        {
                                                            $post_image3=$post_image3;
                                                        }
                                                         if($imgc==4 || $imgc>4)
                                                        {
                                                            $post_imag4=$post_image4;
                                                        }
                                                        
                                                    }
                                                    
                                                    
                                                     if(!empty($post_pdf[$n]))
                                                    {
                                                        $pdfcnt=$pdfcnt+1;
                                                        if($pdfcnt==1)
                                                        {
                                                           $post_pdf1=$post_pdf[$n];
                                                         
                                                        }
                                                        if($pdfcnt==2)
                                                        {
                                                            $post_pdf2=$post_pdf[$n];
                                                        }
                                                        if($pdfcnt==3)
                                                        {
                                                            $post_pdf3=$post_pdf[$n];
                                                        }
                                                         if($pdfcnt==4 || $pdfcnt>4)
                                                        {
                                                            $post_pdf4=$post_pdf[$n];
                                                        }
                                                        
                                                        
                                                    }
                                                    else
                                                    {
                                                        
                                                        
                                                        
                                                        if($pdfcnt==1)
                                                        {
                                                            $post_pdf1=$post_pdf1;
                                                        }
                                                        
                                                        if($pdfcnt==2)
                                                        {
                                                            $post_pdf2=$post_pdf2;
                                                        }
                                                         if($pdfcnt==3)
                                                        {
                                                            $post_pdf3=$post_pdf3;
                                                        }
                                                         if($pdfcnt==4 || $pdfcnt>4)
                                                        {
                                                            $post_pdf4=$post_pdf4;
                                                        }                                                        
                                                    }
                                                   
                                                  
                                                     $uname="select first_name as fname from basic where user_id=$poster_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $poster_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select email as em from users where user_id=$post_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $poster_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                  
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
                                        allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
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
                                                        allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                        
                        
                        $aps="SELECT post_id as pid,user_id as uid from post_forsomeppl where showonlyto=$user_id order by post_id desc  ";
                        $runap=mysqli_query($dbc,$aps);
                        if($runap)
                        {
                            if(mysqli_num_rows($runap)>0)
                            {
                              
                                while ($rowofap=mysqli_fetch_array($runap,MYSQLI_ASSOC))
                                {
                                    $cnt=$cnt+1;
                                    $post_id=$rowofap['pid'];
                                    $poster_id=$rowofap['uid'];
                                    
                                        $with1user=0;
                                        $with2user=0;
                                        $with3user=0;
                                        $with4user=0;
                                        $with5user=0;
                                        $wppl="select withuser_id as wuid from post_forsomeppl where post_id=$post_id";
                                        $rwppl=mysqli_query($dbc,$wppl);
                                        if($rwppl)
                                        {
                                             $totwusers=0;
                                            if(mysqli_num_rows($rwppl)>0)
                                            {
                                               
                                                while($rowppl=mysqli_fetch_array($rwppl,MYSQLI_ASSOC))
                                                {
                                                    $withusers_id=$rowppl['wuid'];

                                                    if(!empty($withusers_id))
                                                    {
                                                        $totwusers=$totwusers+1;
                                                  
                                                     $name="select first_name as fname from basic where user_id=$withusers_id";
                                                     $unnm=mysqli_query($dbc,$name);
                                                     if($unnm)
                                                     {
                                                         if(mysqli_num_rows($unnm)>0)
                                                         {
                                                             $rowm=mysqli_fetch_array($unnm);
                                                             $users_name=$rowm['fname'];
                                                         }else{
                                                             $selmai="select email as em from users where user_id=$withusers_id";
                                                             $rnemail=mysqli_query($dbc,$selmai);
                                                             if($rnemail)
                                                             {
                                                                 $rowemai=mysqli_fetch_array($rnemail);
                                                                 $users_name=$rowemai['em'];
                                                             }
                                                         }
                                                     }
                                                     if($totwusers==1)
                                                     {
                                                        $with1user=$users_name;
                                                     }
                                                     if($totwusers==2)
                                                     {
                                                        $with2user=$users_name;
                                                     }
                                                     if($totwusers==3)
                                                     {
                                                        $with3user=$users_name;
                                                     }
                                                     if($totwusers==4)
                                                     {
                                                        $with4user=$users_name;
                                                     }if($totwusers==5)
                                                     {
                                                        $with5user=$users_name;
                                                     }
                                                    }

                                                }
                                            }
                                        }



                                        $imgc=0;
                                         $liked=0;
                                                            $mylike=0;
                                                                $myunlike=0;
                                                                $myrate=0;
                                        $me1="select like_userid as lk,unlike_userid as uk,rating as rt from post_status where post_id=$post_id and user_id=$user_id";
                                                        $rem1=mysqli_query($dbc,$me1);
                                                        if($rem1)
                                                        {
                                                           
                                                            if(mysqli_num_rows($rem1)>0)
                                                            {
                                                                $rows=mysqli_fetch_array($rem1,MYSQLI_ASSOC);
                                                                $mylike=$rows['lk'];
                                                                $myunlike=$rows['uk'];
                                                                $myrate=$rows['rt'];
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
                                                     $q3="select like_userid as lu from post_status where post_id=$post_id ";
                                                     $r3=mysqli_query($dbc,$q3);
                                                     if($r3)
                                                     {

                                                        $lc=0;
                                                        while($rowlike=mysqli_fetch_array($r3,MYSQLI_ASSOC))
                                                        {   
                                                            $lkc=$rowlike['lu'];
                                                            if($lkc=="0")
                                                            {
                                                                
                                                            }else
                                                            {
                                                                $lc=$lc+1;
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
                                                     for($i=1;$i<=5;$i++)
                                                     {
                                                                       $rtc="select user_id from post_status where post_id=$post_id and rating='$i'";
                                                                       $tuntc=mysqli_query($dbc,$rtc);
                                                                       if($tuntc)
                                                                       {
                                                                        if(mysqli_num_rows($tuntc)>0)
                                                                        {
                                                                            $dt=0;
                                                                            while(mysqli_fetch_array($tuntc,MYSQLI_ASSOC))
                                                                            {
                                                                                
                                                                                $dt=$dt+1;
                                                                            }
                                                                            if($i==1)
                                                                            {
                                                                                $rate1user=$dt;
                                                                            }
                                                                            if($i==2)
                                                                            {
                                                                                $rate2user=$dt;
                                                                            }
                                                                            if($i==3)
                                                                            {
                                                                                $rate3user=$dt;
                                                                            }
                                                                            if($i==4)
                                                                            {
                                                                                $rate4user=$dt;
                                                                            }
                                                                            if($i==5)
                                                                            {
                                                                                $rate5user=$dt;
                                                                            }
                                                                            
                                                                        }else
                                                                        {
                                                                             if($i==1)
                                                                            {
                                                                                $rate1user=0;
                                                                            }
                                                                            if($i==2)
                                                                            {
                                                                                $rate2user=0;
                                                                            }
                                                                            
                                                                            if($i==3)
                                                                            {
                                                                                $rate3user=0;
                                                                            }
                                                                            if($i==4)
                                                                            {
                                                                                $rate4user=0;
                                                                            }
                                                                            if($i==5)
                                                                            {
                                                                                $rate5user=0;
                                                                            }

                                                                        }
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
                                                        }
                                                     }
                                        $selppost="select post_caption as pcap,post_video as video,post_audio as audio,post_pdf as pdf,post_feelings as feel,post_feeling_while as feelw,post_location as ploc,post_file as file ,post_time as time,post_image as pimg,post_audio as paudi,post_video as video from postforall where post_id=$post_id";
                                        $runselpost=mysqli_query($dbc,$selppost);
                                        if($runselpost)
                                        {
                                            if(mysqli_num_rows($runselpost)>0)
                                            {
                                                $n=0;
                                                while ($rowofcurpost=mysqli_fetch_array($runselpost,MYSQLI_ASSOC))
                                                {
                                                    $n=$n+1;
                                                    if($n==1)
                                                    {
                                                        $post_image1=0;
                                                        $post_image2=0;
                                                        $post_image3=0;
                                                        $post_image4=0;
                                                        $post_file1=0;
                                                        $post_file2=0;
                                                        $post_file3=0;
                                                        $post_file4=0;
                                                        $post_pdf1=0;
                                                        $post_pdf2=0;
                                                        $post_pdf3=0;
                                                        $post_pdf4=0;
                                                       $post_caption=$rowofcurpost['pcap'];
                                                       $post_loc=$rowofcurpost['ploc'];
                                                       $post_feel=$rowofcurpost['feel'];
                                                       $post_feelwhile=$rowofcurpost['feelw'];
                                                       
                                                        $post_time=$rowofcurpost['time'];
                                                    
                                                    }
                                                        $post_video[$n]=$rowofcurpost['video'];
                                                        $post_audio[$n]=$rowofcurpost['audio'];
                                                        $post_file[$n]=$rowofcurpost['file'];
                                                        $post_pdf[$n]=$rowofcurpost['pdf'];
                                                        $ns=0;
                                                     
                                                        if(!empty($post_video[$n]))
                                                        {
                                                            $myvideo=$post_video[$n];
                                                            $m=1;
                                                        }else{
                                                            $m=0;
                                                            if($m==1)
                                                            {
                                                                $myvideo=$myvideo;
                                                            }else{
                                                                $myvideo=0;
                                                            }
                                                        }
                                                        if(!empty($post_audio[$n]))
                                                        {
                                                            $myaudio=$post_audio[$n];
                                                            $k=1;
                                                        }else{
                                                            $k=0;
                                                            if($k==1)
                                                            {
                                                                $myaudio=$myaudio;
                                                            }else{
                                                                $myaudio=0;
                                                            }
                                                        }
                                                    $post_imag[$n]=$rowofcurpost['pimg'];
                                                    
                                                    if(!empty($post_file[$n]))
                                                    {
                                                        $filecnt=$filecnt+1;
                                                        if($filecnt==1)
                                                        {
                                                           $post_file1=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==2)
                                                        {
                                                           $post_file2=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==3)
                                                        {
                                                           $post_file3=$post_file[$n];
                                                         
                                                        }
                                                         if($filecnt==4)
                                                        {
                                                           $post_file4=$post_file[$n];
                                                         
                                                        }
                                                        
                                                        
                                                    }else
                                                    {
                                                        if($filecnt==1)
                                                        {
                                                            $post_file1=$post_file1;
                                                        }
                                                        
                                                        if($filecnt==2)
                                                        {
                                                            $post_file2=$post_file2;
                                                        }
                                                         if($filecnt==3)
                                                        {
                                                           $post_file3=$post_file3;
                                                        }
                                                         if($filecnt==4)
                                                        {
                                                            $post_file4=$post_file4;
                                                        }
                                                        
                                                    }
                                                   
                                                    if(!empty($post_imag[$n]))
                                                    {
                                                        $imgc=$imgc+1;
                                                        if($imgc==1)
                                                        {
                                                           $post_image1=$post_imag[$n];
                                                         
                                                        }
                                                        if($imgc==2)
                                                        {
                                                            $post_image2=$post_imag[$n];
                                                        }
                                                        if($imgc==3)
                                                        {
                                                            $post_image3=$post_imag[$n];
                                                        }
                                                         if($imgc==4)
                                                        {
                                                            $post_image4=$post_imag[$n];
                                                        }
                                                        
                                                        
                                                    }else
                                                    {
                                                        if($imgc==1)
                                                        {
                                                            $post_image1=$post_image1;
                                                        }
                                                        
                                                        if($imgc==2)
                                                        {
                                                            $post_image2=$post_image2;
                                                        }
                                                         if($imgc==3)
                                                        {
                                                            $post_image3=$post_image3;
                                                        }
                                                         if($imgc==4 || $imgc>4)
                                                        {
                                                            $post_imag4=$post_image4;
                                                        }
                                                        
                                                    }
                                                    
                                                    
                                                     if(!empty($post_pdf[$n]))
                                                    {
                                                        $pdfcnt=$pdfcnt+1;
                                                        if($pdfcnt==1)
                                                        {
                                                           $post_pdf1=$post_pdf[$n];
                                                         
                                                        }
                                                        if($pdfcnt==2)
                                                        {
                                                            $post_pdf2=$post_pdf[$n];
                                                        }
                                                        if($pdfcnt==3)
                                                        {
                                                            $post_pdf3=$post_pdf[$n];
                                                        }
                                                         if($pdfcnt==4 || $pdfcnt>4)
                                                        {
                                                            $post_pdf4=$post_pdf[$n];
                                                        }
                                                        
                                                        
                                                    }
                                                    else
                                                    {
                                                        
                                                        
                                                        
                                                        if($pdfcnt==1)
                                                        {
                                                            $post_pdf1=$post_pdf1;
                                                        }
                                                        
                                                        if($pdfcnt==2)
                                                        {
                                                            $post_pdf2=$post_pdf2;
                                                        }
                                                         if($pdfcnt==3)
                                                        {
                                                            $post_pdf3=$post_pdf3;
                                                        }
                                                         if($pdfcnt==4 || $pdfcnt>4)
                                                        {
                                                            $post_pdf4=$post_pdf4;
                                                        }                                                        
                                                    }
                                                   
                                                  
                                                     $uname="select first_name as fname from basic where user_id=$poster_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $poster_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select email as em from users where user_id=$post_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $poster_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                  
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
                                        allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
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
                                                        allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                                                                    allpost($post_id,$poster_id,$post_caption,$myaudio,$myvideo,$post_pdf1,$post_pdf2,$post_pdf3,$post_pdf4,$post_time,$post_image1,$post_image2,$post_image3,$post_image4,$poster_name,$imgc,$pdfcnt,$post_file1,$post_file2,$post_file3,$post_file4,$filecnt,$cnt,$lc,$ulc,$ratc,$cmcnt,$dncnt,$shrcnt,$mylike,$myunlike,$myrate,$rate1user,$rate2user,$rate3user,$rate4user,$rate5user,$likeres,$unlikeres,$dwnres,$cmntres,$shareres,$rateres,$with1user,$with2user,$with3user,$with4user,$with5user,$totwusers);
                                        
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
                </div>
            </div>
      </body>
</html>

