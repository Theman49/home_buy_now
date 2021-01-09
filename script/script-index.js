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
const signUpBuyer = document.getElementById('sign-up-buyer');
const signUpSeller = document.getElementById('sign-up-seller');
const formBuyer = document.getElementById('formBuyer');
const statusBuyer = document.getElementById('statusBuyer');
const formSeller = document.getElementById('formSeller');
const statusSeller = document.getElementById('statusSeller');
toSeller.onclick = () => {
    statusBuyer.style.transform = `translateX(${signUpBuyer.offsetWidth - statusBuyer.offsetWidth}px)`;
    formBuyer.style.transform = `translateX(${-1*(signUpBuyer.offsetWidth - formBuyer.offsetWidth)}px)`;
    formBuyer.classList.add("toggle");
    setTimeout(() => {
        formBuyer.classList.remove("toggle");
        signUpBuyer.style.display = "none";
        signUpSeller.style.display = "block";

        
        statusBuyer.style.transform = `translateX(${(-1)*(signUpBuyer.offsetWidth - statusBuyer.offsetWidth)}px)`;
        formBuyer.style.transform = `translateX(${signUpBuyer.offsetWidth - formBuyer.offsetWidth}px)`;
        
    }, 1000);
   
    
}

toBuyer.onclick = () => {
    statusSeller.style.transform = `translateX(${-1*(signUpSeller.offsetWidth - statusSeller.offsetWidth)}px)`;
    formSeller.style.transform = `translateX(${signUpSeller.offsetWidth - formSeller.offsetWidth}px)`;
    formSeller.classList.add("toggle");
    setTimeout(() => {
        signUpSeller.style.display = "none";
        signUpBuyer.style.display = "block";

        formSeller.classList.remove("toggle");
        statusSeller.style.transform = `translateX(${signUpSeller.offsetWidth - statusSeller.offsetWidth}px)`;
        formSeller.style.transform = `translateX(${-1*(signUpSeller.offsetWidth - formSeller.offsetWidth)}px)`;
    }, 1000);
    

    
}