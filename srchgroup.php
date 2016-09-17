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
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    echo'empty session in srch user';
}else
{
require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$people=mysqli_real_escape_string($dbc,trim($_REQUEST['q']));

$q="SELECT group_name as u,group_id as uid,grp_pic as pic  FROM `groups`  WHERE `group_name` REGEXP '$people' ";

    $n=0;
$r=mysqli_query($dbc,$q);
if($r)
{
    $c=0;
    
     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC ))
    {
        $n=$n+1;
        $group=$row['u'];
        $group_id=$row['uid'];
        $grp_pic=$row['pic'];
        
       
       
        $ppics="";
        echo "<div class=\"usrsdiv\" id=\"$n\" onmousemove=\"colorthisusr(this.id)\"  onclick=\"clicktoaddppl('$group_id','$group')\">";
     if($n>7)
     {
         echo"";
         $group="";
     }
     else{
          echo"<img src=\"$grp_pic\"  class=\"usrsimg\" width=\"25\" height=\"25\">";
     }
    
          
        
        echo"<input type=\"button\"  id=\"pplbtn\" class=\"$n\"   value=\"$group\" >  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"hidden\" id=\"usersid$n\" value=\"$group_id\"> </div>";
    }
     }
    else{
        echo '';
    }
   
   
    $c=$n;
    
    echo"<input type=\"hidden\" id=\"fincnt\" value=\"$c\" />";


    
}


?>
</html>