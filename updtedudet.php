<?php session_start();

if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$clgfrmyr=mysqli_real_escape_string($dbc,$_REQUEST['clgfrmyr']);
$hscfrmyr=mysqli_real_escape_string($dbc,$_REQUEST['hscfrmyr']);
$scfrmyr=mysqli_real_escape_string($dbc,$_REQUEST['scfrmyr']);
$clgtoyr=mysqli_real_escape_string($dbc,$_REQUEST['clgtoyr']);
$hsctoyr=mysqli_real_escape_string($dbc,$_REQUEST['hsctoyr']);
$sctoyr=mysqli_real_escape_string($dbc,$_REQUEST['sctoyr']);
$clgccrs=mysqli_real_escape_string($dbc,$_REQUEST['clgccrs']);
$hsccrs=mysqli_real_escape_string($dbc,$_REQUEST['hsccrs']);
$sccrs=mysqli_real_escape_string($dbc,$_REQUEST['sccrs']);
$clgdiscr=mysqli_real_escape_string($dbc,$_REQUEST['clgdiscr']);
$hscdiscr=mysqli_real_escape_string($dbc,$_REQUEST['hscdiscr']);
$scdiscr=mysqli_real_escape_string($dbc,$_REQUEST['scdiscr']);
$clgname=mysqli_real_escape_string($dbc,$_REQUEST['clgname']);
$hscname=mysqli_real_escape_string($dbc,$_REQUEST['hscname']);
$scname=mysqli_real_escape_string($dbc,$_REQUEST['scname']);
$clgplc=mysqli_real_escape_string($dbc,$_REQUEST['clgplc']);
$hscplc=mysqli_real_escape_string($dbc,$_REQUEST['hscplc']);
$sclplc=mysqli_real_escape_string($dbc,$_REQUEST['sclplc']);

echo "$clgplc";
$clgcnt=$_REQUEST['clgct'];
$hsccnt=$_REQUEST['hscct'];
$sclcnt=$_REQUEST['sclct'];

$cempty=$_REQUEST['cempty'];
$hempty=$_REQUEST['hempty'];
$sempty=$_REQUEST['sempty'];
echo "$clgcnt $hsccnt $sclcnt";
$cnt=$_REQUEST['cnt'];
echo "<br/> but  cnt is $cnt";
if($cempty=="0" || $cnt=="1")
{
	if($cnt<$clgcnt || $cnt==$clgcnt)
{
if($cnt=="1")
{
$q="select clg_id as cid from college where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
if(mysqli_num_rows($r)>0)
{
	$n=0;
		while($row11=mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
			$n=$n+1;
			$clgid=$row11['cid'];

			if($n==1)
			{
				$q11="insert into college(user_id,clg,clgdist,clgfromyr,clgtoyr,dept,clg_discr)values($user_id,'$clgname','$clgplc','$clgfrmyr','$clgtoyr','$clgccrs','$clgdiscr')";
				$r11=mysqli_query($dbc,$q11);
				if($r11)
				{
							echo "ins clg<br/>";

				}else
				{
					echo "not ins";
				}
			}
			
			$q12="DELETE from college where clg_id=$clgid";
			$r12=mysqli_query($dbc,$q12);
			if($r12)
			{
				echo "dlt";
			}else
			{
				echo "no dlt";
			}
				
		}
		echo "$n is tot<br/>";
			}else
			{

				$q="insert into college (user_id,clg,clgdist,clgfromyr,clgtoyr,dept,clg_discr)values($user_id,'$clgname','$clgplc','$clgfrmyr','$clgtoyr','$clgccrs','$clgdiscr')";
				$r=mysqli_query($dbc,$q);
				if($r)
				{
					echo "ins clg";
				}else
				{
					echo "not ins";
				}
			}
			}
				
	}else
	{
				
				$q="insert into college (user_id,clg,clgdist,clgfromyr,clgtoyr,dept,clg_discr)values($user_id,'$clgname','$clgplc','$clgfrmyr','$clgtoyr','$clgccrs','$clgdiscr')";
				$r=mysqli_query($dbc,$q);
				if($r)
				{
					echo "ins clg";
				}else
				{
					echo "not ins";
				}		
	}


}

}

