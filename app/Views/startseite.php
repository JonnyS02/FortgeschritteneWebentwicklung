<div class="row mt-4">
    <div class="col-md-6 mb-3 mb-md-0">
        <div class="card">
            <div class="card-header">
                <h1 class="display-6">Umsätze in Chart.js</h1>
            </div>
            <div class="card-body">
                <canvas id="bar-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="display-6">Karte von Trier in Leaflet</h6>
            </div>
            <div class="card-body">
                <div id="map" class="rounded shadow"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Zentrum auf Trier setzen
        const map = L.map('map').setView([49.756, 6.638], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Marker für Trier
        L.marker([49.756, 6.638]).addTo(map)
            .bindPopup('Trier')
            .openPopup();
    });

    //setzte die höhe der map auf die höhe des chartes
    const chartHeight = document.getElementById("bar-chart").offsetHeight;
    document.getElementById("map").style.height = chartHeight + "px";

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