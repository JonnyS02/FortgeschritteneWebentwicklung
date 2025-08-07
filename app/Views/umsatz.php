<div class="row">
    <div class="col-md-6">
        <div class="card shadow h-100">
            <div class="card-header">
                <h1 class="display-6">Umsätze in Chart.js</h1>
            </div>
            <div class="card-body">
                <canvas id="bar-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-md-0 mt-4">
        <div class="card shadow h-100">
            <div class="card-header">
                <h1 class="display-6">Vergleich in Chart.js</h1>
            </div>
            <div class="card-body">
                <canvas id="gauge-chart"></canvas>
            </div>
        </div>
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
            options: {responsive: true}
        });
    });
</script>