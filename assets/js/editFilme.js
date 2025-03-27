let errorMessage = document.getElementById('error-message');

const parametros = new URLSearchParams(window.location.search);

const error = parametros.get("error");

if (error === "yes") {
    errorMessage.classList.remove('hidden');
}

document.querySelector('.logo').addEventListener('click', () => {
    window.location.href = './index.php';
});