<style>
    fieldset{
        width:80%;
        padding:15px;
    }
</style>
<fieldset>
    <legend>會員登入</legend>
<table>
    <tr>
        <td>帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="password" name='pw' id='pw'></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="登入" onclick="login()">
            <input type="button" value="清除" onclick="reset()">
        </td>
        <td>
            <a href="?do=forget">忘記密碼</a> |
            <a href="?do=reg">尚未註冊</a>
        </td>
    </tr>
</table>
</fieldset>
<script>
    function login(){
    let acc = $('#acc').val();
    let pw=$('#pw').val();
$.post('./api/login.php',{acc,pw},function(res){
switch(res){
    case "0":
        alert("查無帳號");
        reset();
        break
    case "1":
        alert("密碼錯誤");
        break;
    case "2":
        alert("登入成功");
        location.href="back.php";
        break;
    case "3":
        alert("登入成功");
        location.href="?do=main";
}
})

    }
    function reset(){
        $('#acc').val("");
        $('#pw').val("");
    }
</script>