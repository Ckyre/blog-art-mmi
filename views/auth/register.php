<?php if (isset($_SESSION['errors'])) : ?>
    <ul class="login-register-fail">
        <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
            <?php foreach ($errorsArray as $errors) : ?>
                <?php foreach ($errors as $error) : ?>
                    <?php
                        if ($error == "nomMemb est requis.") {
                            echo "<li>Votre nom est requis</li>";
                        } else if ($error == "nomMemb doit comprendre un minimum de 2 caractères.") {
                            echo "<li>Votre nom doit contenir au moins 2 caractères.</li>";
                        } else if ($error == "prenomMemb est requis.") {
                            echo "<li>Votre prénom est requis</li>";
                        } else if ($error == "prenomMemb doit comprendre un minimum de 2 caractères.") {
                            echo "<li>Votre prénom doit contenir au moins 2 caractères.</li>";
                        } else if ($error == "pseudoMemb est requis.") {
                            echo "<li>Un identifiant est requis</li>";
                        } else if ($error == "pseudoMemb doit comprendre un minimum de 2 caractères.") {
                            echo "<li>Votre identifiant doit contenir au moins 2 caractères.</li>";
                        } else if ($error == "eMailMemb est requis.") {
                            echo "<li>Votre adresse mail est requise</li>";
                        } else if ($error == "L'adresse email n'est pas valide.") {
                            echo "<li>L'adresse mail n'est pas valide</li>";
                        } else if ($error == "passMemb est requis.") {
                            echo "<li>Un mot de passe est requis</li>";
                        } else if ($error == "passMemb doit comprendre un minimum de 6 caractères.") {
                            echo "<li>Votre mot de passe doit contenir au moins 6 caractères.</li>";
                        }
                    ?>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endforeach ?>
    </ul>
<?php endif ?>
<?php session_destroy() ?>

<div class="register-container">
    <div class="login-top-buttons">
       <a href="/login"><input type="button" value="Connexion"></a>
        <input type="button" value="Inscription" class="active">
    </div>

    <form action="/register" method="POST">
        <input type="text" name="nomMemb" placeholder="Nom">
        <input type="text" name="prenomMemb" placeholder="Prénom">
        <input type="text" name="pseudoMemb" placeholder="Identifiant">
        <input type="email" name="eMailMemb" placeholder="Email">
        <input type="password" name="passMemb" placeholder="Mot de passe">
        <button type="submit">S'inscrire</button>
    </form>
</div>