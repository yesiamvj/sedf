<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$post_id=$_REQUEST['postid'];
	$likeppl=$_REQUEST['like'];
	$unlikeppl=$_REQUEST['like'];
	$rateppl=$_REQUEST['like'];
	$dwnldppl=$_REQUEST['like'];
	$cmntppl=$_REQUEST['like'];
	$shareppl=$_REQUEST['like'];
	
	$user_id=$_SESSION['user_id'];

	require 'mysqli_connect.php';
	if($likeppl=="like")
	{
				$q="select like_userid as luid from post_status where post_id=$post_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			if(!empty($row))
			{
				$liker_userid=$row['luid'];
             $uname="select first_name as fname from basic where user_id=$liker_userid";
                     $runnm=mysqli_query($dbc,$uname);
                     if($runnm)
                     {
                         if(mysqli_num_rows($runnm)>0)
                         {
                             $rownm=mysqli_fetch_array($runnm);
                             $liker_name=$rownm['fname'];
                             echo "<span class=\"user\" id=\"user\">$liker_name</span>";
                         }else{
                             $selemail="select email as em from users where user_id=$liker_userid";
                             $rinemail=mysqli_query($dbc,$selemail);
                             if($rinemail)
                             {
                                 $rowemail=mysqli_fetch_array($rinemail);
                                 $liker_name=$rowemail['em'];
                                 echo "<span class=\"user\" id=\"user\">$liker_name</span>";
                         }
                         }
                     }
}else{
	echo "empty liker";
}

		}

	}else
	{
		echo "not run qr";
	}	
	}
	

if($likeppl=="unlike")
{

		$q="select unlike_userid as uluid from post_status where post_id=$post_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			if(!empty($row))
			{
				$unliker_userid=$row['uluid'];
             $unam="select first_name as fnam from basic where user_id=$unliker_userid";
                     $runn=mysqli_query($dbc,$unam);
                     if($runn)
                     {
                         if(mysqli_num_rows($runn)>0)
                         {
                             $rown=mysqli_fetch_array($runn,MYSQLI_ASSOC);
                             $unliker_name=$rown['fnam'];
                             echo "<span id=\"user\" class=\"user\">$unliker_name</span>";
                         }else{
                             $selemail="select email as em from users where user_id=$unliker_userid";
                             $rinemail=mysqli_query($dbc,$selemail);
                             if($rinemail)
                             {
                                 $rowemail=mysqli_fetch_array($rinemail);
                                 $unliker_name=$rowemail['em'];
                                echo "<span id=\"user\" class=\"user\">$unliker_name</span>";
                             }
                         }
                     }
}else{
	echo "empty liker";
}

		}

	}else
	{
		echo "not run qr";
	}	
	
}else
{
}


	

if($likeppl=="rate")
{
	
		$q="select rating as rt,user_id as u  from post_status where post_id=$post_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			if(!empty($row))
			{
				$unliker_userid=$row['rt'];
				$user_id=$row['u'];
				$rating=$row['rt'];
             $unam="select first_name as fnam from basic where user_id=$user_id";
                     $runn=mysqli_query($dbc,$unam);
                     if($runn)
                     {
                         if(mysqli_num_rows($runn)>0)
                         {
                             $rown=mysqli_fetch_array($runn);
                             $unliker_name=$rown['fnam'];
                             echo "<span id=\"user\" class=\"user\">$unliker_name  ($rating)</span>";
                         }else{
                             $selemail="select email as em from users where user_id=$user_id";
                             $rinemail=mysqli_query($dbc,$selemail);
                             if($rinemail)
                             {
                                 $rowemail=mysqli_fetch_array($rinemail);
                                 $liker_name=$rowemail['em'];
                               echo "<span id=\"user\" class=\"user\">$unliker_name  ($rating)</span>";
                             }
                         }
                     }
}else{
}

		}

	}else
	{
		
	}	
	
}else
{
	echo "";
}
if($likeppl=="download")
{

	$q="select user_id as u  from post_download where post_id=$post_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			if(!empty($row))
			{
				
				$users_id=$row['u'];
		

             $unam="select first_name as fnam from basic where user_id=$users_id";
                     $runn=mysqli_query($dbc,$unam);
                     if($runn)
                     {

                         if(mysqli_num_rows($runn)>0)
                         {
                             $rown=mysqli_fetch_array($runn);
                             $unliker_name=$rown['fnam'];
                             echo "<span id=\"user\" class=\"user\">$unliker_name</span>";
                         }else{
                             $selemail="select email as em from users where user_id=$users_id";
                             $rinemail=mysqli_query($dbc,$selemail);
                             if($rinemail)
                             {
                                 $rowemail=mysqli_fetch_array($rinemail);
                                 $liker_name=$rowemail['em'];
                                echo "<span id=\"user\" class=\"user\">$unliker_name</span>";
                             }
                         }
                     }
}else{
	echo "";
}

		}

	}else
	{
		echo "";
	}	
	
}else
{
	echo "";
}


