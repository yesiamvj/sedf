
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$fthernm=mysqli_real_escape_string($dbc,$_REQUEST['fathernm']);
$ftherage=mysqli_real_escape_string($dbc,$_REQUEST['ftherage']);
$ftheredu=mysqli_real_escape_string($dbc,$_REQUEST['ftheredu']);
$ftherocupt=mysqli_real_escape_string($dbc,$_REQUEST['ftherocupt']);

$mthernm=mysqli_real_escape_string($dbc,$_REQUEST['mthernm']);
$mtherage=mysqli_real_escape_string($dbc,$_REQUEST['mtherage']);
$mtheredu=mysqli_real_escape_string($dbc,$_REQUEST['mtheredu']);
$mtherocupt=mysqli_real_escape_string($dbc,$_REQUEST['mtherocup']);

$brthernm=mysqli_real_escape_string($dbc,$_REQUEST['brthrnm']);
$brtherage=mysqli_real_escape_string($dbc,$_REQUEST['brthrage']);
$brtheredu=mysqli_real_escape_string($dbc,$_REQUEST['brthredu']);
$brtherocupt=mysqli_real_escape_string($dbc,$_REQUEST['brthrocupt']);

$sisternm=mysqli_real_escape_string($dbc,$_REQUEST['sisnm']);
$sisterage=mysqli_real_escape_string($dbc,$_REQUEST['sisage']);
$sisteredu=mysqli_real_escape_string($dbc,$_REQUEST['sisedu']);
$sisterocupt=mysqli_real_escape_string($dbc,$_REQUEST['sisocupt']);

$bempty=$_REQUEST['bempty'];
$sempty=$_REQUEST['sempty'];

$cnt=$_REQUEST['cnts'];
$brcnt=$_REQUEST['brcnt'];
$siscnt=$_REQUEST['siscnt'];
$q3="select parent_id as p from parent_details where user_id=$user_id";
$r3=mysqli_query($dbc,$q3);
if($r3)
{
	if(mysqli_num_rows($r3)>0)
	{
		$row1=mysqli_fetch_array($r3,MYSQLI_ASSOC);
		$par_id=$row1['p'];

$q="INSERT INTO `parent_details` (`parent_id`, `user_id`, `f_name`, `f_age`, `f_edu`, `f_ocup`, `m_name`, `m_age`, `m_edu`, `m_ocup`) VALUES (NULL, $user_id, '$fthernm', '$ftherage', '$ftheredu', '$ftherocupt', '$mthernm', '$mtherage', '$mtheredu', '$mtherocupt')";
$r=mysqli_query($dbc,$q);
if($r)
{
	echo "ins par";
					$q4="DELETE FROM `parent_details` WHERE  parent_id=$par_id";
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
	echo "not ins par";
}
	}else
	{

$q="INSERT INTO `parent_details` (`parent_id`, `user_id`, `f_name`, `f_age`, `f_edu`, `f_ocup`, `m_name`, `m_age`, `m_edu`, `m_ocup`) VALUES (NULL, $user_id, '$fthernm', '$ftherage', '$ftheredu', '$ftherocupt', '$mthernm', '$mtherage', '$mtheredu', '$mtherocupt')";
$r=mysqli_query($dbc,$q);
if($r)
{
	echo "ins par";
}else
{
	echo "not ins par with 0";
}
	}
}


