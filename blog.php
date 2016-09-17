
<?php session_commit();
 
 {
     if(!empty($_SESSION['user_id']) && !empty($_SESSION['user_name']))
     {
            include '../web/title_bar.php';
     }
         require_once '../web/mysqli_connect.php';
     
     
    
      $q="SELECT user_id as u from users where username='$user_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u']; 
           }else
           {
	 header("location:index.php");
           }
     
    }
     $q="select blog_id as bv,blog_views as vie from blogs where user_id=$user_id order by blog_id  desc limit 1";
     $r=  mysqli_query($dbc, $q);
     if($r)
     {
            if(mysqli_num_rows($r)>0)
            {
	  $ri=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	  $views=$ri['vie'];
	  $blog_views=$views+1;
	  $blog_id=$ri['bv'];
	  $q1="update blogs set blog_views=$blog_views where user_id=$user_id ";
	  $r1=mysqli_query($dbc, $q1);
	  if($r1)
	  {
	        
	  }else
	  {
	         echo 'no';
	  }
	  
            }  else {
	$blog_id=0;  
            }
     }else
     {
            echo mysqli_error($dbc);
     }
     
            $ppics='../'.$user_name.'/ppic25.jpg';
	     $q="select update_wall as c from wall_pics where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
    if(mysqli_num_rows($r)>0)
    {
        $roe=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $w_pic=$roe['c'];
       
    }else
    {
        $w_pic="";
    }
}
 $q="select first_name as f_name from basic where user_id=$user_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $f_name=$row['f_name'];
   }else
   {
          $f_name=$q;
   }
   $q23="SELECT username as u,mobno as m ,email as em from users where user_id=$user_id";
$r23=mysqli_query($dbc,$q23);
if($r23)
{
  $row23=mysqli_fetch_array($r23,MYSQLI_ASSOC);
  $email=$row23['em'];
  $usernm=$row23['u'];

}else
{
  echo mysqli_error($dbc);
}
 $bgcolor="";
	         $time="";
	         $blog_views="";
     echo '<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
       <title>'.$f_name.'\'s Blog </title>
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'myBlog.css"/>
   <script src="../web/jquery.min.js" type="text/javascript"></script>
   <script src="../web/blog.js" type="text/javascript"></script>
  </head>
  <body  style="background-image: url(\''.$w_pic.'\');" >
       <div class="myBlogTtl">
                <div class="myBlogPrfPic">
                    <img src="'.$ppics.'" />
                </div>
           '.$f_name.'\'s Blog 
           <div class="sedfed_signature">
               $ '.$usernm.'
           </div>
            <div class="sedfed_signature">
           
           </div>
            </div>
           
        <div class="contentFull">
            <div class="contentFocusCenter">
            ';
       $color="";
	        
     if(!empty($_SESSION['user_id']) && $_SESSION['user_id']==$user_id )
     {
           echo '  <div class="newBlogUpdateHolder">
                    <div class="NBU_Ttl">
                        Write a new update
                    </div>
                    <div class="NPU_Cont">
                        <textarea id="newBlogUpdateInp" placeholder="What\'s happening?" oninput="newBlogInp()" ></textarea>
                        <div style="color: silver"> &nbsp;&nbsp;&nbsp;You can use HTML too.</div>
                    </div>
                    <script>
                        function newBlogInp(){
                          
                            if($(\'#newBlogUpdateInp\').val()===\'\'){
                                $(\'#newBlogPreHold\').slideUp();
                            }
                            else{
                                 $(\'#newBlogPreHold\').slideDown();
                            }
                            $(\'#newBlogPreCont\').html($(\'#newBlogUpdateInp\').val());
                        }
                        function newBlogClrInp(){
                            $(\'#newBlogPreCont\').css({\'background-color\':$(\'#NB_BGC\').val(),\'color\':$(\'#NB_C\').val()})
                        }
                    </script>
                    <div class="NPU_Tools">
                        <div class="NPU_ToolItm" onclick="$(\'#NB_C\').click();" >
                            Color
                        </div>
                        <input type="color" oninput="newBlogClrInp()" id="NB_C" value="#0000ff" onchange="newBlogClrInp()"  style="width:0px;height:0px;"/>
                        <input type="color"  oninput="newBlogClrInp()" id="NB_BGC" value="#ffffff"  onchange="newBlogClrInp()"  style="width:0px;height:0px;" />
                        <div class="NPU_ToolItm" onclick="$(\'#NB_BGC\').click();">
                            Background color
                        </div>
                    </div>
                    <div class="NPU_PostSub" onclick="create_my_blog()">
                        Post
                    </div>
                </div>'; 
     }
     echo '
              
                <div class="myBlogPervHisto">
                    <div class="MPPH_Ttl"> History </div>
                    <div class="myBlog_ItmHold" id="newBlogPreHold" style="display: none;" >
                        <div class="myBlogPrevItm" id="newBlogPreCont" style="background-color: white;color: navy" >
                    
                </div>
                        </div>
	       ';
     $news="";
	       
     $q="select blog_news as bgn,color as clr,bg_color as bgc,created_time as t,blog_views as bv from blogs where user_id=$user_id order by blog_id desc";
     $r=  mysqli_query($dbc, $q);
     if($r)
     {
             
            echo '<div id="tot_blog_cont">';
            if(mysqli_num_rows($r)>0)
            {
	  
	  while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	  {
	         $news=$row['bgn'];
	         $color=$row['clr'];
	         $bgcolor=$row['bgc'];
	         $time=$row['t'];
	         $blog_views=$row['bv'];
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
            echo '</div>';
     }
     echo '
                 
                   
                    
                </div>
                
            </div>
        </div>
    </body>
</html>
';
     
 }