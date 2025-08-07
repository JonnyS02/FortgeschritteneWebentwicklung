<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow h-100">
            <div class="card-header">
                <h6 class="display-6">Karte von Trier in Leaflet</h6>
            </div>
            <div class="card-body">
                <div id="map" style="min-height: 600px" class="rounded"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow h-100">
            <div class="card-header">
                <h6 class="display-6">Wetter von Trier</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="https://openweathermap.org/img/wn/<?= $wetter['weather'][0]['icon'] ?>@2x.png" alt="Wetter-Icon">
                    </div>
                    <div class="col">
                        Das Wetter in Trier ist derzeit <b><?= $wetter['weather'][0]['description'] ?></b> mit einer Temperatur von <?= $wetter['main']['temp'] ?>°C.
                        <table class="table table-striped border mt-3">
                            <tbody>
                            <tr>
                                <td>Temperatur</td>
                                <td><?= $wetter['main']['temp'] ?></td>
                            </tr>
                            <tr>
                                <td>Gefühlte Temperatur</td>
                                <td><?= $wetter['main']['feels_like'] ?></td>
                            </tr>
                            <tr>
                                <td>Tiefstwerte</td>
                                <td><?= $wetter['main']['temp_min'] ?></td>
                            </tr>
                            <tr>
                                <td>Höchstwerte</td>
                                <td><?= $wetter['main']['temp_max'] ?></td>
                            </tr>
                            <tr>
                                <td>Wind</td>
                                <td><?= $wetter['wind']['speed'] ?></td>
                            </tr>
                            <tr>
                                <td>Höchstwerte</td>
                                <td><?= $wetter['main']['temp_max'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const map = L.map('map').setView([49.747558, 6.675591], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);
    L.marker([49.747558, 6.675591]).addTo(map).bindPopup('<i class="fa-solid fa-building-columns"></i> Universität Trier').openPopup();
</script>