<style>
h3{
    margin: 0;
    padding: 5px;
    background: #555;
    color: white;
    text-align: center;
    border: 1px solid black;
}
.orderlist{
    width: 100%;
    height: 400px;
    overflow: auto;
}
</style>
<h3>訂單清單</h3>
<div class="fun">
快速刪除:
<input type="radio" name="type" class="type" value="date" checked>依日期
<input type="text" name="text" id="date">

<input type="radio" name="type" class="type" value="movie">依電影
<select name="movie" id="movie">
    <?php
    $movie = all("ord",[],"GROUP BY `movie`");
    foreach ($movie as $k => $m) {
        echo "<option value='". $m['movie'] ."'>". $m['movie'] ."</option>";
    }
    ?>
</select>

<button id="qdel">刪除</button>
</div>
<div class="orderlist">

</div>
<script>
function getList(){
    $.post("./admin/orderlist.php",{},function(res){
        $(".orderlist").html(res);
        $(".delBtn").on("click",function(){
            let id = $(this).data('del');
            console.log(id);
            $.post("./api/del.php",{id,"table":"ord"},function(){
                getList();
            })
        })
    })
}

$("#qdel").on("click",function(){
    let type = $(".type:checked").val();
    console.log(type);
    let chk ="";
    switch(type){
        case "date":
            let date = $("#date").val();
            console.log(date);
            chk = confirm(`是否要刪除全部${date}的訂單?`);
            if(chk == true){
                $.post("./api/qdel.php",{"type":type,"date":date},function(){
                    getList();
                })
            }
        break;
        case "movie":
            let movie = $("#movie").val();
            console.log(movie);
            chk = confirm(`是否要刪除全部${movie}的訂單?`);
            if(chk == true){
                $.post("./api/qdel.php",{"type":type,"movie":movie},function(){
                    getList();
                })
            }
        break;
    };
})

getList();

</script>