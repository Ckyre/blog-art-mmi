<main class="admin">
    <section class="admin-section">
        <h1><?= isset($params['angle']) ? 'Modifier l\'angle' : 'Créer un nouvel angle' ?></h1>
        <a href="/admin/angles" class="btn btn-back">Revenir aux angles</a>

        <form action="<?= isset($params['angle']) ? "/admin/angles/edit/{$params['angle']->numAngl}" : "/admin/angles/create" ?>"
        method="POST">

            <div class="form-group">
                <label for="libAngl">Nom</label>
                <input type="text" name="libAngl" id="libAngl" class="form-control" value="<?= $params['angle']->libAngl ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="numLang">Langue</label>
                <select class="form-control" id="numLang" name="numLang">
                    <?php foreach ($params['langues'] as $langue): ?>
                        <option value="<?= $langue->numLang ?>"
                        <?php if (isset($params['angle'])): ?>
                                <?= ($langue->numLang === $params['angle']->numLang) ? 'selected' : ''; ?>
                        <?php endif ?>><?= $langue->lib1Lang ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <button type="submit" class="btn"><?= isset($params['angle']) ? 'Enregistrer les modifications' 
            : 'Créer mon angle' ?></button>
        </form>
    </section>
</main>