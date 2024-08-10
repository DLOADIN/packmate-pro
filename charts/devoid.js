document.addEventListener("DOMContentLoaded", function () {
    const years = ['1st Year', '2nd Year', '3rd Year', '4th Year', '5th Year', 'Today'];
    const stapleCropsPrices = [2.5, 4.0, 4.0, 4.0, 3.5, 9.5];
    const essentialCommoditiesPrices = [4.0, 4.5, 4.5, 4.5, 4.5, 9.5];

    const ctx1 = document.getElementById('child').getContext('2d');
    const ctx2 = document.getElementById('stong').getContext('2d');

    // Chart for staple crops
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Staple Crops Prices',
                data: stapleCropsPrices,
                backgroundColor: 'blue'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Historical Price Trends for Staple Crops'
                }
            }
        }
    });

    // Chart for essential commodities
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Essential Commodities Prices',
                data: essentialCommoditiesPrices,
                backgroundColor: 'green'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Historical Price Trends for Essential Commodities'
                }
            }
        }
    });
});
