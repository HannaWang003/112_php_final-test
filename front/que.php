<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查</legend>
    <table style="width:80%;margin:auto;">
        <tr>
            <th>編號</th>
            <th>問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
$ques = $Que->all(['sh'=>1,'subject_id'=>0]);
foreach($ques as $key=> $que){
?>
        <tr>
            <td class='ct'><?=$key+1?></td>
            <td class='ct'><?=$que['text']?></td>
            <td class='ct'><?=$que['vote']?></td>
            <td class='ct'><a href="?do=res&id=<?=$que['id']?>">結果</a></td>
            <td class='ct'>
                <?php
if(isset($_SESSION['user'])){
    ?>
    <a href="?do=vote&id=<?=$que['id']?>">參與投票</a>
    <?php
}else{
    ?>
<a href="?do=login">請先登入</a>
    <?php
}
                ?>
            </td>
        </tr>


<?php
}



?>
    </table>
</fieldset>