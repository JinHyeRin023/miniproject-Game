<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>치매예방게임</title>
        <!-- 메인화면php -->
        <link rel="stylesheet" href="mainpage.css">
    </head>
    <body>
        <h1>치매 예방 게임</h1>
        <form action="로그인2.php" method="post" >
            <section>
                <?php
                session_start();
                if(isset($_SESSION['userid'])) {
                    $userid = $_SESSION['userid'];
                    echo "<div id = login>
                            <article id='id'>
                                $userid 님 환영합니다.
                            </article>
                            <article id='id'>
                                <input type='submit' value = 'logout' name = logout;>
                            </article>
                         </div>";
                }else{
                    echo '<div id = login>
                    <article id="id">
                        아이디 <input type="text" name="userid">
                    </article>
                    <article id="pw">
                        비밀번호 <input type="text" name="userpw">
                    </article>
                    <article id="login">
                        <input type="submit" value="login"> <!--로그인 버튼-->
                        <a href="회원가입.html" id = "account">회원가입</a>
                    </article>
                           </div>';
                }
                ?>
                <?php
                    // $dbconn = mysqli_connect('localhost','rlatjdso','haha!5463');
                    // mysqli_select_db($dbconn, 'rlatjdso');

                    $dbconn = mysqli_connect('localhost','root','');
                    mysqli_select_db($dbconn, 'project');
                ?>
                <div class = "rank">
                    <?php
                        
                        $game1 = 0;
                        $query_game1score = "select uid, game1score from user_info order by game1score desc;";
                        $game1score_result = mysqli_query($dbconn, $query_game1score);
                        while($row1 = mysqli_fetch_row($game1score_result))
                        {
                            if($game1 < 3)
                            {
                                $game1++;
                                echo "<div class='rank_item'>$row1[0] - $row1[1]</div>";
                            }
                            else
                            {
                                break;
                            }
                        }
                    ?>
                </div>
                
                <div class = "rank">
                    <?php
                        $game2 = 0;
                        $query_game2score = "select uid, game2score from user_info order by game2score desc;";
                        $game2score_result = mysqli_query($dbconn, $query_game2score);
                        while($row2 = mysqli_fetch_row($game2score_result))
                        {
                            if($game2 < 3)
                            {
                                $game2++;
                                echo "<div class='rank_item'>$row2[0] - $row2[1]</div>";
                            }
                            else
                            {
                                break;
                            }
                        }
                    ?>
                </div>
                    
                <div class = "rank">
                    <?php
                        $game3 = 0;
                        $query_game3score = "select uid, game3score from user_info order by game3score desc;";
                        $game3score_result = mysqli_query($dbconn, $query_game3score);
                        while($row3 = mysqli_fetch_row($game3score_result))
                        {
                            if($game3 < 3)
                            {
                                $game3++;
                                echo "<div class='rank_item'>$row3[0] - $row3[1]</div>";

                            }
                            else
                            {
                                break;
                            }
                        }
                        mysqli_close($dbconn);
                    ?>
                </div>
                    
                </table>
                <table id="games">
                    <td id="game1">
                        <a href="game1.php">
                            <img src="글자색 맞추기 썸네일.webp" alt="">
                        </a>
                    </td>
                    <td id="game2">
                        <a href="game2.php">
                        <img src="단어 맞추기 썸네일.png" alt="">
                        </a>
                    </td>
                    <td id="game3">
                        <a href="game3.php">
                            <img src="같은 그림 찾기 썸네일.png" alt="">
                        </a>
                    </td>
                </table>
            </section>
        </form>
    </body>
</html>