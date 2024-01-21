// let $nameOfExerciseInput; // input nazwa ćwiczenia
// let $rep;
// let $set;
// let $rpe;
// let $addBtn;
let $showAddExercisePanelButton;
let $newExercise; // nowo dodany LI, nowe ćwiczenie
let $allExercises; // lista wszystkich dodanych LI
let $alertParagraph;
let $ulList;
let $leftContainer;
let $rightContainer;

const main = () => {
    prepareDOMElements();
    prepareDOMEvents();
}

const prepareDOMElements = () => {
    // $nameOfExerciseInput = new FormData(document.querySelector('.name-of-exercise-input'))
    // $rep = document.querySelector('.reps-input')
    // $set = document.querySelector('.sets-input')
    // $rpe = document.querySelector('.rpe-input')
    // $addBtn = document.querySelector('.add-exercise')
    $showAddExercisePanelButton = document.querySelector('.add')
    $alertParagraph = document.querySelector('.alert')
    $ulList = document.querySelector('.list')
    $leftContainer = document.querySelector('.left-container')
    $rightContainer = document.querySelector('.right-container')
}

const prepareDOMEvents = () => {
    // $addBtn.addEventListener('click', addNewTask)
    $showAddExercisePanelButton.addEventListener('click', checkClick)
}

// const addNewTask = () => {
//     if($nameOfExerciseInput.value.trim() === '' || $rep.value.trim() === '' || $set.value.trim() === '') {
//         $alertParagraph.textContent = 'Check fields and pass proper values. (Reps, sets and rpe are in number type.)'
//     } else {
//         createTask($rep.value, $set.value, $rpe.value, $nameOfExerciseInput.value)
//         $nameOfExerciseInput.value = ''
//         $rep.value = ''
//         $set.value = ''
//         $rpe.value = ''
//         $alertParagraph.textContent = ''
//     }
// }

// const createTask = (rep, set, rpe, nameOfExerciseInput) => {
//     const liElement = document.createElement('li')
//     if(rpe.trim() === '') {
//         liElement.textContent = `${nameOfExerciseInput} ${set} x ${rep}`
//     } else {
//         liElement.textContent = `${nameOfExerciseInput} ${set} x ${rep} RPE: ${rpe}`
//     }
//
//     createTools(liElement)
// }

// const createTools = element => {
//     $ulList.append(element)
// }

// const enterExercise = (e) => {
//     if(e.key === 'Enter' && e.code === 'Enter') {
//         addNewTask()
//     }
// }

const checkClick = e => {
    $leftContainer.classList.toggle('left-container-disactive')
    $rightContainer.classList.toggle('right-container-disactive')
}

document.addEventListener('DOMContentLoaded', main);