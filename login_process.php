<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>로그인</title>
    </head>
    <body>
        <a href = "./join.php"><b><u>회원가입</u></b></a>
        <a href = "./login.php">로그인</a>
        <br><br>
        <h1>로그인 완료</h1>

        <?php
        session_start();
        
        $uid = $_POST['uid'];
        $upw = $_POST['upw'];

        //DB연결, 선택
        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'login');

        //쿼리 전송
        $query = "select * from member where uid = '$uid'";
        $result = mysqli_query($dbcon, $query);

        $row = mysqli_fetch_array($result);

        if(isset($row['uid'])){
            if($upw == $row['upw']){
                $_SESSION['userid'] = $row['uid'];
                echo $_SESSION ['userid'].'님 반갑습니다.';
            }else{
                echo "패스워드 오류!";
            }
        }
        else{
            echo "해당 ID 존재하지 않음";
        }

        mysqli_close($dbcon);
        ?>

    </body>
</html>