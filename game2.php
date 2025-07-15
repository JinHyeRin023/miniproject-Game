<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>단어 기억력 테스트</title>
    <style>
        #t1 {
            border-collapse: collapse;
            margin: 20px auto;
            text-align: center;
            width: 60%;
        }
        td {
            width: 100px;
            height: 50px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
            font-size: 1.2em;
        }
        #result, #timer {
            font-size: 1.5em;
            margin: 20px;
            text-align: center;
        }
        #f1 {
            display: none; 
            text-align: center;
        }
        #title{
            text-align: center;
        }
        body{
            background-color: lightgray;
        }
    </style>
</head>
<body>
<?php
$start_score = 200;
?>
    <h1 id="title">단어 기억력 테스트</h1>
    <div id="timer">남은 시간: 1:00</div>
    <table id="t1"></table>
    <form id="f1">
        <input type="text" id="answer" required >
        <button type="submit">정답</button>
    </form>
    <div id="result">점수: <?php echo $start_score; ?></div>

    <script>
        const words = ["연필","리튬","엔진","돼지","서울","한국","사자","삼성","칼슘","볼펜","포도","성묘",
                        "물통","법원","사과","국회","의자","바지","규칙","수박"];
        let score = <?php echo $start_score; ?>;
        let match_words = [];
        let word_position = [];
        let time_left = 60;  
        let timer_interval;

        const table = document.getElementById('t1');
        const result = document.getElementById('result');
        const form = document.getElementById('f1');
        const answer = document.getElementById('answer');
        const timer = document.getElementById('timer');

        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function create_table() {
            const total_cells = 20;
            shuffle(words);
            let index = 0;

            for (let row = 0; row < 5; row++) {
                const tr = document.createElement('tr');
                for (let col = 0; col < 4; col++) {
                    const td = document.createElement('td');
                    if (index < total_cells) {
                        td.textContent = words[index];
                        word_position.push({ word: words[index], element: td });
                    }
                    tr.appendChild(td);
                    index++;
                }
                table.appendChild(tr);
            }
        }

        function hide_words() {
            word_position.forEach(pos => pos.element.textContent = '');
            form.style.display = 'block';  
            start_timer();  
        }

        function show_word(word) {
            word_position.forEach(pos => {
                if (pos.word === word) {
                    pos.element.textContent = word;
                }
            });
        }

        function update_timer() {
            time_left--;
            const minutes = Math.floor(time_left / 60);
            const seconds = time_left % 60;
            timer.textContent = `남은 시간: ${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

            if (time_left <= 0) {
                clearInterval(timer_interval);
                end_game();
            }
        }

        function start_timer() {
            timer_interval = setInterval(update_timer, 1000);
        }

        function end_game() {
            form.remove();
            result.innerHTML = `<strong>게임 종료! 최종 점수: ${score}</strong>`;
            location.href = './score2.php';
        }

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const answer_word = answer.value.trim();
            answer.value = '';

            if (words.includes(answer_word) && !match_words.includes(answer_word)) {
                match_words.push(answer_word);
                score += 100;
                show_word(answer_word);
                result.textContent = `정답! 점수: ${score}`;
            } else {
                score -= 50;
                result.textContent = `오답! 점수: ${score}`;
            }
        });

        create_table();


        setTimeout(hide_words, 1000);
    </script>
</body>
</html>
