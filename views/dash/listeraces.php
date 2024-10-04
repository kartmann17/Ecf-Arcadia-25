<link rel="stylesheet" href="/Asset/css/dashindex.css">
<div class="vide"></div>
<div class="container mt-5 mb-5 races-container">
    <h2 class="mb-4">Gestion des Races</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach ($races as $race): ?>
            <tbody>
                <tr>
                    <td><?= $race->race ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="/DashRace/updateRace/<?= $race->id ?>" class="btn btn-warning btn-sm me-1">Modifier</a>

                            <form action="/DashRace/deleteRace" method="POST" onsubmit="return confirm('etes vous sur de vouloir supprimer cette race ?');">
                                <input type="hidden" name="id" value="<?= $race->id ?>">
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>