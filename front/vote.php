<?php
$vote = $Que->find($_GET['id']);
$opts = $Que->all(['subject_id'=>$_GET['id']]);
?>
<fieldset>
    <form action="./api/vote.php" method="post">
    <legend>目前位置 : 首頁 > 問卷調查 > <?=$vote['text']?></legend>
   <h2> <?=$vote['text']?></h2>
   <?php
foreach($opts as $opt){
    ?>
<div><input type="radio" name="vote_id" value="<?=$opt['id']?>"><?=$opt['text']?></div>
    <?php
}
?>
<button>我要投票</button>
</form>
</fieldset>