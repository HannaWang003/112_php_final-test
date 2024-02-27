<?php
$vote = $Que->find($_GET['id']);
$opts = $Que->all(['subject_id'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?=$vote['text']?></legend>
   <h2> <?=$vote['text']?></h2>
   <?php
foreach($opts as $opt){
    if($vote['vote']==0){
        $vote['vote']=1;
    }
    $num = $opt['vote']/$vote['vote'];
    $resNum = $num*100;
    $width=$num*50;
    ?>
<div style="height:40px;line-height:40px;display:flex;"><?=$opt['text']?> |<div style="width:<?=$width?>%;height:20px;background:#eee"></div> <?=$resNum?>%</div>
    <?php
}
?>
<a href="?do=que"><button>返回</button></a>
</fieldset>
