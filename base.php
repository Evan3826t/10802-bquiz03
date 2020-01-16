<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=db113";
$pdo = new PDO($dsn,"root","");

session_start();
$level=[
    1=>["03C01.png","普遍級"],
    2=>["03C02.png","輔導級"],
    3=>["03C03.png","保護級"],
    4=>["03C04.png","限制級"],
];

$sess=[
    1=>"14:00-16:00",
    2=>"16:00-18:00",
    3=>"18:00-20:00",
    4=>"20:00-22:00",
    5=>"22:00-24:00"
];

function find($table,...$arg){
    global $pdo;
    $sql = "select * from $table where ";
    if(is_array($arg[0])){
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
        $sql.=implode(" && ",$tmp);
    }else{
        $sql.="`id`='". $arg[0] ."'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function all($table,...$arg){
    global $pdo;
    $sql = "select * from $table ";
    if(!empty($arg[0])){
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'",$key,$value); 
        }
        $sql.="where " . implode(" && ",$tmp);
    }
    if(!empty($arg[1])){
        $sql.= $arg[1];
    }
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function num($table,...$arg){
    global $pdo;
    $sql = "select count(*) from $table ";
    if(!empty($arg[0])){
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'",$key,$value); 
        }
        $sql.="where " . implode(" && ",$tmp);
    }
    if(!empty($arg[1])){
        $sql.= $arg[1];
    }
    return $pdo->query($sql)->fetchColumn(PDO::FETCH_ASSOC);
}

function save($table,$data){
    global $pdo;
    if( !empty($data['id'])){
        foreach ($data as $key => $value) {
            if($key!="id"){
                $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
        }
        $sql="update $table set " . implode(",",$tmp) . "where `id`='" . $data['id'] . "'";
    }else{
        $sql = "insert into $table (`" . implode("`,`",array_keys($data)) ."`) value('" . implode("','",$data) . "')";
    }
    // echo $sql;
    return $pdo->exec($sql);
}

function del($table,...$arg){
    global $pdo;
    $sql="delete from $table where ";
    if(is_array($arg[0])){
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
        $sql.=implode(" && ",$tmp);
    }else{
        $sql.="`id`='". $arg[0] ."'";
    }
    echo $sql;
    return $pdo->exec($sql);
}

function q($sql){
    global $pdo;
  
    return $pdo->query($sql)->fetchAll();
  
 }

function to($path){
    header("location:".$path);
}

function pre($data){
    echo "<pre>";print_r($data);"</pre>";
}
?>