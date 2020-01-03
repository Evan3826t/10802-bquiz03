<style>
.row{
    background: white;
    color: black;
    margin: 2px auto;
    width: 95%;
    padding: 3px;
    display: flex;
    list-style-type: none;
}
.movielist{
    height: 450px;
    overflow: auto;
}
.row li:nth-child(1){
    width: 15%;
}
.row li:nth-child(2){
    width: 20%;
}
.row li:nth-child(1) img{
    width: 90%;
    height: 100%;
}


</style>
<button onclick="javascript:location.href='admin.php?do=addmovie'">新增電影</button>
<hr>
<div class="movielist">


</div>

<script>
getList();

function getList(){
    $.get("./admin/movielist.php",{},function(res){
        $(".movielist").html(res);
        
        // 顯示隱藏按鈕
        $(".showBtn").on("click",function(){
            let id = $(this).data("show");
            $.post("./api/show.php", {id}, function(){
                getList();
            })
        })

        // 刪除按鈕
        $(".delBtn").on("click",function(){
            let id = $(this).data("del");
            $.post("./api/del.php",{"table":"movie",id},function(){
                getList();
            })
        })

        // 移動用按鈕
        $(".shiftBtn").on("click",function(){
            let id=$(this).attr("id").split("-");
            console.log($(this).attr("id"));
            console.log(id);
            $.post("./api/switch.php",{"table":"movie",id},function(){
                getList();
            })
        })
    })
}

</script>