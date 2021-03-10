<main class="dashboard">
	<h1>Mon compte</h1>
	<h2 class="articles-title-desktop">Mes articles enregistrés</h2>
	<section class="dashboard">
		<div class="left">
			<img class="profile-picture" src="https://picsum.photos/200/200" alt="Photo de profil">
			<h3><?= $params['user']->prenomMemb ?> <?= $params['user']->nomMemb ?></h3>
			<div class="likes">
				<img src="<?= SCRIPTS ?>img\like.png" alt="">
				<span>12</span>
			</div>
			<a href="/logout">Se déconnecter</a>
		</div>

		<div class="right">
			<h2 class="articles-title">Mes articles enregistrés</h2>
			<div class="articles-container">
				<ul>
				<?php
				if (!empty($params['articlesLiked'])) {
					foreach ($params['articlesLiked'] as $artLiked) { ?>
						
							<a href="/articles/<?= $artLiked->numArt ?>" style="text-decoration:none; color:black;">
								<li class='article'>
									<img src="/public/img/imgss.png" alt="">
									<div class="banniere">
										<h3><?= $artLiked->libTitrArt ?></h3>
										<img src="/public/img/like.png" alt="">
									</div>
								</li>
							</a>
						
				<?php }
				} else {
					echo "<p class='aucun-article'>Vous n'avez enregistré aucun article</p>";
				}
				?>
				</ul>
			</div>
			<div class="mdp-container">
				<h2>Changer mot de passe :</h2>
				<form action="POST">
					<div class="ancien">
						<label for="ancien">Ancien mot de passe :</label>
						<input type="text" name="ancien" placeholder="Ancien mot de passe">
					</div>
					<div class="milieu-mdp">
						<div class="nouveau">
							<label for="nouveau">Nouveau mot de passe :</label>
							<input type="text" name="nouveau" placeholder="Nouveau mot de passe">
						</div>
						<div class="confirmer">
							<label for="confirmer">Confirmer le mot de passe :</label>
							<input type="text" name="confirmer" placeholder="Nouveau mot de passe">
						</div>
					</div>
					<button type="submit" class="submit">VALIDER</button>
				</form>
			</div>
		</div>
		</div>

	</section>
</main>