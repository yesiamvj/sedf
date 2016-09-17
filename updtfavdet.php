<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}
else
{
   $user_id=$_SESSION['user_id'];
   require 'mysqli_connect.php';

   $f1=mysqli_real_escape_string($dbc,$_REQUEST['f1']);
   $f2=mysqli_real_escape_string($dbc,$_REQUEST['f2']);
   $f3=mysqli_real_escape_string($dbc,$_REQUEST['f3']);
   $f4=mysqli_real_escape_string($dbc,$_REQUEST['f4']);
   $f5=mysqli_real_escape_string($dbc,$_REQUEST['f5']);
   $f6=mysqli_real_escape_string($dbc,$_REQUEST['f6']);
   $f7=mysqli_real_escape_string($dbc,$_REQUEST['f7']);
   $f8=mysqli_real_escape_string($dbc,$_REQUEST['f8']);
   $f9=mysqli_real_escape_string($dbc,$_REQUEST['f9']);
   $f10=mysqli_real_escape_string($dbc,$_REQUEST['f10']);
   $f11=mysqli_real_escape_string($dbc,$_REQUEST['f11']);
   $f12=mysqli_real_escape_string($dbc,$_REQUEST['f12']);
   $f13=mysqli_real_escape_string($dbc,$_REQUEST['f13']);
   $f14=mysqli_real_escape_string($dbc,$_REQUEST['f14']);
   $f15=mysqli_real_escape_string($dbc,$_REQUEST['f15']);
   $f16=mysqli_real_escape_string($dbc,$_REQUEST['f16']);
   $f17=mysqli_real_escape_string($dbc,$_REQUEST['f17']);
   $f18=mysqli_real_escape_string($dbc,$_REQUEST['f18']);
   $f19=mysqli_real_escape_string($dbc,$_REQUEST['f19']);
   $f20=mysqli_real_escape_string($dbc,$_REQUEST['f20']);
   
   $fr1=mysqli_real_escape_string($dbc,$_REQUEST['fr1']);
   $fr2=mysqli_real_escape_string($dbc,$_REQUEST['fr2']);
   $fr3=mysqli_real_escape_string($dbc,$_REQUEST['fr3']);
   $fr4=mysqli_real_escape_string($dbc,$_REQUEST['fr4']);
   $fr5=mysqli_real_escape_string($dbc,$_REQUEST['fr5']);
   $fr6=mysqli_real_escape_string($dbc,$_REQUEST['fr6']);
   $fr7=mysqli_real_escape_string($dbc,$_REQUEST['fr7']);
   $fr8=mysqli_real_escape_string($dbc,$_REQUEST['fr8']);
   $fr9=mysqli_real_escape_string($dbc,$_REQUEST['fr9']);
   $fr10=mysqli_real_escape_string($dbc,$_REQUEST['fr10']);
   $fr11=mysqli_real_escape_string($dbc,$_REQUEST['fr11']);
   $fr12=mysqli_real_escape_string($dbc,$_REQUEST['fr12']);
   $fr13=mysqli_real_escape_string($dbc,$_REQUEST['fr13']);
   $fr14=mysqli_real_escape_string($dbc,$_REQUEST['fr14']);
   $fr15=mysqli_real_escape_string($dbc,$_REQUEST['fr15']);
   $fr16=mysqli_real_escape_string($dbc,$_REQUEST['fr16']);
   $fr17=mysqli_real_escape_string($dbc,$_REQUEST['fr17']);
   $fr18=mysqli_real_escape_string($dbc,$_REQUEST['fr18']);
   $fr19=mysqli_real_escape_string($dbc,$_REQUEST['fr19']);
   $fr20=mysqli_real_escape_string($dbc,$_REQUEST['fr20']);
  
   $q2="select fav_id as f from favorites where user_id=$user_id";
   $r2=mysqli_query($dbc,$q2);
   if($r2)
   {
   	if(!empty($row=mysqli_fetch_array($r2,MYSQLI_ASSOC)))
   	{
   		$favid=$row['f'];

   $q="INSERT INTO `favorites` (`fav_id`, `user_id`, `number`, `letter`, `color`, `actor`, `actress`, `movie`, `sora`, `place`, `animal`, `food`, `field`, `book`, `game`, `sportperson`, `author`, `tvshow`, `cn`, `miscdir`, `filmdir`, `cmdyactr`) VALUES (NULL,$user_id , '$f1','$f2','$f3', '$f4', '$f5', '$f6', '$f7', '$f8', '$f9', '$f10', '$f11', '$f12', '$f13', '$f14', '$f15', '$f16', '$f17', '$f18', '$f19', '$f20')";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
   	echo "ins fav";
						   	$q3="DELETE FROM `favorites` WHERE  fav_id=$favid";
						$r3=mysqli_query($dbc,$q3);
						if($r3)
						{
							echo "dlt";
						}else
						{
							echo "no dlt";
						}
   }else
   {
   	echo "not ins fav";
   }
   	}else
   	{
		
   $q="INSERT INTO `favorites` (`fav_id`, `user_id`, `number`, `letter`, `color`, `actor`, `actress`, `movie`, `sora`, `place`, `animal`, `food`, `field`, `book`, `game`, `sportperson`, `author`, `tvshow`, `cn`, `miscdir`, `filmdir`, `cmdyactr`) VALUES (NULL,$user_id , '$f1','$f2','$f3', '$f4', '$f5', '$f6', '$f7', '$f8', '$f9', '$f10', '$f11', '$f12', '$f13', '$f14', '$f15', '$f16', '$f17', '$f18', '$f19', '$f20')";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
   	echo "ins fav";
   }else
   {
   	echo "not ins fav";
   }   		
   	}
   }



     $q4="select fav_id as f from fav_reason where user_id=$user_id";
   $r4=mysqli_query($dbc,$q4);
   if($r4)
   {
   	if(!empty($rows=mysqli_fetch_array($r4,MYSQLI_ASSOC)))
   	{
   		$favid=$rows['f'];
   		$q1="INSERT INTO fav_reason (`user_id`, `number`, `letter`, `color`, `actor`, `actress`, `movie`, `sora`, `place`, `animal`, `food`, `field`, `book`, `game`, `sportperson`, `author`, `tvshow`, `cn`, `miscdir`, `filmdir`, `cmdyactr`) VALUES ($user_id , '$fr1','$fr2','$fr3', '$fr4', '$fr5', '$fr6', '$fr7', '$fr8', '$fr9', '$fr10', '$fr11', '$fr12', '$fr13', '$fr14', '$fr15', '$fr16', '$fr17', '$fr18', '$fr19', '$fr20')";
   $r1=mysqli_query($dbc,$q1);
   if($r1)
   {
   	echo "ins fav res";
   	 					$q3="DELETE FROM `fav_reason` WHERE  fav_id=$favid";
						$r3=mysqli_query($dbc,$q3);
						if($r3)
						{
							echo "dlt";
						}else
						{
							echo "no dlt";
						}
   }else
   {
   	echo "not ins fav res";
   }
    }else
    {
					    	$q1="INSERT INTO fav_reason (`user_id`, `number`, `letter`, `color`, `actor`, `actress`, `movie`, `sora`, `place`, `animal`, `food`, `field`, `book`, `game`, `sportperson`, `author`, `tvshow`, `cn`, `miscdir`, `filmdir`, `cmdyactr`) VALUES ($user_id , '$fr1','$fr2','$fr3', '$fr4', '$fr5', '$fr6', '$fr7', '$fr8', '$fr9', '$fr10', '$fr11', '$fr12', '$fr13', '$fr14', '$fr15', '$fr16', '$fr17', '$fr18', '$fr19', '$fr20')";
					   $r1=mysqli_query($dbc,$q1);
					   if($r1)
					   {
					   	echo "ins fav res";
					   }else
					   {
					   	echo "not ins fav res";
					   }	
    }

    
}
}

?>