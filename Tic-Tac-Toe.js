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