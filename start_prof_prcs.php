   <?php session_start();
     
      if(empty($_SESSION['user_id']) && empty($_SESSION['user_name']))
      {
          header("location:index.php");
      }
      else
      {
          
      
       require 'mysqli_connect.php';
    $yname=mysqli_real_escape_string($dbc,$_REQUEST['inp_Name']);
    $oname=mysqli_real_escape_string($dbc,$_REQUEST['inp_NickName']);
    $nativp=mysqli_real_escape_string($dbc,$_REQUEST['inp_Flocate']);
    $gendr=mysqli_real_escape_string($dbc,$_REQUEST['gendr']);
    
$day=$_REQUEST['d'];
$month=$_REQUEST['m'];
$year=$_REQUEST['y'];
$age=2015-$year;
   
    $rels_status= mysqli_real_escape_string($dbc,$_REQUEST['inp_relsts']);
    $user_id=$_SESSION['user_id'];
    $q12="SELECT username as un from users where user_id=$user_id";
              $r12=mysqli_query($dbc,$q12);
              if($r12)
              {
                $rt=mysqli_fetch_array($r12,MYSQLI_ASSOC);
                $myuser_name=$rt['un'];
                if(!is_dir('../'.$myuser_name.'') || !is_dir('../'.$user_id.''))
                {
	      header("location:superstep.php");
                }
              }
        $q13="select reginit_id as rid from basic where user_id=$user_id";
        $r13=mysqli_query($dbc,$q13);
        if($r13)
        {
        
        if(mysqli_num_rows($r13)>0)
        {
                   $q4="UPDATE `basic` SET first_name='$yname',nick_name='$oname',nativeplace='$nativp',sex='$gendr',year='$year',month='$month',day='$day',age='$age' WHERE user_id = $user_id";
            $r4=mysqli_query($dbc,$q4);
            if($r4)
            {

  
            }else
            {
              echo "not run";
                echo mysqli_error($dbc);
            }
        }
        else
        {
          
            $q="INSERT INTO `basic` (`reginit_id`, `user_id`, `first_name`, `nick_name`, `nativeplace` , `sex`,day,month,year,age) VALUES (NULL, '$user_id', '$yname', '$oname', '$nativp','$gendr','$day','$month','$year',$age)";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      
      echo 'inserted';
     }
 else {
  
        echo"err in usernm & its $user_id <br/>";
     
}

   }
  }else
  {
    echo "not run";
  }

  
  $q="select user_id as u from relation_stat where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update relation_stat set status='$rels_status' where user_id=$user_id";
		$r1=mysqli_query($dbc,$q1);
			if($r1)
			{

			}else
			{
				echo "not updaed";
			}
	
	}else
	{
		
		$q2="INSERT into relation_stat (user_id,status)values($user_id,'$rels_status')";
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
        
header("location:update_cnct_det.php");
      }
      ?>
      
