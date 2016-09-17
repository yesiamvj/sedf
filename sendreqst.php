<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['uname']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $user_name=$_REQUEST['uname'];
    $my_name=$_REQUEST['myname'];
    $type=$_REQUEST['type'];
    require 'mysqli_connect.php';
    $q="select user_id as u from users where username='$user_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $cu_id=$row['u'];
            $q2w="select first_name as f_name from basic where user_id=$cu_id";
            $r2w=mysqli_query($dbc,$q2w);
            if($r2w)
            {
                if(mysqli_num_rows($r2w)>0)
                {
                    $nmrow=mysqli_fetch_array($r2w,MYSQLI_ASSOC);
                    $user_name=$nmrow['f_name'];
                }
            }
        }
        $time= date("g:i a ,F j, Y"); 
	           if(empty($my_name))
                        {
                            $my_name=$user_name;
                        }
            
                    $q3="select c_name as c from contacts where user_id=$user_id and cu_id=$cu_id";
                    $r3=mysqli_query($dbc,$q3);
                    if($r3)
                    {
                        $rowx=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                        $c_name=$rowx['c'];
                        if(!empty($c_name))
                        {
                            echo'You are already a contact to '.$c_name.'';
                        }else
                        {
	              
                             $q1="select req_id as rid from requests where user_id=$user_id and reqstd_userid=$cu_id";
             $r1=mysqli_query($dbc,$q1);
             if($r1)
             {
                 if(mysqli_num_rows($r1)>0)
                 {
                    $q3="update requests set type='$type',cancel=0,seen=0,reqstd_name='$my_name', accept='0',time='$time' where user_id=$user_id and reqstd_userid=$cu_id";
                    $r3=mysqli_query($dbc,$q3);
                    if($r3)
                    {
                        echo 'Request sent';
                    }
                     
                 }else
                 {
	       
                     $qe="INSERT into requests(user_id,reqstd_userid,reqstd_name,type,time,seen)values($user_id,$cu_id,'$my_name','$type','$time',0)";
                     $re=mysqli_query($dbc,$qe);
                     if($re)
                     {
                         echo'Request Sent';
                     }else
                     {
                         echo 'not run ins to req';
                     }
                     
                 }
             }  else 
                 
             {
                 echo'not runn req_';
             }
                        }
                    }
    
   
}
}
?>
