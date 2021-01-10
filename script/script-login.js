const cekmeout = document.getElementsByClassName('cekmeout');
const pwd = document.getElementsByClassName('pwd');

cekmeout[0].onclick = function(){
        if (pwd[0].type === 'password'){
            pwd[0].type = 'text';
        } else {
            pwd[0].type = 'password';
        }
    }

cekmeout[1].onclick = function(){
    if (pwd[1].type === 'password'){
        pwd[1].type = 'text';
    } else {
        pwd[1].type = 'password';
    }
}


const toSeller = document.getElementById('changeToSeller');
const toBuyer = document.getElementById('changeToBuyer');
const toSeller2 = document.getElementById('changeToSeller2');
const toBuyer2 = document.getElementById('changeToBuyer2');
const loginBuyer = document.getElementById('login-buyer');
const loginSeller = document.getElementById('login-seller');
const formBuyer = document.getElementById('formBuyer');
const statusBuyer = document.getElementById('statusBuyer');
const formSeller = document.getElementById('formSeller');
const statusSeller = document.getElementById('statusSeller');


toSeller.addEventListener("click", function(){
    statusBuyer.style.transform = `translateX(${loginBuyer.offsetWidth - statusBuyer.offsetWidth}px)`;
    formBuyer.style.transform = `translateX(${-1*(loginBuyer.offsetWidth - formBuyer.offsetWidth)}px)`;
    formBuyer.classList.add("toggle");
    setTimeout(() => {
        formBuyer.classList.remove("toggle");
        loginBuyer.style.display = "none";
        loginSeller.style.display = "block";

        
        statusBuyer.style.transform = `translateX(${(-1)*(loginBuyer.offsetWidth - statusBuyer.offsetWidth)}px)`;
        formBuyer.style.transform = `translateX(${loginBuyer.offsetWidth - formBuyer.offsetWidth}px)`;
        
    }, 1000);
});
toSeller2.addEventListener("click", function() {
    formBuyer.classList.add("toggle");
    setTimeout(() => {
        formBuyer.classList.remove("toggle");
        loginBuyer.style.display = "none";
        loginSeller.style.display = "block";
    },1000)
});


toBuyer.addEventListener("click", function(){
    statusSeller.style.transform = `translateX(${-1*(loginSeller.offsetWidth - statusSeller.offsetWidth)}px)`;
    formSeller.style.transform = `translateX(${loginSeller.offsetWidth - formSeller.offsetWidth}px)`;
    formSeller.classList.add("toggle");
    setTimeout(() => {
        loginSeller.style.display = "none";
        loginBuyer.style.display = "block";

        formSeller.classList.remove("toggle");
        statusSeller.style.transform = `translateX(${loginSeller.offsetWidth - statusSeller.offsetWidth}px)`;
        formSeller.style.transform = `translateX(${-1*(loginSeller.offsetWidth - formSeller.offsetWidth)}px)`;
    }, 1000);
});
toBuyer2.addEventListener("click", function(){
    formSeller.classList.add("toggle");
    setTimeout(() => {
        formSeller.classList.remove("toggle");
        loginSeller.style.display = "none";
        loginBuyer.style.display = "block";

    },1000)
});