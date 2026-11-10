function idoMutat()
        {
            const maiNap = new Date();
            let o = maiNap.getHours();
            let p = maiNap.getMinutes();
            let m = maiNap.getSeconds();
            p = checkTime(p);
            m = checkTime(m);
            document.getElementById('clockDIV').innerHTML = o + ":" + p + ":" + m;
            setTimeout(idoMutat, 0);
        }

function checkTime(j) {
            if(j < 10) {j = "0" + j};
            return j;
        }

document.getElementById("accountLogin").style.display = "none";
document.getElementById("accountRegister").style.display = "none";
var object = document.getElementById("accountLogin");
var value = document.getElementById("accountRegister");

function loginMutat() {
    if (object.style.display === "none") {object.style.display = "block";}
    else {object.style.display = "none";}

    if(object.style.display === "block") {value.style.display = "none";}
}

function regMutat() {
    if (value.style.display === "none") {value.style.display = "block";}
    else {value.style.display = "none";}

   if(value.style.display === "block") {object.style.display = "none";}
}

