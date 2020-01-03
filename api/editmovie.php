<?php

include_once ("../base.php");

if(!empty($_FILES['poster']['tmp_name'])){
    $data['poster'] = $_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'], "../movie/" . $data['poster']);
}
if(!empty($_FILES['trailer']['tmp_name'])){
    $data['trailer'] = $_FILES['trailer']['name'];

    move_uploaded_file($_FILES['trailer']['tmp_name'], "../movie/" . $data['trailer']);

}
$data['id']=$_POST['id'];
$data['name']=$_POST['name'];
$data['level']=$_POST['level'];
$data['length']=$_POST['length'];
$data['ondate']=$_POST['year'].$_POST['month'].$_POST['day'];
$data['publish']=$_POST['publish'];
$data['director']=$_POST['director'];
$data['intro']=$_POST['intro'];
$data['sh']=1;

$data['rank']= q("select max(rank) from movie")[0][0] +1;

//  老師解法
// foreach ($_post as $key => $value) {
//     switch( $key){
//         case "year":
//         case "month":
//         case "day":
//         break;
//         default:
//             $data[$key]=$value;
//     }
// }
// $data['ondate']=$_POST['year'].$_POST['month'].$_POST['day'];

save("movie",$data);

to("../admin.php?do=movie");
?>