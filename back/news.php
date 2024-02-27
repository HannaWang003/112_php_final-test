<style>
    fieldset{
        width:80%;
        margin:auto;
    }
</style>
<fieldset>
    <legend>最新文章管理</legend>
    <input type="button" value="新增文章" onclick="more()">
<form action="./api/edit_news.php" method="post">
    <table>
        <tr>
            <th>編號</th>
            <th>標題</th>
            <th>顯示</th>
            <th>刪除</th>
        </tr>
        <?php
$total=$News->count();
$div=3;
$pages=ceil($total/$div);
$now = ($_GET['p'])??"1";
$start=($now-1)*$div;
$allnews = $News->all("limit $now,$div");
foreach($allnews as $key=> $news){


?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$news['title']?></td>
            <td><input type="checkbox" name="sh[]" value="<?=$news['id']?>" <?=($news['sh']==1)?"checked":""?>></td>
            <td><input type="checkbox" name="del[]" value="<?=$news['id']?>"></td>
        </tr>
               <?php
}
        ?>
    </table>
    <div class='ct'>
    <?php
if(($now-1)>0){
    $pre=$now-1;
    echo "<a href='?do=news&p=$pre'> < </a>";
}
for($i=1;$i<=$pages;$i++){
    $style=($i==$now)?"style='font-size:18px;color:red;font-weight:bolder;'":"";
    echo "<a href='?do=news&p=$i' $style>$i</a>";
}
if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=news&p=$next'> > </a>";
}

?>
    </div>
    <div class="ct"><input type="submit" value="確定修改"></div>
    <input type="hidden" name="id[]" value="<?=$news['id']?>">
</form>
</fieldset>

<fieldset id="add_news" style="display:none">
    <legend>新增文章</legend>
<table style="width:80%;margin:auto;">
    <tr>
        <td>文章標題</td>
        <td><input type="text" name="" id="head"></td>
    </tr>
    <tr>
        <td>文章分類</td>
        <td>
            <select name="type" id="type">
                <option value="1">健康新知 </option>
                <option value="2">菸害防治</option>
                <option value="3">癌症防治</option>
                <option value="4">慢性病防治</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>文章內容</td>
        <td>
            <textarea name="news" id="news" style="width:90%;height:200px;"></textarea>
        </td>
    </tr>
</table>
<input type="button" onclick="addNews()" value="新增">
<input type="button" onclick="reset()" value="重置">


</fieldset>
<script>
    function more(){
        $('#add_news').show();
    }
    function reset(){
        $('#type').val("");
        $("#head").val("")
        $("#news").val("");
    }
    function addNews(){
        let data={
            title:$("#head").val(),
            type:$('#type').val(),
            news:$("#news").val(),
        }
        $.post('./api/edit_news.php',data,function(res){
location.reload();
        })
    }
</script>