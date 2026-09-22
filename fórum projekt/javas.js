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