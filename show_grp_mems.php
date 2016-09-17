<?php session_start();
if(empty($_REQUEST['page_id']))
{
    header("location:index.php");
}else
{
 
    $page_id=$_REQUEST['page_id'];
     require 'mysqli_connect.php';
     $n=1;
    if(empty($_SESSION['user_id']))
    {
         $q1="select user_id as u from pages where page_id=$page_id";
    $r1=  mysqli_query($dbc, $q1);
    if($r1)
    {
           
           if(mysqli_num_rows($r1)>0)
           {
	 $row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
	
	  $admin_id=$row['u'];
	 
	 $mem_id=$admin_id;
	   $q2="select med_img as m from small_pics where user_id=$mem_id";
	           $r2=mysqli_query($dbc,$q2);
	           if($r2)
	           {
	               if(mysqli_num_rows($r2))
	               {
		  $ry=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
		  $p_pic=$ry['m'];

		  #$p_pic=  substr($p_pic, $cut,  strlen($p_pic));
	               }else
	               {
		  $p_pic="../web/icons/male.png";
	               }
	           }
		               $q22="SELECT username as u from users where user_id=$mem_id";
			$r22=mysqli_query($dbc,$q22);
			if($r22)
			{
				$row2=mysqli_fetch_array($r22,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
	          $qe="select c_name as c from contacts where user_id=0 and cu_id=$mem_id";
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
		       
		       echo '<a href="../'.$username.'" > <div class="PGM_Itm">';
		     
		              echo '   <div class="adminOfGroup">
                                admin
                            </div>';
		       
                          
                          echo '  <img src="'.$p_pic.'" />
                            <div class="PGM_Itm_Name">
                               '.$c_nm.' 
                            </div>
                           
                        </div></a>';
           }
    }
       
    $q="select followers as f from page_status where page_id=$page_id and followers!=0 and followers!=$admin_id";
  
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	
	 while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	 {
	        $n=$n+1;
	        $mem_id=$row['f'];
	        $q2="select med_img as m from small_pics where user_id=$mem_id";
	           $r2=mysqli_query($dbc,$q2);
	           if($r2)
	           {
	               if(mysqli_num_rows($r2))
	               {
		  $ry=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
		  $p_pic=$ry['m'];

		  #$p_pic=  substr($p_pic, $cut,  strlen($p_pic));
	               }else
	               {
		  $p_pic="../web/icons/male.png";
	               }
	           }
		               $q22="SELECT username as u from users where user_id=$mem_id";
			$r22=mysqli_query($dbc,$q22);
			if($r22)
			{
				$row2=mysqli_fetch_array($r22,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
	          $qe="select c_name as c from contacts where user_id=0 and cu_id=$mem_id";
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
		       
		       echo '<span class="mem_hold" id="mem_jold'.$mem_id.'">
		              
		               <a href="../'.$username.'" > <div class="PGM_Itm">';

                          
                          echo '  <img src="'.$p_pic.'" />
                            <div class="PGM_Itm_Name">
                               '.$c_nm.' 
                            </div>
                           
                        </div></a></span>';
	 }
           }
    }
    }else
    {
           $user_id=$_SESSION['user_id'];
         $q1="select user_id as u from pages where page_id=$page_id";
    $r1=  mysqli_query($dbc, $q1);
    if($r1)
    {
           
           if(mysqli_num_rows($r1)>0)
           {
	 $row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
	
	  $admin_id=$row['u'];
$admin=0;
    if($admin_id==$user_id)
    {
           $admin=1;
    }
	 
	 $mem_id=$admin_id;
	    $quq="select username as u from users where user_id=$mem_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
		               $q22="SELECT username as u from users where user_id=$mem_id";
			$r22=mysqli_query($dbc,$q22);
			if($r22)
			{
				$row2=mysqli_fetch_array($r22,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
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
		       
		       echo '<a href="../'.$username.'" > <div class="PGM_Itm">';
		     
		              echo '   <div class="adminOfGroup">
                                admin
                            </div>';
		       
                          
                          echo '  <img src="'.$p_pic.'" />
                            <div class="PGM_Itm_Name">
                               '.$c_nm.' 
                            </div>
                           
                        </div></a>';
           }
    }
       
    $q="select followers as f from page_status where page_id=$page_id and followers!=0 and followers!=$admin_id";
  
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 $n=0;
	 while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	 {
	        $n=$n+1;
	        $mem_id=$row['f'];
	          $quq="select username as u from users where user_id=$mem_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
		               $q22="SELECT username as u from users where user_id=$mem_id";
			$r22=mysqli_query($dbc,$q22);
			if($r22)
			{
				$row2=mysqli_fetch_array($r22,MYSQLI_ASSOC);
				$username=$row2['u'];
			}
                        
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
		       
		       echo '<span class="mem_hold" id="mem_jold'.$mem_id.'">
		              ';
		       if($admin_id==$user_id)
		       {
		       echo '<span class="remove_mem_btn" onclick="remove_mem('.$page_id.','.$mem_id.')">X</span>
		       ';       
		       }
		       echo'
		               <a href="../'.$username.'" > <div class="PGM_Itm">';

                          
                          echo '  <img src="'.$p_pic.'" />
                            <div class="PGM_Itm_Name">
                               '.$c_nm.' 
                            </div>
                           
                        </div></a></span>';
	 }
           }
           if($admin_id==$user_id)
           {
	 echo ' <div class="addMemberBtn" onclick="add_group_members('.$page_id.')">
                        Add Members
                    </div>';
           }
    }
    }
    $page_id=$_REQUEST['page_id'];
   
    
   
    echo '<script type="text/javascript">
$(document).ready(function()
{

       $(\'.PGM_Total\').html(\' Total :'.$n.'\');
});
</script>';
    
}
?>
