    <div class="card shadow">
        <div class="card-header">
            <h1 class="display-6">Umsätze in Chart.js</h1>
        </div>
        <div class="card-body">
            <canvas id="bar-chart"></canvas>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        new Chart(document.getElementById('bar-chart'), {
            type: 'bar',
            data: {
                labels: <?= $monat ?>,
                datasets: [{
                    label: 'Umsätze (in Geld)',
                    data: <?= $umsatz ?>,
                    backgroundColor: 'rgb(72,208,242)'
                }]
            },
            options: { responsive: true }
        });
    });
</script>