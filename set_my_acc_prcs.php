  <?php session_start(); 
  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else
{
        $user_id=$_SESSION['user_id'];
         require 'mysqli_connect.php';
       
        $which_clmn=  mysqli_real_escape_string($dbc,trim($_REQUEST['which']));
        $what=mysqli_real_escape_string($dbc,trim($_REQUEST['new_name']));
        if($which_clmn=="mobno")
        {
               $hint="Mobile no";
        }else
        {
               if($which_clmn=="email")
               {
	     $hint="Name";
               }
        }
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
         $spl_chr[40]="partner";
         
         $put_username=0;
         $usename=$what;
           for($t=0;$t<40;$t++)
           {
	 if($t>32)
	 {
	        if($spl_chr[$t]==$usename)
	        {
	                $put_username=1;
	                
	        }
	 }
	 elseif(strpos($what, $spl_chr[$t])>-1)
	 {
	         $put_username=2;
	 }
           }
   
           if($put_username==0)
           {
	     // for mobile
        if($which_clmn=="mobno")
        {
              if(strlen($what)>9 && is_numeric($what))
        {
              $q="select user_id as u from users where user_id=$user_id";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
               if(mysqli_num_rows($r)>0)
               {
	     $q3="select user_id as u from users where (mobno='$what' or username='$what' or email='$what') and user_id!=$user_id";
	     $r3=  mysqli_query($dbc, $q3);
	     if($r3)
	     {
	            if(mysqli_num_rows($r3)>0)
	            {
		  echo 'This '.$hint.' Already taken ';
	            }  else {
		    $q2="update users set $which_clmn='$what' where user_id=$user_id";
	     $r2=  mysqli_query($dbc, $q2);
	     if($r2)
	     {
	            echo 'success';
	     }else
	     {
	            echo 'no ';
	     }
	            }
	     }
	   
               }
        } 
        }else
        {
               echo 'Mobile number should be above 9 numbers<br/>';
               if(!is_numeric($what))
               {
	     echo 'Numbers only allowed';
               }
        }
        }
         // for email
       if($which_clmn=="email")
       {
               if(strlen($what)>5)
        {
              $q="select user_id as u from users where user_id=$user_id";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
               if(mysqli_num_rows($r)>0)
               {
	     $q3="select user_id as u from users where (mobno='$what' or username='$what' or email='$what') and user_id!=$user_id";
	     $r3=  mysqli_query($dbc, $q3);
	     if($r3)
	     {
	            if(mysqli_num_rows($r3)>0)
	            {
		  echo 'This '.$hint.' Already taken ';
	            }  else {
		    $q2="update users set $which_clmn='$what' where user_id=$user_id";
	     $r2=  mysqli_query($dbc, $q2);
	     if($r2)
	     {
	            echo 'success';
	     }else
	     {
	            echo 'no ';
	     }
	            }
	     }
	   
               }
        } 
        } else
       {
              echo 'Please Enter a valid length email ';
       }
       }
           }else
           {
	 echo 'This name Cant\'be taken,Choose Different name';
           }
   
        
}