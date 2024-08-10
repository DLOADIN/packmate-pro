const labels1 = ['January', 'February', 'March', 'April', 'May', 'June'];
    const data1 = {
      labels: labels1,
      datasets: [{
        label: 'Food Prices Fluctuation',
        data: [100, 287, 126, 128, 723, 243],
        backgroundColor: 'rgb(54, 162, 235)',
        hoverOffset: 4,
        borderColor: 'rgb(54, 162, 235)',
        borderWidth: 1,
      }]
    };

    const canvas1 = document.getElementById('tom-clancy');
    const ctx1 = canvas1.getContext('2d');

    new Chart(ctx1, {
      type: 'bar',
      data: data1,
      options: {
        scales: {
          y: {
            beginAtZero: true 
          }
        }
      }
    });

    const labels2 = ['January', 'February', 'March', 'April', 'May', 'June'];
    const data2 = {
      labels: labels2,
      datasets: [{
        label: 'Market Prices Fluctuation',
        data: [300, 410, 595, 620, 715, 810], 
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
      }]
    };

    const canvas2 = document.getElementById('shawn-brandon');
    const ctx2 = canvas2.getContext('2d');

    new Chart(ctx2, {
      type: 'bar',
      data: data2,
      options: {
        scales: {
          y: {
            beginAtZero: true 
          }
        }
      }
    });