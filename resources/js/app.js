import './bootstrap';


let psw = document.getElementById("password");
let pswc = document.getElementById("password_confirmation")
function showPsw() {
    if (psw.type === "password") {
        psw.type = "text";
    } else {
        psw.type = "password";
    }
}
function showPsw2() {
        if (pswc.type === "password") {
            pswc.type = "text";
        } else {
            pswc.type = "password";
        }
}

let checkBox = document.getElementById("checkBoxSpw")
checkBox.addEventListener("click", showPsw)
checkBox.addEventListener("click", showPsw2)
console.log(psw);
console.log(pswc);