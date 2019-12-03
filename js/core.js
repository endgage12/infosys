let tds = document.getElementById('showDB').getElementsByTagName('td');
let dateT = (tds[4].textContent).split('-');
let amort = 0; parseInt(amort);
let year = Number(dateT[0]);

console.log(typeof year);

if(year + amort < 2019) {   
    console.log("вышел срок амортизации");
}