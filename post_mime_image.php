
    <?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];

    require 'mysqli_connect.php';
    if(!empty($_FILES['image_file']['name']))
    {
           $top_meme=$_REQUEST['top_meme'];
           $btm_meme=$_REQUEST['btm_meme'];
           $type=$_FILES['image_file']['type'];
           if($type=='image/jpeg' || $type=='image/jpg' || $type=='png' || $type=='image/gif' || $type=='image/ico')
           {
	  $q="insert into post_permision (user_id,allrelation,allpeople,me)values($user_id,1,0,1)";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           
              $q2="select post_id as pid from post_permision where user_id=$user_id order by post_id desc";
                $r=mysqli_query($dbc,$q2);
                if($r)
                {
                    $row=mysqli_fetch_array($r);
                    $post_id=$row['pid'];
                   
                }else{
                    $post_id=1;
                }
                
    }
    $time= date("g:i a ,F j, Y");
     $q3="insert into postforall(user_id,post_id,post_time)values($user_id,$post_id,'$time')";
           $r3=  mysqli_query($dbc, $q3);
          
     $q2="INSERT INTO `meme_posts` (`meme_id`, `post_id`, `top_meme`, `bottom_meme`, `user_id`) VALUES ('', $post_id, '$top_meme', '$btm_meme', $user_id)";
     $r2=mysqli_query($dbc, $q2);
     if($r2)
     {
            if(!empty($_FILES['image_file']['name']))
    {
    $image=$_FILES['image_file']['name'];
    $rand=rand(000000000,999999999999999);
    $name="$rand$image";
    $myuser_name=$_SESSION['user_name'];
     $name='../'.$myuser_name.'/storage/publicfolder/post/images/postimages/'.$rand.''.$rand.'';

    move_uploaded_file($_FILES['image_file']['tmp_name'], $name);
 

$q="insert into post_images(user_id,post_id,post_image)values($user_id,$post_id,'$name')";
$r=mysqli_query($dbc,$q);
if($r)
{
    echo'ins';
}else
{
    echo'not ins';
}
    } 
     }

          
    
           }else
    {
           echo 'Please Select an image to upload';
    }
  
    }else
    {
           echo 'Please Select an image to upload';
    }
}