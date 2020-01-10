<style>
/* 院線片用 */
.movie-list{
  display: flex;
  flex-wrap: wrap;
  justify-content:start;
}

.movie-box{
  width: 48%;
  margin: 0.5%;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 10px;
  display: flex;
  flex-wrap: wrap;
  padding: 10px 3px;
}

.movie-poster img{
  width: 55px;
  height: 70px;
}

.movie-info{
  width: 70%;
}

.movie-info li{
  list-style-type: none;
  padding:0;
  font-size: 12px;
}
.movie-info li img{
  width: 20px;
  vertical-align: middle;
}


/* 預告片用 */
.list , .controls{
}

#slider{
  box-sizing: border-box;
}
#slider .lists{
  height:240px;
  width:180px;
  overflow: hidden;
  margin: auto;
}
#slider .controls{
  height:100px;
  width:90%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: auto;
}

.controls .btns{
  width: 320px;
  display: flex;
  align-items: center;
  overflow: hidden;
}

.controls .btns .icon{
  width: 80px;
  height: 100px;
  flex-shrink: 0;
  text-align: center;
  font-size: 14px;
  position: relative;
}
.controls .ra,.controls .la{
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
}
.controls .ra{
  border-left: 25px solid black;
}
.controls .la{
  border-right: 25px solid black;
}
.poster img, .icon img{
  width: 100%;
}
.poster{
  display: none;
  text-align:center;
}
.icon img{
  width:80%;
}
</style>


<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="slider">
          <div class="lists">
            <?php
              $p=all("poster",['sh'=>'1'],' order by rank');
              foreach ($p as $k => $v) {
                ?>
                <div class="poster" data-ani="<?=$v['ani']?>">
                <img src="./poster/<?=$v['poster']?>" alt="">
                <name><?=$v['name']?></name>
                </div>
                <?php
              }

            ?>
          </div>
          <div class="controls">
            <div class="la"></div>
            <div class="btns">
            <?php
            foreach ($p as $k => $v) {
              
            ?>
              <div class="icon">
                <img src="./poster/<?=$v['poster']?>" alt="">
                <div class="name"><?=$v['name']?></div>
              </div>
            <?php
            }
            ?>
            </div>
            <div class="ra"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(".poster").eq(0).show();
    let total = $(".poster").length;
    let next = 1;
    let slide = setInterval(ani,2500);

    $(".icon").on("click",function(){
      next = $(this).index(".icon");
      console.log($(this).index(".icon"));
    })


    let mov = 0;
    // 抓外框長度
    let w=$(".icon").outerWidth();
    $(".ra, .la").on("click",function(){
      switch($(this).attr("class")){
        case "ra":
          if(mov < (total - 4)){
            mov++;
            $(".icon").animate({right:w*mov});
          }
          break;
        case "la":
          if(mov > 0){
            mov--;
            $(".icon").animate({right:w*mov});
          }
          break;
      }
    })

    function ani(){
      let show = $(".poster:visible");
      let ani = $(".poster").eq(next).data("ani");
      console.log(ani);
      switch(ani){
        case 1:
          // 淡入淡出
          $(show).fadeOut(1000,function(){
            $(".poster").eq(next).fadeIn(1000);
            next++;
            if(next >= total){
              next=0;
            }      
          });
          break;
        case 2:
          // 滑入滑出
          $(show).slideUp(1000,function(){
            $(".poster").eq(next).slideDown(1000);
            next++;
            if(next >= total){
              next=0;
            } 
          });
          break;
        case 3:
          // 縮放
          $(show).hide(1000,function(){
            $(".poster").eq(next).show(1000);
            next++;
            if(next >= total){
              next=0;
            } 
          });
          break;
      }
    }

    </script>
    <div class="half">
    
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <div class="movie-list">
        <?php
    
        $today = date("Y-m-d");
        $startDay = date("Y-m-d",strtotime("-2 days"));
        $total = q("select count(*) from movie where sh='1' && ondate >= '$startDay' && ondate <= '$today'")[0][0];
        $div = 4;
        $pages = ceil($total / $div);
        $now = (!empty($_GET['p']))?$_GET['p']:"1";
        $start = ($now-1)*$div;
        $sql = "select * from movie where sh='1' && ondate >= '$startDay' && ondate <= '$today' order by rank limit $start,$div";
        $movies = q($sql);
        foreach ($movies as $m) {

        ?>

          <div class="movie-box">
          <div class="movie-poster">
            <img src="./movie/<?=$m['poster'];?>" alt="">
          </div>
          <div class="movie-info">
            <li><?=$m['name'];?></li>
            <li>分級: <img src="icon/<?=$level[$m['level']][0]?>" style="display:inline-block;"><?=$level[$m['level']][1]?></li>
            <li>上映日期:<?=$m['ondate'];?></li>
          </div>
          <div class="movie-btn">
            <button onclick="javascript:location.href='index.php?do=intro&id=<?=$m['id']?>'">劇情簡介</button>
            <button onclick="javascript:location.href='index.php?do=order&id=<?=$m['id']?>'">線上訂票</button>
          </div>
        </div>

        <?php
        }
        
        ?>
        </div>
        <div class="ct">
        <?php
        if($now-1 > 0){
          echo "<a href='index.php?p=". ($now-1) ."'> < </a>";
        }
        for( $i = 1; $i <= $pages; $i++){
          $font = ($i==$now)?"24px":"16px";
          echo "<a href='index.php?p=$i' style='font-size:$font'>$i</a>";
        }
        if($now+1 <= $pages){
          echo "<a href='index.php?p=". ($now+1) ."'> ></a>";

        }
        ?>
        </div>
      </div>
    </div>
  