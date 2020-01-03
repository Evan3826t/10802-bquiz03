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

<form action="./api/addmovie.php" method="post" enctype="multipart/form-data">
    <ul class="form">
        <li>片名: <input type="text" name="name" value=""></li>
        <li>分級: <select name="level" value="">
            <option value="1">普遍級</option>
            <option value="2">輔導級</option>
            <option value="3">保護級</option>
            <option value="4">限制級</option>
        </select></li>
        <li>片長: <input type="number" name="length" value=""></li>
        <li>上映日期:
            <select name="year">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>年
            <!-- select>option[value="$$"]*12>{$} -->
            <select name="month">
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>月
            <select name="day">
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>日
        </li>
        <li>發行商: <input type="text" name="publish" value=""></li>
        <li>導演: <input type="text" name="director" value=""></li>
        <li>預告影片: <input type="file" name="trailer" value=""></li>
        <li>電影海報: <input type="file" name="poster" value=""></li>
        <li>劇情簡介: <textarea name="intro" style="width: 70%;height: 50px;"></textarea></li>
    </ul>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>