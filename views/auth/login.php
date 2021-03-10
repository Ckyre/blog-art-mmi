<?php if (isset($_SESSION['errors'])) : ?>
    <ul class="login-register-fail">
        <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
            <?php foreach ($errorsArray as $errors) : ?>
                <?php foreach ($errors as $error) : ?>
                    <?php
                        if ($error == "pseudoMemb est requis.") {
                            echo "<li>L'identifiant est manquant.</li>";
                        } else if ($error == "passMemb est requis.") {
                            echo "<li>Le mot de passe est manquant.</li>";
                        } else if ($error == "Mauvais mot de passe.") {
                            echo "<li>Mauvais mot de passe.</li>";
                        } else {
                            echo "<li>Cet identifiant n'existe pas.</li>";
                        }
                    ?>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endforeach ?>
    </ul>
<?php endif ?>
<?php session_destroy() ?>


<div class="login-container">
    <div class="login-top-buttons">
        <input type="button" value="Connexion" class="active">
        <a href="/register"><input type="button" value="Inscription"></a>
    </div>
    <form action="/login" method="POST">
        <input type="text" placeholder="Identifiant" name="pseudoMemb">
        <input type="password" placeholder="Mot de passe" name="passMemb">
        <button type="submit">Se connecter</button>
    </form>
</div>