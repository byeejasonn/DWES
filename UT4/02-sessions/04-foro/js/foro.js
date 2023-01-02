const addThread = document.querySelector('.add_thread');
const addReply = document.querySelectorAll('.add_reply');
const nextPage = document.querySelector('.next');

// funcion para desplegar el formulario a rellenar para añadir un hilo en el foro

addThread.onclick = () => {
    const form = document.querySelector('.thread__form');

    if (!form.classList.contains('thread__form-open')) {
        form.classList.add('thread__form-open');
    } else {
        form.classList.remove('thread__form-open');
    }

}

for (const btnReply of addReply) {
    btnReply.onclick = () => {
        const form = btnReply.nextElementSibling;

        if (!form.classList.contains('reply__form-open')) {
            form.classList.add('reply__form-open');
        } else {
            form.classList.remove('reply__form-open');
        }
    }
}

nextPage.onclick = () => {
    
    let request = new XMLHttpRequest();

    request.open("GET", '/UT4/02-sessions/04-foro/foro.php');
    request.overrideMimeType("text/plain; charset=x-user-defined");

    request.send();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            console.log(request.response);
        }
    }
}
