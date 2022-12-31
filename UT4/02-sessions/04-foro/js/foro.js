const addThread = document.querySelector('.add_thread');

// funcion para desplegar el formulario a rellenar para añadir un hilo en el foro

addThread.onclick = () => {
    const form = document.querySelector('.thread__form');

    if (!form.classList.contains('thread__form-open')) {
        form.classList.add('thread__form-open');
    } else {
        form.classList.remove('thread__form-open');
    }

}