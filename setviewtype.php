<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
 $user_id=$_SESSION['user_id'];
 $type=$_REQUEST['type'];
 require 'mysqli_connect.php';
 $q="select type as t from tilestype where user_id=$user_id";
 $r=mysqli_query($dbc,$q);
 if($r)
 {
     if(mysqli_num_rows($r)>0)
     {
         
         $q2="update tilestype set type='$type' where user_id=$user_id";
         $r2=mysqli_query($dbc,$q2);
         if($r2)
         {
              echo '
<script type="text/javascript">
$(document).ready(function()
{

var n=0;
    var nid="#vtype"+a;
    $(nid).css({"border":"1px solid navy"});
    for(n=1;n<=4;n++)
    {
       var  id="#vtype"+n;
        if(id!==nid)
        {
    $(id).css({"border":"1px solid transparent"});   
        }else
        {
        }
    }

}
);
</script>';
         }else
         {
             echo'not updt';
         }
     }else
     {
         $q1="insert into tilestype (user_id,type)values($user_id,'$type')";
         $r1=mysqli_query($dbc,$q1);
         if($r1)
         {
             echo '
<script type="text/javascript">
$(document).ready(function()
{

var n=0;
    var nid="#vtype"+a;
    $(nid).css({"border":"1px solid navy"});
    for(n=1;n<=4;n++)
    {
       var  id="#vtype"+n;
        if(id!==nid)
        {
    $(id).css({"border":"1px solid transparent"});   
        }else
        {
        }
    }

}
);
</script>';
         }else
         {
             echo 'not ins type set';
         }
     }
     }else
     {
         
     }
 }
?>