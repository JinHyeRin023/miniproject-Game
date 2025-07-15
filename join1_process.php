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

        <?php
        $uname = $_POST['uname'];
        $p_num = $_POST['p_num'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];

        //DB연결
        $dbcon = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbcon, 'web');

        //질의전송
        $query = "insert into members values(null, '$uname', '$p_num', '$gender', '$birth')";
        $result = mysqli_query($dbcon, $query);
        /*while($row = mysqli_fetch_array($result)){
            echo $row['uname'];
            echo $row['p_num'];
            echo $row['gender'];
            echo $row['birth'];
        }*/
        
        if($result){
            echo "$uname 님의 정보가 잘 입력되었습니다, 환영합니다.";
        }else{
            echo "알 수 없는 오류가 발생하여 가입 실패하였습니다.";
        }

        //DB연결해제
        mysqli_close($dbcon);
        ?>
        <br>
        <a href = "./join1.php">뒤로가기</a>
    </body>
</html>