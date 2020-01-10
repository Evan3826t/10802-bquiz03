<?php
include_once ("../base.php");

$today = date("Y-m-d");
$startday = date("Y-m-d",strtotime("-2day"));
$sql = "select * from `movie` where `ondate`<='$today' && `ondate`>='$startday'";
$movie = q($sql);

foreach ($movie as $k => $m) {
    $str = ($_GET['id'] == $m['id'])?"selected":"";
   echo "<option value='" . $m['id'] . "' $str>" . $m['name'] . "</option>";
}


?>
