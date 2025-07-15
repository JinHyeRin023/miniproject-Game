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

        <?php
        $uname = $_POST['uname'];
        $gender = $_POST['gender'];

        //DB연결
        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'web');

        //질의전송
        if(!$uname && $gender == 'all'){
            $query = "select * from members";
        }else if ($uname && $gender == 'all'){
            $query = "select * from members where uname like '%$uname%'";
        }else if ($uname && $gender != 'all'){
            $query = "select * from members where gender = '$gender'";
        }else{
            $query = "select * from members where uname like '%$uname%' && gender = '$gender'";
        }
        $result = mysqli_query($dbcon, $query);
        while($row = mysqli_fetch_array($result)){
            echo "이름: ".$row['uname'].'<br>';
            echo "전화: ".$row['p_num'].'<br>';
            echo "성별: ".$row['gender'].'<br>';
            echo "생일: ".$row['birth'].'<br><br>';
        }

        //DB연결해제
        mysqli_close($dbcon);
        ?>
        <br>
        <a href = "./join1.php">뒤로가기</a>
    </body>
</html>