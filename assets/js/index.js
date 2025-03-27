let errorMessage = document.getElementById('error-message');

const parametros = new URLSearchParams(window.location.search);

const error = parametros.get("error");

if (error === "yes") {
    errorMessage.classList.remove('hidden');
}

function marcarComoAssistido(id) {
    let confirmacao = confirm("Tem certeza que deseja prosseguir?");

    if (confirmacao) {
        window.location.href = './backend/marcarComoAssistido.php?id=' + id;
    }
}

function editarFilme(id) {    
    window.location.href = './editFilme.php?id=' + id;
}

function excluirFilme(id) {
    let confirmacao = confirm("Tem certeza que deseja prosseguir?");

    if (confirmacao) {
        window.location.href = './backend/excluirFilme.php?id=' + id;
    }
}

document.querySelector('.logo').addEventListener('click', () => {
    window.location.href = './index.php';
});