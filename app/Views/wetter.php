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
            </div>
        </div>
    </div>
</div>