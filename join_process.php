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
        <h1>가입 완료</h1>

        <?php

        $uid = $_POST['uid'];
        $upw = $_POST['upw'];
        $uname = $_POST['uname'];
        $phone = $_POST['phone'];

        $dir = './image/';
        $filename = basename($_FILES['pic']['name']);
        $imagepath = $dir.$filename;

        move_uploaded_file($_FILES['pic']['tmp_name'], $imagepath);

        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'login');

        $query = "insert into member values(null, '$uid', '$upw', '$uname', '$phone', '$imagepath')";
        $result = mysqli_query($dbcon, $query);

        if ($result){
            echo "$uname 님의 가입이 완료되었습니다.";
        }else{
            echo "예기치 못한 오류로 가입 실패하였습니다. 다시 입력해주시기 바랍니다.";
        }
        mysqli_close($dbcon);
        ?>
    </body>
</html>