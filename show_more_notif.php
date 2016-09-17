<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    
   $user_id=$_SESSION['user_id'];
   $strt=$_REQUEST['q'];
   
   require 'mysqli_connect.php';
   $q="select notif_id as n from notification order by notif_id asc";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
       $n_id=$row['n'];
   }
     $q="select notif_id as nid,user_id as c,notice as nt,time as t,my_notif_id as m from notification where notif_id between 1 and $strt and (cu_id=$user_id or user_id=$user_id) and notif_id !=$strt order by notif_id  desc limit 25";
    
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       if(mysqli_num_rows($r)>0)
       {
           $n=0;
      while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
      {  
          echo'<div>';
          $his_id=$row['c'];
            $n=$n+1;
           
        $my_notif_id=$row['m'];
        $notif_id=$row['nid']; 
        $quq="select username as u from users where user_id=$his_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $ppic='../'.$ppl_usrename.'/ppic5.jpg';
        
     $qr="update notification set seen=1 where my_notif_id=$my_notif_id";
     $rr=mysqli_query($dbc,$qr);
     
           $notice=$row['nt'];
           $time=$row['t'];
         $quq="select username as u from users where user_id=$his_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $ppic='../'.$ppl_usrename.'/ppic5.jpg';
             $quq="select username as u from users where user_id=$user_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $mypic='../'.$ppl_usrename.'/ppic5.jpg';
           $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$his_id";
           $r3=mysqli_query($dbc,$q3);
           if($r3)
           {
               $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
               if(!empty($roi))
               {
                   
               $c_nm=$roi['c'];
               }else
               {
                   $q5="select first_name as f from basic where user_id=$his_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $c_nm=$ry['f'];
                   }
               }
            }
            
            $q2="select cu_id as c from notification where my_notif_id=$my_notif_id";
            $r2=mysqli_query($dbc,$q2);
            if($r2)
            {
                
               $tot=mysqli_num_rows($r2);
            }
      if($n>1)
      {
          if($pre!=$my_notif_id)
          {
              $m=0;
          }  else {
              $m=1;
          }
          
      }else {
      $m=0;    
      }
           if($his_id==$user_id && $m==0)
           {
	 
              echo' <div class="MNF_Msg_Itm"   onmouseout="$(\'#shownotifpplls'.$notif_id.'\').fadeOut();">
                                <div class="Notif_Msg_In_Out">
                                    <div class="NotifMsgPpl_Out"  >

                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$ppic.'" alt="MYface" />
                                    </div>

                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr_Out"  ></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"><span class="Notif_To" >To</span><span onmouseover="shownotifpeople(\''.$my_notif_id.'\',\''.$notif_id.'\')"> '.$tot.' People </span><span class="Notif_MsgDets"> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt">';
     
              echo'</div>
                                    </div>
                                    </div>

                                </div>
                            </div>';
                           echo'<div class="for_out_notifpplshows" id="shownotifpplls'.$notif_id.'" style="display:none;"><div id="notifpplcont'.$my_notif_id.'"></div></div>';
      
           }elseif($user_id!==$his_id)
           {
               $q4="select seen as s from notification where my_notif_id=$my_notif_id";
               $r4=mysqli_query($dbc,$q4);
               if($r4)
               {
                   $rty=mysqli_fetch_array($r4,MYSQLI_ASSOC);
                   $seen=$rty['s'];
               }
               if($seen==1)
               {
                   $stl="background-color:whitesmoke;cursor:pointer;";
               }  else {
                   $stl="background-color:lightgrey;cursor:pointer;";
               }
             echo'  <div class="MNF_Bulb_Itm" style="'.$stl.'" id="notifnm'.$n.'" onmouseover="iamseennot('.$my_notif_id.',\'#notifnm'.$n.'\')" >
                                <div class="Notif_Msg_In"  >
                                    <div class="NotifMsgPpl">
                                        <div class="Notif_Msg_Pplthme"></div>
                                    <div class="Notif_Msg_Face">
                                        <img class="img-Notif_Msg_Face" src="'.$ppic.'" alt="'.$c_nm.'" />
                                    </div>
                                    </div>
                                    <div class="NotifMsgContHold">
                                        <div class="Notif_Msg_Arr"></div>
                                    <div class="Notif_Msg_Cont">
                                        <div class="Ntf_Msg_Sendr"> '.$c_nm.' <span class="Notif_MsgDets"><span class="divider" >|</span><span class="pointnotif_ppl" onmouseout="$(\'#shownotifpplls'.$notif_id.'\').fadeOut();" onmouseover="shownotifpeople(\''.$my_notif_id.'\',\''.$notif_id.'\')" > with '.$tot.' people </span> </span> <div class="Notif_Msg_Time">'.$time.'</div> </div>
                                        <div class="Ntf_Msg_Txt">
                                            '.$notice.'
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <div id="notifpplsh"></div>
';
                       echo'<div class="notifpplshows" id="shownotifpplls'.$notif_id.'" style="display:none;"><div id="notifpplcont'.$my_notif_id.'"></div></div>';
      
           }
      
       $pre=$my_notif_id;
       
       echo'</div>';
   }
   
   
           if(mysqli_num_rows($r)<25)
           {
             
           }else
           {
               echo'<div id="for_mv_max_not"><input type="hidden" value="'.$notif_id.'" id="max_notif_id" /></div>';
   echo'<div id="remv_pre_shmr" style="background-color:white;paddding:10px;cursor:pointer;text-align:center;" onclick="showmorenotifs()">Show More Notification </div>';
    
           }
        }else
       {
           echo'emp';
       }
    
   }
}