<div>
    <canvas id="fieldChart" width="400" height="200" wire:ignore></canvas>

    <script>
        const labels = @json($labels);
        const datasets = @json($datasets);

        const ctx = document.getElementById('fieldChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Percentage (%)'
                        },
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        },
                        suggestedMax: 80 // Adjust if you know max data point
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Field Operation Timeline'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                let value = context.parsed.y || 0;
                                return label + ': ' + value + '%';
                            }
                        }
                    },
                    legend: {
                        display: true,
                        labels: {
                            // Customize legend if needed
                        }
                    }
                },
                elements: {
                    point: {
                        radius: 5,
                        hoverRadius: 7
                    }
                }
            }
        });
    </script>
</div>
