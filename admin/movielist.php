<?php
include_once ("../base.php");

$movie = all("movie",[],"order by rank");
foreach ($movie as $k => $v) {
    // 計算上一筆的 id
    $prev = ($k!=0)?$movie[$k-1]['id']:$v['id'];

    // 計算下一筆的 id
    $next = ($k!=(count($movie)-1))?$movie[$k+1]['id']:$v['id'];
   ?>
    <ul class="row">
    <li>
        <img src="./movie/<?=$v['poster']?>" alt="">
    </li>
    <li >
        <div>分級:<img src="./icon/03C0<?=$v['level']?>.png" alt=""></div>
        <div>片名:<?=$v['name']?></div>
        <div>片長:<?=$v['length']?></div>
        <div>上映時間:<?=$v['ondate']?></div>
    </li>
    <li>
        <div>
            <button class="showBtn" data-show="<?=$v['id']?>"><?=($v['sh'] == 1)?"顯示":"隱藏"?></button>
            <button class='shiftBtn' id="<?=$v['id'] . "-" . $prev;?>">往上</button>
            <button class='shiftBtn' id="<?=$v['id'] . "-" . $next;?>">往下</button>
            <button onclick="javascript:location.href='admin.php?do=editmovie&id=<?=$v['id']?>'">編輯電影</button>
            <button class="delBtn" data-del="<?=$v['id']?>">刪除電影</button>
        </div>
        <div>
            劇情簡介:<?=$v['intro']?>
        </div>
    </li>
    </ul>
   <?php
}
?>