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
    let request = new XMLHttpRequest();

    request.open("GET", '/UT4/02-sessions/04-foro/threads.php?p=1');
    request.overrideMimeType("text/html; charset=utf-8");

    request.send();

    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            console.log(request.response);

            Threads.innerHTML = request.response;

            paginationControl(Threads);
            
        }
    }
}

function paginationControl(Threads) {
    const nextPages = Threads.querySelectorAll('.next');
    const prevPages = Threads.querySelectorAll('.prev');
    const addReply = document.querySelectorAll('.add_reply');

    for (const nextPage of nextPages) {
        nextPage.onclick = () => {
            let request = new XMLHttpRequest();

            request.open("GET", `/UT4/02-sessions/04-foro/threads.php?p=${nextPage.id}`);
            request.overrideMimeType("text/html; charset=utf-8");

            request.send();

            request.onreadystatechange = () => {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(request.response);

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
                    console.log(request.response);

                    Threads.innerHTML = request.response;

                }
                paginationControl(Threads);
            }
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
}


