
<main class="article-page">
    <a href="/articles" class="btn btn-back">Revenir en arrière</a>
    
    <!-- Contenu de l'article -->
    <article>
            
        <header>
            <small class="date">Publié le <?= $params['article']->getCreatedAt() ?></small>
            <div class="title">
                <img src="/public/img/byjames.png" alt="">
                <h1><?= $params['article']->libTitrArt ?></h1>
                <svg width="72" height="8" viewBox="0 0 72 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="8" height="8" transform="matrix(1 0 0 -1 0 8)" fill="black" fill-opacity="0.54" />
                    <rect width="8" height="8" transform="matrix(1 0 0 -1 42.6667 8)" fill="black" fill-opacity="0.54" />
                    <rect width="8" height="8" transform="matrix(1 0 0 -1 21.3333 8)" fill="black" fill-opacity="0.54" />
                    <rect width="8" height="8" transform="matrix(1 0 0 -1 64 8)" fill="black" fill-opacity="0.54" />
                </svg>
            </div>

            <div class="like-container">
                <span class="btn btn-like-count"><?= $params['article']->getLikes() ?>
                <?php if ($params['article']->getLikes() === 0 || $params['article']->getLikes() === 1) {
                    echo "Like";
                } else {
                    echo "Likes";
                } ?>
                </span>
                
                

                <form action="/like/<?= $params['article']->numArt ?>" method="POST">
                    <input type="submit" value="Like" class="btn btn-like">
                </form>
            </div>
            
        </header>

        <p><?= $params['article']->libChapoArt ?></p>
        <p><?= $params['article']->libAccrochArt ?></p>

        <h2><?= $params['article']->libSsTitr1Art ?></h2>
        <p><?= $params['article']->parag1Art ?></p>

        <h2><?= $params['article']->libSsTitr2Art ?></h2>
        <p><?= $params['article']->parag2Art ?></p>

        <p><?= $params['article']->parag3Art ?></p>
        <p><?= $params['article']->libConclArt ?></p>

    </article>

    <hr>

    <div class="keywords">
        <?php foreach ($params['article']->getMotCles() as $motCle) : ?>
            <span class="keyword"><?= $motCle->libMotCle ?></span>
        <?php endforeach ?>
    </div>

    <hr>

    <h3>Commentaires</h3>
    <?php
    $i = 0;
    foreach ($params['comments'] as $comment) : ?>
        <?php while ($i <= 2) : ?>
            <div class="comment-container">
                <img class="profile-picture" src="https://picsum.photos/200/200" alt="">
                <div class="infos-comment">
                    <div class="author">
                        <h4><?= $comment->getAuthorName() ?></h4>
                        <span class="date">Publié le <?= getFormattedDate($comment->dtCreCom) ?></span>
                    </div>
                    <p><?= $comment->libCom ?></p>
                </div>
            </div>
            <?php $i++ ?>
        <?php endwhile ?>
        <div class="comment-container comment-container-invisible">
            <img class="profile-picture" src="https://picsum.photos/200/200" alt="">
            <div class="infos-comment">
                <div class="author">
                    <h4><?= $comment->getAuthorName() ?></h4>
                    <span class="date"><?= getFormattedDate($comment->dtCreCom) ?></span>
                </div>
                <p><?= $comment->libCom ?></p>
            </div>
        </div>
    <?php endforeach ?>
    <?php if ($i >= 3) : ?>
        <?= "<button class='more-comments'>VOIR PLUS</button>" ?>
    <?php endif ?>

    <?php
    // foreach ($params['orders'] as $order) {
    //     echo $order;
    //     // var_dump($params['replies']);
    //     echo $order . " n'est pas une réponse<br>";

    // }
    // foreach ($params['replies'] as $reply) {
    //     foreach ($reply as $key => $value) {
    //         echo $value . '<br>';
    //     }
    // }
    ?>
</main>