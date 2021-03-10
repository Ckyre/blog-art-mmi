<main class="admin">
    <section class="admin-section">
        <h1><?= isset($params['article']) ? 'Modifier l\'article' : 'Créer un nouvel article' ?></h1>
        <a href="/admin/articles" class="btn btn-back">Revenir aux articles</a>

        <form action="<?= isset($params['article']) ? "/admin/articles/edit/{$params['article']->numArt}" : "/admin/articles/create" ?>"
        method="POST" class="article-form">
            <div class="form-group">
                <label for="libTitrArt">Titre de l'article</label>
                <input type="text" name="libTitrArt" id="libTitrArt" class="form-control" value="<?= $params['article']->libTitrArt ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="libChapoArt">Chapeau</label>
                <textarea name="libChapoArt" id="libChapoArt" rows="6" class="form-control"><?= $params['article']->libChapoArt ?? "" ?></textarea>
            </div>

            <div class="form-group">
                <label for="libAccrochArt">Accroche</label>
                <textarea name="libAccrochArt" id="libAccrochArt" rows="3" class="form-control"><?= $params['article']->libAccrochArt ?? "" ?></textarea>
            </div>

            <div class="form-group">
                <label for="parag1Art">Premier paragraphe</label>
                <textarea name="parag1Art" id="parag1Art" rows="8" class="form-control"><?= $params['article']->parag1Art ?? "" ?></textarea>
            </div>

            <div class="form-group">
                <label for="libSsTitr1Art">Premier sous-titre</label>
                <input type="libSsTitr1Art" name="libSsTitr1Art" id="libSsTitr1Art" class="form-control" value="<?= $params['article']->libSsTitr1Art ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="parag2Art">Deuxième paragraphe</label>
                <textarea name="parag2Art" id="parag2Art" rows="8" class="form-control"><?= $params['article']->parag2Art ?? "" ?></textarea>
            </div>

            <div class="form-group">
                <label for="libSsTitr2Art">Deuxième sous-titre</label>
                <input type="libSsTitr2Art" name="libSsTitr2Art" id="libSsTitr2Art" class="form-control" value="<?= $params['article']->libSsTitr2Art ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="parag3Art">Troisième paragraphe</label>
                <textarea name="parag3Art" id="parag3Art" rows="8" class="form-control"><?= $params['article']->parag3Art ?? "" ?></textarea>
            </div>

            <div class="form-group">
                <label for="libConclArt">Conclusion</label>
                <textarea name="libConclArt" id="libConclArt" rows="6" class="form-control"><?= $params['article']->libConclArt ?? "" ?></textarea>
            </div>

            <div class="form-group">
                <label for="numThem">Thématique</label>
                <select class="form-control" id="numThem" name="numThem">
                    <?php foreach ($params['thematiques'] as $them): ?>
                        <option value="<?= $them->numThem ?>"
                        <?php if (isset($params['article'])): ?>
                                <?= ($them->numThem === $params['article']->numThem) ? 'selected' : ''; ?>
                        <?php endif ?>><?= $them->libThem ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label for="numAngl">Angle</label>
                <select class="form-control" id="numAngl" name="numAngl">
                    <?php foreach ($params['angles'] as $angle): ?>
                        <option value="<?= $angle->numAngl ?>"
                        <?php if (isset($params['article'])): ?>
                                <?= ($angle->numAngl === $params['article']->numAngl) ? 'selected' : ''; ?>
                        <?php endif ?>><?= $angle->libAngl ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label for="motcles">Mot-clé</label>
                <select multiple class="form-control form-control-keywords" id="motcles"
                name="motcles[]">
                    <?php foreach ($params['motcles'] as $motCle): ?>
                        <option value="<?= $motCle->numMotCle ?>"
                        <?php if (isset($params['article'])): ?>
                            <?php foreach ($params['article']->getMotCles() as $articleMotCle) {
                            echo ($motCle->numMotCle === $articleMotCle->numMotCle) ? 'selected' : '';
                            } ?>
                        <?php endif ?>><?= $motCle->libMotCle ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><?= isset($params['article']) ? 'Enregistrer les modifications' 
            : 'Créer mon article' ?></button>
        </form>
    </section>
</main>