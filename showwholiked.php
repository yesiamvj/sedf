<?php 
$liked_uid=$_REQUEST['q'];
    require 'mysqli_connect.php';

    $q="select likes as l from history where likes=$liked_uid";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $his_id=$row['l'];
                $q2="select first_name as fn from basic where user_id=$his_id";
                        $r2=mysqli_query($dbc,$q2);
                        if($r)
                        {
                            if(mysqli_num_rows($r)>0)
                            {
                                $rowd=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                                $c_name=$rowd['fn'];
                                echo''.$c_name.'';
                            }  else {
                            echo'empty name';    
                            }
                        }
            }
        }  else {
            echo 'No likes';
        }
    }

?>