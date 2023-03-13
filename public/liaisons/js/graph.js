new Chart(document.getElementById("doughnutInsta").getContext('2d'), {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [
                25, 25, 25, 15, 10
            ],

            backgroundColor: [
                'rgba(153, 102, 255, 0.2)',
                'rgba(50, 168, 82, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)'
            ],
            borderColor: [
                'rgb(153, 102, 255)',
                'rgb(50, 168, 82)',
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)'
            ],
            cutout: '0%', borderRadius: 20
        }],
        labels: [
            "Programmation",
            "Intégration",
            "Conception",
            "Traitement des médias",
            "Autres"
        ]
    },
    options: {
        responsive: false,
        plugins: {
            title: {
                display: true,
                text: ''
            }
        }
    }
});