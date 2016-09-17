<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['usrnm']))
{
    header("location:index.php");
}else
{
  $user_id=$_SESSION['user_id'];
  require 'mysqli_connect.php';
  $hisname=mysqli_real_escape_string($dbc,trim($_REQUEST['usrnm']));
  $mytype=mysqli_real_escape_string($dbc,trim($_REQUEST['type']));
  $myname=mysqli_real_escape_string($dbc,trim($_REQUEST['myname']));
  
  
  $q="select user_id as u from users where username='$hisname'";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $cu_id=$row['u'];
  if(empty($myname) && !empty($cu_id))
  {

      $q="select first_name as f_name from basic where user_id=$cu_id";
      $r=mysqli_query($dbc,$q);
      if($r)
      {
          if(mysqli_num_rows($r)>0)
          {
              $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
              $myname=$row['f_name'];
          }else
          {
              $myname=$hisname;
          }
      }
  }
  }
  $q="select reqstd_name as nm,type as tp from requests where user_id=$cu_id and reqstd_userid=$user_id";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
      if(mysqli_num_rows($r)>0)
      {
          $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
          $hename=$rpw['nm'];
          $hetype=$rpw['tp'];
      }
  }
  $qf="select first_name as f from basic where user_id=$user_id";
  $rf=  mysqli_query($dbc, $qf);
  if($rf)
  {
         if(mysqli_num_rows($rf)>0)
         {
                $admin_row= mysqli_fetch_array($rf,MYSQLI_ASSOC);
                
                $first_name=$admin_row['f'];
                
         }
  }
   
  $qf="select first_name as f from basic where user_id=$cu_id";
  $rf=  mysqli_query($dbc, $qf);
  if($rf)
  {
         if(mysqli_num_rows($rf)>0)
         {
                $f_row= mysqli_fetch_array($rf,MYSQLI_ASSOC);
                
                $friend_name=$f_row['f'];
                
         }
  }
   $qf="select username as f from users where user_id=$cu_id";
  $rf=  mysqli_query($dbc, $qf);
  if($rf)
  {
         if(mysqli_num_rows($rf)>0)
         {
                $f_row= mysqli_fetch_array($rf,MYSQLI_ASSOC);
                
                $friend_user_name=$f_row['f'];
                
         }
  }
    $qf="select username as f from users where user_id=$user_id";
  $rf=  mysqli_query($dbc, $qf);
  if($rf)
  {
         if(mysqli_num_rows($rf)>0)
         {
                $f_row= mysqli_fetch_array($rf,MYSQLI_ASSOC);
                
                $my_user_name=$f_row['f'];
                
         }
  }
  
  $q="select c_id as cid from contacts where user_id=$user_id and cu_id=$cu_id";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
         
  if(mysqli_num_rows($r)>0)
  {
      $qe="update contacts set type='$mytype',c_name='$myname' where user_id=$user_id and cu_id=$cu_id";
      $re=mysqli_query($dbc,$qe);
      if($re)
      {
          echo'Updated your details ';
      }
  }else
  {
         
         
         
      $q1="insert into contacts (user_id,cu_id,c_name,type)values($user_id,$cu_id,'$myname','$mytype')";
      $r1=mysqli_query($dbc,$q1);
      $q3="insert into contacts (user_id,cu_id,c_name,type)values($cu_id,$user_id,'$hename','$hetype')";
      $r3=mysqli_query($dbc,$q3);
      if($r3 && $r1)
      {
          echo'Now you\'re a contact to '.$myname.' ' ;
          $today = date("g:i a ,F j, Y"); 
           $qs="insert into notification (user_id,cu_id,seen,time,notice,discription)values($user_id,$cu_id,0,'$today','Accepted your request',5)";
                 $rs=mysqli_query($dbc,$qs);
          $q2="update requests set accept=1 where user_id=$cu_id and reqstd_userid=$user_id";
          $r2=mysqli_query($dbc,$q2);
          if($r2)
          {
           }else
          {
              echo'not updated reqst';
          }
      }
     else
      {
          echo'not ins';
      }
  }
  
  
  }else
  {
      echo'not run cnct';
  }
  
}
?>