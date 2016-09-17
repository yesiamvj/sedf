<?php
if(empty($_REQUEST['q']))
{
	header("location:strtfiles.php");
}else
{
	$user_id=$_REQUEST['q'];
	$page_id=$_REQUEST['page_id'];
	require 'mysqli_connect.php';
	$q1="select post_id as p from post_permision where page_id=$page_id";
	
	$r11=  mysqli_query($dbc, $q1);
	if($r11)
	{
	       if(mysqli_num_rows($r11)>0)
	       {
	              while($rowsx=  mysqli_fetch_array($r11,MYSQLI_ASSOC))
	              {
		    $post_id=$rowsx['p'];
		   $q="SELECT post_file as pimg,post_id as pid from post_files where post_id=$post_id order by post_id desc";
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
				$pdfs=$row['pimg'];
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
					
					$pdf_name=substr($pdfs,40,strlen($pdfs));
					if(strlen($pdf_name)>60)
					{
						$pdf_name=substr($pdf_name,0,50);
						$pdf_name="$pdf_name ...";
					}
					echo'
					<a href="'.$pdfs.'" download="SedFed/'.$pdf_name.'"><div id="pf_pdfs_show"><img src="../web/icons/ufile.png" width="25" height="25" style="position:absolute;">&nbsp;&nbsp;&nbsp;&nbsp;'.$pdf_name.'&nbsp;&nbsp;&nbsp;&nbsp;<span id="pf_pdf_time">'.$p_time.'</span></div>  </a>
					';
				}
			}
			if($n==0)
			{
				
			
			}
		}else
		{
			
		}
	}else
	{
		echo "not run";

	}
	              }
	       }else
	       {
	             echo'There is no posted Files';
	       }
	}
	
}
?>