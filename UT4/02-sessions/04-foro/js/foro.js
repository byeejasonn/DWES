const addThread = document.querySelector('.add_thread');
const addReply = document.querySelectorAll('.add_reply');

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
        const form = document.querySelector('.reply__form');
    }
}
