<h2 class="text-center fw-light">
    Willkommen auf der Startseite!
</h2>
<ul>
    <?php foreach ($test as $item): ?>
        <li><?= $item['name'] ?></li>
    <?php endforeach; ?>
</ul>
<?php var_dump($test); ?>