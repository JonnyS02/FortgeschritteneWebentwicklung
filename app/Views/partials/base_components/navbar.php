<nav class="navbar navbar-expand-sm bg-body-tertiary mb-4 shadow">
    <div class="container-fluid align-content-center">
        <a class="navbar-brand mb-0 h1 text-primary"
           href="<?= base_url(index_page()) . "/home" ?>">F-WE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ($view != 'login') { ?>
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="active <?= $view == 'home' ? 'text-decoration-underline' : '' ?> nav-link" aria-current="page" href="<?= base_url(index_page()) . "/home" ?>">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="active <?= $view == 'map' ? 'text-decoration-underline' : '' ?> nav-link" aria-current="page" href="<?= base_url(index_page()) . "/map" ?>">Karte</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown-center">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Konto</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item interactive-navbar" href="<?= base_url(index_page()) . "/profile" ?>"><i class="fa-regular fa-circle-user" style="font-size: unset"></i> Max Mustermann</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item interactive-navbar" href="<?= base_url(index_page()) ?>"><i class="fa-solid fa-power-off" style="font-size: unset"></i> Abmelden</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>