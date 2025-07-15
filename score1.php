<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $uid = $_SESSION['userid'];

    // $dbconn = mysqli_connect('localhost','rlatjdso','haha!5463');
    // mysqli_select_db($dbconn, 'rlatjdso');

    $dbconn = mysqli_connect('localhost','root','');
    mysqli_select_db($dbconn, 'project');
    $update_query = "UPDATE user_info SET game1score = IFNULL(game1score, 0) + 100 WHERE uid='$uid'";

    if (mysqli_query($dbconn, $update_query)) {
        header("Location: ./game1.php");
        exit();
    } else {
        echo "점수 업데이트에 실패했습니다.";
    }

    mysqli_close($dbconn);
?>
</body>
</html>
