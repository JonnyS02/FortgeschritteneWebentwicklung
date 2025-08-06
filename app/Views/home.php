<h2 class="text-center fw-light">
    Willkommen auf der Startseite!
</h2>
<table id="mainTable"
       id="mainTable"
       data-toggle="table"
       data-show-columns="true"
       data-show-refresh="true"
       data-show-columns-toggle-all="true"
       data-show-pagination-switch="true"
       data-show-toggle="true"
       data-show-fullscreen="true"
       data-buttons="buttons"
       data-pagination="true"
       data-page-size="5"
       data-url="<?= base_url(index_page()) . "/getPersonenAJAX" ?>">
    <thead>
    <tr>
        <th data-field="id" data-sortable="true">#</th>
        <th data-field="vorname" data-sortable="true">Vorname</th>
        <th data-field="name" data-sortable="true">Nachname</th>
        <th data-field="strasse">Straße</th>
        <th data-field="plz">PLZ</th>
        <th data-field="ort">Ort</th>
        <th data-field="username">Username</th>
    </tr>
    </thead>
</table>
