<?php session_start();
if(empty($_SESSION['user_id']) || empty($_GET['user']) || empty($_SESSION['user_name']))
{
       header("location:index.php");
}else
{
      if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
        
 }  else {
        include '../web/title_bar.php';       
 }
       
    $user_id=$_GET['user'];
    $viewer_id=$_SESSION['user_id'];
    require_once 'mysqli_connect.php';
     $user_id=$_GET['user'];
 
 $q="select username as u from users where user_id=$user_id";
 $r=  mysqli_query($dbc, $q);
 if($r)
 {
        if(mysqli_num_rows($r)>0)
        {
               $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
               $user_name=$row['u'];
        }  else {
               header("location:index.php");
        }
 }
              $q3="select first_name as f from basic where user_id=$user_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $f_name=$rt['f'];
	        }else
	        {
	               $f_name="";
	        }
	 }
	     $quq="select username as u from users where user_id=$user_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $ppics='../'.$ppl_usrename.'/ppic10.jpg';
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
	  $_SESSION['theme_color']=$theme;
	        $_SESSION['txt_color']=$theme_txt_color;
	       
           }
           $_SESSION['theme_color']=$theme;
	        $_SESSION['txt_color']=$theme_txt_color;
	       $q="select lock_pass as lp,locked as lk from person_config where user_id=$user_id";
	       $r=  mysqli_query($dbc,$q);
	       if($r)
	       {
	              if(mysqli_num_rows($r)>0)
	              {
		    $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		    $password=$row['lp'];
		    $locked=$row['lk'];
	              }  else {
		$locked=0;    
	              }
	       }
   

 echo '
     
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'profile_newcss.css"/> 
                  <div class="secondaryNavTtlBar">
                        <a href="../'.$user_name.'"><div class="secNavToolItm">
                        Profile
                         </div></a>
                      <a href="../web/people_post.php?user='.$user_id.'"><div class="secNavToolItm">
                             Posts
                         </div></a>
                         <a href="show_rels_of_pers.php?user='.$user_id.'"><div class="secNavToolItm">
                             Relations
                         </div></a>
	       
                         <a href="../'.$user_name.'/storage.php"><div class="secNavToolItm">
                             Storage
                         </div></a>
                         <a href="../'.$user_name.'/photos.php"><div class="secNavToolItm">
                             Photos
                         </div></a>
                         <a href="../'.$user_name.'/videos.php"><div class="secNavToolItm">
                             Videos
                         </div></a>
	        <a href="../'.$user_name.'/files.php"><div class="secNavToolItm">
                             Files
                         </div></a>
                              <a href="../'.$user_name.'/wall.php"><div class="secNavToolItm">
                             Wishes
                         </div></a>
                         
                          <a href="../'.$user_name.'/blog.php"><div class="secNavToolItm">
                             Blog
                         </div></a>
                        
                        
	       
                    </div>
                         
                        
                   ';  
	    }
	             
     $q1="select cu_id as c from contacts where user_id=$user_id";
    $r1=  mysqli_query($dbc, $q1);
    $tot_cont=  mysqli_num_rows($r1);
    
    $q2="select my_relation as r from profile_sets where user_id=$user_id";
    $r2=  mysqli_query($dbc, $q2);
    if($r2)
    {
           if(mysqli_num_rows($r2)>0)
           {
	 $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
	 $rels_prvc=$row['r'];
           }  else {
	$rels_prvc=0; 
           }
    }
    switch($rels_prvc)
    {
           case 1:
	 $privacy="Any One";
	 break;
           case 2:
	 $privacy="My relation";
	 break;
           case 3:
	 $privacy="Relations Of Relations";
	 break;
           default:
	 $privacy="Any One";
	 break;
    }
    $show_rels=0;
		  if($rels_prvc==0)
		      {
		      $show_rels=1;
		             
		      }
		        if($rels_prvc==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$user_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_rels=1;
		       }
		      }
		      
		           if($rels_prvc==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$user_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cu_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cu_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_rels=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      
		      if($show_rels==1 || $user_id==$viewer_id)
		      {
		          echo '

   <link rel="stylesheet" href="../web/groupMembers.css"/> 
   <script>function change_prof_privacy(type,who_see)
{
       var cont="type="+type+"&who_see="+who_see;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            
           }
          }
            xmlhttp.open("POST","chng_prf_prvcy.php?"+cont,true);
            xmlhttp.send();      
}</script>
<div id="groupMembersTab"  >
                <div class="groupMembersOuter">
                    <div class="PGM_Ttl">
                        Relations Of '.$f_name.'
                        <span class="PGM_Total"> Total : '.$tot_cont.'</span>
	                 ';
		          $q="select my_relation as g from profile_sets where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $relsAllowFrom=$row['g'];
           }else
           {
	 $relsAllowFrom=0;
           }
	 
    }
     switch ($relsAllowFrom){
              case 0:
                 
                  $msgAllowFrom1='selected';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='';
                  break;
              case 1:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='selected';
                  $msgAllowFrom3='';
                  break;  
              case 2:
                  $msgAllowFrom1='';
                  $msgAllowFrom2='';
                  $msgAllowFrom3='selected';
                  break;  
              
          }
    if($user_id==$viewer_id)
    {
           echo '<span style="float:center;margin-left:100px;">Who can see your relation<select onchange="change_prof_privacy(\'my_relation\',this.value)">
	  <option value="'.$rels_prvc.'">'.$privacy.'</option>
	           <option value="0" '.$msgAllowFrom1.'>Anyone</option>
	 <option value="1" '.$msgAllowFrom2.'>My relation</option>
	 <option value="2" '.$msgAllowFrom3.'>Relations or relation</option></select>
           </span>';
    }
    echo '
           
                    </div>
	         
                    <div class="PGM_Inner">
	   ';
     $q="select cu_id as c from contacts where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	 {
	        $mem_id=$row['c'];
	         $quq="select username as u from users where user_id=$mem_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic10.jpg';
	             $qe="select c_name as c from contacts where user_id=$user_id and cu_id=$mem_id";
                                         $re=mysqli_query($dbc,$qe); 
                                         if($re)
                                         {
                                             if(mysqli_num_rows($re)>0)
                                             {
                                                 $rowp=mysqli_fetch_array($re,MYSQLI_ASSOC);
                                                 $c_nm=$rowp['c'];
                                             }  else {
                                             $q3="select first_name as f from basic where user_id=$mem_id";
                                             $r3=mysqli_query($dbc,$q3);
                                             if($r3)
                                             {
                                                 $rw=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                                 $c_nm=$rw['f'];
                                             }
                                             }
                                         }
		          $q22="SELECT username as u from users where user_id=$mem_id";
			$r22=mysqli_query($dbc,$q22);
			if($r22)
			{
				$row2=mysqli_fetch_array($r22,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
			    
	         echo '<a href="../'.$username.'" > <div class="PGM_Itm">';
		     
		        
		       
                          
                          echo '  <img src="'.$p_pic.'" />
                            <div class="PGM_Itm_Name">
                               '.$c_nm.' 
                            </div>
                           
                        </div></a>';
	 }
           }  else {
	echo ''.$f_name.' doesn\'t have any contact'; 
           }
    }
    echo '
                       
                    </div>
	  
                </div>
                
';
   
    echo '
            </div>';  
		      }else
		      {
		              $q22="SELECT username as u from users where user_id=$user_id";
			$r22=mysqli_query($dbc,$q22);
			if($r22)
			{
				$row2=mysqli_fetch_array($r22,MYSQLI_ASSOC);
				$admin_username=$row2['u'];
			}
		           
		          header("location:../$admin_username");
		      }
		             
    
    

?>