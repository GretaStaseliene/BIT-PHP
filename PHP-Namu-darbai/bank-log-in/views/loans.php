<div class="container text-center">
    <div class="d-flex justify-content-center mb-3">
        <h2>Pasirinkite paskolą</h2>
    </div>
</div>

<?php $loans = ['Greitasis kreditas', 'Vartojimo paskola', 'Paskola automobiliui', 'Būsto paskola'];

foreach ($loans as $loan) : ?>

    <div class="card ms-5 me-4 d-inline-block text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $loan ?></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Skaityti daugiau...</a>
        </div>
    </div>

<?php endforeach; ?>