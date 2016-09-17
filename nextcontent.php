<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$post_id=$_REQUEST['postid'];
	$cnt=$_REQUEST['cnt'];
	
	$change=$_REQUEST['next'];


	require 'mysqli_connect.php';

	$n=0;

            
	$q="select post_image as image from post_images where post_id=$post_id ";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		 if(mysqli_num_rows($r)>0)
		{
			$imgcnt=0;
			while($imgr=mysqli_fetch_array($r,MYSQLI_ASSOC))
			{
			            $n=$n+1;
				$img=$imgr['image'];
				
				if($change==$n)
				{
							              

	    echo '<a href="'.$img.'" id="file'.$n.'" download="'.$img.'"><img src="'.$img.'" alt="'.$img.'" class="img_ThePost"></a>';

				   }



			}
		}
	}
		$q1="select post_video as video from  post_files where post_id=$post_id ";
							$r1=mysqli_query($dbc,$q1);
							if($r1)
							{

								if(mysqli_num_rows($r1)>0)
								{
									        
									while($vidr=mysqli_fetch_array($r1,MYSQLI_ASSOC))
									{
									     
											$vid=$vidr['video'];
											$video=$vid;
											if(empty($vid))
											{

											}else{
											         $n=$n+1;
									       	if($change==$n)
										{

									               echo'<a href="'.$video.'" id="file'.$n.'" download="'.$video.'"><video id="fullscrvideo"  src="'.$video.'" controls ></video></a>';

										}




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
			       
			          if(empty($audio))
			               {

			               }else{
				     $n=$n+1;
			  if($change==$n)
			       {
			           
		               $audio=$audr['audio'];
		                         
		               $audi_name=substr($audio,25,strlen($audio));

		               echo '<a href="'.$audio.'" id="file'.$n.'" download="SedFed/'.$audi_name.'"><div id="snglpdf">'.$audi_name.'<br/><audio id="file'.$n.'" src="'.$audio.'" class="postImagePreview" controls></audio></div><a/>';

			            
   
			       }     
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
				echo"<div id=\"allpdfs\">";
				while ($pdfr=mysqli_fetch_array($r4,MYSQLI_ASSOC))
				 {

					$pdffl=$pdfr['pdf'];
				if(empty($pdffl))
				{

				}else{
				       $n=$n+1;
		  $pc=strpos($pdffl,"postpdfs/")+15;
					$pdf_name=substr($pdffl,$pc,strlen($pdffl));

					echo '<a href="'.$pdffl.'" id="file'.$n.'" download="SedFed/'.$pdf_name.'"><div id="snglpdf"><img src="icons/pdf.png" width="30" hieght="30" alt="'.$pdf_name.'">'.$pdf_name.'</div></a>';

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
			
			while ($filer=mysqli_fetch_array($r5,MYSQLI_ASSOC)) 
			{
			       $file=$filer['file'];
			       
			       if(!empty($file))
			       {
			              $n=$n+1;
			         	if($change==$n)
				{
				   
				       
		    echo '<a href="'.$file.'" id="file'.$n.'" download="SedFed/'.$file.'"><div id="snglpdf"><img src="icons/fileformat/txt.png" width="30" height="30">'.$file.'</div></a>';
		             
				}     
			       }
			
			}
		}
	}
echo "</div>";

if($change>=$n)
{
       $next_post=1;
}  else {
       $next_post=0;
}
	   echo'<input type="hidden" value="'.$next_post.'" id="switch_post'.$cnt.'" name="'.$n.'" title="'.$change.'">';
}
?>
