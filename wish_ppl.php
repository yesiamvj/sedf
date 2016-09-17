<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['user']))
   {
    header("location:index.php");
   }else
   {
     $viewer_id=$_SESSION['user_id'];
     $person_id=$_REQUEST['user'];
     $wishes=$_REQUEST['wish'];
     $day=$_REQUEST['day'];
     $month=$_REQUEST['month'];
     $year=$_REQUEST['year'];
     $hour=$_REQUEST['hour'];
     $min=$_REQUEST['min'];
     $noon=$_REQUEST['noon'];
     if($noon=="PM")
     {
            $hour=12+$hour;
     }
     $wished_at=date("g:i a ,F j, Y"); 
     $sec=date('s');
     $my_order="$sec$min$hour$day$month$year";
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
     
     require 'mysqli_connect.php';
     
		               if(!empty($_FILES['image']))
		            {
			
			     $myrand=rand(00000000,999999999999999);
			 $page_pic=$_FILES['image']['name'];
			  $rand="$myrand$page_pic";
			  $user_name=$_SESSION['user_name'];
			  $dir="../$user_name/storage/publicfolder/post/images";
			  $type=$_FILES['image']['type'];
			  if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/ico")
			  {
			        
			       move_uploaded_file($_FILES['image']['tmp_name'], "$dir/$rand");
			    $c1=compress_image("$dir/$rand","$dir/$rand",30);
			   $image="$dir/$rand";
			  }else
			  {
			         $image="";
			  }
          
		            }else
		            {
			  $image="";
		            }
		
		            $wises=$wishes;
	        if(strlen($wises)>10)
	       {
	              $wises=  substr($wises,0, 10);
	              $wises="$wises...";
	              $wises=  mysqli_real_escape_string($dbc,$wises);
	       }  
     
     $q="insert into wishes(who_wished,wished_to,wishes,wish_image,year,day,month,wished_at,hour,min,noon,my_order)values($viewer_id,$person_id,'$wishes','$image','$year','$day','$month','$wished_at','$hour','$min','$noon',$my_order)";
     $r=  mysqli_query($dbc, $q);
     if($r)
     {
            echo 'Succesfully wished';
           /* $q1="insert into notification (user_id,cu_id,notice,officiale)values($viewer_id,$person_id,'Wished you <br/>$wises',2)";
            $r1=mysqli_query($dbc, $q1);
            if($r1)
            {
	  echo 'notification sent';
            }*/
     }  else {
     echo mysqli_error($dbc);       
     }
     
   }