const menu = document.querySelector('#menu');
const exit = document.querySelector('#exit');
const nav = document.querySelector('.nav');
const html = document.getElementsByTagName('html')[0];
const body = document.getElementsByTagName('body')[0];

let windowWidth;

window.onresize = () => {
    windowWidth = window.innerWidth;

    if (windowWidth >= 1250) {
        if (nav.classList.contains('nav-active')) {
            nav.classList.remove('nav-active');
        }
        nav.style.transition = 'transform .3s ease, visibility .3s ease';
    }
}

menu.onclick = () => {
    nav.classList.toggle('nav-active');
    scroll();
    nav.style.transition = 'transform .3s ease, visibility .3s ease, opacity .3s ease';
}

exit.onclick = () => {
    nav.classList.toggle('nav-active');
    scroll();
}

function scroll() {
    if (nav.classList.contains('nav-active')) {
        body.style.overflow = 'hidden';
        html.style.overflow = 'hidden';
    } else {
        body.style.overflow = '';
        html.style.overflow = '';
    }
}