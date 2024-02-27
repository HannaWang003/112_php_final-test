<?php
include_once "db.php";
$que = $Que->find($_POST['vote_id']);
$que['vote']++;
$Que->save($que);
$subject = $Que->find($que['subject_id']);
$subject['vote']++;
$id=$subject['id'];
$Que->save($subject);
to("../index.php?do=res&id=$id");

?>