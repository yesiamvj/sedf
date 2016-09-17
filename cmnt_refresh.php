<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['my']))
{
        header("location:index.php");
}else{
    $post_id=$_REQUEST['p'];
    $user_id=$_SESSION['user_id'];
    $cnt=$_REQUEST['my'];
   
    require 'mysqli_connect.php';
    $q="select cmnt_id as c from cmnt_seen where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
              $et=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                $cmn_id=$et['c'];
        }else
        {
            $qr="select cmnt_id as c from post_comments where post_id=$post_id";
            $rr=  mysqli_query($dbc, $qr);
            if($rr)
            {
                $et=  mysqli_fetch_array($rr,MYSQLI_ASSOC);
                $cmn_id=$et['c'];
            }
        }
    }

    $q="SELECT comment_word as cmnt ,smiley as sm,cmnt_id as cid,comment_time as time,commenter_useri_d as uid,comment_media as media ,comment_color as clr from post_comments where post_id=$post_id and  cmnt_id>=$cmn_id and cmnt_id!=$cmn_id order by cmnt_id desc";
$r=mysqli_query($dbc,$q);
if($r)
{
    $n=0;
        if(mysqli_num_rows($r)>0)
        {
                while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
                {
                    $n=$n+1;

                        $comment=$row['cmnt'];
                        $cmnt_clr=$row['clr'];
                        $cmnt_media=$row['media'];
                        $cuid=$row['uid'];
                        $cmnt_time=$row['time'];
                        $cmnt_id=$row['cid'];
                        $smiley=$row['sm'];
$qs="select rate as r from comment_status where comment_id=$cmnt_id and user_id=$user_id";
                        $rs=mysqli_query($dbc,$qs);
                        if($rs)
                        {
                            $myr=0;
                            if(mysqli_num_rows($rs)>0)
                            {
                                $mr=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                                $myr=$mr['r'];
                            }
                        }
                        
                        $qs="select c_like_userid as cl,c_unlike_userid as cu,rate as cr,user_id as uid from comment_status where comment_id=$cmnt_id";
                        $rs=  mysqli_query($dbc, $qs);
                        if($rs)
                        {
                                 $cl=0;
                                $cul=0;
                                $crt=0;
                                $c_rate=0;
                                $my_like=0;
                                $my_unlike=0;
                                $my_rate=0;
                            if(mysqli_num_rows($rs)>0)
                            {

                                while($rot=  mysqli_fetch_array($rs,MYSQLI_ASSOC))
                                {
                                    $c_like=$rot['cl'];
                                    $c_unlike=$rot['cu'];
                                    $c_rate=$rot['cr'];
                                    $commenter_id=$rot['uid'];
                                    if($c_like!=0)
                                    {
                                       $cl=$cl+1;
                                       if($c_like==$user_id)
                                       {
                                           $my_like=1;
                                       }
                                    }
                                    if($c_unlike!==0)
                                    {
                                        $cul=$cul+1;
                                        if($c_unlike==$user_id)
                                        {
                                            $my_unlike=1;
                                        }
                                    }
                                    if($c_rate!==0)
                                    {
                                        $crt=$crt+1;
                                        if($commenter_id==$user_id)
                                        {
                                            $my_rate=1;
                                        }
                                    }
                                }
                            }
                        }
                     if($n==1)
                    {
                        $qe="select user_id as u from cmnt_seen where user_id=$user_id";

                        $re=mysqli_query($dbc,$qe);
                        if($re)
                        {
                            if(mysqli_num_rows($re)>0)
                            {
                                $qw="update cmnt_seen set cmnt_id=$cmnt_id where user_id=$user_id";
                                $rw=mysqli_query($dbc,$qw);

                            }else
                            {
                                $qr="insert into cmnt_seen (cmnt_id,user_id)values($cmnt_id,$user_id)";
                                $rr=  mysqli_query($dbc,$qr);
                                if($rr)
                                {

                                }else
                                {
                                    echo mysqli_error($dbc);
                                }
                            }
                        }else
                        {
                            echo mysqli_error($dbc);
                        }
                    }
           $uname="select first_name as fname from basic where user_id=$cuid";
                 $runnm=mysqli_query($dbc,$uname);
                 if($runnm)
                 {
                     if(mysqli_num_rows($runnm)>0)
                     {
                         $rownm=mysqli_fetch_array($runnm);
                         $commenter_name=$rownm['fname'];
                     }else{
                         $selemail="select email as em from users where user_id=$cuid";
                         $rinemail=mysqli_query($dbc,$selemail);
                         if($rinemail)
                         {
                             $rowemail=mysqli_fetch_array($rinemail);
                             $commenter_name=$rowemail['em'];
                         }
                     }
                 }
$f1_format=substr($cmnt_media,(strlen($cmnt_media)-3),strlen($cmnt_media));

    $quq="select username as u from users where user_id=$cuid";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                        echo'
                        
                         <div id="userCmntFull'.$post_id.'" class="userCmntFull" >
	               <div id="totlprevcmnts'.$post_id.'" class="totlprevcmnts"><img src="'.$p_pic.'" class="commenterFace" style="width:100px;height:100px;"/> 
                        <span id="commentUser'.$post_id.'" class="commentUser" >'.$commenter_name.'</span>&nbsp;&nbsp;&nbsp;<font id="timecmnt">'.$cmnt_time.'</font>
                             '.$cmnt_id.'
                        <div id="hisComment'.$post_id.'" class="hisComment">  ';
                                if(strlen($comment)>50)
                                {
                                        $comment1=substr($comment,0,60);
                                        echo'<span id="commentText" style="color: '.$cmnt_clr.';">'.$comment1.'</span><br/>';
                                        $comment=substr($comment,60,strlen($comment));
                                        echo'<span id="commentText" style="color: '.$cmnt_clr.';">'.$comment.'</span><br/>';

                                }else{
                                        echo'<span id="commentText" style="color: '.$cmnt_clr.';">'.$comment.'</span><br/>';

                                }


                            echo'<div class="commentImage">';
                            if(strlen($smiley)>0 && $smiley!="0")
                            {
                                echo'<img src="'.$smiley.'" style="max-width:35px;max-height:35px;"/>';
                            }else
                            {
                            }
                              if($f1_format=="png" || $f1_format=="jpg" || $f1_format=="gif" || $f1_format=="mp3" || $f1_format=="wav" || $f1_format=="ico" || $f1_format=="mid" || $f1_format=="mp4" || $f1_format=="mkv" || $f1_format=="jpeg" )
                             {
                                if($f1_format=="png" || $f1_format=="jpg" || $f1_format=="jpeg" || $f1_format=="gif" || $f1_format=="ico" )
                                {
                                            echo' <img class="cmntimg" src="'.$cmnt_media.'" alt="'.$cmnt_media.'"/>';

                                }
                                if($f1_format=="mp3" || $f1_format=="wav" || $f1_format=="mid")
                                {
                                        echo '<audio src="'.$cmnt_media.'" controls></audio>';
                                }
                                if($f1_format=="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
                                {
                                        echo '<video src="'.$cmnt_media.'" width="300" height="250" controls></video>';
                                }
                             }	
                                
                           echo' </div>
                            <div id="aboutThisComment">
                            <span id="forPostLike">';
                          
                           if($my_like==1)
                           {
                                echo'              <img onclick="commentlike(1,\''.$cnt.'sf-likeIcon'.$cmnt_id.'\','.$cmnt_id.','.$cnt.')" id="'.$cnt.'sf-likeIcon'.$cmnt_id.'" class="ico_PostResp" style="width:25px;height:25px" src="icons/post-sf-liked.png" alt="like"/> &nbsp;&nbsp;&nbsp;
             ';
                           }  else {
             echo'              <img onclick="commentlike(1,\''.$cnt.'sf-likeIcon'.$cmnt_id.'\','.$cmnt_id.','.$cnt.')" id="'.$cnt.'sf-likeIcon'.$cmnt_id.'" class="ico_PostResp" style="width:25px;height:25px" src="icons/post-sf-like.png" alt="like"/> &nbsp;&nbsp;&nbsp;
             ';                  
                         
                               
                           }
                            if($my_unlike==1)
                           {
                         echo'<img onclick="commentlike(0,\''.$cnt.'sf-unlikeIcon'.$cmnt_id.'\','.$cmnt_id.','.$cnt.')" class="ico_PostResp" id="'.$cnt.'sf-unlikeIcon'.$cmnt_id.'"  style="width:25px;height:25px" src="icons/post-sf-unliked.png" alt="like"/> </span>
                   ';      
                           }else
                           {
                         echo'<img onclick="commentlike(0,\''.$cnt.'sf-unlikeIcon'.$cmnt_id.'\','.$cmnt_id.','.$cnt.')" class="ico_PostResp" id="'.$cnt.'sf-unlikeIcon'.$cmnt_id.'"  style="width:25px;height:25px" src="icons/post-sf-unlike.png" alt="like"/> </span>
                   ';          
                           }
                           
                   echo'  <div class="TPSH_Itm">';
                  if($myr>0)
                   {
                       for($t=1;$t<=$myr;$t++)
                       {
                        echo' <img onclick="commentpostRated('.$t.',this.id,'.$cmnt_id.','.$cnt.')"     class="TP_rateIcons"  id="'.$cmnt_id.'rte'.$t.''.$cnt.'" src="icons/post-Qrated-'.$myr.'.png" alt="'.$myr.'"/>
                        ';   
                       }
                       for($t=$myr+1;$t<=5;$t++)
                       {
                            echo' <img onclick="commentpostRated('.$t.',this.id,'.$cmnt_id.','.$cnt.')"   class="TP_rateIcons"  id="'.$cmnt_id.'rte'.$t.''.$cnt.'" src="icons/post-sf-emptyRate.png" alt="rate"/>
                        ';
                       }
                   }else
                   {
                       echo' <img onclick="commentpostRated(1,this.id,'.$cmnt_id.','.$cnt.')" class="TP_rateIcons"  id="'.$cmnt_id.'rte1'.$cnt.'" src="icons/post-sf-emptyRate.png" alt="like"/>
                       
                        <img onclick="commentpostRated(2,this.id,'.$cmnt_id.','.$cnt.')" class="TP_rateIcons" id="'.$cmnt_id.'rte2'.$cnt.'" src="icons/post-sf-emptyRate.png" alt="like"/>
                        <img onclick="commentpostRated(3,this.id,'.$cmnt_id.','.$cnt.')" class="TP_rateIcons"   id="'.$cmnt_id.'rte3'.$cnt.'" src="icons/post-sf-emptyRate.png" alt="like"/>
                        <img onclick="commentpostRated(4,this.id,'.$cmnt_id.','.$cnt.')" class="TP_rateIcons"  id="'.$cmnt_id.'rte4'.$cnt.'" src="icons/post-sf-emptyRate.png" alt="like"/>
                        <img onclick="commentpostRated(5,this.id,'.$cmnt_id.','.$cnt.')" class="TP_rateIcons"  id="'.$cmnt_id.'rte5'.$cnt.'" src="icons/post-sf-emptyRate.png" alt="like"/>
                    ';
                   }
                   echo'    </div>
                         <span id="forCommentStatus">
                                    <img onclick="whoAreThey(\'.postLikers\')"  class="ico_PostResp" id="postStatusLike" src="icons/post-like-black.png" alt="Likes"/>
                            <span   class="ico_PostResp"  id="post-sf-currentLike">'.$cl.'</span>
                            <img  id="postStatusLike" class="ico_PostResp"  src="icons/post-unlike-black.png" alt="UnLikes"/>
                            <span class="unlikeCount" id="post-sf-currentUnlike">'.$cul.'</span>
                            <img  class="TP_rateIcons" class="ico_PostResp"  id="postStatusRate" src="icons/post-sf-sts-rate.png" alt="Likes"/><span onclick="whoAreThey(\'.postRatings\')" class="rateCount" id="post-sf-currentRate">'.$crt.'</span>

                                </span>

                </div>

                        </div>

                        </div>


                        </div>';
                    }

                }
            }else
            {
                echo "not ru quert";
            }


}

?>