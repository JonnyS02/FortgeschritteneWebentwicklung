<h2 class="text-center fw-light mb-4">
    Einsatzkarte
</h2>
<div id="map" style="height: 600px" class="rounded shadow"></div>

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
</script>