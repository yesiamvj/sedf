<?php session_start();
if(empty($_REQUEST['q']))
{
}else
{
       $usernm=$_REQUEST['q'];
        require 'mysqli_connect.php';
        $usernm=  mysqli_real_escape_string($dbc,trim($usernm));
      
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
         $spl_chr[40]="0";
         $spl_chr[41]="1";
         $spl_chr[42]="2";
         $spl_chr[43]="3";
         $spl_chr[44]="4";
         $spl_chr[45]="5";
         $spl_chr[46]="6";
         $spl_chr[47]="7";
         $spl_chr[48]="8";
         $spl_chr[49]="9";
         
         
         $put_username=0;
           for($t=0;$t<49;$t++)
           {
	 if($t>32 && $t<40)
	 {
	        if($spl_chr[$t]==$usernm )
	        {
	                $put_username=1;
	                
	        }
	 }
	 elseif(is_numeric($usernm))
	 {
	         $put_username=2;
	 }
           }
           
   
    
      $q="select username as m from users where username='$usernm' or email='$usernm'";
      $r=  mysqli_query($dbc, $q);
      if($r)
      {
             if(mysqli_num_rows($r)>0 || $put_username==1 || $put_username==2)
             {
	    echo '<div id="no" class="availUN">Unavailable</div>';    
     
	  }  else {  
	            $q3="select page_name as p from pages where page_name='$usernm'";
	           $r3=  mysqli_query($dbc, $q3);
	           if($r3)
	           {
		 if(mysqli_num_rows($r3)>0)
		 {
		         echo '<div id="no" class="availUN">Unavailable</div>';    
     
		 }  else {
		         echo ' Availability : <div class="availUN" id="yes" >Available</div>';
           
		 }
	           }
	           
	           
	           }
      }
       
}