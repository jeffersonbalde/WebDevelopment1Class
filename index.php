<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&family=Poppins:wght@200;300;400;500;600;800;900&display=swap" rel="stylesheet">
    <title>Jefferson Balde</title>
    <style>
        
    body {
        background-color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        height: 80vh;
        border-radius: 10px;
        width: 1450px;
        margin: auto;
        background-color: #EFEEEE;
        padding: 20px;

        display: flex;
        justify-content: space-around; 

    }

    .title {
        color: #009DF7;
        text-align: center;
    }

    .first,
    .second,
    .third,
    .fourth,
    .five,
    .six {
        height: 590px;
        width: 250px;
        background-color: white;
        border-radius: 5px;
    }

    .second,
    .third {
        height: 300px;
        width: 290px;
    }

    .fourth {
        margin-top: -41px;
        width: 500px;
        height: 230px;
    }

    .six {
        height: 400px;
    }

    .first_container {
        display: flex;
        flex-direction: column;
        padding: 30px;
    }

    .first button {
        margin-top: 10px;
        height: 50px;
        background-color: #009DF7;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .three_div{
        width: 620px;

        display: flex;
        flex-wrap: wrap;
        gap: 39px;
    }

    /* TIC TAC TOE */
    .tic_tac_toe{
        font-size: 20px;
        text-align: center;
    }

    .board {
        display: flex;
        justify-content: center;
        margin: auto;
        width: 250px;
        flex-wrap: wrap;
        gap: 5px;
    }

    .board button{
        width: 70px;
        height: 70px; 

    }

    .score_board{
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: auto;
        text-align: center;
        margin-top: 20px;
    }

    #result {   
        text-align: center;
        margin-top: 10px;
    }

    .cell {
            width: 70px;
            height: 70px;
            font-size: 24px;
            border: 1px solid #000;
            cursor: pointer;
        }

    #board {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .winning-cell {
        background-color: lightgreen;
    }

    .score_div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }

    </style>

</head>
<body>
    <h1 class="title">Jefferson Balde </h1>

    <div class="container">
        
        <div class="first">
            <div class="first_container">
                <button>DASHBOARD</button>
                <button>ADD PATIENT</button>
                <button>ADD USER</button>
            </div>
        </div>

        <div class="three_div">
            <div class="second">
                
            </div>
            <div class="third"></div>
            <div class="fourth">
                
            </div>
        </div>

        <div class="five">

            <h1 class="tic_tac_toe">Tic-Tac-Toe</h1>

            <div id="board">
                <button class="cell" onclick="makeMove(0, 0)"></button>
                <button class="cell" onclick="makeMove(0, 1)"></button>
                <button class="cell" onclick="makeMove(0, 2)"></button>
                <button class="cell" onclick="makeMove(1, 0)"></button>
                <button class="cell" onclick="makeMove(1, 1)"></button>
                <button class="cell" onclick="makeMove(1, 2)"></button>
                <button class="cell" onclick="makeMove(2, 0)"></button>
                <button class="cell" onclick="makeMove(2, 1)"></button>
                <button class="cell" onclick="makeMove(2, 2)"></button>
            </div>

            <div class="score_div">

                <p>Score</p>
                <p class="">Player 1 X: <span class="player1_score" id="scoreX"> 0</span></p>
                <p class="">Player 2 O: <span class="player2_score" id="scoreO"> 0</span></p>

                <button id="resetBoardButton">Reset Board</button>
                <button id="resetScoreButton" onclick="resetScore()">Reset Score</button>
            </div>

            <div id="result"></div>
        </div>

        <div class="six"></div>

    </div>

    <script>
        let currentPlayer = 'X';
        let board = ['', '', '', '', '', '', '', '', ''];
        let scoreX = 0;
        let scoreO = 0;

        function makeMove(row, col) {
            const index = 3 * row + col;
            if (board[index] === '' && !checkWinner()) {
                board[index] = currentPlayer;
                document.getElementsByClassName('cell')[index].textContent = currentPlayer;
                document.getElementsByClassName('cell')[index].classList.add('flip');
                if (checkWinner()) {
                    document.getElementById('result').textContent = `Player ${currentPlayer} wins!`;
                    if (currentPlayer === 'X') {
                        scoreX++;
                        document.getElementById('scoreX').textContent = scoreX;
                    } else {
                        scoreO++;
                        document.getElementById('scoreO').textContent = scoreO;
                    }
                } else if (!board.includes('')) {
                    document.getElementById('result').textContent = "It's a draw!";
                } else {
                    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
                }
            }
        }

        function checkWinner() {
            // Define winning combinations
            const winPatterns = [
                [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
                [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
                [0, 4, 8], [2, 4, 6]             // Diagonals
            ];
            for (const pattern of winPatterns) {
                const [a, b, c] = pattern;
                if (board[a] && board[a] === board[b] && board[a] === board[c]) {
                    // Highlight the winning cells
                    document.getElementsByClassName('cell')[a].classList.add('winning-cell');
                    document.getElementsByClassName('cell')[b].classList.add('winning-cell');
                    document.getElementsByClassName('cell')[c].classList.add('winning-cell');
                    document.getElementById('board').style.pointerEvents = 'none'; // Disable further moves

                    return true; // Return true if a player has won
                }
            }

            return false; // Return false if there's no winner yet
        }

        function resetBoard() {
            board = ['', '', '', '', '', '', '', '', ''];
            document.getElementById('result').textContent = '';
            const cells = document.getElementsByClassName('cell');
            for (let cell of cells) {
                cell.textContent = '';
                cell.classList.remove('flip');
                cell.classList.remove('winning-cell');
            }
            document.getElementById('board').style.pointerEvents = 'auto';
            currentPlayer = 'X';
        }

        function resetScore() {
            scoreX = 0;
            scoreO = 0;
            document.getElementById('scoreX').textContent = '0';
            document.getElementById('scoreO').textContent = '0';
        }

        const resetBoardButton = document.getElementById('resetBoardButton');
        resetBoardButton.addEventListener('click', resetBoard);
    </script>
</body>
</html>