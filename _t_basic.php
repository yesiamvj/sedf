<?php   session_commit();
   require_once 'mysqli_connect.php';
    $q1="SELECT `first_name`, `sex`, `day`, `month`, `year`, `nick_name`, `nativeplace`, `age`, `reginit_id`, `mobno`, `email` FROM `basic` WHERE user_id=$owner_id";
    $r1=  mysqli_query($dbc, $q1);
    if($r1){
        $tableRows= mysqli_fetch_array($r1,MYSQLI_ASSOC);
        $first_name=$tableRows['first_name'];
        $sex=$tableRows['sex'];
        $day=$tableRows['day'];
        $month=$tableRows['month'];
        $year=$tableRows['year'];
        $nativeplace=$tableRows['nativeplace'];
        if($sex=='boy'){
            $sex='Male';
        }
        else{
            $sex='Female';
        }
    
    }
 else {
        echo mysqli_error($dbc);
}
?>