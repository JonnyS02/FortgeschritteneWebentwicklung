<div class="card shadow mx-auto mt-5 smaller-width" style="max-width: 30rem">
    <div class="card-header">
        <h1 class="display-6">Anmeldung</h1>
    </div>
    <div class="card-body">
        <form action="<?= base_url(index_page()) . '/startseite' ?>" method="post">
            <div class="form-group mb-3">
                <label for="email" class="col-form-label">E-Mail:</label>
                <input type="email" name="email" id="email" value="test.testheimer@testhausen.de" class="form-control " placeholder="Benutzername"
                       required autofocus>
                <div class="invalid-feedback mx-2">
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="col-form-label">Passwort:</label>
                <input type="password" name="password" id="password" value="Passwort123" class="form-control "
                       placeholder="Passwort" required>
                <div class="invalid-feedback mx-2">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Einloggen</button>
            </div>
        </form>
    </div>
</div>