<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>

<div class="container mt-5 mb-5 rapport-container">
    <h2 class="mb-4">Rapport animaux</h2>
    <form action="/DashRapport/ajoutRapport" method="POST">
        <!-- Nom de l'animal -->
        <div class="form-group mb-3">
            <label for="nom">Nom de l'animal</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de l'animal" required>
        </div>

        <!-- Date -->
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <!-- Statut de l'animal -->
        <div class="form-group mb-3">
            <label for="status">Statut</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Ex : Actif, Repos, Malade..." required>
        </div>

        <!-- Nourriture recommandée -->
        <div class="form-group mb-3">
            <label for="nourriture">Nourriture recommandée</label>
            <input type="text" class="form-control" id="nourriture" name="nourriture_reco" placeholder="Type de nourriture" required>
        </div>

        <!-- Grammage recommandé -->
        <div class="form-group mb-3">
            <label for="grammage">Grammage recommandé (en grammes)</label>
            <input type="number" class="form-control" id="grammage" name="grammage_reco" placeholder="Grammage en grammes" required>
        </div>

        <!-- Santé de l'animal (sur 10) -->
        <div class="form-group mb-3">
            <label for="sante">Santé (sur 10)</label>
            <input type="number" class="form-control" id="sante" name="sante" min="0" max="10" placeholder="Niveau de santé (0-10)" required>
        </div>

        <!-- Repas donnés -->
        <div class="form-group mb-3">
            <label for="repas">Repas donnés</label>
            <input type="text" class="form-control" id="repas" name="repas_donnees" placeholder="Type de repas donné" required>
        </div>

        <!-- Quantité donnée (en grammes) -->
        <div class="form-group mb-3">
            <label for="quantite">Quantité donnée (en grammes)</label>
            <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Quantité donnée en grammes" required>
        </div>

        <!-- Commentaire -->
        <div class="form-group mb-3">
            <label for="commentaire">Commentaire</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3" placeholder="Ajouter un commentaire..." required></textarea>
        </div>

        <!-- ID utilisateur -->
        <div class="mb-3">
            <label for="role" class="form-label">Utilisateur</label>
            <select class="form-select" id="role" name="id_User" required>
                <option value="">Sélectionner votre role</option>
                <option value="1">Admin</option>
                <option value="2">Vétérinaire</option>
                <option value="3">Employé</option>
            </select>
        </div>

        <!-- ID animal -->
        <div class="form-group mb-3">
            <label for="id_animal">ID Animal</label>
            <input type="number" class="form-control" id="id_animal" name="id_animal" placeholder="ID de l'animal" required>
        </div>

        <!-- Bouton de soumission -->
        <div class="form-group text-end">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/dash" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>