document.addEventListener("DOMContentLoaded", function () {
    const tabelaCorpo = document.querySelector("tbody");

    for (let i = 0; i < 10; i++) { // Cria 10 linhas
        const row = document.createElement("tr");
       
        
        row.innerHTML = `
            <td>Envio de Relatório</td>
            <td>João Silva</td>
            <td>01/03/25</td>
            <td>Filial</td>
            <td>
                ...
            </td>
        `;
        tabelaCorpo.appendChild(row);
    }
});



"Envio de Relatório",
        "João Silva",
        "01/03/25",
        "Filial",
        "..."
