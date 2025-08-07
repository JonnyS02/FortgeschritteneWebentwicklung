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
        options: {
            responsive: true
        }
    });

    // Gauge
    const thisYear = <?= $thisYear ?>;
    const lastYear = <?= $lastYear ?>;
    const ratio = (thisYear / lastYear * 100);

    new Chart(document.getElementById('gauge-chart'), {
        type: 'doughnut',
        data: {
            labels: ['Erreicht', 'Fehlend'],
            datasets: [{
                label: 'Umsatzverhältnis',
                data: [ratio, 100 - ratio],
                backgroundColor: ['#47cef0', '#e0e0e0'],
            }]
        },
        options: {
            responsive: true,
            rotation: -90,
            circumference: 180,
        }
    });
</script>