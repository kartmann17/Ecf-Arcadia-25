<link rel="stylesheet" href="../Asset/css/dashindex.css">
<div class="vide" ></div>
<section class="container ">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Ajout Animal</h2>
                    </div>
                    <div class="card-body">
                        <!-- Vérification des messages d'erreur ou de succès -->
                        <?php if(isset($_SESSION['error_message'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
                        <?php endif; ?>

                        <form action="/DashAnimaux/ajoutAnimaux" method="POST">
                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom Animal" required>
                            </div>
                            
                            <!-- Age -->
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="img" accept="image/*" required>
                            </div>

                            <!-- habitat -->
                            <div class="mb-3">
                                <label for="role" class="form-label">habitat</label>
                                <select class="form-select" id="habitat" name="id_habitat" required>
                                    <option value="">Sélectionner un habitat</option>
                                    <option value="1">Savavne</option>
                                    <option value="2">Jungle</option>
                                    <option value="3">Marais</option>
                                </select>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="/dash" class="btn btn-secondary">Annuler</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>