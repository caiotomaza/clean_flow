document.addEventListener("DOMContentLoaded", function () {
    const statusOptions = [
        { img: "https://cdn-icons-png.flaticon.com/512/10009/10009447.png", text: "Saída", class: "saida" },
        { img: "https://icones.pro/wp-content/uploads/2021/02/icone-de-fleche-droite-vert.png", text: "Entrada de Carga", class: "entrada-carga" },
        { img: "https://cdn-icons-png.flaticon.com/256/54/54476.png", text: "Entrada de Material", class: "entrada-material" }
    ];

    const tabelaCorpo = document.querySelector("tbody");

    for (let i = 0; i < 10; i++) { // Cria 10 linhas
        const row = document.createElement("tr");
        const randomStatus = statusOptions[Math.floor(Math.random() * statusOptions.length)];
        
        row.innerHTML = `
            <td>001-2025</td>
            <td>João da Silva</td>
            <td>Papelão</td>
            <td>436.25 para o lugar X - 15/09/24 - 12:03</td>
            <td class="status ${randomStatus.class}">
                <img src="${randomStatus.img}" alt="${randomStatus.text}"> 
                <span>${randomStatus.text}</span>
            </td>
        `;
        tabelaCorpo.appendChild(row);
    }
});



