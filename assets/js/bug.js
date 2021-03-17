
// Counter
let counterStart = 0;
let counter = document.querySelector('#points');
let indexNUmber;
let value;

// Game
// Fetch POST checkAnswer

function checkAnswer(e){
    const API_ARRAY_URL = '/php/array.php';

    let field_id = e.target.id;
    let split = field_id.split('|');
    let datacombi = {
        value: e.target.value,
        indexNumber: split[1],
    }

    fetch(API_ARRAY_URL, {
    method: 'POST', 
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({datacombi})
    })
    .then(res => res.json())
    .then(res => {
        // hier müsste ich jetzt doch if else success true oder false machen!?
        // compare(indexNumber, value);
        // storeAnswer(indexNumber, value);
        console.log (res)
    });
}


// Fetch POST StoreAnswer

    function storeAnswer(value){
    const modal = new bootstrap.Modal(document.querySelector('.modal'));
    const API_POST_URL = '/php/post.php';

    fetch(API_POST_URL, {
    method: 'POST', 
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({answer:value})
    })
    .then(res => res.json())
    .then(res => {
        console.log (res)
        modal.show();
    });
}


function goodBye(){
    extraPoint.classList.remove('switch');
    extraPoint.classList.add('hide');
    kiss.classList.add('grid');
}

function compare(indexNumber, e){
    let correctAnswer = data[indexNumber].answer;
    let input = e.target.value;

    let inputField = e.target;

    if (correctAnswer == input){
        inputField.style.backgroundColor = '#80db90';
        counterStart++;
        counter.innerHTML = counterStart;
        if (indexNumber == 16){
            counterStart = counterStart + 9;
            counter.innerHTML = counterStart;
            goodBye();
        }
    } else {
        inputField.style.backgroundColor = '#F08080';
        counterStart--;
        counter.innerHTML = counterStart;
    }
};

document.querySelectorAll('input').forEach((answerField) => {
    answerField.addEventListener('change', checkAnswer);
    answerField.addEventListener('click', (e) => {
        answerField.value = "";
})
});





// Start

const game = document.querySelector('.game');
const game_part_one = document.querySelector('.game_part_one');
const game_part_two = document.querySelector('.game_part_two');
const extraPoint = document.querySelector('.extraPoint');
const startbildschirm = document.querySelector('.startbildschirm');
const buttonStart = document.querySelector('button');
const buttonMore = document.querySelector('#more');
const heart = document.querySelector('#container-heart');
const buttonExtraPoints = document.querySelector('#morePoints');
const kiss = document.querySelector('.kiss')


// Buttons

buttonStart.addEventListener('click', (e)=>{
    startbildschirm.classList.add('hide');
    game_part_one.classList.add('switch');
    heart.classList.add('switch');
});


buttonMore.addEventListener('click', (e)=>{
    game_part_one.classList.remove('switch');
    game_part_one.classList.add('hide');
    game_part_two.classList.add('switch');
});

buttonExtraPoints.addEventListener('click', (e)=>{
    game_part_two.classList.remove('switch');
    game_part_two.classList.add('hide');
    extraPoint.classList.add('switch')
});


