const hamburgerButton = document.querySelector('.hamburger')
const linksDiv = document.querySelector('.links')
const divText = document.querySelector('.text')
const divImg = document.querySelector('.img-phone')
const body = document.querySelector('body');
const submitButton = document.querySelector('.add-training-button');

const addActive = () => {
    hamburgerButton.classList.toggle('is-active')
    body.classList.toggle('body--active')
    divImg.classList.toggle('img-phone--active')
    linksDiv.classList.toggle('links--active')
    submitButton.classList.toggle('add-training-button--active')
}

hamburgerButton.addEventListener('click', addActive);