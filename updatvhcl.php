<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}
else
{
   $user_id=$_SESSION['user_id'];
   require 'mysqli_connect.php';
//mob_os,mob_no,mbrand,sim//los1,los2,lbrand,lcolor,lmodel_no//bikebrand,bikeno,bikecolor,carbrand,carno,carcolor

   $mob_os=mysqli_real_escape_string($dbc,$_REQUEST['mob_os']);
   $mob_no=mysqli_real_escape_string($dbc,$_REQUEST['mob_no']);
   $mbrand=mysqli_real_escape_string($dbc,$_REQUEST['mbrand']);
   $sim=mysqli_real_escape_string($dbc,$_REQUEST['sim']);
   $los1=mysqli_real_escape_string($dbc,$_REQUEST['los1']);
   $los2=mysqli_real_escape_string($dbc,$_REQUEST['los2']);
   $lbrand=mysqli_real_escape_string($dbc,$_REQUEST['lbrand']);
   $lcolor=mysqli_real_escape_string($dbc,$_REQUEST['lcolor']);
   $lmodel_no=mysqli_real_escape_string($dbc,$_REQUEST['lmodel_no']);
   $bikebrand=mysqli_real_escape_string($dbc,$_REQUEST['bikebrand']);
   $bikeno=mysqli_real_escape_string($dbc,$_REQUEST['bikeno']);
   $bikecolor=mysqli_real_escape_string($dbc,$_REQUEST['bikecolor']);
   $carbrand=mysqli_real_escape_string($dbc,$_REQUEST['carbrand']);
   $carno=mysqli_real_escape_string($dbc,$_REQUEST['carno']);
   $carcolor=mysqli_real_escape_string($dbc,$_REQUEST['carcolor']);

   $q3="select vcl_id as v from vehicles where user_id=$user_id";
   $r3=mysqli_query($dbc,$q3);
   if($r3)
   {
      if(!empty($row1=mysqli_fetch_array($r3,MYSQLI_ASSOC)))
      {
         $vc_id=$row1['v'];
          $q="INSERT INTO `vehicles` (`vcl_id`, `user_id`, `bike_model`, `bike_no`, `bike_color`, `car_model`, `car_no`, `car_color`) VALUES (NULL, $user_id, '$bikebrand', '$bikeno', '$bikecolor', '$carbrand', '$carno', '$carcolor')";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
      echo "ins ";
       $q4="DELETE FROM `vehicles` WHERE  vcl_id=$vc_id";
                  $r4=mysqli_query($dbc,$q4);
                  if($r4)
                  {
                     echo "dlt";
                  }else
                  {
                     echo "no dlt";
                  }
   }else
   {
      echo "not ins";
   }
      }else
      {
             $q="INSERT INTO `vehicles` (`vcl_id`, `user_id`, `bike_model`, `bike_no`, `bike_color`, `car_model`, `car_no`, `car_color`) VALUES (NULL, $user_id, '$bikebrand', '$bikeno', '$bikecolor', '$carbrand', '$carno', '$carcolor')";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
      echo "ins ";
   }else
   {
     echo mysqli_error($dbc);
   }       
      }
   }
  

#for mobile
   $q5="select mob_id as m from mobile where user_id=$user_id";
   $r5=mysqli_query($dbc,$q5);
   if($r5)
   {
      if(!empty($row2=mysqli_fetch_array($r5,MYSQLI_ASSOC)))
      {
         $mob_id=$row2['m'];

   $q1="INSERT INTO `mobile` (`mob_id`, `user_id`, `mob_brand`, `mob_network1`, `mob_no`, `mob_os`) VALUES (NULL,$user_id , '$mbrand', '$sim', '$mob_no', '$mob_os')";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
      echo "ins";
         $q6="DELETE FROM `mobile` WHERE  mob_id=$mob_id";
                  $r6=mysqli_query($dbc,$q6);
                  if($r6)
                  {
                     echo "dlt";
                  }else
                  {
                     echo "no dlt";
                  }

   }else
   {
      echo "not ins";
   }
      }else
      {

   $q1="INSERT INTO `mobile` (`mob_id`, `user_id`, `mob_brand`, `mob_network1`, `mob_no`, `mob_os`) VALUES (NULL,$user_id , '$mbrand', '$sim', '$mob_no', '$mob_os')";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
      echo "ins";
   }else
   {
      echo "not ins";
   }
      }
        
   }
   #for laptop
   $q7="select lap_id as l from laptop where user_id=$user_id";
   $r7=mysqli_query($dbc,$q7);
   if($r7)
   {
      if(!empty($row3=mysqli_fetch_array($r7,MYSQLI_ASSOC)))
      {
         $lap_id=$row3['l'];

$q2="INSERT INTO `laptop` (`lap_barnd`, `lap_model`, `lap_os1`, `lap_os2`, `lap_color`, `lap_id`, `user_id`) VALUES ('$lbrand', '$lmodel_no', '$los1', '$los2', '$lcolor', '', $user_id)";
$r2=mysqli_query($dbc,$q2);
if($r2)
{
   echo "ins";
   $q8="DELETE FROM `laptop` WHERE  lap_id=$lap_id";
                  $r8=mysqli_query($dbc,$q8);
                  if($r8)
                  {
                     echo "dlt";
                  }else
                  {
                     echo "no dlt";
                  }
}else
{
   echo "not ins";
}
      }
      else
      {
         
$q2="INSERT INTO `laptop` (`lap_barnd`, `lap_model`, `lap_os1`, `lap_os2`, `lap_color`, `lap_id`, `user_id`) VALUES ('$lbrand', '$lmodel_no', '$los1', '$los2', '$lcolor', '', $user_id)";
$r2=mysqli_query($dbc,$q2);
if($r2)
{
   echo "ins";
}else
{
   echo "not ins";
}         
      }

   }
}
?>

