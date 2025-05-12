
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

document.addEventListener("DOMContentLoaded", () => {
    const btnAbrir = document.getElementById("btnAbrirModal");
    const modal = document.getElementById("modal");
    const fechar = document.getElementById("fecharModal");
  
    btnAbrir.addEventListener("click", () => {
      modal.style.display = "block";
    });
  
    fechar.addEventListener("click", () => {
      modal.style.display = "none";
    });
  
    window.addEventListener("click", (e) => {
      if (e.target == modal) {
        modal.style.display = "none";
      }
    });
  });

  
  
