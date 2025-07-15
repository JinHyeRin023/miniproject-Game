<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>쿠키 세션</title>
    </head>
    <body>
        <?php
        session_start();
        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            echo "welcome! $userid";
        }else{
            echo "Access Denied";
        }
        ?>
    </body>
</html>