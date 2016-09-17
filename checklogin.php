

 <html>
 <head>
    <meta charset="utf-8">
    <meta name="dcterms.created" content="Sat, 31 Jan 2015 05:33:50 GMT">
    <meta name="description" content="sedfed is a social networking site">
    <meta name="keywords" content="sedfed,sedfed">
    <meta name="viewport" content="width=device-width" >
    <link rel="shortcut icon" href="sedfedlogo23.png">

  

    <title>Log in</title><body>
<?php session_start();       
function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

  $ua=getBrowser();
                $ip_add=$_SERVER['REMOTE_ADDR'];
                $cday=date('F j, Y');
    $curtime=date("g:i a,s");
    $browser=$ua['name'];
    
            require 'mysqli_connect.php';
           $username=mysqli_real_escape_string($dbc,htmlentities($_REQUEST['username']));
           $passwor=$_REQUEST['password'];
   if(!empty($_REQUEST['username'])){
    
    if(!empty($passwor)){
        $pass=$passwor;
    }else {
        $pass="";
    }  
{
   
// now try it

    $user=  mysqli_real_escape_string($dbc,trim($username));
    $pass=  mysqli_real_escape_string($dbc,trim($pass));
    $cpass=  sha1($pass);
    $which_type=$_REQUEST['which_type'];
    $q="select user_id as n,username as unm from users where ((username='$user' or mobno='$user' or email='$user' or user_id='$user') and (pass1='$cpass' or pass2='$cpass'))";
    $r=  mysqli_query($dbc, $q);
    $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $confirm=$row['n'];
    if(!empty($confirm))
        {
     $user_name=$row['unm'];
         $_SESSION['user_id'] = $confirm; 
           $_SESSION['user_name']=$user_name;
           
           $user_id=$_SESSION['user_id'];
           $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$user_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	      $roed=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	      $theme=$roed['thm'];
	      $txt_clr=$roed['$theme_txt_color'];
	 }else
	 {
	        $theme="#008b8b";
	        $theme_txt_color="navy";
	        
	        
	 }
	  $_SESSION['theme_color']=$theme;
	        $_SESSION['txt_color']=$theme_txt_color;
	       
           }
        $sun="select first_name as fname from basic where user_id=$confirm";
        $rsun=mysqli_query($dbc,$sun);
        if($rsun)
        {
            if(mysqli_num_rows($rsun)>0)
            {
                $rowfn=mysqli_fetch_array($rsun,MYSQLI_ASSOC);
                $firstname=$rowfn['fname'];
             $_SESSION['myfullname']=$firstname;
            }else{
              
                
            }
        }
        
        if(!is_link('../'.$user_id.'/index.php'))
        {
           
      $now = '../'.$user_id.'';
      $dir='../'.$user_name.'';
      mkdir($now,0777,true);
      
      $myfil=fopen("$now/index.php","w");
  $myfiltxt='<?php
   header("location:'.$dir.'");
  ?>';
  fwrite($myfil,$myfiltxt);  
        }
                
        if(empty($firstname))
        {
            header("location:start_profile.php");
        }
        else{
            $time = date("g:i a ,F j, Y"); 
            
            $q="INSERT INTO history (user_id,last_login)values($confirm,'$time')";
            $r=mysqli_query($dbc,$q);
            if($r)
            {
              


$q="select myupdate as upt,acc_id as act from access where user_id=$confirm limit 2";
$r=mysqli_query($dbc,$q);
if($r)
{
    if(mysqli_num_rows($r)>1)
    {
        $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $up=$row['upt'];
         
               $acc_id=$row['act'];
                        if($up=="1")
                        {
                            $upacc_id=2;
                            $q5="update access set myupdate=2 where acc_id=$acc_id";
                            $r5=mysqli_query($dbc,$q5);
                            $q4="select acc_id as a from access where user_id=$confirm order by acc_id desc limit 1";
                          
                        }else
                        {
                            $upacc_id=1;
                            
                            $q5="update access set myupdate=1 where acc_id=$acc_id";
                            $r5=mysqli_query($dbc,$q5);
                             $q4="select acc_id as a from access where user_id=$confirm order by acc_id asc limit 1";
                          
                        }
                        $r4=mysqli_query($dbc,$q4);
                        if($r4)
                        {
                            $rot=mysqli_fetch_array($r4,MYSQLI_ASSOC);
                            $acc_id=$rot['a'];
                        }
                        
               $q2="update access set login='$curtime',logout='$curtime',browser='$browser',day='$cday' where  acc_id=$acc_id";
                $r2=mysqli_query($dbc,$q2);
                if($r2)
                {
	       $q2="update person_config set locked=0 where user_id=$user_id";
	      $r2=  mysqli_query($dbc, $q2);
	      switch ($which_type)
	      {
	             case 1:
		   header("location:globe.php");
		   break;
	             case 2:
		   header("location:single_taskbar.php");
		   break;
	             case 3:
		   header("location:single_online.php");
		   break;
	             
	             case 4:
		   header("location:single_post.php");
		   break;
	       
	      }
	 
                   
                    
                }else
                {
                    echo' not updated login';
                }
               
          
    }else
    {
      
           $q1="insert into access (user_id,browser,login,ip_add,myupdate,day,logout)values($confirm,'$browser','$curtime','$ip_add',2,'$cday','$curtime')";
    $r1=mysqli_query($dbc,$q1);
    
    $q1="insert into access (user_id,browser,login,ip_add,myupdate,day,logout)values($confirm,'$browser','$curtime','$ip_add',2,'$cday','$curtime')";
    $r1=mysqli_query($dbc,$q1);
     switch ($which_type)
	      {
	             case 1:
		   header("location:globe.php");
		   break;
	             case 2:
		   header("location:single_taskbar.php");
		   break;
	             case 3:
		   header("location:single_online.php");
		   break;
	             
	             case 4:
		   header("location:single_post.php");
		   break;
               
	       
	      }
    }
 
    
}else
{
}
              
            }else
            {
                
                echo mysqli_error($dbc);
            }
           
        }
    }
 else {
     $cday=date('F j, Y');
  $curtime=date("g:i a,s");

     $today="$cday $curtime";
         $qe="select user_id as u from users where username='$user' or user_id='$user' or email='$user'";
    $re=mysqli_query($dbc,$qe);
        if($re)
        {
            if(mysqli_num_rows($re)>0)
            {
                $row=mysqli_fetch_array($re,MYSQLI_ASSOC);
                $myid=$row['u'];
                
             $qr="insert into wrn_access (user_id,passwd,ip,browser,time)values('$myid','$pass','$ip_add','$browser','$today')";   
             $rr=mysqli_query($dbc,$qr);
             if($rr)
	{
               header("location:index.php");
             }else
             {
          echo mysqli_error($dbc);
             }
            }else {
            header("location:index.php");
        }
        }  else {
            header("location:index.php");
        }
        }
}
    }
    else{
    if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
    {
        
       header("location:globe.php");
    }
    else{
        
         header("location:index.php");
    }
    }
   
            ?>
 

  </body>


</html>