if($hempty=="0" || $cnt=="1")
{
	if($cnt<$hsccnt || $cnt==$hsccnt)
{
		
if($cnt=="1")
{
		$qe21="select hsc_id as hid from hsc_detail where user_id=$user_id";
$re21=mysqli_query($dbc,$qe21);
if($re21)
{
	if(mysqli_num_rows($re21)>0)
	{
$n=0;

		while($row27=mysqli_fetch_array($re21,MYSQLI_ASSOC))
		{
			
			$hsc_id=$row27['hid'];

			$n=$n+1;
			if($n==1)
			{
						$q21="insert into hsc_detail (user_id,hsc_name,hsc_fromyr,hsctoyr,hsc_plc,hsc_crs,hsc_discr)values($user_id,'$hscname','$hscfrmyr','$hsctoyr','$hscplc','$hsccrs','$hscdiscr')";
						$r21=mysqli_query($dbc,$q21);
						if($r21)
						{
							echo "ins hsc";
							
						}else
						{
							echo "not ins hsc";
						}
			}
				$q31="DELETE from hsc_detail where hsc_id=$hsc_id";
									$r31=mysqli_query($dbc,$q31);
									if($r31)
									{
										echo "dlt";
									}else
									{
										echo "no dlt";
									}
				

		}
		echo "$n is tot";
	}else
	{

$q1="insert into hsc_detail (user_id,hsc_name,hsc_fromyr,hsctoyr,hsc_plc,hsc_crs,hsc_discr)values($user_id,'$hscname','$hscfrmyr','$hsctoyr','$hscplc','$hsccrs','$hscdiscr')";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
	echo "ins hsc";
}else
{
	echo "not ins hsc";
}
	}
}


}else
{
	
$q1="insert into hsc_detail (user_id,hsc_name,hsc_fromyr,hsctoyr,hsc_plc,hsc_crs,hsc_discr)values($user_id,'$hscname','$hscfrmyr','$hsctoyr','$hscplc','$hsccrs','$hscdiscr')";
$r1=mysqli_query($dbc,$q1);
if($r1)
{
	echo "ins hsc";
}else
{
	echo "not ins hsc";
}		
}



}

}


if($sempty=="0" || $cnt=="1")
{
	if($cnt<$sclcnt|| $cnt==$sclcnt)
{
		if($cnt=="1")
{
		$q13="select scl_id as sid from scl_detail where user_id=$user_id";
		$r13=mysqli_query($dbc,$q13);
		if($r13)
		{
			if(mysqli_num_rows($r13)>0)
			{
				$n=0;

				while($row13=mysqli_fetch_array($r13,MYSQLI_ASSOC))
				{
						$n=$n+1;

						$scl_id=$row13['sid'];
							echo "<br/>$scl_id IS SID $n is tot cnt";
						if($n==1)
						{
											$q22="insert into scl_detail (user_id,scl,scl_fromyr,scl_toyr,scl_plc,scl_crs,scl_discr)values($user_id,'$scname','$scfrmyr','$sctoyr','$sclplc','$sccrs','$scdiscr')";
											$r22=mysqli_query($dbc,$q22);
											if($r22)
											{
												echo "ins scl";
											}else
											{
												echo "not ins scl";
											}
						}
			$q23="DELETE from scl_detail where scl_id=$scl_id";
			$r23=mysqli_query($dbc,$q23);
			if($r23)
			{
				echo "dlt";
			}else
			{
				echo "no dlt";
			}

				}
			}else
			{
				$q2="insert into scl_detail (user_id,scl,scl_fromyr,scl_toyr,scl_plc,scl_crs,scl_discr)values($user_id,'$scname','$scfrmyr','$sctoyr','$sclplc','$sccrs','$scdiscr')";
$r2=mysqli_query($dbc,$q2);
if($r2)
{
	echo "ins scl";
}else
{
	echo "not ins scl";
}	
			}
		}
}else
{
				$q2="insert into scl_detail (user_id,scl,scl_fromyr,scl_toyr,scl_plc,scl_crs,scl_discr)values($user_id,'$scname','$scfrmyr','$sctoyr','$sclplc','$sccrs','$scdiscr')";
$r2=mysqli_query($dbc,$q2);
if($r2)
{
	echo "ins scl";
}else
{
	echo "not ins scl";
}	
}

}

}

}
?>