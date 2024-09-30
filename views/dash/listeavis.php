<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">liste des avis</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ETOILES</th>
                    <th>Nom</th>
                    <th>Commentaire</th>
                    <th>date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($Avis as $avis): ?>
            <tbody>
                <tr>
                    <td><?= $avis->etoiles?></td>
                    <td><?= $avis->nom?></td>
                    <td><?= $avis->commentaire?></td>
                    <td><?= $avis->date?></td>
                    <td>
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