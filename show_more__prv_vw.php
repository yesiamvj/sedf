<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    
   $user_id=$_SESSION['user_id'];
   $strt=$_REQUEST['q'];
   
   require 'mysqli_connect.php';
   $q="select hstry_id as n from history order by hstry_id asc";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
       $n_id=$row['n'];
   }
     $q="select profile_view as pf,time as t,seen as s,hstry_id as hsid from history where hstry_id between $n_id and $strt and  user_id=$user_id order by hstry_id desc limit 25";
 
     $r=mysqli_query($dbc,$q);
  if($r)
  {
      if(mysqli_num_rows($r)>0)
      {
          $cnct=0;
          $unct=0;
          while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
          {
              $cu_id=$row['pf'];
                $time=$row['t']; 
                $seen=$row['s'];
                $hstry_id=$row['hsid'];
                if($seen=="0")
                {
                    $stl="lightgrey";
                }else
                {
                    
                    $stl="white";
                }
    
              $q2="select cu_id as c from contacts where user_id=$user_id and cu_id=$cu_id";
             
              $r2=mysqli_query($dbc,$q2);
              if($r2)
              {
                  if(mysqli_num_rows($r2)>0)
                  {
                  $cnct=$cnct+1;    
                      
                      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
                      $time=$row['t'];
             
                      echo'<div class="MNF_Like_Itmin" style="background-color:'.$stl.'" >
                             
                              <div class="Notif_Liker"  >
                                    One of your relation <div class="Notif_Just_Tip">Visited your profile '.$time.'</div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No">
                                       
                                      </div>
                                   
                                  </div>
                              </div>
                             
                          </div>
                      </div>';
                  }else
                  {
                      $unct=$unct+1;
                      echo'<div class="MNF_like_itm"  >
                          <div class="MNF_Like_Itmin"  >
                             
                              <div class="Notif_Liker" >
                                An Unknown person <div class="Notif_Just_Tip">Visited your profile '.$time.'</div>
                                  <div class="Notif_Time">
                                      <div class="Notif_Gft_Post_No">
                                        
                                      </div>
                                      
                                  </div>
                              </div>
                              
                          </div>
                      </div>';
                  }
                 
                  
                      $q3="update history set seen=1 where user_id=$user_id";
        $r3=mysqli_query($dbc,$q3);
              }
          }
           echo'<div id="for_rmv_max_val_prf"><input type="hidden" value="'.$hstry_id.'" id="max_prf_view"/></div>';
           if(mysqli_num_rows($r)<25)
           {
                 
           }else
           {
               echo'<div id="shr_mr_prf_vw" onclick="showmore_prf_view()" style="padding:10px;" >Show More</div>';
           }
           
                                            echo'
                           <script type="text/javascript">
                           $(document).ready(function()
                           {
                               $("#tot_prof_view").html("'.($unct+$cnct).'");
                           });
                           </script>';
      }
  }else
  {
      echo mysqli_error($dbc);
  }
}