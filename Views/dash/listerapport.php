<link rel="stylesheet" href="/Asset/css/dashindex.css">
<div class="vide"></div>

<div class="container mt-5 mb-5 rapport-container">
    <h2 class="mb-4">Rapport des animaux</h2>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom de l'animal</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Nourriture recommandée</th>
                    <th>Grammage recommandé (g)</th>
                    <th>Santé (/10)</th>
                    <th>Repas donnés</th>
                    <th>Quantité donnée (g)</th>
                    <th>Commentaire</th>
                    <th>ID Utilisateur</th>
                    <th>ID Animal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rapports as $rapport): ?>
                    <tr>
                        <td><?= $rapport->nom ?></td>
                        <td><?= $rapport->date ?></td>
                        <td><?= $rapport->status ?></td>
                        <td><?= $rapport->nourriture_reco ?></td>
                        <td><?= $rapport->grammage_reco ?></td>
                        <td><?= $rapport->sante ?></td>
                        <td><?= $rapport->repas_donnees ?></td>
                        <td><?= $rapport->quantite ?></td>
                        <td><?= $rapport->commentaire ?></td>
                        <td><?= $rapport->id_User ?></td>
                        <td><?= $rapport->id_animal ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="/DashRapport/updateRapport/<?= $rapport->id ?>" class="btn btn-warning ">Modifier</a>
                                <form action="/DashRapport/deleteRapport" method="POST" onsubmit="return confirm('êtes-vous sûr de vouloir supprimer ce rapport ?');">
                                    <input type="hidden" name="id" value="<?= $rapport->id ?>">
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>