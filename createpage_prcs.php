<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
    
    $page_name=  mysqli_real_escape_string($dbc,trim($_REQUEST['page_name']));
    $ttl_clr=mysqli_real_escape_string($dbc,trim($_REQUEST['title_bar_clr']));
    $txt_clr=mysqli_real_escape_string($dbc,trim($_REQUEST['txt_clr']));
    $abt_page=mysqli_real_escape_string($dbc,trim($_REQUEST['abt_page']));
    $who_can_post=mysqli_real_escape_string($dbc,trim($_REQUEST['who_can_post']));
    $allow_name=mysqli_real_escape_string($dbc,trim($_REQUEST['allow_myname']));
    $websie=mysqli_real_escape_string($dbc,trim($_REQUEST['page_website']));
    $slogan=mysqli_real_escape_string($dbc,trim($_REQUEST['slogan']));
    $aim=mysqli_real_escape_string($dbc,trim($_REQUEST['aim']));
    $page_for=mysqli_real_escape_string($dbc,trim($_REQUEST['page_for']));
    $app_style=mysqli_real_escape_string($dbc,trim($_REQUEST['app_style']));
    
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
$today = date("g:i a ,F j, Y"); 
    if(strlen($page_name)>2)
    {
        
           $page_name=  strtolower($page_name);
          $spl_chr=array();
    $spl_chr[0]="`";
    $spl_chr[1]=".";
    $spl_chr[2]="!";
    $spl_chr[3]="@";
    $spl_chr[4]="#";
    $spl_chr[5]="$";
    $spl_chr[6]="%";
    $spl_chr[7]="^";
    $spl_chr[8]="&";
    $spl_chr[9]="*";
    $spl_chr[10]="(";
    $spl_chr[11]=")";
    $spl_chr[12]="-";
    $spl_chr[13]="_";
    $spl_chr[14]="+";
    $spl_chr[15]="=";
    $spl_chr[16]="'";
     $spl_chr[17]="/";
      $spl_chr[18]="\\";
       $spl_chr[19]=";";
        $spl_chr[20]=":";
         $spl_chr[21]=">";
          $spl_chr[22]="<";
           $spl_chr[23]=",";
           $spl_chr[24]="?";
           $spl_chr[25]="\"";
           $spl_chr[26]="[";
           $spl_chr[27]="[";
           $spl_chr[28]="]";
           $spl_chr[29]="{";
           $spl_chr[30]="}";
           $spl_chr[31]="|";
           $spl_chr[32]="\\";
         $spl_chr[33]="sedfed";
         $spl_chr[34]="admin";
         $spl_chr[35]="ceo";
         $spl_chr[36]="developer";
         $spl_chr[37]="web";
         $spl_chr[38]="mobile";
         $spl_chr[39]="partner";
           $spl_chr[40]="vijayakumar";
           $spl_chr[41]="vijaya kumar";
             $spl_chr[42]="sakthikanth";
              $spl_chr[43]="sakthi kanth";
               $spl_chr[44]="co-founder";
                $spl_chr[45]="sakthi kanth";
                $spl_chr[46]="sed fed";
                 $spl_chr[47]="cofounder";
      
         $put_username=0;
           for($t=0;$t<48;$t++)
           {
	 if($t>32)
	 {
	        if($spl_chr[$t]==$page_name )
	        {
	                $put_username=1;
	                
	        }
	 }
	 elseif(is_numeric($page_name) || strpos($page_name,$spl_chr[$t])>-1)
	 {
	         $put_username=2;
	 }
           }
           if($put_username==1 || $put_username==2)
           {
	 
           header("location:createpage.php");
               echo 'This name can\'t be taken ';
           }else
           {
                 $q="select username as u from users where username='$page_name'";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 
           header("location:createpage.php");
	 echo 'This name Can\'t be taken..choose different name';
           }else
           {
	 $page_pic="";

	 $q1="select page_name as p from pages where  page_name='$page_name'";
	 $r1=  mysqli_query($dbc, $q1);
	 if($r1)
	 {
	        if(mysqli_num_rows($r1)>0)
	        {
	               
           header("location:createpage.php");
	               echo 'This name Can\'t be taken..choose different name';
	        }else
	        {
	               $q2="INSERT INTO `pages` (`page_id`, `user_id`, `page_name`,  `theme`, `title_color`, `about`, `who_can_post`, `showname`, `website`, `slogan`, `page_for`, `app_style`,created,aim) VALUES (NULL, '$user_id', '$page_name', '$txt_clr', '$ttl_clr', '$abt_page', '$who_can_post', '$allow_name', '$websie', '$slogan', '$page_for', '$app_style','$today','$aim')";
	               $r2=  mysqli_query($dbc, $q2);
	               if($r2)
	               {
		     $qw="select page_id as p from pages where page_name='$page_name'";
		     $rw=  mysqli_query($dbc, $qw);
		     if($rw)
		     {
		            $wd=  mysqli_fetch_array($rw,MYSQLI_ASSOC);
		            $page_id=$wd['p'];
		            
		            
		            mkdir("../pages/$page_id",0777,TRUE);
		            $fle=  fopen("../pages/$page_id/index.php", "w");
		            if($fle)
		            {
			  $put_txt='<?php 
		 $name="'.$page_name.'";
		         $url=\'../../'.$page_name.'/index.php?page=\'.urlencode($name);
			 header("location:$url");
		   ?>';
			  fwrite($fle, $put_txt);
			  fclose($fle);
		            }
		     }
		     echo 'Your Page Successfully Created';
		      $filename="../$page_name";
		     if(is_dir($filename))
		     {
		    }else
		     {
		            mkdir($filename,0777,true);
		            $usename=$page_name;
		            $pf='../'.$usename.'/storage/publicfolder';



		        mkdir($pf,0777,true);
		       

		 $posts='../'.$usename.'/storage/publicfolder/post/images/postimages';
		 mkdir($posts,0777,true);

		 $posts='../'.$usename.'/storage/publicfolder/post/images/profileimages';
		 mkdir($posts,0777,true);
		 $page_pic_dir=$posts;
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/smallimages';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/medimages';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers';
		 mkdir($posts,0777,true);
		 $page_wall_dir=$posts;
		 echo $page_wall_dir;
		 $posts='../'.$usename.'/storage/publicfolder/post/images/statusimages';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/audios/postaudios';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/audios/statusaudios';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/videos/postvideos';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/pdfs/postpdfs';
		 mkdir($posts,0777,true);
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/files/postfiles';
		 mkdir($posts,0777,true);
		 $page_pictur="";
		            if(!empty($_FILES['page_pic']))
		            {
			       $page_pic=mysqli_real_escape_string($dbc,$_FILES['page_pic']['name']);
   
			  $rand="$page_name$page_pic";
			  $type=$_FILES['page_pic']['type'];
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico" || $type=="image/jpg")
			  {
			         $page_pic="$page_pic_dir/$rand";
			       move_uploaded_file($_FILES['page_pic']['tmp_name'], "$page_pic");
			        $name="$page_pic";
			        $q5='../'.$page_name.'/pic5.jpg';
			      $q10='../'.$page_name.'/ppic10.jpg';
			  
			     $q25='../'.$page_name.'/ppic25.jpg';
			     $q50='../'.$page_name.'/ppic50.jpg';
			     $q75='../'.$page_name.'/ppic75.jpg'; 
			     
			        $u5='../pages/'.$page_id.'/ppic5.jpg';
			      $u10='../pages/'.$page_id.'/ppic10.jpg';
			     $u25='../pages/'.$page_id.'/ppic25.jpg';
			     $u50='../pages/'.$page_id.'/ppic50.jpg';
			     $u75='../pages/'.$page_id.'/ppic75.jpg';
			       
			       

        compress_image($name,$q5,5);
       compress_image($name,$q10,10);
       compress_image($name,$q25,25);
       compress_image($name,$q50,50);
       compress_image($name,$q75,75);
       
        compress_image($name,$u5,5);
       compress_image($name,$u10,10);
       compress_image($name,$u25,25);
       compress_image($name,$u50,50);
       compress_image($name,$u75,75);
			    $c1=compress_image("$page_pic_dir/$rand","$page_pic_dir/$rand",30);
			    $page_pictur="$page_pic_dir/$rand";
			    if($c1)
			    {
			           $qa="update pages set page_pic='$page_pic_dir/$rand' where page_name='$page_name' and user_id=$user_id";
			           $ra=mysqli_query($dbc, $qa);
			           if($ra)
			           {
	 $qw="insert into post_permision (user_id,allrelation,allpeople,me,page_id,officiale)values('$user_id','0','0',0,$page_id,1)";
                    
	$rw=mysqli_query($dbc,$qw);
                if($rw)
                {
       $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
                 
                    $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	         $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                    
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','','')";
                        $rr=mysqli_query($dbc,$qr);
                          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$page_pictur')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,4,'Changed thier Profile Picture',$user_id)";
                            $rws=mysqli_query($dbc,$qws);
	           $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,notice)values($user_id,$cu_id,0,'$today','Created a new Page: <a href=\"../pages/'.$page_id.'\">'.$page_name.'</a> ')";
                 $rs=mysqli_query($dbc,$qs);
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
		            $page_wall_pic="";
		               if(!empty($_FILES['wall_pic']['name']))
		            {
			 $page_wall=mysqli_real_escape_string($dbc,$_FILES['wall_pic']['name']);
    
			  $rand=rand(000000000000,99999999999999999);
			  $wall_name="$rand$page_wall";
			  $type=$_FILES['wall_pic']['type'];
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico"  || $type=="image/jpg")
			  {
			         $page_wall="$page_wall_dir/$wall_name";
			       move_uploaded_file($_FILES['wall_pic']['tmp_name'], "$page_wall");
			       $name="$page_wall";
			        $q5='../'.$page_name.'/wpic5.jpg';
			      $q10='../'.$page_name.'/wpic10.jpg';
			  
			     $q25='../'.$page_name.'/wpic25.jpg';
			     $q50='../'.$page_name.'/wpic50.jpg';
			     $q75='../'.$page_name.'/wpic75.jpg'; 
			     
			        $u5='../pages/'.$page_id.'/wpic5.jpg';
			      $u10='../pages/'.$page_id.'/wpic10.jpg';
			     $u25='../pages/'.$page_id.'/wpic25.jpg';
			     $u50='../pages/'.$page_id.'/wpic50.jpg';
			     $u75='../pages/'.$page_id.'/wpic75.jpg';
			       
			       

        compress_image($name,$q5,5);
       compress_image($name,$q10,10);
       compress_image($name,$q25,25);
       compress_image($name,$q50,50);
       compress_image($name,$q75,75);
       
        compress_image($name,$u5,5);
       compress_image($name,$u10,10);
       compress_image($name,$u25,25);
       compress_image($name,$u50,50);
       compress_image($name,$u75,75);
			       $c2=compress_image("$page_wall","$page_wall",30);
			       if($c2)
			       {
			              
			              $qs="update pages set page_wall='$page_wall' where page_name='$page_name' and user_id=$user_id";
			              $rs=mysqli_query($dbc, $qs);
	 $qw="insert into post_permision (user_id,allrelation,allpeople,me,page_id,officiale)values('$user_id','0','0','0',$page_id,1)";
                    
	$rw=mysqli_query($dbc,$qw);
                if($rw)
                {
       $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
                 
                    $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	         $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                    
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','','')";
                        $rr=mysqli_query($dbc,$qr);
                          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$page_pictur')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,5,'Changed thier Profile Picture',$user_id)";
                            $rws=mysqli_query($dbc,$qws);
	           $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,notice)values($user_id,$cu_id,0,'$today','Created a new Page: <a href=\"../pages/'.$page_id.'\">'.$page_name.'</a> ')";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
                        }
         
     
                    } 
                }
			       }  else {
			       echo'not comp';       
			       }
			  }
          
		            }
		        
		            $page=  fopen("$filename/index.php", "w");
		            $create=  fopen("$filename/home.php", "w");
	           $start='<?php 
		 $name="'.$page_name.'";
		         $url=\'index.php?page=\'.urlencode($name);
			 header("location:$url");
		   ?>';
		            fwrite($create, $start);
		            copy("forpage/index.php", "$filename/index.php");
		            
		            $now=$filename;
		        $storage=fopen("$now/storage.php","w");
		        copy("forpage/storage.php","$now/storage.php");

		        $videos=fopen("$now/videos.php","w");
		        copy("forpage/videos.php","$now/videos.php");

		        $files=fopen("$now/files.php","w");
		        copy("forpage/files.php", "$now/files.php");


		      $photos=fopen("$now/photos.php", "w");
		      copy("forpage/photos.php", "$now/photos.php");
		      
		      $page=fopen("$now/page.php", "w");
		      copy("forpage/page.php", "$now/page.php");
		         
		      $vdsrt=fopen("$now/strtvid.php","w");
		       $vidtxt='<?php
		      $user="'.$page_name.'";
		       $url=\'videos.php?page=\'.urlencode($user);
		         header("location:$url");
		      ?>';
		      fwrite($vdsrt,$vidtxt);
		      $strtpho=fopen("$now/strtphotos.php","w");
		      $strtphotx='<?php
		      $user="'.$page_name.'";
		       $url=\'photos.php?page=\'.urlencode($user);
		         header("location:$url");
		      ?>';
		      fwrite($strtpho,$strtphotx );

		        $stht=fopen("$now/strg.php","w");
		        $strghtml='<?php
		      $usename="'.$page_name.'";
		       $url=\'storage.php?page=\'.urlencode($usename);
		         header("location:$url");
		        ?>';

		        fwrite($stht, $strghtml);
		        $myfil=fopen("$now/strtfiles.php","w");
		        $myfiltxt='<?php
		      $usename="'.$page_name.'";
		       $url=\'files.php?page=\'.urlencode($usename);
		         header("location:$url");
		        ?>';
		        fwrite($myfil,$myfiltxt);

		        $post_status='    <div class="OfficialCaption">
                                 Created a new page
                                </div>
                            ';
	 $post_status= mysqli_real_escape_string($dbc,$post_status);
	 $rand=  rand(0000000000,999999999999);
	 $page_wall_dir="$page_wall_dir/$rand";
       $off_cap='
                            <div class="OfficialPostCaption" style="background-image:url(\''.$page_wall_dir.'\');" >
                                <div class="ODC_Ttl"  style="background-color:white;color:navy" >'.$page_name.'</div>
                                <div class="OPC_Details">
                                     <div class="OPC_User_Id">Page ID : '.$page_id.'</div>
                                <div class="OPC_Signature">
                                      </div>
                                <div class="OPC_Response">
                                   
                                    <a href="../pages/'.$page_id.'">
                                        <div class="OPCR_Itm">
                                             Visit Page 
                                        </div>
                                    </a>
                                    
                                </div>
                                </div>
                               
                            </div>';
       $off_cap=  mysqli_real_escape_string($dbc,$off_cap);
       
       $qw="insert into post_permision (user_id,allrelation,allpeople,me,page_id,officiale)values('$user_id','1','0',1,$page_id,1)";
                    
	$rw=mysqli_query($dbc,$qw);
                if($rw)
                {
       $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
                 
                    $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	         $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                    
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','$off_cap','$post_status')";
                        $rr=mysqli_query($dbc,$qr);
	       if($page_pic!=="")
	       {
	          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$page_pictur')";
                        $rr=mysqli_query($dbc,$qr);     
	       }
                         
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,4,'Changed thier Profile Picture',$user_id)";
                            $rws=mysqli_query($dbc,$qws);
	           $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,notice)values($user_id,$cu_id,0,'$today','Created a new Page: <a href=\"../pages/'.$page_id.'\">'.$page_name.'</a> ')";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
                        }
         
     
                    } 
                }
        
		     echo $page_pic; echo $page_wall;
		     header("location:../$page_name");
	          echo '<script>window.location.assign(\'../'.$page_name.'\')</script>';

		     }
	    
		    
	               }  else {
		echo 'page not created';
		echo mysqli_error($dbc);
	               }
	        }
	 }  else {
	 echo mysqli_error($dbc);      
	 }
           }
    }
           }
  
           
    }else
    {
           header("location:createpage.php");
           echo 'Please enter a name to create';
    }
    
    
}