if($likeppl=="comment")
{

	$q="select commenter_useri_d as c  from post_comments where post_id=$post_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			if(!empty($row))
			{
				
				$users_id=$row['c'];
		

             $unam="select first_name as fnam from basic where user_id=$users_id";
                     $runn=mysqli_query($dbc,$unam);
                     if($runn)
                     {

                         if(mysqli_num_rows($runn)>0)
                         {
                             $rown=mysqli_fetch_array($runn);
                             $unliker_name=$rown['fnam'];
                             echo "<span id=\"user\" class=\"user\">$unliker_name </span>";
                         }else{
                             $selemail="select email as em from users where user_id=$users_id";
                             $rinemail=mysqli_query($dbc,$selemail);
                             if($rinemail)
                             {
                                 $rowemail=mysqli_fetch_array($rinemail);
                                 $liker_name=$rowemail['em'];
                                 echo "<span id=\"user\" class=\"user\">$unliker_name </span>";
                             }
                         }
                     }
}else{
	echo "";
}

		}

	}else
	{
		echo "";
	}	
	
}else
{
	echo "";
}

if($likeppl=="share")
{

	$q="select share_id as c  from post_share where post_id=$post_id";
 
	$r=mysqli_query($dbc,$q);
	if($r)
       {
          
	if(mysqli_num_rows($r)>0)
            {
          echo'<div><b>Friends</b></div>';
                while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
                    $share_id=$row['c'];
                               
			$qe="select shared_users as u from post_share_users where post_share_id=$share_id";
                        $re=mysqli_query($dbc,$qe);
                        if($re)
                        {
                            if(mysqli_num_rows($re)>0)
                            {
                                while($row_sh=  mysqli_fetch_array($re,MYSQLI_ASSOC))
                                {
                                    $share_users=$row_sh['u'];
                                    
                                                     $uname="select c_name as fname from contacts where user_id=$user_id and  cu_id=$share_users";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $shared_user_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$share_users";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $shared_user_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                 echo'<div>'.$shared_user_name.'</div>';
                                           
                                }
                            }
                        }

		}
            }else
            {
                echo'No one Shared';
            }
		

	}else
	{
		echo mysqli_error($dbc);
	}
      
        
        $qo="select male as m ,female as fm,agefrom as f,ageto as agt,status as st,position as p,mood as md from post_share where post_id=$post_id";
        $ro=mysqli_query($dbc,$qo);
        if($ro)
        {
            if(mysqli_num_rows($ro)>0)
            {
                $et=mysqli_fetch_array($ro,MYSQLI_ASSOC);
                $male=$et['m'];
                $female=$et['fm'];
                $agf=$et['f'];
                $agt=$et['agt'];
                $positoin=$et['p'];
                $mood=$et['md'];
                
            }
        }
	
}else
{
	echo "";
}

}

?>