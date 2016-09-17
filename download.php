<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$post_id=$_REQUEST['postid'];

	$cnt=$_REQUEST['cont'];
	$filecnt=0;
	$vidcnt=0;
	$audcnt=0;
	$imgcnt=0;
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$q1="select user_id  from post_download where post_id=$post_id and user_id=$user_id";
	$r1=mysqli_query($dbc,$q1);
	if($r1)
	{
		if(mysqli_num_rows($r1)>0)
		{

		}else
		{
			$qe="INSERT INTO post_download(post_id,user_id)values('$post_id','$user_id')";
                        $re=mysqli_query($dbc,$qe);
		}
	}
	

	$ct=0;
	
	$q="select post_image as image from post_images where post_id=$post_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
	
		if(mysqli_num_rows($r)>0)
		{
			$imgcnt=0;
			while($imgr=mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
				$ct=$ct+1;
				$img=$imgr['image'];
				
					if(empty($img))
					{
					}else{    
					    $filecnt=$filecnt+1;
					
								$image=$imgr['image'];
								$imgcnt=$imgcnt+1;
								$image_name=substr($image,25,strlen($image));
                   
								echo "file1$cnt";
								echo '<a href="'.$image.'" id="file'.$filecnt.'" download="sedfed_postId_'.$post_id.'/'.$image_name.'"></a>';
				
						
					}

				
			}
		}
	}
	$q7="select user_id as u from post_files where post_id=$post_id";
	$r7=mysqli_query($dbc,$q7);
	{
		
		while (mysqli_fetch_array($r7,MYSQLI_ASSOC)) 
		{
			$ct=$ct+1;
		}
	}
	
	echo'
	<input type="hidden" id="totlcnt'.$cnt.'" value="'.$ct.'">';
        
							$q1="select post_video as video from  post_files where post_id=$post_id ";
							$r1=mysqli_query($dbc,$q1);
							if($r1)
							{
								
								if(mysqli_num_rows($r1)>0)
								{

									while($vidr=mysqli_fetch_array($r1,MYSQLI_ASSOC))
									{
											$vid=$vidr['video'];
											if(empty($vid))
											{

											}else{
												$filecnt=$filecnt+1;
										$video=$vidr['video'];
									$video_name=substr($video,20,strlen($video));
                   
													echo'<a href="'.$video.'" id="file'.$filecnt.'" download="SedFed/'.$video_name.'"></a>';
									
										
										
										
										
											
											}
											
									}
								}
							}
					


	$q3="select post_audio as audio from post_files where post_id=$post_id";
	$r3=mysqli_query($dbc,$q3);
	if($r3)
	{
		if(mysqli_num_rows($r3)>0)
		{
			while($audr=mysqli_fetch_array($r3,MYSQLI_ASSOC))
			{
				
				$audcnt=0;
				$audio=$audr['audio'];
			
					if(empty($audio[$filecnt]))
					{

					}else{
							$filecnt=$filecnt+1;
							$audio_name=substr($audio,25,strlen($audio));
                   
							echo '<a href="'.$audio.'" id="file'.$filecnt.'" download="'.$audio_name.'"><a/>';
			
					}
					
			}
		}
	}

		$q4="select post_pdf as pdf from post_files where post_id=$post_id";
		$r4=mysqli_query($dbc,$q4);
		if($r4)
		{
			$pdf=0;
			if(mysqli_num_rows($r4)>0)
			{
				while ($pdfr=mysqli_fetch_array($r4,MYSQLI_ASSOC))
				 {
				 	
					$pdffl=$pdfr['pdf'];
				if(empty($pdffl))
				{

				}else{
					$filecnt=$filecnt+1;
					$pdf_name=substr($pdffl,25,strlen($pdffl));
                   

					echo '<a href="'.$pdffl.'" id="file'.$filecnt.'" download="SedFed/'.$pdf_name.'"></a>';
		
				}
				
				}
			}
		}



	$q5="select post_file as file from post_files where post_id=$post_id";
	$r5=mysqli_query($dbc,$q5);
	if($r5)
	{
		if(mysqli_num_rows($r5)>0)
		{
			$myf=0;
			while ($filer=mysqli_fetch_array($r5,MYSQLI_ASSOC)) 
			{
				$myfile=$filer['file'];
				if(empty($myfile))
				{

				}else{
					$filecnt=$filecnt+1;
					$file_name=substr($myfile,25,strlen($myfile));
                   
					echo '<a href="'.$myfile.'" id="file'.$filecnt.'" download="SedFed/'.$file_name.'"></a>';
				}
				
			}
		}
	}



}
?>