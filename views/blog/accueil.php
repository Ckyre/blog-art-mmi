<?php
$order = [];
foreach ($params['articles'] as $article) {
    $order[$article->numArt] = $article->getLikes();
}
arsort($order);
?>

<section class="accueil">
    <div class="container-left">
        <div class="container-grid-left">

            <?php
            $i = 0;

            foreach ($order as $key => $value) {
                foreach ($params['articles'] as $article) {
                    if ($article->numArt == $key) {
                        if ($i == 0) {
            ?>
                            <div class="main-article">
                                <a href="/articles/<?= $article->numArt ?>">
                                <div class="cont">
                                    <h1 id="mobileh2-main"><?= $article->libTitrArt ?></h1>
                                    <img src="public\img\imgss.png" alt="">
                                    <div class="desc">
                                        <h1><?= $article->libTitrArt ?></h1>
                                        <p><?= $article->getExcerpt() ?></p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        <?php
                            $i++;
                        } else {
                        ?>
                            <div class="article">
                                <a href="/articles/<?= $article->numArt ?>">
                                    <div class="cont">
                                        <img src="public\img\imgss.png" alt="">
                                    </div>
                                    <div class="desc-article">
                                        <h2><?= $article->libTitrArt ?></h2>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.5 56.5">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: none;
                                                            stroke: #fff;
                                                            stroke-linecap: round;
                                                            stroke-miterlimit: 10;
                                                            stroke-width: 4px;
                                                        }
                                                    </style>
                                                </defs>
                                                <title>plus-def</title>
                                                <g id="Calque_2" data-name="Calque 2">
                                                    <g id="Calque_1-2" data-name="Calque 1">
                                                        <line class="cls-1" x1="28.25" y1="44.06" x2="28.25" y2="12.45" />
                                                        <line class="cls-1" x1="12.45" y1="28.25" x2="44.06" y2="28.25" />
                                                        <circle class="cls-1" cx="28.25" cy="28.25" r="26.25" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.5 56.5">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: none;
                                                        stroke: #fff;
                                                        stroke-linecap: round;
                                                        stroke-miterlimit: 10;
                                                        stroke-width: 4px;
                                                    }
                                                </style>
                                            </defs>
                                            <title>plus-def</title>
                                            <g id="Calque_2" data-name="Calque 2">
                                                <g id="Calque_1-2" data-name="Calque 1">
                                                    <line class="cls-1" x1="28.25" y1="44.06" x2="28.25" y2="12.45" />
                                                    <line class="cls-1" x1="12.45" y1="28.25" x2="44.06" y2="28.25" />
                                                    <circle class="cls-1" cx="28.25" cy="28.25" r="26.25" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div><?php
                                }
                            }
                        }
                    }

                                    ?>
        </div>

    </div>

    <div class="container-right">
        <div class="container-grid-right">
            <div class="newsletter">
                <h2>NEWSLETTER</h2>

                <!-- <label for="name">Name (4 to 8 characters):</label> -->
                <input class="input" type="text" id="name" name="name" placeholder="E-mail" required size="20">
                <button class="button-sinsc"><a href="/404" style="text-decoration:none">S'INSCRIRE</a></button>
            </div>
            <div class="a-propos">
                <a href="/apropos">
                    <div class="cont">
                        <img src="public\img\imgss.png" alt="">
                    </div>
                    <div class="desc">
                        <h2>QUI SUIS-JE ?</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>