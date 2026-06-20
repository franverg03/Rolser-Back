<div>
    <div class="p-6 bg-white rounded-lg shadow-md w-full mx-auto mt-4 border bordeRolser">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Evolución de Clientes Captados ({{ $añoActual }})
        </h2>

        <canvas id="graficaCanvas" height="100"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const ctx = document.getElementById('graficaCanvas').getContext('2d');
            const etiquetas = @json($labels);
            const datosVip = @json($dataVip);
            const datosNoVip = @json($dataNoVip);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [
                        {
                            label: 'Clientes VIP',
                            data: datosVip,
                            backgroundColor: 'rgba(144, 36, 42, 0.8)',
                            borderColor: '#90242A',
                            borderWidth: 0,
                            borderRadius: 4
                        },
                        {
                            label: 'Clientes Estándar',
                            data: datosNoVip,
                            backgroundColor: 'rgb(239, 122, 129)',
                            borderColor: '#f3686f',
                            borderWidth: 0,
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false, // Hace que al pasar el ratón muestre los datos de ambos a la vez
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                // Suma los dos valores en el tooltip para mostrar el total del mes
                                footer: (tooltipItems) => {
                                    let total = 0;
                                    tooltipItems.forEach(function(tooltipItem) {
                                        total += tooltipItem.parsed.y;
                                    });
                                    return 'Total del mes: ' + total;
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
