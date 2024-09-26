<link rel="stylesheet" href="../Asset/css/nosanimaux.css">
<div class="vide"></div>
<h1 class="text-center mb-5">Nos animaux</h1>


<div class="row row-cols-1 row-cols-md-3 g-5">
    <?php foreach ($Animaux as $animal): ?>
        <div class="col"> 
            <div class="card m-auto w-75"> 
                <img src="/Asset/Images/<?= $animal->img?>" class="card-img-top image" alt="Animal Image"/>
                <div class="card-body overflow-auto">
                    <h5 class="card-title"><?=$animal->nom; ?></h5>
                    <p class="card-text">Âge : <?=$animal->age; ?> ans</p>
                    <p class="card-text">Habitat: <?=$animal->id_habitat;?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




