<link rel="stylesheet" href="/Asset/css/nosanimaux.css">
<div class="vide"></div>
<h1 class="text-center mb-5">Nos Animaux</h1>

<div class="row row-cols-1 row-cols-md-3 g-5 m-auto mb-5">
    <?php foreach ($animaux as $animal): ?>
        <div class="col">
            <div class="card m-auto w-75 h-100 d-flex flex-column">
                <img src="/Asset/Images/<?= $animal->img ?>" class="card-img-top image" alt="Animal Image" />
                <div class="card-body overflow-auto text-center d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title"><?= $animal->nom; ?></h5>
                        <p class="card-text">Âge : <?= $animal->age; ?> ans</p>

                        <?php foreach ($races as $race):  if ($race->id == $animal->id_race): ?>
                                <p class="card-text">Race: <?= $race->race; ?></p>
                        <?php break;
                            endif;
                        endforeach; ?>

                        <?php foreach ($univers as $univer): if ($univer->id == $animal->id_habitat): ?>
                                <p class="card-text">Habitat: <?= $univer->nom; ?></p>
                        <?php break;
                            endif;
                        endforeach; ?>
                        
                    </div>

                    <button class="btn btm mt-3 w-100 mt-auto"
                        onclick="
                        showModal('<?= $animal->nom ?>', '<?= $animal->age ?>',
                        '<?= isset($race->race) ? $race->race : 'Non défini' ?>',
                        '<?= isset($univer->nom) ? $univer->nom : 'Non défini' ?>',
                        '<?= $animal->description ?>',
                        '/Asset/Images/<?= $animal->img ?>');
                        incrementCounter(<?= $animal->id ?>);">
                        Détails
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="animalModal" tabindex="-1" aria-labelledby="animalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="animalModalLabel">Description de l'animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modal-animal-img" src="" class="img-fluid mb-3" alt="Image de l'animal">
                <p><strong>Nom :</strong> <span id="modal-animal-name"></span></p>
                <p><strong>Âge :</strong> <span id="modal-animal-age"></span> Ans</p>
                <p><strong>Race :</strong> <span id="modal-animal-race"></span></p>
                <p><strong>Habitat :</strong> <span id="modal-animal-habitat"></span></p>
                <p><strong></strong> <span id="modal-animal-description"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="/Asset/Js/detailsanimaux.js"></script>