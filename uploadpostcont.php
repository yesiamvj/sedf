<?php
if(empty($_SESSION['user_id']) || empty($user_name))
{
    header("location:index.php");
}else
{
    echo"ennada aachu";
    $with_users=$_REQUEST['withusers'];
    $shwuser=$_REQUEST['showuser'];
    $hideuser=$_REQUEST['hideuser'];
    $post_cap=$_REQUEST['p_caption'];
    $post_feel=$_REQUEST['postfeel'];
    $post_feelwhile=$_REQUEST['postwhilefeel'];
    $post_loc=$_REQUEST['post_location'];
    $all_ppl=$_REQUEST['allpeople'];
    $post_id=$_REQUEST['post_id'];
    $post_cap=$_REQUEST['allrelation'];
   
}
?>