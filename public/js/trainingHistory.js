const dateDetailsDiv = document.querySelectorAll('.details')
const difficultButton = document.querySelectorAll('.difficult')

const checkClick = e => {
    e.target.closest('div').querySelector('.activated').classList.toggle('off');
}

const checkDiffClick = e => {
    const date = e.target.closest('div').querySelector('.date').textContent
    let dateObj = {
        "date": date
    }
    fetchDateToPHP(dateObj)
    e.target.closest('div').classList.add("off");
}

const fetchDateToPHP = (dateObj) => {
    fetch("getData", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(dateObj)
    }).then(function(response) {
        return response.text();
    }).then((projects) => {
        console.log(projects)
    })


}


dateDetailsDiv.forEach(element => element.addEventListener('click', checkClick))
difficultButton.forEach(element => element.addEventListener('click', checkDiffClick))
