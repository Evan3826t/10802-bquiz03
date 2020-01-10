<?php
include_once ("../base.php");
// 改時區
date_default_timezone_set("Asia/Taipei");

$id = $_GET['id'];
$date = $_GET['date'];
$movie = find("movie",$id)['name'];

$today = date("Y-m-d");
$now = date("H");



/* 
if( $date == $today){
    if( $now >= 14){
        // 時間計算
        $start = floor(($now-10)/2);
    }else{
        $start = 1;
    }
}else{
    $start = 1;
}
*/
$start = ($date == $today && $now >= 14)?floor(($now-10)/2):1;

for($i=$start;$i<=5;$i++){

    $qt=q("SELECT sum(qt) FROM ord WHERE movie='$movie' && date='$date' && session='".$sess[$i]."'")[0][0];
    echo "<option value='".$sess[$i]."' >".$sess[$i]." 剩餘座位".(20-$qt)."人</option>";
}


?>