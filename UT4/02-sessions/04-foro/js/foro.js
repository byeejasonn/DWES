const addThread = document.querySelector('.add_thread');
const Threads = document.querySelector('.threads');

// funcion para desplegar el formulario a rellenar para añadir un hilo en el foro
addThread.onclick = () => {
    const form = document.querySelector('.thread__form');

    if (!form.classList.contains('thread__form-open')) {
        form.classList.add('thread__form-open');
    } else {
        form.classList.remove('thread__form-open');
    }

}

window.onload = () => {
    // Al cargar la pagina hacemos una peticion para que nos devuelva siempre la primera pagina de los hilos
    let request = new XMLHttpRequest();

    request.open("GET", '/UT4/02-sessions/04-foro/threads.php?p=1');
    request.overrideMimeType("text/html; charset=utf-8");

    request.send();

    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            
            Threads.innerHTML = request.response;

            paginationControl(Threads);
            
        }
    }
}

function paginationControl(Threads) {
    // Como los elementos a buscar los guardamos en un elemento habra que buscarlos dentro de el
    const nextPages = Threads.querySelectorAll('.next');
    const prevPages = Threads.querySelectorAll('.prev');
    const addReply = document.querySelectorAll('.add_reply');

    // A cada uno le asignamos las funciones que tiene
    for (const nextPage of nextPages) {
        nextPage.onclick = () => {
            let request = new XMLHttpRequest();

            request.open("GET", `/UT4/02-sessions/04-foro/threads.php?p=${nextPage.id}`);
            request.overrideMimeType("text/html; charset=utf-8");

            request.send();

            request.onreadystatechange = () => {
                if (request.readyState == 4 && request.status == 200) {

                    Threads.innerHTML = request.response;

                }
                paginationControl(Threads);
            }
        }
    }

    for (const prevPage of prevPages) {
        prevPage.onclick = () => {
            let request = new XMLHttpRequest();

            request.open("GET", `/UT4/02-sessions/04-foro/threads.php?p=${prevPage.id}`);
            request.overrideMimeType("text/html; charset=utf-8");

            request.send();

            request.onreadystatechange = () => {
                if (request.readyState == 4 && request.status == 200) {

                    Threads.innerHTML = request.response;

                }
                paginationControl(Threads);
            }
        }
    }
    
    // despliege del formulario de respuesta para cada boton de cada hilo
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
}


