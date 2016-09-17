<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:profile.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $user_name=$_REQUEST['fn'];
    $my_name=$_REQUEST['myname'];
    $type=$_REQUEST['type'];
    require 'mysqli_connect.php';
    $cu_id=$_REQUEST['uid'];
        $time= date("g:i a ,F j, Y"); 
			if(empty($my_name))
                        {
                            $my_name=$user_name;
                        }
            $q="select c_id as c from contacts where user_id=$user_id and cu_id=$cu_id";
            $r=mysqli_query($dbc,$q);
            if($r)
            {
                if(mysqli_num_rows($r)>0)
                {
                    $q4="update contacts set c_name='$my_name',type='$type' where user_id=$user_id and cu_id=$cu_id";
                    $r4=mysqli_query($dbc,$q4);
                    if($r4)
                    {
                        echo'Updated your contact Details to '.$my_name.'';
	           echo '<script> $("#img-makeRelation").html(\''.$type.'\');</script>';
                    }else
                    {
                        echo 'Not run cnct';
                    }
                }else
                {
                    
             $q1="select req_id as rid from requests where user_id=$user_id and reqstd_userid=$cu_id";
             $r1=mysqli_query($dbc,$q1);
             if($r1)
             {
                 if(mysqli_num_rows($r1)>0)
                 {
                    $q3="update requests set type='$type',cancel=0,accept=0,seen=0,reqstd_name='$my_name', time='$time' where user_id=$user_id and reqstd_userid=$cu_id";
                    $r3=mysqli_query($dbc,$q3);
                    if($r3)
                    {
                        echo 'Updated Your requested Details to '.$my_name.'... '; echo '<script> $("#img-makeRelation").html(\'Request Sent\');</script>';
                    }else
                    {
                        echo 'Not updated';
                    }
                     
                 }else
                 {
	       $q="select req_id as r,type as tp,reqstd_name as nm from requests where user_id=$cu_id and reqstd_userid=$user_id";
	       $r=  mysqli_query($dbc, $q);
	       if($r)
	       {
	              if(mysqli_num_rows($r)>0)
	              {
		    $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		    $he_type=$row['tp'];
		    $he_name=$row['nm'];
		 $q1="insert into contacts (user_id,cu_id,c_name,type)values($user_id,$cu_id,'$my_name','$type')";
	      $r1=mysqli_query($dbc,$q1);
	      $q3="insert into contacts (user_id,cu_id,c_name,type)values($cu_id,$user_id,'$he_name','$he_type')";
	      $r3=mysqli_query($dbc,$q3);
	      if($r1 && $r3)
	      {
	             echo '<script> $("#img-makeRelation").html(\''.$type.'\');</script>';
	             echo 'Now you are a contact to '.$he_name.'';
	      }
	              }  else {
		     $qe="INSERT into requests(user_id,reqstd_userid,reqstd_name,type,time,seen,accept)values($user_id,$cu_id,'$my_name','$type','$time',0,0)";
                     $re=mysqli_query($dbc,$qe);
                     if($re)
                     {
                         echo'Your Request Sent to '.$my_name.' '; echo '<script> $("#img-makeRelation").html(\'Request Sent\');</script>';
                     }else
                     {
                         echo 'not run ins to req';
                     }
	              }
	       }
                    
                     
                 }
             }  else 
                 
             {
                 echo'not runn req_';
             }
        
                }
            }
    
   
}
?>
