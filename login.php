<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>로그인</title>
    </head>
    <body>
        <a href = "./join.php">회원가입</a>
        <a href = "./login.php"><b><u>로그인</u></b></a>
        <br><br>
        <h1>로그인</h1>

        <form action = "./login_process.php" method = "post"><br>
            아이디: <input type = "text" name = 'uid'><br>
            비밀번호: <input type = "password" name = 'upw'><br><br>
            <input type = "submit" value = "로그인">
        </form>

        <?php
            session_start();

            $_SESSION['userid'] = 'login';
        ?>
    </body>
</html>