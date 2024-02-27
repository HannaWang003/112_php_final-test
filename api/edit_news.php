<?php
include_once "db.php";
// dd($_POST);
// exit();
if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del']))
            $News->del($id);
        else{
            $news = $News->find($id);


        }
    }
    to("../back.php?do=news");
}
else{
    $_POST['good']=0;
    $_POST['sh']=1;
    $News->save($_POST);
}


?>