<footer class="d-flex justify-content-between pt-3 mt-5 border-top">
    <p class="text-body-secondary">© <?= date("Y") ?> Shirin Saleh & Jonathan Stengl</p>
    <a class="text-body-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
       title="Quelle des Webseiten Icons: www.freepik.com"
       href="https://www.freepik.com">Icon by Freepik</a>
    <!--a href="https://www.flaticon.com/de/kostenlose-icons/blog" title="blog Icons">Blog Icons erstellt von Canticons - Flaticon</a!-->
</footer>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>