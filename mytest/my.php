

<?php

require '../mysqli_connect.php';
$tot=array();
            
            
function select_q($tb_name,$sel_name,$where_q)
{
       global $dbc;
      
      
       $n=0;
       $c_ncut=array();
     
           $alen="$sel_name,";
         $alen= str_replace("`", "", $sel_name);
       while (strlen($alen)>0)
       {
              $n=$n+1;
              if(strpos($alen, ",")>-1)
              {
	      $c_ncut[$n]=  substr($alen, 0,  strpos($alen, ","));
	    
	          $c_ncut[$n]=  trim($c_ncut[$n],"`");
	         
              $alen=substr($alen,  strpos($alen, ","),  strlen($alen));
           
           
              }
            $alen=substr($alen,  strpos($alen, ",")+1,  strlen($alen));
       }
       
      $q="select $sel_name from $tb_name where $where_q";
      $r=  mysqli_query($dbc, $q);
      if($r)
      {
             $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
           for($t=1;$t<=count($c_ncut);$t++)
             {
	  $$c_ncut[$t]=$row[$c_ncut[$t]];
	  
             }
             
             for($t=1;$t<=count($c_ncut);$t++)
             {
	   $GLOBALS[$c_ncut[$t]]=$row[$c_ncut[$t]];
	  
             }
       
             for($t=1;$t<=count($c_ncut);$t++)
             {
	   return  $GLOBALS[$c_ncut[$t]];
	   
             }
             
      }else
      {
             echo mysqli_error_list($dbc);
      }
    
}


function sq($tb_nm,$q,$whr)
{
        
              global $dbc;
      
    
     $qn="$q,";
     
     //echo $qn;
       
       
       $selc=  str_replace("`","", $qn);
       $my_var=array();
       
      $my_nm=array();
    
       for($m=1;$m<=substr_count($selc, ',');$m++)
       {
              $my_nm[$m]=substr($qn,0,  strpos($qn, ","));
              $qn=substr($qn,strpos($qn, ",")+1, strlen($qn));
              if(strpos($my_nm[$m]," as ")>0)
              {
	    $my_var[$m]=  str_replace("as", "~", $my_nm[$m]);
	    $my_var[$m]=  str_replace(" ", "", $my_var[$m]);
	  
	    $my_var[$m]=substr($my_var[$m],strpos($my_var[$m],"~")+1,strlen($my_var[$m]));
              }else
              {
	$my_var[$m]=substr($my_nm[$m],0,  strlen($my_nm[$m]));  
	$my_var[$m]=  str_replace(" ","", $my_var[$m]);
              }
             ;
       }
       $qs="select $q from $tb_nm where $whr";
       $r=mysqli_query($dbc, $qs);
       if($r)
      {
              if(mysqli_num_rows($r)>0)
              {
	   $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
           
             
             for($t=1;$t<=count($my_var);$t++)
             {
	   $GLOBALS[$my_var[$t]]=$row[$my_var[$t]];
	  
             }
       
             for($t=1;$t<=count($my_var);$t++)
             {
	   return  $GLOBALS[$my_var[$t]];
	   
             }
              
              }else
              {
       for($t=1;$t<=count($my_var);$t++)
             {
	   $GLOBALS[$my_var[$t]]="";
	  
             }
       
             for($t=1;$t<=count($my_var);$t++)
             {
	   return  $GLOBALS[$my_var[$t]];
	   
             }
              
              }
             
      }else
      {
             echo "not";
             echo mysqli_error($dbc);
      }
       
       
       
}
      
       function q($q)
       {
              
              global $dbc;
      
     $qn=  str_replace("select ", "", $q);
    
     $qn=substr($qn,0,  strpos($qn, " from"));
     $qn="$qn,";
     
     //echo $qn;
       
       
       $selc=  str_replace("`","", $qn);
       $my_var=array();
       
      $my_nm=array();
       for($m=1;$m<=substr_count($selc, ',');$m++)
       {
              $my_nm[$m]=substr($qn,0,  strpos($qn, ","));

              $qn=substr($qn,strpos($qn, ",")+1, strlen($qn));
              if(strpos($my_nm[$m]," as ")>0)
              {
	    $my_var[$m]=  str_replace("as", "~", $my_nm[$m]);
	    $my_var[$m]=  str_replace(" ", "", $my_var[$m]);
	  
	    $my_var[$m]=substr($my_var[$m],strpos($my_var[$m],"~")+1,strlen($my_var[$m]));
              }else
              {
	$my_var[$m]=substr($my_nm[$m],0,  strlen($my_nm[$m]));  
	$my_var[$m]=  str_replace(" ","", $my_var[$m]);
              }
            echo $my_var[$m];
       }
      
       $rn=mysqli_query($dbc, $q);
     
       if($rn)
      {
              if(mysqli_num_rows($rn)>0)
              {
	  $p=0;
	       
	
	  for($t=1;$t<=count($my_var);$t++)
             {
	         
	        $$my_var[$t]=array();
	
	  
             }
            
             $u=array();
	  while($row=mysqli_fetch_array($rn,MYSQLI_ASSOC))
	  {
	         $p=$p+1;
	        
	         if(mysqli_num_rows($rn)>1)
	         {
	                             
           
              for($t=1;$t<=count($my_var);$t++)
             {
	
             ${$my_var[$t]}[]=$row[$my_var[$t]];
	  
             }
            
     }else
	         {
	                
             for($t=1;$t<=count($my_var);$t++)
             {
	   ${$my_var[$t]}[]=$row[$my_var[$t]];
	  
             }
       
             
	         }
	  }
	  
	//global $u;
	
             
             for($t=1;$t<=count($my_var);$t++)
             {
	         
             }
             for($t=1;$t<=count($my_var);$t++)
             {
	   foreach ($$my_var[$t] as $my)
	   {
	      $GLOBALS[$my_var[$t]]= sel_mr($my_var,$$my_var[$t]);
	    
	   }
              
             }
           
          
            
              }else
              {
       for($t=1;$t<=count($my_var);$t++)
             {
	   $GLOBALS[$my_var[$t]]="";
	  
             }
            


             for($t=1;$t<=count($my_var);$t++)
             {
	   for($p=0;$p<count($$my_var[$t]);$p++)
	   {
	          $a=$$my_var[$t][$p];
	          return $a;    
	   }
	   
	   
             }
              
              }
             
      }else
      {
            
             
             echo mysqli_error($dbc);
      }
       
       }
      
     
     
     function sel_mr($a,$ab)
     {
            
             
            for($t=1;$t<=count($a);$t++)
            {
	  foreach ($ab as $my)
	  {
	      
	         ${$a[$t]}[]=$my;
	        
	  }
            }
            
            for($t=1;$t<=count($a);$t++)
            { 
	  return $$a[$t];
            }
           
            
     } 
     $q="select user_id as dfdfd,email as em,mobno as m from users";
    q($q);

echo count($m);
  
       echo $email[3];
        
       
       
     
       
?>
