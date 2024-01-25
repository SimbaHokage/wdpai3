const hamburgerButton = document.querySelector('.hamburger')
const linksDiv = document.querySelector('.links')
const divText = document.querySelector('.text')
const divImg = document.querySelector('.img-phone')
const header = document.querySelector('.phone')



const addActive = () => {
    hamburgerButton.classList.toggle('is-active')
    header.classList.toggle('phone--active')
    divImg.classList.toggle('img-phone--active')
    linksDiv.classList.toggle('links--active')
}





hamburgerButton.addEventListener('click', addActive);