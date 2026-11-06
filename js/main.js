document.addEventListener('DOMContentLoaded', () => {
    const cursor = document.getElementById('cursor-personalizado');
    if (cursor) {
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top  = e.clientY + 'px';
        });
    }

    const botonesEfectos = document.querySelectorAll('.link-categoria, .boton-categoria');
    if (botonesEfectos) {
        botonesEfectos.forEach(boton => {
            boton.addEventListener('mousemove', (e) => {
                const rect = boton.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                boton.style.setProperty('--mouseX', `${x}px`);
                boton.style.setProperty('--mouseY', `${y}px`);
            });
        });
    }

    if (document.getElementById("lista-juegos")) {
        fetch("/data/juegos.json")
        .then(function(respuesta){ 
            return respuesta.json();
        })
        .then(function(juegos){
            let lista = document.getElementById("lista-juegos");
            let botones = document.querySelectorAll(".boton-categoria");

            mostrarJuegos(juegos, lista);
            botones.forEach(function(boton){
                boton.addEventListener("click", function(){
                    let categoria = boton.dataset.categoria;

                    if (categoria == "todas") {
                        mostrarJuegos(juegos, lista, "todas");
                    } else {
                        let filtrado = juegos.filter(function(juego){
                            return juego.categorias.includes(categoria);
                        });
                        mostrarJuegos(filtrado, lista, categoria);
                    }
                });
            });
        });

        function mostrarJuegos(lista, contenedor, categoria = "todas"){
            contenedor.innerHTML = "";
            const nombreCategoria = categoria === "todas" ? "Todos los juegos" : categoria.charAt(0).toUpperCase() + categoria.slice(1);
            contenedor.innerHTML += `<h2 class="pb-2">${nombreCategoria}</h2>`;

            contenedor.innerHTML += `<div class="row w-100 justify-content-center" id="fila-juegos"></div>`;
            const fila = document.getElementById("fila-juegos");


            lista.forEach(function(juego){
                fila.innerHTML += `
                <div class="col-12 col-md-6 text-center mb-4 text-center">
                    <h3 class="image-foro-titulo"><a href="${juego.url}">${juego.titulo}</a></h3>
                    <img class="image-foro" src="${juego.imagen}" alt="${juego.alt}">
                </div>
                `;
            });
        }
    }
    // Validación de formulario signin.php
    let formSignin = document.getElementById("form-signin");
    if (formSignin) {
        formSignin.addEventListener("submit", function(e) {
            e.preventDefault();
            let usuario  = document.getElementById("usuario").value;
            let password = document.getElementById("password").value;
            const caracterProhibido = /[\\\/()\[\]*+ ':?"@]/;

            if (usuario === "" || password === "") {
                alert("Por favor completa todos los campos.");
            } else if (usuario.length > 20 || password.length > 20) {
                alert("Usuario o contraseña incorrecta.")
            } else if (caracterProhibido.test(usuario) || caracterProhibido.test(password)) {
                alert("El nombre de usuario o contraseña incluye caracteres no permitidos.");
            } else {
                formSignin.submit();
            }
        });
    }
    // Validación del formulario signup.php
    let formSignup = document.getElementById("form-signup");
    if (formSignup) {
        formSignup.addEventListener("submit", function(e) {
            e.preventDefault();
            let usuario      = document.getElementById("usuario").value;
            let clave        = document.getElementById("clave").value;
            let repetirClave = document.getElementById("repetir-clave").value;
            const caracteresProhibido = /[\\\/()\[\]*+ ':?"@]/;
            const tieneMayus = /[A-Z]/.test(clave);
            const tieneNum = /[0-9]/.test(clave);

            if (usuario === "" || clave === "" || repetirClave === "") {
                alert("Por favor completa todos los campos.");
            } else if (clave !== repetirClave) {
                alert("Las contraseñas no coinciden.");
            } else if (usuario.length > 20 || usuario.length < 4) {
                alert("El nombre de usuario tiene que tener entre 4 y 20 caracteres.");
            } else if(clave.length > 20 || clave.length < 8) {
                alert("La contraseña debe tener entre 8 y 20 caracteres.")
            } else if (caracteresProhibido.test(usuario) || caracteresProhibido.test(clave)) {
                alert("El nombre de usuario o contraseña no puede incluir espacios, '\\', '/', '(', ')', '[', ']', '*', '+', ' ' ', ':', '\"', '?', '@'.");
            } else if (!tieneMayus || !tieneNum) {
                alert("La contraseña debe tener al menos un número y una mayúscula.")
            } else {
                formSignup.submit();
            }
        });
    }

    // Validación del formulario perfil.php
    let formPerfil = document.getElementById("form-perfil");
    if (formPerfil) {
    formPerfil.addEventListener("submit", function(e) {
        e.preventDefault();
        let usuarioNuevo = document.querySelector('input[name="usuario_nuevo"]').value.trim();
        const caracteresProhibidos = /^[a-zA-Z0-9_]+$/;

        if (usuarioNuevo == "") {
            alert("Por favor ingresa un nombre de usuario.");
        } else if (usuarioNuevo.length < 4 || usuarioNuevo.length > 20) {
            alert("El nombre debe tener entre 4 y 20 caracteres.");
        } else if (!caracteresProhibidos.test(usuarioNuevo)) {
            alert("El nombre solo puede contener letras, números y guiones bajos.");
        } else {
            formPerfil.submit();
        }
    });
    }

    // Validación de formulario de comentario-index.php
    let formReviewIndex = document.getElementById("form-index");
    if (formReviewIndex) {
        formReviewIndex.addEventListener("submit", function(e) {
            e.preventDefault();
            let valoracion = document.querySelector('input[name="valoracion"]:checked');
            let juego_id   = document.getElementById("juego_id").value;
            let comentario = document.getElementById("comentario").value;
            const caracteresProhibidos = /[<|>|"|']/;

            if (juego_id === "") {
                alert("Por favor seleccione un juego.");
            } else if (comentario.length > 500) {
                alert("Los comentarios ingresados deben contener hasta 500 caracteres.");
            } else if (caracteresProhibidos.test(comentario)) {
                alert("Los comentarios y juegos no pueden incluir los siguientes caracteres: ''', '\"', '\<', '>'.");
            } else if (!valoracion) {
                alert("Por favor, califique el juego.")
            } else {
                formReviewIndex.submit();
            }
        });
    }
    //Validacion formulario comentarios.php
    let formReview = document.getElementById("form-review");
    if (formReview) {
        formReview.addEventListener("submit", function(e) {
            e.preventDefault();
            let estrellas = document.querySelector('input[name="valoracion"]:checked');
            let reviews = document.getElementById("comentario").value;
            const caracterProhibidos = /[<|>|"|']/;

            if (reviews.length > 500) {
                alert("Los comentarios ingresados deben contener hasta 500 caracteres.");
            } else if (caracterProhibidos.test(reviews)) {
                alert("Los comentarios no pueden incluir los siguientes caracteres: ''', '\"', '\<', '>'.");
            } else if (!estrellas) {
                alert("Por favor, califique el juego.");
            } else {
                formReview.submit();
            }
        });
    }
    // Validación formulario eliminar comentario
    const formsEliminar = document.querySelectorAll(".form-eliminar");
    if (formsEliminar.length > 0) {
        formsEliminar.forEach(function(form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const comentarioId = form.querySelector('input[name="comentario_id"]').value;
                const usuarioId    = form.querySelector('input[name="usuario_id"]').value;

                if (!comentarioId || comentarioId == "0" || !usuarioId || usuarioId === "0") {
                    alert("Error: datos inválidos.");
                    return;
                }
                if (!confirm("¿Estás segura de que deseas eliminar este comentario?")) {
                    return;
                }
                form.submit();
            });
        });
    }
});