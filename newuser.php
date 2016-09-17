<html>
    <head>
        <title>
            Processing
        </title>
    </head>
    <body>
    <?php session_start();
   
    $mail=$_POST['email'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    $mob_no=$_POST['mob_no'];
    require 'mysqli_connect.php';
    $email= mysqli_real_escape_string($dbc, trim($mail));
    if(empty($pass1)){
        $p1="";
    }  else {
        require_once 'mysqli_connect.php';
        $pass1= mysqli_real_escape_string($dbc, trim($pass1));
    $p1=$pass1;   
    }
    if(empty($pass2)){
        $p2="";
    }
 else {
      require_once 'mysqli_connect.php';
        $pass2= mysqli_real_escape_string($dbc, trim($pass2));
    $p2=$pass2;    
    }
    if (isset($mob_no)){
         require_once 'mysqli_connect.php';
        $mob_no= mysqli_real_escape_string($dbc, trim($mob_no));
    if(isset($email)){
     $email=mysqli_real_escape_string($dbc, trim($email));
    $q="SELECT user_id from users where  email='$email' or mobno='$mob_no'";
     $r=mysqli_query($dbc,$q);
     if($r)
     {
        $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
        if(empty($row)){
   
    $q2="INSERT INTO `users` ( `email`, `pass1`, `pass2`, `mobno`, `username`,`reg_date`) VALUES ('$email',SHA1('$p1'), SHA1('$p2'), '$mob_no', '$email',CURRENT_TIMESTAMP)";
    echo $q2;
    $r2 = mysqli_query($dbc, $q2);
    if ($r2) {
           $qx="select user_id as u from users where email='$email'";
           $rx=  mysqli_query($dbc, $qx);
           if($rx)
           {
	 $row=  mysqli_fetch_array($rx,MYSQLI_ASSOC);
	 $user_id=$row['u'];
           }
           $q2="insert into person_config (user_id,lock_pass,speed_up)values($user_id,'',50)";
           mysqli_query($dbc, $q2);
           $q="select user_id as u from users where email='$email'";
           $r=  mysqli_query($dbc, $q2);
           if($r)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $user_id=$row['u'];
           }
           
        header("location:superstep.php");
       echo 'successfully registered';
        $body="Welcome to SedFed , Thank you for your registration , Your login username is [ $email ]or [ $mob_no ] , Your optional password 1 is [ $p1 ] and your optional password 2 is"
                . "[ $p2 ].You can use any one of your passwords to login your account...Hope you will enjoy ,Thank you ,                 SedFed Team.";
        $to=$email;
        $headers="From:ceovj@sedfed.com";
        $subject="SedFed User Registration";
        mail($to, $subject, $body,$headers);
         $_SESSION['email'] = $email; 
      }
 else {
        echo mysqli_error($dbc);
        
        echo '<b>Error ...Please check your Email id or  Mobile no correctly typed or <br/><br/>May be you are already a registered member <br/>Sorry for the inconvenience<b>';
    }
}else{header("location:register.php");}
}  else {
header("location:register.php");       
}
}
    
    else{
        
         echo "enter your email";
    }
    }

    else {echo "enter your mobile number";
    
    }
    ?>
    </body></html>