if($sempty=="0" || $cnt=="1")
{
	if($cnt<$siscnt || $siscnt==$cnt)
	{
		if($cnt=="1")
		{
			$q2b1="SELECT bs_id as sid from sister where user_id=$user_id";
		$r2b1=mysqli_query($dbc,$q2b1);
		if($r2b1)
		{
			if(mysqli_num_rows($r2b1)>0)
			{
				$n=0;
				while($row3b2=mysqli_fetch_array($r2b1,MYSQLI_ASSOC))
				{
					$n=$n+1;
					$sis_id=$row3b2['sid'];
					if($n==1)
					{

					
					$q12="INSERT into sister (user_id,sis_nm,sis_age,sis_edu,sis_ocup)values($user_id,'$sisternm','$sisterage','$sisteredu','$sisterocupt')";
					$r12=mysqli_query($dbc,$q12);
					if($r12)
					{
						echo "inserted";
					}else
					{
						echo "not ins";
					}	
					}
					$q11="DELETE from sister where bs_id=$sis_id";
					$r11=mysqli_query($dbc,$q11);
					if($r11)
					{
						echo "dlt";
					}else
					{
						echo "no dlt";
					}
				}
			}else
				{
					$q12="INSERT into sister (user_id,sis_nm,sis_age,sis_edu,sis_ocup)values($user_id,'$sisternm','$sisterage','$sisteredu','$sisterocupt')";
					$r12=mysqli_query($dbc,$q12);
					if($r12)
					{
						echo "inserted";
					}else
					{
						echo "not ins";
					}
				}
			}else
			{
				echo "not run sis";
			}
		}else
		{
			$q12="insert into sister (user_id,sis_nm,sis_age,sis_edu,sis_ocup)values($user_id,'$sisternm','$sisterage','$sisteredu','$sisterocupt')";
					$r12=mysqli_query($dbc,$q12);
					if($r12)
					{
						echo "inserted";
					}else
					{
						echo "not ins";
					}
		}
		
		}else
		{
			echo "its not sis<cnt";
		}
	
}else
{
echo "its empty";
}

echo "bemptyin $bempty<br/> ";
echo'<script type="text/javascript">
					$(document).ready(function()
						{
							alert("hai");
							
						});
					</script>';
if($bempty=="0" || $cnt=="1")
{
	echo " cnt is $cnt but brcnt is $brcnt";
	if($cnt<$brcnt || $brcnt==$cnt)
	{
		echo "<br/><cnt";
		if($cnt=="1")
		{
			
			$q2n1="SELECT brthr_id as sid from brother where user_id=$user_id";
		$r2n1=mysqli_query($dbc,$q2n1);
		if($r2n1)
		{

				$n=0;
			if(mysqli_num_rows($r2n1)>0)
			{
				while($row3b2=mysqli_fetch_array($r2n1,MYSQLI_ASSOC))
				{
					$n=$n+1;
						$br_id=$row3b2['sid'];

					
					$q11="DELETE from brother where brthr_id=$br_id";
					$r11=mysqli_query($dbc,$q11);
					if($r11)
					{
						echo "dlt brthr with no 0";
					}else
					{
						echo "no dlt brthr with no 0";
					}
					if($n==1)
					{
					$q12="insert into brother (user_id,brthr_nm,brthr_age,brthr_edu,brthr_ocup)values($user_id,'$brthernm','$brtherage','$brtheredu','$brtherocupt')";
					$r12=mysqli_query($dbc,$q12);
					if($r12)
					{
						echo "inserted";
					}else
					{
						echo "not ins";
					}
					}
				}
			}else
				{
					$q12="insert into brother (user_id,brthr_nm,brthr_age,brthr_edu,brthr_ocup)values($user_id,'$brthernm','$brtherage','$brtheredu','$brtherocupt')";
					$r12=mysqli_query($dbc,$q12);
					if($r12)
					{
						echo "inserted";
					}else
					{
						echo "not ins";
					}
				}
			}
		}else
		{
			echo "inserting";
			$q12="insert into brother (user_id,brthr_nm,brthr_age,brthr_edu,brthr_ocup)values($user_id,'$brthernm','$brtherage','$brtheredu','$brtherocupt')";
					$r12=mysqli_query($dbc,$q12);
					if($r12)
					{
						echo "inserted";
					}else
					{
						echo "not ins";
					}
		}
		
		}
	
}else
{

}



}
?>





