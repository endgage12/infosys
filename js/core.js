let tds = document.getElementById('showDB').getElementsByTagName('td');
let tdsAm = document.getElementById('tableAmort').getElementsByTagName('td');
let today = new Date(); today.setDate(today.getDate()); console.log(today.getMonth()+1);

for(let i = 3; i <= 40; i = i + 10) {
    let dateT = (tds[i].textContent).split('-');
    let amort = Number(tds[i+3].textContent);
    let year = Number(dateT[0]); let month = Number(dateT[1]);
    let val = tds[i+5].textContent;

    if( year + amort <= 2019 && month < (today.getMonth()+1) ) {
        tds[i+5].innerHTML = val + "<br><div class='infoError'><strong>Вышел срок амортизации</strong></div>";
        

        tdsAm[i+7].innerHTML = tds[i-3].textContent;
        tdsAm[i+8].innerHTML = tds[i-2].textContent;
        tdsAm[i+9].innerHTML = tds[i-1].textContent;
        tdsAm[i+10].innerHTML = tds[i-0].textContent;
        tdsAm[i+11].innerHTML = tds[i+1].textContent;
        tdsAm[i+12].innerHTML = tds[i+2].textContent;
        tdsAm[i+13].innerHTML = tds[i+3].textContent;
        tdsAm[i+14].innerHTML = tds[i+4].textContent;
        tdsAm[i+15].innerHTML = tds[i+5].textContent;
        tdsAm[i+16].innerHTML = tds[i+6].textContent;
    }
}

for(let i=5; i <= 64; i = i + 10) {
    let temp = (tds[i].textContent).split('-');
    console.log(temp[0]);
    if(temp[0] == '0000') {
        tds[i].innerHTML = "не ремонтировался";
    }
}

function showTable() {
    let tds = document.getElementById('tableAmort');
    let elem = document.getElementById('showTable');
    let elem1 = document.getElementById('hideTable');

    tds.style.display = "none";
    elem.style.display = "none";
    elem1.style.display = "block";
}

function hideTable() {
    let tds = document.getElementById('tableAmort');
    let elem = document.getElementById('showTable');
    let elem1 = document.getElementById('hideTable');

    tds.style.display = "block";
    elem.style.display = "block";
    elem1.style.display = "none";
}

function showSearch() {
    let frm = document.getElementById('srch');
    frm.style.display = "block";
}