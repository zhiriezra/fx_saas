<div class="w-full h-full">

    <canvas id="threatAssessment" width="400" height="200" wire:ignore></canvas>


    <script>
        document.addEventListener('livewire:load', () => {
            const labels = @json($labels);
            const datasets = @json($datasets);

            const ctx = document.getElementById('threatAssessment').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    indexAxis: 'y', // Horizontal orientation
                    scales: {
                        x: {
                            stacked: true,
                            title: {
                                display: true,
                                text: 'Percentage (%)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return value + '%'; // Append % symbol to x-axis
                                }
                            },
                            beginAtZero: true,
                            max: 100 // if your data represents percentages out of 100
                        },
                        y: {
                            stacked: true,
                            title: {
                                display: true,
                                text: 'Threat Level'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Field Threat Assessment'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    // Add a % sign to the tooltip label
                                    let label = context.dataset.label || '';
                                    let value = context.parsed.x;
                                    return `${label}: ${value}%`;
                                }
                            }
                        }
                    }
                }
            });
        })
    </script>
</div>
