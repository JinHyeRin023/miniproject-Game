<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>회원 관리 시스템</title>
    </head>
    <body>
        <a href = "./join1.php"><b><u>회원가입</u></b></a>
        <a href = "./search1.php">회원검색</a>
        <br>
        <h1>회원 검색</h1>

        <form action = './search1_process.php' method = 'post'>
            이름: <input type = 'text' name = 'uname'><br>
            성별:
            <select name = 'gender' size = '1'>
                <option value = 'all'>모두다</option>
                <option value = 'female'>여성만</option>
                <option value = 'male'>남성만</option>
            </select>
        <br><br><br>
        <input type = 'submit' value = '검색'>
        </form>
    </body>
</html>