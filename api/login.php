<?php
include_once "db.php";
    if(($User->count(['acc'=>$_POST['acc']]))<=0){
        echo "0";
    }
    else{
        if(($User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]))<=0){
            echo "1";
        }
        else{
            if($_POST['acc']=='admin'){
              echo "2";  
            }
            else{
                echo "3";
            }
            
            $_SESSION['user']=$_POST['acc'];
        }
    }


?>