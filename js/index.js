function showSearch() {
    let frm = document.getElementById('srch');
    frm.style.display = "block";
}

function lockID() { //вывести в подсказку занятые ID (temp0)
    let lockArray = document.getElementById('arr').getElementsByTagName('td'); 
    let xArr = [];

    for(let i = 0; i < lockArray.length; i = i + 1) {
        xArr[i] = lockArray[i].textContent;
    }

    let uniqSet = [... new Set(xArr)];
    let nArr = [...uniqSet];

    document.getElementById('lockedID').setAttribute('data-tooltip', 'Заняты: ' + nArr);
}

function checkValue() {
    let lockArray = document.getElementById('arr').getElementsByTagName('td'); 
    let xArr = [];

    for(let i = 0; i < lockArray.length; i = i + 1) {
        xArr[i] = lockArray[i].textContent;
    }

    let uniqSet = [... new Set(xArr)];
    let nArr = [...uniqSet]; //отсортированный массив
    let id = document.getElementsByClassName('inputNew');
    let input = id[0].value;
    
    for(let i = 0; i < nArr.length; i = i + 1) {
        if(input == nArr[i]) {id[0].value = ""; alert("Такой инвентарный номер уже существует.");}
    }
}