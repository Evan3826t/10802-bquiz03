﻿<?php
$movie = find("movie",$_GET['id']);

?>
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="movie/<?=$movie['trailer']?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="movie/<?=$movie['poster']?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$movie['name']?>
          <input type="button" value="線上訂票" onclick="javascript:location.href='index.php?do=order&id=<?=$movie['id']?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="icon/<?=$level[$movie['level']][0]?>" style="display:inline-block;"><?=$level[$movie['level']][1]?> </p>
        <p style="margin:3px">影片片長 ： <?=$movie['length']?>分鐘</p>
        <p style="margin:3px">上映日期 <?=$movie['ondate']?></p>
        <p style="margin:3px">發行商 ： <?=$movie['publish']?></p>
        <p style="margin:3px">導演 ： <?=$movie['director']?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介： <?=$movie['intro']?><br>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" onclick="javascript:location.href='index.php'" value="院線片清單" onclick="lof(&#39;?&#39;)"></td>
            </tr>
          </tbody>
        </table>
      
</body>
</html>