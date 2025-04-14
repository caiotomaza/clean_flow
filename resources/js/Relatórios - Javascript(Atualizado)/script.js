
const totalPages = 5;
let currentPage = 1;

function createPagination() {
    const pageNumbers = document.getElementById("page-numbers");
    pageNumbers.innerHTML = "";
    
    for (let i = 1; i <= totalPages; i++) {
        let page = document.createElement("div");
        page.classList.add("page");
        page.innerText = i;
        page.onclick = () => goToPage(i);
        if (i === currentPage) {
            page.classList.add("active");
        }
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

document.addEventListener("DOMContentLoaded", createPagination);

// Scripts para abrir e fechar o modal
const modal = document.getElementById("relatorioModal");
const btn = document.getElementById("openModalBtn");
const span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
  modal.style.display = "block";
}

span.onclick = function () {
  modal.style.display = "none";
}

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  
