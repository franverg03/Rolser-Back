<div>
    <div class="p-6 bg-white rounded-lg shadow-md w-full mx-auto mt-4 border bordeRolser">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Evolución de Pedidos ({{ $añoActual }})
        </h2>

        <canvas id="graficaPedidosCanvas"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const ctx = document.getElementById('graficaPedidosCanvas').getContext('2d');

            const etiquetas = @json($labels);
            const datosVip = @json($dataVip);
            const datosNoVip = @json($dataNoVip);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            label: 'Pedidos VIP',
                            data: datosVip,
                            backgroundColor: 'rgba(144, 36, 42, 0.8)',
                            borderColor: '#90242A',
                            borderWidth: 0,
                            borderRadius: 4
                        },
                        {
                            label: 'Pedidos Estándar',
                            data: datosNoVip,
                            backgroundColor: 'rgb(239, 122, 129)',
                            borderColor: '#EF7A81',
                            borderWidth: 0,
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    aspectRatio: 3,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                footer: (tooltipItems) => {
                                    let total = 0;
                                    tooltipItems.forEach(function(tooltipItem) {
                                        total += tooltipItem.parsed.y;
                                    });
                                    return 'Total Pedidos: ' + total;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>
