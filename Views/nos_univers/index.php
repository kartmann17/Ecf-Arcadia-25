<link rel="stylesheet" href="/Asset/css/nosunivers.css">
<div class="vide"></div>

<?php foreach ($univers as $univer): ?>
    <section class="container my-5">
        <div class="text-center mb-4">
            <a href="/Univers/showAnimaux/<?= $univer->id ?>">
                <h2 class="mt-3 mb-5">Notre espace <?= $univer->nom ?></h2>
            </a>
        </div>
        <div class="row">
            <!-- Image block -->
            <div class="col-12 mb-4 d-flex justify-content-center">
                <img class="w-75 img-fluid" src="/Asset/Images/<?= $univer->img ?>" alt="<?= $univer->nom ?>">
            </div>

            <!-- Text block -->
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="texte text-center">
                    <p class="m-auto"><?= $univer->description ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>