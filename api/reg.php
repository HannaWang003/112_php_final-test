<?php
include_once "db.php";
if($User->count(['acc'=>$_POST['acc']])>0){
    echo "0";
}else{
    echo "1";
    $User->save($_POST);
}
?>