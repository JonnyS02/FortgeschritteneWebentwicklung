<div class="row">
    <div class="col-md-6">
        <div class="card shadow h-100">
            <div class="card-header">
                <h6 class="display-6">Karte von Trier in Leaflet</h6>
            </div>
            <div class="card-body">
                <div id="map"  class="rounded h-100"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow h-100 mt-md-0 mt-4">
            <div class="card-header">
                <h6 class="display-6">Wetter von OpenWeatherMap</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="w-100"><img src="https://openweathermap.org/img/wn/<?= $wetter['weather'][0]['icon'] ?>@2x.png" alt="Wetter-Icon" class="w-50 w-md-75"></div>
                            Das Wetter in Trier ist derzeit <h6 class="display-6"><?= $wetter['weather'][0]['description'] ?></h6> mit einer Temperatur von <h6 class="display-6"><?= $wetter['main']['temp'] ?>°C.</h6>
                    </div>
                    <div class="col">
                        <table class="table table-striped border mt-3">
                            <tbody>
                            <tr>
                                <td>Temperatur</td>
                                <td><?= $wetter['main']['temp'] ?> °C</td>
                            </tr>
                            <tr>
                                <td>Gefühlt</td>
                                <td><?= $wetter['main']['feels_like'] ?> °C</td>
                            </tr>
                            <tr>
                                <td>Tiefstwerte</td>
                                <td><?= $wetter['main']['temp_min'] ?> °C</td>
                            </tr>
                            <tr>
                                <td>Höchstwerte</td>
                                <td><?= $wetter['main']['temp_max'] ?> °C</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped border">
                            <tbody>
                            <tr>
                                <td>Luftfeuchtigkeit</td>
                                <td><?= $wetter['main']['humidity'] ?> %</td>
                            </tr>
                            <tr>
                                <td>Luftdruckk</td>
                                <td><?= $wetter['main']['pressure'] ?> hPa</td>
                            </tr>
                            <tr>
                                <td>Windgeschwindigkeit</td>
                                <td><?= $wetter['wind']['speed'] ?> m/s</td>
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
    const map = L.map('map').setView([49.747558, 6.675591], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    const faIcon = L.divIcon({
        html: '<i class="fa-solid fa-building-columns fa-2x"></i>',
        className: '',
        iconSize: [32, 32],
        iconAnchor: [13, 16]
    });

    L.marker([49.747558, 6.675591],{
        icon: faIcon,
    })
        .addTo(map)
        .bindPopup('<i class="fa-solid fa-building-columns"></i> Universität Trier')
        .openPopup();

    L.circle([49.747558, 6.675591], {
        color: '#47cef0',
        fillColor: '#blue',
        fillOpacity: 0.2,
        radius: 150
    }).addTo(map);

</script>