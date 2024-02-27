<?php
include_once "db.php";
$res = $Good->count(['news_id'=>$_POST['id'],'user'=>$_SESSION['user']]);
if($res==0){
    $Good->save(['news_id'=>$_POST['id'],'user'=>$_SESSION['user']]);
}else{
    $Good->del(['news_id'=>$_POST['id'],'user'=>$_SESSION['user']]);
}



?>