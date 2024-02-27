<style>
    fieldset{
        width:80%;
        margin:auto;
    }
</style>
<fieldset>
<legend>新增問卷</legend>
<form action="./api/add_que.php" method="post">
    <div>
        問卷名稱<input type="text" name="subject">
    </div>
    <div id="opt">
        選項<input type="text" name="opts[]">
        <input type="button" onclick="moreopt()" value="更多">
    </div>
    <div>
        <input type="submit" value="新增"> | 
        <input type="reset" value="清空">
    </div>
</form>

</fieldset>

<fieldset>
    <legend>問卷列表</legend>
    <table>
        <tr>
            <th>問卷名稱</th>
            <th>投票數</th>
            <th>開放</th>
        </tr>
        <?php
$ques = $Que->all(['subject_id'=>0]);
foreach($ques as $que){

?>
        <tr>
            <td><?=$que['text']?></td>
            <td><?=$que['vote']?></td>
            <td><button onclick="change(this)" data-id="<?=$que['id']?>" data-sh="<?=$que['sh']?>"><?=($que['sh']==1)?"開放":"關閉"?></button></td>
        </tr>
<?php
}
?>


    </table>
</fieldset>
<script>
    function moreopt(){
        let html=`
        <div>
        選項<input type="text" name="opts[]">
    </div>
        `
        $('#opt').before(html);
    }
    function change(elm){
        let btn = $(elm);
        let id = $(elm).data('id');
        let sh = $(elm).data('sh');
        console.log(btn,id,sh);
       $.post('./api/change_que.php',{id,sh},function(res){
location.reload();
       })
    }
</script>