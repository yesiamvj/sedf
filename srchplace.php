<html>
    <script type="text/javascript">
        
    </script>
    <style type="text/css">
        #usrs{
            width: 100%;
            text-align: left;
            height: 30px;
            padding: 25px;
        }
    </style>
<?php
require 'mysqli_connect.php';
$people=mysqli_real_escape_string($dbc,trim($_REQUEST['q']));

$q="SELECT user_id as uid,nativeplace as u FROM `basic` WHERE nativeplace REGEXP '$people' ";

    $n=0;
$r=mysqli_query($dbc,$q);
if($r)
{
    $c=0;
    
     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC ))
    {
        $n=$n+1;
        $users=$row['u'];
        $users_id=$row['uid'];
        $ppics="";
        
        $spp="SELECT own_pic as pic from profile_pics where own_user_id=$users_id";
        $rpp=mysqli_query($dbc,$spp);
        if($rpp)
        {
         if(mysqli_num_rows($rpp)>0)
        {
            $row=mysqli_fetch_array($rpp,MYSQLI_ASSOC);
            if($row)
            {
                $ppics=$row['pic'];
            }
           
        } else{
                $ppics="";
            }
        }
        
        echo"<input id=\"srchval\" type=\"hidden\" value=\"\">";
        echo "<div class=\"usrsdiv\" id=\"$n\" id=\"$n\" onmousemove=\"colorthisusr(this.id)\"  onclick=\"clicktoaddppl('$users_id','$users')\">";
     if($n>7)
     {
         echo"";
        
     }
     else{
          echo"<img src=\"$ppics\" onload=\"overflow()\" class=\"usrsimg\" width=\"25\" height=\"25\">";
     }
    
          
        
        echo"<input type=\"button\"  id=\"pplbtn\" class=\"$n\"   value=\"$users\" onclick=\"usrnm(this.value)\">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"hidden\" id=\"usersid$n\" value=\"$users\"> </div>";
    }
     }
    else{
        echo '';
    }
   
    $c=$n;
    
    echo"<input type=\"hidden\" id=\"fincnt\" value=\"$c\" />";



?>
</html>