<?php
include_once "db.php";
// echo json_encode($_POST);
// exit();
$que = $Que->find($_POST['id']);
if($_POST['sh']==1){
    $_POST['sh']=0;
    echo "關閉";
}else{
    $_POST['sh']=1;
    echo "開放";
}
$Que->save($_POST);



?>