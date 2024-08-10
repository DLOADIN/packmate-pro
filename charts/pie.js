
    // Chart 1: Pie Chart
    const canvas1 = document.getElementById('acquisitions');
    const data1 = {
      labels: ['70% market Price', '29% crop yield trends', '34% malnutrition rates'],
      datasets: [{
        label: 'Accreditated data',
        data: [300, 50, 100],
        backgroundColor: ['#5E80AB', '#FF895F', '#24E795'],
        hoverOffset: 4
      }]
    };

    const ctx1 = canvas1.getContext('2d');
    new Chart(ctx1, {
      type: 'pie',
      data: data1,
      options: {}
    });

    // Chart 2: Line Chart
    const labels2 = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
    const data2 = {
      labels: labels2,
      datasets: [{
        label: ' key food security indicators',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    };

    const canvas2 = document.getElementById('lenovo');
    const ctx2 = canvas2.getContext('2d');
    new Chart(ctx2, {
      type: 'line',
      data: data2,
      options: {}
    });

    // Chart 3: Bar Chart
    const labels3 = ['JANUARY', 'FEBRUARY', 'MARCH', 'MAY', 'JUNE'];
    const data3 = {
      labels: labels3,
      datasets: [{
        label: 'Yield Production as expected',
        data: [11, 16, 7, 3, 14],
        backgroundColor: ['rgb(255, 99, 132)', 'rgb(75, 192, 192)', 'rgb(255, 205, 86)', 'rgb(201, 203, 207)', 'rgb(54, 162, 235)'],
        borderWidth: 1
      }]
    };

    const canvas3 = document.getElementById('sand-worm');
    const ctx3 = canvas3.getContext('2d');
    new Chart(ctx3, {
      type: 'radar',
      data: data3,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  