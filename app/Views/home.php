<h2 class="text-center fw-light">
    Willkommen auf der Startseite!
</h2>

<div class="card" style="width: 18rem;">
    <div class="card-header">
        Personendaten als Liste
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach ($personen as $item): ?>
            <li class="list-group-item"><?= $item['name'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>
