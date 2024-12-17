<div class="w-full h-full">

<canvas id="sampledFarmers" width="400" height="200" wire:ignore></canvas>
<script>
    document.addEventListener('livewire:load', () => {
    // Retrieve the data passed from the controller
        const labels = @json($labels);
        const dataPoints = @json($data);

        const ctx = document.getElementById('sampledFarmers').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Farmers',
                    data: dataPoints,
                    backgroundColor: '#8bc34a',
                    borderColor: '#8bc34a',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Make the chart horizontal
                scales: {
                    x: {
                        beginAtZero: true,
                        // If you want to show percentages, you can add a callback here
                        ticks: {
                            callback: (value) => value + '%'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Farmer Group Size'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Sampled Farmers'
                    }
                }
            }
        });
    })
</script>
</div>
