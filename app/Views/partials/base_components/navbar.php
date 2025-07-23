<nav class="navbar navbar-expand-sm bg-body-tertiary mb-4 shadow">
    <div class="container-fluid align-content-center">
        <a class="navbar-brand mb-0 h1 text-primary"
           href="<?= base_url(index_page()) . "/home" ?>">F-WE</a>
        <?php if ($chosen_menu_item != 'Anmeldung') { ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="active <?= $chosen_menu_item == 'Startseite' ? 'text-decoration-underline' : ''?> nav-link" aria-current="page" href="<?= base_url(index_page()) . "/home" ?>">Startseite</a>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>