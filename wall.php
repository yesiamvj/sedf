<?php session_commit();
   if(empty($_GET['username']))
   {
    header("location:strt_wall.php");
   }else
   {
    
     require '../web/mysqli_connect.php';
      if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
        
 }  else {
        include '../web/title_bar.php';       
 }
  $viewer_id=$_SESSION['user_id'];
     $person_name=$_GET['username'];
           $q1="select first_name as f from basic where user_id=$viewer_id";
           $r1=  mysqli_query($dbc, $q1);
           if($r1)
           {
	 if(mysqli_num_rows($r1)>0)
	 {
	        $row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
	        $viewer_name=$row['f'];
	 }
           }
           if(empty($_SESSION['user_id']))
           {
	 $viewer_name="";
           }
     $q="select user_id as u from users where username='$person_name'";
     $r=mysqli_query($dbc, $q);
     if($r)
     {
        if(mysqli_num_rows($r)>0)
        {
               $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
               $person_id=$row['u'];
               
                                                     $uname="select c_name as fname from contacts where user_id=$viewer_id and  cu_id=$person_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $trgt_wisher_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$person_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $trgt_wisher_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
			  $quq="select username as u from users where user_id=$person_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $trgt_wisher_pic='../'.$ppl_usrename.'/ppic5.jpg';
                                                 
        }else
        {
	      // header("location:index.php");
        }
     }else
     {
               echo mysqli_error($dbc);
     }
  
          echo '
   
<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta name="Author" content="Vijayakumar for SedFed" /> -->  
    <title> Wishes</title>
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'wall.css"/>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/wall.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
         
         ';
  if(empty($_SESSION['user_id']) && empty($_SESSION['user_name']))
	    {
	           
	            $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$user_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	      $roed=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	      $theme=$roed['thm'];
	      $theme_txt_color=$roed['theme_txt_color'];
	 }else
	 {
	        $theme="#008b8b";
	        $theme_txt_color="#ffffff";
	        
	        
	 }
		       
           }
	           echo '  <div id="Topest" >
                
                <div id="title_bar" style="background-color:'.$theme.'";color:'.$theme_txt_color.' >
                
                    <font id="sedfed" >'.$f.'</font>
         
              
              <div id="logout">
                  <button id="logoutbtn">Logout</button>
              </div>
              
            </div>
              
       
      </div>
         ';
	    }
	     echo '     
          <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >'.$person_name.'</font>

                    </div>';
