<nav class="navbar navbar-expand-sm bg-body-tertiary mb-4 shadow">
    <div class="container-fluid align-content-center">
        <a class="navbar-brand" href="<?= base_url(index_page()) . "/startseite" ?>">
            <img src="https://dozent.wi1we.uni-trier.de/public/assets/images/FWE-Logo.svg" width="200px" alt="Logo" class="mt-2 mb-2 invert-dark">
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
                           href="<?= base_url(index_page()) . "/startseite" ?>">
                            <i class="fas fa-home me-1"></i> Startseite
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $view == 'personen' ? 'active' : '' ?> nav-link" aria-current="page"
                           href="<?= base_url(index_page()) . "/personen" ?>">
                            <i class="fas fa-users me-1"></i> Personen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $view == 'umsatz' ? 'active' : '' ?> nav-link" aria-current="page"
                           href="<?= base_url(index_page()) . "/umsatz" ?>">
                            <i class="fas fa-chart-line me-1"></i> Umsätze
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $view == 'KIChat' ? 'active' : '' ?> nav-link" aria-current="page"
                           href="<?= base_url(index_page()) . "/KIChat" ?>">
                            <i class="fas fa-robot me-1"></i> KI-Chat
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            GitHub
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://github.com/JonnyS02/FortgeschritteneWebentwicklung"><i class="fa-brands fa-php"></i> Dieses Projekt</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="https://github.com/JonnyS02/FWE-react-app"><i class="fa-brands fa-react"></i> React Projekt</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="navbar-nav me-1">
                    <li class="nav-item">
                        <div class="form-check form-switch d-flex align-items-center">
                            <input class="form-check-input me-2" type="checkbox" id="themeToggle">
                            <label class="form-check-label d-flex align-items-center gap-1" for="themeToggle">Dark
                                Mode
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>

<style>
    [data-bs-theme="dark"] .invert-dark {
        filter: invert(1) hue-rotate(180deg);
    }
</style>

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
