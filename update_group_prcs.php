<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['page_id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    require 'mysqli_connect.php';
    
    $ttl_clr=mysqli_real_escape_string($dbc,trim($_REQUEST['title_bar_clr']));
    $txt_clr=mysqli_real_escape_string($dbc,trim($_REQUEST['txt_clr']));
    $abt_page=mysqli_real_escape_string($dbc,trim($_REQUEST['abt_page']));
    $who_can_post=mysqli_real_escape_string($dbc,trim($_REQUEST['who_can_post']));
    $allow_name=mysqli_real_escape_string($dbc,trim($_REQUEST['allow_name']));
    $websie=mysqli_real_escape_string($dbc,trim($_REQUEST['website']));
    $slogan=mysqli_real_escape_string($dbc,trim($_REQUEST['slogan']));
    $aim=mysqli_real_escape_string($dbc,trim($_REQUEST['aim']));
    $page_for=mysqli_real_escape_string($dbc,trim($_REQUEST['page_for']));
    $app_style=mysqli_real_escape_string($dbc,trim($_REQUEST['app_style']));
   $page_id=$_REQUEST['page_id'];
    
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
$q="select page_name as p,page_pic as pic,page_wall as pw from pages where page_id=$page_id";
$r=  mysqli_query($dbc, $q);
if($r)
{
       if(mysqli_num_rows($r)>0)
       {
              $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
              $page_name=$row['p'];
              $old_page_name=$page_name;
              $page_pictur=$row['pic'];
              $cut_pic=strpos($page_pictur,"storage");
       
              $page_wall_pic=$row['pw'];
              
       }else
       {
              $old_page_name="";
              $page_pictur="";
              $page_wall_pic="";
       }
}
    if(!empty($page_name))
    {
           
    $q="select username as u from users where username='$page_name'";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 echo 'This name Can\'t be taken..choose different name';
           }else
           {
	 
	 $q1="select page_name as p from pages where  page_name='$page_name' and page_id!=$page_id";
	 $r1=  mysqli_query($dbc, $q1);
	 if($r1)
	 {
	        if(mysqli_num_rows($r1)>0)
	        {
	               echo 'This name Can\'t be taken..choose different name';
	        }else
	        {
	           
	               $q2="UPDATE `pages` SET `page_name` = '$page_name', `theme` = '$txt_clr', `title_color` = '$ttl_clr', `about` = '$abt_page', `who_can_post` = '$who_can_post', `showname` = '$allow_name', `website` = '$websie', `slogan` = '$slogan', `page_for` = '$page_for', `app_style` = '$app_style',  `last_modified` = '$today', `aim` = '$aim' WHERE `pages`.`page_id` = $page_id";
	               $r2=  mysqli_query($dbc, $q2);
	               if($r2)
	               {
		               $aftr_pic=  substr($page_pictur, $cut_pic,  strlen($page_pictur));
		           $page_pictur="../$page_name/$aftr_pic";
		          
		    
		            if(is_dir("../pages/$page_id/index.php"))
		            {
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
		            }  else {
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
		         
		     }
		     echo 'Your Group Successfully Updated';
		      $filename="../$page_name";
		      $old_dir="../$old_page_name";
		     if(is_dir($filename))
		     {
		              $usename=$page_name;
		            
		            $pf='../'.$usename.'/storage/publicfolder';


		            if(is_dir($pf))
		            {
			  
		            }else
		            {
		mkdir($pf,0777,true);	  
		            }
		  $posts='../'.$usename.'/storage/publicfolder/post/images/postimages';
		 if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/profileimages';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $page_pic_dir=$posts;
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/smallimages';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $posts='../'.$usename.'/storage/publicfolder/post/images/profileimages/medimages';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/wallpapers';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $page_wall_dir=$posts;
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/images/statusimages';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 
		 $posts='../'.$usename.'/storage/publicfolder/post/audios/postaudios';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $posts='../'.$usename.'/storage/publicfolder/post/audios/statusaudios';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $posts='../'.$usename.'/storage/publicfolder/post/videos/postvideos';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $posts='../'.$usename.'/storage/publicfolder/post/pdfs/postpdfs';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		 $posts='../'.$usename.'/storage/publicfolder/post/files/postfiles';
		  if(!is_dir($posts))
		 {
		    mkdir($posts,0777,true);
    
		 }
		$chk_pic=0;
		            if(!empty($_FILES['page_pic']['name']))
		            {
			  
			     $myrand=rand(00000000,999999999999999);
			 $page_pic=$_FILES['page_pic']['name'];
			  $rand="$myrand$page_name$page_pic";
			  $type=$_FILES['page_pic']['type'];
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico" || $type=="image/jpg")
			  {
			         $chk_pic=2;
			       move_uploaded_file($_FILES['page_pic']['tmp_name'], "$page_pic_dir/$rand");
			    $c1=compress_image("$page_pic_dir/$rand","$page_pic_dir/$rand",30);
			    $page_pictur="$page_pic_dir/$rand";
			    
			           $qa="update pages set page_pic='$page_pic_dir/$rand' where page_id='$page_id' and user_id=$user_id";
			           $ra=mysqli_query($dbc, $qa);
			              $name="$page_pic_dir/$rand";
				     $q5='../'.$page_name.'/ppic5.jpg';
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
			    
			            $post_status='    <div class="OfficialCaption">
                                 updated their Group picture
                                </div>
                            ';
	 $post_status= mysqli_real_escape_string($dbc,$post_status);
       $off_cap='
                            <div class="OfficialPostCaption" style="background-image:url(\''.$page_wall_pic.'\');" >
                                <div class="ODC_Ttl"  style="background-color:white;color:navy" >'.$page_name.'</div>
                                <div class="OPC_Details">
                                     <div class="OPC_User_Id">Page ID : '.$page_id.'</div>
                                <div class="OPC_Signature">
                                      </div>
                                <div class="OPC_Response">
                                   
                                    <a href="../pages/'.$page_id.'">
                                        <div class="OPCR_Itm">
                                             Visit Group
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
                   
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','','$post_status')";
                        $rr=mysqli_query($dbc,$qr);
                          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$page_pictur')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,4,'Changed thier Profile Picture',$user_id)";
                            $rws=mysqli_query($dbc,$qws);
	           
                        }
         
     
                    } 
                }
		
			  }
          
		            }
		            
		             if($chk_pic==0)
		            {
			  $qs="update pages set page_pic='$page_pictur' where page_id=$page_id";
			              $rs=mysqli_query($dbc, $qs);
			              if($rs)
			              {
				   
			              }else
			              {
				    
				 echo 'not updt';
				 echo mysqli_error($dbc);
			              }
		            }
		            $chk_wall=0;
		        
		               if(!empty($_FILES['wall_pic']['name']))
		            {
			     
			    
			     $myrand=rand(00000000,999999999999999);
			     $page_wall=$_FILES['wall_pic']['name'];
			  $rand="$myrand$page_wall";
			  $type=$_FILES['wall_pic']['type'];
			
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
			  {
			         $chk_wall=2;
			       move_uploaded_file($_FILES['wall_pic']['tmp_name'], "$page_wall_dir/$rand");
			       $c2=compress_image("$page_wall_dir/$rand","$page_wall_dir/$rand",30);
			     
			       $page_wall_pic="$page_wall_dir/$rand";
			                $name="$page_wall_pic";
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
			       $qs="update pages set page_wall='$page_wall_pic' where page_id=$page_id";
			       $rs=mysqli_query($dbc, $qs);
			                $post_status='    <div class="OfficialCaption">
                                 updated their Group Wall picture
                                </div>
                            ';
	 $post_status= mysqli_real_escape_string($dbc,$post_status);
       $off_cap='
                            <div class="OfficialPostCaption" style="background-image:url(\''.$page_wall_pic.'\');" >
                                <div class="ODC_Ttl"  style="background-color:white;color:navy" >'.$page_name.'</div>
                                <div class="OPC_Details">
                                     <div class="OPC_User_Id">Page ID : '.$page_id.'</div>
                                <div class="OPC_Signature">
                                      </div>
                                <div class="OPC_Response">
                                   
                                    <a href="../pages/'.$page_id.'">
                                        <div class="OPCR_Itm">
                                             Visit Group
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
                   
                        $qr="insert into postforall (user_id,post_id,post_time,post_caption,post_feelings)values($user_id,$pos_id,'$today','','$post_status')";
                        $rr=mysqli_query($dbc,$qr);
                          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$page_pictur')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,5,'Changed thier Wall Picture',$user_id)";
                            $rws=mysqli_query($dbc,$qws);
	           
                        }
         
     
                    } 
                }
       
			              
			  }
          
		            }  
		           
		            if($chk_wall==0)
		            {
			  $qs="update pages set page_wall='$page_wall_pic' where page_id='$page_id'";
			              $rs=mysqli_query($dbc, $qs);
			              if($rs)
			              {
				    
			              }else
			              {
				    
				 echo 'not updt';
				 echo mysqli_error($dbc);
			              }
		            }
		    
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
		
		            if(!empty($_FILES['page_pic']))
		            {
			  $rand="$page_name$page_pic";
			  $type=$_FILES['page_pic']['type'];
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico" || $type=="image/pg")
			  {
			       move_uploaded_file($_FILES['page_pic']['tmp_name'], "$page_pic_dir/$rand");
			    $c1=compress_image("$page_pic_dir/$rand","$page_pic_dir/$rand",30);
			    $page_pictur="$page_pic_dir/$rand";
			    if($c1)
			    {
			           $qa="update pages set page_pic='$page_pic_dir/$rand' where page_name='$page_name' and user_id=$user_id";
			           $ra=mysqli_query($dbc, $qa);
			           if($ra)
			           {
				  $name="$page_pic_dir/$rand";
				     $q5='../'.$page_name.'/ppic5.jpg';
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
			           }else
			           {
				 echo 'not updt';
				 echo mysqli_error($dbc);
			           }
			    }  else {
			           echo 'not cmp';       
			    }
			  }
          
		            }
		          
		               if(!empty($_FILES['wall_pic']))
		            {
			  $rand="$page_wall$page_pic";
			  $type=$_FILES['wall_pic']['type'];
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico" || $type=="image/pg")
			  {
			       move_uploaded_file($_FILES['wall_pic']['tmp_name'], "$page_wall_dir/$rand");
			       $c2=compress_image("$page_wall_dir/$rand","$page_wall_dir/$rand",30);
			       if($c2)
			       {
			              $page_wall_pic="$page_wall_dir/$rand";
			              $qs="update pages set page_wall='$page_wall_dir/$rand' where page_name='$page_name' and user_id=$user_id";
			              $rs=mysqli_query($dbc, $qs);
			              if($rs)
			              {
				    $name="$page_wall_pic";
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
			              }else
			              {
				    
				 echo 'not updt';
				 echo mysqli_error($dbc);
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
		            copy("forgroup/index.php", "$filename/index.php");
		            
		            $now=$filename;
		       
		        $videos=fopen("$now/videos.php","w");
		        copy("forgroup/videos.php","$now/videos.php");

		        $files=fopen("$now/files.php","w");
		        copy("forgroup/files.php", "$now/files.php");


		      $photos=fopen("$now/photos.php", "w");
		      copy("forgroup/photos.php", "$now/photos.php");
		      
		      $page=fopen("$now/page.php", "w");
		      copy("forgroup/page.php", "$now/page.php");
		         
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

		       
		        $myfil=fopen("$now/strtfiles.php","w");
		        $myfiltxt='<?php
		      $usename="'.$page_name.'";
		       $url=\'files.php?page=\'.urlencode($usename);
		         header("location:$url");
		        ?>';
		        fwrite($myfil,$myfiltxt);

		   
		     fclose($myfile);
		     
		     fclose($vdsrt);
		     fclose($strtpho);
		     fclose($page);
		     fclose($storage);
		     fclose($photos);
		     fclose($videos);
		     fclose($files);
		     

		     }
		     
	    
		     echo '<script>window.location.assign(\'../'.$page_name.'\')</script>';
	
	               }  else {
		echo 'page not updated';
		echo mysqli_error($dbc);
	               }
	        }
	 }  else {
	 echo mysqli_error($dbc);      
	 }
           }
    }
           
    }else
    {
           echo 'Please enter a name to Update';
    }
    
    
}