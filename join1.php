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
        <h1>회원 가입</h1>

        <form action = "./join1_process.php" method = "post"><br>
            이름: <input type = "text" name = 'uname'><br>
            전화: <input type = "tel" name = 'p_num'><br>
            성별: <input type = "radio" name = 'gender' value = 'female' checked>여성
                 <input type = "radio" name = 'gender' vALUE = 'male'>남성

                 <br>
            생년월일: <input type = "date" name = 'birth'><br>
            <input type = "submit" value = "등록">
        </form>
    </body>
</html>