<main class="admin">
    <section class="admin-section">
        <h1 class="mt-5"><?= isset($params['them']) ? 'Modifier la thématique' : 'Créer une nouvelle thématique' ?></h1>
        <a href="/admin/thems" class="btn btn-back">Revenir aux thématiques</a>

        <form action="<?= isset($params['them']) ? "/admin/thems/edit/{$params['them']->numThem}" : "/admin/thems/create" ?>"
        method="POST">

            <div class="form-group">
                <label for="libThem">Nom</label>
                <input type="text" name="libThem" id="libThem" class="form-control" value="<?= $params['them']->libThem ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="numLang">Langue</label>
                <select class="form-control" id="numLang" name="numLang">
                    <?php foreach ($params['langues'] as $langue): ?>
                        <option value="<?= $langue->numLang ?>"
                        <?php if (isset($params['them'])): ?>
                                <?= ($langue->numLang === $params['them']->numLang) ? 'selected' : ''; ?>
                        <?php endif ?>><?= $langue->lib1Lang ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><?= isset($params['them']) ? 'Enregistrer les modifications' 
            : 'Créer ma thématique' ?></button>
        </form>