const cekmeout = document.getElementById('cekmeout');
const pwd = document.getElementById('password');

cekmeout.onclick = function(){
    if (pwd.type === 'password'){
        pwd.type = 'text';
    } else {
        pwd.type = 'password';
    }
}