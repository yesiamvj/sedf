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
$n=0;
$user_id=$_SESSION['user_id'];
$people=mysqli_real_escape_string($dbc,trim($_REQUEST['q']));


   
     $qrt="SELECT first_name as em,user_id as uid,nativeplace as tp FROM `basic` WHERE first_name REGEXP '$people'";
    $rem=mysqli_query($dbc,$qrt);
    if($rem)
    {
        while ($rows=mysqli_fetch_array($rem,MYSQLI_ASSOC))
        {
            $n=$n+1;
            $emails=$rows['em'];
            $users_ids=$rows['uid'];
            $type=$rows['tp'];
             
	 $quq="select username as u from users where user_id=$users_ids";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                  echo "<div class=\"usrsdiv\" id=\"$n\" onmousemove=\"colorthisusr(this.id)\"  onclick=\"clicktoaddppl('$users_ids','$emails')\">";
  
           echo"<img src=\"$p_pic\" width=\"25\" height=\"25\">";
        
        
        echo"<input type=\"button\"  id=\"pplbtn\" class=\"$n\"   value=\"$emails\" onclick=\"usrnm(this.value)\" />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$type<input type=\"hidden\" id=\"usersid$n\" value=\"$users_ids\"> </div>";
   
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