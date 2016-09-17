<?php
if(empty($_REQUEST['q']))
{
	header("location:strtfiles.php");
}else
{
	$user_id=$_REQUEST['q'];
	require 'mysqli_connect.php';
	$q="SELECT post_pdf as pimg ,post_id as pid from post_files where user_id=$user_id order by post_id desc";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		$n=0;
		$m=0;
		if(mysqli_num_rows($r)>0)
		{
			while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
				$m=$m+1;

				$imgs=$row['pimg'];
				$my_pdfs=$row['pimg'];
			$pid=$row['pid'];
				if(!empty($imgs))
				{
					$n=$n+1;

							$q1="SELECT post_time as p from postforall where post_id=$pid";
							$r1=mysqli_query($dbc,$q1);
							if($r1)
							{
								$rows=mysqli_fetch_array($r1);
								$p_time=$rows['p'];
							}else{
								$p_time="NOT RUN";
							}
					$audname=substr($imgs,45,strlen($imgs));
					$mylen=strpos($imgs, "publicfolder");
					$pdfs=substr($imgs,$mylen,strlen($imgs));
					$pdf_name=substr($pdfs,40,strlen($pdfs));
					if(strlen($pdf_name)>60)
					{
						$pdf_name=substr($pdf_name,0,50);
						$pdf_name="$pdf_name ...";
					}
					echo'
					<a href="'.$my_pdfs.'" download="SedFed/'.$pdf_name.'"><div id="pf_pdfs_show"><img src="../web/icons/pdf.png" width="25" height="25" style="position:absolute;">&nbsp;&nbsp;&nbsp;&nbsp;'.$pdf_name.'&nbsp;&nbsp;&nbsp;&nbsp;<span id="pf_pdf_time">'.$p_time.'</span></div>  </a>
					';
				}
			}
		}else
		{
			echo'There is no pdf';
		}
	}else
	{
		echo "not run";

	}
}
?>