echo '
              
           <div id="howThisPersonStuffs" >
                       <div id="innerHTP">
                                
                           
                      <a href="../'.$person_id.'">
                        <div  class="hTP-holders">
                            <span id="meComments">&nbsp;&nbsp; Profile</span>
                        </div>
                            </a> 
                        <a href="../web/people_post.php?user='.$person_id.'">
                        <div  class="hTP-holders">
                         <span id="meComments">&nbsp;&nbsp; Posts</span>
                        </div>
                            </a> 
                            <a href="files.php">  <div  class="hTP-holders">
                               <span id="meLikes">&nbsp;&nbsp; Files</span> 
                        </div>
                                </a> 
                                
                                 
                        <a href="storage.php">
                        <div  class="hTP-holders">
                       <span id="meRates">&nbsp;&nbsp; Storage</span>
                        </div>
                            </a> 
                        <a href="photos.php"> 
                            <div  class="hTP-holders">
                            <span id="meUnlikes">&nbsp;&nbsp; Photos</span>
                        </div>
                            </a>
	           
	         
                        <a href="videos.php">
                        <div  class="hTP-holders">
                           <span id="meComments">&nbsp;&nbsp; Videos</span>
                        </div>
                            </a> 
                              <a href="blog.php">
                        <div  class="hTP-holders">
                           <span id="meComments">&nbsp;&nbsp; Blog</span>
                        </div>
                            </a>   <a href="wall.php">
                        <div  class="hTP-holders">
                         <span id="meComments">&nbsp;&nbsp; Wishes</span>
                        </div>
                            </a> 
	           
                          
                          
                        </div>
                        
                        
                    </div>
          
          <div class="win-newWish-out" id="createNewWish" style="display: none" >
              <div class="win_newWish_in">
                  <div class="win_nW_Ttl">New Wish <div class="closeNwWin" onclick="$(\'#createNewWish\').slideUp()">X</div> </div>
                  <div class="newWisjSheduleHold">
                   Schedule :   Show this on  <select id="wish_day">';
	  $cday=date('j');
	           $cur_month=date('n');
	           $cur_year=date('y');
	           $cur_hour=date('g');
	           $cur_min=date('i');
	           $cur_noon=date('A');
	           
	  for($t=1;$t<=31;$t++)
	  {
	         if($t>=$cday)
	         {
	         echo '<option>'.$t.'</option>';
	        
	         }
	  }
	           echo'</select>/  <select id="inpTh_Mon" onchange="ageInp()" >
		 ';
	           $month[1]="Jan";
	           $month[2]="Feb";
	           $month[3]="Mar";
	           $month[4]="Apr";
	           $month[5]="May";
	           $month[6]="June";
	           $month[7]="July";
	           $month[8]="Aug";
	           $month[9]="Sep";
	           $month[10]="Oct";
	           $month[11]="Nov";
	           $month[12]="Dec";
	           
	           for($t=1;$t<=12;$t++)
	           {
		if($t>=$cur_month)
		{
		       echo '<option value="'.$t.'">'.$month[$t].'</option>';
		}
	           }
	           echo '

		 </select>  / ';
	           echo '<select id="wish_year" >';
	           for($t=date('Y');$t<=2016;$t++)
	           {
		 echo '<option >'.$t.'</option>';
	           }
	           echo '</select>';
	           echo ' @';
	           echo '<select id="wish_hour">';
	           
	           for($t=1;$t<=12;$t++)
	           {
		 echo '<option value="'.$t.'">'.$t.'</option>';
	           }
	           echo '</select>';
	           echo '<select id="wish_min">';
	           for($t=1;$t<=59;$t++)
	           {
		 echo '<option>'.$t.'</option>';
	           }
	           echo '</select>';
	           echo '<select id="wish_noon">
		 <option>AM</option>
		 <option>PM</option>
	           </select>';
		               echo '<input type="file" id="wish_image" onchange="put_image(this)" style="display:none;"/><br/><span class="ad_image_btn" onclick="$(\'#wish_image\').click();">Add an Image</span>
			     <div id="wish_image_div" style="text-align:center;margin-top:30px;"></div>
	 </div>
                  <div class="wishTxtCont">
                      <textarea id="newWishInp" placeholder="Wish something..."></textarea>
                  </div>
                  <div class="winSubmit" onclick="wishhim('.$person_id.')">
                      Wish
                  </div>
              </div>
          </div>
          <div class="giftCreateOut">
              <div class="giftTtl">
                  <img src="'.$trgt_wisher_pic.'" class="img_wishOwnerUser" /> Wishes  for <div class="sf_UserName">'.$trgt_wisher_name.'</div>
                  <div class="giftControls">
                     
                      
                      ';
		               
		               if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
		               {
			  if($person_id!==$viewer_id)
		               {
			     echo ' <div class="giftControlItm" id="newWishBtn" onclick="$(\'#createNewWish\').fadeIn()" >
                           
                          Wish now        </div>';
		               }  else {
			echo ' <div class="giftControlItm" id="newWishBtn" onclick="thank_all()">
                          Thank All
                      </div>';     
		               }     
		               }
		             
                     
	             echo '
                  </div>
              </div>
              <div class="giftsContOut">
                  ';
                $qq="select wishes as wish,wish_image as w_img,day as d ,month as m,year as y,wished_at as at,who_wished as who,wish_id as wid,hour as hr,min as min,noon as nn,seen as sn from wishes where wished_to=$person_id and delt=0 order by my_order desc";
	$rr=  mysqli_query($dbc, $qq);
	if($rr)
	{
	       if(mysqli_num_rows($rr)>0)
	       {
	              while($row=  mysqli_fetch_array($rr,MYSQLI_ASSOC))
	              {
		    $who_wished=$row['who'];
		    $wishes=$row['wish'];
		    $wish_image=$row['w_img'];
		    $day=$row['d'];
		    $wish_id=$row['wid'];
		    $month=$row['m'];
		    $year=$row['y'];
		    $hour=$row['hr'];
		    $min=$row['min'];
		    $noon=$row['nn'];
		    $wished_at=$row['at'];
		    $seen=$row['sn'];
		    $my_noon=1;
		    $cur_my_noon=1;
		    
		    if($noon=="AM")
		    {
		           $my_noon=0;
		    }
		    
		    if($cur_noon=="AM")
		    {
		           $cur_my_noon=0;
		    }
		      $uname="select c_name as fname from contacts where user_id=$viewer_id and  cu_id=$who_wished";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $wished_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$who_wished";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $wished_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
                                                     
	 $quq="select username as u from users where user_id=$who_wished";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
			$p_pic='../'.$ppl_usrename.'/ppic25.jpg';
			  if($hour>=$cur_hour)
			  {
			         
			         if($my_noon>=$cur_my_noon)
			         {
			                $hr_show=0;
			         }  else {
			         $hr_show=1;       
			         }
			  }
			  if($min>=$cur_min)
			  {
			          if($my_noon>=$cur_my_noon)
			         {
			                $min_show=0;
			         }  else {
			         $min_show=1;       
			         }
			  }
                          if($cur_my_noon!=0)
                          {
                              $show_hour=12+$cur_hour;
                              
                          }else
                          {
                              $show_hour=$cur_hour;
                          }
                          $mean_day=$cday-$day;
                          $year=  substr($year, 1,strlen($year));
                          $mean_hr=$show_hour-$hour;
                          
		    if($cday>=$day && $cur_month>=$month && $cur_year>=$year && ($show_hour>=$hour || $mean_day>=1)  && ($cur_min>=$min || $mean_hr>=1) && ($cur_my_noon>=$my_noon || $seen==1))
		    {
		           echo '<div class="giftItem" id="gift_item'.$wish_id.'">
                      <img src="'.$p_pic.'" class="gifterFace" />
                      
                      <div class="giftSender"><a href="../'.$ppl_usrename.'" ><span>'.$wished_name.'</span></a><div class="giftdTime" title="Originally wished on '.$wished_at.'" >'.$wished_at.'</div> </div>
                      <div class="giftCont">
	     '.htmlentities($wishes).'
                    </div>';
		           $q="update wishes set seen=1 where wish_id=$wish_id";
		           mysqli_query($dbc, $q);
		           
		           if($wish_image!=="")
		           {
			 echo '  <div class="gift_image_div">
	     <img src="'.$wish_image.'" class="gift_image"/>
	   </div>';
		           }
	 
                       echo '<div class="wishResponds">
	             ';
	      if($viewer_id==$person_id)
	      {
	     echo '<div class="WRSP_Itm_TY" onclick="thank_wishes('.$wish_id.')">
                          Thank You
                      </div>
                      <div class="WRSP_Itm_Del" onclick="delete_wishes('.$wish_id.')">
                          Delete
                      </div>';        
	      }
                      
	             echo '
                  </div>
                  </div>';
		    }
	              }
	       }
	}
             echo ' </div>
          </div>
      </div>
  </body>
</html>';
   }
   ?>

