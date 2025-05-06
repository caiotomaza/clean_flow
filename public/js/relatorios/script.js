const totalPages = 5;
let currentPage = 1;

// Funções de paginação (mantidas intactas)
function createPagination() {
    const pageNumbers = document.getElementById("page-numbers");
    pageNumbers.innerHTML = "";
    
    for (let i = 1; i <= totalPages; i++) {
        let page = document.createElement("div");
        page.classList.add("page");
        page.innerText = i;
        page.onclick = () => goToPage(i);
        if (i === currentPage) page.classList.add("active");
        pageNumbers.appendChild(page);
    }
}

function changePage(step) {
    if (currentPage + step >= 1 && currentPage + step <= totalPages) {
        currentPage += step;
        createPagination();
    }
}

function goToPage(page) {
    currentPage = page;
    createPagination();
}

// Inicialização
document.addEventListener("DOMContentLoaded", createPagination);
