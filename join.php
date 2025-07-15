<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>회원 가입</title>
    </head>
    <body>
        <a href = "./join.php"><b><u>회원가입</u></b></a>
        <a href = "./login.php">로그인</a>
        <br><br>
        <h1>회원 가입</h1>

        <form action = "./join_process.php" method = "post" enctype = 'multipart/form-data'><br>
            아이디: <input type = "text" name = 'uid'><br>
            비밀번호: <input type = "password" name = 'upw'><br>
            이름: <input type = "text" name = 'uname'><br>
            전화번호: <input type = "tel" name = 'phone'><br>
            사진: <input type = "file" name = 'pic'><br><br>
            <input type = "submit" value = "회원가입">
        </form>
    </body>
</html>