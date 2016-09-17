<?php session_start();
if(empty($_SESSION['email']))
{
    header("location:register.html");
}
else
{
    $email=$_SESSION['email'];
    require 'mysqli_connect.php';
    $q1="select user_id as u from users where email=' $email '";
    $r1=mysqli_query($dbc,$q1);
    if($r1)
    {
        $row1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
        $user_id=$row1['u'];
        echo"$user_id";
    }
 else {
  echo"uid not selected";      
 }
    $pos=mysqli_real_escape_string($dbc,$_REQUEST['pos']);
    $curplc=mysqli_real_escape_string($dbc,$_REQUEST['a']);
    $scl=mysqli_real_escape_string($dbc,$_REQUEST['b']);
    $st=mysqli_real_escape_string($dbc,$_REQUEST['distlist']);
    $sdist=mysqli_real_escape_string($dbc,$_REQUEST['dist']);
    $sfy=mysqli_real_escape_string($dbc,$_REQUEST['from1yr']);
    $sfm=mysqli_real_escape_string($dbc,$_REQUEST['from1mnth']);
    $sty=mysqli_real_escape_string($dbc,$_REQUEST['to1yr']);
    $stm=mysqli_real_escape_string($dbc,$_REQUEST['to1mnth']);
    $hiscl=mysqli_real_escape_string($dbc,$_REQUEST['hiscl']);
    $hisclst=mysqli_real_escape_string($dbc,$_REQUEST['stathiscl']);
    $hdt=mysqli_real_escape_string($dbc,$_REQUEST['hiscldist']);
    $hfyr=mysqli_real_escape_string($dbc,$_REQUEST['hisclyr1']);
    $hfmnth=mysqli_real_escape_string($dbc,$_REQUEST['hisclmnth1']);
    $hitoyr=mysqli_real_escape_string($dbc,$_REQUEST['hisclyr2']);
    $histomn=mysqli_real_escape_string($dbc,$_REQUEST['hisclmnth2']);
    $clg=mysqli_real_escape_string($dbc,$_REQUEST['c1']);
    $dep=mysqli_real_escape_string($dbc,$_REQUEST['d1']);
    $stac=mysqli_real_escape_string($dbc,$_REQUEST['sc']);
    $cd=mysqli_real_escape_string($dbc,$_REQUEST['dc']);
    $y1=mysqli_real_escape_string($dbc,$_REQUEST['y1']);
    $m1=mysqli_real_escape_string($dbc,$_REQUEST['m1']);
    $y2=mysqli_real_escape_string($dbc,$_REQUEST['y2']);
    $m2=mysqli_real_escape_string($dbc,$_REQUEST['m2']);
    $status=mysqli_real_escape_string($dbc,$_REQUEST['fm']);

    
   
   
   $qj= "INSERT INTO `school` (`currentplc`, `schl_id`, `schl`, `schlstate`, `schldist`, `user_id`, `schlfromyr`, `schlfrommnth`, `schltoyr`, `schltomnth`, `hischl`, `hischl_state`, `hischl_dist`, `hischl_fromyr`, `hischl_toyr`, `hischl_frommnth`, `hischl_tonth`) VALUES ('$curplc', NULL, '$scl', '$st', '$sdist',$user_id, '$sfy', '$sfm', '$sty', '$stm', '$hiscl', '$hisclst', '$hdt', '$hfyr', '$hitoyr', '$hfmnth', '$histomn')";
   $rj=mysqli_query($dbc,$qj);
   if($rj)
   {
       header("location:reg3.php");
   }
   else{
   echo mysqli_error();
   echo"err in insert";
}
$schls[]=mysqli_real_escape_string($dbc,$_REQUEST['schl']);
foreach ($schls as $school ) {
    
    $qr="insert into school (`schl`,`user_id`) values('$school',$user_id)";
    $rr=mysqli_query($dbc,$qr);
    if($rr)
    {
        header("location:reg3.php");
    }
    else
    {
        echo"err in add schl";
    }
}
$schl_plc[]=mysqli_real_escape_string($dbc,$_REQUEST['schlplc']);
foreach ($schl_plc as $schoolplc ) {
    
    $qrq="insert into school (`schldist`,`user_id`) values('$schoolplc',$user_id)";
    $rrq=mysqli_query($dbc,$qrq);
    if($rrq)
    {
        echo'school is adddes<br/>';
    }
    else
    {
        echo"err in add schl<br/>";
    }
}
foreach ($_REQUEST['clg'] as $colege ) {
    $college=mysqli_real_escape_string($dbc,$colege);

    $qrqr="insert into college (`clg`,`user_id`) values('$college',$user_id)";
    $rrqr=mysqli_query($dbc,$qrqr);
    if($rrqr)
    {
        echo'clg is adddes<br/>';
    }
    else
    {
        echo"err in add clg<br/>";
    }
}
foreach ($_REQUEST['clgplc'] as $colegeplc ) {
    $colegeplace=mysqli_real_escape_string($dbc,$colegeplc);

    $qrqrp="insert into college (`clgdist`,`user_id`) values('$colegeplace',$user_id)";
    $rrqrp=mysqli_query($dbc,$qrqrp);
    if($rrqrp)
    {
        echo'clgplc is add<br/>';
    }
    else
    {
        echo"err in add clgplc<br/>";
    }
}
$adclg="INSERT INTO `college` (`clg`, `dept`, `clgstate`, `clgdist`, `clgfromyr`, `clgfrommnth`, `clgtoyr`, `clgtomnth`, `user_id`) VALUES ('$clg', '$dep', '$stac', '$cd', '$y1', '$m1', '$y2', '$m2', '$user_id')";
$rt=mysqli_query($dbc,$adclg);
if($rt)
{
    echo'clg dtls inserted';
}
else
{
    echo"clg dtls not nsee";
}

foreach ($_REQUEST['job'] as $job ) {
    $jobs=mysqli_real_escape_string($dbc,$job);

    $adjob="insert into jobs (`job`,`user_id`) values('$jobs',$user_id)";
    $runjob=mysqli_query($dbc,$adjob);
    if($runjob)
    {
        echo'job is added<br/>';
    }
    else
    {
        echo"err in add job<br/>";
    }
}
foreach ($_REQUEST['jobplc'] as $jobplc ) {
    $jobplace=mysqli_real_escape_string($dbc,$jobplc);

    $adjobplc="insert into jobs (`job_plc`,`user_id`) values('$jobplace',$user_id)";
    $runjobplc=mysqli_query($dbc,$adjobplc);
    if($runjobplc)
    {
        echo'jobplc is added<br/>';
    }
    else
    {
        echo"err in add jobplc<br/>";
    }
}
   }
   ?>
