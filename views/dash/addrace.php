<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>

<div class="container mt-5">
    <h2 class="mb-4">Ajouter une nouvelle race</h2>

    <form action="/DashRace/ajoutRace" method="POST">
        <div class="mb-3">
            <label for="nomRace" class="form-label">Nom de la race</label>
            <input type="text" class="form-control" id="race" name="race" placeholder="Entrez le nom de la race" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistré</button>
    </form>
</div>