<?php


require 'mysqli_connect.php';
$rcv=$_REQUEST['q'];
$emok=mysqli_real_escape_string($dbc,$rcv);
$email=trim($emok);
$rand=  rand(1111111, 99999999);
if(!empty($email))
{
$q="select user_id as u from users where email=' $email'";
$r=mysqli_query($dbc,$q);
if($r)
{
    $ro=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $user_id=$ro['u'];
    if(!empty($user_id))
    {
        $sn="select first_name as fn from basic where user_id=$user_id";
        $rsn=mysqli_query($dbc,$sn);
        if(mysqli_num_rows($rsn)>0)
        {
            $row=mysqli_fetch_array($rsn,MYSQLI_ASSOC);
            $name=$row['fn'];
        }
        else{
            $name="SedFed user";
        }
        $cp="update users set pass1=SHA1('$rand'),pass2=SHA1('$rand') where user_id=$user_id";
        $rcp=mysqli_query($dbc,$cp);
        if($rcp)
        {
            $to=$email;
             $headers="From:www.sedfed.com";
                         $subject="SedFed Password Recovery";
                         $body="Dear $name , your password has been changed according to your request.Your both Passwords are $rand .Kindly login with this password,"
                                 . "and visit change password section in your profile to change to a new password.Thank you -SedFed Team";
                         mail($to, $subject, $body,$headers);
                    
            echo"Your Password is Reset & Sent to your Email...";
              
        }
        else{
            echo"password not changed";
        }
    }
    else{
        $q="select user_id as u,email as em from users where username='$email'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
    $ro=mysqli_fetch_array($r,MYSQLI_ASSOC);
    $user_id=$ro['u'];
    $trgtemail=$ro['em'];
    if(!empty($user_id))
    {
        $sn="select first_name as fn from basic where user_id=$user_id";
        $rsn=mysqli_query($dbc,$sn);
        if(mysqli_num_rows($rsn)>0)
        {
            $row=mysqli_fetch_array($rsn,MYSQLI_ASSOC);
            $name=$row['fn'];
        }
        else{
            $name="SedFed user";
        }
        $cp="update users set pass1=SHA1('$rand'),pass2=SHA1('$rand') where user_id=$user_id";
        $rcp=mysqli_query($dbc,$cp);
        if($rcp)
        {
            $to=$trgtemail;
             $headers="From:www.sedfed.com";
                         $subject="SedFed Password Recovery";
                         $body="Dear $name , your password has been changed according to your request.Your both Passwords are $rand .Kindly login with this password,"
                                 . "and visit change password section in your profile to change to a new password.Thank you -SedFed Team";
                         mail($to, $subject, $body,$headers);
                    
            echo"Your Password is Reset & Sent to your Email...";
              
        }
        else{
            echo"password not changed";
        }
    }
    else{
        echo"Please Check your Email / Username correctly typed.";
    }
}  
else 
    {
    echo"no run user";
}
    }
}  else {
    echo"no run user";
}
}
else{
    echo 'Please Enter Your Email...';
}
?>