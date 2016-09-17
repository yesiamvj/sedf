<?php session_commit();
        
    require_once '../web/mysqli_connect.php';
    
    // for table includes
 
    require '../web/_t_basic.php';
 
 
 
 $q="select cu_id as c from contacts where user_id=$owner_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                    $totrel_cont=mysqli_num_rows($r);
                                   
                                }
                                 $q="select email as em ,mobno as m,website as wb from person_config where user_id=$owner_id";
                      $r=  mysqli_query($dbc, $q);
                      if($r)
                      {
                          if(mysqli_num_rows($r)>0)
                          {
                              $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $mobile_no=$row['m'];
                              $email_id=$row['em'];
                              $website=$row['wb'];
                              
                          }else
                          {
                                $mobile_no="";
                              $email_id="";
                              $website="sedfed.com/$owner_id";
                          }
                      }
 
 
 
 
    
 // for total post count
 $q="select post_id from post_permision where user_id='$owner_id'";
 $r=  mysqli_query($dbc,$q);
 $totalPostCnt= mysqli_num_rows($r);
 
 //for total profile views
 $q="SELECT profile_view as pf from history where user_id=$owner_id and profile_view!=0"; 
                                    $r=mysqli_query($dbc,$q);
                                    if($r)
                                    {
                                     
		      $pv_count=  mysqli_num_rows($r);
                                    }
                             
?>