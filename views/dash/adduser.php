<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide"></div>
<section class="container">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center">Enregistrement Utilisateur</h4>
                    </div>
                    <div class="card-body">
                        <!-- Vérification des messages d'erreur ou de succès -->
                        <?php if(isset($_SESSION['error_message'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
                        <?php endif; ?>

                        <form action="/DashUser/ajoutUser" method="POST">
                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                            </div>
                            
                            <!-- Prénom -->
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="pass" placeholder="Votre mot de passe" required>
                            </div>

                            <!-- Rôle -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Rôle</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="">Sélectionner un rôle</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Vétérinaire</option>
                                    <option value="3">Employé</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="/dash" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
