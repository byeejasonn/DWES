const addThread = document.querySelector('.add_thread');
const Threads = document.querySelector('.threads');
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
        const form = btnReply.nextElementSibling;

        if (!form.classList.contains('reply__form-open')) {
            form.classList.add('reply__form-open');
        } else {
            form.classList.remove('reply__form-open');
        }
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

            PaginationControl();
        }
    }
}

function PaginationControl() {
    const prevPage = document.querySelector('.prev');
    const nextPage = document.querySelector('.next');
    let current = parseInt(document.querySelector('.current').textContent);

    nextPage.onclick = () => {
        let request = new XMLHttpRequest();

        request.open("GET", `/UT4/02-sessions/04-foro/threads.php?p=${current + 1}`);
        request.overrideMimeType("text/html; charset=utf-8");

        request.send();

        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                console.log(request.response);

                Threads.innerHTML = request.response;

            }
            PaginationControl();
        }
    }

    prevPage.onclick = () => {
        let request = new XMLHttpRequest();

        request.open("GET", `/UT4/02-sessions/04-foro/threads.php?p=${current - 1}`);
        request.overrideMimeType("text/html; charset=utf-8");

        request.send();

        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                console.log(request.response);

                Threads.innerHTML = request.response;

            }
            PaginationControl();
        }
    }

    // prevPage.onclick = movePage(current - 1);

}


