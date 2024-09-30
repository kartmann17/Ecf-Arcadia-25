<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>

<div class="container mt-5 mb-5 rapport-container">
    <h2 class="mb-4">Rapport des animaux</h2>

    <!-- Tableau des rapports -->
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
        <?php foreach ($rapports as $rapport): ?>
        <tbody>
            
            <tr>
                <td><?= $rapport->nom?></td>
                <td><?= $rapport->date?></td>
                <td><?= $rapport->status?></td>
                <td><?= $rapport->nourriture_reco?></td>
                <td><?= $rapport->grammage_reco?></td>
                <td><?= $rapport->sante?></td>
                <td><?= $rapport->repas_donnees?></td>
                <td><?= $rapport->quantite?></td>
                <td><?= $rapport->commentaire?></td>
                <td><?= $rapport->id_User?></td>
                <td><?= $rapport->id_animal?></td>
                <td>
                    <button class="btn btn-warning btn-sm">Modifier</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>