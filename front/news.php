<style>
    fieldset{
        width:80%;
        margin:auto;
    }
    table{
        width:100%;
        margin:auto;
    }
    td:nth-child(1){
        background:#eee;
        padding:10px;
    }
</style>
<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>
    <table>
        <tr>
            <th style="width:30%;">標題</th>
            <th styl="width:70%">內容</th>
            <th></th>
        </tr>
        <?php
$total=$News->count(['sh'=>1]);
$div=5;
$pages=ceil($total/$div);
$now=($_GET['p'])??1;
$start=($now-1)*$div;
$allnews = $News->all(['sh'=>1],"limit $start,$div");
foreach($allnews as $news){
    ?>
        <tr>
            <td><?=$news['title']?></td>
            <td><?=mb_substr($news['news'],0,20)?>...</td>
            <td>
                <?php
if(isset($_SESSION['user'])){
    $good = $Good->count(['news_id'=>$news['id'],'user'=>$_SESSION['user']]);
    if($good==0){
        ?>
        <button onclick="good(<?=$news['id']?>)">讚</button>
        <?php
    }else{
        ?>
        <button onclick="good(<?=$news['id']?>)">收回讚</button>
        <?php
    }
}

?>
            </td>
        </tr>

<?php
}

?>
    </table>
    <div>
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
</fieldset>
<script>
    function good(id){
$.post('./api/good.php',{id},function(){
    location.reload();
})
    }
</script>