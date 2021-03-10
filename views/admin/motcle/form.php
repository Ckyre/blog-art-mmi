<main class="admin">
    <section class="admin-section">
        <h1><?= isset($params['motcle']) ? 'Modifier le mot clé' : 'Créer un nouveau mot clé' ?></h1>
        <a href="/admin/motcle" class="btn btn-back">Revenir aux mots-clés</a>

        <form action="<?= isset($params['motcle']) ? "/admin/motcles/edit/{$params['motcle']->numMotCle}" : "/admin/motcles/create" ?>"
        method="POST">

            <div class="form-group">
                <label for="libMotCle">Nom</label>
                <input type="text" name="libMotCle" id="libMotCle" class="form-control" value="<?= $params['motcle']->libMotCle ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="numLang">Langue</label>
                <select class="form-control" id="numLang" name="numLang">
                    <?php foreach ($params['langues'] as $langue): ?>
                        <option value="<?= $langue->numLang ?>"
                        <?php if (isset($params['motcle'])): ?>
                                <?= ($langue->numLang === $params['motcle']->numLang) ? 'selected' : ''; ?>
                        <?php endif ?>><?= $langue->lib1Lang ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><?= isset($params['motcle']) ? 'Enregistrer les modifications' 
            : 'Créer mon mot clé' ?></button>
        </form>
    </section>
</main>