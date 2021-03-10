<main class="admin">
    <section class="admin-section">
<h1>Modifier les données de l'utilisateur</h1>
<a href="/admin/users" class="btn btn-back">Revenir aux utilisateurs</a>


<form action="/admin/users/edit/<?= $params['user']->numMemb ?>"
 method="POST">

    <div class="form-group">
        <label for="nomMemb">Nom</label>
        <input type="text" name="nomMemb" id="nomMemb" class="form-control" value="<?= $params['user']->nomMemb ?? "" ?>">
    </div>

    <div class="form-group">
        <label for="prenomMemb">Prénom</label>
        <input type="text" name="prenomMemb" id="prenomMemb" class="form-control" value="<?= $params['user']->prenomMemb ?? "" ?>">
    </div>

    <div class="form-group">
        <label for="pseudoMemb">Pseudo</label>
        <input type="text" name="pseudoMemb" id="pseudoMemb" class="form-control" value="<?= $params['user']->pseudoMemb ?? "" ?>">
    </div>

    <div class="form-group">
        <label for="eMailMemb">Email</label>
        <input type="text" name="eMailMemb" id="eMailMemb" class="form-control" value="<?= $params['user']->eMailMemb ?? "" ?>">
    </div>

    <div class="form-group">
        <label for="idStat">Statut</label>
        <select class="form-control" id="idStat" name="idStat">
            <?php foreach ($params['statuts'] as $statut): ?>
                <option value="<?= $statut->idStat ?>"
                    <?= ($statut->idStat === $params['user']->idStat) ? 'selected' : ''; ?>
                ><?= $statut->libStat ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>