<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    
}else
{
   $user_id=$_SESSION['user_id'];
   $not_id=$_REQUEST['q'];

   require 'mysqli_connect.php';
   $q="select cu_id as c from notification where my_notif_id=$not_id";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
       {
       if(!empty($row))
       {
           $p_id=$row['c'];
              $q1="select c_name as c from contacts where user_id=$user_id and cu_id=$p_id";
                $r1=mysqli_query($dbc,$q1);
                if($r1)
                {
                    $nc=0;
                    $rows=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                    if(!empty($rows))
                    {
                        $c_name=$rows['c'];
                    }else
                    {
                        $nc=1;
                        $q2="select first_name as f from basic where user_id=$p_id";
                        $r2=mysqli_query($dbc,$q2);
                        if($r2)
                        {
                            $rt=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                            $c_name=$rt['f'];
                        }
                    }
                }
                
                echo'<div ><div>'.$c_name.'</div></div>';
       }
       
   }
   }
   
}