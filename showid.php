<html>
<html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
<script type="text/javascript">

$(document).ready(function()
  {
    
    document.getElementById("subt").click();
  });


</script>
   <form method="post" action="myprofile.php" >
   <input type="hidden" name="userid" value="'.$user_id.'"" />
   <input type="submit" id="subt" style="display:none;" value="submit">
   </form>
</html>
</html>
<?php session_start();

require '../../web/mysqli_connect.php';

$id=$_REQUEST['userid'];
if(empty($id))
{
	$id=$_SESSION['userid'];
}
echo "user id is $id";


?>