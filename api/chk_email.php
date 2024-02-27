<?php
include_once "db.php";
$res = $User->count(['email'=>$_POST['email']]);
if($res==0){
    echo $res;
}else{
    echo $User->find(['email'=>$_POST['email']])['pw'];
}


?>