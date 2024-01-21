const dateDetailsDiv = document.querySelectorAll('.details')

const checkClick = e => {
    e.target.closest('div').querySelector('.activated').classList.toggle('off');
}


dateDetailsDiv.forEach(element => element.addEventListener('click', checkClick))
