<nav class="navbar navbar-expand-sm bg-body-tertiary mb-4 shadow">
    <div class="container-fluid align-content-center">
        <a class="navbar-brand" href="<?= base_url(index_page()) . "/startseite" ?>">
            <img src="https://dozent.wi1we.uni-trier.de/public/assets/images/FWE-Logo.svg" width="250px" alt="Logo" class="mt-2 mb-2">
        </a>
        <?php if ($view != 'anmeldung') { ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="<?= $view == 'startseite' ? 'active' : '' ?> nav-link" aria-current="page"
                           href="<?= base_url(index_page()) . "/startseite" ?>">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $view == 'personen' ? 'active' : '' ?> nav-link" aria-current="page"
                           href="<?= base_url(index_page()) . "/personen" ?>">Personen</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $view == 'wetter' ? 'active' : '' ?> nav-link" aria-current="page"
                           href="<?= base_url(index_page()) . "/wetter" ?>">Wetter</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">Konto</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item interactive-navbar"
                                   href="<?= base_url(index_page()) . "/konto" ?>"><i
                                            class="fa-regular fa-circle-user"></i> Max Mustermann</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item interactive-navbar" href="<?= base_url(index_page()) ?>"><i
                                            class="fa-solid fa-power-off"></i> Abmelden</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-item px-3">
                                <div class="form-check form-switch d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" id="themeToggle">
                                    <label class="form-check-label d-flex align-items-center gap-1" for="themeToggle">Dark
                                        Mode
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>

<script>
    $(function () {
        const $toggle = $('#themeToggle'),
            $html = $('html');

        function apply(mode) {
            $html.attr('data-bs-theme', mode);
            localStorage.bsTheme = mode;
            $toggle.prop('checked', mode === 'dark');
        }

        apply(localStorage.bsTheme || 'light');

        $toggle.on('click', () => {
            apply($html.attr('data-bs-theme') === 'dark' ? 'light' : 'dark');
        });
    });
</script>
