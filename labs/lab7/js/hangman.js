var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var positions = new Array;
var words = [{word: "snake", hint: "reptile"},
            {word: "monkey", hint: "mammal"},
            {word: "beetle", hint: "insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                
startGame();

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}

function pickWord() {
    var randomInt = Math.floor( Math.random() * words.length );
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard() {
    $("#word").empty();
    
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("<br />");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>")
}

function initBoard() {
    for (var i=0; i < selectedWord.length; i++ ) {
        board += "_";
    }
    console.log(board);
}

function createLetters(){
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter' id='"+letter+"'>" + letter + "</button>");
    }
}

function checkLetter(letter) {
    for (var i=0; i < selectedWord; i++) {
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        if(!board.includes('_')) {
            endGame(true);
        }
        
    } else {
        remainingGuesses--;
        $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png" );
    }
    
    if(remainingGuesses <= 0) {
        endGame(false);
    }
}


function updateWord(positions,letter) {
    for (var pos of positions) {
        board = replaceAt(board,pos,letter)
    }
    updateBoard();
}

function replaceAt(str,index,value) {
    return str.substr(0,index) + value + str.substr(index, value.length); 
}


function updateImage() {
    //document.getElementById("man").innerHTML = "<img src='img/stick_5.png' >";
    $("img").attr("src","img/stick_0.png");
}


function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses)+ ".png");
}

function endGame(win) {
    $("#letters").hide();
    
    if(win) {
        $('#won').show();
    } else {
        $('#won').show();
    }
}

function disableButton(btn) {
    btn.prop("disabled",true);
    btn.attr("class", "btn btn-danger")
}

//events


$(".letter").click(function() {
   checkLetter($(this).attr("id"));
   disableButton($(this));
})

$(".replayBtn").on("click", function () {
    location.reload();
})
