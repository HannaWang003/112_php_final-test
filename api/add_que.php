<?php
include_once "db.php";

$Que->save([
    'text'=>$_POST['subject'],
    'subject_id'=>0,
    'vote'=>0,
    'sh'=>1
]);
$subject_id=$Que->max('id');
foreach($_POST['opts'] as $opt){
    $Que->save([
        'text'=>$opt,
        'subject_id'=>$subject_id,
        'vote'=>0,
        'sh'=>1
    ]);
};
to('../back.php?do=que');

?>