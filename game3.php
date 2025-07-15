<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>같은 그림 찾기</title>
    <style>
        @font-face {
            font-family: '양진체';
            src: url('https://fastly.jsdelivr.net/gh/supernovice-lab/font@0.9/yangjin.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: '양진체', sans-serif;
        }

        .ti {
            font-size: 32px;
        }

        table {
            width: 35%;
            height: 35%;
        }

        td {
            position: relative;
            padding: 0;
        }

        .hidden {
            background-color:rgb(200, 164, 147);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            cursor: pointer;
        }

        .container {
            text-align: center;
        }

        .header {
            background-color: #DBC1AD ;
            padding : 10px;
            border-radius: 10px;
            width: 35%;
            margin: auto;
        }

        .revealed {
            z-index: 0;
            width: 100%;
            height: auto;
        }

        .qwe {
            margin: auto;
        }

        img {
            width: 50%;
            height: auto;
            object-fit: cover;
        }

        .tb {
            border: 3px solid black;
            margin: auto;
            border-radius: 5px;
        }
    </style>
    <script>
        const images = [
            "card1.jpg", "card1.jpg",
            "card2.jpg", "card2.jpg",
            "card3.jpg", "card3.jpg",
            "card4.jpg", "card4.jpg",
            "card5.jpg", "card5.jpg",
            "card6.jpg", "card6.jpg",
            "card7.jpg", "card7.jpg",
            "card8.jpg", "card8.jpg"
        ];

        let firstCard = null;
        let secondCard = null;
        let lockBoard = false;
        let timer = null;
        let time = 60;

        function shuffle(array) {
            for (let i = 0; i < array.length; i++) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function restart() {
            location.reload(true);
        }

        function start() {
            shuffle(images);
            time = 60; 
            clearInterval(timer); 
            timer = setInterval(updateTimer, 1000);

            let table = `<table class="tb">`;
            for (let row = 0; row < 4; row++) {
                table += '<tr class="qwe">';
                for (let col = 0; col < 4; col++) {
                    let index = row * 4 + col;
                    table += `
                        <td class="tb">
                            <img src="./images/${images[index]}" alt="card" class="revealed">
                            <div class="hidden" onclick="flipCard(this)"></div>
                        </td>`;
                }
                table += '</tr>';
            }
            table += '</table>';

            document.body.innerHTML = `
                <div class="container">
                    <div class="header">
                        <div class="ti">같은 그림 찾기</div>
                    <div id="timer">남은 시간: 60초</div>
                    </div>
                    <input type="button" name="restart" value="재시작" onclick="restart()">
                    <div class="container">${table}</div>
                </div>`;
        }

        function updateTimer() {
            time--;
            document.getElementById('timer').textContent = `남은 시간: ${time}초`;
            if (time <= 0) {
                clearInterval(timer);
                Swal.fire({
                    title: "실패했습니다!",
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url(/images/trees.png)",
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("/images/nyan-cat.gif")
                        left top
                        no-repeat`,
                    confirmButtonText: '다시 시작하기'
                }).then(() => {
                    restart();
                });
            }
        }

        function flipCard(card) {
            if (lockBoard || card === firstCard) return;

            card.style.display = "none";

            if (!firstCard) {
                firstCard = card;
            } else {
                secondCard = card;
                checkMatch();
            }
        }

        function checkMatch() {
            lockBoard = true;

            const firstImage = firstCard.previousElementSibling.src;
            const secondImage = secondCard.previousElementSibling.src;

            if (firstImage === secondImage) {
                firstCard.style.display = "none";
                secondCard.style.display = "none";
                resetCards(true);
            } else {
                setTimeout(() => {
                    firstCard.style.display = "block";
                    secondCard.style.display = "block";
                    resetCards(false);
                }, 1000);
            }
            checkGameComplete();
        }

        function resetCards(match) {
            if (match) {
                firstCard.onclick = null;
                secondCard.onclick = null;
            }
            firstCard = null;
            secondCard = null;
            lockBoard = false;
        }

        function checkGameComplete() {
            const hiddenCards = document.querySelectorAll('.hidden');
            const unmatched = Array.from(hiddenCards).filter(card => card.style.display !== 'none');

            if (unmatched.length === 0) {
                clearInterval(timer);
                Swal.fire({
                    title: "축하합니다! 게임을 완료하셨습니다!",
                    icon: "success",
                }).then(() => {
                    location.href = './clear3.php';
                });
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="ti">같은 그림 찾기</div>
            <input type="button" name="start" value="시작" onclick="start()">
            <input type="button" name="restart" value="재시작" onclick="restart()">
            <input type="button" name = "go_mainpage" value = "뒤로가기" onclick = "location.href = '메인화면.php'">
        </div>
    </div>
</body>

</html>
