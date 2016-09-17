
<?php session_start();
if(empty($_SESSION['user_id']) && empty($_SESSION['user_name']) && empty($_REQUEST['u']) )
{
	header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $liked_uid=$_REQUEST['q'];
    require 'mysqli_connect.php';
    $q="select likes as l from history where user_id=$user_id and likes=$liked_uid";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            echo'
   <script type="text/javascript">
                $(document).ready(function()
                    {
                    alert("k");
                    $(\'#img_avlothana\').attr(\'src\',"../../web/icons/post-sf-liked.png");
                    }
                
                                          );
                
                </script>';
        }else
        {
            
            
            $q1="INSERT INTO history (user_id,likes)values($user_id,$liked_uid)";
            $r1=mysqli_query($dbc,$q1);
            if($r1)
            {
                 $q23="select likes as l from history where likes=$liked_uid";
                $r23=mysqli_query($dbc,$q23);
                $totlike=mysqli_num_rows($r23);
   
                echo'
   <script type="text/javascript">
                $(document).ready(function()
                    {
                   $(\'#totlikecnt\').html("'.$totlike.'");
                
                                          );
                
                </script>';
            }
        }
    }
}
?>