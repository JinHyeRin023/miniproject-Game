<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <title>글자 색 맞추기 게임</title>

        <style>

            body{text-align: center;}

            button{text-align: center; margin-left: auto; margin-right: auto;}

            table{margin-left: auto; margin-right: auto;}            
            
            #title{font-size: 35px; font-weight: 600;}

            #score, #time, #questionleft, #button2, #answers, #inf{font-size: 20px;}

            #start{background-color: rgb(242, 242, 242); font-size: 23px; font-weight: 500; padding: 100px; width: 900px; height: 400px; margin-left: auto; margin-right: auto; border-radius: 1em;}

            #button1{background-color: rgb(222, 222, 222); font-size: 25px; border-radius: 10px; padding: 10px 20px;}

            #button2{background-color: rgb(222, 222, 222); margin: 15px; font-size: 25px; width: 120px; height: 60px; border-radius: 10px;}

            #output{font-size: 70px; font-weight: 600;}

            .stop{display: 'none'};

        </style>

    </head>

    <body>
        <br><br>
        <div id = 'title'>
        <h1>글자 색상 맞추기 게임</h1><br>
        </div>

        <div id = 'start'>
        <div id = 'd'>   
                <br>화면에 나타난 글자 색상과 일치하는 박스를 선택하는 게임입니다.<br>
                화면에 나타난 글자와 실제 색상은 다를 수 있으니 주의 깊게 살펴본 후 선택하세요.<br><br><br>
                제한시간은 1분, 총 20문제입니다.<br>
                최종점수가 1000점 이상이면 게임 클리어입니다!<br><br><br><br>
                <input id = 'button1' type = 'button' value = '시작하기' onclick = 'gamestart()'>&nbsp;&nbsp;
                <input id = 'button1' type = 'button' value = '돌아가기' onclick = 'location.href = "메인화면.php"'>
            </div>

        <div id = 'inf'>
            점수: <span id = 'score'>0</span>점&nbsp;&nbsp;
            남은 시간: <span id = 'time'>60</span>초&nbsp;&nbsp;
            문제: <span id = 'questionleft'>1</span>/20
        </div>
        
        <!-- 문제 화면 -->
        <p id = 'output'></p>

        <!-- 답안 선택 -->
        <div id = btn>
            <table>
                <tr>
                    <td>
                    <input id = 'button2' class = 'red' type = 'button' value = '빨강' onclick = 'answers(this.className)'>
                    <input id = 'button2' class = 'blue' type = 'button' value = '파랑' onclick = 'answers(this.className)'>
                    <input id = 'button2' class = 'yellow' type = 'button' value = '노랑' onclick = 'answers(this.className)'> 
                    </td>
                </tr>
                <tr>
                    <td>
                    <input id = 'button2' class = 'green' type = 'button' value = '초록' onclick = 'answers(this.className)'>
                    <input id = 'button2' class = 'purple' type = 'button' value = '보라' onclick = 'answers(this.className)'>
                    <input id = 'button2' class = 'black' type = 'button' value = '검정' onclick = 'answers(this.className)'>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        <br>
        <br>

        <script>
            let score = 0;
            let time = 60;
            let timer = null;
            let questionleft = 1;

            let scoreDisplay = document.getElementById('score');
            let timeDisplay = document.getElementById('time');
            let questionleftDisplay = document.getElementById('questionleft');

            let wordIndex;
            let colorIndex;
        
            let word;
            let color;

            output.style.display = 'none';
            btn.style.display = 'none';
            inf.style.display = 'none';

            // 게임 시작

            function gamestart() {
                document.getElementById('d').style.display = 'none';
                output.style.display = 'block';
                btn.style.display = 'block';
                inf.style.display = 'block';

                score = 0;
                time = 60;
                questionleft = 1;
                question();
                timecount();
            }

            // 타이머 설정
            function timecount() {
                const timer = setInterval(() => {
                time--;
                timeDisplay.textContent = time;
                if (time <= 0 || questionsleft > 21) {
                    clearInterval(timer);
                    gameover();
                }
            } , 1000)
            }


            // 랜덤 글자, 색상 설정

            let words  = ['빨강', '파랑', '노랑', '초록', '보라', '검정'];
            let colors = ['red', 'blue',  'yellow', 'green', 'purple', 'black'];
 
            function RandomIndex(max) {
                return Math.floor(Math.random()*max);
            }
            function question() {
                wordIndex = RandomIndex(words.length);
                colorIndex = RandomIndex(colors.length);
            
                word = words[wordIndex];
                color = colors[colorIndex];

                let output = document.getElementById('output');
                output.textContent = word;
                output.style.color = color;
            } 
            document.getElementById("output").onload(question);

            // 답안 버튼
           function answers(check) {

               if(color == check) {
                    score += 100;
                    questionleft += 1;
                    question();
                    
               }else{
                    score -= 50;
                    questionleft += 1;
                    question();
               }
               scoreDisplay.innerHTML = score;
               questionleftDisplay.innerHTML = questionleft;

                if ( questionleft < 21 && time > 0) {
                question();
                }else {
                gameover();
                }
            }

            // 게임종료 화면

            function gameover() {
                
                title.style.display = 'none';
                output.style.display = 'none';
                btn.style.display = 'none';
                inf.style.display = 'none';
                start.style.display = 'none';

                let restart = document.createElement("div");
                restart.style.fontSize = '45px';
                restart.style.fontWeight = '600';
                restart.style.lineHeight = '75px';

                const restartButton = document.createElement("button");
                restartButton.style.display = 'block'
                restartButton.style.fontSize = '25px';
                restartButton.style.borderRadius = '10px';
                restartButton.style.padding = '10px 20px';
                restartButton.textContent = '다시하기';
                restartButton.onclick = () => location.reload();

                // 1000점 이상, DB데이터
                if(score >= 1000) {
                restart.innerHTML = '<br><br>게임 클리어!<br>클리어를 축하합니다!<br><br>잠시 후 첫화면으로 돌아갑니다...'; 
                document.body.appendChild(restart);
                //document.body.appendChild(restartButton);
                setTimeout(() => {
                    location.href = './score1.php';
                }, 3000);

                // 1000점 이하
                }else {
                restart.innerHTML = '<br><br>게임오버!<br>다시할까요?<br><br>';
                document.body.appendChild(restart);
                document.body.appendChild(restartButton);
            }
            }
        </script>
    </body>
</html>