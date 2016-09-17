<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['lover']))
{
	header("location:profile.php");
}else
{
	$proposer_id=$_SESSION['user_id'];
	$l_id=$_REQUEST['lover'];
        
			$time= date("g:i a ,F j, Y"); 
	$propose_type=$_REQUEST['type'];
	require 'mysqli_connect.php';
	 $uname="select c_name as fname from contacts where user_id=$l_id";
             $runnm=mysqli_query($dbc,$uname);
             if($runnm)
             {
                 if(mysqli_num_rows($runnm)>0)
                 {
                     $rownm=mysqli_fetch_array($runnm);
                     $lover_name=$rownm['fname'];
                 }else{
                     $selemail="select first_name as em from basic where user_id=$l_id";
                     $rinemail=mysqli_query($dbc,$selemail);
                     if($rinemail)
                     {
                         $rowemail=mysqli_fetch_array($rinemail);
                         $lover_name=$rowemail['em'];
                     }
                 }
             }
             
	$q="SELECT user_id ,time as t from propose where proposer_id=$l_id and user_id=$proposer_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{
                    $roe=mysqli_fetch_array($r,MYSQLI_ASSOC);
                    $prtime=$roe['t'];
			 
                                $q3="update propose set accept=1,accpt_time='$time' where proposer_id=$l_id and user_id=$proposer_id";
                                $r3=mysqli_query($dbc,$q3);
                                if($r3)
                                {
                                    echo''.$lover_name.' Also Proposed You @ '.$prtime.'<br/>'
                                            . 'Have a nice life with '.$lover_name.'...';
                       
                                }
		}else
		{
			$q2="select accept as ac from propose where proposer_id=$proposer_id and user_id=$l_id";
                        $r2=mysqli_query($dbc,$q2);
                        if($r2)
                        {
                            if(mysqli_num_rows($r2)>0)
                            {
                                $rt=mysqli_fetch_array($r2,MYSQLI_ASSOC);
                                $accpt=$rt['ac'];
                                if($accpt=="1")
                                {
                                     echo''.$lover_name.' Also Proposed <br/>'
                                            . 'Have a nice life with '.$lover_name.'...';
                                }  else {
                                    echo'You already Proposed '.$lover_name.' ';
                                }
                            }else
                            {
                                $q="INSERT INTO propose (user_id,proposer_id,propose_type,time)values($l_id,$proposer_id,'$propose_type','$time')";
			$r=mysqli_query($dbc,$q);
			if($r)
			{
				if($propose_type==0)
				{
					echo "You Proposed $lover_name Bravely <br/>Best Of Luck";
				}else
				{
								echo "You Proposed $lover_name smartly<br/>Best Of Luck";
					
				}
			}else
			{
				echo "not ins ";
			}
                            }
                        }
			
		}
	}
}
?>