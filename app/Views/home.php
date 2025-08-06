<h2 class="text-center fw-light">
    Willkommen auf der Startseite!
</h2>
<table id="mainTable"
       class="table table-striped"
       data-toggle="table"
       data-search="true"
       data-pagination="true"
       data-page-size="5"
       data-show-refresh="true"
       data-show-columns="true"
       data-toolbar="#toolbar">

    <thead>
    <tr>
        <th data-field="id"        data-sortable="true">#</th>
        <th data-field="firstName" data-sortable="true">Vorname</th>
        <th data-field="lastName"  data-sortable="true">Nachname</th>
        <th data-field="handle">Handle</th>
    </tr>
    </thead>

    <tbody>
    <tr><td>1</td><td>Mark</td><td>Otto</td><td>@mdo</td></tr>
    <tr><td>2</td><td>Jacob</td><td>Thornton</td><td>@fat</td></tr>
    <tr><td>3</td><td>Larry</td><td>Bird</td><td>@twitter</td></tr>
    <tr><td>4</td><td>Peter</td><td>Parker</td><td>@spidey</td></tr>
    <tr><td>5</td><td>Tony</td><td>Stark</td><td>@ironman</td></tr>
    <tr><td>6</td><td>Natasha</td><td>Romanoff</td><td>@blackwidow</td></tr>
    </tbody>
</table>

<script>
    $('#addRow').on('click', function () {
        const nextId = $('#mainTable').bootstrapTable('getData').length + 1;
        $('#mainTable').bootstrapTable('append', {
            id: nextId,
            firstName: 'Neue',
            lastName: 'Zeile',
            handle: '@neu'
        });
    });
</script>
