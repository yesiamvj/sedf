<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    echo "o";
}else
{
    echo "i";
}