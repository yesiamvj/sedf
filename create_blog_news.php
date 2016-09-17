
<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
    header("location:index.php");
 }else
 {
     $user_id=$_SESSION['user_id'];
     require 'mysqli_connect.php';
      $today = date("g:i a ,F j, Y"); 
    		 
     $news=  mysqli_real_escape_string($dbc,$_REQUEST['blog_news']);
     $color=$_REQUEST['color'];
     $bg_color=$_REQUEST['bgcolor'];
     
      $q="insert into blogs(user_id,blog_news,color,bg_color,created_time)values($user_id,'$news','$color','$bg_color','$today')";
      $r=  mysqli_query($dbc, $q);
      if($r)
      {
                $q="select blog_news as bgn,color as clr,bg_color as bgc,created_time as t from blogs where user_id=$user_id order by blog_id desc limit 1";
     $r=  mysqli_query($dbc, $q);
     if($r)
     {
            
            if(mysqli_num_rows($r)>0)
            {
	  
	  while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	  {
	         $news=$row['bgn'];
	         $color=$row['clr'];
	         $bgcolor=$row['bgc'];
	         $time=$row['t'];
	         echo '   <div class="myBlog_ItmHold">
                    <div class="MPPH_time">
                        '.$time.'
                    </div>
                    <div class="myBlogPrevItm" style="background-color:'.$bgcolor.';color: '.$color.'" >
                   '.  htmlentities($news).'
                </div>
                        </div>';
	  }
            }
            
     }
      }else
      {
             echo 'nojhhk';
      }
 }