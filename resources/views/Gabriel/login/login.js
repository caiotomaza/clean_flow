document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modalRecuperacao");
    const btnEsqueci = document.getElementById("btnEsqueci");
    const fecharModal = document.getElementById("fecharModal");

    
    btnEsqueci.addEventListener("click", function (event) {
        event.preventDefault();
        modal.style.display = "flex";
    });

    
    fecharModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});