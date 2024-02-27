<style>
    fieldset{
        width:80%;
        padding:15px;
    }
</style>
<fieldset>
    <legend>會員註冊</legend>
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