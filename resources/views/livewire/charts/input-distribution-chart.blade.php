<div class="w-full">

    <canvas id="donutChart" width="100" height="200" wire:ignore></canvas>


    <script>
        document.addEventListener('livewire:load', () => {
        const labels = @json($labels);
        const data = @json($data);

            const ctx = document.getElementById('donutChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            '#8BC34A', // Green for "Yes"
                            '#C5E1A5'  // Lighter green/tan for "No"
                        ],
                        borderColor: '#4CAF50',
                        borderWidth: 2
                    }]
                },
                options: {
                    cutout: '70%', // Adjust how 'thick' the donut is
                    plugins: {
                        title: {
                            display: true,
                            text: 'Input Distribution'
                        },
                        legend: {
                            display: true
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.parsed;
                                    return label + ': ' + value + '%';
                                }
                            }
                        },
                        datalabels: {
                            color: '#000',
                            font: {
                                weight: 'bold'
                            },
                            formatter: function(value, context) {
                                let label = context.chart.data.labels[context.dataIndex];
                                return label + '\n' + value + '%';
                            },
                            align: 'end',
                            anchor: 'end',
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        })
    </script>
</div>
