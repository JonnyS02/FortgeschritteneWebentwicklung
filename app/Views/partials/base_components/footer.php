<footer class="d-flex justify-content-between pt-3 mt-5 border-top">
    <p class="text-body-secondary">© <?= date("Y") ?> Shirin Saleh & Jonathan Stengl</p>
    <a class="text-body-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
       title="Künstliche intelligenz Webseiten-Icon erstellt von Maan Icons - Flaticon"
       href="https://www.flaticon.com/de/kostenlose-icons/kunstliche-intelligenz">Icon from Flaticon</a>
</footer>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>