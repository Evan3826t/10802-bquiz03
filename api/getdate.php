<?php
include_once ("../base.php");

$movie = find("movie",$_GET['id'])['ondate'];

$today = date("Y-m-d");
$sql = "";
$date = "";
$ondate = strtotime($movie);

for($i=0;$i < 3; $i++){
    $showDate = date("Y-m-d",strtotime("+$i days", $ondate));
    if(strtotime($showDate) >= strtotime($today)){
        echo "<option value='$showDate'>". date("m月d日 l",strtotime($showDate)) ."</option>";
    }
}


?>