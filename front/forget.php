<style>
    fieldset{
        width:80%;
    }
</style>
<fieldset>
    <legend>忘記密碼</legend>
    <h3>請輸入信箱以查詢密碼</h3>
    <input type="text" name='email' id="email" style="width:60%;">
    <div id="result"></div>
    <button onclick="search()">尋找</button>
</fieldset>
<script>
    function search(){
        let email = $('#email').val();
        $.post('./api/chk_email.php',{email},function(res){
            if(res==0){
                $('#result').text("查無此資料");
            }else{
                $('#result').text(`你的密碼為:${res}`);
            }
        })
    }
</script>
