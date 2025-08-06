<h2 class="text-center fw-light mb-4">
    AJAX-geladene Personentabelle
</h2>
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
       data-buttons="buttons"
       data-pagination="true"
       data-page-size="5"
       data-url="<?= base_url(index_page()) . '/getPersonenAJAX' ?>"
       data-show-export="true"
       data-export-types='["csv","excel","pdf"]'
       data-side-pagination="client">
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
