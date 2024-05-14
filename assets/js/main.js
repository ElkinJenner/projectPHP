//Switch Modo
let switch_c = document.getElementById("switch");
let body = document.getElementById("body");
let light_mode = document.getElementById("light_mode");
let dark_mode = document.getElementById("dark_mode");
let count_switch = 0;

switch_c.addEventListener('click', function () {
    if (count_switch == 0) {
        dark_mode.classList.remove("hidden");
        light_mode.classList.add("hidden");
        body.classList.add("dark_mode");
        body.classList.remove("light_mode");
        count_switch = 1;
    }
    else {
        dark_mode.classList.add("hidden");
        light_mode.classList.remove("hidden");
        body.classList.add("light_mode");
        body.classList.remove("dark_mode");
        count_switch = 0;
    }
});

//Modal Window
let btna = document.querySelectorAll(".btn_abrir");
let btnC = document.querySelectorAll(".btn_cerrar");
let modal_c = document.getElementById("modal");

let count_c = 0;

for (let i = 0; i < btna.length; i++) {
    btna[i].addEventListener('click', function () {
        modal_c = this.nextElementSibling;
        if (count_c == 0) {
            modal_c.classList.remove("hidden");
            count_c = 1;
        }
        else {
            modal_c.classList.add("hidden");
            count_c = 0;
        }
    });
    btnC[i].addEventListener('click', function () {
        if (count_c == 0) {
            modal_c.classList.remove("hidden");
            count_c = 1;
        }
        else {
            modal_c.classList.add("hidden");
            count_c = 0;
        }
    });
}