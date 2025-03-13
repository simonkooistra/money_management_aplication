import './bootstrap';

addEventListener()
function showPsw() {
    var psw = document.getElementById('password')
    if (psw.type === 'password') {
        psw.type = "text";
    } else {
        psw.type = "password";
    }
}
