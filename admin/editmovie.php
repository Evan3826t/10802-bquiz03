<style>
.form{
    list-style-type: none;
    padding: 5px;
    margin: auto;
}
.form li{
    margin: 3px 0;
}
</style>
<?php

$movie = find("movie",$_GET['id']);
$date = explode("-",$movie['ondate']);

?>
<form action="./api/editmovie.php" method="post" enctype="multipart/form-data">
    <ul class="form">
        <li>片名: <input type="text" name="name" value="<?=$movie['name']?>"></li>
        <li>分級: <select name="level" >
            <option value="1" <?=($movie['level'] == 1)?"selected":"";?>>普遍級</option>
            <option value="2" <?=($movie['level'] == 2)?"selected":"";?>>輔導級</option>
            <option value="3" <?=($movie['level'] == 3)?"selected":"";?>>保護級</option>
            <option value="4" <?=($movie['level'] == 4)?"selected":"";?>>限制級</option>
        </select></li>
        <li>片長: <input type="number" name="length" value="<?=$movie['length']?>"></li>
        <li>上映日期:
            <select name="year" value="<?=$date[0]?>">
                <option value="2019"<?=($date[0] == "2019")?"selected":"";?>>2019</option>
                <option value="2020"<?=($date[0] == "2020")?"selected":"";?>>2020</option>
                <option value="2021"<?=($date[0] == "2021")?"selected":"";?>>2021</option>
            </select>年
            <!-- select>option[value="$$"]*12>{$} -->
            <select name="month">
                <option value="01" <?=($date[1] == "01")?"selected":"";?>>1</option>
                <option value="02" <?=($date[1] == "02")?"selected":"";?>>2</option>
                <option value="03" <?=($date[1] == "03")?"selected":"";?>>3</option>
                <option value="04" <?=($date[1] == "04")?"selected":"";?>>4</option>
                <option value="05" <?=($date[1] == "05")?"selected":"";?>>5</option>
                <option value="06" <?=($date[1] == "06")?"selected":"";?>>6</option>
                <option value="07" <?=($date[1] == "07")?"selected":"";?>>7</option>
                <option value="08" <?=($date[1] == "08")?"selected":"";?>>8</option>
                <option value="09" <?=($date[1] == "09")?"selected":"";?>>9</option>
                <option value="10" <?=($date[1] == "10")?"selected":"";?>>10</option>
                <option value="11" <?=($date[1] == "11")?"selected":"";?>>11</option>
                <option value="12" <?=($date[1] == "12")?"selected":"";?>>12</option>
            </select>月
            <select name="day">
                <option value="01" <?=($date[2] == "01")?"selected":"";?>>1</option>
                <option value="02" <?=($date[2] == "02")?"selected":"";?>>2</option>
                <option value="03" <?=($date[2] == "03")?"selected":"";?>>3</option>
                <option value="04" <?=($date[2] == "04")?"selected":"";?>>4</option>
                <option value="05" <?=($date[2] == "05")?"selected":"";?>>5</option>
                <option value="06" <?=($date[2] == "06")?"selected":"";?>>6</option>
                <option value="07" <?=($date[2] == "07")?"selected":"";?>>7</option>
                <option value="08" <?=($date[2] == "08")?"selected":"";?>>8</option>
                <option value="09" <?=($date[2] == "09")?"selected":"";?>>9</option>
                <option value="10" <?=($date[2] == "10")?"selected":"";?>>10</option>
                <option value="11" <?=($date[2] == "11")?"selected":"";?>>11</option>
                <option value="12" <?=($date[2] == "12")?"selected":"";?>>12</option>
                <option value="13" <?=($date[2] == "13")?"selected":"";?>>13</option>
                <option value="14" <?=($date[2] == "14")?"selected":"";?>>14</option>
                <option value="15" <?=($date[2] == "15")?"selected":"";?>>15</option>
                <option value="16" <?=($date[2] == "16")?"selected":"";?>>16</option>
                <option value="17" <?=($date[2] == "17")?"selected":"";?>>17</option>
                <option value="18" <?=($date[2] == "18")?"selected":"";?>>18</option>
                <option value="19" <?=($date[2] == "19")?"selected":"";?>>19</option>
                <option value="20" <?=($date[2] == "20")?"selected":"";?>>20</option>
                <option value="21" <?=($date[2] == "21")?"selected":"";?>>21</option>
                <option value="22" <?=($date[2] == "22")?"selected":"";?>>22</option>
                <option value="23" <?=($date[2] == "23")?"selected":"";?>>23</option>
                <option value="24" <?=($date[2] == "24")?"selected":"";?>>24</option>
                <option value="25" <?=($date[2] == "25")?"selected":"";?>>25</option>
                <option value="26" <?=($date[2] == "26")?"selected":"";?>>26</option>
                <option value="27" <?=($date[2] == "27")?"selected":"";?>>27</option>
                <option value="28" <?=($date[2] == "28")?"selected":"";?>>28</option>
                <option value="29" <?=($date[2] == "29")?"selected":"";?>>29</option>
                <option value="30" <?=($date[2] == "30")?"selected":"";?>>30</option>
                <option value="31" <?=($date[2] == "31")?"selected":"";?>>31</option>
            </select>日
        </li>
        <li>發行商: <input type="text" name="publish" value="<?=$movie['publish']?>"></li>
        <li>導演: <input type="text" name="director" value="<?=$movie['director']?>"></li>
        <li>預告影片: <input type="file" name="trailer" value="<?=$movie['trailer']?>"></li>
        <li>電影海報: <input type="file" name="poster" value="<?=$movie['poster']?>"></li>
        <li>劇情簡介: <textarea name="intro" style="width: 70%;height: 50px;"><?=$movie['intro']?></textarea></li>
    </ul>
    <input type="hidden" name="id" value="<?=$movie['id']?>">
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>