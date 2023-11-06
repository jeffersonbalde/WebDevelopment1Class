const cards = document.querySelectorAll(".card");
const resetButton = document.getElementById("reset-button");

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;

function flipCard() {
    if (lockBoard) return;
    if (this === firstCard) return;

    this.classList.add("flip");

    if (!hasFlippedCard) {
        hasFlippedCard = true;
        firstCard = this;
        return;
    }

    secondCard = this;
    checkForMatch();
}


function checkForMatch() {
    let isMatch = firstCard.dataset.card === secondCard.dataset.card;

    if (isMatch) {
        disableCards();
    } else {
        unflipCards();
    }
}


function disableCards() {
    firstCard.removeEventListener("click", flipCard);
    secondCard.removeEventListener("click", flipCard);

    resetBoard();
}


function unflipCards() {
    lockBoard = true;

    setTimeout(() => {
        firstCard.classList.remove("flip");
        secondCard.classList.remove("flip");

        resetBoard();
    }, 1000);
}


function resetBoard() {
    [hasFlippedCard, lockBoard] = [false, false]; 
    [firstCard, secondCard] = [null, null]; 

    
    if (document.querySelectorAll(".flip").length === cards.length) {
        // Reattach click event listeners to the cards
        cards.forEach(card => card.addEventListener("click", flipCard));
    }
}


function shuffle() {
    cards.forEach(card => {
        let randomPos = Math.floor(Math.random() * 8);
        card.style.order = randomPos;
    });
}


cards.forEach(card => card.addEventListener("click", flipCard));
resetButton.addEventListener("click", () => {
    cards.forEach(card => card.classList.remove("flip"));
    shuffle();
    setTimeout(() => resetBoard(), 1000); 
});


shuffle();