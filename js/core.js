let tds = document.getElementById('showDB').getElementsByTagName('td');
let today = new Date(); today.setDate(today.getDate()); console.log(today.getMonth()+1);

for(let i = 4; i < 39; i = i + 10) {
    let dateT = (tds[i].textContent).split('-');
    let amort = Number(tds[i+2].textContent);
    let year = Number(dateT[0]); let month = Number(dateT[1]);

    if(year + amort <= 2019 && month < (today.getMonth()+1) ) {
        tds[i+4].innerHTML = "Вышел срок амортизации";
    }
}