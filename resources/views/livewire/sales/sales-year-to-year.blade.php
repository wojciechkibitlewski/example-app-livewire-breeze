<div>
    
<div class="bg-white rounded-xl p-4 dark:bg-gray-900 mb-4">
    <h1 class="text-2xl">{{__('reports.sales_year_to_year')}}</h1>

    <div class="w-full overflow-x-auto mb-[20px]">
        <canvas class="w-full p-4 mb-4 overflow-x-auto font-light !dark:text-white" id="userChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var chartData = @json($chartData);
    var ctx = document.getElementById('userChart');
    var userChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: JSON.parse(chartData.labels),
            datasets: [
                {
                    label: " {{$lastYear}}",
                    data: JSON.parse(chartData.datasetLast),
                    backgroundColor: '#5EEAD4',
                },
                {
                label: " {{$currentYear}}",
                data: JSON.parse(chartData.dataset),
                backgroundColor: '#FCA5A5',
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</div>
