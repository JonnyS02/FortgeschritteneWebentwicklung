<div class="card shadow">
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