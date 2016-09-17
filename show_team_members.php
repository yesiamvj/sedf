<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $team_id=$_REQUEST['q'];
    require 'mysqli_connect.php';
   $q="select members_id as m from group_members where group_id=$team_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       if(mysqli_num_rows($r)>0)
       {
           while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
           {
               $mem_id=$row['m'];
               $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$mem_id";
           $r3=mysqli_query($dbc,$q3);
           if($r3)
           {
               $roi=mysqli_fetch_array($r3,MYSQLI_ASSOC);
               if(!empty($roi))
               {
                   
               $c_nm=$roi['c'];
               }else
               {
                   $q5="select first_name as f from basic where user_id=$mem_id";
                   $r5=mysqli_query($dbc,$q5);
                   if($r5)
                   {
                       $ry=mysqli_fetch_array($r5,MYSQLI_ASSOC);
                       $c_nm=$ry['f'];
                       
                   }
               }
               echo'<div>'.$c_nm.'</div>';
            }
            
           }
       }
   }
}