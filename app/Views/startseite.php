<div class="row mt-4">
    <div class="col-md-6 mb-3 mb-md-0">
        <div class="card">
            <div class="card-header">
                <h6 class="display-6">AJAX-geladene Personentabelle</h6>
            </div>
            <div class="card-body">
                <canvas id="bar-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="display-6">AJAX-geladene Personentabelle</h6>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
<script>
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: <?= $labels ?>,
            datasets: [
                {
                    label: "Umsätze(in Geld)",
                    data: <?= $umsaetze ?>,
                    backgroundColor: 'rgb(72,208,242)' // Beispiel-Farbe
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Chart.js Line Chart'
                }
            }
        }
    });
</script>