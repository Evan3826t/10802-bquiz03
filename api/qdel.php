<?php

include_once ("../base.php");

switch ($_POST['type']) {
    case 'date':
        del("ord",["date"=>$_POST['date']]);
        break;
    
    case 'movie':
        del("ord",["movie"=>$_POST['movie']]);
        break;
}


?>