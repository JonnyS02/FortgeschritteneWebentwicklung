<div class="card shadow mx-auto">
    <div class="card-header">
        <h6 class="display-6"><i class="fa-solid fa-address-book text-primary"></i> AJAX-geladene Personentabelle</h6>
    </div>
    <div class="card-body">
        <table id="mainTable"
               data-locale="de-DE"
               data-toggle="table"
               data-search="true"
               data-show-columns="true"
               data-show-refresh="true"
               data-show-columns-toggle-all="true"
               data-show-pagination-switch="true"
               data-show-toggle="true"
               data-show-fullscreen="true"
               data-pagination="true"
               data-page-size="5"
               data-url="<?= base_url(index_page()) . '/getPersonenAJAX' ?>"
               data-show-export="true"
               data-export-types='["csv","excel","pdf"]'>
            <thead>
            <tr>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="vorname" data-sortable="true">Vorname</th>
                <th data-field="name" data-sortable="true">Nachname</th>
                <th data-field="strasse" data-sortable="true">Straße</th>
                <th data-field="plz" data-sortable="true">PLZ</th>
                <th data-field="ort" data-sortable="true">Ort</th>
                <th data-field="username" data-sortable="true">Username</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<a href="#" class="btn btn-primary mt-3" id="pdfButton">
    Liste als PDF (aber in schön)
</a>

<script>
    $('#pdfButton').on('click', function (e) {
        e.preventDefault();

        var visibleRows = $('#mainTable').bootstrapTable('getData', { useCurrentPage: true });

        var ids = visibleRows.map(function(row) {
            return row.id;
        });

        $.ajax({
            url: '<?= base_url(index_page()) . "/getPersonenPDF" ?>',
            type: 'POST',
            data: { ids: ids },
            xhrFields: { responseType: 'blob' },
            success: function(data) {
                var blob = new Blob([data], { type: 'application/pdf' });
                var url = URL.createObjectURL(blob);
                window.location.href = url;
            },
            error: function(xhr) {
                alert("Fehler beim Generieren des PDFs: " + xhr.status);
            }
        });
    });
</script>