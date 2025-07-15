<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>치매예방게임</title>
        <!-- 로그인 php -->
    </head>
        <?php
            session_start();
            $user_id = $_POST['userid'];
            $user_pw = $_POST['userpw'];

            $logout = $_POST['logout'];

            // $dbconn = mysqli_connect('localhost','rlatjdso','haha!5463');
            // mysqli_select_db($dbconn, 'rlatjdso');

            $dbconn = mysqli_connect('localhost','root','');
            mysqli_select_db($dbconn, 'project');
          
            $query_select = "select * from user_info where uid = '$user_id' and upw = '$user_pw';";
            $select_result = mysqli_query($dbconn, $query_select);
            $row = mysqli_fetch_array($select_result);
            // echo $row['uid'];
            if($user_id == $row['uid'] && $user_pw == $row['upw'])
            {
                echo "로그인 성공";
                $_SESSION['userid'] = $row['uid'];
                echo $_SESSION['userid'];
                echo "<script>location.replace('메인화면.php')</script>";
            }
            else{
                echo "<script>alert('아이디 혹은 비밀번호가 틀렸으니 다시 입력 구다사이~')</script>";
                echo "<script>location.replace('메인화면.php')</script>";
            }
            
            if($logout)
            {
                unset($_SESSION['userid']);
            }
        ?>  
    </body>
</html> 