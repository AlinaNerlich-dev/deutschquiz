// const feld1 = document.getElementById('feld1');
// const feld2 = document.getElementById('feld2');
// const feld3 = document.getElementById('feld3');
// const feld4 = document.getElementById('feld4');
// const feld5 = document.getElementById('feld5');
// const feld6 = document.getElementById('feld6');
// const feld7 = document.getElementById('feld7');
// const feld8 = document.getElementById('feld8');
// const feld9 = document.getElementById('feld9');
// const feld10 = document.getElementById('feld10');
// const feld11 = document.getElementById('feld11');
// const feld12 = document.getElementById('feld12');
// const feld13 = document.getElementById('feld13');
// const feld14 = document.getElementById('feld14');
// const feld15 = document.getElementById('feld15');



//     for(let i=0; i<16; i++){
//     if (userInput.value == data[i].answer) {
        
//         userInput.style.backgroundColor = 'green'
//         alert ('Das war richtig!!!')
//     } else {
//         userInput.style.backgroundColor = 'red'
//         alert ('Versuche es noch einmal')
//     }
// };

function checkAnswer(){
    let userInput = document.querySelector('input').value;
        console.log(userInput)
};

document.querySelectorAll('input').forEach((answerField) => {
    answerField.addEventListener('change', checkAnswer)
});