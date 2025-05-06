const ctx = document.getElementById('graficoRosca').getContext('2d');
new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [
      'Papel/Papelão',
      'Plásticos',
      'Metais',
      'Madeiras',
      'Vidros',
      'Lixo orgânico',
      'Pilhas e baterias'
    ],
    datasets: [{
      data: [28, 23, 19, 14, 9, 5, 2],
      backgroundColor: [
        '#33ccff',
        '#e60000',
        '#ffff00',
        '#1a1a1a',
        '#99ffcc',
        '#cc6600',
        '#ff9900'
      ],
      borderWidth: 0
    }]
  },
  options: {
    cutout: '60%',
    plugins: {
      legend: {
        display: false
      }
    }
  }
});
