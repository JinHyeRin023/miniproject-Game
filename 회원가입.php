<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>치매예방게임</title>
        <!-- 회원가입 php -->
        <style>

        </style>
    </head>
    <body>
        <?php
            $userid = $_POST['userid']; //test1
            $userpw = $_POST['userpw']; //test1

            // $dbconn = mysqli_connect('localhost','rlatjdso','haha!5463');
            // mysqli_select_db($dbconn, 'rlatjdso');

            $dbconn = mysqli_connect('localhost','root','');
            mysqli_select_db($dbconn, 'project');
          
            $query_select = "select * from user_info where uid ='$userid';";
            $result_select = mysqli_query($dbconn, $query_select);
            $row = mysqli_fetch_array($result_select);
            // echo $row['uid'];
            if($userid == $row['uid'])
            {
                echo "<script>alert('아이디가 중복되었으니 입력 구다사이~')</script>";
                echo "<script>location.replace('회원가입.html')</script>";
            }
            else
            {
                echo "success";
                $query_insert = "insert into user_info values ('$userid','$userpw',0,0,0);";
                $result_insert = mysqli_query($dbconn, $query_insert);
                echo "<script>location.replace('메인화면.php')</script>";
            }
            
            mysqli_close($dbconn);
        ?>  
    </body>
</html>