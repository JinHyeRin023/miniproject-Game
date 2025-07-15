<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>결과 창</title>
</head>
<body>
<?php
    $uid = $_SESSION['userid'];
    // $dbconn = mysqli_connect('localhost','rlatjdso','haha!5463'); //닷홈 서버에 연결할 때
    // mysqli_select_db($dbconn, 'rlatjdso');

    $dbconn = mysqli_connect('localhost','root',''); //로컬 서버에 연결할 때
    mysqli_select_db($dbconn, 'project');
    
    $update_query = "UPDATE user_info SET game2score = IFNULL(game2score, 0) + 100 WHERE uid='$uid'";

    if (mysqli_query($dbconn, $update_query)) {
        header("Location: ./game2.php");
        exit();
    } else {
        echo "점수 업데이트에 실패했습니다.";
    }

    mysqli_close($dbconn);
?>
</body>
</html>
