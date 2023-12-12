let registerPassword = document.getElementById('registerPassword');
let submitRegister = document.getElementById('submitRegister');
let faible = document.createElement('p');
let barreWeak = document.createElement('div');
let divWeak = document.createElement('div');
let moyen = document.createElement('p');
let barreMid = document.createElement('div');
let divMid = document.createElement('div');
let haut = document.createElement('p');
let barreTop = document.createElement('div');
let divTop = document.createElement('div');
let weakPass = /^.{0,8}$/;
let mediumPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/;
let strongPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$._%^&*]).{8,}$/;
function RegisterPasswordCorrect (){
    if (registerPassword.value !== ''){
    if(!mediumPass.test(registerPassword.value)){
        document.getElementById('divRegisterPassword').appendChild(barreWeak).appendChild(divWeak);
        document.getElementById('divRegisterPassword').appendChild(faible);
        faible.innerHTML = "weak";
        faible.classList.remove('none');
        faible.classList.add('weak');
        barreWeak.classList.add('barreWeak'); 
        divWeak.classList.add('div30');
    } else{
        faible.classList.add('none');
        barreWeak.classList.remove('barreWeak'); 
        divWeak.classList.remove('div30');
    }
     if (mediumPass.test(registerPassword.value)){
        document.getElementById('divRegisterPassword').appendChild(barreMid).appendChild(divMid);
        document.getElementById('divRegisterPassword').appendChild(moyen);
        moyen.innerHTML= "Moyen";
        moyen.classList.remove('none');
        moyen.classList.add('mid');
        barreMid.classList.add('barreMid');
        divMid.classList.add('div60');
    } else{
        moyen.classList.add('none');
        barreMid.classList.remove('barreMid');
        divMid.classList.remove('div60');
    }
     if (strongPass.test(registerPassword.value)) {
        document.getElementById('divRegisterPassword').appendChild(barreTop).appendChild(divTop);
        document.getElementById('divRegisterPassword').appendChild(haut);
        haut.innerHTML= "Élevé";
        haut.classList.add('top');
        barreTop.classList.add('barreTop');
        divTop.classList.add('div100');
        haut.classList.remove('none');
        moyen.classList.add('none');
        barreMid.classList.remove('barreMid');
        divMid.classList.remove('div60');
    }else{
        haut.classList.add('none');
        barreTop.classList.remove('barreTop');
        divTop.classList.remove('div100');
    }
} else {
    faible.classList.add('none');
    barreWeak.classList.remove('barreWeak'); 
    divWeak.classList.remove('div30');
}
}

registerPassword.addEventListener('keyup', RegisterPasswordCorrect);