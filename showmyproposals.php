<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $snct=0;
    $q="select proposer_id as u,propose_id as pi,seen as s ,time as t,propose_type as tp,accept as ac,accpt_time as act,reject as r from propose where user_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $p_id=$row['u'];
                $prpsd_id=$row['pi'];
                $type=$row['tp'];
                $time=$row['t'];
                $ac_time=$row['act'];
                $accpt=$row['ac'];
                $rejct=$row['r'];
                $seen=$row['s'];
                $qe="update propose set seen=1 where propose_id=$prpsd_id";
            
                $re=mysqli_query($dbc,$qe);
                if($re)
                {
                    
                if($seen=="1")
                {
                    $snct=$snct+1;
                    $stl="white;";
                }else
                {
                    $stl="lightgreen;";
                }
                }
                $q4="select age as ag,sex as s,day as d,month as m,year as y  from basic where user_id=$p_id ";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
                    $ro=mysqli_fetch_array($r4,MYSQLI_ASSOC);
                    if(!empty($ro))
                    {
                      $sex=$ro['s'];
                    $age=$ro['ag'];
                    $day=$ro['d'];
                    $month=$ro['m'];
                    $year=$ro['y'];  
                    }  else {
                        $sex="";
                    $age="";
                    $day="";
                    $month="";
                    $year="";
                    }
                    
                    
                }
                $q5="select veryfied_times as vs from verify where user_id=$p_id ";
                $r5=mysqli_query($dbc,$q5);
                if($r5)
                {
                    $rowd=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                    if(!empty($rowd))
                    {
                        $v_time=$rowd['vs'];
                        if($v_time>="5")
                        {
                            $vf="Verified";
                        }else
                        {
                            $vf="Not Verified";
                        }
                    }
                }
                $q1="select c_name as c from contacts where user_id=$user_id and cu_id=$p_id";
                $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    $nc=0;
                    $rows=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                    if(!empty($rows))
                    {
                        $c_name=$rows['c'];
                    }else
                    {
                        $nc=1;
                        $q2="select first_name as f from basic where user_id=$p_id";
                        $r2=mysqli_query($dbc,$q2);
                        if($r2)
                        {
                            $rt=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                            $c_name=$rt['f'];
                        }
                    }
                }
               if($accpt=="1" || $rejct=="1")
               {
                   if($accpt=="1")
                   {
                                 
                   echo' <div class="MNF_Rel_Req_Itm" style="background-color:'.$stl.'" id="Notif16" style="background-color: rgba(0,0,0,0.03);" //onmouseover="$(\'#Notif16\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  You accepted <span class="RelReqMyDet"> '.$c_name.'\'s Propose</span><div class="reqTime">('.$ac_time.')</div> </div>
                                       
                                    </div>
                            </div>'; 
                   }
                   if($rejct=="1")
                   {
                                 
                   echo' <div class="MNF_Rel_Req_Itm" id="Notif16" style="background-color:'.$stl.'" style="background-color: rgba(0,0,0,0.03);" //onmouseover="$(\'#Notif16\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  You rejected <span class="RelReqMyDet"> '.$c_name.'\'s Propose</span><div class="reqTime"></div> </div>
                                       
                                    </div>
                            </div>'; 
                   }
                  
               }else
               {
                if($type=="0")
                {
                    echo'  
                        <div class="MNF_Rel_Req_Itm" id="Notif2"  style="background-color:'.$stl.'" style="background-color: rgba(0,0,0,0.03);" //onmouseover="$(\'#Notif2\').css({\'background-color\':\'white\'});" >
                                <div class="RelReqItmIn">
                                    <div class="RelReqFace">
                                        <div class="RelReqPplThme" style="background-color: crimson;" ></div>
                                        <img class="img_relreq" src="profileimg.PNG"/>
                                    </div>
                                    <div class="RelReqDets">
                                        <div class="RelReqNme">'.$c_name.' <span class="RelReqMyDet"><span class="divider">|</span>'.$age.'+<span class="divider">|</span>'.$sex.'<span class="divider">|</span>'.$vf.'</span> <div class="reqTime">'.$day.' '.$month.' '.$year.'</div> </div>
                                        <div class="RelReqExt"><div class="RReqXdets"> Propsed bravely  </div>  <div class="RelReqAccpt" id="accpthisprps'.$p_id.'" onclick="accptprps(\''.$p_id.'\',\'#accpthisprps'.$p_id.'\',\'#rejctprps'.$p_id.'\',\'1\')">Accept</div><div class="RelReqAccpt" id="rejctprps'.$p_id.'" onclick="accptprps(\''.$p_id.'\',\'#rejctprps'.$p_id.'\',\'#accpthisprps'.$p_id.'\',\'2\')">Reject</div></div>
                                    </div>
                                </div>
                            </div>';
                } 
                else {
                echo' <div class="MNF_Rel_Req_Itm" id="Notif16"  style="background-color:'.$stl.'" style="background-color: rgba(0,0,0,0.03);" //onmouseover="$(\'#Notif16\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  ';
                if($nc==1)
                {
                    echo 'Some One';
                }  else {
                    echo'One of your Relation';
                }echo'  <span class="RelReqMyDet"> Proposed  you secretly</span><div class="reqTime">'.$time.'</div> </div>
                                       
                                    </div>
                            </div>';    
                }   
               }
                
            }
        }
    }
    
    
    $q="select user_id as u,time as t,propose_type as tp,accept as ac,accpt_time as act,reject as r from propose where proposer_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            echo 'avl';
            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $p_id=$row['u'];
                $type=$row['tp'];
                $time=$row['t'];
                $ac_time=$row['act'];
                $accpt=$row['ac'];
                $rejct=$row['r'];
        
                $q1="select c_name as c from contacts where user_id=$user_id and cu_id=$p_id";
                $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    $nc=0;
                    $rows=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                    if(!empty($rows))
                    {
                        $c_name=$rows['c'];
                    }else
                    {
                        $nc=1;
                        $q2="select first_name as f from basic where user_id=$p_id";
                        $r2=mysqli_query($dbc,$q2);
                        if($r2)
                        {
                            $rt=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                            $c_name=$rt['f'];
                        }
                    }
                }
               if($accpt=="1" || $rejct=="1")
               {
                   if($accpt=="1")
                   {
                                 
                   echo' <div class="MNF_Rel_Req_Itm"  style="background-color:'.$stl.'"  id="Notif16" style="background-color: rgba(0,0,0,0.03);" //onmouseover="$(\'#Notif16\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  '.$c_name.' accepted <span class="RelReqMyDet"> your Propose</span><div class="reqTime">('.$ac_time.')</div> </div>
                                       
                                    </div>
                            </div>'; 
                   }
                   if($rejct=="1")
                   {
                                 
                   echo' <div class="MNF_Rel_Req_Itm"  style="background-color:'.$stl.'" id="Notif16" style="background-color: rgba(0,0,0,0.03);" //onmouseover="$(\'#Notif16\').css({\'background-color\':\'white\'});" >
                               
                                    <div class="Notif_Propose_unk">
                                        <div class="RelReqNme">  '.$c_name.' rejected <span class="RelReqMyDet"> your Propose</span><div class="reqTime"></div> </div>
                                       
                                    </div>
                            </div>'; 
                   }
                  
               }
                
            }
        }
    }  else {
        echo 'nr';    
    }
  
    echo'


<script type="text/javascript" >
$(document).ready(function()
{
    $("#new_prps_alrt").html("'.$snct.'");
});
</script>';
    
}

?>