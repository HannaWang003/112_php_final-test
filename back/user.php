<style>
    fieldset{
        width:80%;
        padding:15px;
    }
    th{
        background:#eee;
    }
</style>

<fieldset>
    <legend>帳號管理</legend>
<form action="./api/del_user.php" method="post">
<table style="width:80%;margin:auto">
    <tr>
        <th>帳號</th>
        <th>密碼</th>
        <th>刪除</th>
    </tr>
    <?php
$users = $User->all();
foreach($users as $user){
    if($user['acc']!="admin"){
        ?>
 <tr>
        <td class="ct"><?=$user['acc']?></td>
        <td class="ct"><?=str_repeat("*",mb_strlen($user['pw']))?></td>
        <td class="ct">
            <input type="checkbox" name="del[]" value="<?=$user['id']?>">
        </td>
    </tr>

<?php
    }
}
    ?>
   
</table>
<div class="ct">
    <input type="submit" value="確定刪除">
    <input type="reset" value="清空選取">
</div>
</form>




<h1>新增會員</h1>
    <span style="color:red">請設定您要註冊的帳號及密碼(最長12個字元)</span>
<table>
    <tr>
        <td>帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="password" name='pw' id='pw' maxlength="12"></td>
    </tr>
    <tr>
        <td>確認密碼</td>
        <td><input type="password" name='pw2' id='pw2'></td>
    </tr>
    <tr>
        <td>信箱</td>
        <td><input type="password" name='email' id='email'></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="註冊" onclick="reg()">
            <input type="button" value="清除" onclick="reset()">
        </td>
        <td>
        </td>
    </tr>
</table>
</fieldset>
<script>
    function reg(){
       let acc = $('#acc').val();
        let pw =$('#pw').val();
       let pw2= $('#pw2').val();
        let email = $('#email').val();
        if(acc!="" && pw!="" && pw2!="" && email!=""){
            if(pw==pw2){
 $.post('./api/reg.php',{acc,pw,email},function(res){
            switch(res){
                case "0":
                    alert('帳號重覆');
                break;
                case "1":
                    alert('註冊成功,請登入');
                    location.href="?do=login";
            }  
            })
            }else{
                alert('密碼不一致，請重新輸入');
            }
           

        }
        else{
            alert("欄位不可空白")
        }

    }
    function reset(){
        $('#acc').val("");
        $('#pw').val("");
        $('#pw2').val("");
        $('#email').val("");
    }
</script>