<main class="admin">
    <section class="admin-section">
    <h1><?= $params['statut']? 'Modifier le statut' : 'Créer un nouveau statut' ?></h1>
    <a href="/admin/statuts" class="btn btn-back">Revenir aux statuts</a>

    <form action="<?= isset($params['statut']) ? "/admin/statuts/edit/{$params['statut']->idStat}" : "/admin/statuts/create" ?>"
    method="POST">

        <div class="form-group">
            <label for="libStat">Nom</label>
            <input type="text" name="libStat" id="libStat" class="form-control" value="<?= $params['statut']->libStat ?? "" ?>">
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($params['statut']) ? 'Enregistrer les modifications' 
        : 'Créer mon statut' ?></button>
    </form>
    </section>
</main>