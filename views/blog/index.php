<h1>Les derniers articles</h1>
<?php foreach ($params['articles'] as $article) : ?>
    <div class="card my-4">
        <div class="card-body">
            <small class="text-info">Publié le <?= $article->getCreatedAt() ?></small>
            <h2><?= $article->libTitrArt ?> <span class="badge badge-secondary"><?= $article->getLikes() ?></h2>
            <p><?= $article->getExcerpt() ?></p>
            <?= $article->getButton() ?>
            <hr>
            <div>
                <?php foreach ($article->getMotCles() as $motCle) : ?>
                    <span><a href="/motcles/<?= $motCle->numMotCle ?>" class="link-secondary"><?= $motCle->libMotCle ?></a></span>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endforeach ?>