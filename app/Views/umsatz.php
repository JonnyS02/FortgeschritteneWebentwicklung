<div class="row">
    <div class="col-md-6">
        <div class="card shadow h-100">
            <div class="card-header">
                <h1 class="display-6"><i class="fa-solid fa-money-bill-trend-up text-success"></i> Umsätze in Chart.js</h1>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <canvas id="bar-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-md-0 mt-4">
        <div class="card shadow h-100">
            <div class="card-header">
                <h1 class="display-6"><i class="fa-solid fa-code-compare text-primary"></i> Vergleich in Chart.js</h1>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
            <canvas id="gauge-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    new Chart($('#bar-chart'), {
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
            responsive: true,
        }
    });

    // Gauge
    const thisYear = <?= $thisYear ?>;
    const lastYear = <?= $lastYear ?>;
    const ratio = (thisYear / lastYear * 100);

    const fmtEUR = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });

    new Chart($('#gauge-chart'), {
        type: 'doughnut',
        data: {
            labels: ['Erreicht diesen Monat', 'Rest bis Referenz'],
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
            plugins: {
                tooltip: {
                    callbacks: {
                        label(ctx) {
                            const perc = Number(ctx.raw);
                            const abs = ctx.dataIndex === 0 ? thisYear : Math.max(lastYear - thisYear, 0);
                            return ` ${perc.toFixed(1)}% (${fmtEUR.format(abs)})`;
                        }
                    }
                }
            }
        }
    });
</script>