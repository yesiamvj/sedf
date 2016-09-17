<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['p']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $cnt=$_REQUEST['cnt'];
    $poster_id=$_REQUEST['p'];
    require 'mysqli_connect.php';
    
    $q="select p_pic as p from small_pics where user_id=$poster_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $p_pic=$row['p'];
        }else
        {
            $p_pic="male.png";
        }
    }
    $q="select mythink as t from status where user_id=$poster_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
            $status=$row['t'];
        }else
        {
            $status="";
        }
    }
    /*
    $qa="select age as ag,nativeplace as np,nick_name as nm from basic where user_id=$poster_id";
    $ra=mysqli_query($dbc,$qa);
    if($ra)
    {
        if(mysqli_num_rows($ra)>0)
        {
            $row=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
            $age=$row['ag'];
            $np=$row['np'];
            $nick_name=$row['nm'];
        }else
        {
            $age="";
            $np="";
             $nick_name="";
        }
    }
    
       $uname="select c_name as fname from contacts where user_id=$user_id and  cu_id=$poster_id";
                                                     $runnm=mysqli_query($dbc,$uname);
                                                     if($runnm)
                                                     {
                                                         if(mysqli_num_rows($runnm)>0)
                                                         {
                                                             $rownm=mysqli_fetch_array($runnm);
                                                             $poster_name=$rownm['fname'];
                                                         }else{
                                                             $selemail="select first_name as em from basic where user_id=$poster_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $poster_name=$rowemail['em'];
                                                             }
                                                         }
                                                     }
      
      */
                                              
    echo'
<div id="forPeopleSedfedTag'.$cnt.'" class="" onmouseover="mouseOnSFTag(\'#forPeopleSedfedTag'.$cnt.'\')" onmouseout="mouseOutSFTag(\'Vijayakumar \',\'#SedFedUserName\',\'.forPeopleSedfedTag\',\'.forQPdmyDetails\')">
                                    
                                   
                                    <div id="forQPmyFirstApp" >
                                    <div id="forQuickSFprofile" onmouseover="mouseOnQPsf(\'#forQuickSFprofile\')" onmouseout="mouseOutQPsf(\'#forQuickSFprofile\')">
                              </div>
                                    <img  onmouseover="mouseOnQPface(\'Vijayakumar Vijay\',\'.SedFedUserName\',\'.forPeopleSedfedTag\',\'#forQuickSFprofile\',\'.forQPdmyDetails\')" onmouseout="mouseOutQPface(\'#forQuickSFprofile\')" id="SedFedUserFace" src="'.$p_pic.'" />
                                    <div id="forQPdmyDetails" class="forQPdmyDetails">
                                        <table>
                                          
                                             <tr >
                                                 <td id="ttl3" ><span id="forQPmyDetTtle">Status</span></td><td><span id="forQPmyDetAns">'.$status.'</span></td>
                                               
                                            </tr>
                                            
                                         </table>
                                    </div>
                                    
                                    </div>  
                                    
                                </div>   
                            </div>';
}
?>